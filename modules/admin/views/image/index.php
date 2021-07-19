<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все записи';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php $image = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $image->field($upload_image,'files[]')->fileInput(['multiple' => true])  ?>
    
    <?php $items_directory = ['audio'=>'Категория  аудио', 'camera'=>'Категория камеры (Фотоаппарат)','notebook'=>'Категория ноутбуки','smartiphone'=>'Категория телефоны',
        'tablets'=>'Категория планшеты','tv'=>'Категория телевизоры','videocamera'=>'Категория видеокамеры','different'=>'Другое'];
        $params_dir = ['prompt' => 'Выберите категорию для фото'];
    ?>
    
    <?= $image->field($upload_image, 'directory')->dropDownList($items_directory, $params_dir)->label('Директория для фото') ?>
    
    <div class="form-group">
        <?= Html::submitButton('Вставить', ['class' => 'btn btn-success']) ?>
    </div>
    
<?php ActiveForm::end() ?>

<?php if($warning != null): ?>
    <div> Такие пути к фото уже существуют в базе данных</div>
    <?php foreach($warning as $warn): ?>
    <div>
        <?= $warn->path ?>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

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
            'path',
            [   'attribute'=>'path',
                'format' => 'raw',
                'value'  => function($data){
                    return Html::img($data->path,['style' =>'width:60px;height:60px']);
                    
                }
            ],
            'comment',
            'category',
            
            
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
