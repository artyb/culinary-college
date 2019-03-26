<?php

namespace app\modules\admin\controllers;
use Yii;
use yii\web\UploadedFile; 
use yii\data\Pagination;
class TeamController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = new \app\models\Member();
    	$model->status=1;
    	if($model->load(Yii::$app->request->post()))
    	{
         $model->file=UploadedFile::getInstance($model,'file');
         $helper = new \app\helper\ImageHelper();
         if($model->file)
         {
           $name="member".time();
           $path ='img/'.$name.'.'.$model->file->extension;
           $model->file->saveAs($path,false);
           $thumbnail = $helper->imageresize($path,$model->file->extension,'img/',0,$name);
           $model->image =$thumbnail;
       }
       if($model->save())
        Yii::$app->session->setFlash('success','successfully created!!');
    else{
        Yii::$app->session->setFlash('danger','try again later!!');
    }
    return $this->redirect(['index']);
}
else{
    return $this->render('index',[
       'model'=>$model,
   ]);
}
} 
public function actionTypeindex()
{
   $model = new  \app\models\MemberType();
   if($model->load(Yii::$app->request->post())){
    $flag=true;
    $transaction = Yii::$app->db->beginTransaction();
    foreach($model->type_name as $typ){
        $m = new \app\models\MemberType();
        $m->type_name = $typ;
        $m->status = 1;
        if(!$m->save()){
            $flag=false;
            break;
        }
    }
    if($flag){
        $transaction->commit();
        Yii::$app->session->setFlash('success','Successfully created!!!');
    }else{
        $transaction->rollback();
        Yii::$app->session->setFlash('danger','Try again later!!!');
    }
    return $this->redirect(['typeindex']);

}else{
  return $this->render('typeindex',[
     'model'=>$model,
 ]);
}
}

public function actionTypelist()
{
    $mod = \app\models\MemberType::find();
    $count = clone $mod;
    $pages = new Pagination(['pageSize'=>25,'totalCount'=>$count->count()]);
    $model = $mod->offset($pages->offset)->limit($pages->limit)->all();
    return $this->render('typelist',[
     'pages'=>$pages,
     'model'=>$model,
 ]);
}

public function actionTypeupdate($id)
{
    $model = \app\models\MemberType::findOne(['id'=>$id]);
    if($model->load(Yii::$app->request->post())){
        if($model->save())
            Yii::$app->session->setFlash('success','Successfully updated!!!');
        else
            Yii::$app->session->setFlash('danger','Try again later!!!');
        return $this->redirect(['typelist']);

    }else{
        return $this->render('typeindex',[
            'model'=>$model,
        ]);
    }
}

public function actionTypedelete($id)
{
    $model = \app\models\MemberType::findOne(['id'=>$id]);
    $model->status = 0;
    if(!$model->save())
        Yii::$app->session->setFlash('danger','Try again later!!!');
    else
        Yii::$app->session->setFlash('success','Successfully deleted!!!');
    return $this->redirect(['typelist']);
}
public function actionTypeactive($id)
{
    $model = \app\models\MemberType::findOne(['id'=>$id]);
    $model->status = 1;
    if(!$model->save())
        Yii::$app->session->setFlash('danger','Try again later!!!');
    else
        Yii::$app->session->setFlash('success','Successfully activated!!!');
    return $this->redirect(['typelist']);
}
public function actionList()
{
 $mod = \app\models\Member::find();
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
    $model = \app\models\Member::findOne(['id'=>$id]);
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
    $model = \app\models\Member::findOne(['id'=>$id]);
    $model->status = 0;
    if($model->save())
        Yii::$app->session->setFlash('success','Successfully affected!!!');
    else
        Yii::$app->session->setFlash('danger','Try again later!!!');
    return $this->redirect(['list']);

}
public function actionActive($id)
{
    $model = \app\models\Member::findOne(['id'=>$id]);
    $model->status = 1;
    if($model->save())
        Yii::$app->session->setFlash('success','Successfully affected!!!');
    else
        Yii::$app->session->setFlash('danger','Try again later!!!');
    return $this->redirect(['list']);

}

public function actionMessage()
{
    $model = \app\models\Message::find()->one();
    if(empty($model))
        $model = new \app\models\Message();
    if($model->load(Yii::$app->request->post())){
        $model->status = 1;
        if(!$model->save())
            Yii::$app->session->setFlash('danger','Try again later!!!');
        else
            Yii::$app->session->setFlash('success','Successfully created!!!');
        return $this->redirect(['message']);
    }else{
        return $this->render('message',[
            'model'=>$model,
        ]);
    }
}

}
