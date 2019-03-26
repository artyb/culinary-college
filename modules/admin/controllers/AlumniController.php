<?php

namespace app\modules\admin\controllers;
use Yii;
use yii\web\UploadedFile; 
use yii\data\Pagination;

class AlumniController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = new \app\models\Alumni();
        $model->setScenario('create'); 
        if($model->load(Yii::$app->request->post())){
            $model->status = 1;
            $model->file = UploadedFile::getInstance($model, 'file');
            $helper = new \app\helper\ImageHelper();
            if($model->file)
            {
                $name = 'alumni'.time();
                $path="img/".$name.'.'.$model->file->extension;
                $model->file->saveAs($path,false);
                $thumbnail = $helper->imageresize($path,$model->file->extension,'img/',0,$name);
                $model->image = $thumbnail;
            }
            if($model->save())
            	Yii::$app->session->setFlash('success','Successfully created!!!');
            else
            	Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['index']);
        }
        else
        {
            return $this->render('index',[
                'model'=>$model,
            ]);
        }
    }
    public function actionList()
    {
       $mod = \app\models\Alumni::find();
       $count = clone $mod;
       $pages = new Pagination(['pageSize'=>25,'totalCount'=>$count->count()]);
       $model = $mod->offset($pages->offset)->limit($pages->limit)->all();
       return $this->render('list',
        [
         'pages'=>$pages,
         'model'=>$model,
     ]);

   }
   
   public function actionUpdate($id)
   {
    $model = \app\models\Alumni::findOne(['id'=>$id]);
    if($model->load(Yii::$app->request->post()))
    {
        $model->file = UploadedFile::getInstance($model, 'file');
        if($model->file)
        {
            $name = 'image'.time();
            $address="img/".$name.'.'.$model->file->extension;
            $model->file->saveAs('img/'.$name.'.'.$model->file->extension,false);
            $model->image = $address;
        }
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully updated!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['list']);    
    }else{
        return $this->render('index',[
            'model'=>$model,
        ]);
    }
}
public function actionDelete($id)
{
    $model = \app\models\Alumni::findOne(['id'=>$id]);
    $model->status = 0;
    if($model->save())
        Yii::$app->session->setFlash('success','Successfully affected!!!');
    else
        Yii::$app->session->setFlash('danger','Try again later!!!');
    return $this->redirect(['list']);

}
public function actionActive($id)
{
    $model = \app\models\Alumni::findOne(['id'=>$id]);
    $model->status = 1;
    if($model->save())
        Yii::$app->session->setFlash('success','Successfully affected!!!');
    else
        Yii::$app->session->setFlash('danger','Try again later!!!');
    return $this->redirect(['list']);

}


}
