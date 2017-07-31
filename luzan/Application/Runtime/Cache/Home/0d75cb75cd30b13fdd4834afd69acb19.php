<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>路赞新闻杂志社</title>
    <link rel="stylesheet" href="Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="Public/css/home/index.css">
    <link rel="stylesheet" href="Public/js/skin/layer.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="container">
             <!--Brand and toggle get grouped for better mobile display-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php?c=Index"><img src="Public/img/home/logo0.png" alt="cms资讯"></a>
            </div>
             <!--Collect the nav links, forms, and other content for toggling-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav cat">
                    <li class="active"><a href="index.php?c=Index">首页</a></li>
                    <?php if(is_array($menu)): foreach($menu as $key=>$vo): ?><li index="<?php echo ($vo["menu_id"]); ?>"><a href="?c=Cat&id=<?php echo ($vo["menu_id"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
                <!--<ul class="nav navbar-nav navbar-right">-->
                    <!--<li><a href="index.php?c=Login">请登录...</a></li>-->
                <!--</ul>-->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </div><!-- /.container-fluid -->
</nav>
<div class="main">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
<div class="col-lg-9">
    <div class="row">
        <div class="col-lg-12">
            <div class="articleList">
                <h2><?php echo ($toShow["title"]); ?></h2>
                <p><span class="update_time"><?php echo (date("Y-m-d H:i:s",$toShow["update_time"])); ?></span> <span>来源：<?php echo ($toShow["copyfrom"]); ?></span></p>
                <p><?php echo ($toShow["content"]); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 ">
    <div class="topArticles">
        <h3>
            文章排行
            <p>TOP ARTICLES</p>
        </h3>
        <div class="list-group">
            <?php if(is_array($maxReadCount)): foreach($maxReadCount as $key=>$vo): ?><a href="?c=Detail&id=<?php echo ($vo['news_id']); ?>" class="list-group-item" title="<?php echo ($vo['title']); ?>">
                    <span class="top<?php echo ($key+1); ?>">
                        <h5><?php echo ($vo['title']); ?></h5>
                        <p <?php if($key != '0'): ?>class="hidden"<?php endif; ?>><?php echo ($vo['small_title']); ?></p>
                    </span>
                </a><?php endforeach; endif; ?>
        </div>
    </div>
    <div class="rightPosition">
        <?php if(is_array($rightImg)): foreach($rightImg as $key=>$vo): ?><div class="rightImg">
                <div>
                    <a href="?c=Detail&id=<?php echo ($vo['news_id']); ?>" class="thumbnail">
                        <img src="<?php echo ($vo['thumb']); ?>" alt="">
                        <div class="right-title"><?php echo ($vo["title"]); ?></div>
                    </a>
                </div>
            </div><?php endforeach; endif; ?>
    </div>
</div>

</div>
</div>
</div>
</div>
<footer class="navbar-fixed-bottom" style="text-align: center;height: 40px;line-height: 40px; background:#111;color: #fff3a5;">
    Copyright © 2017 Luzan.com Inc. All Rights Reserved. 路赞杂志社 版权所有
</footer>
</body>
<script src="Public/js/jquery.1.10.2.js"></script>
<script src="Public/js/bootstrap.js"></script>
<script src="Public/js/layer.js"></script>
<script src="Public/js/dialog.js"></script>
<script src="Public/js/home/index.js"></script>
</html>