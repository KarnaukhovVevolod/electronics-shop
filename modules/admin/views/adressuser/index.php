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
            'login',
            'name',
            'surname',
            'patronymic',
            //'country',
            //'city',
            //'email',
            //'region',
            //'room',
            //'mobile',
            //'flat',
            //'company',
            //'date',
            //'dop_info',
            //'street',
            //'post_code',
            //'village_locality',

            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
