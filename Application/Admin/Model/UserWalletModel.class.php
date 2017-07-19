<?php 
namespace Admin\Model;
use Think\Model\RelationModel;
class UserWalletModel extends RelationModel {
	public function paifa($user_id,$price_change){
		$wallet=M('user_wallet');
		$find=$wallet->where('user_id='.$user_id)->order('timer desc')->find();//////////////查处原先钱数
		return $wallet->add(array(
			'user_id'		=>$user_id,
			'reason'		=>'佣金派发',
			'price_change'	=>$price_change,
			'price'			=>$find['price']+$price_change,
			'timer'			=>time(),
			));
	}
}
