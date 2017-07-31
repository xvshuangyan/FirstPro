<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class CatController extends CommonController {
    public function index($type=""){
        //获取前台分类
        $menu=D("Menu")->getHomeMenu();
        $this->assign("menu",$menu);
        //阅读排行
        $maxReadCount=D("Content")->getMaxReadCount(0,5);
        $this->assign("maxReadCount",$maxReadCount);
        //右侧广告
        $rightPosition=array("position_id"=>5);
        $rightImg=D("PositionContent")->getPositionContentList($rightPosition,0,3);
        $this->assign("rightImg",$rightImg);
        //新闻列表
        if($_GET){
            $arr=array("catid"=>$_GET["id"]);
        }else{
            $this->error();
            return;
        }
        //注入绝对路径
        $path=C("HTTP_PATH");
        $this->assign("path",$path);

        //定义每页显示的条数
        $perPageCount=6;

        //按条件获取数据总条数
        $totalCount=D("Content")->getList($arr);


//        if($type=="createHtml"){
//            //计算总页数
//            $pageCount=ceil($totalCount/$perPageCount);
//            for($i=0;$i<$pageCount;$i++){
//                $offset=$i*$perPageCount;
//                //按条件获取当前页数据列表
//                $perPageList=D("Content")->getCurrentList($arr,$offset,$perPageCount);
//                $this->assign("perPageList",$perPageList);
//                $pag=new Page($totalCount,$perPageCount);
//                //更改上下页的样式
//                $pag->setConfig("prev","上一页");
//                $pag->setConfig("next","下一页");
//                $pagUi=$pag->home();
//                $this->assign("pagUi",$pagUi);
//                if($i==0){
//                    $this->buildHtml($arr["catid"],ROOT_PATH."Cat/","Cat/index");
//                    $this->buildHtml($i+1,ROOT_PATH."Cat/".$arr['catid']."/","Cat/index");
//                }else{
//                    $this->buildHtml($i+1,ROOT_PATH."Cat/".$arr['catid']."/","Cat/index");
//                }
//            }
//        }else{
//            $this->display();
//        }

        //获取分页的id值
        $pageId=isset($_GET["p"])?$_GET["p"]:1;

        //设置limit的偏移量
        $offset=($pageId-1)*$perPageCount;

        //按条件获取当前页数据列表
        $perPageList=D("Content")->getCurrentList($arr,$offset,$perPageCount);
        $this->assign("perPageList",$perPageList);
        $pag=new Page($totalCount,$perPageCount);
        //更改上下页的样式
        $pag->setConfig("prev","上一页");
        $pag->setConfig("next","下一页");
        $pagUi=$pag->show();
        $this->assign("pagUi",$pagUi);

        if($type=="createHtml"){
            $this->buildHtml($arr["catid"],ROOT_PATH."Cat/","Cat/index");
        }else{
            $this->display();
        }
    }
    public function createHtml(){
        //找到前台所有栏目
        $columns=D("Menu")->getHomeMenu();
        foreach($columns as $value){
            $_GET["id"]=$value["menu_id"];
            $this->index("createHtml");
        }
        echo 1;
    }
}