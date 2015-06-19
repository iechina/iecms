<?php

class WqllltcAction extends WapAction {

	public function index(){
 

	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$info=M('Wqllltc')->where(array('token'=>$token))->select();
		$infoss=M('wqllltcreplay')->where(array('token'=>$token))->find();
		$infos=M('home')->where(array('token'=>$token))->find();
		
		$this->assign('info',$info);
		$this->assign('infoss',$infoss);
		$this->assign('infos',$infos);
		
		$this->display();

	}
	
	public function bl(){
 

	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$info=M('Wqllltc')->where(array('token'=>$token,'id'=>$id))->find();
		
		$have=M('Wqllltc_user')->where(array('token'=>$token,'wecha_id'=>$wecha_id,'pid'=>$id))->find();
		$haves=M('wqllltcreplay')->where(array('token'=>$token))->find();
		$haves['tz']=str_replace("&amp;","&",$haves['tz']);
		
		$this->assign('info',$info);
		$this->assign('haves',$haves);
		$this->assign('have',$have);
		$this->display();

	}
	public function add(){
 

	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		$hddw = $this->_get('hddw');
		$id=$this->_get('id');
		$phone=$this->_get('phone');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$date['wecha_id']=$wecha_id;
		$date['token']=$token;
		$date['pid']=$id;
		$date['hddw']=$hddw;
		$date['phone']=$phone;
		$have=M('Wqllltc_user')->where(array('token'=>$token,'wecha_id'=>$wecha_id,'pid'=>$id))->find();
		
		$this->assign('have',$have);
		if(!empty($have)){
			echo 2;exit;	
			
		}else{
			$info=M('Wqllltc_user')->add($date);
		}
		
		
		if($info){
			
		echo 1;exit;	
			}else{
				echo 0;exit;	}
		
		
		
		

	}
}