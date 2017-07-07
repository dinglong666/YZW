var name_s=$('#name_s');
var email_s=$('#email_s');
var phone_s=$('#phone_s')
var info_s=$('#info_s');
var hint_s=$('.hint_s');
var reset_s=$('#reset_s');
var sub_s=$('#sub_s');
var hint1_s=$('.item2_s .hint_s');
var hint2_s=$('.item3_s .hint_s');
var hint3_s=$('.item4_s .hint_s');
var submit_s=false;
name_s.on('blur', function () {
   var t=/[\u4E00-\u9FA5]{2,5}/;
    if(name_s.val()==''){
        hint_s.eq(1).addClass('active_s').siblings().removeClass('active_s');
        submit_s=false;
        return false;
    }else{
        hint_s.eq(1).removeClass('active_s');
        submit_s=true;
    }
    if(t.test(name_s.val())){
        hint_s.eq(0).removeClass('active_s');
        submit_s=true;
    }else{
        hint_s.eq(0).addClass('active_s');
        submit_s=false;
    }
});
email_s.on('blur',function(){
    var t=/^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
    if(email_s.val()==''){
        hint1_s.eq(1).addClass('active_s').siblings().removeClass('active_s');
        submit_s=false;
        return false;
    }else{
        hint1_s.eq(1).removeClass('active_s');
        submit_s=true;
    }
    if(t.test(email_s.val())){
        hint1_s.eq(0).removeClass('active_s');
        submit_s=true;
    }else{
        hint1_s.eq(0).addClass('active_s');
        submit_s=false;
    }
});
phone_s.on('blur',function(){
    var t=/^1(3|4|5|7|8)\d{9}$/;
    if(phone_s.val()==''){
        hint2_s.eq(1).addClass('active_s').siblings().removeClass('active_s');
        submit_s=false;
        return false;
    }else{
        hint2_s.eq(1).removeClass('active_s');
        submit_s=true;
    }
    if(t.test(phone_s.val())){
        hint2_s.eq(0).removeClass('active_s');
        submit_s=true;
    }else{
        hint2_s.eq(0).addClass('active_s');
        submit_s=false;
    }
});
info_s.on('blur',function(){
    if(info_s.val()==''){
        hint3_s.addClass('active_s');
        submit_s=false;
    }else{
        hint3_s.removeClass('active_s');
        submit_s=true;
    }

});
reset_s.on('click',function(){
    var hints_s=$('.item_s .hint_s');
    hints_s.removeClass('active_s');
    name_s.val('');
    email_s.val('');
    phone_s.val('');
    info_s.val('');
});
// sub_s.on('click',function(e){
//     if(submit_s){
//         var message_s={
//             name:name_s.val(),
//             email:email_s.val(),
//             phone:phone_s.val(),
//             info:info_s.val(),
//         }
//         console.log(message_s);
//     }else{
//         e.preventDefault();
//     }
// });





