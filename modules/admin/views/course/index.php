
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Member;


/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form ActiveForm */
$data = ArrayHelper::map(Member::find()->where(['status'=>1])->orderBy(['type_id'=>SORT_ASC])->all(),'id','full_name');
?>
<div class="course-form">


    <div class="w3-container">
       <div class="w3-card" style="padding:40px;">
          <header class="w3-teal w3-center">
            <h1>Course </h1>
         </header>

         <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

         <?= $form->field($model, 'course_name') ?>

         <?= $form->field($model, 'department_head_id')->dropDownList($data) ?>

         <?= $form->field($model1, 'file[]')->fileInput(['multiple' => true])->label('Image (Upload Multiple Images)') ?>    

         <?= $form->field($model, 'description')->textarea(['rows' => '6'])?>
         <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div><!-- course-form -->

</div>
</div>
