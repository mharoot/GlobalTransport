<?php
/* @var $this AccountinfoController */

$this->breadcrumbs=array(
	'Accountinfo',
);
?>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'global-tracker-accountinfo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->errorSummary($model); ?>

<h2>Account Info</h2>
<p>Below find your account information. Make any desired changes and click "Update Information" when you are done. Required fields are marked with a *.</p>

<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<label style="color: green; font-size: 20px;">Contact Information</label>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Company Name</label></div>
                		<div class="col-md-8"><label>Ampm Auto Transport</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<label>To edit your company name, call jTracker support at 800-928-7869.</label>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Owner</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'owner',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12" style="padding-bottom: 3px;">
                		<div class="col-md-4"><label>Address*</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'address',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                	<div class="col-md-12">
                		<div class="col-md-4"></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'address1',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>City*</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'city',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>State*/Zip*</label></div>
                		<div class="col-md-6">
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
                            	'OC'=>'OTHER COUNTRIES')); 
                            ?>
                		</div>
                		<div class="col-md-2">
                			<?php echo $form->textField($model,'zip',array('size'=>'5')); ?>
                			<!-- <input type="text" name="" size="5"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12" style="padding-bottom: 3px;">
                		<div class="col-md-4"><label>Country</label></div>
                		<div class="col-md-8">
                			<?php echo $form->dropDownList($model,'country',array(
                                ''=>'- select one -',
                                '1'=>'United States',
                                '2'=>'Canada',
                                '3'=>'Mexico',
                                '4'=>'Afghanistan',
                                '5'=>'Albania',
                                '6'=>'Algeria',
                                '202'=>'American Samoa',
                                '203'=>'Andorra',
                                '7'=>'Angola',
                                '8'=>'Antigua and Barbuda',
                                '9'=>'Argentina',
                                '10'=>'Armenia',
                                '11'=>'Aruba',
                                '12'=>'Australia',
                                '13'=>'Austria',
                                '14'=>'Azerbaijan',
                                '15'=>'Bahamas',
                                '16'=>'Bahrain',
                                '17'=>'Bangladesh',
                                '18'=>'Barbados',
                                '19'=>'Belarus',
                                '20'=>'Belgium',
                                '21'=>'Belgium/Luxembourg',
                                '22'=>'Belize',
                                '23'=>'Benin',
                                '24'=>'Bermuda',
                                '25'=>'Bhutan',
                                '26'=>'Bolivia',
                                '27'=>'Bosnia and Herzegovina',
                                '28'=>'Botswana',
                                '29'=>'Brazil',
                                '204'=>'British Virgin Islands',
                                '30'=>'Brunei Darussalam',
                                '31'=>'Bulgaria',
                                '32'=>'Burkina Faso',
                                '33'=>'Burundi',
                                '34'=>'Cambodia',
                                '35'=>'Cameroon',
                                '37'=>'Cape Verde',
                                '205'=>'Cayman Islands',
                                '38'=>'Central African Rep',
                                '39'=>'Chad',
                                '206'=>'Channel Islands',
                                '40'=>'Chile',
                                '41'=>'China',
                                '42'=>'Colombia',
                                '43'=>'Comoros',
                                '44'=>'Congo',
                                '45'=>'Congo, Dem Rep',
                                '207'=>'Cook Islands',
                                '46'=>'Costa Rica',
                                '47'=>'Cote dIvoire',
                                '48'=>'Croatia',
                                '49'=>'Cuba',
                                '50'=>'Cyprus',
                                '51'=>'Czech Rep',
                                '52'=>'Denmark',
                                '53'=>'Djibouti',
                                '54'=>'Dominica',
                                '55'=>'Dominican Rep',
                                '208'=>'East Timor',
                                '56'=>'Ecuador',
                                '57'=>'Egypt',
                                '58'=>'El Salvador',
                                '59'=>'Equatorial Guinea',
                                '60'=>'Eritrea',
                                '61'=>'Estonia',
                                '62'=>'Ethiopia',
                                '209'=>'Faeroe Islands',
                                '210'=>'Falkland Islands',
                                '63'=>'Fiji',
                                '64'=>'Finland',
                                '65'=>'France',
                                '66'=>'French Guiana',
                                '67'=>'French Polynesia',
                                '68'=>'Gabon',
                                '69'=>'Gambia',
                                '228'=>'Gaza Strip',
                                '70'=>'Georgia',
                                '71'=>'Germany',
                                '72'=>'Ghana',
                                '212'=>'Gibraltar',
                                '73'=>'Greece',
                                '213'=>'Greenland',
                                '74'=>'Grenada',
                                '75'=>'Guadeloupe',
                                '214'=>'Guam',
                                '76'=>'Guatemala',
                                '77'=>'Guinea',
                                '78'=>'Guinea-Bissau',
                                '79'=>'Guyana',
                                '80'=>'Haiti',
                                '81'=>'Honduras',
                                '82'=>'Hong Kong',
                                '83'=>'Hungary',
                                '84'=>'Iceland',
                                '85'=>'India',
                                '86'=>'Indonesia',
                                '87'=>'Iran, Islamic Rep',
                                '88'=>'Iraq',
                                '89'=>'Ireland',
                                '215'=>'Isle of Man',
                                '90'=>'Israel',
                                '91'=>'Italy',
                                '92'=>'Jamaica',
                                '93'=>'Japan',
                                '94'=>'Jordan',
                                '95'=>'Kazakhstan',
                                '96'=>'Kenya',
                                '97'=>'Kiribati',
                                '98'=>'Korea, Dem Peoples Rep',
                                '99'=>'Korea, Rep',
                                '100'=>'Kuwait',
                                '101'=>'Kyrgyzstan',
                                '102'=>'Lao Peoples Dem Rep',
                                '103'=>'Latvia',
                                '104'=>'Lebanon',
                                '105'=>'Lesotho',
                                '106'=>'Liberia',
                                '107'=>'Libyan Arab Jamahiriya',
                                '216'=>'Liechtenstein',
                                '108'=>'Lithuania',
                                '109'=>'Luxembourg',
                                '110'=>'Macau',
                                '111'=>'Macedonia, FYR',
                                '112'=>'Madagascar',
                                '113'=>'Malawi',
                                '114'=>'Malaysia',
                                '115'=>'Maldives',
                                '116'=>'Mali',
                                '117'=>'Malta',
                                '118'=>'Marshall Islands',
                                '119'=>'Martinique',
                                '120'=>'Mauritania',
                                '121'=>'Mauritius',
                                '123'=>'Micronesia, Fed States',
                                '124'=>'Moldova, Rep',
                                '217'=>'Monaco',
                                '125'=>'Mongolia',
                                '126'=>'Morocco',
                                '127'=>'Mozambique',
                                '128'=>'Myanmar',
                                '129'=>'Namibia',
                                '218'=>'Nauru',
                                '130'=>'Nepal',
                                '131'=>'Netherlands',
                                '132'=>'Netherlands Antilles',
                                '133'=>'New Caledonia',
                                '134'=>'New Zealand',
                                '135'=>'Nicaragua',
                                '136'=>'Niger',
                                '137'=>'Nigeria',
                                '219'=>'Niue',
                                '220'=>'Northern Mariana Islands',
                                '138'=>'Norway',
                                '139'=>'Oman',
                                '230'=>'Other',
                                '140'=>'Pakistan',
                                '221'=>'Palau',
                                '211'=>'Palestinian Territories',
                                '141'=>'Panama',
                                '142'=>'Papua New Guinea',
                                '143'=>'Paraguay',
                                '144'=>'Peru',
                                '145'=>'Philippines',
                                '146'=>'Poland',
                                '147'=>'Portugal',
                                '148'=>'Puerto Rico',
                                '149'=>'Qatar',
                                '150'=>'Reunion',
                                '151'=>'Romania',
                                '152'=>'Russian Federation',
                                '153'=>'Rwanda',
                                '222'=>'Saint Helena',
                                '223'=>'Saint Kitts and Nevis',
                                '224'=>'Saint Pierre and Miquelon',
                                '154'=>'Samoa',
                                '225'=>'San Marino',
                                '155'=>'Sao Tome &amp; Principe',
                                '156'=>'Saudi Arabia',
                                '157'=>'Senegal',
                                '199'=>'Serbia and Montenegro',
                                '158'=>'Seychelles',
                                '159'=>'Sierra Leone',
                                '160'=>'Singapore',
                                '161'=>'Slovakia',
                                '162'=>'Slovenia',
                                '163'=>'Solomon Islands',
                                '164'=>'Somalia',
                                '165'=>'South Africa',
                                '166'=>'Spain',
                                '167'=>'Sri Lanka',
                                '168'=>'St. Lucia',
                                '169'=>'St. Vincent &amp; Grenadines',
                                '170'=>'Sudan',
                                '171'=>'Suriname',
                                '172'=>'Swaziland',
                                '173'=>'Sweden',
                                '174'=>'Switzerland',
                                '175'=>'Syrian Arab Rep',
                                '176'=>'Taiwan',
                                '177'=>'Tajikistan',
                                '178'=>'Tanzania',
                                '179'=>'Thailand',
                                '180'=>'Togo',
                                '181'=>'Tonga',
                                '182'=>'Trinidad and Tobago',
                                '183'=>'Tunisia',
                                '184'=>'Turkey',
                                '185'=>'Turkmenistan',
                                '226'=>'Turks and Caicos Islands',
                                '186'=>'Uganda',
                                '187'=>'Ukraine',
                                '188'=>'United Arab Emirates',
                                '189'=>'United Kingdom',
                                '191'=>'Uruguay',
                                '192'=>'Uzbekistan',
                                '193'=>'Vanuatu',
                                '194'=>'Venezuela',
                                '195'=>'Viet Nam',
                                '196'=>'Virgin Islands',
                                '229'=>'West Bank',
                                '227'=>'Western Sahara',
                                '197'=>'Yemen',
                                '198'=>'Yemen, Rep',
                                '200'=>'Zambia',
                                '201'=>'Zimbabwe'));
                            ?>
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Timezone*</label></div>
                		<div class="col-md-8">
                			<?php echo $form->dropDownList($model,'timezone',array(
                                ''=>'- select one -',
                                '54'=>'(GMT-08:00) Pacific Time (US &amp; Canada)',
                                '55'=>'(GMT-07:00) Arizona',
                                '56'=>'(GMT-07:00) Mountain Time (US &amp; Canada)',
                                '57'=>'(GMT-06:00) Central Time (US &amp; Canada)',
                                '58'=>'(GMT-05:00) Eastern Time (US &amp; Canada)',
                            	)); 
                            ?>
                			<!-- <select name="timezone_id" class="text" onchange="enableUnloadPrompt(true)">
								<option value="">Select one</option>
								<option value="54" selected="selected">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
								<option value="55">(GMT-07:00) Arizona</option>
								<option value="56">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
								<option value="57">(GMT-06:00) Central Time (US &amp; Canada)</option>
								<option value="58">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
							</select> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Phone (local)*</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'phone_local',array('size'=>'20')); ?>
                			<!-- <input type="text" name="" size="20"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Phone (toll-free)</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'phone_tollfree',array('size'=>'20')); ?>
                			<!-- <input type="text" name="" size="20"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Phone (cell)</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'phone_cell',array('size'=>'20')); ?>
                			<!-- <input type="text" name="" size="20"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Fax</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'fax',array('size'=>'20')); ?>
                			<!-- <input type="text" name="" size="20"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Email*</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'email',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Website</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'website',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>MC Number</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'mc_number',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 50px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Company Logo</label></div>
                		<div class="col-md-2">
                			<?php echo $form->fileField($model,'company_logo',array('size'=>'10')); ?>
                			<!-- <input type="file" name="" size="10"> -->
                		</div>
                	</div>
                </div>
                 <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-12"><label>Company Description(up to 500 characters)</label></div>
                	</div>
                	<div class="col-md-12">
                		<div class="col-md-12">
                			<?php echo $form->textArea($model,'company_description'); ?>
                			<!-- <textarea style="margin: 5px;" onchange="enableUnloadPrompt(true)" cols="60" rows="5" name="description">AMPM Auto Transport is committed to providing consistent and dependable door-to-door auto transportation solutions in the United States.</textarea> -->
                		</div>
                	</div>
                </div>
			</fieldset>
		</div>
	</div>
