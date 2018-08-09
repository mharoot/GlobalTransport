<?php
/* @var $this QuoteFormController */
/* @var $model GlobalTrackerQuote */

$this->breadcrumbs=array(
	'Quotes'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List GlobalTrackerQuote', 'url'=>array('index')),
	array('label'=>'Manage GlobalTrackerQuote', 'url'=>array('admin')),
);*/
?>

<h1>Create Quote</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'settings'=>$settings)); ?>