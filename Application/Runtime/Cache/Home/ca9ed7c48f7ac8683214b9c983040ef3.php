<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head lang="en">
<meta charset="utf-8">
<title><?php echo C('STORE_TITLE');?></title>
<meta name="keyword" content="<?php echo C('STORE_KEYWORDS');?>">
<meta name="description" content="<?php echo C('STORE_DESC');?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Home/css/font-awesome.min.css">
    <link href="/Public/Home/css/register.css" rel="stylesheet" type="text/css">
  <script src="/Public/Home/js/jquery-3.1.1.min.js"></script>
  <script src="/Public/Home/js/bootstrap.min.js"></script>
</head>


<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">

<div class="register-box">
  <center>
    <div class="logo">    
  	  <img src="/Public/Home/images/logo.png" />    
    </div>
    <h3>安全省事赚钱的建筑行业消息平台</h3>
  </center>
  
  <div id="xuanxiang">
  
    <ul id="myTab" class="nav nav-tabs">
	  <li class="active"><a href="#sign" data-toggle="tab">登录</a></li>
	  <li><a href="#register" id="zczc" data-toggle="tab">注册</a></li>
	  <li><a href="#phone" data-toggle="tab">手机版</a></li>
    </ul>
    
    <div id="myTabContent" class="tab-content">
	  <div class="tab-pane fade in active" id="sign">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-phone"></i></span>
			<input type="text" id="sjh" class="form-control" placeholder="请输入手机号码">
		</div>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-lock"></i></span>
			<input type="password" id='mm' class="form-control" placeholder="请输入密码">
		</div>
        <form class="form-inline" role="form">
          <div class="checkbox pull-left">
		    <label>
			  <input id='jz' type="checkbox"> 记住密码
		    </label>
	      </div>
          <button type="button" class="pull-right" data-toggle="modal" data-target="#myModal">忘记密码</button>
           <!-- 模态框（Modal） -->
           <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	         <div class="modal-dialog" id="modal-dialog">
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
		         <div class="input-group" id="input-group">
			      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
			      <input type="text" id='ppp' class="form-control" placeholder="请输入手机号码">
                  <span class="input-group-addon" id="input-group-addon">*</span>
		         </div>  
             <div class="input-group" id="input-group">
            <span class="input-group-addon"><i class="fa fa-th"></i></span>
            <input type="text" id="yyy" class="form-control" placeholder="请输入短信验证码">
                  <span class="input-group-addon" id="yanzhengma"><a href="#">获取验证码</a></span>
                  <span class="input-group-addon" id="input-group-addon">*</span>
             </div> 
		         <div class="input-group" id="input-group">
			      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
			      <input type="password" id="mmm" class="form-control" placeholder="请设置密码（6位数字组成）">
                  <span class="input-group-addon" id="input-group-addon">*</span>
		         </div> 
		         <div class="input-group" id="input-group">
			      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
			      <input type="password" id="aaa" class="form-control" placeholder="请再次确认密码（6位数字组成）">
                  <span class="input-group-addon" id="input-group-addon">*</span>
		         </div>               
			    </div>
			    <div class="modal-footer">
				  <button id='qd' type="button" class="btn btn-primary pull-right" data-dismiss="modal">确定</button>
			   </div>
		      </div><!-- /.modal-content -->
	         </div><!-- /.modal -->
          </div>
        </form>
        <center><button id="dl" type="button" class="btn btn-primary">立即登录</button></center>
	  </div>
	  <div class="tab-pane fade" id="register">
	
    <div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			<input id='yhm' type="text" class="form-control" placeholder="请输入用户名">
            <span class="input-group-addon" id="input-group-addon">*</span>
		</div>
    <form action="<?php echo U('Login/set_msg_yzm');?>" method='post' >
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-phone"></i></span>
			<input id='pho' type="text" class="form-control" placeholder="请输入手机号码">
            <span class="input-group-addon" id="input-group-addon">*</span>
		</div>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-th"></i></span>
			<input id='yzm' type="text" class="form-control" placeholder="请输入短信验证码">
            <span class="input-group-addon" id="yanzheng"><a href="#">获取验证码</a></span>
            <span class="input-group-addon" id="input-group-addon">*</span>
		</div>
    </form>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-lock"></i></span>
			<input id='mi' type="password" class="form-control" placeholder="请输入密码（6位数字组成）">
            <span class="input-group-addon" id="input-group-addon">*</span>
		</div>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-lock"></i></span>
			<input id='ma' type="password" class="form-control" placeholder="请再次输入密码（6位数字组成）">
            <span class="input-group-addon" id="input-group-addon">*</span>
		</div>
      <?php if($_GET['id'] == ''): ?><div class="input-group">
        	<select class="form-control" id="select">
            	<option value="0">请选择项目介绍人</option>
            <?php if(is_array($yg)): $i = 0; $__LIST__ = $yg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$y): $mod = ($i % 2 );++$i;?><option value="<?php echo ($y['user_id']); ?>"><?php echo ($y['user_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div><?php endif; ?>
          <div class="checkbox pull-right">
		    <label>
			  <input id='ty' value='1' type="checkbox">  我已阅读并同意《优赚网用户协议》
		    </label>
	      </div>
        <center><button id="zc" type="button" class="btn btn-primary">提交注册</button></center>

    </div>
	  <div class="tab-pane fade" id="phone">
      	<div class="phone-left">
        	<center><img src="/Public/Home/images/app.png" /></center>
        </div>
        <div class="phone-right">
        	<center>
            	<img src="/Public/Home/images/ewm.png" />
                <h4>扫一扫   轻松下载</h4>
                <button type="button" class="btn btn-primary"><img src="/Public/Home/images/andriod.png" class="android">Android下载</button>
                <button type="button" class="btn btn-warning"><img src="/Public/Home/images/iOS.png" class="ios">iOS下载</button>
            </center>
        </div>
        <div class="clearfix"></div>
	  </div>
      
    </div>
    
  </div>
  
  <center><a href="<?php echo U('index/index');?>"><h3>返回首页</h3></a></center>
  <center><h3>全国免费热线：<?php echo C('CONTACT_PHONE');?></h3></center>
  
</div>
<script>
  if(<?php echo ($_SESSION['zcdl']); ?>==1){
    $('#zczc').onclick = function(){   //给元素增加点击事件
        alert(1);
    };
    $('#zczc').click();  //执行点击事件，这样就模拟出了自动执行点击事件。
  }
  $('#qd').click(function()
    {
      var ppp=$('#ppp'),
          yyy=$('#yyy'),
          mmm=$('#mmm'),
          aaa=$('#aaa');
      if(ppp.val()==''){
        alert('请填写手机号');
        return false;
      }else if(yyy.val()==''){
        alert('请填写验证码');
        return false;
      }else if(mmm.val()=='' ||aaa.val()==''){
        alert('请填写密码');
        return false;        
      }else if(isNaN(mmm.val()) || isNaN(aaa.val())){
        alert('密码必须为纯数字');
        return false;
      }else if(mmm.val().length!=6){
        alert('密码必须为6位数字');
        return false;
      }else if(mmm.val()!=aaa.val()){
        alert('两次密码输入不一致');
        return false;
      }else{
        $.ajax({
          url:"<?php echo U('Login/wjmm_yz');?>",
          type:'post',
          data:{
            ppp:ppp.val(),
            mmm:mmm.val(),
            yyy:yyy.val()
          },
          dataType:'json',
          success:function(data){
            if(data.msg==1){
              alert(data.n);
            }else{
              alert(data.n);
              return false;
            }
          },
          error:function(data){
            alert('error');
          }
        });          
      }
  });









  $('#dl').click(function(){
    var i=0;
    if($('#jz').prop('checked')==true){
      var i=1;
    }
    if($('#sjh').val()==''){
      alert('请填写手机号');
    }else if($('#mm').val()==''){
      alert('请填写密码');
    }else{
      $.ajax({
        url:"<?php echo U('Login/verification');?>",
        type:'post',
        data:{
          sjh:$('#sjh').val(),
          mm:$('#mm').val(),
          jz:$('#jz').val(),
          i:i
        },
        dataType:'json',
        success:function(data){
          alert(data.ar);
          if(data.n==1){
            window.location.href="<?php echo U('index/index');?>";
          }else{
            window.location.href="<?php echo U('Login/register');?>";
          }
        },
        error:function(data){
          alert('error');
        }
      });    
    }
  });
  $('#zc').click(function()
    {
      var yhm=$('#yhm'),
          yzm=$('#yzm'),
          zcsj=$('#pho'),
          mi=$('#mi'),
          ma=$('#ma'),
          select=$('#select'),
          ty=$('#ty');
      var i=0;
      if(ty.prop('checked')==true){
        i=1;
      }
      if(i!=1){
        alert('请同意优赚网用户协议');
      }else if(yhm.val()==''){
        alert('请填写用户名');
      }else if(yhm.val().length>7){
        alert('用户名不能大于七个字');
      }else if(zcsj.val()==''){
        alert('请填写手机号');
      }else if(yzm.val()==''){
        alert('请填写验证码');
      }else if(mi.val()=='' || ma.val()==''){
        alert('密码不能为空');
      }else if(isNaN(mi.val()) || isNaN(ma.val())){
        alert('密码必须为纯数字');
      }else if(mi.val()!=ma.val()){
        alert('两次密码输入不一致');
      }else if(mi.val().length!=6){
        alert('密码必须为6位数字');
      }else if(<?php echo ($id); ?>==0 && select.val()==0){
        alert('请选择项目介绍人');
      }else{
        $.ajax({
          url:"<?php echo U('Login/login_yz');?>",
          type:'post',
          data:{
            yhm:yhm.val(),
            zcsj:zcsj.val(),
            mi:mi.val(),
            ma:ma.val(),
            sel:select.val(),
            idd:<?php echo ($id); ?>,
            yzm:yzm.val()
          },
          dataType:'json',
          success:function(data){
              alert(data.ar);
            if(data.tf==1){
              window.location.href="<?php echo U('index/index');?>";
            }
          },
          error:function(data){
            alert('注册失败');
          }
        });            
      }
    });
</script>

<script type="text/javascript">
$(function  () {
  function ttfxxx(){
    var result;
      $.ajax({
        url:"<?php echo U('Login/set_msg_yzm');?>",
        type:'post',
        async:false,
        data:{
          phone:$('#ppp').val(),
          qr:'qr'
        },
        dataType:'json',
        success:function(data){
          if(data.msg==0){
            alert(data.state);
            result=false;            
          }else{
            alert(data.state);
            result=true;
          }
        },
        error:function(data){
          alert('error');
            result=false;
        }        
      });
      return result;
  }
  //获取短信验证码
  var validCode=true;
  $("#yanzhengma").click (function  () {
    var time=30;
    var code=$(this);
  if(ttfxxx()){
    if (validCode) {
      validCode=false;
      code.addClass("yanzhengma_1");
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

<script type="text/javascript">
$(function  () {
  function ttfsos(){
    var result;
      $.ajax({
        url:"<?php echo U('Login/set_msg_yzm');?>",
        type:'post',
        async:false,
        data:{
          phone:$('#pho').val(),
          qr:'qqq'
        },
        dataType:'json',
        success:function(data){
          if(data.msg==0){
            alert(data.state);
            result=false;
          }else{
            alert(data.state);
            result=true;
          }
        },
        error:function(data){
          alert('error');
            result=false;          
        }        
      });
      return result;
  }
  //获取短信验证码
  var validCode=true;
  $("#yanzheng").click (function  () {
    var time=30;
    var code=$(this);
  if(ttfsos()){
    if (validCode) {
      validCode=false;
      code.addClass("yanzheng_1");
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

</body>
</html>