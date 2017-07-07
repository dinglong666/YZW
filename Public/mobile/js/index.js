var tit2=$('.type .title2');
var tit3=$('.money .title2');
var cartype=$('.cartype');
var carmoney=$('.carmoney');
tit2.on('click',function(){
    cartype.slideToggle();
    tit2.toggleClass('title2').toggleClass('title3');
});
tit3.on('click',function(){
    carmoney.slideToggle();
    tit3.toggleClass('title2').toggleClass('title3');
});