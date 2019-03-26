<?php
/* @var $this yii\web\View */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alumni */
/* @var $form ActiveForm */
?>
<div class="alumni-form">
	<div class="w3-container">
		<div class="w3-card" style="padding:30px;">
      <header class="w3-teal w3-center">
      	<h1> Alumni </h1>
      </header>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
         <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><?= $form->field($model, 'batch') ?></div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><?= $form->field($model, 'file')->fileInput()->label('Image') ?></div>
      </div>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- alumni-form -->
