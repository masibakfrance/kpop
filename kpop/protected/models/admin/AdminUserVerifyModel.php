<?php

Yii::import('application.models.db.UserVerifyModel');

class AdminUserVerifyModel extends UserVerifyModel
{
    var $className = __CLASS__;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}