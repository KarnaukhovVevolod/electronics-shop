<!doctype html>
<html class="no-js" lang="">
    
    <body>

        <!-- Add your site or application content here -->

		<!-- START PAGE-CONTENT -->
                <section class="page-content" itemtype="http://schema.org/LocalBusiness">
                    <!--
			<div class="container">
                            
                                <div class="row">
					<div class="col-md-12">
						<ul class="page-menu">
							<li><a href="index.html">Home</a></li>
							<li class="active"><a href="#">About Us</a></li>
						</ul>
					</div>
				</div>
			</div>
                    -->
                    <?php 
                        if(isset($seo_search['teg_title']))
                        {
                            //заполняем meta tag для SEO-поиска
                            $this->title = $seo_search['teg_title'];
                            $this->registerMetaTag(['name'=>'description','content'=>$seo_search['teg_description']]);
                            $this->registerMetaTag(['name'=>'keywords','content'=>$seo_search['teg_keywords']]);
                        }
                    ?>
                    
                    <?php $this->params['crumbs'][] = 'О компании' ?>
			<!-- Start About-Area -->
			<div class="about-area">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="f-title text-center">
                                                            <h3>О нас "<span itemprop="name"> <?= $about_company[0]['name_company'] ?></span> "</h3>
                                                            <!--<h3 class="title text-uppercase">О Компании</h3>-->
							</div>
						</div>
					</div>
                                        <?php foreach($about_company as $about_company): ?>
                                            <div class="row">
                                                
						<div class="col-md-7 col-sm-12 col-xs-12">
                                                    <div itemprop="description" class="about-page-cntent">
                                                            
								<h3><?= $about_company['heading'] ?></h3>
                                                                <!--
								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
								<blockquote>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>
								</blockquote>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi malesuada vestibulum. Phasellus tempor nunc eleifend cursus molestie. Mauris lectus arcu, pellentesque at sodales sit amet, condimentum id nunc. Donec ornare mattis suscipit. Praesent fermentum accumsan vulputate.</p>
                                                                -->
                                                                <?= $about_company['text'] ?>
                                                                
                                                        </div>
                                                    
						</div>
						<div class="col-md-5 col-sm-12 col-xs-12">
							<div class="img-element">
								<img alt="<?= $about_company['name_company'] ?>" src="<?= $about_company['path'] ?>">
							</div>
						</div>
                                                <div style="display:none" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                                    <span itemprop="addressRegion"><?= $about_company['region_company'] ?></span>
                                                    <span itemprop="addressLocality"><?= $about_company['item_company'] ?></span>
                                                    <span itemprop="street_company"><?= $about_company['street_company'] ?></span>
                                                    <span itemprop="postalCode"><?= $about_company['post_code'] ?></span>
                                                </div>
                                                <span style="display:none" itemprop="telephone"><?= $about_company['telephone_company'] ?></span>
                                            </div>
                                        <?php endforeach  ?>
				</div>
			</div>
			<!-- End About-Area -->
			<!-- Start Our-Team -->
			<div class="our-team">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="f-title text-center">
								<h3 class="title text-uppercase">Наши сотрудники</h3>
							</div>
						</div>
					</div>
                                    <div class="row" itemscope itemtype="http://schema.org/Person">
                                            <?php foreach ($info_employee as $employee): ?>
						<div class="col-md-3 col-sm-3">
							<div class="item-team text-center">
								<div class="team-info">
									<div class="team-img">
                                                                            <img alt="<?= $employee['name'].' '.$employee['surname'] ?>" class="img-responsive" src="<?= $employee['path'] ?>" style="height: 100% !important">
										<div class="mask">
											<div class="mask-inner">
                                                                                            <?php if( $employee['facebook'] != NULL ): ?>
												<a href="<?= $employee['facebook'] ?>"><i class="fa fa-facebook"></i></a>
                                                                                            <?php endif; ?>
                                                                                            <?php if( $employee['twitter'] != NULL ): ?>    
												<a href="<?= $employee['twitter'] ?>"><i class="fa fa-twitter"></i></a>
                                                                                            <?php endif; ?>
                                                                                            <?php if( $employee['vk'] != NULL ): ?>
												<a href="<?= $employee['vk'] ?>"><i class="fa fa-vk"></i></a>
                                                                                            <?php endif; ?>
                                                                                            <?php if( $employee['ok'] != NULL ): ?>    
												<a href="<?= $employee['ok'] ?>"><i class="fa fa-odnoklassniki"></i></a>
                                                                                            <?php endif; ?>
                                                                                            <?php if( $employee['instagram'] != NULL ): ?>
												<a href="<?= $employee['instagram'] ?>"><i class="fa fa-instagram"></i></a>
                                                                                            <?php endif; ?>
											</div>
										</div>
									</div>
								</div>
								<h4 itemprop="name"><?= $employee['name'].' '.$employee['surname'] ?></h4>
                                                                <?php if(isset($employee['position_n'])): ?>
                                                                    <?php foreach ($employee['position_n'] as $position): ?>
                                                                        <h5><?= $position['position'] ?></h5>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>    
							</div>
						</div>
                                            <?php endforeach; ?>
                                            
                                            <!--
						<div class="col-md-3 col-sm-3">
							<div class="item-team text-center">
								<div class="team-info">
									<div class="team-img">
										<img alt="Team" class="img-responsive" src="img/about/2.jpg">
										<div class="mask">
											<div class="mask-inner">
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
											</div>
										</div>
									</div>
								</div>
								<h4>Luka Biglia</h4>
								<h5>Programmer</h5>
							</div>
						</div>
                                            <!--
						<div class="col-md-3 col-sm-3">
							<div class="item-team text-center">
								<div class="team-info">
									<div class="team-img">
										<img alt="Team" class="img-responsive" src="img/about/1.jpg">
										<div class="mask">
											<div class="mask-inner">
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
											</div>
										</div>
									</div>
								</div>
								<h4>Anzo Perez</h4>
								<h5>Designer</h5>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="item-team text-center">
								<div class="team-info">
									<div class="team-img">
										<img alt="Team" class="img-responsive" src="img/about/2.jpg">
										<div class="mask">
											<div class="mask-inner">
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
											</div>
										</div>
									</div>
								</div>
								<h4>Martin Demichelis</h4>
								<h5>PHP Developer</h5>
							</div>
						</div>
                                            -->
                                            
					</div>
				</div>
			</div>
			<!-- End Our-Team -->
			
		</section>
		<!-- END PAGE-CONTENT -->
        

		<!-- jquery
		============================================ -->		
        <script src="/js/jquery-1.11.3.min.js"></script>
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
    </body>
</html>
