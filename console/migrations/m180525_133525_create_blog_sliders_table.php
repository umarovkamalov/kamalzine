<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog_sliders`.
 */
class m180525_133525_create_blog_sliders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%blog_sliders}}', [
            'id' => $this->primaryKey(),
            'type' => $this->integer()->defaultValue(0),
            'url' => $this->string(),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'photo' => $this->string(),
            'status' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('blog_sliders');
    }
}
