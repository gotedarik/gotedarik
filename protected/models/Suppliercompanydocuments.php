<?php

/**
 * This is the model class for table "suppliercompanydocuments".
 *
 * The followings are the available columns in table 'suppliercompanydocuments':
 * @property integer $suppliercompanydocuments_id
 * @property integer $supplierscompany_id
 * @property string $document
 * @property string $documents3url
 * @property string $documentminis3url
 * @property string $documentmini
 */
class Suppliercompanydocuments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliercompanydocuments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('supplierscompany_id, document, documents3url, documentminis3url, documentmini', 'required'),
			array('supplierscompany_id', 'numerical', 'integerOnly'=>true),
			array('document, documentmini', 'length', 'max'=>150),
			array('documents3url, documentminis3url', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('suppliercompanydocuments_id, supplierscompany_id, document, documents3url, documentminis3url, documentmini', 'safe', 'on'=>'search'),
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
			'suppliercompanydocuments_id' => 'Suppliercompanydocuments',
			'supplierscompany_id' => 'Supplierscompany',
			'document' => 'Document',
			'documents3url' => 'Documents3url',
			'documentminis3url' => 'Documentminis3url',
			'documentmini' => 'Documentmini',
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

		$criteria->compare('suppliercompanydocuments_id',$this->suppliercompanydocuments_id);
		$criteria->compare('supplierscompany_id',$this->supplierscompany_id);
		$criteria->compare('document',$this->document,true);
		$criteria->compare('documents3url',$this->documents3url,true);
		$criteria->compare('documentminis3url',$this->documentminis3url,true);
		$criteria->compare('documentmini',$this->documentmini,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Suppliercompanydocuments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
