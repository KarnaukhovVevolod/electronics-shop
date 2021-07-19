<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


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
                    'logout' => ['post', 'get'],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    
    //создаём роль
    public function actionRole()
    {
        //создаём роли
        /*
        //роль user
        $user = Yii::$app->authManager->createRole('user');
        $user->description = "Пользователь";
        Yii::$app->authManager->add($user);
        
        //роль администратора
        $admin = Yii::$app->authManager->createRole('admin');
        $admin->description = "Администратор";
        Yii::$app->authManager->add($admin);
        
        //говорим что все права пользователя пренадлежат и администратору
        Yii::$app->authManager->addChild($admin, $user);
        
        //создаём роль заблокированного
        $ban = Yii::$app->authManager->createRole('ban');
        $ban->description = "Заблокированный";
        Yii::$app->authManager->add($ban);
        print_r('role');
        die();
        * 
        */
        
        //создаём правила
        /*
        //правило для администратора
        $permit = Yii::$app->authManager->createPermission('canAdmin');
        $permit->description = 'Доступ в админку';
        Yii::$app->authManager->add($permit);
        
        
        //правило для пользователя
        $permit_user = Yii::$app->authManager->createPermission('canUser');
        $permit_user->description = 'Доступ в личный кабинет для пользователя';
        Yii::$app->authManager->add($permit_user);
        
        //правило для заблокированного
        $permit_ban = Yii::$app->authManager->createPermission('canBan');
        $permit_ban->description = 'Заблокированный пользователь';
        Yii::$app->authManager->add($permit_ban);
        
        return 'создали правило';
        */
        
        //создание роли от права
        /*
        $role = Yii::$app->authManager->getRole('admin');
        $permit = Yii::$app->authManager->getPermission('canAdmin');
        Yii::$app->authManager->addChild($role, $permit);
        
        
        $role_user = Yii::$app->authManager->getRole('user');
        $permit_user = Yii::$app->authManager->getPermission('canUser');
        Yii::$app->authManager->addChild($role_user, $permit_user);
        
        $role_ban = Yii::$app->authManager->getRole('ban');
        $permit_ban = Yii::$app->authManager->getPermission('canBan');
        Yii::$app->authManager->addChild($role_ban, $permit_ban);
        */
        /*
         
        if(Yii::$app->user->can('canAdmin')){
            echo'для админа';
        }
        else{
            echo 'для других пользователей';
            
        }
         if(Yii::$app->user->can('admin')){
            echo'для админа';
        }
        else{
            echo 'для других пользователей';
            
        }
        
         */
        //return 'создали роли от права';
        
        //привязка ролей к пользователю
        
        /*
        $adminRole = Yii::$app->authManager->getRole('admin');
        $adminId = 4;
        Yii::$app->authManager->assign($adminRole, $adminId);
        
        
        $userRole = Yii::$app->authManager->getRole('user');
        $userId = 3;
        Yii::$app->authManager->assign($userRole, $userId);
        
        
        return 'привязка ролей к пользователю';
        */
        
        
        
        
                
        
    }
}



















