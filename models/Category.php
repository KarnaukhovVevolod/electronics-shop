<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;
use yii\db\Query;
use yii\base\Model;
use Yii;

class Category extends ActiveRecord {
    
    public $section;
    public $teg_title;
    public $teg_keywords;
    public $teg_description;
    public $my_comment;

    public $type_category;
    public $my_type_category;
    
    //для обновления сразу нескольких строчек
    /*
    public $table_r;
    public $table_write_update_del;
    public $id_how_many;
    
    public $id;
    public $category;
    public $subcategory;
    public $type_of_subcategory;
    public $category_english;
    public $link_category;
    public $link_subcategory;
    public $link_type_subcategory;
    public $id_seo_search_category;
    public $id_seo_search_subcategory;
    public $id_seo_search_type_of_subcategory;
    */
    
    //const sect = String $this->section;
    //const sect_type = 'search_category';

    public static function tableName() {
        return 'category';
    }
    
    public function attributeLabels() {
        switch($this->section)
        {
            case 'category':
                return [
                    'id'                    => 'id',
                    'category'              => 'Категория',
                    'subcategory'           => 'Подкатегория',
                    'type_of_subcategory'   => 'Вид подкатегории',
                    'category_english'      => 'Категория по английски',
                    'link_category'         => 'Ссылка на категорию',
                    'link_subcategory'      => 'Ссылка на подкатегорию',
                    'link_type_subcategory' => 'Ссылка на вид подкатегории',
                    'id_seo_search_category'            => 'id SEO данные для категории',
                    'id_seo_search_subcategory'         => 'id SEO данные для подкатегории',
                    'id_seo_search_type_of_subcategory' => 'id SEO данные для типа подкатегории',

                ];
            break;
        
            case 'search':
                //public $id_seo_search;
                return [
                    'id'              => 'id',
                    'teg_title'       => 'Tег title',
                    'teg_keywords'    => 'Тег keywords',
                    'teg_description' => 'Тег description',
                    'my_comment'      => 'Мои комментарии',
                    'type_category'   => 'Категория, подкатег., тип подкатег.,',

                ];
            break;
            
            case 'search_category':
                return[
                    'id' => 'id',
                    'teg_title' => 'Тег title',
                    'teg_description' => 'Тег description',
                    'teg_keywords' => 'Тег keywords',
                    'my_comment'   => 'Мои комментарии', 
                ];
            break;
        /*
            case 'all':
                return[
                    'id'                    => 'id',
                    'category'              => 'Категория',
                    'subcategory'           => 'Подкатегория',
                    'type_of_subcategory'   => 'Вид подкатегории',
                    'category_english'      => 'Категория по английски',
                    'link_category'         => 'Ссылка на категорию',
                    'link_subcategory'      => 'Ссылка на подкатегорию',
                    'link_type_subcategory' => 'Ссылка на вид подкатегории',
                    'id_seo_search_category'            => 'id SEO данные для категории',
                    'id_seo_search_subcategory'         => 'id SEO данные для подкатегории',
                    'id_seo_search_type_of_subcategory' => 'id SEO данные для типа подкатегории',
                    
                    'teg_title'       => 'Tег title',
                    'teg_keywords'    => 'Тег keywords',
                    'teg_description' => 'Тег description',
                    'my_comment'      => 'Мои комментарии',
                    'type_category'   => 'Категория, подкатег., тип подкатег.,',
                    
                    'table_r'      => 'Выберите таблицу для редактирования',
                    'table_write_update_del' => 'Выберите вид редактирования',
                    'id_how_many' => 'Введите id для измен или сколько добавить',
                ];
            break;
        */            
            default :
                return [
                       'id'                    => 'id',
                       'category'              => 'Категория',
                       'subcategory'           => 'Подкатегория',
                       'type_of_subcategory'   => 'Вид подкатегории',
                       'category_english'      => 'Категория по английски',
                       'link_category'         => 'Ссылка на категорию',
                       'link_subcategory'      => 'Ссылка на подкатегорию',
                       'link_type_subcategory' => 'Ссылка на вид подкатегории',
                       'id_seo_search_category'            => 'id SEO данные для категории',
                       'id_seo_search_subcategory'         => 'id SEO данные для подкатегории',
                       'id_seo_search_type_of_subcategory' => 'id SEO данные для типа подкатегории',


                   ];
            break;
        }
    }
    
    
    public function rules() {

        switch($this->section)
        {
            
            case('category'):
                return[

                    ['id', 'integer'],
                    [['category','subcategory','type_of_subcategory','category_english'], 'string', 'max' => 30],
                    [['link_category','link_subcategory','link_type_subcategory'], 'string', 'max'=>120],
                    [['category','type_of_subcategory','link_category','category_english'], 'required'],
                    [['id_seo_search_category','id_seo_search_subcategory','id_seo_search_type_of_subcategory'],'integer'],
                    
                ];
            break;
            case('search'):
                return[
                    [['id'],'integer'],
                    [['teg_title'], 'string', 'max' => 120],
                    [['teg_keywords'], 'string', 'max' => 200],
                    [['teg_description'], 'string', 'max' => 200],
                    [['my_comment'], 'string', 'max' => 40],
                    [['type_category'], 'string', 'max' => 30],
                    [['type_category'],'required'],
                    //[['type_category'],'unique'],
                ];
            break;
            case('search_category'):
                return [
                  ['id','integer'],
                  [['teg_title'],'string','max' => 120],
                  [['teg_description'],'string','max' => 200],
                  [['teg_keywords'],'string','max' => 200],
                  [['my_comment'],'string','max' => 40],
                ];
            break;    
        /*
            case('all'):
                return[
                    ['id', 'integer'],
                    [['category','subcategory','type_of_subcategory','category_english'], 'string', 'max' => 30],
                    [['link_category','link_subcategory','link_type_subcategory'], 'string', 'max'=>120],
                    //[['category','type_of_subcategory','link_category','category_english'], 'required'],
                    
                    [['id_seo_search_category','id_seo_search_subcategory','id_seo_search_type_of_subcategory'],'integer'],
                    
                    [['teg_title'], 'string', 'max' => 120],
                    [['teg_keywords'], 'string', 'max' => 200],
                    [['teg_description'], 'string', 'max' => 200],
                    [['my_comment'], 'string', 'max' => 40],
                    [['type_category'], 'string', 'max' => 30],
                    
                    //[['type_category'],'required'],
                    
                    ['table_r','required']      => 'Выберите таблицу для редактирования',
                    ['table_write_update_del', 'required'] => 'Выберите вид редактирования',
                    ['id_how_many','required'] => 'Введите id для измен или сколько добавить',
                    
                ];
            break;
        */
            default:
                return[

                    ['id', 'integer'],
                    [['category','subcategory','type_of_subcategory','category_english'], 'string', 'max' => 30],
                    [['link_category','link_subcategory','link_type_subcategory'], 'string', 'max'=>120],
                    [['category','type_of_subcategory','link_category','category_english'], 'required'],
                    [['id_seo_search_category','id_seo_search_subcategory','id_seo_search_type_of_subcategory'],'integer'],
                    
                ];
            break;    
                
        }
    }
    
    public function valid_data($attribute)
    {
        $table_read_ = $this->table_r;
        $table_write_update_del_ = $this->table_write_update_del;
        $id_how_many_ = $this->id_how_many;
        switch($table_read_)
        {
            case(1):
                //[['category','type_of_subcategory','link_category','category_english'], 'required'],
                if($this->category == null){$this->addError('category','Необходимо заполнить поле' );}
                if($this->type_of_subcategory == null){$this->addError('type_of_subcategory','Необходимо заполнить поле');}
                if($this->link_category == null){$this->addError('link_category','Необходимо заполнить поле');}
                if($this->category_english == null){$this->addError('category_english','Необходимо заполнить поле');}
                
            break;
        
            case(2):
            //[['type_category'],'required'],
                if($this->type_category == null){$this->addError('type_category','Необходимо заполнить поле');}
                        
            break;
        
            default:
                
            break;
        }
        
        
    }
    
