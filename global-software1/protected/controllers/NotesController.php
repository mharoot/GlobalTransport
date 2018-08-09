<?php

class NotesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','updateAjax'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function insertHistory($id, $field, $old, $new, $created_by) {
		date_default_timezone_set('America/Los_Angeles');
        $curTime = date("Y-m-d H:i:s");

        $history = new DotTrackerQuoteHistory();
        $history->quote_id = $id;
        $history->field = $field;
        $history->old_value = $old;
        $history->new_value = $new;
        $history->created_time = $curTime;
        $history->created_by = $created_by;
        $history->save();
    }

    public function actionUpdateAjax()
    {
        $success = false;
        $msg = '';
        $id = '';
        $html = '';
        if(empty($_POST)) {
            $success = false;
            $msg = 'Illegal Request';
        }
        else {
            $notes = new DotTrackerNotes();
            $notes->quote_id = $_POST['quote_id'];
            $notes->created_by = Yii::app()->user->id;
            date_default_timezone_set('America/Los_Angeles');
            $notes->date = date("m/d/Y H:i:s a");
            $notes->note = $_POST['note'];

            if($notes->validate()) {
                $notes->save();
                $success = true;
                $msg = '<i class="fa fa-check"></i> Note has been added successfully';
                $html = '<tr><td>'.$notes->date.'</td><td>'.$notes->note.'</td><td>'.$notes->created_by.'</td></tr>';
                $this->insertHistory($notes->quote_id, 'Status', 'none', $notes->note, $notes->created_by);
            } else {
                $success = false;
                $msg = '<i class="fa fa-close"></i> Please enter notes before proceeding';
            }
        }
        echo json_encode(array('success'=>$success,'msg'=>$msg,'id'=>$id,'html'=>$html));
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new DotTrackerNotes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DotTrackerNotes']))
		{
			$model->attributes=$_POST['DotTrackerNotes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DotTrackerNotes']))
		{
			$model->attributes=$_POST['DotTrackerNotes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('DotTrackerNotes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DotTrackerNotes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DotTrackerNotes']))
			$model->attributes=$_GET['DotTrackerNotes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DotTrackerNotes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DotTrackerNotes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DotTrackerNotes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dot-tracker-notes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
