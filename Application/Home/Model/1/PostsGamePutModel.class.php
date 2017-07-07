<?php
namespace Home\Model;
use Think\Model\RelationModel;
class PostsGamePutModel extends RelationModel {
		protected $_link = array(
		'zan_post' 	=>		array(
			'mapping_type'		=>		self::HAS_MANY,
			'mapping_name'		=>		'zan_post',
			'foreign_key'		=>		'post_id',
			),
		'posts_comment' 	=>		array(
			'mapping_type'		=>		self::HAS_MANY,
			'mapping_name'		=>		'posts_comment',
			'foreign_key'		=>		'posts_id',
			),
		'flash' 	=>		array(
			'mapping_type'		=>		self::HAS_MANY,
			'mapping_name'		=>		'flash',
			'foreign_key'		=>		'post_id',
			),
		);

}