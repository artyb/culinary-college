<?php
/* @var $this yii\web\View */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\vision */
/* @var $form ActiveForm */
?>
<div class="vision-form">
<div class="w3-container">
	<div class="w3-card" style="padding:40px;">
		<header class="w3-teal w3-center">
			<h1>VMG</h1>
		</header>

    <?php $form = ActiveForm::begin(); ?>
    <div class="w3-card" style="padding:10px;">
        <?php if(!empty($model) || $model!=null){ ?>
        <?php if($model->isNewRecord){ ?>
        <table class="w3-table">
            <thead>
                <tr>
                    <th>Vision</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="tbody1">
                <tr>
                    <td><?= $form->field($model, 'vision[]')->label(false) ?></td>
                    <td><button class="addvision btn btn-primary">+</button></td>
                </tr>
            </tbody>
        </table>
        <?php }else{ ?>
            <?= $form->field($model, 'vision')->label('Vision') ?>
        <?php } ?>
        <?php } ?>

        <?php if(!empty($model1) || $model1!=null){
            if($model1->isNewRecord){
        ?>
        
        <table class="w3-table">
            <thead>
                <tr>
                    <th>Mission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="tbody2">
                <tr>
                    <td><?= $form->field($model1, 'mission[]')->label(false) ?></td>
                    <td><button class="addmission btn btn-primary">+</button></td>
                </tr>
            </tbody>
        </table>
        <?php }else{ ?>
        <?= $form->field($model1, 'mission')->label('Mission') ?>
        <?php } ?>
        <?php } ?>
        
        <?php if(!empty($model2) || $model2!=null){ ?>
        <?php if($model2->isNewRecord){ ?>
        <table class="w3-table">
            <thead>
                <tr>
                    <th>Goal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="tbody3">
                <tr>
                    <td><?= $form->field($model2, 'goal[]')->label(false) ?></td>
                    <td><button class="addgoal btn btn-primary">+</button></td>
                </tr>
            </tbody>
        </table>
        <?php }else{ ?>
            <?= $form->field($model2, 'goal')->label('Goal') ?>
        <?php } ?>
        <?php } ?>
    </div><br>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-danger']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
</div><!-- vision-form -->
<?php
$this->registerJs($this->render('vmg.js'),3);
?>

