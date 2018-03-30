<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/1/27
 * Time: AM7:18
 */

namespace wm00689\assets\music;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{

    public $baseUrl = '@static/music';

    public $css = [
        'css/components-md.css',
        'js/jPlayer/jplayer.flat.css',
        'css/bootstrap.css',
        'css/animate.css',
        'css/font-awesome.min.css',
        'css/simple-line-icons.css',
        'css/font.css',
        'css/app.css',
        '/plugins/validform/css/style.css',
       // 'js/bootstrap-sweetalert/sweetalert.css',
    ];

    public $js = [
        'js/jquery.min.js',
        //'js/bootstrap/js/bootstrap.js',
       // 'js/ui-confirmations.min.js',
        'js/bootstrap.js',
        'js/bootstrap-sweetalert/sweetalert.js',
        //'js/app.js',
        'js/slimscroll/jquery.slimscroll.min.js',
        'js/sortable/jquery.sortable.js',
      //  'js/charts/sparkline/jquery.sparkline.min.js',
        //'js/app.plugin.js',
       // 'js/jPlayer/jquery.jplayer.min.js',
      //  'js/jPlayer/add-on/jplayer.playlist.min.js',
       // 'js/jPlayer/demo.js',
        '/plugins/validform/js/Validform_v5.3.2_min.js',
        'js/admin.js'
    ];

    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}