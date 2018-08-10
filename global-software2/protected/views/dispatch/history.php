<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerDispatch */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

?>
<br/>
<div class="col-md-12">
	<ul class="nav nav-tabs">
	    <li><a href="?r=dispatch/view&id=<?php echo $model->id; ?>">Order Detail</a></li>
	    <li><a href="?r=dispatch/update&id=<?php echo $model->id; ?>">Edit Order</a></li>
	    <li class="active"><a href="?r=dispatch/history&id=<?php echo $model->id; ?>">Order History</a></li>
	    <li><a href="?r=dispatch/payment&id=<?php echo $model->id; ?>">Payments</a></li>
        <?php if(!empty($model->dispatched_time)) { ?>
            <li><a href="?r=dispatch/dispatchSheet&id=<?php echo $model->id; ?>">Dispatch Sheet</a></li>
        <?php } ?>
	</ul>

	<h3 style="color: blue;">Order <?php echo $model->id; ?> History</h3>

	<?php echo FilingGenerics::displayOHistory($model->id); ?>
</div>