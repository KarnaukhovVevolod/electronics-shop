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
            'page',
            'path_1',
            'path_2',
            'path_3',
            'link_product_1',
            'link_product_2',
            //'link_product_3',
            //'text_1',
            //'text_2',
            //'text_3',
            //'text_4',
            //'text_5',
            //'text_6',
            //'text_7',
            //'text_8',
            //'text_9',
            //'text_10',
            //'text_11',
            //'text_12',
            //'show_banner',
            //'subcategory',

            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
