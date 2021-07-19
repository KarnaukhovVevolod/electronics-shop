<?php

namespace app\models;

use Yii;
use yii\base\Model;

class FiltersForm extends Model {
    
    //notebook
    public $price_min;
    public $price_max;
    
    public $category;
    
    public $name_type_of_subcategory;
    public $manufacturer;
    public $amount_ram;
    public $number_core;
    public $total_memory;
    public $screen_diagonal;
    
    //tablets
    public $number_sim;
    public $internal_memory;
    
    //audio
    public $power;
    
    //tv
    public $screen_resolution;
 
    //smartiphone
    public $camera_resolution;
    public $color;
    public $series;
    
    //videorecording
    public $video_recording_speed;
    
    //camera
    public $resolution_matrix;
    
    //end notebook
    
    public function attributeLabels() {
        return [
            'price_min'       => 'Цена минимальная',
            'price_max'       => 'Цена максимальная',
            'name_type_of_subcategory'=> 'Тип подкатегория',
            'manufacturer'    => 'Производитель',
            'amount_ram'      => 'Объём оперативной памяти',
            'number_core'     => 'Кол-во ядер процессора',
            'total_memory'    => 'Общий объём памяти',
            'screen_diagonal' => 'Диагональ экрана',
            'category'        => 'Категории',
            
            'number_sim'      => 'Количество симкарт',
            'internal_memory' => 'Встроенная память',
            
            'power'           => 'Мощность во фронтальном направлении',
            
            'screen_resolution' => 'Разрешение экрана',
            
            'video_recording_speed' => 'Скорость записи видео',
            
        ];
    }
    
    public function rules() {
        return[
            [['price_min', 'price_max'], 'integer'],
            [['manufacturer','amount_ram','number_core',
                'total_memory', 'screen_diagonal',
                'category','name_type_of_subcategory',
                
                'number_sim',
                'internal_memory',
                
                'power',
                'screen_resolution',
                
                'video_recording_speed',
                
                ], 'string', 'max' => 200],
        ];
    }
    
    
    
}
