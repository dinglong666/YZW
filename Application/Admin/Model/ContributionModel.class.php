<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ContributionModel extends RelationModel {
	protected $_link = array(  
			'user' => array(
					'mapping_type'	=>	self::BELONGS_TO,
					'foreign_key'	=>	'uid',
					'mapping_fields'=>	'phone',
					'as_fields'=>	'phone',
				),
			);

	// public function MaxUser($MaxScore="")  //查询贡献值最高的用户ID	与贡献值数量
	// {
		
	// 	$wheres = empty($MaxScore)?"":"score < $MaxScore";

	// 	if($this->relation("user")->where($wheres)->order("score desc")->field("uid,score")->find())
	// 	{
	// 		return $this->relation("user")->where($wheres)->order("score desc")->field("uid,score")->find();
	// 	}
	// 	else
	// 	{
	// 		return "false";
	// 	}
	// }
	public function MaxUser($MaxScore="")  //查询贡献值最高的用户ID	与贡献值数量
	{
		if(!empty($MaxScore))
		{
			if(is_array($MaxScore))
			{
				$wheres 	= "score <= $MaxScore[score] and uid < $MaxScore[uid]";
			}
			else
			{
				$MaxScore   = explode(",",$MaxScore);
				$wheres 	= "score <= $MaxScore[0] and uid < $MaxScore[1]";
			}
		}
		else
		{
			$wheres = "";
		}

		// 

		if($this->relation("user")->where($wheres)->order("score desc,uid desc")->field("uid,score")->find())
		{
			return $this->relation("user")->where($wheres)->order("score desc,uid desc")->field("uid,score")->find();
		}
		else
		{
			return "false";
		}
	}
}