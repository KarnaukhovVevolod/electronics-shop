<?php

namespace app\models;

use yii\db\ActiveRecord;

class Bannertx extends ActiveRecord {
    
    public static function tableName() {
       return 'banner_text';
    }
    
    public function attributeLabels() {
         return[
            'id'               => 'id',
            'path'             => 'Путь для фото',
            'text_h2'          => 'Текс для заголовка',
            'text_span'        => 'Текст подзаголовка',
            'text_p'           => 'Текст под подзаголовком ',
            'class'            => 'Имя класса',
            'show_banner'      => 'Показать баннер',
            'page'             => 'Страница',
            'link_description' => 'Ссылка на описание ',
            'number_page'      => 'Порядковый номер на странице',
            'subcategory'      => 'Подкатегория',
        ];
    }
    
    public function rules() {
        return[
            [['path'], 'required'],
            [['id', 'page', 'number_page'], 'integer'],
            [['path', 'link_description'], 'string', 'max' => 120],
            [['text_h2', 'text_span', 'text_p'], 'string', 'max' => 40],
            [['class'], 'string', 'max' => 10],
            ['show_banner', 'boolean'],
            [['subcategory'], 'string', 'max' => 30],
            
        ];
    }
    
    
}
