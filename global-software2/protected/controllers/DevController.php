<?php

class DevController extends Controller
{
	public function actionTest()
	{
	   $Users=DotTrackerUser::model()->findAll();
	   echo '<pre>';print_r($Users);


	    die;

	    $id=163;
	    $Quote=DotTrackerQuote::model()->findByPk($id);
	    $allAttr=$Quote->attributes;
	    $template=1;
        $arr=DotTrackerQuote::model()->attributeLabels();

        $Template=DotTrackerEmailtemp::model()->findByPk($template);
        $templArr=$Template->attributes;

        $body=$templArr['emaildata'];

        //echo $body;



       foreach ($arr as $index=>$val)
       {
           $body=str_replace('['.$index.']',$allAttr[$index],$body);
           echo $index.'=>'.$allAttr[$index].'<br>';


       }

       echo $body;




	}


	public function actionView()
    {
        $this->render('view');
    }

    public function actionView1()
    {
        $this->render('view1');
    }

    public function actionView2()
    {
        $this->render('view2');
    }
    public function actionView3()
    {
        $this->render('view');
    }

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