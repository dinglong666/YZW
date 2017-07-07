<?php
namespace Admin\Model;
use Think\Model;
use Think\Page;
class TypeModel extends Model {
	protected $_validate = array(
        array('yiji_id', 'require', '上一级不能为空'), //默认情况下用正则进行验证
        array('title', 'require', '分类标题必填'), 
        array('paixu', 'number', '排序输入格式不正确',2), 
    	array('content', 'require', '版权信息不能为空',1),
    );

    public function shouye(){
    	$type=M('type');
    	$where='yiji_id in (9,10,11)';
    	$count=$type->where($where)->count();
    	$page=new Page($count,5);
    	$arr=$type->where($where)->limit("$page->firstRow,$page->listRows")->select();
    	return [
    		'arr'=>$arr,
    		'page'=>$page->show(),
    	];
    }

    public function addshouye(){
    	$type=M('type');
    	if ($_GET['id'] && $_GET['pid']) {
    		$arr=$type->where('type_id='.$_GET['pid'])->find();
    		return $arr;
    	}
    }

	public function type(){
		$type=M('type');
		$where='yiji_id in (1,2,3)';
		$count=$type->where($where)->count();
        $page=new Page($count,10);
		$arr=$type->where($where)->limit("$page->firstRow,$page->listRows")->select();
		return ['arr'=>$arr,'page'=>$page->show()];
	}

	public function addtype(){//添加修改
		$id=$_GET['id'];
		$pid=$_GET['pid'];
		if ($id && $pid) {
			$where="yiji_id=$id and type_id=$pid";
			$find=M('type')->where($where)->find();
		}
		return $find;
	}

	public function add_doit(){//保存
		$type=M('type');
		$_POST['add_time']=time();
		$_POST['update_time']=time();
		if ($_POST['id']) {
			$t=$type->where('type_id='.$_POST['id'])->data($_POST)->save();
		}else{
			$t=$type->data($_POST)->add();
		}
		if ($t) {
			return true;
		}else{
			return false;
		}
	}

	public function del(){
		$id=$_GET['id'];
		$pid=$_GET['pid'];
		$where="yiji_id=$id and type_id=$pid";
		$del=M('type')->where($where)->delete();
		if ($del) {
			return true;
		}else{
			return false;
		}
	}

	public function bbstype(){
		$type=M('type');
		$where='yiji_id in (5,6)';
		$count=$type->where($where)->count();
        $page=new Page($count,10);
		$arr=$type->where($where)->limit("$page->firstRow,$page->listRows")->select();
		return ['arr'=>$arr,'page'=>$page->show()];
	}

	public function rencai(){
		$type=M('type');
		$arr=$type->where('yiji_id=66')->find();
		return $arr;
	}

	public function addrencai(){
		$type=M('type');
		$t=$type->where('yiji_id=66')->data($_POST)->save();
		return $t;
	}



}
