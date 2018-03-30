<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/1/27
 * Time: AM7:18
 */

namespace wm00689\assets\music;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $baseUrl = '@static/music';


    public $css = [
        'js/jPlayer/jplayer.flat.css',
        'css/bootstrap.css',
        'css/animate.css',
        'css/font-awesome.min.css',
        'css/simple-line-icons.css',
        'css/font.css',
        'css/app.css',
    ];

    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.js',
        'js/slimscroll/jquery.slimscroll.min.js',
        
    ];

    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}