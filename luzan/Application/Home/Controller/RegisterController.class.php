<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Think\Verify;

class RegisterController extends CommonController {
    public function index(){
        //获取前台分类
        $this->display();
    }
    public function verify_c(){
        $Verify = new Verify();
        $Verify->fontSize = 70;
        $Verify->length   = 4;
        $Verify->useZh = true;
        $Verify->entry();
    }
    public function getip() {
        $unknown = 'unknown';
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        /**
         * 处理多层代理的情况
         * 或者使用正则方式：$ip = preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : $unknown;
         */
        if (false !== strpos($ip, ',')) $ip = reset(explode(',', $ip));
        return $ip;
    }
    public function check(){
        //验证码验证
        $verify = I('param.code','');

        //验证用户名密码
        $arr=D("User")->checkUser();
        if($arr&&check_verify($verify)){
            session("user",$arr);
            $arr["lastloginip"]=$this->getip();
            D("User")->saveLoginMessage($arr);
            echo 1;
        }else{
            if(!check_verify($verify)){
                echo 2;
            }else{
                echo 0;
            }
        }
    }
    public function loginOut(){
        session("user",null);
        alert("index.php");
    }
}