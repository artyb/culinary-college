<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "why_we".
 *
 * @property int $id
 * @property string $reason
 * @property int $status
 */
class WhyWe extends \yii\db\ActiveRecord
{
    public $carbonId;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'why_we';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reason', 'status'], 'required'],
            [['status','carbonId'], 'integer'],
            [['reason'], 'string', 'max' => 10000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reason' => 'Reason',
            'status' => 'Status',
        ];
    }
}
