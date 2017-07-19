<?
function getImgSrcFromStr($str){
  preg_match_all('/<img[^>]*src\s*=\s*([\'"]?)([^\'" >]*)\1/isu', $str, $src);
  return $src[2];
}

function username($id)
{
	$row=M("home_user")->field("username")->find($id);
	return $row['username'];
}
function head_img($id)
{
	$row=M("home_user")->field("head_img")->find($id);
	return $row['head_img'];
}
function strlength($str,$num,$s=0)
{
    /*
        $str别处理字符串
        $num保留多少位
        $s 开始位置
    */
   $strlen = mb_strlen($str,'utf8');
   if($strlen>$num)
   {
        $str= mb_substr($str,$s,$num,"utf-8")."...";
   }
   return $str;
}


