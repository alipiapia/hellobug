<?php 
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	//登录页面
	public function index(){
		$this->display();
	}

	//验证码
	public function verify(){
		ob_end_clean();
		$verify=new \Think\Verify();
		$verify->entry();
	}

	//登录验证
	public function checkLogin(){
		$where['username']=I("username");
		$where['password']=md5(I("password"));
		$code=I('code');
		$verify=new \Think\Verify();
		if($verify->check($code)){
			$m=M("members");
			$result=$m->where($where)->find();
			$m=null;
			$verify=null;
			if($result){
				session('username',$result['username']);
				session('uid',$result['uid']);
				$this->success('登录成功!',U('Admin/Index/index'));
			}else{
				$this->error('账号或密码错误!',U('Admin/Login/index'));
			}
		}else{
			$this->error('验证码错误!',U('Admin/Login/index'));
		}
	}

	//退出
	public function logout(){
		unset($_SESSION['username']);
		unset($_SESSION['uid']);
		$this->success('退出成功!',U('Admin/Index/index'));
	}
}




 ?>