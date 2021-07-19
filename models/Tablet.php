<?php


namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
/**
 * Description of Notebook
 *
 * @author 222
 */
class Tablet extends ActiveRecord{
    
    public static function tableName() {
        return 'tablet' ;
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
            'category_english'   => 'Название категории (по английски)',
            'model_product'      => 'Модель продукта',
            'price'              => 'Цена',
            'old_price'          => 'Цена старое',
            'price_sort'         => 'Цена сортировка',
            'discount'           => 'скидка',
            'link_description'   => 'Ссылка на описание',
            'description'        => 'Описание продукта',
            'marketing_products' => 'Маркетинг продукта',
            'amount_ram'         => 'Объём оперативной памяти',
            'like_product'       => 'Понравилась продукция',
            'number_purchases'   => 'Кол-во покупок',
            'manufacturer'       => 'Производитель',
            'number_sim'         => 'Кол-во sim карт',
            'internal_memory'    => 'Общий объём памяти',
            'screen_diagonal'    => 'Диагональ экрана',
            'type_tablet'        => 'Тип планшета',
            'date'               => 'Дата',
            'link_subcategory'   => 'Ccылка на подкатегорию',
            'link_type_of_subcategory' => 'Cсылка на вид подкатегории',
            'number_of_products' => 'Количество продукта',
        ];
    }
    
    public function rules() {
        return [
            
            [['id','like_product','number_purchases','number_sim','price_sort','number_of_products'], 'integer'],
            [['path', 'link_description', 'path_2'], 'string','max' => 120],
            [['path_3','path_4','path_5','path_6','path_7','path_8'],'string','max' => 120],
            [['name_type_of_subcategory', 'category_english',  'manufacturer',
                'screen_diagonal','link_subcategory','link_type_of_subcategory'], 'string', 'max' => 30],
            [['model_product'],'string', 'max'=>100],
            [['price', 'old_price'], 'string', 'max' => 15],
            [['discount'],'string', 'max' => 5],
            [['marketing_products', 'type_tablet'], 'string', 'max' => 20],
            [['amount_ram','internal_memory'], 'string', 'max' => 10],
            [['date'], 'date', 'format' => 'yyyy-MM-dd'],
            ['description', 'string'],
            [['path', 'name_type_of_subcategory','price_sort', 'model_product'], 'required'],
            
        ];
    }
    
    
    public function getComment(){
        return $this->hasMany(Comment:: className(), ['id_product' => 'id'])->andWhere(['category'=>'tablet'])->orderBy(['id'=>SORT_DESC]);
    }
    

    
    //читаем все продукты для категории ноутбука
    
    public function category_tablet_all()
    {
        $data = Category::find()->orderBy(['category'=>'ewrwer'])->with('tablet')->all();
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
    public function Tablet_filt_all(){
        //$tablet = Tablet::find()->all();
        $tablet = (new \yii\db\Query())->from('tablet')->all();
        $manufacturer      = ArrayHelper::map($tablet, 'manufacturer', 'manufacturer');
        $number_sim        = ArrayHelper::map($tablet, 'number_sim', 'number_sim');
        $internal_memory   = ArrayHelper::map($tablet, 'internal_memory', 'internal_memory');
        $amount_ram        = ArrayHelper::map($tablet, 'amount_ram', 'amount_ram');
        $screen_diagonal   = ArrayHelper::map($tablet, 'screen_diagonal', 'screen_diagonal');
        
        $name_subcategory  = ArrayHelper::map($tablet, 'name_type_of_subcategory', 'name_type_of_subcategory');
        
        $result = [
                
                'Выберите производителя...'            => $manufacturer,
                'Выберите кол-во sim-карт...'          => $number_sim,
                'Выберите объём внутренней памяти...'  => $internal_memory,
                'Выберите объём оперативной памяти...' => $amount_ram,
                'Выберите диагональ экрана...'         => $screen_diagonal,
                'Выберите раздел подкатегории...'             => $name_subcategory,
                
            ];
        
        //debug($result);
        //die();
        return $result;
    }
    
    
}
