<?php

/**
 * This is the model class for table "company_messages".
 *
 * The followings are the available columns in table 'company_messages':
 * @property integer $message_id
 * @property integer $user_id
 * @property integer $supplier_id
 * @property string $subject
 * @property string $message
 * @property integer $read_status
 * @property string $dateadd
 * @property string $message_code
 */
class Companymessages extends CActiveRecord
{
    public $username;
    public $suppliername;
    public $scode;
    public $maxid;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company_messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, supplier_id, subject, message, dateadd, message_code', 'required'),
			array('user_id, supplier_id, sender, read_status', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>120),
			array('message_code', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('message_id, user_id, supplier_id, subject, message, read_status, sender, dateadd, message_code', 'safe', 'on'=>'search'),
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
			'message_id' => 'Message',
			'user_id' => 'Üye',
			'supplier_id' => 'Tedarikçi',
			'subject' => 'Konu',
			'message' => 'Mesajınız',
			'read_status' => 'Read Status',
			'dateadd' => 'Gönderilme Tarihi',
			'message_code' => 'Message Code',
			'sender' => 'Gönderen',
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

		$criteria->compare('message_id',$this->message_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('supplier_id',$this->supplier_id);
		$criteria->compare('sender',$this->sender);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('read_status',$this->read_status);
		$criteria->compare('dateadd',$this->dateadd,true);
		$criteria->compare('message_code',$this->message_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Companymessages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
