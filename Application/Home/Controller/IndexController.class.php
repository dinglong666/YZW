<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class IndexController extends BaseController {
	function index(){
		$art=D('article');
		$dingbu=$art->where('cat_id=108','select');///////////////顶部图片
		$this->assign('dingbu',$dingbu);

		$zuo=$art->where('cat_id=114');//////////////////////顶部左侧
		$this->assign('zuo',$zuo['img_url']);

		$you=$art->where("cat_id=113");//////////////////////顶部右侧
		$this->assign('you',$you['img_url']);

		$jieshao=$art->where('article_id=1284');////////////////////平台介绍
		$this->assign('js',$jieshao);

		$youshi=$art->where('article_id=1285');/////////////////////////平台优势
		$this->assign('ys',explode(',',$youshi['content']));

		$ziyou=$art->where('article_id=1288');/////////////////////////自由经理人
		$this->assign('zy',$ziyou);

		$liucheng=$art->where('cat_id=110');//////////////////////流程介绍
		$this->assign('lc',$liucheng);

		$dibu=$art->where('cat_id=109');////////////////////////////底部
		$this->assign('db',$dibu);

		//当天时间段最新消息
		$zxxx=M('article')->where('cat_id=116')->find();
		$this->assign('zxxx',$zxxx);

		$this->assign('index','class="current"');//////////////////头部class

		$this->display();
	}

	public function introduce(){
		$art=D('article');
		$jieshao=$art->where('article_id=1284');///////////////平台介绍
		$this->assign('js',$jieshao);

		$fuwu=$art->where('article_id=1286');/////////////////////服务方式
		$this->assign('fw',$fuwu);

		$yunxing=$art->where('article_id=1287');///////////////////运行模式
		$this->assign('yx',$yunxing);


		$this->assign('introduce','class="current"');
		$this->display();
	}

	public function enterprise(){
		$art=D('article');
		$arr=$art->page('cat_id=107');//////////////////合作企业
		$this->assign('page',$arr['page']);
		$this->assign('arr',$arr['arr']);
		// dump($arr);
		$this->assign('enterprise','class="current"');
		$this->display();
	}

	public function hzqy_ym(){//////////////////////企业详情
		$id=$_GET['id'];
		$art=D('article');
		$find=$art->where('article_id='.$_GET['id']);
		$this->assign('find',$find);
		$this->display();
	}

	public function manager(){
		$art=D('article');

		$ziyou=$art->where('article_id=1288');///////////////自由经理人
		$this->assign('zy',$ziyou);

		$fabuliucheng=$art->where('article_id=1289');/////////////////项目发布流程
		$this->assign('lc',$fabuliucheng);

		$shenqing=$art->where('article_id=1290');//////////////////佣金申请流程
		$this->assign('sq',$shenqing);

		$this->assign('manager','class="current"');
		$this->display();
	}

	public function contact(){
		$this->assign('address',C('CONTACT_ADDRESS'));//////////////////地址
		$this->assign('phone',C('CONTACT_PHONE'));//////////////////////电话
		$this->assign('email',C('CONTACT_EMAIL'));//////////////////////邮箱

		$art=D('article');

		$map=$art->where('cat_id=115');/////////////////////////////////地图
		$this->assign('map',$map);

		$this->assign('contact','class="current"');
		$this->display();
	}

	public function video(){////////////////////视频
		$art=D('article');

		$arr=$art->page('cat_id=103',9);
		// dump($arr);
		$this->assign('arr',$arr['arr']);
		$this->assign('page',$arr['page']);

		$this->display();

	}

	public function jcsp_xq(){
		$art=D('article');
		$find=$art->where('article_id='.$_GET['id']);
		$this->assign('find',$find);
		$this->display();

	}

	public function help(){////////////////////////答疑解惑
		$art=D('article');
		$cat=D('article_cat');
		if (IS_AJAX) {
			if ($_POST['id']) {///////////////主键id
				$con=$art->where('article_id='.$_POST['id']);
				$this->ajaxReturn($con);
			}

			if ($_POST['pid']) {//////////////父级pid
				$con=$art->where('cat_id='.$_POST['pid'],'select');
				//print_r($con);
				$this->ajaxReturn($con);
			}
		}
		if (!$_GET['id'] && !$_GET['pid']) {///////////////如果id为空给默认值
			$_GET['id']=1291;
		}

		if ($_GET['id']) {///////////////主键id
			$help=$art->where('article_id='.$_GET['id']);
			$this->assign('help',$help);
		}

		if ($_GET['pid']) {//////////////父级pid
			$ar=$art->where('cat_id='.$_GET['pid'],'select');
			$this->assign('ar',$ar);
		}
		
	
		$arr=$cat->where('cat_id>200','select');//////////////自主文章列表
		$this->assign('arr',$arr);


		$this->display();
	}

	//首页搜索
	public function search(){
		$con=I('post.con','','trim');
		$sel=M('article')->where("title like '%{$con}%' ")->select();
		$this->assign('sel',$sel);
		$this->display();
	}

}