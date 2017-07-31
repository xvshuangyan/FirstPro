<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-26
 * Time: 21:55
 */
namespace Common\Model;
use Think\Model;

class MenuModel extends Model{
    private $_db;
    public function __construct(){
        $this->_db=M("Menu");
    }
    //获取后台菜单
    public function getNavs(){
       $res=$this->_db->where("type=1")->select();
        return $res;
    }
    //获取所有菜单列表
    public function getAllNavs(){
        $res=$this->_db->order('listorder desc')->select();
        return $res;
    }
    public function addData($_data){
        if($this->_db->add($_data)){
            return 1;
        }
    }
    //获取前台menu
    public function getHomeMenu(){
        $res=$this->_db->where('type=0')->select();
        return $res;
    }
    //获取当前编辑的菜单信息
    public function getSingleMenu($_data){
        return $this->_db->where($_data)->select();
    }
    public function saveData($_data){
        $this->_db->where("menu_id=".$_data["menu_id"])->save($_data);
        return 1;
    }
    //删除当前菜单
    public function delMenu($_data){
        $this->_db->where('menu_id='.$_data)->delete();
        return 1;
    }
}