<?php 
namespace Admin\Controller;
use Admin\Controller\AdminController;
class MemberController extends AdminController{
	//添加会员
	public function addHandle(){
		$data['username']=I('username');
		$data['password']=I('password','','md5');
		$data['score']=I('score','0');
		//所属角色id
		$groupName=I("groupName");
		$m=M('members');
		if($uid=$m->add($data)){
			//会员$uid
			$where['uid']=$uid;
			$where['group_id']=$groupName;
			$g=M("auth_group_access");
			if($g->add($where)){
				$this->success('添加成功!');
			}else{
				$this->error('添加失败');
			}			
		}else{
			$this->error('添加失败');
		}
	}

	//会员列表
	public function memberList(){
		$m=M('members');
		//总记录数
		$count=$m->count();
		//每页显示多少条记录
		$page=new \Think\Page($count,8);
		//分页栏每页显示的页数
		$page->rollPage='9';
		//设置显示排列样式,默认是不显示总记数,也就是%HEADER%
		$page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$show=$page->show();
		$data=$m->field('password',true)->limit($page->firstRow.','.$page->listRows)->order('uid desc')->select();
		$this->assign('data',$data);
		$this->assign('num',$page->firstRow);
		$this->assign('page',$show);
		$this->display();
	}

	//添加会员页面
	public function memberAdd(){
		$m=M('auth_group');
		$data=$m->where('status=1')->field('id,title')->select();
		$this->data=$data;
		$this->display();
	}

	//删除会员
	public function deleteHandle(){
		//dump($_GET);
		$where['uid']=I('uid');
		$m=M('members');
		$result=$m->where($where)->delete();
		if($result){
			$this->success("会员删除成功!");
		}else{
			$this->error('会员删除失败!');
		}
	}
}
 ?>