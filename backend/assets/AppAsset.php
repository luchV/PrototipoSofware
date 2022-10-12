<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/login.css',
        'css/coloresBack.css',
        'css/barraLateral.css',
        'css/general.css',

    ];
    public $js = [
        'js/login.js',
        'https://kit.fontawesome.com/41bcea2ae3.js',
        'js/reproductor.js',
        'js/contraerMenu.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
