<!doctype html>

<?php 
use yii\widgets\LinkPager;
?>

<html class="no-js" lang="">
    
    <body>
        <?php if(isset($category['teg_title'])): ?>
            <?php $this->title = $category['teg_title']; 
                  $this->registerMetaTag(['name'=>'description','content'=>$category['teg_description']]);
                  $this->registerMetaTag(['name'=>'keywords','content'=>$category['teg_keywords']]);
                    ?>
        <?php endif; ?>
        <?php if(isset($category)):
        if($category != null): ?>
<?php switch($count_data_category):  ?>
<?php case 1: ?>
        <?php $this->params['crumbs'][] = 'Категория '.$category['category']; ?>
<?php break; ?>
<?php case 2: ?>
        <?php $this->params['crumbs'][] = 'Категория '.$category['category']; ?>
<?php break; ?>

<?php case 3: ?>
        <?php $this->params['crumbs'][] = [
            'label' => 'Категория '.$category['category'],
            'url' => $category['link_category'],
            ];
            $this->params['crumbs'][] = [
            'label' => $category['category'].' '.$category['subcategory'],
            ];
        ?>
<?php break; ?>
<?php case 4: ?>
        <?php $this->params['crumbs'][] = [
            'label' => 'Категория: '.$category['category'],
            'url' => $category['link_category'],
            ];
            $this->params['crumbs'][] = [
            'label' => 'Подкатегория: '.$category['subcategory'],
            'url' => $category['link_subcategory'],
            ];
            $this->params['crumbs'][] = [
                'label' => $category['subcategory'] . ' '.$category['type_of_subcategory']
            ];
        ?>
