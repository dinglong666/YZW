<?php 
namespace Admin\Controller;
use Think\Page;
class ArticleController extends BaseController {

	public function where($where=1,$num=10){

		$xianshi=array('隐藏','显示');
		$weizhi=array(108=>'顶部',109=>'底部',110=>'流程介绍',111=>'app二维码',112=>'关注二维码');
		$art=M("article");
	 	$cat=M('article_cat');
		$count=$art->where($where)->count();
		$page=new Page($count,$num);
		$arr=$art->where($where)->limit("$page->firstRow,$page->listRows")->select();
	 	foreach ($arr as $key => $value) {
	 		$arr[$key]['list']=$cat->where('cat_id='.$value['cat_id'])->find();
	 	}
	 	$this->assign('weizhi',$weizhi);
		$this->assign('xianshi',$xianshi);
		$this->assign('page',$page->show());
		$this->assign('arr',$arr);
		$this->display();
	}

	public function find($where=1){
		if($_GET['id']){
			$find=M('article')->where('article_id='.$_GET['id'])->find();
			$find['list']=M('article_cat')->where('cat_id='.$find['cat_id'])->field('cat_name')->find();
			
			$this->assign('find',$find);
		}
		$arr=M('article_cat')->where($where)->select();
		$this->assign('arr',$arr);
		$this->display();
	}

	public function shouye(){
	 	$where='cat_id in (108,109,110,111,112,113,114,115)';
	 	$this->where($where,4);
	}

	public function shouye_add(){
		$where='cat_id in (108,109,110,111,112,113,114,115)';
		$this->find($where);
	}

	public function type_list(){///////////////////////文章列表
	 	$where='cat_id in (102,104,105)';
	 	$this->where($where,15);
	}

	public function type_add(){

		$this->find();
	}

	public function type_add_go(){
		if (!empty($_FILES['photo']['name'])) {
            $photo=$this->upload($_FILES['photo']);
            $_POST['img_url']=$photo['savepath'].$photo['savename'];
            
        }
        $artic=D('Article');

		if (!empty($_POST['article_id'])) {
			$_POST['publish_time']=time();
        	$a=M('article')->where('article_id='.$_POST['article_id'])->data($_POST)->save();
			switch ($_POST['ltype']) {
				case 'sp':
					admin_log('管理员修改视频');
					break;
				case 'tp':
					admin_log('管理员修改图片');
					break;
				case 'qy':
					admin_log('管理员修改企业文章');
					break;
				case 'fl':
					admin_log('管理员修改文章分类');
					break;
			}
        }else{
        	if (empty($_POST['video_name']) && empty($_POST['img_chain']) && $_POST['ttype']=='video') {
        		$this->error('视频名称和视频外链必须填写一个!');
        	}
        	if($artic->create()){
	        	$_POST['add_time']=time();
	        	$a=M('article')->data($_POST)->add();
			switch ($_POST['ltype']) {
				case 'sp':
					admin_log('管理员添加视频');
					break;
				case 'tp':
					admin_log('管理员添加图片');
					break;
				case 'qy':
					admin_log('管理员添加企业文章');
					break;				
			}
        	}else{
        		$this->error($artic->getError());
        	}
        	
        }

		if ($a) {
			$this->success('保存成功',$_POST['ttype']);
		}else{
			$this->error('保存失败');
		}
	}

	public function cooperation_list(){//////////////合作企业
		$where='cat_id=107';
		$this->where($where);
	}

	public function coop_add(){
		$this->find();
	}

	public function video(){////////////////////////精彩视频
		$where='cat_id=103';
		$this->where($where);
	}

	public function video_add(){
		$this->find();
	}

	public function del(){
		M('article')->delete($_GET['id']);
		switch ($_GET['type']) {
			case 'tp':
				admin_log('管理员删除编号为'.$_GET['id'].'的首页图片');
				break;
			case 'sp':
				admin_log('管理员删除编号为'.$_GET['id'].'的视频');
				break;
			case 'qy':
				admin_log('管理员删除编号为'.$_GET['id'].'的企业文章');
				break;			
		}
		$this->success('删除成功');
	}








 public function useftp($path,$name)
    {
    	$conn =  ftp_connect("47.93.194.66") or die("Could not connect");
		ftp_login($conn,"lihongcai","lihongcai");

		$a=ftp_put($conn,"./Video/".$name,$path,FTP_BINARY);
		ftp_close($conn);
		return dump($a);
    }

