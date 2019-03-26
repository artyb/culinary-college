<?php

namespace app\modules\admin\controllers;
use yii\data\Pagination;
use yii;

class FaqController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $check = \app\models\FaqAnswer::find()->where(['question_id'=>$id])->one();
        if(empty($check))
    	   $model = new \app\models\FaqAnswer();
        else
            $model = \app\models\FaqAnswer::findOne(['question_id'=>$id]);
    	$model->status =1;
    	if($model->load(Yii::$app->request->post()))
    	{
            $flag=true;
            $transaction = Yii::$app->db->beginTransaction();
            $model->status = 1;
         if(!$model->save()){
            $flag=false;
         }

        $q = \app\models\FaqQuestion::findOne(['id'=>$id]);
        $q->status = 3;
        if(!$q->save()){
            $flag=false;
            var_dump($q->errors);
            die;
        }
            
        var_dump($flag);die;
        if($flag){
            $transaction->commit();
            Yii::$app->session->setFlash('success','Successfully answered!!');
        }else{
            $transaction->rollback();
            Yii::$app->session->setFlash('danger','Try again later!!!');
        }
        return $this->redirect(['list']); 
    	}else{
        return $this->render('index',[
        	'model'=>$model,
        	]);
        }
    }
    public function actionList()
    {
         $mod = \app\models\FaqQuestion::find();
     $count = clone $mod;
     $pages = new Pagination(['pageSize'=>25,'totalCount'=>$count->count()]);
     $model = $mod->offset($pages->offset)->limit($pages->limit)->all();
     return $this->render('list',
        [
       'pages'=>$pages,
       'model'=>$model,
        ]);
    }
    public function actionDeletequestion($id)
    {
        $model = \app\models\FaqQuestion::findOne(['id'=>$id]);
        $model->status = 0;
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully affected!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['list']);

    }
     public function actionActivequestion($id)
    {
        $model = \app\models\FaqQuestion::findOne(['id'=>$id]);
        $model->status = 1;
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully affected!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['list']);

    }
    public function actionAnslist()
    {
        $mod = \app\models\FaqAnswer::find();
     $count = clone $mod;
     $pages = new Pagination(['pageSize'=>25,'totalCount'=>$count->count()]);
     $model = $mod->offset($pages->offset)->limit($pages->limit)->all();
     return $this->render('anslist',
        [
       'pages'=>$pages,
       'model'=>$model,
        ]); 
    }
     public function actionUpdateanswer($id)
    {
     $model = \app\models\FaqAnswer::findOne(['id'=>$id]);
        if($model->load(Yii::$app->request->post()))
        {
           
            if($model->save())
                Yii::$app->session->setFlash('success','Successfully updated!!!');
            else
                Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['anslist']);    
        }
        else{
            return $this->render('index',[
                'model'=>$model,
                ]);
        }
    }
     
    public function actionDeleteanswer($id)
    {
        $model = \app\models\FaqAnswer::findOne(['id'=>$id]);
        $model->status = 0;
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully affected!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['anslist']);

    }

 public function actionActiveanswer($id)
    {
        $model = \app\models\FaqAnswer::findOne(['id'=>$id]);
        $model->status = 1;
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully affected!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['anslist']);

    }

}
