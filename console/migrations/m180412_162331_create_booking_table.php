<?php

use yii\db\Migration;

/**
 * Handles the creation of table `booking`.
 */
class m180412_162331_create_booking_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('booking', [
            'id' => $this->primaryKey(),
            'hotel_room_id' => $this->integer()->notNull(),
            'first_name' => $this->string(50)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'day' => $this->string(10),
            'day_from' => $this->string(10),
            'day_to' => $this->string(10),
            'created_at' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-booking-hotel_room_id',
            'booking',
            'hotel_room_id'
        );

        $this->addForeignKey(
            'fk-booking-hotel_room_id',
            'booking',
            'hotel_room_id',
            'hotel_room',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-booking-hotel_room_id',
            'booking'
        );

        $this->dropIndex(
            'idx-booking-hotel_room_id',
            'booking'
        );

        $this->dropTable('booking');
    }
}
