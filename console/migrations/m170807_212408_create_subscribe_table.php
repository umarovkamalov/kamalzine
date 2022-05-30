<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscribe`.
 */
class m170807_212408_create_subscribe_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('subscribe', [
            'id' => $this->primaryKey(),
            'email' => $this->string('100'),
            'create_at' => $this->dateTime(),
            'update_at' => $this->dateTime(),
            'date_start' => $this->dateTime(),
            'date_end' => $this->dateTime(),
            'cat_id' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('subscribe');
    }
}
