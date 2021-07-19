<?php

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets;
use kartik\select2\Select2;

?>


<?php if($categor == 'notebook'): ?>
<!-- Фильтр для ноутбука -->
 <br>
<div id="slider-range1"></div>   
<br>
<?php 
$url_notebook = $url ?>
<?php $form = ActiveForm::begin([
    'id'     => 'filters',
    'options'=> ['name'   => 'Notebook'],
    'method' => 'post',
    'action' => $url_notebook ,
]); ?>
<label for="price_min">
    <?= $form->field($filter, 'price_min')->textInput(['id'=>'price_min']) ?>
</label>
    <label for="price_max">
    <?= $form->field($filter, 'price_max')->textInput(['id'=>'price_max']) ?>
    </label>
    <?php 
    $fields_model = ['name_type_of_subcategory', 'manufacturer',
       'number_core', 'total_memory', 'amount_ram', 
        'screen_diagonal'];
    
    $i = 0;
    ?>
    <?php
    
    foreach($data_filt_all as $note_filt): ?>
    <div class="filters">
        <?php
        $key_el = array_search($note_filt, $data_filt_all);
            echo Select2::widget([
                'model'     => $filter,
                'name'      => $fields_model[$i],
                'attribute' => $fields_model[$i],
                'data'      => $note_filt,
                'options'   =>[
                    'placeholder' => $key_el,
                    'multiple' => true,
                ],
            ]); 
            $i++;
            unset($data_filt_all[$key_el]);
        ?>
    </div>
   <?php endforeach; ?>
<div class="none" style="display: none">
   <?= $form->field($filter, 'category')->textInput(['value' => 'notebook']) ?>
