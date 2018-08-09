<?php

/**
 * This is the model class for table "global_tracker_accountinfo".
 *
 * The followings are the available columns in table 'global_tracker_accountinfo':
 * @property integer $id
 * @property string $owner
 * @property string $address
 * @property string $address1
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $country
 * @property string $timezone
 * @property string $phone_local
 * @property string $phone_tollfree
 * @property string $phone_cell
 * @property string $fax
 * @property string $email
 * @property string $website
 * @property string $mc_number
 * @property string $company_logo
 * @property string $company_description
 * @property string $sales_phone
 * @property string $sales_fax
 * @property string $sales_email
 * @property string $dispatch_contact
 * @property string $dispatch_email
 * @property string $dispatch_phone
 * @property string $dispatch_fax
 * @property string $support_phone
 * @property string $support_fax
 * @property string $support_email
 */
class GlobalTrackerAccountinfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'global_tracker_accountinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address, city, state, zip, timezone, phone_local, email', 'required'),

			array('owner, address1, country, phone_tollfree, phone_cell, fax, website, mc_number, company_logo, company_description, sales_phone, sales_fax, sales_email, dispatch_contact, dispatch_email, dispatch_phone, dispatch_fax, support_phone, support_fax, support_email', 'safe'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, owner, address, address1, city, state, zip, country, timezone, phone_local, phone_tollfree, phone_cell, fax, email, website, mc_number, company_logo, company_description, sales_phone, sales_fax, sales_email, dispatch_contact, dispatch_email, dispatch_phone, dispatch_fax, support_phone, support_fax, support_email', 'safe', 'on'=>'search'),
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
			'owner' => 'Owner',
			'address' => 'Address',
			'address1' => 'Address1',
			'city' => 'City',
			'state' => 'State',
			'zip' => 'Zip',
			'country' => 'Country',
			'timezone' => 'Timezone',
			'phone_local' => 'Phone Local',
			'phone_tollfree' => 'Phone Tollfree',
			'phone_cell' => 'Phone Cell',
			'fax' => 'Fax',
			'email' => 'Email',
			'website' => 'Website',
			'mc_number' => 'Mc Number',
			'company_logo' => 'Company Logo',
			'company_description' => 'Company Description',
			'sales_phone' => 'Sales Phone',
			'sales_fax' => 'Sales Fax',
			'sales_email' => 'Sales Email',
			'dispatch_contact' => 'Dispatch Contact',
			'dispatch_email' => 'Dispatch Email',
			'dispatch_phone' => 'Dispatch Phone',
			'dispatch_fax' => 'Dispatch Fax',
			'support_phone' => 'Support Phone',
			'support_fax' => 'Support Fax',
			'support_email' => 'Support Email',
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
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('timezone',$this->timezone,true);
		$criteria->compare('phone_local',$this->phone_local,true);
		$criteria->compare('phone_tollfree',$this->phone_tollfree,true);
		$criteria->compare('phone_cell',$this->phone_cell,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('mc_number',$this->mc_number,true);
		$criteria->compare('company_logo',$this->company_logo,true);
		$criteria->compare('company_description',$this->company_description,true);
		$criteria->compare('sales_phone',$this->sales_phone,true);
		$criteria->compare('sales_fax',$this->sales_fax,true);
		$criteria->compare('sales_email',$this->sales_email,true);
		$criteria->compare('dispatch_contact',$this->dispatch_contact,true);
		$criteria->compare('dispatch_email',$this->dispatch_email,true);
		$criteria->compare('dispatch_phone',$this->dispatch_phone,true);
		$criteria->compare('dispatch_fax',$this->dispatch_fax,true);
		$criteria->compare('support_phone',$this->support_phone,true);
		$criteria->compare('support_fax',$this->support_fax,true);
		$criteria->compare('support_email',$this->support_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GlobalTrackerAccountinfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
