<?php

use yii\db\Migration;

/**
 * Class m190305_115545_alter_gallery_manager_table_set_charset
 */
class m190305_115545_alter_gallery_manager_table_set_charset extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('ALTER TABLE {{%gallery_image}} CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190305_115545_alter_gallery_manager_table_set_charset cannot be reverted.\n";

        return false;
    }
}
