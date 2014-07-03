<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	
	<title>后台登录</title>
	<link rel="stylesheet" href="/auth/statics/bootstrap3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/auth/statics/bootstrap3/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" href="/auth/statics/css/default.css" />
	<script src="/auth/statics/bootstrap3/js/jquery.min.js"></script>
	<script src="/auth/statics/bootstrap3/js/bootstrap.min.js"></script>
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			//alert(1111);
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="row col-md-6 col-sm-offset-3 login">
				
				<form class="form-horizontal" action="<?php echo U('Login/checkLogin','','');?>" role="form" method="post">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">用户名:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="username" name="username" placeholder="用户名" />
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">密 &nbsp; &nbsp;码:</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="password" name="password" placeholder="密码" />
							
						</div>				
					</div>

					<div class="form-group">
						<label for="code" class="col-sm-2 control-label">验证码:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="code" name="code" placeholder="验证码" />
							
						</div>				
					</div>					

					<div class="form-group">
						<label for="code" class="col-sm-2 control-label"></label>
						<div class="col-sm-7">
							<img src="<?php echo U('Login/verify','','');?>" onclick="javascript:this.src=this.src+'?time='+Math.random()" />						
						</div>				
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-7">
							<button type="submit" class="btn btn-primary btn-login">登陆</button>
							
						</div>
						
					</div>

				</form>	

		</div>
	</div>
</body>
</html>