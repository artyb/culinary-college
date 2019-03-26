<?php
/* @var $this yii\web\View */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Testimonials */
/* @var $form ActiveForm */
?>
<div class="testimonials-form">
<div class="w3-container">
	<div class="w3-card" style="padding:40px;">
		<header class="w3-teal w3-center">
			<h1> Testimonials</h1>
		</header>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'full_name') ?>
    <?= $form->field($model, 'address') ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <?= $form->field($model, 'review')->textArea(['rows'=>5,'type'=>'text']) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- testimonials-form -->