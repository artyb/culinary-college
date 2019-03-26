<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Culinary And Hospitalty Academy';
?>
<div class="content-section">
  <div class="container-fluid">
    <!--       top carousel starts here-->
    <div id="slider" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php foreach($slider as $i=>$slid){ 
          if($i==0)
            $class='active';
          else
            $class='';
          ?>
          <li data-target="#slider" data-slide-to="<?=$i ?>" class="<?=$class ?>"></li>
        <?php } ?>
      </ol>

      <div class="carousel-inner">
        <?php foreach($slider as $i=>$slid){ 
          if($i==0)
            $class='active';
          else
            $class='';
          ?>
          <div class="item <?=$class ?>">
            <img data-src="<?=Yii::getAlias('@web').'/'.$slid->image ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy" style="width:100%">
            <!-- <img src="<?=Yii::getAlias('@web').'/'.$slid->image ?>"  alt="cute kitten"> -->
            <div class="carousel-caption">
              <h3>"<?=$slid->slider_title ?>"</h3>

            </div>
          </div>
        <?php } ?>

      </div>

      <a class="left carousel-control" href="#slider" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Next</span>
      </a>

      <a class="right carousel-control" href="#slider" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">previous</span>
      </a>
    </div>
  </div>
  <hr>
  <!--     top caraousel ends here-->



  <!--  About college starts here-->

  <div class="container-fluid">
    <div class="row">

      <div class="col-md-8 welcome">
        <img data-src="<?=Yii::getAlias('@web').'/img/official/logo.jpg' ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy" style="width: 250px;height: 150px">
        <br>
        <!-- <img src="<?=Yii::getAlias('@web').'/images/logo.png' ?>" alt=""><br> -->
        <h4 class="text-uppercase text-center">About Culinery college</h4>
        <p>
         <?php
         echo  substr($about->description, 0, 300).'....';
         ?>
       </p>
       <div class="welcome-button">
        <?=Html::a('<i class="fa fa-arrows-alt"></i> See Detail',['site/about'],['class'=>'welcomebtn']) ?>
      </div>
    </div>
    <div class="col-lg-3 welcomeside">
      <h2 class="news-title">Latest News</h2>
      <ul>
        <?php foreach($news as $i=>$nws){ ?>
          <li>
            <?=Html::a('<span class="news-post">'.$nws->title.'</span>',['newsevent/index'],['class'=>'anchor']) ?>
            <div class="news-post-date"><?=date('F-d-Y',$nws->date) ?></div></li>
          <?php } ?>
        </ul>
        <hr style="display: block;margin-left: auto;margin-right: auto;width: 90%">
        <h2 class="news-title">Archieve</h2>
        <ul>
          <li><a href="#">May 2018</a></li>
          <li><a href="#">April 2018</a></li>
          <li><a href="#">March 2018</a></li>
          <li><a href="#">August 2017</a></li>
        </ul>
      </div>

    </div>
  </div>
  <hr>
  <!-- About college Ends here-->
  
  <!-- courses we offer   -->


  <div class="container-fluid">
    <div class="row">
     <div class="col-md-8 col-sm-12 col-xs-12">
      <h2 class="text-center"><b>Courses Available</b></h2>
      <div class="member-bottom">
      </div><br>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
         <?php foreach($course as $i=>$crse){
          if($i==0)
            $class='active';
          else
            $class='';
          $meta = \app\models\CourseMeta::findOne(['course_id'=>$crse->id,'status'=>1]);
          ?>
          <div class="item <?=$class ?>">
            <img data-src="<?=Yii::getAlias('@web').'/'.$meta->image ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy" style="width:100%">
          </div>
        <?php } ?>
      </div>
      <!-- End Carousel Inner -->
      <ul class="nav nav-pills nav-justified courseslide">
        <?php foreach($course as $i=>$crse){ 
          if($i==0)
            $class="active";
          else
            $class='';
          ?>
          <li data-target="#myCarousel" data-slide-to="<?=$i ?>" class="<?=$class ?>"><a href="#"><?=$crse->course_name ?><br>
          </a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <?php 
  if(!empty($message)){
  $person = \app\models\Member::findOne(['id'=>$message->member_id]);
  $post = \app\models\MemberType::findOne(['id'=>$person->type_id])->type_name;
  if(empty($person->image))
    $path = '/img/official/logo.jpg';
  else
    $path = '/'.$person->image;
  ?>
  <div class="col-md-4   col-xs-12 col-sm-12">
   <h2 class="text-center"><b>Message from <?=$post ?></b></h2>
   <div class="member-bottom">
   </div>
   <!--                        <hr>-->
   <div class="card-columns w3-card principle">
    <div class="card">
      <br>
      <div class="card-body cardlink">
        <img data-src="<?=Yii::getAlias('@web').$path ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy center-block img-circle" style="width:160px;width: 160px">
       <h3 class="card-title text-center"><?=$person->full_name ?></h3>
       <center><small>Heartly welcome to Culinary And Arts Academy</small></center>  
       <hr>

       <p class="card-text text-justify w3-margin">
        <?php
        echo  substr($message->message, 0, 300).'...';
        ?>
      </p><center> 
        <?=Html::a('Read More',['site/team'],['class'=>'btn btn-danger']) ?>
      </center> <br>
    </div>
  </div>
</div>
</div>
<?php } ?>
</div>
</div>


<!--Course we offer ends    -->


<hr>

<!--    How it is different from other college starts      -->

<!-- <div class="different">
  <div class="row">
    <h2 class="text-center">
      What makes our college Different & Better
    </h2>
    <hr>
    <br>
    <div class="col-md-3 col-xs-12 col-sm-6 services">
      <p class="imgcenter">
        <img src="<?=Yii::getAlias('@web').'/images/icon01.png' ?>" alt="">
      </p>
      <h3 class="text-center">ICHM REGULATION</h3>
      <p>

       <?php
       $string1 = " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus ab neque, tempora temporibus ipsam! Nulla, fuga a ratione molestiae voluptates. Rerum harum minus expedita similique, corrupti consectetur inventore consequatur accusantium. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reiciendis autem aliquid quo sunt. Fugiat ad laborum dicta quos maxime, illum laudantium consequuntur molestias at quisquam corporis sed libero dolore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. ";
       echo  substr($string1, 0, 300);
       ?>
     </p>
     <center> <a href="#" class="btn btn-danger">Read More</a> </center><br>

   </div>
   <div class="col-md-3 col-xs-12 col-sm-6 services">
    <p class="imgcenter">
      <img src="<?=Yii::getAlias('@web').'/images/icon02.png' ?>" alt="">
    </p>
    <h3 class="text-center">International Recognition</h3>
    <p>
     <?php
     $string1 = " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus ab neque, tempora temporibus ipsam! Nulla, fuga a ratione molestiae voluptates. Rerum harum minus expedita similique, corrupti consectetur inventore consequatur accusantium. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reiciendis autem aliquid quo sunt. Fugiat ad laborum dicta quos maxime, illum laudantium consequuntur molestias at quisquam corporis sed libero dolore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. ";
     echo  substr($string1, 0, 300);
     ?>
   </p>
   <center> <a href="#" class="btn btn-danger">Read More</a> </center><br>

 </div>
 <div class="col-md-3 col-xs-12 col-sm-6 services">
  <p class="imgcenter">
    <img src="<?=Yii::getAlias('@web').'/images/icon03.png' ?>" alt="">
  </p>
  <h3 class="text-center">Bachelor in Hotel Management</h3>
  <p>
   <?php
   $string1 = " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus ab neque, tempora temporibus ipsam! Nulla, fuga a ratione molestiae voluptates. Rerum harum minus expedita similique, corrupti consectetur inventore consequatur accusantium. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reiciendis autem aliquid quo sunt. Fugiat ad laborum dicta quos maxime, illum laudantium consequuntur molestias at quisquam corporis sed libero dolore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. ";
   echo  substr($string1, 0, 300);
   ?>
 </p>
 <center> <a href="#" class="btn btn-danger">Read More</a> </center><br>

</div>

<div class="col-md-3 col-xs-12 col-sm-6 services">
  <p class="imgcenter">
    <img src="<?=Yii::getAlias('@web').'/images/icon04.png' ?>" alt="">
  </p>
  <h3 class="text-center">AFFORDABLE PRICES</h3>
  <p>
   <?php
   $string1 = " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus ab neque, tempora temporibus ipsam! Nulla, fuga a ratione molestiae voluptates. Rerum harum minus expedita similique, corrupti consectetur inventore consequatur accusantium. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reiciendis autem aliquid quo sunt. Fugiat ad laborum dicta quos maxime, illum laudantium consequuntur molestias at quisquam corporis sed libero dolore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. ";
   echo  substr($string1, 0, 300);
   ?>
 </p>
 <center> <a href="#" class="btn btn-danger">Read More</a> </center><br>

</div>
</div>

</div>
 -->
<!--    How it is different from other college starts      -->


<!-- Facilities availables           -->

<div class="container-fluid">
 <div class="row">
   <h2 class="text-center">Facilities Available in our College</h2>
   <hr>
   <br>
   <?php foreach($facility as $j=>$fac){ 
    $fmeta = \app\models\FacilityMeta::findOne(['facility_id'=>$fac->id]);
    ?>
    <div class="col-md-3 col-xs-12 col-sm-6  ">
      <div class="card facilitycard" style="width:20rem ; ">
       <center> <h3 class="card-title"><?=$fac->facility_name ?></h3> </center>

       <div class="cardborder">  
        <img data-src="<?=Yii::getAlias('@web').'/'.$fmeta->image ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy" style="width:100%">
         <div class="card-body">

           <p class="card-text text-justify"><?=substr($fac->description, 0, 150); ?></p>

           <center> 
            <?=Html::a('Read More',['site/fascility','id'=>$fac->id],['class'=>'btn btn-danger']) ?>
            </center><br>
         </div>
       </div>
     </div>
   </div>
 <?php } ?>
</div>



</div>



</div>
<hr>






<!--                             -->




<!-- testomonial starts here   -->
<?php if(!empty($testimonial)){ ?>
  <section class="testimonial">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-xs-12 col-xm-12 text-center">
          <br><br>
          <h2 class="text-uppercase"> <b>testimonial</b> </h2>
          <div class="sub-heading">
            <div class="border-bottom">
            </div>

          </div>
        </div>
      </div>
      <br> <br>
      <div class="row">
        <div class="col-md-12 col-xs-12 col-xm-12 ">
          <div id="carousel-testimonials" class="carousel slide" data-ride="carousel"><br>
            <ol class="carousel-indicators">
              <?php foreach($testimonial as $i=>$test){ 
                if($i==0)
                  $class='active';
                else
                  $class='';
                ?>
                <li data-target="#carousel-testimonials" data-slide-to="<?=$i ?>" class="<?=$class ?>"></li>
              <?php } ?>
            </ol>

            <div class="carousel-inner test">
              <?php foreach($testimonial as $i=>$test){
                if($i==0)
                  $class='active';
                else
                  $class='';
                if(empty($image))
                  $path = '/img/official/logo.jpg';
                else
                  $path = '/'.$test->image;
                ?>
                <div class="item <?=$class ?> text-center">
                  <img data-src="<?=Yii::getAlias('@web').'/'.$fmeta->image ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy center-block" style="width:100%">
                  <!-- <img src="<?=Yii::getAlias('@web').$path ?>" class="center-block"> -->
                  <h2><?=$test->full_name ?></h2>
                  <h4><?=$test->address ?></h4>
                  <p>
                    <?=$test->review ?>
                  </p>
                </div>
              <?php } ?>

            </div>

          </div>

        </div>
      </div>
    </div>


  </section>

  <hr>
<?php } ?>
<!--testomonial ends here-->

</div>
<div class="top-arrow">
  <span class="scroll-top-top">
    <i class="fa fa-arrow-up" aria-hidden="true"></i>
  </span>
</div>