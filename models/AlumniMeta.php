<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumni_meta".
 *
 * @property int $id
 * @property int $alumni_id
 * @property string $student_name
 * @property string $address
 * @property int $phone
 * @property double $percentage
 *
 * @property Alumni $alumni
 */
class AlumniMeta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumni_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alumni_id', 'student_name', 'address', 'phone', 'percentage'], 'required'],
            [['alumni_id', 'phone'], 'integer'],
            [['percentage'], 'number'],
            [['student_name', 'address'], 'string', 'max' => 100],
            [['alumni_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alumni::className(), 'targetAttribute' => ['alumni_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alumni_id' => 'Alumni ID',
            'student_name' => 'Student Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'percentage' => 'Percentage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumni()
    {
        return $this->hasOne(Alumni::className(), ['id' => 'alumni_id']);
    }
}
