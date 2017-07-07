<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class OrdertotalModel extends RelationModel {
	protected $_link = array(
		'user' 			=>		array(
			'mapping_type'		=>		self::BELONGS_TO,
			'foreign_key'		=>		'pid',
			'mapping_fields'	=>		array('company'),
			'as_fields'			=>		'company'

			),
		'enclasure' 	=>		array(
			'mapping_type'		=>		self::HAS_ONE,
			'foreign_key'		=>		'oid',
			'mapping_fields'	=>		array('path'),
			'as_fields'			=>		'path'


			),
		);

}