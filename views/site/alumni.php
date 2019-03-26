<div class="content-section">
<div id="main_area">
<div class="row">
<div class="col-sm-4" id="slider-thumbs">
<ul class="hide-bullets">
<?php foreach($model as $i=>$mod){ ?>
<li class="col-sm-4">
<a class="thumbnail" id="carousel-selector-<?=$i ?>">
  <img data-src="<?=Yii::getAlias('@web').'/'.$mod->image ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy" style="width:100%;height: 100px">
</a>
</li>
<?php } ?>

</ul>
</div>
<br>
<div class="col-sm-8">
<div class="col-xs-12" id="slider">
<!-- Top part of the slider -->
<div class="row">
    <div class="col-sm-12" id="slider">
        <div class="carousel slide" id="myCarousel">
            <!-- Carousel items -->
            <div class="carousel-inner">
              <?php foreach($model as $i=>$mod){ 
                if($i==0)
                  $class='active';
                else
                  $class='';
              ?>
                <div class="<?=$class ?> item" data-slide-number="<?=$i ?>">                                
                    <img data-src="<?=Yii::getAlias('@web').'/'.$mod->image ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy" style="width:100%;">
                    <div class="carousel-caption">
                        <h2 class="w3-btn w3-red"><?=$mod->batch ?></h2>
                    </div>
                </div>
              <?php } ?>
              
                                    <!-- Carousel nav -->
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Slider-->
            </div>
        </div>
    </div>
    <br>


<!--   <div class="w3-container w3-border w3-light-green w3-border-gray" style="margin-top:5px;margin-bottom:3px;">
  <h3 class="w3-center alumunifont">ALUMUNI</h3>
  </div> -->
 <!--  <div class="w3-bar w3-gray tablefont">
  <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'2069')">2069</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'2070')">2070</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'2071')">2071</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'2072')">2072</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'2073')">2073</button>
  <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'2074')">2074</button>
  </div> -->

  <!-- <div id="2069" class="w3-container w3-border w3-border city">

  <br>
  <table class="w3-table-all w3-hoverable tablefont">
  <thead>
    <tr class="w3-gray">
      <th>First Name</th>
      <th>Last Name</th>
      <th>Percentage</th>
      <th>Grade</th>

    </tr>
  </thead>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50%</td>
    <td>3.66</td>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50%</td>
    <td>3.66</td>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50%</td>
    <td>3.66</td>
  </tr>
  </table>
  <br>
  </div> -->

  <!-- <div id="2070" class="w3-container w3-border city" style="display:none">
  <br>
  <table class="w3-table-all w3-hoverable tablefont">
  <thead>
  <tr class="w3-gray">
    <th>First Name</th>
    <th>Last Name</th>
    <th>Percentage</th>
    <th>Grade</th>

  </tr>
  </thead>
  <tr>
  <td>keshav</td>
  <td>Chaudhary</td>
  <td>88%</td>
  <td>3.06</td>
  </tr>
  <tr>
  <td>keshav</td>
  <td>Chaudhary</td>
  <td>88%</td>
  <td>3.06</td>
  </tr>
  <tr>
  <td>keshav</td>
  <td>Chaudhary</td>
  <td>88%</td>
  <td>3.06</td>
  </tr>
  </table>
  <br>
  </div> -->

 <!--  <div id="2071" class="w3-container w3-border city" style="display:none">
  <br>
  <table class="w3-table-all w3-hoverable tablefont">
  <thead>
  <tr class="w3-gray">
  <th>First Name</th>
  <th>Last Name</th>
  <th>Percentage</th>
  <th>Grade</th>
  </tr>
  </thead>
  <tr>
  <td>Nisan</td>
  <td>Ghimire</td>
  <td>70%</td>
  <td>2.66</td>
  </tr>
  <tr>
  <td>Nisan</td>
  <td>Ghimire</td>
  <td>70%</td>
  <td>2.66</td>
  </tr>
  <tr>
  <td>Nisan</td>
  <td>Ghimire</td>
  <td>70%</td>
  <td>2.66</td>
  </tr>
  </table>
  <br>
  </div>

  <div id="2072" class="w3-container w3-border city" style="display:none">
  <br>
  <table class="w3-table-all w3-hoverable tablefont">
  <thead>
  <tr class="w3-gray">
    <th>First Name</th>
    <th>Last Name</th>
    <th>Percentage</th>
    <th>Grade</th>

  </tr>
  </thead>
  <tr>
  <td>Arty</td>
  <td>Adhikari</td>
  <td>90%</td>
  <td>3.96</td>
  </tr>
  <tr>
  <td>Arty</td>
  <td>Adhikari</td>
  <td>90%</td>
  <td>3.96</td>
  </tr>
  <tr>
  <td>Arty</td>
  <td>Adhikari</td>
  <td>90%</td>
  <td>3.96</td>
  </tr>
  </table>
  <br>
  </div>

  <div id="2073" class="w3-container w3-border city" style="display:none">
  <br>
  <table class="w3-table-all w3-hoverable tablefont">
  <thead>
  <tr class="w3-gray">
  <th>First Name</th>
  <th>Last Name</th>
  <th>Percentage</th>
  <th>Grade</th>

  </tr>
  </thead>
  <tr>
  <td>Jill</td>
  <td>Smith</td>
  <td>50%</td>
  <td>3.66</td>
  </tr>
  <tr>
  <td>Jill</td>
  <td>Smith</td>
  <td>50%</td>
  <td>3.66</td>
  </tr>
  <tr>
  <td>Jill</td>
  <td>Smith</td>
  <td>50%</td>
  <td>3.66</td>
  </tr>
  </table>
  <br>
  </div> -->
<!-- 
  <div id="2074" class="w3-container w3-border city" style="display:none">
  <br>
  <table class="w3-table-all w3-hoverable tablefont">
  <thead>
  <tr class="w3-gray">
  <th>First Name</th>
  <th>Last Name</th>
  <th>Percentage</th>
  <th>Grade</th>
  </tr>
  </thead>
  <tr>
  <td>Jill</td>
  <td>Smith</td>
  <td>50%</td>
  <td>3.66</td>
  </tr>
  <tr>
  <td>Jill</td>
  <td>Smith</td>
  <td>50%</td>
  <td>3.66</td>
  </tr>
  <tr>
  <td>Jill</td>
  <td>Smith</td>
  <td>50%</td>
  <td>3.66</td>
  </tr>
  </table>
  <br>
  </div> -->
  <br>
  </div>

  </div>
  </div>
