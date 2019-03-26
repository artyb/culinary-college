<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/newsevents.css',
        'css/site.css',
        'css/w3.css',
        'css/index.css',
        'css/course.css',
        'css/download.css',
        'css/faq.css',
        'css/aboutus.css',
        'css/team.css',
        'css/contact.css',
        'css/alumuni.css',
        'css/footer.css',
        'css/vmg.css',
        'css/gallery.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
        
    ];
    public $js = [
        'js/blazy.min.js',
        'js/slide.js',
        'js/course.js',
        'js/lazyload.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
