<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все записи';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- ===== Выводим табличку категории ===== -->
<div class="form-my">
<?php $form = ActiveForm::begin()   ?>
    
    <?= $form->field($table_1, 'id')->textInput(['placeholder'=>'Этот параметр вообще не трогать']) ?>
    
    <?= $form->field($table_1, 'category')->textInput(['maxlength'=>true]) ?>
    
    <?= $form->field($table_1, 'subcategory')->textInput(['maxlength'=>true]) ?>
    
    <?= $form->field($table_1, 'type_of_subcategory')->textInput(['maxlength'=>true]) ?>
    
    <?= $form->field($table_1, 'category_english')->textInput(['maxlength'=>true]) ?>
    
    <?= $form->field($table_1, 'link_category')->textInput(['maxlength'=>true]) ?>
    
    <?= $form->field($table_1, 'link_subcategory')->textInput(['maxlength'=>true]) ?>
    
    <?= $form->field($table_1, 'link_type_subcategory')->textInput(['maxlength'=>true]) ?>
    
    <?= $form->field($table_1, 'id_seo_search_category')->textInput(['maxlength'=>true]) ?>
    
    <?= $form->field($table_1, 'id_seo_search_subcategory')->textInput(['maxlength'=>true]) ?>
    
    <?= $form->field($table_1, 'id_seo_search_type_of_subcategory')->textInput(['maxlength'=>true]) ?>
    <?php $page = ['1' => 'Записать','2' => 'Изменить','3' => 'Удалить'];
            $params = ['prompt' => 'Выберите вид редактирования']; ?>
    <?= $form->field($table_1, 'table_write_update_del')->dropDownList($page, $params) ?>
    
    <?= $form->field($table_1, 'id_how_many')->textInput(['maxlength'=>true,'placeholder'=>'Пример ввода: 10-20,23,26,34']) ?>
    
    <?= $form->field($table_1, 'string_update')->textInput(['maxlength'=>true,'placeholder'=>'Кат. 1,Подкат. 2, Вид подкат. 3, '
        . 'Кат. по англ. 4, Ссылка на кат. 5, ... id SEO дан. для вида подкат. 10. Пример ввода: 3,4,6,8']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>
</div>
<div class="form_my">

    
    
    <h1><?= Html::encode($this->title .' Категории') ?></h1>

    <p>
        <?= Html::a('Создать новую запись', ['create','section'=>'category','my_seo_category'=>'category'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category',
            'subcategory',
            'type_of_subcategory',
            'category_english',
            'link_category',
            'link_subcategory',
            'link_type_subcategory',
            'id_seo_search_category',
            'id_seo_search_subcategory',
            'id_seo_search_type_of_subcategory',
            
            [
                'class' => 'yii\grid\ActionColumn',
                //'template' => '{view} {update} {delete} {link}',
                'template' =>'{view}{update} {delete}',
                'buttons' => [
                    'view'   => function ($url, $model, $key) {
                        $view = Html::a('',['/admin/category/view','id'=>$model['id'],'section'=>'category','my_seo_category'=>'category'],
                                ['class' => 'glyphicon glyphicon-eye-open']);
                        return $view;
                    },
                    'update' => function ($url, $model, $key) {
                        $update = Html::a('',['/admin/category/update','id'=>$model['id'],'section'=>'category','my_seo_category'=>'category'], 
                                ['class' => 'glyphicon glyphicon-pencil']);                       
                        return $update; 
                    },
                    'delete' => function ($url, $model, $key) {
                        $delete = Html::a('',['/admin/category/delete','id'=>$model['id'],'section'=>'category','my_seo_category'=>'category'], 
                                ['class' => 'glyphicon glyphicon-trash']);                       
                        return $delete; 
                    },
                ],
            ],
        ],
    ]); ?>


</div>
<?php// break; ?>

<?php// case('search'): ?>

<!-- ===== Выводим табличку с seo-данными для главной страницы,страницы о компании и т.д.  ===== -->

