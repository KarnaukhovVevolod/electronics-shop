<?php


namespace app\models;

use yii\db\ActiveRecord;

class Ok extends ActiveRecord {
    public static function tableName() {
        return 'ok';
    }
    
    public function attributeLabels() {
        return[
            'id'=>'id',
            'ok' => 'Ссылка на ok',
        ];
    }
    
    public function rules()
    {
        return[
            ['id','integer'],
            [['ok'],'string','max' => 120],
            ['ok','required'],
            ['ok','unique'],
        ];
    }
}
