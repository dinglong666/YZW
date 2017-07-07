<?php
return array(
	//'配置项'=>'配置值'
	 'DATA_CACHE_PREFIX' => 'Redis_',//缓存前缀
	 'DATA_CACHE_TYPE'=>'Redis',//默认动态缓存为Redis
	 'REDIS_RW_SEPARATE' => true, //Redis读写分离 true 开启
	 'REDIS_HOST'=>'127.0.0.1', //redis服务器ip，多台用逗号隔开；读写分离开启时，第一台负责写，其它[随机]负责读；
	 'REDIS_PORT'=>'6379',//端口号
	 'REDIS_TIMEOUT'=>'300',//超时时间
	 'REDIS_PERSISTENT'=>false,//是否长连接 false=短连接
	 'REDIS_AUTH'=>'',//AUTH认证密码

	 'CONFIG'			=> S('FIND'),

	'STORE_NAME'     	=> S('FIND')['store_name'],///////  网站名称
    'STORE_TITLE'    	=> S('FIND')['store_title'],//////  网站标题
    'STORE_DESC'     	=> S('FIND')['store_desc'],///////  网站描述
    'STORE_KEYWORDS' 	=> S('FIND')['store_keywords'],///  网站关键字
    'CONTACT_NAME'   	=> S('FIND')['contact_name'],/////  联系人
    'CONTACT_PHONE'  	=> S('FIND')['contact_phone'],////  联系电话
    'CONTACT_ADDRESS'	=> S('FIND')['contact_address'],//  联系地址
    'CONTACT_QQ1'    	=> S('FIND')['contact_qq1'],//////  联系qq1
    'CONTACT_QQ2'    	=> S('FIND')['contact_qq2'],//////  qq2
    'CONTACT_QQ3'    	=> S('FIND')['contact_qq3'],//////  qq3
    'JURISDICTION'		=> S('FIND')['jurisdiction'],/////	客服权限 1自己 2全部可见
    'CONTACT_EMAIL'  	=> S('FIND')['contact_email'],////  联系邮箱
    'PROFIT1'        	=> S('FIND')['profit1'],//////////  一级分销利润
    'PROFIT2'        	=> S('FIND')['profit2'],//////////  二级分销利润
    'ALIPAY'         	=> S('FIND')['alipay'],///////////  支付宝账号
    'WECHAT'         	=> S('FIND')['wechat'],///////////  微信账号
    'STORE_LOGO'     	=> S('FIND')['store_logo'],///////  网站logo

);