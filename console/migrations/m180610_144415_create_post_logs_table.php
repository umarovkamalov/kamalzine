<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post_logs`.
 */
class m180610_144415_create_post_logs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post_logs', [
            'id' => $this->primaryKey(),
            'count' => $this->integer()->notNull(),
            'cat_id' => $this->integer(),
            'post_id' => $this->integer()->notNull(),
            'token' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('post_logs');
    }
}
