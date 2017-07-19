<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
<div class="index-content">
   <div class="input-group col-sm-4 col-md-4">
	<input type="text" class="form-control" placeholder="请输入搜索内容">
	<span class="input-group-addon" id="input-group-addon"><i class="fa fa-search" id="fa-search"></i></span>
   </div>
   
   <div class="index-scroll">
   <marquee direction="left" loop="0">最新成交消息：总成交量7个项目<span>总成交额281818元</span></marquee>
   </div>
   
   <div class="index-zhanshi">
   	<div class="index-zhanshi-left">
		<img src="/Uploads/<?php echo ($zuo); ?>" />
        <div class="input-group">
        	<span class="input-group-addon" id="text">手机号：</span>
            <input type="text" class="form-control" id="input1">
        </div>
        <div class="input-group">
        	<span class="input-group-addon" id="text">验证码：</span>
            <input type="text" class="form-control" id="input2">
            <a href="javascript:;" class="send1 yanzheng" onclick="sends.send();">发送验证码</a>
        </div>
        <div class="input-group">
        	<span class="input-group-addon" id="text">&nbsp;&nbsp;&nbsp;密码：</span>
            <input type="password" class="form-control" id="input3" placeholder="请输入6位纯数字">
        </div>
        <a><button type="button" id="button">立即注册</button></a>      
    </div>
    
    <div class="index-zhanshi-center">
     <div class="carousel slide" id="yzw-banner">
        <ul class="carousel-indicators">
        <li data-target="#yzw-banner" data-slide-to="0" class="active"></li>
        <li data-target="#yzw-banner" data-slide-to="1"></li>
        <li data-target="#yzw-banner" data-slide-to="2"></li>
        <li data-target="#yzw-banner" data-slide-to="3"></li>
        </ul>
      <div class="carousel-inner">
        <?php if(is_array($dingbu)): $i = 0; $__LIST__ = $dingbu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><div <?php if($key == 0): ?>class="item active"<?php else: ?>class="item"<?php endif; ?>>
          <img width="720px" height="322px" src="/Uploads/<?php echo ($d["img_url"]); ?>" alt="banner1"/>
         </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
     </div>
    </div>
    
    <div class="index-zhanshi-right">
    	<img src="/Uploads/<?php echo ($you); ?>" />
    </div>
    <div class="clearfix"></div>
   </div>
   
   <div class="index-ptjs">
 	<center class="ptjs-center-img3">
		<img src="/Public/Home/images/titile.png">
 		<h3 class="ptjs-center-font1">平台介绍</h3>
		<h4 class="ptjs-center-font2">platform introduction</h4>
	</center>
    <div class="index-ptjs-img">
      <div class="index-ptjs-black">
         <h3 class="ptjs-center-font4"><?php echo ($js["content_title"]); ?></h3>
             <?php echo ($js["content"]); ?>
      </div>
    </div>
   </div>
   
   <div class="index-ptys">
 	<center class="ptjs-center-img3">
		<img src="/Public/Home/images/titile.png">
 		<h3 class="ptjs-center-font1">平台优势</h3>
		<h4 class="ptjs-center-font2">platform advantage</h4>
	</center>
   </div>
   <div class="ptjs-center-ku1" id="you">
        <div class="ptjs-center-ku2" id="you-1">
           <p class="you-img1"><img src="/Public/Home/images/hyys_1.png"></p>
           <p class="you-font1">领先</p>
         <div id="black1">
         	<p><?php echo ($ys["0"]); ?></p>
         </div>
         </div>
         <div class="ptjs-center-ku2" id="you-2">
            <p class="you-img1"><img src="/Public/Home/images/hyys_2.png"></p>
            <p class="you-font1">便捷</p>
         <div id="black2">
         	<p><?php echo ($ys["1"]); ?></p>
         </div>
          </div>
          <div class="ptjs-center-ku2" id="you-3">
             <p class="you-img1"><img src="/Public/Home/images/hyys_3.png"></p>
             <p class="you-font1">收益</p>
         <div id="black3">
         	<p><?php echo ($ys["2"]); ?></p>
         </div>
          </div>
     </div>
     
   <div class="index-zyjlr">
 	<center class="zyjlr-center-img3">
		<img src="/Public/Home/images/titile.png">
 		<h3 class="zyjlr-center-font1">自由经理人</h3>
		<h4 class="zyjlr-center-font2">product manager</h4>
	</center>
    <div class="index-zyjlr-img">
      <div class="index-zyjlr-black">
         <h3 class="zyjlr-center-font4"><?php echo ($zy["content_title"]); ?></h3>
         <?php echo ($zy["content"]); ?>
      </div>
    </div>
   </div>
   
   <div class="index-ptys">
 	<center class="ptjs-center-img3">
		<img src="/Public/Home/images/titile.png">
 		<h3 class="ptjs-center-font1">流程介绍</h3>
		<h4 class="ptjs-center-font2">process introduction</h4>
	</center>
   </div>
   <div class="lcjs-img">
   		<img src="/Uploads/<?php echo ($lc["img_url"]); ?>" /> 
   </div>  
   
   
