<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
/**
 * Description of Notebook
 *
 * @author 222
 */
class VideoCamera extends ActiveRecord{
    
    public static function tableName() {
        return 'videocamera' ;
    }
    
    public function attributeLabels() {
        return[
            'id'                 => 'id',
            'path'               => 'Путь для фото 1',
            'path_2'             => 'Путь для фото 2',
            'path_3'             => 'Путь для фото 3',
            'path_4'             => 'Путь для фото 4',
            'path_5'             => 'Путь для фото 5',
            'path_6'             => 'Путь для фото 6',
            'path_7'             => 'Путь для фото 7',
            'path_8'             => 'Путь для фото 8',
            'name_type_of_subcategory'   => 'Название вида подкатегории',
            'category_english'   => 'Название категории (по английски)',
            'model_product'      => 'Модель продукта',
            'price'              => 'Цена',
            'old_price'          => 'Цена старое',
            'price_sort'         => 'Цена сортировка',
            'discount'           => 'скидка',
            'link_description'   => 'Ссылка на описание',
            'description'        => 'Описание продукта',
            'marketing_products' => 'Маркетинг продукта',
            'like_product'       => 'Понравилась продукция',
            'number_purchases'   => 'Кол-во покупок',
            'manufacturer'       => 'Производитель',
            'video_recording_speed' => 'Скорость видеозаписи',
            'type_camera'        => 'Тип камеры',
            'date'               => 'Дата',
            'link_subcategory'   => 'Ccылка на подкатегорию',
            'link_type_of_subcategory' => 'Cсылка на вид подкатегории',
            'number_of_products' => 'Количество продукта',
        ];
    }
    
    public function rules() {
        return [
            
            [['id','like_product','price_sort','number_purchases','number_of_products'], 'integer'],
            [['path', 'link_description', 'path_2'], 'string','max' => 120],
            [['path_3','path_4','path_5','path_6','path_7','path_8'],'string','max' => 120],
            [['name_type_of_subcategory', 'category_english', 'model_product', 'manufacturer',
                'link_subcategory','link_type_of_subcategory'], 'string', 'max' => 30],
            [['model_product'],'string','max' => 100],
            [['price', 'old_price','type_camera'], 'string', 'max' => 15],
            ['discount','string', 'max' => 5],
            [['marketing_products','video_recording_speed'], 'string', 'max' => 20],
            [['date'], 'date', 'format' => 'yyyy-MM-dd'],
            ['description', 'string'],
            [['path', 'name_type_of_subcategory','price_sort', 'model_product'], 'required'],
            
        ];
    }
    
    public function getComment(){
        return $this->hasMany(Comment:: className(), ['id_product' => 'id'])->andWhere(['category'=>'videocamera'])->orderBy(['id'=>SORT_DESC]);
    }
    
    //читаем все продукты для категории ноутбука
    
    public function category_videocamera_all()
    {
        $data = Category::find()->orderBy(['category'=>'ewrwer'])->with('videocamera')->all();
        $category_data = [];
        $category = '';
        $i = 0;$j = 0;
        foreach($data as $data_category)
        {
            if($data_category['category'] != $category)
            { 
                $i++;
                $category = $data_category['category'];
            }
            
            $category_data[$i][$j] = $data_category; 
            
            $j++;
        }
        
        //debug($category_data);
        
        return $category_data;
    }
    
    //выбираем все данные из таблицы с ноутбуками
    public function Videocamera_filt_all(){
        //$videocamera = VideoCamera::find()->all();
        $videocamera = (new \yii\db\Query())->from('videocamera')->all();
        $manufacturer          = ArrayHelper::map($videocamera, 'manufacturer', 'manufacturer');
        $video_recording_speed = ArrayHelper::map($videocamera, 'video_recording_speed', 'video_recording_speed');
        $name_subcategory      = ArrayHelper::map($videocamera, 'name_type_of_subcategory', 'name_type_of_subcategory');
        
        $result = [
                'Выберите производителя...'     => $manufacturer,
                'Выберите скорость записи...'   => $video_recording_speed,
                
                'Выберите раздел подкатегории...'      => $name_subcategory,
                
            ];
        
        //debug($result);
        //die();
        return $result;
    }
    
}
