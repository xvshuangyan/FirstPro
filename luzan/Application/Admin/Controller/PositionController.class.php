<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

class PositionController extends Controller {
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
        if($_POST["name"]){
            $condation["name"]=array("like",'%'.$_POST["name"].'%');
            $pagCondation['name']=$_POST["name"];
        }
        if($_GET['name']){
            $condation["name"]=array("like",'%'.$_GET["name"].'%');
            $pagCondation['name']=$_GET["name"];
        }
        //注入查询内容
        $this->assign("pagCondation",$pagCondation);

        //定义每页显示的条数
        $perPageCount=6;

        //按条件获取数据总条数
        $totalCount=D("Position")->getPositionListCount($condation);

        //获取分页的id值
        $pageId=isset($_GET["p"])?$_GET["p"]:1;

        //设置limit的偏移量
        $offset=($pageId-1)*$perPageCount;

        //按条件获取当前页数据列表
        $perPageList=D("Position")->getPositionList($condation,$offset,$perPageCount);
        $this->assign("perPageList",$perPageList);

        $pag=new Page($totalCount,$perPageCount,$pagCondation);

        //更改上下页的样式
        $pag->setConfig("prev","上一页");
        $pag->setConfig("next","下一页");
        $pagUi=$pag->show();
        $this->assign("pagUi",$pagUi);

        $positionList= D("Position")->getPositionList($condation);
        $this->assign("positionList",$positionList);
        //注入用户名
        $this->assign("adminMessage",session("admin"));
        $this->display();
    }
    public function add(){
        if($_POST){
            $position=D("Position")->insert($_POST);
            echo $position;
        }else{
            //获取后台菜单
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
            $res=D("Position")->saveData($_POST);
            echo $res;
        }else{
            if($_GET["id"]){
                $arr=array("id"=>$_GET["id"]);
                $siglePositiont=D("Position")->getPositionList($arr);
                $this->assign("siglePositiont",$siglePositiont);
                //获取后台菜单
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
    public function push(){
        if($_POST){
            $pushArr=json_decode($_POST["pushArr"]);
            $num=0;
            foreach($pushArr as $value){
                $newsId=array("news_id"=>$value->id);
                $positionId=array("position_id"=>$value->position_id);
                $newsList=D("Content")->getCurrentList($newsId);
                $res=D("PositionContent")->pushData($newsList,$positionId);
                $num=$num+$res;
            }
            if($num>0){
                echo 1;
            }
        }
    }
    public function del(){
        if($_GET["id"]){
            D("Position")->delPosition($_GET["id"]);
            //删除此分类下所有的文章
            D("PositionContent")->delAllPositionContent($_GET["id"]);
            echo 1;
        }
    }
}