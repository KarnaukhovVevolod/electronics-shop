<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все записи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form_my">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'page',
            [
                'attribute' =>'page',
                'content'=>function($data){
                    switch($data->page){
                        case 3 : 'Страница с корзиной';
                            return 'Страница с корзиной';
                            break;
                        case 4 :
                            return 'Страница с катег. подкат. вид.подкат.';
                            break;
                        case 5 :
                            return 'Cтраница с понравившимися товарами';
                            break;
                        case 6 :
                            return 'Страница с личным кабинетом польэователя';
                            break;
                        case 7 :
                            return 'Страница с новинками продукции';
                            break;
                        case 8 :
                            return 'Страница с оформлением заказа';
                            break;
                        default:
                            return $data->page;
                    }
                }
            ],
            'path',
            'link_description',
            'subcategory',
            'show_banner',

            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