    public function array_category()
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
        /*
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
        */
        //debug($data_1);
        //die();
        $query01 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //audio
                ->addSelect(['audio.id','audio.path','audio.path_2','audio.name_type_of_subcategory','audio.model_product','audio.price','audio.old_price',
                    'audio.price_sort','audio.discount','audio.link_description','audio.marketing_products','audio.date','audio.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','audio','category.type_of_subcategory=audio.name_type_of_subcategory')
                ->where('category.category_english=audio.category_english')
                ->addOrderBy(['audio.name_type_of_subcategory'=>'lklk']);
                //->orderBy(['audio.name_type_of_subcategory'=>';lk;lk']);
                //->orderBy(['category.type_of_subcategory'=>'']);
        
        $query02 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //notebook
                ->addSelect(['notebook.id','notebook.path','notebook.path_2','notebook.name_type_of_subcategory','notebook.model_product','notebook.price','notebook.old_price',
                    'notebook.price_sort','notebook.discount','notebook.link_description','notebook.marketing_products','notebook.date','notebook.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','notebook','category.type_of_subcategory=notebook.name_type_of_subcategory')
                ->where('category.category_english=notebook.category_english')
                ->addOrderBy(['notebook.name_type_of_subcategory'=>';lk;lk']);
        
        $query03 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //camera
                ->addSelect(['camera.id','camera.path','camera.path_2','camera.name_type_of_subcategory','camera.model_product','camera.price','camera.old_price',
                    'camera.price_sort','camera.discount','camera.link_description','camera.marketing_products','camera.date','camera.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','camera','category.type_of_subcategory=camera.name_type_of_subcategory')
                ->where('category.category_english=camera.category_english')
                ->addOrderBy(['camera.name_type_of_subcategory'=>';lk;lk']);
        
        $query04 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //videocamera
                ->addSelect(['videocamera.id','videocamera.path','videocamera.path_2','videocamera.name_type_of_subcategory','videocamera.model_product','videocamera.price','videocamera.old_price',
                    'videocamera.price_sort','videocamera.discount','videocamera.link_description','videocamera.marketing_products','videocamera.date','videocamera.number_of_products'
                    ])
                //->addSelect(['tv.category_english'])
                ->from(['category'])
                
                ->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','videocamera','category.type_of_subcategory=videocamera.name_type_of_subcategory')
                ->where('category.category_english=videocamera.category_english')
                ->addOrderBy(['videocamera.name_type_of_subcategory'=>';lk;lk']);
        
        $query05 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //tablet
                ->addSelect(['tablet.id','tablet.path','tablet.path_2','tablet.name_type_of_subcategory','tablet.model_product','tablet.price','tablet.old_price',
                    'tablet.price_sort','tablet.discount','tablet.link_description','tablet.marketing_products','tablet.date','tablet.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','tablet','category.type_of_subcategory=tablet.name_type_of_subcategory')
                ->where('category.category_english=tablet.category_english')
                ->addOrderBy(['tablet.name_type_of_subcategory'=>';lk;lk']);
        
        $query06 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //tv
                ->addSelect(['tv.id','tv.path','tv.path_2','tv.name_type_of_subcategory','tv.model_product','tv.price','tv.old_price',
                    'tv.price_sort','tv.discount','tv.link_description','tv.marketing_products','tv.date','tv.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','tv','category.type_of_subcategory=tv.name_type_of_subcategory')
                //->join('LEFT JOIN','tv','category.category_english=tv.category_english')
                //->join('LEFT JOIN','videocamera','category.category_english=videocamera.category_english')
                //->where(['!=','videocamera.category_english','videocamera'])
                ->where('category.category_english=tv.category_english')
                //->where('category.category_english=tv.category_english')
                ->addOrderBy(['tv.name_type_of_subcategory'=>';lk;lk']);
        
        $query07 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //smartiphone
                ->addSelect(['smartiphone.id','smartiphone.path','smartiphone.path_2','smartiphone.name_type_of_subcategory','smartiphone.model_product','smartiphone.price','smartiphone.old_price',
                    'smartiphone.price_sort','smartiphone.discount','smartiphone.link_description','smartiphone.marketing_products','smartiphone.date','smartiphone.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','smartiphone','category.type_of_subcategory=smartiphone.name_type_of_subcategory')
                ->where('category.category_english=smartiphone.category_english')
                ->addOrderBy(['smartiphone.name_type_of_subcategory'=>';lk;lk']);
        
       //Объединяем подзапросы в один запрос с помощью union 
        $query01->union($query02);//->createCommand();
        $query01->union($query03);
        $query01->union($query04);
        $query01->union($query05);
        $query01->union($query06);
        
        $rty = $query01->union($query07);
        
        $quer = new Query();
        $data_1 = $quer->select(['category','subcategory','category_english','type_of_subcategory',
                    'link_category','link_subcategory','link_type_subcategory','id_seo_search_category','id_seo_search_subcategory',
                    'id_seo_search_type_of_subcategory','id','path','path_2','name_type_of_subcategory','model_product','price','old_price',
                    'price_sort','discount','link_description','marketing_products','date','number_of_products'])->from($rty)->orderBy(['category'=>'wer'])
                
                ->addOrderBy(['subcategory'=>'wer'])->addOrderBy(['name_type_of_subcategory'=>'fdsgd'])->all();
                
        //debug($data_1);
        //die();
        
        
        $data_2 = []; $type_of_subcategory = null; $with = null; $u = -1;$l = 0;
        $subcategory_product = null;
        foreach($data_1 as $data0){
            //debug('dataforeach');
            if($data0['model_product'] != null){
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
                    $category_product = $data0['category'];
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
                        $data_2[$u][$with][0]['number_of_products'] = $data0['number_of_products'];
                    }    

                    $l = 1;
                    //debug('if');
                }
                else if($type_of_subcategory == $data0['type_of_subcategory'] && $category_product == $data0['category'] )
                {
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
                        $data_2[$u][$with][$l]['number_of_products'] = $data0['number_of_products'];
                        $l++;        
                    }
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
    
    public function array_category_bestceller()
    {
        /*$data = Category::find()->orderBy(['category'=>'ewrwer'])->with('notebooksbestceller','tabletsbestceller','audiobestceller',
                'camerabestceller','videocamerabestceller','smartiphonebestceller','tvbestceller')->all();
        */
        ////debug($data);
        //-- sql -- для бд старт
        
        $query_1 = new Query();
        /*
        $data_1 = $query_1->from(['category'])
                ->orderBy(['category'=>'ewrwer'])
                ->join('LEFT JOIN','notebook','category.subcategory=notebook.name_subcategory')//->indexBy('category')
                ->distinct()
                //->groupBy('c.id','c.category','c.subcategory','c.category_english','c.type_of_subcategory')
                //->groupBy('category.subcategory')
                
                ->all();*/
        /*
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
        */
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
                ->addOrderBy(['audio.name_type_of_subcategory'=>';lk;lk'])
                ->where(['audio.marketing_products' => 'bestseller']);
                
        
        $query02 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //notebook
                ->addSelect(['notebook.id','notebook.path','notebook.path_2','notebook.name_type_of_subcategory','notebook.model_product','notebook.price','notebook.old_price',
                    'notebook.price_sort','notebook.discount','notebook.link_description','notebook.marketing_products','notebook.date'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','notebook','category.type_of_subcategory=notebook.name_type_of_subcategory')
                ->addOrderBy(['notebook.name_type_of_subcategory'=>';lk;lk'])
                ->where(['notebook.marketing_products' => 'bestseller']);
        
        $query03 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //camera
                ->addSelect(['camera.id','camera.path','camera.path_2','camera.name_type_of_subcategory','camera.model_product','camera.price','camera.old_price',
                    'camera.price_sort','camera.discount','camera.link_description','camera.marketing_products','camera.date'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','camera','category.type_of_subcategory=camera.name_type_of_subcategory')
                ->addOrderBy(['camera.name_type_of_subcategory'=>';lk;lk'])
                ->where(['camera.marketing_products' => 'bestseller']);
        
        $query04 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //videocamera
                ->addSelect(['videocamera.id','videocamera.path','videocamera.path_2','videocamera.name_type_of_subcategory','videocamera.model_product','videocamera.price','videocamera.old_price',
                    'videocamera.price_sort','videocamera.discount','videocamera.link_description','videocamera.marketing_products','videocamera.date'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','videocamera','category.type_of_subcategory=videocamera.name_type_of_subcategory')
                ->addOrderBy(['videocamera.name_type_of_subcategory'=>';lk;lk'])
                ->where(['videocamera.marketing_products' => 'bestseller']);
        
        $query05 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //tablet
                ->addSelect(['tablet.id','tablet.path','tablet.path_2','tablet.name_type_of_subcategory','tablet.model_product','tablet.price','tablet.old_price',
                    'tablet.price_sort','tablet.discount','tablet.link_description','tablet.marketing_products','tablet.date'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','tablet','category.type_of_subcategory=tablet.name_type_of_subcategory')
                ->addOrderBy(['tablet.name_type_of_subcategory'=>';lk;lk'])
                ->where(['tablet.marketing_products' => 'bestseller']);
        
        $query06 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //tv
                ->addSelect(['tv.id','tv.path','tv.path_2','tv.name_type_of_subcategory','tv.model_product','tv.price','tv.old_price',
                    'tv.price_sort','tv.discount','tv.link_description','tv.marketing_products','tv.date'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','tv','category.type_of_subcategory=tv.name_type_of_subcategory')
                ->addOrderBy(['tv.name_type_of_subcategory'=>';lk;lk'])
                ->where(['tv.marketing_products' => 'bestseller']);
        
        $query07 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //smartiphone
                ->addSelect(['smartiphone.id','smartiphone.path','smartiphone.path_2','smartiphone.name_type_of_subcategory','smartiphone.model_product','smartiphone.price','smartiphone.old_price',
                    'smartiphone.price_sort','smartiphone.discount','smartiphone.link_description','smartiphone.marketing_products','smartiphone.date'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','smartiphone','category.type_of_subcategory=smartiphone.name_type_of_subcategory')
                ->addOrderBy(['smartiphone.name_type_of_subcategory'=>';lk;lk'])
                ->where(['smartiphone.marketing_products' => 'bestseller']);
        
       //Объединяем подзапросы в один запрос с помощью union 
        $query01->union($query02);//->createCommand();
        $query01->union($query03);
        $query01->union($query04);
        $query01->union($query05);
        $query01->union($query06);
        
        $rty = $query01->union($query07);
        
        $quer = new Query();
        $data_1 = $quer->select(['category','subcategory','category_english','type_of_subcategory',
                    'link_category','link_subcategory','link_type_subcategory','id_seo_search_category','id_seo_search_subcategory',
                    'id_seo_search_type_of_subcategory','id','path','path_2','name_type_of_subcategory','model_product','price','old_price',
                    'price_sort','discount','link_description','marketing_products','date'])->from($rty)->orderBy(['category'=>'wer'])
                ->addOrderBy(['subcategory'=>'wer'])->all();
        
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
                        $with = 'notebooksbestceller';
                        break;
                    case 'tablet':
                        $with = 'tabletsbestceller';
                        break;
                    case 'audio':
                        $with = 'audiobestceller';
                        break;
                    case 'tv':
                        $with = 'tvbestceller';
                        break;
                    case 'videocamera':
                        $with = 'videocamerabestceller';
                        break;
                    case 'smartiphone':
                        $with = 'smartiphonebestceller';
                        break;
                    case 'camera':
                        $with = 'camerabestceller';
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
        
        //-- sql -- для бд конец
        
        //->andWhere(['marketing_products' => 'bestseller'])
        //die();
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
    
    //----------------------------------
    public function array_category_new()
    {
        
        /*$data = Category::find()->orderBy(['category'=>'ewrwer'])->with('notebooksnew','tabletsnew','audionew',
                'cameranew','tvnew','smartiphonenew','videocameranew')->all();
        */
        //-- sql -- для бд старт
        
        $query_1 = new Query();
        
        $query01 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //audio
                ->addSelect(['audio.id','audio.path','audio.path_2','audio.name_type_of_subcategory','audio.model_product','audio.price','audio.old_price',
                    'audio.price_sort','audio.discount','audio.link_description','audio.marketing_products','audio.date','audio.description','audio.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','audio','category.type_of_subcategory=audio.name_type_of_subcategory')
                ->addOrderBy(['audio.name_type_of_subcategory'=>';lk;lk'])
                ->where(['audio.marketing_products' => 'new']);
                
        
        $query02 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //notebook
                ->addSelect(['notebook.id','notebook.path','notebook.path_2','notebook.name_type_of_subcategory','notebook.model_product','notebook.price','notebook.old_price',
                    'notebook.price_sort','notebook.discount','notebook.link_description','notebook.marketing_products','notebook.date','notebook.description','notebook.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','notebook','category.type_of_subcategory=notebook.name_type_of_subcategory')
                ->addOrderBy(['notebook.name_type_of_subcategory'=>';lk;lk'])
                ->where(['notebook.marketing_products' => 'new']);
        
        $query03 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //camera
                ->addSelect(['camera.id','camera.path','camera.path_2','camera.name_type_of_subcategory','camera.model_product','camera.price','camera.old_price',
                    'camera.price_sort','camera.discount','camera.link_description','camera.marketing_products','camera.date','camera.description','camera.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','camera','category.type_of_subcategory=camera.name_type_of_subcategory')
                ->addOrderBy(['camera.name_type_of_subcategory'=>';lk;lk'])
                ->where(['camera.marketing_products' => 'new']);
        
        $query04 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //videocamera
                ->addSelect(['videocamera.id','videocamera.path','videocamera.path_2','videocamera.name_type_of_subcategory','videocamera.model_product','videocamera.price','videocamera.old_price',
                    'videocamera.price_sort','videocamera.discount','videocamera.link_description','videocamera.marketing_products','videocamera.date','videocamera.description','videocamera.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','videocamera','category.type_of_subcategory=videocamera.name_type_of_subcategory')
                ->addOrderBy(['videocamera.name_type_of_subcategory'=>';lk;lk'])
                ->where(['videocamera.marketing_products' => 'new']);
        
        $query05 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //tablet
                ->addSelect(['tablet.id','tablet.path','tablet.path_2','tablet.name_type_of_subcategory','tablet.model_product','tablet.price','tablet.old_price',
                    'tablet.price_sort','tablet.discount','tablet.link_description','tablet.marketing_products','tablet.date','tablet.description','tablet.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','tablet','category.type_of_subcategory=tablet.name_type_of_subcategory')
                ->addOrderBy(['tablet.name_type_of_subcategory'=>';lk;lk'])
                ->where(['tablet.marketing_products' => 'new']);
        
        $query06 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //tv
                ->addSelect(['tv.id','tv.path','tv.path_2','tv.name_type_of_subcategory','tv.model_product','tv.price','tv.old_price',
                    'tv.price_sort','tv.discount','tv.link_description','tv.marketing_products','tv.date','tv.description','tv.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','tv','category.type_of_subcategory=tv.name_type_of_subcategory')
                ->addOrderBy(['tv.name_type_of_subcategory'=>';lk;lk'])
                ->where(['tv.marketing_products' => 'new']);
        
        $query07 = (new Query())->select(['category.category','category.subcategory','category.category_english','category.type_of_subcategory',
                    'category.link_category','category.link_subcategory','category.link_type_subcategory','category.id_seo_search_category','category.id_seo_search_subcategory',
                    'category.id_seo_search_type_of_subcategory'])
                //smartiphone
                ->addSelect(['smartiphone.id','smartiphone.path','smartiphone.path_2','smartiphone.name_type_of_subcategory','smartiphone.model_product','smartiphone.price','smartiphone.old_price',
                    'smartiphone.price_sort','smartiphone.discount','smartiphone.link_description','smartiphone.marketing_products','smartiphone.date','smartiphone.description','smartiphone.number_of_products'])
                ->from('category')->orderBy(['category'=>'wrewr'])
                ->join('LEFT JOIN','smartiphone','category.type_of_subcategory=smartiphone.name_type_of_subcategory')
                ->addOrderBy(['smartiphone.name_type_of_subcategory'=>';lk;lk'])
                ->where(['smartiphone.marketing_products' => 'new']);
        
       //Объединяем подзапросы в один запрос с помощью union 
        $query01->union($query02);//->createCommand();
        $query01->union($query03);
        $query01->union($query04);
        $query01->union($query05);
        $query01->union($query06);
        
        $rty = $query01->union($query07);
        
        $quer = new Query();
        $data_1 = $quer->select(['category','subcategory','category_english','type_of_subcategory',
                    'link_category','link_subcategory','link_type_subcategory','id_seo_search_category','id_seo_search_subcategory',
                    'id_seo_search_type_of_subcategory','id','path','path_2','name_type_of_subcategory','model_product','price','old_price',
                    'price_sort','discount','link_description','marketing_products','date','description','number_of_products'])->from($rty)->orderBy(['category'=>'wer'])
                ->addOrderBy(['subcategory'=>'wer'])->all();
        
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
                        $with = 'notebooksnew';
                        break;
                    case 'tablet':
                        $with = 'tabletsnew';
                        break;
                    case 'audio':
                        $with = 'audionew';
                        break;
                    case 'tv':
                        $with = 'tvnew';
                        break;
                    case 'videocamera':
                        $with = 'videocamerabestceller';
                        break;
                    case 'smartiphone':
                        $with = 'smartiphonebestceller';
                        break;
                    case 'camera':
                        $with = 'camerabestceller';
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
                    $data_2[$u][$with][0]['description'] = $data0['description'];
                    $data_2[$u][$with][0]['number_of_products']  = $data0['number_of_products'];
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
                    $data_2[$u][$with][$l]['description'] = $data0['description'];
                    $data_2[$u][$with][$l]['number_of_products']  = $data0['number_of_products'];
                    $l++;        
                }
            }
            
        }
        //debug($data_2);
        //debug($data);
        //die();
        $data = $data_2;
        
        //-- sql -- для бд конец
        
        //debug($data);
        //die();
        
        
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
    //----------------------------------
    
    
    public function sort_marketing($category_data){
       
       $i_sor = 0; $k_sor = 0;
        $market_product = [];
        
        //выбираем и сортируем продукты по параметру marketing_products
        //debug($category_data);die();
        foreach($category_data as $category_sort)
        {
            
            foreach($category_sort as $market_product_sort){
                
                if( isset($market_product_sort['notebooks']) ) //if( $market_product_sort['notebooks'] != null )
                {
                    $market_product = $market_product_sort['notebooks'];
                }
                elseif( isset($market_product_sort['tablets'])/*$market_product_sort['tablets'] != null*/ )
                {
                    $market_product = $market_product_sort['tablets'];
                }
                elseif(isset($market_product_sort['audio'])/*$market_product_sort['audio'] != null*/ )
                {
                    $market_product = $market_product_sort['audio'];
                }
                elseif(isset($market_product_sort['camera']) /*$market_product_sort['camera'] != null*/ )
                {
                    $market_product = $market_product_sort['camera'];
                }
                elseif( isset($market_product_sort['tv'])/*$market_product_sort['tv'] != null*/ )
                {
                    $market_product = $market_product_sort['tv'];
                }
                elseif( isset($market_product_sort['smartiphone'])/*$market_product_sort['smartiphone'] != null*/ )
                {
                    $market_product = $market_product_sort['smartiphone'];
                }
                elseif( isset($market_product_sort['videocamera'])/*$market_product_sort['videocamera'] != null*/ )
                {
                    $market_product = $market_product_sort['videocamera'];
                }
                else{
                    $market_product = [];
                }
                
                //die();
                //---------------------------------------------------
                //доп. код надо вставить
                //
                //---------------------------------------------------
                //debug($market_product);die();
                
                foreach($market_product as $product){
                    
                    if( isset($product['marketing_products'])/*$product['marketing_products'] != null*/)
                    {   
                        if($product['marketing_products'] != null)
                        {
                            $i_sor++;
                            $k_sor++;
                            $sort_marketing[$i_sor][$product['marketing_products']][$k_sor] = $product;
                        }
                    }
                }
            }
        }
        
        //debug($sort_marketing);
        //перемешиваем продукты из разных категорий
        $i_sor = 1;
        $j_sor = 1;
        $market_category = [];
        $i_mark = 0;
        foreach($sort_marketing as $sort)
        {
            $key = array_keys($sort);
            
            for($i = 0; $i < count($key); $i++)
            {
                if(in_array($key[$i], $market_category) == false){
                    $market_category[$i_mark] = $key[$i];
                    $i_mark++;
                }
            
            }
        }
        $count_product = 0; $i_1 = 1;
        $sort_products = [];
        
        $var_null = 0;
        $count_sort_marketing = count($sort_marketing);
        
        $i_1 = 0;
        //debug($market_category);
        //debug($sort_marketing);
        //die();
        for($i = 0; $i < count($market_category); $i++)
        {
                while( $count_sort_marketing >= $var_null )
                {
                    for($j = 1; $j <= $count_sort_marketing; $j++)
                    {
                        if(array_key_exists($market_category[$i], $sort_marketing[$j]) != null )
                        { 
                            list($key, $val) = each($sort_marketing[$j][$market_category[$i]]);
                        }
                        else
                        {
                            $val = 0;
                        }
                        
                        if($val != null)
                        {
                            $sort_products[$market_category[$i]][$i_1] = $val;
                            $i_1++;
                            $var_null = 0;
                        }
                        else{
                            $var_null++;
                        }
                        
                    }
                }
            
            $var_null = 0;
            
            
        }
        //debug($sort_products);
        //удаляем продукты без маркетинга
        foreach($sort_products as $on_products)
        {
            $key_sort = array_search($on_products, $sort_products);
            
            if( $key_sort == null || ctype_space($key_sort)  )
            {
                unset($sort_products[$key_sort]);
            }
        }
        //debug($sort_products);
        //die();
        return $sort_products;
    }
    
    
    public function sort_marketing_bestceller($category_data){
       
       $i_sor = 0; $k_sor = 0;
        $market_product = [];
        $k_sor_example = 0;
        //выбираем и сортируем продукты по параметру marketing_products
        
        foreach($category_data as $category_sort)
        {
            if( $k_sor_example == 1)
            {
                $i_sor++;
                $k_sor_example = 0;
            }
            
            
            foreach($category_sort as $market_product_sort){
                
                if( isset($market_product_sort['notebooksbestceller'])/*$market_product_sort['notebooksbestceller'] != null */)
                {
                    $market_product = $market_product_sort['notebooksbestceller'];
                }
                elseif( isset($market_product_sort['tabletsbestceller']) )
                {
                    $market_product = $market_product_sort['tabletsbestceller'];
                }
                elseif( isset($market_product_sort['audiobestceller']) )
                {
                    $market_product = $market_product_sort['audiobestceller'];
                }
                elseif( isset($market_product_sort['camerabestceller']) )
                {
                    $market_product = $market_product_sort['camerabestceller'];
                }
                elseif( isset($market_product_sort['tvbestceller']) )
                {
                    $market_product = $market_product_sort['tvbestceller'];
                }
                elseif( isset($market_product_sort['videocamerabestceller']) )
                {
                    $market_product = $market_product_sort['videocamerabestceller'];
                }
                elseif( isset($market_product_sort['smartiphonebestceller']) )
                {
                    $market_product = $market_product_sort['smartiphonebestceller'];
                }
                else{
                    $market_product = [];
                }
                //---------------------------------------------------
                //доп. код надо вставить
                //
                //---------------------------------------------------
                
                foreach($market_product as $product){
                    
                    if($product['marketing_products'] != null)
                    {
                        $k_sor++;
                        $sort_marketing[$i_sor][$product['marketing_products']][$k_sor] = $product;
                        $k_sor_example = 1;
                    }
                }
            }
        }
        
        //debug($sort_marketing);
        //перемешиваем продукты из разных категорий
        $i_sor = 1;
        $j_sor = 1;
        $market_category = [];
        $i_mark = 0;
        foreach($sort_marketing as $sort)
        {
            $key = array_keys($sort);
            
            for($i = 0; $i < count($key); $i++)
            {
                if(in_array($key[$i], $market_category) == false){
                    $market_category[$i_mark] = $key[$i];
                    $i_mark++;
                }
            
            }
        }
        $count_product = 0; $i_1 = 1;
        $sort_products = [];
        
        $var_null = 0;
        $count_sort_marketing = count($sort_marketing);
        
        $i_1 = 0;
        $i_start = array_key_first($sort_marketing); //получаем ключ первого элемента массива 
        $count_sort_marketing = count($sort_marketing) - 1 + $i_start; //считаем кол-во категорий продукта с учётом начального (первого элемента) ключа в массиве
        
        for($i = 0; $i < count($market_category); $i++)
        {
                while( $count_sort_marketing >= $var_null )
                {
                    for($j = $i_start; $j <= $count_sort_marketing; $j++)
                    {
                        if(isset($sort_marketing[$j])){
                            if(array_key_exists($market_category[$i], $sort_marketing[$j]) != null )
                            { 
                                list($key, $val) = each($sort_marketing[$j][$market_category[$i]]);
                            }
                            else
                            {
                                $val = 0;
                            }
                        }
                        else{
                            $val = 0;
                        }
                        
                        if($val != null)
                        {
                            $sort_products[$market_category[$i]][$i_1] = $val;
                            $i_1++;
                            $var_null = 0;
                        }
                        else{
                            $var_null++;
                        }
                    }
                }
            
            $var_null = 0;
            
            
        }
        //debug($sort_products);
        
        //die();
        return $sort_products;
    }

    
    /**/
     public function sort_marketing_new($category_data){
       
       $i_sor = 0; $k_sor = 0;$l_sor = 0;
        $market_product = [];
        $sort_marketing = null;
        //debug($category_data);
        $k_sor_example = 0; 
        //выбираем и сортируем продукты по параметру marketing_products
        foreach($category_data as $category_sort)
        {
            if($k_sor_example == 1)
            {
                $k_sor_example = 0;
                $i_sor++;
            }
            
            foreach($category_sort as $market_product_sort){
                
                if( $market_product_sort['notebooksnew'] != null )
                {
                    $market_product = $market_product_sort['notebooksnew'];
                }
                elseif( $market_product_sort['tabletsnew'] != null )
                {
                    $market_product = $market_product_sort['tabletsnew'];
                }
                
                elseif( $market_product_sort['audionew'] != null )
                {
                    $market_product = $market_product_sort['audionew'];
                }
                elseif( $market_product_sort['cameranew'] != null )
                {
                    $market_product = $market_product_sort['cameranew'];
                }
                elseif( $market_product_sort['tvnew'] != null )
                {
                    $market_product = $market_product_sort['tvnew'];
                }
                elseif( $market_product_sort['videocameranew'] != null )
                {
                    $market_product = $market_product_sort['videocameranew'];
                }
                elseif( $market_product_sort['smartiphonenew'] != null )
                {
                    $market_product = $market_product_sort['smartiphonenew'];
                }
                else{
                    $market_product = [];
                }
                //---------------------------------------------------
                //доп. код надо вставить
                //
                //---------------------------------------------------
                
                foreach($market_product as $product){
                    
                    if($product['marketing_products'] != null)
                    {
                        $k_sor++;
                        $sort_marketing[$i_sor][$product['marketing_products']][$k_sor] = $product; //отсортированные продукты по категориям и по меркетингу
                        $k_sor_example = 1;
                    }
                }
                
            }
        }
        if($sort_marketing == null)
        {
            $sort_marketing['new'] = null;
            return $sort_marketing;
        }
        //debug($sort_marketing);
        //die();
        //перемешиваем продукты из разных категорий
        $i_sor = 1;
        $j_sor = 1;
        $market_category = [];
        $i_mark = 0;
        
        //считаем количество разновидностей маркетинга продуктов :new, sale ...
        foreach($sort_marketing as $sort)
        {
            $key = array_keys($sort);
            
            for($i = 0; $i < count($key); $i++)
            {
                if(in_array($key[$i], $market_category) == false){
                    $market_category[$i_mark] = $key[$i];
                    $i_mark++;
                }
            }
        }
        $count_market_category = count($market_category);
        
        $count_product = 0; $i_1 = 1;
        $sort_products = []; $var_null = 0;
        $i_start = array_key_first($sort_marketing); //получаем ключ первого элемента массива 
        $count_sort_marketing = count($sort_marketing) - 1 + $i_start; //считаем кол-во категорий продукта с учётом начального (первого элемента) ключа в массиве
        $i_1 = 0;
        //debug(count($sort_marketing));
        //debug($count_sort_marketing);
        //die();
        //непосредственное перемешивание продуктов из разных массивов
        
        for( $i = 0; $i < $count_market_category; $i++ )
        {
                while( $count_sort_marketing >= $var_null )
                {
                    for($j = $i_start; $j <= $count_sort_marketing; $j++)
                    {
                        if(isset($sort_marketing[$j]))
                        {
                            if(array_key_exists($market_category[$i], $sort_marketing[$j]) != null )
                            { 
                                list($key, $val) = each($sort_marketing[$j][$market_category[$i]]);//получаем текущее значение( пары: ключ, значение )и смещаем указатель на 1(+1) 
                            }
                            else
                            {
                                $val = 0;
                            }
                            
                        }
                        else{
                            $val = 0;
                        }
                        
                        
                        if($val != null)
                        {
                            $sort_products[$market_category[$i]][$i_1] = $val; //формируем отсортированный список
                            $i_1++;
                            $var_null = 0;
                        }
                        else{
                            $var_null++;
                        }
                        
                    }
                }
            
            $var_null = 0;
        }
        //debug(count($sort_products['new']));
        //debug($sort_products);
        
        
       
        return $sort_products;
    }
    /**/
    
    /*пагинация с сортировкой*/
    public function sort_marketing_pagination($category_data, $limit, $url){
       
       $i_sor = 0; $k_sor = 0;$l_sor = 0;
        $market_product = [];
        $sort_marketing = null;
        //debug($category_data);
        $k_sor_example = 0; 
        //выбираем и сортируем продукты по параметру marketing_products
        foreach($category_data as $category_sort)
        {
            if($k_sor_example == 1)
            {
                $k_sor_example = 0;
                $i_sor++;
            }
            
            foreach($category_sort as $market_product_sort){
                
                //if( $market_product_sort['notebooksnew'] != null )
                if( isset($market_product_sort['notebooksnew']) )
                {
                    $market_product = $market_product_sort['notebooksnew'];
                }
                elseif( isset($market_product_sort['tabletsnew']) )
                {
                    $market_product = $market_product_sort['tabletsnew'];
                }
                
                elseif( isset($market_product_sort['audionew']) )
                {
                    $market_product = $market_product_sort['audionew'];
                }
                elseif( isset($market_product_sort['cameranew']) )
                {
                    $market_product = $market_product_sort['cameranew'];
                }
                elseif( isset($market_product_sort['tvnew']) )
                {
                    $market_product = $market_product_sort['tvnew'];
                }
                elseif( isset($market_product_sort['videocameranew']) )
                {
                    $market_product = $market_product_sort['videocameranew'];
                }
                elseif( isset($market_product_sort['smartiphonenew']) )
                {
                    $market_product = $market_product_sort['smartiphonenew'];
                }
                else{
                    $market_product = [];
                }
                //---------------------------------------------------
                //доп. код надо вставить
                //
                //---------------------------------------------------
                
                foreach($market_product as $product){
                    
                    if($product['marketing_products'] != null)
                    {
                        $k_sor++;
                        $sort_marketing[$i_sor][$product['marketing_products']][$k_sor] = $product; //отсортированные продукты по категориям и по меркетингу
                        $k_sor_example = 1;
                    }
                }
                
            }
        }
        if($sort_marketing == null)
        {
            $sort_marketing['new'] = null;
            return $sort_marketing;
        }
        //debug($sort_marketing);
        //die();
        //перемешиваем продукты из разных категорий
        $i_sor = 1;
        $j_sor = 1;
        $market_category = [];
        $i_mark = 0;
        
        //считаем количество разновидностей маркетинга продуктов :new, sale ...
        foreach($sort_marketing as $sort)
        {
            $key = array_keys($sort);
            
            for($i = 0; $i < count($key); $i++)
            {
                if(in_array($key[$i], $market_category) == false){
                    $market_category[$i_mark] = $key[$i];
                    $i_mark++;
                }
            }
        }
        $count_market_category = count($market_category);
        
        $count_product = 0; $i_1 = 1;
        $sort_products = []; $var_null = 0;
        $i_start = array_key_first($sort_marketing); //получаем ключ первого элемента массива 
        $count_sort_marketing = count($sort_marketing) - 1 + $i_start; //считаем кол-во категорий продукта с учётом начального (первого элемента) ключа в массиве
        $i_1 = 0;
        
        //непосредственное перемешивание продуктов из разных массивов
        
        for( $i = 0; $i < $count_market_category; $i++ )
        {
                while( $count_sort_marketing >= $var_null )
                {
                    for($j = $i_start; $j <= $count_sort_marketing; $j++)
                    {
                        if(isset($sort_marketing[$j]))
                        {
                            if(array_key_exists($market_category[$i], $sort_marketing[$j]) != null )
                            { 
                                list($key, $val) = each($sort_marketing[$j][$market_category[$i]]);//получаем текущее значение( пары: ключ, значение )и смещаем указатель на 1(+1) 
                            }
                            else
                            {
                                $val = 0;
                            }
                            
                        }
                        else{
                            $val = 0;
                        }
                        
                        
                        if($val != null)
                        {
                            $sort_products[$market_category[$i]][$i_1] = $val; //формируем отсортированный список
                            $i_1++;
                            $var_null = 0;
                        }
                        else{
                            $var_null++;
                        }
                        
                    }
                }
            
            $var_null = 0;
        }
        //debug(count($sort_products['new']));
        //debug($sort_products);
        //вычисляем объём данных
        $new_sort_products['new'] = null;
        
        $Url = explode('&', $url);
        $count_url = count($Url);
        $start = 0;
        if($count_url == 1)
        {
            $start = 0;
        }
        else{
            $page = str_replace('page=', '', $Url[1]);
            $page = (int) $page;
            $start = ($page - 1)* $limit;
            if($start<0)
            {
                $start = 0;
            }
        }
        
        $max = $start + $limit; $j = 0;
        $count_all = count($sort_products['new']);
        
        $pages = new Pagination(['totalCount' => $count_all, 
            'pageSize' => $limit]);
        
        if($count_all < $max)
        {
            $max = $count_all; 
        }
        
        for($i = $start; $i < $max; $i++)
        {
            $new_sort_products['new'][$j] = $sort_products['new'][$i];
            $j++;
        }
        
       
        return [$new_sort_products, $count_all, $pages];
    }
    /*пагинация с сортировкой конец*/
    
    public function breadcrumbs($URL_PATH)
    {
        $URL_PATH = str_replace('index.php?r', 'index.php?r=', $URL_PATH);
        $data_category = explode('&', $URL_PATH);
       //debug($data_category);
        $count_data_category = count($data_category);
        //debug($count_data_category);
        //debug($URL_PATH);//die();
        $category = null;
        $product_all = null;
        switch($count_data_category)
        {
            case 1:
                $product_all = 1;
                break;
            case 2:
                $product_all = 1;
                //$category = Category::findOne(['link_category'=>$URL_PATH]);
                //debug($category);
                //debug($URL_PATH);
                
                //код seo для категории
                $query_1 = new Query();
                $category = $query_1->from('category')
                    ->where(['link_category'=>$URL_PATH])
                    ->join('LEFT JOIN','seo_search_category',
                            'seo_search_category.id = category.id_seo_search_category')->one();
                //debug($cetegory_n);
                //die();
                
                
                break;
            case 3:
                $product_all = 1;
                //$category = Category::findOne(['link_subcategory'=>$URL_PATH]);
                //код seo для подкатегории
                $query_1 = new Query();
                $category = $query_1->from('category')
                    ->where(['link_subcategory'=>$URL_PATH])
                    ->join('LEFT JOIN','seo_search_subcategory',
                            'seo_search_subcategory.id = category.id_seo_search_subcategory')->one();
                //debug($category);
                //                die();
                break;
            case 4:
                $product_all = 0;
                //$category = Category::findOne(['link_type_subcategory'=>$URL_PATH]);
                //код seo для типа подкатегории
                $query_1 = new Query();
                $category = $query_1->from('category')
                    ->where(['link_type_subcategory'=>$URL_PATH])
                    ->join('LEFT JOIN','seo_search_type_of_subcategory',
                            'seo_search_type_of_subcategory.id = category.id_seo_search_type_of_subcategory')->one();
                break;
            default:
                $product_all = 1;
                break;
        }
        return [$category, $product_all, $count_data_category];
    }
    
    public function breadcrumbs_details($URL_PATH, $products)
    {
        $data_category = explode('&', $URL_PATH);
        
        //debug($data_category);
        //debug($products);
        //die();
        $count_data_category = count($data_category);
        $category = null;
        switch($count_data_category)
        {
            case 1:
                $category = null;
                break;
            case 3:
                
                $category = Category::findOne(['category_english' => $products[0]['category_english']]);
                break;

            default:
                $category = null;
                break;
        }
        return [$category, $count_data_category];
    }
    
    public function search_data($data, $url, $limit){
        
        //debug($data);
        $category = $data['category'];
        $pages = [];/*new Pagination(['totalCount' => 0, 
            'pageSize' => 0]);*/
        $coincidence_array_subcategory = [];
        
        $pages[0] = 0;
        $pages[1] = 0;
        
        //переводим запрос к нижнему регистру
        $search = mb_strtolower($data['search']);
        
        if($category != null)
        {
            //debug('null');
            $all_array = [];
            //читаем базу данных категории
            $query_1 = new Query();
            $sql = $query_1->from($category)
                           //->select(['category','subcategory','category_english','type_of_subcategory','link_type_subcategory'])
                           ->orderBy(['link_subcategory'=>'wer'])
                           ->all();
            
            array_push($all_array, $sql);
            //debug($all_array);
            //определяем вид запроса количество слов в запросе
            $get_search = explode(' ', $search);
            //осуществляем поиск по считанным данным
            
            $coincidence_array_product = $this->search_product($get_search, $all_array);
            //debug($coincidence_array_product);
            //die();
                
        }
        else
        {
            //debug('nonull');
            if($search == null)
            {
                return [null, $pages];
            }
            else{
                //определяем вид запроса количество слов в запросе
                $get_search = explode(' ', $search);
                //считаем кол-во слов в запросе
                $count_search = count($get_search);
                if($count_search == 1) //если одно слово в поиске
                {
                    //ищем в подкатегориях
                    
                    /*считываем табличку с категориями*/
                    $query_1 = new Query();
                    $subcategory = $query_1->from('category')
                            ->select(['category','subcategory','category_english','type_of_subcategory','link_type_subcategory'])
                            ->orderBy(['category'=>'wer'])
                            ->all();
                    $u = 0;
                    
                    foreach($subcategory as $update_subcategory)
                    {
                        $new_link = explode('&',$update_subcategory['link_type_subcategory']);
                        
                        $subcategory[$u]['link_type_subcategory'] = end($new_link);
                        $u++;
                    }
                    /* ищем совпадение с подкатегориями и с типами подкатегорий */
                    /* преобразуем строку в массив*/
                    $search_arr = mb_str_split($search);
                    /*определяем размерность массива*/
                    $count_search_arr = count($search_arr);
                    
                    //совпадение со словами (начало)
                    $index = 0; $coincidence = 0; $max_search = 0; 
                    foreach($subcategory as $one_subcategory)
                    {
                        /*--- совпадение с подкатегориями ---*/
                        // определяем количество слов в подкатегории или с типом подкатегории
                        for($j = 0; $j < 2; $j++)
                        {
                            switch($j){
                                case(0):
                                    $gt = mb_strtolower($one_subcategory['subcategory']);
                                    $get_sub = explode(' ', $gt);
                                    break;
                                case(1):
                                    $gt = mb_strtolower($one_subcategory['type_of_subcategory']);
                                    $get_sub = explode(' ', $gt);
                                    break;
                            }
                            
                            if( count($get_sub) > 1 ) //если несколько слов 
                            {
                                
                                foreach($get_sub as $sub)
                                {
                                    //преобразуем строку в массив
                                    $one_sub_arr = mb_str_split($sub);
                                    $count_one_sub_arr = count($one_sub_arr);
                                    //определяем у кого размерность больше (у слова из подкатегории или у поискового запроса)
                                    if($count_one_sub_arr > $count_search_arr)
                                    {
                                        $max_search = $count_search_arr;
                                    }
                                    else{
                                        $max_search = $count_one_sub_arr;                                
                                    }
                                    $coincidence = 0;
                                    for($i = 0; $i < $max_search; $i++)
                                    {
                                        if($search_arr[$i] == $one_sub_arr[$i]) //считаем количество совпадений букв в слове
                                        {
                                            $coincidence++;
                                            $subcategory[$index]['coincidence_subcategory'] = $coincidence;
                                            switch($j){
                                                case(0):
                                                    if(isset($subcategory[$index]['coincidence_subcategory']))
                                                    {
                                                        if($subcategory[$index]['coincidence_subcategory'] < $coincidence)
                                                        {
                                                            $subcategory[$index]['coincidence_subcategory'] = $coincidence;
                                                        }
                                                    }
                                                    else{
                                                        $subcategory[$index]['coincidence_subcategory'] = $coincidence;
                                                    }

                                                    break;
                                                case(1):
                                                    if(isset($subcategory[$index]['coincidence_type_of_subcategory']))
                                                    {
                                                        if($subcategory[$index]['coincidence_type_of_subcategory'] < $coincidence)
                                                        {
                                                            $subcategory[$index]['coincidence_type_of_subcategory'] = $coincidence;
                                                        }
                                                    }
                                                    else{
                                                        $subcategory[$index]['coincidence_type_of_subcategory'] = $coincidence;
                                                    }
                                                    //$subcategory[$index]['coincidence_type_of_subcategory'] = $coincidence;
                                                    break;
                                            }
                                        }
                                        else{

                                            break;
                                        }
                                    }
                                    //----------------------
                                    if( $coincidence > 0 )
                                    {
                                        $coincidence_array_subcategory[$index] = $subcategory[$index];
                                    }
                                    //----------------------
                                }
                                
                            }
                            else
                            {
                                //преобразуем строку в массив
                                $one_sub_arr = mb_str_split($get_sub[0]);
                                $count_one_sub_arr = count($one_sub_arr);
                                //определяем у кого размерность больше (у слова из подкатегории или у поискового запроса)
                                if($count_one_sub_arr > $count_search_arr)
                                {
                                    $max_search = $count_search_arr;
                                }
                                else{
                                    $max_search = $count_one_sub_arr;                                
                                }
                                $coincidence = 0;
                                for($i = 0; $i < $max_search; $i++)
                                {
                                    if($search_arr[$i] == $one_sub_arr[$i]) //считаем количество совпадений букв в слове
                                    {
                                        $coincidence++;
                                        $subcategory[$index]['coincidence_subcategory'] = $coincidence;
                                        switch($j){
                                            case(0):
                                                $subcategory[$index]['coincidence_subcategory'] = $coincidence;
                                                break;
                                            case(1):
                                                $subcategory[$index]['coincidence_type_of_subcategory'] = $coincidence;
                                                break;
                                        }
                                    }
                                    else{

                                        break;
                                    }
                                }
                                //----------------------
                                if( $coincidence > 0 )
                                {
                                    $coincidence_array_subcategory[$index] = $subcategory[$index];
                                }
                                //----------------------
                            }
                        }
                        
                        $index++;
                    }
                    //совпадение со словами (конец)
                    //debug($subcategory);
                    //debug($coincidence_array_subcategory);
                    //die();
                    
                    //ищем в продуктах
                    
                    //die();
                }
                else // если не одно слово в поиске
                {
                    //ищем в подкатегориях
                    /*считываем табличку с категориями*/
                    $query_1 = new Query();
                    $subcategory = $query_1->from('category')
                            ->select(['category','subcategory','category_english','type_of_subcategory','link_type_subcategory'])
                            ->orderBy(['category'=>'wer'])
                            ->all();

                    $u = 0;
                    //перезаписываем значение параметра link_type_subcategory
                    foreach($subcategory as $update_subcategory)
                    {
                        $new_link = explode('&',$update_subcategory['link_type_subcategory']);
                        $subcategory[$u]['link_type_subcategory'] = end($new_link);
                        $u++;
                    }

                    /* ищем совпадение с подкатегориями и с типами подкатегорий */
                    
                    //----- разделяем слова в запросе (для поиска) -----//
                    $m = 0; //определяет кол-во совпадений букв в запросе
                    $n = 0; //определяет кол-во совпадений букв в запросе
                    /* ===== начало ===== */
                    
                    foreach ($get_search as $search_arr1)
                    {
                        /* преобразуем строку в массив */
                        $search_arr = mb_str_split($search_arr1);
                        
                        /*определяем размерность массива*/
                        $count_search_arr = count($search_arr);

                        //совпадение со словами (начало)
                        $index = 0; $coincidence = 0; $max_search = 0;
                        foreach($subcategory as $one_subcategory)
                        {
                            $m = 0; $n = 0;
                            /*--- совпадение с подкатегориями ---*/
                            // определяем количество слов в подкатегории или с типом подкатегории
                            for($j = 0; $j < 2; $j++)
                            {
                                switch($j){
                                    case(0):
                                        $gt = mb_strtolower($one_subcategory['subcategory']);
                                        $get_sub = explode(' ', $gt);
                                        break;
                                    case(1):
                                        $gt = mb_strtolower($one_subcategory['type_of_subcategory']);
                                        $get_sub = explode(' ', $gt);
                                        break;
                                }

                                if( count($get_sub) > 1 ) //если несколько слов 
                                {
                                    foreach($get_sub as $sub)
                                    {
                                        //преобразуем строку в массив
                                        $one_sub_arr = mb_str_split($sub);
                                        $count_one_sub_arr = count($one_sub_arr);
                                        //определяем у кого размерность больше (у слова из подкатегории или у поискового запроса)
                                        if($count_one_sub_arr > $count_search_arr)
                                        {
                                            $max_search = $count_search_arr;
                                        }
                                        else{
                                            $max_search = $count_one_sub_arr;                                
                                        }
                                        $coincidence = 0;
                                        for($i = 0; $i < $max_search; $i++)
                                        {
                                            if($search_arr[$i] == $one_sub_arr[$i]) //считаем количество совпадений букв в слове
                                            {
                                                $coincidence++;
                                                
                                                switch($j){
                                                    case(0):
                                                        if(isset($subcategory[$index]['coincidence_subcategory']))
                                                        {
                                                            if( $m < $coincidence )
                                                            {
                                                                $m = $coincidence;
                                                                $subcategory[$index]['coincidence_subcategory']++; //записываем результат
                                                            }
                                                        }
                                                        else{
                                                            $subcategory[$index]['coincidence_subcategory'] = $coincidence; // записываем результат
                                                            $m = $coincidence;
                                                        }
                                                        
                                                        break;
                                                    case(1):
                                                        if(isset($subcategory[$index]['coincidence_type_of_subcategory']))
                                                        {
                                                            if( $n < $coincidence )
                                                            {
                                                                $n = $coincidence;
                                                                $subcategory[$index]['coincidence_type_of_subcategory']++;
                                                            }
                                                        }
                                                        else{
                                                            $subcategory[$index]['coincidence_type_of_subcategory'] = $coincidence;
                                                            $n = $coincidence;
                                                        }
                                                        
                                                        break;
                                                }
                                            }
                                            else{
                                                break;
                                            }
                                        }
                                        //----------------------
                                        if( $coincidence > 0 )
                                        {
                                            $coincidence_array_subcategory[$index] = $subcategory[$index];
                                        }
                                        //----------------------
                                    }

                                }
                                else
                                {
                                    //преобразуем строку в массив
                                    $one_sub_arr = mb_str_split($get_sub[0]);
                                    $count_one_sub_arr = count($one_sub_arr);
                                    //определяем у кого размерность больше (у слова из подкатегории или у поискового запроса)
                                    if($count_one_sub_arr > $count_search_arr)
                                    {
                                        $max_search = $count_search_arr;
                                    }
                                    else{
                                        $max_search = $count_one_sub_arr;                                
                                    }
                                    $coincidence = 0;
                                    for($i = 0; $i < $max_search; $i++)
                                    {
                                        if($search_arr[$i] == $one_sub_arr[$i]) //считаем количество совпадений букв в слове
                                        {
                                            $coincidence++;
                                            
                                            switch($j){
                                                case(0):
                                                    $subcategory[$index]['coincidence_subcategory'] = $coincidence; //записываем результат
                                                    break;
                                                case(1):
                                                    $subcategory[$index]['coincidence_type_of_subcategory'] = $coincidence; //записываем результат
                                                    break;
                                            }
                                        }
                                        else{

                                            break;
                                        }
                                    }
                                    //----------------------
                                    if( $coincidence > 0 )
                                    {
                                        $coincidence_array_subcategory[$index] = $subcategory[$index];
                                    }
                                    //----------------------
                                }
                            }

                            $index++;
                        }
                        
                        //совпадение со словами (конец)
                    }
                    
                    /* ===== конец ===== */
                    
                }
                //кодом выше мы определили количество совпадений запроса с таблицой категории
                //определяем у какой категории больше совпадений(главное более 4) и в этой категории
                //начинаем искать товар 
                
                if($coincidence_array_subcategory == null) //если нету совпадений
                {
                    return [null, $pages];
                }
                $search_product = []; $i = 0; $search_category = []; $i_max = 0;
                $search_subcategory = []; $search_type_of_subcategory = [];
                
                //фильтруем подкатегории по совпадению с запросом
                //debug($coincidence_array_subcategory);die();
                foreach( $coincidence_array_subcategory as $array_subcategory )
                {
                    
                    //определяем те подкатегории(типы подкатегорий) у которых совпадений по буквам больше 3
                    if( isset($array_subcategory['coincidence_subcategory']) && isset($array_subcategory['coincidence_type_of_subcategory']) ){
                        if( $array_subcategory['coincidence_subcategory'] > 3 || $array_subcategory['coincidence_type_of_subcategory'] > 3 ) // порог доверенности
                        {      
                            //определяем категорию, в которой будем искать 
                            $search_product[$i] = $array_subcategory;
                            $i++;
                        }
                    }
                    elseif(isset($array_subcategory['coincidence_subcategory'])){
                        if( $array_subcategory['coincidence_subcategory'] > 3 ) // порог доверенности
                        {   
                            $array_subcategory['coincidence_type_of_subcategory'] = 0;
                            //определяем категорию, в которой будем искать 
                            $search_product[$i] = $array_subcategory;
                            $i++;
                        }
                    }
                    elseif(isset($array_subcategory['coincidence_type_of_subcategory']))
                    {
                        if( $array_subcategory['coincidence_type_of_subcategory'] > 3 ) // порог доверенности
                        {
                            $array_subcategory['coincidence_subcategory'] = 0;
                            //определяем категорию, в которой будем искать 
                            $search_product[$i] = $array_subcategory;
                            $i++;
                        }
                    }
                }
                //debug($search_product);
                //die();
                
                if($search_product == null) //если ни один массив не прошёл порог доверенности, то возвращаем null
                {
                    return [null, $pages];
                }
                //считаем количество подкатегорий или типов подкатегорий для sql - запроса
                $count_search_sql = count($search_product);
                //debug($count_search_sql);
                //die();
                $category_all = [];
                $new_number_array = [];
                $all_array = [];$i_s = 0;
                //debug($search_product);//die();
                
                if( $count_search_sql == 1 ) //если один массив для получения данных 
                {   
                    $query_2 = new Query();
                    if( $search_product[0]['coincidence_type_of_subcategory'] >= $search_product[0]['coincidence_subcategory'] ){
                        
                        $sql = $query_2->from($search_product[0]['category_english'])
                                ->where(['link_type_of_subcategory'=>$search_product[0]['link_type_subcategory']])
                                ->orderBy(['link_type_of_subcategory'=>'sdf'])
                                ->all();
                    }
                    else{
                        $sql = $query_2->from($search_product[0]['category_english'])
                                ->where(['name_type_of_subcategory'=>$search_product[0]['subcategory']])
                                ->orderBy(['link_type_of_subcategory'=>'sdf'])
                                ->all();
                    }
                    array_push($all_array, $sql);
                }
                else{ 
                    //если несколько массивов для получения данных
                    $subcategory_all = []; //для подкатегорий
                    //$type_of_subcategory_all = []; //для типов подкатегорий
                    
                    for($i = 0; $i < $count_search_sql; $i++) //объединяем массивы с одинаковой подкатегорией
                    {
                        //проверяем категорию
                        if(in_array($search_product[$i]['category_english'], $category_all)) //если категория одинаковая 
                        {
                            //проверяем подкатегорию
                            if( in_array($search_product[$i]['subcategory'], $subcategory_all))
                            {
                                if(isset($new_number_array[$search_product[$i]['category_english']][$i_s]['new_type_sub'])){
                                    array_push($new_number_array[$search_product[$i]['category_english']][$i_s]['new_type_sub'], $search_product[$i]['link_type_subcategory']); 
                                }
                                else{
                                    $new_number_array[$search_product[$i]['category_english']][$i_s]['new_type_sub'] = $search_product[$i]['link_type_subcategory'];
                                }
                            }//проверяем подкатегорию
                            else{
                                $i_s++;
                                //debug($new_number_array);
                                $new_number_array[$search_product[$i]['category_english']][$i_s]= $search_product[$i];
                                array_push($subcategory_all, $search_product[$i]['subcategory']);
                                if(isset($new_number_array[$search_product[$i]['category_english']][$i_s]['new_sub'])){
                                    $new_number_array[$search_product[$i]['category_english']][$i_s]['new_sub'] = [$search_product[$i]['subcategory']]; 
                                }
                                else{
                                    $new_number_array[$search_product[$i]['category_english']][$i_s]['new_sub'] = [$search_product[$i]['subcategory']];
                                }
                                if(isset($new_number_array[$search_product[$i]['category_english']][$i_s]['new_type_sub'])){
                                    $new_number_array[$search_product[$i]['category_english']][$i_s]['new_type_sub'] = [$search_product[$i]['link_type_subcategory']]; 
                                }
                                else{
                                    $new_number_array[$search_product[$i]['category_english']][$i_s]['new_type_sub'] = [$search_product[$i]['link_type_subcategory']];
                                }
                                //debug($new_number_array);die();
                            }    
                        }
                        else{ //добавляем категорию
                            $i_s = 0;
                            //$new_number_array[$search_product[$i]['category_english']] = $search_product[$i];
                            $new_number_array[$search_product[$i]['category_english']] = [];
                            array_push($new_number_array[$search_product[$i]['category_english']], $search_product[$i]);
                            //if( $search_product[$i]['coincidence_type_of_subcategory'] >= $search_product[$i]['coincidence_subcategory'] ){
                                $new_number_array[$search_product[$i]['category_english']][$i_s]['new_type_sub'] = [$search_product[$i]['link_type_subcategory']]; 
                            //}   
                            //else{
                                $new_number_array[$search_product[$i]['category_english']][$i_s]['new_sub'] = [$search_product[$i]['subcategory']]; 
                            //}
                            array_push($category_all, $search_product[$i]['category_english']);
                            array_push($subcategory_all, $search_product[$i]['subcategory']);
                            //array_push($type_of_subcategory_all, $search_product[$i]['type_of_subcategory']);
                        }
                        
                        
                        
                        
                    }
                    
                    $n = 0;
                    //debug($new_number_array);die();
                    
                    /*
                    foreach($new_number_array as $new) //добавляем новый параметр
                    {
                        if(isset($new['new_type_sub']) ){}
                        else{
                            $a = array_search($new,$new_number_array);
                            $new_number_array[$a]['new_type_sub'] = null;
                        }
                        if( isset($new['new_sub']) ){}
                        else{
                            $a = array_search($new,$new_number_array);
                            $new_number_array[$a]['new_sub'] = null;
                        }
                    }
                    */
                    
                    
                    //debug($new_number_array);
                    //die();
                    
                    $sql = null;
                    
                    $all_array = []; //создаём массив куда будем записывать все считанные данные
                    //считываем продукты из базы данных
                    //debug($new_number_array);die();
                    foreach( $new_number_array as $one_category )
                    {
                        foreach ( $one_category as $one_number_array ){
                            $query_3 = new Query();
                            //читаем данные для разных условий 
                            if($one_number_array['new_type_sub'] != null && $one_number_array['new_sub'] != null)
                            {
                                $sql = $query_3->from($one_number_array['category_english'])
                                        ->where(['name_type_of_subcategory'=>$one_number_array['new_sub']])
                                        ->orWhere(['link_type_of_subcategory'=>$one_number_array['new_type_sub']])
                                        ->all();
                            }
                            elseif($one_number_array['new_type_sub'] == null && $one_number_array['new_sub'] != null)
                            {
                                $sql = $query_3->from($one_number_array['category_english'])
                                        ->where(['name_type_of_subcategory'=>$one_number_array['new_sub']])
                                        ->all();
                            }
                            elseif($one_number_array['new_type_sub'] != null && $one_number_array['new_sub'] == null)
                            {
                                $sql = $query_3->from($one_number_array['category_english'])
                                        ->where(['link_type_of_subcategory'=>$one_number_array['new_type_sub']])
                                        ->all();
                            }

                            if($sql != null){
                                array_push($all_array, $sql);
                                $sql = null;
                            }
                            
                            
                        }
                    }
                    //$all_array = (new Query())->from
                    //die();
                    //debug($all_array);
                    //die();
                    
                }
                $count_all_array = count($all_array);
                if($count_all_array > 1) //проверяем на количество запроссов к бд
                {
                    $count_one = count($all_array);
                    for($i = 1; $i < $count_one; $i++){
                        foreach( $all_array[$i] as $on_arr)
                        {
                            array_push($all_array[0], $on_arr);
                        }
                        
                    }
                }
                //debug($all_array);
                //die();
                //debug($all_array);
                //die();
                
                if ( $all_array == null )
                {
                    return [null,$pages];
                }
                //проводим поиск на совпадение запроса со считанными продуктами
                /* ===== начало ===== */

                $m = 0; //определяет кол-во совпадений букв в запросе
                $n = 0; //определяет кол-во совпадений букв в запросе

                $position = 0;
                foreach ($get_search as $search_arr1)
                {
                    /* преобразуем строку в массив */
                    $search_arr = mb_str_split($search_arr1);

                    /*определяем размерность массива*/
                    $count_search_arr = count($search_arr);

                    //совпадение со словами (начало)
                    $index = 0; $coincidence = 0; $max_search = 0;
                    foreach($all_array[0] as $one_product)
                    {
                        $m = 0; $n = 0;
                        /*--- совпадение с подкатегориями ---*/
                        // определяем количество слов в подкатегории или с типом подкатегории
                        for($j = 1; $j < 2; $j++)
                        {
                            switch($j){
                                /*
                                case(0):
                                    $gt = mb_strtolower($one_subcategory['subcategory']);
                                    $get_sub = explode(' ', $gt);
                                    break;
                                 * 
                                 */
                                case(1):
                                    $gt = mb_strtolower($one_product['model_product']);
                                    $get_sub = explode(' ', $gt);
                                    break;
                                default:
                                    break;
                            }

                            if( count($get_sub) > 1 ) //если несколько слов 
                            {
                                foreach($get_sub as $sub)
                                {
                                    //преобразуем строку в массив
                                    $one_sub_arr = mb_str_split($sub);
                                    $count_one_sub_arr = count($one_sub_arr);
                                    //определяем у кого размерность больше (у слова из подкатегории или у поискового запроса)
                                    if($count_one_sub_arr > $count_search_arr)
                                    {
                                        $max_search = $count_search_arr;
                                    }
                                    else{
                                        $max_search = $count_one_sub_arr;                                
                                    }
                                    $coincidence = 0;
                                    for($i = 0; $i < $max_search; $i++)
                                    {
                                        if($search_arr[$i] == $one_sub_arr[$i]) //считаем количество совпадений букв в слове
                                        {
                                            $coincidence++;

                                            switch($j){
                                                /*
                                                case(0):
                                                    if(isset($all_array[0][$index]['coincidence_model_product']))
                                                    {
                                                        if( $m < $coincidence )
                                                        {
                                                            $m = $coincidence;
                                                            $all_array[0][$index]['coincidence_model_product']++; //записываем результат
                                                        }
                                                    }
                                                    else{
                                                        $all_array[0][$index]['coincidence_model_product'] = $coincidence; // записываем результат
                                                        $m = $coincidence;
                                                    }

                                                    break;
                                                 * 
                                                 */
                                                case(1):
                                                    if(isset($all_array[0][$index]['coincidence_model_product']))
                                                    {
                                                        if( $n < $coincidence )
                                                        {
                                                            $n = $coincidence;
                                                            $all_array[0][$index]['coincidence_model_product']++;
                                                        }
                                                    }
                                                    else{
                                                        $all_array[0][$index]['coincidence_model_product'] = $coincidence;
                                                        $n = $coincidence;
                                                    }

                                                    break;
                                                default :
                                                    break;
                                            } 
                                        }
                                        else{
                                            break;
                                        }
                                    }
                                    //----------------------

                                    if( $coincidence > 0 )
                                    {
                                        $coincidence_array_product[$index] = $all_array[0][$index];
                                    }
                                    //----------------------
                                }

                            }
                            else
                            {
                                //преобразуем строку в массив
                                $one_sub_arr = mb_str_split($get_sub[0]);
                                $count_one_sub_arr = count($one_sub_arr);
                                //определяем у кого размерность больше (у слова из подкатегории или у поискового запроса)
                                if($count_one_sub_arr > $count_search_arr)
                                {
                                    $max_search = $count_search_arr;
                                }
                                else{
                                    $max_search = $count_one_sub_arr;                                
                                }
                                $coincidence = 0;
                                for($i = 0; $i < $max_search; $i++)
                                {
                                    if($search_arr[$i] == $one_sub_arr[$i]) //считаем количество совпадений букв в слове
                                    {
                                        $coincidence++;

                                        switch($j){
                                            case(0):
                                                $all_array[0][$index]['coincidence_model_product'] = $coincidence; //записываем результат
                                                break;
                                            case(1):
                                                $all_array[0][$index]['coincidence_model_product'] = $coincidence; //записываем результат
                                                break;
                                            default:
                                                break;
                                        }
                                    }
                                    else{

                                        break;
                                    }
                                }
                                //----------------------

                                if( $coincidence > 0 )
                                {
                                    //$coincidence_array_product[$index] = $all_array[0][$index];
                                    //$update[$position] = $all_array[0][$index];
                                    //$update = $update[];
                                    array_push($coincidence_array_product, $all_array[0][$index]);
                                    //$coincidence_array_product[$position] = $all_array[0][$index];
                                    //$position++;
                                }

                                //----------------------
                            }
                        }

                        $index++;
                    }

                    //совпадение со словами (конец)
                }
                /* ===== конец ===== */
            }
        }
        //debug($coincidence_array_product);
        //die();
        //вычисляем количество продуктов у которых название совпало с запросом
        
        if(!isset($coincidence_array_product) )
        {
            return [null , $pages];
        }
        $count_coincidence_array_product = count($coincidence_array_product);
        
        /*===== -- делаем пагинацию данных -- =====*/
        //вычисляем объём данных
        
        $new_sort_products = [];
        
        $Url = explode('&', $url);
        $count_url = count($Url);
        $start = 0;
        //debug($count_url);
        //die();
        if($count_url == 1)
        {
            $start = 0;
            $page = 1;
        }
        else{
            $page = str_replace('page=', '', $Url[1]);
            $page = (int) $page;
            $start = ($page - 1)* $limit;
            if( $start < 0 )
            {
                $start = 0;
            }
        }
        
        $max = $start + $limit; $j = 0;
        $count_all = $count_coincidence_array_product;
        //debug($coincidence_array_product);
        //die();
        /*$pages = new Pagination(['totalCount' => $count_all, 
            'pageSize' => $limit]);*/
        $pages = [];
        $pages[0] = $page;
        //вычисляем общее кол-во страниц
        $all_page = ceil($count_all/$limit);
        $pages[1] = $all_page;
        
        //debug($pages);
        //die();
        if($count_all > 2)
        {
            if($count_all < $max)
            {
                $max = $count_all; 
            }
            reset($coincidence_array_product);
            for($i = 1; $i < $start; $i++)
            {
                next($coincidence_array_product);
            }
            $j = 0;
            for($i = $start; $i < $max; $i++)
            {
                $new_sort_products[$j] = current($coincidence_array_product);
                next($coincidence_array_product);
                $j++;
            }
            $coincidence_array_product = $new_sort_products;
            $count_coincidence_array_product = count($new_sort_products);
        }
        /*===== -- конец пагинации -- =====*/
        //debug($count_coincidence_array_product);
        //die();
        //debug($coincidence_array_product);
        //die();
        if( $count_coincidence_array_product < 3 ) //без сортировки
        {
            return [$coincidence_array_product, $pages];
        }
        else{ //c сортировкой
            $mass_sort = []; //массив для сортировки
            foreach($coincidence_array_product as $one_product){
                array_push($mass_sort, $one_product['coincidence_model_product']);
            }
            //сортируем массив
            $sort_array = $this->my_sort_2($mass_sort);
            //debug($mass_sort);
            //debug($sort_array);
            //die();
            $j = 0;
            //die();
            //проверяем соответствие элемента массива и его позиции в списке
            $position_element = [];
            /*
            for($i = 0; $i < $count_coincidence_array_product; $i++)
            {
                for($j = 0; $j < $count_coincidence_array_product; $j++)
                {
                    if( $mass_sort[$i] == $sort_array[$j] )
                    {
                        $position_element[$i] = $j;
                        break;  
                    }
                }
            }
             * 
             */
            for($i = $count_coincidence_array_product - 1; $i >= 0; $i--)
            {
                //for($j = 0; $j < $count_coincidence_array_product; $j++)
                //{
                foreach($coincidence_array_product as $one_product){
                    
                    if( $sort_array[$i] == $one_product['coincidence_model_product'] )
                    {
                        $index_arr = array_search($one_product, $coincidence_array_product);
                        
                        $position_element[$j] = $one_product;
                        $j++;
                        unset($coincidence_array_product[$index_arr]);
                        break;  
                    }
                }
                //}
            }
            //debug($position_element);
            //die();
            
            return [$position_element, $pages]; 
            
        }
        /*===== алгоритм сортировка начало =====*/
        //алгоритм  сортировки
        
        //$mass_sort = [1,2,32,44,15,1,2,4,5,6,7,8,5, 6 ,2,43,17,23,456,39,229,129,78];
        //$my_sort = $this->my_sort_1($mass_sort);
        //$my_sort = $this->my_sort_2($mass_sort);//сортировка средняя
        
        //debug('$my_sort');
        //debug($my_sort); 
        
        /*===== алгоритм сортировки конец =====*/
        
       // die();
        
    }
    
    /*==== алгоритм сортировки наиболее простой (начало) ====*/
    public function my_sort_1($mass_sort)
    {
        debug($mass_sort);
        $count_sort = count($mass_sort);
        $count_sort_t = $count_sort - 1;
        $count_sort_group = $count_sort + 2;
        //левая и правая граница
        $left_border; $right_border = [];
        
        $left = 1;  $right;
        $element_r; $element_l;
        $pivot = 0; $j_l = $left;
        
        $j_r = $count_sort_t;
        $update;
        $__count_border = $count_sort_t; 
       
        /* сортировка в группе по 3*/
        
        //остаток от деления
        $ost = $count_sort % 3;

        //количество групп
        $number_of_groups;
        if( $ost > 0 )
        {
            if( $ost > 1 ){
                $mass_sort[$count_sort] = $mass_sort[$count_sort - 1];                
                $number_of_groups = ($count_sort + 1)/3;
            }
            else{
                $mass_sort[$count_sort] = $mass_sort[$count_sort - 1];
                $mass_sort[$count_sort + 1] = $mass_sort[$count_sort - 1];
                $number_of_groups = ($count_sort + 2)/3;
            }
            
        }
        else{
            $number_of_groups = $count_sort/3;
        }
        $sort_count_new = $number_of_groups * 3 - 1;
        //debug($sort_count_new);
        
        //формируем слитные группы по (по 3) возрастанию
         $update;
         
        $l_2 = 0;
        $end = $sort_count_new;
        $lmax = 3;
        for ($l = 0; $l < $end; $l++)
        {   
            if ($l == $lmax )
            {
                $lmax += 3;
                $number_of_groups = $number_of_groups - 1;
                $sort_count_new = $sort_count_new - 3;
                $count_sort_group -=3; 
                $l_2 = 0;
            }
            $number = 1; $i = 0;
            while($number <= $number_of_groups)
            {
                if( $mass_sort[$i] > $mass_sort[$i + 1] ) //сравниваем первый элемент со вторым
                {
                    if( $mass_sort[$i + 2] < $mass_sort[$i] ) //сравниваем третий элемент с первым
                    {
                        if( $mass_sort[$i + 1] > $mass_sort[$i + 2]) //сравниваем второй элемент с третим
                        {
                            //изменяем позиции в слитной группе
                            $update = $mass_sort[$i];
                            $mass_sort[$i] = $mass_sort[$i + 2];
                            $mass_sort[$i + 2] = $update;
                        }
                        else{
                            //изменяем позиции в слитной группе
                            $update = $mass_sort[$i];
                            $mass_sort[$i] = $mass_sort[$i + 1];
                            $mass_sort[$i + 1] = $mass_sort[$i + 2];
                            $mass_sort[$i + 2] = $update; 
                        }                
                    }
                    else{
                        //изменяем позиции в слитной группе
                        $update = $mass_sort[$i];
                        $mass_sort[$i] = $mass_sort[$i + 1];
                        $mass_sort[$i + 1] = $update;
                    }

                }
                elseif ( $mass_sort[$i] > $mass_sort[$i + 2] ) //сравниваем первый элемент с третьим
                {
                    $update = $mass_sort[$i];
                    $mass_sort[$i] = $mass_sort[$i + 2];
                    $mass_sort[$i + 2] = $update;
                }
                elseif ( $mass_sort[$i + 1] > $mass_sort[$i + 2] ) { //сравниваем второй и третий элементы
                    $update = $mass_sort[$i + 1];
                    $mass_sort[$i + 1] = $mass_sort[$i + 2];
                    $mass_sort[$i + 2] = $update;
                }

                $i = $i + 3;
                $number++;
            }
            //debug($l);
            //debug($count_sort_group);
            //debug($mass_sort);
            //перемешиваем слитные группы, формируем наибольшую слитную группу
            $i = 1;$i_old = 2;$i_max = 5;
            while($i_max <= $count_sort_group)
            {
                
                if( $i_max == $sort_count_new && $l > 0 )
                {
                    if($mass_sort[$sort_count_new - $l_2] < $mass_sort[$i_old])
                    {
                        $update = $mass_sort[$i_old];
                        $mass_sort[$i_old] = $mass_sort[$sort_count_new - $l_2];
                        $mass_sort[$sort_count_new - $l_2] = $update;
                    }
                }
                //ищем и перемещаем максимальный эл-т
                if( $mass_sort[$i_old] > $mass_sort[$i_max]){
                    
                    $update = $mass_sort[$i_old];
                    $mass_sort[$i_old] = $mass_sort[$i_max];
                    $mass_sort[$i_max] = $update;
                    $i_old = $i_max;
                }
                else if( $mass_sort[$i_old] < $mass_sort[$i_max] ){
                    $i_old = $i_max;
                }
                $i_max = $i_max + 3;
            }
           
            $l_2 ++;
        }
        //debug($i_max);
        //debug($number_of_groups);
            
        
        //debug($mass_sort);
        //debug($count_sort_group);
        return $mass_sort;
    }
    /*==== алгоритм сортировки наиболее простой (конец)  ====*/
    
    /*==== алгоритм сортировки средний (начало) ====*/
    public function my_sort_2($mass_sort)
    {
        $count_sort = count($mass_sort);
        
        /* сортировка в группе по 3*/
        //остаток от деления
        $ost = $count_sort % 3;

        //количество групп
        $number_of_groups = 0;
        if( $ost > 0 ) //определяем кол-во групп
        {
            if( $count_sort >= 3 )
            {
                if( $ost > 1 ){
                    $number_of_groups = ($count_sort + 1)/3;
                }
                else{
                    $number_of_groups = ($count_sort + 2)/3;
                }
            }
            else{
                $number_of_groups = 1;
            }
            
        }
        else{
            $number_of_groups = $count_sort/3;
        }
        
        $sort_count_new = $number_of_groups * 3 - 1;

        //формируем слитные группы по (по 3) возрастанию
        $update;
        $number = 1; $i = 0;
        
        while($number <= $number_of_groups)
        {
            if($number < $number_of_groups || ($number == $number_of_groups && $ost == 0))
            {

                if( $mass_sort[$i] > $mass_sort[$i + 1] ) //сравниваем первый элемент со вторым
                {
                    if( $mass_sort[$i + 2] < $mass_sort[$i] ) //сравниваем третий элемент с первым
                    {
                        if( $mass_sort[$i + 1] > $mass_sort[$i + 2]) //сравниваем второй элемент с третим
                        {
                            //изменяем позиции в слитной группе
                            $update = $mass_sort[$i];
                            $mass_sort[$i] = $mass_sort[$i + 2];
                            $mass_sort[$i + 2] = $update;
                        }
                        else{
                            //изменяем позиции в слитной группе
                            $update = $mass_sort[$i];
                            $mass_sort[$i] = $mass_sort[$i + 1];
                            $mass_sort[$i + 1] = $mass_sort[$i + 2];
                            $mass_sort[$i + 2] = $update; 
                        }                
                    }
                    else{
                        //изменяем позиции в слитной группе
                        $update = $mass_sort[$i];
                        $mass_sort[$i] = $mass_sort[$i + 1];
                        $mass_sort[$i + 1] = $update;
                    }

                }
                elseif ( $mass_sort[$i] > $mass_sort[$i + 2] ) //сравниваем первый элемент с третьим
                {
                    //меняем местами второй и первый элемент
                    $update = $mass_sort[$i + 2];
                    $mass_sort[$i + 2] = $mass_sort[$i + 1];
                    $mass_sort[$i + 1] = $update;
                    
                    //меняем местами первый и второй элемент
                    $update = $mass_sort[$i];
                    $mass_sort[$i] = $mass_sort[$i + 1];
                    $mass_sort[$i + 1] = $update;
                }
                elseif ( $mass_sort[$i + 1] > $mass_sort[$i + 2] ) { //сравниваем второй и третий элементы
                    $update = $mass_sort[$i + 1];
                    $mass_sort[$i + 1] = $mass_sort[$i + 2];
                    $mass_sort[$i + 2] = $update;
                }
            }
            elseif ($ost == 1) {
                if($number_of_groups > 1)
                {
                    //сравниваем этот элемент с предыдущей группой
                    if( $mass_sort[$i] < $mass_sort[$i - 1] )//сравниваем с максимальным элементом предыдущей группы
                    {
                        //меняем местами элементы
                        $update = $mass_sort[$i];
                        $mass_sort[$i] = $mass_sort[$i - 1];
                        $mass_sort[$i - 1] = $update;

                        //сравниваем этот элемент со вторым элементом предыдущей группы
                        if($mass_sort[$i - 1] < $mass_sort[$i - 2])
                        {
                            //меняем местами элементы
                            $update = $mass_sort[$i - 1];
                            $mass_sort[$i - 1] = $mass_sort[$i - 2];
                            $mass_sort[$i - 2] = $update;
                            //сравниваем этот элемент с третьим элементом предыдущей группы
                            if($mass_sort[$i - 2] < $mass_sort[$i - 3])
                            {
                                //меняем местами элементы
                                $update = $mass_sort[$i - 2];
                                $mass_sort[$i - 2] = $mass_sort[$i - 3];
                                $mass_sort[$i - 3] = $update;
                            }
                        }  
                    }

                }
                elseif ($number_of_groups == 1){
                    return $mass_sort;

                }
                elseif ($number_of_groups == 2){
                    return $mass_sort;
                }
            }   
            elseif ($ost == 2){
                if($number_of_groups > 2)
                {
                    //сравниваем и перемешиваем неполную группу с двумя элементами
                    if( $mass_sort[$i] > $mass_sort[$i + 1] )
                    {
                        //меняем местами элементы
                        $update = $mass_sort[$i];
                        $mass_sort[$i] = $mass_sort[$i + 1];
                        $mass_sort[$i + 1] = $update;
                        
                    }
                    //сравниваем минимальный элемент с предыдущей группой
                    if( $mass_sort[$i] < $mass_sort[$i - 1] )
                    {
                        if($mass_sort[$i] < $mass_sort[$i - 2])
                        {
                            if($mass_sort[$i] < $mass_sort[$i - 3])
                            {
                                $update = $mass_sort[$i];
                                $mass_sort[$i] = $mass_sort[$i - 3];
                                $mass_sort[$i - 3] = $update;
                            }
                        }
                        else{
                            $update = $mass_sort[$i];
                            $mass_sort[$i] = $mass_sort[$i - 2];
                            $mass_sort[$i - 2] = $update;
                        }
                    }
                    
                }
                elseif( $number_of_groups == 2 ){
                        //сравниваем минимальный элемент во 2-ой группе и максимальный эл-т в первой группе
                        if( $mass_sort[$i] < $mass_sort[$i - 1] )//сравниваем с максимальным элементом предыдущей группы
                        {
                            //меняем местами элементы
                            $update = $mass_sort[$i];
                            $mass_sort[$i] = $mass_sort[$i - 1];
                            $mass_sort[$i - 1] = $update;

                            //сравниваем этот элемент со вторым элементом предыдущей группы
                            if($mass_sort[$i - 1] < $mass_sort[$i - 2])
                            {
                                //меняем местами элементы
                                $update = $mass_sort[$i - 1];
                                $mass_sort[$i - 1] = $mass_sort[$i - 2];
                                $mass_sort[$i - 2] = $update;
                                //сравниваем этот элемент с третьим элементом предыдущей группы
                                if($mass_sort[$i - 2] < $mass_sort[$i - 3])
                                {
                                    //меняем местами элементы
                                    $update = $mass_sort[$i - 2];
                                    $mass_sort[$i - 2] = $mass_sort[$i - 3];
                                    $mass_sort[$i - 3] = $update;
                                }
                            }  
                            //сравниваем максимальный элемент во второй группе, с максимальным элементом первой группы

                            if( $mass_sort[$i + 1] < $mass_sort[$i] )//сравниваем с максимальным элементом предыдущей группы
                            {
                                //меняем местами элементы
                                $update = $mass_sort[$i + 1];
                                $mass_sort[$i + 1] = $mass_sort[$i];
                                $mass_sort[$i] = $update;

                                //сравниваем этот элемент со вторым элементом предыдущей группы
                                if($mass_sort[$i] < $mass_sort[$i - 1])
                                {
                                    //меняем местами элементы
                                    $update = $mass_sort[$i];
                                    $mass_sort[$i] = $mass_sort[$i - 1];
                                    $mass_sort[$i - 1] = $update;
                                    //сравниваем этот элемент с третьим элементом предыдущей группы
                                    if($mass_sort[$i - 1] < $mass_sort[$i - 2])
                                    {
                                        //меняем местами элементы
                                        $update = $mass_sort[$i - 1];
                                        $mass_sort[$i - 1] = $mass_sort[$i - 2];
                                        $mass_sort[$i - 2] = $update;
                                    }
                                }  
                            }
                        }
                        return $mass_sort;
                }
                elseif( $number_of_groups == 1 ){
                    if( $mass_sort[$i] > $mass_sort[$i + 1] )
                    {
                        //меняем местами элементы
                        $update = $mass_sort[$i];
                        $mass_sort[$i] = $mass_sort[$i + 1];
                        $mass_sort[$i + 1] = $update;
                        return $mass_sort;
                    }
                }
            }

            $i = $i + 3;
            $number++;
        }
        
        //перемешиваем слитные группы, формируем наибольшую слитную группу
        $min = $mass_sort[0]; $max = $mass_sort[2];
        $min_ind = 0; $max_ind = 2;
        $i_group = 3;
        //устанавливаем границы для массива
        $i_start = 0; $i_end = $count_sort - 1;
        $count_sort_n  =  $count_sort - $ost - 1;

        $i_start_arr = 0;
        $lj = 0;

        while( $i_start_arr < $i_end )
        {
            if($lj > 1)
            {
                $i_group = 3;
                $ost = ($i_end + 1) % 3;
                $count_sort_n = $i_end - $ost;
            }
            $lj++;
            $min = $mass_sort[$i_start_arr];$min_ind = $i_start_arr;
            $max = $mass_sort[$i_start + 2];$max_ind = $i_start + 2;

            for($i = $i_start; $i < $count_sort_n; $i += $i_group ) //ищем максимальный и минимальный элемент в массиве
            {
                if($i == $count_sort_n && $ost != 0)
                {

                    if( $ost == 1 )
                    {
                        if( $mass_sort[$i] < $min ) //ищем минимальный элемент массива
                        {
                            $min_ind = $i; $min = $mass_sort[$i];
                        } 
                        if( $mass_sort[$i] > $max ) //ищем максимальный элемент массива    
                        {
                            $max_ind = $i; $max = $mass_sort[$i]; 
                        }
                    }
                    elseif( $ost == 2 )
                    {
                        if( $mass_sort[$i] < $min ) //ищем минимальный элемент массива
                        {
                            $min_ind = $i; $min = $mass_sort[$i];
                        } 
                        if($mass_sort[$i + 1] > $max) //ищем максимальный элемент массива    
                        {
                            $max_ind = $i + 1 ; $max = $mass_sort[$i + 1]; 
                        }
                    }
                }
                
                else{
                    if($i < $i_start_arr ){
                        if( $mass_sort[$i_start_arr] < $min ) //ищем минимальный элемент массива
                        {
                            $min_ind = $i_start_arr; $min = $mass_sort[$i_start_arr];
                        }
                    }else{
                        if( $mass_sort[$i] < $min ) //ищем минимальный элемент массива
                        {
                            $min_ind = $i; $min = $mass_sort[$i];
                        }
                    }

                    if($mass_sort[$i + 2] > $max) //ищем максимальный элемент массива    
                    {
                        $max_ind = $i + 2 ; $max = $mass_sort[$i + 2]; 
                    }
                }
            }

            //проверяем максимальный элемент в массиве
            if( $max > $mass_sort[$i_end] )
            {
                //перезаписываем максимальный элемент
                $update_max = $mass_sort[$i_end];
                $mass_sort[$i_end] = $max;

                //проверяем группу куда перезаписываем элемент и перемешиваем её
                if( $mass_sort[$max_ind - 1] > $update_max ) //сравниваем со вторым элементом
                {
                    if( $mass_sort[$max_ind - 2] > $update_max ) //сравниваем с третьим элементом
                    {                           
                        $mass_sort[$max_ind] = $mass_sort[$max_ind - 1];
                        $mass_sort[$max_ind - 1] = $mass_sort[$max_ind - 2];
                        $mass_sort[$max_ind - 2] = $update_max;
                    }
                    else{
                        $mass_sort[$max_ind] = $mass_sort[$max_ind - 1];
                        $mass_sort[$max_ind - 1] = $update_max;
                    }

                }else{
                    $mass_sort[$max_ind] = $update_max;
                }
                
                $i_end--;

            }
            elseif($i_end == $max_ind){ //если последний элемент и так является наибольшим
                $i_end--;
            }
            /*elseif($i_end != $max_ind && $max == $mass_sort[$i_end] ) { //
                while(){

                }

            }*/
            elseif($max < $mass_sort[$i_end]){
                $i_end--;
            }

            //проверяем минимальный элемент в массиве
            if($min < $mass_sort[$i_start_arr])
            {
                $update_min = $mass_sort[$i_start_arr];
                $mass_sort[$i_start_arr] = $min;
                if( $update_min > $mass_sort[$min_ind + 1] ) //проверяем на минимальный элемент со вторым элементом в группе
                {
                    if( $update_min > $mass_sort[$min_ind + 2] ) // проверяем на минимальный элемент с третьим элементом в группе
                    {
                        $mass_sort[$min_ind] = $mass_sort[$min_ind + 1];
                        $mass_sort[$min_ind + 1] = $mass_sort[$min_ind + 2];
                        $mass_sort[$min_ind + 2] = $update_min;
                    }
                    else{
                        $mass_sort[$min_ind] = $mass_sort[$min_ind + 1];
                        $mass_sort[$min_ind + 1] = $update_min;
                    }

                }else{
                    $mass_sort[$min_ind] = $update_min;
                }

                $i_start_arr++;
            }
            elseif($min >= $mass_sort[$i_start_arr])
            {
                $i_start_arr++;
            }
            
        }
        
        return $mass_sort;
    }
    /*==== алгоритм сортировки средний (конец)  ====*/
    
    
    //совпадение запроса со словами продукта
    public function search_product($get_search, $all_array){
        //проводим поиск на совпадение запроса со считанными продуктами
        /* ===== начало ===== */

        $m = 0; //определяет кол-во совпадений букв в запросе
        $n = 0; //определяет кол-во совпадений букв в запросе

        $position = 0;$coincidence_array_product = [];
        foreach ($get_search as $search_arr1)
        {
            /* преобразуем строку в массив */
            $search_arr = mb_str_split($search_arr1);

            /*определяем размерность массива*/
            $count_search_arr = count($search_arr);

            //совпадение со словами (начало)
            $index = 0; $coincidence = 0; $max_search = 0;
            foreach($all_array[0] as $one_product)
            {
                $m = 0; $n = 0;
                /*--- совпадение с подкатегориями ---*/
                // определяем количество слов в подкатегории или с типом подкатегории
                for($j = 1; $j < 2; $j++)
                {
                    switch($j){
                        /*
                        case(0):
                            $gt = mb_strtolower($one_subcategory['subcategory']);
                            $get_sub = explode(' ', $gt);
                            break;
                         * 
                         */
                        case(1):
                            $gt = mb_strtolower($one_product['model_product']);
                            $get_sub = explode(' ', $gt);
                            break;
                        default:
                            break;
                    }

                    if( count($get_sub) > 1 ) //если несколько слов 
                    {
                        foreach($get_sub as $sub)
                        {
                            //преобразуем строку в массив
                            $one_sub_arr = mb_str_split($sub);
                            $count_one_sub_arr = count($one_sub_arr);
                            //определяем у кого размерность больше (у слова из подкатегории или у поискового запроса)
                            if($count_one_sub_arr > $count_search_arr)
                            {
                                $max_search = $count_search_arr;
                            }
                            else{
                                $max_search = $count_one_sub_arr;                                
                            }
                            $coincidence = 0;
                            for($i = 0; $i < $max_search; $i++)
                            {
                                if($search_arr[$i] == $one_sub_arr[$i]) //считаем количество совпадений букв в слове
                                {
                                    $coincidence++;

                                    switch($j){
                                        /*
                                        case(0):
                                            if(isset($all_array[0][$index]['coincidence_model_product']))
                                            {
                                                if( $m < $coincidence )
                                                {
                                                    $m = $coincidence;
                                                    $all_array[0][$index]['coincidence_model_product']++; //записываем результат
                                                }
                                            }
                                            else{
                                                $all_array[0][$index]['coincidence_model_product'] = $coincidence; // записываем результат
                                                $m = $coincidence;
                                            }

                                            break;
                                         * 
                                         */
                                        case(1):
                                            if(isset($all_array[0][$index]['coincidence_model_product']))
                                            {
                                                if( $n < $coincidence )
                                                {
                                                    $n = $coincidence;
                                                    $all_array[0][$index]['coincidence_model_product']++;
                                                }
                                            }
                                            else{
                                                $all_array[0][$index]['coincidence_model_product'] = $coincidence;
                                                $n = $coincidence;
                                            }

                                            break;
                                        default :
                                            break;
                                    } 
                                }
                                else{
                                    break;
                                }
                            }
                            //----------------------

                            if( $coincidence > 0 )
                            {
                                $coincidence_array_product[$index] = $all_array[0][$index];
                            }
                            //----------------------
                        }

                    }
                    else
                    {
                        //преобразуем строку в массив
                        $one_sub_arr = mb_str_split($get_sub[0]);
                        $count_one_sub_arr = count($one_sub_arr);
                        //определяем у кого размерность больше (у слова из подкатегории или у поискового запроса)
                        if($count_one_sub_arr > $count_search_arr)
                        {
                            $max_search = $count_search_arr;
                        }
                        else{
                            $max_search = $count_one_sub_arr;                                
                        }
                        $coincidence = 0;
                        for($i = 0; $i < $max_search; $i++)
                        {
                            if($search_arr[$i] == $one_sub_arr[$i]) //считаем количество совпадений букв в слове
                            {
                                $coincidence++;

                                switch($j){
                                    case(0):
                                        $all_array[0][$index]['coincidence_model_product'] = $coincidence; //записываем результат
                                        break;
                                    case(1):
                                        $all_array[0][$index]['coincidence_model_product'] = $coincidence; //записываем результат
                                        break;
                                    default:
                                        break;
                                }
                            }
                            else{

                                break;
                            }
                        }
                        //----------------------

                        if( $coincidence > 0 )
                        {
                            array_push($coincidence_array_product, $all_array[0][$index]);
                        }

                        //----------------------
                    }
                }

                $index++;
            }

            //совпадение со словами (конец)
        }
        return $coincidence_array_product;
        /* ===== конец ===== */
    }
    
    //считывает категории баннера для главной страницы
    public function category_banner($page)
    {
       $m_banner = (new Query())->select(['id_category'=>'category_banner.id','subcategory_banner'=>'category_banner.subcategory_banner','description'=>'category_banner.description',])
                //scrolling_banner
                ->addSelect(['scroll_id'=>'scrolling_banner.id','scroll_path_1'=>'scrolling_banner.path_1',
                    'scroll_path_2'=>'scrolling_banner.path_2','scroll_path_3'=>'scrolling_banner.path_3','scroll_text_1'=>'scrolling_banner.text_1',
                    'scroll_text_2'=>'scrolling_banner.text_2','scroll_text_3'=>'scrolling_banner.text_3','scroll_text_4'=>'scrolling_banner.text_4',
                    'scroll_text_5'=>'scrolling_banner.text_5','scroll_text_6'=>'scrolling_banner.text_6','scroll_text_7'=>'scrolling_banner.text_7',
                    'scroll_text_8'=>'scrolling_banner.text_8','scroll_text_9'=>'scrolling_banner.text_9','scroll_text_10'=>'scrolling_banner.text_10',
                    'scroll_text_11'=>'scrolling_banner.text_11','scroll_text_12'=>'scrolling_banner.text_12',
                    'scroll_link_product_1'=>'scrolling_banner.link_product_1','scroll_link_product_2'=>'scrolling_banner.link_product_2','scroll_link_product_3'=>'scrolling_banner.link_product_3',
                    ])//->distinct()
                //banner_text
                ->addSelect(['bantext_id'=>'banner_text.id','bantext_path'=>'banner_text.path','bantext_text_h2'=>'banner_text.text_h2','bantext_text_span'=>'banner_text.text_span'
                    ,'bantext_text_p'=>'banner_text.text_p','bantext_class'=>'banner_text.class','bantext_link_description'=>'banner_text.link_description','bantext_number_page'=>'banner_text.number_page'])
                //banner_image
                ->addSelect(['banner_image_id'=>'banner_image.id','banner_image_path_1'=>'banner_image.path_1','banner_image_path_2'=>'banner_image.path_2','banner_image_path_3'=>'banner_image.path_3','banner_image_path_4'=>'banner_image.path_4',
                    'banner_image_link_description'=>'banner_image.link_description','banner_image_number_page'=>'banner_image.number_page'])
                //->distinct()
                ->from(['category_banner'])
                //->distinct()
                //->groupBy('scrolling_banner.text_11')
                ->where(['category_banner.page' => $page])->orderBy(['subcategory_banner'=>'sdfsdwe'])
                ->join('LEFT JOIN','scrolling_banner','scrolling_banner.page=category_banner.page')
                ->join('LEFT JOIN','banner_text','banner_text.page=category_banner.page')
                ->join('LEFT JOIN','banner_image', 'banner_text.page=banner_image.page')
                ->all();
        //фильтр удаляет повторяющиеся 
        //не работает этот метод//$post = Yii::$app->db->createCommand('SELECT DISTINCT scrolling_banner.path_1, banner_text.path  FROM category_banner LEFT JOIN banner_text ON category_banner.page=banner_text.page'
        //        . ' LEFT JOIN scrolling_banner ON category_banner.page = scrolling_banner.page GROUP BY scrolling_banner.path_1, banner_text.path')->queryAll();
        $id_scroll = [];$id_ban_text = []; $id_banner_image = [];
        $banner_1[0]['scroll'] = [];$banner_1[0]['textban'] = [];$banner_1[0]['imageban'] = [];
        $id_cat = -1;$id_category = [];
        foreach($m_banner as $ban)
        {
            if(!in_array($ban['id_category'], $id_category))
            {
                array_push($id_category, $ban['id_category']);
                $id_cat++;
                $banner_1[$id_cat]['scroll'] = [];
                $banner_1[$id_cat]['textban'] = [];
                $banner_1[$id_cat]['imageban'] = [];
            }
            if(!in_array($ban['scroll_id'], $id_scroll))
            {
                array_push($id_scroll, $ban['scroll_id']);
                $scroll['id'] = $ban['scroll_id'];
                $scroll['path_1'] = $ban['scroll_path_1'];
                $scroll['path_3'] = $ban['scroll_path_3'];
                $scroll['text_1'] = $ban['scroll_text_1'];
                $scroll['path_2'] = $ban['scroll_path_2'];
                $scroll['text_2'] = $ban['scroll_text_2'];
                $scroll['text_3'] = $ban['scroll_text_3'];
                $scroll['text_4'] = $ban['scroll_text_4'];
                $scroll['text_5'] = $ban['scroll_text_5'];
                $scroll['text_6'] = $ban['scroll_text_6'];
                $scroll['text_7'] = $ban['scroll_text_7'];
                $scroll['text_8'] = $ban['scroll_text_8'];
                $scroll['text_9'] = $ban['scroll_text_9'];
                $scroll['text_10'] = $ban['scroll_text_10'];
                $scroll['text_11'] = $ban['scroll_text_11'];
                $scroll['text_12'] = $ban['scroll_text_12'];
                $scroll['link_product_1'] = $ban['scroll_link_product_1'];
                $scroll['link_product_2'] = $ban['scroll_link_product_2'];
                $scroll['link_product_3'] = $ban['scroll_link_product_3'];
                array_push($banner_1[$id_cat]['scroll'], $scroll);
                
            }
            
            if(!in_array($ban['bantext_id'], $id_ban_text))
            {
                array_push($id_ban_text, $ban['bantext_id']);
                $bantext['id'] = $ban['bantext_id'];
                $bantext['path'] = $ban['bantext_path'];
                $bantext['text_h2'] = $ban['bantext_text_h2'];
                $bantext['text_span'] = $ban['bantext_text_span'];
                $bantext['text_p'] = $ban['bantext_text_p'];
                $bantext['class'] = $ban['bantext_class'];
                $bantext['link_description'] = $ban['bantext_link_description'];
                $bantext['number_page'] = $ban['bantext_number_page'];
                array_push($banner_1[$id_cat]['textban'],$bantext);
                
            }
            if(!in_array($ban['banner_image_id'], $id_banner_image))
            {
                array_push($id_banner_image, $ban['banner_image_id']);
                $banner_image['id'] = $ban['banner_image_id'];
                $banner_image['path_1'] = $ban['banner_image_path_1'];
                $banner_image['path_2'] = $ban['banner_image_path_2'];
                $banner_image['path_3'] = $ban['banner_image_path_3'];
                $banner_image['path_4'] = $ban['banner_image_path_4'];
                $banner_image['link_description'] = $ban['banner_image_link_description'];
                $banner_image['number_page'] = $ban['banner_image_number_page'];
                array_push($banner_1[$id_cat]['imageban'], $banner_image);
                
            }
            
        }
        
        return $banner_1; 
        
    }
    
    public function transform_data_chekout($session){
        $count_order = count($session['data']) - 1;
            if($count_order < 2){
                return null;//$this->render('checkout' ,compact('manage_form','point','user_data','market_sort','banner'));
            }
            for( $i = 1; $i < $count_order; $i++ )
            {
                $history_order[0]['productshop'][$i]['link'] = $session['data'][$i][4];
                $history_order[0]['productshop'][$i]['path'] = $session['data'][$i][2];
                $history_order[0]['productshop'][$i]['name_model'] = $session['data'][$i][0];
                $history_order[0]['productshop'][$i]['price'] = $session['data'][$i][3];
                $history_order[0]['productshop'][$i]['quantity'] = $session['data'][$i][1];
                $quantity = (int)($session['data'][$i][1]);
$history_order[0]['productshop'][$i]['quantity'] = $quantity;
                if( $quantity > 1 )
                {
                    $price_one = str_replace(" ","",$session['data'][$i][3]);
                    $price_one = (int) $price_one;
                    $price_one_last = $quantity * $price_one;
                    //переводим строку с общей ценой товара в нужный формат в нужный формат
                    $size_string = strlen($price_one_last);

                    $total_price_one_product;
                    if($size_string < 4)
                    {
                        $total_price_one_product = $price_one_last." руб";
                    }
                    else if($size_string > 3 && $size_string < 7)
                    {
                        $one_chast = substr($price_one_last, $size_string - 3, 3);
                        $too_chast = substr($price_one_last, 0, $size_string - 3);
                        $total_price_one_product = $too_chast." ".$one_chast." руб";            

                    }
                    else if($size_string > 6 && $size_string < 10)
                    {
                        $one_chast  = substr($price_one_last, $size_string - 3, 3);
                        $too_chast  = substr($price_one_last, $size_string - 6, 3);
                        $free_chast = substr($price_one_last, 0, $size_string - 6);
                        $total_price_one_product = $free_chast." ".$too_chast." ".$one_chast." руб";

                    }
                    else{
                        $total_price_one_product = $price_one_last." руб";

                    }
                    //debug($total_price_one_product);
                    //$total_pr[$j] = $total_price_one_product;
                    $history_order[0]['productshop'][$i]['total_price'] = $total_price_one_product;
                }
                else{
                    $history_order[0]['productshop'][$i]['total_price'] = $history_order[0]['productshop'][$i]['price'] = $session['data'][$i][3];
                }
                
                
            }
            $history_order[0]['total_price_order'] = $session['data'][$i];
        return $history_order;
    }
    
    public function getNotebooks(){
        return $this->hasMany(Notebook::className(),['name_type_of_subcategory' => 'type_of_subcategory']);
    }
    
    public function getTablets(){
        return $this->hasMany(Tablet::className(), ['name_type_of_subcategory' => 'type_of_subcategory']);
    }
    
    public function getAudio(){
        return $this->hasMany(Audio::className(), ['name_type_of_subcategory' => 'type_of_subcategory']);
    }
    
    public function getCamera(){
        return $this->hasMany(Camera::className(), ['name_type_of_subcategory' => 'type_of_subcategory']);
    }
    
    public function getSmartiphone(){
        return $this->hasMany(Smartiphone::className(), ['name_type_of_subcategory' => 'type_of_subcategory']);
    }
    
    
    public function getTv(){
        return $this->hasMany(Tv::className(), ['name_type_of_subcategory' => 'type_of_subcategory']);
    }
    
    public function getVideocamera(){
        return $this->hasMany(VideoCamera::className(), ['name_type_of_subcategory' => 'type_of_subcategory']);
    }
    
    //----- bestceller -----//
    public function getNotebooksbestceller(){
        return $this->hasMany(Notebook::className(), ['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'bestseller']);
    }
    
    public function getTabletsbestceller(){
        return $this->hasMany(Tablet::className(), ['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'bestseller']);
    }
    
    public function getAudiobestceller(){
        return $this->hasMany(Audio::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'bestseller']);
    }
    
    public function getCamerabestceller(){
        return $this->hasMany(Camera::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'bestseller']);
    }
    
    public function getSmartiphonebestceller(){
        return $this->hasMany(Smartiphone::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'bestseller']);
    }
    
    public function getTvbestceller(){
        return $this->hasMany(Tv::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'bestseller']);
    }
    
    public function getVideocamerabestceller(){
        return $this->hasMany(VideoCamera::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'bestseller']);
    }
    //----- bestceller end -----//
    
    //----- new -----//
    public function getNotebooksnew(){
        return $this->hasMany(Notebook::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'new']);
    }
    
    public function getTabletsnew(){
        return $this->hasMany(Tablet::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'new']);
    }
    
    public function getAudionew(){
        return $this->hasMany(Audio::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'new']);
    }
    
    public function getCameranew(){
        return $this->hasMany(Camera::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'new']);
    }
    
    public function getSmartiphonenew(){
        return $this->hasMany(Smartiphone::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'new']);
    }
    
    public function getTvnew(){
        return $this->hasMany(Tv::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'new']);
    }
    
    public function getVideocameranew(){
        return $this->hasMany(VideoCamera::className(),['name_type_of_subcategory' => 'type_of_subcategory'])->andWhere(['marketing_products' => 'new']);
    }
    
    //----- new end -----//
    
}
