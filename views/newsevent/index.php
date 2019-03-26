<?php

use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;

?>
<div class="content-section">
	<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
			<header class="w3-container">
				<center><h1>News & Events </h1></center>
				<hr>
			</header>
	</div>

	<!-- Events content starts from Here -->
			<?php foreach($model as $i=>$mod){ ?>
			<div class="row">
				<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
					<?php
					$check = \app\models\NewsMeta::find()->where(['news_id'=>$mod->id])->exists();
					if($check)
						$path = '/'.\app\models\NewsMeta::findOne(['news_id'=>$mod->id])->image;
					else
						$path = '/img/official/logo.jpg';
					?>
					<img data-src="<?=Yii::getAlias('@web').$path ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy w3-animate-left w3-margin-left" style="width:100%">
					
				</div>
				<div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
					<div class="w3-leftbar w3-border-grey w3-padding w3-animate-right">
							<h2><b><?=$mod->title ?></b></h2>
							<span class="glyphicon glyphicon-time"></span> <?=date('F-d-Y',$mod->date) ?>
							<p class="text-justify">
								<?=$mod->description ?>
								<?=Html::a('<span style="color:red">[ <i>Read More...</i> ]</span>',['newsevent/readmore','id'=>$mod->id]) ?>
							</p>
					</div>
				</div>
			</div>
			<hr>
		<?php } ?>
		<?php echo LinkPager::widget(['pagination'=>$pages]); ?>
</div>


  </div>
