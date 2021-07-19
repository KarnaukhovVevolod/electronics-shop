<?php


namespace app\models;

use yii\db\ActiveRecord;
use app\models\ManagerOrder;
use Yii;

class ManagerShop extends ActiveRecord {
    
    public static function tableName() {
        return 'manager_shop_order';
    }
    
    public function attributeLabels() {
        return[
            'id'              => 'id',
            'login'           => 'Логин',
            'name'            => 'Имя',
            'surname'         => 'Фамилия',
            'telephone'       => 'Телефон',
            'order_number'    => 'Номер заказа',
            'date_order'      => 'Дата',
            'email'           => 'E-mail',
            
            'post_code'        => 'Почт. индекс',
            'type_delivery'    => 'Тип доставки',
            'point_delivery'   => 'Пункт выдачи',
            'region'           => 'Регион',
            'city'             => 'Город',
            'village_locality' => 'Посёлок/насел.пункт',
            'street'           => 'Улица',
            'room'             => 'Дом',
            'flat'             => 'Квартира',
            'status_order'     => 'Статус заказа',
            'total_price_order'=> 'Общая цена заказа',
            'pay_order'        => 'Оплата заказа',
        ];
    }
    
    public function rules() {
        return[
            [['id','order_number'],'integer'],
            [['login', 'post_code', 'type_delivery',
                'status_order', 'city', 'name','surname'], 'string', 'max'=>30],
            [['region','room','email'], 'string', 'max' => 50],
            [['date_order'], 'string', 'min' => 2],
            [['point_delivery','village_locality','street'], 'string', 'max' => 100],
            [['flat','telephone'],'string', 'max' => 20],
            ['order_number','unique'],
            [['total_price_order'], 'string', 'max' => 15],
            [['pay_order'],'string', 'max' => 15],
            ['status_order','required'],
        ];
    }
    
    public function getProductshop(){
        return $this->hasMany(ManagerOrder::className(), ['order_number'=>'order_number']);
    }
    
