<?php

use yii\db\Migration;

/**
 * Handles the creation of table `languages`.
 */
class m180421_102718_create_languages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $this->createTable('languages', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->insert('{{%languages}}', [
            'id' => 1,
            'name' => 'ru-RU'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('languages');
    }
}
