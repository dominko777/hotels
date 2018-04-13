<?php

use yii\db\Migration;

/**
 * Handles the creation of table `hotel_room`.
 */
class m180412_162124_create_hotel_room_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('hotel_room', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('hotel_room');
    }
}
