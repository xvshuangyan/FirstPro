<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

class PositionContentController extends Controller {
    public function index(){
        if(!session("admin")){
            alert("admin.php");
        }
        $menu= D("Menu")->getNavs();
        $this->assign("menu",$menu);
        //获取后台栏目图标
        $menu_icon=C("MENU_ICON");
        $this->assign("menu_icon",$menu_icon);
        //获取推荐位数据
        $positionList=D("Position")->getPositionList();
//        var_dump($positionList);
        $this->assign("positionList",$positionList);
        //模糊查询推荐位列表
        $condation=array();
        $pagCondation=array();//不同分类下的搜索条件的集合
        if($_POST["position_id"]){
            $condation["position_id"]=array("eq",$_POST["position_id"]);
            $pagCondation['position_id']=$_POST["position_id"];
        }
        if($_POST["title"]){
            $condation["title"]=array("like",'%'.$_POST["title"].'%');
            $pagCondation['title']=$_POST["title"];
        }
        if($_GET['position_id']){
            $condation["position_id"]=array("eq",$_GET["position_id"]);
            $pagCondation['position_id']=$_GET["position_id"];
        }
        if($_GET['title']){
            $condation["title"]=array("like",'%'.$_GET["title"].'%');
            $pagCondation['title']=$_GET["title"];
        }
        //注入查询内容
        $this->assign("pagCondation",$pagCondation);

        //定义每页显示的条数
        $perPageCount=6;

        //按条件获取数据总条数
        $totalCount=D("PositionContent")->getPositionContentCount($condation);

        //获取分页的id值
        $pageId=isset($_GET["p"])?$_GET["p"]:1;

        //设置limit的偏移量
        $offset=($pageId-1)*$perPageCount;

        //按条件获取当前页数据列表
        $perPageList=D("PositionContent")->getPositionContentList($condation,$offset,$perPageCount);
        $this->assign("perPageList",$perPageList);

        $pag=new Page($totalCount,$perPageCount,$pagCondation);

        //更改上下页的样式
        $pag->setConfig("prev","上一页");
        $pag->setConfig("next","下一页");
        $pagUi=$pag->show();
        $this->assign("pagUi",$pagUi);
        //注入用户名
        $this->assign("adminMessage",session("admin"));
        $this->display();
    }
    public function add(){
        if($_POST){

            //向news表中插入数据
            $newsId=D("Content")->insert($_POST);
            if($newsId){
                $arr=array(
                    "news_id"=>$newsId,
                    "content"=>$_POST["content"]
                );
                $data=$_POST;
                $data["news_id"]=$newsId;
                //向content表中插入数据
                D("ContentMain")->insert($arr);
                //向positionContent表中插入数据
                D("PositionContent")->insert($data);
                echo 1;
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
            //获取前台菜单
            $homeMenu=D("Menu")->getHomeMenu();
            $this->assign("homeMenu",$homeMenu);
            //获取推荐位列表
            $perPageList=D("Position")->getPositionList();
            $this->assign("perPageList",$perPageList);
            //注入用户名
            $this->assign("adminMessage",session("admin"));
            $this->display();
        }
    }
    public function edit(){
        if($_POST){
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

                //获取当前id下的推荐位文章数据
                $sigleContent=D("Content")->getCurrentList($arr);
//                var_dump($sigleContent);
                $this->assign("sigleContent",$sigleContent);

                //获取当前id下的推荐位文章内容
                $positionContent=D("ContentMain")->getContent($arr);
                $this->assign("positionContent",$positionContent);

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

                //获取推荐位列表
                $perPageList=D("Position")->getPositionList();
                $this->assign("perPageList",$perPageList);

                //获取当前id下文章的推荐位id
                $positionId=D("PositionContent")->getPositionContentList($arr);
                $this->assign("positionId",$positionId);
                //注入用户名
                $this->assign("adminMessage",session("admin"));
                $this->display();
            }
        }
    }
    public function del(){
        if($_GET["id"]){
            D("PositionContent")->delPositionContent($_GET["id"]);
            echo 1;
        }
    }
}