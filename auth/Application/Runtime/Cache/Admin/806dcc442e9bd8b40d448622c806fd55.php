<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>会员列表</title>
	<link rel="stylesheet" href="/auth/statics/bootstrap3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/auth/statics/bootstrap3/css/bootstrap-theme.min.css" />	
	<link rel="stylesheet" href="/auth/statics/css/default.css" />
	<script src="/auth/statics/bootstrap3/js/jquery.min.js"></script>
	<script src="/auth/statics/bootstrap3/js/bootstrap.min.js"></script>
	
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
					<h4 class="panel-title"><i class="glyphicon glyphicon-header"></i> 会 员 列 表</h4>
				</div>

				<div class="panel-body">
					<table class="table table-hover table-bordered table-condensed">
						<tr>
							<td>序号</td>
							<td>会员名</td>
							<td>会员积分</td>
							<td>操作</td>
						</tr>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($i+$num); ?></td>
								<td><?php echo ($vo['username']); ?></td>
								<td><?php echo ($vo['score']); ?></td>
								<td>
									<div class="btn-group btn-group-xs">
										<a href="#" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a><a href="<?php echo U('Admin/Member/deleteHandle',array('uid'=>$vo['uid']));?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
									</div>
									</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							<tr>
								<td colspan="4"><?php echo ($page); ?></td>
							</tr>
					</table>
				</div>

			</div>
		</div>

		</div>
	</div>


</body>
</html>