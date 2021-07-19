<?php

namespace app\models;

use yii\db\ActiveRecord;

class NameEmployee extends ActiveRecord {
    //put your code here
    public static function tableName() {
        return 'name_employee';
    }
    
    public function attributeLabels() {
        return[
            'id'   => 'id',
            'name' => 'Имя работника',
        ];
    }
    
    public function rules()
    {
        return[
            ['id','integer'],
            [['name'],'string','max' => 30],
            ['name','required'],
            ['name','unique'],
        ];
    }
}
