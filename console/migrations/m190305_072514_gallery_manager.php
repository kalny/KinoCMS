<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190305_072514_gallery_manager
 */
class m190305_072514_gallery_manager extends Migration
{
    public $tableName = '{{%gallery_image}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            $this->tableName,
            array(
                'id' => Schema::TYPE_PK,
                'type' => Schema::TYPE_STRING,
                'ownerId' => Schema::TYPE_STRING . ' NOT NULL',
                'rank' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
                'name' => Schema::TYPE_STRING,
                'description' => Schema::TYPE_TEXT
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
