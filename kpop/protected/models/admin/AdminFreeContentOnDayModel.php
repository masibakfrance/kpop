<?php

Yii::import('application.models.db.FreeContentOnDayModel');

class AdminFreeContentOnDayModel extends FreeContentOnDayModel
{
    var $className = __CLASS__;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}