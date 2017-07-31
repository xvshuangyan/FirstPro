<?php
namespace Admin\Controller;
use Think\Controller;
class MenuController extends Controller {
    public function index(){
        if(!session("admin")){
            alert("admin.php");
        }
        if($_POST["type"]=="0"){
            $list=D("Menu")->getHomeMenu();
            $select=array("selected");
            $this->assign("select_0",$select);
        }else if($_POST["type"]=="1"){
            $list=D("Menu")->getNavs();
            $select=array("selected");
            $this->assign("select_1",$select);
        }else{
            $list=D("Menu")->getAllNavs();
        }
        $menu= D("Menu")->getNavs();
        $this->assign("menu",$menu);
        //获取后台栏目图标
        $menu_icon=C("MENU_ICON");
        $this->assign("menu_icon",$menu_icon);
        $this->assign("list",$list);
        //注入用户名
        $this->assign("adminMessage",session("admin"));
        $this->display();
    }
    //添加菜单
    public function add(){
        if($_POST){
           $num= D("Menu")->addData($_POST);
            echo $num;
        }else{
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
    //编辑菜单
    public function edit(){
        if($_POST){
            $num= D("Menu")->saveData($_POST);
            echo $num;
        }else{
            if($_GET["id"]){
                $arr=array("menu_id"=>$_GET["id"]);
                $singleMenu=D("Menu")->getSingleMenu($arr);
                $this->assign("singleMenu",$singleMenu);
                $menu= D("Menu")->getNavs();
                $this->assign("menu",$menu);
                //获取后台栏目图标
                $menu_icon=C("MENU_ICON");
                $this->assign("menu_icon",$menu_icon);
                //注入用户名
                $this->assign("adminMessage",session("admin"));
                $this->display("Menu/add");
            }
        }
    }
    //删除菜单
    public function del(){
        if($_GET["id"]){
            $delMenu=D("Menu")->delMenu($_GET["id"]);
            echo $delMenu;
        }
    }
}