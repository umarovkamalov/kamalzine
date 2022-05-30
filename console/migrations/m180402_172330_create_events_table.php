<?php

use yii\db\Migration;

/**
 * Handles the creation of table `events`.
 */
class m180402_172330_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('events', [
            'id' => $this->primaryKey(),
            'status' => $this->smallInteger()->notNull(),
            'begin_date' => $this->integer(),
            'end_date' => $this->integer()->notNull()
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('events');
    }
}
