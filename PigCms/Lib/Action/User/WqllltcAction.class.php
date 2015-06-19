<?php
class WqllltcAction extends UserAction{

    public function index(){
        
		$this->canUseFunction('Wqllltc');
		
		$where['token'] = session('token');
		
		
		$Data = M('Wqllltc');
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
		$Cdata = M('Wqllltc');
		$info = $Cdata->where($where)->find();
		$this->info = $info;
		$this->id = $where['id'];
		$this->display('add');
	}
	public function add(){
	
		$where['token'] = session('token');
		$id = $this->_get('id');
		
		$Cdata = M('Wqllltc');
		$this->id = $where['id'];
		$info = $Cdata->where(array('id'=>$id))->find();
		
		$this->info = $info;
		if(IS_POST){
			$where['token'] = session('token');
			
			$data['hddw'] = strip_tags($_POST['hddw']);
			$data['lltc'] = strip_tags($_POST['lltc']);
			$data['bhll'] = strip_tags($_POST['bhll']);
			$data['zsyw'] = strip_tags($_POST['zsyw']);
			$data['ewzs'] = strip_tags($_POST['ewzs']);
			$data['xz'] = strip_tags($_POST['xz']);
			
			$data['info'] = strip_tags($_POST['info']);
		
			
			
			$res=$Cdata->where($where)->find();
			        $data1['pid']=$id;
                    $data1['module']='Wqllltc';
                    $data1['token']=session('token');
                    $data1['keyword']=$_POST['keyword'];
					$where['module']='Wqllltc';
					$where['pid']=$res['id'];
			if($info){
				$result = M('Wqllltc')->where((array('id'=>$id)))->save($data);
				if($result){
					$res=M('Wqllltc')->where((array('id'=>$id)))->find();
				   
					$re=M('Keyword')->where(array('module'=>'Wqllltc','token'=>session('token'),'pid'=>$id))->find();
					if($re){
                   
					
					}else ;
					
					
					$this->success('更新成功!',U('Wqllltc/index',array('token'=>$this->token)));
				}else{
					$this->error('服务器繁忙 更新失败!');
				}
			}else{
				$data['token'] = session('token');
				$insert = M('Wqllltc')->add($data);
				$res=$Cdata->where(array('token'=>session('token'),'id'=>$id))->find();
				
			        $data1['pid']=$insert;
                    $data1['module']='Wqllltc';
                    $data1['token']=session('token');
                    $data1['keyword']=$_POST['keyword'];
					$where['module']='Wqllltc';
				
				if($insert > 0){
					$this->success('添加成功!',U('Wqllltc/index',array('token'=>$this->token)));
				}else{
					$this->error('添加失败!');
				}
			}
		}else{
			$this->display();
		}
	
	}
public function replay(){
	
		$where['token'] = session('token');
		$Cdata = M('wqllltcreplay');
		$info = $Cdata->where($where)->find();
		$this->info = $info;
		if(IS_POST){
			$where['token'] = session('token');
			$data['pic'] = strip_tags($_POST['pic']);
			$data['title'] = strip_tags($_POST['title']);
			$data['keyword'] = strip_tags($_POST['keyword']);
			$data['jianjie'] = strip_tags($_POST['jianjie']);
			$data['gz'] = strip_tags($_POST['gz']);
			$data['tz'] = strip_tags($_POST['tz']);
			
			
			$res=$Cdata->where($where)->find();
			        $data1['pid']=$res['id'];
                    $data1['module']='Wqllltc';
                    $data1['token']=session('token');
                    $data1['keyword']=$_POST['keyword'];
					$where['module']='Wqllltc';
			if($info){
				$result = M('wqllltcreplay')->where($where)->save($data);
				if($result){
					$res=M('wqllltcreplay')->where($where)->find();
				    
					$re=M('Keyword')->where(array('module'=>'Wqllltc','token'=>session('token')))->find();
					if($re){
                    M('keyword')->where($where)->save($data1);
					}else ;
					$this->success('回复信息更新成功!');
				}else{
					$this->error('服务器繁忙 更新失败!');
				}
			}else{
				$data['token'] = session('token');
				$insert = M('wqllltcreplay')->add($data);
				$res=$Cdata->where($where)->find();
			        $data1['pid']=$res['id'];
                    $data1['module']='Wqllltc';
                    $data1['token']=session('token');
                    $data1['keyword']=$_POST['keyword'];
					$where['module']='Wqllltc';
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
	public function user(){
		
		$where['token'] = session('token');
		$info = M('Wqllltc_user')->where($where)->select();
		$this->info = $info;
		$this->display();
	}
	public function doit(){
		
		$where['token'] = session('token');
		$where['id'] = $this->_get('id');
		$date['statue']=1;
		$info = M('Wqllltc_user')->where($where)->save($date);
		if($info){
					$this->success('处理成功!',U('Wqllltc/user',array('token'=>$this->token)));exit;
				}else{
					$this->error('处理失败!');exit;
				}
		$this->info = $info;
		$this->display();
	}
	public function delete(){
		$where['id'] = $this->_get('id');
		$where['token'] = session('token');
		$info = M('Wqllltc')->where($where)->delete();
		if($info){
			$this->success('删除成功!');
		}else{
			$this->error('删除失败!');
		}
	}
	
	
}



?>