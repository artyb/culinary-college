<?php

use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;

?>

<table class="table">
	<thead>
		<tr>
			<th>SN</th>
			<th>Answer</th>
			<th> Question </th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($model as $i=>$mod){ ?>
		<tr>
			<td><?=$i ?></td>
			<td><?=$mod->answer?></td>
			<td><?=$mod->question_id?></td>
			<td>

				<?=Html::a('<span class="glyphicon glyphicon-pencil"></span>',['faq/updateanswer','id'=>$mod->id],['class'=>'btn btn-primary btn-sm']) ?>
				<?php if($mod->status == 1){
				echo Html::a('<span class="glyphicon glyphicon-trash"></span>',['faq/deleteanswer','id'=>$mod->id],['class'=>'btn btn-danger btn-sm']);
			}
				else
				{
					echo Html::a('<span class="glyphicon glyphicon-ok"></span>',['faq/activeanswer','id'=>$mod->id],['class'=>'btn btn-success btn-sm']);
				}
				?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php echo LinkPager::widget(['pagination'=>$pages]); ?>