<?php break; ?>
<?php default :?>
    <?php $this->params['crumbs'][] = [
            'label' => 'Категория: '.$category['category'],
            'url' => $category['link_category'],
            ];
            $this->params['crumbs'][] = [
            'label' => 'Подкатегория: '.$category['subcategory'],
            'url' => $category['link_subcategory'],
            ];
            $this->params['crumbs'][] = [
                'label' => $category['subcategory'] . ' '.$category['type_of_subcategory']
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
						<!-- filter-by start -->
						<div class="accordion_one">
							
                                                        <?= \app\widgets\filter\FilterWidget::widget(); ?>
						</div>
						<!-- filter-by end -->
					</div>
					<div class="col-md-9 col-xs-12">
						<!-- START PRODUCT-BANNER -->
						<div class="product-banner">
							<div class="row">
								<div class="col-xs-12">
									<?php foreach($banner as $single_banner): ?>
									<div class="banner">
										<a href="<?= $single_banner['link_description'] ?>"><img src="<?= '/'.$single_banner['path'] ?>" alt="Product Banner"></a>
									</div>
                                                                        <?php endforeach; ?>
								</div>
							</div>
						</div>
						<!-- END PRODUCT-BANNER -->
						<!-- START PRODUCT-AREA -->
                                                <?php if($product != null): ?>
                                                    <?php if($product_all == 0): ?> 
                                                    <div class="product-area">
							<div class="row">
								<div class="col-xs-12">
									<!-- Start Product-Menu -->
									<div class="product-menu">
										<div class="product-title">
											<h3 class="title-group-3 gfont-1"><?= $product[0]['name_type_of_subcategory'];  ?></h3>
										</div>
									</div>
                                                                        
									<!-- End Product-Menu -->
									<div class="clear"></div>
								</div>
							</div>
                                                           
                                                                <div class="row">
                                                                        <div class="col-xs-12 col-md-12">

                                                                                <!-- Start Product -->
                                                                                <div class="product">
                                                                                        <div class="tab-content">
                                                                                                <!-- Product -->

                                                                                                <!-- End Product -->
                                                                                                <!-- Start Product-->
                                                                                                <div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
                                                                                                        <div class="row">
                                                                                                            <?php //debug($product);die(); ?>
                                                                                                            <?php foreach($product as $one_product): ?>
                                                                                                            <?php //debug($product); 
                                                                                                            //debug($one_product);die(); ?>
                                                                                                                <!-- Start Single-Product -->
                                                                                                                <div class="col-md-3 col-sm-4 col-xs-12">
                                                                                                                        <div class="single-product" itemscope itemtype="http://schema.org/Product">
                                                                                                                                <?php if($one_product['marketing_products'] != null): ?>
                                                                                                                                    <?php if( $one_product['marketing_products'] == 'bestseller' ): ?>
                                                                                                                                        
                                                                                                                                        <div class="label_new">
                                                                                                                                                <span class="bestcel"><?= $one_product['marketing_products'] ?></span>
                                                                                                                                        </div>
                                                                                                                                    <?php elseif( $one_product['marketing_products'] == 'hot_deals' ): ?>
                                                                                                                                        <div class="label_new">
                                                                                                                                                <span class="bestcel">hot deals</span>
                                                                                                                                        </div>
                                                                                                                                    <?php elseif( $one_product['marketing_products'] !== ' ' ): ?>
                                                                                                                                        <div class="label_new">
                                                                                                                                                <span class="new"><?= $one_product['marketing_products'] ?></span>
                                                                                                                                        </div>
                                                                                                                                    <?php endif; ?>
                                                                                                                                <?php endif; ?>
                                                                                                                                <?php if($one_product['discount'] != null): ?>
                                                                                                                                    <?php if( $one_product['marketing_products'] == 'bestseller' || $one_product['marketing_products'] == 'hot_deals' ): ?>
                                                                                                                                        <div class="sale-off">
                                                                                                                                                <span class="sale-percent-100"><?= $one_product['discount'] ?></span>
                                                                                                                                        </div>
                                                                                                                                    <?php else: ?>
                                                                                                                                        <div class="sale-off">
                                                                                                                                                <span class="sale-percent"><?= $one_product['discount'] ?></span>
                                                                                                                                        </div>
                                                                                                                                    <?php endif; ?>
                                                                                                                                <?php endif; ?>
                                                                                                                                <div class="product-img">
                                                                                                                                    <a href="<?= $one_product['link_description'] /*.'&'.$one_product['id']*/ ?>">
                                                                                                                                                <img class="primary-img primary-img-main" src="<?= '/'.$one_product['path']?>" alt="<?= $one_product['model_product'] ?>">
                                                                                                                                                <?php if($one_product['path_2']!= null): ?>
                                                                                                                                                    <img class="secondary-img primary-img-main" src="<?= '/'.$one_product['path_2']?>" alt="<?= $one_product['model_product'] ?>">
                                                                                                                                                <?php else: ?>
                                                                                                                                                    <img class="secondary-img primary-img-main" src="<?= '/'.$one_product['path']?>" alt="<?= $one_product['model_product'] ?>">

                                                                                                                                                <?php endif; ?>
                                                                                                                                        </a>
                                                                                                                                </div>
                                                                                                                                <div class="product-description">
                                                                                                                                    <h5 class="name_product"><a href="<?= $one_product['link_description'] /*.'&'.$one_product['id']*/ ?>"><?= $one_product['model_product']?></a></h5>
                                                                                                                                        <div class="price-box" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                                                                                                                <span itemprop="priceCurrency" content="RUB"></span>
                                                                                                                                                <span itemprop="price" class="price"><?= $one_product['price']?></span>
                                                                                                                                                <span class="old-price"><?= $one_product['old_price']?></span>
                                                                                                                                                <span class="number-of-products"><?= $one_product['number_of_products'] ?></span>
                                                                                                                                        </div>
                                                                                                                                        <div itemprop="review" itemscope itemtype="http://schema.org/Review">
                                                                                                                                            <span class="rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                                                                                                                                                
                                                                                                                                                <i class="fa fa-star"></i>
                                                                                                                                                <i class="fa fa-star"></i>
                                                                                                                                                <i class="fa fa-star"></i>
                                                                                                                                                <i class="fa fa-star"></i>
                                                                                                                                                <i class="fa fa-star-o"></i>
                                                                                                                                                <meta itemprop="worstRating" content="1">
                                                                                                                                                <span>4</span> из
                                                                                                                                                <span>5</span>
                                                                                                                                            </span>    
                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                                <div class="product-action">
                                                                                                                                        <div class="button-group">
                                                                                                                                                <div class="product-button">
                                                                                                                                                        <button><i class="fa fa-shopping-cart"></i> Добавить в корзину</button>
                                                                                                                                                </div>
                                                                                                                                                <div class="product-button-2">
                                                                                                                                                        <a href="#" data-toggle="tooltip" title="Понравилось" class="m-heart-o"><i class="fa fa-heart-o"></i></a>
                                                                                                                                                        <a href="#" data-toggle="tooltip" title="Сравнить" class="compare_product"><i class="fa fa-balance-scale"></i></a>
                                                                                                                                                        <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal"><i class="fa fa-search-plus"></i></a>
                                                                                                                                                </div>
                                                                                                                                        </div>
                                                                                                                                </div>												
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <!-- End Single-Product -->
                                                                                                            <?php endforeach ; ?>    
                                                                                                                   
                                                                                                        </div>
                                                                                                        <!-- Start Pagination Area -->
                                                                                                        <!--
                                                                                                        <div class="pagination-area">
                                                                                                                <div class="row">
                                                                                                                        <div class="col-xs-5">
                                                                                                                                <div class="pagination">
                                                                                                                                        <ul>
                                                                                                                                                <li class="active"><a href="#">1</a></li>
                                                                                                                                                <li><a href="#">2</a></li>
                                                                                                                                                <li><a href="#">></a></li>
                                                                                                                                                <li><a href="#">>|</a></li>
                                                                                                                                        </ul>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-xs-7">
                                                                                                                                <div class="product-result">
                                                                                                                                        <span>Showing 1 to 16 of 19 (2 Pages)</span>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        -->
                                                                                                        <!-- End Pagination Area -->
                                                                                                </div>
                                                                                                <!-- End Product = TV -->
                                                                                        </div>
                                                                                </div>
                                                                                <!-- End Product -->
                                                                        </div>
                                                                </div>
                                                            
						</div>
                                                <?php else :?>
                                                    <?php foreach($product as $subcategory_product): ?>
                                                        <div class="product-area">
                                                            <div class="row">
								<div class="col-xs-12">
									<!-- Start Product-Menu -->
									<div class="product-menu">
										<div class="product-title">
											<h3 class="title-group-3 gfont-1"><?= $subcategory_product[0]['name_type_of_subcategory'] ?></h3>
										</div>
									</div>
                                                                        
									<!-- End Product-Menu -->
									<div class="clear"></div>
								</div>
							</div>    
                                                            
                                                            <div class="row">
                                                                <div class="col-xs-12 col-md-12">

                                                                                <!-- Start Product -->
                                                                                <div class="product">
                                                                                        <div class="tab-content">
                                                       
                                                                                                <!-- Start Product-->
                                                                                                <div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
                                                                                                        <div class="row">
                                                                                                            <?php foreach($subcategory_product as $one_product): ?>
                                                                                                                <!-- Start Single-Product -->
                                                                                                                <div class="col-md-3 col-sm-4 col-xs-12">
                                                                                                                        <div class="single-product" itemscope itemtype="http://schema.org/Product">
                                                                                                                                <?php if($one_product['marketing_products'] != null): ?>
                                                                                                                                    <?php if( $one_product['marketing_products'] == 'bestseller' ): ?>
                                                                                                                                        
                                                                                                                                        <div class="label_new">
                                                                                                                                                <span class="bestcel"><?= $one_product['marketing_products'] ?></span>
                                                                                                                                        </div>
                                                                                                                                    <?php elseif( $one_product['marketing_products'] == 'hot_deals' ): ?>
                                                                                                                                        <div class="label_new">
                                                                                                                                                <span class="bestcel">hot deals</span>
                                                                                                                                        </div>
                                                                                                                                    <?php elseif( $one_product['marketing_products'] !== ' ' ): ?>
                                                                                                                                        <div class="label_new">
                                                                                                                                                <span class="new"><?= $one_product['marketing_products'] ?></span>
                                                                                                                                        </div>
                                                                                                                                    <?php endif; ?>
                                                                                                                                <?php endif; ?>
                                                                                                                                <?php if($one_product['discount'] != null): ?>
                                                                                                                                    <?php if( $one_product['marketing_products'] == 'bestseller' || $one_product['marketing_products'] == 'hot_deals' ): ?>
                                                                                                                                        <div class="sale-off">
                                                                                                                                                <span class="sale-percent-100"><?= $one_product['discount'] ?></span>
                                                                                                                                        </div>
                                                                                                                                    <?php else: ?>
                                                                                                                                        <div class="sale-off">
                                                                                                                                                <span class="sale-percent"><?= $one_product['discount'] ?></span>
                                                                                                                                        </div>
                                                                                                                                    <?php endif; ?>
                                                                                                                                <?php endif; ?>
                                                                                                                                <div class="product-img">
                                                                                                                                    <a href="<?= $one_product['link_description']?>">
                                                                                                                                        <img class="primary-img primary-img-main" src="<?= '/'.$one_product['path']?>" alt="<?= $one_product['model_product'] ?>">
                                                                                                                                        <?php if($one_product['path_2']!= null): ?>
                                                                                                                                            <img class="secondary-img primary-img-main" src="<?= '/'.$one_product['path_2']?>" alt="<?= $one_product['model_product'] ?>">
                                                                                                                                        <?php else: ?>
                                                                                                                                            <img class="secondary-img primary-img-main" src="<?= '/'.$one_product['path']?>" alt="<?= $one_product['model_product'] ?>">

                                                                                                                                        <?php endif; ?>
                                                                                                                                    </a>
                                                                                                                                </div>
                                                                                                                                <div class="product-description">
                                                                                                                                        <h5 class="name_product" ><a href="<?= $one_product['link_description']?>"><?= $one_product['model_product']?></a></h5>
                                                                                                                                        <div class="price-box" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                                                                                                            <span itemprop="priceCurrency" content="RUB" style="display:none">руб.</span>
                                                                                                                                            <span itemprop="price" class="price"><?= $one_product['price']?></span>
                                                                                                                                            <span class="old-price"><?= $one_product['old_price']?></span>
                                                                                                                                            <span class="number-of-products"><?= $one_product['number_of_products'] ?></span>
                                                                                                                                        </div>
                                                                                                                                        <div itemprop="review" itemscope itemtype="http://schema.org/Review">
                                                                                                                                            <span class="rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                                                                                                                                                <i class="fa fa-star"></i>
                                                                                                                                                <i class="fa fa-star"></i>
                                                                                                                                                <i class="fa fa-star"></i>
                                                                                                                                                <i class="fa fa-star"></i>
                                                                                                                                                <i class="fa fa-star-o"></i>
                                                                                                                                                <meta itemprop="worstRating" content="1">
                                                                                                                                                <span>4</span> из
                                                                                                                                                <span>5</span>
                                                                                                                                            </span>
                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                                <div class="product-action">
                                                                                                                                        <div class="button-group">
                                                                                                                                                <div class="product-button">
                                                                                                                                                        <button><i class="fa fa-shopping-cart"></i> Добавить в корзину</button>
                                                                                                                                                </div>
                                                                                                                                                <div class="product-button-2">
                                                                                                                                                        <a href="#" data-toggle="tooltip" title="Понравилось" class="m-heart-o"><i class="fa fa-heart-o"></i></a>
                                                                                                                                                        <a href="#" data-toggle="tooltip" title="Сравнить" class="compare_product"><i class="fa fa-balance-scale"></i></a>
                                                                                                                                                        <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal"><i class="fa fa-search-plus"></i></a>
                                                                                                                                                </div>
                                                                                                                                        </div>
                                                                                                                                </div>												
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <!-- End Single-Product -->
                                                                                                            <?php endforeach ; ?>    
                                                                                                              
                                                                                                                <!-- Start Single-Product -->
                                                                                                                
                                                                                                                
                                                                                                        </div>
                                                                                                        <!-- Start Pagination Area -->
                                                                                                    
                                                                                                        <!-- End Pagination Area -->
                                                                                                </div>
                                                                                                <!-- End Product = TV -->
                                                                                        </div>
                                                                                </div>
                                                                                <!-- End Product -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>            
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <h1>Нет товаров</h1>
                                                <?php endif; ?>
						<!-- END PRODUCT-AREA -->
					</div>
				</div>
			</div>
			
		</section>
		<!-- END PAGE-CONTENT -->
		
                <?= LinkPager::widget(['pagination' => $pages,
                    'options'=> [
                        'class'=>'pagination m_pagination'
                        ],
                    
                    ]) ?>
                
                <!-- jquery
		============================================ -->		
        <script src="/js/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->		
        <!-- ============================================ -->		
        <script src="/js/dop_function_product.js"></script>
        <!-- ============================================ -->
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
