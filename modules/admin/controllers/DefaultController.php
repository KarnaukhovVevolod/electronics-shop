<?php


namespace app\modules\admin\controllers;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class DefaultController extends AppAdminController {
    //put your code here
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['canAdmin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionIndex() 
    {
        return $this->render('index'); 
        
    }
}
