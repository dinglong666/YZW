<?php
class Log_
{
	// ��ӡlog
	function  log_result($file,$word) 
	{
	    $fp = fopen($file,"a");
	    flock($fp, LOCK_EX) ;
	    fwrite($fp,"ִ�����ڣ�".strftime("%Y-%m-%d-%H��%M��%S",time())."\n".$word."\n\n");
	    flock($fp, LOCK_UN);
	    fclose($fp);
	}
}
?>