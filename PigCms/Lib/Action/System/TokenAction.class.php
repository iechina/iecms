<?php
class TokenAction extends BackAction{
	public function index(){
		$map = array();
		$UserDB = D('Wxuser');
		if (isset($_GET['agentid'])){
			$map=array('agentid'=>intval($_GET['agentid']));
		}
		$count = $UserDB->where($map)->count();
		$Page       = new Page($count);// 实例化分页类 传入总记录数
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$nowPage = isset($_GET['p'])?$_GET['p']:1;
		$show       = $Page->show();// 分页显示输出
		$list = $UserDB->where($map)->order('id ASC')->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();

		foreach($list as $key=>$value){
			$user=M('Users')->field('id,gid,username')->where(array('id'=>$value['uid']))->find();
			if($user){
				$list[$key]['user']['username']=$user['username'];
				$list[$key]['user']['gid']=$user['gid']-1;
			}
		}
		//dump($list);
		$this->assign('list',$list);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
		
		
	}
	public function del(){
		$id=$this->_get('id','intval',0);
		$wx=M('Wxuser')->where(array('id'=>$id))->find();
		if ($wx['agentid']){
			M('Agent')->where(array('id'=>$wx['agentid']))->setDec('wxusercount');
		}
		M('Img')->where(array('token'=>$wx['token']))->delete();
		M('Text')->where(array('token'=>$wx['token']))->delete();
		M('Lottery')->where(array('token'=>$wx['token']))->delete();
		M('Keyword')->where(array('token'=>$wx['token']))->delete();
		M('Photo')->where(array('token'=>$wx['token']))->delete();
		M('Home')->where(array('token'=>$wx['token']))->delete();
		M('Areply')->where(array('token'=>$wx['token']))->delete();
		$diy=M('Diymen_class')->where(array('token'=>$wx['token']))->delete();
		M('Wxuser')->where(array('id'=>$id))->delete();
		$this->success('操作成功');
	}
    
	 public function lists(){
		 $eqx = M('aaaa.users','cj_')->where(array('email_varchar'=>$this->_get('token')))->find() ;
		 $eqx_scene=M('aaaa.scene','cj_')->where(array('userid_int'=>$eqx['userid_int']))->order('createtime_time desc')->select();
		$num=M('163k.scene','cj_')->where(array('userid_int'=>$eqx['userid_int']))->order('createtime_time desc')->count();//数量统计
		$sum=M('163k.scene','cj_')->where(array('userid_int'=>$eqx['userid_int']))->order('createtime_time desc')->sum('hitcount_int');//数量统计
		$date_count=M('163k.scene','cj_')->where(array('userid_int'=>$eqx['userid_int']))->order('createtime_time desc')->sum('datacount_int');//数量统计
		
		$token=session('token');
	
		$this->assign('eqx',$eqx);
		$this->assign('num',$num);
		$this->assign('sum',$sum);
		$this->assign('date_count',$date_count);
		$this->assign('info',$eqx_scene);
		$this->assign('token',$token);


		$this->display();
	}
	public function delcj(){
		$sceneid_bigint=$this->_get('sceneid_bigint');
		 $eqx_scene=M('aaaa.scene','cj_')->where(array('sceneid_bigint'=>$sceneid_bigint))->delete();
		if ( $eqx_scene){
			$this->success('删除成功');
		}else{$this->error('删除失败');}
	
	}
	public function edit(){
		if(IS_POST){
			$this->all_save();
		}else{
			$id=$this->_get('id','intval',0);
                        if ($id == 0) {
                            $this->error('非法操作');
                        }
			$this->assign('tpltitle','编辑');
			$fun=M('Function')->where(array('id'=>$id))->find();
			$this->assign('info',$fun);
			$group=D('User_group')->getAllGroup('status=1');
			$this->assign('group',$group);
			$this->display('add');
		}
	}
}
?>