<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets\category;

use yii\base\Widget;
use app\models\Category;
use yii\db\Query;

class CategoryWidget extends Widget {
    //put your code here
    public $mobile;
    public function init() {
        parent::init();
    }
    
    public function run(){
        //$category = Category::find()->orderBy([/*'subcategory'=>'sub',*/'category'=>'categ'])->all();
        $query_1 = new Query();
        $category = $query_1->from('category')
                ->orderBy(['category'=>'categ'])
                ->addOrderBy(['subcategory'=>'sdff'])
                ->all();
        //debug($category1);
        //debug($category);
        //die();
        
        //debug($category);
        $c = 'sd';
        $category_array = [];
        $i = 0;$j = 0;
        $sub = 're';
        $sub_categ = [];
        $s = 0;
        //debug($category[0]);
        //echo 'конец катег';
        foreach($category as $cat)
        {
            $j++;
            if($cat['category'] != $c ){
                $i++;
                $c = $cat['category']; 
                $sub_categ[$i][$s] = $c;
            }
            
            if($cat['subcategory'] != $sub)
            {
                $sub = $cat['subcategory'];
                $s++;
                $sub_categ[$i][$s] = $sub;
            }
           
            
            $category_array[$i]['category'] = $c;
            $category_array[$i]['link_category'] = $cat['link_category'];
            $category_array[$i][$s]['subcategory'] = $sub;
            $category_array[$i][$s]['link_subcategory'] = $cat['link_subcategory'];
            $category_array[$i][$s][$j]['type_of_subcategory'] = $cat['type_of_subcategory']; 
            //$category_array[$i][$s][$j]['link_category'] = $cat['link_category']; 
            //$category_array[$i][$s][$j]['link_subcategory'] = $cat['link_subcategory']; 
            $category_array[$i][$s][$j]['link_type_subcategory'] = $cat['link_type_subcategory']; 
            
            //echo $cat['id'];
            
            //debug($c);
            //echo $j;
        }
       /*
        debug($category_array);
        echo "<br><br> new<br>";
        foreach($category_array as $array){
            echo 'array<br>';
            debug($array['category']);
            //debug($array);
            echo'array <br>';
            foreach($array as $arr){
                
                if(is_array($arr)){
                   // echo 'subchik<br>';
                    //debug($arr['subcategory']);
                   / echo 'subchik<br>';
                    
                    foreach($arr as $ar){
                        if (is_array($ar))
                        {
                            //debug($ar);
                        }
                    }
                }
                
            }
        }
        */
       // debug($category_array);
        
        /*
        debug($category_array);
        debug($category_array[1]);
        debug($category_array[1][1]);
        debug($category_array[1][1]['subcategory']);
        */
        
        //debug($category_array[1][1][1]['id']);
        //debug($category_array);
        
        //die();
        if($this->mobile == 1){
            return $this->render('mobilecategory',compact('category_array'));
        }
        return $this->render('category',compact('category_array'));
        
    }


    
}
