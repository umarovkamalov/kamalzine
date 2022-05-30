<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page_translations`.
 */
class m180429_133412_create_page_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('page_translations', [
            'page_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'content' => 'MEDIUMTEXT',
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('{{%pk-page_translations}}', '{{%page_translations}}', ['page_id', 'lang_id']);

        $this->createIndex('{{%idx-page_translations-page_id}}', '{{%page_translations}}',
            'page_id');
        $this->createIndex('{{%idx-page_translations-lang_id}}', '{{%page_translations}}',
            'lang_id');

        $this->addForeignKey('fk_page_translations_page_id_pages_id',
            'page_translations', 'page_id',
            'pages', 'id',
            'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('page_translations');
    }
}
