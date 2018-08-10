<?php
/* @var $this AccountController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Global Tracker Shippers',
);

$this->menu=array(
	array('label'=>'Create GlobalTrackerShipper', 'url'=>array('create')),
	array('label'=>'Manage GlobalTrackerShipper', 'url'=>array('admin')),
);
?>

<h1>Global Tracker Shippers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