    public function  phpinfo(){
    	phpinfo();
    }

    public function aa()
    {
    	$this->fengzhuang('ceshi');
    }

    /*
    $name/////////////表名
    $timer/////////////时间字段////////timer
	$ip////////////////ip字段/////////ip
	$country///////////国家///////////country
	$province//////////城市///////////province
	$city//////////////地区///////////city
    */
    public function fengzhuang($name,$timer='timer',$ip='ip',$country='country',$province='province',$city='city'){
    	$user=M($name);
    	$time=time();
    	$data[$timer]	=$time;
    	$data[$ip]		=$_SERVER["REMOTE_ADDR"];
    	$atime=strtotime(date('Y-m-d',$time).' 00:00:00');
		$etime=strtotime(date('Y-m-d',$time).' 23:59:59');
    	$nu=$user->where("$ip='$data[$ip]' and $time<=$etime and $time>=$atime")->find();
    	if (!$nu) {
    		$address		=$this->GetIpLookup($data[$ip]);
	    	$data[$country]	=$address['country'];
	    	$data[$province]=$address['province'];
	    	$data[$city]	=$address['city'];
	    	$user->data($data)->add();
    	}


    }

    public function GetIpLookup($ip = ''){  
	    if(empty($ip)){  
	        $ip = $this->GetIp();  
	    }  
	    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);  
	    if(empty($res)){ return false; }  
	    $jsonMatches = array();  
	    preg_match('#\{.+?\}#', $res, $jsonMatches);  
	    if(!isset($jsonMatches[0])){ return false; }  
	    $json = json_decode($jsonMatches[0], true);  
	    if(isset($json['ret']) && $json['ret'] == 1){  
	        $json['ip'] = $ip;  
	        unset($json['ret']);  
	    }else{  
	        return false;  
	    }  
    return $json;  
	} 

	function GetIp(){  
    $realip = '';  
    $unknown = 'unknown';  
    if (isset($_SERVER)){  
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){  
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);  
            foreach($arr as $ip){  
                $ip = trim($ip);  
                if ($ip != 'unknown'){  
                    $realip = $ip;  
                    break;  
                }  
            }  
        }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){  
            $realip = $_SERVER['HTTP_CLIENT_IP'];  
        }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){  
            $realip = $_SERVER['REMOTE_ADDR'];  
        }else{  
            $realip = $unknown;  
        }  
    }else{  
        if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){  
            $realip = getenv("HTTP_X_FORWARDED_FOR");  
        }else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){  
            $realip = getenv("HTTP_CLIENT_IP");  
        }else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){  
            $realip = getenv("REMOTE_ADDR");  
        }else{  
            $realip = $unknown;  
        }  
    }  
    $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;  
    return $realip;  
	}  





}


 
//     // 联接FTP服务器  
//     $conn = ftp_connect(ftp.server.com);  

//     // 使用username和password登录  
//     ftp_login($conn, "john", "doe");  

//     // 获取远端系统类型  
//     ftp_systype($conn);  

//     // 列示文件  
//     $filelist = ftp_nlist($conn, ".");  

//     // 下载文件  
//     ftp_get($conn, "data.zip", "data.zip", FTP_BINARY);  

//     // 关闭联接  
//     ftp_quit($conn);  

//     //初结化一个FTP联接，PHP提供了ftp_connect()这个函数，它使用主机名称和端口作为参数。在上面的例子里，主机名字为 "ftp.server.com"；如果端口没指定，PHP将会使用"21"作为缺省端口来建立联接。  

//     //联接成功后ftp_connect()传回一个handle句柄；这个handle将被以后使用的FTP函数使用。  
//     $conn = ftp_connect(ftp.server.com);  

//     //一旦建立联接，使用ftp_login()发送一个用户名称和用户密码。你可以看到，这个函数ftp_login()使用了 ftp_connect()函数传来的handle，以确定用户名和密码能被提交到正确的服务器。  
//     ftp_login($conn, "john", "doe");  

//     // close connection  
//     ftp_quit($conn);  

//     //登录了FTP服务器，PHP提供了一些函数，它们能获取一些关于系统和文件以及目录的信息。  
//     ftp_pwd()  

//     //获取当前所在的目录  
//     $here = ftp_pwd($conn);  

