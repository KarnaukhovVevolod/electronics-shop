<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

use app\models\Notebook;
use app\models\Tablet;
use app\models\WishUser;

class Cart {
    //создаёт сессию для  корзины
    public function SessionCart($data_product)
    {
        $session = Yii::$app->session;
        $session->set('data_product', $data_product);
    }
    
    //читает сессию для корзины
    public function SessionRead(){
        $session = Yii::$app->session;
        
        if(!$session->has('data_product'))
        {
            return null;
        }
        if($session->has('data_product'))
        {
            $data_session = $session->get('data_product');
            if($data_session == null){
                return null;
            }
        }
        
        $data_session = $session->get('data_product');
        //debug($data_session);
        //die();
        $count = count($data_session['data']) - 1;
        $i = 0;
        for($i = 1; $i < $count; $i++)
        {
            $quantity = (int) ($data_session['data'][$i][1]);
            $price = str_replace(' ', '', $data_session['data'][$i][3]);
            $all_price = $quantity * (int) ($price);
            
            $text_all_price = (string)($all_price);
            $size = strlen($text_all_price);
            if($size < 4){
                $result_price = $text_all_price.' руб';
            }
            else if($size > 3 && $size < 6){
                $result_price = substr($text_all_price, 0, $size - 3).' '.substr($text_all_price, $size%3, 3) .' руб'; 
            }
            else if($size == 6)
            {
                $result_price = substr($text_all_price, 0, $size - 3).' '.substr($text_all_price, 3, 3) .' руб';
            }
            else if($size == 7)
            {
                $result_price = substr($text_all_price, 0, 1).' '.substr($text_all_price, 1, 3).' '.substr($text_all_price, 4, 3).' руб';
            }
            else{
                $result_price = new_price + ' руб';
            }
            $data_session['data'][$i][6] = $result_price;
            
        }
        
        return $data_session;
        //debug($data_session);
        //die();
    }
    
    //создаём сессию для списка желаний
    public function SessionWish($data_product)
    {
        $session = Yii::$app->session;
        if($session->has('data_wish'))
        {
            $data_session = $session->get('data_wish');
            if(is_array($data_session))
            {
                $count_session = count($data_session);
            }
            $yes = 0;
            foreach($data_session as $single_product ){
                if($single_product[2] == $data_product[2])
                {
                    $yes = 1;
                }
            }
            if($yes == 0)
            {
                $data_session[$count_session] = $data_product;
                $session->set('data_wish', $data_session);
                $count = $count_session + 1;
            }
            else
            {
                $count = $count_session;
            }
                       
        }   
        else
        {
            $data[0] = $data_product;
            $session->set('data_wish', $data);
            $count = 1;
        }
        
        //изменяем список для зарегистрированного пользователя
        if(Yii::$app->user->isGuest == false)
        {
            $data_session = $session->get('data_wish');
                
            $this->update_wish_user_db($data_session);                       
        }
        
        return $count;
    }
    
    //изменяем сессию  списка желаемых продуктов
    public function SessionWishUpdate($data_product)
    {
        $session = Yii::$app->session;
        if($session->has('data_wish'))
        {
            $data_session = $session->get('data_wish');
            if(is_array($data_session))
            {
                $count_session = count($data_session);
            }
            $yes = 0;
            $new_session = []; $i = 0;
            foreach($data_session as $single_product ){
                
                if($single_product[2] == $data_product[2])
                {
                    $yes = 1;
                }
                else
                {
                    $new_session[$i] = $single_product;
                    $i++;        
                }
            }
            
            $session->set('data_wish', $new_session);
            
            $count = $count_session - 1;
            
        }
        else
        {
            $count = 1;
            $data[0] = $data_product;
            $session->set('data_wish', $data);
        }
        //изменяем список для зарегистрированного пользователя
        if(Yii::$app->user->isGuest == false)
        {
            $data_session = $session->get('data_wish');
            $this->update_wish_user_db($data_session);                       
        }
        return $count;
    }
    
    //читаем сессию для списка жаланий
    public function SessionwishRead(){
        $session = Yii::$app->session;
        
        if(!$session->has('data_wish'))
        {
            return null;
        }
    
        if($session->has('data_wish'))
        {
            $data_session = $session->get('data_wish');
            if($data_session == null){
                return null;
            }
        }
        
        $data_session = $session->get('data_wish');
        //debug($data_session);
        //die();
        
        return $data_session;
        //debug($data_session);
        //die();
    }
    
