<?php
/* @var $this yii\web\View */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\FaqQuestion;

/* @var $this yii\web\View */
/* @var $model app\models\FaqAnswer */
/* @var $form ActiveForm */
$data = ArrayHelper::map(FaqQuestion::find()->orderBy(['question'=>SORT_ASC])->all(),'id','question');
?>
<div class="faq-form">
<div class="w3-container">
	<div class="w3-card" style="padding:40px;">
		<header class="w3-teal w3-center">
			<h1> FAQ ANSWER</h1>
		</header>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'question_id')->dropDownList($data) ?>
    <?= $form->field($model, 'answer')->textArea(['rows'=>5]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- faq-form -->