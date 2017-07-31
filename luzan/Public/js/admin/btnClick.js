/**
 * Created by Administrator on 2016-10-31.
 */
var btnClick={
    addMenu:function(){
        var _data=$("form").serialize();
        $.ajax({
            type:"post",
            data:_data,
            url:"admin.php?c=Menu&a=add",
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=Menu&a=add";
                    dialog.success("添加成功！",_url);
                }else{
                    dialog.error("添加失败!");
                }
            }
        });
    },
    editMenu:function(){
        var _data=$("form").serialize();
        $.ajax({
            type:"post",
            data:_data,
            url:"admin.php?c=Menu&a=edit",
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=Menu";
                    dialog.success("修改成功！",_url);
                }else{
                    dialog.error("修改失败!");
                }
            }
        });
    },
    addArticle:function(){
        var _data=$("#addArticle").serialize();
        var Url="admin.php?c=Content&a=add";
        $.ajax({
            type:"post",
            data:_data,
            url:Url,
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=Content";
                    dialog.success("添加成功！",_url);
                }else{
                    dialog.error("添加失败!");
                }
            }
        });
    },
    addPositionArticle:function(){
        var _data=$("#addArticle").serialize();
        var Url="admin.php?c=PositionContent&a=add";
        $.ajax({
            type:"post",
            data:_data,
            url:Url,
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=PositionContent";
                    dialog.success("添加成功！",_url);
                }else{
                    dialog.error("添加失败!");
                }
            }
        });
    },
    editArticle: function () {
        var Url="admin.php?c=Content&a=edit";
        var _data=$("#addArticle").serialize();

        $.ajax({
            type:"post",
            data:_data,
            url:Url,
            dataType:"json",
            success:function(data){
                console.log(data);
                if(data==1){
                    var _url="admin.php?c=Content";
                    dialog.success("修改成功！",_url);
                }else{
                    dialog.error("修改失败!");
                }
            }
        });
    },
    editPositionArticle: function () {
        var _data=$("#addArticle").serialize();
        var Url="admin.php?c=PositionContent&a=edit";
        $.ajax({
            type:"post",
            data:_data,
            url:Url,
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=PositionContent";
                    dialog.success("修改成功！",_url);
                }else{
                    dialog.error("修改失败!");
                }
            }
        });
    },
    addUser:function(){
        var _data=$("#adminMessage").serialize();
        var Url="admin.php?c=User&a=add";
        $.ajax({
            type:"post",
            data:_data,
            url:Url,
            dataType:"json",
            success:function(data){
                console.log(data);
                if(data==1){
                    var _url="admin.php?c=User";
                    dialog.success("添加成功！",_url);
                }else{
                    dialog.error("添加失败!");
                }
            }
        });
    },
    editUser:function(){
        var _data=$("#adminMessage").serialize();
        var Url="admin.php?c=User&a=edit";
        $.ajax({
            type:"post",
            data:_data,
            url:Url,
            dataType:"json",
            success:function(data){
                console.log(data);
                if(data==1){
                    var _url="admin.php?c=User";
                    dialog.success("修改成功！",_url);
                }else{
                    dialog.error("修改失败!");
                }
            }
        });
    },
    basicManage:function(){
        var _data=$("#basicManage").serialize();
        var Url="admin.php?c=Basic";
        $.ajax({
            type:"post",
            data:_data,
            url:Url,
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=Basic";
                    dialog.success("修改成功！",_url);
                }else{
                    dialog.error("修改失败!");
                }
            }
        });
    },
    addPosition:function(){
        var _data=$("#positionManage").serialize();
        var Url="admin.php?c=Position&a=add";
        $.ajax({
            type:"post",
            data:_data,
            url:Url,
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=Position";
                    dialog.success("添加成功！",_url);
                }else{
                    dialog.error("添加失败!");
                }
            }
        });
    },
    editPosition:function(){
        var _data=$("#positionManage").serialize();
        var Url="admin.php?c=Position&a=edit";
        $.ajax({
            type:"post",
            data:_data,
            url:Url,
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=Position";
                    dialog.success("编辑成功！",_url);
                }else{
                    dialog.error("编辑失败!");
                }
            }
        });
    },
    updateIndex:function(){
        var Url="index.php?c=index&a=createHtml";
        $.ajax({
            //type:"post",
            url:Url,
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=Basic&a=cache";
                    dialog.success("更新成功！",_url);
                }else{
                    dialog.error("更新失败!");
                }
            }
        });
    },
    updateColumn:function(){
        var Url="index.php?c=Cat&a=createHtml";
        $.ajax({
            url:Url,
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=Basic&a=cache";
                    dialog.success("更新成功！",_url);
                }else{
                    dialog.error("更新失败!");
                }
            }
        });
    },
    updateDetail: function () {
        var Url="index.php?c=Detail&a=createHtml";
        $.ajax({
            url:Url,
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=Basic&a=cache";
                    dialog.success("更新成功！",_url);
                }else{
                    dialog.error("更新失败!");
                }
            }
        });
    },
    //推送文章
    pushData:function(){
        var pushArr=[];
        $(".chooseSingle").find("input[type='checkbox']").each(function(){
            if($(this).prop("checked")){
                var dataObj={};
                dataObj.id=$(this).parents("tr").find("#news_id").html();
                dataObj.position_id=$("select[name='position_id']").val();
                pushArr.push(dataObj);
            }
        });
        var Url="admin.php?c=Position&a=push";
        $.ajax({
            type:"post",
            data:"pushArr="+JSON.stringify(pushArr),
            url:Url,
            dataType:"json",
            success:function(data){
                if(data==1){
                    var _url="admin.php?c=Content";
                    dialog.success("推送成功！",_url);
                }else{
                    dialog.error("推送失败!");
                }
            }
        });
    }
};