<div class="form-my">
<?php $form_2 = ActiveForm::begin()   ?>
    
    <?= $form_2->field($table_2, 'id')->textInput(['placeholder'=>'Этот параметр вообще не трогать']) ?>
    
    <?= $form_2->field($table_2, 'teg_title')->textInput(['maxlength'=>true]) ?>
    
    <?= $form_2->field($table_2, 'teg_keywords')->textInput(['maxlength'=>true]) ?>
    
    <?= $form_2->field($table_2, 'teg_description')->textInput(['maxlength'=>true]) ?>
    
    <?= $form_2->field($table_2, 'my_comment')->textInput(['maxlength'=>true]) ?>
    <?php $page = ['main' => 'Главная страница', 'about_us' => 'Страница о компании', 'office_addresses' => 'Страница адреса офисов']; 
        $params = ['prompt' => 'Выберите страницу'];    
            ?>
    <?= $form_2->field($table_2, 'type_category')->dropDownList($page, $params) ?>
    
    <?php $page = ['1' => 'Записать','2' => 'Изменить','3' => 'Удалить'];
            $params = ['prompt' => 'Выберите вид редактирования']; ?>
    <?= $form_2->field($table_2, 'table_write_update_del')->dropDownList($page, $params) ?>
    
    <?= $form_2->field($table_2, 'id_how_many')->textInput(['maxlength'=>true,'placeholder'=>'Пример ввода: 10-20,23,26,34']) ?>
    
    <?= $form_2->field($table_2, 'string_update')->textInput(['maxlength'=>true,'placeholder'=>'Тег title 1,Тег keywords 2, Тег description 3, '
        . 'Мои комментарии 4, Категория, подкатег., тип подкатег. 5. Пример ввода: 1,3,4']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>
</div>

<div class="form_my">

    <h1><?= Html::encode($this->title.' Главная страница и т.д.') ?></h1>

    <p>
        <?= Html::a('Создать новую запись', ['create','section'=>'search','my_seo_category'=>'main_page'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider_1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'teg_title',
                'label'     => 'Tег title',
            ],
            [
                'attribute' => 'teg_keywords',
                'label'     => 'Тег keywords',
            ],
            [
                'attribute' => 'teg_description',
                'label'     => 'Тег description',
            ],
            [
                'attribute' => 'my_comment',
                'label'     => 'Мои комментарии',
            ],
            [
                'attribute' => 'type_category',
                'label'     => 'Страницы: главная, о нас , наш адрес',
                'content'   => function($data){
                    
                    switch ($data['type_category']){
                        case 'main':
                            return 'Главная страница';
                            break;
                        case 'about_us':
                            return 'Страница о компании';
                            break;
                        case 'office_addresses':
                            return 'Страница адреса офисов';
                            break;
                        default :
                            return $data['type_category'];
                            break;
                    }
                    /**/
                    //return '$data';
                }
            ],
            
            [
                'class' => 'yii\grid\ActionColumn',
                //'template' => '{view} {update} {delete} {link}',
                'template' =>'{view}{update} {delete}',
                'buttons' => [
                    'view'   => function ($url, $model, $key) {
                        $view = Html::a('',['/admin/category/view','id'=>$model['id'],'section'=>'search','my_seo_category'=>'main_page'],
                                ['class' => 'glyphicon glyphicon-eye-open']);
                        return $view;
                    },
                    'update' => function ($url, $model, $key) {
                        $update = Html::a('',['/admin/category/update','id'=>$model['id'],'section'=>'search','my_seo_category'=>'main_page'], 
                                ['class' => 'glyphicon glyphicon-pencil']);                       
                        return $update; 
                    },
                    'delete' => function ($url, $model, $key) {
                        $delete = Html::a('',['/admin/category/delete','id'=>$model['id'],'section'=>'search','my_seo_category'=>'main_page'], 
                                ['class' => 'glyphicon glyphicon-trash']);                       
                        return $delete; 
                    },
                ],
            ],
        ]
    ]); ?>


</div>

<!-- ===== Выводим табличку с seo-данными для страницы с категориями -->
<div class="form-my">
<?php $form_3 = ActiveForm::begin()   ?>
    
    <?= $form_3->field($table_3, 'id')->textInput(['placeholder'=>'Этот параметр вообще не трогать']) ?>
    
    <?= $form_3->field($table_3, 'teg_title')->textInput(['maxlength'=>true]) ?>
    
    <?= $form_3->field($table_3, 'teg_keywords')->textInput(['maxlength'=>true]) ?>
    
    <?= $form_3->field($table_3, 'teg_description')->textInput(['maxlength'=>true]) ?>
    
    <?= $form_2->field($table_3, 'my_comment')->textInput(['maxlength'=>true]) ?>
    <?php $page = [1 => 'Таблица для категорий', 2 => 'Таблица для подкатегорий', 
        3 => 'Таблица для видов подкатегорий']; 
        $params = ['prompt' => 'Выберите таблицу для редактирования'];    
            ?>
    <?= $form_2->field($table_3, 'number_table')->dropDownList($page, $params) ?>
    
    <?php $page = ['1' => 'Записать','2' => 'Изменить','3' => 'Удалить'];
            $params = ['prompt' => 'Выберите вид редактирования']; ?>
    <?= $form_2->field($table_3, 'table_write_update_del')->dropDownList($page, $params) ?>
    
    <?= $form_2->field($table_3, 'id_how_many')->textInput(['maxlength'=>true,'placeholder'=>'Пример ввода: 10-20,23,26,34']) ?>
    
    <?= $form_2->field($table_3, 'string_update')->textInput(['maxlength'=>true,'placeholder'=>'Тег title 1,Тег keywords 2, Тег description 3, '
        . 'Мои комментарии 4. Пример ввода: 1,3,4']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>
</div>

<div class="form_my">

    <h1><?= Html::encode($this->title.' Для категорий ') ?></h1>

    <p>
        <?= Html::a('Создать новую запись', ['create','section'=>'search_category','my_seo_category'=>'search_category'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider_2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'teg_title',
                'label'     => 'Tег title',
            ],
            [
                'attribute' => 'teg_keywords',
                'label'     => 'Тег keywords',
            ],
            [
                'attribute' => 'teg_description',
                'label'     => 'Тег description',
            ],
            [
                'attribute' => 'my_comment',
                'label'     => 'Мои комментарии',
            ],
            
            [
                'class' => 'yii\grid\ActionColumn',
                //'template' => '{view} {update} {delete} {link}',
                'template' =>'{view}{update} {delete}',
                'buttons' => [
                    'view'   => function ($url, $model, $key) {
                        $view = Html::a('',['/admin/category/view','id'=>$model['id'],'section'=>'search_category','my_seo_category'=>'search_category'],
                                ['class' => 'glyphicon glyphicon-eye-open']);
                        return $view;
                    },
                    'update' => function ($url, $model, $key) {
                        $update = Html::a('',['/admin/category/update','id'=>$model['id'],'section'=>'search_category','my_seo_category'=>'search_category'], 
                                ['class' => 'glyphicon glyphicon-pencil']);                       
                        return $update; 
                    },
                    'delete' => function ($url, $model, $key) {
                        $delete = Html::a('',['/admin/category/delete','id'=>$model['id'],'section'=>'search_category','my_seo_category'=>'search_category'], 
                                ['class' => 'glyphicon glyphicon-trash']);                       
                        return $delete; 
                    },
                ],
            ],
        ]
    ]); ?>


