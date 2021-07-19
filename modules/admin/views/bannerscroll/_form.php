<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput() ?>  
 
 <?= $form->field($model, 'page')->textInput() ?>  
 
 <?= $form->field($model, 'path_1')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'path_2')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'path_3')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'link_product_1')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'link_product_2')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'link_product_3')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_1')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_2')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_3')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_4')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_5')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_6')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_7')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_8')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_9')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_10')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_11')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'text_12')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'show_banner')->textInput() ?>  
 
 <?= $form->field($model, 'subcategory')->textInput(['maxlength' => true]) ?>  
 


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















