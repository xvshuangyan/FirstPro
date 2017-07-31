<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
        if(!session("admin")){
            alert("admin.php");
        }
        $menu= D("Menu")->getNavs();
        $this->assign("menu",$menu);
        //获取后台栏目图标
        $menu_icon=C("MENU_ICON");
        $this->assign("menu_icon",$menu_icon);
        //获取文章数量
        $articleCount=D("Content")->getlist();
        $this->assign("articleCount",$articleCount);
        //获取推荐位数
        $positionCountent=count(D("Position")->getPositionList());
        $this->assign("positionCountent",$positionCountent);
        //获取文章最大阅读数
        $maxReadCount=D("Content")->getMaxReadCount();
//        var_dump($maxReadCount);
        $this->assign("maxReadCount",$maxReadCount[0]["count"]);
        //注入用户名
        $this->assign("adminMessage",session("admin"));
        $this->display();
        }

}