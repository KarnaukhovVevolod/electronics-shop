<?php


namespace app\models;

use yii\db\ActiveRecord;

class Instagram extends ActiveRecord {
    //put your code here
    public static function tableName() {
        return 'instagram';
    }
    
    public function attributeLabels() {
        return[
            'id'=>'id',
            'instagram' => 'Ссылка на инстаграм',
        ];
    }
    
    public function rules()
    {
        return[
            ['id','integer'],
            [['instagram'],'string','max' => 120],
            ['instagram','required'],
            ['instagram','unique'],
        ];
    }
    
}
