<?php

namespace app\models;

use app\models\Notebook;
use app\models\Tablet;
use app\models\Audio;
use app\models\Smartiphone;
use app\models\Tv;
use app\models\VideoCamera;

use app\models\Bannerim;
use yii\db\ActiveRecord;

class ModelDetails extends ActiveRecord {
    
    public function ProductDetails($data_url)
    {
        $product = null;
        $data_category = explode('&', $data_url);
        
        //debug($data_category);
        //die();
        switch($data_category[1]){
            case 'notebook':
                //$product_one = Notebook::find()->asArray()->where(['id' => $data_category[2]])->with('comment')->one();
                
                $comment = (new \yii\db\Query())->from('comment')
                    ->where(['comment.id_product'=>$data_category[2]])
                    ->andWhere(['comment.category'=>'notebook'])
                    ->orderBy(['comment.id'=>SORT_DESC])
                    ->all();
                
                //experiment 1
                /*
                $product_one2 = (new \yii\db\Query())->from(['n'=>'notebook'])
                    ->where(['n.id'=>$data_category[2]])
                    ->leftJoin('notebook','notebook.type_notebook=n.type_notebook')
                    ->all();
                
                debug($product_one2);*/
                $query02 = (new \yii\db\Query())
                //notebook
                    ->select(['notebook.*'])
                /*        
                ->select(['notebook.id','notebook.path','notebook.path_2','notebook.path_3','notebook.path_4','notebook.path_5','notebook.path_6','notebook.path_7','notebook.path_8',
                    'notebook.name_type_of_subcategory','notebook.category_english','notebook.model_product','notebook.price','notebook.old_price',
                    'notebook.price_sort','notebook.discount','notebook.link_description','notebook.description','notebook.marketing_products','notebook.amount_ram','notebook.like_product',
                    'notebook.number_purchases','notebook.manufacturer','notebook.number_core','notebook.total_memory','notebook.screen_diagonal','notebook.type_notebook','notebook.date',
                    'notebook.link_subcategory','notebook.link_type_of_subcategory','notebook.number_of_products'])
                */
                    ->from('notebook')
                    ->where(['notebook.id'=>$data_category[2]]);
                
                $query03 = (new \yii\db\Query())
                //notebook
                /*        
                ->select(['notebook.id','notebook.path','notebook.path_2','notebook.path_3','notebook.path_4','notebook.path_5','notebook.path_6','notebook.path_7','notebook.path_8',
                    'notebook.name_type_of_subcategory','notebook.category_english','notebook.model_product','notebook.price','notebook.old_price',
                    'notebook.price_sort','notebook.discount','notebook.link_description','notebook.description','notebook.marketing_products','notebook.amount_ram','notebook.like_product',
                    'notebook.number_purchases','notebook.manufacturer','notebook.number_core','notebook.total_memory','notebook.screen_diagonal','notebook.type_notebook','notebook.date',
                    'notebook.link_subcategory','notebook.link_type_of_subcategory','notebook.number_of_products'])
                */
                    ->select(['notebook.*'])
                /*
                ->addSelect(['n.id','n.path','n.path_2','n.path_3','n.path_4','n.path_5','n.path_6','n.path_7','n.path_8',
                    'n.name_type_of_subcategory','n.category_english','n.model_product','n.price','n.old_price',
                    'n.price_sort','n.discount','n.link_description','n.description','n.marketing_products','n.amount_ram','n.like_product',
                    'n.number_purchases','n.manufacturer','n.number_core','n.total_memory','n.screen_diagonal','n.type_notebook','n.date',
                    'n.link_subcategory','n.link_type_of_subcategory','n.number_of_products'])  
                 * 
                 */  
                /*
                ->select(['id','path','path_2','path_3','path_4','path_5','n.path_6','path_7','path_8',
                    'name_type_of_subcategory','category_english','model_product','price','old_price',
                    'price_sort','discount','link_description','description','marketing_products','amount_ram','like_product',
                    'number_purchases','manufacturer','number_core','total_memory','screen_diagonal','type_notebook','date',
                    'link_subcategory','link_type_of_subcategory','number_of_products'])
                        */
                    ->from(['n'=>'notebook'])
                    ->where(['n.id'=>$data_category[2]])
                    ->andWhere(['not',['n.type_notebook'=>NULL]])
                    ->join('LEFT JOIN','notebook','notebook.type_notebook=n.type_notebook');
                $query04 = (new \yii\db\Query())
                        ->select(['notebook.*'])
                        ->from(['n'=>'notebook'])
                        ->where(['n.id'=>$data_category[2]])
                        ->join('LEFT JOIN','notebook','notebook.manufacturer=n.manufacturer');
                
                //$product[0]['dop'] = Notebook::find()->asArray()->where(['manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                
                $query02->union($query03);
                $query02->union($query04);
                
                
                $quer = new \yii\db\Query();
                $data_1 = $quer
                /*        
                ->select(['id','path','path_2','path_3','path_4','path_5','path_6','path_7','path_8',
                    'name_type_of_subcategory','category_english','model_product','price','old_price',
                    'price_sort','discount','link_description','description','marketing_products','amount_ram','like_product',
                    'number_purchases','manufacturer','number_core','total_memory','screen_diagonal','type_notebook','date',
                    'link_subcategory','link_type_of_subcategory','number_of_products'])
                        */
                ->from($query02)->all();
                
                //debug($data_1);
                //--===== распределяем массив по типу ноутбука и по производителю =====--\\
                $start_type = $data_1[0]['type_notebook']; //определяем тип у первого запроса
                $start_manufacturer = $data_1[0]['manufacturer'];
                $count_read_data = count($data_1);
                $dop_product = [];$type_product = [];
                $product_one = $data_1[0];
                unset($data_1[0]);
                if( $count_read_data > 1 )
                {
                    if($start_type != null){
                        
                        foreach ($data_1 as $one_data){
                            if($one_data['type_notebook'] == $start_type)
                            {
                                array_push($type_product, $one_data);
                            }
                            if($one_data['manufacturer'] == $start_manufacturer){
                                array_push($dop_product, $one_data);
                            }
                        }
                        
                    }
                    else{
                        $dop_product = $data_1;
                        
                    }
                    
                }
                
                $product_one['comment'] = $comment;
                //die();
                
                //experiment 1 end
                
                $count_product = count($type_product);
                //if($product_one[0]['type_notebook']!= null){
                if( $count_product > 0 ){
                    //$product_also = Notebook::find()->where(['type_notebook' => $product_one['type_notebook']])->andWhere(['!=','id',$data_category[2]])->all();
                    //unset($data_1[0]);
                    $product[0] = $product_one;
                    $product_also = $type_product;
                    
                    $i = 1;
                    $array_parameter[1][1] = $product_one['amount_ram'];
                    $array_parameter[2][1] = $product_one['number_core'];
                    $array_parameter[3][1] = $product_one['total_memory'];
                    $array_parameter[4][1] = $product_one['screen_diagonal'];
                    $i_1 = 2; $i_2 = 2; $i_3 = 2; $i_4  = 2;
                    
                    foreach($product_also as $products)
                    {
                        /*amount_ram*/
                        if(!in_array($products['amount_ram'], $array_parameter[1]))
                        {
                            $product['filter']['Оперативная память'][$i_1]['result']   = $products['amount_ram'];
                            $product['filter']['Оперативная память'][$i_1]['price'] = $products['price'];
                            $product['filter']['Оперативная память'][$i_1]['link']  = $products['link_description'];
                            $array_parameter[1][$i_1] = $products['amount_ram'];
                            $i_1++;
                        }
                        /*number_core*/
                        if(!in_array($products['number_core'], $array_parameter[2]))
                        {
                            $product['filter']['Кол-во ядер'][$i_2]['result']   = $products['number_core'];
                            $product['filter']['Кол-во ядер'][$i_2]['price'] = $products['price'];
                            $product['filter']['Кол-во ядер'][$i_2]['link']  = $products['link_description'];
                            $array_parameter[2][$i_2] = $products['number_core'];
                            $i_2++;
                        }
                        /*total_memory*/
                        if(!in_array($products['total_memory'], $array_parameter[3]))
                        {
                            $product['filter']['Общий объём памяти'][$i_3]['result']   = $products['total_memory'];
                            $product['filter']['Общий объём памяти'][$i_3]['price'] = $products['price'];
                            $product['filter']['Общий объём памяти'][$i_3]['link']  = $products['link_description'];
                            $array_parameter[3][$i_3] = $products['total_memory'];
                            $i_3++;
                        }
                        /*screen_diagonal*/
                        if(!in_array($products['screen_diagonal'], $array_parameter[4]))
                        {
                            $product['filter']['Диагональ экрана'][$i_4]['result']   = $products['screen_diagonal'];
                            $product['filter']['Диагональ экрана'][$i_4]['price'] = $products['price'];
                            $product['filter']['Диагональ экрана'][$i_4]['link']  = $products['link_description'];
                            $array_parameter[4][$i_4] = $products['screen_diagonal'];
                            $i_4++;
                        }
                    }
                    //debug($product_also);
                    //debug($product);
                    //die();
                }
                else
                {
                     $product[0] = $product_one;
                }
                
                //$product[0]['dop'] = Notebook::find()->asArray()->where([ 'manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                $product[0]['dop'] = $dop_product;
                ////$product[0]['comment'] = $comment;
                //debug($product);
                //debug($product[0]['dop']);
                //die();
                
                break;
            case 'tablet':
                //$product_one = Tablet::find()->asArray()->where(['id' => $data_category[2]])->with('comment')->one();
                
                $comment = (new \yii\db\Query())->from('comment')
                    ->where(['comment.id_product'=>$data_category[2]])
                    ->andWhere(['comment.category'=>'tablet'])
                    ->orderBy(['comment.id'=>SORT_DESC])
                    ->all();
                //experiment 1
                
                $query02 = (new \yii\db\Query())
                //tablet
                    ->select(['tablet.*'])
                    ->from('tablet')
                    ->where(['tablet.id'=>$data_category[2]]);
                
                $query03 = (new \yii\db\Query())
                //notebook
                    ->select(['tablet.*'])
                    ->from(['n'=>'tablet'])
                    ->where(['n.id'=>$data_category[2]])
                    ->andWhere(['not',['n.type_tablet'=>NULL]])
                    ->join('LEFT JOIN','tablet','tablet.type_tablet=n.type_tablet');
                $query04 = (new \yii\db\Query())
                        ->select(['tablet.*'])
                        ->from(['n'=>'tablet'])
                        ->where(['n.id'=>$data_category[2]])
                        ->join('LEFT JOIN','tablet','tablet.manufacturer=n.manufacturer');
                
                //$product[0]['dop'] = Notebook::find()->asArray()->where(['manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                
                $query02->union($query03);
                $query02->union($query04);
                
                
                $quer = new \yii\db\Query();
                $data_1 = $quer->from($query02)->all();
                
                //debug($data_1);
                //--===== распределяем массив по типу ноутбука и по производителю =====--\\
                $start_type = $data_1[0]['type_tablet']; //определяем тип у первого запроса
                $start_manufacturer = $data_1[0]['manufacturer'];
                $count_read_data = count($data_1);
                $dop_product = [];$type_product = [];
                $product_one = $data_1[0];
                unset($data_1[0]);
                if( $count_read_data > 1 )
                {
                    if($start_type != null){
                        foreach ($data_1 as $one_data){
                            if($one_data['type_tablet'] == $start_type){
                                array_push($type_product, $one_data);
                            }
                            if($one_data['manufacturer'] == $start_manufacturer){
                                array_push($dop_product, $one_data);
                            }
                        }
                    }
                    else{
                        $dop_product = $data_1;      
                    }
                }
                
                $product_one['comment'] = $comment;
                //die();
                
                //experiment 1 end
                
                $count_product = count($type_product);
                //if($product_one['type_tablet']!= null){
                if( $count_product > 0 ){
                    //$product_also = Tablet::find()->where(['type_tablet' => $product_one['type_tablet']])->andWhere(['!=','id',$data_category[2]])->all();
                    //$product[0] = $product_one;
                    
                    $product[0] = $product_one;
                    $product_also = $type_product;
                    
                    $i = 1;
                    $array_parameter[1][1] = $product_one['number_sim'];
                    $array_parameter[2][1] = $product_one['internal_memory'];
                    $array_parameter[3][1] = $product_one['amount_ram'];
                    $array_parameter[4][1] = $product_one['screen_diagonal'];
                    $i_1 = 2; $i_2 = 2; $i_3 = 2; $i_4  = 2;
                    
                    foreach($product_also as $products)
                    {
                        /*number_sim*/
                        if(!in_array($products['number_sim'], $array_parameter[1]))
                        {
                            $product['filter']['Кол-во sim-карт'][$i_1]['result']   = $products['number_sim'];
                            $product['filter']['Кол-во sim-карт'][$i_1]['price'] = $products['price'];
                            $product['filter']['Кол-во sim-карт'][$i_1]['link']  = $products['link_description'];
                            $array_parameter[1][$i_1] = $products['number_sim'];
                            $i_1++;
                        }
                        /*internal_memory*/
                        if(!in_array($products['internal_memory'], $array_parameter[2]))
                        {
                            $product['filter']['Встроенная память'][$i_2]['result'] = $products['internal_memory'];
                            $product['filter']['Встроенная память'][$i_2]['price']  = $products['price'];
                            $product['filter']['Встроенная память'][$i_2]['link']   = $products['link_description'];
                            $array_parameter[2][$i_2] = $products['internal_memory'];
                            $i_2++;
                        }
                        /*amount_ram*/
                        if(!in_array($products['amount_ram'], $array_parameter[3]))
                        {
                            $product['filter']['Оперативная память'][$i_3]['result'] = $products['amount_ram'];
                            $product['filter']['Оперативная память'][$i_3]['price']  = $products['price'];
                            $product['filter']['Оперативная память'][$i_3]['link']   = $products['link_description'];
                            $array_parameter[3][$i_3] = $products['amount_ram'];
                            $i_3++;
                        }
                        /*screen_diagonal*/
                        if(!in_array($products['screen_diagonal'], $array_parameter[4]))
                        {
                            $product['filter']['Диагональ экрана'][$i_4]['result'] = $products['screen_diagonal'];
                            $product['filter']['Диагональ экрана'][$i_4]['price']  = $products['price'];
                            $product['filter']['Диагональ экрана'][$i_4]['link']   = $products['link_description'];
                            $array_parameter[4][$i_4] = $products['screen_diagonal'];
                            $i_4++;
                        }
                    }
                    //debug($product_also);
                    //debug($product);
                    //die();
                }
                else
                {
                     $product[0] = $product_one;
                }
                //die();
                //$product[0]['dop'] = Tablet::find()->asArray()->where([ 'manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                $product[0]['dop'] = $dop_product;
                //debug($product);
                //die();
                break;
            
            case 'audio':
                //$product_one = Audio::find()->asArray()->where(['id' => $data_category[2]])->with('comment')->one();

                $comment = (new \yii\db\Query())->from('comment')
                    ->where(['comment.id_product'=>$data_category[2]])
                    ->andWhere(['comment.category'=>'audio'])
                    ->orderBy(['comment.id'=>SORT_DESC])
                    ->all();
                //experiment 1
                
                $query02 = (new \yii\db\Query())
                //audio
                    ->select(['audio.*'])
                    ->from('audio')
                    ->where(['audio.id'=>$data_category[2]]);
                
                $query03 = (new \yii\db\Query())
                //audio
                    ->select(['audio.*'])
                    ->from(['n'=>'audio'])
                    ->where(['n.id'=>$data_category[2]])
                    ->andWhere(['not',['n.type_audio'=>NULL]])
                    ->join('LEFT JOIN','audio','audio.type_audio=n.type_audio');
                $query04 = (new \yii\db\Query())
                        ->select(['audio.*'])
                        ->from(['n'=>'audio'])
                        ->where(['n.id'=>$data_category[2]])
                        ->join('LEFT JOIN','audio','audio.manufacturer=n.manufacturer');
                
                //$product[0]['dop'] = Notebook::find()->asArray()->where(['manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                
                $query02->union($query03);
                $query02->union($query04);
                
                
                $quer = new \yii\db\Query();
                $data_1 = $quer->from($query02)->all();
                
                //debug($data_1);
                //--===== распределяем массив по типу ноутбука и по производителю =====--\\
                $start_type = $data_1[0]['type_audio']; //определяем тип у первого запроса
                $start_manufacturer = $data_1[0]['manufacturer'];
                $count_read_data = count($data_1);
                $dop_product = [];$type_product = [];
                $product_one = $data_1[0];
                unset($data_1[0]);
                if( $count_read_data > 1 )
                {
                    if($start_type != null){
                        foreach ($data_1 as $one_data){
                            if($one_data['type_audio'] == $start_type){
                                array_push($type_product, $one_data);
                            }
                            if($one_data['manufacturer'] == $start_manufacturer){
                                array_push($dop_product, $one_data);
                            }
                        }
                    }
                    else{
                        $dop_product = $data_1;      
                    }
                }
                
                $product_one['comment'] = $comment;
                //die();
                
                //experiment 1 end
                
                $count_product = count($type_product);
                
                //if($product_one['type_audio']!= null){
                if( $count_product > 0 ){    
                    //$product_also = Audio::find()->where(['type_audio' => $product_one['type_audio']])->andWhere(['!=','id',$data_category[2]])->all();
                    //$product[0] = $product_one;
                    
                    $product[0] = $product_one;
                    $product_also = $type_product;
                    
                    $i = 1;
                    $array_parameter[1][1] = $product_one['power'];
                    $i_1 = 2; $i_2 = 2; $i_3 = 2; $i_4  = 2;
                    
                    foreach($product_also as $products)
                    {
                        /*power*/
                        if(!in_array($products['power'], $array_parameter[1]))
                        {
                            $product['filter']['Мощность во фронтальном направлении'][$i_1]['result'] = $products['power'];
                            $product['filter']['Мощность во фронтальном направлении'][$i_1]['price']  = $products['price'];
                            $product['filter']['Мощность во фронтальном направлении'][$i_1]['link']   = $products['link_description'];
                            $array_parameter[1][$i_1] = $products['power'];
                            $i_1++;
                        }
                        
                    }
                    
                }
                else
                {
                     $product[0] = $product_one;
                }
                //$product[0]['dop'] = Audio::find()->asArray()->where([ 'manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                $product[0]['dop'] = $dop_product;
                
                break;
            case 'smartiphone':
                //$product_one = Smartiphone::find()->asArray()->where(['id' => $data_category[2]])->with('comment')->one();
                
                $comment = (new \yii\db\Query())->from('comment')
                    ->where(['comment.id_product'=>$data_category[2]])
                    ->andWhere(['comment.category'=>'smartiphone'])
                    ->orderBy(['comment.id'=>SORT_DESC])
                    ->all();
                //experiment 1
                
                $query02 = (new \yii\db\Query())
                //smartiphone
                    ->select(['smartiphone.*'])
                    ->from('smartiphone')
                    ->where(['smartiphone.id'=>$data_category[2]]);
                
                $query03 = (new \yii\db\Query())
                //smartiphone
                    ->select(['smartiphone.*'])
                    ->from(['n'=>'smartiphone'])
                    ->where(['n.id'=>$data_category[2]])
                    ->andWhere(['not',['n.type_device'=>NULL]])
                    ->join('LEFT JOIN','smartiphone','smartiphone.type_device=n.type_device');
                $query04 = (new \yii\db\Query())
                        ->select(['smartiphone.*'])
                        ->from(['n'=>'smartiphone'])
                        ->where(['n.id'=>$data_category[2]])
                        ->join('LEFT JOIN','smartiphone','smartiphone.manufacturer=n.manufacturer');
                
                //$product[0]['dop'] = Notebook::find()->asArray()->where(['manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                
                $query02->union($query03);
                $query02->union($query04);
                
                
                $quer = new \yii\db\Query();
                $data_1 = $quer->from($query02)->all();
                
                //debug($data_1);
                //--===== распределяем массив по типу ноутбука и по производителю =====--\\
                $start_type = $data_1[0]['type_device']; //определяем тип у первого запроса
                $start_manufacturer = $data_1[0]['manufacturer'];
                $count_read_data = count($data_1);
                $dop_product = [];$type_product = [];
                $product_one = $data_1[0];
                unset($data_1[0]);
                if( $count_read_data > 1 )
                {
                    if($start_type != null){
                        foreach ($data_1 as $one_data){
                            if($one_data['type_device'] == $start_type){
                                array_push($type_product, $one_data);
                            }
                            if($one_data['manufacturer'] == $start_manufacturer){
                                array_push($dop_product, $one_data);
                            }
                        }
                    }
                    else{
                        $dop_product = $data_1;      
                    }
                }
                
                $product_one['comment'] = $comment;
                //die();
                
                //experiment 1 end
                
                $count_product = count($type_product);
                
                //if($product_one['type_device']!= null){
                if( $count_product > 0 ){
                    //$product_also = Smartiphone::find()->where(['type_device' => $product_one['type_device']])->andWhere(['!=','id',$data_category[2]])->all();
                    //$product[0] = $product_one;
                    
                    $product[0] = $product_one;
                    $product_also = $type_product;
                     
                    $i = 1;
                    $array_parameter[1][1] = $product_one['number_core'];
                    $array_parameter[2][1] = $product_one['internal_memory'];
                    $array_parameter[3][1] = $product_one['amount_ram'];
                    $array_parameter[4][1] = $product_one['screen_diagonal'];
                    $array_parameter[5][1] = $product_one['camera_resolution'];
                    $array_parameter[6][1] = $product_one['color'];
                    $i_1 = 2; $i_2 = 2; $i_3 = 2; $i_4  = 2; $i_5 = 2; $i_6 = 2;
                    
                    foreach($product_also as $products)
                    {
                        /*number_sim*/
                        if(!in_array($products['number_core'], $array_parameter[1]))
                        {
                            $product['filter']['Кол-во ядер'][$i_1]['result']   = $products['number_core'];
                            $product['filter']['Кол-во ядер'][$i_1]['price'] = $products['price'];
                            $product['filter']['Кол-во ядер'][$i_1]['link']  = $products['link_description'];
                            $array_parameter[1][$i_1] = $products['number_core'];
                            $i_1++;
                        }
                        /*internal_memory*/
                        if(!in_array($products['internal_memory'], $array_parameter[2]))
                        {
                            $product['filter']['Встроенная память'][$i_2]['result'] = $products['internal_memory'];
                            $product['filter']['Встроенная память'][$i_2]['price']  = $products['price'];
                            $product['filter']['Встроенная память'][$i_2]['link']   = $products['link_description'];
                            $array_parameter[2][$i_2] = $products['internal_memory'];
                            $i_2++;
                        }
                        /*amount_ram*/
                        if(!in_array($products['amount_ram'], $array_parameter[3]))
                        {
                            $product['filter']['Оперативная память'][$i_3]['result'] = $products['amount_ram'];
                            $product['filter']['Оперативная память'][$i_3]['price']  = $products['price'];
                            $product['filter']['Оперативная память'][$i_3]['link']   = $products['link_description'];
                            $array_parameter[3][$i_3] = $products['amount_ram'];
                            $i_3++;
                        }
                        /*screen_diagonal*/
                        if(!in_array($products['screen_diagonal'], $array_parameter[4]))
                        {
                            $product['filter']['Диагональ экрана'][$i_4]['result'] = $products['screen_diagonal'];
                            $product['filter']['Диагональ экрана'][$i_4]['price']  = $products['price'];
                            $product['filter']['Диагональ экрана'][$i_4]['link']   = $products['link_description'];
                            $array_parameter[4][$i_4] = $products['screen_diagonal'];
                            $i_4++;
                        }
                        /*camera_resolution*/
                        if(!in_array($products['camera_resolution'], $array_parameter[5]))
                        {
                            $product['filter']['Разрешение камеры'][$i_5]['result'] = $products['camera_resolution'];
                            $product['filter']['Разрешение камеры'][$i_5]['price']  = $products['price'];
                            $product['filter']['Разрешение камеры'][$i_5]['link']   = $products['link_description'];
                            $array_parameter[5][$i_5] = $products['camera_resolution'];
                            $i_5++;
                        }
                        /*color*/
                        if(!in_array($products['color'], $array_parameter[6]))
                        {
                            $product['filter']['Цвет'][$i_6]['result'] = $products['color'];
                            $product['filter']['Цвет'][$i_6]['price']  = $products['price'];
                            $product['filter']['Цвет'][$i_6]['link']   = $products['link_description'];
                            $array_parameter[6][$i_6] = $products['color'];
                            $i_6++;
                        }
                    }
                    //debug($product_also);
                    //debug($product);
                    //die();
                }
                else
                {
                     $product[0] = $product_one;
                }
                //die();
                //$product[0]['dop'] = Smartiphone::find()->asArray()->where([ 'manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                $product[0]['dop'] = $dop_product;
        
                break;
            case 'camera':
                //$product_one = Camera::find()->asArray()->where(['id' => $data_category[2]])->with('comment')->one();
                //die();
                
                $comment = (new \yii\db\Query())->from('comment')
                    ->where(['comment.id_product'=>$data_category[2]])
                    ->andWhere(['comment.category'=>'camera'])
                    ->orderBy(['comment.id'=>SORT_DESC])
                    ->all();
                //experiment 1
                
                $query02 = (new \yii\db\Query())
                //camera
                    ->select(['camera.*'])
                    ->from('camera')
                    ->where(['camera.id'=>$data_category[2]]);
                
                $query03 = (new \yii\db\Query())
                //camera
                    ->select(['camera.*'])
                    ->from(['n'=>'camera'])
                    ->where(['n.id'=>$data_category[2]])
                    ->andWhere(['not',['n.type_camera'=>NULL]])
                    ->join('LEFT JOIN','camera','camera.type_camera=n.type_camera');
                $query04 = (new \yii\db\Query())
                        ->select(['camera.*'])
                        ->from(['n'=>'camera'])
                        ->where(['n.id'=>$data_category[2]])
                        ->join('LEFT JOIN','camera','camera.manufacturer=n.manufacturer');
                
                //$product[0]['dop'] = Notebook::find()->asArray()->where(['manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                
                $query02->union($query03);
                $query02->union($query04);
                
                
                $quer = new \yii\db\Query();
                $data_1 = $quer->from($query02)->all();
                
                //debug($data_1);
                //--===== распределяем массив по типу ноутбука и по производителю =====--\\
                $start_type = $data_1[0]['type_camera']; //определяем тип у первого запроса
                $start_manufacturer = $data_1[0]['manufacturer'];
                $count_read_data = count($data_1);
                $dop_product = [];$type_product = [];
                $product_one = $data_1[0];
                unset($data_1[0]);
                if( $count_read_data > 1 )
                {
                    if($start_type != null){
                        foreach ($data_1 as $one_data){
                            if($one_data['type_camera'] == $start_type){
                                array_push($type_product, $one_data);
                            }
                            if($one_data['manufacturer'] == $start_manufacturer){
                                array_push($dop_product, $one_data);
                            }
                        }
                    }
                    else{
                        $dop_product = $data_1;      
                    }
                }
                
                $product_one['comment'] = $comment;
                //die();
                
                //experiment 1 end
                
                $count_product = count($type_product);
                
                //if($product_one['type_camera']!= null){
                if( $count_product > 0 ){  
                    //$product_also = Camera::find()->where(['type_camera' => $product_one['type_camera']])->andWhere(['!=','id',$data_category[2]])->all();
                    //$product[0] = $product_one;
                    
                    $product[0] = $product_one;
                    $product_also = $type_product;
                    
                    $i = 1;
                    $array_parameter[1][1] = $product_one['resolution_matrix'];
                    $i_1 = 2; $i_2 = 2; $i_3 = 2; $i_4  = 2;
                    
                    foreach($product_also as $products)
                    {
                        /*resolution_matrix*/
                        if(!in_array($products['resolution_matrix'], $array_parameter[1]))
                        {
                            $product['filter']['Разрешение матрицы'][$i_1]['result'] = $products['resolution_matrix'];
                            $product['filter']['Разрешение матрицы'][$i_1]['price']  = $products['price'];
                            $product['filter']['Разрешение матрицы'][$i_1]['link']   = $products['link_description'];
                            $array_parameter[1][$i_1] = $products['resolution_matrix'];
                            $i_1++;
                        }
                        
                    }
                    
                }
                else
                {
                     $product[0] = $product_one;
                }
                //$product[0]['dop'] = Camera::find()->asArray()->where([ 'manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                $product[0]['dop'] = $dop_product;
                break;
            case 'tv':
                //$product_one = Tv::find()->asArray()->where(['id' => $data_category[2]])->with('comment')->one();
                //die();
                
                $comment = (new \yii\db\Query())->from('comment')
                    ->where(['comment.id_product'=>$data_category[2]])
                    ->andWhere(['comment.category'=>'tv'])
                    ->orderBy(['comment.id'=>SORT_DESC])
                    ->all();
                //experiment 1
                
                $query02 = (new \yii\db\Query())
                //tv
                    ->select(['tv.*'])
                    ->from('tv')
                    ->where(['tv.id'=>$data_category[2]]);
                
                $query03 = (new \yii\db\Query())
                //tv
                    ->select(['tv.*'])
                    ->from(['n'=>'tv'])
                    ->where(['n.id'=>$data_category[2]])
                    ->andWhere(['not',['n.type_tv'=>NULL]])
                    ->join('LEFT JOIN','tv','tv.type_tv=n.type_tv');
                $query04 = (new \yii\db\Query())
                        ->select(['tv.*'])
                        ->from(['n'=>'tv'])
                        ->where(['n.id'=>$data_category[2]])
                        ->join('LEFT JOIN','tv','tv.manufacturer=n.manufacturer');
                
                //$product[0]['dop'] = Notebook::find()->asArray()->where(['manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                
                $query02->union($query03);
                $query02->union($query04);
                
                
                $quer = new \yii\db\Query();
                $data_1 = $quer->from($query02)->all();
                
                //debug($data_1);
                //--===== распределяем массив по типу ноутбука и по производителю =====--\\
                $start_type = $data_1[0]['type_tv']; //определяем тип у первого запроса
                $start_manufacturer = $data_1[0]['manufacturer'];
                $count_read_data = count($data_1);
                $dop_product = [];$type_product = [];
                $product_one = $data_1[0];
                unset($data_1[0]);
                if( $count_read_data > 1 )
                {
                    if($start_type != null){
                        foreach ($data_1 as $one_data){
                            if($one_data['type_tv'] == $start_type){
                                array_push($type_product, $one_data);
                            }
                            if($one_data['manufacturer'] == $start_manufacturer){
                                array_push($dop_product, $one_data);
                            }
                        }
                    }
                    else{
                        $dop_product = $data_1;      
                    }
                }
                
                $product_one['comment'] = $comment;
                //die();
                
                //experiment 1 end
                
                $count_product = count($type_product);
                
                
                //if($product_one['type_tv']!= null){
                if( $count_product > 0 ){    
                    //$product_also = Tv::find()->where(['type_tv' => $product_one['type_tv']])->andWhere(['!=','id',$data_category[2]])->all();
                    //$product[0] = $product_one;
                    
                    $product[0] = $product_one;
                    $product_also = $type_product;
                    
                    $i = 1;
                    $array_parameter[1][1] = $product_one['screen_resolution'];
                    $array_parameter[2][1] = $product_one['screen_diagonal'];
                    $i_1 = 2; $i_2 = 2; $i_3 = 2; $i_4  = 2;
                    
                    foreach($product_also as $products)
                    {
                        /*resolution_matrix*/
                        if(!in_array($products['screen_resolution'], $array_parameter[1]))
                        {
                            $product['filter']['Разрешение экрана'][$i_1]['result'] = $products['screen_resolution'];
                            $product['filter']['Разрешение экрана'][$i_1]['price']  = $products['price'];
                            $product['filter']['Разрешение экрана'][$i_1]['link']   = $products['link_description'];
                            $array_parameter[1][$i_1] = $products['screen_resolution'];
                            $i_1++;
                        }
                        if(!in_array($products['screen_diagonal'], $array_parameter[1]))
                        {
                            $product['filter']['Диагональ экрана'][$i_1]['result'] = $products['screen_diagonal'];
                            $product['filter']['Диагональ экрана'][$i_1]['price']  = $products['price'];
                            $product['filter']['Диагональ экрана'][$i_1]['link']   = $products['link_description'];
                            $array_parameter[1][$i_1] = $products['screen_diagonal'];
                            $i_1++;
                        }
                        
                    }
                    
                }
                else
                {
                     $product[0] = $product_one;
                }
                //$product[0]['dop'] = Tv::find()->asArray()->where([ 'manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                $product[0]['dop'] = $dop_product;
                break;    
            case 'videocamera':
                //$product_one = VideoCamera::find()->asArray()->where(['id' => $data_category[2]])->with('comment')->one();
                //die();
                
                $comment = (new \yii\db\Query())->from('comment')
                    ->where(['comment.id_product'=>$data_category[2]])
                    ->andWhere(['comment.category'=>'videocamera'])
                    ->orderBy(['comment.id'=>SORT_DESC])
                    ->all();
                //experiment 1
                
                $query02 = (new \yii\db\Query())
                //videocamera
                    ->select(['videocamera.*'])
                    ->from('videocamera')
                    ->where(['videocamera.id'=>$data_category[2]]);
                
                $query03 = (new \yii\db\Query())
                //videocamera
                    ->select(['videocamera.*'])
                    ->from(['n'=>'videocamera'])
                    ->where(['n.id'=>$data_category[2]])
                    ->andWhere(['not',['n.type_camera'=>NULL]])
                    ->join('LEFT JOIN','videocamera','videocamera.type_camera=n.type_camera');
                $query04 = (new \yii\db\Query())
                        ->select(['videocamera.*'])
                        ->from(['n'=>'videocamera'])
                        ->where(['n.id'=>$data_category[2]])
                        ->join('LEFT JOIN','videocamera','videocamera.manufacturer=n.manufacturer');
                
                //$product[0]['dop'] = Notebook::find()->asArray()->where(['manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                
                $query02->union($query03);
                $query02->union($query04);
                
                
                $quer = new \yii\db\Query();
                $data_1 = $quer->from($query02)->all();
                
                //debug($data_1);
                //--===== распределяем массив по типу ноутбука и по производителю =====--\\
                $start_type = $data_1[0]['type_camera']; //определяем тип у первого запроса
                $start_manufacturer = $data_1[0]['manufacturer'];
                $count_read_data = count($data_1);
                $dop_product = [];$type_product = [];
                $product_one = $data_1[0];
                unset($data_1[0]);
                if( $count_read_data > 1 )
                {
                    if($start_type != null){
                        foreach ($data_1 as $one_data){
                            if($one_data['type_camera'] == $start_type){
                                array_push($type_product, $one_data);
                            }
                            if($one_data['manufacturer'] == $start_manufacturer){
                                array_push($dop_product, $one_data);
                            }
                        }
                    }
                    else{
                        $dop_product = $data_1;      
                    }
                }
                
                $product_one['comment'] = $comment;
                //die();
                
                //experiment 1 end
                
                $count_product = count($type_product);
                
                if($product_one['type_camera']!= null){
                    
                    //$product_also = VideoCamera::find()->where(['type_camera' => $product_one['type_camera']])->andWhere(['!=','id',$data_category[2]])->all();
                    //$product[0] = $product_one;
                    
                    $product[0] = $product_one;
                    $product_also = $type_product;
                    
                    $i = 1;
                    $array_parameter[1][1] = $product_one['video_recording_speed'];
                    $i_1 = 2; $i_2 = 2; $i_3 = 2; $i_4  = 2;
                    
                    foreach($product_also as $products)
                    {
                        /*resolution_matrix*/
                        if(!in_array($products['video_recording_speed'], $array_parameter[1]))
                        {
                            $product['filter']['Скорость записи видео'][$i_1]['result'] = $products['video_recording_speed'];
                            $product['filter']['Скорость записи видео'][$i_1]['price']  = $products['price'];
                            $product['filter']['Скорость записи видео'][$i_1]['link']   = $products['link_description'];
                            $array_parameter[1][$i_1] = $products['video_recording_speed'];
                            $i_1++;
                        }
                        
                    }
                    
                }
                else
                {
                     $product[0] = $product_one;
                }
                //$product[0]['dop'] = VideoCamera::find()->asArray()->where([ 'manufacturer' => $product[0]['manufacturer']])->andWhere(['!=','id', $data_category[2]])->orderBy(['id'=>SORT_DESC])->all();
                $product[0]['dop'] = $dop_product;
                break;
                
            default :
                break;
        }
        
        return $product;
        
    }
    
    public function ProductDetailsbanner($data_url){
        $data_category = explode('&', $data_url);
        $banner = null;
        switch($data_category[1]){
            case 'notebook':
                $banner = Bannerim::find()->where(['subcategory' => 'product_detail_notebook'])->all();
                break;
            case 'tablit':
                $banner = Bannerim::find()->where(['subcategory' => 'product_detail_tablet'])->all();
                break;
            case 'audio':
                $banner = Bannerim::find()->where(['subcategory' => 'product_detail_audio'])->all();
                break;
            case 'tv':
                $banner = Bannerim::find()->where(['subcategory' => 'product_detail_tv'])->all();
                break;
            case 'smartiphone':
                $banner = Bannerim::find()->where(['subcategory' => 'product_detail_smartiphone'])->all();
                break;
            case 'camera':
                $banner = Bannerim::find()->where(['subcategory' => 'product_detail_camera'])->all();
                break;
            case 'videocamera':
                $banner = Bannerim::find()->where(['subcategory' => 'product_detail_videocamera'])->all();
                break;
            default:
                break;
        }    
        return $banner;
    }
    
    
    
}
