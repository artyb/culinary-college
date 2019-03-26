<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq_question".
 *
 * @property int $id
 * @property string $question
 * @property int $status 1=active 0=inactive
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 *
 * @property FaqAnswer[] $faqAnswers
 */
class FaqQuestion extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'status', 'name', 'email', 'phone', 'address'], 'required'],
            [['status'], 'integer'],
            [['question'], 'string', 'max' => 100],
            [['name', 'email', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'status' => 'Status',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaqAnswers()
    {
        return $this->hasMany(FaqAnswer::className(), ['question_id' => 'id']);
    }
}
