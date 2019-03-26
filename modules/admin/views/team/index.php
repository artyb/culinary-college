<?php
/* @var $this yii\web\View */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MemberType;

/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form ActiveForm */
$data = ArrayHelper::map(MemberType::find()->where(['status'=>1])->orderBy(['type_name'=>SORT_ASC])->all(),'id','type_name');
?>
<div class="member-form">
<div class="w3-container">
<div class="w3-card" style="padding:40px;">
      <header class="w3-teal w3-center">
      	<h1> Team </h1>
      </header>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'type_id')->dropDownList($data)->label('Member Type') ?>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'full_name')->textInput()->label('Full Name') ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'permanent_add') ?>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'temporary_add') ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'phone1') ?>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'phone2') ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'file')->fileInput()->label('Image') ?>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'email') ?>
      </div>
    </div>
   
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- about-form -->
