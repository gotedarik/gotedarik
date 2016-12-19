<?php

/**
 * This is the model class for table "suppliers".
 *
 * The followings are the available columns in table 'suppliers':
 * @property integer $suppliers_id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $citys_id
 * @property string $address
 * @property string $dateadd
 * @property integer $deleted
 */
class Suppliers extends CActiveRecord
{
	public $password2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password, dateadd', 'required'),
			array('deleted, code, citys_id,fake', 'numerical', 'integerOnly'=>true),
			array('name, username, companyjob, email, citys_id, dateadd', 'length', 'max'=>45),
			array('password', 'length', 'max'=>80),
			array('password2','required','on'=>'create'),
			array('password','compare','compareAttribute' => 'password2','on'=>'create'),
			array('address,phone,fax', 'safe'),
			
			array('phone,fax', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('suppliers_id, name, username, email, password, citys_id, address, dateadd, deleted, code,fake', 'safe', 'on'=>'search'),
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
			 'citys'    => array(self::BELONGS_TO, 'Citys',    'citys_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'suppliers_id' => 'Suppliers',
			'name' => 'İsim',
			'username' => 'Kullanıcı Adı',
			'email' => 'Email',
			'password' => 'Parola',
			'citys_id' => 'Şehir',
			'address' => 'Adres',
			'dateadd' => 'Eklenme Tarihi',
			'deleted' => 'Silindi',
			'password2' => 'Parola-Tekrar',
			"phone"=>"Telefon",
			"fax"=>"Fax",
			"code"=>"code",
            "fake" => "Bot",
            "companyjob" => "Sektör"
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
		$criteria->alias = 'i';
		$criteria->join= 'LEFT JOIN citys c ON (i.citys_id=c.citys_id)';
		$criteria->compare('i.suppliers_id',$this->suppliers_id);
		$criteria->compare('i.name',$this->name,true);
		$criteria->compare('i.username',$this->username,true);
		$criteria->compare('i.email',$this->email,true);
		$criteria->compare('i.password',$this->password,true);
		$criteria->compare('c.name',$this->citys_id,true);
		$criteria->compare('i.address',$this->address,true);
		$criteria->compare('i.dateadd',$this->dateadd,true);
		$criteria->compare('i.deleted',$this->deleted);
		$criteria->compare('i.code',$this->code);
		$criteria->compare('i.fake',$this->fake);
		$criteria->compare('i.companyjob',$this->fake);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			    'defaultOrder'=>'dateadd Desc',
			  )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Suppliers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
