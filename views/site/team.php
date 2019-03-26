<?php
$person = \app\models\Member::findOne(['id'=>$message->member_id]);
if(empty($person->image))
  $path = '/img/logo.jpg';
else
  $path = '/'.$person->image;
$post = \app\models\MemberType::findOne(['id'=>$person->type_id])->type_name;
?>
<div class="content-section">
	<div class="row">
		<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 profilecard w3-center">
				<div class="img img-thumbnail well profileborder">
          <img data-src="<?=Yii::getAlias('@web').$path ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy img img-circle profilephoto" style="width:100%">
					<!-- <img src="<?=Yii::getAlias('@web').$path ?>" class="img img-circle profilephoto"> -->
					<p><b style="font-family:verenda"><?=$post ?></b></p>
					<p><b style="font-style: italic;font-size:18px;"><?=$person->full_name ?></b></p>

				</div>
			</div>
		</div>	
		<div class="col-md-8 col-sm-8 col-lg-8 col-xs-12">
			<div class="well">
				<center><h3 class="abcd">Message From <?=$post ?></h3></center>
				<hr style="box-shadow:rgb(100,23,245);">
				<p class="w3-justify" id="xyz"><?=$message->message ?></p>
			</div>
		</div>
	</div>



<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
                <?php foreach($model as $i=>$mod){ 
            if(empty($mod->image))
                $path = '/img/official/logo.jpg';
            else
                $path = '/'.$mod->image;
            ?>
            <div class="item">
                <div class="pcard">
                  <img data-src="<?=Yii::getAlias('@web').$path ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy" style="width:100%">
                  <h3><?=$mod->full_name ?></h3>
                  <p class="title"><?=\app\models\MemberType::findOne(['id'=>$mod->type_id])->type_name ?></p>
                  <p><?=$mod->permanent_add ?></p>
                  <p><?=$mod->phone1 ?></p>
              </div>
              </div>
      <?php } ?>

               
               <!--  <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div> -->
            </div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>


</div>



<?php
$this->registerJs($this->render('about.js'),3);
?>
