<?php 
namespace Home\Model;

use Think\Model;
use Think\Page;
/**
 * Class UserAddressModel
 * @package Home\Model
 */
class ArticleCatModel extends Model
{
	public function where($where,$find='find'){
		$art=M('article_cat');
		$arr=$art->where($where)->$find();
		return $arr;
	}

	public function page($where,$num=3){
		$art=M('article_cat');
		$count=$art->where($where)->count();
		$page=new Page($count,$num);
		$arr=$art->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		return array(
			'arr'	=>$arr,
			'page'	=>$page->show(),
		);
	}
}