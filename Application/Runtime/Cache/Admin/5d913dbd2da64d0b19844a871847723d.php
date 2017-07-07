<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="/Public/login/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/Public/login/css/default.css">
  <script src='/Public/login/js/jquery.js'></script>
	<script src='/Public/login/js/prefixfree.min.js'></script>
	<link rel="stylesheet" type="text/css" href="/Public/login/css/styles.css">
	<script type="text/javascript">
  function sub(){
     $.post($("#join").attr('action'),$("#join").serialize(),function(data){   
           if(data!="")
           {
              alert(data);
            }
            else
           {
                $("#join").submit();
           }
      },'json')
   }
  </script>
<body>
<div id="logo"> 
  <h1 class="hogo"><i> 鼎龙科技后台管理系统<?php echo ($_SESSION['admin_info']['id']); ?></i></h1>
</div> 
<section class="stark-login">
  <form action="/index.php/Admin/Login/login" id="join" method="post">	
    <div id="fade-box">
      <input type="text" name="username" id="username" placeholder="Username" >
        <input type="password" name="password" placeholder="Password" >
          
          <input type="button" onclick="sub()" value="登录"> 
        </div>
      </form>
      <div class="hexagons">
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <br>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <span>&#x2B22;</span>
          <br>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span> 
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            <span>&#x2B22;</span>
            
            <br>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <span>&#x2B22;</span>
              <br>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
                <span>&#x2B22;</span>
              </div>      
        </section> 
    
        <div id="circle1">
          <div id="inner-cirlce1">
            <h2> </h2>
          </div>
        </div>
    <ul>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
	<header class="htmleaf-header">
		
		
		</header>
</body>
</html>