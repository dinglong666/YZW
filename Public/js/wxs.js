$(function() {
	$('.page-2').each(function(){
		$(this).find('.list-1').eq(0).show().siblings('.list-1').hide()
	})
	$('.list-1').each(function() {
		$(this).find('li').eq(5).css('margin-right', '0');
		$(this).find('li').eq(11).css('margin-right', '0');
	})
	$('.title-1 ul a').click(function(){
		var _index=$(this).index();
		$(this).find('li').addClass('active')
		$(this).siblings().find('li').removeClass('active');
		
		$(this).parents('.c').find('.list-1').eq(_index).show().siblings('.list-1').hide()
 
		
	})
	$(".list-2 li:odd").css('margin-right','0');
	$('.list-4 li:odd').css('background','#e3e3e3');
	$('.list-5 li:last-child').css('margin-right','0');
	$('.off').click(function(){
 $('.black').hide();
 $('.dy').hide();

	})
	
	$('.dy-btn').click(function(){
		 $('.black').show();
 $('.dy').show();
	})
	
	$('.containerTop .containerTopLeft li span').click(function(){
		$(this).siblings('dl').slideDown();
		$(this).parent('li').siblings().find('dl').stop(true,false).slideUp();
		$(this).find('img').attr({'src':'/cyrb/Public/Home/images/left-nav-bg-2.png'}).css('top','20px')
		$(this).parent('li').siblings().find('img').attr({'src':'/cyrb/Public/Home/images/left-nav-bg-1.png'}).css('top','15px')
	})
		$('.containerTopRight tr:even').css('background','#f2f2f2');
		
		
		
		$('.ts_tanchu ul li').click(function(){
			$(this).addClass('active').siblings().removeClass('active');
		})
		$('.li a').click(function(){
			$(this).addClass('active').siblings().removeClass('active');
		})
		
})