<?php

/**
 * This is the model class for table "global_tracker_dispatch".
 *
 * The followings are the available columns in table 'global_tracker_dispatch':
 * @property integer $id
 * @property string $shipper_name
 * @property string $fname
 * @property string $lname
 * @property string $company
 * @property string $email
 * @property string $phone1
 * @property string $phone2
 * @property string $mobile
 * @property string $fax
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $sel_contact
 * @property string $sel_location
 * @property string $p_address1
 * @property string $p_address2
 * @property string $p_city
 * @property string $p_state
 * @property string $p_zip
 * @property string $p_contactname
 * @property string $p_companyname
 * @property string $p_buyernumber
 * @property string $p_phone1
 * @property string $p_phone2
 * @property string $p_mobile
 * @property string $s_date
 * @property string $s_vrun
 * @property string $s_via
 * @property string $info_forShipper
 * @property string $notes_shipper
 * @property string $vehicle_info
 * @property string $carrier_pay
 * @property string $bal_paid_by
 * @property string $pickup_terminal_fee
 * @property string $delivery_terminal_fee
 * @property string $referred_by
 * @property string $p_phone3
 * @property string $extra
 * @property string $extra2
 * @property string $extra3
 * @property string $extra4
 * @property string $extra5
 * @property string $extra6
 * @property string $created_by
 * @property string $creationdatetime
 */
