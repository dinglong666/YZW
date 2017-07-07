<?php
namespace Admin\Controller;
use Think\Controller;
class GuanFangController extends Controller {
    public function _initialize(){
        if(empty($_SESSION['admin_info']['id']))
        {
            $this->redirect('Login/login');
            die;
        }
    }
	//新闻列表
    public function xinwenlist(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
    	$obj=M('xinwen');
	    $count=$obj->count();
	    $page=new \Think\Page($count,10);
    	//查询全部新闻
	    $selectXinwen=$obj->order('addtime DESC')->order('display ASC')->limit("$page->firstRow,$page->listRows")->select();
	    $this->assign("page",$page->show());	    
	    $this->assign('selectXinwen',$selectXinwen);
	    $this->display();
    }
    //添加新闻
    public function xinwenadd(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
    	if ($_POST) {
	    	if (empty($_POST['title'])) {
	    		$this->error('新闻标题不能为空',U('GuanFang/xinwenadd'));
	    		die();
	    }else if(empty($_POST['content'])){
	    		$this->error('新闻内容不能为空',U('GuanFang/xinwenadd'));
	    		die();
	    }
        //判断是否为博能精选
        if ($_POST['display']=='1') {
            $count=M('xinwen')->where('display=1')->count();
            if ((int)$count>=4) {
                $this->error('首页博能精选新闻上线为四条',U('GuanFang/xinwenlist'));
                die();
            }
            if($_FILES['game_img']['name'])
                {
                    //上传封面图片
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize   =     3145728 ;// 设置附件上传大小
                    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath  =     './Uploads/game/'; // 设置附件上传根目录
                    $upload->savePath  =     ''; // 设置附件上传（子）目录
                    $info   =   $upload->uploadOne($_FILES['game_img']);
                    if(!$info) {// 上传错误提示错误信息
                        $this->error($upload->getError());
                    } 
                    $_POST['game_img']="game/".$info['savepath'].$info['savename'];
                }else{
                    $this->error('请上传封面图片',U('GuanFang/xinwenadd'));
                    die();
                }
        }
        	$_POST['addtime']=time();
        	M("xinwen")->data($_POST)->add();
        	$this->redirect("xinwenlist");
    	}
    	$this->display();
    }
    //新闻编辑
    public function xinwendit(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
    	if ($_GET) {
    		$obj=M('xinwen')->where($_GET)->find();
    		if (empty($obj)) {
    			$this->error('未知参数错误',U('GuanFang/xinwenlist'));
    		}
			$this->assign('row',$obj);
    	}
    	if ($_POST) {
            if ($_POST['display']=='1') {
                    $Oxinwen=M('xinwen');
                    $Ooxinwen=$Oxinwen->where('id='.$_POST['old_id'])->find();
                    if ($Ooxinwen['display']==2) {
                        $count=$Oxinwen->where('display=1')->count();
                        if ((int)$count>=4) {
                            $this->error('首页博能精选新闻上线四条',U('GuanFang/xinwendit?id='.$_POST['old_id']));
                            die();
                        }                        
                    }
                if($_FILES['game_img']['name'])
                    {
                        //上传封面图片
                        $upload = new \Think\Upload();// 实例化上传类
                        $upload->maxSize   =     3145728 ;// 设置附件上传大小
                        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                        $upload->rootPath  =     './Uploads/game/'; // 设置附件上传根目录
                        $upload->savePath  =     ''; // 设置附件上传（子）目录
                        $info   =   $upload->uploadOne($_FILES['game_img']);
                        if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                        } 
                        $_POST['game_img']="game/".$info['savepath'].$info['savename'];
                    }
            }
    		M("xinwen")->where("id = $_POST[old_id]")->data($_POST)->save();
    		$this->redirect("xinwenlist");
    	}
    	$this->display();
    }
    //新闻删除
    public function xinwendel(){
    	$id=$_GET['id'];
    	$M=M("xinwen");
		$M->delete($id);
		$this->redirect("xinwenlist");
    }
    //留言管理
    public function liuyanlist(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
        $liuyan=M('liuyan')->select();
        $this->assign('liuyan',$liuyan);
        $this->display();
    }
    //留言详情
    public function liuyandit(){
        if ($_GET) {
            $obj=M('liuyan')->where($_GET)->find();
            if (empty($obj)) {
                $this->error('未知参数错误',U('GuanFang/xinwenlist'));
            }
            $this->assign('row',$obj);
        }
        $this->display();
    }
    //留言删除
    public function liuyandel(){
        $id=$_GET['id'];
        $M=M("liuyan");
        $M->delete($id);
        $this->redirect("liuyanlist");  
    }

    //卖车信息管理
    public function maichelist(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
        $maiche=M('maiche')->select();
        $this->assign('liuyan',$maiche);
        $this->display();
    }
    //卖车详情
    public function maichedit(){
        if ($_GET) {
            $obj=M('maiche')->where($_GET)->find();
            if (empty($obj)) {
                $this->error('未知参数错误',U('GuanFang/xinwenlist'));
            }
            $this->assign('row',$obj);
        }
        $this->display();
    }
    //卖车删除
    public function maichedel(){
        $id=$_GET['id'];
        $M=M("maiche");
        $M->delete($id);
        $this->redirect("maichelist");  
    }
    //联系我们
    public function lianxi(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
        if ($_POST) {
            M("lianxi")->where('id=1')->data($_POST)->save();
        }
        $obj=M('lianxi')->where('id=1 and please=1')->find();
        $this->assign('row',$obj);        
        $this->display();
    }
    //移动联系我们
    public function phonelianxi(){
        $this->display();
    }
    //关于
    public function guanyu(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
        if ($_POST) {
            M("guanyu")->where('id=1')->data($_POST)->save();
        }
        $obj=M('guanyu')->where('id=1 and please=1')->find();
        $this->assign('row',$obj);   
        $this->display();
    }
    //会员信息列表
    public function userlist(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
        $user=M('user')->select();
        $this->assign('user',$user);
        $this->display();
    }
    //会员添加
    public function useradd(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
        if ($_POST) {
            if (empty($_POST['username'])) {
                $this->error('用户名不能为空',U('GuanFang/useradd'));
                die();
            }
            if (empty($_POST['usern'])) {
                $this->error('姓名不能为空',U('GuanFang/useradd'));
                die();       
            }
            if (empty($_POST['pwd'])) {
                $this->error('密码不能为空',U('GuanFang/useradd'));
                die();
            }
            if ($_POST['pwd']!=$_POST['qpwd']) {
                $this->error('两次输入密码不一致',U('GuanFang/useradd'));
                die();
            }
            $_POST['addtime']=time();
            M("user")->data($_POST)->add();
            $this->redirect("userlist");
        }
        $this->display();
    }
    //会员编辑
    public function userdit(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
        if (empty($_GET)) {
            $this->error('错误信息id',U('GuanFang/userlist'));
        }
        $obj=M('user')->where($_GET)->find();
        $this->assign('row',$obj);
        if ($_POST) {
            M("user")->where("id = $_POST[old_id]")->data($_POST)->save();
            $this->redirect("userlist");
        }
        $this->display();
    }
    //会员删除
    public function userdel(){
        $id=$_GET['id'];
        $M=M("user");
        $M->delete($id);
        $this->redirect("userlist");
    }

}