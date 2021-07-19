<?php

namespace app\widgets\search;

use yii\base\Widget;
use app\models\SearchForm;

class SearchWidget extends Widget {
    //put your code here
    public $category_word;
    public $search_word;
    
    public function init() {
        parent::init();
    }
    
    public function run() {
        
        $search_form = new SearchForm();
        $category = $search_form->readCategory();
        $category_word = $this->category_word;
        $search_word = $this->search_word;
        
        //die();
        return $this->render('search', compact('search_form','category','category_word','search_word'));
        
    }
    
    
}
