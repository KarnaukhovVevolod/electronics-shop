<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Comment extends ActiveRecord {
    
    public static function tableName() {
        return 'comment';
    }
    
    


    public function attributeLabels() {
        return[
            'id' => 'id',
            'date' => 'Дата',
            'name' => 'Имя и Фамилия',
            'text' => 'Отзыв',
            'star' => 'Кол-во звезд',
            'id_product' => 'id_Продукта',
            'category' => 'Категория',
            'login'    => 'Логин',
        ];
    }
    
    public function rules(){
        return[
            [['id', 'star', 'id_product'], 'integer'],
            [['date'], 'date', 'format' => 'yyyy-MM-dd'],
            [['name'],'string', 'max' => 35],
            [['category','login'], 'string', 'max' => 30],
            ['text', 'string'],
            
        ];
    }
    
    public function save_comment($data)
    {
        $database = new Comment();
        $database->date = $data[3];
        $database->name = $data[0] ;
        $database->text = $data[1];
        $database->star = $data[2];
        $database->id_product = $data[4];
        $database->category = $data[5];
        $login = Yii::$app->user->identity['username'];
        $database->login = $login;
        $database->save();
        
    }
    
    
    
}
