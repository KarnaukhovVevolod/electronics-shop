<?php

namespace app\models;

use yii\db\ActiveRecord;

class HistoryUser extends ActiveRecord {
    
    public static function tableName() {
        return 'history_user_product';
        
    }
    
    public function attributeLabels() {
        return[
            'id'              => 'id',
            'login'           => 'Логин',
            'path'            => 'Фото',
            'name_model'      => 'Название продукта',
            'quantity'        => 'Кол-во',
            'price'           => 'Цена',
            'total_price'     => 'Общая цена',
            'order_number'    => 'Номер заказа',
            
            'total_price_all' => 'Общая цена заказа',
            'date_order'      => 'Дата заказа',
            
            
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
            
            'pay_order'        => 'Оплата заказа',
            'link'             => 'Ссылка на товар',
            'telephone'        => 'Телефон',
            'email'            => 'E-mail',
            
        ];
    }
    
    public function rules() {
        return[
            [['id', 'quantity', 'order_number'],'integer'],
            [['login', 'name_model'], 'string', 'max'=>30],
            [['path'], 'string', 'max'=>120],
            [['price', 'total_price', 'total_price_all'], 'string', 'max' => 15],
            [['date_order'], 'string', 'min' => 2],
            
            [['post_code','type_delivery','status_order','city'],'string','max'=>30],
            [['point_delivery','village_locality','street'],'string','max'=>100],
            [['region','room','email'],'string', 'max' => 50],
            [['flat','telephone'],'string','max'=>20],
            [['pay_order'],'string', 'max'=>15],
            [['link'],'string', 'max'=>120],
            
        ];
    }
    
}
