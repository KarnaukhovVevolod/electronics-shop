<?php 
use yii\helpers\Url;
?>

<!doctype html>
<html class="no-js" lang="">
    <body>
        <?php $this->params['crumbs'][] = 'Мой список избранных' ?>
        <!-- Add your site or application content here -->

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
									</link_descriptiondiv>
                                                                    <?php endforeach; ?>
								</div>
							</div>
						</div>
						<!-- END PRODUCT-BANNER -->	
						<div class="Wishlist-area">
							<h2>Мои желания</h2>
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<td class="text-center">Фото</td>
											<td class="text-left">Название товара</td>
											<!--<td class="text-left">Model</td>
											<td class="text-right">Stock</td>-->
											<td class="text-right">Цена</td>
                                                                                        
                                                                                        <td class="text-right">Макс. кол-во в наличии</td>
											<td class="text-right">Действие</td>
										</tr>
									</thead>
									<tbody>
                                                                            <?php if($wish != null): ?>
                                                                                <?php foreach($wish as $single_wish): ?>
										<tr>
											<td class="text-center">
												<a href="<?= $single_wish[1] ?>"><img src="<?= $single_wish[0] ?>" alt="#" style="width: 100px;height: auto;" /></a>
											</td>
											<td class="text-left">
												<a href="<?= $single_wish[1] ?>"><?= $single_wish[2] ?></a>
											</td>
											<!--<td class="text-left">Product 9</td>
											<td class="text-right">In Stock</td>-->
											<td class="text-right">
												<div class="price-box">
													<span class="price"><?= $single_wish[3] ?></span>
                                                                                                        <span class="old-price"><?= $single_wish[4] ?></span>
												</div>
											</td>
                                                                                        <td class="text-right">
                                                                                            <?php if(isset($single_wish[6])): ?>
                                                                                                <span><?= $single_wish[6] ?></span>
                                                                                            <?php else:  ?>
                                                                                                <span>Нет в наличии</span>
                                                                                               
                                                                                            <?php endif; ?>
                                                                                        </td>
											<td class="text-right">
                                                                                            <?php if(isset($single_wish[6])): ?>
                                                                                                <?php $intr = (int)$single_wish[6]; ?>
                                                                                                <?php if($intr > 0): ?>
                                                                                                    <button class="btn btn-primary wish_copy" data-toggle="tooltip" title="Добавить в корзину" type="button">
                                                                                                            <i class="fa fa-shopping-cart"></i>
                                                                                                    </button>
                                                                                                <?php endif ; ?>
                                                                                            <?php endif; ?>
                                                                                                <button class="btn btn-danger wish_delet" data-toggle="tooltip" title="Удалить">
													<i class="fa fa-times"></i>
												</button>
											</td>
										</tr>
                                                                            <?php endforeach; ?>  
                                                                            <?php else: ?> 
                                                                            <h3>Нет желаемых продуктов</h3>
                                                                            <?php endif; ?>
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
												<button class="btn btn-primary" data-toggle="tooltip" title="Добавить в корзину" type="button">
													<i class="fa fa-shopping-cart"></i>
												</button>
												<a href="#" class="btn btn-danger" data-toggle="tooltip" title="Удалить">
													<i class="fa fa-times"></i>
												</a>
											</td>
										</tr>
                                                                                -->
									</tbody>
								</table>
							</div>
							<div class="buttons clearfix pull-right">
                                                            <?php $url = Url::to(['electronics/index']) ?>
								<a href="<?= $url ?>" class="btn btn-primary">Продолжить покупку</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- START BRAND-LOGO-AREA -->
			
			<!-- END BRAND-LOGO-AREA -->
			<!-- START SUBSCRIBE-AREA -->
			
			<!-- END SUBSCRIBE-AREA -->
		</section>
		<!-- END PAGE-CONTENT -->
		
                <!-- jquery
		============================================ -->		
            <script src="/js/jquery-1.11.3.min.js"></script>
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
            
            <script src="/js/my_cart.js"></script>
        
            <script src="/js/dop_check.js"></script>
            <!--
            ============================================ -->		
        
	
    </body>
</html>
