<?php

use yii\db\Migration;

/**
 * Handles the creation of table `image`.
 */
class m180216_052057_create_image_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('image', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'model_name' => $this->string(),
            'model_id' => $this->integer(),
            'sort_order' => $this->integer(),
            'created_at' => $this->dateTime()->null(),
            'updated_at' => $this->dateTime()->null(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('image');
    }
}
