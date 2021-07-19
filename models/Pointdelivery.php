<?php


namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Pointdelivery extends ActiveRecord {
    
    
    public static function tableName() {
        return 'point_delivery';
    }
    
    public function attributeLabels() {
        return[
            'id'        => 'id',
            'name'      => 'Название пункта выдачи',
            'adress'    => 'Адрес',
            'telephone' => 'Телефоне',
            'time_work' => 'График работы',
        ];
    }
    
    public function rules()
    {
        return[
            ['id', 'integer'],
            [['name', 'telephone'], 'string', 'max' => 100],
            [['adress', 'time_work'], 'string', 'max' => 150],
            
        ];
    }
    
    public function readDrop()
    {
        $point_delivery = Pointdelivery::find()->all();
        $point = ArrayHelper::map($point_delivery,'name','name');
        
        $point_delivery['point'] = $point;
        return $point_delivery;
        
        
    }
    
}
