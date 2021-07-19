<?php


namespace app\models;

use yii\base\Model;
use app\models\ManagerOrder;
use app\models\ManagerShop;
use app\models\HistoryUser;
use Yii;
//---
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
//---
class ManagerForm extends Model 
{
    //put your code here
    public $login;
    public $name;
    public $surname;
    public $telephone;
    public $date_order;
    public $email;
    public $post_code;
    public $type_delivery;
    public $point_delivery;
    public $region;
    public $city;
    public $village_locality;
    public $street;
    public $room;
    public $flat;
    public $status_order;
    
    public function attributeLabels() {
        return[
            'name'             => 'Имя',
            'surname'          => 'Фамилия',
            'telephone'        => 'Телефоне',
            'date_order'       => 'Дата заказа',
            'post_code'        => 'Почтовый индекс',
            'email'            => 'E-mail',
            'type_delivery'    => 'Тип доставки',
            'point_delivery'   => 'Пункт выдачи',
            'region'           => 'Регион',
            'city'             => 'Город',
            'village_locality' => 'посёлок/насел.пункт',
            'street'           => 'Улица',
            'room'             => 'Дом',
            'flat'             => 'Квартира',
            'status_order'     => 'Статус заказа',
            
        ];
    }
    
    public function rules(){
        return[
            [['post_code', 'type_delivery',
                'status_order', 'city','name','surname'], 'string', 'max' => 30],
            [['region','room','email'], 'string','max' => 50],
            [['date_order'], 'string', 'min' => 2],
            [['point_delivery','village_locality','street'], 'string', 'max' => 100],
            [['flat','telephone'],'string', 'max'=> 20],
            [['type_delivery'],'validate_data','skipOnEmpty'=>false,'skipOnError'=>false],
            
        ];
    }
    
    /*
    public function behaviors() {
        return[
            
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT =>['столбец в таблице бд'],
                ],
                'value' => new Expression('NOW()'),
            ]
        ];
    }
    */
    
