<?php

use app\code\admin\models\source\Scope;
use app\code\admin\models\source\Table;
use yii\db\Migration;

/**
 * Class m210105_232230_core_config_table
 */
class m210105_232230_core_config_table extends Migration
{
    protected $core_config_table = Table::CORE_CONFIG;
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createCoreConfigTable();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->core_config_table);
    }

    protected function createCoreConfigTable()
    {
        $this->createTable($this->core_config_table, [
            'config_id' => $this->primaryKey(11)->comment('Config ID'),
            'scope' => $this->char(8)->defaultValue('default')->comment('Config Scope'),
            'scope_id' => $this->integer(11)->defaultValue(0)->comment('Config Scope ID'),
            'path' => $this->char(255)->defaultValue('general')->comment('Config Path'),
            'value' => $this->text()->defaultValue(null)->comment('Config Value'),
            'updated_at' => $this->integer(11)->comment('Updated At')
        ]);
    }
}
