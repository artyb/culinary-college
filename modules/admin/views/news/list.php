<?php

use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;

?>
<div class="w3-container">
	<div class="w3-card">
		<header class="w3-teal w3-center">
			<h1> News List </h1>
		</header>
<table class="table">
	<thead>
		<tr>
			<th>SN</th>
			<th>Date</th>
			<th>Heading</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($model as $i=>$mod){ ?>
		<tr>
			<td><?=++$i ?></td>
			<td><?=date('Y-m-d',$mod->date) ?></td>
			<td><?=$mod->title?></td>
			<td><?=$mod->description ?></td>
			<td>
				<?=Html::a('<span class="glyphicon glyphicon-pencil"></span>',['news/update','id'=>$mod->id],['class'=>'btn btn-primary btn-sm']) ?>
				<?php if($mod->status == 1){
				echo Html::a('<span class="glyphicon glyphicon-trash"></span>',['news/delete','id'=>$mod->id],['class'=>'btn btn-danger btn-sm']);
			}
			else
			{
            echo Html::a('<span class="glyphicon glyphicon-ok"></span>',['news/active','id'=>$mod->id],['class'=>'btn btn-success btn-sm']);
			}
			?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
</div>
<?php echo LinkPager::widget(['pagination'=>$pages]); ?>