    //функция для добавления продукта в модальное окно
    public function Modalwindow($single_product)
    {
        switch($single_product[1])
            {
                case 'notebook':
                    $data_product = Notebook::findOne(['id'=>$single_product[2]]);
                    
                    break;
                case 'tablet':
                    $data_product = Tablet::findOne(['id'=>$single_product[2]]);
                    break;
                
                case 'tv':
                    $data_product = Tv::findOne(['id'=>$single_product[2]]);
                    break;
                case 'audio':
                    $data_product = Audio::findOne(['id'=>$single_product[2]]);
                    break;
                case 'smartiphone':
                    $data_product = Smartiphone::findOne(['id'=>$single_product[2]]);
                    break;
                case 'camera':
                    $data_product = Camera::findOne(['id'=>$single_product[2]]);
                    break;
                case 'videocamera':
                    $data_product = VideoCamera::findOne(['id'=>$single_product[2]]);
                    break;
                
                default :
                    $data_product = null;
                    break;
            }
        if($data_product != null && strlen($data_product['description'])>300)
        {
            $data_product['description'] = mb_substr($data_product['description'],0,300, 'UTF-8').'...';
        }
        return $data_product;    
        
        
    }
    
    //функция для добавления продукта в список сравнения
    public function SessionCompare($data_product)
    {
        $session = Yii::$app->session;
        if($session->has('compare_session')) //для сесии которая существует
        {
            $data_session = $session->get('compare_session'); //получаем сессию
            if(is_array($data_session)) //проверка на массив
            {
                $count_session = count($data_session);
            }
            $yes = 0; $i = 0; $new_data_session = []; 
            foreach($data_session as $single_product ){
                if($single_product[2] == $data_product[2])
                {
                    $yes = 1;
                }
                else{
                    $new_data_session[$i] = $single_product;
                    $i++;
                }
                
            }
            if($yes == 0)
            {
                $new_data_session[$count_session] = $data_product;
                $session->set('compare_session', $new_data_session);
                $count = $count_session + 1;
            }
            else
            {
                $count = $count_session - 1;
                $session->set('compare_session', $new_data_session);
            }
            
        }
        else
        {
       
            $data[0] = $data_product;
            $session->set('compare_session', $data);
            $count = 1;
        }
        return $count;
    }
    
    //функция читает данные из базы данных
    public function SessionCompareRead($data)
    {
        $read_product = []; $i = 0;
        if($data != null)
        {
            //формируем данные для считывания с базы данных
            foreach($data as $single_product)
            {
                $params = explode('&', $single_product[1]);

                if(!array_key_exists($params[1], $read_product))
                {
                    $read_product[$params[1]] = [$params[2]];
                }
                else{

                    array_push($read_product[$params[1]], $params[2]); 
                }

            }

            //debug($read_product);

            //считываем данные с базы данных
            $i = 0;
            $read_database = [];
            //debug($read_product);
            //die();
            foreach($read_product as $category_product){
                $key = array_keys($read_product, $category_product);
                
                switch($key[0])
                {
                    case 'notebook':
                        $read_database[$key[0]] = Notebook::findAll($category_product);
                        break;
                    case 'tablet':
                        $read_database[$key[0]] = Tablet::findAll($category_product);
                        break;
                    case 'audio':
                        $read_database[$key[0]] = Audio::findAll($category_product);
                        break;
                    case 'camera':
                        $read_database[$key[0]] = Camera::findAll($category_product);
                        break;
                    case 'videocamera':
                        $read_database[$key[0]] = VideoCamera::findAll($category_product);
                        break;
                    case 'tv':
                        $read_database[$key[0]] = Tv::findAll($category_product);
                        break;
                    case 'smartiphone':
                        $read_database[$key[0]] = Smartiphone::findAll($category_product);
                        break;
                    default:

                        break;

                }
                //debug($key[0]);
                $i++;
            }

            //debug($read_database);
            return $read_database;
        }
        else{
            //die();
            return null;
        }
        
        
    }
    
