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
        <li><span class="glyphicon glyphicon-tag"></span><a href="admin.php?c=Position">推荐位管理</a></li>
        <li class="active">推荐位列表</li>
    </ol>
    <form class="form-horizontal" role="form" method="post"  action="admin.php?c=Position">
        <div class="row messageSearch">
            <div class="col-lg-2">
                <a href="admin.php?c=Position&a=add"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>添加推荐位</button></a>
            </div>
            <div class="col-lg-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="title" placeholder="搜索推荐位位" value="<?php echo ($pagCondation['title']); ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </div>
        </div>
    </form>
    <table class="table table-hover table-bordered">
        <tr>
            <th>id</th>
            <th>推荐位名称</th>
            <th>描述</th>
            <th>创建时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($perPageList)): foreach($perPageList as $key=>$vo): ?><tr index="<?php echo ($vo["id"]); ?>">
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["description"]); ?></td>
                <td><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></td>
                <td><?php echo (getstatus($vo["status"])); ?></td>
                <td>
                    <a href="admin.php?c=Position&a=edit&id=<?php echo ($vo["id"]); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                    <button class="btn btn-danger del"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>

    <nav class="page-group"><ul class="pagination"><?php echo ($pagUi); ?></ul></nav>
</div>
</div>
</div>
<script src="Public/js/jquery.1.10.2.js"></script>
<script src="Public/js/bootstrap.js"></script>
<script src="Public/js/layer.js"></script>
<script src="Public/js/dialog.js"></script>
<script src="Public/js/admin/btnClick.js"></script>
<script src="Public/js/util.js"></script>
<script>
    delBtn("admin.php?c=Position&a=del&id=","admin.php?c=Position");//删除推荐位
</script>
</body>
</html>