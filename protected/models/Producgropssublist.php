<?php

/**
 * This is the model class for table "producgropssublist".
 *
 * The followings are the available columns in table 'producgropssublist':
 * @property integer $producgropssublist_id
 * @property integer $productgroup_id
 * @property string $productgroupsub_ids
 */
class Producgropssublist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producgropssublist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('productgroup_id, productgroupsub_ids', 'required'),
			array('productgroup_id', 'numerical', 'integerOnly'=>true),
			array('productgroupsub_ids', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('producgropssublist_id, productgroup_id, productgroupsub_ids', 'safe', 'on'=>'search'),
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
			'producgropssublist_id' => 'Producgropssublist',
			'productgroup_id' => 'Productgroup',
			'productgroupsub_ids' => 'Productgroupsub Ids',
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

		$criteria->compare('producgropssublist_id',$this->producgropssublist_id);
		$criteria->compare('productgroup_id',$this->productgroup_id);
		$criteria->compare('productgroupsub_ids',$this->productgroupsub_ids,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producgropssublist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
