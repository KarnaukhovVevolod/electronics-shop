<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use Yii;

/* @var $this yii\web\View */
/* @var $model app\models\AdressUser */

$this->title = 'Запись № = '.$model->id;

if(Yii::$app->session->has('url_main')){
    $this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => Yii::$app->session->get('url_main')];
}else{
    $this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => ['order']];
}
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
            'order_number',
            'login',
            'post_code',
            'type_delivery',
            ['attribute'=>'status_order',
                'value' => function($data){
                    switch($data['status_order']){
                        case 1:
                            return 'Обработка заказа';
                            break;
                        case 2:
                            return 'Подготовка заказа';
                            break;
                        case 3:
                            return 'Отправка заказа';
                            break;
                        case 4:
                            return 'Доставлен заказ в пункт выдачи';
                            break;
                        case 5:
                            return 'Заказ завершён';
                            break;
                        default:
                            return 'Непонятный статус';
                            break;
                    }
                },
                ],
            'city',
            'name',
            'surname',
            'region',
            'room',
            'email',
            'date_order',
            'point_delivery',
            'village_locality',
            'street',
            'flat',
            'telephone',
            'total_price_order',
            'pay_order',
            
        ],
    ]) ?>

</div>

