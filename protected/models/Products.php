<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $products_id
 * @property integer $suppliers_id
 * @property string $name
 * @property integer $productgroup_id
 * @property integer $deleted
 * @property integer $admindeleted
 * @property string $dateadd
 * @property integer $status
 * @property string $subtitle
 * @property string $text
 * @property string $salestype
 * @property string $lastshowdates
 * @property integer $cargopricetype
 * @property double $cargoprice
 * @property double $price
 * @property integer $lastshowday
 * @property integer $piece
 */
class Products extends CActiveRecord
{

	public $productgroup_name;
	public $imageS;
	public $show;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('suppliers_id, productgroup_id, deleted, admindeleted, dateadd, status,uservotecount,totalpoint,viewok', 'required'),
			array('suppliers_id, productgroup_id, deleted, admindeleted, status, cargopricetype, lastshowday, lastbidday, piece, startingprice,discount,currency,viewok', 'numerical', 'integerOnly'=>true),
			array('cargoprice, price, startingprice,uservotecount,salestype', 'numerical'),
			array('name, subtitle', 'length', 'max'=>255),
			array('text, lastshowdates', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('products_id,currency, suppliers_id, name, productgroup_id, deleted, admindeleted, dateadd, status, subtitle, text, salestype, lastshowdates, cargopricetype, cargoprice, price, lastshowday, lastbidday, piece, status_t, startingprice,discount,uservotecount,totalpoint,viewok, lastbidprice', 'safe', 'on'=>'search'),
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
            'productgroup'    => array(self::BELONGS_TO, 'Productgroup',    'productgroup_id')
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'show'=>'Gösterim',
			'products_id' => 'ID',
			'suppliers_id' => 'Tedarikçi',
			'name' => 'Ürün Adı',
			'productgroup_id' => 'Ürün Grubu',
			'deleted' => 'Kullanıcı Silmiş mi ? ',
			'admindeleted' => 'Admin Silmiş mi ?',
			'dateadd' => 'Dateadd',
			'status' => 'Durumu',
			'subtitle' => 'Alt Başlık',
			'text' => 'Açıklama',
			'salestype' => 'Satış Şekli',
			'lastshowdates' => 'Gösterim Tarihi',
			'cargopricetype' => 'Cargopricetype',
			'cargoprice' => 'Cargoprice',
			'price' => 'Fiyat',
			'lastshowday' => 'Gösterim',
			'lastbidday'=>'Gösterim İhale',
			'piece' => 'Adet',
			'code'=>'Ürün Kodu',
			'startingprice'=>'Başlangıç Fiyatı',
			"currency"=>'Para Birimi',
			"updatedateadd"=>"Güncellenme Tarihi",
			'viewok'=>"Gösterim",
			"lastbidprice"=>"En son teklif fiyatı",
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
		$criteria->alias = 'i';
		$criteria->join= 'LEFT JOIN productgroup pg ON (i.productgroup_id=pg.productgroup_id)';
		$criteria->compare('i.i.products_id',$this->products_id);
		$criteria->compare('i.suppliers_id',$this->suppliers_id);
		$criteria->compare('i.name',$this->name,true);
		$criteria->compare('pg.name',$this->productgroup_id,true);
		$criteria->compare('i.deleted',$this->deleted);
		$criteria->compare('i.admindeleted',$this->admindeleted);
		$criteria->compare('i.dateadd',$this->dateadd,true);
		$criteria->compare('i.updatedateadd',$this->updatedateadd,true);
		$criteria->compare('i.status',$this->status);
		$criteria->compare('i.subtitle',$this->subtitle,true);
		$criteria->compare('i.text',$this->text,true);
		$criteria->compare('i.salestype',$this->salestype,true);
		$criteria->compare('i.currency',$this->currency);
		$criteria->compare('i.uservotecount',$this->uservotecount);
		$criteria->compare('i.totalpoint',$this->totalpoint);
		$criteria->compare('i.viewok',$this->viewok);
		$criteria->compare('i.lastbidprice',$this->lastbidprice);
		

		if(!empty($this->lastshowdates) && $this->lastshowdates==1)
		{

			$criteria->compare('i.status',1);
			$criteria->compare('i.deleted',0);
			$criteria->compare('i.admindeleted',0);
			$criteria->compare('i.lastshowdates>',date("Y-m-d H:i:s"));
		}elseif(!empty($this->lastshowdates) && $this->lastshowdates==2)
		{
			$criteria->compare('i.status!=',1);
			$criteria->compare('i.deleted!=',0);
			$criteria->compare('i.admindeleted!=0',0);
			$criteria->compare('i.lastshowdates<',date("Y-m-d H:i:s"));
		}
		$criteria->compare('i.cargopricetype',$this->cargopricetype);
		$criteria->compare('i.cargoprice',$this->cargoprice);
		$criteria->compare('i.price',$this->price);
		$criteria->compare('i.startingprice',$this->startingprice);

		$criteria->compare('i.lastshowday',$this->lastshowday);
		$criteria->compare('i.lastbidday',$this->lastbidday);
		
		$criteria->compare('i.piece',$this->piece);

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
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
