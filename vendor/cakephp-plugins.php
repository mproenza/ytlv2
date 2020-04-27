<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Authentication' => $baseDir . '/vendor/cakephp/authentication/',
        'Authorization' => $baseDir . '/vendor/cakephp/authorization/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cache' => $baseDir . '/vendor/dereuromark/cakephp-cache/',
        'CakeDC/Auth' => $baseDir . '/vendor/cakedc/auth/',
        'CakeDC/Users' => $baseDir . '/vendor/cakedc/users/',
        'Cake/TwigView' => $baseDir . '/vendor/cakephp/twig-view/',
        'CubaTheme' => $baseDir . '/plugins/CubaTheme/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'MI18n' => $baseDir . '/plugins/MI18n/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Shim' => $baseDir . '/vendor/dereuromark/cakephp-shim/',
        'Tools' => $baseDir . '/vendor/dereuromark/cakephp-tools/'
    ]
];