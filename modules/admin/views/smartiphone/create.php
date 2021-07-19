<?php

use yii\helpers\Html;



$this->title = 'Создать новую запись ';
$this->params['breadcrumbs'][] = ['label' => 'Просмотреть все записи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-my">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'image' => $image,
    ]) ?>

</div>

