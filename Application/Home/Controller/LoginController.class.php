<?php
namespace Home\Controller;
class LoginController extends BaseController 
{
	//跳转到登录或注册页
	public function register(){
		//查询公司员工
		$yg=M('users')->where('stateid=1')->select();
		//查询是否通过扫描自由经理人的二维码注册
		if(!empty($_GET['id'])){
			$id=trim($_GET['id']);
		}else{
			$id=0;
		}
		//判断是登录还是注册
		if($_GET['zcdl']==''){
			$_SESSION['zcdl']=0;
		}else{
			$_SESSION['zcdl']=1;
		}
		$this->assign('zcdl',$zcdl);
		$this->assign('id',$id);
		$this->assign('yg',$yg);
		$this->display();
	}

	//ajax登录
	public function verification(){
		$mm=md5(trim($_POST['mm']));
		$sjh=trim($_POST['sjh']);
		$i=I('post.i',0,'intval');
		$user=M('users')->where('mobile="'.$sjh.'" and password="'.$mm.'"')->find();
		if($user!=''){  //////储存会员信息到session
			$ar='登录成功';
			$n=1;
			$arr=array('id'=>$user['user_id'],
				'mobile'=>$user['mobile'],
				'name'=>$user['user_name'],
				'pid'=>$user['pid'],
				'zfb'=>$user['zfb_user'],
				'wx'=>$user['wx_user'],
				'qrcode'=>$user['qrcode_id']);
			$_SESSION['user_info']=$arr;
			if($i==1){  //前台登录选择记住密码时,存储会员信息到cookie
				setcookie('user_id',$user['user_id'],time()+3600,'/');
			}
		}else{
			$ar='账号或密码错误';
			$n=0;			
		}
		echo  '{"ar":"'.$ar.'","n":"'.$n.'"}';
	}

	//退出登录
	public function quit()
	{
		setcookie('user_id',null,time()+1,'/');
		unset($_SESSION['user_info']);
		$this->redirect('Index/index');
	}

	//发送短信验证码
	public function set_msg_yzm()
    {
        $phone=$_POST['phone'];
        if($phone==''){
        	echo '{"state":"请输入手机号","msg":"0"}';
        	die;
        }
        $msg_yzm=rand(100000,999999);
        $_SESSION['msg_yzm']=$msg_yzm;
        $_SESSION['zcsj']=$phone;
        // 获得零点的时间戳
		$time1 = strtotime(date('Ymd'));
		// 获得今天24点的时间戳
		$time2 = strtotime(date('Ymd')) + 86400;
        if($_POST['qr']=='qr'){
			if(time()>$time1 && time()<$time2){
				if(reqx2('qr'.time1.$_SERVER["REMOTE_ADDR"])==3){
					echo '{"state":"一天只能发送验证码三次","msg":"0"}';
					die;
				}
				if(reqx2('qr'.time1.$_SERVER["REMOTE_ADDR"])==''){
					reqx('qr'.time1.$_SERVER["REMOTE_ADDR"],1);
				}else{
					reqx('qr'.time1.$_SERVER['REMOTE_ADDR'],reqx2('qr'.time1.$_SERVER['REMOTE_ADDR'])+1);
				}
			}
        }else{
	        // 判断手机号是否已注册
	        $u=M('users')->where('mobile='.$phone)->find();
	        if($u!=''){
	        	echo '{"state":"手机号已注册","msg":"0"}';
	        	die;        	
	        }
			// if(time()>$time1 && time()<$time2){
			// 	if(reqx2(time1.$_SERVER["REMOTE_ADDR"])==3){
			// 		echo '{"state":"一天只能发送验证码三次","msg":"0"}';
			// 		die;
			// 	}
			// 	if(reqx2(time1.$_SERVER["REMOTE_ADDR"])==''){
			// 		reqx(time1.$_SERVER["REMOTE_ADDR"],1);
			// 	}else{
			// 		reqx(time1.$_SERVER['REMOTE_ADDR'],reqx2(time1.$_SERVER['REMOTE_ADDR'])+1);
			// 	}
			// }
        }
        /*
            ***聚合数据（JUHE.CN 
		）短信API服务接口PHP请求示例源码
            ***DATE:2015-05-25
        */             
        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
         
        $smsConf = array(
        'key'   => '9e255957641355b9a8631a69c70ce480', //您申请的APPKEY
            'mobile'    => $phone, //接受短信的用户手机号码
            'tpl_id'    => '9088', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$msg_yzm, //您设置的模板变量，根据实际情况修改
        );

        $content = juhecurl($sendUrl,$smsConf,1); //请求发送短信

        if($content){
            $result = json_decode($content,true);
            $error_code = $result['error_code'];
            if($error_code != 0){                    //状态非0，说明失败
                $msg = $result['reason'];
                echo '{"state":"短信发送失败","msg":"0"}';
            }else{
            	echo '{"state":"短信发送成功","msg":"1"}';
            }
        }else{
            //返回内容异常，以下可根据业务逻辑自行修改
            echo '{"state":"短信发送失败","msg":"0"}';
        }
    }

