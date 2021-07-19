<?php

use yii\helpers\Html;

switch($section){
    case('category'):
        $section1 = 'category';
        break;
    case('search'):
        $section1 = 'category';
        break;
    case('search_category'):
        $section1 = 'category';
    
}

$this->title = 'Создать новую запись ';
$this->params['breadcrumbs'][] = ['label' => 'Просмотреть все записи', 'url' => ['index','section'=>$section1,'my_seo_category'=>null]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-my">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'model_query' => $model_query,
        'section' => $section,'my_seo_category' => $my_seo_category,
    ]) ?>

</div>

