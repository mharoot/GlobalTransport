<?php
/* @var $this QuoteFormController */
/* @var $model GlobalTrackerQuote */
/* @var $form CActiveForm */
?>

<div class="form">

<?php if(!$model->isNewRecord) { ?>
<ul class="nav nav-tabs">
    <li><a href="?r=quoteForm/view&id=<?php echo $model->id; ?>">Quote Detail</a></li>
    <li class="active"><a href="?r=quoteForm/update&id=<?php echo $model->id; ?>">Edit Quote</a></li>
    <li><a href="?r=quoteForm/history&id=<?php echo $model->id; ?>">Quote History</a></li>
</ul>
<?php } ?>

<?php if(!$model->isNewRecord) { ?>
<?php if($model->status != GlobalTrackerQuote::$enumStatus['archived'])  { ?>
    <a id="archiveBtn" onclick="moveToArchive();" class="btn btn-info"
   style="margin: 10px;float: right;"><i
            class="fa fa-archive" style=""></i> Move to Cancelled</a>
<?php } ?>
<?php if($model->status != GlobalTrackerQuote::$enumStatus['hold'])  { ?>
<a id="holdBtn" onclick="moveTohold();" class="btn btn-info"
   style="margin:10px;float: right;"><i
            class="fa fa-stop"></i> Move to Hold</a>
    <?php } ?>

    <?php if($model->status != GlobalTrackerQuote::$enumStatus['quote'])  { ?>
        <a id="holdBtn" onclick="moveToQuote();" class="btn btn-info"
           style="margin:10px;float: right;"><i
                    class="fa fa-dollar"></i> Move to Quote</a>
    <?php } ?>
<?php } ?>


