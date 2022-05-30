<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu_translations`.
 */
class m180522_040734_create_blog_menu_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('blog_menu_translations', [
            'menu_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'title' => $this->string(),
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('{{%pk-blog_menu_translations}}', '{{%blog_menu_translations}}', ['menu_id', 'lang_id']);

        $this->createIndex('{{%idx-blog_menu_translations-menu_id}}', '{{%blog_menu_translations}}',
            'menu_id');
        $this->createIndex('{{%idx-blog_menu_translations-menu_lang_id}}', '{{%blog_menu_translations}}',
            'lang_id');

        $this->addForeignKey('fk_blog_menu_translations_menu_id-menu_id',
            'blog_menu_translations', 'menu_id',
            'blog_menu', 'id',
            'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('blog_menu_translations');
    }
}
