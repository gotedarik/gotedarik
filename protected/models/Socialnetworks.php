<?php

/**
 * This is the model class for table "socialnetworks".
 *
 * The followings are the available columns in table 'socialnetworks':
 * @property integer $socialnetwork_id
 * @property string $socialnetwork_name
 * @property string $socialnetwork_url
 * @property integer $status
 */
class Socialnetworks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'socialnetworks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('socialnetwork_name, socialnetwork_url, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('socialnetwork_name', 'length', 'max'=>45),
			array('socialnetwork_url', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('socialnetwork_id, socialnetwork_name, socialnetwork_url, status', 'safe', 'on'=>'search'),
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
			'socialnetwork_id' => 'Socialnetwork',
			'socialnetwork_name' => 'Sosyal Ağ Adı',
			'socialnetwork_url' => 'Sosyal Ağ Bağlantısı',
			'status' => 'Durum',
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

		$criteria->compare('socialnetwork_id',$this->socialnetwork_id);
		$criteria->compare('socialnetwork_name',$this->socialnetwork_name,true);
		$criteria->compare('socialnetwork_url',$this->socialnetwork_url,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Socialnetworks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
