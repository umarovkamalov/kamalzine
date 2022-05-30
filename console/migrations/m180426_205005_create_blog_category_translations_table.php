<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog_category_translations`.
 */
class m180426_205005_create_blog_category_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('blog_category_translations', [
            'category_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'title' => $this->string(),
            'description' => $this->text(),
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('{{%pk-blog_category_translations}}', '{{%blog_category_translations}}', ['category_id', 'lang_id']);

        $this->createIndex('{{%idx-blog_category_translations_blog_categories-blog_id}}', '{{%blog_category_translations}}',
            'category_id');
        $this->createIndex('{{%idx-blog_category_translations_blog_categories-lang_id}}', '{{%blog_category_translations}}',
            'lang_id');

        $this->addForeignKey('fk_blog_category_translations_category_id',
            'blog_category_translations', 'category_id',
            'blog_categories', 'id',
            'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('blog_category_translations');
    }
}
