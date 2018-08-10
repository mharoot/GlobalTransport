<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerDispatch */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

?>

<ul class="nav nav-tabs">
    <li><a href="?r=dispatch/view&id=<?php echo $model->id; ?>">Order Detail</a></li>
    <li><a href="?r=dispatch/update&id=<?php echo $model->id; ?>">Edit Order</a></li>
    <li><a href="?r=dispatch/history&id=<?php echo $model->id; ?>">Order History</a></li>
    <li class="active"><a href="?r=dispatch/payment&id=<?php echo $model->id; ?>">Payments</a></li>
    <?php if(!empty($model->dispatched_time)) { ?>
        <li><a href="?r=dispatch/dispatchSheet&id=<?php echo $model->id; ?>">Dispatch Sheet</a></li>
    <?php } ?>
</ul>

<div class="form">
	<h3 style="color:blue;">Order <?php echo $model->id ?>-OD Payments</h3>
	<p>Use "Record internally" option to record that a payment was received for this order for bookkeeping purposes.</p>
	<p>Use "Process through gateway" option to send a given amount to Authorize.net, where you may enter the credit card information.</p>
	<p>The payment will appear in jTracker once it's processed by the gateway.</p>

	<div class="row">
		<div class="col-sm-12">
			<input id="payment_type1" type="radio" name="payment_type" checked/>&nbsp;<label>Record internally</label>
			<input style="margin-left: 50px;" id="payment_type2" type="radio" name="payment_type"/>&nbsp;<label>Process through gateway</label>
		</div>
	</div><br>

	<?php 
		$form1 = $this->beginWidget('CActiveForm', array(
			'id'=>'dot-tracker-payment1-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
		)); 
	?>
	<div class="panel panel-default" id="payment1">
        <div class="panel-heading">Payment</div>
        <div class="panel-body">
            <fieldset>
                <div class="row">
                	<div class="col-sm-6">
                		<div class="col-sm-12" style="margin-bottom:10px;">
	                        <div class="col-sm-4" style="text-align:right;"><label>Date Received <span style="color: red">*</span></label></div>
	                        <div class="col-sm-6"><?php echo $form1->dateField($payment1,'date_received'); ?></div>
	                    </div>
	                    <div class="col-sm-12" style="margin-bottom:10px;">
	                        <div class="col-sm-4" style="text-align:right;"><label>Payment From/To <span style="color: red">*</span></label></div>
	                        <div class="col-sm-6">
	                        	<div style="display:none;"><?php echo $form1->textField($payment1,'payment_from_to'); ?></div>
	                        	<select name="payment_from_to" id="payment_from_to">
									<option value="">- Select one -</option>
									<option value="Shipper to Company">Shipper to Company</option>
									<option value="Company to Carrier">Company to Carrier</option>
									<option value="Company to Pickup Terminal">Company to Pickup Terminal</option>
									<option value="Company to Delivery Terminal">Company to Delivery Terminal</option>
									<option value="Company to Shipper">Company to Shipper</option>
									<option value="Carrier to Company">Carrier to Company</option>
								</select>
		                    </div>
	                    </div>
	                    <div class="col-sm-12" style="margin-bottom:10px;">
		                    <div class="col-sm-4" style="text-align:right;"><label>Amount <span style="color: red">*</span></label></div>
	                        <div class="col-sm-6">
	                        	$ <?php echo $form1->textField($payment1,'amount', array('size'=>'10')); ?>
		                    </div>
		                </div>
		                <div class="col-sm-12" style="margin-bottom:10px;">
		                    <div class="col-sm-4" style="text-align:right;"><label>Notes </label></div>
	                        <div class="col-sm-6">
	                        	<?php echo $form1->textArea($payment1,'notes',array('class'=>'form-control')); ?>
		                    </div>
		                </div>

	                    <div class="row" id="emailPayment" style="display:none;">
		                    <div class="col-sm-12" style="margin-left:200px;">
		                    	<input id="send_email_to_shipper" type="checkbox" name="">&nbsp;
		                    	<label>Email payment to shipper</label>
		                    </div>
		                    <div class="col-sm-12" style="margin-left:200px;">
		                    	<input id="attach_order_receipt" type="checkbox" name="" disabled="true">&nbsp;
		                    	<label>Attach order receipt</label>
		                    </div>
	                    </div>
                    </div>

                    <div class="col-sm-6" style="margin-bottom:10px;">
                    	<div class="col-sm-12" style="margin-bottom:10px;">
                    		<div class="col-sm-4" style="text-align:right;"><label>Method </label></div>
                        	<div style="display:none;"><?php echo $form1->textField($payment1,'method');?></div>
                        	<div class="col-sm-8">
	                        	<select name="method" id="method">
									<option value="">- Select one -</option>
									<option value="Credit card">Credit card</option>
									<option value="Personal check">Personal check</option>
									<option value="Cashiers check">Cashiers check</option>
									<option value="Money order">Money order</option>
									<option value="Company check">Company check</option>
									<option value="Comcheck">Comcheck</option>
									<option value="Other">Other</option>
								</select>
                        	</div>
	                    </div>

	                    <div id="credit_card" style="display:none;">
		                    <div class="col-sm-12" style="margin-bottom:10px;">
		                    	<div class="col-sm-4" style="text-align:right;">
		                    		<label>CC#(last 4 digits) </label>
		                    	</div>
	                    		<div class="col-sm-8">
	                    			<?php echo $form1->textField($payment1,'cc', array('size'=>'5')); ?>
	                    		</div>
	                    	</div>
	                    	<div class="col-sm-12" style="margin-bottom:10px;">
	                    		<div class="col-sm-4" style="text-align:right;">
		                    		<label>Credit Card Type </label>
		                    	</div>
		                    	<div class="col-sm-8">
		                    		<?php echo $form1->dropdownList($payment1,'credit_card_type', array(
	                    				''=>'- Select One -',
	                    				'Visa'=>'Visa',
	                    				'Mastercard'=>'Mastercard',
	                    				'AMEX'=>'AMEX',
	                    				'Discover'=>'Discover',
	                    				'Other'=>'Other')); ?>
	                    			<label>Other: </label>
	                    			<?php echo $form1->textField($payment1,'other', array('size'=>'15')); ?>
	                    		</div>
	                    	</div>
	                    	<div class="col-sm-12" style="margin-bottom:10px;">
	                    		<div style="display:none;"><?php echo $form1->textField($payment1,'expiration_date',array('size'=>'5'));?></div>
		                    	<div class="col-sm-4" style="text-align:right;">
		                    		<label>Expiration Date </label>
		                    	</div>
	                    		<div class="col-sm-8">
	                    			<select name="expire_month" id="expire_month">
										<option value="">- Select month -</option>
										<option value="01">January</option>
										<option value="02">February</option>
										<option value="03">March</option>
										<option value="04">April</option>
										<option value="05">May</option>
										<option value="06">June</option>
										<option value="07">July</option>
										<option value="08">August</option>
										<option value="09">September</option>
										<option value="10">October</option>
										<option value="11">November</option>
										<option value="12">December</option>
									</select>
									<select name="expire_year" id="expire_year">
										<option value="">- Select year -</option>
									</select>
	                    		</div>
	                    	</div>
	                    	<div class="col-sm-12" style="margin-bottom:10px;">
		                    	<div class="col-sm-4" style="text-align:right;">
		                    		<label>Authorizaion Code </label>
		                    	</div>
	                    		<div class="col-sm-8">
	                    			<?php echo $form1->textField($payment1,'authorization_code', array('size'=>'20')); ?>
	                    		</div>
	                    	</div>
	                    </div>

	                    <div id="check" style="display:none;">
	                    	<div class="col-sm-12" style="margin-bottom:10px;">
		                    	<div class="col-sm-4" style="text-align:right;">
		                    		<label>Check Number </label>
		                    	</div>
	                    		<div class="col-sm-8">
	                    			<?php echo $form1->textField($payment1,'check_number', array('size'=>'20'));?>
	                    		</div>
	                    	</div>
	                    </div>

                        <div class="col-sm-12" style="margin-bottom:10px;">
                        	<div class="col-sm-4" style="text-align:right;">
                        		<label>Transaction ID </label>
                        	</div>
	                        <div class="col-sm-8">
	                        	<?php echo $form1->textField($payment1,'transaction_id', array('size'=>'20')); ?>
	                        </div>
	                    </div>
                    </div>
                </div>

                <div style="float: right; margin-right: 50px;">
                	<?php echo CHtml::submitButton($payment1->isNewRecord ? 'Process Payment' : 'Process Payment',array('id'=>'subBtn1','name' => 'but1','class'=>'btn btn-success')); ?>
                </div>
            </fieldset>
        </div>
    </div>
    <?php $this->endWidget(); ?>

    <?php 
		$form2 = $this->beginWidget('CActiveForm', array(
			'id' => 'dot-tracker-payment2-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation' => false,
	)); ?>
    <div class="panel panel-default" id="payment2" style="display: none;">
        <div class="panel-heading">Payment</div>
        <div class="panel-body">
            <fieldset>
            	<?php //$form2=$this->beginWidget('CActiveForm', array(
					//id'=>'global-tracker-payment2-form',
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					//'enableAjaxValidation'=>false,
				//)); ?>
                <div class="row">
                	<div class="col-sm-12" style="margin-bottom:10px;">
                        <label style="margin-left: 100px;">Amount <span style="color: red">*</span></label>
                        &nbsp;
						<input type="radio" id="deposit_type" name="amount_type" value="0">
						<div style="display:none;"><?php echo $form2->textField($payment2,'deposit'); ?></div>
						&nbsp;
                        <label>Deposit: </label>
                        <label>$ <?php echo $model->extra6; ?></label>
                    </div>
                    <div class="col-sm-12" style="margin-bottom:10px;">
						<input style="margin-left: 164px;" type="radio" id="bal_due_type" name="amount_type" value="1">
						<div style="display:none;"><?php echo $form2->textField($payment2,'bal_due'); ?></div>
						&nbsp;
                        <label>Balance Due: </label>
                        <label>$ <?php echo $model->extra5; ?></label>
                    </div>
                    <div class="col-sm-12" style="margin-bottom:10px;">
						<input style="margin-left: 164px;" type="radio" id="other_type" name="amount_type" value="2">
						&nbsp;
                        <label>Other: </label>
                        <label>$ <?php echo $form2->textField($payment2,'other', array('size'=>'20', 'onfocus'=>'moveToOther()')); ?></label>
                    </div>
                </div>

                <div style="float: right; margin-right: 50px;">
                	<?php echo CHtml::submitButton($payment2->isNewRecord ? 'Process Payment' : 'Process Payment',array('id'=>'subBtn2','name' => 'but2','class'=>'btn btn-success')); ?>
                </div>
            </fieldset>
        </div>
    </div>
    <?php $this->endWidget(); ?>

    <h3>Balances</h3>
	<p>The balance of this order is to be paid by: <strong id="balance_paid_by">COD to Carrier</strong></p>
	<table width="100%" cellspacing="3" cellpadding="0" id="balancesTable">
	  	<tr>
			<td width="360">
			  	<table cellspacing="1" cellpadding="1" width="450" class="table table-bordered">
					<thead style="background-color:gray; color:white;">
						<tr>
						  <th>We owe them</th>
						  <th>Balance</th>
						</tr>
					</thead>
					<tr>
						<td>Carrier</td>
						<td>$0</td>
					</tr>
					<tr>
						<td>Shipper</td>
						<td>$0</td>
					</tr>
					<tr>
						<td>Pickup Terminal</td>
						<td>$0</td>
					</tr>
					<tr>
						<td>Delivery Terminal</td>
						<td>$0</td>
					</tr>
				</table>
			</td>
			<td width="360">
			  	<table cellspacing="1" cellpadding="1" width="450" class="table table-bordered">
					<thead style="background-color:gray; color:white;">
						<tr>
							<th>They owe us</th>
							<th>Balance</th>
						</tr>
					</thead>
					<tr>
						<td>Carrier</td>
						<td>$0</td>
					</tr>
					<tr style="color: red; font-weight: bold">
						<td>Shipper</td>
						<td>
							<?php 
								if(empty($model->extra6)) {
									echo '$0';
								} else {
									echo '$'.$model->extra6;
								}
							?>
						</td>
					</tr>
					<tr>
						<td>Pickup Terminal</td>
						<td>$0</td>
					</tr>
					<tr>
						<td>Delivery Terminal</td>
						<td>$0</td>
					</tr>
				</table>
			</td>
	  	</tr>
	</table>

	<h3 style="margin-top: 20px;">Payments Made and/or Received</h3>
	<table width="100%" cellspacing="0" cellpadding="2" id="paymentsTable">
	  	<tr>
			<td colspan="2">
				<div class="payments"><?php echo FilingGenerics::getPayment1History($model->id);?></div>
			</td>
		</tr>
	</table>
