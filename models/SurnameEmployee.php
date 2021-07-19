<?php

namespace app\models;

use yii\db\ActiveRecord;

class SurnameEmployee extends ActiveRecord {
    
    public static function tableName() {
        return 'surname_employee';
    }
    
    public function attributeLabels() {
        return[
            'id'      => 'id',
            'surname' => 'Фамилия работника',
        ];
    }
    
    public function rules()
    {
        return[
            ['id','integer'],
            [['surname'],'string','max' => 30],
            ['surname','required'],
            ['surname','unique'],
            ['link_position','integer'],
        ];
    }
}
