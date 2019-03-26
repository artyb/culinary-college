<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "color_management".
 *
 * @property int $id
 * @property string $navbar_color
 * @property string $navbar_border
 * @property string $navbar_font
 * @property string $footer_color
 * @property string $footer_font
 * @property string $hover_color
 * @property string $second_footer_color
 * @property string $second_footer_font
 */
class ColorManagement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'color_management';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['navbar_color', 'navbar_border', 'navbar_font', 'footer_color', 'footer_font', 'hover_color', 'second_footer_color', 'second_footer_font'], 'required'],
            [['navbar_color', 'navbar_border', 'navbar_font', 'footer_color', 'footer_font', 'hover_color', 'second_footer_color', 'second_footer_font'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'navbar_color' => 'Navbar Color',
            'navbar_border' => 'Navbar Border',
            'navbar_font' => 'Navbar Font',
            'footer_color' => 'Footer Color',
            'footer_font' => 'Footer Font',
            'hover_color' => 'Hover Color',
            'second_footer_color' => 'Second Footer Color',
            'second_footer_font' => 'Second Footer Font',
        ];
    }
}
