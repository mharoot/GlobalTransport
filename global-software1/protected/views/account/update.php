<?php
/* @var $this AccountController */
/* @var $model GlobalTrackerShipper */

$this->breadcrumbs=array(
    GlobalTrackerShipper::$enumType[$_GET['type']]=>array('admin&type='.$_GET['type']),
	$model->id=>array('view','id'=>$model->id,'type'=>$_GET['type'] ),
	'Update',
);


?>

<h1>Update <?php echo GlobalTrackerShipper::$enumTypeSngle[$_GET['type']];?> <?php echo $model->company_name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>