</div>

<!-- ===== Выводим табличку с seo-данными для страницы с подкатегориями -->
<div class="form_my">

    <h1><?= Html::encode($this->title. ' Для подкатегорий') ?></h1>

    <p>
        <?= Html::a('Создать новую запись', ['create','section'=>'search_category','my_seo_category'=>'search_subcategory'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider_3,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'teg_title',
                'label'     => 'Tег title',
            ],
            [
                'attribute' => 'teg_keywords',
                'label'     => 'Тег keywords',
            ],
            [
                'attribute' => 'teg_description',
                'label'     => 'Тег description',
            ],
            [
                'attribute' => 'my_comment',
                'label'     => 'Мои комментарии',
            ],
            
            [
                'class' => 'yii\grid\ActionColumn',
                //'template' => '{view} {update} {delete} {link}',
                'template' =>'{view}{update} {delete}',
                'buttons' => [
                    'view'   => function ($url, $model, $key) {
                        $view = Html::a('',['/admin/category/view','id'=>$model['id'],'section'=>'search_category','my_seo_category'=>'search_subcategory'],
                                ['class' => 'glyphicon glyphicon-eye-open']);
                        return $view;
                    },
                    'update' => function ($url, $model, $key) {
                        $update = Html::a('',['/admin/category/update','id'=>$model['id'],'section'=>'search_category','my_seo_category'=>'search_subcategory'], 
                                ['class' => 'glyphicon glyphicon-pencil']);                       
                        return $update; 
                    },
                    'delete' => function ($url, $model, $key) {
                        $delete = Html::a('',['/admin/category/delete','id'=>$model['id'],'section'=>'search_category','my_seo_category'=>'search_subcategory'], 
                                ['class' => 'glyphicon glyphicon-trash']);                       
                        return $delete; 
                    },
                ],
            ],
        ]
    ]); ?>


</div>

<!-- ===== Выводим табличку с seo-данными для страницы с типами подкатегориями -->
<div class="form_my">

    <h1><?= Html::encode($this->title.' Для видов подкатегорий') ?></h1>

    <p>
        <?= Html::a('Создать новую запись', ['create','section'=>'search_category','my_seo_category'=>'search_type_of_subcategory'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider_4,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'teg_title',
                'label'     => 'Tег title',
            ],
            [
                'attribute' => 'teg_keywords',
                'label'     => 'Тег keywords',
            ],
            [
                'attribute' => 'teg_description',
                'label'     => 'Тег description',
            ],
            [
                'attribute' => 'my_comment',
                'label'     => 'Мои комментарии',
            ],
            
            [
                'class' => 'yii\grid\ActionColumn',
                //'template' => '{view} {update} {delete} {link}',
                'template' =>'{view}{update} {delete}',
                'buttons' => [
                    'view'   => function ($url, $model, $key) {
                        $view = Html::a('',['/admin/category/view','id'=>$model['id'],'section'=>'search_category','my_seo_category'=>'search_type_of_subcategory'],
                                ['class' => 'glyphicon glyphicon-eye-open']);
                        return $view;
                    },
                    'update' => function ($url, $model, $key) {
                        $update = Html::a('',['/admin/category/update','id'=>$model['id'],'section'=>'search_category','my_seo_category'=>'search_type_of_subcategory'], 
                                ['class' => 'glyphicon glyphicon-pencil']);                       
                        return $update; 
                    },
                    'delete' => function ($url, $model, $key) {
                        $delete = Html::a('',['/admin/category/delete','id'=>$model['id'],'section'=>'search_category','my_seo_category'=>'search_type_of_subcategory'], 
                                ['class' => 'glyphicon glyphicon-trash']);                       
                        return $delete; 
                    },
                ],
            ],
        ]
    ]); ?>


</div>











