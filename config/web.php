<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'admin',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'RG8j2YozSEWqgqQQhjnEjXkm1yCP775676',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'identityClass'   => 'jinxing\admin\models\Admin',
            'loginUrl'        => '/admin/default/login',
            'enableAutoLogin' => true,
            'identityCookie'  => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'errorHandler' => [
            'errorAction' => 'admin/default/error',
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
        "urlManager" => [
            "enablePrettyUrl" => true,
            "enableStrictParsing" => false,
            "showScriptName" => false,
            "suffix" => "",
            "rules" => [
                "<controller:\w+>/<id:\d+>" => "<controller>/view",
                "<controller:\w+>/<action:\w+>" => "<controller>/<action>"
            ],
        ],
        'admin' => [
            'class' => '\yii\web\User',
            'identityClass' => 'jinxing\admin\models\Admin',
            'enableAutoLogin' => true,
            'loginUrl' => ['/admin/default/login'],
            'idParam' => '_adminId',
            'identityCookie' => ['name' => '_admin','httpOnly' => true],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => 'auth_item',
            'assignmentTable' => 'auth_assignment',
            'itemChildTable' => 'auth_item_child',
            'ruleTable'=>'auth_rule',
        ],

        // This step is not necessary, but you use it outside the module. The controller, view in the module must be added!
//        'i18n' => [
//            'translations' => [
//                'admin' => [
//                    'class'          => 'yii\i18n\PhpMessageSource',
//                    'sourceLanguage' => 'en',
//                    'basePath'       => '@jinxing/admin/messages'
//                ],
//            ],
//        ],
    ],
    'params' => $params,
    'modules' => [
        'admin' => [
            'class' => 'jinxing\admin\Module',

            // Make use of that kind of user
            'user' => 'admin',

            // Do not verify permissions
            'verifyAuthority' => true,
        ],
        'backend' => [
            'class'   => 'app\modules\backend\Backend',
            'user' => 'admin',
            'layout'  => '@jinxing/admin/views/layouts/main'
        ],
        'debug' => [
            'class' => 'yii\debug\Module',

            'allowedIPs' => ['127.0.0.1'],
        ]

    ],
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
