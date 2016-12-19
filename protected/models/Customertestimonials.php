<?php

/**
 * This is the model class for table "customer_testimonials".
 *
 * The followings are the available columns in table 'customer_testimonials':
 * @property integer $testimonials_id
 * @property string $companyname
 * @property string $logo_s3url
 * @property string $logo
 * @property string $text
 * @property string $dateadd
 */
class Customertestimonials extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer_testimonials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('companyname, text, dateadd', 'required'),
			array('companyname', 'length', 'max'=>150),
			array('logo', 'file', 'types'=>'jpg, gif, png', 'safe' => false,'on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('testimonials_id, companyname, logo_s3url, logo, text, dateadd', 'safe', 'on'=>'search'),
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
			'testimonials_id' => 'Testimonials',
			'companyname' => 'Şirket Adı',
			'logo_s3url' => 'Şirket Logosu',
			'logo' => 'Şirket Logosu',
			'text' => 'Yorum',
			'dateadd' => 'Eklenme Tarihi',
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

		$criteria->compare('testimonials_id',$this->testimonials_id);
		$criteria->compare('companyname',$this->companyname,true);
		$criteria->compare('logo_s3url',$this->logo_s3url,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('dateadd',$this->dateadd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CustomerTestimonials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
