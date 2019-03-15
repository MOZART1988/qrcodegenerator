<?php

use yii\db\Migration;

/**
 * Handles the creation of table `promo_codes`.
 */
class m190315_075925_create_promo_codes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('promo_codes', [
            'id' => $this->primaryKey(),
            'create_date' => $this->dateTime()->null(),
            'update_date' => $this->dateTime()->null(),
            'code' => $this->string()->notNull(),
            'is_active' => $this->tinyInteger()->defaultValue(1)->null()
        ]);

        $this->createIndex('promo_codes_is_active', 'promo_codes', 'is_active');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('promo_codes');
    }
}
