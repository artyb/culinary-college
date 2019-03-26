<?php

use yii\helpers\Html;

?>
<div class="content-section">
  <div class="vmghead">
      <div class="container">
          <h1 class="text-uppercase text-center">Our Vision Mission and Objectives</h1>
      </div>
     
    </div>
     <hr>
      <div class="container">
      <div class="row">
      <div class="col-md-9">
  <h3 class="text-uppercase text-center">Our Vision:</h3>
    <div class="member-bottom">
                        </div><br>
                        <ul>
                            <?php foreach($vision as $i=>$vsn){ ?>
                            <li><?=$vsn->vision ?></li>
                        <?php } ?>
                        </ul>
     <hr>
     <h3 class="text-uppercase text-center">Our Mission:</h3>
     <div class="member-bottom">
                        </div><br>

                        <ul>
                            <?php foreach($mission as $j=>$msn){ ?>
                            <li><?=$msn->mission ?></li>
                        <?php } ?>
                        </ul>
     <hr>
     <h3 class="text-uppercase text-center">Our Objectives:</h3>
     <div class="member-bottom">
                        </div><br>
    <ul>
                            <?php foreach($goal as $k=>$gl){ ?>
                            <li><?=$gl->goal ?></li>
                        <?php } ?>
                        </ul>
     <hr>
      </div> 
 <div class="col-md-3 col-sm-3 col-xs-12">
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