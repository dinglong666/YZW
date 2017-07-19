<?php
return array(
    'SESSION_OPTIONS' => array('use_trans_sid'=>1),
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'yzw',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'yzw_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  false,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
    'DEFAULT_NOTICE_TIME'   =>  '30', // 默认推送时间 最大3599 秒为单位不能超过1小时

    'CONFIG'            => S('FIND'),

    'STORE_NAME'        => S('FIND')['store_name'],///////  网站名称
    'STORE_TITLE'       => S('FIND')['store_title'],//////  网站标题
    'STORE_DESC'        => S('FIND')['store_desc'],///////  网站描述
    'STORE_KEYWORDS'    => S('FIND')['store_keywords'],///  网站关键字
    'CONTACT_NAME'      => S('FIND')['contact_name'],/////  联系人
    'CONTACT_PHONE'     => S('FIND')['contact_phone'],////  联系电话
    'CONTACT_ADDRESS'   => S('FIND')['contact_address'],//  联系地址
    'CONTACT_QQ1'       => S('FIND')['contact_qq1'],//////  联系qq1
    'CONTACT_QQ2'       => S('FIND')['contact_qq2'],//////  qq2
    'CONTACT_QQ3'       => S('FIND')['contact_qq3'],//////  qq3
    'JURISDICTION'      => S('FIND')['jurisdiction'],/////  客服权限 1自己 2全部可见
    'CONTACT_EMAIL'     => S('FIND')['contact_email'],////  联系邮箱
    'PROFIT1'           => S('FIND')['profit1'],//////////  一级分销利润
    'PROFIT2'           => S('FIND')['profit2'],//////////  二级分销利润
    'ALIPAY'            => S('FIND')['alipay'],///////////  支付宝账号
    'WECHAT'            => S('FIND')['wechat'],///////////  微信账号
    'STORE_LOGO'        => S('FIND')['store_logo'],///////  网站logo
    
);