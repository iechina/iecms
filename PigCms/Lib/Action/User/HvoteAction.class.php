<?php
class HvoteAction extends UserAction{
	
	public $tip;
	public function _initialize(){
		parent::_initialize();
		if (isset($_GET['tip'])){
			$this->tip=$this->_get('tip','intval');
		}else {
			$this->tip=1;
		}
		$this->assign('tip',$this->tip);
	}
	
	public function flash(){
		$db=D('Hvote_flash');

		//tip区分是幻灯片还是背景图
		$tip=$this->tip;

		$where['uid']=session('uid');
		$where['token']=session('token');
		$where['tip']=$tip;
		$count=$db->where($where)->count();
		$page=new Page($count,25);
		$info=$db->where($where)->order('sort desc,id DESC')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$page->show());
		$this->assign('info',$info);
		$this->assign('tip',$tip);
		$this->display();
	}
	
	public function flash_add(){
		$tip=$this->tip;
		$this->assign('tip',$tip);
		$this->display();
	}
	public function flash_insert(){
		$flash=D('Hvote_flash');
		$arr=array();
		$arr['token']=$this->token;
		$arr['img']=$this->_post('img');
		$arr['url']=$this->_post('url');
		$arr['info']=$this->_post('info');
		$arr['sort']=$this->_post('sort');
		$arr['tip']=$this->tip;
		$flash->add($arr);
		$this->success('操作成功',U(MODULE_NAME.'/flash',array('tip'=>$this->tip)));

		//$this->all_insert('Flash');
	}
	
	public function flash_edit(){
		$where['id']=$this->_get('id','intval');
		//$where['uid']=session('uid');
		$res=D('Hvote_flash')->where($where)->find();
		$this->assign('info',$res);
		$tip=$this->tip;
		$this->assign('tip',$tip);
		$this->assign('id',$this->_get('id','intval'));
		$this->display();
	}
	
	public function flash_del(){
		$tip=$this->tip;
		$where['id']=$this->_get('id','intval');
		$where['token']=$this->token;
		if(D('Hvote_flash')->where($where)->delete()){
			$this->success('操作成功',U(MODULE_NAME.'/flash',array('tip'=>$tip)));
		}else{
			$this->error('操作失败',U(MODULE_NAME.'/flash',array('tip'=>$tip)));
		}
	}
	
	public function flash_upsave(){
		$flash=D('Hvote_flash');
		$id=$this->_get('id','intval');
		$tip=$this->tip;
		$arr=array();
		$arr['img']=$this->_post('img');
		$arr['url']=$this->_post('url');
		$arr['info']=$this->_post('info');
		$arr['sort']=$this->_post('sort');
		$flash->where(array('id'=>$id))->save($arr);
		$this->success('操作成功',U(MODULE_NAME.'/flash',array('tip'=>$this->tip)));
	}

	
    public function index(){
        
		$this->canUseFunction('Hvote');
        $user=M('Users')->field('gid,activitynum')->where(array('id'=>session('uid')))->find();
        $group=M('User_group')->where(array('id'=>$user['gid']))->find();
        $this->assign('group',$group);
        $this->assign('activitynum',$user['activitynum']);
        $list=M('Hvote')->where(array('token'=>session('token')))->order('id DESC')->select();
        $count = M('Hvote')->where(array('token'=>session('token')))->count();
        $this->assign('count',$count);
        $this->assign('list',$list);
        $this->display();
    
	}
	
	 public function zzs(){
	 
	    $this->canUseFunction('Hvote');
		$vid=$this->_get('vid');
		$action=$this->_get('action');
		
		if(IS_POST){
		
			$data['vid']=$this->_get('vid');
			$data['pic']=$this->_post('pic');
			$data['lj']=$this->_post('lj');
			M('Hvote_zzs')->add($data);
		}
		
		if($action=='del'){
		
		    $id=$this->_get('id');
			M('Hvote_zzs')->where('id='.$id)->delete();
		
		}
		
		$zzs=M('Hvote_zzs')->where('vid='.$vid)->select();
		$this->assign('item',$zzs);
		$this->assign('vid',$vid);
		$this->display();
	 	
	 
	 }
	 
	
	 public function add(){
     
        if(IS_POST){
            $data=D('Hvote');
            $_POST['token']=session('token');
            $_POST['statdate']=strtotime($this->_post('statdate'));
            $_POST['enddate']=strtotime($this->_post('enddate'));
            $_POST['display'] = $this->_post("display");
            $_POST['info'] = str_replace('&nbsp;', '&amp;nbsp;', $this->_post("info"));
			$_POST['zzs'] = str_replace('&nbsp;', '&amp;nbsp;', $this->_post("zzs"));
            $_POST['picurl'] = $this->_post("picurl");
            $_POST['title'] = $this->_post("title");
            $_POST['keyword'] = $this->_post('keyword');
			$_POST['gz1'] = $this->_post('gz1');
			$_POST['gz2'] = $this->_post('gz2');
			$_POST['cg'] = $this->_post('cg');
			$_POST['sb'] = $this->_post('sb');
			$_POST['zzs'] = $this->_post('zzs');
			$_POST['lj'] = $this->_post('lj');
			$_POST['zxbm'] = $this->_post('zxbm');
			$_POST['dblj'] = $this->_post('dblj');
			$_POST['ljnn'] = $this->_post('ljnn');
			$_POST['gz3'] = $this->_post('gz3');
			$_POST['tpkeyword'] = $this->_post('tpkeyword');
            if($_POST['enddate']<$_POST['statdate']){
                $this->error('结束时间不能小于开始时间!');
                exit;
            }
            if($data->create()!=false){
                if($id=$data->add()){
                    $data1['pid']=$id;
                    $data1['module']='Hvote';
                    $data1['token']=session('token');
                    $data1['keyword']=$_POST['keyword'];
					$data2['pid']=$id;
                    $data2['module']='Tphvote';
                    $data2['token']=session('token');
                    $data2['keyword']=$_POST['tpkeyword'];
                    M('keyword')->add($data1);
					M('keyword')->add($data2);
                    $this->success('添加成功',U('Hvote/index',array('token'=>session('token'))));
                }else{
                    $this->error('服务器繁忙,请稍候再试');
                }
            }else{
                $this->error($data->getError());
            }
        }else{
            $this->display();
        }

    }

