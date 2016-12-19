<?php

/**
 * This is the model class for table "tenderoffers".
 *
 * The followings are the available columns in table 'tenderoffers':
 * @property integer $tenderoffers_id
 * @property integer $users_id
 * @property integer $piece
 * @property integer $products_id
 * @property double $price
 * @property string $dateadd
 */
class Tenderoffers extends CActiveRecord
{
    public $username;
    public $productname;
    public $productcode;
    public $prdImgS3url;
    public $currency;
    public $productprice;
    public $mprice;
    public $lastdate;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tenderoffers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id, piece, products_id, price, dateadd', 'required'),
			array('users_id, piece, products_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tenderoffers_id, users_id, piece, products_id, price, dateadd', 'safe', 'on'=>'search'),
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
			'tenderoffers_id' => 'Tenderoffers',
			'users_id' => 'Users',
			'piece' => 'Piece',
			'products_id' => 'Products',
			'price' => 'Price',
			'dateadd' => 'Dateadd',
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

		$criteria->compare('tenderoffers_id',$this->tenderoffers_id);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('piece',$this->piece);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('price',$this->price);
		$criteria->compare('dateadd',$this->dateadd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tenderoffers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
