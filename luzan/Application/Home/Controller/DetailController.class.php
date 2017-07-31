<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends CommonController {
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
        $arr=array("news_id"=>$_GET["id"]);
        $newsList=D("Content")->getCurrentList($arr);
        $newsContentList=D("ContentMain")->getContent($arr);

        $article_from=C("ARTICLE_FROM");
        $toShow=array(
            "title"=>$newsList[0]['title'],
            "update_time"=>$newsList[0]['update_time'],
            "copyfrom"=>$article_from[$newsList[0]['copyfrom']],
            "content"=>$newsContentList["content"]
        );
        $this->assign("toShow",$toShow);

        //每次点击进来增加一次count值（阅读量）
        $count=intval($newsList[0]["count"])+1;
        $readCount=array("count"=>$count);
        D("Content")->saveCount($readCount,$arr);

        //注入绝对路径
        $path=C("HTTP_PATH");
        $this->assign("path",$path);

        if($type=="createHtml"){
            $this->buildHtml($arr["news_id"],ROOT_PATH."Detail/","Detail/index");
        }else{
            $this->display();
        }
    }
    public function createHtml(){
        //找到所有显示状态下的文章
        $condi=array("status"=>1);
        $articles=D("Content")->getCurrentList($condi);
        foreach($articles as $value){
            $_GET["id"]=$value["news_id"];
            $this->index("createHtml");
        }
        echo 1;
    }
}