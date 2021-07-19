<?php 

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
//use Yii;

?>

<?php 
//unset($this->assetBundles['yii\bootstrap\BootstrapPluginAsset']);
//unset($this->assetBundles['yii\web\JqueryAsset']);

?>
<!doctype html>
<html class="no-js" lang="">
    <script> function one(){
            var text_drop = $('#managerform-type_delivery :selected').val();
            if(text_drop == 1)
            {

                $('#address').css('display','block');
                $('#address_point').css('display','none');

            }

            else if(text_drop == 2)
            {
                $('#address_point').css('display','block');
                $('#address').css('display','none');

            }
            else if(text_drop == 0)
            {
                $('#address_point').css('display','none');
                $('#address').css('display','none');
            }
            //alert(1);
        }
    </script>
    <body onload="one()">
        <?php $url = Url::to(['/electronics/cart']) ?>
        <?php $this->params['crumbs'][] = ['label'=> 'Корзина',
            'url'=> $url] ?>
        <?php $this->params['crumbs'][] = ['label'=> 'Оплата'] ?>
<!-- Add your site or application content here -->

        <!-- HEADER-AREA START -->
        
        <!-- HEADER AREA END -->
        <!-- START PAGE-CONTENT -->
        <section class="page-content">
            <div class="container">
                
                <div class="row">
                        <div class="col-md-3">
                                <!-- CATEGORY-MENU-LIST START -->
                            	<?= app\widgets\category\CategoryWidget::widget(); ?>
                            <!-- END CATEGORY-MENU-LIST -->
                            <!-- START SMALL-PRODUCT-AREA -->
                            <div class="small-product-area carosel-navigation hidden-sm hidden-xs">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="area-title">
                                                    <h3 class="title-group gfont-1">Бестселлер</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="active-bestseller sidebar">
                                                    <div class="active-bestseller sidebar">
                                                                    <?php $i = 0; $start_col = 1; $end_col = 4;  
                                                                    
                                                                    foreach($market_sort['bestseller'] as $product_best): ?>
                                                                       
                                                                        <?php $i++; ?>
                                                                        <?php if( $start_col == $i ): ?>
                                                                            <?php $start_col = $start_col + 4; ?>
                                                                            <div class="col-xs-12">
                                                                        <?php endif; ?>

                                                                            <!-- Start Single-Product -->
                                                                            <div class="single-product">
                                                                                    <div class="product-img">
                                                                                            <a href="<?= $product_best['link_description']."&" ?>">
                                                                                                    <img class="primary-img" src="<?= $product_best['path'] ?>" alt="Product">
                                                                                            </a>
                                                                                    </div>
                                                                                    <div class="product-description">
                                                                                            <h5><a href="<?= $product_best['link_description'] ?>"><?= $product_best['model_product'] ?></a></h5>
                                                                                            <div class="price-box">
                                                                                                    <span class="price"><?= $product_best['price'] ?></span>
                                                                                                    <span class="old-price"><?= $product_best['old_price'] ?></span>
                                                                                            </div>
                                                                                            <span class="rating">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star-o"></i>
                                                                                            </span>
                                                                                    </div>
                                                                            </div>
                                                                            <!-- End Single-Product -->


                                                                        <?php if( $end_col == $i ): ?>
                                                                            <?php $end_col = $end_col + 4; ?>
                                                                            </div>
                                                                        <?php endif; ?>

                                                                    <?php endforeach; ?>
                                                                    <?php if($i%4): ?>
                                                                        </div>
                                                                    <?php endif; ?>
									
								</div>
                                            </div>
                                    </div>
                            </div>
                            <!-- END SMALL-PRODUCT-AREA -->
                        </div>
                        <div class="col-md-9">
                                <!-- START PRODUCT-BANNER -->
                                <div class="product-banner">
                                        <div class="row">
                                                <div class="col-xs-12">
                                                    <?php foreach($banner as $single_banner): ?>
                                                        <div class="banner">
                                                                <a href="<?= $single_banner['link_description'] ?>"><img src="<?= $single_banner['path'] ?>" alt="Product Banner"></a>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                        </div>
                                </div>
                                
                                <!-- END PRODUCT-BANNER -->
                                <!-- Start checkout-area -->
                                <div class="checkout-area">
                                        <div class="row">
                                                <div class="col-md-12">
                                                        <div class="cart-title">
                                                                <h2 class="entry-title">Оформление заказа</h2>
                                                        </div>
                                                        
                                                        <?php if(Yii::$app->session->hasFlash('purchase_of_goods')): ?>
                                                            <div class="alert alert-success alert-dismissable" role="alert">
                                                                <button type="button" class="close close-alert close_flash" data-dimiss="alert" aria-label="Close"><span arria-hidden="true">&times;</span></button>
                                                                <?= Yii::$app->session->getFlash('purchase_of_goods')  ?>
                                                                <?php Yii::$app->session->removeFlash('purchase_of_goods') ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <!-- Accordion start -->
                                                        <div class="panel-group" id="accordion">
                                                            
                                                            <!-- Вывод заказа -->
                                                            <?php  if(isset($history_order)): ?>
                                                            <div class="panel panel_default">
                                                                <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                                <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#checkout-confirm">Информация о заказе <i class="fa fa-caret-down"></i> </a>
                                                                        </h4>
                                                                </div>
                                                                <div id="checkout-confirm" class="collapse">
                                                                        <div class="panel-body">
                                                                                <!-- Start Table -->
                                                                                <div class="table-responsive">
                                                                                        <table class="table table-bordered">
                                                                                                <thead>
                                                                                                        <tr>
                                                                                                                <td class="text-center">Фото</td>
                                                                                                                <td class="text-left">Название продукта</td>
                                                                                                                <!--<td class="text-left">Model</td>-->
                                                                                                                <td class="text-right">Един. стоимость</td>
                                                                                                                <td class="text-left">Кол-во</td>

                                                                                                                <td class="text-right">Общ. стоимость</td>
                                                                                                        </tr>
                                                                                                </thead>
                                                                                                <?php foreach($history_order as $one_order): ?>


                                                                                                <tbody>

                                                                                                    <?php foreach($one_order['productshop'] as $one_product):?>

                                                                                                        <tr>
                                                                                                                <td class="text-center">
                                                                                                                    <a href="<?= $one_product['link'] ?>"><img class="img-thumbnail" src="<?= $one_product['path'] ?>" alt="#" style="width:120px;height: 120px" /></a>
                                                                                                                </td>
                                                                                                                <td class="text-left">
                                                                                                                        <a href="<?= $one_product['link'] ?>"><?= $one_product['name_model'] ?></a>
                                                                                                                </td>
                                                                                                                <td class="text-right"><?= $one_product['price'] ?></td>
                                                                                                                <td class="text-left">
                                                                                                                    
                                                                                                                    <?= $one_product['quantity'] ?>
                                                                                                                    <!--
                                                                                                                        <div class="btn-block cart-put">
                                                                                                                            <input class="quantity-product" type="number" value="<?php //$one_product['quantity'] ?>" min="1"/>
                                                                                                                    
                                                                                                                                <input type="text" class="form-control" />
                                                                                                                                <div class="input-group-btn cart-buttons">
                                                                                                                                    
                                                                                                                                        <button class="btn btn-primary checkout-add-cart" data-toggle="tooltip" title="Изменить">
                                                                                                                                                <i class="fa fa-refresh "></i>
                                                                                                                                        </button>
                                                                                                                                        <button class="btn btn-danger" data-toggle="tooltip" title="Удалить">
                                                                                                                                                <i class="fa fa-times-circle"></i>
                                                                                                                                        </button>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                    <!-- -->

                                                                                                                </td>

                                                                                                                <td class="text-right"><?= $one_product['total_price'] ?></td>
                                                                                                        </tr>

                                                                                                    <?php endforeach ?>

                                                                                                        <tr>
                                                                                                                <td class="text-right" colspan="4">
                                                                                                                        <strong>Общая цена заказа:</strong>
                                                                                                                </td>
                                                                                                                <td class="text-right"><?= $one_order['total_price_order'] ?></td>
                                                                                                        </tr>
                                                                                                        
                                                                                                        
                                                                                                        <tr>
                                                                                                                <td class="text-right" colspan="5">
                                                                                                                    <strong><br><a href="<?= $url ?>">Изменить заказ</a><br></strong>
                                                                                                                </td>
                                                                                                        </tr>

                                                                                                </tbody>


                                                                                                <!--<tfoot>-->
                                                                                                        <!--<tr>
                                                                                                                <td class="text-right" colspan="4">
                                                                                                                        <strong>Общая цена заказа:</strong>
                                                                                                                </td>
                                                                                                                <td class="text-right"><?php // $one_order['total_price_order'] ?></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                                <td class="text-right" colspan="4">
                                                                                                                        <strong>Дата заказа:</strong>
                                                                                                                </td>
                                                                                                                <td class="text-right"><?php // $one_order['date_order'] ?></td>
                                                                                                        </tr>
                                                                                                        -->
                                                                                                        <!--
                                                                                                        <tr>
                                                                                                                <td class="text-right" colspan="5">
                                                                                                                        <strong>Flat Shipping Rate:</strong>
                                                                                                                </td>
                                                                                                                <td class="text-right">$5.00</td>
                                                                                                        </tr>
                                                                                                        -->
                                                                                                <!--</tfoot>-->
                                                                                                <?php endforeach; ?> 
                                                                                        </table>
                                                                                </div>
                                                                                <!-- End Table -->
                                                                                <!--
                                                                                <div class="buttons pull-right">
                                                                                        <input type="button" class="btn btn-primary" value="Confirm Order" />
                                                                                </div>
                                                                                -->
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Конец вывода заказа -->
                                                            
                                                                <!-- Start 1 Checkout-options -->
                                                                <!--
                                                                <div class="panel panel_default">
                                                                        <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                        <a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#checkout-options">Step 1: Checkout Options  <i class="fa fa-caret-down"></i> </a>
                                                                                </h4>
                                                                        </div>
                                                                        <div id="checkout-options" class="collapse in">
                                                                                <div class="panel-body">
                                                                                        <div class="row">
                                                                                                <div class="col-md-6 col-xs-12">
                                                                                                        <div class="checkout-collapse">
                                                                                                                <h3 class="title-group-3 gfont-1">New Customer</h3>
                                                                                                                <p>Checkout Options</p>
                                                                                                                <div class="radio">
                                                                                                                        <label>
                                                                                                                                <input type="radio" value="register" name="account" checked/>
                                                                                                                                Register Account
                                                                                                                        </label>
                                                                                                                </div>
                                                                                                                <div class="radio">
                                                                                                                        <label>
                                                                                                                                <input type="radio" value="guest" name="account"/>
                                                                                                                                Guest Checkout
                                                                                                                        </label>
                                                                                                                </div>
                                                                                                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                                                                                                <input type="submit" class="btn btn-primary" value="Continue"/>
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="col-md-6 col-xs-12">
                                                                                                        <div class="checkout-collapse">
                                                                                                                <h3 class="title-group-3 gfont-1">Returning Customer</h3>
                                                                                                                <p>I am a returning customer</p>
                                                                                                                <div class="form-group">
                                                                                                                        <label>E-mail</label>
                                                                                                                        <input type="email" class="form-control" name="email" />
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                        <label>Password</label>
                                                                                                                        <input type="password" class="form-control" />
                                                                                                                        <a href="#">Forgotten Password</a>
                                                                                                                </div>
                                                                                                                <input type="submit" class="btn btn-primary" value="Login"/>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                -->
                                                                <!-- End Checkout-options -->
                                                                <!-- Start 2 Payment-Address -->
                                                                
                                                                <div class="panel panel_default">
                                                                        <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                        <a class="accordion-trigger  collapsed" data-toggle="collapse" data-parent="#accordion" href="#payment-address1">Заполните персональные данные<i class="fa fa-caret-down"></i> </a>
                                                                                </h4>
                                                                        </div>
                                                                        <div id="payment-address1" class="collapse in">
                                                                            <?php if(Yii::$app->user->can('canUser')): ?>
                                                                                <div class="panel-body">
                                                                                    <?php $shop_user = ActiveForm::begin([
                                                                                        'action' => Url::to(['/electronics/checkout']) //Url::to(['/money/oplata'])
                                                                                        
                                                                                    ]
                                                                                       
                                                                                            );  ?>
                                                                                        <div class="row">
                                                                                            <div class="col-xs-12">
                                                                                                <fieldset>
                                                                                                    <legend>Выберите тип доставки</legend>

                                                                                                    <div class="form-group">
                                                                                                        <?php $item = ['0'=>'Выберите тип доставки...','1'=>'Доставка', '2'=>'Самовывоз']; ?>
                                                                                                        <?= $shop_user->field($manage_form, 'type_delivery')->dropDownList($item) ?>
                                                                                                    </div>

                                                                                                </fieldset>
                                                                                            </div>
                                                                                            <div class="col-md-6 col-xs-12">
                                                                                                <fieldset id="account">
                                                                                                            <legend>Мои персональные данные</legend>

                                                                                                            <div class="form-group">
                                                                                                                    
                                                                                                                <?= $shop_user->field($manage_form, 'name')->textInput(['maxlength' => true, 'placeholder'=>'например: Оля','value' => $user_data->name]) ?>
                                                                                                            </div>
                                                                                                            <div class="form-group">
                                                                                                                    
                                                                                                                <?= $shop_user->field($manage_form, 'surname')->textInput(['maxlength' => true, 'placeholder'=>'например: Примакова','value' => $user_data->surname]) ?>
                                                                                                            </div>
                                                                                                            <div class="form-group">
                                                                                                                    
                                                                                                                <?= $shop_user->field($manage_form, 'telephone')->textInput(['maxlength' => true, 'placeholder'=>'например: +7(916)-271-92-18','value' => $user_data->mobile]) ?>
                                                                                                            </div>
                                                                                                            <div class="form-group">
                                                                                                                    
                                                                                                                <?= $shop_user->field($manage_form, 'email')->textInput(['maxlength' => true, 'placeholder'=>'например: olyagmail.com' ,'value' => $user_data->email]) ?>    
                                                                                                            </div>
                                                                                                            
                                                                                                    </fieldset>
                                                                                            </div>
                                                                                            <!-- Доставка по почте -->
                                                                                                <div class="col-md-6 col-xs-12 delivery">
                                                                            
                                                                                                    <fieldset id="address" style="display:none" >
                                                                                                                <legend>Мой адрес</legend>
                                                                                                                <div class="form-group">
                                                                                                                       
                                                                                                                       <?= $shop_user->field($manage_form, 'post_code')->textInput(['maxlength' => true, 'placeholder'=>'например: 442231' ,'value' => $user_data->post_code]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                        
                                                                                                                        <?= $shop_user->field($manage_form, 'region')->textInput(['maxlength' => true, 'placeholder'=>'например: Ленинградская область' ,'value' => $user_data->region]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                        
                                                                                                                        <?= $shop_user->field($manage_form, 'city')->textInput(['maxlength' => true, 'placeholder'=>'например: Санкт-Петербург' ,'value' => $user_data->city]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                        
                                                                                                                        <?= $shop_user->field($manage_form, 'village_locality')->textInput(['maxlength' => true, 'placeholder'=>'например: Выборгский район, посёлок Каменка','value' => $user_data->village_locality]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    
                                                                                                                    <?= $shop_user->field($manage_form, 'street')->textInput(['maxlength' => true, 'placeholder'=>'например: Улица Ворошилова', 'value' => $user_data->street]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">

                                                                                                                    <?= $shop_user->field($manage_form, 'room')->textInput(['maxlength' => true, 'placeholder'=>'например: дом 40', 'value' => $user_data->room]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">

                                                                                                                    <?= $shop_user->field($manage_form, 'flat')->textInput(['maxlength' => true, 'placeholder'=>'например: квартира 65', 'value' => $user_data->flat]) ?>    
                                                                                                                </div>
                                                                                                        </fieldset>
                                                                                                    <script> /*function one(){
                                                                                                        var text_drop = $('#managerform-type_delivery :selected').val();
                                                                                                        if(text_drop == 1)
                                                                                                        {
                                                                                                            
                                                                                                            $('#address').css('display','block');
                                                                                                            $('#address_point').css('display','none');

                                                                                                        }

                                                                                                        else if(text_drop == 2)
                                                                                                        {
                                                                                                            $('#address_point').css('display','block');
                                                                                                            $('#address').css('display','none');

                                                                                                        }
                                                                                                        else if(text_drop == 0)
                                                                                                        {
                                                                                                            $('#address_point').css('display','none');
                                                                                                            $('#address').css('display','none');
                                                                                                        }
                                                                                                        alert(1);
                                                                                                    }*/
                                                                                                    </script>
                                                                                                </div>
                                                                                            <!-- Самовывоз -->    
                                                                                                <div class="col-md-6 col-xs-12 delivery">
                                                                                                    <fieldset id="address_point" style="display:none">
                                                                                                                <legend>Выберите пункт выдачи</legend>
                                                                                                                
                                                                                                                <div class="form-group">
                                                                                                                       
                                                                                                                       <?= $shop_user->field($manage_form, 'point_delivery')->dropDownList($point['point']) ?>    
                                                                                                                </div>
                                                                                                                <?php if($point != null): ?>
                                                                                                                    <div class="<?= $point[0]['name'] ?> adress-point">
                                                                                                                        <div class="adress_delivery"><?= $point[0]['adress'] ?></div>
                                                                                                                        <div class="telephone_delivery"><?= $point[0]['telephone'] ?></div>
                                                                                                                        <div class="time_delivery"><?= $point[0]['time_work'] ?></div>
                                                                                                                    </div>
                                                                                                                    <?php $h = 0; $max = count($point)-1 ?>
                                                                                                                    <?php for($i = 1; $i < $max; $i++): ?>
                                                                                                                        <div class="<?= $point[$i]['name'] ?> adress-point" style="display:none">
                                                                                                                            <div class="adress_delivery"><?= $point[$i]['adress'] ?></div>
                                                                                                                            <div class="telephone_delivery"><?= $point[$i]['telephone'] ?></div>
                                                                                                                            <div class="time_delivery"><?= $point[$i]['time_work'] ?></div>
                                                                                                                        </div>
                                                                                                                    <?php endfor; ?>
                                                                                                                <?php endif; ?>
                                                                                                        </fieldset>
                                                                                                </div>

                                                                                        </div>
                                                                                    <!--
                                                                                        <div class="row">
                                                                                                <div class="col-xs-12">
                                                                                                        <div class="checkbox">
                                                                                                                <label>
                                                                                                                        <input type="checkbox" name="newsletter" />
                                                                                                                         I wish to subscribe to the Malias1 newsletter.
                                                                                                                </label>
                                                                                                        </div>
                                                                                                        <div class="checkbox">
                                                                                                                <label>
                                                                                                                        <input type="checkbox" name="shipping_address" checked/>
                                                                                                                         My delivery and billing addresses are the same.
                                                                                                                </label>
                                                                                                        </div>
                                                                                                        <div class="buttons clearfix">
                                                                                                                <div class="pull-right">
                                                                                                                        I have read and agree to the 
                                                                                                                        <a href="#"><b>Privacy Policy</b></a>
                                                                                                                        <input type="checkbox" name="agree" />
                                                                                                                        <input type="button" class="btn btn-primary" value="Continue" />
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                    -->
                                                                                        <div class="form-group">
                                                                                            <?= Html::submitButton('Купить',['class'=>'btn btn-success']) ?>
                                                                                        </div>
                                                                                    <?php ActiveForm::end() ?>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                <div class="panel-body">
                                                                                    <?php $shop_user = ActiveForm::begin([
                                                                                        'action' => Url::to(['/electronics/checkout']) //Url::to(['/money/oplata'])
                                                                                    ]);  ?>
                                                                                        <div class="row">
                                                                                            <div class="col-xs-12">
                                                                                                <fieldset>
                                                                                                    <legend>Выберите тип доставки</legend>

                                                                                                    <div class="form-group">
                                                                                                        <?php $item = ['0'=>'Выберите тип доставки...','1'=>'Доставка', '2'=>'Самовывоз']; ?>
                                                                                                        <?= $shop_user->field($manage_form, 'type_delivery')->dropDownList($item) ?>
                                                                                                    </div>

                                                                                                </fieldset>
                                                                                            </div>
                                                                                            <div class="col-md-6 col-xs-12">
                                                                                                <fieldset id="account">
                                                                                                            <legend>Мои персональные данные</legend>

                                                                                                            <div class="form-group">
                                                                                                                    
                                                                                                                <?= $shop_user->field($manage_form, 'name')->textInput(['maxlength' => true, 'placeholder'=>'например: Оля' /*,'value' => $user_data->country*/]) ?>
                                                                                                            </div>
                                                                                                            <div class="form-group">
                                                                                                                    
                                                                                                                <?= $shop_user->field($manage_form, 'surname')->textInput(['maxlength' => true, 'placeholder'=>'например: Примакова' /*,'value' => $user_data->country*/]) ?>
                                                                                                            </div>
                                                                                                            <div class="form-group">
                                                                                                                    
                                                                                                                <?= $shop_user->field($manage_form, 'telephone')->textInput(['maxlength' => true, 'placeholder'=>'например: +7(916)-271-92-18' /*,'value' => $user_data->country*/]) ?>
                                                                                                            </div>
                                                                                                            <div class="form-group">
                                                                                                                    
                                                                                                                <?= $shop_user->field($manage_form, 'email')->textInput(['maxlength' => true, 'placeholder'=>'например: olyagmail.com' /*,'value' => $user_data->country*/]) ?>    
                                                                                                            </div>
                                                                                                            
                                                                                                    </fieldset>
                                                                                            </div>
                                                                                            <!-- Доставка по почте -->
                                                                                                <div class="col-md-6 col-xs-12 delivery">
                                                                            
                                                                                                    <fieldset id="address" style="display:none" >
                                                                                                                <legend>Мой адрес</legend>
                                                                                                                <div class="form-group">
                                                                                                                       
                                                                                                                       <?= $shop_user->field($manage_form, 'post_code')->textInput(['maxlength' => true, 'placeholder'=>'например: 442231' /*,'value' => $user_data->country*/]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                        
                                                                                                                        <?= $shop_user->field($manage_form, 'region')->textInput(['maxlength' => true, 'placeholder'=>'например: Ленинградская область' /*,'value' => $user_data->country*/]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                        
                                                                                                                        <?= $shop_user->field($manage_form, 'city')->textInput(['maxlength' => true, 'placeholder'=>'например: Санкт-Петербург' /*,'value' => $user_data->country*/]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                        
                                                                                                                        <?= $shop_user->field($manage_form, 'village_locality')->textInput(['maxlength' => true, 'placeholder'=>'например: Выборгский район, посёлок Каменка' /*,'value' => $user_data->country*/]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    
                                                                                                                    <?= $shop_user->field($manage_form, 'street')->textInput(['maxlength' => true, 'placeholder'=>'например: Улица Ворошилова' /*,'value' => $user_data->country*/]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">

                                                                                                                    <?= $shop_user->field($manage_form, 'room')->textInput(['maxlength' => true, 'placeholder'=>'например: дом 40' /*,'value' => $user_data->country*/]) ?>    
                                                                                                                </div>
                                                                                                                <div class="form-group">

                                                                                                                    <?= $shop_user->field($manage_form, 'flat')->textInput(['maxlength' => true, 'placeholder'=>'например: квартира 65' /*,'value' => $user_data->country*/]) ?>    
                                                                                                                </div>
                                                                                                        </fieldset>
                                                                                                    <script> /*function one(){
                                                                                                        var text_drop = $('#managerform-type_delivery :selected').val();
                                                                                                        if(text_drop == 1)
                                                                                                        {
                                                                                                            
                                                                                                            $('#address').css('display','block');
                                                                                                            $('#address_point').css('display','none');

                                                                                                        }

                                                                                                        else if(text_drop == 2)
                                                                                                        {
                                                                                                            $('#address_point').css('display','block');
                                                                                                            $('#address').css('display','none');

                                                                                                        }
                                                                                                        else if(text_drop == 0)
                                                                                                        {
                                                                                                            $('#address_point').css('display','none');
                                                                                                            $('#address').css('display','none');
                                                                                                        }
                                                                                                        alert(1);
                                                                                                    }*/
                                                                                                    </script>
                                                                                                </div>
                                                                                            <!-- Самовывоз -->    
                                                                                                <div class="col-md-6 col-xs-12 delivery">
                                                                                                    <fieldset id="address_point" style="display:none">
                                                                                                                <legend>Выберите пункт выдачи</legend>
                                                                                                                
                                                                                                                <div class="form-group">
                                                                                                                       
                                                                                                                       <?= $shop_user->field($manage_form, 'point_delivery')->dropDownList($point['point']) ?>    
                                                                                                                </div>
                                                                                                                <?php if($point != null): ?>
                                                                                                                    <div class="<?= $point[0]['name'] ?> adress-point">
                                                                                                                        <div class="adress_delivery"><?= $point[0]['adress'] ?></div>
                                                                                                                        <div class="telephone_delivery"><?= $point[0]['telephone'] ?></div>
                                                                                                                        <div class="time_delivery"><?= $point[0]['time_work'] ?></div>
                                                                                                                    </div>
                                                                                                                    <?php $h = 0; $max = count($point)-1 ?>
                                                                                                                    <?php for($i = 1; $i < $max; $i++): ?>
                                                                                                                        <div class="<?= $point[$i]['name'] ?> adress-point" style="display:none">
                                                                                                                            <div class="adress_delivery"><?= $point[$i]['adress'] ?></div>
                                                                                                                            <div class="telephone_delivery"><?= $point[$i]['telephone'] ?></div>
                                                                                                                            <div class="time_delivery"><?= $point[$i]['time_work'] ?></div>
                                                                                                                        </div>
                                                                                                                    <?php endfor; ?>
                                                                                                                <?php endif; ?>
                                                                                                        </fieldset>
                                                                                                </div>

                                                                                        </div>
                                                                                    <!--
                                                                                        <div class="row">
                                                                                                <div class="col-xs-12">
                                                                                                        <div class="checkbox">
                                                                                                                <label>
                                                                                                                        <input type="checkbox" name="newsletter" />
                                                                                                                         I wish to subscribe to the Malias1 newsletter.
                                                                                                                </label>
                                                                                                        </div>
                                                                                                        <div class="checkbox">
                                                                                                                <label>
                                                                                                                        <input type="checkbox" name="shipping_address" checked/>
                                                                                                                         My delivery and billing addresses are the same.
                                                                                                                </label>
                                                                                                        </div>
                                                                                                        <div class="buttons clearfix">
                                                                                                                <div class="pull-right">
                                                                                                                        I have read and agree to the 
                                                                                                                        <a href="#"><b>Privacy Policy</b></a>
                                                                                                                        <input type="checkbox" name="agree" />
                                                                                                                        <input type="button" class="btn btn-primary" value="Continue" />
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                    -->
                                                                                        <div class="form-group">
                                                                                            <?= Html::submitButton('Купить',['class'=>'btn btn-success']) ?>
                                                                                        </div>
                                                                                    <?php ActiveForm::end() ?>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                </div>
                                                                <?php else: ?>
                                                                Не выбран товар для заказа
                                                                <?php endif; ?>
                                                                <!-- End Payment-Address -->
                                                                <!-- Start 3 shipping-Address -->
                                                                <!--
                                                                <div class="panel panel_default">
                                                                        <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                        <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping-address">Step 3: Delivery Details <i class="fa fa-caret-down"></i> </a>
                                                                                </h4>
                                                                        </div>
                                                                        <div id="shipping-address" class="collapse">
                                                                                <div class="panel-body">
                                                                                        <div class="form-horizontal">
                                                                                                <div class="form-group">
                                                                                                        <label class="col-sm-2 control-label"><sup>*</sup>First Name</label>
                                                                                                        <div class="col-sm-10">
                                                                                                                <input type="text" class="form-control" placeholder="First Name" name="firstname" />
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                        <label class="col-sm-2 control-label"><sup>*</sup>Last Name</label>
                                                                                                        <div class="col-sm-10">
                                                                                                                <input type="text" class="form-control" placeholder="Last Name" name="lastname" />
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                        <label class="col-sm-2 control-label">Company</label>
                                                                                                        <div class="col-sm-10">
                                                                                                                <input type="text" class="form-control" placeholder="Company" name="company" />
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                        <label class="col-sm-2 control-label"><sup>*</sup>Address 1</label>
                                                                                                        <div class="col-sm-10">
                                                                                                                <input type="text" class="form-control" placeholder="Address 1" name="address_1" />
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                        <label class="col-sm-2 control-label">Address 2</label>
                                                                                                        <div class="col-sm-10">
                                                                                                                <input type="text" class="form-control" placeholder="Address 2" name="address_2" />
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                        <label class="col-sm-2 control-label"><sup>*</sup>City</label>
                                                                                                        <div class="col-sm-10">
                                                                                                                <input type="text" class="form-control" placeholder="City" name="city" />
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                        <label class="col-sm-2 control-label"><sup>*</sup>Post Code</label>
                                                                                                        <div class="col-sm-10">
                                                                                                                <input type="text" class="form-control" placeholder="Post Code" name="postcode" />
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                        <label class="col-sm-2 control-label"><sup>*</sup>Country</label>
                                                                                                        <div class="col-sm-10">
                                                                                                                <select class="form-control">
                                                                                                                        <option> --- Please Select --- </option>
                                                                                                                        <option> Bangladesh </option>
                                                                                                                        <option> United States </option>
                                                                                                                        <option> United Kingdom </option>
                                                                                                                        <option> Canada </option>
                                                                                                                        <option> Malaysia </option>
                                                                                                                        <option> United Arab Emirates </option>
                                                                                                                </select>
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                        <label class="col-sm-2 control-label"><sup>*</sup>Region / State</label>
                                                                                                        <div class="col-sm-10">
                                                                                                                <select class="form-control">
                                                                                                                        <option> --- Please Select --- </option>
                                                                                                                        <option> Dhaka </option>
                                                                                                                        <option> New York </option>
                                                                                                                        <option> London </option>
                                                                                                                        <option> Canada </option>
                                                                                                                        <option> Malaysia </option>
                                                                                                                        <option> United Arab Emirates </option>
                                                                                                                </select>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                -->
                                                                <!-- End shipping-Address -->
                                                                <!-- Start 4 shipping-Method -->
                                                                <!--
                                                                <div class="panel panel_default">
                                                                        <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                        <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping-method">Step 4: Delivery Method <i class="fa fa-caret-down"></i> </a>
                                                                                </h4>
                                                                        </div>
                                                                        <div id="shipping-method" class="collapse">
                                                                                <div class="panel-body">
                                                                                        <p>Please select the preferred shipping method to use on this order.</p>
                                                                                        <p><strong>Flat Rate</strong></p>
                                                                                        <div class="radio">
                                                                                                <label>
                                                                                                        <input type="radio" name="shipping_method" checked/>
                                                                                                        Flat Shipping Rate - $5.00
                                                                                                </label>
                                                                                        </div>
                                                                                        <p><strong>Add Comments About Your Order</strong></p>
                                                                                        <p>
                                                                                                <textarea class="form-control" name="comment" rows="8"></textarea>
                                                                                        </p>
                                                                                        <div class="buttons pull-right">
                                                                                                <input type="button" class="btn btn-primary" value="Continue" />
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                -->
                                                                <!-- End shipping-Method -->
                                                                <!-- Start 5 Payment-Method -->
                                                                <!--
                                                                <div class="panel panel_default">
                                                                        <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                        <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#payment-method">Step 5: Payment Method  <i class="fa fa-caret-down"></i> </a>
                                                                                </h4>
                                                                        </div>
                                                                        <div id="payment-method" class="collapse">
                                                                                <div class="panel-body">
                                                                                        <p>Please select the preferred payment method to use on this order.</p>
                                                                                        <div class="radio">
                                                                                                <label>
                                                                                                        <input type="radio" name="payment_method" checked/>
                                                                                                        Cash On Delivery      
                                                                                                </label>
                                                                                        </div>
                                                                                        <p><strong>Add Comments About Your Order</strong></p>
                                                                                        <p>
                                                                                                <textarea class="form-control" name="comment" rows="8"></textarea>
                                                                                        </p>
                                                                                        <div class="buttons pull-right">
                                                                                                I have read and agree to the 
                                                                                                <a href="#"><b>Terms & Conditions</b></a>
                                                                                                <input type="checkbox" name="agree" />
                                                                                                <input type="button" class="btn btn-primary" value="Continue" />
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                -->
                                                                <!-- End Payment-Method -->
                                                                <!-- Start 6 Checkout-Confirm -->
                                                                <!--
                                                                <div class="panel panel_default">
                                                                        <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                        <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#checkout-confirm">Step 6: Confirm Order <i class="fa fa-caret-down"></i> </a>
                                                                                </h4>
                                                                        </div>
                                                                        <div id="checkout-confirm" class="collapse">
                                                                                <div class="panel-body">
                                                                                        <div class="table-responsive">
                                                                                                <table class="table table-bordered table-hover">
                                                                                                        <thead>
                                                                                                                <tr>
                                                                                                                        <td class="text-left">Product Name</td>
                                                                                                                        <td class="text-left">Model</td>
                                                                                                                        <td class="text-left">Quantity</td>
                                                                                                                        <td class="text-left">Unit Price</td>
                                                                                                                        <td class="text-left">Total</td>
                                                                                                                </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                                <tr>
                                                                                                                        <td class="text-left">
                                                                                                                                <a href="#">More-Or-Less</a>
                                                                                                                        </td>
                                                                                                                        <td class="text-left">Product 14</td>
                                                                                                                        <td class="text-left">2</td>
                                                                                                                        <td class="text-left">$100.00</td>
                                                                                                                        <td class="text-left">$200.00</td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                        <td class="text-left">
                                                                                                                                <a href="#">Aliquam Consequat</a>
                                                                                                                        </td>
                                                                                                                        <td class="text-left">Product 21</td>
                                                                                                                        <td class="text-left">2</td>
                                                                                                                        <td class="text-left">$45.00</td>
                                                                                                                        <td class="text-left">$90.00</td>
                                                                                                                </tr>
                                                                                                        </tbody>
                                                                                                        <tfoot>
                                                                                                                <tr>
                                                                                                                        <td class="text-right" colspan="4">
                                                                                                                                <strong>Sub-Total:</strong>
                                                                                                                        </td>
                                                                                                                        <td class="text-right">$290.00</td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                        <td class="text-right" colspan="4">
                                                                                                                                <strong>Flat Shipping Rate:</strong>
                                                                                                                        </td>
                                                                                                                        <td class="text-right">$5.00</td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                        <td class="text-right" colspan="4">
                                                                                                                                <strong>Flat Shipping Rate:</strong>
                                                                                                                        </td>
                                                                                                                        <td class="text-right">$5.00</td>
                                                                                                                </tr>
                                                                                                        </tfoot>
                                                                                                </table>
                                                                                        </div>
                                                                                        <div class="buttons pull-right">
                                                                                                <input type="button" class="btn btn-primary" value="Confirm Order" />
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                -->
                                                                <!-- End Checkout-Confirm -->
                                                        </div>
                                                        <!-- Accordion end -->
                                                </div>
                                        </div>
                                </div>
                                <!-- End Shopping-Cart -->
                        </div>
                </div>
            </div>
                
        </section>
        <!-- END PAGE-CONTENT -->
        <!-- FOOTER-AREA START -->
        
        <!-- FOOTER-AREA END -->
        
        <!-- jquery
		============================================ -->		
        <script src="/js/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->
               <!-- ============================================ -->		
        <script src="/js/dop_function_product.js"></script>
		<!-- bootstrap JS
		============================================ -->
                
                
        <script src="/js/bootstrap.min.js"></script>
		<!-- wow JS
		============================================ -->		
        <script src="/js/wow.min.js"></script>
		<!-- meanmenu JS
		============================================ -->		
        <script src="/js/jquery.meanmenu.js"></script>
		<!-- owl.carousel JS
		============================================ -->		
        <script src="/js/owl.carousel.min.js"></script>
		<!-- scrollUp JS
		============================================ -->		
        <!--<script src="/js/jquery.scrollUp.min.js"></script>-->
        <!-- countdon.min JS
		============================================ -->		
        <script src="/js/countdon.min.js"></script>
        <!-- jquery-price-slider js
		============================================ --> 
        <script src="/js/jquery-price-slider.js"></script>
        <!-- Nivo slider js
		============================================ --> 		
	<script src="/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="/js/plugins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="/js/main.js"></script>
        
        <script src="/js/select2.js"></script>
        
        <script src="/js/jquery-ui1113.min.js"></script>
        
        <script src="/js/slide_price.js"></script>
        
        <script src="/js/my_cart.js"></script>
        
        <script src="/js/dop_check.js"></script>
                <!--
                ============================================ -->		
        
        
    </body>
</html>



