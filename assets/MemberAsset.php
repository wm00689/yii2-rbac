<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/3/18
 * Time: PM6:08
 */

namespace wm00689\assets;


use yii\web\AssetBundle;

class MemberAsset extends AssetBundle
{
    public $baseUrl = '@static/metronic/assets';

    public $css = [
        'global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
        'global/plugins/morris/morris.css',
        'global/plugins/fullcalendar/fullcalendar.min.css',
        'global/plugins/jqvmap/jqvmap/jqvmap.css'
    ];

    public $js = [
        'global/plugins/moment.min.js',
        'global/plugins/bootstrap-daterangepicker/daterangepicker.min.js',
        'global/plugins/morris/morris.min.js',
        'global/plugins/morris/raphael-min.js',
        'global/plugins/counterup/jquery.waypoints.min.js',
        'global/plugins/counterup/jquery.counterup.min.js',
        'global/plugins/amcharts/amcharts/amcharts.js',
        'global/plugins/amcharts/amcharts/serial.js',
        'global/plugins/amcharts/amcharts/pie.js',
        'global/plugins/amcharts/amcharts/radar.js',
        'global/plugins/amcharts/amcharts/themes/light.js',
        'global/plugins/amcharts/amcharts/themes/patterns.js',
        'global/plugins/amcharts/amcharts/themes/chalk.js',
        'global/plugins/amcharts/ammap/ammap.js',
        'global/plugins/amcharts/ammap/maps/js/worldLow.js',
        'global/plugins/amcharts/amstockcharts/amstock.js',
        'global/plugins/fullcalendar/fullcalendar.min.js',
        'global/plugins/horizontal-timeline/horizontal-timeline.js',
        'global/plugins/flot/jquery.flot.min.js',
        'global/plugins/flot/jquery.flot.resize.min.js',
        'global/plugins/flot/jquery.flot.categories.min.js',
        'global/plugins/jquery-easypiechart/jquery.easypiechart.min.js',
        'global/plugins/jquery.sparkline.min.js',
        'global/plugins/jqvmap/jqvmap/jquery.vmap.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js',
        'global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js',
        'global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js',

        'pages/scripts/dashboard.min.js',
        '/js/admin.js'
    ];

    public $depends = [
        'wm00689\assets\Layout2Asset'
    ];
}