<?php

/**
 * This is the model class for table "supplierscompany".
 *
 * The followings are the available columns in table 'supplierscompany':
 * @property integer $supplierscompany_id
 * @property string $name
 * @property string $address
 * @property integer $suppliers_id
 * @property string $logo
 * @property string $logos3url
 */
class Supplierscompany extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supplierscompany';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, suppliers_id,opentime,closetime', 'required'),
            array('website', 'length', 'max'=>100),
            array('map', 'length', 'max'=>2000),
			array('suppliers_id, totalpoint,commentcount', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>75),
			array('address', 'length', 'max'=>255),
			array('logo', 'length', 'max'=>150),
			array('logos3url', 'length', 'max'=>255),

			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('supplierscompany_id, name, address, suppliers_id, logo, logos3url,totalpoint,commentcount,opentime,closetime,map', 'safe', 'on'=>'search'),
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
			'supplierscompany_id' => 'Supplierscompany',
			'name' => 'Şirket Ünvanı',
			'address' => 'Adres',
			'suppliers_id' => 'Tearikçi',
			'logo' => 'Logo',
			'logos3url' => 'Logos3url',
			"totalpoint"=>"Toplam Puan",
			"opentime"=>"Açılış Saati",
			"closetime"=>"Kapanış Saati",
			"map"=>"Harita konumunuz (Google Maps Harita yerleştirdeki URL)",
            "website" => "Web Adresiniz"
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

		$criteria->compare('supplierscompany_id',$this->supplierscompany_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('logos3url',$this->logos3url,true);
		$criteria->compare('totalpoint',$this->totalpoint);
		$criteria->compare('commentcount',$this->commentcount);
		$criteria->compare('opentime',$this->opentime);
		$criteria->compare('closetime',$this->closetime);
		$criteria->compare('map',$this->map);
		$criteria->compare('map',$this->website);

		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Supplierscompany the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
