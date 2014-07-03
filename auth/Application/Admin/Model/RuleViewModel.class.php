<?php 
namespace Admin\Model;
use Think\Model\ViewModel;
class RuleViewModel extends ViewModel{
	public $viewFields=array(		
		'rule'=>array('_table'=>'tk_auth_rule','id','name','title','type','condition'=>'term','status','mid'),
		//condition必须别名,否则出错
		'modules'=>array('moduleName','_on'=>'rule.mid=modules.id')
		);
}
 ?>