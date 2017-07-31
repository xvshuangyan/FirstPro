<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-26
 * Time: 21:55
 */
namespace Common\Model;
use Think\Model;

class PositionContentModel extends Model{
    private $_db;
    public function __construct(){
        $this->_db=M("PositionContent");
    }
    //获取推荐位内容数据总条数
    public function getPositionContentCount($condation){
        $count=$this->_db->where($condation)->Count();
        return $count;
    }
    //获取推荐位内容列表
    public function getPositionContentList($_data,$offset,$count){
        $res=$this->_db->where($_data)->order("id desc,update_time desc,listorder desc")->limit($offset,$count)->select();
        return $res;
    }
    //增加文章数据
    public function insert($_data){
        $_data["create_time"]=time();
        return $this->_db->add($_data);//返回影响行的id值
    }
    //更新推荐位文章信息
    public function savePositionData($_data){
        $_data["update_time"]=time();
        return $this->_db->where("news_id=".$_data["news_id"])->save($_data);
    }
    public function pushData($newsList,$positionId){
        if($this->_db->where("news_id=".$newsList["news_id"])->select()){//如果当前id下已经存在
            return $this->_db->where("position_id=".$positionId["position_id"])->save($newsList[0]);
        }else{
            $newsList[0]["position_id"]=$positionId["position_id"];
            return $this->_db->add($newsList[0]);
        }
    }
    public function delPositionContent($_data){
        $this->_db->where('news_id='.$_data)->delete();
        return 1;
    }
    public function delAllPositionContent($_data){
        $this->_db->where('Position_id='.$_data)->delete();
        return 1;
    }
    //更新推荐位排序
    public function updateOrder($_data){
        $this->_db->where("news_id=".$_data["news_id"])->save($_data);
        return 1;
    }
}