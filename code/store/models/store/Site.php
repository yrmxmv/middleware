<?php
namespace app\code\store\models\store;

use app\code\admin\models\source\Scope;
use app\code\store\models\Store;
use Yii;
use yii\db\Migration;

class Site
{
    public static function findByHost($host)
    {
        return $host;
    }

    public static function findDefault()
    {
        return '$host';
    }

    public function getAllScopes($host)
    {
        $sql = "select `scope`, `scope_id`, `path`, `value` from `core_config` where (`scope`, `scope_id`) in (select `scope`, `scope_id` from `core_config` where (`path` = 'web/unsecure/base_url' or `path` = 'web/secure/base_url') and `value` = :host) order by `path` desc";
        $websites = Yii::$app->db->createCommand($sql, [':host' => $host])->queryAll();
        $result = $values = [];
        $index = 1;
        foreach ($websites as $website) {
            $result[$index] = [
                'scope_id' => $website['scope_id'],
                'scope' => $website['scope'],
                'path' => $website['path'],
                'value' => $website['value'],
            ];

            if (in_array($website['path'], $values)) {
                $prev = $index - 1;
                if (Scope::SOURCE_PRIORITY[$result[$prev]['scope']] < Scope::SOURCE_PRIORITY[$result[$index]['scope']]) {
                    unset($result[$prev]);
                } else {
                    $result[$index] = $result[$prev];
                    continue;
                }
            }

            $values[] = $website['path'];
            $index++;
        }

        return $result;
    }

    public static function create(Store $store)
    {
        $table = 'core_config_store_' . $store->code;
        $migration = new Migration();
        Yii::$app->db->createCommand()->createTable($table, [
            'config_id' => $migration->primaryKey(11)->comment('Config ID'),
            'path' => $migration->char(255)->defaultValue('general')->comment('Config Path'),
            'value' => $migration->text()->defaultValue(null)->comment('Config Value'),
        ])->execute();
    }
}