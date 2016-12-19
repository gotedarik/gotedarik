<?php

/**
 * This is the model class for table "company_messagesbox".
 *
 * The followings are the available columns in table 'company_messagesbox':
 * @property integer $company_messagesbox_ids
 * @property integer $users_id
 * @property integer $suppliers_id
 * @property integer $sender
 * @property string $subject
 * @property integer $readuser
 * @property string $dateadd
 * @property string $code
 * @property string $readsupplier
 */
class CompanyMessagesbox extends CActiveRecord
{

	public $message;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company_messagesbox';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id, message, suppliers_id, sender, subject, readuser, dateadd, code, readsupplier', 'required'),
			array('users_id, suppliers_id, sender, readuser', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>120),
			array('code, readsupplier', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('company_messagesbox_ids, users_id, suppliers_id, sender, subject, readuser, dateadd, code, readsupplier', 'safe', 'on'=>'search'),
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
			'company_messagesbox_ids' => 'Company Messagesbox Ids',
			'users_id' => 'Users',
			'suppliers_id' => 'Suppliers',
			'sender' => 'Sender',
			'subject' => 'Konu',
			'message'=>'Mesaj',
			'readuser' => 'Readuser',
			'dateadd' => 'Dateadd',
			'code' => 'Code',
			'readsupplier' => 'Readsupplier',
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

		$criteria->compare('company_messagesbox_ids',$this->company_messagesbox_ids);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('sender',$this->sender);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('readuser',$this->readuser);
		$criteria->compare('dateadd',$this->dateadd,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('readsupplier',$this->readsupplier,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CompanyMessagesbox the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
