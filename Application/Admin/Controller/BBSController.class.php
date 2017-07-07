<?php
/**
1.企业概括
2.走进我们
3.业务范围
5.工程业绩
6.双曲板材
9.首页图片
33.联系我们
23.电话
24.二维码
25.OA
26.title
66.招聘信息
*/
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class BBSController extends Controller {
	public function _initialize(){

        if(empty($_SESSION['admin_info']))
        {
            $this->redirect('Login/login');
            die;
        }
    }

    public function index(){
        $this->display('BBS/shouye');
    }

    //空白页跳转
    public function _empty(){
        $this->redirect('BBS/shouye');
    }


}
    