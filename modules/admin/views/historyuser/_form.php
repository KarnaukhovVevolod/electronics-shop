<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput() ?>  
 
 <?= $form->field($model, 'quantity')->textInput() ?>  
 
 <?= $form->field($model, 'order_number')->textInput() ?>  
 
 <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'name_model')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'total_price')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'total_price_all')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'date_order')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'post_code')->textInput(['maxlength' => true]) ?>  
 <?php $delivery = ['Самовывоз'=>'Самовывоз', 'Доставка' => 'Доставка'] ?>
 <?= $form->field($model, 'type_delivery')->dropDownList($delivery) ?>  
 
 <?= $form->field($model, 'status_order')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'point_delivery')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'village_locality')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'room')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'flat')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'pay_order')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>  
 


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















