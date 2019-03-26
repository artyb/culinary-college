<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mission".
 *
 * @property int $id
 * @property string $mission
 * @property int $status 1=active 0=inactive
 */
class Mission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mission', 'status'], 'required'],
            [['status'], 'integer'],
            [['mission'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mission' => 'Mission',
            'status' => 'Status',
        ];
    }
}