<div class="col-lg-12 alert alert-success" id="succmsg" style="display: none;"></div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'global-tracker-quote-form',
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
                    <br><p>Complete the form below and click Create Quote when finished. <br>Required fields are marked with a <span style="color: red">*</span>. </p><br>
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
                                                <option value="">New Shipper</option>
                                                <?php echo FilingGenerics::getContactList(); ?>
                                            </select>

                                            <?php if($model->isNewRecord){
                                                ?> <input type="checkbox" id="isSave" name="isSave"> Save Contact <?php } ?>
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
                        <div class="panel-heading">ORIGIN & DESTINATION</div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="nameon_card"><strong>From:</strong> Select Location</label>
                                        <select name="originshipper" class="form-control">
                                            <option value="1">New Location</option>
                                            <option value="Same as shipper">Same as shipper</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">City <span style="color: red">*</span></label>
                                        <?php echo $form->textField($model,'p_city',array('class'=>'form-control')); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Zip <span style="color: red">*</span></label>
                                        <?php echo $form->textField($model,'p_zip',array('class'=>'form-control')); ?>
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
                                <div class="col-sm-1">&nbsp;</div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="nameon_card"><strong>To:</strong> Select Location</label>
                                        <select name="toshipper" class="form-control">
                                            <option value="1">New Location</option>
                                            <option value="Same as shipper">Same as shipper</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">City <span style="color: red">*</span></label>
                                        <?php echo $form->textField($model,'d_city',array('class'=>'form-control')); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameon_card">Zip <span style="color: red">*</span></label>
                                        <?php echo $form->textField($model,'d_zip',array('class'=>'form-control')); ?>
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
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Delivery Information & Location -->


                    <!-- Shipping Information -->
                    <div class="panel panel-default">
                        <div class="panel-heading">SHIPPING INFORMATION</div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nameon_card">Estimated Ship Date <span style="color: red">*</span></label>
                                            <?php echo $form->textField($model,'s_date',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">Vehicle(s) Run <span style="color: red">*</span></label>
                                            <?php echo $form->dropDownList($model,'s_vrun',GlobalTrackerQuote::$arrVRun,array('class'=>'form-control','prompt'=>'Select one')); ?>

                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">Ship Via <span style="color: red">*</span></label>
                                            <?php echo $form->dropDownList($model,'s_via',GlobalTrackerQuote::$enumShipVia,array('class'=>'form-control','prompt'=>'Select one')); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-xs-hidden">&nbsp;</div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="nameon_card">Notes from Shipper</label>
                                            <?php echo $form->textField($model,'notes_shipper',array('class'=>'form-control')); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="nameon_card">Notes to Shipper</label>
                                            <?php echo $form->textField($model,'info_forShipper',array('class'=>'form-control')); ?>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Internal Notes</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="nameon_card">Enter Internal Notes (Only available when updating a quote!)</label>
                                <br/>
                                <div class="alert alert-success" id="successservicety33" style="display: none"></div>
                                <div class="alert alert-danger" id="errorservicety33" style="display: none"></div>
                                <div class="row">
                                    <input class="form-control" id="quote_id" type="hidden" value="<?php echo $model->id ?>">
                                    <!-- <input class="form-control" id="quote_id" value="<?php //alert($model->id) ?>"> -->
                                    <div class="col-lg-11">
                                        <div class="form-group">
                                            <input class="form-control" id="DotTracker_note" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <input id="addBtn" type="button" class="form-control btn btn-info" value="Add" onclick="addNote();">
                                        </div>
                                    </div>
                                </div>

                                <div id="noteArea">
                                    <table id="noteTable " class="table table-striped" style="margin-top:30px;">
                                        <tr>
                                            <td width="25%">Date</td>
                                            <td width="50%">Notes</td>
                                            <td width="25%">Added By</td>
                                        </tr>

                                            <!-- <td>06/12/2018 08:40:18 AM</td>
                                            <td>Charge the card on 06/20/2018.</td>
                                            <td>Tigran Gregorian<br>( tonygreg )  </td> -->
                                            <?php echo FilingGenerics::getNotes($model->id); ?>
                                        
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
                                        <div class="col-sm-4">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <span style="display: none" class="btn btn-danger remVehicle">Remove Vehicles</span>
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
                                                    <input id="Vehicle_deposit1" name="deposit" onkeyup="calcDeposit();" size="9" type="text" value="<?php echo $settings->deposit; ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Year/Make <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input id="Vehicle_year1" name="year" size="4" type="text"/>
                                                    <input id="Vehicle_make1" name="make" size="15" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Model <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input id="Vehicle_model1" name="model" size="25" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-sm-3">
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
                                        </div>

                                        <!-- <div class="col-sm-4"> 
                                            <div class="form-group">
                                                <label for="nameon_card">Tariff <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_tariff1" name="tariff" onkeyup="calcTariff();" size="15" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nameon_card">Deposit <span style="color: red">*</span></label>
                                                <input class="form-control" id="Vehicle_deposit1" name="deposit" onkeyup="calcDeposit();" size="15" type="text" value="<?php //echo $settings->deposit; ?>"/>
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
                                        </div> -->
                                    </div>
                                </fieldset>

                                <fieldset style="display:none; margin-bottom:30px;" v-id="2">
                                    <div class="row">
                                        <div class="col-sm-4">
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
                                        <div class="col-sm-8">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Year/Make <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input id="Vehicle_year2" name="year" size="4" type="text" />
                                                    <input id="Vehicle_make2" name="make" size="15" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Model <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input id="Vehicle_model2" name="model" size="25" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-sm-3">
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
                                        </div> -->
                                    </div>
                                </fieldset>

                                <fieldset style="display:none; margin-bottom:30px;" v-id="3">
                                    <div class="row">
                                        <div class="col-sm-4">
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
                                        <div class="col-sm-8">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Year/Make <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input id="Vehicle_year3" name="year" size="4" type="text" />
                                                    <input id="Vehicle_make3" name="make" size="15" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Model <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input id="Vehicle_model3" name="model" size="25" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-sm-3">
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
                                        </div>

                                        <!-- <div class="col-sm-4">
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
                                        </div> -->
                                    </div>
                                </fieldset>

                                <fieldset style="display:none; margin-bottom:30px;" v-id="4">
                                    <div class="row">
                                        <div class="col-sm-4">
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
                                        <div class="col-sm-8">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Year/Make <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input id="Vehicle_year4" name="year" size="4" type="text" />
                                                    <input id="Vehicle_make4" name="make" size="15" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Model <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input id="Vehicle_model4" name="model" size="25" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-sm-3">
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
                                        </div>

                                        <!-- <div class="col-sm-4">
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
                                        </div> -->
                                    </div>
                                </fieldset>

                                <fieldset style="display:none;" v-id="5">
                                    <div class="row">
                                        <div class="col-sm-4">
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
                                        <div class="col-sm-8">
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Year/Make <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input id="Vehicle_year5" name="year" size="4" type="text" />
                                                    <input id="Vehicle_make5" name="make" size="15" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom:10px;">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Model <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input id="Vehicle_model5" name="model" size="25" type="text"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-2" style="text-align:right;">
                                                    <label for="nameon_card">Type <span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-sm-3">
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
                                        </div>

                                        <!-- <div class="col-sm-4">
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
                                        <?php echo $form->dropDownList($model,'referred_by',GlobalTrackerQuote::$enumReferBy,array('class'=>'form-control','prompt'=>'Select one'));?>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>



                    <div class="col-sm-12" style="margin-bottom: 50px;">
                        <div class="form-group" style="float: right;">
                            <div class="row buttons" style="margin-top:30px;">
                               <?php if(!$model->isNewRecord) {?>
                                   <a href="<?php echo Yii::app()->createUrl('quoteForm/convert',array('id'=>$model->id));?>"><span class="btn btn-primary">Convert to Order</span></a>
                               <?php }?>
                               &nbsp;&nbsp;
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('id'=>'subBtn','name'=>'but1','class'=>'btn btn-success')); ?>
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save and Email' : 'Save and Email',array('id'=>'subBtn2','style'=>'margin-left:10px','name'=>'but2','class'=>'btn btn-info')); ?>
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save and Message ' : 'Save and Message',array('id'=>'subBtn3','style'=>'margin-left:10px','name' =>'but3','class'=>'btn btn-warning')); ?>
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Save, Email & Message' : 'Save, Email & Message',array('id'=>'subBtn4','style'=>'margin-left:10px','name'=>'but4','class'=>'btn btn-primary')); ?>
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
        if(! $("#quote_id").val()) {
            $("#addBtn").attr("disabled", "true");
        }

        $('select[name="shipper"]').on('change',function() {
           if($(this).val()!='')
           {
               updateContact($(this).val());
           }
        });

        $('select[name="originshipper"]').on('change',function(){
            if($(this).val()=='1')
            {
                resetPickup();
            }
            else{
                updatePickup();
            }
        });

        $('select[name="toshipper"]').on('change',function(){
            if($(this).val()=='1')
            {
                resetdelivery();
            }
            else
            {
                updatedelivery();
            }
        });

        $('#stateId').on('change',function(){
           updateStateVar($(this).val());
        });

        $('#pStateId').on('change',function(){
           updatePStateVar($(this).val());
        });
        var dateToday = new Date();
        $('#GlobalTrackerQuote_s_date').datepicker({ dateFormat: 'mm/dd/yy',minDate: dateToday });

        $('.remVehicle').on('click',function() {
            if($(this).closest('fieldset').attr('v-id') !== '1') {
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

        $('#vehInf').find('input').on('change',function(){
            popualateVal();
        });

        $('#vehInf').find('select').on('change',function(){
            popualateVal();
        });

        if($('#Vehicle_tariff2').val()!=='')
        {
            $('#vehInf').find('fieldset[v-id="2"]').show();
        }


        if($('#Vehicle_tariff3').val()!=='')
        {
            $('#vehInf').find('fieldset[v-id="3"]').show();
        }


        if($('#Vehicle_tariff4').val()!=='')
        {
            $('#vehInf').find('fieldset[v-id="4"]').show();
        }


        if($('#Vehicle_tariff5').val()!=='')
        {
            $('#vehInf').find('fieldset[v-id="5"]').show();
        }
    });

    function updateStateVar(id)
    {
        $('#GlobalTrackerQuote_state').val(id);
    }

    function updatePStateVar(id)
    {
        $('#GlobalTrackerQuote_p_state').val(id);
    }

    function cloneEle(id)
    {
        $('#vehInf').append('<fieldset v-id="'+id+'">'+$('fieldset[v-id="1"]').html()+'</fieldset>');
    }

    function cloneEleOld(id)
    {
        $('#vehInf').append('<fieldset v-id="'+id+'">'+$('fieldset[v-id="1"]').html()+'</fieldset>');
    }

    function addVehicle() {
        var lastE = $('#vehInf').find('fieldset:visible:last').attr('v-id');
        lastE = parseInt(lastE) + 1;

        console.log(lastE);
        $('#vehInf').find('fieldset[v-id="'+lastE+'"]').show();
        $('#Vehicle_deposit'+lastE).val('<?php echo $settings->deposit; ?>');
        calcDeposit();
        popualateVal();
    }

    /*function addVehicleOLd()
    {
        var lastE = $('#vehInf').find('fieldset:last').attr('v-id');
        console.log(lastE);
        lastE = lastE + 1;

        cloneEle(lastE);
    }*/

    function popualateVal()
    {
        var arrV={};
        $.each($('input[id*="Vehicle"]'), function(index, val){
            arrV[$(val).attr('id')] = $(val).val();
        });
        $.each($('select[name*="Vehicle"]'), function(index, val){
            arrV[$(val).attr('name')] = $(val).val();
        });

        console.log(arrV);
        console.log(JSON.stringify(arrV));

        $('#GlobalTrackerQuote_vehicle_info').val(JSON.stringify(arrV));
    }

    function calcTariff()
    {
        var v1 = 0;
        if(!$('#Vehicle_tariff1').val() == '')
        {
            v1 = parseFloat($('#Vehicle_tariff1').val());
        }

       var v2 = 0;
        if(!$('#Vehicle_tariff2').val() == '')
        {
            v2 = $('#Vehicle_tariff2').val();
        }

       var v3 = 0;
        if(!$('#Vehicle_tariff3').val() == '')
        {
            v3 = $('#Vehicle_tariff3').val();
        }

       var v4 = 0;
        if(!$('#Vehicle_tariff4').val() == '')
        {
            v4 = $('#Vehicle_tariff4').val();
        }

       var v5 = 0;
        if(!$('#Vehicle_tariff5').val() == '')
        {
            v5 = $('#Vehicle_tariff5').val();
        }

        var valT = parseFloat(v1) + parseFloat(v2) + parseFloat(v3) + parseFloat(v4) + parseFloat(v5);
        valT = valT.toFixed(2);
        $('#tariffVal').html('$' + valT);
        $('#GlobalTrackerQuote_extra5').val(valT);
    }

    function calcDeposit() {
        var v1 = 0;
        if(!$('#Vehicle_deposit1').val() == '') {
            v1 = $('#Vehicle_deposit1').val();
        }

        var v2 = 0;
        if(!$('#Vehicle_deposit2').val() == '')
        {
            v2 = $('#Vehicle_deposit2').val();
        }

        var v3 = 0;
        if(!$('#Vehicle_deposit3').val() == '')
        {
            v3 = $('#Vehicle_deposit3').val();
        }

        var v4 = 0;
        if(!$('#Vehicle_deposit4').val() == '')
        {
            v4 = $('#Vehicle_deposit4').val();
        }

        var v5 = 0;
        if(!$('#Vehicle_deposit5').val() == '')
        {
            v5 = $('#Vehicle_deposit5').val();
        }

        var valT = parseFloat(v1) + parseFloat(v2) + parseFloat(v3) + parseFloat(v4) + parseFloat(v5);
        valT = valT.toFixed(2);
        $('#depositVal').html('$' + valT);
        $('#GlobalTrackerQuote_extra6').val(valT);
    }

    function updateVehVal()
    {
        var jsonData = $('#GlobalTrackerQuote_vehicle_info').val();
        if(jsonData == '')
            return false;
        var jsonObj = jQuery.parseJSON(jsonData);
        $.each(jsonObj, function(i, v){
            $('#' + i).val(v);
        });
        console.log(jsonObj);
    }

    function updateContact(id)
    {
        var url='<?php echo Yii::app()->createUrl('account/getShipperData',array('id'=>'__id__')); ?>';
        url=url.replace('__id__',id);
        $.ajax({
            url : url,
            type : 'GET',
            dataType:'json',
            success : function(data) {
                $('#GlobalTrackerQuote_fname').val(data.fname);
                $('#GlobalTrackerQuote_lname').val(data.lname);
                $('#GlobalTrackerQuote_company').val(data.company_name);
                $('#GlobalTrackerQuote_email').val(data.email);
                $('#GlobalTrackerQuote_phone1').val(data.phone1);
                $('#GlobalTrackerQuote_phone2').val(data.phone2);
                $('#GlobalTrackerQuote_mobile').val(data.mobile);
                $('#GlobalTrackerQuote_address1').val(data.address);
                $('#GlobalTrackerQuote_city').val(data.city);
                $('#GlobalTrackerQuote_state').val(data.state);
                $('#GlobalTrackerQuote_zip').val(data.zip);
                $('#GlobalTrackerQuote_fax').val(data.fax);

                //alert('Data: '+data);
            },
            error : function(request,error)
            {
                alert("Request: "+JSON.stringify(request));
            }
        });
    }

    function updatePickup()
    {
        $('#GlobalTrackerQuote_p_city').val($('#GlobalTrackerQuote_city').val());
        $('#GlobalTrackerQuote_p_state').val($('#GlobalTrackerQuote_state').val());
        $('#GlobalTrackerQuote_p_zip').val($('#GlobalTrackerQuote_zip').val());
    }

    function updatedelivery()
    {
        $('#GlobalTrackerQuote_d_city').val($('#GlobalTrackerQuote_city').val());
        $('#GlobalTrackerQuote_d_state').val($('#GlobalTrackerQuote_state').val());
        $('#GlobalTrackerQuote_d_zip').val($('#GlobalTrackerQuote_zip').val());
    }

    function resetPickup()
    {
        $('#GlobalTrackerQuote_p_city').val('');
        $('#GlobalTrackerQuote_p_state').val('');
        $('#GlobalTrackerQuote_p_zip').val('');
    }

    function resetdelivery()
    {
        $('#GlobalTrackerQuote_d_city').val('');
        $('#GlobalTrackerQuote_d_state').val('');
        $('#GlobalTrackerQuote_d_zip').val('');
    }

    function addNote() {
        var arrData = {quote_id:$('#quote_id').val(), note:$('#DotTracker_note').val()};
        var ajaxUrl = 'index.php?r=notes/updateAjax';
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: arrData,
            dataType: "json",
            success: function(html) {
                console.log(html);
                if(html.success == true) {
                    $('#noteArea').find('table tbody').append(html.html);
                    $('#DotTracker_note').val('');
                    $('#servicety33').val('1');
                    $("#successservicety33").html(html.msg);
                    $("#successservicety33").fadeIn();
                    setTimeout(function () {
                        $("#successservicety33").fadeOut();
                    },2000);
                    $('#servicety33S').fadeIn();
                    $('#DotTrackerMcReattachment_id').val(html.id);

                    var formDetails = JSON.parse($('#DotTrackerOrder_form_details').val());
                    console.log(formDetails);
                    formDetails.servicety33 = html.id;
                    console.log(formDetails);
                    $('#DotTrackerOrder_form_details').val(JSON.stringify(formDetails));
                } else {
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

    function moveToQuote() {
        var idVal='<?php echo FilingGenerics::encryptKey($model->id); ?>';
        var url = '<?php echo Yii::app()->createUrl('quoteForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerQuote::$enumStatus['quote'])));?>';
        url = url.replace('__id__', idVal);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'passKey': '2424324242dsfsdfs',
            },
            success: function (data) {
                $("#succmsg").html('Status has been changed to "Quote" successfully. ');
                $("#succmsg").fadeIn();
                setTimeout(function () {
                    $("#succmsg").fadeOut();
                },2000);
            }
        });
    }

    function moveTohold() {
        var idVal='<?php echo FilingGenerics::encryptKey($model->id); ?>';
        var url = '<?php echo Yii::app()->createUrl('quoteForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerQuote::$enumStatus['hold'])));?>';
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
        var idVal='<?php echo FilingGenerics::encryptKey($model->id); ?>';
        var url = '<?php echo Yii::app()->createUrl('quoteForm/changeStatus', array('id' => '__id__', 'status' => FilingGenerics::encryptKey(GlobalTrackerQuote::$enumStatus['archived'])));?>';
        url = url.replace('__id__', idVal);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'passKey': '2424324242dsfsdfs',
            },
            success: function (data) {
                $("#succmsg").html('Status has been changed to "Cancelled" successfully. ');
                $("#succmsg").fadeIn();
                setTimeout(function () {
                    $("#succmsg").fadeOut();

                },2000);
            }
        });
    }

</script>

<style type="text/css">
    .panel-body {
        background: #f2f2f2!important;
    }
    .panel-default > .panel-heading {
        background-color:#e7e4e4;
    }
</style>