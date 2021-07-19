<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php switch ($section): ?>
<?php case ('about'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
 <?= $form->field($model, 'id')->textInput(['value'=>$model_query['id']]) ?>  
 
 <?= $form->field($model, 'heading')->textInput(['maxlength' => true,'value'=>$model_query['heading']]) ?>  
 
 <?= $form->field($model, 'path')->textInput(['maxlength' => true,'value'=>$model_query['path']]) ?>  
 
 <?= $form->field($model, 'adress_photo')->textInput(['maxlength' => true,'value'=>$model_query['adress_photo']]) ?>  
 
 <?= $form->field($model, 'show_')->textInput(['value'=>$model_query['show_']]) ?>  
 
 <?= $form->field($model, 'text')->textarea(['rows' => 10,'value'=>$model_query['text']]) ?>  
    
 <?= $form->field($model, 'adress_text')->textarea(['rows' => 10,'value'=>$model_query['adress_text']]) ?>  
 
 <?= $form->field($model, 'name_company')->textInput(['maxlength' => true,'value'=>$model_query['name_company']]) ?>  
    
 <?= $form->field($model, 'telephone_company')->textInput(['maxlength' => true,'value'=>$model_query['telephone_company']]) ?>  
 
 <?= $form->field($model, 'street_company')->textInput(['maxlength' => true,'value'=>$model_query['street_company']]) ?>  
 
 <?= $form->field($model, 'item_company')->textInput(['maxlength' => true,'value'=>$model_query['item_company']]) ?>  
 
 <?= $form->field($model, 'region_company')->textInput(['maxlength' => true,'value'=>$model_query['region_company']]) ?>  
 
 <?= $form->field($model, 'post_code')->textInput(['maxlength' => true,'value'=>$model_query['post_code']]) ?>  
         
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>
<?php break; ?>

<?php case('employee_serial_number'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
    
    <?= $form->field($model, 'number_employee')->textInput(['value' => $model_query['number_employee']]) ?>  
    
    <?= $form->field($model, 'id_name')->textInput(['value' => $model_query['id_name']]) ?>  
    
    <?= $form->field($model, 'id_surname')->textInput(['value' => $model_query['id_surname']]) ?>  
    
    <?= $form->field($model, 'position')->textInput(['value' => $model_query['position']]) ?>  
    
    <?= $form->field($model, 'id_link_vk')->textInput(['value' => $model_query['id_link_vk']]) ?>  
    
    <?= $form->field($model, 'id_link_twitter')->textInput(['value' => $model_query['id_link_twitter']]) ?>  
    
    <?= $form->field($model, 'id_link_facebook')->textInput(['value' => $model_query['id_link_facebook']]) ?>  
    
    <?= $form->field($model, 'id_link_ok')->textInput(['value' => $model_query['id_link_ok']]) ?>  
    
    <?= $form->field($model, 'id_link_instagram')->textInput(['value' => $model_query['id_link_instagram']]) ?>
    
    <?= $form->field($model, 'id_path')->textInput(['value' => $model_query['id_path']]) ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php break; ?>

<?php case('facebook'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
    
    <?= $form->field($model, 'facebook')->textInput(['value' => $model_query['facebook']]) ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php break; ?>

<?php case('instagram'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
    
    <?= $form->field($model, 'instagram')->textInput(['value' => $model_query['instagram']]) ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php break; ?>

<?php case('name_employee'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
    
    <?= $form->field($model, 'name')->textInput(['value' => $model_query['name']])->label('Имя должно быть уникальным в пределах таблицы') ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php break; ?>

<?php case('ok'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
    
    <?= $form->field($model, 'ok')->textInput(['value' => $model_query['ok']]) ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php break; ?>

<?php case('surname_employee'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
    
    <?= $form->field($model, 'surname')->textInput(['value' => $model_query['surname']])->label('Фамилия должна быть уникальной в пределах таблицы') ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php break; ?>

<?php case('twitter'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
    
    <?= $form->field($model, 'twitter')->textInput(['value' => $model_query['twitter']]) ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php break; ?>

<?php case('vk'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
    
    <?= $form->field($model, 'vk')->textInput(['value' => $model_query['vk']]) ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php break; ?>

<?php case('position_employee'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
    
    <?= $form->field($model, 'position')->textInput(['value' => $model_query['position']])->label('Должность должна быть уникальной в пределах таблицы') ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php break; ?>

<?php case('position_em'): ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id')->textInput(['value' => $model_query['id']]) ?>  
    
    <?= $form->field($model, 'position_id')->textInput(['value' => $model_query['position_id']]) ?>  
    
    <?= $form->field($model, 'employee_position')->textInput(['value' => $model_query['employee_position']]) ?>  
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php break; ?>

<?php endswitch; ?>
















