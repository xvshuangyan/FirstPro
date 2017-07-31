<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>登录页面</title>
    <link rel="stylesheet" href="Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="Public/css/admin/login.css">
    <link rel="stylesheet" href="Public/css/skin/layer.css">
</head>
<body>
<div class="wrap">
    <form method="post">
        <div class="title"><h2>请填写登录信息</h2></div>
        <div class="input-group">
            <span class="input-group-addon">账号：</span>
            <input type="text" name="username" class="form-control" placeholder="请输入账号">
        </div>
        <div class="input-group">
            <span class="input-group-addon">密码：</span>
            <input type="password" name="password" class="form-control" placeholder="请输入密码">
        </div>
        <div class="input-group">
            <button class="btn btn-primary login" type="button" onclick="login.check();">登录</button>
            <button class="btn btn-default reset" type="reset">重置</button>
        </div>
    </form>
</div>
<script src="Public/js/jquery.1.10.2.js"></script>
<script src="Public/js/layer.js"></script>
<script src="Public/js/dialog.js"></script>
<script src="Public/js/admin/login.js"></script>
</body>
</html>