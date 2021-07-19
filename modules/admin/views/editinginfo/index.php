<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все записи';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php switch($section):?>
<?php case('about'): ?>
<div class="form_my">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую запись', ['create','section'=>'about'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php //debug($dataProvider) ?>
    
    <?php //die(); $url1 = 'Мой url'; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'heading',
                'label'=>'Заголовок',
            ],
            [
                'attribute' => 'path',
                'label'     => 'Путь для фото',
            ],
            [
                'attribute' => 'adress_photo',
                'label'     => 'Фото с адрессом компании (карта проезда)',
            ],
            [
                'attribute' => 'show_',
                'label'     => 'Показать информацию',
            ],
            [
                'attribute' => 'adress_text',
                'label'     => 'Текст с адресом/ми, офиса/ов',
            ],
            [
                'attribute' => 'text',
                'label'     => 'Текст о компании',
            ],
            
            [
                'attribute' => 'name_company',
                'label'     => 'Имя компании',
            ],
            [
                'attribute' => 'telephone_company',
                'label'     => 'Телефон компании',
            ],
            [
                'attribute' => 'street_company',
                'label'     => 'Улица главного офиса',
            ],
            [
                'attribute' => 'item_company',
                'label'     => 'Пункт, город... главного офиса',
            ],
            [
                'attribute' => 'region_company',
                'label'     => 'Регион, главного офиса',
            ],
            [
                'attribute' => 'post_code',
                'label'     => 'Почтовый индекс',
            ],
            //['class' => 'yii\grid\ActionColumn'],
            
            [
                'class' => 'yii\grid\ActionColumn',
                //'template' => '{view} {update} {delete} {link}',
                'template' =>'{view}{update} {delete}',
                'buttons' => [
                    'view'   => function ($url, $model, $key) {
                        $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'about'],
                                ['class' => 'glyphicon glyphicon-eye-open']);
                        return $view;
                    },
                    'update' => function ($url, $model, $key) {
                        $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'about'], 
                                ['class' => 'glyphicon glyphicon-pencil']);                       
                        return $update; 
                    },
                    'delete' => function ($url, $model, $key) {
                        $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'about'], 
                                ['class' => 'glyphicon glyphicon-trash']);                       
                        return $delete; 
                    },
                ],
            ],
            
        ],
    ]); ?>


