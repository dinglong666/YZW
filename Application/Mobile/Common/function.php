<?php
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
