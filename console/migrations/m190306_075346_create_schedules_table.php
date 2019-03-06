<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schedules}}`.
 */
class m190306_075346_create_schedules_table extends Migration
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

        $this->createTable('{{%schedules}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->notNull(),
            'film_id' => $this->integer()->notNull(),
            'date' => $this->integer()->notNull(),
            'hall' => $this->string(50)->notNull(),
            'price_1' => $this->integer(7)->notNull(),
            'price_2' => $this->integer(7)->notNull(),
            'price_3' => $this->integer(7)->notNull(),
            'type' => $this->integer(1)->notNull(),
            'status' => $this->integer(1)->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-schedules-city_id', '{{%schedules}}', 'city_id');
        $this->createIndex('idx-schedules-film_id', '{{%schedules}}', 'film_id');

        $this->addForeignKey('fk-schedules-city_id', '{{%schedules}}', 'city_id',
            '{{%cities}}', 'id', 'RESTRICT');

        $this->addForeignKey('fk-schedules-film_id', '{{%schedules}}', 'film_id',
            '{{%films}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-schedules-city_id', '{{%schedules}}');
        $this->dropForeignKey('fk-schedules-film_id', '{{%schedules}}');
        $this->dropTable('{{%schedules}}');
    }
}
