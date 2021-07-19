<?php


namespace app\models;

use yii\base\Model;
use Yii;

/**
 * Description of Seosearch_Form
 *
 * @author Seva
 */
class Seosearch_Form extends Model {
    //put your code here
    
    public $id;
    public $teg_title;
    public $teg_keywords;
    public $teg_description;
    public $my_comment;
    public $id_seo_search;
    public $type_category;
    
    public $table_write_update_del;
    public $id_how_many;
    public $string_update;
    
    public function attributeLabels() {
        return[
            'id'              => 'id',
            'teg_title'       => 'Tег title',
            'teg_keywords'    => 'Тег keywords',
            'teg_description' => 'Тег description',
            'my_comment'      => 'Мои комментарии',
            'type_category'   => 'Категория, подкатег., тип подкатег.,',

            'table_write_update_del' => 'Выберите вид редактирования',
            'id_how_many' => 'Введите id для изменения/удаления или сколько добавить',
            'string_update' => 'Введите строки которые нужно изменить',

        ];
        
    }
    
    public function rules() {

        return[
            [['id'],'integer'],
            [['teg_title'], 'string', 'max' => 120],
            [['teg_keywords'], 'string', 'max' => 200],
            [['teg_description'], 'string', 'max' => 200],
            [['my_comment'], 'string', 'max' => 40],
            [['type_category'], 'string', 'max' => 30],
            //[['type_category'],'valid_seo'],
            
            [['id_how_many'],'string','max'=> 40],
            ['table_write_update_del','integer'],
            ['table_write_update_del','required'],
            [['id_how_many'],'valid_seo','skipOnEmpty' => false, 'skipOnError' => false],
            [['string_update'],'string','max'=>30],
            
        ];
    }
    //своё правило валидации
    public function valid_seo($attribute, $params)
    {
        
        if($this->table_write_update_del == 1){
            if($this->type_category == null){$this->addError('type_category','Необходимо заполнить поле' );}
            if($this->id_how_many == null){$this->addError('id_how_many','Необходимо заполнить поле');}
            
            $int = (int) $this->id_how_many;
            $this->id_how_many = $int;
            if($int < 0){$this->addError('id_how_many','В данное поле введите (число больше 0) (сколько записей сделать)');}
        }
        if($this->table_write_update_del == 2){
            if($this->id_how_many == null){$this->addError('id_how_many','Необходимо заполнить поле');}
            if($this->string_update == null){$this->addError('string_update','Необходимо заполнить поле');}
            $columns = $this->string_update;
            $e_columns = explode(',', $columns);
            foreach($e_columns as $one_column)
            {
                if($one_column == '6'){
                    if($this->type_category == null){$this->addError('type_category','Необходимо заполнить поле');}
                }
            }
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
            $columns = ['teg_title','teg_keywords','teg_description','my_comment',
                'type_category'];

            for($i = 0; $i < $this->id_how_many; $i++)
            {
                $rows[$i][0] = $data['teg_title'];
                $rows[$i][1] = $data['teg_keywords'];
                $rows[$i][2] = $data['teg_description'];
                $rows[$i][3] = $data['my_comment'];
                $rows[$i][4] = $data['type_category'];
                
            }
            Yii::$app->db->createCommand()->batchInsert('seo_search', $columns, $rows)->execute();
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
            $columns_n = [1=>'teg_title',2=>'teg_keywords',3=>'teg_description',4=>'my_comment',
                5=>'type_category'];
            $columns_update = [];
            $column_read = explode(',',$data['string_update']);
            foreach($column_read as $column_one)
            {
                $columns_update[$columns_n[$column_one]] = $data[$columns_n[$column_one]];
                
            }
            
            //debug($id_update);
            //Yii::$app->db->createCommand()->update('category', $columns_update, 'id=:id',[':id'=>$id_update])->execute();
            Yii::$app->db->createCommand()->update('seo_search', $columns_update, ['id'=>$id_update])->execute();
            
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
            Yii::$app->db->createCommand()->delete('seo_search',['id'=>$id_delete])->execute();
        break;
        
        }
        //die();
    }
    
}
