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
        <li><span class="glyphicon glyphicon-tag"></span><a href="admin.php?c=PositionContent">推荐位内容管理</a></li>
        <li class="active">添加推荐位内容</li>
    </ol>
    <form class="form-horizontal" role="form" method="post" id="addArticle">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">标题</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题">
            </div>
        </div>
        <div class="form-group">
            <label for="shortTitle" class="col-sm-2 control-label">短标题</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="shortTitle" name="small_title" placeholder="请输入短标题">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">缩略图</label>
            <div class="col-sm-8">
                <input id="file_upload" type="file" multiple="multiple">
                <img id="upload_org_code_img" style="display: none; width: 150px;height:150px;" src="" alt="">
                <input id="file_upload_image" type="hidden" name="thumb" value="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">标题颜色</label>
            <div class="col-sm-8">
                <select class="form-control" id="getColor" name="title_font_color">
                    <option disabled selected>选择颜色</option>
                    <?php if(is_array($title_color)): foreach($title_color as $key=>$vo): ?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">所属栏目</label>
            <div class="col-sm-8">
                <select class="form-control" name="catid" id="belogCat">
                    <option disabled selected>选择所属栏目</option>
                    <?php if(is_array($homeMenu)): foreach($homeMenu as $key=>$vo): ?><option value="<?php echo ($vo["menu_id"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">来源</label>
            <div class="col-sm-8">
                <select class="form-control" id="articleFrom" name="copyfrom">
                    <option selected disabled>选择文章来源</option>
                    <?php if(is_array($article_from)): foreach($article_from as $key=>$vo): ?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">内容</label>
            <div class="col-sm-8">
                <textarea  id="container" name="content"  type="text/plain" style="height: 200px;width: 100%;"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="description" name="description" placeholder="请输入描述">
            </div>
        </div>
        <div class="form-group">
            <label for="keywords" class="col-sm-2 control-label">关键字</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="keywords" name="keywords" placeholder="请输入关键字">
            </div>
        </div>
        <div class="form-group">
            <label for="keywords" class="col-sm-2 control-label">状态</label>
            <div class="col-sm-8">
                <div class="radio">
                    <label>
                        <input type="radio" name="status" id="status1" value="1" checked>
                        显示
                    </label>
                    <label>
                        <input type="radio" name="status" id="status2" value="0">
                        隐藏
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">推荐位</label>
            <div class="col-sm-8">
                <select class="form-control" id="position_id" name="position_id">
                    <option disabled selected>选择推荐位</option>
                    <?php if(is_array($perPageList)): foreach($perPageList as $key=>$vo): ?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-11">
                <button type="button" class="btn btn-primary" onclick="btnClick.addPositionArticle();">提交</button>
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
<!-- 上传插件 -->
<script src="Public/js/uploadify/jquery.uploadify.js"></script>

<script type="text/javascript" src="Public/js/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="Public/js/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script>
    $(function() {
        $('#file_upload').uploadify({
            'swf'      : "Public/js/uploadify/uploadify.swf",
            'uploader' : "admin.php?c=Image&a=uploadThumb",
            'buttonText': '上传图片',
            'fileTypeDesc': 'Image Files',
            'fileObjName' : 'file',
            //允许上传的文件后缀
            'fileTypeExts': '*.gif; *.jpg; *.png',
            'onUploadSuccess' : function(file,data,response) {
                if(response) {
                    var _url= data;
                    $('#' + file.id).find('.data').html(' 上传完毕');
                    $("#upload_org_code_img").attr("src",_url);
                    $("#file_upload_image").attr('value',_url);
                    $("#upload_org_code_img").show();
                }else{
                    dialog.error('上传失败');
                }
            }
        });
    });
    //实例化富文本编辑器
    var ue = UE.getEditor('container', {
        //设置富文本显示标签
        toolbars: [
            [
                'source', //源代码
                'undo', //撤销
                'redo', //重做
                'indent', //首行缩进
                'bold', //加粗
                'italic', //斜体
                'underline', //下划线
                'strikethrough', //删除线
                'forecolor', //字体颜色
                'backcolor', //背景色
                'justifyleft', //居左对齐
                'justifycenter', //居中对齐
                'justifyright', //居右对齐
                'justifyjustify', //两端对齐
                'fontfamily', //字体
                'fontsize', //字号
                'blockquote', //引用
                'horizontal', //分隔线
                'removeformat', //清除格式
                'cleardoc', //清空文档
                'simpleupload', //单图上传
                'insertimage', //多图上传
                'insertvideo', //视频
                'emotion', //表情
                'link', //超链接
                'unlink', //取消链接
                'insertorderedlist', //有序列表
                'insertunorderedlist', //无序列表
                'fullscreen', //全屏
                'directionalityltr', //从左向右输入
                'directionalityrtl', //从右向左输入
                'lineheight', //行间距
                'rowspacingtop', //段前距
                'rowspacingbottom', //段后距
                'imagenone', //默认
                'imageleft', //左浮动
                'imageright', //右浮动
                'imagecenter', //居中
                'edittip ', //编辑提示
                'autotypeset', //自动排版
                'inserttable', //插入表格
                'deletetable', //删除表格
                'insertrow', //前插入行
                'insertcol', //前插入列
                'mergeright', //右合并单元格
                'mergedown', //下合并单元格
                'deleterow', //删除行
                'deletecol', //删除列
                'splittorows', //拆分成行
                'splittocols', //拆分成列
                'splittocells', //完全拆分单元格
                'deletecaption', //删除表格标题
                'inserttitle', //插入标题
                'mergecells', //合并多个单元格
                'insertparagraphbeforetable' //"表格前插入行"
            ]
        ]
    });
</script>
</body>
</html>