<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/owl.carousel.css',
        'css/owl.theme.css',
        'css/owl.transitions.css',
        'css/nivo-slider.css',
        'css/meanmenu.min.css',
        'css/jquery-ui.css',
        'css/animate.css',
        'css/main.css',
        'css/style.css',
        'css/responsive.css',
        'css/select2.css',
        'css/filters.css',
        'css/jquery-ui1113.min.css',
        'css/my_style.css',
        
        //'css/site.css',
        //'css/jquery-ui-1.8.19.custom.css',
        
        
        
        
        
        
        
        
        
    ];
    public $js = [//'js/jquery-1.7.2.min.js',
        
        /*
        'js/jquery-1.11.3.min.js',
        'js/dop_function_product.js',
        'js/bootstrap.min.js',
        'js/wow.min.js',
        'js/jquery.meanmenu.js',
        'js/owl.carousel.min.js',
        'js/jquery.scrollUp.min.js',
        'js/countdon.min.js',
        'js/jquery-price-slider.js',
        'js/jquery.nivo.slider.js',
        'js/plagins.js',
        'js/main.js',
        'js/select2.js',
        'js/jquery-ui1113.min.js',
        'js/slide_price.js',
        'js/my_cart.js',
        'js/jquery.session.js',
       
        'js/dop_check.js',
        */
    
        
        /*'js/select2.js',
        'js/jquery-ui1113.min.js',
        'js/dop_function_product.js',
        'js/slide_price.js',
        'js/my_cart.js',*/
        
        
         //'js/dop_function_product.js',
        //'js/imagezoom.js',
        
        
        
    ];
    public $depends = [
        //'yii\assets\FontAwesomeAsset',
        'yii\web\YiiAsset',
        
        //'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset'
    ];
}
