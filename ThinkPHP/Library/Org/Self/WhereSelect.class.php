<?
namespace Org\Self;
/*
  按条件查询订单
  $db_name       要查询的表名
  $arrTotal      表单提交的$_POST
  $page_limit    每页显示的个数
  $pid           当前用户id
 */
class WhereSelect{

  protected $m; //创建数据库对象

  public function __construct($db_name) {
      $this->m=D($db_name);
   }

  public function SelectOrder($arrTotal,$page_limit,$pid)
  {
      if($arrTotal['submit'])
      {
          $where=$this->Submit_list($arrTotal);
          $method="submit";//通过点击查询        
      }
      else if($arrTotal['p'])
      {
          $where=$this->Ajax_list($arrTotal);
          $method="ajax";//分页按钮无刷新查询
      }
      $order=$this->m->where("pid=$pid $where ")->page($arrTotal['p'].','.$page_limit)->limit($page_limit)->order('id desc')->select();
      $count=$this->m->where("pid=$pid $where")->count();
      $page=new \Think\Page($count,$page_limit);

      if($method=="ajax")
      { 
          $arr['order']=D('Ordertotal')->set_all($order);        
      }
      else
      {
          $arr['order']=$order;
  
      }
      $arr['show']=$page->show();
      $arr['method']=$method;

      return $arr;
      
  }

	public function Submit_list($subarr)
	{
		if($subarr['vstate'])
    {
        $where=" and state=$subarr[vstate]";
    }
    if($subarr['timer'])
    {
        $alltime=explode(" - ",$subarr['timer']);
        $befortime=strtotime($alltime[0]."0:0:0");
        $aftertime=strtotime($alltime[1]."23:59:59");
        $where.=" and timer >= $befortime and timer <= $aftertime";
    }
    if($subarr['sou'])
    {
        $where.=" and ordername like '%$subarr[sou]%' or ordernum like '%$subarr[sou]%'";
    }
    return $where;
	}

  public function Ajax_list($ajaxarr)
  {
      $fm=urldecode($ajaxarr['val']);
      $fm=explode("&",$fm);
      foreach($fm as $k=>$v)
      {
          $v=explode("=",$v);
          $data[$v['0']]=$v[1];
      }
     
      if(!empty($data['vstate']))
      {
          $where=" and state=$data[vstate]";
      } 
     
      if(!empty($data['timer']))
      {
          $alltime=explode(" - ",$data['timer']);
          $befortime=strtotime($alltime[0]."0:0:0");
          $aftertime=strtotime($alltime[1]."23:59:59");
          $where.=" and timer >= $befortime and timer <= $aftertime";
      } 
     
      if(!empty($data['sou']))
      {
          $where.=" and ordername like '%$data[sou]%' or ordernum like '%$data[sou]%'";
      }
      return $where;
  }
  public function SelectpassOrder($arr,$page_limit)
  { 
      if($arr['submit'])
      {
          $where=$this->Submit_list($arr);
          $method="submit";
      }
      if($arr['p'])
      {
          $where=$this->Ajax_list($arr);
          $method="ajax";
      }
      $id=$_SESSION['home_user_info']['id'];
      $wheres   = empty($id)?"":"uid = $id and state = 3";
      $arr    = $this->m->relation(true)->where("$wheres $where")->page($arr['p'].','.$page_limit)->limit($page_limit)->order('id desc')->select();
      $count=$this->m->where("$wheres $where")->count();
      $page=new \Think\Page($count,$page_limit);

      $data['arr']=$arr;
      $data['method']=$method;
      $data['show']=$page->show();
      return $data; 
  }

}