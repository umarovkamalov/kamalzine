<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ads`.
 */
class m180606_143039_create_blog_ads_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%blog_ads}}', [
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
        $this->dropTable('blog_ads');
    }
}
