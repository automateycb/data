<?php
return array(
	//'配置项'=>'配置值'
   'SHOW_PAGE_TRACE'=>1,    //显示调试信息

    //数据库配置信息
   'DB_TYPE'   => 'mysql', // 数据库类型
   'DB_HOST'   => 'localhost', // 服务器地址
   'DB_NAME'   => 'data', // 数据库名
   'DB_USER'   => 'root', // 用户名
   'DB_PWD'    => '', // 密码
   'DB_PORT'   => 3306, // 端口
   'DB_PARAMS' =>  array(), // 数据库连接参数
   'DB_PREFIX' => 'data_', // 数据库表前缀 
   'DB_CHARSET'=> 'utf8', // 字符集
   'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志

   //邮件配置

    'THINK_EMAIL' => array(

    'SMTP_HOST'   => 'smtp.163.com', //SMTP服务器

    'SMTP_PORT'   => '465', //SMTP服务器端口

    'SMTP_USER'   => 'csotauto@163.com', //SMTP服务器用户名

    'SMTP_PASS'   => 'csot1234', //SMTP服务器密码

    'FROM_EMAIL'  => 'csotauto@163.com', //发件人EMAIL

    'FROM_NAME'   => '自选涨跌幅提醒', //发件人名称

    'REPLY_EMAIL' => 'csotauto@163.com', //回复EMAIL（留空则为发件人EMAIL）

    'REPLY_NAME'  => ' ', //回复名称（留空则为发件人名称）
    ),

);