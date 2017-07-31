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
        <li><span class="glyphicon glyphicon-tag"></span><a href="admin.php?c=User">用户管理</a></li>
        <li class="active">用户列表</li>
    </ol>
    <form class="form-horizontal" role="form" method="post"  action="admin.php?c=User">
        <div class="row messageSearch">
            <div class="col-lg-2">
                <a href="admin.php?c=User&a=add"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>添加管理员</button></a>
            </div>
            <div class="col-lg-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="username" placeholder="搜索管理员" value="<?php echo ($pagCondation['username']); ?>">
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
            <th>账号</th>
            <th>真实姓名</th>
            <th>邮箱</th>
            <th>登录ip</th>
            <th>登录时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($perPageList)): foreach($perPageList as $key=>$vo): ?><tr index="<?php echo ($vo["admin_id"]); ?>">
                <td><?php echo ($vo["admin_id"]); ?></td>
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["realname"]); ?></td>
                <td><?php echo ($vo["email"]); ?></td>
                <td><?php echo ($vo["lastloginip"]); ?></td>
                <td><?php echo (date("Y-m-d H:i:s",$vo["lastlogintime"])); ?></td>
                <td><?php echo (userstatus($vo["status"])); ?></td>
                <td>
                    <a href="admin.php?c=User&a=edit&id=<?php echo ($vo["admin_id"]); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
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
    delBtn("admin.php?c=User&a=del&id=","admin.php?c=User");//删除管理员
</script>
</body>
</html>