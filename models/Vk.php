<?php


namespace app\models;

use yii\db\ActiveRecord;

class Vk extends ActiveRecord {
    //put your code here
    public static function tableName() {
        return 'vk';
    }
    
    public function attributeLabels() {
        return[
            'id' => 'id',
            'vk' => 'Ссылка на вк',
        ];
    }
    
    public function rules()
    {
        return[
            ['id','integer'],
            [['vk'],'string','max' => 120],
            ['vk','required'],
            ['vk','unique'],
        ];
    }
}
