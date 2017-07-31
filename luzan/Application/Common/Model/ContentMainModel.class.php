<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-26
 * Time: 21:55
 */
namespace Common\Model;
use Think\Model;

class ContentMainModel extends Model{
    private $_db;
    public function __construct(){
        $this->_db=M("news_content");
    }
    //增加文章内容
    public function insert($_data){
        $_data["create_time"]=time();
        $_data["update_time"]=time();
        $this->_db->add($_data);//返回影响行的id值
    }
    //获取文章内容
    public function getContent($_data){
        return $this->_db->where($_data)->find();
    }
    public function saveContentData($_data){
        $_data["update_time"]=time();
        return $this->_db->where("news_id=".$_data["news_id"])->save($_data);
    }
    //删除当前文章内容
    public function delContentMain($_data){
        $this->_db->where('news_id='.$_data)->delete();
        return 1;
    }
}