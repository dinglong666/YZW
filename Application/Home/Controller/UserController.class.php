<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class UserController extends Controller
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
		if($_SESSION['user_info']['id']==''){
			$this->error('请登录',U('Login/register'));
			die;			
		}
		$this->assign('str',strrchr(__ACTION__,"/"));
	}

	//个人中心
	public function personal(){
		$this->assign('xs','xs');
		$this->display();
	}

	//修改密码
	public function upPwd(){
		$upwd=I('post.upwd',0,'intval');
		$pwd=I('post.pwd',0,'intval');
		$rpwd=I('post.rpwd',0,'intval');
		if($upwd=='' || $pwd=='' || $rpwd==''){
			echo '{"msg":0,"n":"请填写信息"}';
			die;
		}
		$user=M('users')->where('user_id='.$_SESSION['user_info']['id'])->find();
		if($user['password']!=md5($upwd)){
			echo '{"msg":0,"n":"旧密码输入错误"}';
			die;			
		}
		if(!is_numeric($pwd) || !is_numeric($rpwd)){
			echo '{"msg":0,"n":"密码只能为纯数字"}';
			die;			
		}
		if($upwd==$pwd){
			echo '{"msg":0,"n":"新密码与老密码一致，并未改变"}';
			die;			
		}
		if(strlen($pwd)!=6 ||strlen($rpwd)!=6){
			echo '{"msg":0,"n":"密码只能为六位数字"}';
			die;			
		}
		if($pwd!=$rpwd){
			echo '{"msg":0,"n":"两次新密码输入不一致"}';
			die;				
		}
		$u=M('users')->where('user_id='.$_SESSION['user_info']['id'])->save(array('password'=>md5($pwd)));
		if($u){
			echo '{"msg":1,"n":"修改成功"}';
			die;		
		}else{
			echo '{"msg":0,"n":"修改失败"}';
			die;		
		}
	}

	//修改用户名
	public function upUser(){
		$yhm=I('post.yhm','','trim');
		if($yhm==''){
			echo '{"msg":"0","n":"用户名不能为空"}';
			die;
		}
		if(strlen($yhm)>21){
			echo '{"msg":"0","n":"用户名不能大于七个字"}';
			die;			
		}
		$u=M('users')->where('user_id='.$_SESSION['user_info']['id'])->save(array('user_name'=>$yhm));
		if($u){
			$msg=1;
			$n='修改成功';
			$_SESSION['user_info']['name']=$yhm;
		}else{
			$msg=0;
			$n='修改失败';			
		}
		echo '{"msg":"'.$msg.'","n":"'.$n.'"}';
	}

	//我的项目
	public function project(){
		//项目状态
		$state=M('project_state')->find();
		$s=explode('|',$state['name']);
		$arr=array();
		$i=1;
		foreach($s as $ss){
			$arr[$i]=$ss;
			$i++;
		}
		if($_GET['xsx']!=''){
			$w=' project_name="'.trim($_GET['xsx']).'" and ';
		}else{
			$w='';
		}
		if($_GET['sxs']!=''){
			$str=strtotime($_GET['sxs']);
			$nstr=strtotime($_GET['sxs'])+60*60*24;
			$ww=' project_time>'.$str.' and project_time<'.$nstr.' and ';
		}else{
			$ww='';
		}
		if($_GET['i']==0){
			$where=$ww.$w.'';
		}else{
			$where=$ww.$w.' project_snum='.$_GET['i'].' and ';
		}
		//查找所有状态项目
		$count=M('project')->where($where.' user_id='.$_SESSION['user_info']['id'])->count();
		$page=new page($count,7);
		$project=M('project')->where($where.' user_id='.$_SESSION['user_info']['id'])->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('pro',$project);
		$this->assign('page',$page->show());

		$this->assign('xs','xs');
		$this->assign('sta',$arr);

		//查找所有项目分类
		$fl=M('project_type')->where('type_state=1')->select();
		$this->assign('fl',$fl);
		// dump($project2);die;
		//查看所在地
		$pad=M('project_address')->select();
		$this->assign('pad',$pad);
		$this->display('User/project',array('p'=>2));
	}

	//发布项目
	public function release(){
		$pname=I('post.pname','','trim');
		$pad=I('post.pad',0,'intval');
		$padd=I('post.padd','','trim');
		$price=I('post.yprice','','trim');
		$desc=I('post.pdesc','','trim');
		$pt=I('post.pt','','trim');
		if($pname=='' || $padd=='' || $price=='' || $desc==''){
			echo '{"n":"请填写内容","msg":0}';
			die;
		}
		$pp=M('project_address')->where('id='.$pad)->find();
		if($pad==0 || $pp==''){
			echo '{"n":"请选择项目所在地","msg":0}';
			die;			
		}
		$p=M('project_type')->where('type_id='.$pt)->find();
		if($p==''){
			echo '{"n":"请选择项目分类","msg":0}';
			die;			
		}
		$arr=array('type_id'=>$pt,
			'user_id'=>$_SESSION['user_info']['id'],
			'project_name'=>$pname,
			'project_contents'=>$desc,
			'project_state'=>1,
			'project_estimate'=>$price,
			'project_time'=>time(),
			'project_address'=>$pp['name'].$padd
			);
		$add=M('project')->add($arr);
		if($add){
			echo '{"n":"添加成功","msg":1,"add":"'.$add.'"}';
			die;			
		}else{
			echo '{"n":"添加失败","msg":0}';
			die;			
		}		
	}

	//项目信息
	public function shenhe(){
		$id=I('get.id',0,'intval');
		$find=M('project')->where('user_id='.$_SESSION['user_info']['id'].'  and  project_id='.$id)->find();
		if($find==''){
			$this->error('信息错误');
			die;			
		}
		$state=M('project_state')->find();
		$sta=explode('|',$state['img_id']);
		$arr=array();
		foreach ($sta as $val) {
			$arr[]=M('img')->where('img_id='.$val)->find()['img_url'];
		}
		$this->assign('arr',$arr);
		$this->assign('find',$find);
		$this->display();
	}


	//改变头像
	public function User_portrait(){
        if($_FILES['error']==0){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     0 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =      './Uploads/Home/'; // 设置附件上传根目录
            $upload->savePath  =      ''; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                foreach($info as $file){
                     $f='/Uploads/Home/'.$file['savepath'].$file['savename'];
                }
            }                
        }
        // dump(unlink('Uploads/Home/2017-07-19/596eb0990c865.png'));
        $u=M('users')->where('user_id='.$_SESSION['user_info']['id'])->find();
        if($u['head_pic']!=''){
        	unlink(trim($u['head_pic'],'/'));
        }
    	$m=M('qrcode')->where('qrcode_id='.$u['qrcode_id'])->find();
    	if($m['qrcode_path']!=''){
    		unlink(trim($m['qrcode_path'],'/'));
    	}
        $hed=hqrcode($_SESSION['user_info']['id'],trim($f,'/'));
        M('qrcode')->where('qrcode_id='.$u['qrcode_id'])->save(array('qrcode_path'=>$hed));
        $m=M('users')->where('user_id='.$_SESSION['user_info']['id'])->save(array('head_pic'=>$f));
        $this->redirect('User/personal');
	}


	///钱包
	public function UserWallet(){
		$user_id=$_SESSION['user_info']['id'];
		$user=D("users");
		$uw=D("UserWallet");
		$find=$user->find($user_id);///////////////////////查看会员是否有支付宝,微信账号
		// dump($find);

		$num=$uw->find($user_id);///////////////////////余额
		$select=$uw->wallet($user_id,$_GET['order_id']);///////////////钱包遍历
										///////接收的订单号↑
		// dump($select);
		$this->assign('order_id',$_GET['order_id']);
		$this->assign('num',$num['price']);
		$this->assign('find',$find);
		$this->assign('se',$select['find']);
		$this->assign('page',$select['page']);
		$this->display();
	}

	public function alipay(){
		foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $this->error('请填写完整信息');
            }
        }
        $users=D('users');
        $pwd=$users->pwd($_SESSION['user_info']['id']);////////////获取用户密码
       	if (md5($_POST['password'])!=$pwd) {
       		$this->error('密码错误');
       	}
       	$find=$users->find(3732);///////////////用户信息
       	// dump($find);die;
       	if (!$find['zfb_user']) {
       		$this->error('请先绑定');
       	}
        $out_biz_no             =time().rand(10000,99999);////////////订单号
        $payee_account          =$find['zfb_user'];////////////支付宝登录账号
        $amount                 =$_POST['amount'];////////////金额
        $payee_real_name        =$find['zfb_user_name'];///////////姓名
        $remark                 ='提现';//////转账备注
        $a=new AlipayLogic();
        $tixian=$a->runalpay($out_biz_no,$payee_account,$amount,$payee_real_name,$remark);
        if ($tixian==1) {
            $this->success('提现成功');
        }else{
            $this->error($tixian);
        }
	}

	public function wx(){
		$this->error(111);
	}

	public function zfb_bind(){
		foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $this->error('请填写完整信息');
            }
        }
        $user=D('users');
        $aa=$user->bind($_SESSION['user_info']['id'],$_POST['zfb_num'],$_POST['zfb_name']);
        if ($aa) {
        	$this->success('绑定成功');
        }else{
        	$this->error('绑定失败');
        }
	}


	//消息
	//
	public function information(){
		$inf=D('information');
		$type=1;
		if ($_GET['type']!=null) {
			$type=$_GET['type'];
			$this->assign('type',$type);
		}
		$arr=$inf->find($type,'select');
		$this->assign('arr',$arr['find']);
		$this->assign('page',$arr['page']);
		// dump($arr);
		$this->display();
	}
	//自由经理人
	public function free(){
		$user=D('users');
		$qr=D('qrcode');
		$find=$user->find($_SESSION['user_info']['id']);
		$img=$qr->find($find['qrcode_id']);
		$this->assign('img',$img['qrcode_path']);
		$arr=$user->introduce($_SESSION['user_info']['id']);
		$this->assign('arr',$arr['select']);
		$this->assign('page',$arr['page']);
		$this->display();
	}











}