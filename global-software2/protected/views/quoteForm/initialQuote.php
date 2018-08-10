<h2>Vehicle Shipment Order Form</h2>

<div class="row">
	<div class="col-sm-12">
		<h3 style="color:blue;">Order Information</h3>
	</div>
	<div class="col-sm-12">
		<h4>Order ID:&nbsp;<strong><?php echo $model->quote_id; ?>-QT</strong>&nbsp;&nbsp;
		Deposit:&nbsp;<strong>$<?php echo $model->extra6; ?></strong>&nbsp;&nbsp;
		Quote Total:&nbsp;<strong>$<?php echo $model->extra5; ?></strong></h4>
	</div>
</div><hr/>
<div class="col-sm-12 alert alert-success" id="succmsg" style="display: none;"></div>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'global-tracker-review-form',
    //'action' => Yii::app()->createUrl('orderForm/convert', array('id'=>$model->quote_id)),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="row" style="width:80%;">
    <div class="panel panel-default">
        <div class="panel-heading" style="font-size:20px; color:blue;">Your Contact Information</div>
        <?php echo $form->errorSummary($model); ?>
        <div id="successPayment" class="alert alert-success" style="display: none"> </div>
        <div id="errPayment" class="alert alert-warning" style="display: none"> </div>
        <div class="panel-body">
            <fieldset>
                <div class="row">
                    <div class="col-sm-6" >
                        <div class="form-group">
                            <label for="nameon_card">First Name <span style="color: red">*</span></label>
                            <?php echo $form->textField($model,'fname',array('class'=>'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <label for="nameon_card">Last Name <span style="color: red">*</span></label>
                            <?php echo $form->textField($model,'lname',array('class'=>'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <label for="nameon_card">Email</label>
                            <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <label for="nameon_card">Mobile <span style="color: red">*</span></label>
                            <?php echo $form->textField($model,'mobile',array('class'=>'form-control')); ?>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                    	<div class="form-group">
                            <label for="nameon_card">Company</label>
                            <?php echo $form->textField($model,'company',array('class'=>'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <label for="nameon_card">Address</label>
                            <?php echo $form->textField($model,'address1',array('class'=>'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <label for="nameon_card">City</label>
                            <?php echo $form->textField($model,'city',array('class'=>'form-control')); ?>
                        </div>
                        <div class="col-sm-6">
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
	                    </div>
	                    <div class="col-sm-6">
	                        <div class="form-group">
	                            <label for="nameon_card">Zip</label>
	                            <?php echo $form->textField($model,'zip',array('class'=>'form-control'));?>
	                        </div>
	                    </div>
                	</div>
                </div>
            </fieldset>
        </div>
    </div>
</div><hr>

<div class="row" style="width:80%;">
    <div class="panel panel-default">
        <div class="panel-heading" style="font-size:20px; color:blue;">Vehicle and Shipping Details<span style="float:right;">Quote: $<?php echo $model->extra5; ?></span></div>
        <div class="panel-body">
            <div class="row">
            	<div class="col-sm-4">
                	<div class="form-group">
                        <label for="nameon_card">Estimated Ship Date<span style="color: red">*</span></label>
                        <?php echo $form->textField($model,'s_date',array('class'=>'form-control')); ?>
                    </div>
            	</div>
            	<div class="col-sm-4">
                	<div class="form-group">
                        <label for="nameon_card">Vehicle(s) Run <span style="color: red">*</span></label>
                        <?php echo $form->dropDownList($model,'s_vrun',GlobalTrackerQuote::$arrVRun,array('class'=>'form-control','prompt'=>'Select one')); ?>
                    </div>
            	</div>
            	<div class="col-sm-4">
                	<div class="form-group">
                        <label for="nameon_card">Ship Via <span style="color: red">*</span></label>
                        <?php echo $form->dropDownList($model,'s_via',GlobalTrackerQuote::$enumShipVia,array('class'=>'form-control','prompt'=>'Select one')); ?>
                    </div>
            	</div>
            </div>

            <div class="row">
                <?php 
                    echo $form->hiddenField($model,'vehicle_info',array('class'=>'form-control'));
                    $obj = json_decode($model->vehicle_info);
                ?>
                <div id="vehInf">
                    <fieldset v-id="1" style="margin-bottom:30px;">
                        <div class="row">
                            <div style="width:25%; float:left; display:none;">
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
                            <div style="width:50%; float:left;">
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
                            <div style="width:50%; float:left;">
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
                        </div>
                    </fieldset>

                    <fieldset style="display:none; margin-bottom:30px;" v-id="2">
                        <div class="row">
                            <div style="width:25%; float:left; display:none;">
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
                                        <input id="Vehicle_tariff2" name="tariff" size="9" type="text" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-4" style="text-align:right;">
                                        <label for="nameon_card">Deposit <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-sm-8">$
                                        <input id="Vehicle_deposit2" name="deposit" size="9" type="text"/>
                                    </div>
                                </div>
                            </div>
                            <div style="width:50%; float:left;">
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
                            <div style="width:50%; float:left;">
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
                        </div>
                    </fieldset>

                    <fieldset style="display:none; margin-bottom:30px;" v-id="3">
                        <div class="row">
                            <div style="width:25%; float:left; display:none;">
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
                            <div style="width:50%; float:left;">
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
                            <div style="width:50%; float:left;">
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
                        </div>
                    </fieldset>

                    <fieldset style="display:none; margin-bottom:30px;" v-id="4">
                        <div class="row">
                            <div style="width:25%; float:left; display:none;">
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
                            <div style="width:50%; float:left;">
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
                            <div style="width:50%; float:left;">
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
                        </div>
                    </fieldset>

                    <fieldset style="display:none;" v-id="5">
                        <div class="row">
                            <div style="width:25%; float:left; display:none;">
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
                            <div style="width:50%; float:left;">
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
                            <div style="width:50%; float:left;">
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
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row" style="width:80%;">
	<div class="row" style="width:50%; float:left;">
	    <div class="panel panel-default">
	        <div class="panel-heading" style="font-size:20px; color:blue;">Pickup Address?</div>
	        <div class="panel-body">
	            <fieldset>
	                <div class="row">
	                    <div class="col-sm-12" >
	                        <div class="form-group">
	                            <label for="nameon_card">Company Name</label>
	                            <?php echo $form->textField($model,'p_companyname',array('class'=>'form-control')); ?>
	                        </div>
	                        <div class="form-group">
		                        <label for="nameon_card">Address</label>
		                        <?php echo $form->textField($model,'p_address1',array('class'=>'form-control')); ?>
		                    </div>
		                    <div class="form-group">
                                <label for="nameon_card">City <span style="color: red">*</span></label>
                                <?php echo $form->textField($model,'p_city',array('class'=>'form-control')); ?>
                            </div>
                            <div class="col-sm-8">
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
		                            <label for="nameon_card">Zip <span style="color: red">*</span></label>
		                            <?php echo $form->textField($model,'p_zip',array('class'=>'form-control'));?>
		                        </div>
		                    </div>
		                    <div class="form-group">
                                <label for="nameon_card">Contact Name</label>
                                <?php echo $form->textField($model,'p_contactname',array('class'=>'form-control')); ?>
                            </div>
	                        <div class="form-group">
                                <label for="nameon_card">Phone Number</label>
                                <?php echo $form->textField($model,'p_phone1',array('class'=>'form-control')); ?>
                            </div>
	                    </div>
	                </div>
	            </fieldset>
	        </div>
	    </div>
	</div>
	<div class="row" style="width:50%; float:right;">
	    <div class="panel panel-default">
	        <div class="panel-heading" style="font-size:20px; color:blue;">Delievery Address?</div>
	        <div class="panel-body">
	            <fieldset>
	                <div class="row">
	                    <div class="col-sm-12" >
	                        <div class="form-group">
                                <label for="nameon_card">Company Name</label>
                                <?php echo $form->textField($model,'d_company_name',array('class'=>'form-control')); ?>
                            </div>
	                        <div class="form-group">
                                <label for="nameon_card">Address</label>
                                <?php echo $form->textField($model,'d_address',array('class'=>'form-control')); ?>
                            </div>
		                    <div class="form-group">
                                <label for="nameon_card">City <span style="color: red">*</span></label>
                                <?php echo $form->textField($model,'d_city',array('class'=>'form-control')); ?>
                            </div>
                            <div class="col-sm-8">
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
		                    <div class="col-sm-4">
		                        <div class="form-group">
		                            <label for="nameon_card">Zip <span style="color: red">*</span></label>
		                            <?php echo $form->textField($model,'d_zip',array('class'=>'form-control'));?>
		                        </div>
		                    </div>
		                    <div class="form-group">
                                <label for="nameon_card">Contact Name</label>
                                <?php echo $form->textField($model,'d_contact_name',array('class'=>'form-control')); ?>
                            </div>
	                        <div class="form-group">
                                <label for="nameon_card">Phone Number</label>
                                <?php echo $form->textField($model,'d_phone1',array('class'=>'form-control')); ?>
                            </div>
	                    </div>
	                </div>
	            </fieldset>
	        </div>
	    </div>
	</div>
</div><hr>

<div class="row" style="width:80%;">
	<h3 style="color:blue;">Payment details:</h3>
	<p>Today I will pay the Deposit only ($<?php echo $model->extra6; ?>)</p>
</div><hr>

<div class="row" style="width:80%;">
	<div class="col-sm-12" style="display:inline-block;">
		<input type="checkbox" id="enableBtn" name="enableBtn" onclick="enableSubmit()">
		<label><span style="color: red">*</span> By clicking on the button below, I acknowledge that I have read the <a style="text-decoration:underline;" href="">Terms of Use</a>, the <a style="text-decoration:underline;" href="">Privacy Policy Addendum</a>, and the terms and conditions below </label><label>(if any) and agree to be bound by their terms.</label>
	</div>
</div>

<div class="row" style="margin-left:400px;">
    <input class="btn btn-success " type="button" value="Process Payment" onclick="processPayment();" style="float: right;">
</div>

<!-- <div class="row" style="margin-left:400px;">
    <form action="https://secure.authorize.net/gateway/transact.dll" method="post">
        <input type="hidden" name="x_login" value="3yYdm7G3mtFY" />
        <input type="hidden" name="x_tran_key" value="8uJWa8q4b4t2CV7s" />
        <input type="hidden" name="x_amount" value="1.00" />
        <input type="submit" name="submitBtn" value="Process Payment"/>
    </form>
</div> -->

<!-- <div class="row">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('id'=>'covBtn', 'style'=>'margin-left:400px;', 'name'=>'covBut', 'class'=>'btn btn-success', 'disabled'=>'true')); ?>
</div> -->
<!-- <a href="<?php //echo Yii::app()->createUrl('quoteForm/quoteReview', array('id'=>$model->quote_id));?>"><span class="btn btn-success" style="margin-left:400px;">Submit</span></a> -->
<hr>
<?php $this->endWidget(); ?>


<script>
	$(document).ready(function() {
        var dateToday = new Date();
        $('#GlobalTrackerOrder_s_date').datepicker({ dateFormat:'mm/dd/yy', minDate:dateToday });

        updateVehVal();
        popualateVal();

        $('#vehInf').find('input').on('change',function() {
            popualateVal();
        });

        $('#vehInf').find('select').on('change',function() {
            popualateVal();
        });

        if($('#Vehicle_tariff2').val() !== '') {
            $('#vehInf').find('fieldset[v-id="2"]').show();
        }

        if($('#Vehicle_tariff3').val() !== '') {
            $('#vehInf').find('fieldset[v-id="3"]').show();
        }

        if($('#Vehicle_tariff4').val() !== '') {
            $('#vehInf').find('fieldset[v-id="4"]').show();
        }

        if($('#Vehicle_tariff5').val()!=='') {
            $('#vehInf').find('fieldset[v-id="5"]').show();
        }
    });

    /*function cloneEle(id) {
        $('#vehInf').append('<fieldset v-id="'+id+'">'+$('fieldset[v-id="1"]').html()+'</fieldset>');
    }*/

    function popualateVal() {
        var arrV = {};
        $.each($('input[id*="Vehicle"]'),function(index,val){
            arrV[$(val).attr('id')] = $(val).val();

        });
        $.each($('select[name*="Vehicle"]'),function(index,val){
            arrV[$(val).attr('name')] = $(val).val();

        });

        console.log(arrV);
        console.log(JSON.stringify(arrV));

        $('#GlobalTrackerOrder_vehicle_info').val(JSON.stringify(arrV));
    }

    function updateVehVal() {
        var jsonData = $('#GlobalTrackerOrder_vehicle_info').val();
        if(jsonData == '')
            return false;
        var jsonObj = jQuery.parseJSON(jsonData);
        $.each(jsonObj,function(i,v) {
            $('#'+i).val(v);
        });
        console.log(jsonObj);
    }

    function enableSubmit() {
		if($("#enableBtn").is(':checked')) {
			$("#covBtn").prop("disabled", false);
		} else {
			$("#covBtn").prop("disabled", true);
		}
    }

    function processPayment() {
        $.ajax({
            //url: "http://fmcsafiling.com/payments/charge-card.php?id="+id+"&e="+email,
            url: "http://globaltransportationsoftware.com/charge-card.php",
            dataType:"json",
            success: function(result) {
                alert(result);
            }
        });
        /*var request = {
            "authenticateTestRequest": {
                "merchantAuthentication": {
                    "name": "3yYdm7G3mtFY",
                    "transactionKey": "8uJWa8q4b4t2CV7s"
                }
            }
        }*/
    }
</script>