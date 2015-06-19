<?php

//web

class EqxAction extends UserAction{

	public $token;

	


	public function _initialize() {

		parent::_initialize();
		

		$token_open=M('token_open')->field('queryname')->where(array('token'=>session('token')))->find();

		



		$this->Eqx=$eqx_User = M('aaaa.users','cj_')->where(array('token'=>session('token'))) ;


		$this->token=session('token');

		$this->assign('token',$this->token);

	


	}


	


	public function index(){
      $User = M('users','cj_','mysql://'.C('eqxuser').':'.C('eqxpassword').'@localhost/'.C('eqxname').''); 
	  $Users = M('scene','cj_','mysql://'.C('eqxuser').':'.C('eqxpassword').'@localhost/'.C('eqxname').''); 
	 
		
		$eqx = $User->where(array('email_varchar'=>session('token')))->find() ;
		
		 //dump($eqx);exit;
		$count=$eqx_scene=$Users->where(array('userid_int'=>$eqx['userid_int'],'delete_int'=>'0'))->count();
		$page=new Page($count,9);
		$eqx_scene=$Users->where(array('userid_int'=>$eqx['userid_int'],'delete_int'=>'0'))->order('createtime_time desc')->limit($page->firstRow.','.$page->listRows)->select();
		$num=$Users->where(array('userid_int'=>$eqx['userid_int']))->order('createtime_time desc')->count();//数量统计
		$sum=$Users->where(array('userid_int'=>$eqx['userid_int']))->order('createtime_time desc')->sum('hitcount_int');//数量统计
		$date_count=$Users->where(array('userid_int'=>$eqx['userid_int']))->order('createtime_time desc')->sum('datacount_int');//数量统计
		
		$token=session('token');
		
		
		
		

        $this->assign('page',$page->show());
		$this->assign('eqx',$eqx);
		$this->assign('num',$num);
		$this->assign('sum',$sum);
		$this->assign('date_count',$date_count);
		$this->assign('info',$eqx_scene);
		$this->assign('token',$token);


		$this->display();

	}
	public function del(){
		$Users = M('scene','cj_','mysql://'.C('eqxuser').':'.C('eqxpassword').'@localhost/'.C('eqxname').''); 
		$id=$_GET['id'];
		$date['delete_int']='1';
		$dd=$Users->where(array('sceneid_bigint'=>$id))->save($date);//
		if($dd){
			$this->success('删除成功');exit;}else{$this->error('删除失败');exit;}
	}
	


	public function set(){
		$db=M('eqx_info');
		$pic=$_GET['pic'];
		$name=$_GET['name'];
		$desc_varchar=$_GET['desc_varchar'];
		
		$sceneid_bigint=$_GET['id'];
		$a=$db->where(array('token'=>$_GET['token'],'sceneid_bigint'=>$_GET['sceneid_bigint']))->find();
		
if(empty($a)){ 
		       $a['picurl']=$pic;
			    $a['title']=$name;
				  $a['info']=$desc_varchar;
			
			
		     	}
		if(IS_POST){
			$date['keyword']=$_POST['keyword'];
			$date['title']=$_POST['title'];
			$date['info']=$_POST['info'];
			$date['picurl']=$_POST['picurl'];
			$date['url']=$_GET['url'];
			$date['token']=$_GET['token'];
			$date['pic']=$_POST['pic'];
			$date['sceneid_bigint']=$_GET['sceneid_bigint'];
			if(empty($a['id'])){
				
			$dd=$db->add($date);
			if($dd){
				$da['keyword']=$_POST['keyword'];
				$da['pid']=$dd;
				$da['module']='eqx';
				$da['token']=$_GET['token'];
				$info=M('keyword')->add($da);
				$this->success('添加成功');exit;
				                             }
			else{ $this->success('添加失败');exit;}	 
       }else{
	
	   $ds=$db->where(array('id'=>$a['id'],'token'=>$_GET['token']))->save($date);
	    if($ds){
				$da['keyword']=$_POST['keyword'];
				
				$da['module']='eqx';
				$da['token']=$_GET['token'];
				$info=M('keyword')->where(array('token'=>$_GET['token'],'module'=>'eqx','pid'=>$a['id']))->save($da);
				$this->success('更新成功',U('Eqx/index',array('token'=>session('token'))));exit;
				                             }
			else{ $this->error('更新失败',U('Eqx/index',array('token'=>session('token'))));exit;}	}}
	
	
	
	
	
	
		
		$this->assign('pic',$pic);
		$this->assign('a',$a);
		$this->display();
		
	}
	
	
	
	
  

}





?>