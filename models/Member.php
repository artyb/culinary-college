<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property string $full_name
 * @property int $type_id
 * @property string $permanent_add
 * @property string $temporary_add
 * @property int $phone1
 * @property int $phone2
 * @property string $email
 * @property string $image
 * @property int $status 1=active 0=inactive
 */
class Member extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'type_id', 'permanent_add', 'phone1', 'status'], 'required'],
            [['file'],'file','extensions'=>'jpg,jpeg'],
            [['type_id', 'status'], 'integer'],
            [['phone1', 'phone2'], 'string', 'max' => 15],
            [['full_name', 'permanent_add', 'temporary_add', 'email', 'image'], 'string', 'max' => 100],
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
            'type_id' => 'Type ID',
            'permanent_add' => 'Permanent Add',
            'temporary_add' => 'Temporary Add',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'email' => 'Email',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }
}
