<?php

/**
 * This is the model class for table "company_messages".
 *
 * The followings are the available columns in table 'company_messages':
 * @property integer $company_messages_ids
 * @property integer $sender
 * @property string $message
 * @property string $dateadd
 * @property string $company_messagesbox_ids
 */
class CompanyMessages extends CActiveRecord
{
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
			array('sender, message, dateadd', 'required'),
			array('sender', 'numerical', 'integerOnly'=>true),
			array('company_messagesbox_ids', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('company_messages_ids, sender, message, dateadd, company_messagesbox_ids', 'safe', 'on'=>'search'),
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
			'company_messages_ids' => 'Company Messages Ids',
			'sender' => 'Sender',
			'message' => 'Message',
			'dateadd' => 'Dateadd',
			'company_messagesbox_ids' => 'Company Messagesbox Ids',
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

		$criteria->compare('company_messages_ids',$this->company_messages_ids);
		$criteria->compare('sender',$this->sender);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('dateadd',$this->dateadd,true);
		$criteria->compare('company_messagesbox_ids',$this->company_messagesbox_ids,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CompanyMessages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
