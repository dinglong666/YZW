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
 
<!--content 开始-->
<div class="wodeqianbao-content">

  <div class="row">
  
     
       <nav class="col-sm-3" id="myScrollspy">
       <div class="container-fluid">
            <ul class="nav nav-stacked nav-pills">
               <li class="user-info">
                <div class="photo">                  
                  <form action="<?php echo U('User/User_portrait');?>" id="form" ENCTYPE="multipart/form-data" method="post">
                  <center><a><img src="<?php echo hed();?>" onclick="F_Open_dialog()" ></a></center>
                    <input type="file" name="f" style="display:none" id="g" onchange="F_sub()">
                  </form>
                </div>
                <div class="info">
                  <center><h5><span><?php echo ($_SESSION['user_info']['name']); ?></span>，欢迎你！</h5>
                    <p><?php echo substr_replace($_SESSION['user_info']['mobile'],'****',3,4);?></p>
                    <h5>余额：<span>¥<?php echo user_pr();?></span></h5></center>
                </div>               
               </li>
               <li <?php if($str == '/personal'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('User/personal');?>"><i class="fa fa-user"></i>个人资料</a></li>
               <li <?php if($str == '/project'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('User/project');?>"><i class="fa fa-tasks"></i>我的项目</a></li>
               <li <?php if($str == '/free'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('User/free');?>"><i class="fa fa-home"></i>我的自由经理人</a></li>
               <li <?php if($str == '/UserWallet'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('User/UserWallet');?>"><i class="fa fa-jpy"></i>我的钱包</a></li>
               <li <?php if($str == '/information'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('User/information');?>"><i class="fa fa-bell"></i>我的消息</a></li>
             </ul>
       </div>
     </nav>
<script type="text/javascript">
    function F_Open_dialog() 
    { 
      document.getElementById("g").click();       
    } 
    function F_sub(){
         var v=document.getElementById("g").value;
       if(v=="")return;
       else document.getElementById("form").submit(); 
    }
 </script>
     <div class="col-sm-9 col-md-9">
     	<div class="wodeqianbao-header">
        	<span class="header1"><i class="fa fa-jpy"></i>我的钱包</span>            
        </div>
        <div class="wodeqianbao-body">
            <p class="pull-left"><strong>账户余额：</strong><span class="money">¥<?php echo ($num?:0); ?></span></p>
            <a href="" data-toggle="modal" data-target="#myModal2"><button type="button" class="btn btn-primary pull-right">提现</button></a>
            <div class="clearfix"></div>
        </div>
        <div class="wodeqianbao-tixian">
        	<p>提现方式<span>（任选其一）</span></p>
            <div class="zhifubao-tixian">
              <div class="zhifubao">
              	<center><div class="radio">
                	<label>
                    	<input type="radio" id='zfb' name="optionsRadios" checked>支付宝提现
                    </label>
                </div></center>
            	<center><img src="/Public/Home/images/zfb.png" /></center>
              </div>
              <?php if($find['zfb_user'] == ''): ?><p class="click"><a href="#" data-toggle="modal" data-target="#myModal">点击此处绑定支付宝</a></p>
              <?php else: ?>
                <p class="click">已绑定，<a href="#" data-toggle="modal" data-target="#myModal">点击此处修改账户</a></p><?php endif; ?>
              <!--绑定start-->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	           <div class="modal-dialog" id="modal-dialog">
		         <div class="modal-content">
			      <div class="modal-header">
				   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				   </button>
				   <h4 class="modal-title" id="myModalLabel">
					绑定支付宝
				   </h4>
			      </div>
			      <div class="modal-body">
                   <form class="form-horizontal"  id='zfb_bind_form' action="<?php echo U('zfb_bind');?>" method='post'>
                     <div class="form-group">
                       <label class="col-sm-3 col-md-3 control-label">支付宝账号：</label>
                       <div class="co-sm-9 col-md-9">
                         <input type="text" class="form-control" name='zfb_num'>
                       </div>
                     </div>                
                     <div class="form-group">
                      <label class="col-sm-3 col-md-3 control-label">用户姓名：</label>
                       <div class="co-sm-9 col-md-9">
                         <input type="text" class="form-control" name='zfb_name'>
                       </div>
                   </div>
                  </form>               
			      </div>
			     <div class="modal-footer">
				  <button type="sunmit" class="btn btn-primary pull-right" id='zfb_bind' 
          >确定</button>
			   </div>
		      </div><!-- /.modal-content -->
	         </div><!-- /.modal -->
          </div>
          <!--绑定end-->
            </div>
            
            <div class="weixin-tixian">
              <div class="weixin">
              	<center><div class="radio">
                	<label>
                    	<input type="radio" name="optionsRadios" id='wx'>微信提现
                    </label>
                </div></center>
            	<center><img src="/Public/Home/images/wx.png" /></center>
              </div>
              <?php if($find['wx_user'] == ''): ?><p class="click"><a href="#" data-toggle="modal" data-target="#myModal1">点击此处绑定微信</a></p>
              <?php else: ?>
                <p class="click">已绑定，<a href="#" data-toggle="modal" data-target="#myModal1">点击此处修改账户</a></p><?php endif; ?>
               <!--扫码start-->
              <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	           <div class="modal-dialog" id="modal-dialog1">
		         <div class="modal-content">
			      <div class="modal-header">
				   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				   </button>
				   <h4 class="modal-title" id="myModalLabel">
					绑定微信
				   </h4>
			      </div>
			      <div class="modal-body">
                  	<center><img src="/Public/Home/images/ew.png" /></center>             
			      </div>
			     <div class="modal-footer">
				  <a href="wodeqianbao-bangding.html"><button type="button" class="btn btn-primary pull-right">确定</button></a>
			   </div>
		      </div><!-- /.modal-content -->
	         </div><!-- /.modal -->
          </div>
          <!--扫码end-->
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="wodeqianbao-chaxun">
        	<div class="chaxun-header">
        	  <p class="pull-left">账单查询</p>
            <form action="<?php echo U('UserWallet');?>" id='query'>
              <div class="input-group col-sm-4 col-md-4 pull-right">
	            <input type="text" class="form-control" name='order_id' value='<?php echo ($order_id); ?>' placeholder="请输入订单号">
	            <span class="input-group-addon" id="input-group-addon"><i class=" fa fa-search"></i></span>
              </div>
            </form>
            </div>
            <div class="chaxun-body">
              <table class="table table-hover">
            	<thead>
                	<tr>
                    	
                        <th>订单号</th>
                        <th>佣金金额</th>
                        <th>发放状态</th>
                        <th>发放日期</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($se)): $i = 0; $__LIST__ = $se;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><tr>
                    	
                        <td><?php echo ($s["order_id"]); ?></td>
                        <td>¥<?php echo ($s["price_change"]); ?></td>
                        <td><?php echo ($s['status']==0?'未发放':已发放); ?></td>
                        <td><?php echo (date("Y-m-d",$s["timer"])); ?></td>


                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
              </table>
                <div class="w-page w-left w-m-3 ">
                      <?php echo ($page); ?>
              </div> 
            </div>
        </div>
                             
     </div>
                
  </div>
  
</div>


<!--提现弹框start-->
              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	           <div class="modal-dialog" id="modal-dialog2">
		         <div class="modal-content">
			      <div class="modal-header">
				   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				   </button>
				   <h4 class="modal-title" id="myModalLabel">
					提现
				   </h4>
			      </div>
			      <div class="modal-body">
                  	<div class="tixian-money">
                  	  <p>可用余额：<span>¥<?php echo ($num?:0); ?></span></p>
                    </div>
                    <div class="tixian-fangshi">
                    	<center><img id='img' src="/Public/Home/images/zfb.png" /></center>
                        <center><p id='fangshi'>支付宝提现</p></center>
                    </div>
                    <div class="tixian-jine">
                     <form class="form-horizontal" id='zh_form' role="form" action="<?php echo U('alipay');?>" method="post">
                     <div class="form-group">
                       <label class="col-sm-4 col-md-4 control-label" >提现金额：</label>
                       <div class="co-sm-6 col-md-6">
                         <input type="text" class="form-control" name='amount'>
                       </div>
                     </div>               
                     <div class="form-group">
                      <label class="col-sm-4 col-md-4 control-label">输入密码（即登录密码）：</label>
                       <div class="co-sm-6 col-md-6">
                         <input type="text" class="form-control" name='password'>
                       </div>
                       <span><a href="" data-toggle="modal" data-target="#myModal3" class="password">忘记密码</a></span>
                   </div>

                  </form>
                    </div>                                
			      </div>
			     <div class="modal-footer">
				  <button type="button" class="btn btn-primary pull-right" data-dismiss="modal" id='zh'>确定</button>
			   </div>
		      </div><!-- /.modal-content -->
	         </div><!-- /.modal -->

<!--提现弹框end-->

<!--忘记密码弹框start-->
	           <div class="modal-dialog" id="modal-dialog3">
		         <div class="modal-content">
			      <div class="modal-header">
				   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				   </button>
				   <h4 class="modal-title" id="myModalLabel">
					重置密码
				   </h4>
			      </div>
			      <div class="modal-body">
                   <form class="form-horizontal" role="form">
                     <div class="form-group">
                       <label class="col-sm-3 col-md-3 control-label">支付密码：</label>
                       <div class="co-sm-6 col-md-6">
                         <input type="text" class="form-control">
                       </div>
                       <span>密码为6位数字组成</span>
                     </div>                
                     <div class="form-group">
                      <label class="col-sm-3 col-md-3 control-label">确认密码：</label>
                       <div class="co-sm-6 col-md-6">
                         <input type="text" class="form-control">
                       </div>
                   </div>
                  </form>               
			      </div>
			     <div class="modal-footer">
				  <a href="wodeqianbao.html"><button type="button" class="btn btn-primary pull-right">确定</button></a>
			   </div>
		      </div><!-- /.modal-content -->
	         </div><!-- /.modal -->
         </div>

<!--忘记密码弹框end-->



<script type="text/javascript">
$('#zh').click(function(){
  $("#zh_form").submit();
})

$('#zfb_bind').click(function(){
  if(confirm('确认绑定?')){
    $('#zfb_bind_form').submit();
  }
  
})

$('#wx').click(function(){
  $("#img").attr('src','/Public/Home/images/wx.png');
  $("#fangshi").html('微信提现');
  $("#zh_form").attr('action',"<?php echo U('wx');?>");
})

$('#zfb').click(function(){
  $("#img").attr('src','/Public/Home/images/zfb.png');
  $("#fangshi").html('支付宝提现');
})

$("#input-group-addon").click(function(){
  $('#query').submit();
})

// /Public/Home/images/wx.png

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

$("#modal-dialog3").hide();
$(".password").click(function(){
	$("#modal-dialog2").hide();
	$("#modal-dialog3").show();
})


var default_view = 0; <!--1是默认展开，0是默认关闭，新开窗口看效果，别在原页面刷新-->

</script>
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