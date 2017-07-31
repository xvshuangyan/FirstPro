<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-27
 * Time: 13:47
 */
function alert($_url){
    echo "<script>location.href='$_url'</script>";
}
function getContentCat($menuList,$catId){
    foreach($menuList as $value){
        if($value["menu_id"]==$catId){
            return $value["name"];
        }
    }
}
function getCopyFrom($copyList,$copyfrom){
    foreach($copyList as $key=> $value){
        if($key==$copyfrom){
            return $value;
        }
    }
}
function isThumb($thumb){
    if($thumb){
        echo "<span style='color: #ff0000;'>有</span>";
    }else{
        echo "无";
    }
}
function getStatus($status){
    if($status==1){
        echo "显示";
    }else{
        echo "隐藏";
    }
}
function getMenuType($type){
    if($type==0){
        echo "<span style='color: #d4403b;'>前台栏目</span>";
    }else{
        echo "<span style='color: #438cca;'>后台栏目</span>";
    }
}
function userStatus($status){
    if($status==1){
        echo "<img src='Public/img/admin/yes.png' title='启用状态'/>";
    }else{
        echo "<img src='Public/img/admin/cancel.png' title='禁用状态'/>";
    }
}
function getIcon($arr,$icon){
    foreach($arr as $key=> $value){
        if($key==$icon){
            return $value;
        }
    }
}
//获取文章描述
function getDescription($arr,$new_id){
    foreach($arr as $value){
        if($value["news_id"]==$new_id){
            return $value['description'];
        }
    }
}
//获取短标题
function getSmallTitle($arr,$new_id){
    foreach($arr as $value){
        if($value["news_id"]==$new_id){
            return $value['small_title'];
        }
    }
}
//获取阅读数
function getReadCount($arr,$new_id){
    foreach($arr as $value){
        if($value["news_id"]==$new_id){
            return $value['count'];
        }
    }
}

function check_verify($code, $id = ''){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}