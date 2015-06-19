<?php

class WkAction extends WapAction {

	public function index(){
			
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();

	}
    public function shengri(){
			
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();

	}

    public function zhuhe(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();

	}

	public function aiqing(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();

	}

    public function qinyou(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();

	}

	public function xinqing(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();

	}

	public function ganxie(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();
	}

	public function daoqian(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();

	}

	public function daqi(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();

	}

    public function huimian(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();

	}

	public function jieri(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();

	}

	public function shangwu(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();
	}

	public function qita(){	
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];		
		$this->assign('lj',$lj);	
		
		$this->display();
	}
	
	public function Wk_view(){
	    $Cdata = M('Wkreplay');
		$info = $Cdata->where($where)->find();
		$this->info = $info;
		$wecha_id= $this->_get('wecha_id');
		$token = $this->_get('token');
		
		$id=$this->_get('id');
		$cardid=$this->_get('cardid');
		$mode=$this->_get('mode');
		
		$target=$this->_get('target');
		$targetanswer=$this->_get('targetanswer');
		if($cardid==""){
			echo "非法操作";
			exit;
		}
		$t_carreplay=M('Wkreplay')->where('id='.$id)->find();
		$t_carreplay['lj'] = str_replace("&amp;","&",$t_carreplay['lj']);
		$t_carreplays['lj']=$t_carreplay['lj'].'#wechat_redirect';
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];
		$this->assign('id',$id);		
		$this->assign('lj',$lj);
		$this->assign('fxlj',$t_carreplays['lj']);
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);		
		$this->assign('targetanswer',$targetanswer);
		$this->assign('cardid',$cardid);
		$this->assign('target',$target);
		$this->assign('mode',$mode);
		$this->display($cardid.'_view');
	}
	public function Hcar_make(){
		$Cdata = M('Wkreplay');
		$info = $Cdata->where($where)->find();
		$this->info = $info;
	    $wecha_id= $this->_get('wecha_id');
		$cardids= $this->_get('cardids');
		$token = $this->_get('token');
		$words=$this->_get('words');
		$id=$this->_get('id');		
		$cardBody=$this->_get('cardBody');
		$cardTo=$this->_get('cardTo');
		$cardFrom=$this->_get('cardFrom');
		$cardid=$this->_get('cardid');
		
		$action=$this->_get('action');
		$t_hcar=M('Wk');
		$hcar=$t_hcar->where(array('token'=>$token))->select();
		if($cardid==""){
			echo "非法操作";
			exit;
		}
		if($cardBody){
			$arr = array("，" => "，<br>", "。" => "。<br>","！"=>"！<br>","？"=>"？<br>");
			$cardBody=strtr($cardBody,$arr);
		}
		$lj=M('Wkreplay')->where('id='.$id)->find();
		$lj['lj']=$lj['lj'];
		$this->assign('lj',$lj);
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$this->assign('cardid',$cardid);
		$this->assign('cardids',$cardids);
		$this->assign('words',$words);
		$this->assign('hcar',$hcar);
		$this->assign('cardBody',$cardBody);
		$this->assign('cardTo',$cardTo);
		$this->assign('cardFrom',$cardFrom);
		$t_carreplay=M('Wkreplay')->where('id='.$id)->find();
		$t_carreplay['lj'] = str_replace("&amp;","&",$t_carreplay['lj']);
		$t_carreplays['lj']=$t_carreplay['lj'].'#wechat_redirect';
		
		$this->assign('fxlj',$t_carreplays['lj']);
		if($action==1){
		$this->display($cardid.'_view');
		}else
		$this->display();

		
	}
	}