    public function validate_data()
    {
        if($this->type_delivery == 1)
        {
            if($this->name == null )
            {
                $this->addError('name', 'Введите имя');
            }
            if($this->surname == null){
                $this->addError('surname', 'Введите фамилию');
            }
            if($this->telephone == null)
            {
                $this->addError('telephone', 'Введите телефон для связи с менеджером');
            }
            if($this->email == null){
                $this->addError('email', 'Введите email');
            }
            if($this->post_code == null)
            {
                $this->addError('post_code', 'Введите почтовый индекс 6 символов');
            }
            if($this->region == null){
                $this->addError('region', 'Введите регион');
            }
            if($this->city == null){
                if($this->village_locality == null){
                    $this->addError('city', 'Введите город или посёлок/насел.пункт');
                    $this->addError('village_locality', 'Введите город или посёлок/насел.пункт');
                }
            }
            
            if($this->street == null){
                $this->addError('street', 'Введите улицу');
            }
            if($this->room == null){
                $this->addError('room', 'Введите номер дома');
            }
            if($this->flat == null){
                $this->addError('flat', 'Введите номер квартиры');
            }
            
        }
        else if($this->type_delivery == 2)
        {
            if($this->name == null )
            {
                $this->addError('name', 'Введите имя');
            }
            if($this->surname == null){
                $this->addError('surname', 'Введите фамилию');
            }
            if($this->telephone == null)
            {
                $this->addError('telephone', 'Введите телефон для связи с менеджером');
            }
            if($this->email == null){
                $this->addError('email', 'Введите email');
            }
            
        }
        else if($this->type_delivery== 0){
            $this->addError('type_delivery', 'Выберите тип доставки');
        }
    }
    
    
    public function write_order($data, $session)
    {
        //debug($data);
        //debug($session);
        //die();
        $count_session = count($session['data']) - 1;
        //debug($session['data'][$count_session]);
        //die();
        
        
        $total_pr = [];
        for($j = 1;$j < $count_session; $j++){
            $quantity = (int)($session['data'][$j][1]);

            //debug($quantity);
            $price_one = str_replace(" ","",$session['data'][$j][3]);
            $price_one = (int) $price_one;
            $price_one_last = $quantity * $price_one;
            //переводим строку с общей ценой товара в нужный формат в нужный формат
            $size_string = strlen($price_one_last);
            
            $total_price_one_product;
            if($size_string < 4)
            {
                $total_price_one_product = $price_one_last." руб";
            }
            else if($size_string > 3 && $size_string < 7)
            {
                $one_chast = substr($price_one_last, $size_string - 3, 3);
                $too_chast = substr($price_one_last, 0, $size_string - 3);
                $total_price_one_product = $too_chast." ".$one_chast." руб";            

            }
            else if($size_string > 6 && $size_string < 10)
            {
                $one_chast  = substr($price_one_last, $size_string - 3, 3);
                $too_chast  = substr($price_one_last, $size_string - 6, 3);
                $free_chast = substr($price_one_last, 0, $size_string - 6);
                $total_price_one_product = $free_chast." ".$too_chast." ".$one_chast." руб";

            }
            else{
                $total_price_one_product = $price_one_last." руб";

            }
            //debug($total_price_one_product);
            $total_pr[$j] = $total_price_one_product;
        }
        
        //считываем последнию записанную запись в бд
        $last_order = ManagerShop::find()->orderBy(['id' => SORT_DESC])->one();
        //debug('последние id');
        //debug($last_order);
        $current_order;
        if( $last_order == null )
        {
            $current_order = 1;
        }
        else{
            $current_order = $last_order['id'] + 1;
        }
        
        //debug($last_order);
        //debug($current_order);
        //die();
        
        $login;
        if(Yii::$app->user->isGuest == false)
        {
            $login = Yii::$app->user->identity['username'];
        }
        else {
            $login = 'none';
        }
        $type_delivery;
        switch($data['type_delivery']){
            case 0:
                $type_delivery = 'Тип доставки';
                break;
            case 1:
                $type_delivery = 'Доставка';
                break;
            case 2:
                $type_delivery = 'Самовывоз';
                break;
            default:
                $type_delivery = $data['type_delivery'];
                break;
        }
        
        // 
        //записываем в базу данных менеджер заказов
        //die();
        $date_ord = date("Y-m-d", time());
        $date_ord = str_replace('-','',$date_ord);
            
        $manager_shop = new ManagerShop();
        
        $manager_shop->login            = $login;
        
        $manager_shop->name             = $data['name'] ;
        $manager_shop->surname          = $data['surname'] ;
        $manager_shop->telephone        = $data['telephone'];
        $manager_shop->order_number     = $current_order;
        
        $manager_shop->date_order       = date("Y-m-d", time());
        $manager_shop->email            = $data['email'];
        $manager_shop->post_code        = $data['post_code'];
        $manager_shop->type_delivery    = $type_delivery;
        
        $manager_shop->point_delivery   = $data['point_delivery'];
        $manager_shop->region           = $data['region'];
        $manager_shop->city             = $data['city'];
        $manager_shop->village_locality = $data['village_locality'];
        
        $manager_shop->street           = $data['street'];
        $manager_shop->room             = $data['room'];
        $manager_shop->flat             = $data['flat'];
        $manager_shop->status_order     = 1;
        $manager_shop->total_price_order = $session['data'][$count_session];
        
        //$manager_shop->save();
        $columns = ['login','name','surname','telephone','order_number','date_order',
            'email','post_code','type_delivery','point_delivery','region','city','village_locality',
            'street','room','flat','status_order','total_price_order','pay_order'];
        $rows[0] = [$login, $data['name'], $data['surname'], $data['telephone'], $current_order, $date_ord,
            $data['email'], $data['post_code'], $type_delivery, $data['point_delivery'], $data['region'], $data['city'],
            $data['village_locality'], $data['street'], $data['room'], $data['flat'], 1, $session['data'][$count_session], null];
        //debug($columns);
        //debug($rows);
        //die();
        Yii::$app->db->createCommand()->batchInsert('manager_shop_order',
                $columns, $rows)->execute();
        //debug($data);
        
        $rows = [];
        for($i = 1; $i < $count_session; $i++)
        {
            $rows[$i] = [$current_order, $session['data'][$i][0], $session['data'][$i][2],
                $session['data'][$i][1], $session['data'][$i][3], $total_pr[$i], $session['data'][$i][4]];
        }
        debug('rows');
        debug($rows);
        $columns = ['order_number', 'name_model', 'path', 'quantity', 'price', 'total_price', 'link'];   
       // Yii::$app->db->createCommand()->batchInsert(ManagerOrder::tableName(),
       //        $columns, $rows)->execute();
        //debug('save');
        //die();
        //die();
        //die();
        //записываем заказы в историю заказов пользователя
        if(Yii::$app->user->isGuest == false)
        {
            $login = Yii::$app->user->identity['username'];
            //$history_product = new HistoryUser();
            //debug($data);
            //debug($session);
            
            //debug($date_ord);
            //die();
            $rows = [];$pay_order = null;
            for($i = 1; $i < $count_session; $i++)
            {
                
                $rows[$i] = [$login, $session['data'][$count_session], $date_ord, $data['post_code'], $type_delivery, $data['point_delivery'], $data['region'], $data['city'], $data['village_locality'],
                    $data['street'], $data['room'], $data['flat'],1,$pay_order, $data['telephone'], $data['email'],$current_order, $session['data'][$i][0], $session['data'][$i][2],
                    $session['data'][$i][1], $session['data'][$i][3], $total_pr[$i], $session['data'][$i][4]];
            }

            $columns = ['login','total_price_all','date_order','post_code','type_delivery','point_delivery','region','city','village_locality',
                'street', 'room', 'flat', 'status_order', 'pay_order', 'telephone', 'email',
                'order_number', 'name_model', 'path', 'quantity', 'price', 'total_price', 'link'];   
           // Yii::$app->db->createCommand()->batchInsert(HistoryUser::tableName(),
           //         $columns, $rows)->execute();
            
        }
        Yii::$app->session->remove('data_product');
        return [$current_order, date("Y-m-d", time())];
        
        
    }
    
