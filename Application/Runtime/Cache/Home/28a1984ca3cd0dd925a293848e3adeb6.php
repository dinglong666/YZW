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
<div class="wodexiangmu-content">

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
     	<div class="wodexiangmu-header">
        	<span class="header1"><i class="fa fa-tasks"></i>我的项目</span>
        </div>
        <ul class="nav nav-tabs">
        	<li class="wodexiangmu-base active">
            	<a href="#xiangmu" data-toggle="tab">我的项目</a>
            </li>
            <li class="wodexiangmu-edit">
            	<a href="#write" id='gb' data-toggle="tab">发布项目</a>
            </li>
            <div class="clearfix"></div>
        </ul>
        <div class="tab-content">
        
        	<div class="tab-pane fade in active" id="xiangmu">
              <form class="form-inline">
               <div class="input-group col-sm-4 col-md-4">
	            <input id="nr" type="text" class="form-control" placeholder="请输入项目名称">
	            <span class="input-group-addon" style="background-color: #0087d2;"><button id="ss1" type="button" style="border: 1px solid #0087d2; font-size: 14px; background-color: #0087d2; color: #ffffff;">搜索</button></span>
               </div>
               
               <div class="form-group" id="form-group">
               	<label class="control-label">发布时间：</label>
                <div class="input-group col-sm-8 col-md-8">
                  <input id="sj" class="form-control dpd1" type="text">
                  <span class="input-group-addon" style="background-color: #0087d2;"><button id='ss2' type="button" style="border: 1px solid #0087d2; font-size: 14px; background-color: #0087d2; color: #ffffff;">搜索</button></span>
                </div>
               </div>
              </form>
              
              <ul class="nav nav-tabs">
              	<li class="title">项目状态：</li>
              	<li <?php if(($_GET['i'] != 1) and ($_GET['i'] != 2) and ($_GET['i'] != 3) and ($_GET['i'] != 4) and ($_GET['i'] != 5) and ($_GET['i'] != 6)): ?>class="active"<?php endif; ?> >
                	<a href="" id="ff0" data-toggle="tab">全部</a>
                </li>
              	<li <?php if($_GET['i'] == 1): ?>class="active"<?php endif; ?>  >
                	<a href="" id="ff1"  data-toggle="tab"><?php echo ($sta[1]); ?></a>
                </li>
              	<li <?php if($_GET['i'] == 2): ?>class="active"<?php endif; ?>  >
                	<a href="" id="ff2"  data-toggle="tab"><?php echo ($sta[2]); ?></a>
                </li>
              	<li <?php if($_GET['i'] == 3): ?>class="active"<?php endif; ?>  >
                	<a href="" id="ff3" data-toggle="tab"><?php echo ($sta[3]); ?></a>
                </li>
              	<li <?php if($_GET['i'] == 4): ?>class="active"<?php endif; ?>  >
                	<a href="" id="ff4"  data-toggle="tab"><?php echo ($sta[4]); ?></a>
                </li>
                <li <?php if($_GET['i'] == 5): ?>class="active"<?php endif; ?>  >
                  <a href="" id="ff5"  data-toggle="tab"><?php echo ($sta[5]); ?></a>
                </li>
                <li <?php if($_GET['i'] == 6): ?>class="active"<?php endif; ?>  >
                  <a href="" id="ff6"  data-toggle="tab"><?php echo ($sta[6]); ?></a>
                </li>
              </ul>
              <form id='tj' style="display:none;" action="<?php echo U('User/project');?>" >
                <input type="hidden" name="i" value="" id="fz" />
                <input type="hidden" name="xsx" value="" id="xsx" />
                <input type="hidden" name="sxs" value="" id="sxs" />
              </form>
              <div class="tab-content">
              	<!--这是全部项目-->
                <div class="tab-pane fade in active" id="all">
                	<table class="table table-hover">
                    	<thead>
                        	<tr>
                            	<th>类型</th>
                                <th>项目名称</th>
                                <th>预计投资金额</th>
                                <th>预计佣金</th>
                                <th>发布时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                            	<td><?php echo ($sta[$p['project_snum']]==''?'未派发':$sta[$p['project_snum']]); ?></td>
                                <td><a href="<?php echo U('User/shenhe?id='.$p['project_id']);?>"><?php echo ($p['project_name']); ?></a></td>
                                <td><?php echo ($p['project_estimate']); ?></td>
                                <td><?php echo C('profit3')/100*$p['project_estimate'];?></td>
                                <td><?php echo date('Y-m-d',$p['project_time']);?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                 <!--分页-->
              <div class="w-page w-left w-m-3 ">
                      <?php echo ($page); ?>
              </div>  
                  <!--分页-->
				 </div>
                 
              	<!--这是待审核项目-->
                <div class="tab-pane fade" id="daishen">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>类型</th>
                                <th>项目名称</th>
                                <th>预计投资金额</th>
                                <th>预计佣金</th>
                                <th>发布时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                              <td><?php echo ($sta[$p['project_snum']]==''?'未派发':$sta[$p['project_snum']]); ?></td>
                                <td><a href="<?php echo U('User/shenhe?id='.$p['project_id']);?>"><?php echo ($p['project_name']); ?></a></td>
                                <td><?php echo ($p['project_estimate']); ?></td>
                                <td></td>
                                <td><?php echo date('Y-m-d',$p['project_time']);?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                 <!--分页-->
              <div class="w-page w-left w-m-3 ">
                      <?php echo ($page); ?>
              </div>  
                  <!--分页-->
				 </div>
                 
              	<!--这是未成交项目-->
                <div class="tab-pane fade" id="weicheng">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>类型</th>
                                <th>项目名称</th>
                                <th>预计投资金额</th>
                                <th>预计佣金</th>
                                <th>发布时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                              <td><?php echo ($sta[$p['project_snum']]==''?'未派发':$sta[$p['project_snum']]); ?></td>
                                <td><a href="<?php echo U('User/shenhe?id='.$p['project_id']);?>"><?php echo ($p['project_name']); ?></a></td>
                                <td><?php echo ($p['project_estimate']); ?></td>
                                <td></td>
                                <td><?php echo date('Y-m-d',$p['project_time']);?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                 <!--分页-->
              <div class="w-page w-left w-m-3 ">
                      <?php echo ($page); ?>
              </div>  
                  <!--分页-->
				 </div>
                
              	<!--这是未成交项目-->
                <div class="tab-pane fade" id="yishen">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>类型</th>
                                <th>项目名称</th>
                                <th>预计投资金额</th>
                                <th>预计佣金</th>
                                <th>发布时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                              <td><?php echo ($sta[$p['project_snum']]==''?'未派发':$sta[$p['project_snum']]); ?></td>
                                <td><a href="<?php echo U('User/shenhe?id='.$p['project_id']);?>"><?php echo ($p['project_name']); ?></a></td>
                                <td><?php echo ($p['project_estimate']); ?></td>
                                <td></td>
                                <td><?php echo date('Y-m-d',$p['project_time']);?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                 <!--分页-->
              <div class="w-page w-left w-m-3 ">
                      <?php echo ($page); ?>
              </div>  
                  <!--分页-->
				 </div>
                 
              	<!--这是已成交项目-->
                <div class="tab-pane fade" id="yicheng">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>类型</th>
                                <th>项目名称</th>
                                <th>预计投资金额</th>
                                <th>预计佣金</th>
                                <th>发布时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                              <td><?php echo ($sta[$p['project_snum']]==''?'未派发':$sta[$p['project_snum']]); ?></td>
                                <td><a href="<?php echo U('User/shenhe?id='.$p['project_id']);?>"><?php echo ($p['project_name']); ?></a></td>
                                <td><?php echo ($p['project_estimate']); ?></td>
                                <td></td>
                                <td><?php echo date('Y-m-d',$p['project_time']);?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                 <!--分页-->
              <div class="w-page w-left w-m-3 ">
                      <?php echo ($page); ?>
              </div>  
                  <!--分页-->
				 </div>

                <!--这是已成交项目-->
                <div class="tab-pane fade" id="yishi">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>类型</th>
                                <th>项目名称</th>
                                <th>预计投资金额</th>
                                <th>预计佣金</th>
                                <th>发布时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                              <td><?php echo ($sta[$p['project_snum']]==''?'未派发':$sta[$p['project_snum']]); ?></td>
                                <td><a href="<?php echo U('User/shenhe?id='.$p['project_id']);?>"><?php echo ($p['project_name']); ?></a></td>
                                <td><?php echo ($p['project_estimate']); ?></td>
                                <td></td>
                                <td><?php echo date('Y-m-d',$p['project_time']);?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                 <!--分页-->
              <div class="w-page w-left w-m-3 ">
                      <?php echo ($page); ?>
              </div>  
                  <!--分页-->
         </div>

                <!--这是已成交项目-->
                <div class="tab-pane fade" id="yijie">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>类型</th>
                                <th>项目名称</th>
                                <th>预计投资金额</th>
                                <th>预计佣金</th>
                                <th>发布时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                              <td><?php echo ($sta[$p['project_snum']]==''?'未派发':$sta[$p['project_snum']]); ?></td>
                                <td><a href="<?php echo U('User/shenhe?id='.$p['project_id']);?>"><?php echo ($p['project_name']); ?></a></td>
                                <td><?php echo ($p['project_estimate']); ?></td>
                                <td></td>
                                <td><?php echo date('Y-m-d',$p['project_time']);?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                 <!--分页-->
              <div class="w-page w-left w-m-3 ">
                      <?php echo ($page); ?>
              </div>  
                  <!--分页-->
         </div>




			</div>
		</div>
            
            <div class="tab-pane fade" id="write"> 
            	<div class="write-left">
                	<div class="left">
                    	<p><span>*</span>项目分类：</p>
                    </div>
                	<div class="left">
                    	<p><span>*</span>项目名称：</p>
                    </div>
                	<div class="left">
                    	<p><span>*</span>项目所在地：</p>
                    </div>
                	<div class="left">
                    	<p><span>*</span>预计投资额：</p>
                    </div>
                	<div class="left">
                    	<p><span>*</span>项目信息介绍：</p>
                    </div>
                </div>

                <div class="write-right">
                	<ul class="nav nav-tabs">
                  <?php if(is_array($fl)): $k = 0; $__LIST__ = $fl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($k % 2 );++$k;?><li <?php if($k == 1): ?>class="active"<?php endif; ?> ><a href="#fenlei<?php echo ($k); ?>" data-toggle="tab" onclick="gb(<?php echo ($k); ?>,<?php echo ($f['type_id']); ?>)"><?php echo ($f['type_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        <span style="display:none" id='xx' ><?php echo ($fl[0]['type_id']); ?></span>
<!--                         <li><a href="#fenlei2" data-toggle="tab">造价咨询</a></li>
                        <li><a href="#fenlei3" data-toggle="tab">其他</a></li> -->
                    </ul>
                    <div class="tab-content">
                  <?php if(is_array($fl)): $k = 0; $__LIST__ = $fl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($k % 2 );++$k;?><div class="tab-pane fade in active" id="fenlei<?php echo ($k); ?>">
                      <?php if($k == 1): ?><p><?php echo ($f['type_desc']); ?></p>
                      <?php else: ?>
                      <p style="display: none;" id="dis<?php echo ($k); ?>"><?php echo ($f['type_desc']); ?></p><?php endif; ?>
                      </div><?php endforeach; endif; else: echo "" ;endif; ?>
<!--                       <div class="tab-pane fade" id="fenlei2">
                    	<p>是指面向社会接受委托、承担建设项目的全过程、动态的造价管理。</p>
                      </div>
                      <div class="tab-pane fade" id="fenlei3">
                    	<p>其他更多的项目信息。</p>
                      </div> -->
                    </div>
                  <form  method="post" role="form" class="form-horizontal">
                      <div class="form-group ming">
                    	<input type="text" id='pname' class="form-control" placeholder="请输入项目名称">
                      </div>
                      <div class="form-group dizhi">
                      	<select id="pad" class="form-control">
                        	<option value="0" >--请选择--</option>
                          <?php if(is_array($pad)): $i = 0; $__LIST__ = $pad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><option value="<?php echo ($p['id']); ?>" ><?php echo ($p['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                      	<input id='padd' type="text" class="form-control" placeholder="请输入详细地址">
                      </div>
                      <div class="form-group jine">
                      	<input id="yprice" type="text" class="form-control" placeholder="请输入预计投资额">
                      </div>
                      <div class="form-group">
                      	<textarea id="pdesc" rows="10" cols="59" placeholder="请输入项目详细信息"></textarea>
                      </div>
                </div>
                <div class="clearfix"></div>
                <center><a><button id="fb" type="button" class="btn btn-primary">发布</button></center>   
                </form> 
            </div>
            
        </div>                     
     </div>
                
  </div>
  <script>
  $('#ss1').click(function(){
      $('#xsx').val($('#nr').val());
      $('#fz').val(<?php echo ($_GET['i']); ?>);
      $('#tj').submit();
      return false;
  });
  $('#ss2').click(function(){
      $('#sxs').val($('#sj').val());
      $('#fz').val(<?php echo ($_GET['i']); ?>);
      $('#tj').submit();
      return false;
  });
  $('#ff1').click(function()
    {
      $('#fz').val('1');
      $('#tj').submit();
      return false;
    });
  $('#ff2').click(function()
    {
      $('#fz').val('2');
      $('#tj').submit();
      return false;
    });
  $('#ff3').click(function()
    {
      $('#fz').val('3');
      $('#tj').submit();
      return false;
    });
  $('#ff4').click(function()
    {
      $('#fz').val('4');
      $('#tj').submit();
      return false;
    });
  $('#ff5').click(function()
    {
      $('#fz').val('5');
      $('#tj').submit();
      return false;
    });
  $('#ff6').click(function()
    {
      $('#fz').val('6');
      $('#tj').submit();
      return false;
    });
  $('#ff0').click(function()
    {
      $('#fz').val('0');
      $('#tj').submit();
      return false;
    });
function gb(id,f){
  $('#dis'+id).show();
  $('#xx').text(f);
}
  $('#fb').click(function()
    {
      var pname=$('#pname'),
          pad=$('#pad'),
          padd=$('#padd'),
          yprice=$('#yprice'),
          pdesc=$('#pdesc'),
          pt=$('#xx');
      if(pt.text()==''){
        alert('请选择项目分类');
      }else if(pname.val()==''){
        alert('项目名称不能为空');
      }else if(pad.val()==0){
        alert('请选择项目所在地');
      }else if(padd.val()==''){
        alert('请填写项目详细地址');
      }else if(yprice.val()==''){
        alert('请填写项目预计投资额');
      }else if(pdesc.val()==''){
        alert('请填写项目详细信息');
      }else{
        $.ajax({
            url:"<?php echo U('User/release');?>",
            type:'post',
            data:{
              pname:pname.val(),
              pad:pad.val(),
              padd:padd.val(),
              yprice:yprice.val(),
              pdesc:pdesc.val(),
              pt:pt.text()
            },
            dataType:'json',
            success:function(data){
              if(data.msg==1){
                alert(data.n);
                window.location.href="<?php echo U('User/project');?>";
              }else{
                alert(data.n);
              }
            },
            error:function(data){
              alert('error');
            }
        });
      }
    });
  </script>
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