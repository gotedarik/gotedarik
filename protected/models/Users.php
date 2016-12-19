<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $users_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $name
 * @property string $birthday
 * @property string $dateadd
 */
class Users extends CActiveRecord
{
	
	public $password2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password, email, name, dateadd', 'required'),
			array('deleted, citys_id', 'numerical', 'integerOnly'=>true),
			array('username, email, name, birthday', 'length', 'max'=>45),
			
			array('password', 'length', 'max'=>80),
			array('password, password2', 'required','on'=>'create'),
			array('password', 'compare', 'compareAttribute'=>'password2','on'=>'create'),
			array('phone', 'length', 'max'=>45),
			array('phone,fax','safe'),
			//comment
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('users_id, username, password, email, name, birthday, dateadd, deleted, citys_id', 'safe', 'on'=>'search'),
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
			'users_id' => '#id',
			'username' => 'Kullanıcı',
			'password' => 'Parola',
			'email' => 'E-Posta',
			'name' => 'Ad Soyad',
			'birthday' => 'Doğum Yılı',
			'dateadd' => 'Eklenme Tarihi',
			'password2'=>'Parola-Tekrar',
			'deleted'=>'Silindi',
			"citys_id"=>'Şehir',
			'phone'=>'Telefon',
			"address"=>'Adres',
			"fax"=>'Fax',
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

		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('dateadd',$this->dateadd);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('citys_id',$this->citys_id);

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
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
