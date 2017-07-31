/**
 * Created by Administrator on 2016-10-26.
 */
var login={
    check: function () {
        var username=$('input[name="username"]').val();
        var password=$('input[name="password"]').val();
        var validate=$('input[name="code"]').val();
        if(!username&&!password&&!validate){
            dialog.error("信息不能为空！");
        }else if(!password){
            dialog.error("密码不能为空！");
        }else if(!username){
            dialog.error("用户名不能为空！");
        }else if(!validate){
            dialog.error("验证码不能为空！");
        }else{
            var _data="username="+username+"&password="+password+"&code="+validate;
            $.ajax({
                type:"post",
                data:_data,
                url:"index.php?c=Login&a=check",
                dataType:"json",
                success:function(data){
                    if(data==1){
                        var _url="http://localhost/mypro/cms/";
                        dialog.success("登录成功！",_url);
                    }else if (data==2){
                        dialog.error("验证码错误!");
                    } else{
                        dialog.error("登录信息有误!");
                    }
                }
            });
        }

    }
};
