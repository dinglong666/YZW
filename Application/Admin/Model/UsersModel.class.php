<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class UsersModel extends RelationModel {
	public function fenxiao($user_id){
        $user=M('users');
        $find=$user->where('user_id='.$user_id)->find();  
        if ($find['distribution_user_id']) {
        	$find['erji']=$user->where('user_id='.$find['distribution_user_id'])->find();//////////////////二级user
        	if ($find['erji']['distribution_user_id']) {
        		$find['yiji']=$user->where('user_id='.$find['erji']['distribution_user_id'])->find();//////////一级user
        	}
        }
       
        return $find;
	}

}