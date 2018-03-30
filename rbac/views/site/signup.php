<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/1/27
 * Time: AM7:15
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;

\backend\themes\music\assets\LoginAsset::register($this);
$this->beginPage()
?>
    <!DOCTYPE html>

    <html lang="en" class="app">


    <!-- Mirrored from www.jq22.com/demo/jquery-moban-141218215916/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jan 2018 16:20:11 GMT -->
    <head>

        <meta charset="utf-8" />

        <title>Musik | Web Application</title>

        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <?= $this->head() ?>
        <?= Html::csrfMetaTags() ?>

        <!--[if lt IE 9]>

        <script src="/themes/music/js/ie/html5shiv.js"></script>

        <script src="/themes/music/js/ie/respond.min.js"></script>

        <script src="/themes/music/js/ie/excanvas.js"></script>

        <![endif]-->

    </head>

    <body class="bg-info dker">
    <?php $this->beginBody() ?>

    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">

        <div class="container aside-xl">

            <a class="navbar-brand block" href="index-2.html"><span class="h1 font-bold">Musik</span></a>

            <section class="m-b-lg">

                <header class="wrapper text-center">

                    <strong>Sign up to find interesting thing</strong>

                </header>

                <form action="http://www.jq22.com/demo/jquery-moban-141218215916/index.html">

                    <div class="form-group">

                        <input placeholder="Name" class="form-control rounded input-lg text-center no-border">

                    </div>

                    <div class="form-group">

                        <input type="email" placeholder="Email" class="form-control rounded input-lg text-center no-border">

                    </div>

                    <div class="form-group">

                        <input type="password" placeholder="Password" class="form-control rounded input-lg text-center no-border">

                    </div>

                    <div class="checkbox i-checks m-b">

                        <label class="m-l">

                            <input type="checkbox" checked=""><i></i> Agree the <a href="#">terms and policy</a>

                        </label>

                    </div>

                    <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Sign up</span></button>

                    <div class="line line-dashed"></div>

                    <p class="text-muted text-center"><small>Already have an account?</small></p>

                    <a href="/site/login" class="btn btn-lg btn-info btn-block btn-rounded">Sign in</a>

                </form>

            </section>

        </div>

    </section>

    <!-- footer -->

    <footer id="footer">

        <div class="text-center padder">

            <p>

                <small>Web app framework base on Bootstrap<br>&copy; 2014</small>

            </p>

        </div>

    </footer>

    <!-- / footer -->

    <?php $this->endBody() ?>

    </body>
    </html>
<?php $this->endPage() ?>