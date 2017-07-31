<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost',// 服务器地址
    'DB_NAME' => 'bigcms',  // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'root', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => 'cms_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志

    //标题颜色配置
    "TITLE_COLOR"=>array(
        "#ff0000"=>"红色",
        "#00ff00"=>"绿色",
        "#0000ff"=>"蓝色"
    ),
    //新闻来源配置
    "ARTICLE_FROM"=>array(
        "0"=>"本站",
        "1"=>"网易新闻",
        "2"=>"央视新闻",
        "3"=>"腾讯新闻"
    ),
    //后台栏目图标配置
    "MENU_ICON"=>array(
        "menu"=>"glyphicon glyphicon-th-list",
        "content"=>"glyphicon glyphicon-book",
        "user"=>"glyphicon glyphicon-user",
        "position"=>"glyphicon glyphicon-bookmark",
        "positionContent"=>"glyphicon glyphicon-tasks",
        "basic"=>"glyphicon glyphicon-cog"
    ),
    //前台静态文件后缀名配置
    "HTML_FILE_SUFFIX"=>".html",
    //绝对路径配置
    "HTTP_PATH"=>"http://localhost/mypro/cms/",
    //url模式设置为普通模式
    'URL_MODEL'=>  0,
);