<?php

namespace app\modules\user\controllers;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\WishUser;
use Yii;
use app\models\Cart;
use app\models\RegistruserForm;
use app\models\AdressUser;
use app\models\ManagerShop;
use app\models\ProductBanner;



class DefaultController extends AppUserController {
    //put your code here
   /* 
   public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['canUser'],
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
    */
    
    public function actionIndex()
    {
        $date = date("Y-m-d", time());
        
        //debug($data_wish_user);
        
        $session = Yii::$app->session;
        
        /*
        if($session->has('data_wish'))
        {
            $data_session = $session->get('data_wish');
            debug($data_session);
            //debug(count($data_session));
        }
        */
        
        if(Yii::$app->user->isGuest == false)
        {
            $cart = new Cart();
            if($session->has('data_wish')){
                $data_session = $session->get('data_wish');
                $cart->update_wish_user_db($data_session);
            }
            else{
                $user = Yii::$app->user->identity['username'];
                $data_wish_user = WishUser::find()->where(['login' => $user, 'date' => $date])->all(); 
                if($data_wish_user != null){
                    $cart->createSession($data_wish_user);
                }
            }
        }
        return $this->redirect(['/user/default/my-account']);
        //return $this->render('index');
    }
    
    
    public function actionMyAccount()
    {
        $user = Yii::$app->user->identity['username'];
        
        $user_adress_form = new RegistruserForm();
        
        if($user_adress_form->load(Yii::$app->request->post()) && $user_adress_form->validate())
        {
            $adress_user = Yii::$app->request->post(); 
            $user_adress_form->register_user_adress($adress_user['RegistruserForm'], $user);
        }
        
        $data_user = $user_adress_form->read_data_user($user);
        //debug($data_user);die();
        $product_wish_list = $data_user[1];
        $history_order = $data_user[0];
        $user_data = $data_user[2];
        //$product_wish_list = WishUser::find()->where(['login'=>$user])->all();
        //debug('$product_wish_list');
        //debug($product_wish_list);
        //die();
        //$history_order = ManagerShop::find()->where(['login' => $user])->with('productshop')->all();
        //debug('$history_order');
        //debug($history_order);
        
        //debug($query);
        //die();
        
        //die();
        if($user_data == null)
        {
            $user_data = $user_adress_form->init_data_registration();
        }
        //debug($user_data);
        //die();
        $banner_cart = new ProductBanner();
        $banner = $banner_cart->readBanner(6);
        
        return $this->render('my-account', compact('product_wish_list', 'user_adress_form', 'user_data','history_order','banner'));
    }
    
    public function actionFort()
    {
        $form = new RegistruserForm();
        $user = Yii::$app->user->identity['username'];
        $user_data = AdressUser::findOne(['login' => $user]);
        if($user_data == null)
        {
            $user_data = $form->init_data_registration();
        }
        //debug($user_data);
        //die();
        return $this->render('fort', compact('form','user_data'));
    }
    
    public function actionWishlist()
    {
        
        if(Yii::$app->request->isAjax)
        {
            $cart = new Cart();
            
            $data_wishlist = Yii::$app->request->post();
           if($data_wishlist['data'][0][5] == 3)
            {
                $count = $cart->SessionWishUpdateDb($data_wishlist['data'][0]);
            }
            $ret = $count;
           Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
           
           
           return $ret;
            
        }
        
    }
    
    
}
