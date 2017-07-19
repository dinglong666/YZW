<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ProjectModel extends RelationModel {

	public function price($project_id){
        $pro=M('project');
        $arr=$pro->where('project_id='.$project_id)->find();
        return $arr;
	}

	public function paifa($id){////////////////佣金派发
		$pro=M('project');
		$find=$pro->where('project_id='.$id)->find();
		$count=count(explode('|',$find['project_stime']));
		if ($count==6) {
			return $find;
		}else{
			return false;
		}
	}

	public function save($id,$one_id,$two_id){
		return $a=M("project")->where('project_id='.$id)->save(array('prant_one'=>$one_id,'prant_two'=>$two_id,'distribute'=>1));
	}

}