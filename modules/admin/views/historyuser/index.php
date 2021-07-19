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
            'quantity',
            'order_number',
            'login',
            'name_model',
            'path',
            'price',
            //'total_price',
            //'total_price_all',
            //'date_order',
            //'post_code',
            //'type_delivery',
            //'status_order',
            //'city',
            //'point_delivery',
            //'village_locality',
            //'street',
            //'region',
            //'room',
            //'email',
            //'flat',
            //'telephone',
            //'pay_order',
            //'link',

            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
