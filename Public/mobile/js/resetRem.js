function resetRem(){
    var HTML=document.getElementsByTagName('html')[0];
    var deviceWidth=document.documentElement.clientWidth;
    var scale=deviceWidth/640;
    HTML.style.fontSize=100*scale+'px';
}
resetRem();
window.onresize=function(){
    resetRem();
}
