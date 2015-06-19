<?php

class WqlshowAction extends WapAction {

	public function index(){
 

	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$info=M('wqlshow')->where(array('id'=>$id))->find();
		$infos=M('home')->where(array('token'=>$token))->find();
		$click = M('wqlshow')->where(array('id' => $id ))->setInc('click');
		$this->assign('info',$info);
		$this->assign('infos',$infos);
		
		$this->display();

	}
	public function aiqing(){
	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$sm=M('Hcarreplay')->where('id='.$id)->find();
		$this->assign('sm',$sm);
		$sm['sm']=$sm['sm'].'#wechat_redirect';
		
		$this->display();

	}
	
	
}