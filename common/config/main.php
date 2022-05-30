<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'sourceLanguage' => 'en',
    'timeZone' => 'Asia/Tashkent',
    'bootstrap' => [
        'queue',
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ]
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            // 'dateFormat' => 'd MMMM yyyy',
            'dateFormat' => 'd/M/Y',
            'datetimeFormat' => 'd/M/Y H:i:s',
            'locale' => Yii::$app->language, //your language locale
            'defaultTimeZone' => 'Asia/Tashkent', // time zone
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => '{{%auth_items}}',
            'itemChildTable' => '{{%auth_item_children}}',
            'assignmentTable' => '{{%auth_assignments}}',
            'ruleTable' => '{{%auth_rules}}',
        ],
        'queue' => [
            'class' => 'yii\queue\redis\Queue',
            'as log' => 'yii\queue\LogBehavior',
        ],
    ],
];
