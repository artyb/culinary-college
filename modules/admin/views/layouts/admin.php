<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        // 'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            // ['label' => 'Home', 'url' => ['/admin/default/index']],
            Yii::$app->user->isGuest?'':['label' => 'About', 
             'items' => [
                    ['label' => 'Company Info', 'url' => ['/admin/about/index']],
                    ['label' => 'Color Management', 'url' => ['/admin/about/color']],
                ],
            ],
            Yii::$app->user->isGuest?'':['label' => 'VMG', 
             'items' => [
                    ['label' => 'Create', 'url' => ['/admin/vmg/index']],
                    ['label' => 'Vision List', 'url' => ['/admin/vmg/list']],
                     ['label' => 'Mission List', 'url' => ['/admin/vmg/missionlist']],
                     ['label' => 'Goal List', 'url' => ['/admin/vmg/goallist']],
                ],
            ],
            Yii::$app->user->isGuest?'':[
                'label' => 'News',
                'items' => [
                    ['label' => 'Create', 'url' => ['/admin/news/index']],
                    ['label' => 'List', 'url' => ['/admin/news/list']],
                ],
            ],
            Yii::$app->user->isGuest?'':[
                'label' => 'Slider',
                'items' => [
                    ['label' => 'Create', 'url' => ['/admin/slider/index']],
                    ['label' => 'List', 'url' => ['/admin/slider/list']],
                ],
            ],
            
            Yii::$app->user->isGuest?'':[
                'label' => 'Facility',
                'items' => [
                    ['label' => 'Create', 'url' => ['/admin/facility/index']],
                    ['label' => 'List', 'url' => ['/admin/facility/list']],
                ],
            ],
            Yii::$app->user->isGuest?'':[
                'label' => 'Course',
                'items' => [
                    ['label' => 'Create', 'url' => ['/admin/course/index']],
                    ['label' => 'List', 'url' => ['/admin/course/list']],
                ],
            ],
            Yii::$app->user->isGuest?'':[
                'label' => 'Testimonials',
                'items' => [
                    ['label' => 'Create', 'url' => ['/admin/testimonials/index']],
                    ['label' => 'List', 'url' => ['/admin/testimonials/list']],
                ],
            ],
            Yii::$app->user->isGuest?'':[
                'label' => 'Alumni',
                'items' => [
                    ['label' => 'Create', 'url' => ['/admin/alumni/index']],
                    ['label' => 'List', 'url' => ['/admin/alumni/list']],
                ],
            ],
            Yii::$app->user->isGuest?'':[
                'label' => 'Downloads',
                'items' => [
                    ['label' => 'Create', 'url' => ['/admin/downloads/index']],
                    ['label' => 'List', 'url' => ['/admin/downloads/list']],
                ],
            ],
            Yii::$app->user->isGuest?'':[
                'label' => 'FAQ',
                'items' => [
                    ['label' => 'Question List', 'url' => ['/admin/faq/list']],
                ],
            ],
            Yii::$app->user->isGuest?'':[
                'label' => 'Team',
                'items' => [
                    ['label' => 'Create member type', 'url' => ['/admin/team/typeindex']],
                    ['label' => 'Create Member', 'url' => ['/admin/team/index']],
                    ['label' => 'Member Type List', 'url' => ['/admin/team/typelist']],
                    ['label' => 'Member List', 'url' => ['/admin/team/list']],
                    ['label' => 'Message For Viewers', 'url' => ['/admin/team/message']],
                ],
            ],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],

    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Culinary And Hospitality Academy <?= date('Y') ?></p>

        <p class="pull-right"><a href="https://www.kasturisanjaal.com/">Kasturi Sanjaal Pvt. Ltd.</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
