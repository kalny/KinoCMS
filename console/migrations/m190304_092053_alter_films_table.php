<?php

use yii\db\Migration;

/**
 * Class m190304_092053_alter_films_table
 */
class m190304_092053_alter_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%films}}', 'main_poster_id', $this->integer()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%films}}', 'main_poster_id', $this->integer()->notNull());
    }
}
