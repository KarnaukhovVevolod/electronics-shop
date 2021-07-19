<?php

namespace app\models;

use yii\base\Model;
use Yii;

class UpdateForm extends Model {
    //put your code here
    
    public $id;
    public $field;
    public $update;
    public $table;
    public $size;
    
    public function attributeLabels() {
        return[
            'id'       => 'id',
            'field'    => 'Поле',
            'update'   => 'Чем заменить поле',
            'table'    => 'Таблица в базе данных',
        ];
    }
    
    public function rules() {
        if($this->size == null)
        {
            return[
            [['id','field','table'],'string'],
            [['update'],'string'],
                [['field','id'],'required'],
            ];
        }
        else{
            return[
            [['id','field','table'],'string'],
            [['update'],'string','max'=>$this->size],
                [['field','id'],'required'],
            ];
        }
        
    }
    
    public function update_table($data)
    {
        $element_id = explode(',', $data['id']);
            //debug($element_id);
            $number = null; $id = [];
            foreach($element_id as $element)
            {
                $count = iconv_strlen($element);
                $pos = strpos($element,'-');
                if($pos != FALSE){
                    $min_max = explode('-', $element);
                    for($i=$min_max[0];$i<=$min_max[1];$i++)
                    {
                        array_push($id, $i);
                    }
                }
                else{
                    $b = (int)$element;
                    if($b > 0 && $b != null)
                    {
                       array_push($id, $b); 
                    }
                    //debug($b);
                }
            }
            //debug($id);//die();
            //обновляем бд
            /*Audio::updateAll([$data_post['UpdateForm']['field'] => $data_post['UpdateForm']['update']],
            ['id' => $id]);*/
            Yii::$app->db->createCommand()->update($data['table'],[$data['field'] => $data['update']],
            ['id' => $id])->execute();
    }
    
}
