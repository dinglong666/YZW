<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>鼎龙后台管理系统</title>		
		
		<!-- Import google fonts - Heading first/ text second -->
<!--         <link rel='stylesheet' type='text/css' href='http://fonts.useso.com/css?family=Open+Sans:400,700|Droid+Sans:400,700' />
 -->        <!--[if lt IE 9]>
<link href="http://fonts.useso.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
<![endif]-->

		<!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="/Public/Admin/assets/ico/11.ico" type="image/x-icon" />
		<script type="text/javascript" src="/Public/layer/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="/Public/layer/layer.js"></script>
		<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
 		<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"> </script>
 		<script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
	    <!-- Css files -->
	    <link href="/Public/Admin/assets/css/bootstrap.min.css" rel="stylesheet">		
		<link href="/Public/Admin/assets/css/jquery.mmenu.css" rel="stylesheet">		
		<link href="/Public/Admin/assets/css/font-awesome.min.css" rel="stylesheet">
		<link href="/Public/Admin/assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
	    <link href="/Public/Admin/assets/css/style.min.css" rel="stylesheet">
		<link href="/Public/Admin/assets/css/add-ons.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="http://www.hot80.com/demo/css/wxs.page.css">
	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->

</head>

<body>
	<!-- start: Header -->
		<div class="navbar" role="navigation">
	
		<div class="container-fluid">		
			
			
			

	
			
	        <ul class="nav navbar-nav navbar-right">
			
				<li><a href="<?php echo U('Admin/tlog');?>"><i class="fa fa-power-off"></i></a></li>
			</ul>
			
		</div>
		
	</div>

	<!-- end: Header -->
	
	<div class="container-fluid content">

		<div class="row">

			<!-- start: Main Menu -->
			<div class="sidebar ">
								
				<div class="sidebar-collapse">
					<div class="sidebar-header t-center">
                        <span><i class="fa fa-space-shuttle fa-3x blue">鼎龙后台</i></span>
                    </div>
                    <div style="padding-bottom: 20px">
                    	<span style="padding-right: 10px;margin-left: 15px" align="center">您好，欢迎您 :</span>
                    	<span style="padding-right: 10px;color: red;"><?php echo ($_SESSION['admin_info']['username']); ?></span>
                    	<span>管理员</span>
                    </div>
                    <div>
                    	<span style="margin-left: 30px;padding-right: 20px"><a href="<?php echo U('Home/Index/index');?>">进入主页</a></span>|
                    	<span style="margin-left: 20px;"><a href="<?php echo U('Login/tlog');?>">退出系统</a></span>
                    </div>							
					<div class="sidebar-menu">						
						<ul class="nav nav-sidebar">

						<?php if($_SESSION['admin_info']['id'] == 1): ?><li><a href="<?php echo U('Index/index');?>"><i class="fa fa-table"></i><span class="text">网站设置</span></a></li><?php endif; ?>

							<li>
								<a href="#"><i class="fa fa-key"></i><span class="text">权限管理</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
								<?php if($_SESSION['admin_info']['id'] == 1): ?><li>
										<a href="<?php echo U('admin/adminlist');?>"><i class="fa fa-align-left"></i><span class="text">管理员列表</span></a>
									</li>
									<li>
										<a href="<?php echo U('admin/adminPower');?>"><i class="fa fa-align-left"></i><span class="text">权限分类</span></a>
									</li><?php endif; ?>
									<li>
										<a href="<?php echo U('admin/adminLog');?>"><i class="fa fa-columns"></i><span class="text">管理员日志</span></a>
									</li>
								</ul>
							</li>

						<?php if((dhl_qx(11) == success) || (dhl_qx(12) == success) || (dhl_qx(13) == success) || (dhl_qx(14) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
								<a href="#"><i class="fa fa-briefcase"></i><span class="text">内容管理</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
								<?php if((dhl_qx(11) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Article/shouye');?>"><i class="fa fa-align-left"></i><span class="text">首页图片</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(12) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Article/type_list');?>"><i class="fa fa-align-left"></i><span class="text">信息列表</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(13) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Article/article_list');?>"><i class="fa fa-align-left"></i><span class="text">文章列表</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(14) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Article/article_type');?>"><i class="fa fa-align-left"></i><span class="text">文章分类</span></a>
									</li><?php endif; ?>

								<?php if((dhl_qx(15) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Article/video');?>"><i class="fa fa-outdent"></i><span class="text">精彩视频</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(16) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Article/cooperation_list');?>"><i class="fa fa-outdent"></i><span class="text">合作企业</span></a>
									</li><?php endif; ?>
								</ul>
							</li><?php endif; ?>

						<?php if((dhl_qx(21) == success) || (dhl_qx(22) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
								<a href="#"><i class="fa fa-columns"></i><span class="text">广告管理</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
								<?php if((dhl_qx(21) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('advert/advertList');?>"><i class="fa fa-columns"></i><span class="text">广告列表</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(22) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('advert/advertPosition');?>"><i class="fa fa-columns"></i><span class="text">广告位置</span></a>
									</li><?php endif; ?>
								</ul>
							</li><?php endif; ?>
						
						<?php if((dhl_qx(31) == success) || (dhl_qx(32) == success) || (dhl_qx(33) == success) || (dhl_qx(34) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
								<a href="#"><i class="fa fa-columns"></i><span class="text">项目管理</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
								<?php if((dhl_qx(31) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Project/projectList');?>"><i class="fa fa-columns"></i><span class="text">项目列表</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(32) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Project/projectList_type');?>"><i class="fa fa-columns"></i><span class="text">项目分类列表</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(33) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Project/projectList_complete');?>"><i class="fa fa-columns"></i><span class="text">项目状态分类列表</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(34) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Project/projectList_address');?>"><i class="fa fa-columns"></i><span class="text">项目所在地</span></a>
									</li><?php endif; ?>
								</ul>
							</li><?php endif; ?>

						<?php if((dhl_qx(41) == success) || (dhl_qx(42) == success) || (dhl_qx(43) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
								<a href="#"><i class="fa fa-columns"></i><span class="text">会员管理</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
								<?php if((dhl_qx(41) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Users/usersList');?>"><i class="fa fa-columns"></i><span class="text">会员列表</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(42) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Users/users_random');?>"><i class="fa fa-columns"></i><span class="text">生成公司会员</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(43) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Users/users_staff');?>"><i class="fa fa-columns"></i><span class="text">公司员工列表</span></a>
									</li><?php endif; ?>
								</ul>
							</li><?php endif; ?>

						<?php if((dhl_qx(51) == success) || (dhl_qx(52) == success) || (dhl_qx(53) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
								<a href="#"><i class="fa fa-columns"></i><span class="text">消息管理</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
								<?php if((dhl_qx(51) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('News/newsList');?>"><i class="fa fa-columns"></i><span class="text">站内消息</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(52) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('News/changeList');?>"><i class="fa fa-columns"></i><span class="text">变更消息</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(53) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('News/commissionList');?>"><i class="fa fa-columns"></i><span class="text">佣金发放消息</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(54) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('News/homepage');?>"><i class="fa fa-columns"></i><span class="text">首页最新消息</span></a>
									</li><?php endif; ?>
								</ul>
							</li><?php endif; ?>

						</ul>
					</div>					
				</div>
				<div class="sidebar-footer">					
					
					<div class="sidebar-brand">
						DingLong
					</div>
					
					<ul class="sidebar-terms">
						<li><a href="<?php echo U('GuanFang/guanyu');?>">关于我们</a></li>
						<li><a href="<?php echo U('Admin/adminlist');?>">管理员</a></li>
						<li><a href="#">使用帮助</a></li>
						<li><a href="#">About</a></li>
					</ul>
					
<!-- 					<div class="copyright text-center">
						<small>Proton <i class="fa fa-coffee"></i> from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></small>
					</div>		 -->			
				</div>	
				
			</div>

			<!-- end: Main Menu -->

			<!-- start: Content -->

			<div class="main sidebar-minified">
				<div class="row">		
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><i class="fa fa-table red"></i><span class="break"></span><strong>项目管理</strong></h2>

<!-- 							<div class="panel-actions">  //刷新 收回 关闭按钮
								<a href="table.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
								<a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="table.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div> -->

							</div>
						<div class="panel-body">
						<form action="<?php echo U('project/projectList');?>" method='get'>
							<input  type='text' placeholder="请输入项目名称" name="pro" value='<?php echo ($name); ?>' />
						<select name='typ' style='width:150px;height:27px;'>
								<option value="0">--项目分类--</option>
							<?php if(is_array($tp)): $i = 0; $__LIST__ = $tp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><option <?php if($type == $t['type_id']): ?>selected<?php endif; ?> value="<?php echo ($t['type_id']); ?>"><?php echo ($t['type_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>	
						<select name='type' style='width:150px;height:27px;'>
								<option value="">--项目状态--</option>
							<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><option <?php if($ttype == $key and $ttype != null): ?>selected<?php endif; ?> value="<?php echo ($key); ?>"><?php echo ($a); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>	
							<button type='submit'>搜索</button>
						</form>
							<table  class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th>编号</th>
										<th>项目名称</th>
										<th>项目分类</th>
										<th>项目状态</th>
										<th>预计投资额</th>
										<th>发布时间</th>
										<th>操作</th>
									</tr>
								</thead>   
								<tbody>		
									<?php if(is_array($sel)): $i = 0; $__LIST__ = $sel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
											<td><?php echo ($v['project_id']); ?></td>
											<td><?php echo ($v['project_name']); ?></td>
											<td><?php echo ($tp[$v['type_id']]['type_name']); ?></td>
											<td><?php echo (pro_st($v['project_id'],$v['project_state'],$v['project_stime'])); ?></td>
											<td><?php echo ($v['project_estimate']); ?></td>
											<td><?php echo date('Y-d-m',$v['project_time']);?></td>
											<td>
												<a href="<?php echo U('Project/project_detail?id='.$v['project_id']);?>">详细信息</a> &nbsp;
												|&nbsp;&nbsp;
												<a href="<?php echo U('Project/complete_customized?id='.$v['project_id']);?>">定制客服</a> &nbsp;
												<?php if(count(explode('|',$v['project_stime'])) == 6): ?>|&nbsp;&nbsp;
													<?php if($v['distribute'] == 1): ?>已派发
													<?php else: ?>
													<a onclick="return confirm('确认派发?')" href="<?php echo U('Project/yongjin?id='.$v['project_id']);?>">派发佣金</a><?php endif; endif; ?>
											</td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>  
							<div class="w-page w-left w-m-3 ">
					            <?php echo ($page); ?>
					        </div>  
						</div>
					</div>
				</div><!--/col-->

			</div><!--/row-->

		</div>
		<!-- end: Content -->
		<br><br><br>		

		
		

		
	</div><!--/container-->

	
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<p>Here settings can be configured...</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="clearfix"></div>
	

	<!-- start: JavaScript-->
	<!--[if !IE]>-->

	<script src="/Public/Admin/assets/js/jquery-2.1.1.min.js"></script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script src="/Public/Admin/assets/js/jquery-1.11.1.min.js"></script>
	
		<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/Admin/assets/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

	<!--[if IE]>
	
		<script type="text/javascript">
	 	window.jQuery || document.write("<script src='/Public/Admin/assets/js/jquery-1.11.1.min.js'>"+"<"+"/script>");
		</script>
		
		<![endif]-->
		<script src="/Public/Admin/assets/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="/Public/Admin/assets/js/bootstrap.min.js"></script>	


		<!-- page scripts -->
		<script src="/Public/Admin/assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js"></script>
		<script src="/Public/Admin/assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="/Public/Admin/assets/plugins/datatables/js/dataTables.bootstrap.min.js"></script>

		<!-- theme scripts -->
		<script src="/Public/Admin/assets/js/SmoothScroll.js"></script>
		<script src="/Public/Admin/assets/js/jquery.mmenu.min.js"></script>
		<script src="/Public/Admin/assets/js/core.min.js"></script>

		<!-- inline scripts related to this page -->
		<!-- <script src="/Public/Admin/assets/js/pages/table.js"></script> -->

		<!-- end: JavaScript-->

	</body>
	</html>