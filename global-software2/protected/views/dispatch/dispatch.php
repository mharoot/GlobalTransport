<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerDispatch */
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Dispatch',
);
?>

<div class="form">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
		    <li><a href="?r=dispatch/view&id=<?php echo $model->id; ?>">Order Detail</a></li>
		    <li><a href="?r=dispatch/update&id=<?php echo $model->id; ?>">Edit Order</a></li>
		    <li><a href="?r=dispatch/history&id=<?php echo $model->id; ?>">Order History</a></li>
		    <li><a href="?r=dispatch/payment&id=<?php echo $model->id; ?>">Payments</a></li>
            <?php if(!empty($model->dispatched_time)) { ?>
                <li><a href="?r=dispatch/dispatchSheet&id=<?php echo $model->id; ?>">Dispatch Sheet</a></li>
            <?php } ?>
		</ul>
	</div>

	<?php if(!$model->isNewRecord) { ?>
	<?php if($model->status != GlobalTrackerDispatch::$enumStatus['not_signed'])  { ?>
	    <a id="notSignedBtn" onclick="moveTo('not_signed');" class="btn btn-info"
	   style="margin: 10px;float: right;"><i class="fa fa-stop" style=""></i> Move to Not Signed</a>
	<?php } ?>
	<?php if($model->status != GlobalTrackerDispatch::$enumStatus['dispatched'])  { ?>
	    <a id="dispatchedBtn" onclick="moveTo('dispatched');" class="btn btn-info"
	   style="margin: 10px;float: right;"><i class="fa fa-stop" style=""></i> Move to Dispatched</a>
	<?php } ?>
	<?php if($model->status != GlobalTrackerDispatch::$enumStatus['issues'])  { ?>
	    <a id="issuesBtn" onclick="moveTo('issues');" class="btn btn-info"
	   style="margin: 10px;float: right;"><i class="fa fa-stop" style=""></i> Move to Issues</a>
	<?php } ?>
	<?php if($model->status != GlobalTrackerDispatch::$enumStatus['archived'])  { ?>
	    <a id="archiveBtn" onclick="moveTo('archived');" class="btn btn-info"
	   style="margin: 10px;float: right;"><i class="fa fa-stop" style=""></i> Move to Archived</a>
	<?php } ?>
	<?php if($model->status != GlobalTrackerDispatch::$enumStatus['hold'])  { ?>
	<a id="holdBtn" onclick="moveTo('hold');" class="btn btn-info"
	   style="margin:10px;float: right;"><i class="fa fa-stop"></i> Move to Hold</a>
	<?php } ?>
	<?php if($model->status != GlobalTrackerDispatch::$enumStatus['order'])  { ?>
	    <a id="holdBtn" onclick="moveTo('order');" class="btn btn-info"
	        style="margin:10px;float: right;"><i class="fa fa-stop"></i> Move to Order</a>
	<?php } ?>
	<?php } ?>

	<div class="col-lg-12 alert alert-success" id="succmsg" style="display: none;"></div>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'global-tracker-dispatch-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>

	<div class="col-md-12">
		<h3 style="color: blue;">Order <?php echo $model->id; ?>-OD Dispatch Sheet</h3>
	</div>

    <?php echo $form->errorSummary($model); ?>

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Vehicle Pricing Information</div>
			<div class="panel-body">
				<fieldset>
					<?php echo FilingGenerics::dispatchSheetDisplay($model->id); ?>
				</fieldset>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Pickup Contact & Location</div>
			<div class="panel-body">
				<fieldset>
					<div class="row">
                        <!-- <div class="col-sm-12"  style="">
                            <div class="row">
                                <div class="col-sm-3 col-xs-6">
                                    <label for="nameon_card">Select Terminal</label>
                                    <select name="select-terminal" class="form-control">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 col-xs-6">
                                    <div class="checkbox" style="margin-top: 28px;">
                                        <label><input type="checkbox" value="" name="asContact">Use as contact</label>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nameon_card">Address</label>
                                <?php echo $form->textField($model,'p_address1',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">Company Name</label>
                                <?php echo $form->textField($model,'p_companyname',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">City <span style="color: red">*</span></label>
                                <?php echo $form->textField($model,'p_city',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">Zip <span style="color: red">*</span></label>
                                <?php echo $form->textField($model,'p_zip',array('class'=>'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nameon_card">Contact Name</label>
                                <?php echo $form->textField($model,'p_contactname',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">Buyer Number</label>
                                <?php echo $form->textField($model,'p_buyernumber',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">Mobile</label>
                                <?php echo $form->textField($model,'p_mobile',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">State <span style="color: red">*</span></label><br>
                                <?php echo $form->dropDownList($model,'p_state',array(
                                    ''=>'- select one -',
                                    'AL'=>'Alabama',
                                    'AK'=>'Alaska',
                                    'AZ'=>'Arizona',
                                    'AR'=>'Arkansas',
                                    'CA'=>'California',
                                    'CO'=>'Colorado',
                                    'CT'=>'Connecticut',
                                    'DE'=>'Delaware',
                                    'DC'=>'Dist. of Columbia',
                                    'FL'=>'Florida',
                                    'GA'=>'Georgia',
                                    'GU'=>'Guam',
                                    'HI'=>'Hawaii',
                                    'ID'=>'Idaho',
                                    'IL'=>'Illinois',
                                    'IN'=>'Indiana',
                                    'IA'=>'Iowa',
                                    'KS'=>'Kansas',
                                    'KY'=>'Kentucky',
                                    'LA'=>'Louisiana',
                                    'ME'=>'Maine',
                                    'MD'=>'Maryland',
                                    'MA'=>'Massachusetts',
                                    'MI'=>'Michigan',
                                    'MN'=>'Minnesota',
                                    'MS'=>'Mississippi',
                                    'MO'=>'Missouri',
                                    'MT'=>'Montana',
                                    'NE'=>'Nebraska',
                                    'NV'=>'Nevada',
                                    'NH'=>'New Hampshire',
                                    'NJ'=>'New Jersey',
                                    'NM'=>'New Mexico',
                                    'NY'=>'New York',
                                    'NC'=>'North Carolina',
                                    'ND'=>'North Dakota',
                                    'OH'=>'Ohio',
                                    'OK'=>'Oklahoma',
                                    'OR'=>'Oregon',
                                    'PA'=>'Pennsylvania',
                                    'PR'=>'Puerto Rico',
                                    'RI'=>'Rhode Island',
                                    'SC'=>'South Carolina',
                                    'SD'=>'South Dakota',
                                    'TN'=>'Tennessee',
                                    'TX'=>'Texas',
                                    'UT'=>'Utah',
                                    'VT'=>'Vermont',
                                    'VI'=>'Virgin Islands',
                                    'VA'=>'Virginia',
                                    'WA'=>'Washington',
                                    'WV'=>'West Virginia',
                                    'WI'=>'Wisconsin',
                                    'WY'=>'Wyoming',
                                    'CP'=>'Canada-Province Not Specified',
                                    'AB'=>'Canada-Alberta',
                                    'BC'=>'Canada-British Columbia',
                                    'MB'=>'Canada-Manitoba',
                                    'NB'=>'Canada-New Brunswick',
                                    'NL'=>'Canada-Newfoundland',
                                    'NT'=>'Canada-Northwest Territories',
                                    'NS'=>'Canada-Nova Scotia',
                                    'NU'=>'Canada-Nunavut',
                                    'ON'=>'Canada-Ontario',
                                    'PE'=>'Canada-Prince Edward Island',
                                    'QC'=>'Canada-Quebec',
                                    'SK'=>'Canada-Saskatchewan',
                                    'YT'=>'Canada-Yukon',
                                    'OC'=>'OTHER COUNTRIES')); 
                                ?>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nameon_card">Phone 1</label>
                                <?php echo $form->textField($model,'p_phone1',array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <label for="nameon_card">Phone 2</label>
                                <?php echo $form->textField($model,'p_phone2',array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <label for="nameon_card">Phone 3</label>
                                <?php echo $form->textField($model,'p_phone3',array('class'=>'form-control')); ?>
                            </div>
                        </div>
                    </div>
				</fieldset>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Delivery Contact & Location</div>
			<div class="panel-body">
				<fieldset>
					<div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nameon_card">Address</label>
                                <?php echo $form->textField($model,'d_address',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">Company Name</label>
                                <?php echo $form->textField($model,'d_company_name',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">City <span style="color: red">*</span></label>
                                <?php echo $form->textField($model,'d_city',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">Zip <span style="color: red">*</span></label>
                                <?php echo $form->textField($model,'d_zip',array('class'=>'form-control')); ?>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nameon_card">Contact Name</label>
                                <?php echo $form->textField($model,'d_contact_name',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">Mobile</label>
                                <?php echo $form->textField($model,'d_mobile',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">State <span style="color: red">*</span></label><br>
                                <?php echo $form->dropDownList($model,'d_state',array(
                                    ''=>'- select one -',
                                    'AL'=>'Alabama',
                                    'AK'=>'Alaska',
                                    'AZ'=>'Arizona',
                                    'AR'=>'Arkansas',
                                    'CA'=>'California',
                                    'CO'=>'Colorado',
                                    'CT'=>'Connecticut',
                                    'DE'=>'Delaware',
                                    'DC'=>'Dist. of Columbia',
                                    'FL'=>'Florida',
                                    'GA'=>'Georgia',
                                    'GU'=>'Guam',
                                    'HI'=>'Hawaii',
                                    'ID'=>'Idaho',
                                    'IL'=>'Illinois',
                                    'IN'=>'Indiana',
                                    'IA'=>'Iowa',
                                    'KS'=>'Kansas',
                                    'KY'=>'Kentucky',
                                    'LA'=>'Louisiana',
                                    'ME'=>'Maine',
                                    'MD'=>'Maryland',
                                    'MA'=>'Massachusetts',
                                    'MI'=>'Michigan',
                                    'MN'=>'Minnesota',
                                    'MS'=>'Mississippi',
                                    'MO'=>'Missouri',
                                    'MT'=>'Montana',
                                    'NE'=>'Nebraska',
                                    'NV'=>'Nevada',
                                    'NH'=>'New Hampshire',
                                    'NJ'=>'New Jersey',
                                    'NM'=>'New Mexico',
                                    'NY'=>'New York',
                                    'NC'=>'North Carolina',
                                    'ND'=>'North Dakota',
                                    'OH'=>'Ohio',
                                    'OK'=>'Oklahoma',
                                    'OR'=>'Oregon',
                                    'PA'=>'Pennsylvania',
                                    'PR'=>'Puerto Rico',
                                    'RI'=>'Rhode Island',
                                    'SC'=>'South Carolina',
                                    'SD'=>'South Dakota',
                                    'TN'=>'Tennessee',
                                    'TX'=>'Texas',
                                    'UT'=>'Utah',
                                    'VT'=>'Vermont',
                                    'VI'=>'Virgin Islands',
                                    'VA'=>'Virginia',
                                    'WA'=>'Washington',
                                    'WV'=>'West Virginia',
                                    'WI'=>'Wisconsin',
                                    'WY'=>'Wyoming',
                                    'CP'=>'Canada-Province Not Specified',
                                    'AB'=>'Canada-Alberta',
                                    'BC'=>'Canada-British Columbia',
                                    'MB'=>'Canada-Manitoba',
                                    'NB'=>'Canada-New Brunswick',
                                    'NL'=>'Canada-Newfoundland',
                                    'NT'=>'Canada-Northwest Territories',
                                    'NS'=>'Canada-Nova Scotia',
                                    'NU'=>'Canada-Nunavut',
                                    'ON'=>'Canada-Ontario',
                                    'PE'=>'Canada-Prince Edward Island',
                                    'QC'=>'Canada-Quebec',
                                    'SK'=>'Canada-Saskatchewan',
                                    'YT'=>'Canada-Yukon',
                                    'OC'=>'OTHER COUNTRIES')); 
                                ?>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nameon_card">Phone 1</label>
                                <?php echo $form->textField($model,'d_phone1',array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <label for="nameon_card">Phone 2</label>
                                <?php echo $form->textField($model,'d_phone2',array('class'=>'form-control')); ?>
                            </div>
                            <div class="form-group">
                                <label for="nameon_card">Phone 3</label>
                                <?php echo $form->textField($model,'d_phone3',array('class'=>'form-control')); ?>
                            </div>
                        </div>
                    </div>
				</fieldset>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Dispatch Order</div>
			<div class="panel-body">
				<fieldset>
					<div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nameon_card">1st Avail. Pickup Date <span style="color: red">*</span></label>
                                <?php echo $form->textField($model,'s_date',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                                <label for="nameon_card">Load Date <span style="color: red">*</span></label>
                                <?php echo $form->dateField($model,'extra',array('class'=>'form-control')); ?>

                            </div>

                            <div class="form-group">
                                <label for="nameon_card">Delivery Date <span style="color: red">*</span></label>
                                <?php echo $form->dateField($model,'extra1',array('class'=>'form-control')); ?>
                            </div>

                            <div class="form-group">
                            	<label for="nameon_card">Select a carrier: <span style="color: red">*</span></label>
                                <?php 
                                    $list = FilingGenerics::getCarrierList();
                                    echo $form->dropDownList($model,'carrier_name', $list, array('length'=>'10px'));
                                ?>
                            	<!-- <select name="shipper" class="form-control">
                                    <option value="">Select</option>
                                    <option value="New Shipper">New Shipper</option>
                                    <?php //echo FilingGenerics::getContactList(); ?>
                                </select> -->
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-hidden">&nbsp;</div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nameon_card">Notes from Shippe</label>
                                <?php echo $form->textArea($model,'notes_shipper',array('class'=>'form-control')); ?>
                                <p style="font-size: 10px;"><i>(Will appear on Shipper Invoice & Shipping Order Form)</i></p>
                            </div>
                            <div class="form-group">
                                <label for="nameon_card">Notes to Shipper</label>
                                <?php echo $form->textArea($model,'info_forShipper',array('class'=>'form-control')); ?>
                            </div>
                        </div>
                    </div>
				</fieldset>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Pricing Information</div>
			<div class="panel-body">
				<fieldset>
					<div class="row">
                        <div class="col-sm-12" style="margin-bottom: 10px;">
                            <div class="col-sm-2" style="text-align: right;"><label>Total :</label></div>
                            <div class="col-sm-2">$&nbsp;<?php echo $model->extra5; ?></div>
                        </div>

                        <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-2" style="text-align: right;"><label>Required Deposit :</label></div>
	                        <div class="col-sm-2">$&nbsp;<?php echo $model->extra6; ?></div>
	                        <div class="col-sm-3" style="float:right;">Do not use payment terms.</div>
                            <div class="col-sm-2" style="float:right;"><input style="float:right;" id="checkUsePayment" type="checkbox"></div>
	                    </div>

	                    <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-2" style="text-align: right;"><label>Carrier Pay :</label></div>
	                        <div class="col-sm-2">$&nbsp;<?php echo $form->textField($model,'carrier_pay',array('size'=>'10')); ?></div>
	                        <div class="col-sm-3" style="float:right;">
	                        	<?php 
	                        		if(empty($model->extra2)) {
	                        			$model->extra2 = $settings->carrier_pmt_term;
	                        		}
	                        		echo $form->dropDownList($model,'extra2',array(
                                        ''=>'- Select one - ',
                                        'immediately'=>'immediately',
                                        '2 business days (Quick Pay)'=>'2 business days (Quick Pay)',
                                        '5 business days'=>'5 business days',
                                        '10 business days'=>'10 business days',
                                        '15 business days'=>'15 business days',
                                        '30 business days'=>'30 business days'));
                                ?>
	                        </div>
	                        <div class="col-sm-3" style="text-align:right;float:right;"><label>Payment Terms: <span style="color: red">*</span></label></div>
	                    </div>

	                    <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-2" style="text-align: right;"><label>Balance Paid By <span style="color: red">*</span></label></div>
	                        <div class="col-sm-3">
	                        	<?php echo $form->dropDownList($model,'bal_paid_by',array(
	                                    ''=>'- select one -',
	                                    'Additional Shipper Pre-payment'=>'Additional Shipper Pre-payment',
	                                    'COD to Cariier'=>'COD to Cariier',
	                                    'COD to Delivery Terminal'=>'COD to Delivery Terminal',
	                                    'COD to Pickup Terminal'=>'COD to Pickup Terminal',
	                                    'COP to Carrier (On Pickup)'=>'COP to Carrier (On Pickup)',
	                                    'Shipper Invoice'=>'Shipper Invoice'));
                            	?>
                            </div>
	                        <div class="col-sm-3" style="float:right;">
	                        	<?php 
	                        		if(empty($model->extra3)) {
	                        			$model->extra3 = $settings->carrier_pmt_term_begin;
	                        		}
	                        		echo $form->dropDownList($model,'extra3',array(
		                        		''=>'- Select one - ',
	                                    'pickup'=>'pickup',
	                                    'delivery'=>'delivery',
	                                    'receiving a signed Bill of Lading'=>'receiving a signed Bill of Lading'));
                                ?>
	                        </div>
	                        <div class="col-sm-3" style="text-align:right;float:right;"><label>Terms Begin: <span style="color: red">*</span></label></div>
	                    </div>

	                    <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-2" style="text-align: right;"><label>COD/COP Method <span style="color: red">*</span></label></div>
	                        <div class="col-sm-3">
	                        	<?php echo $form->dropDownList($model,'cod_method',array(
                                    ''=>'- select one -',
                                    'Cash/Certified Funds'=>'Cash/Certified Funds',
                                    'Check'=>'Check'));
                            	?>
                            </div>
	                        <div class="col-sm-3" style="float:right;">
	                        	<?php 
	                        		if(empty($model->extra4)) {
	                        			$model->extra4 = $settings->carrier_pmt_method;
	                        		}
		                        	echo $form->dropDownList($model,'extra4',array(
		                        		''=>'- select one -',
	                                    'Cash'=>'Cash',
	                                    'Certified Funds'=>'Certified Funds',
	                                    'Company Check'=>'Company Check',
	                                    'Comchek'=>'Comchek',
	                                    'TCH'=>'TCH')); 
	                            ?>
	                        </div>
	                        <div class="col-sm-3" style="text-align:right;float:right;"><label>Payment Method: <span style="color: red">*</span></label></div>
	                    </div>

	                    <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-2" style="text-align: right;"><label>Pickup Terminal Fee:</label></div>
	                        <div class="col-sm-2">$&nbsp;<?php echo $form->textField($model,'pickup_terminal_fee',array('size'=>'6')); ?></div>
	                        <div class="col-sm-3" style="float:right;">Save as Default Carrier Payment Options.</div>
                            <div class="col-sm-2" style="float:right;"><?php echo $form->checkBox($model,'save_as_default',array('style'=>'float:right;')); ?></div>
	                    </div>

	                    <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-2" style="text-align: right;"><label>Delivery Terminal Fee:</label></div>
	                        <div class="col-sm-2">$&nbsp;<?php echo $form->textField($model,'delivery_terminal_fee',array('size'=>'6')); ?></div>
	                    </div>
                    </div>
				</fieldset>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Dispatch Information</div>
			<div class="panel-body">
				<fieldset>
					<div class="col-sm-6">
                        <div class="col-sm-12" style="margin-bottom: 10px;">
                            <div class="col-sm-4" style="text-align: right;"><label>Dispatch Contact <span style="color: red">*</span></label></div>
                            <div class="col-sm-8">
                            	<?php
                            		if(empty($model->dispatch_contact)) {
                            			$model->dispatch_contact = $accountinfo->dispatch_contact;
                            		}
                            		echo $form->textField($model,'dispatch_contact',array('size'=>'20')); ?>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-4" style="text-align: right;"><label>Dispatch Phone <span style="color: red">*</span></label></div>
                            <div class="col-sm-8">
                            	<?php
                            		if(empty($model->dispatch_phone)) {
                            			$model->dispatch_phone = $accountinfo->dispatch_phone;
                            		} 
                            		echo $form->textField($model,'dispatch_phone',array('size'=>'20')); 
                            	?>
                            </div>
	                    </div>
	                    <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-4" style="text-align: right;"><label>Dispatch Fax <span style="color: red">*</span></label></div>
                            <div class="col-sm-8">
                            	<?php
                            		if(empty($model->dispatch_fax)) {
                            			$model->dispatch_fax = $accountinfo->dispatch_fax;
                            		} 
                            		echo $form->textField($model,'dispatch_fax',array('size'=>'20')); 
                            	?>
                            </div>
	                    </div>
	                    <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-4" style="text-align: right;"><label>Dispatch Email <span style="color: red">*</span></label></div>
                            <div class="col-sm-8">
                            	<?php
                            		if(empty($model->dispatch_email)) {
                            			$model->dispatch_email = $accountinfo->dispatch_email;
                            		} 
                            		echo $form->textField($model,'dispatch_email',array('size'=>'20')); 
                            	?>
                            </div>
	                    </div>
	                </div>

	                <div class="col-sm-6">
                        <div class="col-sm-12" style="margin-bottom: 10px;">
                            <div class="col-sm-4" style="text-align: right;"><label>Driver's First Name </label></div>
                            <div class="col-sm-8">
                            	<?php echo $form->textField($model,'driver_fname',array('size'=>'20')); ?>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-4" style="text-align: right;"><label>Driver's Last Name </label></div>
                            <div class="col-sm-8">
                            	<?php echo $form->textField($model,'driver_lname',array('size'=>'20')); ?>
                            </div>
	                    </div>
	                    <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-4" style="text-align: right;"><label>Driver's Phone </label></div>
                            <div class="col-sm-8">
                            	<?php echo $form->textField($model,'driver_phone',array('size'=>'20')); ?>
                            </div>
	                    </div>
	                    <div class="col-sm-12" style="margin-bottom: 10px;">
	                        <div class="col-sm-4" style="text-align: right;"><label>Dispatch Instructions </label></div>
                            <div class="col-sm-8">
                            	<?php echo $form->textArea($model,'driver_instruction',array('class'=>'form-control')); ?>
                            </div>
	                    </div>
	                </div>
				</fieldset>
			</div>
		</div>
	</div>

	<div class="col-sm-12">
        <div class="form-group" style="float: right;">
            <div class="row buttons" style="margin-top:20px;">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('id'=>'subBtn', 'name' => 'but1','class'=>'btn btn-success')); ?>
            </div>
        </div>
    </div>

	<?php $this->endWidget(); ?>

</div>

<script>
$(document).ready(function(){
	$("#checkUsePayment").click(function(){
	    if($(this).prop("checked") == true) {
	    	$("#GlobalTrackerOrder_extra2").attr("disabled", true).css('color','gray');
	    	$("#GlobalTrackerOrder_extra3").attr("disabled", true).css('color','gray');
	    	$("#GlobalTrackerOrder_extra4").attr("disabled", true).css('color','gray');
	    } else {
	    	$("#GlobalTrackerOrder_extra2").attr("disabled", false).css('color','');
	    	$("#GlobalTrackerOrder_extra3").attr("disabled", false).css('color','');
	    	$("#GlobalTrackerOrder_extra4").attr("disabled", false).css('color','');
	    }
	});
});
</script>