<?php
namespace Home\Model;
use Think\Model\RelationModel;
class PostsCommentModel extends RelationModel {
		protected $_link = array(
		'zan_comment' 	=>		array(
			'mapping_type'		=>		self::HAS_MANY,
			'mapping_name'		=>		'zan_comment',
			'foreign_key'		=>		'post_id',
			),
		'posts_reply' 	=>		array(
			'mapping_type'		=>		self::HAS_MANY,
			'mapping_name'		=>		'posts_reply',
			'foreign_key'		=>		'comment_id',
			),
		);

}