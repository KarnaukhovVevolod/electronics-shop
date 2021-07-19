<?php

use yii\helpers\Html;

switch($section){
    case('about'):
        $section1 = 'about';
        break;
    default:
        $section1 = 'employee';
        break;
    
}

$this->title = 'Создать новую запись ';
$this->params['breadcrumbs'][] = ['label' => 'Просмотреть все записи', 'url' => ['index','section'=>$section1]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-my">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'model_query' => $model_query,
        'section' => $section
    ]) ?>

</div>

