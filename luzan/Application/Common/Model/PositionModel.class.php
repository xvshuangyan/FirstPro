<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-26
 * Time: 21:55
 */
namespace Common\Model;
use Think\Model;

class PositionModel extends Model{
    private $_db;
    public function __construct(){
        $this->_db=M("Position");
    }
    //获取广告位数据条数
    public function getPositionListCount($condition){
        $res=$this->_db->where($condition)->count();
        return $res;
    }
    //获取广告位列表
    public function getPositionList($condition,$offset,$perPageCount){
        $res=$this->_db->where($condition)->limit($offset,$perPageCount)->select();
        return $res;
    }
    //增加推荐位数据
    public function insert($_data){
        $_data["create_time"]=time();
        if($this->_db->add($_data)){//返回影响行的id值
            return 1;
        }
    }
    public function saveData($data){
        if($this->_db->where('id='.$data["id"])->save($data)){
            return 1;
        }
    }
    public function delPosition($_data){
        $this->_db->where('id='.$_data)->delete();
        return 1;
    }
}