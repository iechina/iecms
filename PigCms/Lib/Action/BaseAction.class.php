<?php
class BaseAction extends Action{
	public $isAgent;
	public $home_theme;
	public $reg_needCheck;
	public $minGroupid;
	public $reg_validDays;
	public $reg_groupid;
	public $thisAgent;
	public $agentid;
	public $adminMp;
	public $siteUrl;
	public $isQcloud = false;


    /**
     *1.定义了资源和静态文件目录、控制器名
     *2.获取网站的基本配置信息 网站的名称、关键词、新注册是否需要审核、新注册时的用户组及有效时间等。
     */
    protected function _initialize(){

        if($this->_get('openId') != NULL){
			$this->isQcloud = true;
			if(session('isQcloud') == NULL){
				session('isQcloud',true);
			}
		}

		define('RES',THEME_PATH.'common');//资源目录
		define('STATICS',TMPL_PATH.'static');//静态文件目录
		//Input::noGPC();
		$this->assign('action',$this->getActionName());//控制器名

		$this->assign('staticPath','');//静态文件目录
		$this->isAgent=0;

		if (!$this->isAgent){
			$this->agentid=0;
			if (!C('site_logo')){
				$f_logo='tpl/Home/pigcms/common/images/logo-pigcms.png';
			}else {
				$f_logo=C('site_logo');//网站logo
			}
			$f_siteName=C('SITE_NAME');//网站名称
			$f_siteTitle=C('SITE_TITLE');//网站标题
			//爱易秀配置
			//$eqx_siteUrl=C('eqxsiteurl');
			//$eqx_name=C('eqxname');
			//$eqx_user=C('eqxuser');
			//$eqx_password=C('eqxpassword');
			
			
			$f_appId=C('site_appId');//
			$f_appSecret=C('site_appSecret');
			$f_metaKeyword=C('keyword');
			$f_metaDes=C('content');
			$f_qq=C('site_qq');
			$f_ipc=C('ipc');
			$f_qrcode='tpl/Home/pigcms/common/images/ewm2.jpg';
			$f_siteUrl=C('site_url');
			$this->home_theme=C('DEFAULT_THEME');
			$f_regNeedMp=C('reg_needmp')=='true'?1:0;
			$this->reg_needCheck=C('ischeckuser')=='false'?1:0;
			$this->minGroupid=1;
			$this->reg_validDays=C('reg_validdays');
			$this->reg_groupid=C('reg_groupid');
			$this->adminMp=C('site_mp');
		}
		$this->siteUrl=$f_siteUrl;
		//爱易秀
//		$this->assign('f_logo',$f_logo);
//		$this->assign('eqx_siteUrl',$eqx_siteUrl);
//		$this->assign('eqx_name',$eqx_name);
//		$this->assign('eqx_user',$eqx_user);
//		$this->assign('eqx_password',$eqx_password);
		
		
		$this->assign('f_logo',$f_logo);
		$this->assign('f_siteName',$f_siteName);
		$this->assign('f_siteTitle',$f_siteTitle);
		$this->assign('f_metaKeyword',$f_metaKeyword);
		$this->assign('f_appId',$f_appId);
		$this->assign('f_appSecret',$f_appSecret);
		$this->assign('f_metaDes',$f_metaDes);
		$this->assign('f_qq',$f_qq);
		$this->assign('f_qrcode',$f_qrcode);
		$this->assign('f_siteUrl',$f_siteUrl);
		$this->assign('f_regNeedMp',$f_regNeedMp);
		$this->assign('f_ipc',$f_ipc);
		$this->assign('reg_validDays',$this->reg_validDays);
		//******************/
	}