    //функция удаляет сессию для сравнения продуктов
    public function SessionCompareDelet()
    {
        
        $session = Yii::$app->session;
        if($session->has('compare_session'))
        {
            $session->remove('compare_session');
        }
        
    }
    //функция добавляет в товар в список избранных, а также записывает его в базу данных 
    public function update_wish_user_db($data_product)
    {
        $date = date("Y-m-d", time());
        $user = Yii::$app->user->identity['username'];
        $data_wish_user = WishUser::find()->where(['login' => $user, 'date' => $date])->all(); 
        
        if($data_wish_user == null)
        {
            $count = count($data_product);
            if( $count == 1 )
            {
                
                $write_wish_user = new WishUser();
                $write_wish_user->login      = $user;
                $write_wish_user->path       = $data_product[0][0];
                $write_wish_user->name_model = $data_product[0][2];
                $write_wish_user->price      = $data_product[0][3];
                $write_wish_user->price_old  = $data_product[0][4];
                $write_wish_user->link       = $data_product[0][1];
                $write_wish_user->date       = $date;
                $write_wish_user->number_of_product = $data_product[0][5];
                $write_wish_user->save();   
            }
            elseif( $count > 1 )
            {
                $arr_wish = [];$i = 0;
                
                foreach($data_product as $single_wish_product)
                {
                    $arr_wish[$i] = [$user, $single_wish_product[0],$single_wish_product[2],$single_wish_product[3],
                        $single_wish_product[4],$single_wish_product[1],$date,$single_wish_product[5]];
                    
                    $i++;
                }
                Yii::$app->db->createCommand()->batchInsert(WishUser::tableName(),
                        ['login', 'path', 'name_model', 'price', 'price_old', 'link', 'date','number_of_product'], $arr_wish)->execute();
            }   
            
        }
        else {
            
            // определяем совпадение того, что хранится в сессии с тем что в базе данных
            $save_arr = [];
            
            $match = [];
            $get = 0; $not = 0; $j = 0; $k = 0;$l = 0;

            foreach($data_product as $single_session)
            {
                
                foreach($data_wish_user as $single_wish_user)
                {
                    
                    if( $single_session[2] == $single_wish_user['name_model'] )
                    {
                        $get = 1;
                        $match[$l] = $k; //что совпало
                        $l++;
                    }
                    $k++;
                }
                $k = 0;
                if($get != 1)
                {
                    $save_arr[$j]= $single_session; //что нужно добавить
                    $j++;
                }
                $get = 0;
            }
            /*debug('save_arr');
            debug($save_arr);
            debug($match);
            debug($data_product);
            */
            //добавляем в базу данных новые продукты
            $arr_wish = [];$i = 0;
            if($save_arr != null)
            {
                foreach($save_arr as $single_wish_product)
                {
                    $arr_wish[$i] = [$user, $single_wish_product[0],$single_wish_product[2],$single_wish_product[3],
                    $single_wish_product[4],$single_wish_product[1],$date,$single_wish_product[5]];
                    $i++;
                }
                
                Yii::$app->db->createCommand()->batchInsert(WishUser::tableName(),
                        ['login', 'path', 'name_model', 'price', 'price_old', 'link', 'date', 'number_of_product'], $arr_wish)->execute();
            }
            //debug($arr_wish);
            //die();
            //удаляем с базы данных старые продукты
            $delete_arr = [];
            $count_match = count($match);
            $count_db = count($data_wish_user);
            $tr = 0;
            if($count_match < $count_db)
            {
                $s = 0; $ln = 0;
                if($count_db != $count_match )
                {
                    for($m = 0; $m < $count_db; $m++)
                    {
                        for($n = 0; $n < $count_match; $n++)
                        {
                            if($m == $match[$n] )
                            {
                                $tr = 1;
                            }
                        }
                        
                        if($tr == 1 && $s < $count_match)
                        {
                            $s++;
                            $tr = 0;
                        }
                        else{
                            $delete_arr[$ln] = $data_wish_user[$m]['id'];
                            $ln++;
                        }
                    }
                    
                    //debug('delete');
                    //debug($delete_arr);
                    
                    WishUser::deleteAll(['id'=>$delete_arr]);
                    //debug('del');
                    //die();
                }
                
            }
            //debug('delet_arr');
            //debug($delete_arr);
        }
        
        
        //die();
        
    }
    
    //создаёт сессию для зарегистрированного пользователя
    
    public function createSession($data)
    {
        $array_session = [];$i = 0;
        foreach($data as $single_product)
        {
            $array_session[$i][0] = $single_product['path'];
            $array_session[$i][1] = $single_product['link'];
            $array_session[$i][2] = $single_product['name_model'];
            $array_session[$i][3] = $single_product['price'];
            $array_session[$i][4] = $single_product['price_old'];
            $array_session[$i][5] = 0;
            $i++;
        }
        
        $session = Yii::$app->session;
        $session->set('data_wish', $array_session);
    }
    
    //изменяем сессию  списка желаемых продуктов
    public function SessionWishUpdateDb($data_product)
    {
        $session = Yii::$app->session;
        if($session->has('data_wish'))
        {
            $data_session = $session->get('data_wish');
            if(is_array($data_session))
            {
                $count_session = count($data_session);
            }
            $yes = 0;
            $new_session = []; $i = 0;
            foreach($data_session as $single_product ){
                
                if($single_product[2] == $data_product[2])
                {
                    $yes = 1;
                }
                else
                {
                    $new_session[$i] = $single_product;
                    $i++;        
                }
            }
            
            $session->set('data_wish', $new_session);
            
            if($yes == 1)
            {
                $count = $count_session - 1;
            }
            else
            {
                $count = $count_session;
            }
            
        }
        else
        {
            $count = 1;
            $data[0] = $data_product;
            $session->set('data_wish', $data);
        }
        //изменяем список для зарегистрированного пользователя
        if(Yii::$app->user->isGuest == false)
        {
            $user = Yii::$app->user->identity['username'];
            WishUser::deleteAll(['login' => $user,  'name_model' => $data_product[2]]);
            //$this->update_wish_user_db($data_session);
        }
        return $count;
    }
    
}
