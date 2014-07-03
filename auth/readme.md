auth权限认证使用说明:

author 黄药师  46914685@qq.com

安装说明:
	1.先把auth.sql导入数据库
		mysql -uroot -p 你的数据库名 <auth.sql的路径

	2.修改配置文件config.php里的数据库配置项

	3.访问本项目下Admin模块,例如:
		http://localhost/test/auth/index.php/Admin/Index/index

注意事项:
	环境要求php版本5.3以上