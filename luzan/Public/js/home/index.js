/**
 * Created by Administrator on 2016-11-10.
 */

//控制分页按钮的样式
$(".current").parent().addClass("active");

//获取当前网页地址链接
var currentUrl=window.location.href;
var arr=currentUrl.split("/");
for(var i=0;i<arr.length;i++){
    //实现局部更新阅读量功能
    if(arr[i]=="Detail"){
        var _id=arr[i+1].split(".")[0];//获取详情页文件名
        var _Url="http://localhost/mypro/cms/index.php?c=Detail&id="+_id;
        $.ajax({
            type:"post",
            url:_Url,
            data:_data,
            dataType:"json",
            success:function(data){}
        });
    }
    //实现导航切换样式
    if(arr[i]=="Cat"){
        var catId=arr[i+1].split(".")[0];//获取导航id
        $(".cat li").each(function(){
            $(this).removeClass("active");
           if($(this).attr("index")==catId){
                $(this).addClass("active");
           }
        });
    }
}
//点击文章列表执行查询
var newsId=[];
$(".readCount span").each(function(){
    var index=$(this).attr("index");
    newsId.push(index);
});
var Url="http://localhost/mypro/cms/index.php?c=Index&a=getCount";
var _data={
    data:newsId.toString()
};
$.ajax({
    type:"post",
    url:Url,
    data:_data,
    dataType:"json",
    success:function(data){

        $(".readCount span").each(function(i,_item){
            var index=$(this).attr("index");
            $(data).each(function(i,item){
                if(index==item["news_id"]){
                    $(_item).html(item["count"]);
                }
            });
        });
    }
});


