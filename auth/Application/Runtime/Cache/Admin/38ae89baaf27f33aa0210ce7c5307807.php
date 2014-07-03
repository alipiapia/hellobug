<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加会员</title>
	<link rel="stylesheet" href="/auth/statics/bootstrap3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/auth/statics/bootstrap3/css/bootstrap-theme.min.css" />	
	<link rel="stylesheet" href="/auth/statics/css/default.css" />
	<script src="/auth/statics/bootstrap3/js/jquery.min.js"></script>
	<script src="/auth/statics/bootstrap3/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('.btn-add').click(function(){
				var passwd=$('#password').val();
				var repasswd=$('#repassword').val();
				if(passwd!=repasswd){
					alert('密码不一致!');
					return false;
				}
			});
		});
	</script>

	<style type="text/css">
		body{
			padding-top: 70px;
		}
	</style>
</head>

<body>
	<!--nav导航条-->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">	
		<div class="container">
			<div class="collapse navbar-collapse">
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="#">我的面板</a></li>
			      <li><a href="<?php echo U('Admin/Index/index');?>">首页</a></li>
			      <li><a href="#">设置</a></li>
			      <li><a href="#">模块</a></li>
			      <li><a href="#">内容</a></li>
			      <li><a href="#">用户</a></li>
			      <li><a href="#">界面</a></li>
			      <li><a href="#">扩展</a></li>
			    </ul>

			    <ul class="nav navbar-nav navbar-right">
			   		<li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo (session('username')); ?> <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" tabindex="-1"><i class="glyphicon glyphicon-cog"></i>	设置</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo U('Admin/Login/logout');?>" tabindex="-1"><i class="glyphicon glyphicon-off"></i>	退出</a>
                            </li>
                        </ul>
                    </li>
			    </ul>
  			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<!--/nav导航条-->
	<div class="container">
		<div class="row">
			
	<div id="sidebar" class="col-sm-3">
		<div class="panel-group" id="accordion">
			<div class="panel panel-primary">
			    <div class="panel-heading">
			     	<h4 class="panel-title">
			       		<a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="glyphicon glyphicon-user"></i> 会 员 管 理</a>
			      	</h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in">
				      	<div class="panel-body">
				         	<ul class=" nav nav-pills nav-stacked">
					          	<li><a href="<?php echo U('Admin/Member/memberList');?>">会员列表</a></li>
					      		<li><a href="<?php echo U('Admin/Member/memberAdd');?>">添加会员</a></li>
				      		</ul>
				     	 </div>
			    </div>
	  </div>
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <h4 class="panel-title">
			        <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="glyphicon glyphicon-list"></i> 权 限 管 理
			        </a>
		     	</h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse">
		     	<div class="panel-body">
			      	<ul class=" nav nav-pills nav-stacked">
			          	<li><a href="<?php echo U('Admin/Auth/accessList');?>">权限列表</a></li>
			      		<li><a href="<?php echo U('Admin/Auth/accessAdd');?>">添加权限</a></li>
			      		<li><a href="<?php echo U('Admin/Auth/groupList');?>">角色管理</a></li>
			      	</ul>
		      	</div>
		    </div>
		  </div>
		</div>
	</div>	

			
		<div id="content" class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><i class="glyphicon glyphicon-header"></i> 添	加	会 员</h4>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" action="<?php echo U('Admin/Member/addHandle');?>" method='post'>
						<div class="form-group">
							<label for="username" class="col-sm-2 control-label">用户名:</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" placeholder="用户名" name="username" id="username" />
							</div>
							<label class="col-sm-2 control-label"></label>
						</div>

						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">密码:</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" placeholder="密码" name="password" id="password" />
								
							</div>
							<label class="col-sm-2 control-label"></label>
						</div>

						<div class="form-group">
							<label for="repassword" class="col-sm-2 control-label">确认密码:</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" placeholder="确认密码" name="repassword" id="repassword" />
								
							</div>
							<label class="col-sm-2 control-label"></label>
						</div>

						<div class="form-group">
							<label for="score" class="col-sm-2 control-label">会员积分:</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" placeholder="会员积分" name="score" id="score" />
								
							</div>
							<label class="col-sm-2 control-label"></label>
						</div>						

						<div class="form-group">
							<label for="groupName" class="col-sm-2 control-label">所属角色:</label>
							<div class="col-sm-3">
								<select class="form-control" name="groupName">
									<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>								
							</div>
							<label class="col-sm-2 control-label"></label>
						</div>

						

						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-5">
								<button type="submit" class="btn btn-success btn-add">添加</button>
								
							</div>
							
						</div>

					</form>
				</div>

			</div>
		</div>

		</div>
	</div>


</body>
</html>