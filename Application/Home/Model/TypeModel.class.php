<?php 
namespace Home\Model;

use Think\Model;

/**
 * Class UserAddressModel
 * @package Home\Model
 */
class TypeModel extends Model
{
	public function index(){
		$type=M('type');
		$tupian=$type->where('yiji_id=9')->order('update_time desc')->select();
		$jianjie=$type->where('yiji_id=1 and title="企业简介"')->find();
		$shuangqu=$type->where('yiji_id=6')->order('update_time desc')->select();
		$yewu=$type->where('yiji_id=3')->order('update_time desc')->select();
		$sq=$type->where('yiji_id=10')->order('update_time desc')->limit(3)->select();
		$yw=$type->where('yiji_id=11')->order('update_time desc')->limit(3)->select();
		return [
			'tupian'	=>$tupian,
			'jianjie'	=>$jianjie,
			'shuangqu'	=>$shuangqu,
			'yewu'		=>$yewu,
			'lianxi'	=>$lianxi,
			'sq'		=>$sq,
			'yw'		=>$yw,
		];
	}

	public function intro1(){
		$type=M('type');
		if ($_GET['id']) {
			$find=$type->where('type_id='.$_GET['id'])->find();
		}
		$arr=$type->where('yiji_id=1')->select();
		return array(
			'find'=>$find,
			'arr'=>$arr,
			);
	}

	
}
