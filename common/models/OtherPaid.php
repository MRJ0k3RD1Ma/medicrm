<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.other_paid".
 *
 * @property int $id
 * @property string|null $type
 * @property int|null $group_id
 * @property string|null $description
 * @property string|null $date
 * @property float|null $price
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 *
 * @property OtherPaidGroup $group
 * @property User $register
 * @property User $modify
 */
class OtherPaid extends ActiveRecord
{
    public static function tableName()
    {
        return 'other_paid';
    }

    public function rules()
    {
        return [
            [['group_id', 'status', 'register_id', 'modify_id'], 'integer'],
            [['description'], 'string'],
            [['date', 'created', 'updated'], 'safe'],
            [['price'], 'number'],
            [['type'], 'in', 'range' => ['INCOME', 'OUTCOME']],
            [
                ['group_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => OtherPaidGroup::class,
                'targetAttribute' => ['group_id' => 'id']
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
            'type' => 'Turi',
            'group_id' => 'Guruhi',
            'description' => 'Izoh',
            'date' => 'Sana',
            'price' => 'Summa',
            'status' => 'Status',
            'created' => 'Kiritildi',
            'updated' => 'O`zgartirildi',
            'register_id' => 'Kiritdi',
            'modify_id' => 'O`zgartirdi',
        ];
    }

    public function getGroup()
    {
        return $this->hasOne(OtherPaidGroup::class, ['id' => 'group_id']);
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
