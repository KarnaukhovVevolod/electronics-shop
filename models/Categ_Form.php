<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\base\Model;
use Yii;
/**
 * Description of Categ_Form
 *
 * @author Seva
 */
class Categ_Form extends Model{
    //put your code here
    
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
    
    public $table_write_update_del;
    public $id_how_many;
    public $string_update;
    
    
    public function attributeLabels() {
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
            'id_seo_search_type_of_subcategory' => 'id SEO данные для вида подкатегории',
            
            'table_write_update_del' => 'Выберите вид редактирования',
            'id_how_many' => 'Введите id для изменения/удаления или сколько добавить',
            'string_update' => 'Введите строки которые нужно изменить',

        ];
        
    }
    
    public function rules() {

        return[
          ['id', 'integer'],
          [['category','subcategory','type_of_subcategory','category_english'], 'string', 'max' => 30],
          [['link_category','link_subcategory','link_type_subcategory'], 'string', 'max'=>120],
          //[['category','type_of_subcategory','link_category','category_english'], 'valid_categ'],
          //[['category','type_of_subcategory','link_category','category_english'], 'required'],
          //[['id_seo_search_category','id_seo_search_subcategory','id_seo_search_type_of_subcategory'],'integer'],
          [['id_how_many'],'string','max'=> 40],
          ['table_write_update_del','integer'],
          ['table_write_update_del','required'],
          [['id_how_many'],'valid_categ','skipOnEmpty' => false, 'skipOnError' => false],
          [['string_update'],'string','max'=>30],
        ];
    }
    //своё правило валидации
    public function valid_categ($attribute, $params)
    {
        
        if($this->table_write_update_del == 1){
            if($this->category == null){$this->addError('category','Необходимо заполнить поле' );}
            if($this->type_of_subcategory == null){$this->addError('type_of_subcategory','Необходимо заполнить поле');}
            if($this->link_category == null){$this->addError('link_category','Необходимо заполнить поле');}
            if($this->category_english == null){$this->addError('category_english','Необходимо заполнить поле');}
            if($this->id_how_many == null){$this->addError('id_how_many','Необходимо заполнить поле');}
            
            $int = (int) $this->id_how_many;
            $this->id_how_many = $int;
            if($int < 0){$this->addError('id_how_many','В данное поле введите (число больше 0) (сколько записей сделать)');}
        }
        if($this->table_write_update_del == 2){
            if($this->id_how_many == null){$this->addError('id_how_many','Необходимо заполнить поле');}
            if($this->string_update == null){$this->addError('string_update','Необходимо заполнить поле');}
        }
        if($this->table_write_update_del == 3){
            if($this->id_how_many == null){$this->addError('id_how_many','Необходимо заполнить поле');}

        }
        
    }
    
    public function write_update_delet($data){
        //debug($data);
        //debug($this->id_how_many);
        //die();
        switch($data['table_write_update_del']){
        case(1):
            //запись в базу данных нескольких значений
            $columns = ['category','subcategory','type_of_subcategory','category_english',
                'link_category','link_subcategory','link_type_subcategory','id_seo_search_category',
                'id_seo_search_subcategory','id_seo_search_type_of_subcategory'];

            for($i = 0; $i < $this->id_how_many; $i++)
            {
                $rows[$i][0] = $data['category'];
                $rows[$i][1] = $data['subcategory'];
                $rows[$i][2] = $data['type_of_subcategory'];
                $rows[$i][3] = $data['category_english'];
                $rows[$i][4] = $data['link_category'];
                $rows[$i][5] = $data['link_subcategory'];
                $rows[$i][6] = $data['link_type_subcategory'];
                $rows[$i][7] = $data['id_seo_search_category'];
                $rows[$i][8] = $data['id_seo_search_subcategory'];
                $rows[$i][9] = $data['id_seo_search_type_of_subcategory'];
            }
            Yii::$app->db->createCommand()->batchInsert('category', $columns, $rows)->execute();
        break;
        case(2):
        //изменение в базе данных
            //debug('update');
            /*****--- формируем массив id ---*****/
            $data_id = explode(',',$data['id_how_many']); //
            $id_update = [] ;
            foreach($data_id as $one_id)
            {
                $n_id = explode('-', $one_id);
                if( count($n_id) > 1 ){
                    for($i = $n_id[0];$i <= $n_id[1]; $i++){
                        array_push($id_update, $i);
                    }

                }else{
                    array_push($id_update, $n_id[0]);
                }

            }
            /*****--- конец формирования массива id ---*****/
            /*выбираем столбцы которые будем изменять*/
            $columns_n = [1=>'category',2=>'subcategory',3=>'type_of_subcategory',
                4=>'category_english',5=>'link_category',6=>'link_subcategory',
            7=>'link_type_subcategory',8=>'id_seo_search_category',9=>'id_seo_search_subcategory',
                10=>'id_seo_search_type_of_subcategory'];
            $columns_update = [];
            $column_read = explode(',',$data['string_update']);
            foreach($column_read as $column_one)
            {
                $columns_update[$columns_n[$column_one]] = $data[$columns_n[$column_one]];
                
            }
            
            /*
            debug($column_read);
            debug($columns_n);
            debug($columns_update);
            debug($id_update);
            die();
             */
            //debug($id_update);
            //Yii::$app->db->createCommand()->update('category', $columns_update, 'id=:id',[':id'=>$id_update])->execute();
            Yii::$app->db->createCommand()->update('category', $columns_update, ['id'=>$id_update])->execute();
            
        break;
        case(3):
            
            //Удаление из базы данных
            /*****--- формируем массив id ---*****/
            $data_id = explode(',',$data['id_how_many']); //
            $id_delete = [] ;
            foreach($data_id as $one_id)
            {
                $n_id = explode('-', $one_id);
                if( count($n_id) > 1 ){
                    for($i = $n_id[0];$i <= $n_id[1]; $i++){
                        array_push($id_delete, $i);
                    }

                }else{
                    array_push($id_delete, $n_id[0]);
                }

            }
            /*****--- конец формирования массива id ---*****/
            //debug($data_id);
            //debug($id_delete);
            //die();
            Yii::$app->db->createCommand()->delete('category',['id'=>$id_delete])->execute();
        break;
        
        }
        //die();
    }
    
    
}
