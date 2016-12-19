<?php

/**
 * This is the model class for table "productimages".
 *
 * The followings are the available columns in table 'productimages':
 * @property integer $productimages_id
 * @property integer $products_id
 * @property integer $imagetype
 * @property string $imageXL
 * @property string $imageXL_s3url
 * @property string $imageL
 * @property string $imageL_s3url
 * @property string $imageM
 * @property string $imageM_s3url
 * @property string $imageS
 * @property string $imageS_s3url
 */
class Productimages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productimages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_id, imagetype, imageXL, imageXL_s3url, imageL, imageL_s3url, imageM, imageM_s3url, imageS, imageS_s3url', 'required'),
			array('products_id, imagetype', 'numerical', 'integerOnly'=>true),
			array('imageXL, imageL, imageM, imageS', 'length', 'max'=>150),
			array('imageXL_s3url, imageL_s3url, imageM_s3url, imageS_s3url', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('productimages_id, products_id, imagetype, imageXL, imageXL_s3url, imageL, imageL_s3url, imageM, imageM_s3url, imageS, imageS_s3url', 'safe', 'on'=>'search'),
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
			'productimages_id' => 'Productimages',
			'products_id' => 'Products',
			'imagetype' => 'Imagetype',
			'imageXL' => 'Image Xl',
			'imageXL_s3url' => 'Image Xl S3url',
			'imageL' => 'Image L',
			'imageL_s3url' => 'Image L S3url',
			'imageM' => 'Image M',
			'imageM_s3url' => 'Image M S3url',
			'imageS' => 'Image S',
			'imageS_s3url' => 'Image S S3url',
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

		$criteria->compare('productimages_id',$this->productimages_id);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('imagetype',$this->imagetype);
		$criteria->compare('imageXL',$this->imageXL,true);
		$criteria->compare('imageXL_s3url',$this->imageXL_s3url,true);
		$criteria->compare('imageL',$this->imageL,true);
		$criteria->compare('imageL_s3url',$this->imageL_s3url,true);
		$criteria->compare('imageM',$this->imageM,true);
		$criteria->compare('imageM_s3url',$this->imageM_s3url,true);
		$criteria->compare('imageS',$this->imageS,true);
		$criteria->compare('imageS_s3url',$this->imageS_s3url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Productimages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
