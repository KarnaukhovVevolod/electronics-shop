<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AdressUser */

$this->title = 'Запись № = '.$model['id'];

switch($section){
    case('about'):
        $section1 = 'about';
        break;
    default:
        $section1 = 'employee';
        break;
    
}


$this->params['breadcrumbs'][] = ['label' => 'Все записи', 'url' => ['index','section'=>$section1]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="my-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model['id'],'section'=>$section], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model['id'],'section'=>$section], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php switch($section): ?>
<?php case('about'): ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
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
        ],
    ]) ?>
<?php break; ?>    
<?php  case('employee_serial_number'): ?> 
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

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

            ],
        ]) ?>
<?php break; ?>  

<?php case('facebook'): ?>
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'id',
                [
                    'attribute' => 'facebook',
                    'label'     => 'Ссылка на фейсбук сотрудника',
                ],
            ],
        ]) ?>
<?php break; ?>    

<?php case('instagram'): ?>
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'id',
                [
                    'attribute' => 'instagram',
                    'label'     => 'Ссылка на инстаграм сотрудника',
                ],

            ],
        ]) ?>
<?php break; ?> 

<?php case('name_employee'): ?>
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'id',
                [
                    'attribute' => 'name',
                    'label'     => 'Имя сотрудника ',
                ],

            ],
        ]) ?>
<?php break; ?> 

<?php case('ok'): ?>
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'id',
                [
                    'attribute' => 'ok',
                    'label'     => 'Ссылка на ок сотрудника',
                ],

            ],
        ]) ?>
<?php break; ?> 

<?php case('surname_employee'): ?>
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'surname',
                    'label'     => 'Фамилия сотрудника ',
                ],
            ],
        ]) ?>
<?php break; ?>     

<?php case('twitter'): ?>    
    <?= DetailView::widget([
                'model' => $model,
                'attributes' => [

                    'id',
                    [
                        'attribute' => 'twitter',
                        'label'     => 'Ссылка на твиттер',
                    ],

                ],
            ]) ?>
<?php break; ?>    
    
<?php case('vk'): ?>
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'id',
                [
                    'attribute' => 'vk',
                    'label'     => 'Ссылка на вк сотрудника',
                ],

            ],
        ]) ?>
<?php break; ?>    
<?php case('position_employee'): ?>
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'id',
                [
                    'attribute' => 'position',
                    'label'     => 'Название должности сотрудника',
                ],

            ],
        ]) ?>
<?php break; ?>    
<?php case('position_em'): ?>
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'position_id',
                    'label'     => 'id в таблице о должностях сотрудника',
                ],
                [
                    'attribute' => 'employee_position',
                    'label'     => 'Номер в поле должность, главной таблице о сотрудниках',
                ],

            ],
        ]) ?>
<?php break; ?>        
<?php endswitch; ?>

</div>

