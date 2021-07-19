<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput() ?>  
 
 <?= $form->field($model, 'star')->textInput() ?>  
 
 <?= $form->field($model, 'id_product')->textInput() ?>  
 
 <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?> 
    
 <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>  


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















