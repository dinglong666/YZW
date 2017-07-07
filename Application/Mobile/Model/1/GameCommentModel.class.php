<?php
namespace Home\Model;
use Think\Model\RelationModel;
class GameCommentModel extends RelationModel {
		protected $_link = array(
		'zan_game' 	=>		array(
			'mapping_type'		=>		self::HAS_MANY,
			'mapping_name'		=>		'zan_game',
			'foreign_key'		=>		'comment_id',
			),
		);

}