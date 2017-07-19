<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller
{
	public function _initialize(){
		if($_COOKIE['user_id']!=''){
			$u=M('users')->where('user_id='.$_COOKIE['user_id'])->find();
			$a=array('id'=>$u['user_id'],
				'mobile'=>$u['mobile'],
				'name'=>$u['user_name'],
				'pid'=>$u['pid'],
				'zfb'=>$u['zfb_user'],
				'wx'=>$u['wx_user'],
				'qrcode'=>$u['qrcode_id']);
			$_SESSION['user_info']=$a;
		}
	}
}