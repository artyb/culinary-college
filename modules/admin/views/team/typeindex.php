<?php
/* @var $this yii\web\View */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form ActiveForm */
?>
<div class="membertype-form">
<div class="w3-container">
<div class="w3-card" style="padding:40px;">
      <header class="w3-teal w3-center">
      	<h1> Member Type </h1>
      </header>
    <?php $form = ActiveForm::begin(); ?>
    <?php if($model->isNewRecord){ ?>
    	<table class="w3-table">
    		<thead>
    			<tr>
    				<th>Member Type</th>
    				<th>Action</th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td><?= $form->field($model, 'type_name[]')->label(false) ?></td>
    				<td><button class="btn btn-primary btn-sm add">+</button></td>
    			</tr>
    		</tbody>
    	</table>
        <?php }else{ ?>
        	<?= $form->field($model, 'type_name') ?>

        <?php } ?>
       
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div><!-- about-form -->
<?php
$this->registerJs($this->render('team.js'),3);
?>
