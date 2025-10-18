<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.loc_district".
 *
 * @property int $id
 * @property int $region_id
 * @property string $name
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 *
 * @property LocRegion $region
 */
class LocDistrict extends ActiveRecord
{
    public static function tableName()
    {
        return 'loc_district';
    }

    public function rules()
    {
        return [
            [['region_id', 'name'], 'required'],
            [['region_id', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name'], 'string', 'max' => 255],

            // FK mavjudligini tekshirish
            [
                ['region_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => LocRegion::class,
                'targetAttribute' => ['region_id' => 'id']
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Viloyat',
            'name' => 'Nomi',
            'status' => 'Status',
            'created' => 'Yaratildi',
            'updated' => 'O`zgartirildi',
        ];
    }

    /**
     * Region bilan bog‘lanish (FK: region_id -> loc_region.id)
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(LocRegion::class, ['id' => 'region_id']);
    }
}
