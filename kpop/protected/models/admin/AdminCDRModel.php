<?php

Yii::import('application.models.db.CDRModel');

class AdminCDRModel extends CDRModel
{
    var $className = __CLASS__;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}