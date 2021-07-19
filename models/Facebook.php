<?php

namespace app\models;
use yii\db\ActiveRecord;

class Facebook extends ActiveRecord {
    //put your code here
    public static function tableName()
    {
        return 'facebook';
    }
    
    public function attributeLabels() {
        return[
            'id'=>'id',
            'facebook'=>'Ссылка на facebook',
            
            
        ];
    }
    
    public function rules() {
        return[
            ['id','integer'],
            [['facebook'], 'string', 'max' => 120],
            ['facebook','required'],
            ['facebook','unique'],
        ];
    }
    
}
