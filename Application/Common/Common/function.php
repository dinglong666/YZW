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