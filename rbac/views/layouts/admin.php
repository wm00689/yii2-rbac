<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/1/27
 * Time: AM7:15
 */

use wm00689\template\music\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;

AdminAsset::register($this);
$this->beginPage();
$nav = \wm00689\rbac\common::nav();
?>
<!DOCTYPE html>

<html lang="en" class="app">
<head>

    <meta charset="utf-8"/>

    <title>Musik | Web Application</title>

    <meta name="description"
          content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <?= $this->head() ?>
    <?= Html::csrfMetaTags() ?>

</head>

<body class="">
<?php $this->beginBody() ?>

<section class="vbox">

    <header class="bg-primary lter header header-md navbar navbar-fixed-top-xs">

        <div class="navbar-header aside bg-primary nav-xs">

            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">

                <i class="icon-list"></i>

            </a>

            <a href="index-2.html" class="navbar-brand text-lt">

                <i class="icon-earphones"></i>

                <img src="/themes/music/images/logo.png" alt="." class="hide">

                <span class="hidden-nav-xs m-l-sm">Musik</span>

            </a>

            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">

                <i class="icon-settings"></i>

            </a>

        </div>

        <div class="navbar-left ">

            <ul class="nav navbar-nav ">

                <?php foreach ($nav['topNav'] as $topNav): ?>

                    <li class="hidden-xs">

                        <a href="<?= Url::to('/'.$topNav['d']) ?>" <?php if (isset($topNav['active'])) echo 'class="lt"' ?>>

                            <?= $topNav['text'] ?>

                        </a>

                    </li>
                <?php endforeach; ?>
                <li class="hidden-xs">
                    <div id="tp-weather-widget"></div>
                    <script>(function(T,h,i,n,k,P,a,g,e){g=function(){P=h.createElement(i);a=h.getElementsByTagName(i)[0];P.src=k;P.charset="utf-8";P.async=1;a.parentNode.insertBefore(P,a)};T["ThinkPageWeatherWidgetObject"]=n;T[n]||(T[n]=function(){(T[n].q=T[n].q||[]).push(arguments)});T[n].l=+new Date();if(T.attachEvent){T.attachEvent("onload",g)}else{T.addEventListener("load",g,false)}}(window,document,"script","tpwidget","//widget.seniverse.com/widget/chameleon.js"))</script>
                    <script>tpwidget("init", {
                            "flavor": "slim",
                            "location": "WX4FBXXFKE4F",
                            "geolocation": "enabled",
                            "language": "zh-chs",
                            "unit": "c",
                            "theme": "white",
                            "container": "tp-weather-widget",
                            "bubble": "enabled",
                            "alarmType": "badge",
                            "uid": "UC05C0FEE6",
                            "hash": "7531b2f40d5e5481a6a1ba28fb132d74"
                        });
                        tpwidget("show");</script>
                </li>
            </ul>

        </div>

        <div class="navbar-right ">

            <ul class="nav navbar-nav m-n hidden-xs nav-user user">

                <li class="hidden-xs">

                    <a href="#" class="dropdown-toggle lt" data-toggle="dropdown">

                        <i class="icon-bell"></i>

                        <span class="badge badge-sm up bg-danger count">2</span>

                    </a>

                    <section class="dropdown-menu aside-xl animated fadeInUp">

                        <section class="panel bg-white">

                            <div class="panel-heading b-light bg-light">

                                <strong>You have <span class="count">2</span> notifications</strong>

                            </div>

                            <div class="list-group list-group-alt">

                                <a href="#" class="media list-group-item">

                    <span class="pull-left thumb-sm">

                      <img src="/themes/music/images/a0.png" alt="..." class="img-circle">

                    </span>

                                    <span class="media-body block m-b-none">

                      Use awesome animate.css<br>

                      <small class="text-muted">10 minutes ago</small>

                    </span>

                                </a>

                                <a href="#" class="media list-group-item">

                    <span class="media-body block m-b-none">

                      1.0 initial released<br>

                      <small class="text-muted">1 hour ago</small>

                    </span>

                                </a>

                            </div>

                            <div class="panel-footer text-sm">

                                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>

                                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the
                                    notifications</a>

                            </div>

                        </section>

                    </section>

                </li>

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">

              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">

                <img src="/themes/music/images/a0.png" alt="...">

              </span>

                        <?= Yii::$app->user->identity->username ?> <b class="caret"></b>

                    </a>

                    <ul class="dropdown-menu animated fadeInRight">

                        <li>

                            <span class="arrow top"></span>

                            <a href="#">Settings</a>

                        </li>

                        <li>

                            <a href="profile.html">Profile</a>

                        </li>

                        <li>

                            <a href="#">

                                <span class="badge bg-danger pull-right">3</span>

                                Notifications

                            </a>

                        </li>

                        <li>

                            <a href="docs.html">Help</a>

                        </li>

                        <li class="divider"></li>

                        <li>

                            <a id="logout" href="javascript:;">退出</a>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </header>

    <section>

        <section class="hbox stretch">

            <!-- .aside -->

            <aside class="bg-black dk nav-xs aside hidden-print" id="nav">

                <section class="vbox">

                    <section class="w-f-md scrollable">

                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0"
                             data-size="10px" data-railOpacity="0.2">
                            <!-- nav -->

                            <nav class="nav-primary hidden-xs">

                                <ul class="nav bg clearfix">
                                    <?php foreach ($nav['leftNav'] as $leftNav): ?>
                                        <li class="<?php if (isset($leftNav['active'])) echo 'active' ?>">

                                            <a href="<?= Url::to('/' . $leftNav['id'] . '/' . $leftNav['d']) ?>">

                                                <i class="<?= $leftNav['icon'] ?> icon  "></i>

                                                <span class="font-bold"><?= $leftNav['text']; ?></span>

                                            </a>

                                        </li>
                                    <?php endforeach; ?>

                                </ul>
                            </nav>

                            <!-- / nav -->

                        </div>

                    </section>


                    <footer class="footer hidden-xs no-padder text-center-nav-xs">

                        <div class="bg hidden-xs ">

                            <div class="dropdown dropup wrapper-sm clearfix">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                      <span class="thumb-sm avatar pull-left m-l-xs">

                        <img src="/themes/music/images/a3.png" class="dker" alt="...">

                        <i class="on b-light"></i>

                      </span>

                                    <span class="hidden-nav-xs clear">

                        <span class="block m-l">

                          <strong class="font-bold text-lt">John.Smith</strong>

                          <b class="caret"></b>

                        </span>

                        <span class="text-muted text-xs block m-l">Art Director</span>

                      </span>

                                </a>

                                <ul class="dropdown-menu animated fadeInRight aside text-left">

                                    <li>

                                        <span class="arrow bottom hidden-nav-xs"></span>

                                        <a href="#">Settings</a>

                                    </li>

                                    <li>

                                        <a href="profile.html">Profile</a>

                                    </li>

                                    <li>

                                        <a href="#">

                                            <span class="badge bg-danger pull-right">3</span>

                                            Notifications

                                        </a>

                                    </li>

                                    <li>

                                        <a href="docs.html">Help</a>

                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="<?= Url::to(['/site/lock']) ?>" data-toggle="ajaxModal">锁屏</a>
                                    </li>

                                </ul>

                            </div>

                        </div>
                    </footer>

                </section>

            </aside>

            <!-- /.aside -->

            <section id="content">

                <section class="vbox">

                    <section class="" id="bjax-target">

                        <section class="hbox stretch">

                            <!-- side content -->
                            <?php if (isset($nav['contentNav'])): ?>
                                <aside class="aside bg-light dk" id="sidebar">

                                    <section class="vbox animated fadeInUp">

                                        <section class="scrollable hover">

                                            <div class="list-group no-radius no-border no-bg m-t-n-xxs m-b-none auto">
                                                <?php foreach ($nav['contentNav'] as $contentNav): ?>
                                                    <a href="<?= Url::to(['/'.$contentNav['id']]) ?>"
                                                       class="list-group-item <?php if (isset($contentNav['active'])) echo 'active' ?>">
                                                        <?= $contentNav['text'] ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>

                                        </section>

                                    </section>

                                </aside>
                            <?php endif; ?>


                            <!-- / side content -->


                            <section class="vbox">
                                <section class="scrollable wrapper w-f bg-white-only">

                                    <?= $content ?>

                                </section>
                                <footer class="footer bg-light">

                                    <p>This is a footer</p>

                                </footer>
                            </section>

                        </section>


                    </section>


                </section>

                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open"
                   data-target="#nav,html"></a>

            </section>

        </section>

    </section>

</section>
<div style="display: none">
    <form id="logout_form" action="<?= Url::to(['/site/logout']) ?>" method="post">
        <input name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
    </form>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
