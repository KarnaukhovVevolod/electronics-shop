<?php

namespace app\models;

use yii\db\ActiveRecord; 

class Bannerscroll extends ActiveRecord {
    
    public static function tableName() {
        return 'scrolling_banner';
    }
    
    public function attributeLabels() {
        return[
            'id'             => 'id',
            'path_1'         => 'Путь для фото 1',
            'path_2'         => 'Путь для фото 2',
            'path_3'         => 'Путь для фото 3',
            'text_1'         => 'Текст 1 для фото 1',
            'text_2'         => 'Текст 2 для фото 1',
            'text_3'         => 'Текст 3 для фото 1',
            'text_4'         => 'Текст 4 для фото 1',
            'text_5'         => 'Текст 1 для фото 2',
            'text_6'         => 'Текст 2 для фото 2',
            'text_7'         => 'Текст 3 для фото 2',
            'text_8'         => 'Текст 4 для фото 2',
            'text_9'         => 'Текст 1 для фото 3',
            'text_10'        => 'Текст 2 для фото 3',
            'text_11'        => 'Текст 3 для фото 3',
            'text_12'        => 'Текст 4 для фото 3',
            'link_product_1' => 'Ссылка на продукт 1',
            'link_product_2' => 'Ссылка на продукт 2',
            'link_product_3' => 'Ссылка на продукт 3',
            'page'           => 'Страница',
            'show_banner'    => 'Показать баннер',
            'subcategory'    => 'Подкатегория',
            
        ];
    }
    
    public function rules() {
        return[
            
            [['id', 'page'], 'integer'],
            
            [['path_1', 'path_2', 'path_3', 'link_product_1', 'link_product_2', 'link_product_3'], 'string', 'max' => 120],    
            [['text_1', 'text_2', 'text_3', 'text_4', 'text_5','text_6', 'text_7', 'text_8', 'text_9', 'text_10','text_11', 'text_12'], 'string', 'max' => 110],  
            ['show_banner', 'boolean'],
            [['subcategory'], 'string', 'max'=> 30],
            [['path_1'], 'required'],
        ];
    }
    
    
}
