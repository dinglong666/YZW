<?php 
namespace Home\Model;

use Think\Model;
use Think\Page;
/**
 * Class UserAddressModel
 * @package Home\Model
 */
class ArticleModel extends Model
{
	public function where($where,$find='find'){
		$art=M('article');
		$arr=$art->where($where.' and is_open=1')->$find();
		return $arr;
	}

	public function page($where,$num=3){
		$art=M('article');
		$count=$art->where($where.' and is_open=1')->count();
		$page=new Page($count,$num);
		$arr=$art->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		return array(
			'arr'	=>$arr,
			'page'	=>$page->show(),
		);
	}
}