public function edit(){
       if(IS_POST){
            $data=D('Hvote');
            $_POST['id']= (int)$this->_post('id');
            $_POST['token']=session('token');
            $_POST['statdate']=strtotime($this->_post('statdate'));
            $_POST['enddate']=strtotime($this->_post('enddate'));
            $_POST['display'] = $this->_post("display");
			$_POST['info'] = str_replace('&nbsp;', '&amp;nbsp;', $this->_post("info"));
			$_POST['zzs'] = str_replace('&nbsp;', '&amp;nbsp;', $this->_post("zzs"));
            $_POST['picurl'] = $this->_post("picurl");
            $_POST['title'] = $this->_post("title");
			$_POST['gz1'] = $this->_post('gz1');
			$_POST['gz2'] = $this->_post('gz2');
			$_POST['cg'] = $this->_post('cg');
			$_POST['sb'] = $this->_post('sb');
			
			$_POST['lj'] = $this->_post('lj');
			$_POST['zxbm'] = $this->_post('zxbm');
			$_POST['dblj'] = $this->_post('dblj');
			$_POST['ljnn'] = $this->_post('ljnn');
			
			$_POST['gz3'] = $this->_post('gz3');
			
			$_POST['tpkeyword'] = $this->_post('tpkeyword');
			
             if($_POST['enddate']<$_POST['statdate']){
                $this->error('结束时间不能小于开始时间!');
                exit;
            }
            $where=array('id'=>$_POST['id'],'token'=>session('token'));
            $check=$data->where($where)->find();

            if($check==NULL) exit($this->error('非法操作'));
           
            if($data->create()){
                if($data->where($where)->save($_POST)){
                    $data1['pid']=$_POST['id'];
                    $data1['module']='Hvote';
                    $data1['token']=session('token');
                    $da['keyword']=trim($_POST['keyword']);
					
					$data2['pid']=$_POST['id'];
                    $data2['module']='Tphvote';
                    $data2['token']=session('token');
                    $das['keyword']=trim($_POST['tpkeyword']);
					$ok = M('keyword')->where($data2)->save($das);
                    $ok = M('keyword')->where($data1)->save($da);
                    $this->success('修改成功!',U('Hvote/index',array('token'=>session('token'))));exit;
                }else{
                    //$this->error('没有做任何修改！');exit;
                    $this->success('修改成功',U('Hvote/index',array('token'=>session('token'))));exit;
                }
            }else{
                $this->error($data->getError());
            }
        }else {
		
		    $id=(int)$this->_get('id');
            $where=array('id'=>$id,'token'=>session('token'));
            $data=M('Hvote');
            $check=$data->where($where)->find();
            if($check==NULL)$this->error('非法操作');
            $vo=$data->where($where)->find();
            $this->assign('vo',$vo);
            $this->display('add');
		
		}
   
   }
  
  public function del(){
        $id = $this->_get('id');
        $vote = M('Hvote');
        $find = array('id'=>$id);
        $result = $vote->where($find)->find();
         if($result){
            $vote->where('id='.$result['id'])->delete();
            M('Hvote_item')->where('vid='.$result['id'])->delete();
            M('Hvote_record')->where('vid='.$result['id'])->delete();
            $where = array('pid'=>$result['id'],'module'=>'Hvote','token'=>session('token'));
            M('Keyword')->where($where)->delete();
            $this->success('删除成功',U('Hvote/index',array('token'=>session('token'))));
         }else{
            $this->error('非法操作！');
         }
    } 
	
	public function shenhe(){
	
	    $vid=$this->_get('vid');
		$id=$this->_get('id');
		$item=M('Hvote_item');
		if(IS_POST){
			$allid=$this->_post('allid');
			$style=$this->_post('style');
			if(!empty($allid)&& !empty($style)){
				
				if($style==1){
				    $map['id']  = array('in',$allid);
					$re=$item->where($map)->setField('checks',1);
				    $this->success('审核成功！','/index.php?g=User&m=Hvote&a=item&token='.$this->token.'&id='.$vid);
					exit;
				}else if($style==2){
				    $map['id']  = array('in',$allid);
				    $re=$item->where($map)->setField('checks',0);
				    $this->success('取消审核！','/index.php?g=User&m=Hvote&a=item&token='.$this->token.'&id='.$vid);
					exit;
				}else if($style==3){
					
					$map['id']  = array('in',$allid);
				    $re=$item->where($map)->delete();
				    $this->success('删除成功！','/index.php?g=User&m=Hvote&a=item&token='.$this->token.'&id='.$vid);
					exit;
					
					}
				
			}
		}
		
		$re=$item->where('id='.$id)->setField('checks',1);
		if($re){
			$this->success('审核成功！','/index.php?g=User&m=Hvote&a=item&token='.$this->token.'&id='.$vid);
		}
	}
	 
	public function item(){
		
		$token=session('token');
		$vid=$this->_get('id');
		$t_item=M('Hvote_item');
		$order="vcount desc,id desc";
		if (IS_POST) {
				$key = $this->_post('keyword');
				$px  = $this->_post('px');	
				if($key){
					$where['item']=array('like',"%$key%");
				}
				if($px==1){
					$order="vcount desc";
				}else if($px==2){
					$order="vcount asc";
				}
		}
		//echo $order."+++".$px;
		$where['vid']=$vid;
		$where['token']=$token;		
		$count=$t_item->where(array("vid"=>$vid,'token'=>$token))->count();
		$counts = $t_item->where($where)->count();
	    $Page  = new Page($counts,20);
		$show  = $Page->show();
		$item=$t_item->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('vid',$vid);
		$this->assign('count',$count);
		$this->assign('item',$item);
        $this->display();
		}
	public function add_item(){
		$vid=$this->_get('vid');
		$t_vote=M('Hvote');
		$res=$t_vote->where('id='.$vid)->find();
		if($res==false){
			echo "非法操作";
			exit;
		}
		$this->assign('vid',$vid);
		$this->display('edite_item');
	}
	public function edite_item(){
	
			$vid=$this->_get('vid');
			$id=$this->_get('id');
			$t_item=M('Hvote_item');
			//$v_zs=M('Vote_z');
		    //$v_z=$v_zs->where('v_id='.$vid)->select();
			//dump($v_z);
			$item=$t_item->where('id='.$id)->find();
			if(empty($item)){
				$this->error('非法操作！','/index.php?g=User&m=Hvote&a=item&token='.$this->token.'&id='.$vid);
			}
			$this->assign("item",$item);
			$this->display();
			
	}
	public function delete_item(){
		    
			$vid=$this->_get('vid');
			$id=$this->_get('id');
			$t_item=M('Hvote_item');
			$t_item->where('id='.$id)->delete();
			
				$this->success('删除成功','/index.php?g=User&m=Hvote&a=item&token='.$this->token.'&id='.$vid);
			
			
	}
	public function save_item(){
	
	
	
			$vid=$this->_get('vid');
			$id=$this->_get('id');
			$t_item=M('Hvote_item');
			
			$data['item']=$this->_post('item');
			$data['vcount']=$this->_post('vcount');
			$data['content']=$this->_post('content');
			$data['startpicurl']=$this->_post('startpicurl');
			
			$data['movie_link']=$this->_post('movie_link');
			
			$data['rank']=$this->_post('rank');
			
			$data['movie_link']=$this->_post('movie_link');
			
			$data['phone']=$this->_post('phone');
			$in=$t_item->where(array('token'=>$_GET['token'],'vid'=>$vid))->find();
				if(empty($in)){
				$data['rank']=1;	
					
					}else{
				$ins=$t_item->where(array('token'=>$_GET['token'],'vid'=>$_GET['vid']))->order('rank desc')->limit(1)->find();		
						
					$data['rank']=$ins['rank']+1;	
						}
			if(!empty($vid) && empty($id)){
			    $data['vid']=$vid;
				$result=$t_item->add($data);
				if($result){
			
				$this->success("添加成功",'/index.php?g=User&m=Hvote&a=item&token='.$this->token.'&id='.$vid);
			
				}
			
			}else if(empty($vid) && !empty($id)){
				$res=M('hvote_item')->where('id='.$id)->find();
				if($res==false){
					echo "非法操作";
					exit;
				}
				$result=$t_item->where('id='.$id)->save($data);
				
				if($result){
					$this->success("修改成功",'/index.php?g=User&m=Hvote&a=item&token='.$this->token.'&id='.$res['vid']);
				}
			
			}
			
			
			

			
			
			
			
	}
	
	
   }



?>