 <?php 
header("Content-type:text/html;charset=utf-8");
function pre($arr)
{
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
	exit();
}
function NewsRead()
{
	$uid 		= $_SESSION['home_user_info']['id'];
	$n 	 		= M("news_state");
	$count      = $n->where("uid = $uid and is_read = 0")->count();
	return $count; 
}
function encryption($str)
{
	return (($str+223706)*23)/6;  //测试加密
}
function decryption($str)
{
	return ($str*6)/23-223706; //测试解密
}
function SMS_ApplySuccess($tel,$InitialPassword)
{
	$sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
 
	$smsConf = array(
	'key'   => '9e255957641355b9a8631a69c70ce480', //您申请的APPKEY
	    'mobile'    => $tel, //接受短信的用户手机号码
	    'tpl_id'    => '23445', //您申请的短信模板ID，根据实际情况修改
	    'tpl_value' =>"#name#=$tel&#code#=$InitialPassword" //您设置的模板变量，根据实际情况修改
	);

	$content = juhecurl($sendUrl,$smsConf,1); //请求发送短信

	if($content){
	    $result = json_decode($content,true);
	    $error_code = $result['error_code'];
	}else{
	    //返回内容异常，以下可根据业务逻辑自行修改
	    echo "请求发送短信失败";
	}
}
function SMS_ModifyPass($tel,$rand)
{
	$rand = rand(100000,999999);
	$sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
 
	$smsConf = array(
	'key'   => '9e255957641355b9a8631a69c70ce480', //您申请的APPKEY
	    'mobile'    => $tel, //接受短信的用户手机号码
	    'tpl_id'    => '22452', //您申请的短信模板ID，根据实际情况修改
	    'tpl_value' =>"#code#=$rand" //您设置的模板变量，根据实际情况修改
	);

	$content = juhecurl($sendUrl,$smsConf,1); //请求发送短信

	if($content){
	    $result = json_decode($content,true);
	    $error_code = $result['error_code'];
	    return $rand;
	}else{
	    //返回内容异常，以下可根据业务逻辑自行修改
	    echo "请求发送短信失败";
	}
}
// function juhecurl($url,$params=false,$ispost=0){
//     $httpInfo = array();
//     $ch = curl_init();
//     curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
//     curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
//     curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
//     curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
//     curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
//     if( $ispost )
//     {
//         curl_setopt( $ch , CURLOPT_POST , true );
//         curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
//         curl_setopt( $ch , CURLOPT_URL , $url );
//     }
//     else
//     {
//         if($params){
//             curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
//         }else{
//             curl_setopt( $ch , CURLOPT_URL , $url);
//         }
//     }
//     $response = curl_exec( $ch );
//     if ($response === FALSE) {
//         //echo "cURL Error: " . curl_error($ch);
//         return false;
//     }
//     $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
//     $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
//     curl_close( $ch );
//     return $response;
// }

function juhecurl($url,$params=false,$ispost=0){
    $httpInfo = array();
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
    curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    if( $ispost )
    {
        curl_setopt( $ch , CURLOPT_POST , true );
        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
        curl_setopt( $ch , CURLOPT_URL , $url );
    }
    else
    {
        if($params){
            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
        }else{
            curl_setopt( $ch , CURLOPT_URL , $url);
        }
    }
    $response = curl_exec( $ch );
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
    curl_close( $ch );
    return $response;
}

function daytime()
{
	return strtotime(date("Y-m-d",time()));
}

//删除压缩前的文件夹
function delDirAndFile($path, $delDir = true) {
    if (is_array($path)) {
        foreach ($path as $subPath)
            delDirAndFile($subPath, $delDir);
    }
    if (is_dir($path)) {
        $handle = opendir($path);
        if ($handle) {
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..")
                    is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
            }
            closedir($handle);
            if ($delDir)
                return rmdir($path);
        }
    } else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return FALSE;
        }
    }
    clearstatcache();
 }
 function downfile($fileurl)
{
     ob_start();
     $ext=substr(strrchr($fileurl, '.'), 1); 
     $filename=$fileurl;
     $date=date("Ymd-H:i:m");
     header( "Content-type:  application/octet-stream "); 
     header( "Accept-Ranges:  bytes "); 
     header( "Content-Disposition:  attachment;  filename= {$date}.".$ext); 
     $size=readfile($filename); 
     header( "Accept-Length: " .$size);
}
function dwm($type)
{
	if($type=="d")
	{
		$data[0]=strtotime(date("Y")."-".date("m")."-".date("d")." 00:00:00");
        $data[1]=strtotime(date("Y")."-".date("m")."-".date("d")." 23:59:59");
	}
	if($type=="w")
	{
		$week=empty(date("w"))?7:date("w");
        $weekfirst=date("d")-$week+1;
        $weeklast=date("d")-$week+7;
        $data[0]=strtotime(date("Y")."-".date("m")."-".$weekfirst." 00:00:00");
       	$data[1]=strtotime(date("Y")."-".date("m")."-".$weeklast." 23:59:59");
	}
	if($type=="m")
	{
		$data[0]=strtotime(date("Y")."-".date("m")."-1"." 00:00:00");
        $data[1]=strtotime(date("Y")."-".date("m")."-".date("t")." 23:59:59");
	}
	return $data;
}
function sr($phone)
{
    substr_replace($phone,"****",3,4);
}


//注册生成二维码
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

//修改头像生成二维码
function hqrcode($id='',$head=''){
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

    $logo = $head;//准备好的logo图片 
    $QR = "Public/Admin/images/qrcode".$id.".png";//已经生成的原始二维码图 
      // return $QR;die;
    if ($logo !== FALSE) { 
     $QR = imagecreatefromstring(file_get_contents($QR)); 
     $logo = imagecreatefromstring(file_get_contents($logo)); 
     $QR_width = imagesx($QR);//二维码图片宽度 
     $QR_height = imagesy($QR);//二维码图片高度 
     $logo_width = imagesx($logo);//logo图片宽度 
     $logo_height = imagesy($logo);//logo图片高度 
     $logo_qr_width = $QR_width / 5; 
     $scale = $logo_width/$logo_qr_width; 
     $logo_qr_height = $logo_height/$scale; 
     $from_width = ($QR_width - $logo_qr_width) / 2; 
     //重新组合图片并调整大小 
     imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, 
     $logo_qr_height, $logo_width, $logo_height); 
    } 
    $name='Public/Home/qrcode/qrcode'.time().'.png';
    //输出图片 
    imagepng($QR, $name); 
    return '/'.$name;
    echo '<img src="'.$name.'">';
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

//获取账户余额
function user_pr($id){
    $find=M('user_wallet')->where('user_id='.$id)->order('timer desc')->find();
    if($find==''){
        return 0;
        exit;
    }
    return $find['price'];
}

//获取会员头像
function hed(){
    $find=M('users')->where('user_id='.$_SESSION['user_info']['id'])->find();
    return $find['head_pic'];
}