<?php

/**
 * This is the model class for table "dot_tracker_payment1".
 *
 * The followings are the available columns in table 'dot_tracker_payment1':
 * @property integer $id
 * @property integer $order_id
 * @property string $date_received
 * @property string $payment_from_to
 * @property string $amount
 * @property string $notes
 * @property string $method
 * @property string $transaction_id
 * @property string $cc
 * @property string $credit_card_type
 * @property string $other
 * @property string $expiration_date
 * @property string $authorization_code
 * @property string $check_number
 */
class DotTrackerPayment1 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dot_tracker_payment1';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, date_received, payment_from_to, amount', 'required'),
			array('order_id', 'numerical', 'integerOnly'=>true),
			array('notes, method, transaction_id, cc, credit_card_type, other, expiration_date, authorization_code, check_number', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, date_received, payment_from_to, amount, notes, method, transaction_id, cc, credit_card_type, other, expiration_date, authorization_code, check_number', 'safe', 'on'=>'search'),
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
			'order_id' => 'Order',
			'date_received' => 'Date Received',
			'payment_from_to' => 'Payment From To',
			'amount' => 'Amount',
			'notes' => 'Notes',
			'method' => 'Method',
			'transaction_id' => 'Transaction',
			'cc' => 'Cc',
			'credit_card_type' => 'Credit Card Type',
			'other' => 'Other',
			'expiration_date' => 'Expiration Date',
			'authorization_code' => 'Authorization Code',
			'check_number' => 'Check Number',
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
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('date_received',$this->date_received,true);
		$criteria->compare('payment_from_to',$this->payment_from_to,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('method',$this->method,true);
		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('cc',$this->cc,true);
		$criteria->compare('credit_card_type',$this->credit_card_type,true);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('expiration_date',$this->expiration_date,true);
		$criteria->compare('authorization_code',$this->authorization_code,true);
		$criteria->compare('check_number',$this->check_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DotTrackerPayment1 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
