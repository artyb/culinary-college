<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?php $color = \app\models\ColorManagement::find()->one();
    if(!empty($color)){ ?>
        <style type="text/css">
            .navbar-inverse {
                background-color: #<?=$color->navbar_color ?> !important;
                border-color: #<?=$color->navbar_border ?> !important;
            }
            .nav > li > a:hover, .nav > li > a:focus {
                text-decoration: none;
                background-color: #<?=$color->hover_color ?> !important;
            }
            .nav > li > a{
                color: #<?=$color->navbar_font ?> !important;
            }
            .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
                    background-color: #<?=$color->hover_color ?> !important;
            }
            #myFooter{
                background-color: #<?=$color->footer_color ?> !important;
                color: <?=$color->footer_font ?> !important;
            }
            .footer-copyright{
                background-color: #<?=$color->second_footer_color ?> !important;
                color: <?=$color->second_footer_font ?> !important;
                border-top: 1px solid black;
            }
        </style>
    <?php } ?>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    
    <div class="brandinfo w3-top">
        <div class="brandimage" style="position: relative">
            <img src="<?=Yii::getAlias('@web').'/img/official/logo.jpg' ?>" id="thisisbrand">
            <div class="brand-contact-info" style="float: right;text-align: right">
                <div class="contactphoneemail">
                    <div class="cpdisplay"><span class="glyphicon glyphicon-phone-alt"></span>: 9855052636, 9819261625</div>
                    <div class="phoneemaildivider">|</div>
                    <div class="cpdisplay"><span class="glyphicon glyphicon-envelope"></span>: info@kasturisanjaal.com</div>
                </div>
                <div class="socialnetwork">
                    <div class="row">
                        <div class="col-lg-offset-3 col-lg-9 col-md-offset-3 col-md-9 col-sm-offset-2 col-sm-10 col-xs-12">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    <span><a href="#" class="fa fa-facebook"></a></span>
                                    <span><a href="#" class="fa fa-twitter"></a></span>
                                    <span><a href="#" class="fa fa-youtube"></a></span>
                                    <span><a href="#" class="fa fa-instagram"></a></span>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                    <div class="input-group stylish-input-group">
                                        <input type="text" class="form-control"  placeholder="Search" >
                                        <span class="input-group-addon">
                                            <button type="submit">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>  
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $facility = \app\models\Facility::find()->where(['status'=>1])->all();
    $course = \app\models\Course::find()->where(['status'=>1])->all();
    $fasarray = $coursearray = '';
    foreach($facility as $i=>$fas){
        $fasarray.='<li>'.Html::a($fas->facility_name, ['site/fascility','id'=>$fas->id]).'</li>';
        if($i!=(count($facility)-1))
            $fasarray.='<li class="divider"></li>';
    }
    foreach($course as $i=>$crs){
        $coursearray.='<li>'.Html::a($crs->course_name, ['site/course','id'=>$crs->id]).'</li>';
        if($i!=(count($facility)-1))
            $coursearray.='<li class="divider"></li>';
    }

    NavBar::begin([
        // 'brandLabel' => Yii::$app->name,
        // 'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Info',
                'items' => [
                    ['label' => 'About Us', 'url' => ['/site/about']],
                    ['label' => 'Vision, Mission And Goals', 'url' => ['/site/vmg']],
                    ['label' => 'Our Team', 'url' => ['/site/team']],
                    ['label' => 'Alumni', 'url' => ['/site/alumni']],
                ],
            ],
            [
                'label' => 'Facilities',
                'items' => [$fasarray],
            ],

            ['label' => 'News & Events', 'url' => ['/newsevent/index']],
            ['label' => 'Downloads', 'url' => ['/site/download']],
            ['label' => 'Gallery', 'url' => ['/site/gallery']],
            [
                'label' => 'Courses',
                'items' => [$coursearray],
            ],

            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'FAQ', 'url' => ['/site/faq']],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h5 class="logo">Why We ?</h5>
                    <ul>
                        <?php $reason = \app\models\WhyWe::find()->where(['status'=>1])->limit(5)->all();
                        foreach($reason as $i=>$rsn){ ?>
                        <li><?=$rsn->reason ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Quick Links</h5>
                    <?php
                    $cid = \app\models\Course::find()->one()->id;
                    $fid = \app\models\Facility::find()->one()->id;
                    ?>
                    <ul>
                        <li>
                            <?=Html::a('Home',['site/index']) ?>
                        </li>
                        <li>
                            <?=Html::a('About Us',['site/about']) ?>
                        </li>
                        <li>
                            <?=Html::a('Alumni',['site/alumni']) ?>
                        </li>
                        <li>
                            <?=Html::a('Course',['site/course','id'=>$cid]) ?>
                        </li>
                        <li>
                            <?=Html::a('Downloads',['site/download']) ?>
                        </li>
                        <li>
                            <?=Html::a('Facilities',['site/fascility','id'=>$fid]) ?>
                        </li>
                        <li>
                            <?=Html::a('Vision And Goals',['site/vmg']) ?>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Contact Us</h5>
                    <ul>
                        <li>Bharatpur-10, Chitwan</li>
                        <li>Phone : 9855052636</li>
                        <li>Email : info@kasturisanjaal.com</li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <!-- <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fkasturisanjaal&tabs=timeline&width=300&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> -->
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <span>© 2018 KASTURI SANJAAL PVT. LTD. </span>
            <span style="float: right">Powered By : <a href="http://www.kasturisanjaal.com">Kasturi Sanjaal Pvt. Ltd.</a></span>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
