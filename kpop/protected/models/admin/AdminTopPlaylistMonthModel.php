<?php

Yii::import('application.models.db.TopPlaylistMonthModel');

class AdminTopPlaylistMonthModel extends TopPlaylistMonthModel
{
    var $className = __CLASS__;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}