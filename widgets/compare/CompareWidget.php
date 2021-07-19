<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets\compare;

use yii\base\Widget;
use Yii;
use app\models\Cart;



class CompareWidget extends Widget {
    public $category;
    
    public function init(){
        parent::init();
    }
    
    public function run() {
        $data_category = $this->category;
        $session = Yii::$app->session;
        if($session->has('compare_session'))
        {
            $data_compare = $session->get('compare_session');
            //debug($data_compare);
            $cart = new Cart();
            $result_data = $cart->SessionCompareRead($data_compare);
            //debug($result_data);
            //die();
            return $this->render('compare', compact('result_data'));
        }
        else 
        {
            $result_data = null;
            return $this->render('compare', compact('result_data'));
            
        }
 
        
        
        return $this->render('compare');
    }
    
    
}
