<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/3/13
 * Time: PM9:56
 */

namespace wm00689\assets;


use yii\web\AssetBundle;

class GlobalAsset extends AssetBundle
{
    public $baseUrl = '@static/metronic/assets';

    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css',
        'global/plugins/simple-line-icons/simple-line-icons.min.css',
        'https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

        'global/css/components-md.min.css',
        'global/css/plugins-md.min.css'

    ];

    public $js = [
        'global/plugins/jquery.min.js',
        'global/plugins/bootstrap/js/bootstrap.min.js',
        'global/plugins/js.cookie.min.js',
        'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'global/plugins/jquery.blockui.min.js',
        'global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',

        'global/scripts/app.min.js',

    ];
}