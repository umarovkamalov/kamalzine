<?php

use yii\db\Migration;

/**
 * Handles the creation of table `event_products`.
 */
class m180507_200646_create_event_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('event_products', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'event_id' => $this->integer()->notNull(),
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

            $this->addForeignKey('fk_product_events_products_id',
                'event_products',
                'product_id',
                'shop_products',
                'id',
                'CASCADE',
                'CASCADE');

            $this->addForeignKey('fk_product_events_events_id',
                'event_products',
                'event_id',
                'events',
                'id',
                'CASCADE',
                'CASCADE');

    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('event_products');
    }
}
