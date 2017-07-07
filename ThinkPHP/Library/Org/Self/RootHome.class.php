<?
namespace Org\Self;
class RootHome{
	public function SeeOrder($getid,$type)
	{
    if($type=="total")
    {  
      $g=M("orderget")->where("pid=$getid and state=2")->find();//判断发单时下载附件
  		$m=D("ordertotal")->relation(true)->find($getid);
          if($_SESSION['home_user_info']['id']!=$m['pid']&&$_SESSION['home_user_info']['id']!=$m['sid']&&$_SESSION['home_user_info']['id']!=$g['uid'])
          {
             	$arr=array(
             		'state'  =>  false,
             	);
          }
          else
          {
              $arr=array(
             		'arr'    =>  $m,
             		'state'  =>  true,
             	);
          }      
    }
    if($type=="get")
    {
        $g=D("Orderget")->relation("ordertotal")->find($getid);
        
        if($_SESSION['home_user_info']['id']!=$g['uid'])
        {
            $arr=array(
                'state'  =>  false,
            );
        }
        else
        {
            $u=D('ordertotal')->relation(true)->find($g['pid']);//查询发单公司和接单公司
            $g['ordertotal']['outer']=$u['outer'];
            $g['ordertotal']['geter']=$u['geter'];
            $g['ordertotal']['path']=$u['path'];
            $arr=array(
              'arr'    =>  $g['ordertotal'],
              'state'  =>  true,
            );
        }      
    }
          return $arr;
	}
  
  public function DelOrder($getid,$msg='无此权限')
  {
    $mm=D("ordertotal");
    $m=$mm->relation(true)->find($getid);
        if($_SESSION['home_user_info']['id']==$m['pid']&&$m['verification']==3)
        {
            $mm->delete($getid);
            $arr=array(
               
              'state'  =>  true,
            );
        }
        else
        {
           $arr=array(
              'msg'    =>  $msg,
              'state'  =>  false,
            ); 
        }
        return $arr;
  }
  public function DelOrderpass($getid,$msg='无此权限')
  {
    $mm=M("orderget");
    $m=$mm->find($getid);
        if($_SESSION['home_user_info']['id']==$m['uid']&&$m['state']==3)
        {
            $mm->delete();
            $arr=array(  
              'state'  =>  true,
            );
        }
        else
        {
           $arr=array(
              'msg'    =>  $msg,
              'state'  =>  false,
            ); 
        }
        return $arr;
  }
  public function confirmroot($id,$type)
  {
    if($type=="get")
    {
        $m=M("orderget")->find($id);
        if($m['uid']==$_SESSION['home_user_info']['id'])
        {
          return $m['pid'];
        }
        else
        {
          return false;
        }
    }
    else
    {
        $m=M("ordertotal")->find($id);
        if($m['pid']==$_SESSION['home_user_info']['id'])
        {
          //echo 111;
          return true;
        }
        else
        {
          return false;
        }
    }
  }
  public function confirmorder($order_id)//接单方点击完成
  {
      $root=$this->confirmroot($order_id,"get");
      if($root)
      {
          
          $data['state']=3;
          $row=M("ordertotal")->where("id = $root")->data($data)->save();
          return "等待发单方确认";
          
         
      }
      else
      {
          return "非法操作";
      }
  }
  public function overconfirm($id)//发单方点击完成
  {
      $root=$this->confirmroot($id,"out");
      if($root)
      {
         $data['state']=4;
         $data['confirm_timer']=time();
         $e=M("ordertotal")->data($data)->where("id = $id")->save();
         return 1;
      }
      else
      {
         return false;
      }
  }

}