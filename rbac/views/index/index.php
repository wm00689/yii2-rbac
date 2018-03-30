<?php
use yii\helpers\Url;

$js = 'function dell(id){
        $("#uid").attr("value",id);
        remove();
    }
    ';

$this->registerJs($js, 3);
?>
<div class="portlet box blue-madison" style="margin-bottom: 0px">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i><?= \backend\classes\common::getActiveItem()?>
        </div>
        <div class="actions">
            <a href="javascript:;" class="btn yellow">
                <i class="fa fa-pencil"></i> Edit </a>
            <a href="<?= Url::to(['rbac/index/add']) ?>" class="btn green"  data-toggle="ajaxModal">
                <i class="fa fa-plus"></i> Add </a>
        </div>
    </div>

</div>
<section class="panel panel-default">

    <div class="row wrapper">

        <div class="col-sm-5 m-b-xs">

            <select class="input-sm form-control input-s-sm inline v-middle">

                <option value="0">Bulk action</option>

                <option value="1">Delete selected</option>

                <option value="2">Bulk edit</option>

                <option value="3">Export</option>

            </select>

            <button class="btn btn-sm btn-default">Apply</button>

        </div>

        <div class="col-sm-4 m-b-xs">

            <div class="btn-group" data-toggle="buttons">

                <label class="btn btn-sm btn-default active">

                    <input type="radio" name="options"> Day

                </label>

                <label class="btn btn-sm btn-default">

                    <input type="radio" name="options"> Week

                </label>

                <label class="btn btn-sm btn-default">

                    <input type="radio" name="options"> Month

                </label>

            </div>

        </div>

        <div class="col-sm-3 m-b-xs">


            <div class="input-group m-b">


                <input type="text" class="form-control">

                <span class="input-group-addon">go</span>

            </div>

        </div>

    </div>

    <div class="table-responsive">


        <table class="table table-striped table-bordered  table-hover">
            <thead>
            <tr>
                <th style="width: 100px"> 操作</th>
                <th> 用户名</th>
                <th style="width: 200px"> 添加时间</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="">
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-primary" href="javascript:;" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa icon-settings"></i>操作
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= Url::to(['/admin/user/index/edit', 'id' => $user->id]) ?>"
                                       data-toggle="ajaxModal"><i class="fa fa-pencil"></i>编辑</a>
                                </li>
                                <li>
                                    <a href="javascript:;" onclick="dell('<?= $user->id ?>')"><i class="fa fa-trash-o"></i>删除</a>
                                </li>

                            </ul>
                        </div>
                    </td>
                    <td> <?= $user->username ?> </td>
                    <td> <?= date('Y-m-d H:i:s', $user->created_at) ?> </td>

                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <footer class="panel-footer">

        <div class="row">

            <div class="col-sm-4 hidden-xs">

                <select class="input-sm form-control input-s-sm inline v-middle">

                    <option value="0">Bulk action</option>

                    <option value="1">Delete selected</option>

                    <option value="2">Bulk edit</option>

                    <option value="3">Export</option>

                </select>

                <button class="btn btn-sm btn-default">Apply</button>

            </div>

            <div class="col-sm-4 text-center">

                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>

            </div>

            <div class="col-sm-4 text-right text-center-xs">

                <ul class="pagination pagination-sm m-t-none m-b-none">

                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>

                    <li><a href="#">1</a></li>

                    <li><a href="#">2</a></li>

                    <li><a href="#">3</a></li>

                    <li><a href="#">4</a></li>

                    <li><a href="#">5</a></li>

                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>

                </ul>

            </div>

        </div>

    </footer>

</section>
<div style="display: none">
    <form class="validform" action="<?= Url::to(['/admin/user/index/dell']) ?>" method="post">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
        <input id="uid" name="uid" >
    </form>
</div>