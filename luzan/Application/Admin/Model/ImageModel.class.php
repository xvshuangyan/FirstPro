<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-26
 * Time: 21:55
 */
namespace Admin\Model;
use Think\Model;
use Think\Upload;

class ImageModel extends Model{
    private $_db;
    public function __construct(){
        $this->_db=M("menu");
    }
    public function uploadImage(){
        $upload=new Upload();
        $upload->rootPath="upload/";
        $res=$upload->upload();
        $_url=$upload->rootPath.$res["file"]["savepath"].$res["file"]["savename"];
        echo $_url;
    }
}