<?php
/* @var $this yii\web\View */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Member;

/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form ActiveForm */
$data = ArrayHelper::map(Member::find()->where(['status'=>1])->orderBy(['full_name'=>SORT_ASC])->all(),'id','full_name');
?>
<div class="member-form">
<div class="w3-container">
<div class="w3-card" style="padding:40px;">
      <header class="w3-teal w3-center">
      	<h1> Message </h1>
      </header>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'member_id')->dropDownList($data)->label('Message From') ?>
    
    <?= $form->field($model, 'message')->textArea(['rows'=>5])->label('Message') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- about-form -->
