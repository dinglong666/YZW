<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">

    <meta charset="UTF-8">
    <title><?php echo C('STORE_TITLE');?></title>
    <meta name="keyword" content="<?php echo C('STORE_KEYWORDS');?>">
    <meta name="description" content="<?php echo C('STORE_DESC');?>">
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
            </select>
            <ul class="ptjs-header-nav">
                <li <?php echo ($index); ?>><a href="<?php echo U('index/index');?>">首页</a></li>
                <li <?php echo ($introduce); ?>><a href="<?php echo U('index/introduce');?>">平台介绍</a></li>
                <li <?php echo ($enterprise); ?>><a href="<?php echo U('index/enterprise');?>">合作企业</a></li>
                <li <?php echo ($manager); ?>><a href="<?php echo U('index/manager');?>">自由经理人</a></li>
                <li <?php echo ($contact); ?> style="color:red;"><a href="<?php echo U('index/contact');?>">联系我们</a></li>
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
 
<style type="text/css">    
            .paging { clear: both; }
.paging a {
    display: inline-block;
    padding: 0 10px;
    min-width: 28px;
    height: 28px;
    margin-left: 5px;
    border: 1px solid #ccc;
    background: #fff;
    color: #666;
    text-align: center;
    line-height: 28px;
}
.paging .num:hover,
.paging .prev:hover,
.paging .next:hover {
    text-decoration: none;
    border: 1px solid #0080f0;
    color: #0080f0;
}
.paging .total {
    display: inline-block;
    height: 30px;
    padding: 0 10px;
    line-height: 30px;
}
.paging .current {
    display: inline-block;
    width: 30px;
    height: 30px;
    margin-left: 5px;
    text-align: center;
    line-height: 30px;
}
.paging .prev,
.paging .current {
    margin-left: 0;
}
.paging .rows {
    margin-left: 5px;
    color: #666;
} 
        </style>    
<!--content 开始-->
<div class="hzqy-content">

  <div class="row">
  
     <nav class="col-sm-3" id="myScrollspy">
       <div class="container-fluid">
            <ul class="nav nav-pills nav-stacked"  id="dong">
               <li class="ptjs-center-img2"><img src="/Uploads/<?= C('STORE_LOGO')?>" /></li>
               <li class="active"><a href="">合作企业</a></li>
             </ul>
       </div>
     </nav>
     <div class="col-sm-9 col-md-9">
     
       <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><div class="hzqy1" style='overflow: hidden'>
         <div class="col-sm-4 col-md-4">
           <img src="/Uploads/<?php echo ($a["img_url"]); ?>" />
         </div>
         <div class="col-sm-7 col-md-7">
           <h3><?php echo ($a["title"]); ?></h3>
           <br>
           <?php echo ($a["description"]); ?>
          <p></p>
           <a href="<?php echo U('hzqy_ym?id='.$a['article_id']);?>"><button type="button" id="more">查看更多>></button></a>
         </div>                                   
       </div><?php endforeach; endif; else: echo "" ;endif; ?> 
       
       
              <div class="paging text-right">
                <?php echo ($page); ?>
              </div>  
         
     </div>
                
  </div>
  
</div>
<!--content 结束-->   



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
           <?php
 $art=D('article'); $cat=D('article_cat'); $app=$art->where('cat_id=111'); $gz=$art->where('cat_id=112'); $fl=$cat->where('cat_id>200','select'); $ew=$art->where('cat_id>200','select'); ?>

           <ul class="ptjs-footer-nav-1">
               <li>
                   <p><a href="<?php echo U('introduce');?>">平台介绍</a></p>
                   <p><a href="<?php echo U('introduce');?>">平台优势</a></p>
                   <p><a href="<?php echo U('introduce');?>">服务方式</a></p>
                   <p><a href="<?php echo U('introduce');?>">运行模式</a></p>
               </li>
               <li><a href="<?php echo U('enterprise');?>">合作企业</a></li>
               <li><a href="<?php echo U('video');?>">精彩视频</a></li>
               <li>
                    <p><a href="<?php echo U('manager');?>">项目发布流程</a></p>
                    <p><a href="<?php echo U('manager');?>">佣金申请流程</a></p>
               </li>
               <li>
                   <p><a href="<?php echo U('help?id=1291');?>">帮助中心</a></p>
                   <p><a href="<?php echo U('help?id=1292');?>">常见问题</a></p>
                   <p><a href="<?php echo U('help?id=1293');?>">服务声明</a></p>
                   <?php if(is_array($fl)): $i = 0; $__LIST__ = $fl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?><p><a href="<?php echo U('help?pid='.$f['cat_id']);?>"><?php echo ($f["cat_name"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
               </li>
               <li><a href="<?php echo U('contact');?>">联系我们</a></li>
           </ul>
       </div>
       <div class="ewm-fu">
           <div class="ewm"><img src="/Public/Home/images/ewm.png" /><center>下载优赚网APP</center></div>
           <div class="ewm1"><img src="/Public/Home/images/ewm.png" /><center>关注优赚网微信</center></div>
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
					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('CONTACT_QQ1');?>&site=qq&menu=yes">
					<img width="74" height="22" border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('CONTACT_QQ1');?>:41" alt="站长素材QQ在线客服" title="站长素材QQ在线客服" /></a>
					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('CONTACT_QQ2');?>&site=qq&menu=yes">
					<img width="74" height="22" border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('CONTACT_QQ2');?>:41" alt="站长素材QQ在线客服" title="站长素材QQ在线客服" /></a>
					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('CONTACT_QQ3');?>&site=qq&menu=yes">
					<img width="74" height="22" border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('CONTACT_QQ3');?>:41" alt="站长素材QQ在线客服" title="站长素材QQ在线客服" /></a>
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