</div>
<?php break;?>
<?php case('employee'): ?>
    <!-- employee_serial_number -->
    <div class="form_my">

        <h1><?= Html::encode($this->title. ' порядковый номер сотрудника и ссылки (Главная таблица о сотрудниках)') ?></h1>

        <p>
            <?= Html::a('Создать новую запись', ['create','section'=>'employee_serial_number'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //debug($dataProvider) ?>

        <?php //die(); $url1 = 'Мой url'; ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider_1,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                'attribute' => 'number_employee',
                'label'     => 'Порядковый номер сотрудника',
                ],
                [
                'attribute' => 'id_name',
                'label'     => 'id на табличку о имени сотрудника',
                ],
                [
                'attribute' => 'id_surname',
                'label'     => 'id на табличку о фамилии сотрудника',
                ],
                [
                'attribute' => 'position',
                'label'     => 'Номер должности/ей сотрудника',
                ],
                [
                'attribute' => 'id_link_vk',
                'label'     => 'id на ссылку вк',
                ],
                [
                'attribute' => 'id_link_twitter',
                'label'     => 'id на ссылку твиттера',
                ],
                [
                'attribute' => 'id_link_facebook',
                'label'     => 'id на ссылку фейсбука',
                ],
                [
                'attribute' => 'id_link_ok',
                'label'     => 'id на ссылку ок',
                ],
                [
                'attribute' => 'id_link_instagram',
                'label'     => 'id на ссылку инстаграм',
                ],
                [
                'attribute' => 'id_path',
                'label'     => 'id фото сотрудника',
                ],
                
                //['class' => 'yii\grid\ActionColumn'],

                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template' => '{view} {update} {delete} {link}',
                    'template' =>'{view}{update} {delete}',
                    'buttons' => [
                        'view'   => function ($url, $model, $key) {
                            $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'employee_serial_number'],
                                    ['class' => 'glyphicon glyphicon-eye-open']);
                            return $view;
                        },
                        'update' => function ($url, $model, $key) {
                            $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'employee_serial_number'], 
                                    ['class' => 'glyphicon glyphicon-pencil']);                       
                            return $update; 
                        },
                        'delete' => function ($url, $model, $key) {
                            $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'employee_serial_number'], 
                                    ['class' => 'glyphicon glyphicon-trash']);                       
                            return $delete; 
                        },
                    ],
                ],

            ],
        ]); ?>


    </div>
    <!-- facebook -->
    <div class="form_my">

        <h1><?= Html::encode($this->title. ' ссылка на фейсбук') ?></h1>

        <p>
            <?= Html::a('Создать новую запись', ['create','section'=>'facebook'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //debug($dataProvider) ?>

        <?php //die(); $url1 = 'Мой url'; ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider_2,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'facebook',
                    'label'     => 'Ссылка на фейсбук сотрудника',
                ],

                //['class' => 'yii\grid\ActionColumn'],
                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template' => '{view} {update} {delete} {link}',
                    'template' =>'{view}{update} {delete}',
                    'buttons' => [
                        'view'   => function ($url, $model, $key) {
                            $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'facebook'],
                                    ['class' => 'glyphicon glyphicon-eye-open']);
                            return $view;
                        },
                        'update' => function ($url, $model, $key) {
                            $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'facebook'], 
                                    ['class' => 'glyphicon glyphicon-pencil']);                       
                            return $update; 
                        },
                        'delete' => function ($url, $model, $key) {
                            $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'facebook'], 
                                    ['class' => 'glyphicon glyphicon-trash']);                       
                            return $delete; 
                        },
                    ],
                ],

            ],
        ]); ?>


    </div>
    <!-- instagram -->
    <div class="form_my">

        <h1><?= Html::encode($this->title. ' ссылка на инстаграм') ?></h1>

        <p>
            <?= Html::a('Создать новую запись', ['create','section'=>'instagram'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //debug($dataProvider) ?>

        <?php //die(); $url1 = 'Мой url'; ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider_3,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'instagram',
                    'label'     => 'Ссылка на инстаграм сотрудника',
                ],
                //['class' => 'yii\grid\ActionColumn'],

                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template' => '{view} {update} {delete} {link}',
                    'template' =>'{view}{update} {delete}',
                    'buttons' => [
                        'view'   => function ($url, $model, $key) {
                            $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'instagram'],
                                    ['class' => 'glyphicon glyphicon-eye-open']);
                            return $view;
                        },
                        'update' => function ($url, $model, $key) {
                            $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'instagram'], 
                                    ['class' => 'glyphicon glyphicon-pencil']);                       
                            return $update; 
                        },
                        'delete' => function ($url, $model, $key) {
                            $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'instagram'], 
                                    ['class' => 'glyphicon glyphicon-trash']);                       
                            return $delete; 
                        },
                    ],
                ],

            ],
        ]); ?>


    </div>
    <!-- name_employee -->
    <div class="form_my">

        <h1><?= Html::encode($this->title. ' имя сотрудника') ?></h1>

        <p>
            <?= Html::a('Создать новую запись', ['create','section'=>'name_employee'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //debug($dataProvider) ?>

        <?php //die(); $url1 = 'Мой url'; ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider_4,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'name',
                    'label'     => 'Имя сотрудника ',
                ],
                //['class' => 'yii\grid\ActionColumn'],

                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template' => '{view} {update} {delete} {link}',
                    'template' =>'{view}{update} {delete}',
                    'buttons' => [
                        'view'   => function ($url, $model, $key) {
                            $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'name_employee'],
                                    ['class' => 'glyphicon glyphicon-eye-open']);
                            return $view;
                        },
                        'update' => function ($url, $model, $key) {
                            $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'name_employee'], 
                                    ['class' => 'glyphicon glyphicon-pencil']);                       
                            return $update; 
                        },
                        'delete' => function ($url, $model, $key) {
                            $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'name_employee'], 
                                    ['class' => 'glyphicon glyphicon-trash']);                       
                            return $delete; 
                        },
                    ],
                ],

            ],
        ]); ?>


    </div>
    <!-- ok -->
    <div class="form_my">

        <h1><?= Html::encode($this->title. ' ссылка на ok') ?></h1>

        <p>
            <?= Html::a('Создать новую запись', ['create','section'=>'ok'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //debug($dataProvider) ?>

        <?php //die(); $url1 = 'Мой url'; ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider_5,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'ok',
                    'label'     => 'Ссылка на ок сотрудника',
                ],

                //['class' => 'yii\grid\ActionColumn'],

                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template' => '{view} {update} {delete} {link}',
                    'template' =>'{view}{update} {delete}',
                    'buttons' => [
                        'view'   => function ($url, $model, $key) {
                            $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'ok'],
                                    ['class' => 'glyphicon glyphicon-eye-open']);
                            return $view;
                        },
                        'update' => function ($url, $model, $key) {
                            $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'ok'], 
                                    ['class' => 'glyphicon glyphicon-pencil']);                       
                            return $update; 
                        },
                        'delete' => function ($url, $model, $key) {
                            $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'ok'], 
                                    ['class' => 'glyphicon glyphicon-trash']);                       
                            return $delete; 
                        },
                    ],
                ],

            ],
        ]); ?>


    </div>
    <!-- surname_employee -->
    <div class="form_my">

        <h1><?= Html::encode($this->title. ' Фамилия сотрудника') ?></h1>

        <p>
            <?= Html::a('Создать новую запись', ['create','section'=>'surname_employee'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //debug($dataProvider) ?>

        <?php //die(); $url1 = 'Мой url'; ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider_6,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'surname',
                    'label'     => 'Фамилия сотрудника ',
                ],
                //['class' => 'yii\grid\ActionColumn'],

                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template' => '{view} {update} {delete} {link}',
                    'template' =>'{view}{update} {delete}',
                    'buttons' => [
                        'view'   => function ($url, $model, $key) {
                            $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'surname_employee'],
                                    ['class' => 'glyphicon glyphicon-eye-open']);
                            return $view;
                        },
                        'update' => function ($url, $model, $key) {
                            $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'surname_employee'], 
                                    ['class' => 'glyphicon glyphicon-pencil']);                       
                            return $update; 
                        },
                        'delete' => function ($url, $model, $key) {
                            $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'surname_employee'], 
                                    ['class' => 'glyphicon glyphicon-trash']);                       
                            return $delete; 
                        },
                    ],
                ],

            ],
        ]); ?>


    </div>
    <!-- twitter -->
    <div class="form_my">

        <h1><?= Html::encode($this->title. ' ссылка на твиттер сотрудника') ?></h1>

        <p>
            <?= Html::a('Создать новую запись', ['create','section'=>'twitter'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //debug($dataProvider) ?>

        <?php //die(); $url1 = 'Мой url'; ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider_7,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'twitter',
                    'label'     => 'Ссылка на твиттер',
                ],

                //['class' => 'yii\grid\ActionColumn'],

                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template' => '{view} {update} {delete} {link}',
                    'template' =>'{view}{update} {delete}',
                    'buttons' => [
                        'view'   => function ($url, $model, $key) {
                            $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'twitter'],
                                    ['class' => 'glyphicon glyphicon-eye-open']);
                            return $view;
                        },
                        'update' => function ($url, $model, $key) {
                            $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'twitter'], 
                                    ['class' => 'glyphicon glyphicon-pencil']);                       
                            return $update; 
                        },
                        'delete' => function ($url, $model, $key) {
                            $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'twitter'], 
                                    ['class' => 'glyphicon glyphicon-trash']);                       
                            return $delete; 
                        },
                    ],
                ],

            ],
        ]); ?>


    </div>
    <!-- vk -->
    <div class="form_my">

        <h1><?= Html::encode($this->title. ' ссылка на вк') ?></h1>

        <p>
            <?= Html::a('Создать новую запись', ['create','section'=>'vk'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //debug($dataProvider) ?>

        <?php //die(); $url1 = 'Мой url'; ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider_8,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id', 
                [
                    'attribute' => 'vk',
                    'label'     => 'Ссылка на вк сотрудника',
                ],

                //['class' => 'yii\grid\ActionColumn'],

                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template' => '{view} {update} {delete} {link}',
                    'template' =>'{view}{update} {delete}',
                    'buttons' => [
                        'view'   => function ($url, $model, $key) {
                            $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'vk'],
                                    ['class' => 'glyphicon glyphicon-eye-open']);
                            return $view;
                        },
                        'update' => function ($url, $model, $key) {
                            $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'vk'], 
                                    ['class' => 'glyphicon glyphicon-pencil']);                       
                            return $update; 
                        },
                        'delete' => function ($url, $model, $key) {
                            $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'vk'], 
                                    ['class' => 'glyphicon glyphicon-trash']);                       
                            return $delete; 
                        },
                    ],
                ],

            ],
        ]); ?>


    </div>
    <!-- position for employee  -->
    <div class="form_my">

        <h1><?= Html::encode($this->title. ' Должности в компании') ?></h1>

        <p>
            <?= Html::a('Создать новую запись', ['create','section'=>'position_employee'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //debug($dataProvider) ?>

        <?php //die(); $url1 = 'Мой url'; ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider_9,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'position',
                    'label'     => 'Название должности сотрудника',
                ],

                //['class' => 'yii\grid\ActionColumn'],

                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template' => '{view} {update} {delete} {link}',
                    'template' =>'{view}{update} {delete}',
                    'buttons' => [
                        'view'   => function ($url, $model, $key) {
                            $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'position_employee'],
                                    ['class' => 'glyphicon glyphicon-eye-open']);
                            return $view;
                        },
                        'update' => function ($url, $model, $key) {
                            $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'position_employee'], 
                                    ['class' => 'glyphicon glyphicon-pencil']);                       
                            return $update; 
                        },
                        'delete' => function ($url, $model, $key) {
                            $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'position_employee'], 
                                    ['class' => 'glyphicon glyphicon-trash']);                       
                            return $delete; 
                        },
                    ],
                ],

            ],
        ]); ?>


    </div>
    
    <!-- employee - to-position relationship -->
    <div class="form_my">

        <h1><?= Html::encode($this->title. ' Связь сотрудника с должностью в компании') ?></h1>

        <p>
            <?= Html::a('Создать новую запись', ['create','section'=>'position_em'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //debug($dataProvider) ?>

        <?php //die(); $url1 = 'Мой url'; ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider_10,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                
                [
                    'attribute' => 'position_id',
                    'label'     => 'id в таблице о должностях сотрудника',
                ],
                [
                    'attribute' => 'employee_position',
                    'label'     => 'Номер в поле должность, главной таблице о сотрудниках',
                ],
                //['class' => 'yii\grid\ActionColumn'],

                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template' => '{view} {update} {delete} {link}',
                    'template' =>'{view}{update} {delete}',
                    'buttons' => [
                        'view'   => function ($url, $model, $key) {
                            $view = Html::a('',['/admin/editinginfo/view','id'=>$model['id'],'section'=>'position_em'],
                                    ['class' => 'glyphicon glyphicon-eye-open']);
                            return $view;
                        },
                        'update' => function ($url, $model, $key) {
                            $update = Html::a('',['/admin/editinginfo/update','id'=>$model['id'],'section'=>'position_em'], 
                                    ['class' => 'glyphicon glyphicon-pencil']);                       
                            return $update; 
                        },
                        'delete' => function ($url, $model, $key) {
                            $delete = Html::a('',['/admin/editinginfo/delete','id'=>$model['id'],'section'=>'position_em'], 
                                    ['class' => 'glyphicon glyphicon-trash']);                       
                            return $delete; 
                        },
                    ],
                ],

            ],
        ]); ?>


    </div>
<?php break; ?>




<?php endswitch; ?>

