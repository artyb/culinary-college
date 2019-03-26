<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facility".
 *
 * @property int $id
 * @property string $facility-name
 * @property string $description
 * @property int $status active=1 inactive=0 pending=3
 *
 * @property FacilityMeta[] $facilityMetas
 */
class Facility extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facility';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['facility_name', 'status'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['facility_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'facility-name' => 'Facility Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilityMetas()
    {
        return $this->hasMany(FacilityMeta::className(), ['facility_id' => 'id']);
    }
}
