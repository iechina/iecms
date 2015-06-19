<?php
class WqlshowAction extends UserAction{

    public function index(){
        
		$this->canUseFunction('Wqlshow');
		
		$where['token'] = session('token');
		
		
		$Data = M('Wqlshow');
		$count = $Data->where($where)->count();
		$page = new Page($count,25);
		
		$info = $Data->where(array('token'=>session('token')))->order('id DESC')->limit($page->firstRow.','.$page->listRows)->select();
		
		$this->info = $info;
		$this->page = $page->show();
		$this->display();
		
	}
	public function edit(){
	
		$where['token'] = session('token');
		$where['id']                  =   $this->_get('id');
		$Cdata = M('Wqlshow');
		$info = $Cdata->where($where)->find();
		$this->info = $info;
		$this->id = $where['id'];
		$this->display('add');
	}
	public function add(){
	
		$where['token'] = session('token');
		$id = $this->_get('id');
		
		$Cdata = M('Wqlshow');
		$this->id = $where['id'];
		$info = $Cdata->where(array('id'=>$id))->find();
		
		$this->info = $info;
		if(IS_POST){
			$where['token'] = session('token');
			
			$data['pic'] = strip_tags($_POST['pic']);
			$data['title'] = strip_tags($_POST['title']);
			$data['keyword'] = strip_tags($_POST['keyword']);
			$data['jianjie'] = strip_tags($_POST['jianjie']);
			$data['Hfcontent'] = strip_tags($_POST['Hfcontent']);
			$data['banner'] = strip_tags($_POST['banner']);
			$data['tel'] = strip_tags($_POST['tel']);
			$data['longitude'] = strip_tags($_POST['longitude']);
			$data['latitude'] = strip_tags($_POST['latitude']);
			$data['address'] = strip_tags($_POST['address']);
			$data['info'] = strip_tags($_POST['info']);
			$data['logo'] = strip_tags($_POST['logo']);
			$data['zh'] = strip_tags($_POST['zh']);
			$data['mc'] = strip_tags($_POST['mc']);
		
			
			
			$res=$Cdata->where($where)->find();
			        $data1['pid']=$id;
                    $data1['module']='Wqlshow';
                    $data1['token']=session('token');
                    $data1['keyword']=$_POST['keyword'];
					$where['module']='Wqlshow';
					$where['pid']=$res['id'];
			if($info){
				$result = M('Wqlshow')->where((array('id'=>$id)))->save($data);
				if($result){
					$res=M('Wqlshow')->where((array('id'=>$id)))->find();
				   
					$re=M('Keyword')->where(array('module'=>'Wqlshow','token'=>session('token'),'pid'=>$id))->find();
					if($re){
                   
					
					}else ;
					
					$insert2= M('keyword')->where(array('module'=>'Wqlshow','token'=>session('token'),'pid'=>$id))->save($data1);
					$this->success('更新成功!',U('Wqlshow/index',array('token'=>$this->token)));
				}else{
					$this->error('服务器繁忙 更新失败!');
				}
			}else{
				$data['token'] = session('token');
				$insert = M('Wqlshow')->add($data);
				$res=$Cdata->where(array('token'=>session('token'),'id'=>$id))->find();
				
			        $data1['pid']=$insert;
                    $data1['module']='Wqlshow';
                    $data1['token']=session('token');
                    $data1['keyword']=$_POST['keyword'];
					$where['module']='Wqlshow';
				$insert1 =M('keyword')->add($data1);
				if($insert > 0){
					$this->success('添加成功!',U('Wqlshow/index',array('token'=>$this->token)));
				}else{
					$this->error('添加失败!');
				}
			}
		}else{
			$this->display();
		}
	
	}

	public function delete(){
		$where['id'] = $this->_get('id');
		$where['token'] = session('token');
		$info = M('Wqlshow')->where($where)->delete();
		if($info){
			$this->success('删除成功!');
		}else{
			$this->error('删除失败!');
		}
	}
	
	
}



?>