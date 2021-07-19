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
            'like_product',
            'price_sort',
            'number_purchases',
            'number_of_products',
            'path',
            'link_description',
            'path_2',
            'path_3',
            'path_4',
            'path_5',
            'path_6',
            'path_7',
            'path_8',
            'name_subcategory',
            'category_english',
            'model_product',
            'manufacturer',
            'link_subcategory',
            'link_type_of_subcategory',
            'price',
            'old_price',
            'type_camera',
            'discount',
            'marketing_products',
            'video_recording_speed',
            'description',
            'date',
            
        ],
    ]) ?>

</div>

