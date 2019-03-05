<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%posters}}`.
 */
class m190305_085609_drop_posters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-films-main_poster', '{{%films}}');
        $this->dropForeignKey('fk-posters-film_id', '{{%posters}}');
        $this->dropTable('{{%posters}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }
}
