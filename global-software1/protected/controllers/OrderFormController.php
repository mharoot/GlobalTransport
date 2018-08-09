<?php

$path = dirname(__FILE__) . '/../Twilio/autoload.php';
use Twilio\Rest\Client;
require_once ($path);

class OrderFormController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','authorizeSignature','saveScr'),
                'users'=>array('*'),
            ),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','changeStatus','changeUser', 'orderReceipt', 'payment'),
				'users'=>array('@'),
			),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('view', 'history', 'dispatch', 'dispatchSheet'),
                'users'=>array('@'),
            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionPayment($id) {
        $model = $this->loadModel($id);
        $payment1 = new DotTrackerPayment1();
        $payment2 = new DotTrackerPayment2();

        if(isset($_POST['DotTrackerPayment1'])) {
            $newPayment1 = new DotTrackerPayment1;
            $newPayment1->attributes = $_POST['DotTrackerPayment1'];
            $newPayment1->order_id = $id;
            $newPayment1->date_received = FilingGenerics::showYMD($newPayment1->date_received);
            if($newPayment1->validate()) {
                $newPayment1->save();
                $this->redirect(array('view', 'id' => $model->id));
            } else {
                echo '<pre>';
                print_r($newPayment1->getErrors()); die;
            }
        } else if(isset($_POST['DotTrackerPayment2'])) {
            $newPayment2 = new DotTrackerPayment2;
            $newPayment2->attributes = $_POST['DotTrackerPayment2'];
            $newPayment2->order_id = $id;
            if($newPayment2->validate()) {
                $newPayment2->save();
                $this->redirect(array('view', 'id' => $model->id));
            } else {
                echo '<pre>';
                print_r($newPayment2->getErrors()); die;
            }
        }

        $this->render('payment',array(
            'model'=>$model,
            'payment1'=>$payment1,
            'payment2'=>$payment2,
        ));
    }

    public function actionDispatchSheet($id) {
        $model = $this->loadModel($id);
        $settings = GlobalTrackerSettings::model()->findByPk(1);

        $this->render('dispatchSheet',array(
            'model'=>$model,
            'settings'=>$settings,
        ));
    }

    public function actionDispatch($id, $status) {
        $oldValues = $this->loadModel($id);
        $model = $this->loadModel($id);
        $settings = GlobalTrackerSettings::model()->findByPk(1);
        $accountinfo = GlobalTrackerAccountinfo::model()->findByPk(1);

        if(isset($_POST['GlobalTrackerOrder'])) {
            $model->attributes = $_POST['GlobalTrackerOrder'];

            if($model->save_as_default == 1) {
                $settings->carrier_pmt_term = $model->extra2;
                $settings->carrier_pmt_term_begin = $model->extra3;
                $settings->carrier_pmt_method = $model->extra4;
                $settings->save();
            }

            //Update the Vehicle Tariff
            $vehInfo = json_decode($model->vehicle_info);
            for($i=1; $i<=5; $i++) {
                if(isset($_POST['new_Vehicle_tariff'.$i])) {
                    $newInfo = $_POST['new_Vehicle_tariff'.$i];
                    if($vehInfo->{'Vehicle_tariff'.$i} != $newInfo) {
                        $vehInfo->{'Vehicle_tariff'.$i} = $newInfo;
                    }
                }
                if(isset($_POST['new_Vehicle_deposit'.$i])) {
                    $newInfo = $_POST['new_Vehicle_deposit'.$i];
                    if($vehInfo->{'Vehicle_deposit'.$i} != $newInfo) {
                        $vehInfo->{'Vehicle_deposit'.$i} = $newInfo;
                    }
                }
            }
            $model->vehicle_info = json_encode($vehInfo);

            //Update the dispatched time
            if(empty($model->dispatched_time)) {
                date_default_timezone_set('America/Los_Angeles');
                $model->dispatched_time = date("m/d/Y H:i:s a");
            }

            //Update the status
            $model->status = $status;

            if($model->save()) {
                //Get the changed value pairs
                date_default_timezone_set('America/Los_Angeles');
                $curTime = date("m/d/Y H:i:s a");

                foreach ($model as $name => $value) {
                    if($name == 'vehicle_info') {
                        $oldObj = json_decode($oldValues->$name);
                        $newObj = json_decode($value);
                        for($i=1; $i<=5; $i++) {
                            if($oldObj->{'Vehicle_tariff'.$i} != $newObj->{'Vehicle_tariff'.$i}) {
                                $this->insertHistoryO($model->id,'Vehicle_tariff'.$i,$oldObj->{'Vehicle_tariff'.$i},$newObj->{'Vehicle_tariff'.$i},$curTime,$model->created_by);
                            } 
                            if($oldObj->{'Vehicle_deposit'.$i} != $newObj->{'Vehicle_deposit'.$i}) {
                                $this->insertHistoryO($model->id,'Vehicle_deposit'.$i,$oldObj->{'Vehicle_deposit'.$i},$newObj->{'Vehicle_deposit'.$i},$curTime,$model->created_by);
                            }
                        }
                    } else if($value != $oldValues->$name) {
                        if($oldValues->$name == '') {
                            $old = 'none';
                        } else {
                            $old = $oldValues->$name;
                        }
                        if($value == '') {
                            $new = 'none';
                        } else {
                            $new = $value;
                        }
                        if($name == 'save_as_default') {
                            $old = GlobalTrackerOrder::$arrSaveAsDefault[$oldValues->$name];
                            $new = GlobalTrackerOrder::$arrSaveAsDefault[$value];
                        } else if($name == 'status') {
                            $old = GlobalTrackerOrder::$arrStatus[$oldValues->$name];
                            $new = GlobalTrackerOrder::$arrStatus[$value];
                        }
                        $this->insertHistoryO($model->id,$name,$old,$new,$curTime,$model->created_by);
                    }
                }

                $this->redirect(array('view', 'id' => $model->id));
            } else {
                $this->redirect(array('dispatch', 'model' => $model));
            }
        }

        $this->render('dispatch',array(
            'model'=>$this->loadModel($id),
            'settings'=>$settings,
            'accountinfo'=>$accountinfo,
        ));
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

    public function actionHistory($id) {
        $this->render('history',array(
            'model'=>$this->loadModel($id),
        ));
    }

    public function actionOrderReceipt($id) {
        $this->render('view1',array(
            'model'=>$this->loadModel($id),
        ));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new GlobalTrackerOrder;
        $sendSms = false;
        $sendEmail = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GlobalTrackerOrder']))
		{
			$model->attributes = $_POST['GlobalTrackerOrder'];
            if(array_key_exists('isSave',$_POST))
            {
                $account = new GlobalTrackerShipper();
                $account->company_name = $model->company;
                $account->fname = $model->fname;
                $account->lname = $model->lname;
                $account->status = GlobalTrackerShipper::$arrStatus['active'];
                $account->type = GlobalTrackerShipper::$arrType['shipper'];
                $account->phone1 = $model->phone1;
                $account->phone2 = $model->phone2;
                $account->cell_phone = $model->mobile;
                $account->fax = $model->fax;
                $account->address = $model->address1;
                $account->address2 = $model->address2;
                $account->city = $model->city;
                $account->state = $model->state;
                $account->zip = $model->zip;
                $account->creation_datetime = new CDbExpression('NOW()');
                $account->created_by = Yii::app()->user->id;
                $account->extra1 = 'NA';
                $account->extra2 = 'NA';

                if($account->validate())
                {
                    $account->save();
                } else {
                    echo '<pre>';
                    print_r($account->getErrors()); die;
                }
            }

			$model->creationdatetime = new CDbExpression('NOW()');
			$model->created_by = Yii::app()->user->id;
			if($model->save()) {
                if(isset($_POST['but2'])) {
                    $sendEmail = true;
                } else if(isset($_POST['but3'])) {
                    $sendSms = true;
                } else if(isset($_POST['but4'])) {
                    $sendEmail = true;
                    $sendSms = true;
                }
                if ($sendSms) {
                    $this->sendSmsToUser($model);
                }
                if ($sendEmail) {
                    $this->sendEmailToUser($model);
                }

                //Get the changed value pairs and store into database
                date_default_timezone_set('America/Los_Angeles');
                $curTime = date("m/d/Y H:i:s a");

                foreach ($model as $name => $value) {
                    if($name == 'vehicle_info') {
                        $obj = json_decode($value);
                        for($i=1; $i<=5; $i++) {
                            if($obj->{'Vehicle_tariff'.$i} != '') {
                                $this->insertHistoryO($model->id,'Vehicle_tariff'.$i,'none',$obj->{'Vehicle_tariff'.$i},$curTime,$model->created_by);
                            } 
                            if($obj->{'Vehicle_deposit'.$i} != '') {
                                $this->insertHistoryO($model->id,'Vehicle_deposit'.$i,'none',$obj->{'Vehicle_deposit'.$i},$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_year'.$i} != '') {
                                $this->insertHistoryO($model->id,'Vehicle_year'.$i,'none',$obj->{'Vehicle_year'.$i},$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_make'.$i} != '') {
                                $this->insertHistoryO($model->id,'Vehicle_make'.$i,'none',$obj->{'Vehicle_make'.$i},$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_model'.$i} != '') {
                                $this->insertHistoryO($model->id,'Vehicle_model'.$i,'none',$obj->{'Vehicle_model'.$i},$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_type'.$i} != '') {
                                $this->insertHistoryO($model->id,'Vehicle_type'.$i,'none',GlobalTrackerOrder::$enumbVehicleType[$obj->{'Vehicle_type'.$i}],$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_color'.$i} != '') {
                                $this->insertHistoryO($model->id,'Vehicle_color'.$i,'none',$obj->{'Vehicle_color'.$i},$curTime,$model->created_by);
                            } 
                            if($obj->{'Vehicle_plate'.$i} != '') {
                                $this->insertHistoryO($model->id,'Vehicle_plate'.$i,'none',$obj->{'Vehicle_plate'.$i},$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_vin'.$i} != '') {
                                $this->insertHistoryO($model->id,'Vehicle_vin'.$i,'none',$obj->{'Vehicle_vin'.$i},$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_lot'.$i} != '') {
                                $this->insertHistoryO($model->id,'Vehicle_lot'.$i,'none',$obj->{'Vehicle_lot'.$i},$curTime,$model->created_by);
                            }
                        }
                    } else {
                        $new = $value;
                        if($name == 's_vrun') {
                            $new = GlobalTrackerOrder::$arrVRun[$model->$name];
                        } else if($name == 's_via') {
                            $new = GlobalTrackerOrder::$enumShipVia[$model->$name];
                        } else if($name == 'referred_by') {
                            $new = GlobalTrackerOrder::$enumReferBy[$model->$name];
                        } else if($name == 'status') {
                            $new = GlobalTrackerOrder::$arrStatus[$model->$name];
                        } else if($name == 'save_as_default') {
                            $new = GlobalTrackerOrder::$arrSaveAsDefault[$model->$name];
                        }
                        $this->insertHistoryO($model->id,$name,'none',$new,$curTime,$model->created_by);
                    }
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model=$this->loadModel($id);
        $oldValues = $this->loadModel($id);
        $sendSms=false;
        $sendEmail=false;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GlobalTrackerOrder']))
		{
			$model->attributes=$_POST['GlobalTrackerOrder'];
			if($model->save()) {
                if(isset($_POST['but2'])) {
                    $sendEmail = true;
                } else if(isset($_POST['but3'])) {
                    $sendSms = true;
                } else if(isset($_POST['but4'])) {
                    $sendEmail = true;
                    $sendSms = true;
                }
                if ($sendSms) {
                    $this->sendSmsToUser($model);
                }
                if ($sendEmail) {
                    $this->sendEmailToUser($model);
                }

                //Get the changed value pairs
                date_default_timezone_set('America/Los_Angeles');
                $curTime = date("m/d/Y H:i:s a");

                foreach ($model as $name => $value) {
                    if($name == 'vehicle_info') {
                        $oldObj = json_decode($oldValues->$name);
                        $newObj = json_decode($value);
                        for($i=1; $i<=5; $i++) {
                            if($oldObj->{'Vehicle_tariff'.$i} != $newObj->{'Vehicle_tariff'.$i}) {
                                $this->insertHistoryO($model->id,'Vehicle_tariff'.$i,$oldObj->{'Vehicle_tariff'.$i},$newObj->{'Vehicle_tariff'.$i},$curTime,$model->created_by);
                            } 
                            if($oldObj->{'Vehicle_deposit'.$i} != $newObj->{'Vehicle_deposit'.$i}) {
                                $this->insertHistoryO($model->id,'Vehicle_deposit'.$i,$oldObj->{'Vehicle_deposit'.$i},$newObj->{'Vehicle_deposit'.$i},$curTime,$model->created_by);
                            }
                            if($oldObj->{'Vehicle_year'.$i} != $newObj->{'Vehicle_year'.$i}) {
                                $this->insertHistoryO($model->id,'Vehicle_year'.$i,$oldObj->{'Vehicle_year'.$i},$newObj->{'Vehicle_year'.$i},$curTime,$model->created_by);
                            }
                            if($oldObj->{'Vehicle_make'.$i} != $newObj->{'Vehicle_make'.$i}) {
                                $this->insertHistoryO($model->id,'Vehicle_make'.$i,$oldObj->{'Vehicle_make'.$i},$newObj->{'Vehicle_make'.$i},$curTime,$model->created_by);
                            }
                            if($oldObj->{'Vehicle_model'.$i} != $newObj->{'Vehicle_model'.$i}) {
                                $this->insertHistoryO($model->id,'Vehicle_model'.$i,$oldObj->{'Vehicle_model'.$i},$newObj->{'Vehicle_model'.$i},$curTime,$model->created_by);
                            }
                            if($oldObj->{'Vehicle_type'.$i} != $newObj->{'Vehicle_type'.$i}) {
                                $this->insertHistoryO($model->id,'Vehicle_type'.$i,GlobalTrackerOrder::$enumbVehicleType[$oldObj->{'Vehicle_type'.$i}],GlobalTrackerOrder::$enumbVehicleType[$newObj->{'Vehicle_type'.$i}],$curTime,$model->created_by);
                            }
                            if($newObj->{'Vehicle_color'.$i} != $oldObj->{'Vehicle_color'.$i}) {
                                if($oldObj->{'Vehicle_color'.$i} == '') {
                                    $old = 'none';
                                } else {
                                    $old = $oldObj->{'Vehicle_color'.$i};
                                }
                                if($newObj->{'Vehicle_color'.$i} == '') {
                                    $new = 'none';
                                } else {
                                    $new = $newObj->{'Vehicle_color'.$i};
                                }
                                $this->insertHistoryO($model->id,'Vehicle_color'.$i,$old,$new,$curTime,$model->created_by);
                            }
                            if($newObj->{'Vehicle_plate'.$i} != $oldObj->{'Vehicle_plate'.$i}) {
                                if($oldObj->{'Vehicle_plate'.$i} == '') {
                                    $old = 'none';
                                } else {
                                    $old = $oldObj->{'Vehicle_plate'.$i};
                                }
                                if($newObj->{'Vehicle_plate'.$i} == '') {
                                    $new = 'none';
                                } else {
                                    $new = $newObj->{'Vehicle_plate'.$i};
                                }
                                $this->insertHistoryO($model->id,'Vehicle_plate'.$i,$old,$new,$curTime,$model->created_by);
                            }
                            if($newObj->{'Vehicle_deliveryState'.$i} != $oldObj->{'Vehicle_deliveryState'.$i}) {
                                if($oldObj->{'Vehicle_deliveryState'.$i} == '') {
                                    $old = 'none';
                                } else {
                                    $old = $oldObj->{'Vehicle_deliveryState'.$i};
                                }
                                if($newObj->{'Vehicle_deliveryState'.$i} == '') {
                                    $new = 'none';
                                } else {
                                    $new = $newObj->{'Vehicle_deliveryState'.$i};
                                }
                                $this->insertHistoryO($model->id,'Vehicle_deliveryState'.$i,$old,$new,$curTime,$model->created_by);
                            }
                            if($newObj->{'Vehicle_vin'.$i} != $oldObj->{'Vehicle_vin'.$i}) {
                                if($oldObj->{'Vehicle_vin'.$i} == '') {
                                    $old = 'none';
                                } else {
                                    $old = $oldObj->{'Vehicle_vin'.$i};
                                }
                                if($newObj->{'Vehicle_vin'.$i} == '') {
                                    $new = 'none';
                                } else {
                                    $new = $newObj->{'Vehicle_vin'.$i};
                                }
                                $this->insertHistoryO($model->id,'Vehicle_vin'.$i,$old,$new,$curTime,$model->created_by);
                            }
                            if($newObj->{'Vehicle_lot'.$i} != '' || $oldObj->{'Vehicle_lot'.$i} != '') {
                                if($oldObj->{'Vehicle_lot'.$i} == '') {
                                    $old = 'none';
                                } else {
                                    $old = $oldObj->{'Vehicle_lot'.$i};
                                }
                                if($newObj->{'Vehicle_lot'.$i} == '') {
                                    $new = 'none';
                                } else {
                                    $new = $newObj->{'Vehicle_lot'.$i};
                                }
                                $this->insertHistoryO($model->id,'Vehicle_lot'.$i,$old,$new,$curTime,$model->created_by);
                            }
                        }
                    } else if($value != $oldValues->$name) {
                        if($oldValues->$name == '') {
                            $old = 'none';
                        } else {
                            $old = $oldValues->$name;
                        }
                        if($value == '') {
                            $new = 'none';
                        } else {
                            $new = $value;
                        }
                        if($name == 's_vrun') {
                            $old = GlobalTrackerOrder::$arrVRun[$oldValues->$name];
                            $new = GlobalTrackerOrder::$arrVRun[$value];
                        } else if($name == 's_via') {
                            $old = GlobalTrackerOrder::$enumShipVia[$oldValues->$name];
                            $new = GlobalTrackerOrder::$enumShipVia[$value];
                        } else if($name == 'referred_by') {
                            $old = GlobalTrackerOrder::$enumReferBy[$oldValues->$name];
                            $new = GlobalTrackerOrder::$enumReferBy[$value];
                        } else if($name == 'status') {
                            $old = GlobalTrackerOrder::$arrStatus[$oldValues->$name];
                            $new = GlobalTrackerOrder::$arrStatus[$value];
                        } else if($name == 'save_as_default') {
                            $old = GlobalTrackerOrder::$arrSaveAsDefault[$oldValues->$name];
                            $new = GlobalTrackerOrder::$arrSaveAsDefault[$value];
                        }
                        $this->insertHistoryO($model->id,$name,$old,$new,$curTime,$model->created_by);
                    }
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model=new GlobalTrackerOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GlobalTrackerOrder']))
			$model->attributes=$_GET['GlobalTrackerOrder'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function insertHistoryO($id, $field, $old, $new, $time, $created_by) {
        $history = new DotTrackerOrderHistory();
        $history->order_id = $id;
        $history->field = $field;
        $history->old_value = $old;
        $history->new_value = $new;
        $history->created_time = $time;
        $history->created_by = $created_by;
        $history->save();
    }

    public function actionChangeStatus() {
        $id=Yii::app()->request->getParam('id',0);
        $status=Yii::app()->request->getParam('status',0);
        $success=false;
        $msg='';
        if(empty($id) || empty($status))
        {
            die;
        }
        if(!empty($id))
        {
            $id=FilingGenerics::decryptKey($id);
        }
        //print_r($_REQUEST);die;
        if(!empty($status))
        {
            $status=FilingGenerics::decryptKey($status);
        }

        //Get the current status
        $model=$this->loadModel($id);
        date_default_timezone_set('America/Los_Angeles');
        $curTime = date("m/d/Y H:i:s a");

        $oldStatus = GlobalTrackerOrder::$arrStatus[$model->status];
        $newStatus = GlobalTrackerOrder::$arrStatus[$status];
        $this->insertHistoryO($model->id,'Status',$oldStatus,$newStatus,$curTime,$model->created_by);

        /*
         * If the current status is 'not signed' or 'Dispatched' and it will be changed back to order,
         * then delete all the columns relavent to dispatch.
         */
        if(($model->status == 5 || $model->status == 6) && $status == 1) {
            $this->insertHistoryO($model->id,'Load Date',$model->extra,'none',$curTime,$model->created_by);
            $this->insertHistoryO($model->id,'Delivery Date',$model->extra1,'none',$curTime,$model->created_by);
            $this->insertHistoryO($model->id,'carrier Name',$model->carrier_name,'none',$curTime,$model->created_by);
            $this->insertHistoryO($model->id,'Carrier Pmt Term',$model->extra2,'none',$curTime,$model->created_by);
            $this->insertHistoryO($model->id,'Carrier Pmt Term Begin',$model->extra3,'none',$curTime,$model->created_by);
            $this->insertHistoryO($model->id,'Carrier Pmt Method',$model->extra4,'none',$curTime,$model->created_by);
            $this->insertHistoryO($model->id,'Dispatch Contact',$model->dispatch_contact,'none',$curTime,$model->created_by);
            $this->insertHistoryO($model->id,'Dispatch Email',$model->dispatch_email,'none',$curTime,$model->created_by);
            $this->insertHistoryO($model->id,'Dispatch Phone',$model->dispatch_phone,'none',$curTime,$model->created_by);
            $this->insertHistoryO($model->id,'Dispatch Fax',$model->dispatch_fax,'none',$curTime,$model->created_by);
            $this->insertHistoryO($model->id,'Dispatched Time',$model->dispatched_time,'none',$curTime,$model->created_by);
            $model->extra = '';
            $model->extra1 = '';
            $model->carrier_name = '';
            $model->extra2 = '';
            $model->extra3 = '';
            $model->extra4 = '';
            $model->dispatch_contact = '';
            $model->dispatch_email = '';
            $model->dispatch_phone = '';
            $model->dispatch_fax = '';
            $model->dispatched_time = '';
        }

        $model->status=$status;

        if($model->validate()) {
            $model->save();
            $success=true;
            $msg='Status updated successfully';
        } else {
            $success=false;
            $msg='Status could not be updated';
        }
        echo CJSON::encode(array('success'=>$success,'msg'=>$msg));
    }

    public function actionChangeUser() {
        $id = Yii::app()->request->getParam('id',0);
        $username = Yii::app()->request->getParam('username',0);
        $success = false;
        $msg = '';
        if(empty($id) || empty($username)) {
            die;
        }

        if(!empty($id)) {
            $id = FilingGenerics::decryptKey($id);
        }

        $model = $this->loadModel($id);
        
        date_default_timezone_set('America/Los_Angeles');
        $curTime = date("m/d/Y H:i:s a");
        $this->insertHistoryO($model->id, 'Assigned to', $model->created_by, $username, $curTime, Yii::app()->user->id);

        $model->created_by = $username;

        if($model->validate()) {
            $model->save();
            $success = true;
            $msg = 'Username updated successfully';
        } else {
            $success = false;
            $msg = 'Username could not be updated';
        }

        echo CJSON::encode(array('success'=>$success,'msg'=>$msg));
    }

    public function actionAuthorizeSignature($id) {
        $this->render('authorize', array(
            'model' => $this->loadModel($id),
        ));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GlobalTrackerOrder the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = GlobalTrackerOrder::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GlobalTrackerOrder $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if(isset($_POST['ajax']) && $_POST['ajax']==='global-tracker-order-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /*public function sendSmsToUserFollowup($model1) {
        $msgTxt = "Order form followup submitted successfullly";
        $model=new DotTrackerSms();
        $model->status = DotTrackerSms::$arrStatus['init'];
        $model->phone = $model1->mobile;
        $model->message = $msgTxt;

        if($model->validate()) {
            $model->save();
        } else {
            print_r($model->getErrors());
        }
    }


    public function sendEmailToUserFollowUp($model) {
        $to = $model->email;
        $subject =  "Order Form Followup - Submitted on [Time:".date("m/d/Y H:i:s a").']';
        $txt = "Hi ,<br><br>Order Form submitted. <br><br> Warm Regards<br>Support Team<br> www.fmcsafiling.com";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: info@globalautotransportation.com" . "\r\n" ."CC: niobe.chill@gmail.com". "\r\n" ."BCC: kunalnet123@gmail.com";

        mail($to,$subject,$txt,$headers);
    }

    public function sendSaveEmailToUser($model) {
        $to = 'globalautotransportation@gmail.com,yxw165730@gmail.com';
        $subject = "Order Form (Global Auto) - Signature Submitted [Time:".date("m/d/Y H:i:s a").']';
        $txt = "Hi Admin,<br><br>Signature submitted for Order Form.<a href='http://globaltransportationsoftware.com/index.php?r=orderForm/view&id=".$model->id."'>Click here</a> to view <br><br> Warm Regards<br>Support Team<br> Global Auto Transportation";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: info@globalautotransportation.com" . "\r\n";

        mail($to,$subject,$txt,$headers);
    }*/

    public function sendEmailToUser($CreditCardAuth) {
        date_default_timezone_set('America/Los_Angeles');
        $allAttr = $CreditCardAuth->attributes;
        $arr = GlobalTrackerOrder::model()->attributeLabels();
        $Template = DotTrackerEmailtemp::model()->findByPk(3);
        $templArr = $Template->attributes;
        $body = $templArr['emaildata'];
        $bodytxt = '';
        
        foreach ($arr as $index=>$val) {
            if($index == 'vehicle_info') {
                $body = str_replace('[vehicle_info]', FilingGenerics::getVehicleInfoforMail($CreditCardAuth->id), $body);
            }
            if($index == 's_via') {
                $body = str_replace('[s_via]', GlobalTrackerOrder::$enumShipVia[$allAttr['s_via']], $body);
            }
            if(array_key_exists($index,$allAttr))
                $body = str_replace('['.$index.']',$allAttr[$index],$body);
        }
        $body = str_replace('[agent_name]', FilingGenerics::getUserName($allAttr['created_by']), $body);
        $body = str_replace('[agent_phone]', FilingGenerics::getUserPhone($allAttr['created_by']), $body);
        $body = str_replace('[auth_link]','<a href="http://globaltransportationsoftware.com/index.php?r=orderForm/authorizeSignature&id='.$allAttr['id'].'">Click here to Authorize Order</a>',$body);

        $to = $CreditCardAuth->email;
        $subject =  "Order Form - Submitted on [Time:".date("m/d/Y H:i:s a").']';
        $txt = $body;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: info@globalautotransportation.com" . "\r\n";
        mail($to,$subject,$txt,$headers);

        $adminEmail = FilingGenerics::getAuthEmail($CreditCardAuth->created_by);
        $to = $adminEmail;
        $subject =  "(Copy Email) Order Form - Submitted on [Time:".date("m/d/Y H:i:s a").']';
        $txt = $body;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: info@globalautotransportation.com" . "\r\n";
        mail($to,$subject,$txt,$headers);
    }

    public function sendSmsToUser($CreditCardAuth) {
        $allAttr = $CreditCardAuth->attributes;
        $arr = GlobalTrackerOrder::model()->attributeLabels();
        $Template = DotTrackerEmailtemp::model()->findByPk(4);
        $templArr = $Template->attributes;
        $body = $templArr['emaildata'];
        $bodytxt = '';

        foreach ($arr as $index => $val) {
            if($index == 'vehicle_info') {
                $body = str_replace('[vehicle_info]',FilingGenerics::getVehicleInfoforMail($CreditCardAuth->id), $body);
            }
            if($index == 's_via') {
                $body = str_replace('[s_via]', GlobalTrackerOrder::$enumShipVia[$allAttr['s_via']], $body);
            }
            $body = str_replace('&nbsp;', ' ', $body);
            $body = strip_tags($body);
            if(array_key_exists($index, $allAttr))
                $body = str_replace('['.$index.']', $allAttr[$index], $body);
        }
        $body = str_replace('[auth_link]', 'http://globaltransportationsoftware.com/index.php?r=orderForm/authorizeSignature&id='.$allAttr['id'], $body);

        $msgTxt = $body;
        $model = new DotTrackerSms();
        $model->status = DotTrackerSms::$arrStatus['init'];
        $model->phone = $CreditCardAuth->mobile;
        $model->message = $msgTxt; 

        if($model->validate()) {
            $model->save();

            //Send message with tuilio
            $sid    = "AC7f8a40ddd62032b6c6385e8b8bde1f36";
            $token  = "afbc626cf965300e959164dddd075495";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages->create($model->phone, // to
                           array(
                               "body" => $model->message,
                               "from" => "+18183512878"
                           ));
        } else {
            print_r($model->getErrors());
        }
    }

    public function actionSaveScr() {
        $imgData=Yii::app()->request->getPost('imgData','');
        $id=Yii::app()->request->getParam('id','');
        $CreditCardAuth=GlobalTrackerOrder::model()->findByPk($id);

        if(!$CreditCardAuth) {
            throw new CHttpException(400,'Order cannot be found!');
        }

        $imagedata = base64_decode($imgData);
        $filename = md5(uniqid(rand(), true));

        //$file = '/Applications/MAMP/htdocs/fmcsa-filings/uploadsign/'.$filename.'.png';
        $file='/home/yxw165730/public_html/uploadsign/'.$filename.'.png';
        if(file_put_contents($file,$imagedata)) {
            $CreditCardAuth->extra4='uploadsign/'.$filename.'.png';

            $CreditCardAuth->save();
            $this->sendSaveEmailToUser($CreditCardAuth);
        }
        echo $file;
    }
}
