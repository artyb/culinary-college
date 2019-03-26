<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_meta".
 *
 * @property int $id
 * @property int $news_id
 * @property string $image
 * @property int $status
 *
 * @property News $news
 */
class NewsMeta extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'image', 'status'], 'required'],
            [['news_id', 'status'], 'integer'],
            [['file'],'file','extensions'=>'jpeg,jpg','maxFiles' => 10],
            [['image'], 'string', 'max' => 100],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'News ID',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }
}