class GlobalTrackerDispatch extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public static $enumStatus=array('order'=>'1','hold'=>'2','archived'=>'3','not_signed'=>'5','dispatched'=>'6','issues'=>'7');
	public static $arrStatus=array('1'=>'Order', '2'=>'On Hold','3'=>'Archived','5'=>'Not Signed','6'=>'Dispatched','7'=>'Issues');

	public static $arrSaveAsDefault=array('0'=>'No', '1'=>'Yes');

	public static $arrVRun=array('1'=>'Yes','0'=>'No');
	public static $enumvRun=array('yes'=>'1','no'=>'0');

	public static $enumShipVia=array('1'=>'Open','2'=>'Enclosed','3'=>'Driveaway');
	public static $arrShipVia=array('open'=>'1','enclosed'=>'2','driveaway'=>'3');

	//public static $enumPaidBy=array('1'=>'Additional Shipper Pre-payment','2'=>'COD to Carrier','3'=>'COD to Delivery Terminal','4'=>'COD to Pickup Terminal','5'=>'COP to Carrier (On Pickup)','6'=>'Shipper Invoice');
	//public static $arrPaidBy=array('prepay'=>'1','codcarrier'=>'2','coddel'=>'3','codpick'=>'4','cop'=>'5','shipinv'=>'6');

	//public static $enumCodMethod=array('1'=>'Cash/Certified Funds','2'=>'Check');

	public static $enumReferBy=array('1'=>'BBB','2'=>'Business Card','3'=>'Dealership','4'=>'Facebook','5'=>'Friend','6'=>'Junk Yard','7'=>'Moving Company','8'=>'Online','9'=>'Returning Customer','10'=>'Unknown','11'=>'Yellow Pages');

	public static $enumStates=array('AL'=>'Alabama','AK'=>'Alaska', 'AZ'=>'Arizona', 'AR'=>'Arkansas', 'CA'=>'California', 'CO'=>'Colorado', 'CT'=>'Connecticut', 'DE'=>'Delaware', 'DC'=>'Dist. of Columbia', 'FL'=>'Florida', 'GA'=>'Georgia', 'GU'=>'Guam', 'HI'=>'Hawaii', 'ID'=>'Idaho', 'IL'=>'Illinois', 'IN'=>'Indiana', 'IA'=>'Iowa', 'KS'=>'Kansas', 'KY'=>'Kentucky', 'LA'=>'Louisiana', 'ME'=>'Maine', 'MD'=>'Maryland', 'MA'=>'Massachusetts', 'MI'=>'Michigan', 'MN'=>'Minnesota', 'MS'=>'Mississippi', 'MO'=>'Missouri', 'MT'=>'Montana', 'NE'=>'Nebraska', 'NV'=>'Nevada', 'NH'=>'New Hampshire', 'NJ'=>'New Jersey', 'NM'=>'New Mexico', 'NY'=>'New York', 'NC'=>'North Carolina', 'ND'=>'North Dakota', 'OH'=>'Ohio', 'OK'=>'Oklahoma', 'OR'=>'Oregon', 'PA'=>'Pennsylvania', 'PR'=>'Puerto Rico', 'RI'=>'Rhode Island', 'SC'=>'South Carolina', 'SD'=>'South Dakota', 'TN'=>'Tennessee', 'TX'=>'Texas', 'UT'=>'Utah', 'VT'=>'Vermont', 'VI'=>'Virgin Islands', 'VA'=>'Virginia', 'WA'=>'Washington', 'WV'=>'West Virginia', 'WI'=>'Wisconsin', 'WY'=>'Wyoming', 'CP'=>'Canada-Province Not Specified', 'AB'=>'Canada-Alberta', 'BC'=>'Canada-British Columbia', 'MB'=>'Canada-Manitoba', 'NB'=>'Canada-New Brunswick', 'NL'=>'Canada-Newfoundland', 'NT'=>'Canada-Northwest Territorie', 'NS'=>'Canada-Nova Scotia', 'NU'=>'Canada-Nunavut', 'ON'=>'Canada-Ontario', 'PE'=>'Canada-Prince Edward Island', 'QC'=>'Canada-Quebec', 'SK'=>'Canada-Saskatchewan', 'YT'=>'Canada-Yukon', 'OC'=>'OTHER COUNTRIES');

	public static $enumbVehicleType=array(''=>'- Select One -','0'=>'Coupe','1'=>'Sedan Small','2'=>'Sedan Midsize', '3'=>'Sedan Large', '4'=>'Convertible', '5'=>'Pickup Small', '6'=>'Pickup Crew Cab', '7'=>'Pickup Extd. Cab','8'=>'Pickup Extd. Cab','9'=>'RV', '10'=>'Dually', '11'=>'SUV Small', '12'=>'SUV Mid-size', '13'=>'SUV Large', '14'=>'Travel Trailer', '15'=>'Van Mini', '16'=>'Van Full-size', '17'=>'Van Extd. Length', '18'=>'Van Pop-Top', '19'=>'Motorcycle', '20'=>'Boat', '21'=>'Other');

	public function tableName()
	{
		return 'global_tracker_dispatch';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fname, lname, p_city, p_state, p_zip, d_city, d_state, d_zip, s_date, s_vrun, s_via, vehicle_info, created_by, mobile, creationdatetime', 'required'),
			
			array('bal_paid_by, cod_method', 'required', 'on'=>'update'),

			array('extra, extra1, carrier_name, dispatch_contact, dispatch_email, dispatch_phone, dispatch_fax, dispatched_time', 'required', 'on'=>'dispatch'),

            array('d_mobile,d_phone3,d_phone2,d_phone1,d_company_name,d_contact_name,d_address,shipper_name, company, email, phone1, phone2, mobile, fax, address1, address2, city, state, zip, sel_contact, sel_location, p_address1, p_address2, p_contactname, p_companyname, p_buyernumber, p_phone1, p_phone2, p_mobile, info_forShipper, notes_shipper, carrier_pay, pickup_terminal_fee, delivery_terminal_fee, referred_by, p_phone3, extra, extra1, carrier_name, dispatch_contact, dispatch_email, dispatch_phone, dispatch_fax, dispatched_time, extra2, extra3, extra4, extra5, extra6, quote_id, save_as_default', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, shipper_name, fname, lname, company, email, phone1, phone2, mobile, fax, address1, address2, city, state, zip, sel_contact, sel_location, p_address1, p_address2, p_city, p_state, p_zip, p_contactname, p_companyname, p_buyernumber, p_phone1, p_phone2, p_mobile, s_date, s_vrun, s_via, info_forShipper, notes_shipper, vehicle_info, carrier_pay, bal_paid_by, pickup_terminal_fee, delivery_terminal_fee, referred_by, p_phone3, extra, extra2, extra3, extra4, extra5, extra6, created_by, creationdatetime, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'shipper_name' => 'Shipper Name',
			'fname' => 'First Name',
			'lname' => 'Last Name',
			'company' => 'Company',
			'email' => 'Email',
			'phone1' => 'Phone1',
			'phone2' => 'Phone2',
			'mobile' => 'Mobile',
			'fax' => 'Fax',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'city' => 'City',
			'state' => 'State',
			'zip' => 'Zip',
			'd_address' => 'Delivery Address',
            'd_city' => 'Delivery City',
            'd_state' => 'Delivery State',
            'd_zip' => 'Delivery Zip',
			'sel_contact' => 'Sel Contact',
			'sel_location' => 'Sel Location',
			'p_address1' => 'P Address1',
			'p_address2' => 'P Address2',
			'p_city' => 'Pickup City',
			'p_state' => 'Pickup State',
			'p_zip' => 'Pickup Zip',
			'p_contactname' => 'Pickup Contactname',
			'p_companyname' => 'Pickup Companyname',
			'p_buyernumber' => 'Pickup Buyernumber',
			'p_phone1' => 'Pickup Phone1',
			'p_phone2' => 'Pickup Phone2',
			'p_mobile' => 'Pickup Mobile',
			's_date' => '1st Avail. Pickup Date',
			's_vrun' => 'Vehicle(s) Run',
			's_via' => 'Ship Via',
			'info_forShipper' => 'Info For Shipper',
			'notes_shipper' => 'Notes Shipper',
			'vehicle_info' => 'Vehicle Info',
			'carrier_pay' => 'Carrier Pay',
			'bal_paid_by' => 'Bal Paid By',
			'cod_method' => 'COD/COP Method',
			'pickup_terminal_fee' => 'Pickup Terminal Fee',
			'delivery_terminal_fee' => 'Delivery Terminal Fee',
			'referred_by' => 'Referred By',
			'p_phone3' => 'P Phone3',
			'extra' => 'Load Date',
			'extra1' => 'Delivery Date',
			'carrier_name' => 'Carrier',
			'extra2' => 'Payment Terms',
			'extra3' => 'Terms Begin',
			'extra4' => 'Payment Method',
			'extra5' => 'Total price',
			'extra6' => 'Deposit',
			'save_as_default' => 'Default Settings',
			'dispatch_contact' => 'Dispatch Contact',
			'dispatch_email' => 'Dispatch Email',
			'dispatch_phone' => 'Dispatch Phone',
			'dispatch_fax' => 'Dispatch Fax',
			'driver_fname' => "Driver's First Name",
			'driver_lname' => "Driver's Last Name",
			'driver_phone' => "Driver's Phone",
			'driver_instruction' => "Dispatch Instructions",
			'created_by' => 'Created By',
			'creationdatetime' => 'Created time',
			'dispatched_time' => 'Dispatched time',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($type, $pageSize) {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		$userRole=FilingGenerics::getuserRole(Yii::app()->user->id);

		$criteria->compare('id',$this->id);
		$criteria->compare('status', $type, true);
		if($userRole==LoginForm::$allowedRole) {
            $criteria->compare('created_by',$this->created_by,true);
        }
        else{
            $criteria->compare('created_by',Yii::app()->user->id,true);
        }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
                'defaultOrder'=>'id DESC',
            ),
            'pagination' => [
            	'pageSize' => $pageSize,
            ],
		));
	}

	public function result($pageSize) {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria;
		$userRole = FilingGenerics::getuserRole(Yii::app()->user->id);

		$criteria->compare('id',$this->id);
		if($userRole == LoginForm::$allowedRole) {
            $criteria->compare('created_by',$this->created_by,true);
        }
        else{
            $criteria->compare('created_by',Yii::app()->user->id,true);
        }

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
            'pagination' => [
            	'pageSize' => $pageSize,
            ],
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GlobalTrackerDispatch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
