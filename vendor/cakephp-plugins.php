<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'AdminTheme' => $baseDir . '/plugins/AdminTheme/',
        'Ajax' => $baseDir . '/vendor/dereuromark/cakephp-ajax/',
        'Authentication' => $baseDir . '/vendor/cakephp/authentication/',
        'Authorization' => $baseDir . '/vendor/cakephp/authorization/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cache' => $baseDir . '/vendor/dereuromark/cakephp-cache/',
        'CakeDC/Auth' => $baseDir . '/vendor/cakedc/auth/',
        'CakeDC/Users' => $baseDir . '/vendor/cakedc/users/',
        'Cake/TwigView' => $baseDir . '/vendor/cakephp/twig-view/',
        'CubaTheme' => $baseDir . '/plugins/CubaTheme/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'EmailQueue' => $baseDir . '/vendor/lorenzo/cakephp-email-queue/',
        'Josegonzalez/Upload' => $baseDir . '/vendor/josegonzalez/cakephp-upload/',
        'MI18n' => $baseDir . '/plugins/MI18n/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Peer2PeerMessages' => $baseDir . '/plugins/Peer2PeerMessages/',
        'Queue' => $baseDir . '/vendor/dereuromark/cakephp-queue/',
        'Shim' => $baseDir . '/vendor/dereuromark/cakephp-shim/',
        'ThemeAmenities' => $baseDir . '/plugins/ThemeAmenities/',
        'Tools' => $baseDir . '/vendor/dereuromark/cakephp-tools/'
    ]
];