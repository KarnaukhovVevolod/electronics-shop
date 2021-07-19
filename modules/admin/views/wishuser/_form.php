<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput() ?>  
 
 <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'name_model')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'price_old')->textInput(['maxlength' => true]) ?>  
 


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















