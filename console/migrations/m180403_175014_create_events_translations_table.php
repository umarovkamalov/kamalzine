<?php

use yii\db\Migration;

/**
 * Handles the creation of table `events_translations`.
 */
class m180403_175014_create_events_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('events_translations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'event_id' => $this->integer()->notNull(),
            'description' => $this->text(),
            'lang_id' => $this->integer()->notNull(),
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createIndex('{{%idx-event_translations_event_id}}', '{{%events_translations}}', 'event_id');
        $this->createIndex('{{%idx-events_translations-lang_id}}', '{{%events_translations}}', 'lang_id');

        $this->addForeignKey('fk_events_translations_events_id',
            'events_translations',
            'event_id',
            'events',
            'id',
            'CASCADE',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('events_translations');
    }
}
