<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html>
<!-- saved from url=(0062)http://www.17sucai.com/preview/586222/2016-07-23/404/demo.html -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/error/error_all.css">
</head>
<body class="error-404">
<div id="doc_main">
	
	<section class="bd clearfix">
		<div class="module-error">
			<div class="error-main clearfix">
				<div class="label"></div>
				<div class="info">
					
					<h3 class="title">啊哦，<?php if(isset($message)) { echo($message);}else{echo($error);}?></h3>
					<div class="reason">
						<p>页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b></p>
						
					</div>
				
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1500);
})();
</script>


<div style="position: static; width: 0px; height: 0px; border: none; padding: 0px; margin: 0px;"><div id="trans-tooltip"><div id="tip-left-top" style="background: url(chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-top.png);"></div><div id="tip-top" style="background: url(chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-top.png) repeat-x;"></div><div id="tip-right-top" style="background: url(chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-top.png);"></div><div id="tip-right" style="background: url(chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right.png) repeat-y;"></div><div id="tip-right-bottom" style="background: url(chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-right-bottom.png);"></div><div id="tip-bottom" style="background: url(chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-bottom.png) repeat-x;"></div><div id="tip-left-bottom" style="background: url(chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left-bottom.png);"></div><div id="tip-left" style="background: url(chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-left.png);"></div><div id="trans-content"></div></div><div id="tip-arrow-bottom" style="background: url(chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-bottom.png);"></div><div id="tip-arrow-top" style="background: url(chrome-extension://ikkbfngojljohpekonpldkamedehakni/imgs/map/tip-arrow-top.png);"></div></div></body></html>