</div>
 
 <!--content 结束-->


 <!--app开始-->

 <div class="index-app">
  <img src="/Uploads/<?php echo ($db["img_url"]); ?>" />
 </div>

 <!--app结束-->   

<script>
  $('#button').click(function()
  {
      var phone=$('#input1'),
      yzm=$('#input2'),
      pwd=$('#input3');
      if(phone.val()==''){
        alert('请填写手机号');
      }else if(yzm.val()==''){
        alert('请填写验证码');
      }else if(pwd.val()==''){
        alert('请填写密码');
      }else if(isNaN(pwd.val())){
        alert('密码必须为纯数字');
      }else if(pwd.val().length!=6){
        alert('密码必须为六位数字');        
      }else{
        $.ajax({
          url:"<?php echo U('Login/syzc');?>",
          type:'post',
          data:{
            phone:phone.val(),
            yzm:yzm.val(),
            pwd:pwd.val()
          },
          dataType:'json',
          success:function(data){
            alert(data.ar);
            if(data.n==1){
              window.location.href="<?php echo U('index/index');?>";
            }else{
              window.location.href="<?php echo U('index/index');?>";
            }
          },
          error:function(data){
            alert('error');
          }
        });        
      }
  });


</script>



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

$("#black1").hide()
$("#you-1").mouseenter(function(){
	$("#black1").stop().slideDown(1000)	
}).mouseleave(function(){
	$("#black1").stop().slideUp(1000)	
})

$("#black2").hide()
$("#you-2").mouseenter(function(){
	$("#black2").stop().slideDown(1000)	
}).mouseleave(function(){
	$("#black2").stop().slideUp(1000)	
})

$("#black3").hide()
$("#you-3").mouseenter(function(){
	$("#black3").stop().slideDown(1000)	
}).mouseleave(function(){
	$("#black3").stop().slideUp(1000)	
})
var default_view = 0; <!--1是默认展开，0是默认关闭，新开窗口看效果，别在原页面刷新-->
</script>


<script type="text/javascript">
function syyz(){
  var phone=$('#input1');
  var result;
    $.ajax({
      url:"<?php echo U('Login/set_msg_yzm');?>",
      type:'post',
      async:false,
      data:{
        phone:phone.val()
      },
      dataType:'json',
      success:function(data){
        if(data.msg==1){
          alert(data.state);
          result=true;
        }else{
          alert(data.state);
          result=false;
        }
      },
      error:function(data){
        alert('error');
        result=false;
      }
    });    
    return result;  
}
$(function  () {
  //获取短信验证码
  var validCode=true;
  $(".send1").click (function  () {
    var time=30;
    var code=$(this);
  if(syyz()){
    if (validCode) {
      validCode=false;
      code.addClass("send0");
    var t=setInterval(function  () {
      time--;
      code.html(time+"秒");
      if (time==0) {
        clearInterval(t);
      code.html("重新获取");
        validCode=true;
      code.removeClass("msgs1");
      }
    },1000)
    }
  }
  })
})
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