<?php

namespace app\modules\admin\controllers;
use yii\web\UploadedFile;
use yii\data\Pagination;

use Yii;

class VmgController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = new \app\models\Vision();
    	$model1 = new \app\models\Mission();
    	$model2 = new \app\models\Goal();
    	if($model->load(Yii::$app->request->post()) && $model1->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post())){
            $flag=true;
            $transaction = Yii::$app->db->beginTransaction();
            foreach($model->vision as $i=>$vsn)
            {
                $model = new \app\models\Vision();
                $model->vision=$vsn;
                $model->status=1;
                if(!$model->save())
                    $flag=false;
            }
             foreach($model1->mission as $j=>$msn)
            {
                $model1 = new \app\models\Mission();
                $model1->mission=$msn;
                $model1->status=1;
                if(!$model1->save())
                    $flag=false;
            }
            foreach($model2->goal as $k=>$goal){
                $model2 = new \app\models\Goal();
                $model2->goal=$goal;
                $model2->status=1;
                if(!$model2->save())
                    $flag=false;
            }
            if($flag){
                $transaction->commit();
                Yii::$app->session->setFlash('success','Successfully created!!!');
            }else{
                $transaction->rollback();
                Yii::$app->session->setFlash('danger','Try again later!!!');
            }

                return $this->redirect(['index']);

    	}
        
        else{
    		return $this->render('index',[
        	'model'=>$model,
        	'model1'=>$model1,
        	'model2'=>$model2,
        	]);	
    	}
        
    }
    public function actionList()
    {
        $mod = \app\models\Vision::find();
        
        $count = clone $mod;
        
        $pages = new Pagination(['pageSize'=>25,'totalCount'=>$count->count()]);
        $model = $mod->offset($pages->offset)->limit($pages->limit)->all();
       
        return $this->render('list',[
            'pages'=>$pages,
            'model'=>$model,
            
            ]);
    }

    public function actionUpdatevision($id)
    {
        $model = \app\models\Vision::findOne(['id'=>$id]);
        if($model->load(Yii::$app->request->post())){
            if($model->save())
                Yii::$app->session->setFlash('success','Successfully updated!!!');
            else
                Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['list']);
        }else{
            return $this->render('index',[
                'model'=>$model,
                'model1'=>null,
                'model2'=>null,
                ]);
        }
    }
    public function actionDeletevision($id)
    {
        $model = \app\models\Vision::findOne(['id'=>$id]);
            $model->status = 0;
            if($model->save())
                Yii::$app->session->setFlash('success','Successfully affected!!!');
            else
                Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['list']);
        
       
    }
     public function actionActivevision($id)
    {
        $model = \app\models\Vision::findOne(['id'=>$id]);
        $model->status = 1;
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully affected!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['list']);

    }
    public function actionMissionlist()
    {
       $mod = \app\models\Mission::find();
        
        $count = clone $mod;
        
        $pages = new Pagination(['pageSize'=>25,'totalCount'=>$count->count()]);
        $model = $mod->offset($pages->offset)->limit($pages->limit)->all();
       
        return $this->render('missionlist',[
            'pages'=>$pages,
            'model'=>$model,
            
            ]);  
    }
    public function actionUpdatemission($id)
    {
        $model = \app\models\Mission::findOne(['id'=>$id]);
        if($model->load(Yii::$app->request->post())){
            if($model->save())
                Yii::$app->session->setFlash('success','Successfully updated!!!');
            else
                Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['missionlist']);
        }else{
            return $this->render('index',[
                'model'=>null,
                'model1'=>$model,
                'model2'=>null,
                ]);
        }
    }
     public function actionDeletemission($id)
    {
        $model = \app\models\Mission::findOne(['id'=>$id]);
            $model->status = 0;
            if($model->save())
                Yii::$app->session->setFlash('success','Successfully affected!!!');
            else
                Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['missionlist']);
        
       
    }
     public function actionActivemission($id)
    {
        $model = \app\models\Mission::findOne(['id'=>$id]);
        $model->status = 1;
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully affected!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['missionlist']);

    }
    public function actionGoallist()
    {
 $mod = \app\models\Goal::find();
        
        $count = clone $mod;
        
        $pages = new Pagination(['pageSize'=>25,'totalCount'=>$count->count()]);
        $model = $mod->offset($pages->offset)->limit($pages->limit)->all();
       
        return $this->render('goallist',[
            'pages'=>$pages,
            'model'=>$model,
            
            ]); 
    }
    public function actionUpdategoal($id)
    {
     $model = \app\models\Goal::findOne(['id'=>$id]);
        if($model->load(Yii::$app->request->post()))
        {
           
            if($model->save())
                Yii::$app->session->setFlash('success','Successfully updated!!!');
            else
                Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['goallist']);    
        }
        else{
            return $this->render('index',[
                'model'=>null,
                'model1'=>null,
                'model2'=>$model,
                ]);
     }
 }
  public function actionDeletegoal($id)
    {
        $model = \app\models\Goal::findOne(['id'=>$id]);
            $model->status = 0;
            if($model->save())
                Yii::$app->session->setFlash('success','Successfully affected!!!');
            else
                Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['goallist']);
        
       
    }
     public function actionActivegoal($id)
    {
        $model = \app\models\Goal::findOne(['id'=>$id]);
        $model->status = 1;
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully affected!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['goallist']);

    }

}
