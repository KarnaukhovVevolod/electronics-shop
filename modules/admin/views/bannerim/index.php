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

            'path_1',
            'id',
            'page',
            'number_page',
            'path_2',
            'path_3',
            'path_4',
            //'link_description',
            //'show_banner',
            //'subcategory',

            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