	//添加所有内容,包含关键词
	protected function all_insert($name='',$back='/index'){
		$name=$name?$name:MODULE_NAME;
		$db=D($name);
		if($db->create()===false){
			$this->error($db->getError());
		}else{
			$id=$db->add();
			if($id){
				$m_arr=array('Img','Text','Voiceresponse','Ordering','Lottery','Host','Product','Selfform','Panorama','Wedding','Vote','Estate','Reservation','Greeting_card');
				if(in_array($name,$m_arr)){
					//isset($_POST['precisions']) ? $precisions = 1: $precisions = 0 ;
					$this->handleKeyword($id,$name,$_POST['keyword'],intval($_POST['precisions']));

				}

				$this->success('操作成功',U(MODULE_NAME.$back));
			}else{
				$this->error('操作失败',U(MODULE_NAME.$back));
			}
		}
	}
	//单一信息添加
	protected function insert($name='',$back='/index'){
		$name=$name?$name:MODULE_NAME;
		$db=D($name);
		if($db->create()===false){
			$this->error($db->getError());
		}else{
			$id=$db->add();
			if($id==true){
				$this->success('操作成功',U(MODULE_NAME.$back));
			}else{
				$this->error('操作失败',U(MODULE_NAME.$back));
			}
		}
	}
	//单子信息修改
	protected function save($name='',$back='/index'){
		$name=$name?$name:MODULE_NAME;
		$db=D($name);
		if($db->create()===false){
			$this->error($db->getError());
		}else{
			$id=$db->save();
			if($id==true){
				$this->success('操作成功',U(MODULE_NAME.$back));
			}else{
				$this->error('操作失败',U(MODULE_NAME.$back));
			}
		}
	}
	//修改所有内容,包含关键词
	protected function all_save($name='',$back='/index'){
		$name=$name?$name:MODULE_NAME;
		$db=D($name);
		if($db->create()===false){
			$this->error($db->getError());
		}else{
			$id=$db->save();
			if($id){
				$m_arr=array(
				'Img',
				'Text',
				'Voiceresponse',
				'Ordering','Lottery',
				'Host','Product',
				'Selfform',
				'Panorama',
				'Wedding',
				'Vote',
				'Estate',
				'Reservation',
				'Carowner','Carset'
				);
				if(in_array($name,$m_arr)){
					$this->handleKeyword(intval($_POST['id']),$name,$_POST['keyword'],intval($_POST['precisions']));

				}
				$this->success('操作成功',U(MODULE_NAME.$back));
			}else{
				$this->error('操作失败',U(MODULE_NAME.$back));
			}
		}
	}
	protected function del_id($name='',$jump=''){
		$name=$name?$name:MODULE_NAME;
		$jump=empty($name)?MODULE_NAME.'/index':$jump;
		$db=D($name);
		$where['id']=$this->_get('id','intval');
		$where['token']=session('token');
		if($db->where($where)->delete()){
			$this->success('操作成功',U($jump));
		}else{
			$this->error('操作失败',U(MODULE_NAME.'/index'));
		}
	}
	protected function all_del($id,$name='',$back='/index'){
		$name=$name?$name:MODULE_NAME;
		$db=D($name);
		if($db->delete($id)){
			$this->ajaxReturn('操作成功',U(MODULE_NAME.$back));
		}else{
			$this->ajaxReturn('操作失败',U(MODULE_NAME.$back));
		}
	}

	//通用添加关键词 支持逗号和空格分隔关键词
	public function handleKeyword($id,$module,$keyword='',$precisions=0,$delete=0){
		$db=M('Keyword');
		$token = session('token');
		$db->where(array('pid'=>$id,'token'=>$token,'module'=>$module))->delete();
		$keyword = trim(trim($keyword),',');

		if (!$delete){

			$data['pid']=$id;
			$data['module']=$module;
			$data['token']=$token;

			$flag1 = strpos($keyword,',');
			$flag2 = strpos($keyword,' ');

			if( $flag1 === false &&  $flag2 === false ){
				$pk = explode('|',$keyword);
				if(count($pk) == 2){
					$data['precisions'] = $pk[1];
					$data['keyword'] = $pk[0];
				}else{
					$data['precisions'] = $precisions;
					$data['keyword'] = $keyword;
				}

				$db->add($data);

			}else{
				//关键词 关键|1 关键词|0
				if($flag1 === false){
					$keyword = explode(' ', $keyword);
					foreach ($keyword as $k => $v){
						$pk = explode('|',$v);
						if(count($pk) == 2){
							$data['precisions'] = $pk[1];
							$data['keyword'] = $pk[0];
						}else{
							$data['precisions'] = $precisions;
							$data['keyword'] = $v;
						}
						$db->add($data);
					}


				}else{

					$keyword = explode(',', $keyword);
					foreach ($keyword as $k => $v){
						$pk = explode('|',$v);
						if(count($pk) == 2){
							$data['precisions'] = $pk[1];
							$data['keyword'] = $pk[0];
						}else{
							$data['precisions'] = $precisions;
							$data['keyword'] = $v;
						}
						$db->add($data);
					}
				}
			}
		}
	}


}

