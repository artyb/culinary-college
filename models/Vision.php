<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vision".
 *
 * @property int $id
 * @property string $vision
 * @property int $status 1=active 0=inactive
 */
class Vision extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vision';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vision', 'status'], 'required'],
            [['status'], 'integer'],
            [['vision'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vision' => 'Vision',
            'status' => 'Status',
        ];
    }
}
