<?php

namespace app\models;

use yii\db\ActiveRecord;

class EmployeeSerialnumber extends ActiveRecord {
    //put your code here
    
    public static function tableName()
    {
        return 'employee_serial_number';
    }
    
    public function attributeLabels() {
        return[
            'id'                => 'id',
            'number_employee'   => 'Порядковый номер сотрудника',
            'id_name'           => 'Имя',
            'id_surname'        => 'Фамилия',
            'position'          => 'Ссылка на должность',
            'id_path'           => 'id на фото сотрудника',
            'id_link_vk'        => 'Ссылка на vk',
            'id_link_twitter'   => 'Ссылка на twitter',
            'id_link_facebook'  => 'Ссылка на facebook',
            'id_link_ok'        => 'Ссылка на ok',
            'id_link_instagram' => 'Ссылка на instagram',
        ];
    }
    
    public function rules() {
        return[
            [['id','number_employee','id_name','id_surname',
                'position','id_path',
                'id_link_vk','id_link_twitter','id_link_facebook',
                'id_link_ok','id_link_instagram'],'integer'],
            ['number_employee','unique'],
        ];
    }
    
    
    
}
