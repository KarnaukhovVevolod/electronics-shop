<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<!doctype html>
<html class="no-js" lang="">
<script>/*
   function get_price(x){
       //x.closest("td").next().find('.display_price').
       //        css('display','block');
       //x.css({'color':'yellow'});
       //alert('ok');
       //alert($(this).closest("td"));
       var t = x;
       var p = t.closest('td').next();
       console.log(t.closest('td'));
       console.log(p);
   }      */                                                                       
</script>
<body>
    <?php $this->title = $product[0]['model_product'] ?>
    
        <?php if(isset($category)):
        if($category != null): ?>
<?php switch($count_data_category):  ?>
<?php case 3: ?>
        <?php $this->params['crumbs'][] = [
            'label' => 'Категория: '.$category->category,
            'url' => $category->link_category,
            ];
            
            $this->params['crumbs'][] = [
            'label' => 'Подкатегория: '.$category->subcategory,
            'url' => $category->link_subcategory,
            ];
            $this->params['crumbs'][] = [
                'label' => 'Тип подкатегории: '.$category->type_of_subcategory,
                'url' => $category->link_type_subcategory,
            ];
            $this->params['crumbs'][] = [
                'label' => 'Товар: '.$product[0]['model_product']
            ];
        ?>
<?php break; ?>

<?php case 4: ?>
        <?php $this->params['crumbs'][] = [
            'label' => 'Категория: '.$category->category,
            'url' => $category->link_category,
            ];
            
            $this->params['crumbs'][] = [
            'label' => 'Подкатегория: '.$category->subcategory,
            'url' => $category->link_subcategory,
            ];
            $this->params['crumbs'][] = [
                'label' => 'Тип подкатегории: '.$category->type_of_subcategory,
                'url' => $category->link_type_subcategory,
            ];
            $this->params['crumbs'][] = [
                'label' => 'Товар: '.$product[0]['model_product']
            ];
        ?>
