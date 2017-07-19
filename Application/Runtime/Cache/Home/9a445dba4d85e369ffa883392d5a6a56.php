<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">

    <meta charset="UTF-8">
    <title>优赚网-首页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Public/Home/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/css/common-login.css" rel="stylesheet" type="text/css">
    <link href="/Public/Home/css/qq.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="http://www.hot80.com/demo/css/wxs.page.css">

    <link href="/Public/Home/css/datepicker-custom.css" type="text/css" rel="stylesheet">
    <link href="/Public/Home/css/colorpicker.css" type="text/css" rel="stylesheet">

    <script src="/Public/Home/js/jquery-3.1.1.min.js"></script>
    <script src="/Public/Home/js/bootstrap.min.js"></script>
    <script src="/Public/Home/js/script.js"></script>

    <script src="/Public/Home/js/bootstrap-datepicker.js"></script>
    <script src="/Public/Home/js/pickers-init.js"></script>



</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
<div class="wrap">
    <div class="header">
        <div class="ptjs-header-box">
            <div class="ptjs-header-img1"><img src="/Uploads/<?= C('STORE_LOGO')?>"></div>
            <select>
                <option>哈尔滨</option>
                <option>北京</option>
                <option>上海</option>
            </select>
            <ul class="ptjs-header-nav">
                <li <?php echo ($index); ?>><a href="<?php echo U('index/index');?>">首页</a></li>
                <li <?php echo ($introduce); ?>><a href="<?php echo U('introduce');?>">平台介绍</a></li>
                <li <?php echo ($enterprise); ?>><a href="<?php echo U('enterprise');?>">合作企业</a></li>
                <li <?php echo ($manager); ?>><a href="<?php echo U('manager');?>">自由经理人</a></li>
                <li <?php echo ($contact); ?> style="color:red;"><a href="<?php echo U('contact');?>">联系我们</a></li>
            </ul>
        <?php if($_SESSION['user_info']['id'] != ''): ?><ul class="ptjs-header-nav2">
            <?php if($xs != xs): ?><li>欢迎来到优赚网！</li>
            <?php else: ?>
                <li>您好，<?php echo ($_SESSION['user_info']['name']); ?></li><?php endif; ?>
                <li><a href="<?php echo U('User/personal');?>">个人中心</a></li>
                <li><a>|</a></li>
                <li><a href="<?php echo U('Login/quit');?>">退出</a></li>
            </ul>
        <?php else: ?>
            <ul class="ptjs-header-nav2">
                <li><a href="<?php echo U('Login/register');?>">登陆</a></li>
                <li><a>|</a></li>
                <li><a href="<?php echo U('Login/register?zcdl=zcdl');?>">注册</a></li>
            </ul><?php endif; ?>
        </div>

    </div>


</div>   
 
<!--content 开始-->
<div class="daishenhe-content">

  <div class="row">
  
     <nav class="col-sm-3" id="myScrollspy">
       <div class="container-fluid">
            <ul class="nav nav-stacked nav-pills">
               <li class="user-info">
                <div class="photo">
                  <center><img src="/Public/Home/images/users.jpg" /></center>
                </div>
                <div class="info">
                  <center><h5><span><?php echo ($_SESSION['user_info']['name']); ?></span>，欢迎你！</h5>
                    <p><?php echo substr_replace($_SESSION['user_info']['mobile'],'****',3,4);?></p>
                    <h5>余额：<span>¥<?php echo (user_pr($_SESSION['user_info']['id'])); ?></span></h5></center>
                </div>               
               </li>
               <li><a href="<?php echo U('User/personal');?>"><i class="fa fa-user"></i>个人资料</a></li>
               <li class="active"><a href="<?php echo U('User/project');?>"><i class="fa fa-tasks"></i>我的项目</a></li>
               <li><a href="<?php echo U('User/free');?>"><i class="fa fa-home"></i>我的自由经理人</a></li>
               <li><a href="<?php echo U('User/UserWallet');?>"><i class="fa fa-jpy"></i>我的钱包</a></li>
               <li><a href="<?php echo U('User/information');?>"><i class="fa fa-bell"></i>我的消息</a></li>
             </ul>
       </div>
     </nav>
     <div class="col-sm-9 col-md-9">
     	<div class="daishenhe-header">
        	<span class="header1"><i class="fa fa-tasks"></i>我的项目</span>
        </div>
        <ul class="nav nav-tabs">
        	<li class="daishenhe-base active">
            	<a href="">项目详情</a>
            </li>
        </ul>
        <div class="daishenhe-body">
        	<div class="body1">
            	<p>项目名称：</p>
                <p class="title"><?php echo ($find['project_name']); ?></p>
            </div>
        	<div class="body1">
            	<p>发布时间：</p>
                <p class="date"><?php echo date('Y-m-d',$find['project_time']);?></p>
            </div>
        	<div class="body1">
            	<p>项目编号：</p>
                <p class="number"><?php echo ($find['project_id']); ?></p>
            </div>
        	<div class="body1">
            	<p>预计金额：</p>
                <p class="money">¥<?php echo ($find['project_estimate']); ?></p>
            </div>
        	<div class="body1">
            	<p>项目内容：</p>
                <p class="content"><?php echo ($find['project_contents']); ?></p>
            </div>
        	<div class="body1">
            	<p>项目状态：</p>
                <div class="state">
                	<img src="<?php echo ($arr[$find['project_snum']]); ?>" />
                </div>
            </div>
        </div>                     
     </div>
                
  </div>
  
