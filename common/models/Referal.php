<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.referal".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $description
 * @property int|null $percent
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 *
 * @property User $register
 * @property User $modify
 */
class Referal extends ActiveRecord
{
    public static function tableName()
    {
        return 'referal';
    }

    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['description'], 'string'],
            [['percent', 'status', 'register_id', 'modify_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name', 'phone'], 'string', 'max' => 255],

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
            'phone' => 'Telefon',
            'description' => 'Izoh',
            'percent' => 'Foiz',
            'status' => 'Status',
            'created' => 'Kiritildi',
            'updated' => 'O`zgartirildi',
            'register_id' => 'Kiritdi',
            'modify_id' => 'O`zgartirdi',
        ];
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
