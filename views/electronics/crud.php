<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

Введите данные для CRUD - генератора

<?php $form = ActiveForm::begin() ?>

<?= $form->field($crud, 'model_class')->textInput(['maxlength'=>true]) ?>

<?= $form->field($crud, 'controller_class')->textInput(['maxlength'=>true]) ?>

<?= $form->field($crud, 'model_controller')->textarea(['rows' => 6,'placeholder'=>'Name_model_1 => Name_controller_1, Name_model_2 => Name_controller_2, Name_model_3 => Name_controller_3 ...']) ?>

<div class="form-group">
    <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end() ?>