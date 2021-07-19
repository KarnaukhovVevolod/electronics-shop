<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php $form = ActiveForm::begin([
    'action'=>  Url::to(['/electronics/shop-list'])  ]) ?>
    <!--<div class="search-container">-->
    <div class="search_category"> 
        <?php if($search_word != null): ?>
        <?php $params=[ 'prompt'=>'Все категории','value'=>$category_word,
                        'class' =>'category-form'] ?>
            <?= $form->field($search_form, 'category',['template'=>"{label}\n{input}"])->dropDownList($category, $params)->label('')//textInput(['class'=>'category-form','placeholder'=>'Категории'])->label(''); ?>
        <?php else: ?>
        <?php $params=[ 'prompt'=>'Все категории',
                        'class' =>'category-form'] ?>
            <?= $form->field($search_form, 'category',['template'=>"{label}\n{input}"])->dropDownList($category, $params)->label('')//textInput(['class'=>'category-form','placeholder'=>'Категории'])->label(''); ?>
        <?php endif; ?>
    </div>
    <!--</div>-->
    <?php if($search_word != null): ?>
        
        <div class="header-search_m">
            <?= $form->field($search_form, 'search',['template'=>"{label}\n{input}"])->textInput(['class'=>'product-search','value' => $search_word])->label('') ?>
        </div>
    <?php else: ?>
        
        <div class="header-search_m">
            <?= $form->field($search_form, 'search',['template'=>"{label}\n{input}"])->textInput(['class'=>'product-search','placeholder'=>'Поиск'])->label('') ?>
        </div>
    <?php endif; ?>
    
    <div class="form-group but-search">
            <?= Html::submitButton('', ['class' => 'button-search fa fa-search'] /*['class' => 'btn btn-success fa fa-search']*/) ?>
    </div>
    <?php // $this->params['search_word'] ?>
<?php ActiveForm::end() ?>