//     //获取服务器端系统信息ftp_systype()  
//     $server_os = ftp_systype($conn);  

//     //被动模式（PASV）的开关，打开或关闭PASV（1表示开）  
//     ftp_pasv($conn, 1);  

//     //进入目录中用ftp_chdir()函数，它接受一个目录名作为参数。  
//     ftp_chdir($conn, "public_html");  

//     //回到所在的目录父目录用ftp_cdup()实现  
//     ftp_cdup($conn);  

//     //建立或移动一个目录，这要使用ftp_mkdir()和ftp_rmdir()函数；注意：ftp_mkdir()建立成功的话，就会返回新建立的目录名。  
//     ftp_mkdir($conn, "test");  

//     ftp_rmdir($conn, "test");  

//     //上传文件，ftp_put()函数能很好的胜任，它需要你指定一个本地文件名，上传后的文件名以及传输的类型。比方说：如果你想上传 "abc.txt"这个文件，上传后命名为"xyz.txt"，命令应该是这样：  
//     ftp_put($conn, "xyz.txt", "abc.txt", FTP_ASCII);  

//     //下载文件：PHP所提供的函数是ftp_get()，它也需要一个服务器上文件名，下载后的文件名，以及传输类型作为参数，例如：服务器端文件为his.zip，你想下载至本地机，并命名为hers.zip，命令如下：  
//     ftp_get($conn, "hers.zip", "his.zip", FTP_BINARY);  

//     //PHP提供两种方法：一种是简单列示文件名和目录，另一种就是详细的列示文件的大小，权限，创立时间等信息。  

//     //第一种使用ftp_nlist()函数，第二种用ftp_rawlist().两种函数都需要一个目录名做为参数，都返回目录列做为一个数组，数组的每一个元素相当于列表的一行。  
//     $filelist = ftp_nlist($conn, ".");  

//     //函数ftp_size()，它返回你所指定的文件的大小，使用BITES作为单位。要指出的是，如果它返回的是 "-1"的话，意味着这是一个目录  
//     $filelist = ftp_size($conn, "data.zip");  

// /**
//  * 仿写CodeIgniter的FTP类
//  * FTP基本操作：
//  * 1) 登陆;    connect
//  * 2) 当前目录文件列表;  filelist
//  * 3) 目录改变;   chgdir
//  * 4) 重命名/移动;  rename
//  * 5) 创建文件夹;  mkdir
//  * 6) 删除;    delete_dir/delete_file
//  * 7) 上传;    upload
//  * 8) 下载    download
//  *
//  * @author quanshuidingdang
//  */
// class Ftp {
//  private $hostname = '';
//  private $username = '';
//  private $password = '';
//  private $port   = 21;
//  private $passive  = TRUE;
//  private $debug  = TRUE;
//  private $conn_id  = FALSE;

//  /**
//   * 构造函数
//   *
//   * @param array 配置数组 : $config = array('hostname'=>'','username'=>'','password'=>'','port'=>''...);
//   */
//  public function __construct($config = array()) {
//   if(count($config) > 0) {
//    $this->_init($config);
//   }
//  }

//  /**
//   * FTP连接
//   *
//   * @access  public
//   * @param  array  配置数组
//   * @return boolean
//   */
//  public function connect($config = array()) {
//   if(count($config) > 0) {
//    $this->_init($config);
//   }

//   if(FALSE === ($this->conn_id = @ftp_connect($this->hostname,$this->port))) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_unable_to_connect");
//    }
//    return FALSE;
//   }

//   if( ! $this->_login()) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_unable_to_login");
//    }
//    return FALSE;
//   }

//   if($this->passive === TRUE) {
//    ftp_pasv($this->conn_id, TRUE);
//   }

//   return TRUE;
//  }

//  /**
//   * 目录改变
//   *
//   * @access  public
//   * @param  string  目录标识(ftp)
//   * @param boolean 
//   * @return boolean
//   */
//  public function chgdir($path = '', $supress_debug = FALSE) {
//   if($path == '' OR ! $this->_isconn()) {
//    return FALSE;
//   }

//   $result = @ftp_chdir($this->conn_id, $path);

//   if($result === FALSE) {
//    if($this->debug === TRUE AND $supress_debug == FALSE) {
//     $this->_error("ftp_unable_to_chgdir:dir[".$path."]");
//    }
//    return FALSE;
//   }

//   return TRUE;
//  }

