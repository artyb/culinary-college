<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "testimonials".
 *
 * @property int $id
 * @property string $full_name
 * @property string $address
 * @property string $review
 * @property string $image
 * @property int $status active=1 inactive=0
 */
class Testimonials extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'testimonials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'address', 'review', 'status'], 'required'],
            [['file'],'file','extensions'=>'jpeg,jpg'],
            [['review'], 'string'],
            [['status'], 'integer'],
            [['full_name', 'address'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'address' => 'Address',
            'review' => 'Review',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }
}
