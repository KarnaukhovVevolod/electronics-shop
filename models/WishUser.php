<?php

namespace app\models;

use yii\db\ActiveRecord;

class WishUser extends ActiveRecord {
    
    
    public static function tableName() {
        return 'wish_user';
    }
    
    public function attributeLabels() {
        return[
            'id'         => 'id',
            'login'      => 'Логин',
            'path'       => 'Фото',
            'name_model' => 'Название продукта',
            'price'      => 'Цена',
            'price_old'  => 'старая цена',
            'link'       => 'Cсылка на продукт',
            'date'       => 'Дата',
            'number_of_product' => 'Макс. кол-во в наличии'
        ];
    }
    
    public function rules() {
        return[
            ['id','integer'],
            [['login', 'name_model'], 'string', 'max' => 30],
            [['path', 'link'], 'string', 'max' => 120],
            [['price', 'price_old'], 'string', 'max' => 15],
            [['date'], 'string', 'min' => 2],
            [['number_of_product'], 'string', 'max' => 30]
             
        ];
    }
    
    
}
