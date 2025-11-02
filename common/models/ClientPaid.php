<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.client_paid".
 *
 * @property int $id
 * @property int $client_id
 * @property int $payment_id
 * @property string|null $date
 * @property string|null $description
 * @property float $price
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $status
 * @property int|null $register_id
 * @property int|null $modify_id
 *
 * @property Client $client
 * @property Payment $payment
 * @property User $register
 * @property User $modify
 */
class ClientPaid extends ActiveRecord
{
    public static function tableName()
    {
        return 'client_paid';
    }

    public function rules()
    {
        return [
            [['client_id', 'payment_id', 'price'], 'required'],
            [['client_id', 'payment_id', 'status', 'register_id', 'modify_id'], 'integer'],
            [['date', 'created', 'updated'], 'safe'],
            [['description'], 'string'],
            [['price'], 'number'],

            [
                ['client_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Client::class,
                'targetAttribute' => ['client_id' => 'id']
            ],
            [
                ['payment_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Payment::class,
                'targetAttribute' => ['payment_id' => 'id']
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
            'client_id' => 'Mijoz',
            'payment_id' => 'To`lov turi',
            'date' => 'Sana',
            'description' => 'Izoh',
            'price' => 'Narxi',
            'created' => 'Kiritildi',
            'updated' => 'O`zgartirildi',
            'status' => 'Status',
            'register_id' => 'Kiritdi',
            'modify_id' => 'O`zgartirdi',
        ];
    }

    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    public function getPayment()
    {
        return $this->hasOne(Payment::class, ['id' => 'payment_id']);
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
