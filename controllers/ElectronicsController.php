<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;

use app\models\Category;
use app\models\CategoryBanner;
use app\models\Notebook;
use app\models\LinkProduct;
use app\models\ModelDatabase;
use app\models\ModelDetails;
use app\models\Cart;
use app\models\ProductBanner;
use app\models\RegistrationForm;
use app\models\ManagerForm;
use app\models\Pointdelivery;
use app\models\AdressUser;
use app\models\Comment;
use app\models\ContactCompany;
use yii\db\Query;

use app\models\CrudForm;
use yii\web\Response;


class ElectronicsController extends AppController {
    
    public function actionIndex(){
        
        $data = new Category();
        $category_data = $data->array_category();
        //debug($category_data);
        //die();
        $market_sort = $data->sort_marketing($category_data);
        //debug($market_sort);
        //die();
        //$banner = CategoryBanner::find()->where(['page' => 1])->orderBy(['subcategory_banner'=>'sdfsdwe'])->with('scroll','textban','imageban')->all();
        $banner = $data->category_banner(1);
        //$this->enableCsrfValidation = false;
        $query_1 = new Query();
        $seo_search = $query_1->from('seo_search')
                ->where(['type_category'=>'main'])->one();
        //debug($seo_search);
        //die();
        return $this->render('index', compact('category_data', 'market_sort', 'banner', 'seo_search'));
    } 
    
    public function actionAbout(){
        
        $company = new \app\models\AboutCompany();
        $data_company = $company->info_employee();
        $about_company = $data_company[0];
        $info_employee = $data_company[1];
        $query_1 = new Query();
        $seo_search = $query_1->from('seo_search')
                ->where(['type_category'=>'about_us'])->one();
        //debug($about_company);die();
        return $this->render('about', compact('about_company','info_employee','seo_search'));
    }
    
    public function actionShop(){
        
        if( Yii::$app->request->isPost )
        {
            $data = Yii::$app->request->post();
            
            $limit = 6;
            $database = new ModelDatabase();
            $product_1 = $database->readDatabase($data, $limit);
            $product_all = 0;
            $pages = $product_1[1];
            $product = $product_1[0];
            $url = explode('=&',Yii::$app->request->url);
            $URL_PATH = $url[0];
            $category_model = new Category();
            $result = $category_model->breadcrumbs($URL_PATH);
            $category = $result[0];
            
            $banner_cart = new ProductBanner();
            $banner = $banner_cart->readBanner(4);
        
            $count_data_category = $result[2];
            return $this->render('shop', compact('product','product_all','category','count_data_category','banner','pages'));
        }
        $url = explode('=&page',Yii::$app->request->url);
        $url_1 = explode('=&',Yii::$app->request->url);
        //$c_count_url = count($url);
       
        $url[0] = str_replace('=', '', $url[0]);
        
        //debug($url);
        //die();
        $URL_PATH = $url[0];
        $URL_PATH_1 = $url_1[0];
        
        $link_product = new LinkProduct();
        $limit = 6; //лимит на скачивание 
        $product_1 = $link_product->readProduct($URL_PATH,$limit);
        $pages = $product_1[1];
        $product = $product_1[0];
        //debug($pages);die();
        $category_model = new Category();
        $result = $category_model->breadcrumbs($URL_PATH);
        
        $category = $result[0];
        //debug('category');
        //debug($category);
        //die();
        $product_all = $result[1];
        $count_data_category = $result[2];
        //debug($count_data_category);
        //        die();
        $banner_cart = new ProductBanner();
        $banner = $banner_cart->readBanner(4);
        
        //debug($product);
        //        die();
        
        return $this->render('shop', compact('product','pages','product_all','category','count_data_category','banner'));
    }
    
    public function actionShopList()
    {
        $banner_cart = new ProductBanner();
        $banner = $banner_cart->readBanner(7);
        
        $data = new Category();
        $limit = 8;//указывает лимит считывания

        $url = Yii::$app->request->url;
        //$new_search_form = new \app\models\SearchForm();
        if(Yii::$app->request->isPost)
        //if($new_search_form->load(Yii::$app->request->post()) && $new_search_form->validate())
        {
            $data_post = Yii::$app->request->post();
            //debug($data_post);
            //die();
            
            $search_word = $data_post['SearchForm']['search'];
            $category_word = $data_post['SearchForm']['category'];

            $widget = new \app\widgets\search\SearchWidget();
            $widget->search_word = $search_word;
            $widget->category_word = $category_word;

            $market_sort['new'] = null;
            $form = new \app\models\SearchForm();  //создаём форму для поиска 
            //debug($data_post);
            //die();
            if(ctype_space($data_post['SearchForm']['search']) || $data_post['SearchForm']['search'] == null)
            {
                $start = null;
                $all_page = null;
                $search = null;
                
                return $this->render('shop-list', compact('banner', 'search', 'market_sort','form','search_word','category_word','start','limit','all_page'));
            }
            $search_too = $data->search_data($data_post['SearchForm'], $url, $limit); 
            //debug($search_too);
            //die();
            $search = $search_too[0];
            //$pages = $search_too[1];
            
            $start = $search_too[1][0];
            $all_page = $search_too[1][1];
            
            return $this->render('shop-list', compact('banner', 'search', 'market_sort','form','search_word','category_word','start','limit','all_page'));
        }
        
        $category_data = $data->array_category_new();
        $market_sort_1 = $data->sort_marketing_pagination($category_data, $limit, $url);
        $market_sort = $market_sort_1[0];
        $pages = $market_sort_1[2];
        
        return $this->render('shop-list', compact('banner', 'market_sort','pages'));
    }
    
