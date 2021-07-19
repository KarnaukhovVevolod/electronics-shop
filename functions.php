<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function debug($data){
    echo '<pre>'.print_r($data, true).'</pre>';
}


//sql-запросы и union example
 function array_category()
{
//$data = Category::find()->orderBy(['category'=>'ewrwer'])->with('notebooks','tablets','audio','tv','videocamera','smartiphone','camera')->all();
//debug($data);
$query_1 = new Query();
/*
$data_1 = $query_1->from(['category'])
        ->orderBy(['category'=>'ewrwer'])
        ->join('LEFT JOIN','notebook','category.subcategory=notebook.name_subcategory')//->indexBy('category')
        ->distinct()
        //->groupBy('c.id','c.category','c.subcategory','c.category_english','c.type_of_subcategory')
        //->groupBy('category.subcategory')

        ->all();*/
$data_1 = $query_1//->select('notebook.path as path_n,audio.path as path_a')
        ->from('category')->orderBy(['category'=>'wrewr'])

        ->select(['category.id','category.category','category.subcategory','category.category_english','category.type_of_subcategory',
            'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
            'category.id_seo_search_type_of_subcategory'])//->distinct()
        //notebook
        ->addSelect(['notebook.id','notebook.path','notebook.path_2','notebook.name_type_of_subcategory','notebook.model_product','notebook.price','notebook.old_price',
            'notebook.price_sort','notebook.discount','notebook.link_description','notebook.marketing_products','notebook.date'])
        //audio
        ->addSelect(['audio.id','audio.path','audio.path_2','audio.name_type_of_subcategory','audio.model_product','audio.price','audio.old_price',
            'audio.price_sort','audio.discount','audio.link_description','audio.marketing_products','audio.date'])

        //notebook

        ->join('LEFT JOIN','notebook','category.type_of_subcategory=notebook.name_type_of_subcategory')

        ->addOrderBy(['notebook.name_type_of_subcategory'=>';lk;lk'])
        //audio
        ->join('LEFT JOIN','audio','category.type_of_subcategory=audio.name_type_of_subcategory')
        ->addOrderBy(['audio.name_type_of_subcategory'=>';lk;lk'])
        ->all();
//debug($data_1);
//die();
$query01 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
            'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
            'category.id_seo_search_type_of_subcategory'])
        //audio
        ->addSelect(['audio.id','audio.path','audio.path_2','audio.name_type_of_subcategory','audio.model_product','audio.price','audio.old_price',
            'audio.price_sort','audio.discount','audio.link_description','audio.marketing_products','audio.date'])
        ->from('category')->orderBy(['category'=>'wrewr'])
        ->join('LEFT JOIN','audio','category.type_of_subcategory=audio.name_type_of_subcategory')
        ->addOrderBy(['audio.name_type_of_subcategory'=>';lk;lk']);


$query02 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
            'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
            'category.id_seo_search_type_of_subcategory'])
        //notebook
        ->addSelect(['notebook.id','notebook.path','notebook.path_2','notebook.name_type_of_subcategory','notebook.model_product','notebook.price','notebook.old_price',
            'notebook.price_sort','notebook.discount','notebook.link_description','notebook.marketing_products','notebook.date'])
        ->from('category')->orderBy(['category'=>'wrewr'])
        ->join('LEFT JOIN','notebook','category.type_of_subcategory=notebook.name_type_of_subcategory')
        ->addOrderBy(['notebook.name_type_of_subcategory'=>';lk;lk']);


$rty = $query01->union($query02);//->createCommand();


$quer = new Query();
$data_1 = $quer->select(['category','subcategory','category_english','type_of_subcategory',
            'link_category','link_subcategory','link_type_subcategory','id_seo_search_category','id_seo_search_subcategory',
            'id_seo_search_type_of_subcategory','id','path','path_2','name_type_of_subcategory','model_product','price','old_price',
            'price_sort','discount','link_description','marketing_products','date'])->from($rty)->orderBy(['category'=>'wer'])
        ->addOrderBy(['subcategory'=>'wer'])->all();

//debug($data_1);
//die();


$query_2 = new Query();
$data_4 = $query_2->from(['c'=>'category','n1'=>'notebook'])->orderBy(['c.category'=>'wrewr'])
        //->where('c.id>0')
        ->where('c.type_of_subcategory=n1.name_type_of_subcategory')
        //->orWhere('c.type_of_subcategory=a2.name_type_of_subcategory')
        //->orWhere('c.type_of_subcategory=a2.name_type_of_subcategory')
        //->where(['name_type_of_subcategory'=>'ноутбуки'])
        //->join('LEFT JOIN',['t2'=>'notebook'] ,'category.type_of_subcategory=t2.name_type_of_subcategory')
        //->join('LEFT JOIN',['a2'=>'audio'] ,'category.type_of_subcategory=a2.name_type_of_subcategory')
        ;//->all();
//$data_4 = Notebook::find()->where(['name_type_of_subcategory'=>'ноутбуки'])->all();
$query_3 = new Query();
$data_5 = $query_2->from(['c'=>'category','a1'=>'audio'])->orderBy(['c.category'=>'wrewr'])
        //->where('c.id>0')
        ->where('c.type_of_subcategory=a1.name_type_of_subcategory');
$data_4->union($data_5);
//union start
$query01 = (new Query())/*
        ->select('c.id AS ID, n1.id AS IDN')
        ->from(['c'=>'category','n1'=>'notebook'])->orderBy(['c.category'=>'wrewr'])
        //->select(['c.*','n1.*'])
        ->where('c.type_of_subcategory=n1.name_type_of_subcategory')
        ->limit(1)*/
        ->select('n1.path')
        ->from(['n1'=>'notebook'])
        ->limit(5)
        ;//->createCommand();
