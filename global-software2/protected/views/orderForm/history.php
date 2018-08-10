<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerOrder */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

?>
<br/>
<div class="col-md-12">
	<ul class="nav nav-tabs">
	    <li><a href="?r=orderForm/view&id=<?php echo $model->id; ?>">Order Detail</a></li>
	    <li><a href="?r=orderForm/update&id=<?php echo $model->id; ?>">Edit Order</a></li>
	    <li class="active"><a href="?r=orderForm/history&id=<?php echo $model->id; ?>">Order History</a></li>
	    <li><a href="?r=orderForm/payment&id=<?php echo $model->id; ?>">Payments</a></li>
        <?php if(!empty($model->dispatched_time)) { ?>
            <li><a href="?r=orderForm/dispatchSheet&id=<?php echo $model->id; ?>">Dispatch Sheet</a></li>
        <?php } ?>
	</ul>

	<h3 style="color: blue;">Order <?php echo $model->id; ?> History</h3>

	<?php echo FilingGenerics::displayOHistory($model->id); ?>
</div>