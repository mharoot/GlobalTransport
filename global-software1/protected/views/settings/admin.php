<?php
/* @var $this SettingsController */

$this->breadcrumbs=array(
	'Settings',
);
?>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'global-tracker-settings-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->errorSummary($model); ?>

<h2>Settings</h2>
<p>Customize your account using the options below. Use the tabs above to access Account Info, Automated Quoting, External Forms and Automated Emails.</p>

<div class="col-md-7">
	<div class="panel panel-default">
		<div class="panel-heading">
			<label style="color: green; font-size: 20px;">Default Settings</label><br>
			<label>Enter new value and click the "Update Default Values" button.</label>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-6"><label>Order deposit required:</label></div>
                		<div class="col-md-6"><?php echo $form->textField($model,'deposit',array('size'=>'6')); ?></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-6"><label>First quote follow-up:</label></div>
                		<div class="col-md-2"><?php echo $form->textField($model,'first_followup',array('size'=>'4')); ?></div>
                		<div class="col-md-4"><label>days since quoted</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-6"><label>Mark quote as expired:</label></div>
                		<div class="col-md-2"><?php echo $form->textField($model,'quote_expired',array('size'=>'4')); ?></div>
                		<div class="col-md-4"><label>days since quoted</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-6"><label>Mark as assumed delivered:</label></div>
                		<div class="col-md-2"><?php echo $form->textField($model,'assumed_delivered',array('size'=>'4')); ?></div>
                		<div class="col-md-4"><label>days since est. delivery</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-6"><label>Assign unverified orders to:</label></div>
                		<div class="col-md-6">
                                        <?php echo $form->dropDownList($model,'assign_unverified_to',array(
                                                ''=>'No specific user',
                                                'Helen'=>'Helen',
                                                'John'=>'John',
                                                'Rick R.'=>'Rick R.',
                                                'Tony'=>'Tony')); 
                                        ?>
				</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-6"><label>Carrier Pmt. Terms:</label></div>
                		<div class="col-md-6">
                                        <?php echo $form->dropDownList($model,'carrier_pmt_term',array(
                                                ''=>'Select',
                                                'immediately'=>'immediately',
                                                '2 business days (Quick Pay)'=>'2 business days (Quick Pay)',
                                                '5 business days'=>'5 business days',
                                                '10 business days'=>'10 business days',
                                                '15 business days'=>'15 business days',
                                                '30 business days'=>'30 business days')); 
                                        ?>
				</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-6"><label>Carrier Pmt. Terms Begin:</label></div>
                		<div class="col-md-6">
                                        <?php echo $form->dropDownList($model,'carrier_pmt_term_begin',array(
                                                'pickup'=>'pickup',
                                                'delivery'=>'delivery',
                                                'receiving a signed Bill of Lading'=>'receiving a signed Bill of Lading')); 
                                        ?>
				</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 15px;">
                	<div class="col-md-12">
                		<div class="col-md-6"><label>Carrier Pmt. Method:</label></div>
                		<div class="col-md-6">
                                        <?php echo $form->dropDownList($model,'carrier_pmt_method',array(
                                                'Cash'=>'Cash',
                                                'Certified Funds'=>'Certified Funds',
                                                'Company Check'=>'Company Check',
                                                'Comchek'=>'Comchek',
                                                'TCH'=>'TCH')); 
                                        ?>
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                	<div class="col-md-12">
                		<div class="col-md-1"><input type="checkbox" name=""></div>
                		<div class="col-md-11"><label>Show vehicle pricing information when dispatching<br/>
                		Check this option if you don't charge a deposit until an order is dispatched.</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                	<div class="col-md-12">
                		<div class="col-md-1"><input type="checkbox" name=""></div>
                		<div class="col-md-11"><label>Show external "New Order" button on Place Order page<br/>
						Check this option to display the "New Order" button on the external Place Order page.</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 20px;">
                	<div class="col-md-12">
                		<div class="col-md-1"><input type="checkbox" name=""></div>
                		<div class="col-md-11"><label>Allow to replace the COD amount with lower Carrier Pay<br/>
						Check this option if you want to use Carrier Pay instead of COD if COD exceeds Carrier Pay when posting to CD.</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 20px;">
                	<div class="col-md-12" style="padding-bottom: 5px">
                		<div class="col-md-12"><label>Send a blind carbon copy of outgoing e-mail to:</label></div>
                	</div>
                	<div class="col-md-12">
                		<div class="col-md-12"><input type="email" name=""></label></div>
                	</div>
                	<div class="col-md-12">
                		<div class="col-md-12"><label>Enter email address(es) which should receive a copy of all outgoing email.<br>Separate multiple addresses with commas.</label></div>
                	</div>
                </div>
                <div style="float: right">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('id'=>'subBtn','style'=>'', 'name' => 'but1','class'=>'btn btn-success')); ?>
                        <!-- <input type="button" name="" value="Update Default Values"> -->
                </div>
			</fieldset>
		</div>
	</div>
