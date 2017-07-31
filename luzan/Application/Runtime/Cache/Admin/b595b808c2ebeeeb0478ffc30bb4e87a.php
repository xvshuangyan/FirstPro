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
        <div class="page-header">
            <h2>欢迎使用<small>路赞后台管理系统</small></h2>
        </div>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-tag"></span><a href="admin.php?c=Index">平台整理指标</a></li>
        </ol>
        <div class="panel loginCount">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-cloud"></span>
                <b class="dataTitle">
                    <h5>今日登录用户数</h5>
                    <p>250</p>
                </b>
            </div>
            <div class="panel-body">
                <span><a href="#">查看</a></span><span class="glyphicon glyphicon-circle-arrow-right rightClick"></span>
            </div>
        </div>
        <div class="panel articleCount">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-th-list"></span>
                <b class="dataTitle">
                    <h5>文章数量</h5>
                    <p><?php echo ($articleCount); ?></p>
                </b>
            </div>
            <div class="panel-body">
                <span><a href="admin.php?c=Content">查看</a></span><span class="glyphicon glyphicon-circle-arrow-right rightClick"></span>
            </div>
        </div>
        <div class="panel maxRead">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-stats"></span>
                <b class="dataTitle">
                    <h5>文章最大阅读数</h5>
                    <p><?php echo ($maxReadCount); ?></p>
                </b>
            </div>
            <div class="panel-body">
                <span><a href="admin.php?c=Content">查看</a></span><span class="glyphicon glyphicon-circle-arrow-right rightClick"></span>
            </div>
        </div>
        <div class="panel recommendCount">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-filter"></span>
                <b class="dataTitle">
                    <h5>推荐位数</h5>
                    <p><?php echo ($positionCountent); ?></p>
                </b>
            </div>
            <div class="panel-body">
                <span><a href="admin.php?c=Position">查看</a></span><span class="glyphicon glyphicon-circle-arrow-right rightClick"></span>
            </div>
        </div>
    </div>
</div>
</div>
<script src="Public/js/jquery.1.10.2.js"></script>
<script src="Public/js/bootstrap.js"></script>
<script src="Public/js/layer.js"></script>
<script src="Public/js/dialog.js"></script>
<script src="Public/js/util.js"></script>
</body>
</html>