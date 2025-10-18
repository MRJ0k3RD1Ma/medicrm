<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.client_group".
 *
 * @property int $id
 * @property string $name
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 *
 * @property User $register
 * @property User $modify
 */
class ClientGroup extends ActiveRecord
{
    public static function tableName()
    {
        return 'client_group';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'register_id', 'modify_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name'], 'string', 'max' => 255],

            // FK exist checks
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
            'status' => 'Status',
            'created' => 'Kiritildi',
            'updated' => 'O`zgartirildi',
            'register_id' => 'Kiritdi',
            'modify_id' => 'O`zgartirdi',
        ];
    }

    /**
     * Register foydalanuvchi (FK: register_id -> user.id)
     * @return \yii\db\ActiveQuery
     */
    public function getRegister()
    {
        return $this->hasOne(User::class, ['id' => 'register_id']);
    }

    /**
     * Modify foydalanuvchi (FK: modify_id -> user.id)
     * @return \yii\db\ActiveQuery
     */
    public function getModify()
    {
        return $this->hasOne(User::class, ['id' => 'modify_id']);
    }
}
