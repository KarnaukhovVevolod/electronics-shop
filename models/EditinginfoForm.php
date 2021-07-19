<?php


namespace app\models;
use yii\base\Model; 

class EditinginfoForm extends Model {
    //about_company
    public $id;
    public $heading;
    public $text;
    public $path;
    public $show_;
    public $adress_photo;
    public $adress_text;
    public $name_company;
    public $telephone_company;
    public $street_company;
    public $item_company;
    public $region_company;
    public $post_code;
    
    public $section;
    
    //employee_serial_number
    public $id_name;
    public $id_surname;
    public $position;
    public $id_link_vk;
    public $id_link_twitter;
    public $id_link_facebook;
    public $id_link_ok;
    public $id_link_instagram;
    public $id_path;
    
    //facebook
    public $facebook;
    //instagram
    public $instagram;
    //name_employee
    public $name;
    //ok
    public $ok;
    //surname
    public $surname;
    //twitter
    public $twitter;
    //vk
    public $vk;
    //position_employee
    //public $position;
    //position_em
    public $position_id;
    public $employee_position;
    
    public function attributeLabels() {
        switch ($this->section)
        {
            case('about'):
                return[
                    //about_company
                    'id'           => 'id',
                    'heading'      => 'Заголовок для компании',
                    'text'         => 'Текст о компании',
                    'path'         => 'Фото о компании(путь)',
                    'show_'        => 'Показать/нет информацию о компании',
                    'adress_photo' => 'Фото главного офиса компании (адрес)',
                    'adress_text'  => 'Адреса офисов компании (текст)',
                    'name_company' => 'Имя компании',
                    'telephone_company' => 'Телефон компании',
                    'street_company' => 'Улица главного офиса',
                    'item_company' => 'Пункт, город... главного офиса',
                    'region_company' => 'Регион, главного офиса',
                    'post_code' => 'Почтовый индекс',
                ];
            break;
            case('employee_serial_number'):
                return[
                    //
                    'id'                => 'id',
                    'number_employee'   => 'Порядковый номер сотрудника(не должен повторяться)',
                    'id_name'           => 'id имени сотрудника',
                    'id_surname'        => 'id фамилии сотрудника',
                    'position'          => 'Номер должности/ей сотрудника',
                    'id_link_vk'        => 'id соц.сеть вк',
                    'id_link_twitter'   => 'id соц.сеть твиттер',
                    'id_link_facebook'  => 'id соц.сеть фэйсбук',
                    'id_link_ok'        => 'id соц.сеть ок',
                    'id_link_instagram' => 'id соц.сеть инстаграм',
                    'id_path'           => 'id фото сотрудника'
                    
                ];
            break;    
            case('facebook'):
                return[
                    'id'       => 'id',
                    'facebook' => 'Ссылка на фейсбук сотрудника',
                ];
            break;
            case('instagram'):
                return[
                    'id'        => 'id',
                    'instagram' => 'Ссылка на инстаграм сотрудника',
                ];
            break;
            case('name_employee'):
                return[
                    'id'        => 'id',
                    'name'      => 'Имя сотрудника',
                ];
            break;
            case('ok'):
                return[
                    'id'        => 'id',
                    'ok'        => 'Ссылка на одноклассники сотрудника',
                ];
            break;
            case('surname_employee'):
                return[
                    'id'        => 'id',
                    'surname'   => 'Фамилия сотрудника',
                ];
            break;
            case('twitter'):
                return[
                    'id'        => 'id',
                    'twitter'   => 'Ссылка на твиттер сотрудника',
                ];
            break;
            case('vk'):
                return[
                    'id'        => 'id',
                    'vk'        => 'Ссылка на вк сотрудника',
                ];
            break;
            case('position_employee'):
                return[
                    'id'        => 'id',
                    'position'  => 'Должность',
                ];
            break;
            case('position_em'):
                return[
                    
                    'id'                => 'id',
                    'position_id'       => 'id в табличке должностей',
                    'employee_position' => 'цифра в поле должность, в главной табличке о сотрудниках',
                ];
            break;
        
            default:
                return null;
            break;
            
        }
        
    }
    
    public function rules()
    {
        switch($this->section)
        {
            case('about'):
                return[
                    //about_company
                    ['id','integer'],
                    [['heading'], 'string', 'max' => 200],
                    [['path', 'adress_photo'], 'string', 'max' => 120],
                    ['show_','boolean'],
                    [['text', 'adress_text'],'string'],
                    [['adress_text'],'string'],
                    [['telephone_company'],'string','max'=>20],
                    [['name_company','street_company','item_company','region_company'],'string', 'max' =>200],
                    [['post_code'], 'string', 'max'=>10],
            
                ];
            break;
            case('employee_serial_number'):
                return[
                    [['id','number_employee','id_name','id_surname','position',
                'id_link_vk','id_link_twitter','id_link_facebook','id_link_ok',
                'id_link_instagram','id_path',],'integer']
                ];
            break;
            case('facebook'):
                return[
                    ['id','integer'],
                    [['facebook'],'string','max'=>120],
                ];
            break;
            case('instagram'):
                return[
                    ['id','integer'],
                    [['instagram'],'string','max'=>120],
                ];
            break;
            case('name_employee'):
                return[
                    ['id','integer'],
                    [['name'],'string','max'=>30],
                    ['name','unique_name','skipOnEmpty' => false, 'skipOnError' => false]
                ];
            break;
            case('ok'):
                return[
                    ['id','integer'],
                    [['ok'],'string','max'=>120],
                ];
            break;
            case('surname_employee'):
                return[
                    ['id','integer'],
                    [['surname'],'string','max'=>30],
                ];
            break;
            case('twitter'):
                return[
                    ['id','integer'],
                    [['twitter'],'string','max'=>120],
                ];
            break;
            case('vk'):
                return[
                    ['id','integer'],
                    [['vk'],'string','max'=>120],
                ];
            break;
            case('position_employee'):
                return[
                    ['id','integer'],
                    [['position'],'string','max'=>100],
                ];
            break;
            case('position_em'):
                return[
                    [['id','position_id','employee_position'],'integer'],
                    
                ];
            break;
            default:
                return null;
            break;
        }
        
    }
    
    public function unique_name(){
        $sql = (new \yii\db\Query())->from('name_employee')
                ->where(['name'=>$this->name])->all();
        //debug($sql);//die();
        if( $sql != null )
        {
            if($sql[0]['id'] != $this->id )
            $this->addError('name','такое имя уже имеется введите уникальное имя');
        }
        //$this->addError('name','такое имя уже имеется введите уникальное имя');
    }
}
