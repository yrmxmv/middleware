<?php
namespace app\code\store\models;

use app\code\store\models\source\Table;
use app\code\store\models\store\Search;
use app\code\store\models\store\Site;
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
            ['code', 'unique', 'targetClass' => self::class, 'message' => 'This code has already been taken.'],
            [['website_id', 'group_id', 'sort_order', 'is_active'], 'integer'],
        ];
    }

    public static function find()
    {
        return Yii::createObject(Search::class, [get_called_class()]);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            Site::create($this);
        } else if (isset($changedAttributes['code'])) {
            Site::update($changedAttributes['code'], $this);
        }
    }
}