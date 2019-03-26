<?php

use yii\helpers\Html;

$count = count($model)/4;
$counter = $count;
?>
<div class="content-section">
	<div class="w3-card-2">
		<!-- Photo Grid -->

		<div class="galleryrow"> 

			<div class="gallerycolumn">
				<?php 
				$i = 0;
				while($i<$counter){ ?>
					<div class="product-grid">
						<div class="product-image">
							<div>
								<img data-src="<?=Yii::getAlias('@web').'/'.$model[$i]['image'] ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy pic-1" style="width:100%">
							</div>
							<ul class="social">
								<li>
									<?=Html::a('<i class="fa fa-search"></i>',['site/gallerydetail','id'=>$model[$i]['id']],['data-tip'=>'Quick View','target'=>'_blank']); ?>
								</li>
								<li><a href="<?=Yii::getAlias('@web').'/'.$model[$i]['image'] ?>" data-tip="Download" download><i class="fa fa-cloud-download"></i></a></li>
							</ul>
						</div>
					</div>
					<?php 
					$i++;
				} ?>
			</div>
			<div class="gallerycolumn">
				<?php
				$counter = $counter+$count;
				while($i<$counter){ ?>
					<div class="product-grid">
						<div class="product-image">
							<div>
								<img data-src="<?=Yii::getAlias('@web').'/'.$model[$i]['image'] ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy pic-1" style="width:100%">
							</div>
							<ul class="social">
								<li><?=Html::a('<i class="fa fa-search"></i>',['site/gallerydetail','id'=>$model[$i]['id']],['data-tip'=>'Quick View','target'=>'_blank']); ?></li>
								<li><a href="<?=Yii::getAlias('@web').'/'.$model[$i]['image'] ?>" data-tip="Download" download><i class="fa fa-cloud-download"></i></a></li>
							</ul>
						</div>
					</div>
					<?php 
					$i++;
				} ?>
			</div>  
			<div class="gallerycolumn">
				<?php $counter = $counter+$count;
				while ($i<$counter) { ?>
					<div class="product-grid">
						<div class="product-image">
							<div>
								<img data-src="<?=Yii::getAlias('@web').'/'.$model[$i]['image'] ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy pic-1" style="width:100%">
								
							</div>
							<ul class="social">
								<li><?=Html::a('<i class="fa fa-search"></i>',['site/gallerydetail','id'=>$model[$i]['id']],['data-tip'=>'Quick View','target'=>'_blank']); ?></li>
								<li><a href="<?=Yii::getAlias('@web').'/'.$model[$i]['image'] ?>" data-tip="Download" download><i class="fa fa-cloud-download"></i></a></li>
							</ul>
						</div>
					</div>
					<?php 
					$i++;
				} ?>
			</div>
			<div class="gallerycolumn">
				<?php
				while ($i<count($model)) {
					?>
					<div class="product-grid">
						<div class="product-image">
							<div>
								<img data-src="<?=Yii::getAlias('@web').'/'.$model[$i]['image'] ?>" src="<?=Yii::getAlias('@web').'/img/official/spin.svg' ?>" alt="Avatar" class="b-lazy pic-1" style="width:100%">
								
							</div>
							<ul class="social">
								<li><?=Html::a('<i class="fa fa-search"></i>',['site/gallerydetail','id'=>$model[$i]['id']],['data-tip'=>'Quick View','target'=>'_blank']); ?></li>
								<li><a href="<?=Yii::getAlias('@web').'/'.$model[$i]['image'] ?>" data-tip="Download" download><i class="fa fa-cloud-download"></i></a></li>
							</ul>
						</div>
					</div>
					<?php 
					$i++;
				} ?>
			</div>
		</div>
	</div>
</div>
<?php 
// $this->registerJs($this->render('lazyloading.js'),3);
?>