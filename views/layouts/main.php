<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
//use Yii;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?php $this->registerCsrfMetaTags() ?>
    
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    
    <!-- HEADER-AREA START -->
        <header class="header-area">
                <!-- HEADER-TOP START -->
                <div class="header-top hidden-xs">
                        <div class="container">
                                <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="top-menu">
                                                        <!-- Start Language -->
                                                        <!--
                                                        <ul class="language">
                                                                <li><a href="#"><img class="right-5" src="img/flags/gb.png" alt="#">English<i class="fa fa-caret-down left-5"></i></a>
                                                                        <ul>
                                                                                <li><a href="#"><img class="right-5" src="img/flags/fr.png" alt="#">French</a></li>
                                                                                <li><a href="#"><img class="right-5" src="img/flags/gb.png" alt="#">English</a></li>
                                                                                <li><a href="#"><img class="right-5" src="img/flags/gb.png" alt="#">English</a></li>
                                                                        </ul>
                                                                </li>
                                                        </ul>
                                                        -->
                                                        <!-- End Language -->
                                                        <!-- Start Currency -->
                                                        <ul class="currency">
                                                            <!--
                                                                <li><a href="#"><strong>$</strong> USD<i class="fa fa-caret-down left-5"></i></a>
                                                                        <ul>
                                                                                <li><a href="#">$ EUR</a></li>
                                                                                <li><a href="#">$ GBP</a></li>
                                                                                <li><a href="#">$ USD</a></li>
                                                                        </ul>
                                                                </li>
                                                            -->
                                                        </ul>
                                                        <!-- End Currency -->
                                                        <p class="welcome-msg">?????????????? ?????????????????????? ?????????????? ???????????????? </p>
                                                </div>
                                                <!-- Start Top-Link -->
                                                <div class="top-link">
                                                        <ul class="link">
                                                                
                                                                <li><a href="<?= Url::to(['/user/default/my-account']) ?>"><i class="fa fa-user"></i>?????? ??????????????</a></li>
                                                                
                                                                <!--  -->
                                                                <?php if(Yii::$app->session->has('compare_session')): ?>
                                                                    <?php $count = count(Yii::$app->session->get('compare_session')); ?>
                                                                    <?php if($count > 0): ?>
                                                                        <li><a href="<?= Url::to(['/electronics/compare']) ?>"><i class="fa fa-balance-scale compare_main act_compare"></i> ???????????????? <span>(<?= $count ?>)</span></a></li>
                                                                    <?php else: ?>
                                                                        <li><a href="<?= Url::to(['/electronics/compare']) ?>"><i class="fa fa-balance-scale compare_main"></i> ???????????????? <span></span></a></li>
                                                                
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <li><a href="<?= Url::to(['/electronics/compare']) ?>"><i class="fa fa-balance-scale compare_main"></i> ???????????????? <span></span></a></li>
                                                                
                                                                <?php endif ;?>
                                                                <!--  -->
                                                                
                                                                <?php if(Yii::$app->session->has('data_wish')): ?>
                                                                    <?php $count = count(Yii::$app->session->get('data_wish')); ?>
                                                                    <?php if($count > 0): ?>
                                                                        <li><a href="<?= Url::to(['/electronics/wishlist']) ?>"><i class="fa fa-heart-o act_wish "></i><span>???????????????? ???????????? (<?= $count ?>)</span> </a></li>
                                                                    <?php else: ?>
                                                                        <li><a href="<?= Url::to(['/electronics/wishlist']) ?>"><i class="fa fa-heart-o "></i><span>???????????????? ???????????? (0)</span> </a></li>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <li><a href="<?= Url::to(['/electronics/wishlist']) ?>"><i class="fa fa-heart-o "></i><span>???????????????? ???????????? (0)</span> </a></li>
                                                                <?php endif ;?>
                                                                <?php //if( Yii::$app->user->isGuest == false): ?>
                                                                <li><a href="<?= Url::to(['/electronics/checkout']) ?>"><i class="fa fa-cart-arrow-down"></i> ???????????????????? ????????????</a></li>
                                                                <?php //endif; ?>
                                                                <li><a href="<?= Url::to(['/electronics/account']) ?>"><i class="fa fa-unlock-alt"></i> ????????????????????????????????????</a></li>
                                                        </ul>
                                                </div>
                                                <!-- End Top-Link -->
                                        </div>
                                </div>
                        </div>
                </div>
                <!-- HEADER-TOP END -->
                <!-- HEADER-MIDDLE START -->
                <div class="header-middle">
                        <div class="container">
                                <!-- Start Support-Client -->
                                <div class="support-client hidden-xs">
                                        <div class="row">
                                                <!-- Start Single-Support -->
                                                <div class="col-md-3 hidden-sm">
                                                        <div class="single-support">
                                                                <div class="support-content">
                                                                        <i class="fa fa-calendar "></i>
                                                                        <div class="support-text">
                                                                                <h1 class="zero gfont-1">?????????? ????????????</h1>
                                                                                <p>????-????: 9.00 - 18.00</p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <!-- End Single-Support -->
                                                <!-- Start Single-Support -->
                                                <div class="col-md-3 col-sm-4">
                                                        <div class="single-support">
                                                                <i class="fa fa-truck"></i>
                                                                <div class="support-text">
                                                                        <h1 class="zero gfont-1">???????????????????? ????????????</h1>
                                                                        <p>?????????? ???? ?????????? ???? 5 000 ??????</p>
                                                                </div>
                                                        </div>
                                                </div>
                                                <!-- End Single-Support -->
                                                <!-- Start Single-Support -->
                                                <div class="col-md-3 col-sm-4">
                                                        <div class="single-support">
                                                                <i class="fa fa-rouble"></i>
                                                                <div class="support-text">
                                                                        <h1 class="zero gfont-1">?????????????? ??????????</h1>
                                                                        <p>?? ?????????????? 30 ???????? ?????????? ????????????????</p>
                                                                </div>
                                                        </div>
                                                </div>
                                                <!-- End Single-Support -->
                                                <!-- Start Single-Support -->
                                                <div class="col-md-3 col-sm-4">
                                                        <div class="single-support">
                                                                <i class="fa fa-mobile"></i>
                                                                <div class="support-text">
                                                                        <h1 class="zero gfont-1">??????????????: +7(916)-576-94-58</h1>
                                                                        <p>???????????????? ?????????? ???????????? ?????????? ???????????? ! </p>
                                                                </div>
                                                        </div>
                                                </div>
                                                <!-- End Single-Support -->
                                        </div>
                                </div>
                                <!-- End Support-Client -->
                                <!-- Start logo & Search Box -->
                                <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                                <div class="logo">
                                                        <a href="index.php" title="????????????????"><img src="/img/logo_01.png" alt="????????????????"></a>
                                                </div>
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                            <div class="quick-access">
                                <div class="search-by-category">
                                    <!-- --
                                        <div class="search-container">
                                         
                                                <select>
                                                        <option class="all-cate">All Categories</option>
                                                                                <optgroup  class="cate-item-head" label="Cameras & Photography">
                                                                                        <option class="cate-item-title">Handbags</option>
                                                                                        <option class="c-item">Blouses And Shirts</option>
                                                                                        <option class="c-item">Clouthes</option>
                                                                                </optgroup>
                                                                                <optgroup  class="cate-item-head" label="Laptop & Computer">
                                                                                        <option class="cate-item-title">Apple</option>
                                                                                        <option class="c-item">Dell</option>
                                                                                        <option class="c-item">Hp</option>
                                                                                        <option class="c-item">Sony</option>
                                                                                </optgroup>
                                                                                <optgroup  class="cate-item-head" label="Electronic">
                                                                                        <option class="c-item">Mobile</option>
                                                                                        <option class="c-item">Speaker</option>
                                                                                        <option class="c-item">Headphone</option>
                                                                                </optgroup>
                                                </select>
                                
                                        </div>
                                        <div class="header-search">
                                                <form action="#">
                                                        <input type="text" placeholder="Search">
                                                        <button type="submit"><i class="fa fa-search"></i></button>
                                                </form>
                                        </div>
                                    <!---->
                                    <?php if (isset($this->params['search_word']) && isset($this->params['category_word']) ): ?>
                                        <?= app\widgets\search\SearchWidget::widget(['category_word'=>$this->params['category_word'],'search_word'=>$this->params['search_word']]) ?>
                                    <?php else: ?>
                                        <?= app\widgets\search\SearchWidget::widget() ?>
                                    <?php endif; ?>
                                </div>
                                <div class="top-cart">
                                        <ul>
                                                <li>
                                                        <a href="<?= Url::to(['/electronics/cart']) ?>">
                                                                <span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
                                                                <span class="cart-total">
                                                                        <span class="cart-title">??????????????</span>
                                                                        <span class="cart-item"> <!--2 item(s)- -->
                                                                            <?php $session = Yii::$app->session; ?>
                                                                            <?php if($session->has('data_product')): ?>
                                                                                <?php $data_product = $session->get('data_product'); ?> 
                                                                                <?= $data_product['data'][0] ?>
                                                                            <?php endif; ?>
                                                                        </span>
                                                                        <span class="top-cart-price"><!--365--></span>
                                                                </span>
                                                        </a>
                                                                                <div class="mini-cart-content">
                                                                                    
                                                                                    <div style="display: none"> 
                                                                                        <div class="cart-img-details">
                                                                                                <div class="cart-img-photo">
                                                                                                        <a href="#"><img src="" alt="#"></a>
                                                                                                </div>
                                                                                                <div class="cart-img-content">
                                                                                                        <a href="#"><h4></h4></a>
                                                                                                        <span>
                                                                                                                <strong class="text-right">0</strong>
                                                                                                                <strong class="cart-price text-right">0</strong>
                                                                                                        </span>
                                                                                                </div>
                                                                                                
                                                                                                <div class="pro-new">
                                                                                                        <!--<a href="#"><i class="fa fa-times"></i></a>-->
                                                                                                    <i class="fa fa-times"></i>
                                                                                                </div>   
                                                                                            <span class="number_of_product_cart"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                        <div class="cart_past">
                                                                                            
                                                                                            <?php if($session->has('data_product')): ?>
                                                                                                
                                                                                                <?php foreach($data_product['data'] as $data_session): ?>
                                                                                                    <?php if($data_session != end($data_product['data']) && $data_session != reset($data_product['data'])): ?>
                                                                                                        <div class="cart-img-details">
                                                                                                            <div class="cart-img-photo">
                                                                                                                    <a href="<?= $data_session[4] ?>"><img src="<?= $data_session[2] ?>" alt="#"></a>
                                                                                                            </div>
                                                                                                            <div class="cart-img-content">
                                                                                                                    <a href="<?= $data_session[4] ?>"><h4><?= $data_session[0] ?></h4></a>
                                                                                                                    <span>
                                                                                                                            <strong class="text-right"><?= $data_session[1] ?></strong>
                                                                                                                            <strong class="cart-price text-right"><?= $data_session[3] ?></strong>
                                                                                                                    </span>
                                                                                                            </div>

                                                                                                            <div class="pro-new">
                                                                                                                    <!--<a href="#"><i class="fa fa-times"></i></a>-->
                                                                                                                <i class="fa fa-times"></i>
                                                                                                            </div>   
                                                                                                            <span class="number_of_product_cart"><?= $data_session[5] ?></span>
                                                                                                        </div>
                                                                                                    <?php endif; ?>
                                                                                                <?php endforeach; ?> 
                                                                                            <?php endif; ?>
                                                                                        
                                                                                        
                                                                                            
                                                                                        </div>
                                                                                        <div class="cart-inner-bottom">
                                                                                                <span class="total">
                                                                                                        ??????????:
                                                                                                        <span class="amount">
                                                                                                            <?php if($session->has('data_product')): ?>
                                                                                                                <?= end($data_product['data']) ?>
                                                                                                            <?php endif; ?>
                                                                                                        </span>
                                                                                                </span>
                                                                                                <span class="cart-button-top">
                                                                                                        <a href="<?= Url::to(['/electronics/cart']) ?>">?????????????????????? ??????????????</a>
                                                                                                        <a href="<?= Url::to(['/electronics/checkout']) ?>">???????????????????? ????????????</a>
                                                                                                        
                                                                                                </span>
                                                                                        </div>
                                                                                    
                                                                                </div>
                                                </li>
                                                
                                        </ul>
                                    
                                </div>
                                
                                <!--<div class="pro-new"> ???????????? </div>-->
                            </div>
                        </div>
                                </div>
                                <!-- End logo & Search Box -->
                        </div> 
                </div>
                <!-- HEADER-MIDDLE END -->
                <!-- START MAINMENU-AREA -->
                <div class="mainmenu-area">
                        <div class="container">
                                <div class="row">
                                        <div class="col-md-12">
                                                <div class="mainmenu hidden-sm hidden-xs">
                                                        <nav>
                                                                <ul>
                                                                    <!--
                                                                    <li><a href="< Url::to(['/site/index']) ?>">?????? yii2</a></li>
                                                                    <li><a href="< Url::to(['/site/about']) ?>">?? yii2</a></li>
                                                                    <li><a href="< Url::to(['/site/contact']) ?>">?????????????? yii2</a></li>
                                                                    <li><a href="< Url::to(['/electronics/index']) ?>">?????????????????????? ??????</a></li>
                                                                    <li><a href="< Url::to(['/site/index']) ?>">??????</a></li> -->
                                                                        <li><a href="<?= Url::to(['/electronics/index']) ?>">??????????????</a></li>
                                                                        <li><a href="<?= Url::to(['/electronics/about']) ?>">?? ????????????????</a></li>
                                                                        <!--
                                                                        <li class="hot"><a href="<?php // Url::to(['/electronics/shop']) ?>">???????????????????? ??????????????????</a></li> -->
                                                                        <li class="new"><a href="<?= Url::to(['/electronics/shop-list']) ?>">?????????? ??????????????????</a></li>
                                                                        <!--<li><a href="<?php // Url::to(['/electronics/shop']) ?>">?????????????????????? ??????????????????</a></li>-->
                                                                        <!--
                                                                        <li><a href="#">????????????????</a>
                                                                                <ul><?php/*
                                                                                        <li><a href="<?= Url::to(['/electronics/cart']) ?>">??????????????</a></li>
                                                                                        <li><a href="<?= Url::to(['/electronics/checkout']) ?>">Checkout</a></li>
                                                                                        <li><a href="<?= Url::to(['/electronics/account']) ?>">?????????????? ??????????????</a></li>
                                                                                        <li><a href="<?= Url::to(['/electronics/my-account']) ?>">?????? ??????????????</a></li>
                                                                                        <li><a href="<?= Url::to(['/electronics/product-details']) ?>">???????????? ????????????????</a></li>
                                                                                        <li><a href="<?= Url::to(['/electronics/shop']) ?>">Shop Grid View</a></li>
                                                                                        <li><a href="<?= Url::to(['/electronics/shop-list']) ?>">Shop List View</a></li>
                                                                                        <li><a href="<?= Url::to(['/electronics/wishlist']) ?>">Wish List</a></li>
                                                                                               */ ?>
                                                                                </ul>
                                                                        </li>-->
                                                                        <li><a href="<?= Url::to(['/electronics/contact']) ?>">????????????????</a></li>
                                                                    <?php if( Yii::$app->user->isGuest == false && Yii::$app->user->identity->username != 'admin' ): ?>

                                                                        <li><a href="<?= Url::to(['/site/logout']) ?>" data-method="post">
                                                                                  <?= Yii::$app->user->identity['username'] ?> ?????????? 
                                                                            </a>
                                                                        </li>
                                                                    <?php else : ?>
                                                                        <?php if(Yii::$app->user->can('canAdmin') ):
                                                                        //if(Yii::$app->user->identity->username == 'admin'): ?>
                                                                        <li><a href="<?= Url::to(['/site/logout']) ?>" data-method="post">
                                                                                <?= Yii::$app->user->identity['username'] ?> ?????????? </a></li>
                                                                        
                                                                        <li><a href="<?= Url::to(['/admin/adressuser/index']) ?>"> ???????????? ?????????????????????????? </a></li>
                                                                        <li><a href="<?= Url::to(['/admin/bannerim/index']) ?>"> ???????????? ???????? </a></li> 
                                                                        <li><a href="<?= Url::to(['/admin/bannerscroll/index']) ?>"> ???????????? ???????????? </a></li>
                                                                        <li><a href="<?= Url::to(['/admin/bannertx/index']) ?>"> ???????????? ?????????? </a></li>
                                                                        
                                                                        <li><a href="<?= Url::to(['/admin/category/index', 'section'=>'category']) ?>"> ?????????????????? </a></li>
                                                                        <li><a href="<?= Url::to(['/admin/categorybanner/index']) ?>"> ???????????? ?????????????????? </a></li>
                                                                        <li><a href="<?= Url::to(['/admin/comment/index']) ?>"> ?????????????????????? </a></li>
                                                                        <li><a href="<?= Url::to(['/admin/historyuser/index']) ?>"> ?????????????? ?????????????? ???????????????????????? </a></li>

                                                                        
                                                                        <li><a href="<?= Url::to(['/admin/pointdelivery/index']) ?>">?????????? ????????????</a></li>  
                                                                        <li><a href="<?= Url::to(['/admin/productbanner/index']) ?>">???????????? ????????????????</a></li>
                                                                        
                                                                        <!-- -->
                                                                        <li><a href="<?= Url::to(['/admin/notebook/index']) ?>">????????????????</a></li>
                                                                        <li><a href="<?= Url::to(['/admin/tablet/index']) ?>">??????????????</a></li>
                                                                        <li><a href="<?= Url::to(['/admin/audio/index']) ?>">??????????</a></li>
                                                                        <li><a href="<?= Url::to(['/admin/camera/index']) ?>">???????????? (????????????????????????)</a></li>
                                                                        <li><a href="<?= Url::to(['/admin/tv/index']) ?>">????????????????????</a></li>
                                                                        <li><a href="<?= Url::to(['/admin/smartiphone/index']) ?>">????????????????</a></li>
                                                                        <li><a href="<?= Url::to(['/admin/videocamera/index']) ?>">??????????????????????</a></li>
                                                                        <!-- -->
                                                                        
                                                                        
                                                                        <li><a href="<?= Url::to(['/admin/user/index']) ?>">???????????????????????? security</a></li>
                                                                        <li><a href="<?= Url::to(['/admin/usershop/index']) ?>">???????????? ????????????????????????</a></li>
                                                                        <li><a href="<?= Url::to(['/admin/wishuser/index']) ?>">?????????????? ???????????????? ????????????????????????</a></li>
                                                 
                                                                        <li><a href="<?= Url::to(['/admin/managershop/order']) ?>">???????????? ????????????</a></li>
                                                                        <li><a href="<?= Url::to(['/admin/editinginfo/index','section'=>'about']) ?>"> ?????????????????????????? ???????????????????? ?? ???????????????? </a></li>
                                                                        <li><a href="<?= Url::to(['/admin/editinginfo/index','section'=>'employee']) ?>"> ?????????????????????????? ???????????????????? ?? ???????????????????????? </a></li> 
                                                                        <li><a href="<?= Url::to(['/admin/image/index']) ?>"> ???????????????????????????? ???????? (????????????????) </a></li>
                                                                        <!--<li><a href="<?php // Url::to(['/admin/managershop/index']) ?>">??????????</a></li>-->
                                                 
                                                                        <?php else: ?>
                                                                            <li><a href="<?= Url::to(['/user'])?>">????????</a></li>
                                                                        <?php endif; ?>
                                                                        

                                                                    <?php endif; ?>
                                                                        
                                                                </ul>
                                                        </nav>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <!-- END MAIN-MENU-AREA -->
                <!-- Start Mobile-menu -->
                <div class="mobile-menu-area hidden-md hidden-lg">
                        <div class="container">
                                <div class="row">
                                        <div class="col-xs-12">
                                                <nav id="mobile-menu">
                                                        <ul>
                                                                <li><a href="<?= Url::to(['/electronics/index']) ?>">??????????????</a></li>
                                                                <li><a href="<?= Url::to(['/electronics/about']) ?>">?? ????????????????</a></li>
                                                                <!--<li class="hot"><a href="<?php // Url::to(['/electronics/shop']) ?>">???????????????????? ??????????????????</a></li>-->
                                                                <li class="new"><a href="<?= Url::to(['/electronics/shop-list']) ?>">?????????? ??????????????????</a></li>
                                                                <li><a href="<?= Url::to(['/electronics/cart']) ?>">??????????????</a></li>
                                                                <li><a href="<?= Url::to(['/electronics/account']) ?>"><i class="fa fa-unlock-alt"></i> ????????????????????????????????????</a></li>
                                                                <li><a href="<?= Url::to(['/electronics/checkout']) ?>"><i class="fa fa-cart-arrow-down"></i> ???????????????????? ????????????</a></li>
                                                                <?php if(Yii::$app->user->isGuest == true): ?>
                                                                <li><a href="<?= Url::to(['/site/login']) ?>">????????</a></li>
                                                                <?php endif; ?>
                                                                <?php  ?>
                                                                    <?php if( Yii::$app->user->isGuest == false && Yii::$app->user->identity->username != 'admin' ): ?>

                                                                        <li><a href="<?= Url::to(['/site/logout']) ?>" data-method="post">
                                                                                <div class="icon-text-use">  <?= Yii::$app->user->identity['username'] ?> ?????????? </div>
                                                                            </a>
                                                                        </li>
                                                                    <?php else : ?>
                                                                        <?php if(Yii::$app->user->can('canAdmin') ):
                                                                        //if(Yii::$app->user->identity->username == 'admin'): ?>
                                                                        <li><a href="<?= Url::to(['/site/logout']) ?>" data-method="post">
                                                                                <?= Yii::$app->user->identity['username'] ?> ?????????? </a></li>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>    
                                                                                <li><a href="<?= Url::to(['/user/default/my-account']) ?>">?????? ??????????????</a></li>
                                                                                <li><a href="<?= Url::to(['/electronics/wishlist']) ?>">???????????? ???????????????? ??????????????????</a></li>
                                                                <li><a href="#">??????????????????</a>
                                                                        <ul>
                                                                                <!--
                                                                                <li><a href="<?php // Url::to(['/electronics/product-details']) ?>">???????????? ????????????????</a></li>
                                                                                <li><a href="<?php // Url::to(['/electronics/shop']) ?>">Shop Grid View</a></li>
                                                                                <li><a href="<?php //Url::to(['/electronics/shop-list']) ?>">Shop List View</a></li>-->
                                                                                
                                                                                <?= app\widgets\category\CategoryWidget::widget(['mobile'=>1]); ?>
                                                                        </ul>
                                                                                        
                                                                </li>
                                                                <li><a href="<?= Url::to(['/electronics/contact']) ?>">????????????????</a></li>
                                                        </ul>
                                                   
                                                </nav>
                                        </div>
                                </div>
                        </div>
                </div>
                <!-- End Mobile-menu -->
        </header>
    <!-- HEADER AREA END -->

    <div class="container">
        
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['crumbs']) ? $this->params['crumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
    <br>
    <br>
<!-- my footer -->
    <!-- END HOME-PAGE-CONTENT -->
    <!-- FOOTER-AREA START -->
    <footer class="footer-area">
            <!-- Footer Start -->
            <div class="footer">
                    <div class="container">
                            <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="footer-title">
                                                    <h5>?????? ??????????????</h5>
                                            </div>
                                            <nav>
                                                    <ul class="footer-content">
                                                            <li><a href="<?= Url::to(['/user/default/my-account']) ?>">?????? ??????????????</a></li>
                                                            <li><a href="<?= Url::to(['/user/default/my-account']) ?>">?????????????? ??????????????</a></li>
                                                            <li><a href="<?= Url::to(['/electronics/wishlist']) ?>">???????????????? ????????????</a></li>
                                                            <!--<li><a href="#">Search Terms</a></li>
                                                            <li><a href="#">Returns</a></li>-->
                                                    </ul>
                                            </nav>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="footer-title">
                                                    <h5>????????????</h5>
                                            </div>
                                            <nav>
                                                    <ul class="footer-content">
                                                        
                                                            <li><a href="<?= Url::to(['/electronics/contact']) ?>">????????????????</a></li>
                                                            <li><a href="<?= Url::to(['/electronics/about']) ?>">?? ????????????????</a></li>
                                                            <li><a href="<?= Url::to(['/electronics/contact']) ?>">????????????????</a></li>
                                                            <!--
                                                            <li><a href="#">Privacy Policy</a></li>
                                                            <li><a href="#">Terms & Conditions</a></li>
                                                            -->
                                                    </ul>
                                            </nav>
                                    </div>
                                    <div class="col-xs-12 hidden-sm col-md-3">
                                        <!-- -->
                                            <div class="footer-title">
                                                    <h5>????????????</h5>
                                            </div>
                                            <nav>
                                                    <ul class="footer-content">
                                                            <li><a href="<?= Url::to(['/electronics/shop-list']) ?>">?????????????? ??????????????????</a></li>
                                                            <li><a href="<?= Url::to(['/electronics/compare']) ?>">?????????????????? ??????????????</a></li>
                                                            <li><a href="<?= Url::to(['/electronics/checkout']) ?>">???????????????????? ????????????</a></li>
                                                            
                                                            <!--
                                                            <li><a href="#">Gift Vouchers</a></li>
                                                            <li><a href="#">Affiliates</a></li>
                                                            <li><a href="shop-list.html">Specials</a></li>
                                                            <li><a href="#">Search Terms</a></li>
                                                            -->
                                                    </ul>
                                            </nav>
                                        
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                            <div class="footer-title">
                                                    <h5>?????????? ????????????????</h5>
                                            </div>
                                            <nav>
                                                    <ul class="footer-content box-information">
                                                            <li>
                                                                    <i class="fa fa-home"></i><span>???????????? ?????? ??????????</span>
                                                            </li>
                                                            <li>
                                                                    <i class="fa fa-envelope-o"></i><p><a href="<?= Url::to(['/electronics/contact']) ?>">admin_adress.com</a></p>
                                                            </li>
                                                            <li>
                                                                    <i class="fa fa-phone"></i>
                                                                    <span>+7(916)-576-94-58</span> <br> <span> +7(916)-576-94-58</span>
                                                            </li>
                                                    </ul>
                                            </nav>
                                    </div>
                            </div>
                    </div>				
            </div>
            <!-- Footer End -->
            <!-- Copyright-area Start -->
            <div class="copyright-area">
                    <div class="container">
                            <div class="row">
                                    <div class="col-md-12">
                                            <div class="copyright">
                                                
                                                    
                                                    <p>&COPY; ?????????????????? ??????????????</p>
                                                    <div class="payment">
                                                            <a href="#"><img src="img/payment.png" alt="Payment"></a>
                                                    </div>
                                                
                                               <!-- <p>&COPY; ?????????????????? ??????????????</p> -->
                                            </div>
                                    </div>
                            </div>
                    </div>
            </div>
            <!-- Copyright-area End -->
    </footer>
    <!-- FOOTER-AREA END -->	
    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
       <!-- Modal -->
       <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="modal-product">
                                                    <div class="product-images">
                                                            <div class="main-image images">
                                                                    <img alt="#" src=""/>
                                                            </div>
                                                    </div><!-- .product-images -->

                                                    <div class="product-info">
                                                            <h1></h1>
                                                            <div class="price-box-3">
                                                                    <hr />
                                                                    <div class="s-price-box">
                                                                            <span class="new-price"></span>
                                                                            <span class="old-price"></span>
                                                                    </div>
                                                                    <hr />
                                                            </div>
                                                            <a href="shop.html" class="see-all">???????????? ??????????????????</a> <div style="float:right">?? ?????????????? <span class="number_of_product_modal"></span></div>
                                                            <div class="quick-add-to-cart">
                                                                    <!--<form method="post" class="cart"> -->        
                                                                            <div class="numbers-row">
                                                                                    <input type="number" id="french-hens" min="1" value="1" max="">
                                                                            </div>
                                                                            <button class="single_add_to_cart_button" type="submit">???????????????? ?? ??????????????</button>
                                                                    <!-- </form> -->  
                                                                    
                                                            </div>
                                                            <div class="quick-desc">
                                                                    
                                                            </div>
                                                            <!--
                                                            <div class="social-sharing">
                                                                    <div class="widget widget_socialsharing_widget">
                                                                            <h3 class="widget-title-modal">Share this product</h3>
                                                                            <ul class="social-icons">
                                                                                    <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                                                                                    <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
                                                                                    <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                                                                                    <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                                                                                    <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                                                                            </ul>
                                                                    </div>
                                                            </div>
                                                            -->
                                                    </div><!-- .product-info -->
                                            </div><!-- .modal-product -->
                                    </div><!-- .modal-body -->
                            </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
       </div>
       <!-- END Modal -->
    </div>
<!-- END QUICKVIEW PRODUCT -->
                <!-- end my footer -->
    
<?php /* 
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

*/?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
