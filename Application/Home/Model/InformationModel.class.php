<?php 
namespace Home\Model;

use Think\Model;
use Think\Page;
/**
 * Class UserAddressModel
 * @package Home\Model
 */
class InformationModel extends Model
{
	public function find($information_type,$find='find'){
		$inf=M('information');
		switch ($information_type) {
			case 0:
				$where='information_type='.$information_type;
				break;
			
			default:
				$where='information_type='.$information_type.' and user_id='.$_SESSION['user_info']['id'];
				break;
		}
		$count=$inf->where($where)->count();
		$page=new Page($count,7);
		$find=$inf->where($where)->order('add_time desc')->limit("$page->firstRow,$page->listRows")->$find();
		return array(
			'find'=>$find,
			'page'=>$page->show(),
			);

	}

	

}