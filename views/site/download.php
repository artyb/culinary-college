<?php

use yii\helpers\Html;

?>
<div class="content-section container-fluid">
    <div class="row">
        <div class="col-md-9 ">
           <div class="row">
            <?php foreach($model as $i=>$mod){ ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 " style="padding:10px">
                <div class="w3-card w3-orange w3-hover-shadow">
                    <div class="w3-container cardpadding">
                        <h3><?=$mod->document_title ?></h3>
                        <hr>
                        <a href="<?=Yii::getAlias('@web').'/'.$mod->document ?>" class="btn w3-button w3-teal" download>Download</a>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>

        <div class="col-md-3">
            <hr>

            <h2 class="news-title ">Latest News</h2>
            <ul>
               <?php foreach($news as $i=>$nws){ ?>
              <li>
                <?=Html::a('<span class="news-post">'.$nws->title.'</span>',['newsevent/index'],['class'=>'anchor']) ?>
                <div class="news-post-date"><?=date('F-d-Y',$nws->date) ?></div></li>
          <?php } ?>
            </ul>
            <hr>
            <h2 class="news-title">Archieve</h2>
            <ul>
                <li class="w3-hover-shadow"><a href="#">May 2018</a></li>
                <li class="w3-hover-shadow"><a href="#">April 2018</a></li>
                <li class="w3-hover-shadow"><a href="#">March 2018</a></li>
                <li class="w3-hover-shadow"><a href="#">August 2017</a></li>
            </ul>


        </div>
        <hr>

    </div>
</div>
