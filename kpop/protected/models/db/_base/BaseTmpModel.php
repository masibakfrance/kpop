<?php

/**
 * This is the model class for table "tmp".
 *
 * The followings are the available columns in table 'tmp':
 * @property integer $id
 * @property string $user_phone
 * @property integer $obj_id
 * @property string $created_time
 * @property string $url
 */
class BaseTmpModel extends MainActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tmp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tmp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('obj_id', 'numerical', 'integerOnly'=>true),
			array('user_phone', 'length', 'max'=>50),
			array('url', 'length', 'max'=>255),
			array('created_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_phone, obj_id, created_time, url', 'safe', 'on'=>'search'),
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
            return Common::loadMessages("db");
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_phone',$this->user_phone,true);
		$criteria->compare('obj_id',$this->obj_id);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['pageSize']),
			),
		));
	}
}