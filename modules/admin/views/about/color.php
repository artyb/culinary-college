<?php
/* @var $this yii\web\View */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aboutus */
/* @var $form ActiveForm */
?>
<div class="about-form">
<div class="w3-container" >
   <div class="w3-card-4" style="padding:40px;">
   	<header class="w3-teal w3-center">
   		<h1> Color Management form </h1>
   	</header>
   <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'navbar_color')->textInput(['class'=>'jscolor form-control']) ?>
        <?= $form->field($model, 'navbar_border')->textInput(['class'=>'jscolor form-control']) ?>
        <?= $form->field($model, 'navbar_font')->textInput(['class'=>'jscolor form-control']) ?>
        <?= $form->field($model, 'hover_color')->textInput(['class'=>'jscolor form-control']) ?>
        <?= $form->field($model, 'footer_color')->textInput(['class'=>'jscolor form-control']) ?>
        <?= $form->field($model, 'footer_font')->textInput(['class'=>'jscolor form-control']) ?>
        <?= $form->field($model, 'second_footer_color')->textInput(['class'=>'jscolor form-control']) ?>
        <?= $form->field($model, 'second_footer_font')->textInput(['class'=>'jscolor form-control']) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- about-form -->

<?php
$this->registerJsFile('@web/js/jscolor.js',['depends'=>[\yii\web\JqueryAsset::className()]]);
$this->registerJs($this->render('about.js'),3);
?>
