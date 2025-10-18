<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.loc_region".
 *
 * @property int $id
 * @property string $name
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 *
 * @property LocDistrict[] $districts
 */
class LocRegion extends ActiveRecord
{
    public static function tableName()
    {
        return 'loc_region';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * LocDistrict bilan bog‘lanish (FK: loc_district.region_id -> loc_region.id)
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(LocDistrict::class, ['region_id' => 'id']);
    }
}
