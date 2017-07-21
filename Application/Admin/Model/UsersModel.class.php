<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class UsersModel extends RelationModel {
	public function fenxiao($user_id){
        $user=M('users');
        $find=$user->where('user_id='.$user_id)->find();  
        if ($find['introduce']) {
        	$find['erji']=$user->where('user_id='.$find['introduce'])->find();//////////////////二级user
        	if ($find['erji']['introduce']) {
        		$find['yiji']=$user->where('user_id='.$find['erji']['introduce'])->find();//////////一级user
        	}
        }
       
        return $find;
	}

}