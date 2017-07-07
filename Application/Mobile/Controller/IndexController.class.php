<?php
namespace Mobile\Controller;
use Think\Controller;
class IndexController extends Controller {
	//首页
	public function index(){
    	//判断共有几条数据
    	$selectJingxuan=M('xinwen')->where('display=1 and please=1')->order('xinwenorder DESC')->select();
	    //清除数据
	    cookie('id',null);
	    cookie('idt',null);
	    $sql="select * from yula_onetype_parent INNER JOIN yula_onetype_son 
	          on yula_onetype_parent.id=yula_onetype_son.parent_id
	          where yula_onetype_parent.one_name in ('移动网站banner图','移动网站logo','二维码')";
	    $selectType=M()->query($sql);
	    $selectOne=array();
	    $selectBanner=array();
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name_son']!='pc网站二维码') {
	        if ($value['one_name']!='移动网站banner图') {
	          $selectOne[]=$value;
	        }
	      }
	    }
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name']=='移动网站banner图') {
	        $selectBanner[]=$value;
	      }
	    }
	    foreach ($selectOne as $key => $value) {
	    	if ($value['one_name_son']=='移动logo') {
	    		$yidonglogo=$value['one_img'];
	    	}
	    	if ($value['one_name_son']=='移动网站二维码') {
				$erweima=$value['one_img'];
	    	}
	    }
	    //首页banner图
	    $this->assign('selectBanner',$selectBanner);
	    //移动网站二维码
	    $this->assign('erweima',$erweima);
	    //顶部logo
	    $this->assign('dinglogo',$yidonglogo);
		//基本信息
	    $jb=M('jb')->where('id=1')->find();
	    $this->assign('jiben',$jb);
		//全部分类
	    $CartType=M('twotype_parent')->order('id ASC')->select();
	    //子分类
	    $CartNext=M('twotype_son')->select();
	    $CartArray=array();
	    foreach ($CartType as $key => $value) {
	      foreach ($CartNext as $ke => $val) {
	        if ($value['id']==$val['parent_id']) {
	          $value['type_name'][]=$val;
	        }
	      }
	      $CartArray[]=$value;
	    }
	    //最新车源只查8条
	    $selectCart=M('game')->where('display=1')->order('paixu DESC')->limit(8)->select();
    	$this->assign('selectCart',$selectCart);
    	$this->assign('selectJingxuan',$selectJingxuan);
	    $this->assign('CartArray',$CartArray);
		$this->display();
	}
	//关于我们
	public function aboutus(){
	    //清除数据
	    cookie('id',null);
	    cookie('idt',null);
	    $sql="select * from yula_onetype_parent INNER JOIN yula_onetype_son 
	          on yula_onetype_parent.id=yula_onetype_son.parent_id
	          where yula_onetype_parent.one_name in ('移动网站banner图','移动网站logo','二维码')";
	    $selectType=M()->query($sql);
	    $selectOne=array();
	    $selectBanner=array();
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name_son']!='pc网站二维码') {
	        if ($value['one_name']!='移动网站banner图') {
	          $selectOne[]=$value;
	        }
	      }
	    }
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name']=='移动网站banner图') {
	        $selectBanner[]=$value;
	      }
	    }
	    foreach ($selectOne as $key => $value) {
	    	if ($value['one_name_son']=='移动logo') {
	    		$yidonglogo=$value['one_img'];
	    	}
	    	if ($value['one_name_son']=='移动网站二维码') {
				$erweima=$value['one_img'];
	    	}
	    }
	    //首页banner图
	    $this->assign('selectBanner',$selectBanner);
	    //移动网站二维码
	    $this->assign('erweima',$erweima);
	    //顶部logo
	    $this->assign('dinglogo',$yidonglogo);
		//基本信息
	    $jb=M('jb')->where('id=1')->find();
	    $guanyu=M('guanyu')->where('please=1')->find();
	    //关于我们展示
	    $this->assign('guanyu',$guanyu);
	    $this->assign('jiben',$jb);
		$this->display();
	}
	//联系我们
	public function contactus(){
	    //清除数据
	    cookie('id',null);
	    cookie('idt',null);
	    $sql="select * from yula_onetype_parent INNER JOIN yula_onetype_son 
	          on yula_onetype_parent.id=yula_onetype_son.parent_id
	          where yula_onetype_parent.one_name in ('移动网站banner图','移动网站logo','二维码')";
	    $selectType=M()->query($sql);
	    $selectOne=array();
	    $selectBanner=array();
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name_son']!='pc网站二维码') {
	        if ($value['one_name']!='移动网站banner图') {
	          $selectOne[]=$value;
	        }
	      }
	    }
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name']=='移动网站banner图') {
	        $selectBanner[]=$value;
	      }
	    }
	    foreach ($selectOne as $key => $value) {
	    	if ($value['one_name_son']=='移动logo') {
	    		$yidonglogo=$value['one_img'];
	    	}
	    	if ($value['one_name_son']=='移动网站二维码') {
				$erweima=$value['one_img'];
	    	}
	    }
	    //首页banner图
	    $this->assign('selectBanner',$selectBanner);
	    //移动网站二维码
	    $this->assign('erweima',$erweima);
	    //顶部logo
	    $this->assign('dinglogo',$yidonglogo);
		//基本信息
	    $jb=M('jb')->where('id=1')->find();
	    // //联系我们
	    $lianxi=M('lianxi')->where('please=1')->find();
	    // //联系我们展示
	    $this->assign('lianxi',$lianxi);
	    $this->assign('jiben',$jb);
		$this->display();
	}
	//新闻中心
	public function newscenter(){
	    //清除数据
	    cookie('id',null);
	    cookie('idt',null);
	    $sql="select * from yula_onetype_parent INNER JOIN yula_onetype_son 
	          on yula_onetype_parent.id=yula_onetype_son.parent_id
	          where yula_onetype_parent.one_name in ('移动网站banner图','移动网站logo','二维码')";
	    $selectType=M()->query($sql);
	    $selectOne=array();
	    $selectBanner=array();
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name_son']!='pc网站二维码') {
	        if ($value['one_name']!='移动网站banner图') {
	          $selectOne[]=$value;
	        }
	      }
	    }
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name']=='移动网站banner图') {
	        $selectBanner[]=$value;
	      }
	    }
	    foreach ($selectOne as $key => $value) {
	    	if ($value['one_name_son']=='移动logo') {
	    		$yidonglogo=$value['one_img'];
	    	}
	    	if ($value['one_name_son']=='移动网站二维码') {
				$erweima=$value['one_img'];
	    	}
	    }
	    //首页banner图
	    $this->assign('selectBanner',$selectBanner);
	    //移动网站二维码
	    $this->assign('erweima',$erweima);
	    //顶部logo
	    $this->assign('dinglogo',$yidonglogo);
		//基本信息
	    $jb=M('jb')->where('id=1')->find();

	    $obj=M('xinwen');
	    $count=$obj->where('please=1 and display=2')->count();
	    $p=new \Think\Page($count,8);
	    $p->setConfig('header','<li class="rows" style="height: 50px; border:rgba(0,0,0,0)">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
	    $p->setConfig('prev','上一页');
	    $p->setConfig('next','下一页');
	    $p->setConfig('last','末页');
	    $p->setConfig('first','首页');
	    $p->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
	    $this->page=$p->show();
	    $xinwen=$obj->where('please=1 and display=2')->order('xinwenorder DESC')->limit($p->firstRow,$p->listRows)->select();
	    //展示新闻
	    $this->assign('xinwen',$xinwen);
	    $this->assign('jiben',$jb);
		$this->display();
	}
	//在线留言
	public function online(){
	    //清除数据
	    cookie('id',null);
	    cookie('idt',null);
	    $sql="select * from yula_onetype_parent INNER JOIN yula_onetype_son 
	          on yula_onetype_parent.id=yula_onetype_son.parent_id
	          where yula_onetype_parent.one_name in ('移动网站banner图','移动网站logo','二维码')";
	    $selectType=M()->query($sql);
	    $selectOne=array();
	    $selectBanner=array();
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name_son']!='pc网站二维码') {
	        if ($value['one_name']!='移动网站banner图') {
	          $selectOne[]=$value;
	        }
	      }
	    }
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name']=='移动网站banner图') {
	        $selectBanner[]=$value;
	      }
	    }
	    foreach ($selectOne as $key => $value) {
	    	if ($value['one_name_son']=='移动logo') {
	    		$yidonglogo=$value['one_img'];
	    	}
	    	if ($value['one_name_son']=='移动网站二维码') {
				$erweima=$value['one_img'];
	    	}
	    }
	    //首页banner图
	    $this->assign('selectBanner',$selectBanner);
	    //移动网站二维码
	    $this->assign('erweima',$erweima);
	    //顶部logo
	    $this->assign('dinglogo',$yidonglogo);
		//基本信息
	    $jb=M('jb')->where('id=1')->find();
	    $this->assign('jiben',$jb);
		$this->display();
	}
	//在线留言ajax
	public function online1(){
		if (IS_AJAX) {
		      //判断用户数据
		      if (empty($_POST['username'])) {
		        $this->ajaxreturn('姓名不能为空');
		        die();
		      }elseif (empty($_POST['useremail'])) {
		        $this->ajaxreturn('邮箱不能为空');
		        die();
		      }elseif(empty($_POST['phone'])){
		        $this->ajaxreturn('电话不能为空');
		        die();
		      }elseif (empty($_POST['content'])) {
		        $this->ajaxreturn('留言内容不能为空');
		        die();
		      }elseif (!preg_match('/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/',$_POST['useremail'])) {
		        $this->ajaxreturn('邮箱格式不正确');
		        die();
		      }elseif (!preg_match('/^1[3|4|5|7|8]\d{9}$/',$_POST['phone'])) {
		        $this->ajaxreturn('手机格式不正确');
		        die();
		      }
		      //判断不能重复提交      
		      if (cookie('username')==$_POST['username'] && cookie('useremail')==$_POST['useremail'] && cookie('phone')==$_POST['phone']) {
		        $this->ajaxreturn('请不要重复录入信息');
		        die();
		      }
		      cookie('username',$_POST['username']);
		      cookie('useremail',$_POST['useremail']);
		      cookie('phone',$_POST['phone']);
		      //判断是否重复添加数据
		      $liuyan=M('liuyan')->where('username='.'"'.$_POST['username'].'" or useremail='.'"'.$_POST['useremail'].'" or phone='.'"'.$_POST['phone'].'"')->find();
		      if (isset($liuyan)) {
		        $this->ajaxreturn('^_^已有该姓名或该邮箱或手机号的用户留言过');
		        die();
		      }
		      $_POST['addtime']=time();
		      $_POST['userip']=gethostbyname($_ENV['COMPUTERNAME']);
		      //每个电脑至多只能录入三十条条数据
		      $count=M('liuyan')->where('userip='.'"'.$_POST['userip'].'"')->count();
		      if ((int)$count>=30) {
		        $this->ajaxreturn('^_^亲，请不要恶意录入留言信息');
		        die();
		      }
		      //添加数据
		      M('liuyan')->data($_POST)->add();
		      $this->ajaxreturn(1);
		}
	}
	//我要卖车
	public function sell(){
	    //清除数据
	    cookie('id',null);
	    cookie('idt',null);
	    $sql="select * from yula_onetype_parent INNER JOIN yula_onetype_son 
	          on yula_onetype_parent.id=yula_onetype_son.parent_id
	          where yula_onetype_parent.one_name in ('移动网站banner图','移动网站logo','二维码')";
	    $selectType=M()->query($sql);
	    $selectOne=array();
	    $selectBanner=array();
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name_son']!='pc网站二维码') {
	        if ($value['one_name']!='移动网站banner图') {
	          $selectOne[]=$value;
	        }
	      }
	    }
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name']=='移动网站banner图') {
	        $selectBanner[]=$value;
	      }
	    }
	    foreach ($selectOne as $key => $value) {
	    	if ($value['one_name_son']=='移动logo') {
	    		$yidonglogo=$value['one_img'];
	    	}
	    	if ($value['one_name_son']=='移动网站二维码') {
				$erweima=$value['one_img'];
	    	}
	    }
	    //首页banner图
	    $this->assign('selectBanner',$selectBanner);
	    //移动网站二维码
	    $this->assign('erweima',$erweima);
	    //顶部logo
	    $this->assign('dinglogo',$yidonglogo);
		//基本信息
	    $jb=M('jb')->where('id=1')->find();
	    $this->assign('jiben',$jb);
		$this->display();
	}
	//卖车ajax
	public function sell1(){
	 if (IS_AJAX) {
	      //判断用户数据
	      if (empty($_POST['username'])) {
	        $this->ajaxreturn('姓名不能为空');
	        die();
	      }elseif (empty($_POST['useremail'])) {
	        $this->ajaxreturn('邮箱不能为空');
	        die();
	      }elseif(empty($_POST['phone'])){
	        $this->ajaxreturn('电话不能为空');
	        die();
	      }elseif (empty($_POST['content'])) {
	        $this->ajaxreturn('卖车详情不能为空');
	        die();
	      }elseif (!preg_match('/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/',$_POST['useremail'])) {
	        $this->ajaxreturn('邮箱格式不正确');
	        die();
	      }elseif (!preg_match('/^1[3|4|5|7|8]\d{9}$/',$_POST['phone'])) {
	        $this->ajaxreturn('手机格式不正确');
	        die();
	      }
	      //判断不能重复提交      
	      if (cookie('username1')==$_POST['username'] && cookie('useremail1')==$_POST['useremail'] && cookie('phone1')==$_POST['phone']) {
	        $this->ajaxreturn('请不要重复录入信息');
	        die();
	      }
	      cookie('username1',$_POST['username']);
	      cookie('useremail1',$_POST['useremail']);
	      cookie('phone1',$_POST['phone']);
	      //判断是否重复添加数据
	      $liuyan=M('maiche')->where('username='.'"'.$_POST['username'].'" or useremail='.'"'.$_POST['useremail'].'" or phone='.'"'.$_POST['phone'].'"')->find();
	      if (isset($liuyan)) {
	        $this->ajaxreturn('^_^已有该姓名或该邮箱或手机号的用户留言过');
	        die();
	      }
	      $_POST['addtime']=time();
	      $_POST['userip']=gethostbyname($_ENV['COMPUTERNAME']);
	      //每个电脑至多只能录入三十条条数据
	      $count=M('maiche')->where('userip='.'"'.$_POST['userip'].'"')->count();
	      if ((int)$count>=30) {
	        $this->ajaxreturn('^_^亲，请不要恶意录入卖车信息');
	        die();
	      }
	      //添加数据
	      M('maiche')->data($_POST)->add();
	      $this->ajaxreturn(1);
	    }
	}
	//车源信息
	public function source(){
	    $sql="select * from yula_onetype_parent INNER JOIN yula_onetype_son 
	          on yula_onetype_parent.id=yula_onetype_son.parent_id
	          where yula_onetype_parent.one_name in ('移动网站banner图','移动网站logo','二维码')";
	    $selectType=M()->query($sql);
	    $selectOne=array();
	    $selectBanner=array();
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name_son']!='pc网站二维码') {
	        if ($value['one_name']!='移动网站banner图') {
	          $selectOne[]=$value;
	        }
	      }
	    }
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name']=='移动网站banner图') {
	        $selectBanner[]=$value;
	      }
	    }
	    foreach ($selectOne as $key => $value) {
	    	if ($value['one_name_son']=='移动logo') {
	    		$yidonglogo=$value['one_img'];
	    	}
	    	if ($value['one_name_son']=='移动网站二维码') {
				$erweima=$value['one_img'];
	    	}
	    }
	    //首页banner图
	    $this->assign('selectBanner',$selectBanner);
	    //移动网站二维码
	    $this->assign('erweima',$erweima);
	    //顶部logo
	    $this->assign('dinglogo',$yidonglogo);
		$where='display=1';
		//基本信息
	    $jb=M('jb')->where('id=1')->find();
	    $this->assign('jiben',$jb);
	    if($_GET['id'])
	    {
	      $id=$_GET['id'];
	      cookie('id',$_GET['id']);
	    }
	    if($_GET['idt'])
	    {
	      $idt=$_GET['idt'];
	      cookie('idt',$idt);
	    }
	    if ($_GET['qtype']) {
	      cookie('id',null);
	    }
	    if ($_GET['qprice']) {
	      cookie('idt',null);
	    }
	    $this->assign("idt",cookie('idt'));
	    $this->assign("id",cookie('id'));
	    if (cookie('id')) {
	      $where.=' and parent_id_type='.cookie('id');
	    }
	    if (cookie('idt')) {
	      $where.=' and parent_id_price='.cookie('idt');
	    }
		//选择默认车辆
	    $obj=M('game');
	    $count=M('game')->where($where)->count();
	    $p=new \Think\Page($count,8);
	    $p->setConfig('header','<li class="rows" style="height: 50px; border:rgba(0,0,0,0)">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
	    $p->setConfig('prev','上一页');
	    $p->setConfig('next','下一页');
	    $p->setConfig('last','末页');
	    $p->setConfig('first','首页');
	    $p->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
	    $selectCart=$obj->where($where)->limit($p->firstRow,$p->listRows)->select();
	    $this->page=$p->show();
	    //展示车辆
	    $this->assign('selectCart',$selectCart);
		//全部分类
	    $CartType=M('twotype_parent')->order('id ASC')->select();
	    //子分类
	    $CartNext=M('twotype_son')->select();
	    $CartArray=array();
	    foreach ($CartType as $key => $value) {
	      foreach ($CartNext as $ke => $val) {
	        if ($value['id']==$val['parent_id']) {
	          $value['type_name'][]=$val;
	        }
	      }
	      $CartArray[]=$value;
	    }
	    //展示分类
	    $this->assign('CartArray',$CartArray);
		$this->display();
	}
	//去除特殊字符
	public function strFilter($str){
	    $str = str_replace('`', '', $str);
	    $str = str_replace('·', '', $str);
	    $str = str_replace('~', '', $str);
	    $str = str_replace('!', '', $str);
	    $str = str_replace('！', '', $str);
	    $str = str_replace('@', '', $str);
	    $str = str_replace('#', '', $str);
	    $str = str_replace('$', '', $str);
	    $str = str_replace('￥', '', $str);
	    $str = str_replace('%', '', $str);
	    $str = str_replace('^', '', $str);
	    $str = str_replace('……', '', $str);
	    $str = str_replace('&', '', $str);
	    $str = str_replace('*', '', $str);
	    $str = str_replace('(', '', $str);
	    $str = str_replace(')', '', $str);
	    $str = str_replace('（', '', $str);
	    $str = str_replace('）', '', $str);
	    $str = str_replace('-', '', $str);
	    $str = str_replace('_', '', $str);
	    $str = str_replace('——', '', $str);
	    $str = str_replace('+', '', $str);
	    $str = str_replace('=', '', $str);
	    $str = str_replace('|', '', $str);
	    $str = str_replace('\\', '', $str);
	    $str = str_replace('[', '', $str);
	    $str = str_replace(']', '', $str);
	    $str = str_replace('【', '', $str);
	    $str = str_replace('】', '', $str);
	    $str = str_replace('{', '', $str);
	    $str = str_replace('}', '', $str);
	    $str = str_replace(';', '', $str);
	    $str = str_replace('；', '', $str);
	    $str = str_replace(':', '', $str);
	    $str = str_replace('：', '', $str);
	    $str = str_replace('\'', '', $str);
	    $str = str_replace('"', '', $str);
	    $str = str_replace('“', '', $str);
	    $str = str_replace('”', '', $str);
	    $str = str_replace(',', '', $str);
	    $str = str_replace('，', '', $str);
	    $str = str_replace('<', '', $str);
	    $str = str_replace('>', '', $str);
	    $str = str_replace('《', '', $str);
	    $str = str_replace('》', '', $str);
	    $str = str_replace('.', '', $str);
	    $str = str_replace('。', '', $str);
	    $str = str_replace('/', '', $str);
	    $str = str_replace('、', '', $str);
	    $str = str_replace('?', '', $str);
	    $str = str_replace('？', '', $str);
	    return trim($str);
	}
	//车辆详情页
	public function cartlist(){
	    //清除数据
	    cookie('id',null);
	    cookie('idt',null);
	    $sql="select * from yula_onetype_parent INNER JOIN yula_onetype_son 
	          on yula_onetype_parent.id=yula_onetype_son.parent_id
	          where yula_onetype_parent.one_name in ('移动网站banner图','移动网站logo','二维码')";
	    $selectType=M()->query($sql);
	    $selectOne=array();
	    $selectBanner=array();
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name_son']!='pc网站二维码') {
	        if ($value['one_name']!='移动网站banner图') {
	          $selectOne[]=$value;
	        }
	      }
	    }
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name']=='移动网站banner图') {
	        $selectBanner[]=$value;
	      }
	    }
	    foreach ($selectOne as $key => $value) {
	    	if ($value['one_name_son']=='移动logo') {
	    		$yidonglogo=$value['one_img'];
	    	}
	    	if ($value['one_name_son']=='移动网站二维码') {
				$erweima=$value['one_img'];
	    	}
	    }
	    //首页banner图
	    $this->assign('selectBanner',$selectBanner);
	    //移动网站二维码
	    $this->assign('erweima',$erweima);
	    //顶部logo
	    $this->assign('dinglogo',$yidonglogo);
		//基本信息
	    $jb=M('jb')->where('id=1')->find();
	    $this->assign('jiben',$jb);
	    $guanyu=M('guanyu')->where('please=1')->find();
	    if ($_GET) {
		   	$id=$_GET['gameid'];
	    	$selectCart=M('game')->where('id='.$id)->find();
	    	$this->assign('selectCart',$selectCart);
	    }
		$this->display();
	}
	//新闻详情页
	public function xinwenlist(){
	    //清除数据
	    cookie('id',null);
	    cookie('idt',null);
	    $sql="select * from yula_onetype_parent INNER JOIN yula_onetype_son 
	          on yula_onetype_parent.id=yula_onetype_son.parent_id
	          where yula_onetype_parent.one_name in ('移动网站banner图','移动网站logo','二维码')";
	    $selectType=M()->query($sql);
	    $selectOne=array();
	    $selectBanner=array();
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name_son']!='pc网站二维码') {
	        if ($value['one_name']!='移动网站banner图') {
	          $selectOne[]=$value;
	        }
	      }
	    }
	    foreach ($selectType as $key => $value) {
	      if ($value['one_name']=='移动网站banner图') {
	        $selectBanner[]=$value;
	      }
	    }
	    foreach ($selectOne as $key => $value) {
	    	if ($value['one_name_son']=='移动logo') {
	    		$yidonglogo=$value['one_img'];
	    	}
	    	if ($value['one_name_son']=='移动网站二维码') {
				$erweima=$value['one_img'];
	    	}
	    }
	    //首页banner图
	    $this->assign('selectBanner',$selectBanner);
	    //移动网站二维码
	    $this->assign('erweima',$erweima);
	    //顶部logo
	    $this->assign('dinglogo',$yidonglogo);
		//基本信息
	    $jb=M('jb')->where('id=1')->find();
	    $this->assign('jiben',$jb);
	    $guanyu=M('guanyu')->where('please=1')->find();
	    if ($_GET['id']){
	    	$id=$_GET['id'];
	    	$xinwen=M('xinwen')->where('id='.$id.' and please=1')->find();
	    	$this->assign('selectCart',$xinwen);
	    }
		$this->display();
	}
}