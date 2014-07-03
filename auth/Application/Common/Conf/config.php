<?php
return array(
	//'配置项'=>'配置值'

	//显示调试信息
	'SHOW_PAGE_TRACE'=>true,

	'TMPL_PARSE_STRING'=>array(
		'__STATICS__'=>__ROOT__.'/statics'
		),

	//数据库配置
	//pdo类型,采用dsn方式连接
	'DB_TYPE'=>'pdo',
	'DB_USER'=>'root',
	'DB_PWD'=>'952788',
	'DB_PREFIX'=>'tk_',
	'DB_PORT'=>'3306',
	'DB_DSN'=>'mysql:host=localhost;dbname=auth;charset=utf8',

	//权限验证设置
	'AUTH_CONFIG'=>array(
        'AUTH_ON' => true, //认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => 'tk_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'tk_auth_group_access', //用户组明细表
        'AUTH_RULE' => 'tk_auth_rule', //权限规则表
        'AUTH_USER' => 'tk_members'//用户信息表
    ),
    //超级管理员id,拥有全部权限,只要用户uid在这个角色组里的,就跳出认证.可以设置多个值,如array('1','2','3')
    'ADMINISTRATOR'=>array('1'),
);