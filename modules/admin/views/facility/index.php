<?php
/* @var $this yii\web\View */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Facility */
/* @var $form ActiveForm */
?>
<div class="facility-form">
<div class="w3-container">
	<div class="w3-card" style="padding:40px;">
		<header class="w3-teal w3-center">
			<h1>FAcility</h1>
		</header>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'facility_name') ?>
        <?= $form->field($model1, 'file[]')->fileInput(['multiple' => true])->label('Image (Upload Multiple Images)') ?>    
        <?= $form->field($model, 'description')->textArea(['rows'=>5]) ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- facility-form -->
