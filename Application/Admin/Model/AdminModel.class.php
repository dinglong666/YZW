<?
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model {
	 // protected $patchValidate = true;
	 protected $_validate = array(
     array('username','require','用户名必填','','',4), //默认情况下用正则进行验证
  	 array('password','require','密码必填','','',4), //默认情况下用正则进行验证
  	 array('username','haveuser','用户名不存在',1,'callback',4), //默认情况下用正则进行验证
  	 array('username,password','passok','密码不正确',1,'callback',4), //默认情况下用正则进行验证
   );

	protected function haveuser($username)
	{	
		$user=M('admin')->where("username='$username'")->find();
		if(empty($user))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	protected function passok($info)
	{	
		$user=M('admin')->where("username='$info[username]'")->find();
		if($user['password']==$info['password'])
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}