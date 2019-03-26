<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aboutus".
 *
 * @property int $id
 * @property string $company_name
 * @property string $address
 * @property int $phone1
 * @property int $phone2
 * @property string $email
 * @property string $secondary_email
 * @property string $opening_time
 * @property string $closing_time
 * @property int $fax
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property string $logo
 * @property string $description
 */
class Aboutus extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aboutus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'address', 'phone1', 'email', 'opening_time', 'closing_time', 'logo', 'description'], 'required'],
            [['file'],'required','on'=>'create'],
            [['file'],'file','extensions'=>'jpeg,jpg,png'],
            [['fax'], 'integer'],
            [['description'], 'string'],
            [['company_name', 'address', 'email', 'secondary_email', 'facebook', 'twitter', 'instagram', 'logo'], 'string', 'max' => 100],
            [['phone1', 'phone2'], 'string', 'max' => 15],
            [['opening_time', 'closing_time'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'address' => 'Address',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'email' => 'Email',
            'secondary_email' => 'Secondary Email',
            'opening_time' => 'Opening Time',
            'closing_time' => 'Closing Time',
            'fax' => 'Fax',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'logo' => 'Logo',
            'description' => 'Description',
        ];
    }
}
