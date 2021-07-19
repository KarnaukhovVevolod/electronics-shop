<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdressUser */

switch($section){
    case('about'):
        $section1 = 'about';
        break;
    default:
        $section1 = 'employee';
        break;
    
}
$this->title = 'Изменить запись id = ' . $model_query['id'];
$this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => ['index','section'=>$section1]];
$this->params['breadcrumbs'][] = ['label' => $model_query['id'], 'url' => ['view', 'id' => $model_query['id'],'section'=>$section]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="my-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'model_query' => $model_query,'section'=>$section,
    ]) ?>

</div>

