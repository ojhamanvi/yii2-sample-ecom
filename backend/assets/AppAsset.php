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
        'css/custom.css',    
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
        'http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',

    ];
    public $js = [
        // 'plugins/morris/morris.min.js',
        'plugins/fastclick/fastclick.min.js',
        'dist/js/app.min.js',
        'dist/js/demo.js',
      
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
