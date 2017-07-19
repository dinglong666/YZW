<?php 
namespace Home\Model;

use Think\Model;
use Think\Page;

/**
 * Class UserAddressModel
 * @package Home\Model
 */
class UserWalletModel extends Model
{
	public function wallet($user_id,$order_id){
		$wa=M('user_wallet');
		$where='user_id='.$user_id.' and pay_code!=""';
		if ($order_id) {
			$where.=' and order_id like "%'.$order_id.'%"';
		}
		$count=$wa->where($where)->count();
		$page=new Page($count,5);
		$find=$wa->where($where)->order('timer desc')->limit("$page->firstRow,$page->listRows")->select();
		return array(
				'find'	=>$find,
				'page'	=>$page->show(),
			);
	}

	function find($user_id){
		$wa=M('user_wallet');
		return $find=$wa->where('user_id='.$user_id)->order('timer desc')->find();

	}

}