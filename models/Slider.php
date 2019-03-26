<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $slider_title
 * @property string $image
 * @property int $status active=1 inactive=0
 */
class Slider extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slider_title', 'image', 'status'], 'required'],
            [['file'],'required','on'=>'create'],
            [['file'],'file','extensions'=>'jpg,jpeg'],
            [['status'], 'integer'],
            [['slider_title', 'image'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slider_title' => 'Slider Title',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }
}
