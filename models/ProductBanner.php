<?php


namespace app\models;
use yii\db\ActiveRecord;

class ProductBanner extends ActiveRecord {
    
    public static function tableName() {
        return 'banner_product';
    } 
    
    public function attributeLabels() {
        return[
            'id'               => 'id',
            'path'             => 'Путь для фото',
            'show_banner'      => 'Показать баннер',
            'page'             => 'страница',
            'subcategory'      => 'Подкатегория продукта',
            'link_description' => 'Ссылка на описание продукта',
            
        ];
    }
    
    public function rules() {
        return [
            [['id', 'page'], 'integer'],
            [['path', 'link_description'],'string', 'max' => 120],
            ['subcategory', 'string', 'max' => 30],
            ['show_banner', 'boolean'],
            ['page','required'],
        ];
    }
    
    public function readBanner($page){
        $product_banner = null;
        //$product_banner = ProductBanner::find()->where(['show_banner' => 1,'page' => $page])->all();
        $product_banner = (new \yii\db\Query)->from('banner_product')->where(['show_banner' => 1,'page' => $page])->all();
        return $product_banner;
        
    }
        
    
}
