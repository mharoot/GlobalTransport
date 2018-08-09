<?php

/**
 * This is the model class for table "global_tracker_settings".
 *
 * The followings are the available columns in table 'global_tracker_settings':
 * @property integer $id
 * @property integer $deposit
 * @property integer $first_followup
 * @property integer $quote_expired
 * @property integer $assumed_delivered
 * @property string $assign_unverified_to
 * @property string $carrier_pmt_term
 * @property string $carrier_pmt_term_begin
 * @property string $carrier_pmt_method
 * @property string $cc_gateway
 * @property string $order_term
 * @property string $dispatch_term
 */
class GlobalTrackerSettings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'global_tracker_settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deposit, first_followup, quote_expired, assumed_delivered, assign_unverified_to, carrier_pmt_term, carrier_pmt_term_begin, carrier_pmt_method, cc_gateway, order_term, dispatch_term', 'safe'),

			array('deposit, first_followup, quote_expired, assumed_delivered', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, deposit, first_followup, quote_expired, assumed_delivered, assign_unverified_to, carrier_pmt_term, carrier_pmt_term_begin, carrier_pmt_method, cc_gateway, order_term, dispatch_term', 'safe', 'on'=>'search'),
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
			'deposit' => 'Deposit',
			'first_followup' => 'First Followup',
			'quote_expired' => 'Quote Expired',
			'assumed_delivered' => 'Assumed Delivered',
			'assign_unverified_to' => 'Assign Unverified To',
			'carrier_pmt_term' => 'Carrier Pmt Term',
			'carrier_pmt_term_begin' => 'Carrier Pmt Term Begin',
			'carrier_pmt_method' => 'Carrier Pmt Method',
			'cc_gateway' => 'Cc Gateway',
			'order_term' => 'Order Term',
			'dispatch_term' => 'Dispatch Term',
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
		$criteria->compare('deposit',$this->deposit);
		$criteria->compare('first_followup',$this->first_followup);
		$criteria->compare('quote_expired',$this->quote_expired);
		$criteria->compare('assumed_delivered',$this->assumed_delivered);
		$criteria->compare('assign_unverified_to',$this->assign_unverified_to,true);
		$criteria->compare('carrier_pmt_term',$this->carrier_pmt_term,true);
		$criteria->compare('carrier_pmt_term_begin',$this->carrier_pmt_term_begin,true);
		$criteria->compare('carrier_pmt_method',$this->carrier_pmt_method,true);
		$criteria->compare('cc_gateway',$this->cc_gateway,true);
		$criteria->compare('order_term',$this->order_term,true);
		$criteria->compare('dispatch_term',$this->dispatch_term,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GlobalTrackerSettings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
