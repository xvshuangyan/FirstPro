<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-26
 * Time: 21:55
 */
namespace Common\Model;
use Think\Model;

class ContentModel extends Model{
    private $_db;
    public function __construct(){
        $this->_db=M("news");
    }
    //获取文章条数
    public function getlist($condation){
        $count=$this->_db->where($condation)->Count();
        return $count;
    }
    //获取当前页的文章列表
    public function getCurrentList($condation,$offset,$perPageCount){
        $res=$this->_db->where($condation)->order("update_time desc,listorder desc")->limit($offset,$perPageCount)->select();
        return $res;
    }
    //增加文章数据
    public function insert($_data){
        $_data["username"]=session("admin")["username"];
        $_data["create_time"]=time();
        return $this->_db->add($_data);//返回影响行的id值
    }
    //获取文章以阅读量从大到小排序
    public function getMaxReadCount($offset,$count){
        $res=$this->_db->order("count desc")->limit($offset,$count)->select();
        return $res;
    }
    //修改文章
    public function saveData($_data){
        $_data["username"]=session("admin")["username"];
        $_data["update_time"]=time();
        return $this->_db->where('news_id='.$_data["news_id"])->save($_data);
    }
    //增加文章阅读量
    public function saveCount($readCount,$newsId){
        $this->_db->where($newsId)->save($readCount);
    }
    //局部更新阅读量
    public function getAllnewsCount($data){
        $map["news_id"]=array("in",$data);
        return $this->_db->where($map)->select();
    }
    //删除当前文章
    public function delContent($_data){
        $this->_db->where('news_id='.$_data)->delete();
        return 1;
    }
    //更新排序
    public function updateOrder($_data){
        $this->_db->where("news_id=".$_data["news_id"])->save($_data);
        return 1;
    }
}