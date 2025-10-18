<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.service".
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $departament_id
 * @property int|null $has_file
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 *
 * @property Departament $departament
 * @property User $register
 * @property User $modify
 */
class Service extends ActiveRecord
{
    public static function tableName()
    {
        return 'service';
    }

    public function rules()
    {
        return [
            [['name', 'price', 'departament_id'], 'required'],
            [['price'], 'number'],
            [['departament_id', 'has_file', 'status', 'register_id', 'modify_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name'], 'string', 'max' => 255],

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
            'name' => 'Nomi',
            'price' => 'Narxi',
            'departament_id' => 'Bo`lim',
            'has_file' => 'Fayl yuklanadimi?',
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

    public function getRegister()
    {
        return $this->hasOne(User::class, ['id' => 'register_id']);
    }

    public function getModify()
    {
        return $this->hasOne(User::class, ['id' => 'modify_id']);
    }
}
