<?php

/** @var array $params */

return [
    'class' => 'codemix\localeurls\UrlManager',
    'hostInfo' => $params['frontendHostInfo'],
    'baseUrl' => '',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'languages' => ['ru','en','uz','oz'],
    'cache' => false,
    'ignoreLanguageUrlPatterns' => [
        // route pattern => url pattern

        '#^site/logs#' => '#site/logs#',
        '#^logs/add#' => '#logs/add#',
    ],
    'rules' => [
        '' => 'site/index',
        'contact' => 'contact/index',
        'signup' => 'auth/signup/request',
        'signup/<_a:[\w-]+>' => 'auth/signup/<_a>',
        '<_a:login|logout>' => 'auth/auth/<_a>',

        ['pattern' => 'yandex-market', 'route' => 'market/index', 'suffix' => '.xml'],

        ['pattern' => 'sitemap', 'route' => 'sitemap/index', 'suffix' => '.xml'],
        ['pattern' => 'sitemap-<target:[a-z-]+>-<start:\d+>', 'route' => 'sitemap/<target>', 'suffix' => '.xml'],
        ['pattern' => 'sitemap-<target:[a-z-]+>', 'route' => 'sitemap/<target>', 'suffix' => '.xml'],

        'blog' => 'blog/post/index',
        'blog/tag/<slug:[\w\-]+>' => 'blog/post/tag',
        'blog/<id:\d+>' => 'blog/post/post',
        'blog/<id:\d+>/comment' => 'blog/post/comment',
        'blog/<slug:[\w\-]+>' => 'blog/post/category',

        ['class' => 'frontend\urls\PageUrlRule'],

        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w-]+>' => '<_c>/<_a>',
        '<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_c>/<_a>',
    ],
];