<?php


class HvoteAction extends WapAction{
	 public function _initialize() {
		parent::_initialize();
		session('wapupload',1);
		
	}
	/**
	首页显示
	**/
	public function index(){
		
		//$agent = $_SERVER['HTTP_USER_AGENT']; 
		//if(!strpos($agent,"icroMessenger")) {
		//	echo '此功能只能在微信浏览器中使用';exit;
		//}
		
		$token=$this->_get('token');
		$id=$this->_get('id');
		$wecha_id=$this->_get('wecha_id');
		$data=M('Hvote')->where(array('token'=>$token,'id'=>$id))->find();
		$piclist=M('Hvote_flash')->where(array('token'=>$token,'tip'=>$id))->select();
		$this->assign('piclist',$piclist);
		$zzs=M('Hvote_zzs')->where('vid='.$id)->select();
		$this->assign('zzs',$zzs);
		$this->assign('vote',$data);
		
		$this->assign('token',$token);
		$this->assign('wecha_id',$wecha_id);
		$this->assign('id',$id);
		$this->display();	
	}
	
	
	public function paiming(){
		
		$token=$this->_get('token');
		$id=$this->_get('id');
		$wecha_id=$this->_get('wecha_id');
		
		$vote 	= M('Hvote')->where(array('token'=>$token,'id'=>$id))->find();
        if(empty($vote)){
            exit('非法操作');
		}
		
		$piclist=M('Hvote_flash')->where(array('token'=>$token,'tip'=>$id))->select();
		$this->assign('piclist',$piclist);
				
		$list = M('Hvote_item')->where(array('vid'=>$vote['id'],'checks'=>1))->order('vcount DESC')->select();
		$this->assign('wecha_id',$wecha_id);
		$this->assign('list',$list);
		$this->assign('token',$token);
		$this->assign('vote',$vote);
		$this->assign('id',$id);
		$this->display();
		}
	
