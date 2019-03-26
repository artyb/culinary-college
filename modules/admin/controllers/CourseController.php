<?php

namespace app\modules\admin\controllers;
use yii\web\UploadedFile;
use yii\data\Pagination;
use Yii;

class CourseController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new \app\models\Course();
        $model1 = new \app\models\CourseMeta();  
        $model1->setScenario('create');     
        if($model->load(Yii::$app->request->post()))
        {
            $flag = true;
            $transaction = Yii::$app->db->beginTransaction();
            $model->status =1;
            if(!$model->save()){
                $flag=false;
            }
            $helper = new \app\helper\ImageHelper();
            $model1->file = UploadedFile::getInstances($model1, 'file');
            if ($model1->file) {
                foreach ($model1->file as $i=>$file) {
                    $m = new \app\models\CourseMeta();
                    $m->status = 1;
                    $name = 'course'.$i.time();
                    $path = 'img/' . $name.'.'. $file->extension;
                    $file->saveAs($path,false);
                    $thumbnail = $helper->imageresize($path,$file->extension,'img/',$i,$name);
                    $m->image = $thumbnail;
                    $m->course_id = $model->id;
                    if(!$m->save()){
                        unlink($thumbnail);
                        $flag=false;
                        break;
                    }
                $gallery = new \app\models\Gallery();
                $gallery->type_id = 3;
                $gallery->reference_id = $model->id;
                $gallery->image = $thumbnail;
                $gallery->status = 1;
                if(!$gallery->save()){
                    $flag=false;
                    break;
                }
                }
                
            }
            if($flag){
                $transaction->commit();
                Yii::$app->session->setFlash('success','Successfully created!!!');
            }else{
                $transaction->rollback();
                Yii::$app->session->setFlash('danger','Try again later!!!');
            }
            return $this->redirect(['index']);
        }else{
            return $this->render('index',[
        	   'model'=>$model,
                'model1'=>$model1,
            ]);
    }
}
public function actionList()
{
 $mod = \app\models\Course::find();
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
 $model = \app\models\Course::findOne(['id'=>$id]);
 $model1 = new \app\models\CourseMeta();
 if($model->load(Yii::$app->request->post()) && $model1->load(Yii::$app->request->post()))
 {
    $flag=true;
    $transaction = Yii::$app->db->beginTransaction();
    if(!$model->save())
        $flag=false;
    $helper = new \app\helper\ImageHelper();
            $model1->file = UploadedFile::getInstances($model1, 'file');
            if ($model1->file) {
                foreach ($model1->file as $i=>$file) {
                    $m = new \app\models\CourseMeta();
                    $m->status = 1;
                    $name = 'course'.$i.time();
                    $path = 'img/' . $name.'.'. $file->extension;
                    $file->saveAs($path,false);
                    $thumbnail = $helper->imageresize($path,$file->extension,'img/',$i,$name);
                    $m->image = $thumbnail;
                    $m->course_id = $model->id;
                    if(!$m->save()){
                        unlink($thumbnail);
                        $flag=false;
                        break;
                    }
                }
            }
    if($flag){
        $transaction->commit();
        Yii::$app->session->setFlash('success','Successfully updated!!!');
    }else{
        $transaction->rollback();
        Yii::$app->session->setFlash('danger','Try again later!!!');
    }
    return $this->redirect(['list']);    
}
else{
    return $this->render('index',[
        'model'=>$model,
        'model1'=>$model1,
    ]);
}
}
public function actionDelete($id)
{
    $model = \app\models\Course::findOne(['id'=>$id]);
    $model->status = 0;
    if($model->save())
        Yii::$app->session->setFlash('success','Successfully affected!!!');
    else
        Yii::$app->session->setFlash('danger','Try again later!!!');
    return $this->redirect(['list']);

}
public function actionActive($id)
{
    $model = \app\models\Course::findOne(['id'=>$id]);
    $model->status = 1;
    if($model->save())
        Yii::$app->session->setFlash('success','Successfully affected!!!');
    else
        Yii::$app->session->setFlash('danger','Try again later!!!');
    return $this->redirect(['list']);

}

}
