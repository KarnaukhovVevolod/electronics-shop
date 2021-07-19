<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<span>
  <!-- * <?= $form->field($model, 'integer')->textInput() ?> *-->

<!----- integer ----->
    
  <!-- # <?= $form->field($model, 'string')->textInput(['maxlength' => true]) ?> #-->

<!----- string ----->

  <!-- ^ <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?> ^ -->

<!----- text ----->

  <!-- % <?= $form->field($model, 'boolean')->textInput() ?> %-->
 
<!---- boolean ----->
</span>
    


<div class="form-my">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <!--@356-->
  
    <!--@345-->
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>

















