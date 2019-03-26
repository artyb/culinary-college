  <?php

  /* @var $this yii\web\View */
  /* @var $form yii\bootstrap\ActiveForm */
  /* @var $model app\models\ContactForm */

  use yii\helpers\Html;
  use yii\bootstrap\ActiveForm;
  use yii\captcha\Captcha;

  ?>

  <div class="content-section">
    <div class="contact">
      <div class="row" >
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 w3-animate-left">
          <div class="w3-card-contact">
            <h3>Contact Us :</h3>
            <hr>
            <div class="detailcontent">
              <div class="metadata">
                <p>Phone :<br><?=$about->phone1.' , '.$about->phone2 ?> </p>
                <p>Facebook :<br><?='<a href="'.$about->facebook.'">'.$about->company_name.' Facebook</a>' ?></p>
                <p>Email : <br><?=$about->email ?>
                
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 w3-animate-opacity">
        <div class="w3-card-visit">
          <h3>Visit Us :</h3>
          <hr>
          <div class="detailcontent">
            <div class="metadata">
              <p>Address :<br><?=$about->address ?></p>
              <p>Head Office : <br><?=$about->address ?></p>
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 w3-animate-right">
        <div class="w3-card-tell">
          <div class="content">
            <h3>Tell Us :</h3>
            <hr>
            <div class="detail" style="padding: 5px">
              <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?= $form->field($model, 'name')->textInput(['autofocus' => false,'class'=>'w3-input']) ?>
                  
                  <?= $form->field($model, 'email')->textInput(['class'=>'w3-input','type'=>'email']) ?>
                  
                  <?= $form->field($model, 'subject')->textInput(['class'=>'w3-input']) ?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  
                  <?= $form->field($model, 'body')->textarea(['rows' => 5,'class'=>'w3-input']) ?>

                  <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-6">{image}</div><div class="col-lg-6">{input}</div></div>',
                  ]) ?>

                </div>
              </div>

              <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'w3-btn w3-white w3-border w3-border-blue w3-round', 'name' => 'contact-button']) ?>
              </div>

              <?php ActiveForm::end(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="parentdiv">
      <div class="row" >
        <?php foreach($course as $i=>$crse){ 
          $info = \app\models\Member::findOne(['id'=>$crse->department_head_id]);
          if(empty($info->image))
            $path = '/img/official/logo.jpg';
          else
            $path = '/'.$info->image;
          ?>
          <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

            <!-- card start from here -->
            <div class="card hovercard w3-hover-shadow">
              <div class="cardheader" style="background-image: url('img/official/oriental.png');">

              </div>
              <div class="avatar">
                <img data-src="<?=Yii::getAlias('@web').$path ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy">
              </div>
              <div class="info">
                <div class="title">
                 <h2><?=$info->full_name ?></h2>   
               </div>
               <div class="desc"><?=$crse->course_name ?> head</div>
               <div class="desc">Professor</div>
               <div class="desc"><?=$info->phone1.' , '.$info->phone2 ?></div>
               <div class="desc"><?=$info->email ?></div>
             </div>
             <div class="bottom">
              <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                <i class="fa fa-twitter"></i>
              </a>
              <a class="btn btn-danger btn-sm" rel="publisher"
              href="https://plus.google.com/+ahmshahnuralam">
              <i class="fa fa-google-plus"></i>
            </a>
            <a class="btn btn-primary btn-sm" rel="publisher"
            href="https://plus.google.com/shahnuralam">
            <i class="fa fa-facebook"></i>
          </a>
          <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
            <i class="fa fa-behance"></i>
          </a>
        </div>

      </div>

      <!-- card end here -->
      
    </div>
  <?php } ?>
  
</div>
</div>
<br>


<div class="googlemap">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4835.468925413728!2d84.42700840778151!3d27.668438226373784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fbf77342c17d%3A0x1880b822ba738ad2!2sKasturi+Sanjaal!5e0!3m2!1sen!2snp!4v1540437193956" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</div>
</div>
