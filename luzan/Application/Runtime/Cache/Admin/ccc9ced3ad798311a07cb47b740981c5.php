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
        <li><span class="glyphicon glyphicon-tag"></span><a href="admin.php?c=Content">文章管理</a></li>
        <li class="active">文章列表</li>
    </ol>

<form class="form-horizontal" role="form" method="post"  action="admin.php?c=Content" id="lookMessage">
    <div class="row messageSearch">
        <div class="col-lg-2">
            <a href="admin.php?c=Content&a=add"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>添加文章</button></a>
        </div>
        <div class="col-lg-4">
            <div class="input-group">
                <span class="input-group-addon">栏目</span>
                <select class="form-control" name="catid">
                    <option selected value="">全部分类</option>
                    <?php if(is_array($homeMenu)): foreach($homeMenu as $key=>$vo): ?><option value="<?php echo ($vo["menu_id"]); ?>" <?php if($vo["menu_id"] == $pagCondation['catid']): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="input-group">
                <input type="text" class="form-control" name="title" placeholder="文章标题" value="<?php echo ($pagCondation['title']); ?>">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
    </div>
</form>
    <table class="table table-hover table-bordered" id="newsList">
        <tr>
            <th class="chooseAll"><input type="checkbox"></th>
            <th>排序</th>
            <th>id</th>
            <th>标题</th>
            <th>栏目</th>
            <th>来源</th>
            <th>封面图</th>
            <th>更新时间</th>
            <th>点击量</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($perPageList)): foreach($perPageList as $key=>$vo): ?><tr index="<?php echo ($vo["news_id"]); ?>">
                <td class="chooseSingle"><input type="checkbox"></td>
                <td class="contentOrder"><input type="text" value="<?php echo ($vo["listorder"]); ?>"></td>
                <td id="news_id"><?php echo ($vo["news_id"]); ?></td>
                <td><?php echo ($vo["title"]); ?></td>
                <td><?php echo (getcontentcat($homeMenu,$vo["catid"])); ?></td>
                <td><?php echo (getcopyfrom($article_from,$vo["copyfrom"])); ?></td>
                <td><?php echo (isthumb($vo["thumb"])); ?></td>
                <td><?php echo (date("Y-m-d H:i:s",$vo["update_time"])); ?></td>
                <td><?php echo ($vo["count"]); ?></td>
                <td><?php echo (getstatus($vo["status"])); ?></td>
                <td>
                    <a href="admin.php?c=Content&a=edit&id=<?php echo ($vo["news_id"]); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                    <button  class="btn btn-danger del"><span class="glyphicon glyphicon-trash"></span></button>
                    <a href="index.php?c=Detail&id=<?php echo ($vo["news_id"]); ?>" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
    <div class="updateAndPush">
        <div class="row">
            <div class="col-lg-4">
                <div class="input-group">
                    <select class="form-control" name="position_id">
                        <option selected disabled>请选择推送位</option>
                        <?php if(is_array($positionList)): foreach($positionList as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button" onclick="btnClick.pushData();" ><span class="glyphicon glyphicon-arrow-up">推送</span></button>
                    </span>
                </div>
            </div>
            <div class="col-lg-1">
                <button type="button" class="btn btn-primary order"><span class="glyphicon glyphicon-refresh"></span>更新排序</button>
            </div>
        </div>
    </div>
    <nav class="page-group"><ul class="pagination"><?php echo ($pagUi); ?></ul></nav>
</div>
</div>
</div>
<script src="Public/js/jquery.1.10.2.js"></script>
<script src="Public/js/bootstrap.js"></script>
<script src="Public/js/layer.js"></script>
<script src="Public/js/dialog.js"></script>
<script src="Public/js/util.js"></script>
<script src="Public/js/admin/btnClick.js"></script>
<script>
    delBtn("admin.php?c=Content&a=del&id=","admin.php?c=Content");//删除文章列表
    orderBtn("admin.php?c=Content&a=updateOrder","admin.php?c=Content");//更新文章排序
</script>
</body>
</html>