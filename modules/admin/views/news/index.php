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
      	<h1> News </h1>
      </header>
    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord){ ?>
    <?= $form->field($model, 'date')->textInput(['type'=>'date']) ?>
    <?php }else{ ?>
      <?= $form->field($model, 'date')->textInput(['type'=>'date','value'=>date('Y-m-d',$model->date)]) ?>
    <?php } ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description')->textArea(['rows'=>5]) ?>
       
    <?= $form->field($model1, 'file[]')->fileInput(['multiple' => true])->label('Image (Upload Multiple Images)') ?>    
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- download-form -->
