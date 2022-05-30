<?php

use yii\db\Migration;

/**
 *
 * Handles the creation of table `currency`.
 */
class m180527_211023_create_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'from' => $this->string(10)->notNull(),
            'to' => $this->string(10)->notNull(),
            'rating' => $this->float()->notNull(),
            'old' => $this->float()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currency');
    }
}
