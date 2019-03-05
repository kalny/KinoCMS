<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%metadata_country}}`.
 */
class m190305_111858_create_metadata_country_table extends Migration
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

        $this->createTable('{{%metadata_country}}', [
            'metadata_id' => $this->integer()->notNull(),
            'country_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-metadata_country-metadata_id', '{{%metadata_country}}', 'metadata_id');

        $this->addForeignKey('fk-metadata_country-metadata_id', '{{%metadata_country}}', 'metadata_id',
            '{{%metadata}}', 'id', 'CASCADE');

        $this->createIndex('idx-metadata_country-country_id', '{{%metadata_country}}', 'country_id');

        $this->addForeignKey('fk-metadata_country-country_id', '{{%metadata_country}}', 'country_id',
            '{{%country}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-metadata_country-metadata_id', '{{%metadata_country}}');
        $this->dropForeignKey('fk-metadata_country-country_id', '{{%metadata_country}}');
        $this->dropTable('{{%metadata_country}}');
    }
}
