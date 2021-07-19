<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php if($image != null): ?>
    <div class="photo_scr">

        <?php foreach($image as $one_img): ?>
        <div class="one_photo">
            <img src="<?= $one_img['path'] ?>" style="width:200px;height:200px">
            <div class="path_img"><?=$one_img['path']?></div>
        </div>
        <?php endforeach ?>

    </div>
<?php endif; ?>
<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
    
     <?= $form->field($model, 'id')->textInput(['placeholder'=>'Можно не заполнять, заполнится автоматически']) ?>  
 
 <?= $form->field($model, 'like_product')->textInput(['placeholder'=>'Количество лайков для продукции (число)']) ?>  
 
 <?= $form->field($model, 'number_purchases')->textInput(['placeholder'=> 'Количество проданного товара (число)']) ?>  
 
 <?= $form->field($model, 'price_sort')->textInput(['placeholder' => 'Ведите цену для сортировки (число) Например: 20000']) ?>  
 
 <?= $form->field($model, 'number_of_products')->textInput(['placeholder' => 'Введите количество данного товара в наличии (число). Например: 34 ']) ?>  
 
 <?= $form->field($model, 'path')->textInput(['maxlength' => true, 'placeholder' => 'Путь для фото 1 (обязательно). Например: img/audio/no1200.jpg']) ?>  
 
 <?= $form->field($model, 'link_description')->textInput(['maxlength' => true, 'placeholder'=>'Ссылка на описание товара Например:/electronics/web/index.php?r=electronics%2Fproduct-details&audio&7']) ?>  
 
 <?= $form->field($model, 'path_2')->textInput(['maxlength' => true, 'placeholder' => 'Путь для фото 2 (желательно (фото товара с другого ракурса)). Например: img/audio/no1201.jpg']) ?>  
 
 <?= $form->field($model, 'path_3')->textInput(['maxlength' => true, 'placeholder' => 'Путь для фото 3 (желательно (фото товара с другого ракурса)) .Например: img/audio/no1202.jpg']) ?>  
 
 <?= $form->field($model, 'path_4')->textInput(['maxlength' => true, 'placeholder' => 'Путь для фото 4 (желательно (фото товара с другого ракурса)) .Например: img/audio/no1203.jpg']) ?>  
 
 <?= $form->field($model, 'path_5')->textInput(['maxlength' => true, 'placeholder' => 'Путь для фото 5 (желательно (фото товара с другого ракурса)) .Например: img/audio/no1204.jpg']) ?>  
 
 <?= $form->field($model, 'path_6')->textInput(['maxlength' => true, 'placeholder' => 'Путь для фото 6 (желательно (фото товара с другого ракурса)) .Например: img/audio/no1205.jpg']) ?>  
 
 <?= $form->field($model, 'path_7')->textInput(['maxlength' => true, 'placeholder' => 'Путь для фото 7 (желательно (фото товара с другого ракурса)) .Например: img/audio/no1206.jpg']) ?>  
 
 <?= $form->field($model, 'path_8')->textInput(['maxlength' => true, 'placeholder' => 'Путь для фото 8 (желательно (фото товара с другого ракурса)) .Например: img/audio/no1207.jpg']) ?>  
 
 <?= $form->field($model, 'name_type_of_subcategory')->textInput(['maxlength' => true,'placeholder' => 'Введите название вида подкатегории. Например: производитель товара Samsung']) ?>  
 
 <?= $form->field($model, 'model_product')->textInput(['maxlength' => true,'placeholder'=>'Название продукта. Например: название товара аудио устройства']) ?>  
  
 <?= $form->field($model, 'manufacturer')->textInput(['maxlength' => true,'placeholder'=>'Название производителя (компании). Например: Asus']) ?>  
 
 <?php $item_cat = ['audio' => 'audio']; ?>
 
 <?= $form->field($model, 'category_english')->dropDownList($item_cat) ?>  
 
 <?= $form->field($model, 'link_subcategory')->textInput(['maxlength' => true, 'placeholder'=>'Введите ключевое слово из ссылки на подкатегорию. Например: aud']) ?>  
    
 <?= $form->field($model, 'link_type_of_subcategory')->textInput(['maxlength' => true, 'placeholder'=>'Введите ключевое слово из ссылки на вид подкатегории. Например: aud_1']) ?>  
 
 <?= $form->field($model, 'price')->textInput(['maxlength' => true,'placeholder'=>' Введите цену товара. Например: 33 300 руб ']) ?>  
 
 <?= $form->field($model, 'old_price')->textInput(['maxlength' => true,'placeholder'=>' Введите старую цену товара (если есть). Например: 45 999 руб ']) ?>  
 
 <?= $form->field($model, 'discount')->textInput(['maxlength' => true, 'placeholder'=>'Введите скидку на товар (если есть). Например: 13% ']) ?>  
 
 <?php $item_market = [null=>'нет маркетинга', 'new'=>'Новинка', 'sale'=>'Распродажа', 'hot_deals'=>'Горячая распродажа', 'bestseller'=>'Бестселлер']?>
    
 <?= $form->field($model, 'marketing_products')->dropDownList($item_market) //->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'type_audio')->textInput(['maxlength' => true,'placeholder'=>'Это поле связывает одинаковые товары, которые отличаются: цветом корпуса ...Нужно ввести одинаковое слово, в это поле всех таких товаров (чтобы их связать).']) ?>  
 
 <?= $form->field($model, 'power')->textInput(['maxlength' => true, 'placeholder'=>'Введите мощность излучения звука во фронтальном направлении. Например: 30 Вт']) ?>  
 
 <?= $form->field($model, 'description')->textarea(['rows' => 6,'placeholder'=>'Пишем описание товара']); ?> 
    
 <?= $form->field($model, 'date')->textInput(['placeholder' => 'Дата выпуска товара. Например 2020-07-03']); ?>  
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















