<?php
namespace app\code\store\models;

use app\code\store\models\source\Table;
use app\code\store\models\store\Search;
use yii\db\ActiveRecord;
use Yii;

class Store extends ActiveRecord
{
    public static function tableName()
    {
        return Table::STORE;
    }

    public function rules()
    {
        return [
            [['name', 'code', 'group_id'], 'required'],
            [['name', 'code'], 'string'],
            [['website_id', 'group_id', 'sort_order', 'is_active'], 'integer'],
        ];
    }

    public static function find()
    {
        return Yii::createObject(Search::class, [get_called_class()]);
    }
}