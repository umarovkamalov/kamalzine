<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog_post_translations`.
 */
class m180426_194934_create_blog_post_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('blog_post_translations', [
                'post_id' => $this->integer()->notNull(),
                'title' => $this->string()->notNull(),
                'description' => $this->text(),
                'content' => 'MEDIUMTEXT',
                'lang_id' => $this->integer()->notNull(),
            ]);
        $this->addPrimaryKey('{{%pk-blog_post_translations}}', '{{%blog_post_translations}}', ['post_id', 'lang_id']);

        $this->createIndex('{{%idx-blog_post_translations-post_id}}', '{{%blog_post_translations}}', 'post_id');
        $this->createIndex('{{%idx-blog_post_translations-lang_id}}', '{{%blog_post_translations}}', 'lang_id');

        $this->addForeignKey('fk_blog_post_translations_blog_posts_id','blog_post_translations', 'post_id','blog_posts', 'id','CASCADE', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('blog_post_translations');
    }
}
