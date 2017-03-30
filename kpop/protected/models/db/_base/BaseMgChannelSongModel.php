<?php

/**
 * This is the model class for table "mg_channel_song".
 *
 * The followings are the available columns in table 'mg_channel_song':
 * @property string $id
 * @property integer $channel_id
 * @property string $song_id
 * @property string $song_code
 * @property integer $sorder
 */
class BaseMgChannelSongModel extends MainActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MgChannelSong the static model class
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
		return 'mg_channel_song';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('channel_id, song_id', 'required'),
			array('channel_id, sorder', 'numerical', 'integerOnly'=>true),
			array('song_id', 'length', 'max'=>20),
			array('song_code', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, channel_id, song_id, song_code, sorder', 'safe', 'on'=>'search'),
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('channel_id',$this->channel_id);
		$criteria->compare('song_id',$this->song_id,true);
		$criteria->compare('song_code',$this->song_code,true);
		$criteria->compare('sorder',$this->sorder);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['pageSize']),
			),
		));
	}
}