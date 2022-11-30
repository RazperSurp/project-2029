<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\{AccessControl, VerbFilter};

use app\models\Goods;
use app\models\search\GoodsSearch;

class GoodsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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

    public function actionDeleteGoods($id) 
    {
        $model = Goods::findOne($id);
        if(isset($model) && !$model->deleted) {
            $model->deleteRow();
        }
        
        return $this->redirect(['index']);
    }

    public function actionDelete($id) 
    {
        $model = Goods::findOne($id);
        if(isset($model) && !$model->deleted) {
            $model->deleteRow();
        }
        
        return $this->redirect(['index']);
    }

    public function actionView($id) 
    {
        $model = Goods::findOne($id);
        return $this->render('view',['model'=>$model]);
    }

    public function actionUpdate($id) 
    {
        $model = Goods::findOne($id); 
        if($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view','id'=>$model->id]);
        }

        return $this->render('edit',['model'=>$model]);
    }

    public function actionAdd() 
    {
        $model = new Goods(); 
        if($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view','id'=>$model->id]);
        }

        return $this->render('edit',['model'=>$model]);
    }

    public function actionIndex()
    {
        $dataProvider = GoodsSearch::search();
        return $this->render('index',['dataProvider'=>$dataProvider]);
    }
}
