<?php
/* @var $this AccountController */
/* @var $model GlobalTrackerShipper */

$this->breadcrumbs=array(
    GlobalTrackerShipper::$enumType[$_GET['type']]=>array('admin&type='.$_GET['type']),
	'Create',
);


?>

<h1>Create <?php echo GlobalTrackerShipper::$enumTypeSngle[$_GET['type']];?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>