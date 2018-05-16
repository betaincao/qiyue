<?php
return array(
	//'配置项'=>'配置值'
       'TMPL_L_DELIM'=>'<{',  //修改左定界符
       'TMPL_R_DELIM'=>'}>',  //修改右定界符
       'DB_TYPE'=>'mysql',      //设置数据库类型
       'DB_HOST'=>'localhost',  //设置主机
       'DB_NAME'=>'qiyue',       //设置数据库名
       'DB_USER'=>'root',        //设置用户名
       'DB_PWD'=>'xuanke',    //设置密码
       'DB_PORT'=>'3306',        // 端口 留空则取默认端口
       'DB_PREFIX'=>'think_',     //设置表前缀
       //'DB_DSN'=>'mysql://root:199698@localhost:3306/zhizhi', //配置数据库的简化方式
       'SHOW_PAGE_TRACE'=>false,   //开启页面trace
       

    // 配置邮件发送服务器
    'MAIL_HOST' =>'smtp.163.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'15102944917@163.com',//你的邮箱名
    'MAIL_FROM' =>'15102944917@163.com',//发件人地址
    'MAIL_FROMNAME'=>'器约科技',//发件人姓名
    'MAIL_PASSWORD' =>'long15091143082',//邮箱密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
       );    
?>