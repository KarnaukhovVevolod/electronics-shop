<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>



    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
  
     <?= $form->field($model, 'id')->textInput() ?>  
 
 <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'room')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'flat')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'dop_info')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'post_code')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'village_locality')->textInput(['maxlength' => true]) ?>  
 




    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>






