</div>

<div class="col-md-5" style="float: left">
	<div class="panel panel-default">
		<div class="panel-heading">
			<label style="color: green; font-size: 20px;">Central Dispatch Integration</label>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="row" style="padding-bottom: 10px;">
                	<div class="col-md-12">
                		<label style="color: green;">Your account is currently linked to Central Dispatch account (6ampmat). The information displayed below will appear on all dispatch and post information that is processed through Central Dispatch.</label>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-5"><label>Company Name: </label></div>
                		<div class="col-md-7"><label>AMPM Auto Transport</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-5"><label>Dispatch Contact: </label></div>
                		<div class="col-md-7"><label>Dispatch</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-5"><label>Owner or Manager: </label></div>
                		<div class="col-md-7"><label>Tony G</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-12"><label>Address: </label></div>
                		<div class="col-md-12"><label>2009 West Burbank Blvd.<br/>Burbank, CA</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-5"><label>Phone to List: </label></div>
                		<div class="col-md-7"><label>(818) 956-5666</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-5"><label>Fax: </label></div>
                		<div class="col-md-7"><label>(747) 477-1186</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-5"><label>Email: </label></div>
                		<div class="col-md-7"><label>info@ampmautotransport.com</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                	<div class="col-md-12">
                		<div class="col-md-5"><label>ICC-MC Number: </label></div>
                		<div class="col-md-7"><label>722001</label></div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<label style="color: green;">To change this information you must log in to your Centraldispatch account and go to "Update Profile". To have the link removed, call jTracker support at (858) 259-6084.</label>
                	</div>
                </div>
			</fieldset>
		</div>
	</div>
