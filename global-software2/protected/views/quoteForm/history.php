<?php
/* @var $this QuoteFormController */
/* @var $model GlobalTrackerQuote */

$this->breadcrumbs=array(
	'Quotes'=>array('index'),
	$model->id,
);

?>
<br/>
<div class="col-md-12">
	<ul class="nav nav-tabs">
	    <li><a href="?r=quoteForm/view&id=<?php echo $model->id; ?>">Quote Detail</a></li>
	    <li><a href="?r=quoteForm/update&id=<?php echo $model->id; ?>">Edit Quote</a></li>
	    <li class="active"><a href="?r=quoteForm/history&id=<?php echo $model->id; ?>">Quote History</a></li>
	</ul>

	<h3 style="color: blue;">Quote <?php echo $model->id; ?> History</h3>

	
	<?php echo FilingGenerics::displayQHistory($model->id); ?>
</div>