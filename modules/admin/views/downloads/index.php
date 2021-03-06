<?php
/* @var $this yii\web\View */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Download */
/* @var $form ActiveForm */
?>
<div class="download-form">
<div class="w3-container">
		<div class="w3-card" style="padding:40px;">
      <header class="w3-teal w3-center">
      	<h1> Downloads </h1>
      </header>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
       <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><?= $form->field($model, 'document_title') ?></div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <?= $form->field($model, 'file')->fileInput() ?></div>
      </div>
       
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- download-form -->
