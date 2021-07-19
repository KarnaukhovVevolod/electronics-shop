<?php


namespace app\models;

use yii\db\ActiveRecord;

class PositionEmployee extends ActiveRecord {
    //put your code here
    public static function tableName() {
        return 'position_employee';
    }
    
    public function attributeLabels() {
        return[
            'id'            => 'id',
            'position'      => 'Должность работника',
            
        ];
    }
    
    public function rules()
    {
        return[
            ['id','integer'],
            [['position'],'string','max' => 100],
            ['position','required'],
            ['position','unique'],
        ];
    }
}
