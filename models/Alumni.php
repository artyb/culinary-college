<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumni".
 *
 * @property int $id
 * @property int $batch
 * @property string $image
 *
 * @property AlumniMeta[] $alumniMetas
 */
class Alumni extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public static function tableName()
    {
        return 'alumni';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['batch', 'image','status'], 'required'],
            [['file'],'required','on'=>'create'],
            [['file'],'file','extensions'=>'jpg,jpeg,png'],
            [['batch','status'], 'integer'],
            [['image'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'batch' => 'Batch',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumniMetas()
    {
        return $this->hasMany(AlumniMeta::className(), ['alumni_id' => 'id']);
    }
}
