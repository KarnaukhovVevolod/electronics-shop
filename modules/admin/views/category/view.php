<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AdressUser */

$this->title = 'Запись № = '.$model['id'];
$this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => ['index','section'=>'category','my_seo_category'=>null]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="my-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model['id'],'section'=>$section,'my_seo_category'=>$my_seo_category], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model['id'],'section'=>$section,'my_seo_category'=>$my_seo_category], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php switch($section): ?>
<?php case('category'): ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'id',
            ['attribute' => 'category',
             'label' => 'Категория',
            ],
            ['attribute' => 'subcategory',
             'label' => 'Подкатегория',
            ],
            ['attribute' => 'type_of_subcategory',
             'label' => 'Вид подкатегории',
            ],
            ['attribute' => 'category_english',
             'label' => 'Категория по английски',
            ],
            ['attribute' => 'link_category',
             'label' => 'Ссылка на категорию',
            ],
            ['attribute' => 'link_subcategory',
             'label' => 'Ссылка на подкатегорию',
            ],
            ['attribute' => 'link_type_subcategory',
             'label' => 'Ссылка на вид подкатегории',
            ],
            ['attribute' => 'id_seo_search_category',
             'label' => 'id SEO данные для категории',
            ],
            ['attribute' => 'id_seo_search_subcategory',
             'label' => 'id SEO данные для подкатегории',
            ],
            ['attribute' => 'id_seo_search_type_of_subcategory',
             'label' => 'id SEO данные для типа подкатегории',
            ],
            
        ],
    ]) ?>
<?php break; ?>
<?php case('search'): ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'id',
            ['attribute' => 'teg_title',
             'label' => 'Tег title',
            ],
            ['attribute' => 'teg_keywords',
             'label' => 'Тег keywords',
            ],
            ['attribute' => 'teg_description',
             'label' => 'Тег description',
            ],
            ['attribute' => 'my_comment',
             'label' => 'Мои комментарии',
            ],
            [
                'attribute' => 'type_category',
                'label'     => 'Страницы: главная, о нас , наш адрес',
                'value'   => function($data){
                    
                    switch ($data['type_category']){
                        case 'main':
                            return 'Главная страница';
                            break;
                        case 'about_us':
                            return 'Страница о компании';
                            break;
                        case 'office_addresses':
                            return 'Страница адреса офисов';
                            break;
                        default :
                            return $data['type_category'];
                            break;
                    }
                    /**/
                    //return '$data';
                }
            ],

            
        ],
    ]) ?>
<?php break; ?>
<?php case('search_category'): ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'id',
            ['attribute' => 'teg_title',
             'label' => 'Tег title',
            ],
            ['attribute' => 'teg_keywords',
             'label' => 'Тег keywords',
            ],
            ['attribute' => 'teg_description',
             'label' => 'Тег description',
            ],
            ['attribute' => 'my_comment',
             'label' => 'Мои комментарии',
            ],
            
        ],
    ]) ?>
<?php break; ?>
 
<?php endswitch; ?>   
</div>

