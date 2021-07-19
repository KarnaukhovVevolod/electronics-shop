<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\base\Model;
/**
 * Description of SeoCategory
 *
 * @author Seva
 */
//class SeoCategory extends ActiveRecord{
class SeoCategory extends Model{
    //put your code here
    /*
    public static function tableName() {
        return 'seo_search_category';
    }
    */
    public $id;
    public $teg_title;
    public $teg_description;
    public $teg_keywords;
    public $my_comment;
    
    public function attributeLabels() {
        return[
            'teg_description' => 'Тег description'
        ];
    }
    public function rules() {
        return[
            [['id','teg_title','teg_description','teg_keywords','my_comment'], 'required'],
            [['teg_description'],'string','max'=>120],
            [['teg_keywords','my_comment'],'string'],
            ['id','integer'],
            
        ];
    }
    
    
}
