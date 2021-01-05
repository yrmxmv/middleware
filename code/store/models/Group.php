<?php
namespace app\code\store\models;

use app\code\store\models\source\Table;
use yii\db\ActiveRecord;

class Group extends ActiveRecord
{
    public static function tableName()
    {
        return Table::STORE_GROUP;
    }

    public function rules()
    {
        return [
            [['name', 'code', 'website_id', 'root_category_id'], 'required'],
            [['name', 'code'], 'string'],
            [['website_id', 'default_store_id', 'root_category_id'], 'integer'],
        ];
    }
}