<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller {
  
    public function _initialize(){
    if(empty($_SESSION['admin_info']['id']))
        {
            $this->redirect('Login/login');
            die;
        }
    }
    public function MemberApplyList(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
        if ($_POST) {
            M("jb")->where('id=1')->data($_POST)->save();
        }
        $obj=M('jb')->where('id=1')->find();
        $this->assign('row',$obj);        
        $this->display();
    }
}
	// public function MemberApplyList(){
        
	// 	$m = M('home_user');
 //        if($_GET['sou'])
 //        {
 //            $where= "username like '%$_GET[sou]%' or phone like '%$_GET[sou]%'";
 //            $this->assign("sou",$_GET['sou']);
 //        }
 //        else
 //        {
 //            $where=1;
 //        }
 //        $count=$m->where($where)->count();
	//     $page = new \Think\Page($count,15);
 //        $member=$m->where($where)->limit("$page->firstRow,$page->listRows")->select();   
 //    	$this->assign("member",$member);
 //        $this->assign("page",$page->show());
 //    	$this->display();
 //    }
  //   public function change_state()//修改用户状态
  //   {
  //       $id=$_GET['id'];
  //       $data['state']=$_GET['val'];
  //       $m=M("home_user")->data($data)->where("id = $id")->save();
  //       $this->redirect("MemberApplyList");
  //   }
  //   function MemberDetailed()
  //   {
		// $m = D("user");
		// $c = M("company_scope");
  //   	if(IS_POST)
  //   	{
		//   $detailed = I("post.user_detailed"); //获取user_detailed关联表的数组 如需使用关联模型更新操作必须将从表以数组方式提交 并且必须包含从表外键ID

		//   $id = $detailed['user_id']; //此处$id为主表主键 从表外键 

		//   $_POST['user_detailed']['company_scope'] = implode(",",$_POST['user_detailed']['company_scope']); //公司经营范围转换为字符串存库

		//   $m->relation('user_detailed')->where(array('id'=>$id))->save(I('post.')); //执行关联更新操作

		//   $this->redirect("Member/MemberApplyList"); //是否成功都将跳转

  //   	}
  //   	else
  //   	{
  //   	  $member = $m->MemberDetailed('find',I('get.id')); //展示单条详情
  //   	  $this->assign("member",$member);
  //   	  $this->assign("scope",$c->select()); //获取经营范围库
	 //      $this->display();

  //   	}
  //   }
  //   function ModifyState()
  //   {
  //   	if(IS_AJAX)
  //   	{	

  //   		$m = M("user");

  //   		$id = I('post.id');

  //   		$user = $m->find($id);
   		
		// 	$data['state'] = $_POST['state'];
  //   		if($user['state'] == 2 && $data['state'] == 1)  //当前状态为待审核->通过审核时
  //   		{
  //   			$password = rand(100000,999999);
  //   			$data['password'] = md5($password);
  //   			if($m->where("id = $id")->data($data)->save())
	 //    		{
	 //    			SMS_ApplySuccess($user['phone'],$password);
	 //    			$this->ajaxReturn(StateBackText($_POST['state']));			
	 //    		} 
  //   		}
  //   		else if($user['state'] == 1 && $data['state'] == 3)  //当前状态为已审核->禁用时
  //   		{
  //   			if($m->where("id = $id")->data($data)->save())
	 //    		{
	 //    			SMS_Disable($user['phone']);
	 //    			$this->ajaxReturn(StateBackText($_POST['state']));			
	 //    		} 
  //   		}
  //   		else if($user['state'] == 3 && $data['state'] == 1) //当前状态为已禁用->解除禁用时
  //   		{
  //   			if($m->where("id = $id")->data($data)->save())
	 //    		{
	 //    			SMS_NotDisable($user['phone']);
	 //    			$this->ajaxReturn(StateBackText($_POST['state']));			
	 //    		} 
  //   		}
	
  //   	}
  //   }
  //   function CompanyScope()
  //   {


  //      $m = M("company_scope");

  //      if(IS_AJAX)
  //      {
  //           if(I('post.val'))
  //           {
  //               $data["id"] = I('post.id');

  //               $data["scope_name"] = I('post.val');

  //               $m->where("id = $data[id]")->data($data)->save();

  //               $this->ajaxReturn(I('post.val')); 
  //           }   
  //           elseif(I('post.score'))
  //           {
  //               $data["id"] = I('post.id');

  //               $data["scope_score"] = I('post.score');

  //               $m->where("id = $data[id]")->data($data)->save();

  //               $this->ajaxReturn(I('post.score')); 
  //           }       
  //      }
  //      else if(IS_POST)
  //      {
  //           $m->create();
  //           if($m->add())
  //           {
  //               $this->redirect("Member/CompanyScope");
  //           }
  //           else
  //           {
  //               $this->error("添加失败");
  //           }
  //      }
  //      else if($_GET['delete_id'])
  //      {
  //           if($m->delete(I('get.delete_id')))
  //           {
  //               $this->redirect("Member/CompanyScope");
  //           }
  //           else
  //           {
  //               $this->error("删除失败");
  //           }
  //      }
  //      else
  //      {
  //           $scope = $m->select();
  //           $this->assign("scope",$scope);

  //           $this->display();
  //      }
  //   }

 