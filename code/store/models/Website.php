<?php
namespace app\code\store\models;

use app\code\store\models\source\Table;
use yii\db\ActiveRecord;
use Yii;

class Website extends ActiveRecord
{
    public static function tableName()
    {
        return Table::STORE_WEBSITE;
    }

    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name', 'code'], 'string'],
            [['is_default', 'default_group_id', 'sort_order'], 'integer'],
        ];
    }

    public static function getCollection()
    {
        $sql = "select sw.name as website_name, sw.code as website_code, sw.website_id, sg.name as group_name, sg.code as group_code, sg.group_id, s.name as store_name, s.code as store_code, s.store_id ";
        $sql .= "from store_website sw left join store_group sg on(sw.website_id = sg.website_id) left join store as s on (sg.group_id = s.group_id)";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function getCollectionCount()
    {
        $sql = "select count(*) as count from store_website sw left join store_group sg on(sw.website_id = sg.website_id) left join store as s on (sg.group_id = s.group_id)";
        $query = Yii::$app->db->createCommand($sql)->queryOne();

        return $query['count'];
    }
}