</div>
    <div class="form-group">
        <?= Html::submitButton('Фильтр', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

<!-- Фильтр для ноутбука конец -->

<!-- Фильтр для планшетов -->
<?php elseif ($categor == 'tablets'):?>
    <br>
    <div id="slider-range1"></div>   
    <br>
    <?php 
    $url_tablets = $url; ?>
    <?php $form = ActiveForm::begin([
        'id'     => 'filters',
        'options'=> ['name'   => 'Tablets'],
        'method' => 'post',
        'action' => $url_tablets,
    ]); ?>
    <label for="price_min">
        <?= $form->field($filter, 'price_min')->textInput(['id'=>'price_min']) ?>
    </label>
        <label for="price_max">
        <?= $form->field($filter, 'price_max')->textInput(['id'=>'price_max']) ?>
        </label>
        <?php 
        $fields_model = [ 'manufacturer',
           'number_sim', 'internal_memory', 'amount_ram', 
            'screen_diagonal','name_type_of_subcategory'];

        $i = 0;
        ?>
        <?php
        //debug($data_filt_all);
        //die();
        foreach($data_filt_all as $note_filt): ?>
        <div class="filters">
            <?php
            $key_el = array_search($note_filt, $data_filt_all);
            
                echo Select2::widget([
                    'model'     => $filter,
                    'name'      => $fields_model[$i],
                    'attribute' => $fields_model[$i],
                    'data'      => $note_filt,
                    'options'   =>[
                        'placeholder' => $key_el,
                        'multiple' => true,
                    ],
                ]); 
                unset($data_filt_all[$key_el]);
                $i++;
                
            ?>
        </div>
       <?php endforeach; ?>
    <div class="none" style="display: none">
       <?= $form->field($filter, 'category')->textInput(['value' => 'tablets']) ?>
    </div>
        <div class="form-group">
            <?= Html::submitButton('Фильтр', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
<!-- Фильтр для планшетов конец -->

<!-- Фильтр для аудио -->
<?php elseif ($categor == 'audio') : ?>
    <br>
    <div id="slider-range1"></div>   
    <br>
    <?php 
    $url_audio = $url  ?>
    <?php $form = ActiveForm::begin([
        'id'     => 'filters',
        'options'=> ['name'   => 'Tablets'],
        'method' => 'post',
        'action' => $url_audio,
    ]); ?>
    <label for="price_min">
        <?= $form->field($filter, 'price_min')->textInput(['id'=>'price_min']) ?>
    </label>
        <label for="price_max">
        <?= $form->field($filter, 'price_max')->textInput(['id'=>'price_max']) ?>
        </label>
        <?php 
        $fields_model = ['manufacturer', 'power',
           'name_type_of_subcategory'];

        $i = 0;
        ?>
        <?php
        //debug($data_filt_all);
        //die();
        foreach($data_filt_all as $note_filt): ?>
            <div class="filters">
                <?php
                $key_el = array_search($note_filt, $data_filt_all);
                    echo Select2::widget([
                        'model'     => $filter,
                        'name'      => $fields_model[$i],
                        'attribute' => $fields_model[$i],
                        'data'      => $note_filt,
                        'options'   =>[
                            'placeholder' => $key_el,
                            'multiple' => true,
                        ],
                    ]); 
                    $i++;
                    unset($data_filt_all[$key_el]);
                ?>
            </div>
        <?php endforeach; ?>
    <div class="none" style="display: none">
       <?= $form->field($filter, 'category')->textInput(['value' => 'audio']) ?>
    </div>
        <div class="form-group">
            <?= Html::submitButton('Фильтр', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

<!-- Фильтр для  конец -->

<!-- Фильтр для телефонов -->
<?php elseif ($categor == 'smartiphone') : ?>
    <br>
    <div id="slider-range1"></div>   
    <br>
    <?php
    $url_smartiphone = $url  ?>
    <?php $form = ActiveForm::begin([
        'id'     => 'filters',
        'options'=> ['name'   => 'smartiphone'],
        'method' => 'post',
        'action' => $url_smartiphone,
    ]); ?>
    <label for="price_min">
        <?= $form->field($filter, 'price_min')->textInput(['id'=>'price_min']) ?>
    </label>
        <label for="price_max">
        <?= $form->field($filter, 'price_max')->textInput(['id'=>'price_max']) ?>
        </label>
        <?php 
        $fields_model = ['manufacturer','number_core','internal_memory','amount_ram', 
           'screen_diagonal',  'screen_resolution', 'color','series',
           'name_type_of_subcategory'];

        $i = 0;
        ?>
        <?php
        //debug($data_filt_all);
        //die();
        foreach($data_filt_all as $note_filt): ?>
            <div class="filters">
                <?php
                $key_el = array_search($note_filt, $data_filt_all);
                    echo Select2::widget([
                        'model'     => $filter,
                        'name'      => $fields_model[$i],
                        'attribute' => $fields_model[$i],
                        'data'      => $note_filt,
                        'options'   =>[
                            'placeholder' => $key_el,
                            'multiple' => true,
                        ],
                    ]); 
                    $i++;
                    unset($data_filt_all[$key_el]);
                ?>
            </div>
        <?php endforeach; ?>
    <div class="none" style="display: none">
       <?= $form->field($filter, 'category')->textInput(['value' => 'smartiphone']) ?>
    </div>
        <div class="form-group">
            <?= Html::submitButton('Фильтр', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
<!-- Фильтр для телефонов конец -->

<!-- Фильтр для телевизоров -->
<?php elseif ($categor == 'tv') : ?>
    <br>
    <div id="slider-range1"></div>   
    <br>
    <?php 
    $url_tv = $url ?>
    <?php $form = ActiveForm::begin([
        'id'     => 'filters',
        'options'=> ['name'   => 'tv'],
        'method' => 'post',
        'action' => $url_tv,
    ]); ?>
    <label for="price_min">
        <?= $form->field($filter, 'price_min')->textInput(['id'=>'price_min']) ?>
    </label>
        <label for="price_max">
        <?= $form->field($filter, 'price_max')->textInput(['id'=>'price_max']) ?>
        </label>
        <?php 
        $fields_model = ['manufacturer', 'screen_resolution',
           'screen_diagonal','name_type_of_subcategory'];

        $i = 0;
        ?>
        <?php
        //debug($data_filt_all);
        //die();
        foreach($data_filt_all as $note_filt): ?>
            <div class="filters">
                <?php
                $key_el = array_search($note_filt, $data_filt_all);
                    echo Select2::widget([
                        'model'     => $filter,
                        'name'      => $fields_model[$i],
                        'attribute' => $fields_model[$i],
                        'data'      => $note_filt,
                        'options'   =>[
                            'placeholder' => $key_el,
                            'multiple' => true,
                        ],
                    ]); 
                    $i++;
                    unset($data_filt_all[$key_el]);
                ?>
            </div>
        <?php endforeach; ?>
    <div class="none" style="display: none">
       <?= $form->field($filter, 'category')->textInput(['value' => 'tv']) ?>
    </div>
        <div class="form-group">
            <?= Html::submitButton('Фильтр', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
<!-- Фильтр для телевизоров конец -->

<!-- Фильтр для видеокамеры -->
<?php elseif ($categor == 'videocamera') : ?>
    <br>
    <div id="slider-range1"></div>   
    <br>
    <?php 
    $url_videocamera = $url  ?>
    <?php $form = ActiveForm::begin([
        'id'     => 'filters',
        'options'=> ['name'   => 'Videocamera'],
        'method' => 'post',
        'action' => $url_videocamera,
    ]); ?>
    <label for="price_min">
        <?= $form->field($filter, 'price_min')->textInput(['id'=>'price_min']) ?>
    </label>
        <label for="price_max">
        <?= $form->field($filter, 'price_max')->textInput(['id'=>'price_max']) ?>
        </label>
        <?php 
        $fields_model = ['manufacturer', 'video_recording_speed',
           'name_type_of_subcategory'];

        $i = 0;
        ?>
        <?php
        //debug($data_filt_all);
        //die();
        foreach($data_filt_all as $note_filt): ?>
            <div class="filters">
                <?php
                $key_el = array_search($note_filt, $data_filt_all);
                    echo Select2::widget([
                        'model'     => $filter,
                        'name'      => $fields_model[$i],
                        'attribute' => $fields_model[$i],
                        'data'      => $note_filt,
                        'options'   =>[
                            'placeholder' => $key_el,
                            'multiple' => true,
                        ],
                    ]); 
                    $i++;
                    unset($data_filt_all[$key_el]);
                ?>
            </div>
        <?php endforeach; ?>
    <div class="none" style="display: none">
       <?= $form->field($filter, 'category')->textInput(['value' => 'videocamera']) ?>
    </div>
        <div class="form-group">
            <?= Html::submitButton('Фильтр', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
<!-- Фильтр для видеокамеры конец -->

<?php elseif ($categor == 'camera') : ?>
    <br>
    <div id="slider-range1"></div>   
    <br>
    <?php 
    $url_camera = $url  ?>
    <?php $form = ActiveForm::begin([
        'id'     => 'filters',
        'options'=> ['name'   => 'Сamera'],
        'method' => 'post',
        'action' => $url_camera,
    ]); ?>
    <label for="price_min">
        <?= $form->field($filter, 'price_min')->textInput(['id'=>'price_min']) ?>
    </label>
        <label for="price_max">
        <?= $form->field($filter, 'price_max')->textInput(['id'=>'price_max']) ?>
        </label>
        <?php 
        $fields_model = ['manufacturer', 'resolution_matrix',
           'name_type_of_subcategory'];

        $i = 0;
        ?>
        <?php
        //debug($data_filt_all);
        //die();
        foreach($data_filt_all as $note_filt): ?>
            <div class="filters">
                <?php
                $key_el = array_search($note_filt, $data_filt_all);
                    echo Select2::widget([
                        'model'     => $filter,
                        'name'      => $fields_model[$i],
                        'attribute' => $fields_model[$i],
                        'data'      => $note_filt,
                        'options'   =>[
                            'placeholder' => $key_el,
                            'multiple' => true,
                        ],
                    ]); 
                    $i++;
                    unset($data_filt_all[$key_el]);
                ?>
            </div>
        <?php endforeach; ?>
    <div class="none" style="display: none">
       <?= $form->field($filter, 'category')->textInput(['value' => 'camera']) ?>
    </div>
        <div class="form-group">
            <?= Html::submitButton('Фильтр', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
<?php endif; ?>




