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
 
 <?php $item_sim = ['0' => 0,'1' => 1,'2' => 2,'3' => 3,'4' => 4,'5' => 5,'6' => 6,'7' => 7,'8' => 8];
         $params_sim = ['prompt'=>'Выберите количество sim-карт'] ?>
    
 <?= $form->field($model, 'number_sim')->dropDownList($item_sim,$params_sim)//->textInput(['placeholder'=>'Количество sim-карт(число)']) ?>  
 
 <?= $form->field($model, 'price_sort')->textInput(['placeholder' => 'Ведите цену для сортировки (число) Например: 20000']) ?>  
 
 <?= $form->field($model, 'number_of_products')->textInput(['placeholder' => 'Введите количество данного товара в наличии (число). Например: 34 ']) ?>  
 
 <?= $form->field($model, 'path')->textInput(['maxlength' => true, 'placeholder' => 'Путь для фото 1 (обязательно) Например: img/tablets/s1200.jpg']) ?>  
 
 <?= $form->field($model, 'link_description')->textInput(['maxlength' => true,'placeholder'=>'Ссылка на описание товара Например:/electronics/web/index.php?r=electronics%2Fproduct-details&tablet&12']) ?>  
 
 <?= $form->field($model, 'path_2')->textInput(['maxlength' => true,'placeholder' => 'Путь для фото 2 (желательно (фото товара с другого ракурса)) Например: img/tablets/s1300.jpg']) ?>  
 
 <?= $form->field($model, 'path_3')->textInput(['maxlength' => true,'placeholder' => 'Путь для фото 3 (желательно (фото товара с другого ракурса)) Например: img/tablets/s1301.jpg']) ?>  
 
 <?= $form->field($model, 'path_4')->textInput(['maxlength' => true,'placeholder' => 'Путь для фото 4 (желательно (фото товара с другого ракурса)) Например: img/tablets/s1302.jpg']) ?>  
 
 <?= $form->field($model, 'path_5')->textInput(['maxlength' => true,'placeholder' => 'Путь для фото 5 (желательно (фото товара с другого ракурса)) Например: img/tablets/s1303.jpg']) ?>  
 
 <?= $form->field($model, 'path_6')->textInput(['maxlength' => true,'placeholder' => 'Путь для фото 6 (желательно (фото товара с другого ракурса)) Например: img/tablets/s1304.jpg']) ?>  
 
 <?= $form->field($model, 'path_7')->textInput(['maxlength' => true,'placeholder' => 'Путь для фото 7 (желательно (фото товара с другого ракурса)) Например: img/tablets/s1305.jpg']) ?>  
 
 <?= $form->field($model, 'path_8')->textInput(['maxlength' => true,'placeholder' => 'Путь для фото 8 (желательно (фото товара с другого ракурса)) Например: img/tablets/s1306.jpg']) ?>  
 
 <?= $form->field($model, 'name_type_of_subcategory')->textInput(['maxlength' => true,'placeholder' => 'Введите название вида подкатегории. Например: производитель товара']) ?>  
    
 <?php $item_cat = ['tablet'=>'tablet']; ?>
    
 <?= $form->field($model, 'category_english')->dropDownList($item_cat);//textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'model_product')->textInput(['maxlength' => true,'placeholder'=>'Название продукта. Например: название товара планшета']) ?>  
 
 <?= $form->field($model, 'manufacturer')->textInput(['maxlength' => true,'placeholder'=>'Название производителя (компании). Например: Apple' ]) ?>  
    
 <?= $form->field($model, 'screen_diagonal')->textInput(['maxlength' => true,'placeholder'=>'Введите диагональ экрана в дюймах. Например: 9']) ?>  
 
 <?= $form->field($model, 'link_subcategory')->textInput(['maxlength' => true, 'placeholder'=>'Введите ключевое слово из ссылки на подкатегорию. Например: tablets']) ?>  
 
 <?= $form->field($model, 'link_type_of_subcategory')->textInput(['maxlength' => true, 'placeholder'=>'Введите ключевое слово из ссылки на вид подкатегории. Например: tablets_1']) ?>  
    
 <?= $form->field($model, 'price')->textInput(['maxlength' => true,'placeholder'=>' Введите цену товара. Например: 23 000 руб ']) ?>  
 
 <?= $form->field($model, 'old_price')->textInput(['maxlength' => true,'placeholder'=>' Введите старую цену товара (если есть). Например: 25 999 руб ']) ?>  
 
 <?= $form->field($model, 'discount')->textInput(['maxlength' => true, 'placeholder'=>'Введите скидку на товар (если есть). Например: 13%']) ?>  
 
 <?php $item_market = [null=>'нет маркетинга', 'new'=>'Новинка', 'sale'=>'Распродажа', 'hot_deals'=>'Горячая распродажа', 'bestseller'=>'Бестселлер']?>
 
 <?= $form->field($model, 'marketing_products')->dropDownList($item_market);//->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'type_tablet')->textInput(['maxlength' => true, 'placeholder'=>'Это поле связывает одинаковые товары, которые отличаются: цветом корпуса ...Нужно ввести одинаковое слово, в это поле всех таких товаров (чтобы их связать).']) ?>  
 
 <?= $form->field($model, 'amount_ram')->textInput(['maxlength' => true, 'placeholder' =>'Введите объём оперативной памяти. Например: 4 Гб']) ?>  
 
 <?= $form->field($model, 'internal_memory')->textInput(['maxlength' => true,'placeholder' =>'Введите объём внутренней памяти. Например: 64 Гб']) ?>  
 
 <?= $form->field($model, 'description')->textarea(['rows' => 6,'placeholder'=>'Пишем описание товара']);//->textInput(['maxlength' => true]) ?>  
 
 <?= $form->field($model, 'date')->textInput(['placeholder' => 'Дата выпуска товара. Например 2020-07-03']); ?>  

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















