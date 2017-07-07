<?php 
namespace Home\Model;

use Think\Model;

/**
 * Class UserAddressModel
 * @package Home\Model
 */
class LiuyanModel extends Model
{
	protected $_validate = array(
        array('useremail', 'require', '邮箱必填'), //默认情况下用正则进行验证
        array('useremail', 'email', '邮箱格式不正确'), 
        array('username', 'require', '用户名必填'), 
        array('phone', 'passphone', '手机号码格式有误',1,'callback'),
    	array('content', 'require', '留言内容不能为空',1),
    );

    function passphone($phone)
    {
    	
    	 if(preg_match("/^1(3[0-9]|4[57]|5[0-35-9]|7[0135678]|8[0-9])\\d{8}$/",$phone))
    	 {
    	 	return true;
    	 }
    	 else
    	 {
    	 	return false;
    	 }
    }

    public function liuyan(){
    	$liuyan=M('liuyan');
    	$ly=$liuyan->order('addtime desc')->limit(4)->select();
    	return $ly;
    }
}

