<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.departament".
 *
 * @property int $id
 * @property string $name
 * @property int|null $owner_id
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 *
 * @property User $owner
 * @property User $register
 * @property User $modify
 */
class Departament extends ActiveRecord
{
    public static function tableName()
    {
        return 'departament';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['owner_id', 'status', 'register_id', 'modify_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name'], 'string', 'max' => 255],

            // FK exist checks
            [
                ['owner_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['owner_id' => 'id']
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
            'owner_id' => 'Mas`ul',
            'status' => 'Status',
            'created' => 'Kirildi',
            'updated' => 'O`zgartirild',
            'register_id' => 'Kiritdi',
            'modify_id' => 'O`zgartirdi',
        ];
    }

    /**
     * Owner bilan bog‘lanish (FK: owner_id -> user.id)
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(User::class, ['id' => 'owner_id']);
    }

    /**
     * Register bilan bog‘lanish (FK: register_id -> user.id)
     * @return \yii\db\ActiveQuery
     */
    public function getRegister()
    {
        return $this->hasOne(User::class, ['id' => 'register_id']);
    }

    /**
     * Modify bilan bog‘lanish (FK: modify_id -> user.id)
     * @return \yii\db\ActiveQuery
     */
    public function getModify()
    {
        return $this->hasOne(User::class, ['id' => 'modify_id']);
    }
}
