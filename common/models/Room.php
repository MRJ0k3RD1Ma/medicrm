<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.room".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $departament_id
 * @property int|null $capacity
 * @property int|null $count_patient
 * @property int|null $user_id
 * @property float|null $price
 * @property float|null $price_food
 * @property string|null $state
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 *
 * @property Departament $departament
 * @property User $user
 * @property User $register
 * @property User $modify
 */
class Room extends ActiveRecord
{
    public static function tableName()
    {
        return 'room';
    }

    public function rules()
    {
        return [
            [['departament_id', 'capacity', 'count_patient', 'user_id', 'status', 'register_id', 'modify_id'], 'integer'],
            [['price', 'price_food'], 'number'],
            [['created', 'updated'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['state'], 'in', 'range' => ['WORKING', 'CLOSED', 'FULL']],

            [
                ['departament_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Departament::class,
                'targetAttribute' => ['departament_id' => 'id']
            ],
            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['user_id' => 'id']
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
            'name' => 'Xona raqami',
            'departament_id' => 'Bo`lim',
            'capacity' => 'Sig`imi',
            'count_patient' => 'Band',
            'user_id' => 'Mas`ul',
            'price' => 'Narxi',
            'price_food' => 'Ovqat narxi',
            'state' => 'Holati',
            'status' => 'Status',
            'created' => 'Kiritildi',
            'updated' => 'O`zgartirildi',
            'register_id' => 'Kiritdi',
            'modify_id' => 'O`zgartirdi',
        ];
    }

    public function getDepartament()
    {
        return $this->hasOne(Departament::class, ['id' => 'departament_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
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
