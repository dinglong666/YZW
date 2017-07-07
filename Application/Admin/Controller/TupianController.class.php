<?php
namespace Admin\Controller;
use Think\Controller;
class TupianController extends Controller {
    public function _initialize(){
        if(empty($_SESSION['admin_info']['id']))
        {
            $this->redirect('Login/login');
            die;
        }
    }
    public function tupian(){
        $admin_info=$_SESSION['admin_info']['username'];
        $this->assign('admin_info',$admin_info);
	    $this->display();
    }
}