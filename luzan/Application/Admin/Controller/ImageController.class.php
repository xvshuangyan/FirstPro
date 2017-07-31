<?php
namespace Admin\Controller;
use Think\Controller;
class ImageController extends Controller {
    public function index(){
        if(!session("admin")){
            alert("admin.php");
        }
        $list=D("Menu")->getAllNavs();
        $menu= D("Menu")->getNavs();
        $this->assign("menu",$menu);
        $this->assign("list",$list);
        //获取后台栏目图标
        $menu_icon=C("MENU_ICON");
        $this->assign("menu_icon",$menu_icon);
        //注入用户名
        $this->assign("adminMessage",session("admin"));
        $this->display();
    }
    public function uploadThumb(){
       echo D("Image")->uploadImage();
    }
}