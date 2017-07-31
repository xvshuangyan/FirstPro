/**
 * Created by Administrator on 2016-10-26.
 */
var dialog={
    //错误弹出层
    error:function(message){
        layer.open({
            title: '错误提示'
            ,content: message
            ,icon:2
        });
    },
    //成功弹出层
    success:function(message,url){
        layer.open({
            title: '正确提示'
            ,content: message
            ,icon:1
            ,yes:function(){
                location.href=url;
            }
        });
    },
    //询问框
    confirm:function(message,callback){
        layer.confirm(message, {
            title:"信息提示",
            btn: ['确定','取消']
        }, function(){
            callback();
        });
    }
};
