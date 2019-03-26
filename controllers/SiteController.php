<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionFascility($id)
    {
        $model = \app\models\Facility::find()->where(['status'=>1])->all();
        $facility = \app\models\Facility::find()->where(['id'=>$id])->one();
        $meta = \app\models\FacilityMeta::findAll(['facility_id'=>$id,'status'=>1]);
        $news = \app\models\News::find()->where(['status'=>1])->orderBy(['id'=>SORT_DESC])->limit(5)->all();

        return $this->render('fascility',[
            'model'=>$model,
            'facility'=>$facility,
            'meta'=>$meta,
            'id'=>$id,
            'news'=>$news,
        ]);
    }

    public function actionDownload()
    {
        $model = \app\models\Download::find()->where(['status'=>1])->all();
        $news = \app\models\News::find()->where(['status'=>1])->orderBy(['id'=>SORT_DESC])->limit(5)->all();
        return $this->render('download',[
            'model'=>$model,
            'news'=>$news,
        ]);
    }

    public function actionGallery()
    {
        $model = \app\models\Gallery::find()->where(['status'=>1])->all();
        return $this->render('gallery',[
            'model'=>$model,
        ]);
    }

    public function actionCourse($id)
    {
        $model = \app\models\Course::find()->where(['status'=>1])->all();
        $course = \app\models\Course::find()->where(['id'=>$id])->one();
        $meta = \app\models\CourseMeta::findAll(['course_id'=>$id,'status'=>1]);
        $news = \app\models\News::find()->where(['status'=>1])->orderBy(['id'=>SORT_DESC])->limit(5)->all();   
        $head = \app\models\Member::findOne(['id'=>$course->department_head_id]);
        return $this->render('course',[
            'model'=>$model,
            'course'=>$course,
            'meta'=>$meta,
            'news'=>$news,
            'head'=>$head,
        ]);
    }

    public function actionFaq()
    {
        $mod = \app\models\FaqQuestion::find();
        $count = clone $mod;
        $pages = new Pagination(['pageSize'=>10,'totalCount'=>$count->count()]);
       $faq = $mod->offset($pages->offset)->limit($pages->limit)->all();
        $model = new \app\models\FaqQuestion();

        if($model->load(Yii::$app->request->post())){
            $model->status = 1;
            if($model->save())
                Yii::$app->session->setFlash('success','Thanks for your query!!!');
            else
                Yii::$app->session->setFlash('danger','Try again later!!!');
            return $this->redirect(['faq']);
        }else{
            return $this->render('faq',[
                'model'=>$model,
                'pages'=>$pages,
                'faq'=>$faq,
            ]);    
        }
        
    }

    public function actionVmg()
    {
        $vision = \app\models\Vision::find()->where(['status'=>1])->all();
        $mission = \app\models\Mission::find()->where(['status'=>1])->all();
        $goal = \app\models\Goal::find()->where(['status'=>1])->all();
        $news = \app\models\News::find()->where(['status'=>1])->orderBy(['id'=>SORT_DESC])->limit(5)->all();   
        return $this->render('vmg',[
            'vision'=>$vision,
            'mission'=>$mission,
            'goal'=>$goal,
            'news'=>$news,
        ]);
    }

    public function actionTeam()
    {
        $message = \app\models\Message::find()->one();
        $model = \app\models\Member::find()->where(['status'=>1])->all();
        return $this->render('team',[
            'model'=>$model,
            'message'=>$message,
        ]);
    }

    public function actionAlumni()
    {
        $model = \app\models\Alumni::find()->where(['status'=>1])->all();
        return $this->render('alumni',[
            'model'=>$model,
        ]);
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $slider = \app\models\Slider::find()->where(['status'=>1])->all();
        $news = \app\models\News::find()->where(['status'=>1])->orderBy(['id'=>SORT_DESC])->limit(5)->all();   
        $course = \app\models\Course::find()->where(['status'=>1])->all();
        $facility = \app\models\Facility::find()->where(['status'=>1])->limit(4)->all();
        $testimonial = \app\models\Testimonials::find()->where(['status'=>1])->all();
        $message = \app\models\Message::find()->one();
        $about = \app\models\Aboutus::find()->one();
        return $this->render('index',[
            'slider'=>$slider,
            'news'=>$news,
            'course'=>$course,
            'facility'=>$facility,
            'testimonial'=>$testimonial,
            'message'=>$message,
            'about'=>$about,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = '../../modules/admin/views/layouts/admin';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin/default/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $about = \app\models\Aboutus::find()->one();
        $model = new ContactForm();
        $course = \app\models\Course::find()->where(['status'=>1])->all();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
            'about' => $about,
            'course'=>$course,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $model = \app\models\Slider::find()->where(['status'=>1])->all();
        $about = \app\models\Aboutus::find()->one();
        return $this->render('about',[
            'model'=>$model,
            'about'=>$about,
        ]);
    }

    public function actionGallerydetail($id)
    {
        $model = \app\models\Gallery::findOne(['id'=>$id]);
        return $this->renderPartial('gallerydetail',[
            'model'=>$model,
        ]);
    }

}
