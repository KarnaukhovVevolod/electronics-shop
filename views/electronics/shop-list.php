<?php 
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<!doctype html>
<html class="no-js" lang="">
    
    <body>

        <!-- Add your site or application content here -->
               <?php 
                    if(isset($search_word)&& isset($category_word))
                    {
                        $this->params['search_word'] = $search_word;
                        $this->params['category_word'] = $category_word;
                    }
               ?>
		<?php $this->params['crumbs'][] = 'Новая продукция' ?>
		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
                                
				<div class="row">
                                    <!-- Меню слева -->
                                        <div class="col-md-3">
                                            <?= app\widgets\category\CategoryWidget::widget(); ?>
                                        </div>
                                    <!-- Меню слева конец -->
					<div class="col-md-9">
						<!-- START PRODUCT-BANNER -->
						<div class="product-banner">
							<div class="row">
								<div class="col-xs-12">
                                                                    <?php //debug($banner);die() ?>
									<?php foreach($banner as $single_banner): ?>
									<div class="banner">
										<a href="<?= $single_banner['link_description'] ?>"><img src="<?= $single_banner['path'] ?>" alt="Product Banner"></a>
									</div>
                                                                        <?php endforeach; ?>
								</div>
							</div>
						</div>
						<!-- END PRODUCT-BANNER -->
						<!-- START PRODUCT-AREA -->
						<div class="product-area">
							<div class="row">
								<div class="col-xs-12">
									<!-- Start Product-Menu -->
                                                                        <?php if(isset($pages)): ?>
									<div class="product-menu">
										<div class="product-title">
											<h3 class="title-group-3 gfont-1">Новая продукция</h3>
										</div>
									</div>
                                                                        <?php endif ; ?>
                                                                        
                                                                        <!-- 
									<div class="product-filter">
										<ul role="tablist">
											<li role="presentation" class="list active">
												<a href="#display-1-1" role="tab" data-toggle="tab"></a>
											</li>
											<li role="presentation"  class="grid ">
												<a href="#display-1-2" role="tab" data-toggle="tab"></a>
											</li>
										</ul>
										<div class="sort">
											<label>Sort By:</label>
											<select>
												<option value="#">Default</option>
												<option value="#">Name (A - Z)</option>
												<option value="#">Name (Z - A)</option>
												<option value="#">Price (Low > High)</option>
												<option value="#">Rating (Highest)</option>
												<option value="#">Rating (Lowest)</option>
												<option value="#">Name (A - Z)</option>
												<option value="#">Model (Z - A))</option>
												<option value="#">Model (A - Z)</option>
											</select>
										</div>
										<div class="limit">
											<label>Show:</label>
											<select>
												<option value="#">8</option>
												<option value="#">16)</option>
												<option value="#">24</option>
												<option value="#">40</option>
												<option value="#">80</option>
												<option value="#">100</option>
											</select>
										</div>
									</div>
									-->
                                                                        
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
											<div role="tabpanel" class="tab-pane fade in active" id="display-1-1">
												<div class="row">
													<div class="listview">
														<!-- Start Single-Product -->
                                                                                                                <?php if($market_sort['new'] != null): ?>
                                                                                                                    <?php foreach($market_sort['new'] as $single_product): ?>
                                                                                                                        <div class="single-product">
                                                                                                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                                                                                                <?php if( $single_product['marketing_products'] == 'new' ): ?>
																<div class="label_new">
																	<span class="new"><?= $single_product['marketing_products'] ?></span>
																</div>
                                                                                                                                <?php endif; ?>
                                                                                                                                <?php if($single_product['discount'] != null): ?>
                                                                                                                                    <div class="sale-off">
                                                                                                                                            <span class="sale-percent"><?= $single_product['discount'] ?></span>
                                                                                                                                    </div>
                                                                                                                                <?php endif; ?>
                                                                                                                                    <div class="product-img">
																	<a href="<?= $single_product['link_description'] ?>">
																		<img class="primary-img" src="<?= $single_product['path'] ?>" alt="Product">
                                                                                                                                                <?php if($single_product['path_2'] != null): ?>
                                                                                                                                                     <!--<img class="secondary-img second-img-show-list" src="< $single_product['path_2'] ?>" alt="Product"> -->
                                                                                                                                                    <img class="second-img-show-list" src="<?= $single_product['path_2'] ?>" alt="Product">
                                                                                                                                                <?php else: ?>
                                                                                                                                                    <!--<img class="secondary-img second-img-show-list" src="< $single_product['path'] ?>" alt="Product"> -->
                                                                                                                                                    <img class="second-img-show-list" src="<?= $single_product['path'] ?>" alt="Product">
                                                                                                                                                <?php endif; ?>
																	</a>
                                                                                                                                    </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-9 col-sm-8 col-xs-12">	
                                                                                                                                    <div class="product-description">
																	<h5><a href="<?= $single_product['link_description'] ?>"><?= $single_product['model_product'] ?></a></h5>
																	<div class="price-box price-box-shop-list " itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                                                                                                                <span itemprop="priceCurrency" content="RUB"></span>
																		<span class="price" itemprop="price"><?= $single_product['price'] ?></span>
																		<span class="old-price"><?= $single_product['old_price'] ?></span>
                                                                                                                                                <span class="number-of-products"><?= $single_product['number_of_products'] ?></span>
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
																	<p class="description"><?php
                                                                                                                                        $description = mb_substr($single_product['description'], 0, 600, 'UTF-8').'...';
                                                                                                                                            echo $description; 
                                                                                                                                         ?></p>
																	<div class="product-action">
																		<div class="button-group">
																			<div class="product-button">
																				<button><i class="fa fa-shopping-cart"></i> Добавить в корзину</button>
																			</div>
																			<div class="product-button-2">
																				<a href="#" data-toggle="tooltip" title="Понравилось" class="m-heart-o"><i class="fa fa-heart-o"></i></a>
																				<a href="#" data-toggle="tooltip" title="Сравнить" class="compare_product" ><i class="fa fa-balance-scale"></i></a>
																				<a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
																			</div>
																		</div>
																	</div>
                                                                                                                                    </div>
                                                                                                                            </div>
                                                                                                                        </div>
														<?php endforeach; ?>
                                                                                                                <?php elseif(isset($search)): ?>
                                                                                                                    <?php if($search != null): ?>
                                                                                                                        <?php foreach($search as $single_product): ?>
                                                                                                                            <div class="single-product">
                                                                                                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                                                                                                    <?php if($single_product['marketing_products'] == 'new'):
