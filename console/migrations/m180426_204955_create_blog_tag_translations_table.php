<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog_tag_translations`.
 */
class m180426_204955_create_blog_tag_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('blog_tag_translations', [
            'tag_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('{{%pk-blog_tag_translations}}', '{{%blog_tag_translations}}', ['tag_id', 'lang_id']);

        $this->createIndex('{{%idx-blog_tag_translations-blog_tag-tag_id}}', '{{%blog_tag_translations}}',
            'tag_id');
        $this->createIndex('{{%idx-blog_tag_translations-lang_id}}', '{{%blog_tag_translations}}',
            'lang_id');

        $this->addForeignKey('fk_blog_tag_translations_tag_id',
            'blog_tag_translations', 'tag_id',
            'blog_tags', 'id',
            'CASCADE', 'RESTRICT');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('blog_tag_translations');
    }
}
