<?php
return array(
	//'配置项'=>'配置值'
		'TMPL_TEMPLATE_SUFFIX'=>'.htm',
		'URL_ROUTER_ON' => true, //URL路由
		'URL_MODEL' => 2, // URL模式
       //数据库配置信息
        'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => 'localhost', // 服务器地址
        'DB_NAME'   => 'shujuku', // 数据库类型库名
		'DB_USER'   => 'shujuku', // 用户名
		'DB_PWD'    => 'shujuku', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => 'tp_', // 数据库表前缀
		'SHOW_PAGE_TRACE' =>false,
);
?>