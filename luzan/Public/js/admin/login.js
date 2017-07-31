/**
 * Created by Administrator on 2016-10-26.
 */
var login={
    check: function () {
        var username=$('input[name="username"]').val();
        var password=$('input[name="password"]').val();
        if(!username&&!password){
            dialog.error("用户名和密码不能为空！");
        }else if(!password){
            dialog.error("密码不能为空！");
        }else if(!username){
            dialog.error("用户名不能为空！");
        }
        var _data="username="+username+"&password="+password;
        $.ajax({
            type:"post",
            data:_data,
            url:"admin.php?c=login&a=check",
            dataType:"json",
            success:function(data){
                //console.log(data);
                if(data==1){
                    var _url="admin.php?c=Index";
                    dialog.success("登录成功！",_url);
                }else{
                    dialog.error("登录失败!");
                }
            }
        });
    }
};
