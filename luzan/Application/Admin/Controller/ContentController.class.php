<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

class ContentController extends Controller {
    public function index(){
        if(!session("admin")){
            alert("admin.php");
        }
        //获取后台左侧菜单
        $menu= D("Menu")->getNavs();
        $this->assign("menu",$menu);
        //获取后台栏目图标
        $menu_icon=C("MENU_ICON");
        $this->assign("menu_icon",$menu_icon);

        //根据搜索条件获取新闻列表
        $condation=array();
        $pagCondation=array();//不同分类下的搜索条件的集合
        if($_POST["catid"]){
            $condation["catid"]=array("eq",$_POST["catid"]);
            $pagCondation['catid']=$_POST["catid"];
        }
        if($_POST["title"]){
            $condation["title"]=array("like",'%'.$_POST["title"].'%');
            $pagCondation['title']=$_POST["title"];
        }
        if($_GET['catid']){
            $condation["catid"]=array("eq",$_GET["catid"]);
            $pagCondation['catid']=$_GET["catid"];
        }
        if($_GET['title']){
            $condation["title"]=array("like",'%'.$_GET["title"].'%');
            $pagCondation['title']=$_GET["title"];
        }
        $this->assign("pagCondation",$pagCondation);

        //定义每页显示的条数
        $perPageCount=6;

        //按条件获取数据总条数
        $totalCount=D("Content")->getList($condation);

        //获取分页的id值
        $pageId=isset($_GET["p"])?$_GET["p"]:1;

        //设置limit的偏移量
        $offset=($pageId-1)*$perPageCount;

        //按条件获取当前页数据列表
        $perPageList=D("Content")->getCurrentList($condation,$offset,$perPageCount);
        $this->assign("perPageList",$perPageList);

        $pag=new Page($totalCount,$perPageCount,$pagCondation);

        //更改上下页的样式
        $pag->setConfig("prev","上一页");
        $pag->setConfig("next","下一页");
        $pagUi=$pag->show();
        $this->assign("pagUi",$pagUi);

        //获取前台分类
        $homeMenu=D("Menu")->getHomeMenu();
        $this->assign("homeMenu",$homeMenu);

        //获取颜色和来源
        $title_color=C("TITLE_COLOR");
        $article_from=C("ARTICLE_FROM");
        $this->assign("title_color",$title_color);
        $this->assign("article_from",$article_from);

        //获取广告位列表
        $positionList=D("Position")->getPositionList();
        $this->assign("positionList",$positionList);
        //注入用户名
        $this->assign("adminMessage",session("admin"));
        $this->display();
    }
    public function add(){
        if($_POST){
           $newsId=D("Content")->insert($_POST);
            if($newsId){
                echo 1;
                $arr=array(
                    "news_id"=>$newsId,
                    "content"=>$_POST["content"]
                );
                D("ContentMain")->insert($arr);
            }else{
                echo 0;
            }
        }else{
            $title_color=C("TITLE_COLOR");
            $article_from=C("ARTICLE_FROM");
            $this->assign("title_color",$title_color);
            $this->assign("article_from",$article_from);
            //获取后台菜单
            $menu= D("Menu")->getNavs();
            $this->assign("menu",$menu);
            //获取后台栏目图标
            $menu_icon=C("MENU_ICON");
            $this->assign("menu_icon",$menu_icon);
            //获取前台菜单
            $homeMenu=D("Menu")->getHomeMenu();
            $this->assign("homeMenu",$homeMenu);
            //注入用户名
            $this->assign("adminMessage",session("admin"));
            $this->display();
        }
    }
    public function edit(){
        if($_POST){
//            var_dump($_POST);
            D("Content")->saveData($_POST);
            D("ContentMain")->saveContentData($_POST);
            D("PositionContent")->savePositionData($_POST);
            echo 1;

        }else{
            if($_GET["id"]){
                //获取后台左侧菜单
                $menu= D("Menu")->getNavs();
                $this->assign("menu",$menu);
                $arr=array("news_id"=>$_GET["id"]);
                $sigleContent=D("Content")->getCurrentList($arr);
                $this->assign("sigleContent",$sigleContent);
                //获取前台菜单
                $homeMenu=D("Menu")->getHomeMenu();
                $this->assign("homeMenu",$homeMenu);
                $title_color=C("TITLE_COLOR");
                $article_from=C("ARTICLE_FROM");
                $this->assign("title_color",$title_color);
                $this->assign("article_from",$article_from);
                $getMainContent=D("ContentMain")->getContent($arr);
                $this->assign("getMainContent",$getMainContent);
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
            //删除news表中数据
            D("Content")->delContent($_GET["id"]);
            //删除news_content表中数据
            D("ContentMain")->delContentMain($_GET["id"]);
            //删除推荐位中的数据
            D("PositionContent")->delPositionContent($_GET["id"]);
            echo 1;
        }
    }
    public function updateOrder(){
        if($_POST){
            $orderArr=json_decode($_POST["orderArr"]);
            foreach($orderArr as $value){
                $newsOrder=array(
                    "news_id"=>$value->news_id,
                    "listorder"=>$value->listorder,
                    "update_time"=>time()
                );
                D("Content")->updateOrder($newsOrder);
                D("PositionContent")->updateOrder($newsOrder);
            }
            echo 1;
        }
    }
}