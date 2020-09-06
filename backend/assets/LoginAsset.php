<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',       
        'dist/css/AdminLTE.min.css',
        'plugins/iCheck/square/blue.css',

    ];
    public $js = [
        'plugins/iCheck/icheck.min.js',
       
      
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
