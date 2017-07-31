<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-26
 * Time: 21:55
 */
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{
    private $_db;
    public function __construct(){
        $this->_db=M("Admin");
    }
    public function checkAdmin(){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $arr=array(
            "username"=>$username,
            "password"=>md5($password)
        );
        return $this->_db->where($arr)->find();
    }
    //存储用户信息
    public function saveLoginMessage($_data){
        $_data["lastlogintime"]=time();
        $this->_db->where("admin_id=".$_data["admin_id"])->save($_data);
    }
    //获取用户列表
    public function getUserListCount($condation){
        $count=$this->_db->where($condation)->Count();
        return $count;
    }
    public function getUserList($condation,$offset,$perPageCount){
        return $this->_db->where($condation)->limit($offset,$perPageCount)->select();
    }
    public function insert($_data){
        $_data["password"]=md5($_data["password"]);
        $_data["lastlogintime"]=time();
       if($this->_db->add($_data)){
           return 1;
       }
    }
    public function saveData($_data){
        $_data["password"]=md5($_data["password"]);
        return $this->_db->where("admin_id=".$_data["admin_id"])->save($_data);
    }
    public function delUser($_data){
        $this->_db->where('admin_id='.$_data)->delete();
        return 1;
    }
}