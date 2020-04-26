<?php

namespace backend\assets;

use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/lobiadmin.css',
    ];
    public $js = [
        'js/config.js',
        'js/LobiAdmin.js',
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        BootstrapPluginAsset::class,
        FontAwesome5Asset::class,
        AnimateCssAsset::class,
        LobiboxAsset::class
    ];
}
