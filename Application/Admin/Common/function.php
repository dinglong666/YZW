<?php
function StateBackText($state) // 用于后台联盟成员申请列表页 状态样式显示 参数为状态号 1:已通过 3:已禁用
{
	if($state == 1)
	{
		return "<span class='label label-success'>已通过</span>";
	}
	else if($state == 3)
	{
		return "<span class='label label-default'>已禁用</span>";
	}
} 

//通过id获取图片路径
function get_img($id){
	$img=M('img')->where('img_id='.$id)->find();
	return $img['img_url'];
}

//记录管理员用户的行为日志信息
function admin_log($log_info=''){
        $date=array();
        $date['log_ip']=ip2long($_SERVER["REMOTE_ADDR"]);
        $date['admin_id']=session('admin_info')['id'];
        $date['log_time']=time();
        $date['log_info']=$log_info;
        $date['admin_username']=session('admin_info')['username'];
        M('admin_log')->add($date);                 
}

//生成随机账号
function user_sj(){
    $abc='abcdefghijklmnopqrstuvwsyz0123456789';
    $str=$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))].$abc[mt_rand(0,strlen($abc))];
    return $str;
}

//获取账户余额
function user_pr($id){
    $find=M('user_wallet')->where('user_id='.$id)->find();
    if($find==''){
        return 0;
        exit;
    }
    return $find['price'];
}

//获取项目类型
function user_ty($id){
    $find=M('project_type')->where('type_id='.$id)->find();
    return $find['type_name'];
}

//获取介绍人信息
function user_in($id){
    $find=M('users')->where('user_id='.$id)->find();
    if($find==''){
        return '';
        exit;
    }
    return $find['user_name'];
}

//获取介绍人账号
function user_ad($id){
    $find=M('users')->where('user_id='.$id)->find();
    if($find==''){
        return '';
        exit;
    }
    return $find['mobile'];    
}

//获取项目名称
function pro_name($id){
    $find=M('project')->where('project_id='.$id)->find();
    return $find['project_name'];
}

//获取项目状态
function pro_st($id,$time){
    $find=M('project_state')->where('id='.$id)->find();
    $s=count(explode('|',$time))-1;
    $f=explode('|',$find['name']);
    return $f[$s];
}

function useCurl($url, $params, $post = "")
{
    $ch = curl_init();//实例化curl,确认php.ini中curl开启
	//判断是否为post方法访问
    if($post) 
		{
        curl_setopt($ch, CURLOPT_URL, $url);//请求url
        curl_setopt($ch, CURLOPT_POST, true);//确认请求为POST类型
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));//整理POST请求参数
    } 
    //带参数的GET请求
    elseif(is_array($params) && 0 < count($params)) 
    {
        curl_setopt($ch, CURLOPT_URL, $url . "?" . http_build_query($params));//拼接GET请求url
    } 
    //普通GET请求
    else 
    {
        curl_setopt($ch, CURLOPT_URL, $url);
    }


    curl_setopt($ch, CURLOPT_HEADER, false); //如果你想把一个头包含在输出中，设置这个选项为一个非零值
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//设定是否显示头信息
    curl_setopt($ch, CURLOPT_FORBID_REUSE, true);//在完成交互以后强迫断开连接，不能重用。

    $data = curl_exec($ch);//获取的信息

    //请求错误创建错误信息并返回空值
    if (curl_error($ch)) {
        trigger_error(curl_error($ch));
        return null;
    }
    //关闭CURL资源
    curl_close($ch);
    //返回CURL获得的数据
    return $data;
}

//获取左侧导航栏信息
function qx(){
    $output=file_get_contents("Application/Admin/View/default/Include/left.html");
    $ru='/<li>[\s\S]*?<a href="#">[\s\S]*?<\/ul>[\s\S]*?<\/li>/';//正则表达式匹配
    preg_match_all($ru,$output,$arr);
    $ruu='/[\x80-\xff]+/';
    $a=array();
    foreach($arr[0] as $value){
        preg_match_all($ruu,$value,$ar);
        foreach($ar as $r){
        	$a[]=$r;
        }
    }
    return $a;
}

//判断权限是否选定
function tf_qx($ar,$arr){
   $s=explode(',',$arr);
   if(in_array($ar,$s)){
     return 'checked';
   }else{
     return '';
   }
}

//判断当前账号是否有权限
function jurisdiction($role){
    $s=explode(',',reqx2(session('admin_info')['username']));
    return in_array($role,$s);
}

//redis存储权限
function reqx($name,$so){
    $redis = new \Redis();
    $redis->connect('127.0.0.1',6379);
    $redis->set($name,$so);
}

//redis读取权限
function reqx2($name){
    $redis = new \Redis();
    $redis->connect('127.0.0.1',6379);    
    return $redis->get($name);
}

//判断导航栏是否有权限，没有权限隐藏左侧导航栏
function dhl_qx($id){
    $s=explode(',',reqx2(session('admin_info')['username']));
    $tf=in_array($id,$s);
    if($tf){
        return 'success';
    }else{
        return 'error';
    }
}

//判断该管理员删除后是否还在登录
function login_tf(){
    if($_SESSION['admin_info']['id']!=1){
        if(reqx2($_SESSION['admin_info']['username'].'_login')!='1'){
            return 'error';
        }
    }
}

//生成二维码
function qrcode($id=''){
    if($id!=''){
        $u='?id='.$id;
    }else{
        $u='';
    }
    Vendor("phpqrcode.phpqrcode");
    $object=new \QRcode();
    $value="http://www.baidu.com".$u;  
    $errorCorrectionLevel = "H"; // 纠错级别：L、M、Q、H  
    $matrixPointSize = "10"; // 点的大小：1到10  
    ob_clean();//，清除缓冲区  
    $object->png($value,"Public/Admin/images/qrcode".$id.".png", $errorCorrectionLevel, $matrixPointSize);

    return "/Public/Admin/images/qrcode".$id.".png";
    // $logo = 'dinglong.png';//准备好的logo图片 
    // $QR = 'qrcode.png';//已经生成的原始二维码图 
      
    // if ($logo !== FALSE) { 
    //  $QR = imagecreatefromstring(file_get_contents($QR)); 
    //  $logo = imagecreatefromstring(file_get_contents($logo)); 
    //  $QR_width = imagesx($QR);//二维码图片宽度 
    //  $QR_height = imagesy($QR);//二维码图片高度 
    //  $logo_width = imagesx($logo);//logo图片宽度 
    //  $logo_height = imagesy($logo);//logo图片高度 
    //  $logo_qr_width = $QR_width / 5; 
    //  $scale = $logo_width/$logo_qr_width; 
    //  $logo_qr_height = $logo_height/$scale; 
    //  $from_width = ($QR_width - $logo_qr_width) / 2; 
    //  //重新组合图片并调整大小 
    //  imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, 
    //  $logo_qr_height, $logo_width, $logo_height); 
    // } 
    // $name='Public/'.time().'hello.png';
    // //输出图片 
    // imagepng($QR, $name); 
    // return $name;
    // echo '<img src="'.$name.'">';
}