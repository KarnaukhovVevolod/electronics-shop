<?php

namespace app\models;

use yii\db\ActiveRecord;

class Bannerim extends ActiveRecord {
    
    public static function tableName() {
        return 'banner_image';
    }
    
    public function attributeLabels() {
        return[
            'id'               => 'id',
            'path_1'           => 'Путь для фото 1',
            'path_2'           => 'Путь для фото 2',
            'path_3'           => 'Путь для фото 3',
            'path_4'           => 'Путь для фото 4',
            'show_banner'      => 'Показать баннер',
            'page'             => 'Страница',
            'link_description' => 'Ссылка на описание товара',
            'number_page'      => 'Порядковый номер на странице',
            'subcategory'      => 'Подкатегория',
            
        ];
    }
    
    public function rules() {
        return [
          [['path_1'], 'required'],
          [['id','page', 'number_page'], 'integer'],
          [['path_1', 'path_2', 'path_3', 'path_4', 'link_description'], 'string', 'max' => 120],
          ['show_banner', 'boolean'],
          [['subcategory'], 'string', 'max' => 30],
        ];
    }
    
}
