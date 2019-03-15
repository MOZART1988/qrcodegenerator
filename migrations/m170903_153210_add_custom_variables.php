<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170903_153210_add_custom_variables extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('custom_variables', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'module_name' => $this->string()->null(),
            'type_id' => $this->integer()->defaultValue(1),
            'value' => $this->text()->null(),
            'lang_id' => $this->integer()->defaultValue(1),
            'create_date' => $this->timestamp()->null(),
            'update_date' => $this->timestamp()->null(),
            'is_active' => $this->smallInteger()->defaultValue(1),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('custom_variables');
    }
}
