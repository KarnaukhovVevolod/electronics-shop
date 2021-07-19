<?php

namespace app\models;
use yii\db\ActiveRecord;

class AdressUser extends ActiveRecord {
    
    public static function tableName() {
        return 'adress_user';
        
    }
    
    public function attributeLabels() {
        return[
            'id'         => 'id',
            'login'      => 'Логин',
            'name'       => 'Имя',
            'surname'    => 'Фамилия',
            'patronymic' => 'Отчество',
            'email'     => 'E-mail',
            'mobile'     => 'Телефон',
            'company'    => 'Компания',
            
            'date'       => 'Дата',
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
            ['id','integer'],
            [['login', 'name', 'surname', 'patronymic',
                'country', 'city'], 'string', 'max'=> 30],
            [['email','region','room'], 'string', 'max'=>50],
            [['mobile','flat'], 'string', 'max' => 20],
            [['company'], 'string', 'max' => 250],
            [['date'], 'string', 'min' => 2],
            [['dop_info'],'string'],
            [['street'], 'string', 'max' => 100],
            [['post_code'], 'string', 'max' => 30],
            [['village_locality'], 'string', 'max' => 100],
            
        ];
    }
    
    
    
}



?>