<?php

$path = dirname(__FILE__) . '/../Twilio/autoload.php';
use Twilio\Rest\Client;
require_once ($path);

class QuoteFormController extends Controller {
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
				'actions'=>array('index','unsubscribe','changeStatus','quoteReview'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','quoteReceipt','convert','followup'),
				'users'=>array('@'),
			),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('authorizeSignature','saveScr','view','changeUser','history'),
				'users'=>array('@'),
			),
            /*array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('create', 'update', 'admin', 'followup'),
                'users'=>array('tonygreg', 'yan'),
            ),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionUnsubscribe($id) {
        $this->render('unsubscribe',array(
            'model'=>$this->loadModel($id),
        ));
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
        $settings = GlobalTrackerSettings::model()->findByPk(1);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'settings'=>$settings,
		));
	}

    public function actionQuoteReceipt($id) {
        $this->render('view1',array(
            'model'=>$this->loadModel($id),
        ));
    }

    public function actionChangeStatus() {
        $id = Yii::app()->request->getParam('id',0);
        $status = Yii::app()->request->getParam('status',0);
        $success = false;
        $msg = '';
        if(empty($id) || empty($status)) {
            die;
        }
        if(!empty($id)) {
            $id = FilingGenerics::decryptKey($id);
        }

        if(!empty($status)) {
            $status = FilingGenerics::decryptKey($status);
        }
        $model = $this->loadModel($id);
        $model->status = $status;
        if($model->validate()) {
            $model->save();
            $success = true;
            $msg = 'Status updated successfully';
        } else {
            $success = false;
            $msg = 'Status could not be updated';
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
        $this->insertHistoryQ($model->id, 'Assigned to', $model->created_by, $username, $curTime, Yii::app()->user->id);

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

    public function actionFollowup() {
        $id = Yii::app()->request->getParam('id',0);
        if(strlen($id) > 1) {
            $actionF = Yii::app()->request->getParam('actionF',0);
            //$success = false;
            //$msg = '';
            if(empty($id) || empty($actionF)) {
                die;
            }
            if(!empty($id)) {
                $id = FilingGenerics::decryptKey($id);
            }

            $model = $this->loadModel($id);
            //$mailC = 0;
            //$smsC = 0;
            switch ($actionF) {
                case 'email':
                    //$mailC = $model->mailCount;
                    //$mailC = $mailC + 1;
                    //$model->mailCount = $mailC;
                    $this->sendEmailToUser($model);
                    break;

                case 'sms':
                    //$smsC = $model->smsCount;
                    //$smsC = $smsC + 1;
                    //$model->smsCount = $smsC;
                    $this->sendSmsToUser($model);
                    break;

                case 'both':
                    //$mailC = $model->mailCount;
                    //$mailC = $mailC + 1;
                    //$model->mailCount = $mailC;
                    $this->sendEmailToUser($model);

                    //$smsC = $model->smsCount;
                    //$smsC = $smsC + 1;
                    //$model->smsCount = $smsC;
                    $this->sendSmsToUser($model);
                    break;
            }
        }
        /*if($model->validate()) {
            $model->save();
            $success = true;
            $msg = 'Username updated successfully';
        } else {
            $success = false;
            $msg = 'Username could not be updated';
        }*/

        //echo CJSON::encode(array('success'=>$success,'msg'=>$msg));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
        $settings = GlobalTrackerSettings::model()->findByPk(1);
		$model = new GlobalTrackerQuote;
        $sendSms = false;
        $sendEmail = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GlobalTrackerQuote'])) {
			$model->attributes = $_POST['GlobalTrackerQuote'];
            if(array_key_exists('isSave',$_POST)) {
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

                if($account->validate()) {
                    $account->save();
                } else {
                    echo '<pre>';
                    print_r($account->getErrors()); die;
                }
            }
			$model->creationdatetime=new CDbExpression('NOW()');
			$model->created_by=Yii::app()->user->id;
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
                        $obj = json_decode($value);
                        for($i=1; $i<=5; $i++) {
                            if($obj->{'Vehicle_tariff'.$i} != '') {
                                $this->insertHistoryQ($model->id,'Vehicle_tariff'.$i,'none',$obj->{'Vehicle_tariff'.$i},$curTime,$model->created_by);
                            } 
                            if($obj->{'Vehicle_deposit'.$i} != '') {
                                $this->insertHistoryQ($model->id,'Vehicle_deposit'.$i,'none',$obj->{'Vehicle_deposit'.$i},$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_year'.$i} != '') {
                                $this->insertHistoryQ($model->id,'Vehicle_year'.$i,'none',$obj->{'Vehicle_year'.$i},$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_make'.$i} != '') {
                                $this->insertHistoryQ($model->id,'Vehicle_make'.$i,'none',$obj->{'Vehicle_make'.$i},$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_model'.$i} != '') {
                                $this->insertHistoryQ($model->id,'Vehicle_model'.$i,'none',$obj->{'Vehicle_model'.$i},$curTime,$model->created_by);
                            }
                            if($obj->{'Vehicle_type'.$i} != '') {
                                $this->insertHistoryQ($model->id,'Vehicle_type'.$i,'none',GlobalTrackerQuote::$enumbVehicleType[$obj->{'Vehicle_type'.$i}],$curTime,$model->created_by);
                            }
                        }
                    } else {
                        $new = $value;
                        if($name == 's_vrun') {
                            $new = GlobalTrackerQuote::$arrVRun[$model->$name];
                        } else if($name == 's_via') {
                            $new = GlobalTrackerQuote::$enumShipVia[$model->$name];
                        } else if($name == 'referred_by') {
                            $new = GlobalTrackerQuote::$enumReferBy[$model->$name];
                        } else if($name == 'status') {
                            $new = GlobalTrackerQuote::$arrStatus[$model->$name];
                        }
                        $this->insertHistoryQ($model->id,$name,'none',$new,$curTime,$model->created_by);
                    }
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
		}

		$this->render('create',array(
			'model'=>$model,
            'settings'=>$settings,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
        $settings = GlobalTrackerSettings::model()->findByPk(1);
		$oldValues = $this->loadModel($id);
        $model = $this->loadModel($id);
        $sendEmail = false;
        $sendSms = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GlobalTrackerQuote'])) {
			$model->attributes = $_POST['GlobalTrackerQuote'];
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
                                $this->insertHistoryQ($model->id,'Vehicle_tariff'.$i,$oldObj->{'Vehicle_tariff'.$i},$newObj->{'Vehicle_tariff'.$i},$curTime,$model->created_by);
                            } 
                            if($oldObj->{'Vehicle_deposit'.$i} != $newObj->{'Vehicle_deposit'.$i}) {
                                $this->insertHistoryQ($model->id,'Vehicle_deposit'.$i,$oldObj->{'Vehicle_deposit'.$i},$newObj->{'Vehicle_deposit'.$i},$curTime,$model->created_by);
                            }
                            if($oldObj->{'Vehicle_year'.$i} != $newObj->{'Vehicle_year'.$i}) {
                                $this->insertHistoryQ($model->id,'Vehicle_year'.$i,$oldObj->{'Vehicle_year'.$i},$newObj->{'Vehicle_year'.$i},$curTime,$model->created_by);
                            }
                            if($oldObj->{'Vehicle_make'.$i} != $newObj->{'Vehicle_make'.$i}) {
                                $this->insertHistoryQ($model->id,'Vehicle_make'.$i,$oldObj->{'Vehicle_make'.$i},$newObj->{'Vehicle_make'.$i},$curTime,$model->created_by);
                            }
                            if($oldObj->{'Vehicle_model'.$i} != $newObj->{'Vehicle_model'.$i}) {
                                $this->insertHistoryQ($model->id, 'Vehicle_model'.$i,$oldObj->{'Vehicle_model'.$i}, $newObj->{'Vehicle_model'.$i}, $curTime, $model->created_by);
                            }
                            if($oldObj->{'Vehicle_type'.$i} != $newObj->{'Vehicle_type'.$i}) {
                                $this->insertHistoryQ($model->id,'Vehicle_type'.$i,GlobalTrackerQuote::$enumbVehicleType[$oldObj->{'Vehicle_type'.$i}],GlobalTrackerQuote::$enumbVehicleType[$newObj->{'Vehicle_type'.$i}],$curTime,$model->created_by);
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
                            $old = GlobalTrackerQuote::$arrVRun[$oldValues->$name];
                            $new = GlobalTrackerQuote::$arrVRun[$value];
                        } else if($name == 's_via') {
                            $old = GlobalTrackerQuote::$enumShipVia[$oldValues->$name];
                            $new = GlobalTrackerQuote::$enumShipVia[$value];
                        } else if($name == 'referred_by') {
                            $old = GlobalTrackerQuote::$enumReferBy[$oldValues->$name];
                            $new = GlobalTrackerQuote::$enumReferBy[$value];
                        } else if($name == 'status') {
                            $old = GlobalTrackerQuote::$arrStatus[$oldValues->$name];
                            $new = GlobalTrackerQuote::$arrStatus[$value];
                        }
                        $this->insertHistoryQ($model->id,$name,$old,$new,$curTime,$model->created_by);
                    }
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
		}

		$this->render('update',array(
			'model'=>$oldValues,
            'settings'=>$settings,
		));
	}

    public function actionHistory($id) {
        $this->render('history',array(
            'model'=>$this->loadModel($id),
        ));
    }

    public function insertHistoryQ($id, $field, $old, $new, $time, $created_by) {
        $history = new DotTrackerQuoteHistory();
        $history->quote_id = $id;
        $history->field = $field;
        $history->old_value = $old;
        $history->new_value = $new;
        $history->created_time = $time;
        $history->created_by = $created_by;
        $history->save();
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
	 **/
	public function actionAdmin() {
        $settings = GlobalTrackerSettings::model()->findByPk(1);
		$model = new GlobalTrackerQuote('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GlobalTrackerQuote']))
			$model->attributes = $_GET['GlobalTrackerQuote'];
		$this->render('admin',array(
			'model' => $model,
            'settings' => $settings,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GlobalTrackerQuote the loaded model
	 * @throws CHttpException
	 **/
	public function loadModel($id) {
		$model = GlobalTrackerQuote::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GlobalTrackerQuote $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if(isset($_POST['ajax']) && $_POST['ajax']==='global-tracker-quote-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /*public function sendSmsToUserFollowup($model1) {
        $msgTxt = "Quote form followup submitted successfullly";
        $model = new DotTrackerSms();
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
        date_default_timezone_set('America/Los_Angeles');
        $to = $model->email;
        $subject =  "Quote Form Followup - Submitted on [Time:".date("m/d/Y H:i:s a").']';
        $txt = "Hi ,<br><br>Quote Form submitted. <br><br> Warm Regards<br>Support Team<br> www.globaltransportationsoftware.com";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: info@globalautotransportation.com" . "\r\n" ."CC: yxw165730@gmail.com". "\r\n";

        mail($to,$subject,$txt,$headers);
    }

    public function sendSaveEmailToUser($model) {
        date_default_timezone_set('America/Los_Angeles');
        //$to = 'globalautotransportation@gmail.com,prasanjeet.chakraborty@gmail.com,kunalnet123@gmail.com';
        $to = 'globalautotransportation@gmail.com';
        $subject = "Quote Form (Global Auto) - Signature Submitted [Time:".date("m/d/Y H:i:s a").']';
        $txt = "Hi Admin,<br><br>Signature submitted for Quote Form.<a href='http://globaltransportationsoftware.com/index.php?r=quoteForm/view&id=".$model->id."'>Click here</a> to view <br><br> Warm Regards<br>Support Team<br> Global Auto Transportation";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: info@globalautotransportation.com" . "\r\n";

        mail($to,$subject,$txt,$headers);
    }*/

    public function actionConvert() {
        $id=Yii::app()->request->getParam('id',0);
        $quote=GlobalTrackerQuote::model()->findByPk($id);
        //if(!sizeOf($quote))
        if($quote == null) {
            echo 'Error in Conversion'; die;
        }

        $order = new GlobalTrackerOrder();
        $order->attributes = $quote->attributes;
        $order->quote_id = $id;
        //$order->id='';

        if($order->validate()) {
            $order->save();


            //Get the changed value pairs
            date_default_timezone_set('America/Los_Angeles');
            $curTime = date("m/d/Y H:i:s a");

            foreach ($order as $name => $value) {
                if($name == 'vehicle_info') {
                    $obj = json_decode($value);
                    for($i=1; $i<=5; $i++) {
                        if($obj->{'Vehicle_tariff'.$i} != '') {
                            $this->insertHistoryO($order->id,'Vehicle_tariff'.$i,'none',$obj->{'Vehicle_tariff'.$i},$curTime,$order->created_by);
                        } 
                        if($obj->{'Vehicle_deposit'.$i} != '') {
                            $this->insertHistoryO($order->id,'Vehicle_deposit'.$i,'none',$obj->{'Vehicle_deposit'.$i},$curTime,$order->created_by);
                        }
                        if($obj->{'Vehicle_year'.$i} != '') {
                            $this->insertHistoryO($order->id,'Vehicle_year'.$i,'none',$obj->{'Vehicle_year'.$i},$curTime,$order->created_by);
                        }
                        if($obj->{'Vehicle_make'.$i} != '') {
                            $this->insertHistoryO($order->id,'Vehicle_make'.$i,'none',$obj->{'Vehicle_make'.$i},$curTime,$order->created_by);
                        }
                        if($obj->{'Vehicle_model'.$i} != '') {
                            $this->insertHistoryO($order->id,'Vehicle_model'.$i,'none',$obj->{'Vehicle_model'.$i},$curTime,$order->created_by);
                        }
                        if($obj->{'Vehicle_type'.$i} != '') {
                            $this->insertHistoryO($order->id,'Vehicle_type'.$i,'none',GlobalTrackerOrder::$enumbVehicleType[$obj->{'Vehicle_type'.$i}],$curTime,$order->created_by);
                        }
                    }
                } else {
                    $new = $value;
                    if($name == 's_vrun') {
                        $new = GlobalTrackerOrder::$arrVRun[$order->$name];
                    } else if($name == 's_via') {
                        $new = GlobalTrackerOrder::$enumShipVia[$order->$name];
                    } else if($name == 'referred_by') {
                        $new = GlobalTrackerOrder::$enumReferBy[$order->$name];
                    } else if($name == 'status') {
                        $new = GlobalTrackerOrder::$arrStatus[$order->$name];
                    } else if($name == 'save_as_default') {
                        $new = GlobalTrackerOrder::$arrSaveAsDefault[$order->$name];
                    }
                    $this->insertHistoryO($order->id,$name,'none',$new,$curTime,$order->created_by);
                }
            }


            //Added by Yan, to delete records from quotes which was converted to order
            $this->loadModel($id)->delete();
            DotTrackerQuoteHistory::model()->deleteAllByAttributes(['quote_id' => $quote->id]);

            $this->redirect(array('orderForm/update', 'id' => $order->id));
        } else {
            print_r($order->getErrors());
        }
    }

    public function actionCustomerConvert($id) {

    }

    /**
     * Jump to quote review page
     * Created by Yan.
     **/
    public function actionQuoteReview($id) {
        $quote = $this->loadModel($id);
        $model = new GlobalTrackerOrder();
        $model->attributes = $quote->attributes;
        $model->quote_id = $id;

        /*if(isset($_POST['GlobalTrackerOrder'])) {
            $model->attributes = $_POST['GlobalTrackerOrder'];
            if($model->validate()) {
                $model->save();

                //Get the changed value pairs
                /*date_default_timezone_set('America/Los_Angeles');
                $curTime = date("m/d/Y H:i:s a");

                foreach ($model as $name => $value) {
                    if($name == 'vehicle_info') {
                        $oldObj = json_decode($quote->$name);
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
                                $this->insertHistoryO($model->id, 'Vehicle_model'.$i,$oldObj->{'Vehicle_model'.$i}, $newObj->{'Vehicle_model'.$i}, $curTime, $model->created_by);
                            }
                            if($oldObj->{'Vehicle_type'.$i} != $newObj->{'Vehicle_type'.$i}) {
                                $this->insertHistoryO($model->id,'Vehicle_type'.$i,GlobalTrackerQuote::$enumbVehicleType[$oldObj->{'Vehicle_type'.$i}],GlobalTrackerQuote::$enumbVehicleType[$newObj->{'Vehicle_type'.$i}],$curTime,$model->created_by);
                            }
                            if($newObj->{'Vehicle_color'.$i} != '') {
                                $old = 'none';
                                $new = $newObj->{'Vehicle_color'.$i};
                                $this->insertHistoryO($model->id,'Vehicle_color'.$i,$old,$new,$curTime,$model->created_by);
                            }
                            if($newObj->{'Vehicle_plate'.$i} != '') {
                                $old = 'none';
                                $new = $newObj->{'Vehicle_plate'.$i};
                                $this->insertHistoryO($model->id,'Vehicle_plate'.$i,$old,$new,$curTime,$model->created_by);
                            }
                            if($newObj->{'Vehicle_deliveryState'.$i} != '') {
                                $old = 'none';
                                $new = $newObj->{'Vehicle_deliveryState'.$i};
                                $this->insertHistoryO($model->id,'Vehicle_deliveryState'.$i,$old,$new,$curTime,$model->created_by);
                            }
                            if($newObj->{'Vehicle_vin'.$i} != '') {
                                $old = 'none';
                                $new = $newObj->{'Vehicle_vin'.$i};
                                $this->insertHistoryO($model->id,'Vehicle_vin'.$i,$old,$new,$curTime,$model->created_by);
                            }
                            if($newObj->{'Vehicle_lot'.$i} != '') {
                                $old = 'none';
                                $new = $newObj->{'Vehicle_lot'.$i};
                                $this->insertHistoryO($model->id,'Vehicle_lot'.$i,$old,$new,$curTime,$model->created_by);
                            }
                        }
                    } else if($value != $quote->$name) {
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
                            $old = GlobalTrackerQuote::$arrVRun[$oldValues->$name];
                            $new = GlobalTrackerOrder::$arrVRun[$value];
                        } else if($name == 's_via') {
                            $old = GlobalTrackerQuote::$enumShipVia[$oldValues->$name];
                            $new = GlobalTrackerOrder::$enumShipVia[$value];
                        } else if($name == 'referred_by') {
                            $old = GlobalTrackerQuote::$enumReferBy[$oldValues->$name];
                            $new = GlobalTrackerOrder::$enumReferBy[$value];
                        } else if($name == 'status') {
                            $old = GlobalTrackerQuote::$arrStatus[$oldValues->$name];
                            $new = GlobalTrackerOrder::$arrStatus[$value];
                        }
                        $this->insertHistoryO($model->id,$name,$old,$new,$curTime,$model->created_by);
                    }
                }

                //$this->loadModel($id)->delete();
                //$this->redirect(array('orderForm/update', 'id' => $model->id));

            }
        }*/
        
        $this->render('initialQuote', array(
            'model' => $model,
        ));
    }

    /*public function actionAuthorizeSignature($id)
    {
        $this->render('authorize', array(
            'model' => $this->loadModel($id),
        ));
    }*/

    public function sendEmailToUser($CreditCardAuth) {
        date_default_timezone_set('America/Los_Angeles');
        $allAttr = $CreditCardAuth->attributes;
        $arr = GlobalTrackerQuote::model()->attributeLabels();
        $Template = DotTrackerEmailtemp::model()->findByPk(1);
        $templArr = $Template->attributes;
        $body = $templArr['emaildata'];
        $bodytxt = '';

        foreach ($arr as $index => $val) {
            if($index == 'vehicle_info') {
                $body = str_replace('[vehicle_info]',FilingGenerics::getVehicleInfoforMailQuote($CreditCardAuth->id),$body);
            }
            if($index == 's_via') {
                $body = str_replace('[s_via]',GlobalTrackerQuote::$enumShipVia[$allAttr['s_via']],$body);
            }
            if(array_key_exists($index,$allAttr)) {
                $body = str_replace('['.$index.']',$allAttr[$index],$body);
            }
        }
        $body = str_replace('[agent_phone]', FilingGenerics::getUserPhone($allAttr['created_by']), $body);
        $body = str_replace('[auth_link]', '<a href="http://globaltransportationsoftware.com/index.php?r=quoteForm/quoteReview&id='.$CreditCardAuth->id.'">Click here to review quote</a>', $body);
        $body = str_replace('[unsubscribe_link]', '<a href="http://globaltransportationsoftware.com/index.php?r=quoteForm/unsubscribe&id='.$CreditCardAuth->id.'">Click here to unsubscribe</a>', $body);

        $to = $CreditCardAuth->email;
        $subject =  "Quote Form - Submitted on [Time:".date("m/d/Y H:i:s a").']';
        $txt = $body;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: info@globalautotransportation.com" . "\r\n";
        mail($to,$subject,$txt,$headers);

        $adminEmail = FilingGenerics::getAuthEmail($CreditCardAuth->created_by);
        $to = $adminEmail;
        $subject =  "(Copy Email) Quote Form - Submitted on [Time:".date("m/d/Y H:i:s a").']';
        $txt = $body;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: info@globalautotransportation.com" . "\r\n";
        mail($to,$subject,$txt,$headers);
    }

    public function sendSmsToUser($CreditCardAuth) {
        $allAttr = $CreditCardAuth->attributes;
        $arr = GlobalTrackerQuote::model()->attributeLabels();
        $Template = DotTrackerEmailtemp::model()->findByPk(2);
        $templArr = $Template->attributes;
        $body = $templArr['emaildata'];
        $bodytxt = '';

        foreach ($arr as $index => $val) {
            if($index == 'vehicle_info') {
                $body = str_replace('[vehicle_info]',FilingGenerics::getVehicleInfoforMailQuote($CreditCardAuth->id), $body);
            }
            if($index == 's_via') {
                $body = str_replace('[s_via]',GlobalTrackerQuote::$enumShipVia[$allAttr['s_via']], $body);
            }
            $body = str_replace('&nbsp;', ' ', $body);
            $body = strip_tags($body);
            if(array_key_exists($index, $allAttr))
                $body = str_replace('['.$index.']', $allAttr[$index], $body);
        }
        $body = str_replace('[agent_phone]', FilingGenerics::getUserPhone($allAttr['created_by']), $body);
        $body = str_replace('[unsubscribe_link]', 'http://globaltransportationsoftware.com/index.php?r=quoteForm/unsubscribe&id='.$allAttr['id'], $body);

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

        $CreditCardAuth=GlobalTrackerQuote::model()->findByPk($id);

        if(!$CreditCardAuth) {
            throw new CHttpException(400,'Quote cannot be found!');
        }

        $imagedata = base64_decode($imgData);
        $filename = md5(uniqid(rand(), true));

        //$file = '/C:/MAMP/htdocs/global-software1/uploadsign/'.$filename.'.png';
        $file = '/home/yxw165730/public_html/uploadsign/'.$filename.'.png';
        if(file_put_contents($file,$imagedata)) {
            $CreditCardAuth->extra4='uploadsign/'.$filename.'.png';
            $CreditCardAuth->save();
            $this->sendSaveEmailToUser($CreditCardAuth);
        }
    }
}
