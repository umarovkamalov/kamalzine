<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop_brand_translations`.
 */
class m180421_194322_create_shop_brand_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('shop_brand_translations', [
            'name' => $this->string()->notNull(),
            'brand_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('{{%pk-shop_brand_translations}}', '{{%shop_brand_translations}}', ['brand_id', 'lang_id']);

        $this->createIndex('{{%idx-shop_brand_translations-brand_id}}', '{{%shop_brand_translations}}',
            'brand_id');
        $this->createIndex('{{%idx-shop_brand_translations-lang_id}}', '{{%shop_brand_translations}}',
            'lang_id');

        $this->addForeignKey('fk_shop_brand_translations_brand_id_shop_brands_id',
            'shop_brand_translations', 'brand_id',
            'shop_brands', 'id',
            'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('shop_brand_translations');
    }
}
