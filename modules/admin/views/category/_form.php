<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    
<?php switch($section): ?>
<?php case('category'): ?>

<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
    <?= $form->field($model, 'id')->textInput(['value'=>$model_query['id']]) ?>  
 
    <?= $form->field($model, 'category')->textInput(['maxlength' => true,'value'=>$model_query['category']]) ?>  

    <?= $form->field($model, 'subcategory')->textInput(['maxlength' => true,'value'=>$model_query['subcategory']]) ?>  

    <?= $form->field($model, 'category_english')->textInput(['maxlength' => true,'value'=>$model_query['category_english']]) ?>  

    <?= $form->field($model, 'type_of_subcategory')->textInput(['maxlength' => true,'value'=>$model_query['type_of_subcategory']]) ?>  

    <?= $form->field($model, 'link_category')->textInput(['maxlength' => true,'value'=>$model_query['link_category']]) ?>  

    <?= $form->field($model, 'link_subcategory')->textInput(['maxlength' => true,'value'=>$model_query['link_subcategory']]) ?>  

    <?= $form->field($model, 'link_type_subcategory')->textInput(['maxlength' => true, 'value'=>$model_query['link_type_subcategory']]) ?>  

    <?= $form->field($model, 'id_seo_search_category')->textInput(['value'=>$model_query['id_seo_search_category']]) ?>
    
    <?= $form->field($model, 'id_seo_search_subcategory')->textInput(['value'=>$model_query['id_seo_search_subcategory']]) ?>
    
    <?= $form->field($model, 'id_seo_search_type_of_subcategory')->textInput(['value'=>$model_query['id_seo_search_type_of_subcategory']]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

<?php break; ?>

<?php case('search'): ?>

<div class="form-my">
    <?php /*debug($model);/*
    debug($model_query);die();*/ ?>
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
 
    <?= $form->field($model, 'teg_title')->textInput(['maxlength' => true,'value' => $model_query['teg_title']]) ?>  

    <?= $form->field($model, 'teg_keywords')->textInput(['maxlength' => true,'value' => $model_query['teg_keywords']]) ?>  

    <?= $form->field($model, 'teg_description')->textInput(['maxlength' => true,'value' => $model_query['teg_description']]) ?>  

    <?= $form->field($model, 'my_comment')->textInput(['maxlength' => true,'value' => $model_query['my_comment']]) ?>  

    <?php $page = ['main' => 'Главная страница', 'about_us' => 'Страница о компании', 'office_addresses' => 'Страница адреса офисов']; 
        $params = ['prompt' => 'Выберите страницу'];    
            ?>
    <?php if($model_query['type_category'] != null):  ?>
    <?php $model->type_category = $model_query['type_category'] ?>
    <?php //$form->field($model, 'type_category')->textInput(['maxlength' => true,'value' => $model_query['type_category']]) ?>  
    <?php endif; ?>
    <?= $form->field($model, 'type_category')->dropDownList($page, $params) ?>  

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

<?php break; ?>

<?php case('search_category'): ?>

<div class="form-my">
    <?php /*debug($model);/*
    debug($model_query);die();*/ ?>
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
 
    <?= $form->field($model, 'teg_title')->textInput(['maxlength' => true,'value' => $model_query['teg_title']]) ?>  

    <?= $form->field($model, 'teg_keywords')->textInput(['maxlength' => true,'value' => $model_query['teg_keywords']]) ?>  

    <?= $form->field($model, 'teg_description')->textInput(['maxlength' => true,'value' => $model_query['teg_description']]) ?>  

    <?= $form->field($model, 'my_comment')->textInput(['maxlength' => true,'value' => $model_query['my_comment']]) ?>  

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

<?php break; ?>

<?php endswitch; ?>














