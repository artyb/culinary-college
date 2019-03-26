<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "download".
 *
 * @property int $id
 * @property string $document_title
 * @property string $document
 * @property int $status active=1 inactive=0
 */
class Download extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'download';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_title', 'document', 'status'], 'required'],
            [['file'],'required','on'=>'create'],
            [['file'],'file','extensions'=>'pdf,jpg,jpeg'],
            [['status'], 'integer'],
            [['document_title', 'document'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_title' => 'Document Title',
            'document' => 'Document',
            'status' => 'Status',
        ];
    }
}
