<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-26
 * Time: 21:55
 */
namespace Admin\Model;
use Think\Model;

class BasicModel extends Model{
//    private $_db;
    public function __construct(){
//        $this->_db=M("Admin");
    }
    public function saveData($data){
        F("basic_cache",json_encode($data));
    }
    public function getData(){
        return F("basic_cache");
    }
}