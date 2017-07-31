<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class IndexController extends CommonController {
    public function index($type=""){
        //获取前台分类
        $menu=D("Menu")->getHomeMenu();
        $this->assign("menu",$menu);

        //获取大图推荐
        $bigPosition=array("position_id"=>2);
        $bigImg=D("PositionContent")->getPositionContentList($bigPosition,0,3);
        $this->assign("bigImg",$bigImg);

        //小图推荐
        $smallPosition=array("position_id"=>3);
        $smallImg=D("PositionContent")->getPositionContentList($smallPosition,0,3);
//        var_dump($smallImg);
        $this->assign("smallImg",$smallImg);

        //阅读排行
        $maxReadCount=D("Content")->getMaxReadCount(0,5);
        $this->assign("maxReadCount",$maxReadCount);

        //右侧广告
        $rightPosition=array("position_id"=>5);
        $rightImg=D("PositionContent")->getPositionContentList($rightPosition,0,3);
        $this->assign("rightImg",$rightImg);

        //注入绝对路径
        $path=C("HTTP_PATH");
        $this->assign("path",$path);

        //底部列表
        //定义每页显示的条数
        $perPageCount=5;

        //按条件获取数据总条数
        $totalCount=D("Content")->getList();

//        if($type=="createHtml"){
//            //计算总页数
//            $pageCount=ceil($totalCount/$perPageCount);
//
//
//            for($i=0;$i<$pageCount;$i++){
//                $offset=$i*$perPageCount;
//                //按条件获取当前页数据列表
//                $perPageList=D("Content")->getCurrentList(array(),$offset,$perPageCount);
//                $this->assign("perPageList",$perPageList);
//                $pag=new Page($totalCount,$perPageCount);
//
//                //设置分页链接样式
//                $pag->setUrl("/mypro/cms/Index/".$i.".html");
//                //更改上下页的样式
//                $pag->setConfig("prev","上一页");
//                $pag->setConfig("next","下一页");
//                $pagUi=$pag->show1();
//                $this->assign("pagUi",$pagUi);
//                if($i==0){
//                    $this->buildHtml("index",ROOT_PATH,"Index/index");
//                    $this->buildHtml($i+1,ROOT_PATH."Index/","Index/index");
//                }else{
//                    $this->buildHtml($i+1,ROOT_PATH."Index/","Index/index");
//                }
//
//            }
//
//        }else{
//            $this->display();
//        }

        //获取分页的id值
        $pageId=isset($_GET["p"])?$_GET["p"]:1;

        //设置limit的偏移量
        $offset=($pageId-1)*$perPageCount;

        //按条件获取当前页数据列表
        $perPageList=D("Content")->getCurrentList(array(),$offset,$perPageCount);
        $this->assign("perPageList",$perPageList);
        $pag=new Page($totalCount,$perPageCount);
        //更改上下页的样式
        $pag->setConfig("prev","上一页");
        $pag->setConfig("next","下一页");
        $pagUi=$pag->show();
        $this->assign("pagUi",$pagUi);

        $newsList=D("Content")->getCurrentList();
        $this->assign("newsList",$newsList);
        if($type=="createHtml"){
            if($this->buildHtml("index",ROOT_PATH,"Index/index")){
                echo 1;
            }
        }else{
            $this->display();
        }
    }
    //创建静态页面
    public function createHtml(){
        $this->index("createHtml");
        echo 1;
    }
    //局部更新
    public function getCount(){
        if($_POST){
            $res=D("Content")->getAllnewsCount($_POST["data"]);
            echo json_encode($res);
        }
    }
}