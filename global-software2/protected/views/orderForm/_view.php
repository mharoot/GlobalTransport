<?php
/* @var $this OrderFormController */
/* @var $data GlobalTrackerOrder */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shipper_name')); ?>:</b>
	<?php echo CHtml::encode($data->shipper_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fname')); ?>:</b>
	<?php echo CHtml::encode($data->fname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lname')); ?>:</b>
	<?php echo CHtml::encode($data->lname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company')); ?>:</b>
	<?php echo CHtml::encode($data->company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone1')); ?>:</b>
	<?php echo CHtml::encode($data->phone1); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone2')); ?>:</b>
	<?php echo CHtml::encode($data->phone2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
	<?php echo CHtml::encode($data->mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address1')); ?>:</b>
	<?php echo CHtml::encode($data->address1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address2')); ?>:</b>
	<?php echo CHtml::encode($data->address2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo CHtml::encode($data->zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sel_contact')); ?>:</b>
	<?php echo CHtml::encode($data->sel_contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sel_location')); ?>:</b>
	<?php echo CHtml::encode($data->sel_location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_address1')); ?>:</b>
	<?php echo CHtml::encode($data->p_address1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_address2')); ?>:</b>
	<?php echo CHtml::encode($data->p_address2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_city')); ?>:</b>
	<?php echo CHtml::encode($data->p_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_state')); ?>:</b>
	<?php echo CHtml::encode($data->p_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_zip')); ?>:</b>
	<?php echo CHtml::encode($data->p_zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_contactname')); ?>:</b>
	<?php echo CHtml::encode($data->p_contactname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_companyname')); ?>:</b>
	<?php echo CHtml::encode($data->p_companyname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_buyernumber')); ?>:</b>
	<?php echo CHtml::encode($data->p_buyernumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_phone1')); ?>:</b>
	<?php echo CHtml::encode($data->p_phone1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_phone2')); ?>:</b>
	<?php echo CHtml::encode($data->p_phone2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->p_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_date')); ?>:</b>
	<?php echo CHtml::encode($data->s_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_vrun')); ?>:</b>
	<?php echo CHtml::encode($data->s_vrun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_via')); ?>:</b>
	<?php echo CHtml::encode($data->s_via); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('info_forShipper')); ?>:</b>
	<?php echo CHtml::encode($data->info_forShipper); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes_shipper')); ?>:</b>
	<?php echo CHtml::encode($data->notes_shipper); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_info')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carrier_pay')); ?>:</b>
	<?php echo CHtml::encode($data->carrier_pay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bal_paid_by')); ?>:</b>
	<?php echo CHtml::encode($data->bal_paid_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pickup_terminal_fee')); ?>:</b>
	<?php echo CHtml::encode($data->pickup_terminal_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_terminal_fee')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_terminal_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referred_by')); ?>:</b>
	<?php echo CHtml::encode($data->referred_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_phone3')); ?>:</b>
	<?php echo CHtml::encode($data->p_phone3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('extra')); ?>:</b>
	<?php echo CHtml::encode($data->extra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('extra2')); ?>:</b>
	<?php echo CHtml::encode($data->extra2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('extra3')); ?>:</b>
	<?php echo CHtml::encode($data->extra3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('extra4')); ?>:</b>
	<?php echo CHtml::encode($data->extra4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('extra5')); ?>:</b>
	<?php echo CHtml::encode($data->extra5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('extra6')); ?>:</b>
	<?php echo CHtml::encode($data->extra6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creationdatetime')); ?>:</b>
	<?php echo CHtml::encode($data->creationdatetime); ?>
	<br />

	*/ ?>

</div>