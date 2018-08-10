<?php

/**
 * This is the model class for table "dot_tracker_shipper".
 *
 * The followings are the available columns in table 'dot_tracker_shipper':
 * @property integer $id
 * @property string $company_name
 * @property string $fname
 * @property integer $lname
 * @property integer $status
 * @property integer $type
 * @property string $contact1
 * @property string $contact2
 * @property string $phone1
 * @property string $phone2
 * @property string $cell_phone
 * @property string $fax
 * @property string $email
 * @property string $address
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $country
 * @property string $extra1
 * @property string $extra2
 * @property string $creation_datetime
 * @property string $created_by
 */
class GlobalTrackerShipper extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public static $arrType=array('carrier'=>'1','shipper'=>'2','terminal'=>'3');
	public static $enumType=array('1'=>'Carriers','2'=>'Shippers','3'=>'Terminals');
	public static $enumTypeSngle=array('1'=>'Carrier','2'=>'Shipper','3'=>'Terminal');

	public static $arrStatus=array('active'=>'1','inactive'=>'0');
	public static $enumStatus=array('1'=>'Active','0'=>'Inactive');
	
	public function tableName()
	{
		return 'dot_tracker_shipper';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, type, extra1, extra2, creation_datetime, created_by', 'required'),
			array('status, type', 'numerical', 'integerOnly'=>true),
			array('fname, contact1, contact2, phone1, phone2, cell_phone, fax, email, address, address2, city, state, zip, country,lname', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company_name, fname, lname, status, type, contact1, contact2, phone1, phone2, cell_phone, fax, email, address, address2, city, state, zip, country, extra1, extra2, creation_datetime, created_by', 'safe', 'on'=>'search'),
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
			'company_name' => 'Company Name',
			'fname' => 'First Name',
			'lname' => 'Last Name',
			'status' => 'Status',
			'type' => 'Type',
			'contact1' => 'Contact 1',
			'contact2' => 'Contact 2',
			'phone1' => 'Phone 1',
			'phone2' => 'Phone 2',
			'cell_phone' => 'Cell Phone',
			'fax' => 'Fax',
			'email' => 'Email',
			'address' => 'Address',
			'address2' => 'Address (contd.)',
			'city' => 'City',
			'state' => 'State',
			'zip' => 'Zip',
			'country' => 'Country',
			'extra1' => 'Extra1',
			'extra2' => 'Extra2',
			'creation_datetime' => 'Creation Datetime',
			'created_by' => 'Created By',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$_GET['type']);
		$criteria->compare('contact1',$this->contact1,true);
		$criteria->compare('contact2',$this->contact2,true);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('phone2',$this->phone2,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('extra1',$this->extra1,true);
		$criteria->compare('extra2',$this->extra2,true);
		$criteria->compare('creation_datetime',$this->creation_datetime,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GlobalTrackerShipper the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
