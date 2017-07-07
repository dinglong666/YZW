<?php 
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize(){
        if(empty($_SESSION['admin_info']['id']))
            {
                $this->redirect('Login/login');
                die;
            }
        if(login_tf()=='error'){
            $this->error('该账号已删除',U('Login/login'));
        }
	}


	
	function upload($name){/////////////////////图片

	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     524288000 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
	    $upload->savePath  =     ''; // 设置附件上传（子）目录

	    // 上传文件 
	    $info   =   $upload->uploadOne($name);

	    if(!$info) {// 上传错误提示错误信息
	        return $this->error($upload->getError());
	    }else{
	        return $info;
	    }
	}
}