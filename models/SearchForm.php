<?php

namespace app\models;

use yii\base\Model;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class SearchForm extends Model {
    
    public $category;
    public $search;
    
    public function attributeLabels() {
        return [
            'category' => 'Категория',
            'search'   => 'Поиск',
        ];
    }
    
    public function rules() {
        return[
            ['search','trim'],
            [['category','search'],'string'],
            [['search'],'required'],
        ];
    }
    
    public function readCategory(){
        
        $query_1 = new Query();
        $all_category = $query_1->from('category')
                //->select('category','category_english')
                ->select(['category','category_english'])
                ->groupBy('category')
                ->all();
        //debug($all_category);
        //die();
        $all__data = ArrayHelper::map($all_category,'category_english','category');
        //debug($all__data);
        //die();
        return $all__data;
        
    }
    
    
}
