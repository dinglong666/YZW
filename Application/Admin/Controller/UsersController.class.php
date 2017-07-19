<?php
namespace Admin\Controller;
use Think\Page;
class UsersController extends BaseController {
    //会员列表
    public function usersList(){
        $count=M('users')->where('stateid=0')->count();
        $page=new page($count,10);
        $sel=M('users')->where('stateid=0')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('sel',$sel);
        $this->assign('page',$page->show());
        $this->display();
    }

    //会员详情
    public function users_detail(){
        if(session('admin_info')['role_id']!=0){
            if($_GET['users']=='staff'){
                if(jurisdiction('43')==false){
                    $this->error('你没有权限');
                }
            }else{
                if(jurisdiction('41')==false){
                    $this->error('你没有权限');
                }                
            }
        }
        $id=I('get.id',0,'intval');
        if($_GET['users']=='staff'){
            $ar='Users/users_staff';
        }else{
            $ar='Users/usersList';
        }
        if($id===0){
            $this->error('参数错误',U($ar));
            die;            
        }
        $find=M('users')->where('user_id='.$id)->find();
        if($find==''){
            $this->error('参数错误',U($ar));
            die;
        }
        $wallet=M('user_wallet');///////////////钱包变动
        $where='user_id='.$id;
        $count=$wallet->where($where)->count();
        $page=new Page($count,5);
        $wa=$wallet->where($where)->limit($page->firstRow.','.$page->listRows)->order('timer desc')->select();
        $this->assign('wa',$wa);
        $this->assign('page',$page->show());
        $this->assign('find',$find);
        $this->assign('ar',$ar);
        $this->display();
    }

    //随机生成会员
    public function users_random(){
        if(!empty($_POST)){
            if(session('admin_info')['role_id']!=0){
                if(jurisdiction('42')==false){
                    $this->error('你没有权限');
                }            
            }
            $num=I('post.num','','trim');
            $pwd=I('post.pwd','','trim');
            $rpwd=I('post.rpwd','','trim');
            if($num=='' || $pwd=='' || $rpwd==''){
                $this->error('信息不能为空');
                die;
            }
            if(!is_numeric($num) || $num<=0){
                $this->error('请输入正确数量');
                die;                 
            }
            if($pwd!=$rpwd){
                $this->error('两次密码输入不一致');
                die;                
            }
            if(!is_numeric($pwd) || !is_numeric($rpwd)){
                $this->error('密码只能为纯数字');
                die;            
            }
            if(strlen($pwd)!=6 || strlen($rpwd)!=6){
                $this->error('密码只能为六位数字');
                die;                   
            }
            for($s=1;$s<=$num;$s++){
                $arr=array('mobile'=>user_sj(),'password'=>md5($pwd),'reg_time'=>time(),'stateid'=>1,'user_name'=>'default');
                $user=M('users')->add($arr);
                $qr=qrcode($user);
                $ar=array('qrcode_path'=>$qr);
                $qrcode=M('qrcode')->add($ar);
                $ss['user_id']=$user;
                $ss['qrcode_id']=$qrcode;
                $model=M('users');
                $model->save($ss);
            }
            admin_log('管理员生成公司会员账号'.$num.'条');
            $this->redirect('Users/users_staff');
            die;
        }
        $this->display();
    }

    //公司员工列表
    public function users_staff(){
        $count=M('users')->where('stateid=1')->count();
        $page=new page($count,10);
        $sel=M('users')->where('stateid=1')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('sel',$sel);
        $this->assign('page',$page->show());
        $this->display();
    }



}