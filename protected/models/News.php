<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property integer $admins_id
 * @property string $title
 * @property string $content
 * @property string $imgS
 * @property string $imgS_s3url
 * @property string $dateadd
 * @property integer $read
 * @property integer $status
 * @property string $imgM
 * @property string $imgM_s3url
 */
class News extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('admins_id, title, content,dateadd, read, status', 'required'),
			array('imgM', 'required','on'=>'create'),
			array('admins_id, read, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>45),
			array('imgS, imgM', 'length', 'max'=>150),
			array('imgS_s3url, imgM_s3url', 'length', 'max'=>255),
			array('imgM', 'file', 'types'=>'jpg, gif, png', 'safe' => false,'on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('news_id, admins_id, title, content, imgS, imgS_s3url, dateadd, read, status, imgM, imgM_s3url', 'safe', 'on'=>'search'),
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
			
			'news_id' => 'HaberID',
			'admins_id' => 'Yazar',
			'title' => 'Başlık',
			'content' => 'İçerik',
			'imgS' => 'Resim',
			'imgS_s3url' => 'Img S3url',
			'dateadd' => 'Eklenme Tarihi',
			'read' => 'Okunma',
			'status' => 'Durum',
			'imgM' => 'Resim',
			'imgM_s3url' => 'Img M S3url',
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

		$criteria->compare('news_id',$this->news_id);
		$criteria->compare('admins_id',$this->admins_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('imgS',$this->imgS,true);
		$criteria->compare('imgS_s3url',$this->imgS_s3url,true);
		$criteria->compare('dateadd',$this->dateadd,true);
		$criteria->compare('read',$this->read);
		$criteria->compare('status',$this->status);
		$criteria->compare('imgM',$this->imgM,true);
		$criteria->compare('imgM_s3url',$this->imgM_s3url,true);

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
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
