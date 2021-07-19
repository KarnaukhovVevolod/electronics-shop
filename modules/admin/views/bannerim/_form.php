<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput() ?>  
 
 <?= $form->field($model, 'page')->textInput() ?>  
 
 <?= $form->field($model, 'number_page')->textInput() ?>  
 
 <?= $form->field($model, 'path_1')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'path_2')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'path_3')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'path_4')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'link_description')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'show_banner')->textInput() ?>  
 
 <?= $form->field($model, 'subcategory')->textInput(['maxlength' => true]) ?>  
 


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















