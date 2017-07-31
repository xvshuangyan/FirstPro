<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>路赞后台管理系统</title>
    <link rel="stylesheet" href="Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="Public/css/admin/index.css">
    <link rel="stylesheet" href="Public/js/skin/layer.css">
    <link rel="stylesheet" href="Public/js/uploadify/uploadify.css">
</head>
<body>
<div class="wrap">
    <div class="header">
        <span class="title"><a href="admin.php?c=Index">路赞后台管理系统</a></span>
        <span class="personal">
            <i class="glyphicon glyphicon-user"></i> <span>欢迎</span><a href="admin.php?c=User&a=edit&id=<?php echo ($adminMessage['admin_id']); ?>"><?php echo ($adminMessage['realname']); ?></a>
            <i class="glyphicon glyphicon-log-out"></i><a href="admin.php?c=login&a=loginOut">退出</a>
        </span>
    </div>
<div class="row">
    <div class="col-lg-2">
        <div class="leftSide">
            <ul class="list-group">
                <li><a href="admin.php?c=index" class="firstPage"><span class="glyphicon glyphicon-home"></span>首页</a></li>
                <?php if(is_array($menu)): foreach($menu as $key=>$vo): ?><li><a href="admin.php?c=<?php echo ($vo["c"]); ?>" class=""><span class="<?php echo (geticon($menu_icon,$vo["c"])); ?>"></span><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
<div class="col-lg-10 main">
    <ol class="breadcrumb">
        <li><span class="glyphicon glyphicon-tag"></span><a href="admin.php?c=Menu">菜单管理</a></li>
        <li class="active"><?php if($singleMenu): ?>编辑菜单<?php else: ?>添加菜单<?php endif; ?></li>
    </ol>
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="menuName" class="col-lg-2 control-label">菜单名</label>
            <div class="col-lg-6">
                <input type="hidden" class="form-control" id="menu_id" name="menu_id" value="<?php echo ((isset($singleMenu['0']["menu_id"]) && ($singleMenu['0']["menu_id"] !== ""))?($singleMenu['0']["menu_id"]):''); ?>">
                <input type="text" class="form-control" id="menuName" name="name" value="<?php echo ((isset($singleMenu['0']["name"]) && ($singleMenu['0']["name"] !== ""))?($singleMenu['0']["name"]):''); ?>" placeholder="请输入菜单名">
            </div>
        </div>
        <div class="form-group">
            <label for="menuAction" class="col-lg-2 control-label">方法</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" id="menuAction" name="c" value="<?php echo ((isset($singleMenu['0']["c"]) && ($singleMenu['0']["c"] !== ""))?($singleMenu['0']["c"]):''); ?>" placeholder="请输入方法">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">菜单类型</label>
            <div class="col-lg-8">
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="optionsRadios1" value="1" <?php if($singleMenu[0]['type'] == '1'): ?>checked<?php endif; ?> >
                        后台菜单
                    </label>
                    <label>
                        <input type="radio" name="type" id="optionsRadios2" value="0" <?php if($singleMenu[0]['type'] == '0' ): ?>checked<?php endif; ?> <?php if(!$singleMenu[0]['menu_id']): ?>checked<?php endif; ?>>
                        前台栏目
                    </label>

                    <!--<label>-->
                        <!--<input type="radio" name="type" id="optionsRadios1" value="1" <?php if(($singleMenu['0']['type']) == "1"): ?>checked<?php endif; ?>>-->
                        <!--后台菜单-->
                    <!--</label>-->
                    <!--<label>-->
                        <!--<input type="radio" name="type" id="optionsRadios2" value="0" <?php if(($singleMenu['0']['type']) == "0"): ?>checked<?php endif; ?>>-->
                        <!--前台栏目-->
                    <!--</label>-->

                    <!--<label>-->
                        <!--<input type="radio" name="type" id="optionsRadios1" value="1" <?php echo ($singleMenu[0]['type']=='1'?'checked':''); ?>>-->
                        <!--后台菜单-->
                    <!--</label>-->
                    <!--<label>-->
                        <!--<input type="radio" name="type" id="optionsRadios2" value="0"<?php echo ($singleMenu[0]['type']=='0'?'checked':''); ?>>-->
                        <!--前台栏目-->
                    <!--</label>-->
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">状态</label>
            <div class="col-lg-6">
                <div class="radio">
                    <label>
                        <input type="radio" name="status" id="Radios1" value="1" <?php echo ($singleMenu[0]['status']=='1'?'checked':''); ?> <?php if(!$singleMenu[0]['menu_id']): ?>checked<?php endif; ?> >
                        开启
                    </label>
                    <label>
                        <input type="radio" name="status" id="Radios2" value="0" <?php echo ($singleMenu[0]['status']=='0'?'checked':''); ?>>
                        关闭
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-2 col-sm-9">
                <?php if(!$singleMenu[0]['menu_id']): ?><button type="button" class="btn btn-primary" onclick="btnClick.addMenu();">提交</button>
                    <?php else: ?>
                    <button type="button" class="btn btn-primary" onclick="btnClick.editMenu();">提交</button><?php endif; ?>
                <button type="reset" class="btn btn-default">重填</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<script src="Public/js/jquery.1.10.2.js"></script>
<script src="Public/js/bootstrap.js"></script>
<script src="Public/js/layer.js"></script>
<script src="Public/js/dialog.js"></script>
<script src="Public/js/admin/btnClick.js"></script>
</body>
</html>