    public function actionCart(){
        $cart = new Cart();
        
        if(Yii::$app->request->isAjax)
        {
           $data_product = Yii::$app->request->post();
           $cart->SessionCart($data_product);
           $ret = 'принято';
           //$ret = $data_product;
           Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
           return $ret;
        }
        
        $product = $cart->SessionRead();
        
        //debug($product);
        //die();
        $banner_cart = new ProductBanner();
        $banner = $banner_cart->readBanner(3);
        
        $data = new Category();
        $category_data = $data->array_category_bestceller();
        $market_sort = $data->sort_marketing_bestceller($category_data);
        $query_1 = new Query();
        $seo_search = $query_1->from('seo_search')
                ->where(['type_category'=>'office_addresses'])->one();
        
        return $this->render('cart',  compact('product', 'market_sort', 'banner'));
    }
    
    public function actionCheckout(){
        
        $manage_form = new ManagerForm();
        
        if( $manage_form->load(Yii::$app->request->post()) && $manage_form->validate() )
        {
            
            if(Yii::$app->session->has('data_product'))
            {
                $data = Yii::$app->request->post();
                //debug('checkout');die();
                $session = Yii::$app->session->get('data_product');
                $order_number = $manage_form->write_order($data['ManagerForm'], $session);
                //die();
                $mess = "Покупка совершена. Номер заказа № = ".$order_number[0].". Дата заказа = ".$order_number[1];
                Yii::$app->session->setFlash('purchase_of_goods',$mess);
            }
        }
        $point_delivery = new Pointdelivery();
        $point = $point_delivery->readDrop();
        
        $user_data = [];
        if(Yii::$app->user->can('canUser'))
        {
            $user = Yii::$app->user->identity['username'];
            $user_data = AdressUser::findOne(['login' => $user]);
        }
        
        if($user_data == null)
        {
            $data_registr_form = new \app\models\RegistruserForm();
            $user_data = $data_registr_form->init_data_registration();
        }
        
        $data = new Category();
        $category_data = $data->array_category_bestceller();
        $market_sort = $data->sort_marketing_bestceller($category_data);
        
        $banner_cart = new ProductBanner();
        $banner = $banner_cart->readBanner(8);
        if(Yii::$app->session->has('data_product') )
        {
            
            $session = Yii::$app->session->get('data_product');
            //debug($session);die();
            $history_order = $data->transform_data_chekout($session);
            
            
            return $this->render('checkout' ,compact('manage_form','point','user_data','market_sort','banner','history_order'));
        }
        
        return $this->render('checkout' ,compact('manage_form','point','user_data','market_sort','banner'));
    }
    
    public function actionAccount(){
        
        $registration_form = new RegistrationForm();
        
        if($registration_form->load(Yii::$app->request->post()) && $registration_form->validate() )
        {
            $data = Yii::$app->request->post();
            $message = $registration_form->ValidateDataBase($data['RegistrationForm']);
            Yii::$app->session->setFlash('registration_message', $message);
            //debug($message);
            //die();
        }
        
        return $this->render('account',  compact('registration_form'));
    }
    
    /*
    public function actionMyAccount(){
        
        return $this->render('my-account');
    }
    */
    
    public function actionProductDetails(){
        
        $comment = new Comment();
        
        if(Yii::$app->request->isAjax)
        {
            $data_comment = Yii::$app->request->post();
            $comment->save_comment($data_comment['data']);
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            
            return $data_comment;
        }
        
        $data_url = Yii::$app->request->url; 
        $shop_list = new ModelDetails();
        
        $product = $shop_list->ProductDetails($data_url);
        $banner = $shop_list->ProductDetailsbanner($data_url);
        
        $data = new Category();
        $category_data = $data->array_category_bestceller();
        $market_sort = $data->sort_marketing_bestceller($category_data);
        
        $result = $data->breadcrumbs_details($data_url, $product);
        
        $category = $result[0];
        $count_data_category = $result[1];
        //debug($category);
        //debug($data_url);
        //debug($product);
        //die();
        return $this->render('product-details', compact('product','market_sort', 'banner','comment','category','count_data_category'));
    }
    
