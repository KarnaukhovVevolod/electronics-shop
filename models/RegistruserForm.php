<?php

namespace app\models;

use yii\base\Model;
use app\models\AdressUser;
use Yii;


class RegistruserForm extends Model {
    
    public $login;
    public $name;
    public $surname;
    public $patronymic;
    public $email;
    
    public $mobile;
    public $company;
    
    public $day;
    public $moonth;
    public $yers;
    
    public $dop_info;
    public $country;
    
    public $city;
    public $region;
    public $village_locality;
    public $street;
    public $room;
    public $flat;
    public $post_code;
    
    public $date;
    
    
    public function attributeLabels() {
        return[
            'login'      => 'Логин',
            'name'       => 'Имя',
            'surname'    => 'Фамилия',
            'patronymic' => 'Отчество',
            'email'      => 'E-mail',
            'mobile'     => 'Телефон',
            'company'    => 'Компания',
            
            'day'        => 'День',
            'moonth'     => 'Месяц',
            'yers'       => 'Год',
            
            'dop_info'   => 'Доп.информация',
            'country'    => 'Страна',
            'city'       => 'Город',
            'region'     => 'Регион',
            'village_locality' => 'посёлок/насел.пункт',
            'street'     => 'Улица',
            'room'       => 'Дом',
            'flat'       => 'Квартира',
            'post_code'  => 'Почт.индекс',
            
        ];
    }
    
    public function rules() {
        return[
            
            [['login', 'name', 'surname', 'patronymic',
                'country', 'city'], 'string', 'max'=>30],
            [['email','region','room'], 'string', 'max'=>50],
            [['mobile', 'flat'], 'string', 'max' => 20],
            [['company'], 'string', 'max' => 250],
            //[['date'], 'string', 'min' => 2],
            [['day','yers'], 'integer'],
            [['moonth'],'string'],
            
            [['dop_info'],'string'],
            [['street'], 'string', 'max' => 150],
            [['post_code'], 'string', 'max' => 30],
            [['village_locality'], 'string', 'max' => 100],
        ];
    }
    
    public function register_user_adress($adress_user, $user)
    {
        $data_user = AdressUser::findOne(['login'=>$user]);
        if($data_user == null)
        {
            //debug($adress_user);
            //debug('null adress');
            //die();
            $user_adress = new AdressUser();
            $user_adress->login            = $user;
            $user_adress->name             = $adress_user['name'];
            $user_adress->surname          = $adress_user['surname'];
            $user_adress->patronymic       = $adress_user['patronymic'];
            $user_adress->email            = $adress_user['email'];
            $user_adress->mobile           = $adress_user['mobile'];
            $user_adress->company          = $adress_user['company'];
            $user_adress->dop_info         = $adress_user['dop_info'];
            $user_adress->date             = $adress_user['yers'].'-'.$adress_user['moonth'].'-'.$adress_user['day'];
           
            $user_adress->country          = $adress_user['country'];
            $user_adress->city             = $adress_user['city'];
            $user_adress->post_code        = $adress_user['post_code'];
            $user_adress->region           = $adress_user['region'];
            $user_adress->village_locality = $adress_user['village_locality'];
            $user_adress->street           = $adress_user['street'];
            $user_adress->room             = $adress_user['room'];
            $user_adress->flat             = $adress_user['flat'];
            $user_adress->save();
        }
        else
        {
            //debug('yes adress');
            //die();
            
            $data_user->login            = $user;
            $data_user->name             = $adress_user['name'];
            $data_user->surname          = $adress_user['surname'];
            $data_user->patronymic       = $adress_user['patronymic'];
            $data_user->email            = $adress_user['email'];
            $data_user->mobile           = $adress_user['mobile'];
            $data_user->company          = $adress_user['company'];
            $data_user->dop_info         = $adress_user['dop_info'];
            $data_user->date             = $adress_user['yers'].'-'.$adress_user['moonth'].'-'.$adress_user['day'];
           
            $data_user->country          = $adress_user['country'];
            $data_user->city             = $adress_user['city'];
            $data_user->post_code        = $adress_user['post_code'];
            $data_user->region           = $adress_user['region'];
            $data_user->village_locality = $adress_user['village_locality'];
            $data_user->street           = $adress_user['street'];
            $data_user->room             = $adress_user['room'];
            $data_user->flat             = $adress_user['flat'];
            $data_user->save();
        }
    }
    
