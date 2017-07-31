<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

class BasicController extends Controller {
    public function index(){
        if(!session("admin")){
            alert("admin.php");
        }
        if($_POST){
            D("Basic")->saveData($_POST);
            echo 1;
        }else{
            $data=D("Basic")->getData();
            $this->assign("data",json_decode($data));
            $menu= D("Menu")->getNavs();
            $this->assign("menu",$menu);
            //获取后台栏目图标
            $menu_icon=C("MENU_ICON");
            $this->assign("menu_icon",$menu_icon);
            //注入用户名
            $this->assign("adminMessage",session("admin"));
            $this->display();
        }

    }
    public function cache(){
        $menu= D("Menu")->getNavs();
        $this->assign("menu",$menu);
        //获取后台栏目图标
        $menu_icon=C("MENU_ICON");
        $this->assign("menu_icon",$menu_icon);
        //注入用户名
        $this->assign("adminMessage",session("admin"));
        $this->display();
    }
    public function add(){
        $menu= D("Menu")->getNavs();
        $this->assign("menu",$menu);
        //注入用户名
        $this->assign("adminMessage",session("admin"));
        $this->display();
    }
}