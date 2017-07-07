<?php
namespace Admin\Controller;
use Think\Controller;
class SetpostController extends Controller {
	public function _initialize(){

    if(empty($_SESSION['admin_info']['id']))
        {
            $this->redirect('Login/login');
            die;
        }
    }
    public function postlist()//帖子列表
    {

        $m=M("posts_game_put");
        if($_GET['sou'])
        {
            $where="title like '%$_GET[sou]%'";
            $this->assign("sou",$_GET['sou']);
        }
        else
        {
            $where=1;
            $this->assign("sou",$_GET['sou']);
        }
        $count=$m->where("admin = 1 and ".$where)->count();
        $page=new \Think\Page($count,10);
        $row=$m->where("admin = 1 and ".$where)->limit("$page->firstRow,$page->listRows")->order("id desc")->select();
        $this->assign("page",$page->show());
        $this->assign("row",$row);
    	$this->display();
    }
    public function addpost()
    {
        if($_POST)
        {
            if($_POST['ourorgame']==1)//官方贴
            {
                $m=M("onetype_parent");
                $mm=M("onetype_son");
                $typeone=$m->find($_POST['type_one']);
                $_POST['type_one_name']=$typeone['one_name'];
                $typetwo=$mm->find($_POST['type_two']);
                $_POST['type_two_name']=$typetwo['one_name_son'];
            }
            else//游戏贴
            {
                
                $m=M("twotype_parent");
                $mm=M("twotype_son");
                $typeone=$m->find($_POST['type_one']);
                $_POST['type_one_name']=$typeone['two_name'];
                $typetwo=$mm->find($_POST['type_two']);
                $_POST['type_two_name']=$typetwo['two_name_son'];   
            }
            $c=M("posts_game_put");
            $_POST['admin']=1;
            $_POST['put_timer']=time();
            $c->data($_POST)->add();
            $this->redirect("postlist");
        }
        else
        {
            $this->display();
        }
            
    }
    public function del_post()//删除管理员发布的帖子
    {
        $id=$_GET['id'];
        $m=M("posts_game_put");
        $row=$m->find($id);
        $match = array();
        $test_str = 'xxxx<img src="xxxxxxx.jpg" />dflskjflkdsj';
        preg_match('/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/', stripcslashes($row['content']), $match); 
        if(file_exists($_SERVER['DOCUMENT_ROOT'].$match[1]))
        {
            unlink($_SERVER['DOCUMENT_ROOT'].$match[1]);
        }
        $m->delete($id);
        $this->redirect("postlist");
    }
    public function editpost()
    {
        
    }
    public function ourorgame()//联动改变官方区或者游戏区
    {
        if($_POST['id']==1)
        {
            $res['row']=M("onetype_parent")->order("one_ord desc")->select();
            $res['type']=1;
        }
        else
        {
            $res['row']=M("twotype_parent")->order("two_ord desc")->select();
            $res['type']=2;
        }
        $this->ajaxReturn($res);
    }
     public function changes_one()//联动改变官方区或者游戏区二级分类
    {
        if($_POST['ourorgameid']==1)
        {
            $row['row2']=M("onetype_son")->where("parent_id = $_POST[id]")->order("one_ord_son desc")->select();
            $row['type2']=1;
        }
        else
        {
            $row['row2']=M("twotype_son")->where("parent_id = $_POST[id]")->order("two_ord_son desc")->select();
            $row['type2']=2;
        }
        $this->ajaxReturn($row);
    }

}