<?php

namespace app\models;
use yii\db\Query;
use yii\db\ActiveRecord;


class AboutCompany extends ActiveRecord
{
    
    public static function tableName() {
        return 'about_company';
    }
    
    public function attributeLabels() {
        return [
            'id' => 'id',
            'heading' => 'Заголовок',
            'text' => 'Текст',
            'path' => 'Фото',
            'show_' => 'Действие показать',
            'adress_photo' => 'Фото с адресом главного офиса',
            'adress_text' => 'Адреса офисов компании',
            'name_company' => 'Имя компании',
            'telephone_company' => 'Телефон компании',
            'street_company' => 'Улица главного офиса',
            'item_company' => 'Пункт, город... главного офиса',
            'region_company' => 'Регион, главного офиса',
            'post_code' => 'Почтовый индекс',
        ];
    }
    
    public function rules() {
        return[
            ['id','integer'],
            [['heading'],'string','max' => 200],
            [['path'],'string', 'max' => 120],
            ['show_','boolean'],
            ['text','string'],
            [['adress_photo'],'string','max'=>120],
            [['adress_text'],'string'],
            [['telephone_company'],'string','max'=>20],
            [['name_company','street_company','item_company','region_company'],'string', 'max' =>200],
            [['post_code'], 'string', 'max'=>10],
            
        ];
    }
    
    public function info_employee()
    {
        // поднимаем информацию о компании
        $query_ = new Query();
        $about_company = $query_->from(['u'=>'about_company'])
            ->where(['show_'=>1])->all();
     
        // поднимаем информацию о соотрудниках
        $query_2 = new Query();
        $info_employee = $query_2->from(['e' => 'employee_serial_number'])
                ->join('LEFT JOIN','facebook','facebook.id = e.id_link_facebook') 
                ->join('LEFT JOIN','vk','vk.id = e.id_link_vk')
                ->join('LEFT JOIN','ok','ok.id = e.id_link_ok')
                ->join('LEFT JOIN','twitter','twitter.id = e.id_link_twitter')
                ->join('LEFT JOIN','instagram','instagram.id = e.id_link_instagram')
                ->join('LEFT JOIN','name_employee','name_employee.id = e.id_name')
                ->join('LEFT JOIN','surname_employee','surname_employee.id = e.id_surname')
                ->join('LEFT JOIN','image','image.id = e.id_path')
                ->all();
        //поднимаем информацию о должности соотрудника
        $query_3 = new Query();
        $position_employee = $query_3->from(['u'=>'position_em'])
                ->join('LEFT JOIN','position_employee','u.position_id = position_employee.id')
                ->orderBy(['employee_position'=>SORT_ASC])
                ->all();
        //объединяем инфромацию считанную с базы данных на втором и третьем запросе
        $count_employee = count($info_employee);
        $count_employee_position = count($position_employee);
        //объединяем отсортированные данные
        $sort_position_employee=[];
        $j_sort = 0;$k_number = 0;
        $emplo_pos = $position_employee[0]['employee_position'];
        $search[$emplo_pos] = 0;
        for($j = 0; $j < $count_employee_position; $j++)
        {
            if($emplo_pos != $position_employee[$j]['employee_position'] )
            {
                $j_sort++;
                $k_number = 0;
                $emplo_pos = $position_employee[$j]['employee_position'];
                $search[$emplo_pos] = $j_sort;
            }
            $sort_position_employee[$j_sort][$k_number] = $position_employee[$j];
            $k_number++;
        }
        //debug($sort_position_employee);
        //debug($search);
        //debug($info_employee);
        
        $employee = [];
        $exit = 0;
        //debug($info_employee[0]['position']);
        //die();
        for($i = 0; $i < $count_employee; $i++ )
        {
            //$employee[$i] = $info_employee[$i];
            if(isset($search[$info_employee[$i]['position']]) && isset($sort_position_employee[$search[$info_employee[$i]['position']]]))
            {
                
                //$employee[$i]['position'] = $sort_position_employee[$search[$info_employee[$i]['position']]];
                $info_employee[$i]['position_n'] = $sort_position_employee[$search[$info_employee[$i]['position']]];
            }
            
        }
        return [$about_company, $info_employee];
    }  
          
    
}
