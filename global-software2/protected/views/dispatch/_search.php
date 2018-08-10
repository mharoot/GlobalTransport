<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerDispatch */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shipper_name'); ?>
		<?php echo $form->textArea($model,'shipper_name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fname'); ?>
		<?php echo $form->textArea($model,'fname',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lname'); ?>
		<?php echo $form->textArea($model,'lname',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company'); ?>
		<?php echo $form->textArea($model,'company',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textArea($model,'email',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone1'); ?>
		<?php echo $form->textArea($model,'phone1',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone2'); ?>
		<?php echo $form->textArea($model,'phone2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobile'); ?>
		<?php echo $form->textArea($model,'mobile',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax'); ?>
		<?php echo $form->textArea($model,'fax',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address1'); ?>
		<?php echo $form->textArea($model,'address1',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address2'); ?>
		<?php echo $form->textArea($model,'address2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textArea($model,'city',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textArea($model,'state',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip'); ?>
		<?php echo $form->textArea($model,'zip',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sel_contact'); ?>
		<?php echo $form->textArea($model,'sel_contact',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sel_location'); ?>
		<?php echo $form->textArea($model,'sel_location',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_address1'); ?>
		<?php echo $form->textArea($model,'p_address1',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_address2'); ?>
		<?php echo $form->textArea($model,'p_address2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_city'); ?>
		<?php echo $form->textArea($model,'p_city',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_state'); ?>
		<?php echo $form->textArea($model,'p_state',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_zip'); ?>
		<?php echo $form->textArea($model,'p_zip',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_contactname'); ?>
		<?php echo $form->textArea($model,'p_contactname',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_companyname'); ?>
		<?php echo $form->textArea($model,'p_companyname',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_buyernumber'); ?>
		<?php echo $form->textArea($model,'p_buyernumber',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_phone1'); ?>
		<?php echo $form->textArea($model,'p_phone1',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_phone2'); ?>
		<?php echo $form->textArea($model,'p_phone2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_mobile'); ?>
		<?php echo $form->textArea($model,'p_mobile',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_date'); ?>
		<?php echo $form->textArea($model,'s_date',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_vrun'); ?>
		<?php echo $form->textArea($model,'s_vrun',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_via'); ?>
		<?php echo $form->textArea($model,'s_via',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'info_forShipper'); ?>
		<?php echo $form->textArea($model,'info_forShipper',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes_shipper'); ?>
		<?php echo $form->textArea($model,'notes_shipper',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicle_info'); ?>
		<?php echo $form->textArea($model,'vehicle_info',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carrier_pay'); ?>
		<?php echo $form->textArea($model,'carrier_pay',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bal_paid_by'); ?>
		<?php echo $form->textArea($model,'bal_paid_by',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pickup_terminal_fee'); ?>
		<?php echo $form->textArea($model,'pickup_terminal_fee',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_terminal_fee'); ?>
		<?php echo $form->textArea($model,'delivery_terminal_fee',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referred_by'); ?>
		<?php echo $form->textArea($model,'referred_by',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_phone3'); ?>
		<?php echo $form->textArea($model,'p_phone3',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'extra'); ?>
		<?php echo $form->textArea($model,'extra',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'extra2'); ?>
		<?php echo $form->textArea($model,'extra2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'extra3'); ?>
		<?php echo $form->textArea($model,'extra3',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'extra4'); ?>
		<?php echo $form->textArea($model,'extra4',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'extra5'); ?>
		<?php echo $form->textArea($model,'extra5',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'extra6'); ?>
		<?php echo $form->textArea($model,'extra6',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textArea($model,'created_by',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creationdatetime'); ?>
		<?php echo $form->textField($model,'creationdatetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->