<?php
namespace Home\Model;
use Think\Model\RelationModel;
class HomeUserModel extends RelationModel {
		protected $_link = array(
		'user_detailed' 	=>		array(
			'mapping_type'		=>		self::HAS_ONE,
			'mapping_name'		=>		'user_detailed',
			'foreign_key'		=>		'user_id',
			'mapping_fields'	=>		array('bossname','company_address','description','company_scale','company_scope'),
			'as_fields'			=>		'bossname,company_address,description,company_scale,company_scope'

			),
		'contribution' 		=>		array(
			'mapping_type'		=>		self::HAS_ONE,			
			'foreign_key'		=>		'uid',
			),
		);


		//protected $patchValidate = true;
		protected $_validate = array(
			    		 array('username','require','您的用户名不能为空',0,'regex',3), 
			    		 array('username','illegal','您的用户名存在非法字符',2,'callback',3),
			    		 array('username','','用户名已存在！',2,'unique',3), 
			    		 array('phone','require','手机号不能为空',0,'regex',3), 
			    		 array('phone','illegal','手机号存在非法字符',2,'callback',3), 
			    		 array('phone','/^(13[0-9]|14[0-9]|15[0-9]|18[0-9]|17[0-9])\d{8}$/i','手机号格式不正确',2,'regex',3), 
					     array('phone','','手机号码已存在！',2,'unique',3),
					     array('password','require','密码不能为空',1,'',3),
					     array('repassword','require','确认密码不能为空',1,'',3),  
						 array('repassword','password','两次密码不一致',1,'confirm',3),
						 array('agree','require','请勾选用户协议',1,'regex',3),
						 array('yzm','require','验证码不能为空',0,'regex',3),
						 array('yzm','passyzm','验证码错误',0,'callback',3),
					     array('phone','require','手机号不能为空',0,'',4),
					     array('password','require','密码不能为空',0,'',4),
					     array('phone','haveuser','用户不存在',0,'callback',4),
					     array('phone,password','passok','密码错误',1,'callback',4),
					     array('phone,password','passuser','用户被禁用',1,'callback',4),
					     array('yzm','require','验证码不能为空',0,'regex',5),
					     array('yzm','passyzm','验证码不正确',0,'callback',5),
					     array('password','require','密码不能为空',0,'regex',5),
					     array('repassword','require','确认密码不能为空',0,'regex',5),
					     array('repassword','password','两次密码不一致',0,'confirm',5),
	    );
	    protected $_auto = array(
			        array('apply_timer','time',1,'function'),
			        array('state','2',1),
			        array('username','myTrim',3,'callback'),
			        array('company','myTrim',3,'callback'),
			        array('user_detailed','detailed',1,'callback'),
			        array('contribution','contribution',1,'callback') 
	    );
		protected function illegal($val)
		{
				if(preg_match("/[^a-zA-Z0-9\x{4e00}-\x{9fa5}\s]/u",$val))
			 	{
			 		return false;
			 	}
			 	else
			 	{
			 		return true;
			 	}
		}
		protected function passyzm($val)
		{
				if($val==$_SESSION['msg_yzm'])
				{
					return true;
				}else
				{
					return false;
				}
		}
		protected function myTrim($val)
		{
				return str_replace(' ','',trim($val));
		}
		protected function RandPass()
		{
				return rand(100000,999999);
		}
		protected function haveuser($phone)
		{
			$m=M("home_user")->where("phone='$phone'")->find();
			if(empty($m))
			{

				return false;
			}
			else
			{
				return true;
			}
		}
		protected function passuser($info)
		{
			$user=M("home_user")->where("phone='$info[phone]'")->find();

			if($user['state']!=2)
			{
				$_SESSION['home_user_info']=$user;
				return true;
			}
			else
			{
				return false;
			}
			
		}
		protected function passok($info)
		{
			$user=M("home_user")->where("phone='$info[phone]'")->find();
		


			if($user['password']==md5($info['password']))
			{
				
				return true;
			}
			else
			{
				return false;
			}
			
		}
		
		protected function detailed()
		{
			return array('bossname'=>''); //如需使用关联写入，在从表中创建数据行而不写入任何数据。需要定义一个空字段；否则无法在从表生成数据行
		}
		protected function contribution()
		{
			return array('score'=>'100'); //如需使用关联写入，在从表中创建数据行而不写入任何数据。需要定义一个空字段；否则无法在从表生成数据行
		}
		protected function PassVerify($val)
		{

			if(!preg_match("/^[a-zA-Z]\w{5,17}$/",$val))
			{
				return false;
			}
			else
			{
				return true;
			}

		}


		

}