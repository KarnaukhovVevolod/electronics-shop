<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput() ?>  
 
 <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'auth_key_user')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'block')->textInput() ?>  
 
 <?= $form->field($model, 'integer')->textInput() ?>  
 


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