</div>

<div class="col-md-5" style="float: left">
	<div class="panel panel-default">
		<div class="panel-heading">
			<label style="color: green; font-size: 20px;">Sales information</label>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Sales Phone</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'sales_phone',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Sales Fax</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'sales_fax',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Sales Email</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'sales_email',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-1"><input type="checkbox" name=""></div>
                		<div class="col-md-11"><label>BCC this address when a quote is converted</label></div>
                	</div>
                </div>
			</fieldset>
		</div>
	</div>
</div>

<div class="col-md-5" style="float: left">
	<div class="panel panel-default">
		<div class="panel-heading">
			<label style="color: green; font-size: 20px;">Dispatch Information</label>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Dispatch Contact</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'dispatch_contact',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Dispatch Email</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'dispatch_email',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Dispatch Phone</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'dispatch_phone',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Dispatch Fax</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'dispatch_fax',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
			</fieldset>
		</div>
	</div>
</div>

<div class="col-md-5" style="float: left">
	<div class="panel panel-default">
		<div class="panel-heading">
			<label style="color: green; font-size: 20px;">Customer Service</label>
		</div>
		<div class="panel-body">
			<fieldset>
				<div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Support Phone</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'support_phone',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Support Fax</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'support_fax',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
                <div class="row" style="padding-bottom: 5px;">
                	<div class="col-md-12">
                		<div class="col-md-4"><label>Support Email</label></div>
                		<div class="col-md-8">
                			<?php echo $form->textField($model,'support_email',array('size'=>'30')); ?>
                			<!-- <input type="text" name="" size="30"> -->
                		</div>
                	</div>
                </div>
			</fieldset>
		</div>
	</div>
</div>

<div style="float: right;">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Update Information' : 'Update Information',array('id'=>'subBtn','style'=>'', 'name' => 'but1','class'=>'btn btn-success')); ?>
</div>

<?php $this->endWidget(); ?>