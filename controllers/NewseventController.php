<?php

namespace app\controllers;

use yii\data\Pagination;

class NewseventController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$mod = \app\models\News::find()->orderBy(['id'=>SORT_DESC]);
       	$count = clone $mod;
       	$pages = new Pagination(['pageSize'=>10,'totalCount'=>$count->count()]);
       	$model = $mod->offset($pages->offset)->limit($pages->limit)->all();
       	return $this->render('index',
	        [
         	'pages'=>$pages,
         	'model'=>$model,
     	]);
    }
    public function actionReadmore($id)
    {
        $model = \app\models\News::findOne(['id'=>$id]);
        $meta = \app\models\NewsMeta::findAll(['news_id'=>$id]);
        $news = \app\models\News::find()->where(['status'=>1])->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('readmore',[
          'model'=>$model,
          'meta'=>$meta,
          'news'=>$news,
        ]);
    }

}
