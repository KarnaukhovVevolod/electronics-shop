<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<body>

    <?php $this->params['crumbs'][] = 'Мой аккаунт' ?>

		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
	            
				<div class="row">
					<div class="col-md-3">
						<!-- CATEGORY-MENU-LIST START -->
                                            <?= app\widgets\category\CategoryWidget::widget(); ?>	
						<!-- END CATEGORY-MENU-LIST -->
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
						<!-- entry-header-area start -->
						<div class="entry-header-area">
							<div class="row">
								<div class="col-md-12">
									<div class="entry-header">
										<h2 class="entry-title">Мой аккаунт</h2>
									</div>
								</div>
							</div>
						</div>
						<!-- entry-header-area end -->
						<!-- Start checkout-area -->
						<div class="checkout-area">
							<div class="row">
								<div class="col-md-12">
									<!-- Accordion start -->
									<div class="panel-group" id="accordion">
										<!-- Start My-First-Address -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#payment-address">Мои адрес (заполнить) <i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="payment-address" class="collapse">
												<div class="panel-body">
                                                                                                    <?php $form_adress = ActiveForm::begin(); ?>
													<div class="row">
                                                                                                            <?php ?>
														<div class="col-md-6 col-xs-12">
                                                                                                                    
															<fieldset id="account">
																<legend>Персональные данные</legend>
                                                                                                                                <!--<div class="form-group">
                                                                                                                                    <label><sup>*</sup>Логин</label>-->
																	<!--<input type="text" class="form-control" placeholder="Salim" name="firstname" />-->
                                                                                                                                    <?php // $form_adress->field($user_adress_form,'login')->textInput(['maxlength' => true]) ?>
																<!--</div>-->
																<div class="form-group">
                                                                                                                                    
                                                                                                                                    <?php //$form_adress->field($user_adress_form, 'login')->textInput() ?>
                                                                                                                                    <?= $form_adress->field($user_adress_form, 'name')->textInput(['maxlength' => true,'placeholder'=>'например: Алена','value' => $user_data['name']]) ?>
																</div>
																<div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'surname')->textInput(['maxlength' => true,'placeholder'=>'например: Иванова','value' => $user_data['surname']]) ?>
																</div>
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'patronymic')->textInput(['maxlength' => true,'placeholder'=>'например: Егоровна','value' => $user_data['patronymic']]) ?>
																</div>
																<div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'email')->textInput(['maxlength' => true,'placeholder'=>'например: alenaegorovna@gmail.com','value' => $user_data['email']]) ?>
																</div>
																<div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'mobile')->textInput(['maxlength' => true,'placeholder'=>'например: +7(916)-345-21-78','value' => $user_data['mobile']]) ?>
																</div>
                                                                                                                                <!--
																<div class="form-group">
																	<label>Fax</label>
																	<input type="text" class="form-control" placeholder="Fax" name="fax" />
																</div>
                                                                                                                                -->
                                                                                                                                
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'company')->textInput(['maxlength' => true,'placeholder'=>'например: АО Аэрокс','value' => $user_data['company']]) ?>
																</div>
                                                                                                                                
															</fieldset>
															<fieldset>
																
                                                                                                                                <?= $form_adress->field($user_adress_form,'dop_info')->textarea(['rows'=> 6, 'value' => $user_data['dop_info']]) ?>
															</fieldset>
														</div>
														<div class="col-md-6 col-xs-12">
                                                                                                                    
															<fieldset id="address">
																<legend>Адрес</legend>
																
																<div class="form-group">
																	
																	<div class="row">
																		<div class="col-xs-4">
                                                                                                                                                    <?php if($user_data['date'] == null){$user_data['date'] = '2020-01-01';} $date = explode('-', $user_data['date']); ?>
                                                                                                                                                    <?php $items = ['01'=> 1,'02'=>2,'03'=>3,'04'=>4,'05'=>5,'06'=>6,'07'=>7,'08'=>8,
                                                                                                                                                        '09'=>9,'10'=>10,'11'=>11,'12'=>12,'13'=>14,'15'=>15,'16'=>16,
                                                                                                                                                        '17'=>17,'18'=>18,'19'=>19,'20'=>20,'21'=>21,'22'=>22,'23'=>23,'24'=>24,
                                                                                                                                                        '25'=>25,'26'=>26,'27'=>27,'28'=>28,'29'=>29,'30'=>30,'31'=>31] ?>
                                                                                                                                                    
                                                                                                                                                    <?php //debug($date); ?>
                                                                                                                                                    <?= $form_adress->field($user_adress_form,'day')->dropDownList($items,['options'=>[$date[2]=>['Selected'=>true]]]) ?>
                                                                                                                                                         
                                                                                                                                                    
																		</div>
																		<div class="col-xs-4">
																			
                                                                                                                                                    <?php $items_moonth = ['01'=>'Январь','02'=>'Февраль','03'=>'Март','04'=>'Апрель','05'=>'Май',
                                                                                                                                                        '06'=>'Июнь','07'=>'Июль','08'=>'Август','09'=>'Сентябрь','10'=>'Октябрь','11'=>'Ноябрь','12'=>'Декабрь'] ?>
                                                                                                                                                    <?= $form_adress->field($user_adress_form,'moonth')->dropDownList($items_moonth,['options'=>[$date[1]=>['Selected'=>true]]]) ?>
																		</div>
                                                                                                                                            
																		<div class="col-xs-4">
                                                                                                                                                    
                                                                                                                                                    <?php $yers =[];
                                                                                                                                                        for($i = 2020; $i > 1900; $i--)
                                                                                                                                                        {
                                                                                                                                                            $yers[$i] = $i;
                                                                                                                                                        }
                                                                                                                                                    ?>
                                                                                                                                                    <?= $form_adress->field($user_adress_form,'yers')->dropDownList($yers,['options'=>[$date[0]=>['Selected'=>true]]]) ?>
																		</div>
																	</div>          
																</div>	
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'country')->textInput(['maxlength' => true,'placeholder'=>'например: Россия','value' => $user_data['country']]) ?>  
																</div>
																<div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'city')->textInput(['maxlength' => true,'placeholder'=>'например: Санкт-Петербург','value' => $user_data['city']]) ?>
																</div>
																<div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'post_code')->textInput(['maxlength' => true,'placeholder'=>'например: 442240','value' => $user_data['post_code']]) ?>
																</div> 
                                                                                                                                
																<div class="form-group">
                                                                                                                                    
                                                                                                                                    <?= $form_adress->field($user_adress_form,'region')->textInput(['maxlength' => true,'placeholder'=>'например: Ленинградская область','value' => $user_data['region']]) ?>
																</div>
                                                                                                                                
                                                                                                                                <div class="form-group">
                                                                                                                                    
                                                                                                                                    <?= $form_adress->field($user_adress_form,'village_locality')->textInput(['maxlength' => true,'placeholder'=>'например: Выборгский район, поёлок Каменка','value' => $user_data['village_locality']]) ?>
																</div>
                                                                                                                                
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'street')->textInput(['maxlength' => true,'placeholder'=>'например: улица Ворошилова','value' => $user_data['street']]) ?>
																</div>
                                                                                                                                
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'room')->textInput(['maxlength' => true,'placeholder'=>'например: дом № = 30','value' => $user_data['room']]) ?>
																</div>
                                                                                                                                
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $form_adress->field($user_adress_form,'flat')->textInput(['maxlength' => true,'placeholder'=>'например: квартира 45','value' => $user_data['flat']]) ?>
																</div>
                                                                                                                                
                                                                                                                                <div class="form-group">
                                                                                                                                    <?= Html::submitButton('Отправить',['class'=>'btn btn-primary floatright']) ?>
                                                                                                                                </div>
															</fieldset>
														</div>
                                                                                                            <?php ?>
                                                                                                            
                                                                                                            <?php ?>
													</div>
                                                                                                    
                                                                                                    <?php ActiveForm::end() ?>
												</div>
											</div>
										</div>
										<!-- End My-First-Address -->
                                                                                <!-- Start My-Second-Address -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#payment-address1">Мой адрес<i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="payment-address1" class="collapse">
												<div class="panel-body">
                                                                                                    <?php //$form_adress = ActiveForm::begin(); ?>
													<div class="row">
														<div class="col-md-6 col-xs-12">
                                                                                                                    
															<fieldset id="account">
																<legend>Персональные данные</legend>
                                                                                                                                <!--<div class="form-group">
                                                                                                                                    <label><sup>*</sup>Логин</label>-->
																	<!--<input type="text" class="form-control" placeholder="Salim" name="firstname" />-->
                                                                                                                                    <?php //echo $user_data->name; // $form_adress->field($user_adress_form,'login')->textInput(['maxlength' => true]) ?>
																<!--</div>-->
																<div class="form-group">
                                                                                                                                    
                                                                                                                                    <?php echo $user_data['name']; // $form_adress->field($user_adress_form,'name')->textInput(['maxlength' => true]) ?>
																</div>
																<div class="form-group">
																	
                                                                                                                                    <?= $user_data['surname'] //$form_adress->field($user_adress_form,'surname')->textInput(['maxlength' => true]) ?>
																</div>
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $user_data['patronymic']  //$form_adress->field($user_adress_form,'patronymic')->textInput(['maxlength' => true]) ?>
																</div>
																<div class="form-group">
																	
                                                                                                                                    <?= $user_data['email'] ;//$form_adress->field($user_adress_form,'email')->textInput(['maxlength' => true]) ?>
																</div>
																<div class="form-group">
																	
                                                                                                                                    <?= $user_data['mobile'] ; //$form_adress->field($user_adress_form,'mobile')->textInput(['maxlength' => true]) ?>
																</div>
                                                                                                                                <!--
																<div class="form-group">
																	<label>Fax</label>
																	<input type="text" class="form-control" placeholder="Fax" name="fax" />
																</div>
                                                                                                                                -->
                                                                                                                                
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $user_data['company'] ;//$form_adress->field($user_adress_form,'company')->textInput(['maxlength' => true]) ?>
																</div>
                                                                                                                                
															</fieldset>
															<fieldset>
																
                                                                                                                                <?= $user_data['dop_info'] ; //$form_adress->field($user_adress_form,'dop_info')->textarea(['rows'=> 6]) ?>
															</fieldset>
														</div>
														<div class="col-md-6 col-xs-12">
                                                                                                                    
															<fieldset id="address">
																<legend>Адрес</legend>
																
																<div class="form-group">
																	
																	<div class="row">
																		<div class="col-xs-4">
                                                                                                                                                    
                                                                                                                                                    <?= $user_data['date']; ?>
                                                                                                                                                    
																		</div>
																		
																	</div>          
																</div>		
																<div class="form-group">
																	
                                                                                                                                    <?= $user_data['city']; //$form_adress->field($user_adress_form,'city')->textInput(['maxlength' => true]) ?>
																</div>
																<div class="form-group">
																	
                                                                                                                                    <?= $user_data['post_code']; //$form_adress->field($user_adress_form,'post_code')->textInput(['maxlength' => true]) ?>
																</div> 
                                                                                                                                
																<div class="form-group">
																	
                                                                                                                                    <?= $user_data['country']; //$form_adress->field($user_adress_form,'country')->textInput(['maxlength' => true]) ?>  
																</div>
                                                                                                                                
																<div class="form-group">
                                                                                                                                    
                                                                                                                                    <?= $user_data['region']; //$form_adress->field($user_adress_form,'region')->textInput(['maxlength' => true]) ?>
																</div>
                                                                                                                                <div class="form-group">
                                                                                                                                    
                                                                                                                                    <?= $user_data['village_locality']; //$form_adress->field($user_adress_form,'village_locality')->textInput(['maxlength' => true,'placeholder'=>'например: Выборгский район, поёлок Каменка','value' => $user_data->village_locality]) ?>
																</div>
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $user_data['street']; //$form_adress->field($user_adress_form,'street')->textInput(['maxlength' => true]) ?>
																</div>
                                                                                                                                
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $user_data['room']; //$form_adress->field($user_adress_form,'room')->textInput(['maxlength' => true,'placeholder'=>'например: дом № = 30','value' => $user_data->room]) ?>
																</div>
                                                                                                                                
                                                                                                                                <div class="form-group">
																	
                                                                                                                                    <?= $user_data['flat']; //$form_adress->field($user_adress_form,'flat')->textInput(['maxlength' => true,'placeholder'=>'например: квартира 45','value' => $user_data->flat]) ?>
																</div>
                                                                                                                                <!--
                                                                                                                                <div class="form-group">
                                                                                                                                    <?php //Html::submitButton('Отправить',['class'=>'btn btn-primary floatright']) ?>
                                                                                                                                </div>
                                                                                                                                -->
															</fieldset>
														</div>
													</div>
                                                                                                    
												</div>
											</div>
										</div>
										<!-- End My-Second-Address -->
										<!-- Start Order History And Details -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#checkout-confirm">История моих покупок <i class="fa fa-caret-down"></i> </a>
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
                                                                                                                                            <?= $one_product['quantity'].' x' ?>
                                                                                                                                            <!--
																		<div class="btn-block cart-put">
																			<input type="text" class="form-control" />
																			<div class="input-group-btn cart-buttons">
																				<button class="btn btn-primary" data-toggle="tooltip" title="Update">
																					<i class="fa fa-refresh"></i>
																				</button>
																				<button class="btn btn-danger" data-toggle="tooltip" title="Remove">
																					<i class="fa fa-times-circle"></i>
																				</button>
																			</div>
																		</div>
                                                                                                                                            -->
                                                                                                                                            
																	</td>
																	
																	<td class="text-right"><?= $one_product['total_price'] ?></td>
																</tr>
                                                                                                                                
                                                                                                                            <?php endforeach ?>
                                                                                                                                
                                                                                                                                <tr>
																	<td class="text-right" colspan="4">
																		<strong>Общая цена заказа:</strong>
																	</td>
																	<td class="text-right"><?= $one_order['total_price_all'] ?></td>
																</tr>
																<tr>
																	<td class="text-right" colspan="4">
																		<strong>Дата заказа:</strong>
																	</td>
																	<td class="text-right"><?= $one_order['date_order'] ?></td>
																</tr>
                                                                                                                                
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right" colspan="1">
                                                                                                                                        <span class="text-left">Статус заказа: 
                                                                                                                                            <?php switch($one_order['status_order']){
                                                                                                                                                case(1):
                                                                                                                                                    $status = 'Обработка заказа';
                                                                                                                                                    break;
                                                                                                                                                case(2):
                                                                                                                                                    $status = 'Подготовка заказа';
                                                                                                                                                    break;
                                                                                                                                                case(3):
                                                                                                                                                    $status = 'Отправка заказа';
                                                                                                                                                    break;
                                                                                                                                                case(4):
                                                                                                                                                    $status = 'Доставлен заказ в пункт выдачи';
                                                                                                                                                    break;
                                                                                                                                                case(5):
                                                                                                                                                    $status = 'Заказ завершён';
                                                                                                                                                    break;
                                                                                                                                                default:
                                                                                                                                                    $status = $one_order['status_order'];
                                                                                                                                                    break;
                                                                                                                                            } ?><?= $status ?>
                                                                                                                                            </span>   
                                                                                                                                    </td>
																	<td class="text-right" colspan="4">
                                                                                                                                            <strong>Номер заказа № = <?= $one_order['order_number'] ?></strong>
																	</td>
																</tr>
                                                                                                                                <tr>
																	<td class="text-right" colspan="5">
                                                                                                                                            <strong><br><br></strong>
                                                                                                                                            <div class="delivery-info">
                                                                                                                                                Информация о доставке
                                                                                                                                            </div>
                                                                                                                                            <div class="info-delivery" style="display:none">
                                                                                                                                            <?php if($one_order['type_delivery'] == 'Самовывоз'): ?>
                                                                                                                                                <div class="delive-block">
                                                                                                                                                    <span>Вид доставки:</span> <?= $one_order['type_delivery'] ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block">
                                                                                                                                                    <span>Пункт выдачи:</span> <a href="<?= Url::to(['/electronics/contact'])?>"> <?= $one_order['point_delivery'] ?></a>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block1"></div>
                                                                                                                                            <?php else: ?>
                                                                                                                                                <div class="delive-block">
                                                                                                                                                    <span>Вид доставки:</span> <?= $one_order['type_delivery'] ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block">
                                                                                                                                                    <span>E-mail для связи:</span> <?= $one_order['email'] ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block">
                                                                                                                                                    <span>Почтовый индекс (код):</span><?= $one_order['post_code'] ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block"> 
                                                                                                                                                    <span>Регион:</span> <?= $one_order['region'] ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block">    
                                                                                                                                                    <span>Город:</span> <?= $one_order['city'] ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block">    
                                                                                                                                                    <span>Населённый пункт/посёлок/деревня:</span>  <?= $one_order['village_locality'] ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block">       
                                                                                                                                                    <span>Улица:</span> <?= $one_order['street'] ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block">    
                                                                                                                                                    <span>Дом:</span> <?= $one_order['room'] ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block">    
                                                                                                                                                    <span>Квартира:</span> <?= $one_order['flat'] ?>
                                                                                                                                                </div>
                                                                                                                                                <div class="delive-block1"></div>    
                                                                                                                                            <?php endif; ?>
                                                                                                                                            </div>
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
										<!-- End Order History And Details -->
										<!-- Start My Address -->
                                                                                <!--
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping-address">My Address <i class="fa fa-caret-down"></i> </a>
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
										<!-- End My Address -->
										<!-- Start My Wish List -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#payment-method"> Список моих желаний <i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="payment-method" class="collapse">
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-bordered table-hover">
															<thead>
																<tr>
																	<td class="text-center">Фото</td>
																	<td class="text-left">Название</td>
																	<!--<td class="text-left">Model</td>
																	<td class="text-right">Stock</td>-->
																	<td class="text-right">Цена</td>
                                                                                                                                        <td class="text-right">В наличии</td>
																	<td class="text-right">Действия</td>
																</tr>
															</thead>
															<tbody>
                                                                                                                            <?php foreach ($product_wish_list as $wish): ?>
																<tr>
                                                                                                                                    
																	<td class="text-center">
                                                                                                                                            <a href="<?= $wish['link'] ?>"><img src="<?= $wish['path'] ?>" alt="#" style=" width: 100px; height: 100px;" /></a>
																	</td>
																	<td class="text-left">
																		<a href="<?= $wish['link'] ?>"><?= $wish['name_model'] ?></a>
																	</td>
                                                                                                                                        
																	<!--<td class="text-left">Product 9</td>
																	<td class="text-right">In Stock</td>-->
                                                                                                                                        
																	<td class="text-right">
																		<div class="price-box">
																			<span class="price"><?= $wish['price'] ?></span>
                                                                                                                                                        <span class="old-price"><?= $wish['price_old'] ?></span>
																		</div>
																	</td>
                                                                                                                                        <td class="text-right">
                                                                                                                                            <?= $wish['number_of_product'] ?>
                                                                                                                                        </td>
																	<td class="text-right">
                                                                                                                                            <?php $int_number_product = (int) $wish['number_of_product'];
                                                                                                                                                  if( $int_number_product > 0 ): ?>
																		<button class="btn btn-primary wish_copy" data-toggle="tooltip" title="Добавитьв корзину" type="button">
																			<i class="fa fa-shopping-cart"></i>
																		</button>
                                                                                                                                            <?php endif; ?>
																		<a href="#" class="btn btn-danger wish_delete_db" data-toggle="tooltip" title="Удалить">
																			<i class="fa fa-times"></i>
																		</a>
																	</td>
																</tr>
                                                                                                                            <?php endforeach; ?>    
                                                                                                                                
                                                                                                                                <!--
																<tr>
																	<td class="text-center">
																		<a href="#"><img src="img/product/cart/4.jpg" alt="#" /></a>
																	</td>
																	<td class="text-left">
																		<a href="#">Prod Aldults</a>
																	</td>
																	<td class="text-left">Product 9</td>
																	<td class="text-right">In Stock</td>
																	<td class="text-right">
																		<div class="price-box">
																			<span class="price">$45.00</span>
																			<span class="old-price">$100.00</span>
																		</div>
																	</td>
																	<td class="text-right">
																		<button class="btn btn-primary" data-toggle="tooltip" title="Add to Cart" type="button">
																			<i class="fa fa-shopping-cart"></i>
																		</button>
																		<a href="#" class="btn btn-danger" data-toggle="tooltip" title="Remove">
																			<i class="fa fa-times"></i>
																		</a>
																	</td>
																</tr>
                                                                                                                                -->
															</tbody>
														</table>
													</div>
                                                                                                    <!--
													<div class="buttons clearfix pull-right">
														<a href="#" class="btn btn-primary">Сохранить</a>
													</div>
                                                                                                    -->
												</div>
											</div>
										</div>
										<!-- End My Wish List -->
									</div>
									<!-- Accordion end -->
								</div>
							</div>
						</div>
						<!-- End Shopping-Cart -->

						<!-- My-Account-Area start -->
						<div class="my-account-area">
							<div class="row">
								<div class="col-md-6">

								</div>
							</div>
						</div>
						<!-- My-Account-Area end -->
					</div>
				</div>
			</div>
			
		</section>
		<!-- END PAGE-CONTENT -->
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
                <!--
        <script src="/electronics/web/js/jquery.scrollUp.min.js"></script>-->
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

