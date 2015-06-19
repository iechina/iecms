<?php
class WkAction extends UserAction{

    public function index(){
        
		$this->canUseFunction('Wk');
		
		$where['token'] = session('token');
		
		
		$Data = M('Wk');
		$count = $Data->where($where)->count();
		$page = new Page($count,25);
		
		$info = $Data->where(array('token'=>session('token')))->order('id DESC')->limit($page->firstRow.','.$page->listRows)->select();
		
		$this->info = $info;
		$this->page = $page->show();
		$this->display();
		
	}
	public function replay(){
	
		$where['token'] = session('token');
		$Cdata = M('Wkreplay');
		$info = $Cdata->where($where)->find();
		$this->info = $info;
		if(IS_POST){
			$where['token'] = session('token');
			$data['pic'] = strip_tags($_POST['pic']);
			$data['title'] = strip_tags($_POST['title']);
			$data['keyword'] = strip_tags($_POST['keyword']);
			$data['jianjie'] = strip_tags($_POST['jianjie']);
			$data['name'] = strip_tags($_POST['name']);
			$data['lj'] = strip_tags($_POST['lj']);
			$data['sm'] = strip_tags($_POST['sm']);
			$data['erweima'] = strip_tags($_POST['erweima']);
			
			$res=$Cdata->where($where)->find();
			        $data1['pid']=$res['id'];
                    $data1['module']='Wk';
                    $data1['token']=session('token');
                    $data1['keyword']=$_POST['keyword'];
					$where['module']='Wk';
			if($info){
				$result = M('Wkreplay')->where($where)->save($data);
				if($result){
					$res=M('Wkreplay')->where($where)->find();
				    
					$re=M('Keyword')->where(array('module'=>'Wk','token'=>session('token')))->find();
					if($re){
                    M('keyword')->where($where)->save($data1);
					}else ;
					$this->success('回复信息更新成功!');
				}else{
					$this->error('服务器繁忙 更新失败!');
				}
			}else{
				$data['token'] = session('token');
				$insert = M('Wkreplay')->add($data);
				$res=$Cdata->where($where)->find();
			        $data1['pid']=$res['id'];
                    $data1['module']='Wk';
                    $data1['token']=session('token');
                    $data1['keyword']=$_POST['keyword'];
					$where['module']='Wk';
				$insert1 =M('keyword')->add($data1);
				if($insert > 0){
					$this->success('回复信息添加成功!');
				}else{
					$this->error('回复信息添加失败!');
				}
			}
		}else{
			$this->display();
		}
	
	}
	 public function add(){
	 
	 	
		$t_Wk=M('Wk');
		if(IS_POST){
		    $data['token']=session('token');
			$data['content']=$this->_post('info');
			if($data['content']==""){
				echo "请填写默认祝福语";
				exit;	
			}
			$res=$t_Wk->add($data);
			if($res){
				$this->success('添加成功',U('Wk/index',array('token'=>session('token'))));
			}else{
				
				$this->error('主题活添加失败!');
			}
		
		}else $this->display();
	}
	
	public function edit(){
		$id = $this->_get('id');
		$where['id'] = $id;
		$where['token'] = session('token');
		if(IS_POST){
			$data['content']	= strip_tags($_POST['info']);
			if(empty($data['content'])) $this->error('祝福语不能够为空!');
			$up = M('Wk')->where($where)->save($data);
			if($up){
				$this->success('添加成功',U('Wk/index',array('token'=>session('token'))));
			}else{
				$this->error('祝福语更新失败!');
			}
		}else{
			$info = M('Wk')->where($where)->find();
			$this->info = $info;
			$this->display();
		}
	} 
	public function delete(){
		$where['id'] = $this->_get('id');
		$where['token'] = session('token');
		$info = M('Wk')->where($where)->delete();
		if($info){
			$this->success('删除成功!');
		}else{
			$this->error('删除失败!');
		}
	}
	
	
}



?>