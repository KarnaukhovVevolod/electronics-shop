<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput() ?>  
 
    <?php $page = [3=>'Страница с корзиной',4=>'Страница с катег. подкат. вид.подкат.',5=>'Cтраница с понравившимися товарами',
        6=>'Страница с личным кабинетом польэователя',7=>'Страница с новинками продукции',8=>'Страница с оформлением заказа'];
    $params=['prompt'=>'Выберите страницу для баннера'];
    ?>
    
 <?= $form->field($model, 'page')->dropDownList($page,$params)//->textInput() ?>  
 
 <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'link_description')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'subcategory')->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'show_banner')->textInput() ?>  
 


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















