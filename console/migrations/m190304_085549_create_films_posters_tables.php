<?php

use yii\db\Migration;

/**
 * Class m190304_085549_create_films_posters_tables
 */
class m190304_085549_create_films_posters_tables extends Migration
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

        $this->createTable('{{%films}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'description' => $this->text()->notNull(),
            'trailer_url' => $this->string(100)->defaultValue(null),
            'main_poster_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-films-main_poster_id', '{{%films}}', 'main_poster_id');

        $this->createTable('{{%posters}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer()->notNull(),
            'image' => $this->string(50)->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-posters-film_id', '{{%posters}}', 'film_id');

        $this->addForeignKey('fk-films-main_poster', '{{%films}}', 'main_poster_id',
            '{{%posters}}', 'id', 'RESTRICT');

        $this->addForeignKey('fk-posters-film_id', '{{%posters}}', 'film_id',
            '{{%films}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-posters-film_id', '{{%posters}}');
        $this->dropForeignKey('fk-films-main_poster', '{{%films}}');
        $this->dropTable('{{%posters}}');
        $this->dropTable('{{%films}}');
    }

}
