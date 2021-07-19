<?php
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<?php $model = ActiveForm::begin() ?>

<?= $model->field($category,'id')->textInput() ?>

<?= $model->field($category,'teg_title')->textInput() ?>

<?= $model->field($category,'teg_description')->textInput() ?>

<?= $model->field($category,'teg_keywords')->textInput() ?>

<?= $model->field($category,'my_comment')->textInput() ?>


<div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>


