<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput() ?>  

 <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>
    
 <?php $category = ['Audio'=>'Audio','Camera'=>'Camera','Notebook'=>'Notebook',
     'Smartiphone'=>'Smartiphone','Tablets'=>'Tablets','Tv'=>'Tv','Videocamera'=>'Videocamera',
     'Different'=>'Different']  ?>
    <?php $params = ['prompt' => 'Выберите категорию для фото'] ?>
 <?= $form->field($model, 'category')->dropDownList($category, $params) //textInput(['maxlength' => true]) ?>  
 


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