    /**
	选手列表页
	**/
	public function toupiao(){
	
		//$agent = $_SERVER['HTTP_USER_AGENT']; 
		//if(!strpos($agent,"icroMessenger")) {
		//	echo '此功能只能在微信浏览器中使用';exit;
		//}
		$token		= $this->_get('token');
		$wecha_id	= $this->_get('wecha_id');
        $id         = $this->_get('id');
        $this->assign('token',$token);
        $this->assign('wecha_id',$wecha_id);
        $this->assign('id',$id);
		$t_vote		= M('Hvote');
        $t_record  = M('Hvote_record');
		//dump($this->$token);exit;
		//$where 		= array('token'=>$token,'id'=>$id);
		$vote 	= $t_vote->where(array('token'=>$token,'id'=>$id))->find();
        if(empty($vote)){
            exit('非法操作');
        }
		
		$piclist=M('Hvote_flash')->where(array('token'=>$token,'tip'=>$id))->select();
		$this->assign('piclist',$piclist);
		
		$wuser=M('Wxuser')->where(array('token'=>$token))->find();
		$this->assign('wuser',$wuser);
		
		/**添加搜索功能**/
		$key=$_POST['key'];
		if($key!=''){
		
			if(eregi('^[0-9]+$',$key)){
			$key=(int)$key;
			
    		$condition['rank']= array('like',$key.'%');	
			
			}else{
			
		 		$condition['item']= array('like',$key.'%');
		 	
			}
		 $condition['vid'] = $vote['id'];
		 $condition['checks'] = 1;
		 $vote_item = M('Hvote_item')->where($condition)->order('rank asc,vcount DESC')->select(); 
		}else  $vote_item = M('Hvote_item')->where(array('vid'=>$vote['id'],'checks'=>1))->order('vcount DESC')->select(); 
        
		$vcount =  M('Hvote_item')->where(array('vid'=>$vote['id'],'checks'=>1))->sum("vcount");
        $this->assign('count',$vcount);
       

        if($key!=''){
		 //echo $key;
		 $condition['vid'] =$id;
		 $condition['checks'] =1;
		 $condition['item']= array('like',$key.'%');
		 $item_count = M('Hvote_item')->where($condition)->order('vcount DESC')->select(); 
		}else $item_count = M('Hvote_item')->where(array('vid'=>$id,'checks'=>1))->order('vcount DESC')->select();
		
        $vote['info']=html_entity_decode($vote['info']);
        $this->assign('total',$total);
        $this->assign('vote_item', $vote_item);
        $this->assign('vote',$vote);
		$this->display();
	}
    
	
	/***
	选手详细页面
	**/
	public function item_view(){
		
		
	    //$agent = $_SERVER['HTTP_USER_AGENT']; 
		//if(!strpos($agent,"icroMessenger")) {
		//	echo '此功能只能在微信浏览器中使用';exit;
		//}
		$token		= $this->_get('token');
		$wecha_id	= $this->_get('wecha_id');
        $id         = $this->_get('id');
		$vid         = $this->_get('vid');
        $this->assign('token',$token);
        $this->assign('wecha_id',$wecha_id);
        $this->assign('id',$id);
		$this->assign('vid',$vid);

		$t_vote		= M('Hvote');
		$t_item     =M('Hvote_item'); 
        $t_record  = M('Hvote_record');
		$wuser=M('Wxuser')->where(array('token'=>$token))->find();
		$where 		= array('token'=>$token,'id'=>$id);
		$vote 	= $t_vote->where($where)->find();
		$zzs=M('Hvote_zzs')->where('vid='.$id)->select();
		$this->assign('zzs',$zzs);
        if(empty($vote)){
            exit('非法操作');
        }
		
	    
		
		$item 	= $t_item->where(array('id'=>$vid))->find();
		$item['content']=html_entity_decode($item['content']);
        $vote_item = M('Hvote_item')->where(array('vid'=>$id))->order('vcount DESC')->select();
		
		
		foreach($vote_item as $k=>$value){
			
			if($vote_item[$k]['id']==$vid){
				
				$vpm=$k+1;
			}
		}
		
		
	    $vote['zzs']=html_entity_decode($vote['zzs']);
		$this->assign('vpm',$vpm);
        $this->assign('item',$item);
	    $this->assign('vote',$vote);
		$this->assign('wuser',$wuser);

		$this->display();
		
		}
	
	
    //美女报名入口
	public function baoming(){
		
    
			
	//$agent = $_SERVER['HTTP_USER_AGENT']; 
	//	if(!strpos($agent,"icroMessenger")) {
	//		echo '此功能只能在微信浏览器中使用';exit;
	//}
			/**
			美女投票报名入口
			*/
			if(IS_POST){
				
				$Hvote_t=M("Hvote_item");
				$data['vid']=$this->_post('mid');
				$data['token']=$this->_post('token');
				$data['item']=$this->_post('name');
				$data['phone']=$this->_post('phone');
				$data['startpicurl']=$this->_post('pics1');
				$data['pics2']=$this->_post('pics2');
				$data['pics3']=$this->_post('pics3');
				$data['pics4']=$this->_post('pics4');
				$data['pics5']=$this->_post('pics5');
				$data['movie_link']=$this->_post('movie_link');
				$in=$Hvote_t->where(array('token'=>$data['token'],'vid'=>$data['vid']))->find();
				if(empty($in)){
				$data['rank']=1;	
					
					}else{
				$ins=$Hvote_t->where(array('token'=>$data['token'],'vid'=>$data['vid']))->order('rank desc')->limit(1)->find();		
						
					$data['rank']=$ins['rank']+1;	
						}
				if($data['startpicurl']){
				   // $str=""
					$data['content'].="<p><img src=".$data['startpicurl']." width=80% ></p>";
				}
				if($data['pics2']){
				   // $str=""
					$data['content'].="<p><img src=".$data['pics2']." width=80% ></p>";
				}
				if($data['pics3']){
				   // $str=""
					$data['content'].="<p><img src=".$data['pics3']." width=80% ></p>";
				}
				if($data['pics4']){
				   // $str=""
					$data['content'].="<p><img src=".$data['pics4']." width=80% ></p>";
				}
				if($data['pics5']){
				   // $str=""
					$data['content'].="<p><img src=".$data['pics5']." width=80% ></p>";
				}
				$data['content'].=$this->_post('content');
				
				$check=$Hvote_t->where(array('vid'=>$data['vid'],'phone'=>$data['phone']))->find();
				
				if($check){
					
					$this->error('亲，您已经报名啦！',U('Hvote/baoming',array('id'=>$data['vid'])));
						
				}
				
				if($data['item']=='' || $data['phone']=='' || $data['content']==''){
					
					$this->error('请完善信息！',U('Hvote/baoming',array('id'=>$data['vid'])));
				
				}
				if($data['startpicurl']==''){
					
					$this->error('至少上传一张图片！',U('Hvote/baoming',array('id'=>$data['vid'])));
				
				}
				
				$res=$Hvote_t->add($data);
				
				if($res){
					
					$this->success('报名成功，请继续关注我们的信息！',U('Hvote/index',array('token'=>$data['token'],'id'=>$data['vid'])));
				}else{
					
					$this->error('请完善信息！',U('Hvote/baoming',array('id'=>$data['vid'])));
					
				}
				
			}else{
				$id=$this->_get('id');
				$token=$this->_get('token');
				$piclist=M('Hvote_flash')->where(array('token'=>$token,'tip'=>$id))->select();
		        $this->assign('piclist',$piclist);
				
				
				$data=M('Hvote')->where('id='.$id)->find();
				
				if($data['zxbm']==0){
					$this->error('在线报名已经关闭！',U('Hvote/index',array('token'=>$data['token'],'id'=>$data['id'])));
				}
				$data['zzs']=html_entity_decode($data['zzs']);
				$this->assign('data',$data);
				$this->assign('token',$token);
				$this->assign('id',$id);
				$this->display();
				
			}
		}
	
	
}?>