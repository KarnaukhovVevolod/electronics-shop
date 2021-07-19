<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AdressUser */

$this->title = 'Запись № = '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="my-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'id',
            'quantity',
            'order_number',
            'login',
            'name_model',
            'path',
            'price',
            'total_price',
            'total_price_all',
            'date_order',
            'post_code',
            'type_delivery',
            'status_order',
            'city',
            'point_delivery',
            'village_locality',
            'street',
            'region',
            'room',
            'email',
            'flat',
            'telephone',
            'pay_order',
            'link',

            
        ],
    ]) ?>

</div>

