<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_type".
 *
 * @property int $id
 * @property string $type_name
 * @property int $status 1=active 0=inactive
 */
class MemberType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_name', 'status'], 'required'],
            [['status'], 'integer'],
            [['type_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_name' => 'Type Name',
            'status' => 'Status',
        ];
    }
}
