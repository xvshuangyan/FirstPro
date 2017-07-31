<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

class UserController extends Controller {
    public function index(){
        if(!session("admin")){
            alert("admin.php");
        }
        $menu= D("Menu")->getNavs();
        $this->assign("menu",$menu);
        //获取后台栏目图标
        $menu_icon=C("MENU_ICON");
        $this->assign("menu_icon",$menu_icon);

        //模糊查询推荐位列表
        $condation=array();
        $pagCondation=array();//不同分类下的搜索条件的集合
        if($_POST["username"]){
            $condation["username"]=array("like",'%'.$_POST["username"].'%');
            $pagCondation['username']=$_POST["username"];
        }
        if($_GET['username']){
            $condation["username"]=array("like",'%'.$_GET["username"].'%');
            $pagCondation['username']=$_GET["username"];
        }
        //注入查询内容
        $this->assign("pagCondation",$pagCondation);

        //定义每页显示的条数
        $perPageCount=6;

        //按条件获取数据总条数
        $totalCount=D("Admin")->getUserListCount($condation);

        //获取分页的id值
        $pageId=isset($_GET["p"])?$_GET["p"]:1;

        //设置limit的偏移量
        $offset=($pageId-1)*$perPageCount;

        //按条件获取当前页数据列表
        $perPageList=D("Admin")->getUserList($condation,$offset,$perPageCount);
        $this->assign("perPageList",$perPageList);

        $pag=new Page($totalCount,$perPageCount,$pagCondation);

        //更改上下页的样式
        $pag->setConfig("prev","上一页");
        $pag->setConfig("next","下一页");
        $pagUi=$pag->show();
        $this->assign("pagUi",$pagUi);

        $userList=D("Admin")->getUserList();
        $this->assign("userList",$userList);
        //注入用户名
        $this->assign("adminMessage",session("admin"));
        $this->display();
    }
    public function add(){
        if($_POST){
            $res=D("Admin")->insert($_POST);
            echo $res;
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
    public function edit(){
        if($_POST){
            $res=D("Admin")->saveData($_POST);
            echo $res;
        }else{
            if($_GET["id"]){
                $arr=array("admin_id"=>$_GET["id"]);
                $adminList=D("Admin")->getUserList($arr);
                $this->assign("adminList",$adminList);
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
    }
    public function del(){
        if($_GET["id"]){
            $delUser=D("Admin")->delUser($_GET["id"]);
            echo $delUser;
        }
    }
}