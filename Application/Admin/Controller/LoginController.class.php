<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
        if(IS_AJAX)
        {
            // echo 123;
            // exit;
            $user=D('Admin');
            $_POST['password'] = md5($_POST['password']);
            $user->create($_POST,4);//4为登录时验证
            $this->ajaxReturn($user->getError());
        }
        else if($_POST['username'])
        {
            $user=M('admin')->where("username='$_POST[username]'")->find();
            $arr=array('last_login'=>time(),'last_ip'=>ip2long($_SERVER["REMOTE_ADDR"]));
            M('admin')->where("username='$_POST[username]'")->save($arr);
            //$_SESSION['admin_id']='123123213';
            if($user['role_id']!=0){
                $role=M('admin_role')->where('role_id='.$user['role_id'])->find();
                reqx($_POST['username'],$role['act_list']);
                reqx($_POST['username']."_login",'1');
            }
            session('admin_info',$user);
            admin_log('后台登录');
            if($user['id']==1){               
                $this->redirect('index/index');
            }else{
                $this->redirect('Admin/adminLog');
            }
        }
        else
        {
            $this->display();   
        }
       
    }

    public function tlog(){
        unset($_SESSION['admin_info']);
        $this->redirect('Login/login');
    }
    
}