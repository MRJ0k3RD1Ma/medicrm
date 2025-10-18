<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.visit".
 *
 * @property int $id
 * @property int|null $client_id
 * @property int|null $departament_id
 * @property float|null $price
 * @property string|null $description
 * @property string|null $state
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 * @property int|null $is_emergency
 * @property string|null $emergency_car
 * @property int|null $is_onetime_payment
 * @property string|null $visit_date
 *
 * @property Client $client
 * @property Departament $departament
 * @property User $register
 * @property User $modify
 */
class Visit extends ActiveRecord
{
    public static function tableName()
    {
        return 'visit';
    }

    public function rules()
    {
        return [
            [['client_id', 'departament_id', 'status', 'register_id', 'modify_id', 'is_emergency', 'is_onetime_payment'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['created', 'updated', 'visit_date'], 'safe'],
            [['emergency_car'], 'string', 'max' => 255],
            [['state'], 'in', 'range' => ['NEW', 'RUNNING', 'DONE', 'CANCALLED']],

            [
                ['client_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Client::class,
                'targetAttribute' => ['client_id' => 'id']
            ],
            [
                ['departament_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Departament::class,
                'targetAttribute' => ['departament_id' => 'id']
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
            'client_id' => 'Patsient',
            'departament_id' => 'Bo`lim',
            'price' => 'Narxi',
            'description' => 'Izoh',
            'state' => 'Holati',
            'status' => 'Status',
            'created' => 'Kiritildi',
            'updated' => 'O`zgartirildi',
            'register_id' => 'Kiritdi',
            'modify_id' => 'O`zgartirdi',
            'is_emergency' => 'Shoshilinch keldimi?',
            'emergency_car' => 'Qanday transportda',
            'is_onetime_payment' => 'Barcha xizmat uchun 1 marta to`lov',
            'visit_date' => 'Tashrif sanasi',
        ];
    }

    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    public function getDepartament()
    {
        return $this->hasOne(Departament::class, ['id' => 'departament_id']);
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
