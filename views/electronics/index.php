<!doctype html>
<?php if(isset($seo_search['teg_title']))
    {
        //заполняем meta tag для SEO-поиска
        $this->title = $seo_search['teg_title'];
        $this->registerMetaTag(['name'=>'description','content'=>$seo_search['teg_description']]);
        $this->registerMetaTag(['name'=>'keywords','content'=>$seo_search['teg_keywords']]);
    }
//конец заполнения meta tag
?>
<html class="no-js" lang="">
    <body>

		<!-- HEADER-AREA START -->
		
		<!-- HEADER AREA END -->
		<!-- Category slider area start -->
		<div class="category-slider-area">
			<div class="container">
				<div class="row">
                    <!-- Меню слева -->
                        <div class="col-md-3">
                            <?= app\widgets\category\CategoryWidget::widget(); ?>
                        </div>
                    <!-- Меню слева конец -->
                                    
	                <div class="col-md-9">
                            <!-- slider -->
                                <?php foreach ($banner as $banner_scroll): ?>
                                    <div class="slider-area">
                                            <div class="bend niceties preview-1">
                                                <?php foreach ($banner_scroll['scroll'] as $scroll_banner ): ?>
                                                    <div id="ensign-nivoslider" class="slides">
                                                            <?php if($scroll_banner['path_1'] != null):?>
                                                                <img src="<?= $scroll_banner['path_1'] ?>" alt="Malias" title="#slider-direction-1"/>
                                                            <?php endif; ?>
                                                            <?php if($scroll_banner['path_2'] != null):?>
                                                                <img src="<?= $scroll_banner['path_2'] ?>" alt="Malias" title="#slider-direction-2"/>
                                                            <?php endif; ?>
                                                            <?php if($scroll_banner['path_3'] != null):?>
                                                                <img src="<?= $scroll_banner['path_3'] ?>" alt="Malias" title="#slider-direction-3"/>
                                                            <?php endif; ?>
                                                            <!-- <img src="img/sliders/slider-1/bg2.jpg" alt="" title="#slider-direction-4"/> -->     
                                                    </div>
                                                    <!-- direction 1 -->
                                                    <?php if($scroll_banner['path_1'] != null):?>
                                                        <div id="slider-direction-1" class="t-lfr slider-direction">
                                                            <div class="slider-progress"></div>
                                                            <!-- layer 1 -->
                                                            <div class="layer-1-1 ">
                                                                    <h1 class="title1"><?= $scroll_banner['text_1'] ?></h1>
                                                            </div>
                                                            <!-- layer 2 -->
                                                            <div class="layer-1-2">
                                                                    <p class="title2"><?= $scroll_banner['text_2'] ?></p>
                                                            </div>
                                                            <!-- layer 3 -->
                                                            <?php if($scroll_banner['text_3']): ?>
                                                                <div class="layer-1-3">
                                                                    <a href="<?= $scroll_banner['link_product_1'] ?>"> <p class="title3"><?= $scroll_banner['text_3'] ?></p></a>
                                                                </div>
                                                            <?php endif; ?>
                                                            <!-- layer 4 -->
                                                            <?php if($scroll_banner['text_4']): ?>
                                                                <div class="layer-1-4">
                                                                        <a href="<?= $scroll_banner['link_product_1'] ?>" class="title4"><?= $scroll_banner['text_4'] ?></a>
                                                                </div>
                                                            <?php endif; ?>
                                                    </div>
                                                    <?php endif; ?>
                                                    <!-- direction 2 -->
                                                    <?php if($scroll_banner['path_2'] != null):?>
                                                        <div id="slider-direction-2" class="slider-direction">
                                                                <div class="slider-progress"></div>
                                                                <!-- layer 1 -->
                                                                <div class="layer-2-1">
                                                                        <h1 class="title1"><?= $scroll_banner['text_5'] ?></h1>
                                                                </div>
                                                                <!-- layer 2 -->
                                                                <div class="layer-2-2">
                                                                        <p class="title2"><?= $scroll_banner['text_6'] ?></p>
                                                                </div>
                                                                <!-- layer 3 -->
                                                                <?php if($scroll_banner['text_7']): ?>
                                                                <div class="layer-2-3">
                                                                        <a href="<?= $scroll_banner['link_product_2'] ?>" class="title3"><?= $scroll_banner['text_7'] ?></a>
                                                                </div>
                                                                <?php endif; ?>
                                                                <!-- layer 4 -->
                                                                <?php if($scroll_banner['text_8']): ?>
                                                                <div class="layer-1-4">
                                                                        <a href="<?= $scroll_banner['link_product_2'] ?>" class="title4"><?= $scroll_banner['text_8'] ?></a>
                                                                </div>
                                                                <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <!-- direction 3 -->
                                                    <?php if($scroll_banner['path_3'] != null):?>
                                                        <div id="slider-direction-3" class="slider-direction">
                                                                <div class="slider-progress"></div>
                                                                <!-- layer 1 -->
                                                                <div class="layer-3-1">
                                                                        <h2 class="title1"><?= $scroll_banner['text_9'] ?></h2>
                                                                </div>
                                                                <!-- layer 2 -->
                                                                <div class="layer-3-2">
                                                                        <h1 class="title2"><?= $scroll_banner['text_10'] ?></h1>
                                                                </div>
                                                                <!-- layer 3 -->
                                                                <?php if($scroll_banner['text_11']): ?>
                                                                 <div class="layer-3-3">
                                                                     <a href="<?= $scroll_banner['link_product_3'] ?>" class="title4"><p class="title4"><?= $scroll_banner['text_11'] ?></p></a>
                                                                </div>
                                                                <?php endif; ?>
                                                                <!-- layer 4 -->
                                                                <?php if($scroll_banner['text_12']): ?>
                                                                <div class="layer-3-4">
                                                                        <a href="<?= $scroll_banner['link_product_3'] ?>" class="title4"><?= $scroll_banner['text_12'] ?></a>
                                                                </div>
                                                                <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>    

                                            </div>
                                    </div>
                                <?php endforeach ; ?>
                            <!-- slider end-->
	                </div>
	            </div>
			</div>
		</div>
		<!-- Category slider area End -->		
		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
	            <div class="row">
	            	<div class="col-md-3 col-sm-3">
	                    <!-- START HOT-DEALS-AREA -->
                            <div class="hot-deals-area carosel-circle">
                                
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="area-title">
                                                    <h3 class="title-group border-red gfont-1">Хит продаж</h3>
                                            </div>
                                        </div>
                                    </div>    
                                
	                    	<div class="row">
                                    <div class="active-hot-deals">
                                            <!-- Start Single-hot-deals -->
                                            <?php foreach($market_sort['hot_deals'] as $product_hot_deals): ?>
                                            
                                                    <div class="col-xs-12">
                                                        <div class="single-hot-deals"itemscope itemtype="http://schema.org/Product">
                                                                    <div class="hot-deals-photo">
                                                                            <a href="<?= $product_hot_deals['link_description'] ?>"><img src="<?= $product_hot_deals['path'] ?>" alt="<?= $product_hot_deals['model_product'] ?>"></a>
                                                                    </div>
                                                                    <div class="count-down">
                                                                        <div class="timer">
                                                                            <div data-countdown="<?= $product_hot_deals['date'] ?>"></div>
                                                                        </div> 
                                                                    </div>
                                                                    <div class="hot-deals-text">
                                                                            <h5><a href="<?= $product_hot_deals['link_description'] ?>" class="name-group"><?= $product_hot_deals['model_product'] ?></a></h5>
                                                                            <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                                                                                <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></span>
                                                                                <meta itemprop="worstRating" content="1"> 
                                                                                <span >4</span> из
                                                                                <span >5</span>

                                                                            </div>
                                                                            <div class="price-box" itemprop="offers" itemscope itemtype="http://schema.org/Offer" >
                                                                                <span itemprop="priceCurrency" content="RUB"></span>
                                                                                <span itemprop="price" class="price gfont-2"><?= $product_hot_deals['price'] ?></span>
                                                                                    <span class="old-price gfont-2"><?= $product_hot_deals['old_price'] ?></span>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                
                                            <?php endforeach; ?> 
                                            <!-- End Single-hot-deals -->
                                            
                                    </div>
	                    	</div>
	                    </div>
	                    <!-- END HOT-DEALS-AREA -->
						<!-- START SMALL-PRODUCT-AREA -->
                                                
						<div class="small-product-area carosel-navigation">
							<div class="row">
								<div class="col-md-12">
									<div class="area-title">
										<h3 class="title-group gfont-1">Бестселлер</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="active-bestseller sidebar">
                                                                    <?php $i = 0; $start_col = 1; $end_col = 4;  ?>
                                                                    <?php if(isset($market_sort['bestseller'])): ?>
                                                                    <?php
                                                                    foreach($market_sort['bestseller'] as $product_best): ?>
                                                                       
                                                                        <?php $i++; ?>
                                                                        <?php if( $start_col == $i ): ?>
                                                                            <?php $start_col = $start_col + 4; ?>
                                                                            <div class="col-xs-12">
                                                                        <?php endif; ?>

                                                                            <!-- Start Single-Product -->
                                                                            <div class="single-product" itemscope itemtype="http://schema.org/Product">
                                                                                    <div class="product-img">
                                                                                            <a href="<?= $product_best['link_description']."&" ?>">
                                                                                                    <img class="primary-img" src="<?= $product_best['path'] ?>" alt="<?= $product_best['model_product'] ?>">
                                                                                            </a>
                                                                                    </div>
                                                                                    <div class="product-description">
                                                                                            <h5><a href="<?= $product_best['link_description'] ?>"><?= $product_best['model_product'] ?></a></h5>
                                                                                            <div class="price-box" itemprop="offers" itemscope itemtype="http://schema.org/Offer" >
                                                                                                <span itemprop="priceCurrency" content="RUB" ></span>
                                                                                                <span class="price" itemprop="price"><?= $product_best['price'] ?></span>
                                                                                                <span class="old-price"><?= $product_best['old_price'] ?></span>
                                                                                            </div>
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
                                                                            <!-- End Single-Product -->


                                                                        <?php if( $end_col == $i ): ?>
                                                                            <?php $end_col = $end_col + 4; ?>
                                                                            </div>
                                                                        <?php endif; ?>

                                                                    <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($i%4): ?>
                                                                        </div>
                                                                    <?php endif; ?>
								</div>
							</div>

						</div>
						<!-- END SMALL-PRODUCT-AREA -->                    
	                    <!-- START SIDEBAR-BANNER -->
                            <?php foreach ($banner as $banner_image): ?>
	                    <div class="sidebar-banner">
	                    	<div class="active-sidebar-banner">
                                    <?php foreach ($banner_image['imageban'] as $banner_img ): ?>
                                        <?php if($banner_img['path_1'] != null): ?>
                                            <div class="single-sidebar-banner">
                                                <a href="<?= $banner_img['link_description'] ?>"><img src="<?= $banner_img['path_1'] ?>" alt="Product Banner"></a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($banner_img['path_2'] != null): ?>
                                            <div class="single-sidebar-banner">
                                                    <a href="<?= $banner_img['link_description'] ?>"><img src="<?= $banner_img['path_2'] ?>" alt="Product Banner"></a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($banner_img['path_3'] != null): ?>
                                            <div class="single-sidebar-banner">
                                                    <a href="<?= $banner_img['link_description'] ?>"><img src="<?= $banner_img['path_3'] ?>" alt="Product Banner"></a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($banner_img['path_4'] != null): ?>
                                            <div class="single-sidebar-banner">
                                                    <a href="<?= $banner_img['link_description'] ?>"><img src="<?= $banner_img['path_4'] ?>" alt="Product Banner"></a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
	                    	</div>
	                    </div>
                            <?php endforeach; ?>
	                    <!-- END SIDEBAR-BANNER -->
                            
	                    <!-- START RECENT-POSTS -->
                            <?php /* 
	                    <div class="shop-blog-area sidebar">
	                    	<div class="row">
	                    		<div class="col-md-12">
	                    			<h3 class="title-group border-red gfont-1">RECENT POSTS </h3>
	                    		</div>
	                    	</div>
	                    	<div class="row">
		                    	<div class="active-recent-posts carosel-circle">
		                    		<!-- Start Single-Recent-Posts -->
		                    		<div class="col-xs-12">
			                    		<div class="single-recent-posts">
			                    			<div class="recent-posts-photo">
			                    				<img src="img/posts/1.jpg" alt="Recent Posts">
			                    			</div>
			                    			<div class="recent-posts-text">
			                    				<h5><a href="#" class="recent-posts-title">swimwear for women</a></h5>
			                    				<span class="recent-posts-date">23/12/2015 | BootExpert Theme</span>
			                    				<p class="posts-short-brif">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
			                    				<a href="#" class="posts-read-more">Read more ...</a>
			                    			</div>
			                    		</div>
		                    		</div>
		                    		<!-- End Single-Recent-Posts -->
		                    		<!-- Start Single-Recent-Posts -->
		                    		<div class="col-xs-12">
			                    		<div class="single-recent-posts">
			                    			<div class="recent-posts-photo">
			                    				<img src="img/posts/2.jpg" alt="Recent Posts">
			                    			</div>
			                    			<div class="recent-posts-text">
			                    				<h5><a href="#" class="recent-posts-title">swimwear for women</a></h5>
			                    				<span class="recent-posts-date">23/12/2015 | BootExpert Theme</span>
			                    				<p class="posts-short-brif">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
			                    				<a href="#" class="posts-read-more">Read more ...</a>
			                    			</div>
			                    		</div>
		                    		</div>
		                    		<!-- End Single-Recent-Posts -->
		                    		<!-- Start Single-Recent-Posts -->
		                    		<div class="col-xs-12">
			                    		<div class="single-recent-posts">
			                    			<div class="recent-posts-photo">
			                    				<img src="img/posts/3.jpg" alt="Recent Posts">
			                    			</div>
			                    			<div class="recent-posts-text">
			                    				<h5><a href="#" class="recent-posts-title">swimwear for women</a></h5>
			                    				<span class="recent-posts-date">23/12/2015 | BootExpert Theme</span>
			                    				<p class="posts-short-brif">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
			                    				<a href="#" class="posts-read-more">Read more ...</a>
			                    			</div>
			                    		</div>
		                    		</div>
		                    		<!-- End Single-Recent-Posts -->
		                    		<!-- Start Single-Recent-Posts -->
		                    		<div class="col-xs-12">
			                    		<div class="single-recent-posts">
			                    			<div class="recent-posts-photo">
			                    				<img src="img/posts/4.jpg" alt="Recent Posts">
			                    			</div>
			                    			<div class="recent-posts-text">
			                    				<h5><a href="#" class="recent-posts-title">swimwear for women</a></h5>
			                    				<span class="recent-posts-date">23/12/2015 | BootExpert Theme</span>
			                    				<p class="posts-short-brif">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
			                    				<a href="#" class="posts-read-more">Read more ...</a>
			                    			</div>
			                    		</div>
		                    		</div>
		                    		<!-- End Single-Recent-Posts -->
		                    		<!-- Start Single-Recent-Posts -->
		                    		<div class="col-xs-12">
			                    		<div class="single-recent-posts">
			                    			<div class="recent-posts-photo">
			                    				<img src="img/posts/1.jpg" alt="Recent Posts">
			                    			</div>
			                    			<div class="recent-posts-text">
			                    				<h5><a href="#" class="recent-posts-title">swimwear for women</a></h5>
			                    				<span class="recent-posts-date">23/12/2015 | BootExpert Theme</span>
			                    				<p class="posts-short-brif">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
			                    				<a href="#" class="posts-read-more">Read more ...</a>
			                    			</div>
			                    		</div>
		                    		</div>
		                    		<!-- End Single-Recent-Posts -->
		                    	</div>
	                    	</div>
	                    </div>
                            */ ?>
	                    <!-- END RECENT-POSTS -->
	                </div>
					<div class="col-md-9 col-sm-9">
						<!-- START PRODUCT-BANNER -->
						<div class="product-banner home1-banner">
							<div class="row">
                                                        <?php foreach ($banner as $banner_text): ?>
                                                            <?php foreach ($banner_text['textban'] as $text_ban): ?>
                                                                <?php if($text_ban['number_page'] == 1): ?>
                                                                    <?php switch ($text_ban['class']): case 'banner-1':?>
                                                                        
                                                                            <div class="col-md-7 banner-box1">
                                                                                    <div class="single-product-banner">
                                                                                            <a href="<?= $text_ban['link_description'] ?>"><img src="<?= $text_ban['path'] ?>" alt="Product Banner"></a>
                                                                                            <div class="banner-text banner-1">
                                                                                                <h2><?= $text_ban['text_h2']  ?><span><?= $text_ban['text_span'] ?></span></h2>
                                                                                                <p><?= $text_ban['text_p'] ?></p>
                                                                                            </div>
                                                                                    </div>
                                                                            </div>
                                                                        <?php break; ?>

                                                                        <?php case 'banner-2': ?>
                                                                            <div class="col-md-5 banner-box2">
                                                                                    <div class="single-product-banner">
                                                                                            <a href="<?= $text_ban['link_description'] ?>"><img src="<?= $text_ban['path'] ?>" alt="Product Banner"></a>
                                                                                            <div class="banner-text banner-2">
                                                                                                    <h2><?= $text_ban['text_h2'] ?><span><?= $text_ban['text_span'] ?></span></h2>
                                                                                                    <p><?= $text_ban['text_p'] ?></p>
                                                                                            </div>
                                                                                    </div>
                                                                            </div>
                                                                        <?php break; ?>
                                                                    <?php endswitch; ?>
                                                                <?php endif; ?>
                                                                <!-- -->
                                                            <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                                
							</div>
                                                    
                                                       
						</div>
                                                
						<!-- END PRODUCT-BANNER -->
						<!-- START PRODUCT-AREA (1) -->
                                                <?php  //debug($category_data);
                                                //die()  ?>
                                                <?php $i = 0; foreach($category_data as $category): 
                                                    $i++;?>
                                                
						<div class="product-area">
							<div class="row">
								<div class="col-xs-12 col-md-12">
									<!-- Start Product-Menu -->
									<div class="product-menu">
										<div class="product-title">
                                                                                    <h3 class="title-group-2 gfont-1"><?php $head_category = reset($category); echo $head_category['category'];  ?></h3>
										</div>
										
										<ul role="tablist">
                                                                                    <?php ?>
                                                                                    <?php $j = 1; foreach($category as $subcategory): ?>
                                                                                    
                                                                                        <?php if ($j == 1): ?>
                                                                                            <li role="presentation" class="active"><a href="#display-<?= $i ?>-1" role="tab" data-toggle="tab"><?= $subcategory['type_of_subcategory'] ?></a></li>
                                                                                        <?php else: ?>
                                                                                            <li role="presentation"><a href="#display-<?= $i ?>-<?= $j ?>" role="tab" data-toggle="tab"><?= $subcategory['type_of_subcategory'] ?></a></li>
                                                                                        <?php endif; ?>
                                                                                                                                                                               
                                                                                        <?php $j++; ?>
                                                                                    <?php endforeach; ?>
                                                                                </ul>
									</div>
								</div>
							</div>
							<!-- End Product-Menu -->
							<div class="clear"></div>
							<!-- Start Product -->
							<div class="row">
								<div class="col-xs-12 col-md-12">
									<div class="product carosel-navigation">
										<div class="tab-content">
                                                                                        <?php $j = 0; foreach($category as $data_category): ?>
                                                                                        <?php $j++; if( isset($data_category['notebooks']) /*$data_category['notebooks'] != null*/)
                                                                                                        $data_product = $data_category['notebooks'];
                                                                                                    elseif(isset ($data_category['tablets'])/*$data_category['tablets'] != null*/)
                                                                                                        $data_product = $data_category['tablets'];
                                                                                                    elseif(isset ($data_category['audio'])/*$data_category['audio'] != null*/)
                                                                                                        $data_product = $data_category['audio'];
                                                                                                    elseif(isset ($data_category['tv'])/*$data_category['tv'] !=null*/)
                                                                                                        $data_product = $data_category['tv'];
                                                                                                    elseif(isset ($data_category['smartiphone'])/*$data_category['smartiphone'] != null*/)
                                                                                                        $data_product = $data_category['smartiphone'];
                                                                                                    elseif(isset ($data_category['camera'])/*$data_category['camera'] != null*/)
                                                                                                        $data_product = $data_category['camera'];
                                                                                                    elseif(isset ($data_category['videocamera'])/*$data_category['videocamera'] != null*/)
                                                                                                        $data_product = $data_category['videocamera'];
                                                                                                    
                                                                                                    else
                                                                                                        $data_product = null;
                                                                                        ?>
                                                                                            <!-- Product = display-1-1 -->
                                                                                            <?php if($j == 1 ): ?>
                                                                                                <div role="tabpanel" class="tab-pane fade in active" id="display-<?= $i ?>-<?= $j ?>">
                                                                                            <?php else: ?>
                                                                                                <div role="tabpanel" class="tab-pane fade" id="display-<?= $i ?>-<?= $j ?>">
                                                                                            <?php endif; ?>        
                                                                                                    <div class="row">
                                                                                                            <div class="active-product-carosel">
                                                                                                                <?php /*debug('data_product');if($data_product != null){ debug($data_product);}
                                                                                                                else{
                                                                                                                    debug('nulllllll');
                                                                                                                }
                                                                                                                //die(); */?>
                                                                                                                <?php if($data_product != null): ?>
                                                                                                                    <?php foreach($data_product as $product): ?>
                                                                                                                    <!-- Start Single-Product -->
                                                                                                                    <div class="col-xs-12">
                                                                                                                        <div class="single-product" itemscope itemtype="http://schema.org/Product">
                                                                                                                                    <?php /* if(isset($product['marketing_products']) ): ?>
                                                                                                                                    <?php else: 
                                                                                                                                    //debug($data_product) ; debug($product);debug($data_category);die;?>
                                                                                                                                    <?php endif;*/ ?>
                                                                                                                                    <?php if( $product['marketing_products'] != null && ($product['marketing_products'] != 'bestseller' ) && $product['marketing_products'] != ' ' && $product['marketing_products'] != 'hot_deals' ): ?>
                                                                                                                                    <div class="label_new">
                                                                                                                                            <span class="new"><?= $product['marketing_products'] ?></span>
                                                                                                                                    </div> 
                                                                                                                                    <?php elseif( $product['marketing_products'] == 'hot_deals' ): ?>
                                                                                                                                        <div class="label_new">
                                                                                                                                                <span class="bestcel">Хит продаж</span>
                                                                                                                                        </div>
                                                                                                                                    <?php endif;?>
                                                                                                                                    
                                                                                                                                    <?php if($product['discount'] != null):?>
                                                                                                                                    <div class="sale-off">
                                                                                                                                        <?php if($product['marketing_products'] == 'hot_deals' ): ?>    
                                                                                                                                            <span class="bestcel"><?= $product['discount'] ?></span>
                                                                                                                                        <?php else: ?>
                                                                                                                                            <span class="sale-percent"><?= $product['discount'] ?></span>
                                                                                                                                        <?php endif; ?>    
                                                                                                                                    </div>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    
                                                                                                                                    <div class="product-img">
                                                                                                                                            <a href="<?= $product['link_description'] ?>">
                                                                                                                                                <img class="primary-img primary-img-main" src="<?= $product['path'] ?>" alt="<?= $product['model_product'] ?>">
                                                                                                                                                    <?php if($product['path_2'] != null): ?>
                                                                                                                                                        <img class="secondary-img primary-img-main" src="<?= $product['path_2'] ?>" alt="<?= $product['model_product'] ?>">
                                                                                                                                                    <?php else: ?>
                                                                                                                                                        <img class="secondary-img primary-img-main" src="<?= $product['path'] ?>" alt="<?= $product['model_product'] ?>">
                                                                                                                                                    <?php endif; ?>                                                                                                                                               
                                                                                                                                            </a>
                                                                                                                                    </div>
                                                                                                                                    
                                                                                                                                    <div class="product-description">
                                                                                                                                            <h5><a class="name_product" href="<?= $product['link_description'] ?>"><?= $product['model_product'] ?></a></h5>
                                                                                                                                            <div class="price-box" itemprop="offers" itemscope itemtype="http://schema.org/Offer" >
                                                                                                                                                <span itemprop="priceCurrency" content="RUB"></span>
                                                                                                                                                <span class="price" itemprop="price"><?= $product['price'] ?></span>
                                                                                                                                                <span class="old-price"><?= $product['old_price'] ?></span>
                                                                                                                                                <span class="number-of-products"><?= $product['number_of_products']?></span>
                                                                                                                                            </div>
                                                                                                                                            <div itemprop="review" itemscope itemtype="http://schema.org/Review">
                                                                                                                                                <span class="rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                                                                                                                                                        <meta itemprop="worstRating" content="1">
                                                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                                                        <i class="fa fa-star-o"></i>
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
                                                                                                                                                            <a href="#" data-toggle="tooltip" title="Понравилось"class="m-heart-o" ><i class="fa fa-heart-o"></i></a>
                                                                                                                                                            <a href="#" data-toggle="tooltip" title="Сравнить" class="compare_product" ><i class="fa fa-balance-scale"></i></a>
                                                                                                                                                            <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal"><i class="fa fa-search-plus"></i></a>
                                                                                                                                                    </div>
                                                                                                                                            </div>
                                                                                                                                    </div>	
                                                                 
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                                    <!-- End Single-Product -->
                                                                                                                    <?php endforeach; ?>
                                                                                                                <?php endif; ?>
                                                                                                                                                                       
                                                                                                            </div>
                                                                                                    </div>
                                                                                            </div>
                                                                                            <!-- End Product = display-1-1 -->
                                                                                        <?php endforeach; ?>
											
										</div>
									</div>
								</div>
							</div>
							<!-- End Product -->
						</div>
                                                <?php  endforeach;?>
						<!-- END PRODUCT-AREA (1) -->
						<!-- START PRODUCT-AREA (2) -->
						
						<!-- END PRODUCT-AREA (2) -->
						
						<!-- START PRODUCT-BANNER -->
						<div class="product-banner">
							<div class="row">
                                                            
                                                             <?php foreach ($banner as $banner_text): ?>
                                                            <?php foreach ($banner_text['textban'] as $text_ban): ?>
                                                                <?php if($text_ban['number_page'] == 2): ?>
                                                                    <?php switch ($text_ban['class']): case 'banner-1':?>
                                                                        
                                                                            <div class="col-md-7 banner-box1">
                                                                                    <div class="single-product-banner">
                                                                                            <a href="<?= $text_ban['link_description'] ?>"><img src="<?= $text_ban['path'] ?>" alt="Product Banner"></a>
                                                                                            <div class="banner-text banner-1">
                                                                                                <h2><?= $text_ban['text_h2']  ?></h2>
                                                                                                <span><?= $text_ban['text_span'] ?></span>
                                                                                                <p><?= $text_ban['text_p'] ?></p>
                                                                                            </div>
                                                                                    </div>
                                                                            </div>
                                                                        <?php break; ?>

                                                                        <?php case 'banner-2': ?>
                                                                            <div class="col-md-5 banner-box2">
                                                                                    <div class="single-product-banner">
                                                                                            <a href="<?= $text_ban['link_description'] ?>"><img src="<?= $text_ban['path'] ?>" alt="Product Banner"></a>
                                                                                            <div class="banner-text banner-2">
                                                                                                    <h2><?= $text_ban['text_h2'] ?><span><?= $text_ban['text_span'] ?></span></h2>
                                                                                                    <p><?= $text_ban['text_p'] ?></p>
                                                                                            </div>
                                                                                    </div>
                                                                            </div>
                                                                        <?php break; ?>
                                                                    <?php endswitch; ?>
                                                                <?php endif; ?>
                                                                <!-- -->
                                                            <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                                
							</div>
						</div>
						<!-- END PRODUCT-BANNER -->
						<!-- START  -->
						<!-- START SMALL-PRODUCT-AREA (1) -->
						<div class="small-product-area">
							<!-- Start Product-Menu -->
							<div class="row">
								<div class="col-xs-12 col-md-12">
									<div class="product-menu">
										<ul role="tablist">
                                                                                    <?php $i_m = 1; 
                                                                                    //debug($market_sort);die();
                                                                                    foreach($market_sort as $market_category): ?>
                                                                                        <?php if((array_search( $market_category, $market_sort) != 'bestseller') && (array_search( $market_category, $market_sort) != 'hot_deals')): ?>
                                                                                            <?php if($i_m == 1): ?>
                                                                                                <li role="presentation" class=" active"><a href="#display-market-<?= $i_m ?>" role="tab" data-toggle="tab"><?= array_search( $market_category, $market_sort) ?></a></li>
                                                                                            <?php else: ?>
                                                                                                <li role="presentation"><a href="#display-market-<?= $i_m ?>" role="tab" data-toggle="tab"><?= array_search( $market_category, $market_sort) ?></a></li>
                                                                                            <?php endif; ?>
                                                                                            <?php $i_m++; ?>
                                                                                        <?php endif; ?>        
                                                                                    <?php endforeach; ?>
                                                                                    
										</ul>
									</div>
								</div>
							</div>
							<!-- End Product-Menu -->
							<!-- Start Product -->
							<div class="row">
								<div class="col-xs-12 col-md-12">
									<div class="product carosel-navigation">
										<div class="tab-content">
											<!-- Product = display-4-1 -->
                                                                                        <?php $i_m = 1; foreach($market_sort as $market_category): ?>
                                                                                            <?php if(array_search( $market_category, $market_sort) != 'bestseller'): ?>
                                                                                                <?php if($i_m == 1): ?>
                                                                                                    <div role="tabpanel" class="tab-pane fade in active" id="display-market-<?= $i_m ?>">
                                                                                                <?php else: ?>
                                                                                                    <div role="tabpanel" class="tab-pane fade" id="display-market-<?= $i_m ?>">
                                                                                                <?php endif; ?>
                                                                                                        <?php $i_m++ ; ?>
                                                                                                        <div class="row">
                                                                                                                <div class="active-small-product">

                                                                                                                    <!-- Start Single-Product -->
                                                                                                                    <?php $var_col = 1; $i_product = 1; $j_product = 3; 
                                                                                                                    foreach($market_category as $market_product): ?>
                                                                                                                        <?php if($var_col == $i_product): ?>
                                                                                                                            <div class="col-xs-12">
                                                                                                                            <?php $i_product = $i_product + 3; ?>
                                                                                                                        <?php endif; ?>

                                                                                                                                <div class="single-product" itemscope itemtype="http://schema.org/Product">
                                                                                                                                        <div class="product-img">
                                                                                                                                                <a href="<?= $market_product['link_description'] ?>">
                                                                                                                                                        <img class="primary-img img_width" src="<?= $market_product['path'] ?>" alt="<?= $market_product['model_product'] ?>">
                                                                                                                                                </a>
                                                                                                                                        </div>
                                                                                                                                        <div class="product-description" >
                                                                                                                                            <h5><a href="<?= $market_product['link_description'] ?>"><?= $market_product['model_product'] ?></a></h5>
                                                                                                                                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="price-box n_price_box">
                                                                                                                                                <span itemprop="priceCurrency" content="RUB"></span>
                                                                                                                                                <span itemprop="price" class="price"><?= $market_product['price'] ?></span>
                                                                                                                                                <!--<span class="old-price"><?php // $market_product['old_price'] ?></span>-->
                                                                                                                                                <span class="number-of-products"><?= $market_product['number_of_products'] ?></span>
                                                                                                                                            </div>
                                                                                                                                            <div itemprop="review" itemscope itemtype="http://schema.org/Review">
                                                                                                                                                <span class="rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" >
                                                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                                                        <i class="fa fa-star-o"></i>
                                                                                                                                                        <span style="display:none">
                                                                                                                                                        <meta itemprop="worstRating" content="1">
                                                                                                                                                        <span>4</span> из
                                                                                                                                                        <span>5</span>
                                                                                                                                                        </span>
                                                                                                                                                </span>
                                                                                                                                            </div>
                                                                                                                                                <div class="product-action">
                                                                                                                                                        <div class="button-group">
                                                                                                                                                                <div class="product-button-2">
                                                                                                                                                                        <a href="#" data-toggle="tooltip" title="Добавить в корзину"><i class="fa fa-shopping-cart shop_add"></i></a>
                                                                                                                                                                        <a href="#" data-toggle="tooltip" title="Понравилось" class="m-heart-o"><i class="fa fa-heart-o"></i></a>
                                                                                                                                                                        <a href="#" data-toggle="tooltip" title="Сравнить" class="compare_product"><i class="fa fa-balance-scale"></i></a>
                                                                                                                                                                </div>
                                                                                                                                                        </div>
                                                                                                                                                </div>
                                                                                                                                        </div>
                                                                                                                                </div>

                                                                                                                        <?php if($var_col == $j_product): ?>
                                                                                                                            </div>
                                                                                                                            <?php $j_product = $j_product + 3; ?>
                                                                                                                        <?php endif; ?>

                                                                                                                        <?php $var_col++; ?>
                                                                                                                    <?php endforeach; ?>

                                                                                                                    <?php $i_prod = ($var_col - 1)%3; ?>
                                                                                                                    <?php if( $i_prod > 0 ): ?>
                                                                                                                        </div>
                                                                                                                    <?php endif; ?>
                                                                                                                    <!-- End Single-Product -->


                                                                                                        </div>
                                                                                                    </div>
                                                                                                    </div>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; ?>
											
										</div>
									</div>									
								</div>
							</div>
							<!-- End Product -->
						</div>
						<!-- END SMALL-PRODUCT-AREA (1) -->
					</div>
				</div>
			</div>
			
		</section>
                
                <!--===== =====-->
                
                <!--===== =====-->
        <!--<script src ="/electronics/web/assets/92856ffb/js/bootstrap.js"></script>-->        
               <!-- jquery
		============================================ -->		
        <script src="/js/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->
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
        <script src="/js/plagins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="/js/main.js"></script>
         <!-- ============================================ -->	
         
        <!-- 
        <script src="/electronics/web/js/dop_function_product.js"></script>
        -->
        <script src="/js/select2.js"></script>
         
        
        <script src="/js/jquery-ui1113.min.js"></script>
        
        <script src="/js/slide_price.js"></script>
        
        <script src="/js/my_cart.js"></script>
        
        <script src="/js/dop_check.js"></script>
        <!-- -->
                <!--
                ============================================ -->		
        
    </body>
</html>