<?php break; ?>
<?php endswitch; ?>        
            <?php //$this->params['crumbs'][] = 'Раздел'; ?>
        <?php endif; endif; ?>

        <!-- Add your site or application content here -->

		
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
                                                                                                    <img class="primary-img" src="<?= '/'.$product_best['path'] ?>" alt="<?= $product_best['model_product'] ?>">
                                                                                            </a>
                                                                                    </div>
                                                                                    <div class="product-description">
                                                                                            <h5><a href="<?= $product_best['link_description'] ?>"><?= $product_best['model_product'] ?></a></h5>
                                                                                            <div class="price-box">
                                                                                                <span itemprop="priceCurrency" content="RUB"></span>
                                                                                                <span itemprop="price" class="price"><?= $product_best['price'] ?></span>
                                                                                                    <span class="old-price"><?= $product_best['old_price'] ?></span>
                                                                                            </div>
                                                                                            <span class="rating">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star-o"></i>
                                                                                            </span>
                                                                                            <span itemprop="ratingValue">4</span> из
                                                                                            <span itemprop="bestRating">5</span>
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
						<!-- START SIDEBAR-BANNER -->
	                    <div class="sidebar-banner hidden-sm hidden-xs">
	                    	<div class="active-sidebar-banner">
                                    <?php if($banner != null): ?>
                                    <?php if($banner[0]['show_banner'] == 1 ): ?>
                                        <?php if($banner[0]['path_1'] != null): ?>
                                            <div class="single-sidebar-banner">
                                                    <a href="<?= $banner[0]['link_description'] ?>"><img src="<?= '/'.$banner[0]['path_1'] ?>" alt="Product Banner"></a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($banner[0]['path_2'] != null): ?>
                                            <div class="single-sidebar-banner">
                                                    <a href="<?= $banner[0]['link_description'] ?>"><img src="<?= '/'.$banner[0]['path_2'] ?>" alt="Product Banner"></a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($banner[0]['path_3'] != null): ?>
                                            <div class="single-sidebar-banner">
                                                    <a href="<?= $banner[0]['link_description'] ?>"><img src="<?='/'.$banner[0]['path_3'] ?>" alt="Product Banner"></a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($banner[0]['path_4'] != null): ?>
                                            <div class="single-sidebar-banner">
                                                    <a href="<?= $banner[0]['link_description'] ?>"><img src="<?= '/'.$banner[0]['path_4'] ?>" alt="Product Banner"></a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
	                    	</div>
	                    </div>
	                    <!-- END SIDEBAR-BANNER -->
					</div>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<!-- Start Toch-Prond-Area -->
                                                <div class="toch-prond-area" itemscope itemtype="http://schema.org/Product">
							<div class="row">
								<div class="col-md-5 col-sm-5 col-xs-12">
									<div class="clear"></div>
									<div class="tab-content">
                                                                            <?php $i = 1; $data_img = []; foreach($product[0] as $product_element ): ?>
                                                                                <?php if($product_element != null): ?>
                                                                                <?php $key = array_search($product_element, $product[0]);
                                                                                $key_element = explode("_", $key); 
                                                                                        //echo $key_element."<br>";
                                                                                        ?>
                                                                                <?php if($key_element[0] == 'path'): ?>
                                                                                    <?php $data_img[$i] = $product_element ;  ?>
                                                                                    <?php if ($i == 1): ?>
                                                                                        <!-- Product = display-1-1 -->
                                                                                        <div role="tabpanel" class="tab-pane fade in active" id="display-1">
                                                                                                <div class="row">
                                                                                                        <div class="col-xs-12">
                                                                                                                <div class="toch-photo">
                                                                                                                        <a href="#"><img src="<?= '/'.$product_element ?>" data-imagezoom="true" alt="#" /></a>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <!-- End Product = display-1-1 -->
                                                                                    <?php else: ?>
                                                                                        <!-- Start Product = display-1-2 -->
                                                                                        <div role="tabpanel" class="tab-pane fade" id="display-<?= $i ?>">
                                                                                                <div class="row">
                                                                                                        <div class="col-xs-12">
                                                                                                                <div class="toch-photo">
                                                                                                                        <a href="#"><img src="<?= '/'.$product_element ?>" data-imagezoom="true" alt="#" /></a>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div> 
                                                                                        <!-- End Product = display-1-2 -->
                                                                                    <?php endif; ?>
                                                                                    <?php $i++; ?>
                                                                                <?php endif; ?>
                                                                                        
                                                                                        <?php endif; ?>
                                                                            <?php  endforeach; ?>
                                                                                        
										<?php //die() ?>
									</div>
									<!-- Start Toch-prond-Menu -->
									<div class="toch-prond-menu">
										<ul role="tablist">
                                                                                    <?php $j = 1; foreach($data_img as $img): ?>
                                                                                        <?php if($j==1): ?>
                                                                                            <li role="presentation" class=" active"><a href="#display-1" role="tab" data-toggle="tab"><img src="<?= '/'.$img ?>" alt="#" /></a></li>
											<?php else: ?>
                                                                                            <li role="presentation"><a href="#display-<?= $j ?>" role="tab" data-toggle="tab"><img src="<?= '/'.$img ?>" alt="#" /></a></li>
											<?php endif; ?>
                                                                                        <?php $j++; ?>
                                                                                        <!--
                                                                                        <li role="presentation"><a href="#display-3"  role="tab" data-toggle="tab"><img src="img/toch/3.jpg" alt="#" /></a></li>
											<li role="presentation"><a href="#display-4"  role="tab" data-toggle="tab"><img src="img/toch/4.jpg" alt="#" /></a></li>
                                                                                        <li role="presentation"><a href="#display-5"  role="tab" data-toggle="tab"><img src="img/toch/4.jpg" alt="#" /></a></li>
                                                                                        <li role="presentation"><a href="#display-6"  role="tab" data-toggle="tab"><img src="img/toch/4.jpg" alt="#" /></a></li>
                                                                                        -->
                                                                                        <?php endforeach; ?>
										</ul>
									</div>
									<!-- End Toch-prond-Menu -->
								</div>
								<div class="col-md-7 col-sm-7 col-xs-12">
									<h2 class="title-product"><?= $product[0]['model_product'] ?></h2>
                                                                        <div style="display:none" class="link_description_product"><?= $product[0]['link_description'] ?></div>
									<div class="about-toch-prond">
										<p>
											<span class="rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span>
                                                                                    
                                                                                    <span itemprop="ratingValue">4</span> из
                                                                                            <span itemprop="bestRating">5</span>
                                                                                    
                                                                                    <span ></span>
                                                                                    <?php $count = count($product[0]['comment']); ?>
											<a href="#revie">Отзывы: <?= $count ?></a>
											/
											<a href="#revie">Читать отзывы</a>
										</p>
										<hr />
										<p class="short-description">
                                                                                    <?php 
                                                                                         $description = mb_substr($product[0]['description'],0,600, 'UTF-8').'...';
                                                                                         echo $description ;
                                                                                ?> </p>
										<hr />
                                                                                <span itemprop="priceCurrency" content="RUB"></span>
                                                                                <span itemprop="price" class="current-price"><?= $product[0]['price'] ?></span>
                                                                                <span class="price-old" style="display:none"><?= $product[0]['old_price'] ?></span>
										<span class="item-stock">Доступно: <span class="text-stock">В Москве</span> 
                                                                                </span>
                                                                                <br>
                                                                                <span class="item-stock1">В наличии: <span itemprop="sku"><?= $product[0]['number_of_products'] ?></span>
                                                                                </span>
									</div>
									<div class="about-product">
                                                                        
                                                                            <?php if(array_key_exists('filter', $product)): ?>
                                                                            <table>
                                                                                <?php foreach($product['filter'] as $filt): ?>
                                                                                    <?php $key = array_search($filt, $product['filter']) ?>
                                                                            
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="parametr-model">
                                                                                                <?php echo $key; ?>
                                                                                            </div>
                                                                                        </td>
                                                                                
                                                                                        <?php foreach($filt as $parametr): ?>
                                                                                            <td>
                                                                                                <div class="link">
                                                                                                    <a href="<?= $parametr['link'] ?>"><?= $parametr['result'] ?></a>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="display_price"> Цена: <?= $parametr['price'] ?></div>
                                                                                            </td>

                                                                                        <?php endforeach; ?>
                                                                                    </tr> 
                                                                                    <tr>    
                                                                                        <td>
                                                                                            <div class="disp_low"> </div>
                                                                                        </td>        
                                                                                                <!--<br>-->
                                                                                    </tr>            
                                                                                <?php endforeach; ?>
                                                                            </table>
                                                                            <?php endif; ?>
									</div>
									<div class="product-quantity">
										<span>Кол-во</span>
                                                                                <input class="quantity-product" type="number" value="1" min="1" max="<?= $product[0]['number_of_products'] ?>"/>
                                                                                <a href="#"><button type="submit" class="toch-button toch-add-cart tochaddcart">Добавить в корзину</button></a>
                                                                                <a href="#"><button type="submit" class="toch-button toch-wishlist tochwishlist">Понравилось</button></a>
                                                                                <a href="#"><button type="submit" class="toch-button toch-compare tochcompare">Сравнить</button></a>
										<hr />
										<!--<a href="#"><img src="img/icon/social.png" alt="#" /></a>-->
									</div>
								</div>
							</div>
							<!-- Start Toch-Box -->
							<div class="toch-box">
								<div class="row">
									<div class="col-xs-12">
										<!-- Start Toch-Menu -->
										<div class="toch-menu">
											<ul role="tablist">
												<li role="presentation" class=" active"><a href="#description" role="tab" data-toggle="tab">Описание</a></li>
												<li role="presentation"><a name="revie" href="#reviews" role="tab" data-toggle="tab">Отзывы (<?= $count ?>)</a></li>
											</ul>
										</div>
										<!-- End Toch-Menu -->
										<div class="tab-content toch-description-review">
											<!-- Start display-description -->
											<div role="tabpanel" class="tab-pane fade in active" id="description">
												<div class="row">
													<div class="col-xs-12">
														<div itemprop="description" class="toch-description">
                                                                                                                    <p>
                                                                                                                        <?= $product[0]['description'] ?>
