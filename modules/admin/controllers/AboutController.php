<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\UploadedFile;

class AboutController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = \app\models\Aboutus::find()->one();
        if(empty($model)){
    		$model = new \app\models\Aboutus();
    		$model->setScenario('create');	
    	}
        $model1 = new \app\models\WhyWe();
        $reasons = \app\models\WhyWe::find()->where(['status'=>1])->all();
    	if($model->load(Yii::$app->request->post()) && $model1->load(Yii::$app->request->post())){
            $flag=true;
            $transaction = Yii::$app->db->beginTransaction();
            $model->file = UploadedFile::getInstance($model, 'file');
            $helper = new \app\helper\ImageHelper();
            if ($model->file) {
            	$name = 'logoofcompany'.time();
            	$path = 'img/'.$name.'.'.$model->file->extension;                
                $model->file->saveAs($path,false);
                $thumbnail = $helper->imageresize($path,$model->file->extension,'img/',0,$name);
                $model->logo = $thumbnail;
            }
            if(!$model->save())
                $flag=false;
            if(!empty($reasons)){
                if(!Yii::$app->db->createCommand('UPDATE `why_we` SET `status`=0')->execute())
                $flag=false;    
            }
            

            foreach ($model1->reason as $i => $rsn) {
                if(isset($model1->carbonId[$i])){
                    $r = \app\models\WhyWe::findOne(['id'=>$model1->carbonId[$i]]);
                }else{
                    $r = new \app\models\WhyWe();
                }
                $r->reason = $rsn;
                $r->status = 1;
                if(!$r->save()){
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
            return $this->redirect(['index']);
    	}else{
    		return $this->render('index',[
        		'model'=>$model,
                'model1'=>$model1,
                'reasons'=>$reasons,
        	]);	
    	}
        
    }

    public function actionColor()
    {
        $model = \app\models\ColorManagement::find()->one();
        if(empty($model)){
            $model = new \app\models\ColorManagement();
        }
        if($model->load(Yii::$app->request->post())){
            if($model->save())
                Yii::$app->session->setFlash('success','Successfully created!!!');
            else
                Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['color']);
        }else{
            return $this->render('color',[
                'model'=>$model,
            ]);
        }
    }

}
