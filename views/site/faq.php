<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\captcha\Captcha;

?>
<section class="content-section">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="w3-card-4">
                <header class="w3-container w3-gray">
                    <h2>Leave Your Query</h2>
                </header>
                <div class="w3-container">
                    <!-- <form> -->
                        <?php $form = ActiveForm::begin(['options' => ['id' => 'faqform']]); ?>
                        <?= $form->field($model, 'name')->label('Full Name') ?>
                        <?= $form->field($model, 'address')->label('Address') ?>
                        <?= $form->field($model, 'email')->textInput(['type'=>'email'])->label('Email (* Email will be secret.)') ?>
                        <?= $form->field($model, 'phone')->label('Contact (* Contact will be secret.)') ?>
                        <?= $form->field($model, 'question')->textArea(['rows'=>5])->label('Query') ?>
                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-6">{image}</div><div class="col-lg-6">{input}</div></div>',
                  ]) ?>
                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <?php foreach($faq as $i=>$f){ ?>
                <button class="accordion"><?=$f->question ?></button>
                <div class="panel">
                    <p>
                        <?php $check = \app\models\FaqAnswer::find()->where(['question_id'=>$f->id])->exists();
                        if($check)
                            echo \app\models\FaqAnswer::find()->where(['question_id'=>$f->id])->one()->answer;
                        else
                            echo 'Question pending....';
                        ?>
                    </p>
                </div>
            <?php } ?>

            <?php echo LinkPager::widget(['pagination'=>$pages]); ?>
        </div>
    </div>
</section>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("activee");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

</script>
