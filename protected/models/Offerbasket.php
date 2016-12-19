<?php

/**
 * This is the model class for table "offerbasket".
 *
 * The followings are the available columns in table 'offerbasket':
 * @property integer $offer_id
 * @property integer $products_id
 * @property integer $count_number
 * @property integer $users_id
 * @property string $dateadd
 */
class Offerbasket extends CActiveRecord
{
    public $product_name;
    public $product_price;
    public $product_imageS;
    public $code;
    public $currency;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'offerbasket';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_id, count_number, users_id, dateadd', 'required'),
			array('products_id, count_number, users_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('offer_id, products_id, count_number, users_id, dateadd', 'safe', 'on'=>'search'),
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
			'offer_id' => 'Offer',
			'products_id' => 'Products',
			'count_number' => 'Count Number',
			'users_id' => 'Users',
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

		$criteria->compare('offer_id',$this->offer_id);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('count_number',$this->count_number);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('dateadd',$this->dateadd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Offerbasket the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
