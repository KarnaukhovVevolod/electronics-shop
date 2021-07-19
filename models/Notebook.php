<?php


namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;
use yii\helpers\ArrayHelper;
use app\models\Comment;


/**
 * Description of Notebook
 *
 * @author 222
 */
class Notebook extends ActiveRecord{
    
    public static function tableName() {
        return 'notebook' ;
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
            'amount_ram'         => 'Объём оперативной памяти',
            'like_product'       => 'Понравилась продукция',
            'number_purchases'   => 'Кол-во покупок',
            'manufacturer'       => 'Производитель',
            'number_core'        => 'Кол-во ядер процессора',
            'total_memory'       => 'Общий объём памяти',
            'screen_diagonal'    => 'Диагональ экрана',
            'type_notebook'      => 'Тип ноутбука',
            'date'               => 'Дата',
            'link_subcategory'   => 'Ссылка на подкатегорию',
            'link_type_of_subcategory' => 'Cсылка на вид подкатегории',
            'category_english'   => 'Название категории (по английски)',
            'number_of_products' => 'Количество продукта',
        ];
    }
    
    public function rules() {
        return [
            
            [['id','like_product','number_purchases','number_core','price_sort', 'number_of_products'], 'integer'],
            [['path','link_description', 'path_2'], 'string','max' => 120],
            [['path_3','path_4','path_5','path_6','path_7','path_8'],'string','max' => 120],
            [['name_type_of_subcategory',  'manufacturer', 'category_english', 'link_subcategory','link_type_of_subcategory'], 'string', 'max' => 30],
            [['model_product'],'string','max' => 100],
            ['screen_diagonal', 'integer'],
            [['price', 'old_price'], 'string', 'max' => 15],
            [['discount'], 'string', 'max' => 5],
            [[ 'marketing_products', 'type_notebook'], 'string', 'max' => 20],
            [['amount_ram','total_memory'], 'string', 'max' => 10],
            [['date'], 'date', 'format' => 'yyyy-MM-dd'],
            ['description', 'string'],
            [['path', 'name_type_of_subcategory', 'price_sort', 'model_product'], 'required'],
        ];
    }
    
    public function getComment(){
        return $this->hasMany(Comment:: className(), ['id_product' => 'id'])->andWhere(['category'=>'notebook'])->orderBy(['id'=>SORT_DESC]);
    }
    
    //читаем все продукты для категории ноутбука
    
    public function category_notebook_all()
    {
        $data = Category::find()->orderBy(['category'=>'ewrwer'])->with('notebooks')->all();
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
    public function Notebook_filt_all(){
        //$notebook = Notebook::find()->all();
        $notebook = (new \yii\db\Query)->from('notebook')->all();
        $manufacturer     = ArrayHelper::map($notebook, 'manufacturer', 'manufacturer');
        $number_core      = ArrayHelper::map($notebook, 'number_core', 'number_core');
        $total_memory     = ArrayHelper::map($notebook, 'total_memory', 'total_memory');
        $amount_ram       = ArrayHelper::map($notebook, 'amount_ram', 'amount_ram');
        $screen_diagonal  = ArrayHelper::map($notebook, 'screen_diagonal', 'screen_diagonal');
        $name_subcategory = ArrayHelper::map($notebook, 'name_type_of_subcategory', 'name_type_of_subcategory');
        
        $result = [
                'Выберите раздел подкатегории...' => $name_subcategory,
                'Выберите производителя...' => $manufacturer,
                'Выберите кол-во ядер процессора...' => $number_core,
                'Выберите объём HDD...' => $total_memory,
                'Выберите объём оперативной памяти...' => $amount_ram,
                'Выберите диагонал экрана...' => $screen_diagonal,

            ];
        
        //debug($result);
        //die();
        return $result;
    }
    
    
    
}
