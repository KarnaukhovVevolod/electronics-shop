<?php


namespace app\models;

use app\models\Notebook;
use app\models\Tablet;
use app\models\Audio;
use app\models\Camera;
use app\models\Tv;
use app\models\Smartiphone;
use app\models\VideoCamera;

use yii\db\Query;
use yii\data\Pagination;

use yii\db\ActiveRecord;

class LinkProduct extends ActiveRecord{
    
    public function readProduct($url, $limit)
    {
        //debug($url);
                //die();
        $_count = explode('=&', $url);
        
        if( count($_count) > 1 )
        {
            $data_url = explode('&', $_count[0]);
            $count_url = count($data_url);
        }else
        {
            $data_url = explode('&', $url);
            $count_url = count($data_url);
        }
        //debug($count_url);
        //die();
        $product = [];
        switch ($count_url){
            case(2):
                $product = $this->Readsub_all($data_url,$limit);
                
                break;
            case(3):
                $product = $this->Readsub($data_url, $limit);
                
                break;
            case(4):
                $product = $this->Readsub_type($data_url, $limit);
                
                break;
            default :
                $product = null;
        }
        
        //debug($count_url);
        //debug($data_url);
        return $product;    
        
    }
    
    public function Readsub($data_url, $limit)
    {
        $pages = null;
        switch($data_url[1]){
            case 'notebook': 
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'notebook'])->where(['link_subcategory' => $data_url[2]])->orderBy(['id'=>SORT_DESC]);
                //$query   = Notebook::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC]);
                //$product = Notebook::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                
                break;
            case 'tablets':
                //$query   = Tablet::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC]);
                //$product = Tablet::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC])->all();
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'tablet'])->where(['link_subcategory' => $data_url[2]])->orderBy(['id'=>SORT_DESC]);
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'audio':
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'audio'])->where(['link_subcategory' => $data_url[2]])->orderBy(['id'=>SORT_DESC]);
                //$query   = Audio::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC]);
                //$product = Audio::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'camera':
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'camera'])->where(['link_subcategory' => $data_url[2]])->orderBy(['table.name_type_of_subcategory'=>'sfsd']);//->orderBy(['id'=>SORT_DESC]);
                //$query   = Camera::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC]);
                //$product = Camera::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'tv':
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'tv'])->where(['link_subcategory' => $data_url[2]])->orderBy(['id'=>SORT_DESC]);
                //$query   = Tv::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC]);
                //$product = Tv::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'smartiphone':
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'smartiphone'])->where(['link_subcategory' => $data_url[2]])->orderBy(['id'=>SORT_DESC]);
                //$query   = Smartiphone::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC]);
                //$product = Smartiphone::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'videocamera':
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'videocamera'])->where(['link_subcategory' => $data_url[2]])->orderBy(['id'=>SORT_DESC]);
                //$query   = VideoCamera::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC]);
                //$product = VideoCamera::find()->where(['link_subcategory' => $data_url[2]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            default:
                $product = null;
                break;
        }
        //$pages->forcePageParam = 2;
        //$pages
        
        //$sort_product[1] = $product;
        $sort_product = [];
        $i = 0; $j = 0; $subcategory = '';
        if($product != null)
        {
            foreach($product as $one_product){
                if($one_product['name_type_of_subcategory'] != $subcategory)
                {
                    $i++;
                    $subcategory = $one_product['name_type_of_subcategory'];
                    $j = 0;
                }
                $sort_product[$i][$j] = $one_product;
                $j++;
            }
        }
        //debug($sort_product);die();
        
        return [$sort_product, $pages];
    }
    
    //-------------------------------
    public function Readsub_type($data_url, $limit)
    {
        $pages = null;
        switch($data_url[1]){
            case 'notebook':
                
                $query = (new Query())->select(['notebook.id','notebook.path','notebook.path_2','notebook.name_type_of_subcategory','notebook.model_product','notebook.price','notebook.old_price',
                    'notebook.price_sort','notebook.discount','notebook.link_description','notebook.marketing_products','notebook.date','notebook.number_of_products'])->
                    from('notebook')->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id'=>SORT_DESC]);
                //$query   = Notebook::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC]);
                //$product = Notebook::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                
                break;
            case 'tablets':
                //$query   = Tablet::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC]);
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'tablet'])->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id'=>SORT_DESC]);
                //$product = Tablet::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'audio':
                //$query   = Audio::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC]);
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'audio'])->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id'=>SORT_DESC]);
                //$product = Audio::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'camera':
                //$query   = Camera::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC]);
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'camera'])->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id'=>SORT_DESC]);
                //$product = Camera::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'tv':
                //$query   = Tv::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC]);
                //$product = Tv::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC])->all();
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'tv'])->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id'=>SORT_DESC]);
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'smartiphone':
                //$query   = Smartiphone::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC]);
                //$product = Smartiphone::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC])->all();
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'smartiphone'])->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id'=>SORT_DESC]);
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'videocamera':
                //$query   = VideoCamera::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC]);
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'videocamera'])->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id'=>SORT_DESC]);
                //$product = VideoCamera::find()->where(['link_subcategory' => $data_url[2]])->andWhere(['link_type_of_subcategory'=>$data_url[3]])->orderBy(['id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            default:
                $product = null;
                break;
        }
        
        
        return [$product, $pages];
    }
    //-------------------------------
    
    public function Readsub_all($data_url, $limit)
    {
        $pages = null;
        switch($data_url[1]){
            case 'notebook':
                //$query   = Notebook::find()->orderBy(['name_type_of_subcategory' => 'kljl','id' => SORT_DESC]);
                $query = (new Query())->select(['notebook.id','notebook.path','notebook.path_2','notebook.name_type_of_subcategory','notebook.model_product','notebook.price','notebook.old_price',
                    'notebook.price_sort','notebook.discount','notebook.link_description','notebook.marketing_products','notebook.date','notebook.number_of_products'])->
                    from('notebook')->orderBy(['name_type_of_subcategory'=>'weer','id'=>SORT_DESC]);
                //$product = Notebook::find()->orderBy(['name_subcategory' => 'kljl','id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'tablets':
                //$query   = Tablet::find()->orderBy(['name_type_of_subcategory' => 'kljl','id' => SORT_DESC]);
                $query = (new Query())->select(['tablet.id','tablet.path','tablet.path_2','tablet.name_type_of_subcategory','tablet.model_product','tablet.price','tablet.old_price',
                    'tablet.price_sort','tablet.discount','tablet.link_description','tablet.marketing_products','tablet.date','tablet.number_of_products'])->
                    from('tablet')->orderBy(['name_type_of_subcategory'=>'weer','id'=>SORT_DESC]);
                //$product = Tablet::find()->orderBy(['name_subcategory' => 'kljl','id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                
                break;
            case 'audio':
                //$query   = Audio::find()->orderBy(['name_type_of_subcategory'=>'jty','id' => SORT_DESC]);
                $query = (new Query())->select(['audio.id','audio.path','audio.path_2','audio.name_type_of_subcategory','audio.model_product','audio.price','audio.old_price',
                    'audio.price_sort','audio.discount','audio.link_description','audio.marketing_products','audio.date','audio.number_of_products'])->
                    from('audio')->orderBy(['name_type_of_subcategory'=>'weer','id'=>SORT_DESC]);
                //$product = Audio::find()->orderBy(['name_subcategory'=>'jty','id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                //$query_1 = new Query();
                /*
                $product = (new Query())->select(['audio.id','audio.path','audio.path_2','audio.name_type_of_subcategory','audio.model_product','audio.price','audio.old_price',
                    'audio.price_sort','audio.discount','audio.link_description','audio.marketing_products','audio.date'])->
                        from('audio')->orderBy(['name_type_of_subcategory'=>'weer','id'=>SORT_DESC])->offset($pages->offset)->limit($pages->limit)
                        ->all();*/
                //debug($product);
                //die();
                break;
            case 'camera': 
                //$query   = Camera::find()->orderBy(['name_type_of_subcategory'=>'jty','id' => SORT_DESC]);
                $query = (new Query())->select(['camera.id','camera.path','camera.path_2','camera.name_type_of_subcategory','camera.model_product','camera.price','camera.old_price',
                    'camera.price_sort','camera.discount','camera.link_description','camera.marketing_products','camera.date','camera.number_of_products'])->
                    from('camera')->orderBy(['name_type_of_subcategory'=>'weer','id'=>SORT_DESC]);
                //$product = Camera::find()->orderBy(['name_subcategory'=>'jty','id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'tv':
                //$query   = Tv::find()->orderBy(['name_type_of_subcategory'=>'jty','id' => SORT_DESC]);
                $query = (new Query())->select(['tv.id','tv.path','tv.path_2','tv.name_type_of_subcategory','tv.model_product','tv.price','tv.old_price',
                    'tv.price_sort','tv.discount','tv.link_description','tv.marketing_products','tv.date','tv.number_of_products'])->
                    from('tv')->orderBy(['name_type_of_subcategory'=>'weer','id'=>SORT_DESC]);
                //$product = Tv::find()->orderBy(['name_subcategory'=>'jty','id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'smartiphone':
                //$query   = Smartiphone::find()->orderBy(['name_type_of_subcategory'=>'jty','id' => SORT_DESC]); 
                $query = (new Query())->select(['smartiphone.id','smartiphone.path','smartiphone.path_2','smartiphone.name_type_of_subcategory','smartiphone.model_product','smartiphone.price','smartiphone.old_price',
                    'smartiphone.price_sort','smartiphone.discount','smartiphone.link_description','smartiphone.marketing_products','smartiphone.date','smartiphone.number_of_products'])->
                    from('smartiphone')->orderBy(['name_type_of_subcategory'=>'weer','id'=>SORT_DESC]);
                //$product = Smartiphone::find()->orderBy(['name_subcategory'=>'jty','id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            case 'videocamera':
                //$query   = VideoCamera::find()->orderBy(['name_type_of_subcategory'=>'jty','id' => SORT_DESC]);
                $query = (new Query())->select(['table.id','table.path','table.path_2','table.name_type_of_subcategory','table.model_product','table.price','table.old_price',
                    'table.price_sort','table.discount','table.link_description','table.marketing_products','table.date','table.number_of_products'])->
                    from(['table'=>'videocamera'])->orderBy(['name_type_of_subcategory'=>'weer','id'=>SORT_DESC]);
                //$product = VideoCamera::find()->orderBy(['name_subcategory'=>'jty','id' => SORT_DESC])->all();
                $pages   = new Pagination(['totalCount' => $query->count(), 'pageSize' => $limit]);
                $product = $query->offset($pages->offset)->limit($pages->limit)->all();
                break;
            default:
                $product = null;
                break;
        }

        //debug($product);
        $sort_product = [];
        $i = 0; $j = 0; $subcategory = '';
        if($product != null)
        {
            foreach($product as $one_product){
                if($one_product['name_type_of_subcategory'] != $subcategory)
                {
                    $i++;
                    $subcategory = $one_product['name_type_of_subcategory'];
                    $j = 0;
                }
                $sort_product[$i][$j] = $one_product;
                $j++;
            }
        }
        
        //debug($sort_product);
        //die();
        
        
        return [$sort_product, $pages];
    }
    
    
    
}
