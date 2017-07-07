<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class NewsModel extends RelationModel {
	protected $_link = array(  //暂时用不上
			'news_state' => array(
					'mapping_type'	=>	self::HAS_MANY,
					'foreign_key'	=>	'pid',

				),
			);
	public function NoticeCount($news)
	{

		foreach($news as $val)
        {
            $val['count']	= count($val['news_state']);
            foreach($val['news_state'] as $v)
            {
            	if($v['is_read'] == 1)
            	{
            		$val['read_count'][] = $v;
            	}
            }
            $val['read_count']	= count($val['read_count']);
            $data[]       		= $val;

        }
        return $data;
	}
}