</div>
<!--content 结束-->   


<div class="footer">
       <div class="footer-fu">
       <div class="ul-fu">
           <ul class="ptjs-footer-nav">
               <li>平台信息</li>
               <li>合作企业</li>
               <li>精彩视频</li>
               <li>自由经理人</li>
               <li>答疑解惑</li>
               <li>合作联系</li>
           </ul>
           <ul class="ptjs-footer-nav-1">
               <li>
                   <p><a href="#">平台介绍</a></p>
                   <p><a href="#">平台优势</a></p>
                   <p><a href="#">服务方式</a></p>
                   <p><a href="#">运行模式</a></p>
               </li>
               <li><a href="#">合作企业</a></li>
               <li><a href="#">精彩视频</a></li>
               <li>
                    <p><a href="#">项目发布流程</a></p>
                    <p><a href="#">佣金申请流程</a></p>
               </li>
               <li>
                   <p><a href="#">帮助中心</a></p>
                   <p><a href="#">常见问题</a></p>
                   <p><a href="#">服务声明</a></p>
               </li>
               <li><a href="#">联系我们</a></li>
           </ul>
       </div>
       <div class="ewm-fu">
           <div class="ewm"><img src="images/ewm.png" /><center>下载优赚网APP</center></div>
           <div class="ewm1"><img src="images/ewm.png" /><center>关注优赚网微信</center></div>
       </div>


       </div>
       <p class="font1">版权所有：优赚网<span>黑ICP备16002370号-1</span></p>
   </div>

<!--这是客服-->
<div id="online_service_bar">
	<div id="online_service_minibar">
	</div>
	<div id="online_service_fullbar">
		<div class="service_bar_head">
			<span id="service_bar_close" title="点击关闭">点击关闭</span></div>
		<div class="service_bar_main">
			<ul class="service_menu">
				<li class="hover">
				<dl>
					<dd>
					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2447402004&site=qq&menu=yes">
					<img width="74" height="22" border="0" src="http://wpa.qq.com/pa?p=2:2447402004:41" alt="站长素材QQ在线客服" title="站长素材QQ在线客服" /></a>
					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2447402004&site=qq&menu=yes">
					<img width="74" height="22" border="0" src="http://wpa.qq.com/pa?p=2:2447402004:41" alt="站长素材QQ在线客服" title="站长素材QQ在线客服" /></a>
					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2447402004&site=qq&menu=yes">
					<img width="74" height="22" border="0" src="http://wpa.qq.com/pa?p=2:2447402004:41" alt="站长素材QQ在线客服" title="站长素材QQ在线客服" /></a>
					</dd>
				</dl>
				</li>
				</li>
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">
var setFixed = {
	init:function(){
		setFixed.set();
		$(window).bind('scroll',function(){
			setFixed.set();
		});		
	},
	set:function(){
		var top = $(window).scrollTop();
		if(top>=50)
			$('.header').addClass('fixed');		
		else
			$('.header').removeClass('fixed');		
	}
}
$(function(){
	setFixed.init();
})

$(function(){
	$("#yzw-banner").carousel({
		interval:3000	
	});
})

var default_view = 0; <!--1是默认展开，0是默认关闭，新开窗口看效果，别在原页面刷新-->

</script>
</body>
</html>