<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerOrder */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List GlobalTrackerOrder', 'url'=>array('index')),
	array('label'=>'Manage GlobalTrackerOrder', 'url'=>array('admin')),
);*/
?>

<h1>Create Order</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>