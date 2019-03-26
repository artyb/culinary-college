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
   		<h1> About form </h1>
   	</header>
   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
      <?= $form->field($model, 'company_name')->textInput()->label('Company Name') ?></div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'address') ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <?= $form->field($model, 'phone1') ?>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <?= $form->field($model, 'phone2') ?>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <?= $form->field($model, 'fax') ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <?= $form->field($model, 'email') ?>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <?= $form->field($model, 'opening_time')->textInput(['type'=>'time']) ?>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <?= $form->field($model, 'closing_time')->textInput(['type'=>'time']) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <?= $form->field($model, 'secondary_email') ?>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <?= $form->field($model, 'facebook') ?>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <?= $form->field($model, 'twitter') ?>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <?= $form->field($model, 'instagram') ?>
      </div>
    </div>
        
        <?= $form->field($model, 'file')->fileInput()->label('Logo') ?>
        <?= $form->field($model, 'description')->textArea(['rows'=>8]) ?>
        
        <table class="w3-table">
          <thead>
            <tr>
              <th style="width: 90%">Why We ?</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if(empty($reasons)){ ?>
            <tr>
              <td><?= $form->field($model1, 'reason[]')->label(false) ?></td>
              <td>
                <button class="btn btn-primary btn-sm add">+</button>
              </td>
            </tr>
            <?php }else{ 
              foreach ($reasons as $i => $rsn) {
                echo $form->field($model1,'carbonId[]')->hiddenInput(['value'=>$rsn->id])->label(false);
            ?>
            <tr>
              <td><?= $form->field($model1, 'reason[]')->textInput(['value'=>$rsn->reason])->label(false) ?></td>
              <td>
                <?php 
                if($i==0)
                  echo '<button class="btn btn-primary btn-sm add">+</button>';
                else
                  echo '<button class="btn btn-danger btn-sm remove">-</button>';
                ?>
              </td>
            </tr>

            <?php
            }
            } ?>
          </tbody>
        </table>        
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- about-form -->

<?php
$this->registerJs($this->render('about.js'),3);
?>
