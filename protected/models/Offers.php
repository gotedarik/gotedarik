<?php

/**
 * This is the model class for table "offers".
 *
 * The followings are the available columns in table 'offers':
 * @property integer $offers_id
 * @property string $filo_id
 * @property integer $users_id
 * @property integer $piece
 * @property double $offerunitprice
 * @property integer $products_id
 * @property string $dateadd
 * @property integer $read_user
 */
class Offers extends CActiveRecord
{
    public $product_name;
    public $product_id;
    public $useraddress;
    public $product_imageS;
    public $currency;
    public $product_price;
    public $code;
    public $usersid;
    public $usersname;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'offers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('filo_id, users_id, piece, products_id, dateadd', 'required'),
			array('users_id, piece, products_id, read_user, approval', 'numerical', 'integerOnly'=>true),
			array('offerunitprice', 'numerical'),
			array('filo_id', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('offers_id, filo_id, users_id, piece, offerunitprice, products_id, dateadd,  read_user,approval', 'safe', 'on'=>'search'),
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
			'offers_id' => 'Offers',
			'filo_id' => 'Filo',
			'users_id' => 'Users',
			'piece' => 'Piece',
			'offerunitprice' => 'Offerunitprice',
			'products_id' => 'Products',
			'dateadd' => 'Dateadd',
			'read_user' => 'Read User',
			'approval' => 'Onay',
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

		$criteria->compare('offers_id',$this->offers_id);
		$criteria->compare('filo_id',$this->filo_id,true);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('piece',$this->piece);
		$criteria->compare('offerunitprice',$this->offerunitprice);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('dateadd',$this->dateadd,true);
		$criteria->compare('read_user',$this->read_user);
		$criteria->compare('read_user',$this->approval);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Offers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
