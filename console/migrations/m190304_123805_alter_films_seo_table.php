<?php

use yii\db\Migration;

/**
 * Class m190304_123805_alter_films_seo_table
 */
class m190304_123805_alter_films_seo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-films_seo-film_id', '{{%films_seo}}');
        $this->addForeignKey('fk-films_seo-film_id', '{{%films_seo}}', 'film_id',
            '{{%films}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-films_seo-film_id', '{{%films_seo}}');
        $this->addForeignKey('fk-films_seo-film_id', '{{%films_seo}}', 'film_id',
            '{{%films}}', 'id', 'RESTRICT');
    }

}
