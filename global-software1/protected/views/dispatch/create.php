<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerDispatch */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List GlobalTrackerDispatch', 'url'=>array('index')),
	array('label'=>'Manage GlobalTrackerDispatch', 'url'=>array('admin')),
);*/
?>

<h1>Create Order</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>