    public function actionWishlist(){
        $cart = new Cart();
        
        if(Yii::$app->request->isAjax)
        {
           $data_wishlist = Yii::$app->request->post();
           if($data_wishlist['data'][0][5] == 2)
            {
                $count = $cart->SessionWish($data_wishlist['data'][0]);
            }
            else 
            {
                $count = $cart->SessionWishUpdate($data_wishlist['data'][0]);
            }
           
           $ret = $count;
           Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
           
           return $ret;
        }
        
        $wish = $cart->SessionwishRead();
        
        $banner_cart = new ProductBanner();
        $banner = $banner_cart->readBanner(5);
        //debug($wish);
        //die();
        return $this->render('wishlist', compact('wish', 'banner'));
    }
    
    public function actionCompare()
    {
        
        $cart = new Cart();
        //----------------------------
        if(Yii::$app->request->isAjax)
        {
           $data_compare = Yii::$app->request->post();
           if($data_compare['data'][0][5] == 2)
            {
                $count = $cart->SessionCompare($data_compare['data'][0]);
            }
            else if($data_compare['data'][0][5] == 3)
            {
                $count = $cart->SessionCompareDelet();
            }
           
           $ret = $count;
           Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
           
           return $ret;
        }
        //-----------------------------
    
        return $this->render('compare');
    }
    
    public function actionContact(){
        $contact_company = new ContactCompany();
        if( $contact_company->load(Yii::$app->request->post()) && $contact_company->validate() )
        {
            $data = Yii::$app->request->post();
            
            $contact_company->save_message($data['ContactCompany']);
            Yii::$app->session->setFlash('message_company',"Ваше сообщение компании отправленно");
        }
                
        $about_company = $contact_company->aboutcompany();
        //debug($about_company);
        //die();
        $data = new Category();
        $category_data = $data->array_category_bestceller();
        $market_sort = $data->sort_marketing_bestceller($category_data);
        
        $query_1 = new Query();
        $seo_search = $query_1->from('seo_search')
                ->where(['type_category'=>'office_addresses'])->one();
        
        
        return $this->render('contact',  compact('contact_company','about_company','market_sort','seo_search'));
    }
    
    public function actionModalwindow(){
        $cart = new Cart();
        
        if(Yii::$app->request->isAjax)
        {
           $data_product = Yii::$app->request->post();
           $single_product = explode('&', $data_product['data'][0]);
           $product = $cart->Modalwindow($single_product);
           Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
           return $product;
        }
    }
    /*
    public function actionCrud()
    {
        $crud = new CrudForm();
        if($crud->load(Yii::$app->request->post()) && $crud->validate())
        {
            
            $data_crud = Yii::$app->request->post();
            //debug($data_crud);
            //die();
            //$crud->createcrude($data_crud['CrudForm']);
            if($data_crud['CrudForm']['model_controller'] != null)
            {
                $crud_data = str_replace(' ', '', $data_crud['CrudForm']['model_controller']);
                //debug($crud_data);
                $crud_data = explode(',', $crud_data);
                //debug($crud_data);
                $new_data = [];
                $delimetr = '\ ';
                $delimetr = str_replace(' ', '', $delimetr);
                $model = explode($delimetr, $data_crud['CrudForm']['model_class']);
                $controller = explode($delimetr, $data_crud['CrudForm']['controller_class']);        
                $model = end($model);
                $controller = end($controller);
                //debug($model);
                //debug($controller);
                //debug('crudform');
                //debug($data_crud['CrudForm']);
                $crud->createcrude($data_crud['CrudForm']);
                foreach($crud_data as $crude)
                {
                    if($crude != null)
                    {
                        $new_data = explode('=>', $crude);
                        
                        //debug($new_data);
                        $data_crud['CrudForm']['model_class'] = str_replace($model, $new_data[0], $data_crud['CrudForm']['model_class']);
                        $data_crud['CrudForm']['controller_class'] = str_replace($controller, $new_data[1], $data_crud['CrudForm']['controller_class']);
                        $model = $new_data[0];
                        $controller = $new_data[1];
                        $crud->createcrude($data_crud['CrudForm']);
                        //debug('crude_data_new');
                        //debug($data_crud['CrudForm']);
                        //debug('crude_data_new');
                    }
                }
                //die();
            }
            else{
                $crud->createcrude($data_crud['CrudForm']);
            }
        
        
        }
        
        return $this->render('crud',compact('crud'));
    
    
    }*/
}






















