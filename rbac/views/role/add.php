<link href="/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet">
<script src="/plugins/jstree/dist/jstree.min.js"></script>
<script src="/plugins/bootstrap-toastr/toastr.js"></script>
<script src="/js/app.min.js"></script>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="portlet box blue-madison">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Portlet
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn green" data-dismiss="modal"><i class="fa fa-compress"></i>  </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="<?= \yii\helpers\Url::to(['/admin/user/role/add']); ?>" class="form-horizontal validform"
                      method="post">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
                           value="<?= Yii::$app->request->csrfToken ?>">
                    <input id="ids" name="ids" type="hidden">

                    <div class="form-body">
                        <div class="form-group">

                            <div class="col-md-12">
                                <section class="panel panel-default">

                                    <header class="panel-heading bg-light">

                                        <ul class="nav nav-tabs nav-justified">

                                            <li class="active"><a href="#home" data-toggle="tab">角色名称</a></li>

                                            <li class=""><a href="#profile" data-toggle="tab">权限</a></li>

                                            <li class=""><a href="#messages" data-toggle="tab">包含角色</a></li>

                                        </ul>

                                    </header>

                                    <div class="panel-body">

                                        <div class="tab-content">

                                            <div class="tab-pane active" id="home">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">角色名称</label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="RoleForm[name]" class="form-control"
                                                               placeholder="角色名称">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">描述</label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="RoleForm[description]"
                                                               class="form-control" id="mobile" placeholder="描述">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="profile">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">描述</label>
                                                    <div class="col-md-4">
                                                        <div id="tree"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="messages">message</div>


                                        </div>

                                    </div>

                                </section>
                            </div>
                        </div>
                        <div id="msg"></div>

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
    </div>
</div>
<script>

    var tree = $('#tree').jstree({
        'plugins': ["checkbox"],
        'core': {'data': [<?= $permissions?>]}
    });
    var d;
    // var d = tree.get_selected
    $('#tree').on("changed.jstree", function (e, data) {
        d = data.selected;
    });

    $('.submit').click(function () {
        $('#ids').val(d)
    })

    function show_msg(msg, type) {
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
        if (type == 'n') {
            console.log('no')
            toastr.warning(msg, '出错了');
        } else if (type == 'y') {
            toastr.success(msg, ' 提交成功');
        }
    }

    $(".validform").Validform({
        tiptype: function (msg, o, cssctl) {
            var objtip = $("#msg");
            cssctl(objtip, o.type);
            objtip.text(msg);
            console.log(o);
            console.log(cssctl);
        },
        ajaxPost: true,
        callback: function (data) {
            if (data.status == 'y') {
                window.location.reload();
            }
        }
    });
</script>
