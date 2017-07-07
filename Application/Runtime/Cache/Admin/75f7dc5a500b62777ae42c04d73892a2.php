<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
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


<style type="text/css">
    div{
        width:100%;
    }
</style>
<!--上传图片预览-->
 <script>

window.onload=function()

{

    document.getElementById('file').onchange = function(evt) {

    // 浏览器不支持FileReader，则不处理

    if (!window.FileReader) return;

    var files = evt.target.files;

    for (var i = 0, f; f = files[i]; i++) {

        if (!f.type.match('image.*')) {

            continue;

        }

        var reader = new FileReader();

        reader.onload = (function(theFile) {

            return function(e) {

                // img 元素

                document.getElementById('previewImage').src = e.target.result;

            };

        })(f);

        reader.readAsDataURL(f);

        }

    }


}

</script>
<!--上传图片预览-->
</head>

<body>
    <!-- start: Header -->


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
										<a href="<?php echo U('Article/type_list');?>"><i class="fa fa-align-left"></i><span class="text">文章列表</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(13) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
										<a href="<?php echo U('Article/video');?>"><i class="fa fa-outdent"></i><span class="text">精彩视频</span></a>
									</li><?php endif; ?>
								<?php if((dhl_qx(14) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
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
						
						<?php if((dhl_qx(31) == success) || (dhl_qx(32) == success) || (dhl_qx(33) == success) || ($_SESSION['admin_info']['id'] == 1)): ?><li>
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
        <div class="main ">
        
            
            <div class="row">
            
                  
                        <div class="panel-heading">
                            <a href="<?php echo U('Project/projectList_complete');?>"><h2><i class="fa fa-indent red"></i><strong>返回列表</strong></h2></a>
                        </div>
                        <div class="panel-body" style="width:50%;margin-left:20%">
                        <form action="<?php echo U('Project/projectList_complete_add');?>" method="post" class="form-horizontal ">
                            <div style='margin-left:40px;' class="form-horizontal ">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="text-input">阶段一：  </label>
                                    <div class="col-md-3" >
                                        <input style='width:200px;'  type="text" name="one" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="text-input"><img src='/Public/Admin/up.png' />  </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="text-input">阶段二：  </label>
                                    <div class="col-md-3">
                                        <input style='width:200px;'  type="text" name="two" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="text-input"><img src='/Public/Admin/up.png' />  </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="text-input">阶段三：  </label>
                                    <div class="col-md-3">
                                        <input style='width:200px;'  type="text" name="three" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="text-input"><img src='/Public/Admin/up.png' />  </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="text-input">阶段四：  </label>
                                    <div class="col-md-3">
                                        <input style='width:200px;'  type="text" name="four" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="text-input"><img src='/Public/Admin/up.png' />  </label>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="text-input">阶段五：  </label>
                                    <div class="col-md-3">
                                        <input style='width:200px;'  type="text" name="five" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="text-input"><img src='/Public/Admin/up.png' />  </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="text-input">阶段六：  </label>
                                    <div class="col-md-3">
                                        <input style='width:200px;'  type="text" name="six" class="form-control" >
                                    </div>
                                </div>
                                <br>
                                   <button style="width:50%;margin-left:10%" type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i>保存</button>
                            </div>
                        </form>
    
                        </div>

    

                
        
            </div><!--/.row-->

        </div>
        <!-- end: Content -->
        
    
    

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
        <script type="text/javascript">

    //实例化编辑器          
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
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
    <script src="/Public/Admin/assets/plugins/chosen/js/chosen.jquery.min.js"></script>
    <script src="/Public/Admin/assets/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="/Public/Admin/assets/plugins/placeholder/jquery.placeholder.min.js"></script>
    <script src="/Public/Admin/assets/plugins/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="/Public/Admin/assets/plugins/inputlimiter/js/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="/Public/Admin/assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/Public/Admin/assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="/Public/Admin/assets/plugins/moment/moment.min.js"></script>
    <script src="/Public/Admin/assets/plugins/daterangepicker/js/daterangepicker.min.js"></script>
    <script src="/Public/Admin/assets/plugins/hotkeys/jquery.hotkeys.min.js"></script>
    <script src="/Public/Admin/assets/plugins/wysiwyg/bootstrap-wysiwyg.min.js"></script>
    <script src="/Public/Admin/assets/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    
    <!-- theme scripts -->
    <script src="/Public/Admin/assets/js/SmoothScroll.js"></script>
    <script src="/Public/Admin/assets/js/jquery.mmenu.min.js"></script>
    <script src="/Public/Admin/assets/js/core.min.js"></script>
    
    <!-- inline scripts related to this page -->
    <script src="/Public/Admin/assets/js/pages/form-elements.js"></script>
    <script language="javascript" type="text/javascript" src="/Public/admin/timepicker/WdatePicker.js"></script>

    <!-- end: JavaScript-->
    
</body>
</html>