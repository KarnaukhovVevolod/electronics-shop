<?php
use yii\widgets\ActiveForm;
?>

ัะพัั
<?php $model = ActiveForm::begin() ?>
<?= $model->field($form, 'name')->textInput(['value'=>$user_data['name']]) ?>
<?php ActiveForm::end() ?> 
