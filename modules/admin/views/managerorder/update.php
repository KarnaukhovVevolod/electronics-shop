<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdressUser */

$this->title = 'Изменить запись id = ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => ['order']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="my-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

