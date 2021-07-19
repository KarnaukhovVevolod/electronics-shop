<?php


namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;
use yii\helpers\ArrayHelper;
use app\models\Comment;

class Smartiphone extends ActiveRecord {
    
    public static function tableName() {
        return 'smartiphone' ;
    }
    
    public function attributeLabels() {
        return[
            'id'                 => 'id',
            'path'               => 'Путь для фото 1',
            'path_2'             => 'Путь для фото 2',
            'path_3'             => 'Путь для фото 3',
            'path_4'             => 'Путь для фото 4',
            'path_5'             => 'Путь для фото 5',
            'path_6'             => 'Путь для фото 6',
            'path_7'             => 'Путь для фото 7',
            'path_8'             => 'Путь для фото 8',
            'name_type_of_subcategory'   => 'Название вида подкатегории',
            'model_product'      => 'Модель продукта',
            'price'              => 'Цена',
            'old_price'          => 'Цена старое',
            'price_sort'         => 'Цена для сортировки',
            'discount'           => 'Cкидка',
            'link_description'   => 'Ссылка на описание',
            'description'        => 'Описание продукта',
            'marketing_products' => 'Маркетинг продукта',
            'like_product'       => 'Понравилась продукция',
            'number_purchases'   => 'Кол-во покупок',
            'manufacturer'       => 'Производитель',
            'screen_diagonal'    => 'Диагональ экрана',
            'internal_memory'    => 'Внутренняя память',
            'amount_ram'         => 'Оперативная память',
            'camera_resolution'  => 'Разрешение камеры',
            'number_core'        => 'Кол-во ядер',
            'color'              => 'Цвет',
            'type_device'        => 'Тип устройства',
            'series'             => 'Серия',
            'date'               => 'Дата',
            'link_subcategory'   => 'Ссылка на подкатегорию',
            'link_type_of_subcategory' => 'Cсылка на вид подкатегории',
            'category_english'   => 'Название категории (по английски)',
            'number_of_products' => 'Количество продукта',
        ];
    }
    
    public function rules() {
        return [
            
            [['id','like_product','number_purchases','price_sort', 'number_of_products','number_core'], 'integer'],
            [['path','link_description', 'path_2'], 'string','max' => 120],
            [['path_3','path_4','path_5','path_6','path_7','path_8'],'string','max' => 120],
            [['name_type_of_subcategory', 'manufacturer', 'category_english', 'link_subcategory','link_type_of_subcategory'], 'string', 'max' => 30],
            [['model_product'],'string','max' => 100],
            [['price', 'old_price'], 'string', 'max' => 15],
            [['discount'], 'string', 'max' => 5],
            [[ 'marketing_products','color'], 'string', 'max' => 20],
            [['screen_diagonal', 'series'], 'string', 'max' => 30],
            [['type_device'], 'string', 'max' => 20],
            [['internal_memory','amount_ram','camera_resolution'],'string', 'max' => 10],

            [['date'], 'date', 'format' => 'yyyy-MM-dd'],
            ['description', 'string'],
            [['path', 'name_type_of_subcategory','price_sort', 'model_product'], 'required'],
        ];
    }
    
    public function getComment(){
        return $this->hasMany(Comment:: className(), ['id_product' => 'id'])->andWhere(['category'=>'smartiphone'])->orderBy(['id'=>SORT_DESC]);
    }
    

    
    //читаем все продукты для категории ноутбука
    
     public function category_smartiphone_all()
    {
        $data = Category::find()->orderBy(['category'=>'ewrwer'])->with('smartiphone')->all();
        $category_data = [];
        $category = '';
        $i = 0;$j = 0;
        foreach($data as $data_category)
        {
            if($data_category['category'] != $category)
            { 
                $i++;
                $category = $data_category['category'];
            }
            
            $category_data[$i][$j] = $data_category; 
            
            $j++;
        }
        
        //debug($category_data);
        
        return $category_data;
    }
    
    //выбираем все данные из таблицы с ноутбуками
    public function Smartiphone_filt_all(){
        //$smartiphone = Smartiphone::find()->all();
        $smartiphone = (new \yii\db\Query)->from('smartiphone')->all();
        $manufacturer      = ArrayHelper::map($smartiphone, 'manufacturer', 'manufacturer');
        $number_core       = ArrayHelper::map($smartiphone, 'number_core', 'number_core');
        $internal_memory   = ArrayHelper::map($smartiphone, 'internal_memory', 'internal_memory');
        $amount_ram        = ArrayHelper::map($smartiphone, 'amount_ram', 'amount_ram');
        $screen_diagonal   = ArrayHelper::map($smartiphone, 'screen_diagonal', 'screen_diagonal');
        $camera_resolution = ArrayHelper::map($smartiphone, 'camera_resolution', 'camera_resolution');
        $color             = ArrayHelper::map($smartiphone, 'color', 'color');
        $series            = ArrayHelper::map($smartiphone, 'series', 'series');
        $name_subcategory  = ArrayHelper::map($smartiphone, 'name_type_of_subcategory', 'name_type_of_subcategory');
        
        $result = [
                'Выберите производителя...'            => $manufacturer,
                'Выберите кол-во ядер...'              => $number_core,
                'Выберите объём внутренней памяти...'  => $internal_memory,
                'Выберите объём оперативной памяти...' => $amount_ram,
                'Выберите диагональ экрана...'         => $screen_diagonal,
                'Выберите разрешение камеры...'        => $camera_resolution,
                'Выберите цвет корпуса...'             => $color,
                'Выберите серию...'                    => $series,
                
                'Выберите раздел подкатегории...'             => $name_subcategory,
                
            ];
        
        //debug($result);
        //die();
        return $result;
    }
    
    
}
