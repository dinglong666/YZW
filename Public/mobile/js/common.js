var $n_back=$('.back-ioc');
var $alpha=$('.alpha');
var $nav=$('.nav');
var mySwiper = new Swiper ('.swiper-container', {
    direction: 'horizontal',
    loop: true,
    autoplay:3000,
})
var $iphone=$('.iphone');
$iphone.tap(function(){
    $alpha.show();
    $alpha.animate({
        opacity:1
    },200,'ease-in',0);
    $nav.show();
    $nav.animate({
        translate:'0rem,0px'
    },300,'ease-in')
});
$n_back.tap(function(){
    $nav.animate({
        translate:'2.4rem,0px'
    },200,'ease-out',function(){
        $nav.hide();
    });

    $alpha.animate({
        opacity:0
    },300,'ease-in',function(){
        $alpha.hide();
    });

});