    //注册会员
    public function login_yz(){
    	$yhm=I('post.yhm','','trim');
        $zcsj=I('post.zcsj','','trim');
        $mi=I('post.mi','','trim');
        $ma=I('post.ma','','trim');
        $yzm=I('post.yzm','','trim');
        $sel=I('post.sel',0,'intval');
        $id=I('post.idd',0,'intval');
        if($yhm==''){
            $ar='用户名不能为空';
            $tf=0;
        }elseif(strlen($yhm)>21){
            $ar='用户名不能大于七个字';
            $tf=0;
        }elseif($zcsj!=$_SESSION['zcsj']){
        	$ar='用户输入的手机号与验证码发送的手机号不一致';
        	$tf=0;
        }elseif($yzm!=$_SESSION['msg_yzm']){
        	$ar='验证码错误';
        	$tf=0;
        }elseif($mi==''){
        	$ar='密码不能为空';
        	$tf=0;
        }elseif($mi!=$ma){
        	$ar='两次密码输入不一致';
        	$tf=0;        	
        }elseif($sel==0 && $id==0){
        	$ar='请选择介绍人1';
        	$tf=0;        	
        }else{
        	if($id!=0){
        		$idd=$id;
        	}else{
        		$idd=$sel;
        	}
        	$arr=array('password'=>md5($mi),'reg_time'=>time(),'mobile'=>$zcsj,'mobile_validated'=>1,'user_name'=>$yhm,'introduce'=>$idd);
        	$use=M('users')->add($arr);
        	if($use){
				$qr=qrcode($use);  //注册会员成功后，生成二维码到会员表中
				$qr=M('qrcode')->add(array('qrcode_path'=>$qr));
				M('users')->where('user_id='.$use)->save(array('qrcode_id'=>$qr));
				$user=M('users')->where('user_id='.$use)->find();
				if($user!=''){  //////储存会员信息到session
					$arr=array('id'=>$user['user_id'],
						'mobile'=>$user['mobile'],
						'name'=>$user['user_name'],
						'pid'=>$user['pid'],
						'zfb'=>$user['zfb_user'],
						'wx'=>$user['wx_user'],
						'qrcode'=>$user['qrcode_id']);
					$_SESSION['user_info']=$arr;
        		$ar='注册成功';
        		$tf=1;
        		}else{
	        		$ar='注册失败';
	        		$tf=0;        		
        		}
        	}
      	}
        echo '{"ar":"'.$ar.'","tf":"'.$tf.'"}';
    }

    //首页注册会员
    public function syzc(){
    	$phone=I('post.phone','','trim');
    	$yzm=I('post.yzm','','trim');
    	$pwd=I('post.pwd',0,'intval');
        if($phone!=$_SESSION['zcsj']){
        	$ar='用户输入的手机号与验证码发送的手机号不一致';
        	$tf=0;
        }elseif($yzm!=$_SESSION['msg_yzm']){
        	$ar='验证码错误';
        	$tf=0;
        }elseif($pwd==''){
        	$ar='密码不能为空';
        	$tf=0;
        }elseif(!is_numeric($pwd)){
        	$ar='密码必须为纯数字';
        	$tf=0;
        }elseif(strlen($pwd)!=6){
        	$ar='密码必须为六位数字';
        	$tf=0;
        }else{
        	$arr=array('password'=>md5($pwd),'reg_time'=>time(),'mobile'=>$phone,'mobile_validated'=>1,'user_name'=>$yhm);
        	$use=M('users')->add($arr);
        	if($use){
				$qr=qrcode($use);  //注册会员成功后，生成二维码到会员表中
				$qr=M('qrcode')->add(array('qrcode_path'=>$qr));
				M('users')->where('user_id='.$use)->save(array('qrcode_id'=>$qr));
				$user=M('users')->where('user_id='.$use)->find();
				if($user!=''){  //////储存会员信息到session
					$arr=array('id'=>$user['user_id'],
						'mobile'=>$user['mobile'],
						'name'=>$user['user_name'],
						'pid'=>$user['pid'],
						'zfb'=>$user['zfb_user'],
						'wx'=>$user['wx_user'],
						'qrcode'=>$user['qrcode_id']);
					$_SESSION['user_info']=$arr;
        		$ar='注册成功';
        		$tf=1;
        		}else{
	        		$ar='注册失败';
	        		$tf=0;        		
        		}
        	}        	
        }
        echo '{"ar":"'.$ar.'","tf":"'.$tf.'"}';
    }

    //忘记密码验证
    public function wjmm_yz(){
    	$p=I('post.ppp','','trim');
    	$m=I('post.mmm','','trim');
    	$y=I('post.yyy','','trim');
    	if($y!=$_SESSION['msg_yzm']){
    		echo '{"msg":0,"n":"验证码错误"}';
    		die;
    	}elseif($p!=$_SESSION['zcsj']){
	        	echo '{"msg":0,"n":"用户输入的手机号与验证码发送的手机号不一致"}';
	        	die;  	        	
	    }
    	$u=M('users')->where('mobile='.$p)->save(array('password'=>md5($m)));
    	if($u){
    		echo '{"msg":1,"n":"修改成功"}';
    	}else{
    		echo '{"msg":0,"n":"修改失败"}';
    	}
    }
















}