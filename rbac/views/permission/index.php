<?php
$this->registerCssFile('@static/plugins/jstree/dist/themes/default/style.min.css', ['depends' => 'wm00689\assets\music\AdminAsset']);
$this->registerJsFile('@static/plugins/jstree/dist/jstree.min.js', ['depends' => 'wm00689\assets\music\AdminAsset']);
$this->registerJsFile('@static/plugins/bootstrap-toastr/toastr.js', ['depends' => 'wm00689\assets\music\AdminAsset']);
$this->registerCssFile('@static/plugins/bootstrap-toastr/toastr.css', ['depends' => 'wm00689\assets\music\AdminAsset']);
$this->registerJsFile('@static/js/app.min.js', ['depends' => 'wm00689\assets\music\AdminAsset']);
$js =
    <<<EOF
    $('#tree').jstree({'plugins':["checkbox"],'core':{'data':[{$permissions}]}});
    var d;
    $('#tree').on("changed.jstree", function (e, data) {
        d = data.selected;
    });
    
    $('.submit').click(function(){
        $('#ids').val(d)
    })

EOF;

$valid = <<<EOT
    function show_msg(msg,type){
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "positionClass": "toast-top-center",
          "onclick": null,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };
        if(type=='n'){
            toastr.warning(msg,'出错了');
        }else if(type=='y'){
            toastr.success(msg,' 提交成功');
        }
    }
    $(".validform").Validform({
        tiptype:function(msg){},
        ajaxPost:true,
        callback:function(data){  
        show_msg(data.info,data.status); 
        }
    });
EOT;

$this->registerJs($js, 3);
$this->registerJs($valid, 3);

?>

<div class="portlet box blue-madison">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i>Portlet
        </div>
        <div class="actions">
            <a href="javascript:;"  class="btn yellow">
                <i class="fa fa-pencil"></i> Edit </a>
            <a href="javascript:;" class="btn green">
                <i class="fa fa-plus"></i> Add </a>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form  action="<?= \yii\helpers\Url::to(['/admin/user/permission/add']);?>" class="form-horizontal validform" method="post">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam?>" value="<?= Yii::$app->request->csrfToken?>">
            <input id="ids" name="ids" type="hidden">
            <div class="form-actions top">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button  type="submit" class="btn green submit">Submit</button>
                        <button type="button" class="btn default">Cancel</button>
                    </div>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-4">
                        <div id="tree"></div>
                    </div>
                </div>


            </div>
            <div class="form-actions fluid">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green submit">Submit</button>
                        <button type="button" class="btn default">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>


