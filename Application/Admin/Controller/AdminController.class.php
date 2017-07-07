<?php
namespace Admin\Controller;
use Think\Page;
class AdminController extends BaseController {
    //列表
    public function adminList(){
        $count=M('admin')->count();
        $page=new page($count,8);
        $admin=M('admin')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('admin',$admin);
        $this->assign('page',$page->show());

        $this->display();
    }
    //添加
    public function adminAdd(){
        if(session('admin_info')['role_id']!=0){
            $this->error('你没有权限');       
        }
        if ($_POST) {
            if (empty($_POST['username'])) {
                $this->error('用户名不能为空',U('Admin/adminadd'));
                die();
            }
            if (empty($_POST['password'])) {
                $this->error('密码不能为空',U('Admin/adminadd'));
                die();
            }
            if ($_POST['password']!=$_POST['qpassword']) {
                $this->error('两次输入密码不一致',U('Admin/adminadd'));
                die();
            }
            $ad=M('admin')->where("username='{$_POST['username']}'")->find();
            if($ad!=null){
                $this->error('用户名已存在',U('Admin/adminadd'));
                die();                
            }

            $_POST['addtime']=time();
            $_POST['password']=md5($_POST['password']);
            $_POST['role_id']=$_POST['qx'];
            M("admin")->data($_POST)->add();
            $qx=M('admin_role')->where('role_id='.$_POST['qx'])->find();
            reqx(trim($_POST['username']),$qx['act_list']);
            $this->redirect("adminlist");
        }
        $qx=M('admin_role')->select();
        $this->assign('qx',$qx);
        $this->display();
    }
    //编辑
    public function adminDit(){
        if(session('admin_info')['role_id']!=0){
            $this->error('你没有权限');      
        }
        if($_SESSION['admin_info']['role_id']!=0 && $_GET['id']==1){
            $this->error('没有权限修改',U('Admin/adminlist'));
            die;
        }
        if ($_POST) {
            // dump($_POST);die;
            if(trim($_POST['password'])==''){
                $this->error('密码不能为空',U('Admin/admindit?id='.$_POST['id']));
                die();                  
            }
            if(trim($_POST['password'])!=trim($_POST['qpassword'])){
                $this->error('两次输入新密码不一致',U('Admin/admindit?id='.$_POST['id']));
                die();                 
            }
            $password=md5($_POST['ypassword']);
            $username=$_POST['username'];
            $_POST['password']=md5($_POST['password']);
            $_POST['role_id']=$_POST['qx'];
            if($_POST['id']!=1){
                M("admin")->where('id='.$_POST['id'])->data($_POST)->save();
                $qx=M('admin_role')->where('role_id='.$_POST['qx'])->find();
                reqx(trim($_POST['username']),$qx['act_list']); 
            }else{
                M("admin")->where('id='.$_POST['id'])->data($_POST)->save();
            }
            $this->redirect("adminlist");         
        }
        $find=M('admin')->where('id='.$_GET['id'])->find();
        $qx=M('admin_role')->select();
        $this->assign('qx',$qx);
        $this->assign('role',$find);
        $this->display();
    }
    //删除
    public function adminDel(){
        if(session('admin_info')['role_id']!=0){
            $this->error('你没有权限');          
        }
        if($_GET['id']==1){
            $this->error('超级管理员无法删除',U('Admin/adminlist'));
            die;
        }
        if($_GET['id']==session('admin_info')['id']){
            $this->error('无法删除登陆中的用户',U('Admin/adminList'));
            die;            
        }
        $id=$_GET['id'];
            $admin=M('admin')->where('id='.$_GET['id'])->find();
            reqx($admin['username'],''); 
            reqx($admin['username'].'_login','0');
        $M=M("admin");
        $M->delete($id); 
        $this->redirect("adminList");
    }

    //权限
    public function adminPower(){
        $count=M('admin_role')->count();
        $page=new page($count,8);
        $sel=M('admin_role')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('sel',$sel);
        $this->assign('page',$page->show());
        $this->display();
    }

    //添加权限
    public function adminPower_add()
    {
        if(session('admin_info')['role_id']!=0){
            $this->error('你没有权限');        
        }
        if(!empty($_POST)){
            $name=I('post.pname','','trim');
            $desc=I('post.pdesc','','trim');
            if($name==''){
                $this->error('分类名称不能为空',U('Admin/adminPower_add'));
                die;                
            }
            if($_POST['qx']!=''){
                $so=implode(',',$_POST['qx']);
                $arr=array('role_name'=>$name,'role_desc'=>$desc,'act_list'=>$so);
            }else{
              $arr=array('role_name'=>$name,'role_desc'=>$desc);                
            }
            $m=M('admin_role')->add($arr);
            $this->redirect('adminPower');
        }
        $qx=qx();
        unset($qx[0]);
        $this->assign('qx',$qx);
        $this->display();
    }

    //删除权限
    public function adminPower_del(){
        if(session('admin_info')['role_id']!=0){
             $this->error('你没有权限');         
        }
        $role=M('admin_role')->where('role_id='.$_GET['id'])->find();
        if($role==''){
            $this->error('参数错误',U('Admin/adminPower'));
            die;
        }
        $admin=M('admin')->where('role_id='.$_GET['id'])->find();
        if($admin!=''){
            $this->error('请先移除有该权限的会员，再删除该权限',U('Admin/adminPower'));
            die;                 
        }
        M('admin_role')->where('role_id='.$_GET['id'])->delete();
        $this->redirect('Admin/adminPower');
    }

    //编辑权限
    public function adminPower_up(){
        if(session('admin_info')['role_id']!=0){
                $this->error('你没有权限');    
        }
        if(!empty($_POST)){
            $name=I('post.pname','','trim');
            $desc=I('post.pdesc','','trim');
            $id=I('post.id',0,'intval');
            if($name==''){
                $this->error('分类名称不能为空',U('Admin/adminPower_up?id='.$id));
                die;                
            }
            if($_POST['qx']!=''){
                $so=implode(',',$_POST['qx']);
                $arr=array('role_id'=>$id,'role_name'=>$name,'role_desc'=>$desc,'act_list'=>$so);
            }else{
              $arr=array('role_id'=>$id,'role_name'=>$name,'role_desc'=>$desc,'act_list'=>'');                
            }
            M('admin_role')->save($arr);
            $admin=M('admin')->where('role_id='.$id)->select();
            foreach($admin as $value){
                reqx($value['username'],$so);
            }
            $this->redirect('adminPower');
        }else{
            $role=M('admin_role')->where('role_id='.$_GET['id'])->find();
            if($role==''){
                $this->error('参数错误',U('Admin/adminPower'));
                die;
            }
        }
        $find=M('admin_role')->where('role_id='.$_GET['id'])->find();
        $this->assign('find',$find);
        $this->assign('role',$_GET['id']);
        $qx=qx();
        unset($qx[0]);
        $this->assign('qx',$qx);
        $this->display();
    }

    //操作日志
    public function adminLog(){
        $sel=M('admin_log')->order('log_time desc')->select();
        $this->assign('sel',$sel);
        $this->display();
    }
}