Б                                                                                                                   </p>
														</div>
													</div>
												</div>
											</div>
											<!-- End display-description -->
											<!-- Start display-reviews -->
											<div role="tabpanel" class="tab-pane fade" id="reviews">
												<div class="row">
													<div class="col-xs-12">
														<div class="toch-reviews">
															<div class="toch-table">
																<table class="table table-striped table-bordered">
                                                                                                                                   
                                                                                                                                    <tbody itemprop="review" itemscope itemtype="htt://schema.org/Review" class="insert_message"> 
                                                                                                                                        <?php foreach($product[0]['comment'] as $comment_on): ?>
                                                                                                                                    
                                                                                                                                            <tr>
                                                                                                                                                <td><strong itemprop="author"><?= $comment_on['name'] ?></strong></td>
                                                                                                                                                <td class="text-right"><strong><?= $comment_on['date'] ?></strong></td>
                                                                                                                                                <meta itemprop="datePublished" content="<?= $comment_on['date'] ?>">
                                                                                                                                            </tr>
                                                                                                                                            <tr>
                                                                                                                                                <td colspan="2" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"><!-- оценка рейтинга -->
                                                                                                                                                    
                                                                                                                                                    <p itemprop="description"> <?= $comment_on['text'] ?> </p>
                                                                                                                                                    <?php for($i = 1; $i < 6; $i++): ?>
                                                                                                                                                        <?php if($i <= $comment_on['star']): ?>
                                                                                                                                                            <span><i class="fa fa-star"></i></span>
                                                                                                                                                        <?php else: ?>
                                                                                                                                                            <span><i class="fa fa-star-o"></i></span>
                                                                                                                                                        <?php endif; ?>
                                                                                                                                                    <?php endfor; ?>
                                                                                                                                                    <meta itemprop="worstRating" content="1">
                                                                                                                                                    <span><?= $comment_on['star'] ?></span> из
                                                                                                                                                    <span>5</span>
                                                                                                                                                </td>
                                                                                                                                            </tr>
                                                                                                                                    
                                                                                                                                        <?php endforeach; ?>
																    </tbody>
																</table>
															</div>
                                                                                                                    <?php if(Yii::$app->user->isGuest == false): ?>
															<div class="toch-review-title">
																<h4>Написать отзыв</h4>
															</div>
															<div class="review-message">
                                                                                                                            
                                                                                                                            <?php $form = ActiveForm::begin() ?>
																<div class="col-xs-12">
                                                                                                                                    <!--
																	<p><sup>*</sup> Имя и Фамилия <br>
																		<input type="text" class="form-control" />
																	</p> -->
                                                                                                                                        <?= $form->field($comment, 'name')->textInput(['maxlength'=>true]) ?>
																	<!--<p><sup>*</sup>Отзыв<br>
																		<textarea class="form-control"></textarea>
																	</p>-->
                                                                                                                                        <?= $form->field($comment, 'text')->textarea(['rows'=>4]) ?>
																</div>
																<div class="help-block">
																	<span class="note">Примечание:</span>
																	 Оцените продукцию
																</div>
                                                                                                                                <?= $form->field($comment, 'star')->radioList(['1'=>'','2'=>'','3'=>'','4'=>'','5'=>''],['class'=> 'm_rad'])  ?>
                                                                                                                                <?php $date = date("Y-m-d", time()) ?>
                                                                                                                                <div style="display:none">
                                                                                                                                    <?= $form->field($comment, 'date')->textInput(['value' => $date]) ?>
                                                                                                                                    <?= $form->field($comment, 'id_product')->textInput(['value' => $product[0]['id']]) ?>
                                                                                                                                    <?= $form->field($comment, 'category')->textInput(['value' => $product[0]['category_english']]) ?>
                                                                                                                                </div>
                                                                                                                                <div class="buttons clearfix comment_button ">
																	<!--<button class="btn btn-primary pull-right">Отправить</button>-->
                                                                                                                                        <?= Html::submitButton('Отправить',['class' => 'btn btn-success']) ?>
                                                                                                                                        <!--Отправить-->
																</div>
                                                                                                                            <?php ActiveForm::end() ?>
                                                                                                                            
															</div>
                                                                                                                    <?php else: ?>
                                                                                                                        Отзывы могут оставлять только зарегистрированные пользователи
                                                                                                                    <?php endif; ?>
                                                                                                                    
														</div>
													</div>
												</div>
											</div>
											<!-- End Product = display-reviews -->
										</div>
									</div>
								</div>
							</div>
							<!-- End Toch-Box -->
							<!-- START PRODUCT-AREA -->
							<div class="product-area">
								<div class="row">
									<div class="col-xs-12 col-md-12">
										<!-- Start Product-Menu -->
										<div class="product-menu">
											<div class="product-title">
												<h3 class="title-group-2 gfont-1">А также покупают</h3>
											</div>
										</div>
									</div>
								</div>
								<!-- End Product-Menu -->
								<div class="clear"></div>
								<!-- Start Product -->
								<div class="product carosel-navigation">
									<div class="row">
										<div class="active-product-carosel">
                                                                                    <?php foreach($product[0]['dop'] as $dop_product):  ?>
											<!-- Start Single-Product -->
											<div class="col-xs-12">
												<div class="single-product">
													<div class="product-img">
														<a href="<?= $dop_product['link_description'] ?>">
															<img class="primary-img primary-img-details" src="<?= '/'.$dop_product['path'] ?>" alt="Product">
														</a>
													</div>
													<div class="product-description">
														<h5><a href="<?= $dop_product['link_description'] ?>"><?= $dop_product['model_product'] ?></a></h5>
														<div class="price-box price-details">
															<span class="price"><?= $dop_product['price'] ?></span>
														</div>
													</div>											
												</div>
											</div>
											<!-- End Single-Product -->
                                                                                    <?php endforeach; ?>    
											
										</div>
									</div>

								</div>
								<!-- End Product -->
							</div>
							<!-- END PRODUCT-AREA -->
						</div>
						<!-- End Toch-Prond-Area -->
					</div>
				</div>
			</div>
			<!-- START BRAND-LOGO-AREA -->
			
			<!-- END BRAND-LOGO-AREA -->
			<!-- START SUBSCRIBE-AREA -->
			
			<!-- END SUBSCRIBE-AREA -->
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
        <!-- Image zoom js
		============================================ --> 		
      		<script src="/js/imagezoom.js"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="/js/plugins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="/js/main.js"></script> 
        
        <script src="/js/jquery-ui1113.min.js"></script>
        
        <script src="/js/slide_price.js"></script>
        
        <script src="/js/my_cart.js"></script>
        
        <script src="/js/dop_check.js"></script>
                <!--
                ============================================ -->		
        
        
        <script>
   /*function get_price(x){
       //x.closest("td").next().find('.display_price').
       //        css('display','block');
       //x.css({'color':'yellow'});
       //alert('ok');
       //alert($(this).closest("td"));
       var t = x;
       var p = t.closest('td').next();
       console.log(t.closest('td'));
       console.log(p);
   }       */                                                                   
</script>
    </body>
</html>
