<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170903_105859_add_init_migrations extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        //Users table
        $this->createTable('users', [
            'id' => 'pk',
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'first_name' => Schema::TYPE_STRING,
            'last_name' => Schema::TYPE_STRING,
            'lang_id' => Schema::TYPE_INTEGER . ' DEFAULT 1',
            'create_date' => Schema::TYPE_TIMESTAMP . ' DEFAULT "0000-00-00 00:00:00"',
            'update_date' => Schema::TYPE_TIMESTAMP . ' DEFAULT "0000-00-00 00:00:00"',
            'is_active' => Schema::TYPE_SMALLINT . ' DEFAULT 0',
            'role' => Schema::TYPE_STRING . ' DEFAULT "user"',
        ], $tableOptions);

        $this->createIndex('is_active_users', 'users', 'is_active');
        $this->createIndex('lang_id_index', 'users', 'lang_id');

        echo 'DEFAULT USERNAME: admin';
        echo 'DEFAULT PASSWORD: 123456';

        $this->insert('users', [
            'username' => 'admin',
            'password' => '$2y$13$.TW4UJ.e8cTdTusrMH4hd.HAtuTxAxfd04njOsemp5JY5ZG/IvhXm',
            'email' => 'admin@sitename.kz',
            'lang_id' => 1,
            'is_active' => 1,
            'role' => 'admin'
        ]);

        // Language table
        $this->createTable('languages', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'code' => Schema::TYPE_STRING . ' NOT NULL',
            'locale' => Schema::TYPE_STRING . ' NOT NULL',
            'is_active' => Schema::TYPE_SMALLINT . ' DEFAULT 1'
        ], $tableOptions);

        // default language
        $this->insert('languages', ['title' => 'Русский', 'code' => 'ru', 'locale' => 'ru', 'is_active' => 1]);

        //Config table
        $this->createTable('config', [
            'id' => 'pk',
            'param' => Schema::TYPE_STRING . ' NOT NULL',
            'value' => Schema::TYPE_STRING . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL'
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('users');
        $this->dropTable('languages');
    }
}
