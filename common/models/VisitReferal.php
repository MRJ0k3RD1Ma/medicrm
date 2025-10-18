<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.visit_referal".
 *
 * @property int $id
 * @property int $visit_id
 * @property int $referal_id
 * @property int $service_id
 * @property float|null $price
 * @property float|null $price_referal
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 *
 * @property Visit $visit
 * @property Referal $referal
 * @property Service $service
 * @property User $register
 * @property User $modify
 */
class VisitReferal extends ActiveRecord
{
    public static function tableName()
    {
        return 'visit_referal';
    }

    public function rules()
    {
        return [
            [['visit_id', 'referal_id', 'service_id'], 'required'],
            [['visit_id', 'referal_id', 'service_id', 'status', 'register_id', 'modify_id'], 'integer'],
            [['price', 'price_referal'], 'number'],
            [['created', 'updated'], 'safe'],

            [
                ['visit_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Visit::class,
                'targetAttribute' => ['visit_id' => 'id']
            ],
            [
                ['referal_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Referal::class,
                'targetAttribute' => ['referal_id' => 'id']
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
            'visit_id' => 'Tashrif',
            'referal_id' => 'Qayerdan keldi',
            'service_id' => 'Xizmat',
            'price' => 'Narxi',
            'price_referal' => 'Yuboruvchiga',
            'status' => 'Status',
            'created' => 'Kiritildi',
            'updated' => 'O`zgartirildi',
            'register_id' => 'Kiritdi',
            'modify_id' => 'O`zgartirdi',
        ];
    }

    public function getVisit()
    {
        return $this->hasOne(Visit::class, ['id' => 'visit_id']);
    }

    public function getReferal()
    {
        return $this->hasOne(Referal::class, ['id' => 'referal_id']);
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