    public function mypagination($url){
        $url = explode('&', $url);
        
        $limit = 4;
        $count_URL = count($url);
        /*
        if( $count_URL == 3 ){
            $all_order = ManagerShop::find()->where(['status_order'=>$url[2]]);
        }
        else{
            $all_order = ManagerShop::find();
        }
        
        $d_count = $all_order->count();
        */
        //считаем количество заказов
        //все заказы
        //$d_count_all = ManagerShop::find()->count();
        
        //заказы на обработке
        //$d_count_start_1 = ManagerShop::find()->where(['status_order'=>1])->count();
        //заказы на подготовке
        //$d_count_start_2 = ManagerShop::find()->where(['status_order'=>2])->count();
        //заказы на отправку
        //$d_count_start_3 = ManagerShop::find()->where(['status_order'=>3])->count();
        //заказы в пункте выдачи
        //$d_count_start_4 = ManagerShop::find()->where(['status_order'=>4])->count();
        //заказы завершены
        //$d_count_start_5 = ManagerShop::find()->where(['status_order'=>5])->count();
        
        //debug('заказ на обработке');debug($d_count_start_1);
        //debug('заказ на подготовке');debug($d_count_start_2);
        //debug('заказ на отправку');debug($d_count_start_3);
        //debug('заказ в пункте выдачи');debug($d_count_start_4);
        //debug('заказы завершены');debug($d_count_start_5);
        //$query_count_1 = (new \yii\db\Query())->from('manager_shop_order')->where(['status_order'=>1])->count();
        //$query_count_2 = (new \yii\db\Query())->from('manager_shop_order')->where(['status_order'=>2])->count();
        //$query_count_3 = (new \yii\db\Query())->from('manager_shop_order')->where(['status_order'=>3])->count();
        //$query_count_4 = (new \yii\db\Query())->from('manager_shop_order')->where(['status_order'=>4])->count();
        //$query_count_5 = (new \yii\db\Query())->from('manager_shop_order')->where(['status_order'=>5])->count();
        /*
        $query_count_1->union($query_count_2);
        $query_count_1->union($query_count_3);
        $query_count_1->union($query_count_4);
        $query_count_1->union($query_count_5);
        $qw = (new \yii\db\Query())->from($query_count_1)->all();
        debug($qw);
        */
        /*
        $qu = Yii::$app->db->createCommand('SELECT COUNT(*)  FROM manager_shop_order AS p1 WHERE status_order = 1 UNION '
                . 'SELECT COUNT(*)  FROM manager_shop_order AS p2 WHERE status_order = 2 UNION '
                . 'SELECT COUNT(*)  FROM manager_shop_order AS p3 WHERE status_order = 3 UNION '
                . 'SELECT COUNT(*)  FROM manager_shop_order AS p4 WHERE status_order = 4 UNION '
                . 'SELECT COUNT(*)  FROM manager_shop_order AS p5 WHERE status_order = 5')->queryAll();
         * 
         */
        //считает данные в одном запросе кол-во строк при разных условиях
        /*
        $qu = Yii::$app->db->createCommand('SELECT COUNT(*) AS p1,  '
                . '(SELECT COUNT(*)  FROM manager_shop_order WHERE status_order = 2) AS p2, '
                . '(SELECT COUNT(*)  FROM manager_shop_order WHERE status_order = 3) AS p3, '
                . '(SELECT COUNT(*)  FROM manager_shop_order WHERE status_order = 4) AS p4, '
                . '(SELECT COUNT(*)  FROM manager_shop_order WHERE status_order = 5) AS p5'.
                ' FROM manager_shop_order WHERE status_order = 1')->queryAll();*/
        $count_rows = Yii::$app->db->createCommand('SELECT COUNT(*) AS p1,  '
                . '(SELECT COUNT(*)  FROM manager_shop_order WHERE status_order = 2) AS p2, '
                . '(SELECT COUNT(*)  FROM manager_shop_order WHERE status_order = 3) AS p3, '
                . '(SELECT COUNT(*)  FROM manager_shop_order WHERE status_order = 4) AS p4, '
                . '(SELECT COUNT(*)  FROM manager_shop_order WHERE status_order = 5) AS p5'
                . ' FROM manager_shop_order WHERE status_order = 1')->queryAll();
        
        
       // debug($count_rows);
        
        if( $count_URL == 3 ){
            switch($url[2]){
                case 1: //для заказов на обработке
                    $d_count = $count_rows[0]['p1'];
                    break;
                case 2: //для заказов на подготовке
                    $d_count = $count_rows[0]['p2'];
                    break;
                case 3: //для заказов на отправку
                    $d_count = $count_rows[0]['p3'];
                    break;
                case 4: //для заказов в пункте выдачи
                    $d_count = $count_rows[0]['p4'];
                    break;
                case 5: //для завершённых заказов 
                    $d_count = $count_rows[0]['p5'];
                    break;
                default:
                    $d_count = $count_rows[0]['p1'] + $count_rows[0]['p2'] + $count_rows[0]['p3'] + $count_rows[0]['p4'] + $count_rows[0]['p5'];
                    break;
            }
            
        }else{
            $d_count = $count_rows[0]['p1'] + $count_rows[0]['p2'] + $count_rows[0]['p3'] + $count_rows[0]['p4'] + $count_rows[0]['p5'];
        }
        $count_rows[0]['p6'] = $count_rows[0]['p1'] + $count_rows[0]['p2'] + $count_rows[0]['p3'] + $count_rows[0]['p4'] + $count_rows[0]['p5'];
        //die();
        $delit = $d_count%$limit;
        
        //$start_n = 0; //Ссылка на первую страницу
        $start_product = 0;
        $number_first = 1;
        $number_last = ceil($d_count /$limit);
        $last_n = $number_last * $limit + 1 - $limit;
        if( count($url) > 1 )
        {
            $n_int = (int) $url[1];
            $current_n = $n_int;//Ccылка на текущую страницу
            if($n_int == $d_count)
            {
                $start_product = $n_int - $limit + 1;
            }
            else
            {
                $start_product = $n_int;
            }
        }
        else {
            $start_product = 0;
            $current_n = 0;
        }
        
        if($start_product < 0)
        {
            $start_product = 0;
        }
        
        $current_number = $current_n/$limit;
        //debug($current_n);
        //die();
        $current_number = ceil($current_number);
        if($current_number == 0)
        {
            $current_number = 1;
        }
        $next = 0 ;$prev = 0;
        if($current_number == 1)
        {
            $prev = 0;
        }
        if ($current_number == $number_last)
        {
            $next = 0;
        }
        if($current_number != 1 )
        {
            if( $current_number == 2 )// && $current_number == )
            {
                $prev = 0;
            }
            else
            {
                $prev = ($current_number * $limit) - (2 * $limit) + 1;
            }
        }
        if($current_number != $number_last)
        {
            if( $current_number == $number_last - 1 )
            {
                $next = 0;
            }
            else
            {
                $next = $current_number * $limit + 1;
            }
            
        }
        //debug($prev);
        //debug($next);
        //debug($number_first);
        //debug($number_last);
        //debug($current_number);
        
        //die();
        
        return compact('start_product', 'limit', 'current_number',
               'number_first', 'number_last', 'prev', 'next', 'last_n', 'count_rows');
    }
    
}
