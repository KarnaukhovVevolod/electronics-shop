<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput() ?>  
 
 <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'time_work')->textInput(['maxlength' => true]) ?>  
 


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















