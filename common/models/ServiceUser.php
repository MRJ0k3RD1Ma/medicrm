<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.service_user".
 *
 * @property int $id
 * @property int $user_id
 * @property int $service_id
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 * @property string|null $type
 * @property float|null $value
 *
 * @property User $user
 * @property Service $service
 * @property User $register
 * @property User $modify
 */
class ServiceUser extends ActiveRecord
{
    public static function tableName()
    {
        return 'service_user';
    }

    public function rules()
    {
        return [
            [['user_id', 'service_id'], 'required'],
            [['user_id', 'service_id', 'status', 'register_id', 'modify_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['value'], 'number'],
            [['type'], 'in', 'range' => ['FIXED', 'PERCENT']],

            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['user_id' => 'id']
            ],
            [
                ['service_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Service::class,
                'targetAttribute' => ['service_id' => 'id']
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
            'user_id' => 'Doktor',
            'service_id' => 'Xizmat',
            'status' => 'Status',
            'created' => 'Kiritdildi',
            'updated' => 'O`zgartirildi',
            'register_id' => 'Kiritidi',
            'modify_id' => 'O`zgartirdi',
            'type' => 'Turi',
            'value' => 'Qiymati',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
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
