<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;

class Twitter extends ActiveRecord {
    
    public static function tableName() {
        return 'twitter';
    }
    
    public function attributeLabels() {
        return[
            'id'      => 'id',
            'twitter' => 'Ссылка на твиттер',
        ];
    }
    
    public function rules()
    {
        return[
            ['id','integer'],
            [['twitter'],'string','max' => 120],
            ['twitter','required'],
            ['twitter','unique'],
        ];
    }
}
