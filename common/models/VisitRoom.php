<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.visit_room".
 *
 * @property int $id
 * @property int $room_id
 * @property int $visit_id
 * @property int $client_id
 * @property string|null $card_number
 * @property int|null $card_id
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string|null $state
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 * @property int|null $is_food_connected
 * @property float|null $price
 * @property float|null $price_count
 * @property int|null $doctor_id
 *
 * @property Client $client
 * @property Room $room
 * @property Visit $visit
 * @property User $doctor
 * @property User $register
 * @property User $modify
 */
class VisitRoom extends ActiveRecord
{
    public static function tableName()
    {
        return 'visit_room';
    }

    public function rules()
    {
        return [
            [['room_id', 'visit_id', 'client_id'], 'required'],
            [['room_id', 'visit_id', 'client_id', 'card_id', 'status', 'register_id', 'modify_id', 'is_food_connected', 'doctor_id'], 'integer'],
            [['date_start', 'date_end', 'created', 'updated'], 'safe'],
            [['price', 'price_count'], 'number'],
            [['card_number'], 'string', 'max' => 255],
            [['state'], 'in', 'range' => ['TREAT', 'GONE']],

            [
                ['client_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Client::class,
                'targetAttribute' => ['client_id' => 'id']
            ],
            [
                ['room_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Room::class,
                'targetAttribute' => ['room_id' => 'id']
            ],
            [
                ['visit_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Visit::class,
                'targetAttribute' => ['visit_id' => 'id']
            ],
            [
                ['doctor_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['doctor_id' => 'id']
            ],
            [
                ['register_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['register_id' => 'id']
            ],
            [
                ['modify_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['modify_id' => 'id']
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Xona',
            'visit_id' => 'Tashrif',
            'client_id' => 'Mijoz',
            'card_number' => 'Karta raqami',
            'card_id' => 'Card ID',
            'date_start' => 'Xonaga yotgan sanasi',
            'date_end' => 'Xonani tark etgan sanasi',
            'state' => 'Holati',
            'status' => 'Status',
            'created' => 'Kiritildi',
            'updated' => 'O`zgartirildi',
            'register_id' => 'Kiritdi',
            'modify_id' => 'O`zgartirdi',
            'is_food_connected' => 'Ovqati ichidami?',
            'price' => 'Narxi',
            'price_count' => 'Umumiy narxi',
            'doctor_id' => 'Qarovchi shifokor',
        ];
    }

    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    public function getRoom()
    {
        return $this->hasOne(Room::class, ['id' => 'room_id']);
    }

    public function getVisit()
    {
        return $this->hasOne(Visit::class, ['id' => 'visit_id']);
    }

    public function getDoctor()
    {
        return $this->hasOne(User::class, ['id' => 'doctor_id']);
    }

    public function getRegister()
    {
        return $this->hasOne(User::class, ['id' => 'register_id']);
    }

    public function getModify()
    {
        return $this->hasOne(User::class, ['id' => 'modify_id']);
    }
}
