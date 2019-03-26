<?php

use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;

?>
<div class="w3-container">
	<div class="w3-card">
		<header class="w3-teal w3-center">
			<h1> Question List </h1>
		</header>
<table class="table">
	<thead>
		<tr>
			<th>SN</th>
			<th>Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Question</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($model as $i=>$mod){ ?>
		<tr>
			<td><?=++$i ?></td>
			<td><?=$mod->name ?></td>
			<td><?=$mod->address ?></td>
			<td><?=$mod->email ?></td>
			<td><?=$mod->phone ?></td>
			<td><?=$mod->question?></td>
			<td>
				<?php 
				$check = \app\models\FaqAnswer::findOne(['question_id'=>$mod->id]);
				if(empty($check))
					echo Html::a('Answer It',['faq/index','id'=>$mod->id],['class'=>'btn btn-success btn-sm']);
				else
					echo Html::a('Review Answer',['faq/index','id'=>$mod->id],['class'=>'btn btn-success btn-sm']);
				if($mod->status == 1 || $mod->status==3){ 
					echo Html::a('<span class="glyphicon glyphicon-trash"></span>',['faq/deletequestion','id'=>$mod->id],['class'=>'btn btn-danger btn-sm']);
				}else{
					echo Html::a('<span class="glyphicon glyphicon-ok"></span>',['faq/activequestion','id'=>$mod->id],['class'=>'btn btn-success btn-sm']);
				} ?>

			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
</div>
<?php echo LinkPager::widget(['pagination'=>$pages]); ?>