</div>

<div class="col-md-5" style="float: left">
	<div class="panel panel-default">
		<div class="panel-heading">
			<label style="color: green; font-size: 20px;">Credit Card Gateway</label>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-8">
                		<label>View/edit your credit card payment gateway: </label>
                	</div>
                	<div class="col-md-4">
                		<input type="button" name="" value="CC Gateway">
                	</div>
                </div>
			</fieldset>
		</div>
	</div>
</div>

<div class="col-md-5" style="float: left">
	<div class="panel panel-default">
		<div class="panel-heading">
			<label style="color: green; font-size: 20px;">Order Terms</label>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="row" style="padding-bottom: 5px;">
                	               <div class="col-md-12">
                		              <label>Enter order terms below.</label>
                	               </div>
                                </div>
                                <?php echo $form->textArea($model,'order_term'); ?>
                                <!-- <textarea rows="4"></textarea> -->
                                <div style="float: right; padding-top: 10px;">
                                        <!-- <input type="button" value="Update Order Terms" name=""> -->
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('id'=>'subBtn','style'=>'', 'name' => 'but1','class'=>'btn btn-success')); ?>
                                </div>
			</fieldset>
		</div>
	</div>
</div>

<div class="col-md-5" style="float: right">
	<div class="panel panel-default">
		<div class="panel-heading">
			<label style="color: green; font-size: 20px;">Dispatch Terms</label>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="row" style="padding-bottom: 5px;">
                                	<div class="col-md-12">
                                		<label>Enter dispatch terms below.</label>
                                	</div>
                                </div>
                                <?php echo $form->textArea($model,'dispatch_term'); ?>
                                <!-- <textarea rows="10">
                                        **VEHICLE MILEAGE MUST BE NOTED ON THE BILL OF LADING!** NO EXCEPTIONS<br/><br/>
                                	CARRIERS AGREE TO CALL THE CLIENT UPON RECEIPT OF THE DISPATCH SHEET AND ASSURE THE CLIENT THEIR TRANSPORTATION WILL BE TAKEN CARE OF IN A PROFESSIONAL MANNER WITH EXCELLENT COMMUNICATION.<br/><br/>
                                	FAILURE to do this may result in the cancellation of the dispatch by AmPm Auto Transport.<br/><br/>
                                	1. Please call client in advance of pick up and delivery with enough notice so they are informed and know of your arrival.
                                	2. For NON-COD orders, please fax or email the BILL OF LADING upon delivery to fax# 747-477-1186.<br/><br/>
                                	3. For COD orders, AmPm Auto Transport takes no responsibility for stopped or bounced checks by customer. Carrier has the right to require payment in cash or cashier's check upon delivery to avoid payment issues. Carrier has the right to refuse delivery of vehicle at any time if COD payment is not presented.<br/><br/>
                                	4. Please post as picked up on central when car is picked up and post as delivered when car is delivered. We will give you a rating on Central Dispatch.<br/><br/>
                                	5. If your truck is going to be late please call client at both pick up and delivery to inform them of delay immediately. Please inform AmPm Auto Transport of any problems or delays.<br/><br/>
                                	6. If you are running 2 or more days late and there is NO COMMUNICATION with AmPm Auto Transport and CLIENTS at both pick up and delivery, AmPm Auto Transport reserves the right to cancel the job.<br/><br/>
                                	7. If you have any questions please call us at anytime. We are glad to help you in any situation.<br/><br/>
                                	8. DETAILED BILL OF LADING MUST BE SIGNED BY THE CUSTOMER AT PICK UP AND DELIVERY. MILEAGE MUST BE NOTED ON PICK UP AND DELIVERY. UNDER NO CIRCUMSTANCES IS THE CUSTOMERS VEHICLE TO BE DRIVEN ANYWHERE.<br/><br/>
                                </textarea> -->
                                <div style="float: right; padding-top: 10px;">
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('id'=>'subBtn','style'=>'', 'name' => 'but1','class'=>'btn btn-success')); ?>
                                        <!-- <input type="button" value="Update Dispatch Terms" name=""> -->
                                </div>
			</fieldset>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>