<?php

namespace app\modules\admin;
use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';
    
    /**
     * 
     */
    
    public function init() {
        parent::init();
        $this->layout = '@app/modules/admin/views/layout/main.php';
        
    }
    
    public function behaviors() 
   {
        return[
            'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'allow' => true,
                      'roles' => ['canAdmin']
                  ],
                  
              ],
            ],
        ];
    }
    
    
}




