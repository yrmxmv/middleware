<?php
use yii\db\Migration;
use app\code\store\models\source\Table;

/**
 * Class m210105_200833_website_tables
 */
class m210105_200833_website_tables extends Migration
{
    protected $store_website_table = Table::STORE_WEBSITE;

    protected $store_group_table = Table::STORE_GROUP;

    protected $store_table = Table::STORE;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createStoreTables();
        $this->insertStoreValues();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->store_table);
        $this->dropTable($this->store_group_table);
        $this->dropTable($this->store_website_table);
    }

    protected function createStoreTables()
    {
        $this->createTable($this->store_website_table, [
            'website_id' => $this->primaryKey(5)->comment('Website ID'),
            'code' => $this->char(32)->defaultValue(null)->comment('Code'),
            'name' => $this->char(64)->defaultValue(null)->comment('Website Name'),
            'sort_order' => $this->smallInteger(5)->defaultValue(0)->comment('Sort Order'),
            'default_group_id' => $this->smallInteger(5)->defaultValue(0)->comment('Default Group ID'),
            'is_default' => $this->smallInteger(5)->defaultValue(0)->comment('Defines Is Website Default')
        ]);
        $this->createTable($this->store_group_table, [
            'group_id' => $this->primaryKey(5)->comment('Group ID'),
            'website_id' => $this->integer(5)->comment('Website ID'),
            'code' => $this->char(32)->defaultValue(null)->comment('Store group unique code'),
            'name' => $this->char(255)->defaultValue(null)->comment('Store Group Name'),
            'root_category_id' => $this->integer(10)->defaultValue(0)->comment('Root Category ID'),
            'default_store_id' => $this->smallInteger(5)->defaultValue(0)->comment('Default Store ID')
        ]);
        $this->createTable($this->store_table, [
            'store_id' => $this->primaryKey(5)->comment('Store ID'),
            'website_id' => $this->integer(5)->comment('Website ID'),
            'group_id' => $this->integer(5)->comment('Group ID'),
            'code' => $this->char(32)->defaultValue(null)->comment('Code'),
            'name' => $this->char(255)->defaultValue(null)->comment('Store Name'),
            'sort_order' => $this->tinyInteger(4)->defaultValue(0),
            'is_active' => $this->tinyInteger(4)->defaultValue(0)
        ]);

        $this->createIndex('group_website_idx', $this->store_group_table, 'website_id');
        $this->addForeignKey('group_website_idx', $this->store_group_table, 'website_id', $this->store_website_table, 'website_id', 'SET NULL', 'CASCADE');

        $this->createIndex('store_website_idx', $this->store_table, 'website_id');
        $this->addForeignKey('store_website_idx', $this->store_table, 'website_id', $this->store_website_table, 'website_id', 'SET NULL', 'CASCADE');

        $this->createIndex('store_group_idx', $this->store_table, 'group_id');
        $this->addForeignKey('store_group_idx', $this->store_table, 'group_id', $this->store_group_table, 'group_id', 'SET NULL', 'CASCADE');
    }

    protected function insertStoreValues()
    {
        $this->insert($this->store_website_table, [
            'website_id' => 1,
            'name' => 'Admin',
            'code' => 'admin',
            'sort_order' => 0,
            'default_group_id' => 1,
            'is_default' => 1,
        ]);

        $this->insert($this->store_website_table, [
            'website_id' => 2,
            'name' => 'Main Website',
            'code' => 'base',
            'sort_order' => 0,
            'default_group_id' => 2,
            'is_default' => 1
        ]);

        $this->insert($this->store_group_table, [
            'group_id' => 1,
            'website_id' => 1,
            'name' => 'Default',
            'code' => 'default',
            'root_category_id' => 1,
            'default_store_id' => 1
        ]);

        $this->insert($this->store_group_table, [
            'group_id' => 2,
            'website_id' => 2,
            'name' => 'Main Website Store',
            'code' => 'main_website_store',
            'root_category_id' => 2,
            'default_store_id' => 2
        ]);

        $this->insert($this->store_table, [
            'store_id' => 1,
            'website_id' => 1,
            'group_id' => 1,
            'code' => 'admin',
            'name' => 'Admin',
            'sort_order' => 0,
            'is_active' => 1
        ]);

        $this->insert($this->store_table, [
            'store_id' => 2,
            'website_id' => 2,
            'group_id' => 2,
            'code' => 'default',
            'name' => 'Default Store View',
            'sort_order' => 0,
            'is_active' => 1
        ]);
    }
}
