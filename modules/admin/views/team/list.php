<?php

use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;

?>
<div class="w3-container">
	<div class="w3-card">
		<header class="w3-teal w3-center">
			<h1> Member List </h1>
		</header>
<table class="table">
	<thead>
		<tr>
			<th>SN</th>
			<th>Type</th>
			<th>P. Address</th>
			<th>T. Address</th>
			<th>Phone</th>
            <th>Team Image </th>
            <th>E-mail</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($model as $i=>$mod){ ?>
		<tr>
			<td><?=++$i ?></td>
			<td><?=\app\models\MemberType::findOne(['id'=>$mod->type_id])->type_name ?></td>
			<td><?=$mod->permanent_add?></td>
			<td><?=$mod->temporary_add?></td>
		   <td><?=$mod->phone1.','.$mod->phone2 ?></td>
			<td><?php if(!empty($mod->image)){ ?>
				<img src="<?=Yii::getAlias('@web').'/'.$mod->image ?>" style="height:150px;width:150px">
			<?php } ?>
			</td>
			<td><?=$mod->email?></td>
			<td>
				<?=Html::a('<span class="glyphicon glyphicon-pencil"></span>',['team/update','id'=>$mod->id],['class'=>'btn btn-primary btn-sm']) ?>
				<?php if($mod->status == 1)
				{
				echo Html::a('<span class="glyphicon glyphicon-trash"></span>',['team/delete','id'=>$mod->id],['class'=>'btn btn-danger btn-sm']);
			}
			else
			{
				echo Html::a('<span class="glyphicon glyphicon-ok"></span>',['team/active','id'=>$mod->id],['class'=>'btn btn-success btn-sm']);
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