<?php 
namespace Home\Model;

use Think\Model;
use Think\Page;

/**
 * Class UserAddressModel
 * @package Home\Model
 */
class UsersModel extends Model
{
	public function find($user_id,$find='find'){
		$users=M('users');
		$find=$users->$find($user_id);
		return $find;
	}

	public function bind($user_id,$num,$name){
		$user=M('users');
		return $user->where('user_id='.$user_id)->save(array('zfb_user'=>$num,'zfb_user_name'=>$name));
	}

	public function pwd($id){
		$user=M('users');////////////////获取用户密码
		$find=$user->find($id);
		return $find['password'];
	}

	public function introduce($user_id){
		$user=M('users');
		$where='introduce='.$user_id.' and stateid=0';
		$count=$user->where($where)->count();
		$page=new Page($count,10);
		$select=$user->where('introduce='.$user_id)->order('reg_time desc')->limit("$page->firstRow,$page->listRows")->select();
		return array(
			'select'=>$select,
			'page'	=>$page->show(),
			);
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


}