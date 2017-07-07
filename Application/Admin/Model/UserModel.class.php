<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class UserModel extends RelationModel {

	protected $_link = array(
		'user_detailed' 	=>		array(
			'mapping_type'		=>		self::HAS_ONE,
			'foreign_key'		=>		'user_id',
			'mapping_fields'	=>		array('bossname','company_address','description','company_scale','company_scope'),
			'as_fields'			=>		'bossname,company_address,description,company_scale,company_scope'

			),
		'contribution' 		=>		array(
			'mapping_type'		=>		self::HAS_ONE,
			'foreign_key'		=>		'uid',
			'mapping_fields'	=>		array('score','order_get','order_out'),
			'as_fields'			=>		'score,order_get,order_out'

			),
		);
	public function MemberDetailed($query='select',$id)
	{
		if($query == 'select')
		{
				$member =  $this->relation('user_detailed')->$query();
				foreach($member as $val)
				{
					switch ($val['company_scale'])
					{
						case 1:
						$val['company_scale_parse'] = '1-5/人';
						break;  
						case 2:
						$val['company_scale_parse'] = '5-10/人';
						break;
						case 3:
						$val['company_scale_parse'] = '10-50/人';
						break;
						case 4:
						$val['company_scale_parse'] = '50-99/人';
						break;
					}
					if($wheres = $val['company_scope']?"id in($val[company_scope])":false)
					{
						$val['company_scope_parse'] = M("company_scope")->where($wheres)->select();
					}
					else
					{
						$val['company_scope_parse'] = array();
					}								
					$val['company_scope'] = explode(",",$val['company_scope']);

					$data[] = $val;
				}
					return $data;	
		}
		elseif($query == 'find')
		{
				$member =  $this->relation('user_detailed')->$query($id);

				switch ($member['company_scale'])
				{
					case 1:
					$member['company_scale_parse'] = '1-5/人';
					break;  
					case 2:
					$member['company_scale_parse'] = '5-10/人';
					break;
					case 3:
					$member['company_scale_parse'] = '10-50/人';
					break;
					case 4:
					$member['company_scale_parse'] = '50-99/人';
					break;
				}
				
				if($wheres = $member['company_scope']?"id in($member[company_scope])":false)
				{
					$member['company_scope_parse'] = M("company_scope")->where($wheres)->select();
				}
				else
				{
					$member['company_scope_parse'] = array();
				}
				$member['company_scope'] = explode(",",$member['company_scope']);
				
				return $member;	
		}
	}
	public function CompanyScope($id)
	{
		$UserInfo 		=	  $this->relation('user_detailed')->find($id);
		
		return 				  $UserInfo['company_scope'];
	}
	public function UserState($id)
	{
		$UserInfo 		=	  $this->field("state")->find($id);
		
		return 				 $UserInfo['state'];
	}

}