    public function Oplata($price, $number_order){
    // 2.
    // Оплата заданной суммы с выбором валюты на сайте ROBOKASSA
    // Payment of the set sum with a choice of currency on site ROBOKASSA

    // регистрационная информация (идентификатор магазина, пароль #1)
    // registration info (login, password #1)
    $mrh_login = "my_identity_shop";
    $mrh_pass1 = "password_1";

    // номер заказа
    // number of order
    $inv_id = $number_order;

    // описание заказа
    // order description
    $inv_desc = "Заказ № = $number_order, оплачен";

    // сумма заказа
    // sum of order
    $out_summ = $price;

    // тип товара
    // code of goods
    $shp_item = "2";

    // предлагаемая валюта платежа
    // default payment e-currency
    $in_curr = "Рубль";

    // язык
    // language
    $culture = "ru";

    // формирование подписи
    // generate signature
    $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");
    
    return [$mrh_login,$mrh_pass1,$inv_desc,$out_summ,$shp_item,$in_curr,$culture,$crc, $inv_id]; 
    
    }
    
    public function result_pay()
    {
        // регистрационная информация (пароль #2)
        // registration info (password #2)
        $mrh_pass2 = "password_2";

        //установка текущего времени
        //current date
        $tm=getdate(time()+9*3600);
        $date="$tm[year]-$tm[mon]-$tm[mday] $tm[hours]:$tm[minutes]:$tm[seconds]";

        // чтение параметров
        // read parameters
        $out_summ = Yii::$app->request->post('OutSum'); //$_REQUEST["OutSum"];
        $inv_id = Yii::$app->request->post('InvId'); //$_REQUEST["InvId"];
        $shp_item = Yii::$app->request->post('Shp_item'); //$_REQUEST["Shp_item"];
        $crc = Yii::$app->request->post('SignatureValue'); //$_REQUEST["SignatureValue"];

        $crc = strtoupper($crc);

        $my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_item=$shp_item"));

        // проверка корректности подписи
        // check signature
        if ($my_crc !=$crc)
        {
          echo "Оплата не прошла";
          exit();
        }

        // признак успешно проведенной операции
        // success
        //echo "OK$inv_id\n";
        echo "Заказ № = $inv_id оплачен";
        // запись в файл информации о проведенной операции
        // save order info to file
        $name_file = "/check_order/order.txt";
        $f=@fopen($name_file,"a+") or
                  die("error");
        
        fputs($f,"order_num :$inv_id;Summ :$out_summ;Date :$date\n");
        fclose($f);
        $model = ManagerShop:: findOne(['id'=>$inv_id]);
        $model->pay_order = "Заказ оплачен";
        $model->save();
        return null;
    }
    
    public function success(){
        // регистрационная информация (пароль #1)
        // registration info (password #1)
        $mrh_pass1 = "password_1";

        // чтение параметров
        // read parameters
        /*
        $out_summ = $_REQUEST["OutSum"];
        $inv_id = $_REQUEST["InvId"];
        $shp_item = $_REQUEST["Shp_item"];
        $crc = $_REQUEST["SignatureValue"];
        */
        $out_summ = Yii::$app->request->post('OutSum'); //$_REQUEST["OutSum"];
        $inv_id = Yii::$app->request->post('InvId'); //$_REQUEST["InvId"];
        $shp_item = Yii::$app->request->post('Shp_item'); //$_REQUEST["Shp_item"];
        $crc = Yii::$app->request->post('SignatureValue'); //$_REQUEST["SignatureValue"];

        
        $crc = strtoupper($crc);

        $my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item"));

        // проверка корректности подписи
        // check signature
        if ($my_crc != $crc)
        {
          echo "Ошибка\n";
          
          exit();
        }

        // проверка наличия номера счета в истории операций
        // check of number of the order info in history of operations
        $f=@fopen("/check_order/order.txt","r+") or die("error");

        while(!feof($f))
        {
          $str=fgets($f);

          $str_exp = explode(";", $str);
          if ($str_exp[0]=="order_num :$inv_id")
          { 
                echo "Операция прошла успешно\n";
                echo "Operation of payment is successfully completed\n";
          }
        }
        fclose($f);
    }
    
}
