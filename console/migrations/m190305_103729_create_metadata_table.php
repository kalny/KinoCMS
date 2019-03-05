<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%metadata}}`.
 */
class m190305_103729_create_metadata_table extends Migration
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

        $this->createTable('{{%metadata}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer()->notNull(),
            'year' => $this->string(4)->notNull(),
            'director' => $this->string(50)->notNull(),
            'producer' => $this->string(50)->notNull(),
            'composer' => $this->string(50)->notNull(),
            'screenwriter' => $this->string(50)->notNull(),
            'operator' => $this->string(50)->notNull(),
            'budget' => $this->integer()->notNull(),
            'age' => $this->integer()->notNull(),
            'duration' => $this->float()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-metadata-film_id', '{{%metadata}}', 'film_id');

        $this->addForeignKey('fk-metadata-film_id', '{{%metadata}}', 'film_id',
            '{{%films}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-metadata-film_id', '{{%metadata}}');
        $this->dropTable('{{%metadata}}');
    }
}
