<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.client".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int|null $group_id
 * @property string $gender
 * @property string|null $birthday
 * @property int|null $region_id
 * @property int|null $district_id
 * @property string|null $address
 * @property float|null $balance
 * @property string|null $description
 * @property int|null $source_id
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $register_id
 * @property int|null $modify_id
 *
 * @property ClientGroup $group
 * @property LocRegion $region
 * @property LocDistrict $district
 * @property Source $source
 * @property User $register
 * @property User $modify
 */
class Client extends ActiveRecord
{
    public static function tableName()
    {
        return 'client';
    }

    public function rules()
    {
        return [
            [['name', 'phone', 'gender'], 'required'],
            [['group_id', 'region_id', 'district_id', 'source_id', 'status', 'register_id', 'modify_id'], 'integer'],
            [['birthday', 'created', 'updated'], 'safe'],
            [['balance'], 'number'],
            [['description'], 'string'],
            [['name', 'phone', 'address'], 'string', 'max' => 255],
            [['gender'], 'in', 'range' => ['MALE', 'FEMALE']],

            [
                ['group_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => ClientGroup::class,
                'targetAttribute' => ['group_id' => 'id']
            ],
            [
                ['region_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => LocRegion::class,
                'targetAttribute' => ['region_id' => 'id']
            ],
            [
                ['district_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => LocDistrict::class,
                'targetAttribute' => ['district_id' => 'id']
            ],
            [
                ['source_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Source::class,
                'targetAttribute' => ['source_id' => 'id']
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
            'phone' => 'Telefon',
            'group_id' => 'Guruhi',
            'gender' => 'Jinsi',
            'birthday' => 'Tug`ilgan sanasi',
            'region_id' => 'Viloyat',
            'district_id' => 'Tuman',
            'address' => 'Manzil',
            'balance' => 'Balans',
            'description' => 'Izoh',
            'source_id' => 'Qayerdan ko`rib keldi',
            'status' => 'Status',
            'created' => 'Kiritildi',
            'updated' => 'O`zgartirildi',
            'register_id' => 'Kiritdi',
            'modify_id' => 'O`zgartirdi',
        ];
    }

    public function getGroup()
    {
        return $this->hasOne(ClientGroup::class, ['id' => 'group_id']);
    }

    public function getRegion()
    {
        return $this->hasOne(LocRegion::class, ['id' => 'region_id']);
    }

    public function getDistrict()
    {
        return $this->hasOne(LocDistrict::class, ['id' => 'district_id']);
    }

    public function getSource()
    {
        return $this->hasOne(Source::class, ['id' => 'source_id']);
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
