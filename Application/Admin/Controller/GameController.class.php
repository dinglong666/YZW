<?php
namespace Admin\Controller;
use Think\Controller;
class GameController extends Controller {
	public function _initialize(){
        if(empty($_SESSION['admin_info']['id']))
        {
            $this->redirect('Login/login');
            die;
        }
    }

	public function gamelist()
	{
		$admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
		$m=M("game");
		if($_GET['sou'])
		{
			$where="game_name like '%$_GET[sou]%'";
			$this->assign("sou",$_GET['sou']);
		}
		else
		{
			$where=1;
		}
		$count=$m->where($where)->count();
		$page=new \Think\Page($count,10);
		$game=$m->where($where)->order("game_timer desc")->limit("$page->firstRow,$page->listRows")->select();
		$this->assign("page",$page->show());
		
		$type=M('twotype_son')->select();
		$array=array();
		foreach ($game as $value) {
			foreach ($type as $val) {
				if ($val['id']==$value['parent_id_type']) {
					$value['type_name_son']=$val['two_name_son'];
					$array[]=$value;
				}
			}
		}
		$array1=array();
		foreach ($array as $value) {
			foreach ($type as $val) {
				if ($val['id']==$value['parent_id_price']) {
					$value['price_name_son']=$val['two_name_son'];
					$array1[]=$value;
				}	
			}
		}
		$this->assign("game",$array1);
		$this->display();
	}
	public function gameadd()
	{
		$admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
		if($_POST)
		{
			if($_FILES['game_img']['name'])
    		{
    			//上传模块封面
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
    		if (empty($_POST['parent_id_type']) || $_POST['parent_id_type']=='--请选择--') {
    			$this->error('请输入车辆车型^_^',U('Game/gameadd'));
    			die();  			
    		}
    		if (empty($_POST['parent_id_price']) || $_POST['parent_id_type']=='--请选择--') {
    			$this->error('请输入车辆价格区间^_^',U('Game/gameadd'));
    			die();  			
    		}
    		//判断
    		if ($_POST['type_one']!='11') {
    			$this->error('车辆车型中请输入车型，而不是价格哦^_^',U('Game/gameadd'));
    			die();
    		}elseif ($_POST['type_one1']!='12') {
    			$this->error('车辆价格区间中请输入价格，而不是车型哦^_^',U('Game/gameadd'));
    			die();
    		}
    		$_POST['game_timer']=time();
    		M("game")->data($_POST)->add();
    		$this->redirect("gamelist");
		}
		else
		{
			$this->display();	
		}
		
	}
	public function gameedit()
	{
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
		if($_POST)
		{    			
			if($_FILES['game_img']['name'])
    		{

    			//上传模块封面
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
			    unlink($_SERVER['DOCUMENT_ROOT']."/Uploads/".$_POST['old_img']);
    		}
    		else
    		{
    			$_POST['game_img']=$_POST['old_img'];
    		}
    		M("game")->where("id = $_POST[old_id]")->data($_POST)->save();
    		$this->redirect("gamelist");

		}
		$row=M("game")->where("id = $_GET[id]")->find();
		$sql='select * from yula_twotype_son INNER JOIN yula_twotype_parent 
			on yula_twotype_parent.id=yula_twotype_son.parent_id
			where yula_twotype_son.id='.'"'.$row['parent_id_type'].'"';
		$type=M()->query($sql);
		$sql='select * from yula_twotype_son INNER JOIN yula_twotype_parent 
			on yula_twotype_parent.id=yula_twotype_son.parent_id
			where yula_twotype_son.id='.'"'.$row['parent_id_price'].'"';
		$price=M()->query($sql);
		$type[0]['parent_id_type']=$row['parent_id_type'];
		$price[0]['parent_id_price']=$row['parent_id_price'];
		$this->assign("type",$type[0]);
		$this->assign("price",$price[0]);
		$this->assign("row",$row);
		$this->display();
	}
	public function gamedel()
	{
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
		$id=$_GET['id'];
		
		$m=M("game");
		$row=$m->find($id);
		if(file_exists($_SERVER['DOCUMENT_ROOT']."/Uploads/".$row['game_img']))
		{
			unlink($_SERVER['DOCUMENT_ROOT']."/Uploads/".$row['game_img']);
		}
		$m->delete($id);
		$this->redirect("gamelist");
	}
}