$query02 = (new Query())/*
        ->select('c.id AS ID, n1.id AS IDN')
        ->from(['c'=>'category','n1'=>'notebook'])->orderBy(['c.category'=>'wrewr'])
        //->select(['c.*','n1.*'])
        ->where('c.type_of_subcategory=n1.name_type_of_subcategory')
        ->limit(1)*/
        ->select('a1.path')
        ->from(['a1'=>'audio'])
        ->limit(5);
//$query02 = Yii::$app->db->createCommand('SELECT * FROM notebook ORDER BY price_sort ASC')
//        ->queryAll();
//$query02 = Yii::$app->db->createCommand('(SELECT path, path_2 FROM notebook ORDER BY price_sort ASC) UNION '
//       . '                              (SELECT path, path_2 FROM audio)')
//        ->queryAll();
/*$query03 = Yii::$app->db->createCommand('(SELECT path, path_2 FROM notebook ORDER BY price_sort ASC) UNION '
       . '                              (SELECT path, path_2 FROM audio)(SELECT * FROM category)')
        ->queryAll();

debug($query03);die();
$rty = $query01->union($query02);//->createCommand();

debug($rty);die();
$quer = new Query();
$res = $quer->select('path')->from($rty,'category')->addSelect('category.category')->all();
debug($res);die();
//
//union end
//die();
//debug($we);

//$d = count($res);
//$res = $query01->all();
debug('мой результат');
//debug($d);
//debug($query01);
//debug($query02);
//debug($res);
//die();
debug($query01);
        die();
debug($data_4);
die();*/
$data_2 = []; $type_of_subcategory = null; $with = null; $u = -1;$l = 0;
foreach($data_1 as $data0){
    //debug('dataforeach');
    if($type_of_subcategory != $data0['type_of_subcategory'])
    {
        $u++;
        $data_2[$u]['category'] = $data0['category'];
        $data_2[$u]['subcategory'] = $data0['subcategory'];
        $data_2[$u]['category_english'] = $data0['category_english'];
        $data_2[$u]['type_of_subcategory'] = $data0['type_of_subcategory'];
        $data_2[$u]['link_category'] = $data0['link_category'];
        $data_2[$u]['link_subcategory'] = $data0['link_subcategory'];
        $data_2[$u]['link_type_subcategory'] = $data0['link_type_subcategory'];
        $data_2[$u]['id_seo_search_category'] = $data0['id_seo_search_category'];
        $data_2[$u]['id_seo_search_subcategory'] = $data0['id_seo_search_subcategory'];
        $data_2[$u]['id_seo_search_type_of_subcategory'] = $data0['id_seo_search_type_of_subcategory'];

        $type_of_subcategory = $data0['type_of_subcategory'];
        switch($data0['category_english']){
            case 'notebook':
                $with = 'notebooks';
                break;
            case 'tablet':
                $with = 'tablets';
                break;
            case 'audio':
                $with = 'audio';
                break;
            case 'tv':
                $with = 'tv';
                break;
            case 'videocamera':
                $with = 'videocamera';
                break;
            case 'smartiphone':
                $with = 'smartiphone';
                break;
            case 'camera':
                $with = 'camera';
                break;
            default:
                $with = $data_0['category_english'];
                break;

        }
        if($data0['model_product'] != null)
        {
            $data_2[$u][$with][0]['path'] = $data0['path'];
            $data_2[$u][$with][0]['path_2'] = $data0['path_2'];
            $data_2[$u][$with][0]['name_type_of_subcategory'] = $data0['name_type_of_subcategory'];
            $data_2[$u][$with][0]['model_product'] = $data0['model_product'];
            $data_2[$u][$with][0]['price'] = $data0['price'];
            $data_2[$u][$with][0]['old_price'] = $data0['old_price'];
            $data_2[$u][$with][0]['price_sort'] = $data0['price_sort'];
            $data_2[$u][$with][0]['discount'] = $data0['discount'];
            $data_2[$u][$with][0]['link_description'] = $data0['link_description'];
            $data_2[$u][$with][0]['marketing_products'] = $data0['marketing_products'];
            $data_2[$u][$with][0]['date'] = $data0['date'];
        }    

        $l = 1;
        //debug('if');
    }
    else{
        //debug('else');
        if($data0['model_product'] != null){
            $data_2[$u][$with][$l]['path'] = $data0['path'];
            $data_2[$u][$with][$l]['path_2'] = $data0['path_2'];
            $data_2[$u][$with][$l]['name_type_of_subcategory'] = $data0['name_type_of_subcategory'];
            $data_2[$u][$with][$l]['model_product'] = $data0['model_product'];
            $data_2[$u][$with][$l]['price'] = $data0['price'];
            $data_2[$u][$with][$l]['old_price'] = $data0['old_price'];
            $data_2[$u][$with][$l]['price_sort'] = $data0['price_sort'];
            $data_2[$u][$with][$l]['discount'] = $data0['discount'];
            $data_2[$u][$with][$l]['link_description'] = $data0['link_description'];
            $data_2[$u][$with][$l]['marketing_products'] = $data0['marketing_products'];
            $data_2[$u][$with][$l]['date'] = $data0['date'];            
            $l++;        
        }
    }

}
//debug($data_2);
//debug($data);
//die();
$data = $data_2;
$category_data = [];
$category = '';
$i = 0;$j = 0;
foreach($data as $data_category)
{
    if($data_category['category'] != $category)
    { 
        $i++;
        $category = $data_category['category'];
    }

    $category_data[$i][$j] = $data_category; 

    $j++;
}

//debug($category_data);
//die();

return $category_data;
}