//if ($single_product['marketing_products'] != null || $single_product['marketing_products']!=''): ?>
                                                                                                                                        <div class="label_new">
                                                                                                                                                <span class="new"><?= $single_product['marketing_products'] ?></span>
                                                                                                                                        </div>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    <?php if($single_product['discount'] != null): ?>
                                                                                                                                        <div class="sale-off">
                                                                                                                                                <span class="sale-percent"><?= $single_product['discount'] ?></span>
                                                                                                                                        </div>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    <div class="product-img">
                                                                                                                                            <a href="<?= $single_product['link_description'] ?>">
                                                                                                                                                    <img class="primary-img" src="<?= $single_product['path'] ?>" alt="Product">
                                                                                                                                                    <?php if($single_product['path_2'] != null): ?>
                                                                                                                                                        <img class="second-img-show-list" src="<?= $single_product['path_2'] ?>" alt="Product">
                                                                                                                                                    <?php else: ?>
                                                                                                                                                        <img class="second-img-show-list" src="<?= $single_product['path'] ?>" alt="Product">
                                                                                                                                                    <?php endif; ?>
                                                                                                                                            </a>
                                                                                                                                    </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-9 col-sm-8 col-xs-12">	
                                                                                                                                    <div class="product-description">
                                                                                                                                            <h5><a href="<?= $single_product['link_description'] ?>"><?= $single_product['model_product'] ?></a></h5>
                                                                                                                                            <div class="price-box price-box-shop-list" itemprop="offers" itemscope itemtype="http://schema.org/Offer" >
                                                                                                                                                    <span itemprop="priceCurrency" content="RUB"></span>
                                                                                                                                                    <span class="price"><?= $single_product['price'] ?></span>
                                                                                                                                                    <span class="old-price"><?= $single_product['old_price'] ?></span>
                                                                                                                                                    <span class="number-of-products"><?= $single_product['number_of_products'] ?></span>
                                                                                                                                            </div>
                                                                                                                                            <div itemprop="review" itemscope itemtype="http://schema.org/Review">
                                                                                                                                            <span class="rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" >
                                                                                                                                                <meta itemprop="worstRating" content="1">
                                                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                                                    <i class="fa fa-star-o"></i>
                                                                                                                                            </span>
                                                                                                                                            <p class="description"><?php
                                                                                                                                            $description = mb_substr($single_product['description'], 0, 600, 'UTF-8').'...';
                                                                                                                                                echo $description; 
                                                                                                                                             ?></p>
                                                                                                                                            <div class="product-action">
                                                                                                                                                    <div class="button-group">
                                                                                                                                                            <div class="product-button">
                                                                                                                                                                    <button><i class="fa fa-shopping-cart"></i> Добавить в корзину</button>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="product-button-2">
                                                                                                                                                                    <a href="#" data-toggle="tooltip" title="Добавить в избранное"><i class="fa fa-heart-o"></i></a>
                                                                                                                                                                    <a href="#" data-toggle="tooltip" title="Сравнить" class="compare_product" ><i class="fa fa-balance-scale"></i></a>
                                                                                                                                                                    <a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
                                                                                                                                                            </div>
                                                                                                                                                    </div>
                                                                                                                                            </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        <?php endforeach; ?>
                                                                                                                    <?php else: ?>
                                                                                                                    <br>
                                                                                                                        Нет товаров удовлетворяющих поиску
                                                                                                                    <?php endif; ?>
                                                                                                                <?php else:  ?>
                                                                                                                    <br>
                                                                                                                    <p style="margin-left: 15px"> Нет товаров</p>
                                                                                                                <?php endif; ?> 
                                                                                                                <!-- End Single-Product -->
														
													</div>
												</div>
												
											</div>
											<!-- End Product -->
											<!-- Start Product-->
											
											<!-- End Product = TV -->
										</div>
									</div>
									<!-- End Product -->
								</div>
							</div>
						</div>
						<!-- END PRODUCT-AREA -->
					</div>
				</div>
			</div>
			<!-- START BRAND-LOGO-AREA -->
			
			<!-- END BRAND-LOGO-AREA -->
			<!-- START SUBSCRIBE-AREA -->
                        <?php if(isset($pages)): ?>
                        
                            <?= LinkPager::widget(['pagination' => $pages,
                            'options'=> [
                                'class'=>'pagination m_pagination'
                                ],
                            ]) ?>
                        <?php endif; ?>
                        <!-- Форма для поиска начало -->
                        <?php if(isset($form)): ?>
                        <!-- определяем какие страницы показывать -->
                        <?php $start_1 = null; $start_2 = 1; $start_3 = null; $start_4 = null;
                              $start_5 = null; $start_6 = null; $start_7 = null;
                              if($all_page > 0){
                                  $start_6 = $all_page;
                              }
                              if($all_page == 1){
                                  
                              }
                              elseif($all_page == 2){
                                  if($start == 1)
                                  {
                                      $start_7 = $start + 1;
                                      $start_6 = $all_page;
                                  }
                                  else{
                                      $start_1 = 1;
                                      $start_6 = $all_page;
                                  }
                                          
                              }
                              elseif($all_page == 3){
                                  if($start == 1)
                                  {
                                      $start_7 = $start + 1;
                                      $start_6 = 3;
                                      $start_3 = 2;
                                  }
                                  elseif($start == 2){
                                      $start_1 = $start - 1;
                                      $start_6 = 3;
                                      $start_3 = 2;
                                      $start_7 = $start + 1;
                                  }
                                  else{
                                      $start_1 = $start - 1;
                                      $start_6 = 3;
                                      $start_3 = 2;
                                  }
                                  
                              }
                              elseif($all_page == 4){
                                  switch($start){
                                      case 1:
                                          $start_7 = $start + 1;
                                          $start_6 = $all_page;
                                          $start_3 = $start + 1;
                                          $start_4 = $start + 2;
                                          //$start_5 = $start + 3;
                                          break;
                                      case 2:
                                          $start_7 = $start + 1;
                                          $start_6 = $all_page;
                                          $start_3 = $start;
                                          $start_4 = $start + 1;
                                          $start_1 = $start - 1;
                                          break;
                                      case 3:
                                          $start_7 = $start + 1;
                                          $start_6 = $all_page;
                                          $start_3 = $start - 1;
                                          $start_4 = $start;
                                          $start_1 = $start - 1;
                                          break;
                                      case 4:
                                          $start_6 = $all_page;
                                          $start_3 = $start - 2;
                                          $start_4 = $start - 1;
                                          $start_1 = $start - 1;
                                          break;
                                  }
                              }
                              elseif($all_page == 5){
                                  switch($start){
                                      case(1):
                                          $start_7 = $start + 1;
                                          $start_6 = $all_page;
                                          $start_3 = $start + 1;
                                          $start_4 = $start + 2;
                                          $start_5 = $start + 3;
                                          break;
                                      case(2):
                                          $start_7 = $start + 1;
                                          $start_6 = $all_page;
                                          $start_3 = $start ;
                                          $start_4 = $start + 1;
                                          $start_5 = $start + 2;
                                          $start_1 = $start - 1;
                                          break;
                                      case(3):
                                          $start_7 = $start + 1;
                                          $start_6 = $all_page;
                                          $start_3 = $start - 1;
                                          $start_4 = $start;
                                          $start_5 = $start + 1;
                                          $start_1 = $start - 1;
                                          break;
                                      case(4):
                                          $start_7 = $start + 1;
                                          $start_6 = $all_page;
                                          $start_3 = $start - 2;
                                          $start_4 = $start - 1;
                                          $start_5 = $start;
                                          $start_1 = $start - 1;
                                          break;
                                      case(5):
                                          $start_6 = $all_page;
                                          $start_3 = $start - 3;
                                          $start_4 = $start - 2;
                                          $start_5 = $start - 1;
                                          $start_1 = $start - 1;
                                          break;
                                  }
                              }
                              elseif($all_page > 5)
                              {
                                  switch($start){
                                      case(1):
                                          $start_7 = $start + 1;
                                          $start_6 = $all_page;
                                          $start_3 = $start + 1;
                                          $start_4 = $start + 2;
                                          $start_5 = $start + 3;
                                          break;
                                      case(2):
                                          $start_7 = $start + 1;
                                          $start_6 = $all_page;
                                          $start_3 = $start ;
                                          $start_4 = $start + 1;
                                          $start_5 = $start + 2;
                                          $start_1 = $start - 1;
                                          break;
                                      case(3):
                                          $start_7 = $start + 1;
                                          $start_6 = $all_page;
                                          $start_3 = $start - 1;
                                          $start_4 = $start;
                                          $start_5 = $start + 1;
                                          $start_1 = $start - 1;
                                          break;
                                      case($all_page):
                                          $start_6 = $all_page;
                                          $start_3 = $start - 3;
                                          $start_4 = $start - 2;
                                          $start_5 = $start - 1;
                                          $start_1 = $start - 1;
                                          break;
                                      default:
                                          //на убывание
                                        if($all_page - $start == 1){
                                            $start_7 = $start + 1;
                                            $start_6 = $all_page;
                                            $start_3 = $start - 2;
                                            $start_4 = $start - 1;
                                            $start_5 = $start;
                                            $start_1 = $start - 1;
                                        }  
                                        else{
                                            $start_7 = $start + 1;
                                            $start_6 = $all_page;
                                            $start_3 = $start - 1;
                                            $start_4 = $start;
                                            $start_5 = $start + 1;
                                            $start_1 = $start - 1;
                                        }  
                                          
                                          break;
                                      
                                  }
                              }
                              
                                  
                        ?>
                        <?php //debug($start_6) ?>
                        
                        <?php if($start_6 != null && $start_6 > 1): ?>
                        <div class="all_pagination"
                        <!-- сдвиг влево начало -->
                            <div class="pagination-block">
                            <?php if($start_1 != null): ?>
                            
                                <?php $model = ActiveForm::begin([
                                    'action'=>'/electronics/web/index.php?r=electronics%2Fshop-list&page='.$start_1.'&per-page='.$limit
                                ]) ?>
                                <div style="display:none">
                                    <?= $model->field($form, 'category')->textInput(['value'=>$category_word]) ?>

                                    <?= $model->field($form, 'search')->textInput(['value'=>$search_word]) ?>
                                </div>    
                                <div class="form-group">
                                    <?= Html::submitButton("<<", ['class' => 'btn btn-step-pagination-left']) ?>
                                </div>

                                <?php ActiveForm::end() ?>
                            <?php else: ?>
                                <div class="span_disable">
                                    <span class="btn btn-step-pagination-left none_step"><<</span>
                                </div>
                                
                            <?php endif; ?>
                            </div>
                        <!-- сдвиг влево конец -->
                        
                        <!-- первая страница начало -->
                            <div class="pagination-block">
                            <?php $model = ActiveForm::begin([
                                'action'=>'/electronics/web/index.php?r=electronics%2Fshop-list&page='.$start_2.'&per-page='.$limit
                            ]) ?>
                            
                                <div style="display: none">
                                    <?= $model->field($form, 'category')->textInput(['value'=>$category_word]) ?>

                                    <?= $model->field($form, 'search')->textInput(['value'=>$search_word]) ?>
                                </div>
                                <?php if($start == $start_2): ?>
                                    <div class="form-group">
                                        <span class="btn btn-step-pagination-active"><?= $start_2 ?></span>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group">
                                        <?= Html::submitButton($start_2, ['class' => 'btn btn-step-pagination']) ?>
                                    </div>
                                <?php endif; ?>
                            
                            <?php ActiveForm::end() ?>
                            </div>
                        <!-- первая страница конец -->
                        
                        <!-- страница левее центральной начало -->
                        <?php if($start_3 != null): ?>
                            <div class="pagination-block">
                            <?php $model = ActiveForm::begin([
                                'action'=>'/electronics/web/index.php?r=electronics%2Fshop-list&page='.$start_3.'&per-page='.$limit
                            ]) ?>
                            
                                <div style="display:none">
                                    <?= $model->field($form, 'category')->textInput(['value'=>$category_word]) ?>

                                    <?= $model->field($form, 'search')->textInput(['value'=>$search_word]) ?>
                                </div>
                                <?php if($start == $start_3): ?>
                                    <div class="form-group">
                                        <span class="btn btn-step-pagination-active"><?= $start_3 ?></span>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group">
                                        <?= Html::submitButton($start_3, ['class' => 'btn btn-step-pagination']) ?>
                                    </div>
                                <?php endif; ?>
                            
                            <?php ActiveForm::end() ?>
                            </div>
                        <?php endif; ?>
                        <!-- страница левее центральной конец -->
                        
                        <!-- центрральная страница начало -->
                        <?php if($start_4 != null): ?>
                            <div class="pagination-block">
                            <?php $model = ActiveForm::begin([
                                'action'=>'/electronics/web/index.php?r=electronics%2Fshop-list&page='.$start_4.'&per-page='.$limit
                            ]) ?>
                            
                                <div style="display:none">
                                    <?= $model->field($form, 'category')->textInput(['value'=>$category_word]) ?>

                                    <?= $model->field($form, 'search')->textInput(['value'=>$search_word]) ?>
                                </div>
                                <?php if($start == $start_4): ?>
                                    <div class="form-group">
                                        <span class="btn btn-step-pagination-active"><?= $start_4 ?></span>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group">
                                        <?= Html::submitButton($start_4, ['class' => 'btn btn-step-pagination']) ?>
                                    </div>
                                <?php endif; ?>
                            
                            <?php ActiveForm::end() ?>
                            </div>    
                        <?php endif; ?>
                        <!-- центральная страница конец -->
                        
                        <!-- страница правее центральной начало -->
                        <?php if($start_5 != null): ?>
                            <div class="pagination-block">
                            <?php $model = ActiveForm::begin([
                                'action'=>'/electronics/web/index.php?r=electronics%2Fshop-list&page='.$start_5.'&per-page='.$limit
                            ]) ?>
                            
                                <div style="display:none">
                                    <?= $model->field($form, 'category')->textInput(['value'=>$category_word]) ?>

                                    <?= $model->field($form, 'search')->textInput(['value'=>$search_word]) ?>
                                </div>
                                
                                <?php if($start == $start_5): ?>
                                    <div class="form-group">
                                        <span class="btn btn-step-pagination-active"><?= $start_5 ?></span>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group">
                                        <?= Html::submitButton($start_5, ['class' => 'btn btn-step-pagination']) ?>
                                    </div>
                                <?php endif; ?> 
                                
                            <?php ActiveForm::end() ?>
                            </div>
                        <?php endif; ?>
                        <!-- страница правее центральной конец -->
                        
                        <!-- последняя страница начало -->
                            <div class="pagination-block">
                            <?php $model = ActiveForm::begin([
                                'action'=>'/electronics/web/index.php?r=electronics%2Fshop-list&page='.$start_6.'&per-page='.$limit
                            ]) ?>
                            
                                <div style="display:none">
                                    <?= $model->field($form, 'category')->textInput(['value'=>$category_word]) ?>

                                    <?= $model->field($form, 'search')->textInput(['value'=>$search_word]) ?>
                                </div>
                                <?php if($start == $start_6): ?>
                                    <div class="form-group">
                                        <span class="btn btn-step-pagination-active"><?= $start_6 ?></span>
                                    </div>
                                <?php else: ?>
                                    <div class="form-group">
                                        <?= Html::submitButton($start_6, ['class' => 'btn btn-step-pagination']) ?>
                                    </div>
                                <?php endif; ?> 
                                
                            <?php ActiveForm::end() ?>
                            </div>
                        <!-- последняя страница конец -->
                        
                        <!-- сдвиг вправо начало -->
                        <div class="pagination-block">
                        <?php if($start_7 != null): ?>
                            
                            <?php $model = ActiveForm::begin([
                                'action'=>'/electronics/web/index.php?r=electronics%2Fshop-list&page='.$start_7.'&per-page='.$limit
                            ]) ?>
                        
                            <div style="display: none">
                                <?= $model->field($form, 'category')->textInput(['value'=>$category_word]) ?>

                                <?= $model->field($form, 'search')->textInput(['value'=>$search_word]) ?>
                            </div>
                            <div class="form-group">
                                <?= Html::submitButton(">>", ['class' => 'btn btn-step-pagination-right']) ?>
                            </div>
                            
                            <?php ActiveForm::end() ?>
                        
                        <?php else: ?>
                            <div class="span_disable">
                                <span class="btn btn-step-pagination-right none_step">>></span>
                            </div>
                        <?php endif; ?>
                        </div>
                        <!-- сдвиг вправо конец -->
                    </div>
                        <?php endif; ?>
                        <!-- Форма для поиска конец -->
		<?php endif; ?>	
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
        
        <script src="/js/my_cart.js"></script>
        
        <script src="/js/dop_check.js"></script>
                <!--
                ============================================ -->		
        
    </body>
</html>
