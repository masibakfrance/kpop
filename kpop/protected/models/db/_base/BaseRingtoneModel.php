<?php

/**
 * This is the model class for table "ringtone".
 *
 * The followings are the available columns in table 'ringtone':
 * @property integer $id
 * @property string $old_id
 * @property string $code
 * @property string $name
 * @property integer $category_id
 * @property string $artist_id
 * @property string $artist_name
 * @property string $song_id
 * @property integer $created_by
 * @property integer $approved_by
 * @property integer $updated_by
 * @property integer $cp_id
 * @property integer $bitrate
 * @property integer $duration
 * @property double $price
 * @property string $created_time
 * @property string $updated_time
 * @property integer $sorder
 * @property integer $status
 * @property integer $sync_status
 * @property integer $featured
 */
class BaseRingtoneModel extends MainContentModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ringtone the static model class
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
		return 'ringtone';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('category_id, created_by, approved_by, updated_by, cp_id, bitrate, duration, sorder, status, sync_status, featured', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('old_id, code', 'length', 'max'=>10),
			array('name', 'length', 'max'=>255),
			array('artist_id, song_id', 'length', 'max'=>11),
			array('artist_name', 'length', 'max'=>160),
			array('created_time, updated_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, old_id, code, name, category_id, artist_id, artist_name, song_id, created_by, approved_by, updated_by, cp_id, bitrate, duration, price, created_time, updated_time, sorder, status, sync_status, featured', 'safe', 'on'=>'search'),
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
		$criteria->compare('old_id',$this->old_id,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('artist_id',$this->artist_id,true);
		$criteria->compare('artist_name',$this->artist_name,true);
		$criteria->compare('song_id',$this->song_id,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('approved_by',$this->approved_by);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('cp_id',$this->cp_id);
		$criteria->compare('bitrate',$this->bitrate);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('price',$this->price);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('updated_time',$this->updated_time,true);
		$criteria->compare('sorder',$this->sorder);
		$criteria->compare('status',$this->status);
		$criteria->compare('sync_status',$this->sync_status);
		$criteria->compare('featured',$this->featured);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['pageSize']),
			),
		));
	}
}