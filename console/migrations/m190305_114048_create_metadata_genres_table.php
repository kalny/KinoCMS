<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%metadata_genres}}`.
 */
class m190305_114048_create_metadata_genres_table extends Migration
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

        $this->createTable('{{%metadata_genres}}', [
            'metadata_id' => $this->integer()->notNull(),
            'genre_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-metadata_genres-metadata_id', '{{%metadata_genres}}', 'metadata_id');

        $this->addForeignKey('fk-metadata_genres-metadata_id', '{{%metadata_genres}}', 'metadata_id',
            '{{%metadata}}', 'id', 'CASCADE');

        $this->createIndex('idx-metadata_genres-genre_id', '{{%metadata_genres}}', 'genre_id');

        $this->addForeignKey('fk-metadata_genres-genre_id', '{{%metadata_genres}}', 'genre_id',
            '{{%genres}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-metadata_genres-metadata_id', '{{%metadata_genres}}');
        $this->dropForeignKey('fk-metadata_genres-genre_id', '{{%metadata_genres}}');
        $this->dropTable('{{%metadata_genres}}');
    }
}
