<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_meta".
 *
 * @property int $id
 * @property int $course_id
 * @property string $image
 * @property int $status active=1 inactive=0 pending=3
 *
 * @property Course $course
 */
class CourseMeta extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'image', 'status'], 'required'],
            [['course_id', 'status'], 'integer'],
            [['image'], 'string', 'max' => 100],
            [['file'],'required','on'=>'create'],
            [['file'],'file','extensions'=>'jpeg,jpg','maxFiles' => 10],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }
}