</div>

<script>
//Generate the current expiration date
var select = document.getElementById('expire_year');
var today = new Date();
var year = today.getFullYear();
for(var i=0; i<13; i++) {
	var opt = document.createElement('option');
	opt.value = year + i;
	opt.innerHTML = year + i;
    select.appendChild(opt);
}

$(document).ready(function(){
	//Select different payment types
	$("#payment_type1").click(function(){
		$("#payment1").css("display", "block");
		$("#payment2").css("display", "none");
	});
	$("#payment_type2").click(function(){
		$("#payment1").css("display", "none");
		$("#payment2").css("display", "block");
	});

	//When choose Shipper to Company option on the "Payment From/To" field
	$("#payment_from_to").change(function() {
		if($("#payment_from_to").val() == 'Shipper to Company') {
			$("#emailPayment").css("display", "block");
			$('#DotTrackerPayment_payment_from_to').val('Shipper to Company');
		} else {
			$("#emailPayment").css("display", "none");
			$('#DotTrackerPayment_payment_from_to').val($("#payment_from_to").val());
		}
		$("#DotTrackerPayment1_payment_from_to").val($("#payment_from_to").val());
	});

	//Control the email receipte function
	$("#send_email_to_shipper").click(function(){
		if($("#send_email_to_shipper").prop("checked") == true) {
			$("#attach_order_receipt").removeAttr("disabled");
		} else {
			$("#attach_order_receipt").attr("disabled", true);
		}
	});

	//When choose different value on the "Method" field
	$("#method").change(function() {
		if($("#method").val() == 'Credit card') {
			$("#credit_card").css("display", "block");
			$("#check").css("display", "none");
		} else if($("#method").val() == 'Personal check' || $("#method").val() == 'Cashiers check' || $("#method").val() == 'Company check' || $("#method").val() == 'Comcheck') {
			$("#credit_card").css("display", "none");
			$("#check").css("display", "block");
		} else {
			$("#credit_card").css("display", "none");
			$("#check").css("display", "none");
		}
		$("#DotTrackerPayment1_method").val($("#method").val());
	});

	//Format the expiration date
	$("#expire_month").change(function() {
		$("#DotTrackerPayment1_expiration_date").val($("#expire_month").val()+'/'+$("#expire_year").val());
	});
	$("#expire_year").change(function() {
		$("#DotTrackerPayment1_expiration_date").val($("#expire_month").val()+'/'+$("#expire_year").val());
	});

	//Choose different payment type in "Process through gateway"
	$("#deposit_type").click(function(){
		$("#DotTrackerPayment2_deposit").val(<?php echo $model->extra6;?>);
		$("#DotTrackerPayment2_bal_due").val("");
		$("#DotTrackerPayment2_other").val("");
	});
	$("#bal_due_type").click(function(){
		$("#DotTrackerPayment2_deposit").val("");
		$("#DotTrackerPayment2_bal_due").val(<?php echo $model->extra5;?>);
		$("#DotTrackerPayment2_other").val("");
	});
	$("#other_type").click(function(){
		$("#DotTrackerPayment2_deposit").val("");
		$("#DotTrackerPayment2_bal_due").val("");
	});
});

function moveToOther() {
	var otherBtn = document.getElementById("other_type");
	otherBtn.checked = true;
	$("#DotTrackerPayment2_deposit").val("");
	$("#DotTrackerPayment2_bal_due").val("");
}
</script>