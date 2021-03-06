<?php

class SettingsController extends Controller {

	public function actionIndex() {
		$id = 1;
		$this->actionAdmin($id);
	}

	public function actionAdmin($id) {
		$model = $this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['GlobalTrackerSettings'])) {
			$model->attributes = $_POST['GlobalTrackerSettings'];
			if($model->save()) {
            	//$this->render('admin', array('model'=>$model));
            	$this->redirect(array('admin', 'id'=>$id));
            }
		}

		$this->render('admin', array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GlobalTrackerSettings the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = GlobalTrackerSettings::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	/*public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GlobalTrackerSettings']))
		{
			$model->attributes = $_POST['GlobalTrackerSettings'];
			if($model->save()) {
            	$this->render('index');
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}*/

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}