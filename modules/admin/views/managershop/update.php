<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdressUser */

$this->title = 'Изменить запись id = ' . $model->id;
if(Yii::$app->session->has('url_main')){
    //$this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => $url];
    $this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => Yii::$app->session->get('url_main')];
}else{
    $this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => ['order']];
}
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="my-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

