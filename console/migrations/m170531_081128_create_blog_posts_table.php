<?php

use yii\db\Migration;

class m170531_081128_create_blog_posts_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%blog_posts}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'photo' => $this->string(),
            'status' => $this->integer()->notNull(),
            'meta_json' => 'JSON NOT NULL',
            'source_name' => $this->string(),
            'source_address' => $this->string(),
        ], $tableOptions);

        $this->createIndex('{{%idx-blog_posts-category_id}}', '{{%blog_posts}}', 'category_id');

        $this->addForeignKey('{{%fk-blog_posts-category_id}}', '{{%blog_posts}}', 'category_id', '{{%blog_categories}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%blog_posts}}');
    }
}