//  /**
//   * 目录生成
//   *
//   * @access  public
//   * @param  string  目录标识(ftp)
//   * @param int   文件权限列表 
//   * @return boolean
//   */
//  public function mkdir($path = '', $permissions = NULL) {
//   if($path == '' OR ! $this->_isconn()) {
//    return FALSE;
//   }

//   $result = @ftp_mkdir($this->conn_id, $path);

//   if($result === FALSE) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_unable_to_mkdir:dir[".$path."]");
//    }
//    return FALSE;
//   }

//   if( ! is_null($permissions)) {
//    $this->chmod($path,(int)$permissions);
//   }

//   return TRUE;
//  }

//  /**
//   * 上传
//   *
//   * @access  public
//   * @param  string  本地目录标识
//   * @param string 远程目录标识(ftp)
//   * @param string 上传模式 auto || ascii
//   * @param int  上传后的文件权限列表 
//   * @return boolean
//   */
//  public function upload($localpath, $remotepath, $mode = 'auto', $permissions = NULL) {
//   if( ! $this->_isconn()) {
//    return FALSE;
//   }

//   if( ! file_exists($localpath)) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_no_source_file:".$localpath);
//    }
//    return FALSE;
//   }

//   if($mode == 'auto') {
//    $ext = $this->_getext($localpath);
//    $mode = $this->_settype($ext);
//   }

//   $mode = ($mode == 'ascii') ? FTP_ASCII : FTP_BINARY;

//   $result = @ftp_put($this->conn_id, $remotepath, $localpath, $mode);

//   if($result === FALSE) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_unable_to_upload:localpath[".$localpath."]/remotepath[".$remotepath."]");
//    }
//    return FALSE;
//   }

//   if( ! is_null($permissions)) {
//    $this->chmod($remotepath,(int)$permissions);
//   }

//   return TRUE;
//  }

//  /**
//   * 下载
//   *
//   * @access  public
//   * @param  string  远程目录标识(ftp)
//   * @param string 本地目录标识
//   * @param string 下载模式 auto || ascii 
//   * @return boolean
//   */
//  public function download($remotepath, $localpath, $mode = 'auto') {
//   if( ! $this->_isconn()) {
//    return FALSE;
//   }

//   if($mode == 'auto') {
//    $ext = $this->_getext($remotepath);
//    $mode = $this->_settype($ext);
//   }

//   $mode = ($mode == 'ascii') ? FTP_ASCII : FTP_BINARY;

//   $result = @ftp_get($this->conn_id, $localpath, $remotepath, $mode);

//   if($result === FALSE) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_unable_to_download:localpath[".$localpath."]-remotepath[".$remotepath."]");
//    }
//    return FALSE;
//   }

//   return TRUE;
//  }

//  /**
//   * 重命名/移动
//   *
//   * @access  public
//   * @param  string  远程目录标识(ftp)
//   * @param string 新目录标识
//   * @param boolean 判断是重命名(FALSE)还是移动(TRUE) 
//   * @return boolean
//   */
//  public function rename($oldname, $newname, $move = FALSE) {
//   if( ! $this->_isconn()) {
//    return FALSE;
//   }

//   $result = @ftp_rename($this->conn_id, $oldname, $newname);

//   if($result === FALSE) {
//    if($this->debug === TRUE) {
//     $msg = ($move == FALSE) ? "ftp_unable_to_rename" : "ftp_unable_to_move";
//     $this->_error($msg);
//    }
//    return FALSE;
//   }

//   return TRUE;
//  }

//  /**
//   * 删除文件
//   *
//   * @access  public
//   * @param  string  文件标识(ftp)
//   * @return boolean
//   */
//  public function delete_file($file) {
//   if( ! $this->_isconn()) {
//    return FALSE;
//   }

//   $result = @ftp_delete($this->conn_id, $file);

//   if($result === FALSE) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_unable_to_delete_file:file[".$file."]");
//    }
//    return FALSE;
//   }

//   return TRUE;
//  }

//  /**
//   * 删除文件夹
//   *
//   * @access  public
//   * @param  string  目录标识(ftp)
//   * @return boolean
//   */
//  public function delete_dir($path) {
//   if( ! $this->_isconn()) {
//    return FALSE;
//   }

//   //对目录宏的'/'字符添加反斜杠'\'
//   $path = preg_replace("/(.+?)\/*$/", "\\1/", $path);

