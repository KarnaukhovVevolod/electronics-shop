<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все записи';
$this->params['breadcrumbs'][] = $this->title;
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

<?php $form = ActiveForm::begin() ?>

<?= $form->field($update_form, 'id')->textInput(['placeholder'=>'Укажите id-строчек в таблице, которые нужно изменить.Например:2-5,7,9,10-12. Заменит строки с id 2,3,4,5,7,9,10,11,12']) ?>

<?php $items = ['like_product'=>'Понравилась продукция','number_purchases'=>'Кол-во покупок','price_sort'=>'Цена для сортировки',
        'number_of_products'=>'Кол-во покупок','path'=>'Путь для фото 1','link_description'=>'Ссылка на описание',
    'path_2'=>'Путь для фото 2','path_3'=>'Путь для фото 3','path_4'=>'Путь для фото 4','path_5'=>'Путь для фото 5','path_6'=>'Путь для фото 6','path_7'=>'Путь для фото 7','path_8'=>'Путь для фото 8',
    'name_type_of_subcategory'=>'Название вида подкатегории','model_product'=>'Модель продукта','manufacturer'=>'Производитель','category_english'=>'Название категории (по английски)',        
    'link_subcategory'=>'Ссылка на подкатегорию','link_type_of_subcategory'=>'Cсылка на вид подкатегории','price'=>'Цена','old_price'=>'Цена старое',
    'discount'=>'Cкидка','marketing_products'=>'Маркетинг продукта','type_audio'=>'Тип аудио','power'=>'Мощность (в фронтальном направлении)','description'=>'Описание продукта',
    'date'=>'Дата',] ?>
<?php $promp = ['prompt'=>'Выберите поля которое нужно обновить'] ?>

<?= $form->field($update_form, 'field')->dropDownList($items, $promp) ?>

<?= $form->field($update_form, 'update')->textInput(['placeholder'=>'Учитывайте размерность и тип заполняемого поля. Заполнять текстом или числом']) ?>
<div style="display:none">
<?= $form->field($update_form, 'table')->textInput(['value'=>'audio']) ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Изменить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end() ?>

<div class="form_my">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'like_product',
            //'number_purchases',
            //'price_sort',
            'number_of_products',
            'path',
            'link_description',
            //'path_2',
            //'path_3',
            //'path_4',
            //'path_5',
            //'path_6',
            //'path_7',
            //'path_8',
            'name_type_of_subcategory',
            'model_product',
            'manufacturer',
            'category_english',
            'link_subcategory',
            //'link_type_of_subcategory',
            //'price',
            //'old_price',
            //'discount',
            //'marketing_products',
            'type_audio',
            //'power',
            //'description',
            //'date',

            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
