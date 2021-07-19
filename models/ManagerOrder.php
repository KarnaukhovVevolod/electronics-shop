<?php

namespace app\models;

use yii\db\ActiveRecord;

class ManagerOrder extends ActiveRecord {
    
    public static function tableName() {
        return 'manager_order_product';
    }
    
    public function attributeLabels() {
        return[
            'id'              => 'id',
            'order_number'    => 'Номер заказа',
            'name_model'      => 'Название пролукта',
            'path'            => 'Фото',
            'quantity'        => 'Кол-во',
            'price'           => 'Цена',
            'total_price'     => 'Общая цена',
            'link'            => 'Ссылка на товар',
            
        ];
    }
    
    public function rules() {
        return[
            [['id','order_number','quantity'],'integer'],
            [['name_model'],'string', 'max' => 30],
            [['path', 'link'], 'string', 'max' => 120],
            [['price','total_price',], 'string', 'max' => 15],
        ];
    }
    
        
}
