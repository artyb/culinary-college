<?php
use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>
<div class="w3-container">
	<div class="w3-card">
		<header class="w3-teal w3-center">
			<h1> Testimonials List </h1>
		</header>
<table class="table">
	<thead>
		<tr>
			<th>SN</th>
			<th>Full Name</th>
			<th>Address</th>
			<th>Review</th>
			<th> Action </th>
			
		</tr>
	</thead>
	<tbody>
		<?php foreach($model as $i=>$mod){ ?>
		<tr>
			<td><?=++$i ?></td>
			<td><?=$mod->full_name?></td>
			<td><?=$mod->address?></td>
			<td><?=$mod->review?></td>
			
			<td>
				<?=Html::a('<span class="glyphicon glyphicon-pencil"></span>',['testimonials/update','id'=>$mod->id],['class'=>'btn btn-primary btn-sm']) ?>
				<?php if($mod->status == 1)
				{
				echo Html::a('<span class="glyphicon glyphicon-trash"></span>',['testimonials/delete','id'=>$mod->id],['class'=>'btn btn-danger btn-sm']);
			}
			else
			{
			  echo Html::a('<span class="glyphicon glyphicon-ok"></span>',['testimonials/active','id'=>$mod->id],['class'=>'btn btn-success btn-sm']) ;
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