    public function init_data_registration()
    {
        $data_user = new AdressUser();
        $data_user->login            = NULL;
        $data_user->name             = NULL;
        $data_user->surname          = NULL;
        $data_user->patronymic       = NULL;
        $data_user->email            = NULL;
        $data_user->mobile           = NULL;
        $data_user->company          = NULL;
        $data_user->dop_info         = NULL;
        $data_user->date             = '2020-02-01';
        
        $data_user->country          = NULL;
        $data_user->city             = NULL;
        $data_user->post_code        = NULL;
        $data_user->region           = NULL;
        $data_user->village_locality = NULL;
        $data_user->street           = NULL;
        $data_user->room             = NULL;
        $data_user->flat             = NULL;  
        
        return $data_user;
    }
    
    public function read_data_user($user)
    {
        /*
        $history_order_1 = (new \yii\db\Query())->from(['manager'=>'manager_shop_order'])
        ->where(['manager.login'=>$user])
        ->join('LEFT JOIN', 'manager_order_product', 'manager.order_number=manager_order_product.order_number')
        ->orderBy(['manager.order_number'=>'asdasd'])  
        ->all();
        //debug($history_order_1);//die();
        $history_order_n = []; $m = -1; $n = 0; $order_old = null;
        foreach($history_order_1 as $one_order)
        {
            if( $one_order['order_number'] != $order_old  )
            {
                $m++; 
                $order_old = $one_order['order_number'];
                $history_order_n[$m]['id'] = $one_order['id'];
                $history_order_n[$m]['login'] = $one_order['login'];
                $history_order_n[$m]['name'] = $one_order['name'];
                $history_order_n[$m]['surname'] = $one_order['surname'];
                $history_order_n[$m]['telephone'] = $one_order['telephone'];
                $history_order_n[$m]['order_number'] = $one_order['order_number'];
                $history_order_n[$m]['date_order'] = $one_order['date_order'];
                $history_order_n[$m]['email'] = $one_order['email'];
                $history_order_n[$m]['post_code'] = $one_order['post_code'];
                $history_order_n[$m]['type_delivery'] = $one_order['type_delivery'];
                $history_order_n[$m]['point_delivery'] = $one_order['point_delivery'];
                $history_order_n[$m]['region'] = $one_order['region'];
                $history_order_n[$m]['city'] = $one_order['city'];
                $history_order_n[$m]['village_locality'] = $one_order['village_locality'];
                $history_order_n[$m]['street'] = $one_order['street'];
                $history_order_n[$m]['room'] = $one_order['room'];
                $history_order_n[$m]['flat'] = $one_order['flat'];
                $history_order_n[$m]['status_order'] = $one_order['status_order'];
                $history_order_n[$m]['total_price_order'] = $one_order['total_price_order'];
                $history_order_n[$m]['pay_order'] = $one_order['pay_order'];
                
                $n = 0;
                $history_order_n[$m]['productshop'][$n]['order_number'] = $one_order['order_number'];
                $history_order_n[$m]['productshop'][$n]['name_model'] = $one_order['name_model'];
                $history_order_n[$m]['productshop'][$n]['path'] = $one_order['path'];
                $history_order_n[$m]['productshop'][$n]['quantity'] = $one_order['quantity'];
                $history_order_n[$m]['productshop'][$n]['price'] = $one_order['price'];
                $history_order_n[$m]['productshop'][$n]['total_price'] = $one_order['total_price'];
                $history_order_n[$m]['productshop'][$n]['link'] = $one_order['link'];
                
            }
            else{
                $n++;
                $history_order_n[$m]['productshop'][$n]['order_number'] = $one_order['order_number'];
                $history_order_n[$m]['productshop'][$n]['name_model'] = $one_order['name_model'];
                $history_order_n[$m]['productshop'][$n]['path'] = $one_order['path'];
                $history_order_n[$m]['productshop'][$n]['quantity'] = $one_order['quantity'];
                $history_order_n[$m]['productshop'][$n]['price'] = $one_order['price'];
                $history_order_n[$m]['productshop'][$n]['total_price'] = $one_order['total_price'];
                $history_order_n[$m]['productshop'][$n]['link'] = $one_order['link'];
            }
            
        }
        */
        //debug($history_order_n);
        $history_order_2 = (new \yii\db\Query())->from(HistoryUser::tableName())
                ->where(['login'=>$user])->orderBy(['order_number' =>'1'])
                ->addOrderBy(['id'=>SORT_DESC])->all();
         $history_order_n = []; $m = -1; $n = 0; $order_old = null;
        foreach($history_order_2 as $one_order)
        {
            if( $one_order['order_number'] != $order_old  )
            {
                $m++;
                
                $order_old = $one_order['order_number'];
                $history_order_n[$m]['id'] = $one_order['id'];
                $history_order_n[$m]['login'] = $one_order['login'];
                //$history_order_n[$m]['name'] = $one_order['name'];
                //$history_order_n[$m]['surname'] = $one_order['surname'];
                $history_order_n[$m]['telephone'] = $one_order['telephone'];
                $history_order_n[$m]['order_number'] = $one_order['order_number'];
                $history_order_n[$m]['date_order'] = $one_order['date_order'];
                $history_order_n[$m]['email'] = $one_order['email'];
                $history_order_n[$m]['post_code'] = $one_order['post_code'];
                $history_order_n[$m]['type_delivery'] = $one_order['type_delivery'];
                $history_order_n[$m]['point_delivery'] = $one_order['point_delivery'];
                $history_order_n[$m]['region'] = $one_order['region'];
                $history_order_n[$m]['city'] = $one_order['city'];
                $history_order_n[$m]['village_locality'] = $one_order['village_locality'];
                $history_order_n[$m]['street'] = $one_order['street'];
                $history_order_n[$m]['room'] = $one_order['room'];
                $history_order_n[$m]['flat'] = $one_order['flat'];
                $history_order_n[$m]['status_order'] = $one_order['status_order'];
                $history_order_n[$m]['total_price_all'] = $one_order['total_price_all'];
                $history_order_n[$m]['pay_order'] = $one_order['pay_order'];
                
                $n = 0;
                $history_order_n[$m]['productshop'][$n]['order_number'] = $one_order['order_number'];
                $history_order_n[$m]['productshop'][$n]['name_model'] = $one_order['name_model'];
                $history_order_n[$m]['productshop'][$n]['path'] = $one_order['path'];
                $history_order_n[$m]['productshop'][$n]['quantity'] = $one_order['quantity'];
                $history_order_n[$m]['productshop'][$n]['price'] = $one_order['price'];
                $history_order_n[$m]['productshop'][$n]['total_price'] = $one_order['total_price'];
                $history_order_n[$m]['productshop'][$n]['link'] = $one_order['link'];
                
            }
            else{
                $n++;
                $history_order_n[$m]['productshop'][$n]['order_number'] = $one_order['order_number'];
                $history_order_n[$m]['productshop'][$n]['name_model'] = $one_order['name_model'];
                $history_order_n[$m]['productshop'][$n]['path'] = $one_order['path'];
                $history_order_n[$m]['productshop'][$n]['quantity'] = $one_order['quantity'];
                $history_order_n[$m]['productshop'][$n]['price'] = $one_order['price'];
                $history_order_n[$m]['productshop'][$n]['total_price'] = $one_order['total_price'];
                $history_order_n[$m]['productshop'][$n]['link'] = $one_order['link'];
            }
            
        }
        //debug($history_order_2);
        //debug($history_order_n);
        //die();
        //$user_data = AdressUser::findOne(['login' => $user]);
        //debug('user_data');
        //debug($user_data);
        /*
        $query = (new \yii\db\Query())
                ->select(['adress_id'=>'adress.id','adress_login'=>'adress.login','adress_name'=>'adress.name','adress_surname'=>'adress.surname','adress_patronymic'=>'adress.patronymic',
                    'adress_email'=>'adress.email','adress_mobile'=>'adress.mobile','adress_company'=>'adress.company','adress_date'=>'adress.date','adress_dop_info'=>'adress.dop_info',
                    'adress_country'=>'adress.country','adress_city'=>'adress.city','adress_village_locality'=>'adress.village_locality','adress_region'=>'adress.region','adress_street'=>'adress.street',
                    'adress_room'=>'adress.room','adress_flat'=>'adress.flat','adress_post_code'=>'adress.post_code'])
                ->addSelect(['wishuser_id'=>'wishuser.id','wishuser_login'=>'wishuser.login','wishuser_path'=>'wishuser.path','wishuser_name_model'=>'wishuser.name_model',
                    'wishuser_price'=>'wishuser.price','wishuser_price_old'=>'wishuser.price_old','wishuser_link'=>'wishuser.link','wishuser_date'=>'wishuser.date'])
                ->from(['adress'=>'adress_user','wishuser'=>'wish_user'])
                ->where(['adress.login'=>$user,'wishuser.login'=>$user])
                ->orWhere(['adress.id'=>1,'wishuser.login'=>$user])
                ->orWhere(['adress.login'=>$user, 'wishuser.id'=>1])
                ->all();
        */ 
        $query_01 = (new \yii\db\Query())
                ->select(['adress_id'=>'adress.id','adress_login'=>'adress.login','adress_name'=>'adress.name','adress_surname'=>'adress.surname','adress_patronymic'=>'adress.patronymic',
                    'adress_email'=>'adress.email','adress_mobile'=>'adress.mobile','adress_company'=>'adress.company','adress_date'=>'adress.date','adress_dop_info'=>'adress.dop_info',
                    'adress_country'=>'adress.country','adress_city'=>'adress.city','adress_village_locality'=>'adress.village_locality','adress_region'=>'adress.region','adress_street'=>'adress.street',
                    'adress_room'=>'adress.room','adress_flat'=>'adress.flat','adress_post_code'=>'adress.post_code'])
                ->addSelect(['wishuser_id'=>'wish_user.id','wishuser_login'=>'wish_user.login','wishuser_path'=>'wish_user.path','wishuser_name_model'=>'wish_user.name_model',
                    'wishuser_price'=>'wish_user.price','wishuser_price_old'=>'wish_user.price_old','wishuser_link'=>'wish_user.link','wishuser_date'=>'wish_user.date','wishuser_number_of_product'=>'wish_user.number_of_product'])
                ->from(['adress'=>'adress_user'])
                ->where(['adress.login'=>$user])
                ->join('LEFT JOIN', 'wish_user','adress.login=wish_user.login')
                ;
        $query_02 = (new \yii\db\Query())        
                ->select(['adress_id'=>'adress_user.id','adress_login'=>'adress_user.login','adress_name'=>'adress_user.name','adress_surname'=>'adress_user.surname','adress_patronymic'=>'adress_user.patronymic',
                    'adress_email'=>'adress_user.email','adress_mobile'=>'adress_user.mobile','adress_company'=>'adress_user.company','adress_date'=>'adress_user.date','adress_dop_info'=>'adress_user.dop_info',
                    'adress_country'=>'adress_user.country','adress_city'=>'adress_user.city','adress_village_locality'=>'adress_user.village_locality','adress_region'=>'adress_user.region','adress_street'=>'adress_user.street',
                    'adress_room'=>'adress_user.room','adress_flat'=>'adress_user.flat','adress_post_code'=>'adress_user.post_code'])
                ->addSelect(['wishuser_id'=>'wishuser.id','wishuser_login'=>'wishuser.login','wishuser_path'=>'wishuser.path','wishuser_name_model'=>'wishuser.name_model',
                    'wishuser_price'=>'wishuser.price','wishuser_price_old'=>'wishuser.price_old','wishuser_link'=>'wishuser.link','wishuser_date'=>'wishuser.date','wishuser_number_of_product'=>'wishuser.number_of_product'])
                ->from(['wishuser'=>'wish_user'])
                ->where(['wishuser.login'=>$user])
                ->join('LEFT JOIN', 'adress_user','adress_user.login=wishuser.login')
                ;
        $query_01->union($query_02);
        $query = (new \yii\db\Query())
                ->from($query_01)
                ->all();
        
        //debug($quer1);
        //debug($query);
        //die();
        //debug($history_order_n);
        if($query == null)
        {
            return [$history_order_n,[],null];
        }
        //debug($user);
        //die();
        $user_data['id'] = $query[0]['adress_id'];
        $user_data['login'] = $query[0]['adress_login'];
        $user_data['name'] = $query[0]['adress_name'];
        $user_data['surname'] = $query[0]['adress_surname'];
        $user_data['patronymic'] = $query[0]['adress_patronymic'];
        $user_data['email'] = $query[0]['adress_email'];
        $user_data['mobile'] = $query[0]['adress_mobile'];
        $user_data['company'] = $query[0]['adress_company'];
        $user_data['date'] = $query[0]['adress_date'];
        $user_data['dop_info'] = $query[0]['adress_dop_info'];
        $user_data['country'] = $query[0]['adress_country'];
        $user_data['city'] = $query[0]['adress_city'];
        $user_data['village_locality'] = $query[0]['adress_village_locality'];
        $user_data['region'] = $query[0]['adress_region'];
        $user_data['street'] = $query[0]['adress_street'];
        $user_data['room'] = $query[0]['adress_room'];
        $user_data['flat'] = $query[0]['adress_flat'];
        $user_data['post_code'] = $query[0]['adress_post_code'];
        
        $ty = 0;
        foreach($query as $one_sql)
        {
            $product_wish_list[$ty]['id'] = $one_sql['wishuser_id'];
            $product_wish_list[$ty]['login'] = $one_sql['wishuser_login'];
            $product_wish_list[$ty]['path'] = $one_sql['wishuser_path'];
            $product_wish_list[$ty]['name_model'] = $one_sql['wishuser_name_model'];
            $product_wish_list[$ty]['price'] = $one_sql['wishuser_price'];
            $product_wish_list[$ty]['price_old'] = $one_sql['wishuser_price_old'];
            $product_wish_list[$ty]['link'] = $one_sql['wishuser_link'];
            $product_wish_list[$ty]['date'] = $one_sql['wishuser_date'];
            $product_wish_list[$ty]['number_of_product'] = $one_sql['wishuser_number_of_product'];
            $ty++;
        }
        //$date = date("Y-m-d", time());
        $date = date("Y-m-d", time());
        
        //debug($date);
        //die();
        //debug($product_wish_list);
        // обновляем данные о количестве продукта на текущий момент
        if($date != $product_wish_list[0]['date'])
        {
            // обновляем данные о количестве продукта на текущий момент
            $table = [];
            $id_table = [];$j= 0;
            foreach($product_wish_list as $product_wish_one)
            {
                $link = explode("&", $product_wish_one['link']);
                //debug($link);
                 
                $table_product = $link[1];
                $id_product = $link[2];
                $product_wish_list[$j]['category_english'] = $table_product;
                $product_wish_list[$j]['number_of_product'] = 'Нет в наличии';
                $product_wish_list[$j]['id_n'] = (int)$id_product;
                $j++;
                if( in_array($table_product, $table) )
                {
                    array_push($id_table[$table_product],$id_product);
                }
                else{
                    $id_table[$table_product] = $id_product;
                    array_push($table,$table_product); 
                }
                
                
            }
            //получаем актуальные данные
            $count_tabl = count($id_table); 
            
            for($i = 0; $i < $count_tabl; $i++)
            {
                if($i == 0){
                    $sql_0 = (new \yii\db\Query())
                            ->select(['id','category_english','number_of_products'])
                            ->from($table[$i])
                            ->where(['id'=>$id_table[$table[$i]]]); 
                }
                else{
                    $sql_1 = (new \yii\db\Query())
                            ->select(['id','category_english','number_of_products'])
                            ->from($table[$i])
                            ->where(['id'=>$id_table[$table[$i]]]);
                    $sql_0->union($sql_1);
                }
            }
            $data_query = (new \yii\db\Query())
                ->select(['id','category_english','number_of_products'])
                ->from($sql_0)
                ->all();
            //debug($product_wish_list);
            //debug($data_query);


            //обновляем данные
            $update_db = [];
            $wish_list_count = count($product_wish_list);
            for( $i = 0; $i < $wish_list_count; $i++ )
            {

                foreach( $data_query as $one_data )
                {
                    if( $product_wish_list[$i]['id_n'] == $one_data['id'] && $product_wish_list[$i]['category_english'] == $one_data['category_english'] )
                    {
                        //$update_db
                        $product_wish_list[$i]['number_of_product'] = $one_data['number_of_products'];
                        break;
                    }
                }
            }
            //формируем sql - запрос для обновления сразу нескольких строк в одной таблицы
            /*
            $database_update ='UPDATE wish_user SET number_of_product = CASE id WHEN 12 THEN null'
                    . '  WHEN 11 THEN null END WHERE id IN (11,12)';
             */
            //debug($database_update);
            //die();
            $dat = str_replace('-', '', $date);
            //debug($product_wish_list);

            $sql_create = '';
            $sql_create_where = ' END WHERE id IN (';
            foreach($data_query as $one__data){
                if($one__data['number_of_products'] == null){
                    $sql_create = $sql_create. ' WHEN '.$one__data['id'] .' THEN '.'NULL' ; 
                }else{
                    $sql_create = $sql_create. ' WHEN '.$one__data['id'] .' THEN '.$one__data['number_of_products'] ; 
                }

                $sql_create_where = $sql_create_where.$one__data['id'].',';
            }
            $sql_where = mb_substr($sql_create_where, 0, -1);
            $all_sql_create = 'UPDATE wish_user SET date = '.$dat.
                    ' , number_of_product = CASE id '.$sql_create.
                    $sql_where.')';
            //debug($all_sql_create);
            $database_update = Yii::$app->db->createCommand($all_sql_create)->execute();
            //die();
            /*
            $database_update = Yii::$app->db->createCommand('UPDATE wish_user SET'. 
             'date='.$dat.
                    ', number_of_product = CASE id '.
                    ' WHEN 12 THEN 7'.
                    ' WHEN 11 THEN 1'.
                    ' WHEN 16 THEN 4'.
                    ' END'.
                    ' WHERE id IN (11,12,16)')->execute();
            */
            //debug($database_update->sql);
            //die();

        }
        
        //die();
        return [$history_order_n, $product_wish_list, $user_data];
    }
    
}
