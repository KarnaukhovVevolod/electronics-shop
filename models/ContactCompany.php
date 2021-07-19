<?php

namespace app\models;
use yii\base\Model;
use yii\db\Query;
use yii;

class ContactCompany extends Model {
    //put your code here
    
    public $name;
    public $email;
    public $text;
    
    public function attributeLabels() {
        return[
            'name' => 'Ваше имя',
            'email'=> 'Ваш e-mail',
            'text' => 'Текст сообщения',
        ];
    }
    
    public function rules() {
        return[
            [['name'], 'string','max' => 100],
            [['email'],'string','max' => 100],
            [['text'],'string'],
            ['email','email'],
            [['name','email','text'],'required'],
        ];
    }
    
    public function save_message($data)
    {
        $query_1 = new Query();
        
        //$query_1->from(['m' => 'message_for_company'])
        //        ->all();
        //debug($query_1);
        //$query_2 = new QueryBuilder();
        $columns = ['name','email','text','date','answered','important'];
        $date = date('Y-m-d');
        $rows = [[$data['name'],$data['email'],$data['text'],$date,null,null]];
        
        $query_2 = Yii::$app->db->createCommand()->batchInsert('message_for_company', $columns, $rows)
            ->execute();
        
    }
    
    public function aboutcompany()
    {
        $query_1 = new Query();
        $data = $query_1->from(['about_company'])
                ->select(['adress_photo','adress_text'])
                ->where(['show_'=>1])
                ->one();
        return $data;
    }
    
    
}
