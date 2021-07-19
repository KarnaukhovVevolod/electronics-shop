<!doctype html>
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>

<?php 
    if(isset($seo_search['teg_title']))
    {
        //заполняем meta tag для SEO-поиска
        $this->title = $seo_search['teg_title'];
        $this->registerMetaTag(['name'=>'description','content'=>$seo_search['teg_description']]);
        $this->registerMetaTag(['name'=>'keywords','content'=>$seo_search['teg_keywords']]);
    }
?>
<html class="no-js" lang="">
   
    <body>

        <!-- Add your site or application content here -->

		<!-- HEADER-AREA START -->
		
		<!-- HEADER AREA END -->
		<!-- START PAGE-CONTENT -->
                <?php $this->params['crumbs'][] = 'Контакты' ?>
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
						<!-- Start Map area -->
                                                <!--
						<div class="map-area">
							<div id="googleMap" style="width:100%;height:350px;"></div>
						</div>
                                                -->
                                                <div class="map_company" style="width:100%">
                                                    <img src="<?= $about_company['adress_photo'] ?>">
                                                </div>
                                                <div class="description_adress">
                                                    <?= $about_company['adress_text'] ?>
                                                </div>
						<!-- End Map area -->
						<!-- Start Contact-Message -->
                                                 <?php if(Yii::$app->session->hasFlash('message_company')): ?>
                                                    <div class="alert alert-success alert-dismissable" role="alert">
                                                        <button type="button" class="close close_flash close-alert" data-dimiss="alert" aria-label="Close"><span arria-hidden="true">&times;</span></button>
                                                        <?= Yii::$app->session->getFlash('message_company')  ?>
                                                        <?php Yii::$app->session->removeFlash('message_company') ?>
                                                    </div>
                                                <?php endif; ?>
						<div class="contact-message">
                                                    <?php $model = ActiveForm::begin(); ?>
                                                    
                                                    
							<fieldset>
								<!--<form method="post" action="mail.php">-->
									<legend>Контактная форма</legend>
									<div class="form-group form-horizontal">
										<div class="row">
											
											<div class="col-sm-10">
											
                                                                                            <?= $model->field($contact_company, 'name')->textInput(['maxLength'=>true,'value'=>'']) ?>
											</div>
										</div>
									</div>
									<div class="form-group form-horizontal">
										<div class="row">
											
											<div class="col-sm-10">
												
                                                                                            <?= $model->field($contact_company,'email')->textInput(['maxLength'=>true,'value'=>'']) ?>
											</div>
										</div>
									</div>
									<div class="form-group form-horizontal">
										<div class="row">
											
											<div class="col-sm-10">
												
                                                                                            <?= $model->field($contact_company, 'text')->textarea(['rows'=>10,'value'=>'']) ?>
											</div>
										</div>
									</div>
									<div class="buttons pull-right btn-message">
										<!--<input class="btn btn-primary" type="submit" value="submit" name="submit"/>-->
                                                                            <?=  Html::submitButton('Отправить', ['class' => 'btn btn-success '])  ?>
									</div>
								<!--</form>-->
							</fieldset>
                                                    <?php ActiveForm::end() ?>
						</div>
						<!-- End Contact-Message -->
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
        <script src="/js/dop_check.js"></script>
        
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
        <!-- <script src="/electronics/web/js/jquery.scrollUp.min.js"></script>-->
        <!-- countdon.min JS
		============================================ -->		
        <script src="/js/countdon.min.js"></script>
        <script src="/js/jquery-price-slider.js"></script>
        <script src="/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <!-- Nivo slider js
		============================================ --> 
		<!--
	<script src="/electronics/web/js/jquery.nivo.slider.js" type="text/javascript"></script>
	-->
		<!-- Google Map js -->
		<!--
        <script src="https://maps.googleapis.com/maps/api/js"></script>
		-->
		<script>/*
			function initialize() {
				var mapOptions = {
					zoom: 5,
					scrollwheel: false,
					center: new google.maps.LatLng(40.7058316, -74.2581978)
				};

				var map = new google.maps.Map(document.getElementById('googleMap'),
					mapOptions);

				var marker = new google.maps.Marker({
					position: map.getCenter(),
					animation:google.maps.Animation.BOUNCE,
					icon: 'img/map-marker.png',
					map: map
				});
			}
			
			google.maps.event.addDomListener(window, 'load', initialize);*/
		</script>
		
		<!-- plugins JS
		============================================ -->		
        <script src="/js/plugins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="/js/main.js"></script>
    </body>
</html>
