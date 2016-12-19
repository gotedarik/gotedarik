<?php

/**
 * This is the model class for table "settings_db".
 *
 * The followings are the available columns in table 'settings_db':
 * @property integer $settings_id
 * @property string $phone_number
 * @property string $fax_number
 * @property string $address
 * @property string $copyright
 * @property string $email_address
 * @property string $maps
 */
class Settingsdb extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings_db';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phone_number, fax_number', 'length', 'max'=>25),
			array('address, copyright', 'length', 'max'=>245),
			array('email_address', 'length', 'max'=>145),
			array('maps', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('settings_id, phone_number, fax_number, address, copyright, email_address, maps', 'safe', 'on'=>'search'),
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
            'settings_id' => 'Settings',
            'phone_number' => 'Telefon Numarası',
            'fax_number' => 'Fax Numarası',
            'address' => 'Adres',
            'copyright' => 'Copyright',
            'email_address' => 'Email Adresi',
			'maps' => 'Harita',
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

		$criteria->compare('settings_id',$this->settings_id);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('fax_number',$this->fax_number,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('copyright',$this->copyright,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('maps',$this->maps,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Settingsdb the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
