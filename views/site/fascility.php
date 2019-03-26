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
        <img data-src="<?=Yii::getAlias('@web').'/'.$met->image ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy" style="width:100%">
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

<hr>

      <div class="w3-card" style="padding:10px">
      <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="card">
            <div class="card-block">
       <h3 class="text-center text-uppercase">Our Facilities</h3>
       
      <img src="<?=Yii::getAlias('@web').'/img/official/line.png' ?>" style="width: 80%" class="lineimg">
      <ul class="w3-ul w3-hoverable">
        <?php foreach($model as $i=>$mod){ ?>
          <li class="w3-padding-small">
            <?=Html::a('<i class="fas fa-hand-point-right"></i> '.$mod->facility_name,['site/fascility','id'=>$mod->id],['class'=>'anchor']); ?>
          </li>
        <?php } ?>
      </ul>
           <img src="<?=Yii::getAlias('@web').'/img/official/line.png' ?>" style="width: 80%" class="lineimg">
          </div>
        </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="card">
            <div class="card-block des">
             <h1 class="text-center text-uppercase">
                 <?=$facility->facility_name ?>
             </h1>
             <hr style="display: block;margin-left: auto;margin-right: auto;width: 100%;box-shadow:1px 1px 1px 1px #ebebe0">

              <p class="text-justify" style="padding:10px">
                <?=$facility->description ?>
              </p>
            </div>
        </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
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
      