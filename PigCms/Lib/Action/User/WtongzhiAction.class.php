<?php
class WtongzhiAction extends UserAction{

	public function index(){
		$token=$_GET['token'];
		$info=M('wtongzhi')->where(array('token'=>$token))->find();
		
		
	if($_POST){
		$date['token']=$_GET['token'];
		$date['statue']=$_POST['statue'];
		$date['openid']=$_POST['openid'];
		if(empty($info)){
		      $a=M('wtongzhi')->add($date);
		                   if($a){
			                          $this->success('添加成功');exit;
			
			                      }
						else{$this->error('添加失败');exit;}
		
		
		
		}else{
		$as=M('wtongzhi')->where(array('token'=>$token))->save($date);
		if($as){
			$this->success('更新成功');exit;
			}	else{$this->error('更新失败');exit;}
			
			
			}}
			
			$this->assign('info',$info);
		$this->display();
	}
	
	    
	
	
}


?>