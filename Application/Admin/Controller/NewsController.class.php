<?php
namespace Admin\Controller;
use Think\Page;
class NewsController extends BaseController {
    //站内消息列表
    public function newsList(){
        $sel=M('information')->where('information_type=0')->order('add_time desc')->select();
        $this->assign('sel',$sel);
        $this->display();
    }

    //发布站内消息
    public function newsList_add(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('51')==false){
                $this->error('你没有权限');
            }            
        }
        if(!empty($_POST)){
            if(trim($_POST['ntext'])==''){
                $this->error('信息不能为空',U('News/newsList_add'));
                die;                  
            }
            $m=M('information')->add(array('information_type'=>0,'information_content'=>trim($_POST['ntext']),'add_time'=>time()));
            admin_log('管理员发布站内消息编号为'.$m);
            $this->redirect('News/newsList');
            die;
        }
        $this->display();
    }

    //编辑站内信息
    public function newsList_up(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('51')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'');
        $find=M('information')->where('information_id='.$id)->find();
        if($find==''){
            $this->error('参数错误',U('News/newsList'));
            die;            
        }
        if(!empty($_POST)){
            M('information')->save(array('information_id'=>$id,'information_content'=>trim($_POST['ntext'])));
            admin_log('管理员修改站内消息编号为'.$id);            
            $this->redirect('News/newsList');
            die;
        }
        $this->assign('find',$find);
        $this->display();
    }

    //删除站内信息
    public function newsList_del(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('51')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'');
        $find=M('information')->where('information_id='.$id)->find();
        if($find==''){
            $this->error('参数错误',U('News/newsList'));
            die;            
        }
        M('information')->where('information_id='.$id)->delete();
                    admin_log('管理员删除站内消息编号为'.$id);
        $this->redirect('News/newsList');        
    }

    //变更消息列表
    public function changeList(){
        if(!empty($_POST['ss'])){
            $id=M('users')->where("mobile='".trim($_POST['ss'])."'")->find();
            if($id!=''){
                $arr=" and user_id =".$id['user_id']; 
            }else{
                $arr='and 3=4';
            }
        }else{
            $arr='';
        }
        $count=M('information')->where('information_type=1 '.$arr)->count();
        $page=new page($count,10);
        $sel=M('information')->where('information_type=1 '.$arr)->limit($page->firstRow.','.$page->listRows)->order('add_time desc')->select();
        $this->assign('sel',$sel);
        $this->assign('page',$page->show());
        $this->display();
    }

    //查看变更信息详情
    public function change_detail(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('52')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'');
        $find=M('information')->where('information_id='.$id)->find();
        if($find==''){
            $this->error('参数错误',U('News/changeList'));
            die;             
        }
        $this->assign('find',$find);
        $this->display();
    }

    //佣金发放列表
    public function commissionList(){
        if(!empty($_POST['ss'])){
            $id=M('users')->where("mobile='".trim($_POST['ss'])."'")->find();
            if($id!=''){
                $arr=" and user_id =".$id['user_id']; 
            }else{
                $arr='and 3=4';
            }
        }else{
            $arr='';
        }
        $count=M('information')->where('information_type=2 '.$arr)->count();
        $page=new page($count,10);
        $sel=M('information')->where('information_type=2 '.$arr)->limit($page->firstRow.','.$page->listRows)->order('add_time desc')->select();
        $this->assign('sel',$sel);
        $this->assign('page',$page->show());
        $this->display();
    }

    //查看佣金发放详情
    public function commission_detail(){
        if(session('admin_info')['role_id']!=0){
            if(jurisdiction('53')==false){
                $this->error('你没有权限');
            }            
        }
        $id=I('get.id',0,'');
        $find=M('information')->where('information_id='.$id)->find();
        if($find==''){
            $this->error('参数错误',U('News/changeList'));
            die;             
        }
        $this->assign('find',$find);
        $this->display();
    }




}