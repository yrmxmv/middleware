<?php
namespace app\code\admin\models;

use app\code\admin\models\core\Search;
use app\code\admin\models\source\Table;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class CoreConfig extends ActiveRecord
{
    public static function tableName()
    {
        return Table::CORE_CONFIG;
    }

    public static function updateScopeValue($value, $path, $scopeId = 0, $type = 'default')
    {
        $self = self::find()->scopeValue($type, $scopeId, $path);
        if (isset($self)) {
            $self->setAttribute('value', $value);
            return $self->save();
        }

        $config = new CoreConfig();
        $config->setAttribute('value', $value);
        $config->setAttribute('path', $path);
        $config->setAttribute('scope', $type);
        $config->setAttribute('scope_id', $scopeId);
        return $config->save();
    }

    public static function deleteScopeValue($path, $scopeId = 0, $type = 'default')
    {
        $self = self::find()->scopeValue($type, $scopeId, $path);
        if (isset($self)) {
            return $self->delete();
        }

        return false;
    }

    public static function find()
    {
        return \Yii::createObject(Search::class, [get_called_class()]);
    }

    public function rules()
    {
        return [
            [['scope', 'scope_id', 'path', 'value'], 'required'],
            [['scope', 'path', 'value'], 'string'],
            [['scope_id'], 'integer'],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ]
            ]
        ];
    }
}