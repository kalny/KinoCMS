<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%films_seo}}`.
 */
class m190304_091356_create_films_seo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%films_seo}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer()->notNull(),
            'title' => $this->text()->notNull(),
            'description' => $this->text()->defaultValue(null),
            'keywords' => $this->text()->defaultValue(null),
        ], $tableOptions);

        $this->createIndex('idx-films_seo-film_id', '{{%films_seo}}', 'film_id');

        $this->addForeignKey('fk-films_seo-film_id', '{{%films_seo}}', 'film_id',
            '{{%films}}', 'id', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-films_seo-film_id', '{{%films_seo}}');
        $this->dropTable('{{%films_seo}}');
    }
}
