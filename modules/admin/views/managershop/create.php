<?php

use yii\helpers\Html;



$this->title = 'Создать новую запись ';
if(Yii::$app->session->has('url_main')){
    //$this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => $url];
    $this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => Yii::$app->session->get('url_main')];
}else{
    $this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => ['order']];
}
//$this->params['breadcrumbs'][] = ['label' => 'Просмотреть все записи', 'url' => ['order']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-my">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

