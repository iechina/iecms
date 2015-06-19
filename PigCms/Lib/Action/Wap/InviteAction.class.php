<?php
class InviteAction extends WapAction{
	public function index(){
		if (IS_POST) {
			$t_invite = M("Invite_enroll");
			$data['name'] = $this->_post('name');
			$data['email'] = $this->_post('email');
			$data['post'] = $this->_post('post');
			$data['mobile'] = $this->_post('mobile');
			$data['comp'] = $this->_post('comp');
			foreach ($data as $value){
				   if($value==""){
				    echo "<script>alert('带 * 的必须填');location.reload()</script>";
				     }	
				 }
			$data['token'] = $this->token;
			$yid = $data['yid'] = $this->_get('yid');
			$wecha_id = $data['wecha_id'] = $this->wecha_id;
			$list = $t_invite->where(array('wecha_id'=>"$wecha_id",'yid'=>"$yid"))->select();
			
			if ($list) {
				echo "<script>alert('您已经报名过了');location.reload()</script>";
			}else{
				$ok = $t_invite->add($data);
				if ($ok) {
					echo "<script>alert('报名成功啦');location.reload()</script>";
				}else{
					echo "<script>alert('请重新提交信息');location.reload()</script>";	
				}
			}
		}
	else{
		$token = $this->token;
		$yid = $this->_get('yid');
		$Invite = M("Invite");
		$Invites = $Invite->where(array('token'=>"$token",'id'=>"$yid"))->find();
		$this->assign('Invite',$Invites);

		$User = M("Invite_user");
    	$Users = $User->limit(8)->where(array('token'=>"$token",'yid'=>"$yid"))->select();
		$this->assign('Userlist',$Users);

		$Meet = M("Invite_meeting");
    	$Meets = $Meet->where(array('token'=>"$token",'yid'=>"$yid"))->order('time')->select();
    	$firsttime = $Meet->where(array('token'=>"$token",'yid'=>"$yid"))->order('time')->getField('time');
    	$lasttime = $Meet->where(array('token'=>"$token",'yid'=>"$yid"))->order('time desc')->getField('time');
    	$this->assign('firsttime',$firsttime);
    	$this->assign('lasttime',$lasttime);
		$this->assign('Meetlist',$Meets);

		$Part = M("Invite_partner");
    	$Parts = $Part->where(array('token'=>"$token",'yid'=>"$yid"))->select();
		$this->assign('Partlist',$Parts);

		$this->assign('token',$token);
		$this->assign('yid',$yid);
		$this->display();
	}
}

// 	public function ajax(){
		

// 		$Pig = M("Invite_enroll");

// 		$data['name'] = $this->_post('name');
// 		$data['email'] = $this->_post('email');
// 		$data['post'] = $this->_post('post');
// 		$data['mobile'] = $this->_post('mobile');
// 		$data['comp'] = $this->_post('comp');
// 		$data['token'] = $this->token;
// 		$data['yid'] = $this->_get('yid');
// 		$data['wecha_id'] = $this->wecha_id;
// //先判断是否已经参加过

// 		$ok = $Pig->add($data);
// 		if($ok){
// 			//ok
// 			echo json_encode(array('errno'=>1,'message'=>'ok'));
// 		}else{
// 			echo json_encode(array('errno'=>0,'message'=>'onnnk'));
// 			//no
// 		}
// 	}
}