//   //获取目录文件列表
//   $filelist = $this->filelist($path);

//   if($filelist !== FALSE AND count($filelist) > 0) {
//    foreach($filelist as $item) {
//     //如果我们无法删除,那么就可能是一个文件夹
//     //所以我们递归调用delete_dir()
//     if( ! @delete_file($item)) {
//      $this->delete_dir($item);
//     }
//    }
//   }

//   //删除文件夹(空文件夹)
//   $result = @ftp_rmdir($this->conn_id, $path);

//   if($result === FALSE) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_unable_to_delete_dir:dir[".$path."]");
//    }
//    return FALSE;
//   }

//   return TRUE;
//  }

//  /**
//   * 修改文件权限
//   *
//   * @access  public
//   * @param  string  目录标识(ftp)
//   * @return boolean
//   */
//  public function chmod($path, $perm) {
//   if( ! $this->_isconn()) {
//    return FALSE;
//   }

//   //只有在PHP5中才定义了修改权限的函数(ftp)
//   if( ! function_exists('ftp_chmod')) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_unable_to_chmod(function)");
//    }
//    return FALSE;
//   }

//   $result = @ftp_chmod($this->conn_id, $perm, $path);

//   if($result === FALSE) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_unable_to_chmod:path[".$path."]-chmod[".$perm."]");
//    }
//    return FALSE;
//   }
//   return TRUE;
//  }

//  /**
//   * 获取目录文件列表
//   *
//   * @access  public
//   * @param  string  目录标识(ftp)
//   * @return array
//   */
//  public function filelist($path = '.') {
//   if( ! $this->_isconn()) {
//    return FALSE;
//   }

//   return ftp_nlist($this->conn_id, $path);
//  }

//  /**
//   * 关闭FTP
//   *
//   * @access  public
//   * @return boolean
//   */
//  public function close() {
//   if( ! $this->_isconn()) {
//    return FALSE;
//   }

//   return @ftp_close($this->conn_id);
//  }

//  /**
//   * FTP成员变量初始化
//   *
//   * @access private
//   * @param array 配置数组  
//   * @return void
//   */
//  private function _init($config = array()) {
//   foreach($config as $key => $val) {
//    if(isset($this->$key)) {
//     $this->$key = $val;
//    }
//   }
//   //特殊字符过滤
//   $this->hostname = preg_replace('|.+?://|','',$this->hostname);
//  }

//  /**
//   * FTP登陆
//   *
//   * @access  private
//   * @return boolean
//   */
//  private function _login() {
//   return @ftp_login($this->conn_id, $this->username, $this->password);
//  }

//  /**
//   * 判断con_id
//   *
//   * @access  private
//   * @return boolean
//   */
//  private function _isconn() {
//   if( ! is_resource($this->conn_id)) {
//    if($this->debug === TRUE) {
//     $this->_error("ftp_no_connection");
//    }
//    return FALSE;
//   }
//   return TRUE;
//  }

//  /**
//   * 从文件名中获取后缀扩展
//   *
//   * @access  private
//   * @param  string  目录标识
//   * @return string
//   */
//  private function _getext($filename) {
//   if(FALSE === strpos($filename, '.')) {
//    return 'txt';
//   }

//   $extarr = explode('.', $filename);
//   return end($extarr);
//  }

//  /**
//   * 从后缀扩展定义FTP传输模式  ascii 或 binary
//   *
//   * @access  private
//   * @param  string  后缀扩展
//   * @return string
//   */
//  private function _settype($ext) {
//   $text_type = array (
//        'txt',
//        'text',
//        'php',
//        'phps',
//        'php4',
//        'js',
//        'css',
//        'htm',
//        'html',
//        'phtml',
//        'shtml',
//        'log',
//        'xml'
//        );

//   return (in_array($ext, $text_type)) ? 'ascii' : 'binary';
//  }

//  /**
//   * 错误日志记录
//   *
//   * @access  prvate
//   * @return boolean
//   */
//  private function _error($msg) {
//   return @file_put_contents('ftp_err.log', "date[".date("Y-m-d H:i:s")."]-hostname[".$this->hostname."]-username[".$this->username."]-password[".$this->password."]-msg[".$msg."]\n", FILE_APPEND);
//  }
// }
// /*End of file ftp.php*/
// /*Location /Apache Group/htdocs/ftp.php*/