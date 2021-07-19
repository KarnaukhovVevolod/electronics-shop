<?php

namespace app\models;

use yii\db\ActiveRecord;

class Usershop extends ActiveRecord {
    //put your code here
    
    public static function tableName() {
        return 'user_shop';
    }
    
    public function attributeLabels() {
        return[
            'id'         => 'id',
            'first_name' => 'Имя',
            'last_name'  => 'Фамилия',
            'email'      => 'E-mail',
            'login'      => 'Логин',
            'password'   => 'Пароль',
            'date'       => 'Дата',
            'block'      => 'Блокировка',
        ];
    }
    
    public function rules() {
        return[
            
            ['id', 'integer'],
            
            [['first_name','last_name','login'], 'string', 'max' => 30],
            [['email', 'password'], 'string', 'max'=> 50],
            
            [['date'], 'string', 'min'=> 2],
            [['block'], 'boolean'],
            [['login','password','first_name','last_name','email'], 'required'],
        ];
    }
    
    
    
}
