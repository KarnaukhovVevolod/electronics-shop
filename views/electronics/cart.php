<?php 
use yii\helpers\Url;
 
?>

<!doctype html>
<html class="no-js" lang="">
    
    <body>

        <!-- Add your site or application content here -->

		<?php $this->params['crumbs'][] = 'Корзина' ?>
		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<!-- CATEGORY-MENU-LIST START -->
                                                <?= app\widgets\category\CategoryWidget::widget(); ?>
						<!-- END CATEGORY-MENU-LIST -->
						<!-- START SMALL-PRODUCT-AREA -->
						<div class="small-product-area carosel-navigation  hidden-sm hidden-xs">
							<div class="row">
								<div class="col-md-12">
									<div class="area-title">
										<h3 class="title-group gfont-1">Бестселлер</h3>
									</div>
								</div>
							</div>
							<div class="row">
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
						<!-- Start Shopping-Cart -->
						<div class="shopping-cart">
							<div class="row">
								<div class="col-md-12">
									<div class="cart-title">
										<h2 class="entry-title">Корзина</h2>
									</div>
									<!-- Start Table -->
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
													<td class="text-center">Фото</td>
													<td class="text-left">Название продукта</td>
													<!--<td class="text-left">Model</td>-->
													<td class="text-left">Количество</td>
                                                                                                        <td class="text-left">Макс. кол-во</td>
													<td class="text-right">Цена продукта</td>
													<td class="text-right">Общая цена</td>
												</tr>
											</thead>
											<tbody>
                                                                                            <?php if($product!= null): ?>
                                                                                                <?php $count = count($product['data'])- 1; ?>
                                                                                            
                                                                                                <?php for($i = 1; $i < $count; $i++): ?>
												<tr>
													<td class="text-center">
                                                                                                            <a href="<?= $product['data'][$i][4] ?>"><img class="img-thumbnail" src="<?= $product['data'][$i][2] ?>" style="width:150px;height:150px;" alt="#" /></a>
													</td>
													<td class="text-left">
														<a href="<?= $product['data'][$i][4] ?>"><?= $product['data'][$i][0] ?></a>
													</td>
													<!--<td class="text-left">Product 14</td>-->
													<td class="text-left">
														<div class="btn-block cart-put">
															<input class="form-control" type="number" min="1" value="<?= (int) ($product['data'][$i][1]) ?>" max="<?= $product['data'][$i][5] ?>"/>
															<div class="input-group-btn cart-buttons">
																<button class="btn btn-primary refresh" data-toggle="tooltip" title="Изменить">
																	<i class="fa fa-refresh"></i>
																</button>
																<button class="btn btn-danger delete" data-toggle="tooltip" title="Удалить">
																	<i class="fa fa-times-circle"></i>
																</button>
															</div>
														</div>
													</td>
                                                                                                        <td class="text-left"><?= $product['data'][$i][5] ?></td>
													<td class="text-right"><?= $product['data'][$i][3] ?></td>
													<td class="text-right all-single-price"><?= $product['data'][$i][6] ?></td>
												</tr>
                                                                                                <?php endfor; ?>
                                                                                            <?php endif;?>
												
											</tbody>
										</table>
									</div>
									<!-- End Table -->
									
									<!-- Accordion start -->
									<div class="accordion-cart">
										<div class="panel-group" id="accordion">
											<!-- Start Coupon -->
                                                                                        <!--
											<div class="panel panel_default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#coupon">Use Coupon Code<i class="fa fa-caret-down"></i> </a>
													</h4>
												</div>
												<div id="coupon" class="collapse in">
													<div class="panel-body">
														<div class="col-sm-2">
															<p>Enter your coupon here</p>
														</div>
														<div class="input-group">
															<input class="form-control" type="text" placeholder="Enter your coupon here" />
															<button type="submit" class="btn btn-primary">Apply Coupon</button>
														</div>
													</div>
												</div>
											</div> -->
											<!-- End Coupon -->
											<!-- Start Voucher -->
											<!--<div class="panel panel_default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#voucher">Use Gift Voucher <i class="fa fa-caret-down"></i> </a>
													</h4>
												</div>
												<div id="voucher" class="collapse">
													<div class="panel-body">
														<div class="col-sm-2">
															<p>Enter your gift voucher code here</p>
														</div>
														<div class="input-group">
															<input class="form-control" type="text" placeholder="Enter your gift voucher code here" />
															<button type="submit" class="btn btn-primary">Apply Voucher</button>
														</div>
													</div>
												</div>
											</div> -->
											<!-- Start Voucher -->
											<!-- Start Shipping -->
                                                                                        <!--
											<div class="panel panel_default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping">Estimate Shipping & Taxes <i class="fa fa-caret-down"></i> </a>
													</h4>
												</div>
												<div id="shipping" class="collapse">
													<div class="panel-body">
														<div class="col-sm-12">
															<p>Enter your destination to get a shipping estimate.</p>
														</div>
														<div class="form-horizontal">
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
																		<option> Aberdeen </option>
																		<option> Bedfordshire </option>
																		<option> Caerphilly </option>
																		<option> Denbighshire </option>
																		<option> East Ayrshire </option>
																		<option> Falkirk </option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label"><sup>*</sup>Post Code</label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" placeholder="Post Code" />
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
                                                                                        -->
											<!-- Start Shipping -->
										</div>
									</div>
									<!-- Accordion end -->
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table table-bordered">
												<tbody>
													<tr>
														<td class="text-right">
															<strong>Общая сумма</strong>
														</td>
                                                                                                                <?php if($product!=null): ?>
                                                                                                                    <td class="text-right all_price"><?= end($product['data']) ?></td>
                                                                                                                <?php else: ?>
                                                                                                                    <td class="text-right all_price">0 руб</td>
                                                                                                                <?php endif; ?>
													</tr>
													<tr>
														<td class="text-right">
															<strong>Общая сумма: </strong>
														</td>
                                                                                                                <?php if($product!=null): ?>
                                                                                                                    <td class="text-right all_price"><?= end($product['data']) ?></td>
                                                                                                                 <?php else: ?>
                                                                                                                    <td class="text-right all_price">0 руб</td>
                                                                                                                <?php endif; ?>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="shopping-checkout">
                                                                            <?php $url = Url::to(['electronics/index']) ?>
										<a href="<?= $url ?>" class="btn btn-default pull-left">Продолжить покупку</a>
										<a href="<?= Url::to(['electronics/checkout']) ?>" class="btn btn-primary pull-right">Оформление заказа</a>
									</div>
								</div>
							</div>
						</div>
						<!-- End Shopping-Cart -->
					</div>
				</div>
			</div>
			
			<!-- START SUBSCRIBE-AREA -->
			
			<!-- END SUBSCRIBE-AREA -->
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
        <!--<script src="/electronics/web/js/jquery.scrollUp.min.js"></script>-->
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
