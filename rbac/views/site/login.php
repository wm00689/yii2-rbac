<?php
/**
 * Created by PhpStorm.
 * User: feli
 * Date: 2018/1/27
 * Time: AM7:15
 */
use wm00689\template\music\LoginAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;

LoginAsset::register($this);
$this->registerCssFile('@static/plugins/validform/css/style.css',['depends'=>'wm00689\assets\music\LoginAsset']);
$this->registerJsFile('@static/plugins/validform/js/Validform_v5.3.2_min.js',['depends'=>'wm00689\assets\music\LoginAsset']);
$this->beginPage()
?>
<!DOCTYPE html>

<html lang="en" class="app">


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

<section id="content" class="m-t-lg wrapper-md animated fadeInUp">

    <div class="container aside-xl">

        <a class="navbar-brand block" href="index-2.html"><span class="h1 font-bold">Musik</span></a>

        <section class="m-b-lg">

            <header class="wrapper text-center">

                <strong>Sign in to get in touch</strong>

            </header>

            <form  class="login-form validform" action="<?= \yii\helpers\Url::to('/site/login')?>" method="post">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam?>" value="<?= Yii::$app->request->csrfToken?>">

                <div class="form-group">

                    <input type="text" name="LoginForm[username]" placeholder="Username" class="form-control rounded input-lg text-center no-border">

                </div>

                <div class="form-group">

                    <input type="password" name="LoginForm[password]" placeholder="Password" class="form-control rounded input-lg text-center no-border">

                </div>

                <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Sign in</span></button>

                <div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>

                <div class="line line-dashed" id="msg"></div>

                <p class="text-muted text-center"><small>Do not have an account?</small></p>

                <a href="/site/signup" class="btn btn-lg btn-info btn-block rounded">Create an account</a>

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
<script>
    $(".validform").Validform({
        tiptype:function(msg,o,cssctl){
            var objtip=$("#msg");
            cssctl(objtip,o.type);
            objtip.text(msg);
        },
        ajaxPost:true,
        callback:function(data){
            if(data.status=="y"){
                setTimeout(function(){
                    window.location.href = '<?= \yii\helpers\Url::to('dashboard/index');?>'
                },500);
            }
        }
    });

</script>

</body>
</html>
<?php $this->endPage() ?>