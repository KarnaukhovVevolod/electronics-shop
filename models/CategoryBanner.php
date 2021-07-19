<?php

namespace app\models;

use yii\db\ActiveRecord;

class CategoryBanner extends ActiveRecord {
    
    public static function tableName(){
        return 'category_banner';
    }
    
    public function attributeLabels() {
        return [
            'id'                 => 'id',
            'subcategory_banner' => 'Категория для баннеров',
            'page'               => 'Страница',
            'description'        => 'Описание',
        ];
    }
    
    public function rules() {
        return[
            [['subcategory_banner'], 'required'],
            [['id', 'page'], 'integer'],
            [['subcategory_banner'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 120],
        ];
    }
    
    public function getScroll(){
        return $this->hasMany(Bannerscroll::className(), ['subcategory' => 'subcategory_banner'])->andWhere(['show_banner' => 1]);
    }
    
    public function getTextban(){
        return $this->hasMany(Bannertx::className(), ['subcategory' => 'subcategory_banner'])->andWhere(['show_banner' => 1]);
    }
    
    public function getImageban(){
        return $this->hasMany(Bannerim::className(), ['subcategory' => 'subcategory_banner'])->andWhere(['show_banner' => 1]);
    }
    
}
