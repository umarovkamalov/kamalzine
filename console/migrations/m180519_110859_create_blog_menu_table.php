<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu`.
 */
class m180519_110859_create_blog_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('blog_menu', [
            'id' => $this->primaryKey(),
            'sort' => $this->integer(),
            'lft' => $this->integer(),
            'rgt' => $this->integer(),
            'url' => $this->string()->defaultValue('#'),
            'type' => $this->integer()->defaultValue(0),
            'parent_id' => $this->integer()->defaultValue(0),
            'status' => $this->integer()->notNull(),
            'icon' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('blog_menu');
    }
}
