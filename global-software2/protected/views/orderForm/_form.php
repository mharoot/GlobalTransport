<?php
/* @var $this OrderFormController */
/* @var $model GlobalTrackerOrder */
/* @var $form CActiveForm */
?>

<div class="form">

<ul class="nav nav-tabs">
    <li><a href="?r=orderForm/view&id=<?php echo $model->id; ?>">Order Detail</a></li>
    <li class="active"><a href="?r=orderForm/update&id=<?php echo $model->id; ?>">Edit Order</a></li>
    <li><a href="?r=orderForm/history&id=<?php echo $model->id; ?>">Order History</a></li>
    <li><a href="?r=orderForm/payment&id=<?php echo $model->id; ?>">Payments</a></li>
    <?php if(!empty($model->dispatched_time)) { ?>
        <li><a href="?r=orderForm/dispatchSheet&id=<?php echo $model->id; ?>">Dispatch Sheet</a></li>
    <?php } ?>
</ul>

<?php if(!$model->isNewRecord) { ?>
<?php if($model->status != GlobalTrackerOrder::$enumStatus['not_signed'])  { ?>
    <a id="notSignedBtn" onclick="moveTo('not_signed');" class="btn btn-primary"
   style="margin: 10px;float: right;">Move to Not Signed</a>
<?php } ?>
<?php if($model->status != GlobalTrackerOrder::$enumStatus['dispatched'])  { ?>
    <a id="dispatchedBtn" onclick="moveTo('dispatched');" class="btn btn-primary"
   style="margin: 10px;float: right;">Move to Dispatched</a>
<?php } ?>
<?php if($model->status != GlobalTrackerOrder::$enumStatus['issues'])  { ?>
    <a id="issuesBtn" onclick="moveTo('issues');" class="btn btn-info"
   style="margin: 10px;float: right;">Move to Issues</a>
<?php } ?>
<?php if($model->status != GlobalTrackerOrder::$enumStatus['archived'])  { ?>
    <a id="archiveBtn" onclick="moveTo('archived');" class="btn btn-danger"
   style="margin: 10px;float: right;">Move to Archived</a>
<?php } ?>
<?php if($model->status != GlobalTrackerOrder::$enumStatus['hold'])  { ?>
<a id="holdBtn" onclick="moveTo('hold');" class="btn btn-warning"
   style="margin:10px;float: right;">Move to Hold</a>
<?php } ?>
<?php if($model->status != GlobalTrackerOrder::$enumStatus['order'])  { ?>
    <a id="holdBtn" onclick="moveTo('order');" class="btn btn-success"
        style="margin:10px;float: right;">Move to Order</a>
<?php } ?>
<?php } ?>

