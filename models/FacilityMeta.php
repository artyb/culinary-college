<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facility_meta".
 *
 * @property int $id
 * @property int $facility_id
 * @property string $image
 * @property int $status active=1 inactive=0
 *
 * @property Facility $facility
 */
class FacilityMeta extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facility_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['facility_id', 'image', 'status'], 'required'],
            [['file'],'required','on'=>'create'],
            [['file'],'file','extensions'=>'jpeg,jpg','maxFiles' => 10],
            [['facility_id', 'status'], 'integer'],
            [['image'], 'string', 'max' => 200],
            [['facility_id'], 'exist', 'skipOnError' => true, 'targetClass' => Facility::className(), 'targetAttribute' => ['facility_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'facility_id' => 'Facility ID',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacility()
    {
        return $this->hasOne(Facility::className(), ['id' => 'facility_id']);
    }
}
