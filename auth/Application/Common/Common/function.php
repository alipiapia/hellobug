<?php 
   /**
      * 权限验证
      * @param rule string|array  需要验证的规则列表,支持逗号分隔的权限规则或索引数组
      * @param uid  int           认证用户的id
      * @param string mode        执行check的模式
      * @param relation string    如果为 'or' 表示满足任一条规则即通过验证;如果为 'and'则表示需满足所有规则才能通过验证
      * @return boolean           通过验证返回true;失败返回false
      * @return author            黄药师		46914685@qq.com
     */
	function authCheck($rule,$uid,$type=1, $mode='url', $relation='or'){
		//超级管理员跳过验证
		$auth=new \Think\Auth();
		//获取当前uid所在的角色组id
		$groups=$auth->getGroups($uid);
		//这里偷懒了,因为我设置的是一个用户对应一个角色组,所以直接取值.如果是对应多个角色组的话,需另外处理
		if(in_array($groups[0]['id'], C('ADMINISTRATOR'))){
			return true;
		}else{			
			return $auth->check($rule,$uid,$type,$mode,$relation)?true:false;
		}
	}
 ?>