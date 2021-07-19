<?php


namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;
use yii\helpers\ArrayHelper;
use app\models\Comment;


class Camera extends ActiveRecord {
    //put your code here
     public static function tableName() {
        return 'camera' ;
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
            'resolution_matrix'  => 'Разрешение камеры',
            'type_camera'        => 'Тип камеры',
            'date'               => 'Дата',
            'link_subcategory'   => 'Ссылка на подкатегорию',
            'link_type_of_subcategory' => 'Cсылка на вид подкатегории',
            'category_english'   => 'Название категории (по английски)',
            'number_of_products' => 'Количество продукта',
        ];
    }
    
    public function rules() {
        return [
            
            [['id','like_product','number_purchases','price_sort', 'number_of_products'], 'integer'],
            [['path','link_description', 'path_2'], 'string','max' => 120],
            [['path_3','path_4','path_5','path_6','path_7','path_8'],'string','max' => 120],
            [['name_type_of_subcategory', 'model_product', 'manufacturer', 'category_english', 'link_subcategory','link_type_of_subcategory'], 'string', 'max' => 30],
            [['model_product'], 'string', 'max'=>100],
            [['price', 'old_price'], 'string', 'max' => 15],
            [['discount'], 'string', 'max' => 5],
            [['marketing_products', 'type_camera', 'resolution_matrix'], 'string', 'max' => 20],
            [['date'], 'date', 'format' => 'yyyy-MM-dd'],
            ['description', 'string'],
            [['path', 'name_type_of_subcategory','price_sort', 'model_product'], 'required'],
        ];
    }
    
    public function getComment(){
        return $this->hasMany(Comment:: className(), ['id_product' => 'id'])->andWhere(['category'=>'camera'])->orderBy(['id'=>SORT_DESC]);
    }
    
    //читаем все продукты для категории камера
    
    public function category_camera_all()
    {
        $data = Category::find()->orderBy(['category'=>'ewrwer'])->with('camera')->all();
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
    public function Camera_filt_all(){
        //$camera = Camera::find()->all();
        $camera = (new \yii\db\Query())->from('camera')->all();
        $manufacturer      = ArrayHelper::map($camera, 'manufacturer', 'manufacturer');
        
        $resolution_matrix = ArrayHelper::map($camera, 'resolution_matrix', 'resolution_matrix');
        $name_subcategory  = ArrayHelper::map($camera, 'name_type_of_subcategory', 'name_type_of_subcategory');
        
        $result = [
                
                'Выберите производителя...' => $manufacturer,
                'Выберите разрешение матрицы...' => $resolution_matrix,
                'Выберите раздел подкатегории...' => $name_subcategory,
            ];
        
        //debug($result);
        //die();
        return $result;
    }
    
    
}
