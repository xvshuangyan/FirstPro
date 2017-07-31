/**
 * Created by Administrator on 2016-11-03.
 */
//控制分页按钮的样式
$(".current").parent().addClass("active");
//删除按钮的点击事件
function delBtn(_dealUrl,_jumpUrl){
    $(".del").each(function(){
        $(this).click(function(){
            var id=$(this).parents("tr").attr("index");
            dialog.confirm("确定删除此条数据吗？",function callback(){
                $.ajax({
                    type:"get",
                    url:_dealUrl+id,
                    dataType:"json",
                    success:function(data){
                        if(data==1){
                            dialog.success("删除成功！",_jumpUrl);
                        }else{
                            dialog.error("删除失败！");
                        }
                    }
                })
            });
        });
    });
}
//更新排序
function orderBtn(_dealUrl,_jumpUrl){
    $(".order").click(function(){
        var orderArr=[];
        $(".contentOrder").each(function () {
            var orderObj={};
            orderObj.listorder=$(this).find("input").val();
            orderObj.news_id=$(this).parents("tr").attr("index");
            orderArr.push(orderObj);
        });
        $.ajax({
            type:"post",
            data:"orderArr="+JSON.stringify(orderArr),
            url:_dealUrl,
            dataType:"json",
            success:function(data){
                if(data==1){
                    //var _url="admin.php?c=Content";
                    dialog.success("更新成功！",_jumpUrl);
                }else{
                    dialog.error("更新失败!");
                }
            }
        });
    });
}


//全选控制
var chooseAll=$(".chooseAll").find("input[type='checkbox']");

chooseAll.click(function () {
    if($(this).prop("checked")){
        $(".chooseSingle").find("input[type='checkbox']").each(function(){
            $(this).prop("checked",true);
        });
    }else{
        $(".chooseSingle").find("input[type='checkbox']").each(function(){
            $(this).prop("checked",false);
        });
    }
});

//控制左侧菜单样式
//$(".leftSide").find("li").each(function(){
//    //alert($(this).find("a").attr("href"));
//    //alert($(".breadcrumb").find("a").attr("href"));
//    var href1=$(this).find("a").attr("href").split("=")[1];
//    //console.log($href1);
//    var href2=$(".breadcrumb").find("a").attr("href").split("=")[1];
//    //console.log($href2);
//    if(href1==href2){
//        $(".leftSide").find("li").css("background","#333");
//    }
//    //$(this).css("background","#333");
//});


////定义ajax通用方法
//function ajaxRequest(_url,_method,_data,callback){
//    if(_method=="post"){
//        $.ajax({
//            type:_method,
//            data:_data,
//            url:_url,
//            dataType:"json",
//            success:function(data){
//                callback(data);
//            }
//        });
//    }else {
//        $.ajax({
//            type:_method,
//            url:_url+"?"+_data,
//            dataType:"json",
//            success:function(data){
//                callback(data);
//            }
//        });
//    }
//}



