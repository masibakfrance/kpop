<?php

Yii::import('application.models.db.CategoryModel');

class WebCategoryModel extends CategoryModel
{
    var $className = __CLASS__;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}