<div class="col-lg-12 alert alert-success" id="succmsg" style="display: none;"></div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'global-tracker-order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <div class="row">

        <!-- Content Column -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <br><p>Complete the form below and click Create Order when finished. <br>Required fields are marked with a <span style="color: red">*</span>. </p><br>
                    <?php echo $form->errorSummary($model); ?>
                </div>
                <!-- Contact Form -->
                <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">SHIPPER INFORMATION</div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-4" >
                                        <div class="form-group" style="">
                                            <label for="nameon_card">Select Shipper</label>
                                            <select name="shipper" class="form-control">
                                                <option value="">Select</option>
                                                <option value="New Shipper">New Shipper</option>
                                                <?php echo FilingGenerics::getContactList(); ?>
                                            </select>
                                            <?php if($model->isNewRecord) { ?> 
                                                <input type="checkbox" id="isSave" name="isSave"> Save Contact 
                                            <?php } ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">First Name <span style="color: red">*</span></label>
                                            <?php echo $form->textField($model,'fname',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">Last Name <span style="color: red">*</span></label>
                                            <?php echo $form->textField($model,'lname',array('class'=>'form-control')); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="nameon_card">Company</label>
                                            <?php echo $form->textField($model,'company',array('class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nameon_card">Email</label>
                                            <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">Phone 1</label>
                                            <?php echo $form->textField($model,'phone1',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">Phone 2</label>
                                            <?php echo $form->textField($model,'phone2',array('class'=>'form-control')); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="nameon_card">Mobile <span style="color: red">*</span></label>
                                            <?php echo $form->textField($model,'mobile',array('class'=>'form-control')); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nameon_card">Address</label>
                                            <?php echo $form->textField($model,'address1',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">City</label>
                                            <?php echo $form->textField($model,'city',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">State</label><br>
                                            <?php echo $form->dropDownList($model,'state',array(
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
                                                'OC'=>'OTHER COUNTRIES'), array('class'=>'form-control')); 
                                            ?>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nameon_card">Zip</label>
                                                    <?php echo $form->textField($model,'zip',array('class'=>'form-control')); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nameon_card">Fax</label>
                                                    <?php echo $form->textField($model,'fax',array('class'=>'form-control')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!--Pickup Contact and location -->
                    <div class="panel panel-default">
                        <div class="panel-heading">PICKUP CONTACT & LOCATION</div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-4" style="">
                                        <div class="form-group">
                                            <label for="nameon_card">Select Contact</label>
                                            <select name="originshipper" class="form-control">
                                                <option value="1">Select</option>
                                                <option value="">Same as Shipper</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12"  style="">
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
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nameon_card">Address</label>
                                            <?php echo $form->textField($model,'p_address1',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">Company</label>
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
                                            <label for="nameon_card">Phone Number 2</label>
                                            <?php echo $form->textField($model,'p_phone2',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">Buyer Number</label>
                                            <?php echo $form->textField($model,'p_buyernumber',array('class'=>'form-control')); ?>
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
                                                'OC'=>'OTHER COUNTRIES'), array('class'=>'form-control')); 
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nameon_card">Phone Number</label>
                                            <?php echo $form->textField($model,'p_phone1',array('class'=>'form-control')); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="nameon_card">Phone Number 3</label>
                                            <?php echo $form->textField($model,'p_phone3',array('class'=>'form-control')); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="nameon_card">Mobile</label>
                                            <?php echo $form->textField($model,'p_mobile',array('class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Delivery Information & Location -->

                    <div class="panel panel-default">
                        <div class="panel-heading">DELIVERY CONTACT & LOCATION</div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-4" style="">
                                        <div class="form-group">
                                            <label for="nameon_card">Select Contact</label>
                                            <select name="toshipper" class="form-control">
                                                <option value="1">Select</option>
                                                <option value="">Same as Shipper</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12"  style="">
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
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nameon_card">Address</label>
                                            <?php echo $form->textField($model,'d_address',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">City <span style="color: red">*</span></label>
                                            <?php echo $form->textField($model,'d_city',array('class'=>'form-control')); ?>
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
                                                'OC'=>'OTHER COUNTRIES'), array('class'=>'form-control')); 
                                            ?>
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
                                            <label for="nameon_card">Company Name</label>
                                            <?php echo $form->textField($model,'d_company_name',array('class'=>'form-control')); ?>
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
                                        <div class="form-group">
                                            <label for="nameon_card">Mobile</label>
                                            <?php echo $form->textField($model,'d_mobile',array('class'=>'form-control')); ?>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>


                    <!-- Shipping Information -->
                    <div class="panel panel-default">
                        <div class="panel-heading">SHIPPING INFORMATION</div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nameon_card">1st Avail. Pickup Date <span style="color: red">*</span></label>
                                            <?php echo $form->textField($model,'s_date',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">Vehicle(s) Run <span style="color: red">*</span></label>
                                            <?php echo $form->dropDownList($model,'s_vrun',GlobalTrackerOrder::$arrVRun,array('class'=>'form-control','prompt'=>'Select one')); ?>

                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">Ship Via <span style="color: red">*</span></label>
                                            <?php echo $form->dropDownList($model,'s_via',GlobalTrackerOrder::$enumShipVia,array('class'=>'form-control','prompt'=>'Select one')); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-xs-hidden">&nbsp;</div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nameon_card">Notes from Shipper</label>
                                            <?php echo $form->textArea($model,'notes_shipper',array('class'=>'form-control')); ?>
                                            <p style="font-size: 10px;"><i>(Will appear on Shipper Invoice & Shipping Order Form)</i></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="nameon_card">Notes to Shipper</label>
                                            <?php echo $form->textField($model,'info_forShipper',array('class'=>'form-control')); ?>
                                        </div>
                                        <!-- <div class="checkbox">
                                            <label><input type="checkbox" value="">Include Shipper Comment on Dispatch Sheet</label>
                                            <?php //echo $form->textField($model,'extra',array('class'=>'form-control')); ?>
                                        </div> -->
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Internal notes display -->
                    <div class="panel panel-default">
                        <div class="panel-heading">INTERNAL NOTES</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="nameon_card">Enter internal notes: </label>
                                <br />
                                <div class="alert alert-success" id="successservicety33" style="display: none"></div>
                                <div class="alert alert-danger" id="errorservicety33" style="display: none"></div>
                                <div class="row">
                                    <input class="form-control" id="quote_id" type="hidden" value="<?php echo $model->quote_id ?>">
                                    <div class="col-lg-11">
                                        <div class="form-group">
                                            <input class="form-control" id="DotTracker_note" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <input type="button" class="form-control btn btn-info" value="Add" onclick="addNote();">
                                        </div>
                                    </div>
                                </div>

                                <div id="noteArea">
                                    <table id="noteTable " class="table table-striped" style="margin-top:30px;">
                                        <tr>
                                            <td width="20%">Date</td>
                                            <td width="70%">Notes</td>
                                            <td width="20%">Added By</td>
                                        </tr>
                                            <!-- <td>06/12/2018 08:40:18 AM</td>
                                            <td>Charge the card on 06/20/2018.</td>
                                            <td>Tigran Gregorian<br>( tonygreg )  </td> -->
                                        <?php echo FilingGenerics::getNotes($model->quote_id); ?>
                                    </table>                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicle Information -->
                    <div class="panel panel-default">
                        <div class="panel-heading">VEHICLE INFORMATION</div>
                        <?php echo $form->hiddenField($model,'vehicle_info',array('class'=>'form-control')); ?>
                        <?php echo $form->hiddenField($model,'extra5',array('class'=>'form-control')); ?>
                        <?php echo $form->hiddenField($model,'extra6',array('class'=>'form-control')); ?>
                        <div class="panel-body" id="vehInf">
                            <form name="vehInfForm" id="vehInfForm" action="#">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="btn btn-primary" style="float:right;" onclick="addVehicle()">Add Vehicle</span>
                                    </div>
                                </div>
                                <fieldset v-id="1" style="margin-bottom:30px;">
                                    <div class="row">
                                        <div style="width:25%; float:left;">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <span style="display:none" class="btn btn-danger remVehicle">Remove Vehicles</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Tariff <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">$
                                                    <input id="Vehicle_tariff1" name="tariff" onkeyup="calcTariff();" size="9" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Deposit <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">$
                                                    <input id="Vehicle_deposit1" name="deposit" onkeyup="calcDeposit();" size="9" type="text"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width:35%; float:left;">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Year/Make <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_year1" name="year" size="3" type="text"/>
                                                    <input id="Vehicle_make1" name="make" size="10" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Model <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_model1" name="model" size="20" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="Vehicle_type1" id="Vehicle_type1" class="form-control">
                                                        <option value="">- Select One -</option>
                                                        <option value="0">Coupe</option>
                                                        <option value="1">Sedan Small</option>
                                                        <option value="2">Sedan Midsize</option>
                                                        <option value="3">Sedan Large</option>
                                                        <option value="4">Convertible</option>
                                                        <option value="5">Pickup Small</option>
                                                        <option value="6">Pickup Crew Cab</option>
                                                        <option value="7">Pickup Full-size</option>
                                                        <option value="8">Pickup Extd. Cab</option>
                                                        <option value="9">RV</option>
                                                        <option value="10">Dually</option>
                                                        <option value="11">SUV Small</option>
                                                        <option value="12">SUV Mid-size</option>
                                                        <option value="13">SUV Large</option>
                                                        <option value="14">Travel Trailer</option>
                                                        <option value="15">Van Mini</option>
                                                        <option value="16">Van Full-size</option>
                                                        <option value="17">Van Extd. Length</option>
                                                        <option value="18">Van Pop-Top</option>
                                                        <option value="19">Motorcycle</option>
                                                        <option value="20">Boat</option>
                                                        <option value="21">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Color</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_color1" name="color" size="20" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width:35%; float:left;">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">Plate #</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_plate1" name="plate" size="20" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">State</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="Vehicle_deliveryState1" id="Vehicle_deliveryState1" class="form-control">
                                                        <option value="">Select a state</option>
                                                        <option value="AL">Alabama</option>
                                                        <option value="AK">Alaska</option>
                                                        <option value="AZ">Arizona</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="CA">California</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="DC">Dist. of Columbia</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VI">Virgin Islands</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WA">Washington</option>
                                                        <option value="WV">West Virginia</option>
                                                        <option value="WI">Wisconsin</option>
                                                        <option value="WY">Wyoming</option>
                                                        <option value="CP">Canada-Province Not Specified</option>
                                                        <option value="AB">Canada-Alberta</option>
                                                        <option value="BC">Canada-British Columbia</option>
                                                        <option value="MB">Canada-Manitoba</option>
                                                        <option value="NB">Canada-New Brunswick</option>
                                                        <option value="NL">Canada-Newfoundland</option>
                                                        <option value="NT">Canada-Northwest Territories</option>
                                                        <option value="NS">Canada-Nova Scotia</option>
                                                        <option value="NU">Canada-Nunavut</option>
                                                        <option value="ON">Canada-Ontario</option>
                                                        <option value="PE">Canada-Prince Edward Island</option>
                                                        <option value="QC">Canada-Quebec</option>
                                                        <option value="SK">Canada-Saskatchewan</option>
                                                        <option value="YT">Canada-Yukon</option>
                                                        <option value="OC">OTHER COUNTRIES</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">VIN</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_vin1" name="vin" size="20" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">Lot #</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_lot1" name="lot" size="20" type="text" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-sm-4"> 
                                            <div class="form-group">
                                                <label for="nameon_card">Tariff <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_tariff1" name="tariff" onkeyup="calcTariff();" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Deposit <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_deposit1" name="deposit" onkeyup="calcDeposit();" size="30" type="text" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Year <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_year1" name="year" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Make <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_make1" name="make" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Model <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_model1" name="model" size="30" type="text" />
                                            </div>
                                        </div>
                                    
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                <select name="Vehicle_type1" id="Vehicle_type1" class="form-control">
                                                    <option value="">- Select One -</option>
                                                    <option value="0">Coupe</option>
                                                    <option value="1">Sedan Small</option>
                                                    <option value="2">Sedan Midsize</option>
                                                    <option value="3">Sedan Large</option>
                                                    <option value="4">Convertible</option>
                                                    <option value="5">Pickup Small</option>
                                                    <option value="6">Pickup Crew Cab</option>
                                                    <option value="7">Pickup Full-size</option>
                                                    <option value="8">Pickup Extd. Cab</option>
                                                    <option value="9">RV</option>
                                                    <option value="10">Dually</option>
                                                    <option value="11">SUV Small</option>
                                                    <option value="12">SUV Mid-size</option>
                                                    <option value="13">SUV Large</option>
                                                    <option value="14">Travel Trailer</option>
                                                    <option value="15">Van Mini</option>
                                                    <option value="16">Van Full-size</option>
                                                    <option value="17">Van Extd. Length</option>
                                                    <option value="18">Van Pop-Top</option>
                                                    <option value="19">Motorcycle</option>
                                                    <option value="20">Boat</option>
                                                    <option value="21">Other</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Color</label>
                                                <input class="form-control" id="Vehicle_color1" name="color" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Plat #</label>
                                                <input class="form-control" id="Vehicle_plate1" name="plate" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">State</label>
                                                <select name="Vehicle_deliveryState1" id="Vehicle_deliveryState1" class="form-control">
                                                    <option value="">Select a state</option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">Dist. of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VI">Virgin Islands</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                    <option value="CP">Canada-Province Not Specified</option>
                                                    <option value="AB">Canada-Alberta</option>
                                                    <option value="BC">Canada-British Columbia</option>
                                                    <option value="MB">Canada-Manitoba</option>
                                                    <option value="NB">Canada-New Brunswick</option>
                                                    <option value="NL">Canada-Newfoundland</option>
                                                    <option value="NT">Canada-Northwest Territories</option>
                                                    <option value="NS">Canada-Nova Scotia</option>
                                                    <option value="NU">Canada-Nunavut</option>
                                                    <option value="ON">Canada-Ontario</option>
                                                    <option value="PE">Canada-Prince Edward Island</option>
                                                    <option value="QC">Canada-Quebec</option>
                                                    <option value="SK">Canada-Saskatchewan</option>
                                                    <option value="YT">Canada-Yukon</option>
                                                    <option value="OC">OTHER COUNTRIES</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Vin</label>
                                                <input class="form-control" id="Vehicle_vin1" name="vin" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Lot #</label>
                                                <input class="form-control" id="Vehicle_lot1" name="lot" size="30" type="text" />
                                            </div>
                                        </div> -->
                                    </div>
                                </fieldset>

                                <fieldset style="display:none; margin-bottom:30px;" v-id="2">
                                    <div class="row">
                                        <div style="width:25%; float:left;">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="nameon_card"><button class="btn btn-danger remVehicle">Remove Vehicles</button></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Tariff <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">$
                                                    <input id="Vehicle_tariff2" name="tariff" onkeyup="calcTariff();" size="9" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Deposit <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">$
                                                    <input id="Vehicle_deposit2" name="deposit" onkeyup="calcDeposit();" size="9" type="text"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width:35%; float:left;">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Year/Make <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_year2" name="year" size="3" type="text"/>
                                                    <input id="Vehicle_make2" name="make" size="10" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Model <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_model2" name="model" size="20" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="Vehicle_type2" id="Vehicle_type2" class="form-control">
                                                        <option value="">- Select One -</option>
                                                        <option value="0">Coupe</option>
                                                        <option value="1">Sedan Small</option>
                                                        <option value="2">Sedan Midsize</option>
                                                        <option value="3">Sedan Large</option>
                                                        <option value="4">Convertible</option>
                                                        <option value="5">Pickup Small</option>
                                                        <option value="6">Pickup Crew Cab</option>
                                                        <option value="7">Pickup Full-size</option>
                                                        <option value="8">Pickup Extd. Cab</option>
                                                        <option value="9">RV</option>
                                                        <option value="10">Dually</option>
                                                        <option value="11">SUV Small</option>
                                                        <option value="12">SUV Mid-size</option>
                                                        <option value="13">SUV Large</option>
                                                        <option value="14">Travel Trailer</option>
                                                        <option value="15">Van Mini</option>
                                                        <option value="16">Van Full-size</option>
                                                        <option value="17">Van Extd. Length</option>
                                                        <option value="18">Van Pop-Top</option>
                                                        <option value="19">Motorcycle</option>
                                                        <option value="20">Boat</option>
                                                        <option value="21">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Color</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_color2" name="color" size="20" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width:35%; float:left;">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">Plate #</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_plate2" name="plate" size="20" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">State</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="Vehicle_deliveryState2" id="Vehicle_deliveryState2" class="form-control">
                                                        <option value="">Select a state</option>
                                                        <option value="AL">Alabama</option>
                                                        <option value="AK">Alaska</option>
                                                        <option value="AZ">Arizona</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="CA">California</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="DC">Dist. of Columbia</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VI">Virgin Islands</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WA">Washington</option>
                                                        <option value="WV">West Virginia</option>
                                                        <option value="WI">Wisconsin</option>
                                                        <option value="WY">Wyoming</option>
                                                        <option value="CP">Canada-Province Not Specified</option>
                                                        <option value="AB">Canada-Alberta</option>
                                                        <option value="BC">Canada-British Columbia</option>
                                                        <option value="MB">Canada-Manitoba</option>
                                                        <option value="NB">Canada-New Brunswick</option>
                                                        <option value="NL">Canada-Newfoundland</option>
                                                        <option value="NT">Canada-Northwest Territories</option>
                                                        <option value="NS">Canada-Nova Scotia</option>
                                                        <option value="NU">Canada-Nunavut</option>
                                                        <option value="ON">Canada-Ontario</option>
                                                        <option value="PE">Canada-Prince Edward Island</option>
                                                        <option value="QC">Canada-Quebec</option>
                                                        <option value="SK">Canada-Saskatchewan</option>
                                                        <option value="YT">Canada-Yukon</option>
                                                        <option value="OC">OTHER COUNTRIES</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">VIN</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_vin2" name="vin" size="20" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">Lot #</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_lot2" name="lot" size="20" type="text" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Tariff <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_tariff2" name="tariff" onkeyup="calcTariff();" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Deposit <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_deposit2" name="deposit" onkeyup="calcDeposit();" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Year <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_year2" name="year" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Make <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_make2" name="make" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Model <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_model2" name="model" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                <select name="Vehicle_type2" id="Vehicle_type2" class="form-control">
                                                    <option value="">- Select One -</option>
                                                    <option value="0">Coupe</option>
                                                    <option value="1">Sedan Small</option>
                                                    <option value="2">Sedan Midsize</option>
                                                    <option value="3">Sedan Large</option>
                                                    <option value="4">Convertible</option>
                                                    <option value="5">Pickup Small</option>
                                                    <option value="6">Pickup Crew Cab</option>
                                                    <option value="7">Pickup Full-size</option>
                                                    <option value="8">Pickup Extd. Cab</option>
                                                    <option value="9">RV</option>
                                                    <option value="10">Dually</option>
                                                    <option value="11">SUV Small</option>
                                                    <option value="12">SUV Mid-size</option>
                                                    <option value="13">SUV Large</option>
                                                    <option value="14">Travel Trailer</option>
                                                    <option value="15">Van Mini</option>
                                                    <option value="16">Van Full-size</option>
                                                    <option value="17">Van Extd. Length</option>
                                                    <option value="18">Van Pop-Top</option>
                                                    <option value="19">Motorcycle</option>
                                                    <option value="20">Boat</option>
                                                    <option value="21">Other</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Color</label>
                                                <input class="form-control" id="Vehicle_color2" name="color" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Plat #</label>
                                                <input class="form-control" id="Vehicle_plate2" name="plate" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">State</label>
                                                <select name="Vehicle_deliveryState2" id="Vehicle_deliveryState2" class="form-control">
                                                    <option value="">Select a state</option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">Dist. of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VI">Virgin Islands</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                    <option value="CP">Canada-Province Not Specified</option>
                                                    <option value="AB">Canada-Alberta</option>
                                                    <option value="BC">Canada-British Columbia</option>
                                                    <option value="MB">Canada-Manitoba</option>
                                                    <option value="NB">Canada-New Brunswick</option>
                                                    <option value="NL">Canada-Newfoundland</option>
                                                    <option value="NT">Canada-Northwest Territories</option>
                                                    <option value="NS">Canada-Nova Scotia</option>
                                                    <option value="NU">Canada-Nunavut</option>
                                                    <option value="ON">Canada-Ontario</option>
                                                    <option value="PE">Canada-Prince Edward Island</option>
                                                    <option value="QC">Canada-Quebec</option>
                                                    <option value="SK">Canada-Saskatchewan</option>
                                                    <option value="YT">Canada-Yukon</option>
                                                    <option value="OC">OTHER COUNTRIES</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Vin</label>
                                                <input class="form-control" id="Vehicle_vin2" name="vin" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Lot #</label>
                                                <input class="form-control" id="Vehicle_lot2" name="lot" size="30" type="text" />
                                            </div>
                                        </div> -->
                                    </div>
                                </fieldset>

                                <fieldset style="display:none; margin-bottom:30px;" v-id="3">
                                    <div class="row">
                                        <div style="width:25%; float:left;">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="nameon_card"><button class="btn btn-danger remVehicle">Remove Vehicles</button></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Tariff <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">$
                                                    <input id="Vehicle_tariff3" name="tariff" onkeyup="calcTariff();" size="9" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Deposit <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">$
                                                    <input id="Vehicle_deposit3" name="deposit" onkeyup="calcDeposit();" size="9" type="text"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width:35%; float:left;">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Year/Make <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_year3" name="year" size="3" type="text"/>
                                                    <input id="Vehicle_make3" name="make" size="10" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Model <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_model3" name="model" size="20" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="Vehicle_type3" id="Vehicle_type3" class="form-control">
                                                        <option value="">- Select One -</option>
                                                        <option value="0">Coupe</option>
                                                        <option value="1">Sedan Small</option>
                                                        <option value="2">Sedan Midsize</option>
                                                        <option value="3">Sedan Large</option>
                                                        <option value="4">Convertible</option>
                                                        <option value="5">Pickup Small</option>
                                                        <option value="6">Pickup Crew Cab</option>
                                                        <option value="7">Pickup Full-size</option>
                                                        <option value="8">Pickup Extd. Cab</option>
                                                        <option value="9">RV</option>
                                                        <option value="10">Dually</option>
                                                        <option value="11">SUV Small</option>
                                                        <option value="12">SUV Mid-size</option>
                                                        <option value="13">SUV Large</option>
                                                        <option value="14">Travel Trailer</option>
                                                        <option value="15">Van Mini</option>
                                                        <option value="16">Van Full-size</option>
                                                        <option value="17">Van Extd. Length</option>
                                                        <option value="18">Van Pop-Top</option>
                                                        <option value="19">Motorcycle</option>
                                                        <option value="20">Boat</option>
                                                        <option value="21">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Color</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_color3" name="color" size="20" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width:35%; float:left;">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">Plate #</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_plate3" name="plate" size="20" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">State</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="Vehicle_deliveryState3" id="Vehicle_deliveryState3" class="form-control">
                                                        <option value="">Select a state</option>
                                                        <option value="AL">Alabama</option>
                                                        <option value="AK">Alaska</option>
                                                        <option value="AZ">Arizona</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="CA">California</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="DC">Dist. of Columbia</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VI">Virgin Islands</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WA">Washington</option>
                                                        <option value="WV">West Virginia</option>
                                                        <option value="WI">Wisconsin</option>
                                                        <option value="WY">Wyoming</option>
                                                        <option value="CP">Canada-Province Not Specified</option>
                                                        <option value="AB">Canada-Alberta</option>
                                                        <option value="BC">Canada-British Columbia</option>
                                                        <option value="MB">Canada-Manitoba</option>
                                                        <option value="NB">Canada-New Brunswick</option>
                                                        <option value="NL">Canada-Newfoundland</option>
                                                        <option value="NT">Canada-Northwest Territories</option>
                                                        <option value="NS">Canada-Nova Scotia</option>
                                                        <option value="NU">Canada-Nunavut</option>
                                                        <option value="ON">Canada-Ontario</option>
                                                        <option value="PE">Canada-Prince Edward Island</option>
                                                        <option value="QC">Canada-Quebec</option>
                                                        <option value="SK">Canada-Saskatchewan</option>
                                                        <option value="YT">Canada-Yukon</option>
                                                        <option value="OC">OTHER COUNTRIES</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">VIN</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_vin3" name="vin" size="20" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">Lot #</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_lot3" name="lot" size="20" type="text" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-sm-12" style="float: left;">
                                            <div class="form-group">
                                                <label for="nameon_card"><button class="btn btn-danger remVehicle">Remove Vehicles</button></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Tariff <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_tariff3" name="tariff" onkeyup="calcTariff();" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Deposit <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_deposit3" name="deposit" onkeyup="calcDeposit();" size="30" type="text" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Year <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_year3" name="year" size="30" type="text" />
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Make <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_make3" name="make" size="30" type="text" />
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Model <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_model3" name="model" size="30" type="text" />
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                <select name="Vehicle_type3" id="Vehicle_type3" class="form-control">
                                                    <option value="">- Select One -</option>
                                                    <option value="0">Coupe</option>
                                                    <option value="1">Sedan Small</option>
                                                    <option value="2">Sedan Midsize</option>
                                                    <option value="3">Sedan Large</option>
                                                    <option value="4">Convertible</option>
                                                    <option value="5">Pickup Small</option>
                                                    <option value="6">Pickup Crew Cab</option>
                                                    <option value="7">Pickup Full-size</option>
                                                    <option value="8">Pickup Extd. Cab</option>
                                                    <option value="9">RV</option>
                                                    <option value="10">Dually</option>
                                                    <option value="11">SUV Small</option>
                                                    <option value="12">SUV Mid-size</option>
                                                    <option value="13">SUV Large</option>
                                                    <option value="14">Travel Trailer</option>
                                                    <option value="15">Van Mini</option>
                                                    <option value="16">Van Full-size</option>
                                                    <option value="17">Van Extd. Length</option>
                                                    <option value="18">Van Pop-Top</option>
                                                    <option value="19">Motorcycle</option>
                                                    <option value="20">Boat</option>
                                                    <option value="21">Other</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Color</label>
                                                <input class="form-control" id="Vehicle_color3" name="color" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Plat #</label>
                                                <input class="form-control" id="Vehicle_plate3" name="plate" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">State</label>
                                                <select name="Vehicle_deliveryState3" id="Vehicle_deliveryState3" class="form-control">
                                                    <option value="">Select a state</option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">Dist. of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VI">Virgin Islands</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                    <option value="CP">Canada-Province Not Specified</option>
                                                    <option value="AB">Canada-Alberta</option>
                                                    <option value="BC">Canada-British Columbia</option>
                                                    <option value="MB">Canada-Manitoba</option>
                                                    <option value="NB">Canada-New Brunswick</option>
                                                    <option value="NL">Canada-Newfoundland</option>
                                                    <option value="NT">Canada-Northwest Territories</option>
                                                    <option value="NS">Canada-Nova Scotia</option>
                                                    <option value="NU">Canada-Nunavut</option>
                                                    <option value="ON">Canada-Ontario</option>
                                                    <option value="PE">Canada-Prince Edward Island</option>
                                                    <option value="QC">Canada-Quebec</option>
                                                    <option value="SK">Canada-Saskatchewan</option>
                                                    <option value="YT">Canada-Yukon</option>
                                                    <option value="OC">OTHER COUNTRIES</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Vin</label>
                                                <input class="form-control" id="Vehicle_vin3" name="vin" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Lot #</label>
                                                <input class="form-control" id="Vehicle_lot3" name="lot" size="30" type="text" />
                                            </div>
                                        </div> -->
                                    </div>
                                </fieldset>

                                <fieldset style="display:none; margin-bottom:30px;" v-id="4">
                                    <div class="row">
                                        <div style="width:25%; float:left;">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="nameon_card"><button class="btn btn-danger remVehicle">Remove Vehicles</button></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Tariff <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">$
                                                    <input id="Vehicle_tariff4" name="tariff" onkeyup="calcTariff();" size="9" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Deposit <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">$
                                                    <input id="Vehicle_deposit4" name="deposit" onkeyup="calcDeposit();" size="9" type="text"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width:35%; float:left;">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Year/Make <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_year4" name="year" size="3" type="text"/>
                                                    <input id="Vehicle_make4" name="make" size="10" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Model <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_model4" name="model" size="20" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="Vehicle_type4" id="Vehicle_type4" class="form-control">
                                                        <option value="">- Select One -</option>
                                                        <option value="0">Coupe</option>
                                                        <option value="1">Sedan Small</option>
                                                        <option value="2">Sedan Midsize</option>
                                                        <option value="3">Sedan Large</option>
                                                        <option value="4">Convertible</option>
                                                        <option value="5">Pickup Small</option>
                                                        <option value="6">Pickup Crew Cab</option>
                                                        <option value="7">Pickup Full-size</option>
                                                        <option value="8">Pickup Extd. Cab</option>
                                                        <option value="9">RV</option>
                                                        <option value="10">Dually</option>
                                                        <option value="11">SUV Small</option>
                                                        <option value="12">SUV Mid-size</option>
                                                        <option value="13">SUV Large</option>
                                                        <option value="14">Travel Trailer</option>
                                                        <option value="15">Van Mini</option>
                                                        <option value="16">Van Full-size</option>
                                                        <option value="17">Van Extd. Length</option>
                                                        <option value="18">Van Pop-Top</option>
                                                        <option value="19">Motorcycle</option>
                                                        <option value="20">Boat</option>
                                                        <option value="21">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Color</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_color4" name="color" size="20" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width:35%; float:left;">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">Plate #</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_plate4" name="plate" size="20" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">State</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="Vehicle_deliveryState4" id="Vehicle_deliveryState4" class="form-control">
                                                        <option value="">Select a state</option>
                                                        <option value="AL">Alabama</option>
                                                        <option value="AK">Alaska</option>
                                                        <option value="AZ">Arizona</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="CA">California</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="DC">Dist. of Columbia</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VI">Virgin Islands</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WA">Washington</option>
                                                        <option value="WV">West Virginia</option>
                                                        <option value="WI">Wisconsin</option>
                                                        <option value="WY">Wyoming</option>
                                                        <option value="CP">Canada-Province Not Specified</option>
                                                        <option value="AB">Canada-Alberta</option>
                                                        <option value="BC">Canada-British Columbia</option>
                                                        <option value="MB">Canada-Manitoba</option>
                                                        <option value="NB">Canada-New Brunswick</option>
                                                        <option value="NL">Canada-Newfoundland</option>
                                                        <option value="NT">Canada-Northwest Territories</option>
                                                        <option value="NS">Canada-Nova Scotia</option>
                                                        <option value="NU">Canada-Nunavut</option>
                                                        <option value="ON">Canada-Ontario</option>
                                                        <option value="PE">Canada-Prince Edward Island</option>
                                                        <option value="QC">Canada-Quebec</option>
                                                        <option value="SK">Canada-Saskatchewan</option>
                                                        <option value="YT">Canada-Yukon</option>
                                                        <option value="OC">OTHER COUNTRIES</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">VIN</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_vin4" name="vin" size="20" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">Lot #</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_lot4" name="lot" size="20" type="text" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-sm-12" style="float: left;">
                                            <div class="form-group">
                                                <label for="nameon_card"><button class="btn btn-danger remVehicle">Remove Vehicles</button></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Tariff <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_tariff4" name="tariff" onkeyup="calcTariff();" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Deposit <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_deposit4" name="deposit" onkeyup="calcDeposit();" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Year <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_year4" name="year" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Make <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_make4" name="make" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Model <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_model4" name="model" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                <select name="Vehicle_type4" id="Vehicle_type4" class="form-control">
                                                    <option value="">- Select One -</option>
                                                    <option value="0">Coupe</option>
                                                    <option value="1">Sedan Small</option>
                                                    <option value="2">Sedan Midsize</option>
                                                    <option value="3">Sedan Large</option>
                                                    <option value="4">Convertible</option>
                                                    <option value="5">Pickup Small</option>
                                                    <option value="6">Pickup Crew Cab</option>
                                                    <option value="7">Pickup Full-size</option>
                                                    <option value="8">Pickup Extd. Cab</option>
                                                    <option value="9">RV</option>
                                                    <option value="10">Dually</option>
                                                    <option value="11">SUV Small</option>
                                                    <option value="12">SUV Mid-size</option>
                                                    <option value="13">SUV Large</option>
                                                    <option value="14">Travel Trailer</option>
                                                    <option value="15">Van Mini</option>
                                                    <option value="16">Van Full-size</option>
                                                    <option value="17">Van Extd. Length</option>
                                                    <option value="18">Van Pop-Top</option>
                                                    <option value="19">Motorcycle</option>
                                                    <option value="20">Boat</option>
                                                    <option value="21">Other</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Color</label>
                                                <input class="form-control" id="Vehicle_color4" name="color" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Plat #</label>
                                                <input class="form-control" id="Vehicle_plate4" name="plate" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">State</label>
                                                <select name="Vehicle_deliveryState4" id="Vehicle_deliveryState4" class="form-control">
                                                    <option value="">Select a state</option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">Dist. of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VI">Virgin Islands</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                    <option value="CP">Canada-Province Not Specified</option>
                                                    <option value="AB">Canada-Alberta</option>
                                                    <option value="BC">Canada-British Columbia</option>
                                                    <option value="MB">Canada-Manitoba</option>
                                                    <option value="NB">Canada-New Brunswick</option>
                                                    <option value="NL">Canada-Newfoundland</option>
                                                    <option value="NT">Canada-Northwest Territories</option>
                                                    <option value="NS">Canada-Nova Scotia</option>
                                                    <option value="NU">Canada-Nunavut</option>
                                                    <option value="ON">Canada-Ontario</option>
                                                    <option value="PE">Canada-Prince Edward Island</option>
                                                    <option value="QC">Canada-Quebec</option>
                                                    <option value="SK">Canada-Saskatchewan</option>
                                                    <option value="YT">Canada-Yukon</option>
                                                    <option value="OC">OTHER COUNTRIES</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Vin</label>
                                                <input class="form-control" id="Vehicle_vin4" name="vin" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Lot #</label>
                                                <input class="form-control" id="Vehicle_lot4" name="lot" size="30" type="text" />
                                            </div>
                                        </div> -->
                                    </div>
                                </fieldset>

                                <fieldset style="display:none;" v-id="5">
                                    <div class="row">
                                        <div style="width:25%; float:left;">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="nameon_card"><button class="btn btn-danger remVehicle">Remove Vehicles</button></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Tariff <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">$
                                                    <input id="Vehicle_tariff5" name="tariff" onkeyup="calcTariff();" size="9" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Deposit <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">$
                                                    <input id="Vehicle_deposit5" name="deposit" onkeyup="calcDeposit();" size="9" type="text"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width:35%; float:left;">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Year/Make <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_year5" name="year" size="3" type="text"/>
                                                    <input id="Vehicle_make5" name="make" size="10" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Model <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_model5" name="model" size="20" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="Vehicle_type5" id="Vehicle_type5" class="form-control">
                                                        <option value="">- Select One -</option>
                                                        <option value="0">Coupe</option>
                                                        <option value="1">Sedan Small</option>
                                                        <option value="2">Sedan Midsize</option>
                                                        <option value="3">Sedan Large</option>
                                                        <option value="4">Convertible</option>
                                                        <option value="5">Pickup Small</option>
                                                        <option value="6">Pickup Crew Cab</option>
                                                        <option value="7">Pickup Full-size</option>
                                                        <option value="8">Pickup Extd. Cab</option>
                                                        <option value="9">RV</option>
                                                        <option value="10">Dually</option>
                                                        <option value="11">SUV Small</option>
                                                        <option value="12">SUV Mid-size</option>
                                                        <option value="13">SUV Large</option>
                                                        <option value="14">Travel Trailer</option>
                                                        <option value="15">Van Mini</option>
                                                        <option value="16">Van Full-size</option>
                                                        <option value="17">Van Extd. Length</option>
                                                        <option value="18">Van Pop-Top</option>
                                                        <option value="19">Motorcycle</option>
                                                        <option value="20">Boat</option>
                                                        <option value="21">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4" style="text-align:right;">
                                                    <label for="nameon_card">Color</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="Vehicle_color5" name="color" size="20" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width:35%; float:left;">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">Plate #</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_plate5" name="plate" size="20" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">State</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="Vehicle_deliveryState5" id="Vehicle_deliveryState5" class="form-control">
                                                        <option value="">Select a state</option>
                                                        <option value="AL">Alabama</option>
                                                        <option value="AK">Alaska</option>
                                                        <option value="AZ">Arizona</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="CA">California</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="DC">Dist. of Columbia</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VI">Virgin Islands</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WA">Washington</option>
                                                        <option value="WV">West Virginia</option>
                                                        <option value="WI">Wisconsin</option>
                                                        <option value="WY">Wyoming</option>
                                                        <option value="CP">Canada-Province Not Specified</option>
                                                        <option value="AB">Canada-Alberta</option>
                                                        <option value="BC">Canada-British Columbia</option>
                                                        <option value="MB">Canada-Manitoba</option>
                                                        <option value="NB">Canada-New Brunswick</option>
                                                        <option value="NL">Canada-Newfoundland</option>
                                                        <option value="NT">Canada-Northwest Territories</option>
                                                        <option value="NS">Canada-Nova Scotia</option>
                                                        <option value="NU">Canada-Nunavut</option>
                                                        <option value="ON">Canada-Ontario</option>
                                                        <option value="PE">Canada-Prince Edward Island</option>
                                                        <option value="QC">Canada-Quebec</option>
                                                        <option value="SK">Canada-Saskatchewan</option>
                                                        <option value="YT">Canada-Yukon</option>
                                                        <option value="OC">OTHER COUNTRIES</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">VIN</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_vin5" name="vin" size="20" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-3" style="text-align:right;">
                                                    <label for="nameon_card">Lot #</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="Vehicle_lot5" name="lot" size="20" type="text" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-sm-12" style="float: left;">
                                            <div class="form-group">
                                                <label for="nameon_card"><button class="btn btn-danger remVehicle">Remove Vehicles</button></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Tariff <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_tariff5" name="tariff" onkeyup="calcTariff();" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Deposit <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_deposit5" name="deposit" onkeyup="calcDeposit();" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Year <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_year5" name="year" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Make <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_make5" name="make" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Model <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_model5" name="model" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                <select name="Vehicle_type5" id="Vehicle_type5" class="form-control">
                                                    <option value="">- Select One -</option>
                                                    <option value="0">Coupe</option>
                                                    <option value="1">Sedan Small</option>
                                                    <option value="2">Sedan Midsize</option>
                                                    <option value="3">Sedan Large</option>
                                                    <option value="4">Convertible</option>
                                                    <option value="5">Pickup Small</option>
                                                    <option value="6">Pickup Crew Cab</option>
                                                    <option value="7">Pickup Full-size</option>
                                                    <option value="8">Pickup Extd. Cab</option>
                                                    <option value="9">RV</option>
                                                    <option value="10">Dually</option>
                                                    <option value="11">SUV Small</option>
                                                    <option value="12">SUV Mid-size</option>
                                                    <option value="13">SUV Large</option>
                                                    <option value="14">Travel Trailer</option>
                                                    <option value="15">Van Mini</option>
                                                    <option value="16">Van Full-size</option>
                                                    <option value="17">Van Extd. Length</option>
                                                    <option value="18">Van Pop-Top</option>
                                                    <option value="19">Motorcycle</option>
                                                    <option value="20">Boat</option>
                                                    <option value="21">Other</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Color</label>
                                                <input class="form-control" id="Vehicle_color5" name="color" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Plat #</label>
                                                <input class="form-control" id="Vehicle_plate5" name="plate" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">State</label>
                                                <select name="Vehicle_deliveryState5" id="Vehicle_deliveryState5" class="form-control">
                                                    <option value="">Select a state</option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">Dist. of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VI">Virgin Islands</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                    <option value="CP">Canada-Province Not Specified</option>
                                                    <option value="AB">Canada-Alberta</option>
                                                    <option value="BC">Canada-British Columbia</option>
                                                    <option value="MB">Canada-Manitoba</option>
                                                    <option value="NB">Canada-New Brunswick</option>
                                                    <option value="NL">Canada-Newfoundland</option>
                                                    <option value="NT">Canada-Northwest Territories</option>
                                                    <option value="NS">Canada-Nova Scotia</option>
                                                    <option value="NU">Canada-Nunavut</option>
                                                    <option value="ON">Canada-Ontario</option>
                                                    <option value="PE">Canada-Prince Edward Island</option>
                                                    <option value="QC">Canada-Quebec</option>
                                                    <option value="SK">Canada-Saskatchewan</option>
                                                    <option value="YT">Canada-Yukon</option>
                                                    <option value="OC">OTHER COUNTRIES</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Vin</label>
                                                <input class="form-control" id="Vehicle_vin5" name="vin" size="30" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Lot #</label>
                                                <input class="form-control" id="Vehicle_lot5" name="lot" size="30" type="text" />
                                            </div>
                                        </div> -->
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>


                    <!-- PRICING Information -->
                    <div class="panel panel-default">
                        <div class="panel-heading">PRICING INFORMATION</div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="row m-b-sm">
                                            <div class="col-sm-4">Total :</div>
                                            <div class="col-sm-2" id="tariffVal">$0.00</div>
                                            <div class="col-sm-6">(Edit under the Vehicle Information section)</div>
                                        </div>
                                        <div class="row m-b-sm">
                                            <div class="col-sm-4">Required Deposit :</div>
                                            <div class="col-sm-2" id="depositVal">$0.00</div>
                                            <div class="col-sm-6">(Edit deposit under the Vehicle Information section)</div>
                                        </div><br>
                                        <div class="row m-b-sm">
                                            <div class="col-sm-4">Carrier Pay :</div>
                                            <div class="col-sm-8">$&nbsp;<?php echo $form->textField($model,'carrier_pay',array('size'=>'10')); ?></div><br>
                                        </div><br>
                                        <div class="row m-b-sm">
                                            <div class="col-sm-4">Balance Paid By <span style="color: red">*</span></div>
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
                                        </div><br>
                                        <div class="row m-b-sm">
                                            <div class="col-sm-4">COD/COP Method <span style="color: red">*</span></div>
                                            <div class="col-sm-3">
                                                <?php echo $form->dropDownList($model,'cod_method',array(
                                                    ''=>'- select one -',
                                                    'Cash/Certified Funds'=>'Cash/Certified Funds',
                                                    'Check'=>'Check'));
                                                ?>
                                            </div>
                                        </div><br>
                                        <div class="row m-b-sm">
                                            <div class="col-sm-4">Pickup Terminal Fee :</div>
                                            <div class="col-sm-2">$&nbsp;<?php echo $form->textField($model,'pickup_terminal_fee',array('size'=>'6')); ?> </div>
                                            <div class="col-sm-6">(Do not include fees paid directly by shipper to terminal)</div>
                                        </div><br>
                                        <div class="row m-b-sm">
                                            <div class="col-sm-4">Delivery Terminal Fee :</div>
                                            <div class="col-sm-2">$&nbsp;<?php echo $form->textField($model,'delivery_terminal_fee',array('size'=>'6')); ?> </div>
                                            <div class="col-sm-6">(Do not include fees paid directly by shipper to terminal)</div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">REFERRAL INFORMATION</div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="city">Referred by</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php echo $form->dropDownList($model,'referred_by',GlobalTrackerOrder::$enumReferBy,array('class'=>'form-control','prompt'=>'Select one')); ?>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- <div class="panel panel-default" style="display: none">
                        <div class="panel-heading">AUTHORIZED SIGNATURE</div>
                        <div class="panel-body">
                            <fieldset>


                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="signature">SIGNATURE</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group"><label for="signature">DATE</label></div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <?php //echo $form->textField($model,'extra2',array('class'=>'form-control','value'=>date('Y-m-d h:i:sa'))); ?>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                    </div> -->

                    <div class="col-sm-12">
                        <div class="form-group" style="float: right;">
                            <div class="row buttons" style="margin-top:30px;">
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('id'=>'subBtn','style'=>'margin-left:10px', 'name'=>'but1','class'=>'btn btn-success')); ?>
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save and Email' : 'Save and Email',array('id'=>'subBtn2','style'=>'margin-left:10px', 'name'=>'but2' ,'class'=>'btn btn-info')); ?>
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save and Message' : 'Save and Message',array('id'=>'subBtn3','style'=>'margin-left:10px', 'name'=>'but3' ,'class'=>'btn btn-warning')); ?>
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save, Email & Message' : 'Save, Email & Message',array('id'=>'subBtn4','style'=>'margin-left:10px', 'name'=>'but4' ,'class'=>'btn btn-primary')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    $(document).ready(function() {
        $('select[name="shipper"]').on('change',function() {
            if($(this).val()!='' && $(this).val()!='New Shipper') {
                updateContact($(this).val());
            }
        });

        $('select[name="originshipper"]').on('change',function() {
            if($(this).val()=='1')
            {
                resetPickup();
            }
            else{
                updatePickup();
            }
        });

        $('select[name="toshipper"]').on('change',function() {
            if($(this).val()=='1')
            {
                resetdelivery();
            }else{
                updatedelivery();
            }
        });
        
        $('#stateId').on('change', function() {
           updateStateVar($(this).val());
        });

        $('#pStateId').on('change', function() {
           updatePStateVar($(this).val());
        });
        var dateToday = new Date();
        $('#GlobalTrackerOrder_s_date').datepicker({ dateFormat: 'mm/dd/yy',minDate: dateToday });

        $('.remVehicle').on('click', function() {
            if($(this).closest('fieldset').attr('v-id')!=='1') {
                var idx = $(this).closest('fieldset').attr('v-id');
                $(this).closest('fieldset').hide();
                $('#Vehicle_tariff'+idx).val('');
                $('#Vehicle_deposit'+idx).val('');
                calcTariff();
                calcDeposit();
                popualateVal();
            } else {
                alert('You cannot remove First Vehicle');
            }
            return false;
        });

        updateVehVal();
        calcDeposit();
        calcTariff();
        popualateVal();

        $('#vehInf').find('input').on('change',function() {
            popualateVal();
        });

        $('#vehInf').find('select').on('change',function() {
            popualateVal();
        });

        if($('#Vehicle_tariff2').val()!=='') {
            $('#vehInf').find('fieldset[v-id="2"]').show();
        }

        if($('#Vehicle_tariff3').val()!=='') {
            $('#vehInf').find('fieldset[v-id="3"]').show();
        }

        if($('#Vehicle_tariff4').val()!=='') {
            $('#vehInf').find('fieldset[v-id="4"]').show();
        }

        if($('#Vehicle_tariff5').val()!=='') {
            $('#vehInf').find('fieldset[v-id="5"]').show();
        }
    });

    function updateStateVar(id)
    {
        $('#GlobalTrackerOrder_state').val(id);
    }

    function updatePStateVar(id)
    {
        $('#GlobalTrackerOrder_p_state').val(id);
    }

    function cloneEle(id)
    {
        $('#vehInf').append('<fieldset v-id="'+id+'">'+$('fieldset[v-id="1"]').html()+'</fieldset>');
    }

    function cloneEleOld(id)
    {
        $('#vehInf').append('<fieldset v-id="'+id+'">'+$('fieldset[v-id="1"]').html()+'</fieldset>');
    }

    function addVehicle()
    {
        var lastE=$('#vehInf').find('fieldset:visible:last').attr('v-id');
        lastE=parseInt(lastE)+1;

        console.log(lastE);
        $('#vehInf').find('fieldset[v-id="'+lastE+'"]').show();
        popualateVal();
    }

    /*function addVehicleOLd()
    {
        var lastE=$('#vehInf').find('fieldset:last').attr('v-id');
        lastE=lastE+1;
        cloneEle(lastE);
    }*/

    function popualateVal()
    {
        var arrV={};
        $.each($('input[id*="Vehicle"]'),function(index,val){
            arrV[$(val).attr('id')]=$(val).val();

        });
        $.each($('select[name*="Vehicle"]'),function(index,val){
            arrV[$(val).attr('name')]=$(val).val();

        });

        console.log(arrV);
        console.log(JSON.stringify(arrV));

        $('#GlobalTrackerOrder_vehicle_info').val(JSON.stringify(arrV));
    }

    function calcTariff()
    {
        var v1=0;
        if(!$('#Vehicle_tariff1').val()=='')
        {
            v1=$('#Vehicle_tariff1').val();
        }

       var v2=0;
        if(!$('#Vehicle_tariff2').val()=='')
        {
            v2=$('#Vehicle_tariff2').val();
        }

       var v3=0;
        if(!$('#Vehicle_tariff3').val()=='')
        {
            v3=$('#Vehicle_tariff3').val();
        }

       var v4=0;
        if(!$('#Vehicle_tariff4').val()=='')
        {
            v4=$('#Vehicle_tariff4').val();
        }

       var v5=0;
        if(!$('#Vehicle_tariff5').val()=='')
        {
            v5=$('#Vehicle_tariff5').val();
        }

        var valT=parseFloat(v1)+parseFloat(v2)+parseFloat(v3)+parseFloat(v4)+parseFloat(v5);
        valT = valT.toFixed(2);
        $('#tariffVal').html('$'+valT);
        $('#GlobalTrackerOrder_extra5').val(valT);
    }


    function calcDeposit()
    {
        var v1=0;
        if(!$('#Vehicle_deposit1').val()=='')
        {
            v1=$('#Vehicle_deposit1').val();
        }

        var v2=0;
        if(!$('#Vehicle_deposit2').val()=='')
        {
            v2=$('#Vehicle_deposit2').val();
        }

        var v3=0;
        if(!$('#Vehicle_deposit3').val()=='')
        {
            v3=$('#Vehicle_deposit3').val();
        }

        var v4=0;
        if(!$('#Vehicle_deposit4').val()=='')
        {
            v4=$('#Vehicle_deposit4').val();
        }

        var v5=0;
        if(!$('#Vehicle_deposit5').val()=='')
        {
            v5=$('#Vehicle_deposit5').val();
        }

        var valT=parseFloat(v1)+parseFloat(v2)+parseFloat(v3)+parseFloat(v4)+parseFloat(v5);
        valT = valT.toFixed(2);
        $('#depositVal').html('$'+valT);
        $('#GlobalTrackerOrder_extra6').val(valT);
    }


    function updateVehVal()
    {
        var jsonData=$('#GlobalTrackerOrder_vehicle_info').val();
        if(jsonData=='')
            return false;
        var jsonObj=jQuery.parseJSON(jsonData);
        $.each(jsonObj,function(i,v){
            $('#'+i).val(v);
        });
        console.log(jsonObj);

    }

    function updateContact(id) {
        var url='<?php echo Yii::app()->createUrl('account/getShipperData',array('id'=>'__id__')); ?>';
        url=url.replace('__id__',id);
        $.ajax({

            url : url,
            type : 'GET',
            dataType:'json',
            success : function(data) {
                $('#GlobalTrackerOrder_fname').val(data.fname);
                $('#GlobalTrackerOrder_lname').val(data.lname);
                $('#GlobalTrackerOrder_company').val(data.company_name);
                $('#GlobalTrackerOrder_email').val(data.email);
                $('#GlobalTrackerOrder_phone1').val(data.phone1);
                $('#GlobalTrackerOrder_phone2').val(data.phone2);
                $('#GlobalTrackerOrder_mobile').val(data.mobile);
                $('#GlobalTrackerOrder_address1').val(data.address);
                $('#GlobalTrackerOrder_city').val(data.city);
                $('#GlobalTrackerOrder_state').val(data.state);
                $('#GlobalTrackerOrder_zip').val(data.zip);
                $('#GlobalTrackerOrder_fax').val(data.fax);

                //alert('Data: '+data);
            },
            error : function(request,error)
            {
                alert("Request: "+JSON.stringify(request));
            }
        });
    }


    function updatePickup() {
        $('#GlobalTrackerOrder_p_city').val($('#GlobalTrackerOrder_city').val());
        $('#GlobalTrackerOrder_p_state').val($('#GlobalTrackerOrder_state').val());
        $('#GlobalTrackerOrder_p_zip').val($('#GlobalTrackerOrder_zip').val());
        $('#GlobalTrackerOrder_p_address1').val($('#GlobalTrackerOrder_address1').val());
    }

    function updatedelivery() {
        $('#GlobalTrackerOrder_d_city').val($('#GlobalTrackerOrder_city').val());
        $('#GlobalTrackerOrder_d_state').val($('#GlobalTrackerOrder_state').val());
        $('#GlobalTrackerOrder_d_zip').val($('#GlobalTrackerOrder_zip').val());
        $('#GlobalTrackerOrder_d_address').val($('#GlobalTrackerOrder_address1').val());
    }



    function resetPickup() {
        $('#GlobalTrackerOrder_p_city').val('');
        $('#GlobalTrackerOrder_p_state').val('');
        $('#GlobalTrackerOrder_p_zip').val('');
        $('#GlobalTrackerOrder_p_address1').val('');
    }

    function resetdelivery()
    {
        $('#GlobalTrackerOrder_d_city').val('');
        $('#GlobalTrackerOrder_d_state').val('');
        $('#GlobalTrackerOrder_d_zip').val('');
        $('#GlobalTrackerOrder_d_address').val('');
    }

    function addNote() {
        var arrData={quote_id:$('#quote_id').val(), note:$('#DotTracker_note').val()};

        var ajaxUrl='index.php?r=notes/updateAjax';
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: arrData,
            dataType: "json",
            success: function(html) {
                console.log(html);
                if(html.success==true) {
                    $('#noteArea').find('table tbody').append(html.html);
                    $('#DotTracker_note').val('');
                    //alert('savesccc');
                    $('#servicety33').val('1');
                    $("#successservicety33").html(html.msg);
                    $("#successservicety33").fadeIn();
                    setTimeout(function () {
                        $("#successservicety33").fadeOut();
                    },2000);
                    $('#servicety33S').fadeIn();
                    $('#DotTrackerMcReattachment_id').val(html.id);

                    var formDetails=JSON.parse($('#DotTrackerOrder_form_details').val());
                    console.log(formDetails);
                    formDetails.servicety33=html.id;
                    console.log(formDetails);
                    $('#DotTrackerOrder_form_details').val(JSON.stringify(formDetails));



                } else {
                    // alert('error');
                    $('#servicety33').val('0');
                    $("#errorservicety33").html(html.msg);
                    $("#errorservicety33").fadeIn();
                    setTimeout(function () {
                        $("#errorservicety33").fadeOut();
                    },2000);
                    $('#servicety33S').fadeOut();
                    $('#DotTrackerMcReattachment_id').val(html.id);
                }
            }
        });
    }

    function moveTo(status) {
        var idVal='<?php echo FilingGenerics::encryptKey($model->id); ?>';
        if(status === 'order') {
           var url = '<?php echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['order'])));?>';
        } 
        
        /**
            OrderFormController::actionChangeStatus()
            - michael harootoonyan
         */
        else if(status === 'not_signed') {
            //window.location.href = '<?php //echo Yii::app()->createurl('orderForm/dispatch&id='.$model->id.'&status=5'); ?>';
            var url = '<?php echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['not_signed'])));?>';
        } else if(status === 'dispatched') {
            //window.location.href = '<?php //echo Yii::app()->createurl('orderForm/dispatch&id='.$model->id.'&status=6'); ?>';
            var url = '<?php echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['dispatched'])));?>';
        } 
        
        else if(status === 'issues') {
            var url = '<?php echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['issues'])));?>';
        } else if(status === 'hold') {
            var url = '<?php echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['hold'])));?>';
        } else if(status === 'archived') {
            var url = '<?php echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['archived'])));?>';
        }
        url = url.replace('__id__', idVal);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'passKey': '2424324242dsfsdfs',
            },
            success: function (data) {
                if(status === 'order') {
                    $("#succmsg").html('Status has been changed to "Orders" successfully. ');
                } else if(status === 'not_signed') {
                    $("#succmsg").html('Status has been changed to "Not Signed" successfully. ');
                } else if(status === 'dispatched') {
                    $("#succmsg").html('Status has been changed to "Dispatched" successfully. ');
                } else if(status === 'issues') {
                    $("#succmsg").html('Status has been changed to "Issues" successfully. ');
                } else if(status === 'hold') {
                    $("#succmsg").html('Status has been changed to "Hold" successfully. ');
                } else if(status === 'archived') {
                    $("#succmsg").html('Status has been changed to "Archived" successfully. ');
                }
                $("#succmsg").fadeIn();
                setTimeout(function () {
                    $("#succmsg").fadeOut();
                },2000);
            }
        });
        /*if(status === 'dispatched') {
            window.location.href = '<?php //echo Yii::app()->createurl('orderForm/dispatch&id='.$model->id); ?>';
        } else if(status === 'not_signed') {
            window.location.href = '<?php //echo Yii::app()->createurl('orderForm/dispatch&id='.$model->id); ?>';
        }*/
    }

    /*function moveToOrder() {
        var idVal='<?php //echo FilingGenerics::encryptKey($model->id); ?>';
        var url = '<?php //echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['order'])));?>';
        url = url.replace('__id__', idVal);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'passKey': '2424324242dsfsdfs',
            },
            success: function (data) {
                $("#succmsg").html('Status has been changed to "Orders" successfully. ');
                $("#succmsg").fadeIn();
                setTimeout(function () {
                    $("#succmsg").fadeOut();

                },2000);
            }
        });
    }

    function moveTohold() {
        var idVal='<?php //echo FilingGenerics::encryptKey($model->id); ?>';
        var url = '<?php //echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['hold'])));?>';
        url = url.replace('__id__', idVal);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'passKey': '2424324242dsfsdfs',
            },
            success: function (data) {
                $("#succmsg").html('Status has been changed to "Hold" successfully. ');
                $("#succmsg").fadeIn();
                setTimeout(function () {
                    $("#succmsg").fadeOut();
                },2000);
            }
        });
    }

    function moveToArchive() {
        var idVal='<?php //echo FilingGenerics::encryptKey($model->id); ?>';
        var url = '<?php //echo Yii::app()->createUrl('orderForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerOrder::$enumStatus['archived'])));?>';
        url = url.replace('__id__', idVal);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'passKey': '2424324242dsfsdfs',
            },
            success: function (data) {
                $("#succmsg").html('Status has been changed to "Archived" successfully. ');
                $("#succmsg").fadeIn();
                setTimeout(function () {
                    $("#succmsg").fadeOut();

                },2000);
            }
        });
    }*/
</script>

<style>
    .panel-body {
        background: #f2f2f2!important;
    }
    .panel-default > .panel-heading {
        background-color:#e7e4e4;
    }
</style>