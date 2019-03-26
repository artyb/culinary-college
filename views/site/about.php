
<div class="content-section">
	<div class="container-fluid">
        <!--       top carousel starts here-->
        <div id="slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach($model as $i=>$mod){ 
                    if($i==0)
                        $class='active';
                    else
                        $class='';
                ?>
                <li data-target="#slider" data-slide-to="<?=$i ?>" class="<?=$class ?>"></li>
                <?php } ?>
            </ol>

            <div class="carousel-inner">
                <?php foreach($model as $i=>$mod){
                    if($i==0)
                        $class='active';
                    else
                        $class='';
                 ?>
                <div class="item <?=$class ?>">
                    <img data-src="<?=Yii::getAlias('@web').'/'.$mod->image ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy" style="width:100%">
                    <div class="carousel-caption">
                        <h3>"<?=$mod->slider_title ?>"</h3>

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
    <br>
  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-gray">
      <h2>About Us</h2>
    </header>

    <div class="w3-container w3-padding w3-justify ">
      <p>
    <?=$about->description ?>
    </p>
    </div>
</div>
</div>
