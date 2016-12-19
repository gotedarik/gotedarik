<?php

/**
 * This is the model class for table "help_questions".
 *
 * The followings are the available columns in table 'help_questions':
 * @property integer $question_id
 * @property integer $category_id
 * @property string $admin_id
 * @property string $question
 * @property string $answer
 * @property string $dateadd
 * @property integer $popular
 */
class HelpQuestions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'help_questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, admin_id, question, answer, dateadd', 'required'),
			array('category_id, popular,readyquestions', 'numerical', 'integerOnly'=>true),
			array('admin_id', 'length', 'max'=>45),
			array('question', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('question_id, category_id, admin_id, question, answer, dateadd, popular', 'safe', 'on'=>'search'),
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
			'question_id' => 'Soru_Id',
			'category_id' => 'Kategori',
			'admin_id' => 'Admin',
			'question' => 'Soru',
			'answer' => 'Cevap',
			'dateadd' => 'Eklenme Tarihi',
			'popular' => 'Popüler Soru',
            'readyquestions' => 'Hazır Hizmetler'
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

		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('admin_id',$this->admin_id,true);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('dateadd',$this->dateadd,true);
		$criteria->compare('popular',$this->popular);
		$criteria->compare('readyquestions',$this->readyquestions);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HelpQuestions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
