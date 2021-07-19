<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;

class Image extends ActiveRecord {
    //put your code here
    
    public static function tableName() {
        return 'image';
    }
    
    public function attributeLabels() {
        return[
            'id'       => 'id',
            'path'     => 'Путь для фото',
            'comment'  => 'Комментарий для фото',
            'category' => 'Категория для фото',
        ];
    }
    
    public function rules() {
        return [
            ['id','integer'],
            [['path','comment'], 'string', 'max' => 120],  
            [['category'], 'string', 'max' => 30],
            ['path','unique'],
            
        ];  
    }
    
    public function unlink_image($path){
        
        $path_del = '../web/'.$path['path'];
        //debug($path_del);die();
        if(file_exists($path_del))
        {
            unlink($path_del);
        }
        
    }
    
    
}
