<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "md_clinic.source".
 *
 * @property int $id
 * @property string $name
 * @property int|null $status
 * @property string|null $created
 * @property string|null $updated
 */
class Source extends ActiveRecord
{
    public static function tableName()
    {
        return 'source';
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
            'created' => 'Kiritldi',
            'updated' => 'O`zgartirildi',
        ];
    }
}
