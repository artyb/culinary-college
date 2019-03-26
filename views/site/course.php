 <?php

use yii\helpers\Html;

?>
<div class="content-section">
<div id="slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
      <?php foreach($meta as $i=>$met){ 
        if($i==0)
          $class = 'active';
        else
          $class = '';
      ?>
            <li data-target="#slider" data-slide-to="<?+$i ?>" class="<?=$class ?>"></li>
    <?php } ?>
        </ol>

        <div class="carousel-inner">
            <?php foreach($meta as $i=>$met){ 
        if($i==0)
          $class='active';
        else
          $class='';
      ?>
      <div class="item <?=$class ?>">
        <img data-src="<?=Yii::getAlias('@web').'/'.$met->image ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy pic-1" style="width:100%">
                <div class="carousel-caption">
                
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


<div class="parentdiv">
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12 asidecourse">
        <h2 class="text-center">Our Courses</h2>
        <img src="<?=Yii::getAlias('@web').'/img/official/line.png' ?>" style="width: 80%" class="lineimg">
        <ul class="w3-ul w3-hoverable  text-left ">
            <?php foreach($model as $i=>$mod){ ?>
          <li class="w3-padding-small">
            <?=Html::a('<i class="fas fa-hand-point-right"></i> '.$mod->course_name,['site/course','id'=>$mod->id],['class'=>'anchor']); ?>
          </li>
        <?php } ?>
        </ul>
        <img src="<?=Yii::getAlias('@web').'/img/official/line.png' ?>" style="width: 80%" class="lineimg">

    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <h2 class="text-center"><?=$course->course_name ?></h2>
        <div class="member-bottom">
        </div><br>
        <p class="text-justify"><?=$course->description ?></p>

    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="card hovercard w3-hover-shadow">
            <div class="cardheader" style="background-image: url('img/official/oriental.png');">

            </div>
            <div class="avatar">
                <?php 
                if(!empty($head->image))
                    $path = '/'.$head->image;
                else
                    $path = '/img/official/logo.jpg';
                ?>
                <img data-src="<?=Yii::getAlias('@web').$path ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy">

            </div>
            <div class="info">
                <div class="title">
                   <h2><?=$head->full_name ?></h2>   
               </div>
               <div class="desc">Department head</div>
               <div class="desc"><?=\app\models\MemberType::findOne(['id'=>$head->type_id])->type_name ?></div>
               <div class="desc"><?=$head->phone1.', '.$head->phone2 ?></div>
               <div class="desc"><?=$head->email ?></div>
           </div>

       </div>
       <div>
        <h2 class="news-title">Latest News</h2>
        <ul >
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
     </div>
     </div>

    




