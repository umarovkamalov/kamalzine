<?php

use yii\db\Migration;

class m170530_172725_create_blog_categories_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%blog_categories}}', [
            'id' => $this->primaryKey(),

            'slug' => $this->string()->notNull(),


            'sort' => $this->integer()->notNull(),
            'meta_json' => 'JSON NOT NULL',
        ], $tableOptions);

        $this->createIndex('{{%idx-blog_categories-slug}}', '{{%blog_categories}}', 'slug', true);
    }

    public function down()
    {
        $this->dropTable('{{%blog_categories}}');
    }
}
