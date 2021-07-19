<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput() ?>  
 
 <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'block')->textInput() ?>  
 


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















