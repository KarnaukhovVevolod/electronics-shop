<?php

namespace app\models;

use yii\base\Model;


class CrudForm extends Model {
    //put your code here
    
    public $model_class;
    public $controller_class;
    
    public $model_controller;
    
    
    public function attributeLabels() {
        return[
            'model_class'      => 'Класс модели',
            'controller_class' => 'Класс контроллера (с адресом папки)',
            'model_controller' => 'Сделать для нескольких моделей',
            ];
    }
    
    public function rules() {
        return[
            [['model_class', 'controller_class'], 'required'],
            [['model_class', 'controller_class'], 'string', 'max'=>150],
            [['model_controller'], 'string'],
        ];
    }
    
    public function createcrude($data)
    {
        debug($data);
        $delimetr = "\ ";
        $delimetr = str_replace(' ', '', $delimetr);
        $path_for_model = explode($delimetr, $data['model_class']);
        debug($path_for_model);
        
        $path_for_controller = explode($delimetr, $data['controller_class']);
        if($path_for_controller[0] != 'app')
        {
            debug("Проверьте корректность введённого адреса контроллера");
            die();
        }
        $new_name_controller = str_replace('app', '..', $data['controller_class']); //'../crud/new1_file/controllers/AdressController.php';
        $new_name_controller = $new_name_controller.".php";
        $new_name_controller = str_replace($delimetr, '/', $new_name_controller);
        debug($data);
        debug($new_name_controller);
        //die();
        //ищем файл
        //debug($path_for_model );die();
        if($path_for_model[0]=='app')
        {
           /*
            //создаём директорию
            if(!file_exists())
            {
                mkdir('../crud/new1_file', 0700);
            }
            //копируем нужный файл в созданную директорию
            $path_dir_ = '../'.$path_for_model[1].'/'.$path_for_model[2].'.php';
            */
            
        /*----- Ищем модель и обрабатываем её поля -----*/
            $path_dir_ = '../'.$path_for_model[1].'/'.$path_for_model[2].'.php';
            //debug($path_dir_);
                        //die();
            //$new_name_file = '../crud/new1_file/File_new.php';
            /*
            if(!copy($path_dir_, $new_name_file))
            {
                echo "не удалось скопировать файл";
            }
            debug($path_dir_);
            */
            //$new_name_file = '../crud/new1_file/File_new.php';
            
        /*----- Читаем модель -----*/
            $file_text = fopen($path_dir_, 'r');
            rewind($file_text);
            $content_file = fread($file_text, filesize($path_dir_));
            $one_chast = [];
        /*----- Обрабатываем модель и получаем атрибуты (строки БД) -----*/    
            //выделяем return у функции rules
            $one_chast = explode('rules', $content_file);
            $one_chast = explode('return', $one_chast[1]);
            $one_chast__ = explode('}', $one_chast[1]);
            $one_chast[1] = $one_chast__[0];
            //удаляем все пробелы
            $one_chast = str_replace(' ', '', $one_chast[1]);
            $one_chast = explode('[', $one_chast);
            debug($one_chast);
            
            //обработка построчно
            $rules = ['string','integer','text','boolean','date'];
            $minmax = ['min','max','required','format','yyyy-MM-dd','unique'];
            $too_chast = []; $i = 0;
            foreach($one_chast as $one){
                if($one != null){
                    $too_chast[$i] = str_replace(',','', $one);
                    $too_chast[$i] = str_replace(']','', $too_chast[$i] );
                    $too_chast[$i] = str_replace('=>','', $too_chast[$i] );
                    $i++;
                }
            }
            //debug($too_chast);
            
            $free_chast = [];$i = 0;
            
            $free_chast = $this->get_text_beetwin_symbol("'", $too_chast);
            debug('$free_chast');
            debug($free_chast);
            fclose($file_text);
            //проверяем на соответствие атрибутов типам
            $rul = 0; $rules_arr = [];
            $min_ax = 0; $type_matching = [];
            $m_n_ax = 0;
            $index = 1; $m = 0;
            $type_all_matching = []; $n = 0;
            $type_all_matching_view = [];
            $view_type = [];
            foreach($free_chast as $free)
            {
                //debug('fri');
                //debug($free);
                foreach($free as $fr)
                {
                    //debug('fr');
                    //debug($fr);
                    if(in_array($fr, $rules))
                    {
                        $rul = 1;
                        $type_matching[$m][0] = $fr;
                        
                    }
                    if(in_array($fr, $minmax))
                    {
                        $min_ax = 1;
                    }
                    
                    if( $rul == 1 || $min_ax == 1 )
                    {
                        $rul = 0; $min_ax = 0;
                    }
                    else {
                        //debug('frrrrr');
                        //debug($fr);
                        //debug('frrrrr');
                        $type_matching[$m][$index] = $fr;
                        $index++;
                        if(in_array($fr, $view_type) ){
                            
                        }
                        else{
                            //debug('==========');
                            //debug($fr);
                            //debug('==========');
                            $type_all_matching_view[$n] = "            "."'".$fr."',"."\r\n";
                            $view_type[$n] = $fr;
                            //debug('++++++++++');
                            //debug($view_type);
                            //debug('++++++++++');
                            if( $n < 7 ){
                                $type_all_matching[$n] = "            "."'".$fr."',"."\r\n";
                                $n++;
                            }
                            else{
                                $type_all_matching[$n] = "            ".'//'."'".$fr."',"."\r\n";
                                $n++;
                            }
                        }
                        
                    }
                }
                
                $index = 1;
                $m++;
            }
            /*
            debug('type_all_matching');
            debug($type_all_matching);
            debug('type_all_matching');
            debug('type_all_matching_view');
            debug($type_all_matching_view);
            debug('type_all_matching_view');
            debug('view_type');
            debug($view_type);
            debug('type_matching');
            debug($type_matching);
             */
            //die();
            //debug($type_matching);
            //изменяем данные в файле _form
        /*----- Создаём новую дирректорию для видов(нового контроллера) -----*/    
            $name_directory_for_view = mb_strtolower(end($path_for_controller));
            $name_directory_for_view = str_replace('controller', '', $name_directory_for_view);

            $path_new_view = str_replace('controllers', 'views', $data['controller_class']);
            $path_new_view = str_replace(end($path_for_controller), $name_directory_for_view, $path_new_view);
            $path_new_view = str_replace('app', '..', $path_new_view);
            $path_new_view = str_replace($delimetr, '/', $path_new_view);
            //debug($path_new_view);
            
            //die();
            if(!file_exists($path_new_view))
            {
                mkdir($path_new_view, 0700);
            }
        /*----- Копируем файлы для view -----*/    
            //копируем нужный файл в созданную дирректорию
            
            $path_dir_1 = '../'.'crud/view/my/_form'.'.php';
            $path_dir_2 = '../'.'crud/view/my/create'.'.php';
            $path_dir_3 = '../'.'crud/view/my/index'.'.php';
            $path_dir_4 = '../'.'crud/view/my/update'.'.php';
            $path_dir_5 = '../'.'crud/view/my/view'.'.php';
            
            $path_copy = '../'.'crud/new1_file/view/my';
            /*
            mkdir('../crud/new1_file/view/', 0700);
            
            mkdir('../crud/new1_file/view/my/', 0700);
            */
            $new_name_file1 = $path_new_view.'/_form.php'; //'../crud/new1_file/view/my/_form_new.php';
            $new_name_file2 = $path_new_view.'/create.php'; //'../crud/new1_file/view/my/create_new.php';
            $new_name_file3 = $path_new_view.'/index.php'; //'../crud/new1_file/view/my/index_new.php';
            $new_name_file4 = $path_new_view.'/update.php'; //'../crud/new1_file/view/my/update_new.php';
            $new_name_file5 = $path_new_view.'/view.php'; //'../crud/new1_file/view/my/view_new.php';
            
            if(!copy($path_dir_1, $new_name_file1))
            {
                echo "не удалось скопировать файл";
            }
            
            if(!copy($path_dir_2, $new_name_file2))
            {
                echo "не удалось скопировать файл";
            }
            
            if(!copy($path_dir_3, $new_name_file3))
            {
                echo "не удалось скопировать файл";
            }
            
            if(!copy($path_dir_4, $new_name_file4))
            {
                echo "не удалось скопировать файл";
            }
            
            if(!copy($path_dir_5, $new_name_file5))
            {
                echo "не удалось скопировать файл";
            }
        /*----- Редактируем файлы для view -----*/    
            
        /*----- Редактируем  скопированный файл _form -----*/
            
            $file_form = fopen($new_name_file1, 'r+');
            $file_form_read = fread($file_form, filesize($new_name_file1));
            $all_file = explode("<!--@345-->", $file_form_read);
            fclose($file_form);
            
            foreach($type_matching as $type)
            {
                $size_t = count($type);
                for($i = 0; $i < $size_t; $i++)
                {
                    if($i == 0)
                    {
                        if(isset($type[0]))
                        {
                            $type_field = $type[0];
                            $dat[0] = $file_form_read;
                            switch($type_field){
                                case 'integer':
                                    $form_copy_field = $this->get_text_beetwin_symbol("*", $dat);
                                    break;
                                case 'string':
                                    $form_copy_field = $this->get_text_beetwin_symbol("#", $dat);
                                    break;
                                case 'text':
                                    $form_copy_field = $this->get_text_beetwin_symbol("^", $dat);
                                    break;
                                case 'boolean':
                                    $form_copy_field = $this->get_text_beetwin_symbol("%", $dat);
                                    break;
                                case 'date':
                                    $form_copy_field = $this->get_text_beetwin_symbol("*", $dat);
                                    break;
                                default:
                                    $form_copy_field = null;
                                    break;
                            }
                        }
                        else{
                            $form_copy_field = null;
                        }
                    }
                    else{
                        if($form_copy_field != null)
                        {
                            $form_copy_field_new = str_replace($type[0], $type[$i], $form_copy_field[0][1]);
                            $form_copy_field_new = $form_copy_field_new." \r\n"." \r\n";
                            $all_file[0] .= $form_copy_field_new; //добавляем новую строку в конец
                        }
                    }
                }
            }
            $all_file[0] = preg_replace('#<span>.*</span>#sUi','',$all_file[0]); 
            $all_file_all = implode($all_file); 

            $file_form = fopen($new_name_file1, 'w+');
            fwrite($file_form, $all_file_all);
            fclose($file_form);
            //die();
            
            
            /*
            if(is_dir($path_dir)){
                if($dh = opendir($path_dir)){ //читаем все файлы директории
                    while(($file = readdir($dh)) !== false){
                        echo "файл: $file: тип:".'<br>'; //.filetype($path_dir. $file).'\n'; ;
                    }
                    closedir($dh);
                }
            }
             */
            
        /*----- Редактируем  скопированный файл index -----*/    
            
            $file_create = fopen($new_name_file3, 'r+');
            $file_create_read = fread($file_create, filesize($new_name_file3));
            $all_file_create = explode("//@989", $file_create_read);
            foreach($type_all_matching as $type_one)
            {
                $all_file_create[0].= $type_one;
            }
            
            $all_file_create = implode($all_file_create);
            fclose($file_create);
            $f_create = fopen($new_name_file3, 'w+');
            fwrite($f_create, $all_file_create);
            fclose($f_create);
            //debug($type_all_matching);
            
        /*----- Редактируем  скопированный файл view -----*/
            //изменяем файл view_new
            $file_view = fopen($new_name_file5, 'r+');
            $file_view_read = fread($file_view, filesize($new_name_file5));
            $all_file_view = explode("//@898", $file_view_read);
            foreach($type_all_matching_view as $type_one)
            {
                $all_file_view[0].= $type_one;
            }
            
            $all_file_view = implode($all_file_view);
            fclose($file_view);
            $f_view = fopen($new_name_file5, 'w+');
            fwrite($f_view, $all_file_view);
            fclose($f_view);
            
        /*----- Копируем контроллер в новую директорию -----*/    
            //копируем файл controller в директорию
            //создаём директорию
            $n_controller = end($path_for_controller);
            $n_controller = $delimetr.$n_controller;
            $path__controller = str_replace($n_controller, '', $data['controller_class']); 
            $path__controller = str_replace('app','..',$path__controller);
            $path__controller = str_replace($delimetr,'/',$path__controller);
            
            if(!file_exists($path__controller))
            {
                mkdir($path__controller, 0700);
            }
            
            $path_controller = '../crud/controller/MyController.php';
            
            if(!copy($path_controller, $new_name_controller))
            {
                echo "не удалось скопировать файл";
            }
        /*----- Редактируем контроллер в новой директории -----*/ 
            $file_controller = fopen($new_name_controller, 'r+');
            $file_controller_read = fread($file_controller, filesize($new_name_controller));
            fclose($file_controller);
            $path_for_controller = explode($delimetr, $data['controller_class']);
            
            $count_c = count($path_for_controller) - 1;
            $namespace_controller = str_replace($delimetr.$path_for_controller[$count_c], '', $data['controller_class']);
            debug($namespace_controller);
            $file_controller_read = str_replace('my_namespace',$namespace_controller, $file_controller_read);
            $file_controller_read = str_replace('path_models', $data['model_class'], $file_controller_read);
            $count_m = count($path_for_model) - 1;
            $file_controller_read = str_replace('Name_models', $path_for_model[$count_m], $file_controller_read);
            $file_controller_read = str_replace('AdressController', end($path_for_controller), $file_controller_read);
            $file_update_controller = fopen($new_name_controller, 'w+');
            fwrite($file_update_controller, $file_controller_read);
            fclose($file_update_controller);
            
            //die();
        }
        
        //die();
    }
    
    
    public function get_text_beetwin_symbol($symbol, $text_all)
    {
        $arr = [];

        $start = 0; $j = 0; $k = 0;
        
        foreach ($text_all as $text){
            if($text != null){
                $size = strlen($text);
                for($i = 0; $i < $size; $i++)
                {
                    if($symbol == $text[$i])
                    {
                        if($start == 0)
                        {
                            $start = 1;
                            $j++;
                            $i++;
                        }
                        else{
                            $start = 0;
                            //$j = 0;
                        }
                    }
                    if($start == 1)
                    {
                        if(isset($arr[$k][$j]) ){
                            $arr[$k][$j] = $arr[$k][$j].$text[$i];
                        }
                        else{
                            $arr[$k][$j] = $text[$i];
                        }
                        
                    }
                    
                }
                $k++;$j = 0;
            }
        }
        return $arr;
    }

    
    
}
