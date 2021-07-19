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
            //'page',
            [
                'attribute' =>'page',
                'value'=>function($data){
                    switch($data->page){
                        case 3 : 'Страница с корзиной';
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

            
        ],
    ]) ?>

</div>

