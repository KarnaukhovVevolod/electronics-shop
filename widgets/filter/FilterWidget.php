<?php

namespace app\widgets\filter;

use Yii;
use yii\base\Widget;
//use app\models\Filters;
use app\models\FiltersForm;
use app\models\Notebook;
use app\models\Tablet;
use app\models\Audio;
use app\models\Tv;
use app\models\Smartiphone;
use app\models\VideoCamera;
use app\models\Camera;


class FilterWidget extends Widget {
    
    public function init() {
        parent::init();
    }
    
    public function run(){
        
        $filter = new FiltersForm();
        
        $url = Yii::$app->request->url;
        $data_category = explode('&', $url);
        //debug($data_category);
        //die();
        $data_filt_all=[];
        
        $categor = 0;
        if(isset($data_category[1]))
        {
            $categor = $data_category[1];
            switch ($data_category[1])
            {
                case 'notebook':
                    //ноутбуки
                    $notebook = new Notebook();
                    $data_filt_all = $notebook->Notebook_filt_all();
                    break;
                case 'tablets':
                    $tablets = new Tablet();
                    $data_filt_all = $tablets->Tablet_filt_all();
                    break;
                case 'audio':
                    $audio = new Audio();
                    $data_filt_all = $audio->Audio_filt_all();
                    break;
                case 'tv':
                    $tv = new Tv();
                    $data_filt_all = $tv->Tv_filt_all();
                    break;
                case 'smartiphone':
                    $smartiphone = new Smartiphone();
                    $data_filt_all = $smartiphone->Smartiphone_filt_all();
                    break;
                case 'videocamera':
                    $videocamera = new VideoCamera();
                    $data_filt_all = $videocamera->Videocamera_filt_all();
                    break;
                case 'camera':
                    $camera = new Camera();
                    $data_filt_all = $camera->Camera_filt_all();
                    break;
             }
        }
        
        //debug($notebook_all);
        //debug($data_filt_all);
        //die();
        return $this->render('filt_notebook', compact('filter','data_filt_all','categor','url'));                  
    }
}
