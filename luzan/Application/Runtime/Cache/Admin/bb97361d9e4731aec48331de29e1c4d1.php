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
        <li><span class="glyphicon glyphicon-tag"></span><a href="admin.php?c=Basic">基本管理</a></li>
        <li class="active">管理配置</li>
    </ol>
<div class="row configure">
    <div class="col-sm-1"></div>
    <div class="col-sm-4">
        <a href="admin.php?c=Basic"><button type="button" class="btn btn-primary">基本配置</button></a>
        <a href="admin.php?c=Basic&a=cache"><button type="button" class="btn btn-info">缓存配置</button></a>
    </div>
</div>
<form class="form-horizontal" role="form" id="basicManage">
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">站点标题</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="title" name="title" value="<?php echo ($data->title); ?>" placeholder="请输入标题">
        </div>
    </div>
    <div class="form-group">
        <label for="keywords" class="col-sm-2 control-label">站点关键词</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="keywords" name="keywords" value="<?php echo ($data->keywords); ?>" placeholder="请输入关键词">
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-sm-2 control-label">站点描述</label>
        <div class="col-sm-6">
            <textarea rows="5" class="form-control" id="description" name="description" placeholder="请输入描述"><?php echo ($data->description); ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-primary" onclick="btnClick.basicManage();">提交</button>
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
<script src="Public/js/util.js"></script>
</body>
</html>