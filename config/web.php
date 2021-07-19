<?php
//use Yii;
//use yii\helpers\Url;
//use yii\web\Request;
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

//$url = Yii::$app->request->url;
//$url = explode('%2F', $url);
//$url = explode('&', $url[1]);
//debug($url);
//die();
$js_bundel = [null];
//debug('web');
//die();

/*
if( $url[0] == 'product-details' )
{
    $js_bundel = ['electronics/web/js/jquery-1.11.3.min.js'];
}*/
//$js_bundel = ['electronics/web/js/jquery-1.11.3.min.js'];
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'ru-RU',
    'charset' => 'utf-8',
    'defaultRoute' => 'electronics/index',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Moduleuser',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fdsrete5645689tjgjgq2we;lkj9890893hjs7hkwqmv;openm',
            //'enableCsrfValidation'=>false,
        ],
        
        'assetManager' => [
            'bundles'=>[
                'yii\web\JqueryAsset'=>[
                    'sourcePath'=>null,
                    
                    'js' => $js_bundel,//['electronics/web/js/jquery-1.11.3.min.js'],
                ]
            ]
        ],
        
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache',
        ],
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            //'enablePrettyUrl' => true,
            //'showScriptName' => false,
            
            'rules' => [
            ],
        ],
        */
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
