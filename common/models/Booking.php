<?php

namespace common\models;

use codeonyii\yii2validators\AtLeastValidator;
use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property int $hotel_room_id
 * @property string $first_name
 * @property string $phone
 * @property string $day_from
 * @property string $day_to
 * @property string $created_at
 *
 * @property HotelRoom $hotelRoom
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $fromToDayInterval;

    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotel_room_id', 'first_name', 'phone', 'created_at'], 'required'],
            [['hotel_room_id', 'created_at'], 'integer'],
            [['phone'], 'integer', 'message'=>'Введите правильный номер телефона'],
            [['first_name'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
            [['day', 'day_from', 'day_to'], 'string', 'max' => 10],
            [['fromToDayInterval', 'day', 'day_from', 'day_to'], 'safe'],
            [['hotel_room_id'], 'exist', 'skipOnError' => true, 'targetClass' => HotelRoom::className(), 'targetAttribute' => ['hotel_room_id' => 'id']],
            ['day', AtLeastValidator::className(), 'in' => ['fromToDayInterval', 'day'], 'message' => 'Выберите день или интервал'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hotel_room_id' => 'Номер',
            'first_name' => 'Имя',
            'phone' => 'Телефон',
            'fromToDayInterval' => 'Интервал',
            'day' => 'День',
            'day_from' => 'День заселения',
            'day_to' => 'День выселения',
            'created_at' => 'Время брони',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotelRoom()
    {
        return $this->hasOne(HotelRoom::className(), ['id' => 'hotel_room_id']);
    }
}
