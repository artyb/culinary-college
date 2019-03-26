<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $course_name
 * @property string $description
 * @property int $status active=1 inactive=0
 * @property int $department_head_id
 *
 * @property Member $departmentHead
 * @property CourseMeta[] $courseMetas
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_name', 'status', 'department_head_id'], 'required'],
            [['description'], 'string'],
            [['status', 'department_head_id'], 'integer'],
            [['course_name'], 'string', 'max' => 100],
            [['department_head_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['department_head_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_name' => 'Course Name',
            'description' => 'Description',
            'status' => 'Status',
            'department_head_id' => 'Department Head ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentHead()
    {
        return $this->hasOne(Member::className(), ['id' => 'department_head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseMetas()
    {
        return $this->hasMany(CourseMeta::className(), ['course_id' => 'id']);
    }
}
