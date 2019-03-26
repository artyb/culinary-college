<?php

namespace app\modules\admin\controllers;

use yii\data\Pagination;
use yii\web\UploadedFile; 

use Yii;

class TestimonialsController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = new \app\models\Testimonials();
    	if($model->load(Yii::$app->request->post()))
    	{
            $model->status =1;
            $model->file = UploadedFile::getInstance($model, 'file');
            $helper = new \app\helper\ImageHelper();
            if($model->file)
            {
                $name = 'testimonial'.time();
                $path="img/".$name.'.'.$model->file->extension;
                $model->file->saveAs($path,false);
                $thumbnail = $helper->imageresize($path,$model->file->extension,'img/',0,$name);
                $model->image = $thumbnail;
            }
    		if($model->save())
    			Yii::$app->session->setFlash('success','successfully created!!1');
    		else
    			Yii::$app->session->setFlash('danger','try agian later!!');
    		return $this->redirect(['index']);
    	}else{
        return $this->render('index',[
        	'model'=>$model,
        	]);
         }
    }
    public function actionList()
    {
         $mod = \app\models\Testimonials::find();
        $count = clone $mod;
        $pages = new Pagination(['pageSize'=>25,'totalCount'=>$count->count()]);
        $model = $mod->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('list',[
            'pages'=>$pages,
            'model'=>$model,
            ]);
    }
    public function actionUpdate($id)
    {
         $model = \app\models\Testimonials::findOne(['id'=>$id]);
        if($model->load(Yii::$app->request->post()))
        {
           
            if($model->save())
                Yii::$app->session->setFlash('success','Successfully updated!!!');
            else
                Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['list']);    
        }
        else{
            return $this->render('index',[
                'model'=>$model,
                ]);
        }
      }
      public function actionDelete($id)
    {
        $model = \app\models\Testimonials::findOne(['id'=>$id]);
        $model->status = 0;
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully affected!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['list']);

    }
     public function actionActive($id)
    {
        $model = \app\models\Testimonials::findOne(['id'=>$id]);
        $model->status = 1;
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully affected!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['list']);

    }

}
