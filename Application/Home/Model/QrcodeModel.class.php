<?php 
namespace Home\Model;

use Think\Model;
use Think\Page;

/**
 * Class UserAddressModel
 * @package Home\Model
 */
class QrcodeModel extends Model
{
	function img($id){
		$qr=M('qrcode',$find='find');
		return $qr->$find($id);
	}
}