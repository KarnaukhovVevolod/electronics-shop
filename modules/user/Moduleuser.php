<?php


namespace app\modules\user;

use yii\filters\AccessControl;
use yii\base\Module;

class Moduleuser extends Module {
    
    
    public $controllerNamespace = 'app\modules\user\controllers';
    
    
    public function init() {
        parent::init();
        
    }
    
    public function behaviors() 
    {
        return[
            'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'allow' => true,
                      'roles' => ['canUser'],
                  ],
                  
              ],
            ],
        ];
    }
    
    
    
}
