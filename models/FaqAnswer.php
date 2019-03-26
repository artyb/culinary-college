<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq_answer".
 *
 * @property int $id
 * @property string $answer
 * @property int $status 1=active 0=inactive
 * @property int $question_id
 *
 * @property FaqQuestion $question
 */
class FaqAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['answer', 'status', 'question_id'], 'required'],
            [['status', 'question_id'], 'integer'],
            [['answer'], 'string', 'max' => 100],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => FaqQuestion::className(), 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'answer' => 'Answer',
            'status' => 'Status',
            'question_id' => 'Question ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(FaqQuestion::className(), ['id' => 'question_id']);
    }
}
