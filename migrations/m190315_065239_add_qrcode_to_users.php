<?php

use yii\db\Migration;

/**
 * Class m190315_065239_add_qrcode_to_users
 */
class m190315_065239_add_qrcode_to_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'qrcode', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'qrcode');
    }
}
