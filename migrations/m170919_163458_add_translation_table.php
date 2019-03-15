<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170919_163458_add_translation_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('source_message', [
            'id' => 'pk',
            'category' => $this->string()->notNull(),
            'message' => $this->text()->notNull(),
        ], $tableOptions);

        $this->createTable('message', [
            'id' => $this->integer()->notNull(),
            'language' => $this->string()->notNull(),
            'translation' => $this->string()
        ], $tableOptions);

        $this->addPrimaryKey('is_language', 'message', ['id', 'language']);
        $this->addForeignKey('fk_message_source_message', 'message', 'id', 'source_message', 'id', 'CASCADE',
            'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropTable('source_message');
    }
}
