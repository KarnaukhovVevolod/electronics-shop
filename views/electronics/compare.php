<?php 
use yii\helpers\Url;
?>


<!doctype html>
<html class="no-js" lang="">
    <body>
        <?php $this->params['crumbs'][] = 'Сравнение продуктов' ?>
        <!-- Add your site or application content here -->

		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
	            
                    <div class="row">
                        
                        <!-- CATEGORY-MENU-LIST START -->
	                     <!-- Меню слева -->
                        <div class="col-md-3">
                            <?= app\widgets\category\CategoryWidget::widget(); ?>
                        </div>
                    <!-- Меню слева конец -->	
						<!-- END CATEGORY-MENU-LIST -->
			
					<div class="col-md-9">
						<!-- START PRODUCT-BANNER -->
						
						<!-- END PRODUCT-BANNER -->	
						<div class="Wishlist-area">
							<h2>Сравнение</h2>
							<div class="table-responsive">
							
                                                            <?= app\widgets\compare\CompareWidget::widget() ?>

							</div>
							<div class="buttons clear_compare_all pull-right">
                                                            <?php //$url = Url::to(['electronics/index']) ?>
								<!--<a href="<?php //$url ?>" class="btn btn-primary">Очистить всё</a>-->
                                                            <div class="btn btn-primary">Очистить всё</div>
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
		<!--
        <script src="/js/jquery.scrollUp.min.js"></script>
        -->
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
