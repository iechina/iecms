<?php
class WapAction extends BaseAction{
	public $token;
    public $wecha_id;
	public $fans;
	public $homeInfo;
	public $bottomeMenus;
	public $wxuser;
	public $user;
	public $group;
	public $company;
	public $shareScript;
    public $shareScripts;
	public $shareScriptss;
	public $knwxScripts;
	public $sign;
       	public $appId;
	private $_appid ; //应用id
	private $_secret ; //应用密钥
	private $_redirect_uri ; //跳转地址
        
	protected function _initialize(){
		parent::_initialize();

		//应用唯一标识
		$this->_appid = C('site_appId');
		$this->_secret = C('site_appSecret') ;
		
		//
		$this->time = 0 ;

		$this->token=$this->_get('token');
		if (strlen($this->token)){
			$_SESSION['token']=$this->token;
		}
		if (!$this->token){
			$this->token=$_SESSION['token'];
		}
		//分销
		if (!$this->token&&!(strpos(MODULE_NAME,'Drp') === FALSE)){
			//分销商店铺id
			$id = $this->_get('id');
			if ($id) {
				//分销商id
				$did = M('Distributor_store')->where(array('id' => $id))->getField('did');
				$this->token = M('Distributor')->where(array('id' => $did))->getField('token');
			}
		}
		//
		$this->assign('token',$this->token);
		if (!$this->token){
			exit('no token');
		}
		
		//
		if($this->token&&!preg_match("/^[0-9a-zA-Z]{3,42}$/",$this->token)){
			exit('error token');
		}
		$this->wxuser=S('wxuser_'.$this->token);
		if (!$this->wxuser||1){
			$this->wxuser=D('Wxuser')->where(array('token'=>$this->token))->find();
			S('wxuser_'.$this->token,$this->wxuser);
		}
		$this->assign('wxuser',$this->wxuser);
		
		/*****************************************/
		$fake=0;
		if( $this->wxuser['winxintype'] !=3 && $this->_appid && $this->_secret) {
			if (!$this->isAgent){
				$this->wxuser['appid'] = trim($this->_appid) ;
				$this->wxuser['appsecret'] = trim($this->_secret) ;
			}else {
				$this->wxuser['appid'] = $this->thisAgent['appid'] ;
				$this->wxuser['appsecret'] = $this->thisAgent['appsecret'] ;
			}
			$fake=1;
		}
		$toAuth=0;
		if (C('server_topdomain')=='pigcms.cn'&&C('site_url')!='http://demo2.pigcms.cn'){
			$toAuth=1;
		}else {
			$toAuth=$this->wxuser['oauth'];
		}
		if (C('server_topdomain')=='pigcms.cn'&&$this->wxuser['winxintype']==3&&!$this->wxuser['oauth']){
			$this->wxuser['appid'] = $this->_appid ;
			$this->wxuser['appsecret'] = $this->_secret ;
			$fake=1;
		}
		/*****************************************/
		
		$session_openid_name='token_openid_'.$this->token;
		$session_fakeopenid_name='token_fakeopenid_'.$this->token;
		$session_reopenid_name='token_reopenid_'.$this->token;
		$session_oauthed_name='token_oauthed_'.$this->token;
		$getUserInfoModules=getUserInfoModule::index();
		$getUserinfo=0;
		/*
		if ($this->wxuser['oauthinfo']&&key_exists(MODULE_NAME,$getUserInfoModules)&&in_array(ACTION_NAME,$getUserInfoModules[MODULE_NAME])&&!$_SESSION[$session_oauthed_name]){
			unset($_SESSION[$session_openid_name]);
			$getUserinfo=1;
		}
		*/
		if (isset($_GET['rget'])||intval($_GET['ali'])){
			$_SESSION['otherSource']=1;
			$toAuth=0;
			$this->wxuser['oauthinfo']=0;
		}
		if (isset($_SESSION['otherSource'])){
			$toAuth=0;
		}
		if ($this->wxuser['oauthinfo']&&!$_SESSION[$session_oauthed_name]){
			if ($_SESSION[$session_openid_name]){
				$fansInfo=M('Userinfo')->where(array('token'=>$this->token,'wecha_id'=>$_SESSION[$session_openid_name]))->find();
				if ($toAuth){
				if(!$fansInfo||!$fansInfo['wechaname']||!$fansInfo['portrait']){
					unset($_SESSION[$session_openid_name]);
					$getUserinfo=1;
				}
				}
			}else {
				if (isset($_SESSION[$session_reopenid_name])&&$_SESSION[$session_reopenid_name]){
					$fansInfo=M('Userinfo')->where(array('token'=>$this->token,'wecha_id'=>$_SESSION[$session_reopenid_name]))->find();
					if(!$fansInfo||!$fansInfo['wechaname']||!$fansInfo['portrait']){
						unset($_SESSION[$session_openid_name]);
						unset($_SESSION[$session_reopenid_name]);
						$getUserinfo=1;
					}
				}else {
					$getUserinfo=1;
				}
			}
		}
		
		if (!isset($_SESSION[$session_openid_name])||!$_SESSION[$session_openid_name]){
			$scope='snsapi_userinfo';
			if (!$this->wxuser['oauthinfo']||!$getUserinfo){
				$scope='snsapi_base';
			}
			if ( (!$_GET['wecha_id'] || urldecode($_GET['wecha_id']) == '{wechat_id}') && $_GET['wecha_id'] != 'no' && !isset($_GET['code']) && $this->wxuser['appid'] && $this->wxuser['appsecret'] && $toAuth == 1){
				$customeUrl=$this->siteUrl.$_SERVER['REQUEST_URI'];
				
				$oauthUrl='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->wxuser['appid'].'&redirect_uri='.urlencode($customeUrl).'&response_type=code&scope='.$scope.'&state=oauth#wechat_redirect';
				
				header('Location:'.$oauthUrl);
				exit();
			}

			if (isset($_GET['code']) && isset($_GET['state']) && ($_GET['state']=='oauth')){
				$rt=$this->curlGet('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->wxuser['appid'].'&secret='.$this->wxuser['appsecret'].'&code='.$_GET['code'].'&grant_type=authorization_code');
				
				$jsonrt=json_decode($rt,1);
				$openid= isset( $jsonrt['openid'] ) ? $jsonrt['openid'] : "";
				$access_token = isset( $jsonrt['access_token'] ) ? $jsonrt['access_token'] : "" ;
				//$_GET['wecha_id']=$openid;
				$this->wecha_id=$openid;
				if ($fake){
					if (isset($_SESSION[$session_fakeopenid_name])){
						$this->wecha_id=$_SESSION[$session_fakeopenid_name];
					}else {
						$fansInfo=M('Userinfo')->where(array('token'=>$this->token,'fakeopenid'=>$openid))->find();
						if ($fansInfo){
							$this->wecha_id=$fansInfo['wecha_id'];
						}
					}
				}
				if (!$openid){
					$this->error('授权不对<br>'.$this->wxuser['appid'].'<br>'.$this->wxuser['appsecret'].'<br>'.$jsonrt['errcode'],'#');
					exit();
				} else {
					
					if ($scope=='snsapi_userinfo'){
						$uinfo = $this->curlGet('https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN') ;
						$jsonui = json_decode($uinfo, 1) ;
						if( isset( $jsonui['openid'] ) && $jsonui['openid'] ) {
							//insert the message to userinfo of table
							//update or add
							if ($fansInfo){
								$exist=$fansInfo;
							}else {
								$exist = M('Userinfo')->where( array( "token" => $this->token , "wecha_id" => $this->wecha_id ) )->getField("id") ;
							}

							$datainfo['wechaname'] = str_replace(array("'","\\"),array(''),$jsonui['nickname']);
							$datainfo['sex']       = $jsonui['sex'];
							$datainfo['portrait']  = $jsonui['headimgurl'];
							$datainfo['token']     = $this->token ;
							$datainfo['wecha_id']  = $jsonui['openid'] ;
							$datainfo['city']      = $jsonui['city'] ;
							$datainfo['province']  = $jsonui['province'];
							if ($fake){
								$datainfo['wecha_id']  = $this->wecha_id ;
								$datainfo['fakeopenid']  = $jsonui['openid'] ;
							}

							if( $exist ) {
								$datainfo['truename']  = $datainfo['wechaname'] ;
								//update
								M('Userinfo')->where( array( "id" => $exist ) )->save($datainfo) ;
							} else {
								$datainfo['truename']  = $datainfo['wechaname'] ;
								//add
								M('Userinfo')->add($datainfo) ;
							}
						} else {
							$this->error('授权不对哦<br>'.$this->wxuser['appid'].'<br>'.$this->wxuser['appsecret'].'<br>'.$jsonui['errcode'],'#');
							
							exit();
						}
					}
				}
				$_SESSION[$session_openid_name]=$this->wecha_id;
				$_SESSION[$session_oauthed_name]=1;
			}else {
				$this->wecha_id=$this->_get('wecha_id');
				if ($fake&&$toAuth&&!isset($_GET['isappinstalled'])){
					$_SESSION[$session_fakeopenid_name]=$this->wecha_id;
				}
				if (!$toAuth){
					$_SESSION[$session_openid_name]=$this->wecha_id;
				}
				if (isset($_GET['wecha_id'])&&strlen($_GET['wecha_id'])&&$toAuth){
					$get_parms=$_GET;
					unset($get_parms['wecha_id']);
					$get_parm_str='';
					if ($get_parms){
						$comma='';
						foreach ($get_parms as $gpk=>$gpv){
							$get_parm_str.=$comma.$gpk.'='.$gpv;
							$comma='&';
						}
					}
					$get_parm_str.='&g='.GROUP_NAME.'&m='.MODULE_NAME.'&a='.ACTION_NAME;
					$_SESSION[$session_reopenid_name]=$this->wecha_id;//记录跳转前的openid
					header('Location:'.$this->siteUrl.'/index.php?'.$get_parm_str);
					exit();
				}
			}
			
		}else {
			
			$this->wecha_id=$_SESSION[$session_openid_name];
		}

		if($this->wecha_id&&!preg_match("/^[0-9a-zA-Z_\-\s]{3,82}$/",$this->wecha_id)){
			exit('error openid:'.$this->wecha_id);
		}
		if (!$this->wecha_id){
			$this->wecha_id=$this->_get('wecha_id');
		}

		$this->assign('wecha_id',$this->wecha_id);
		$fansInfo=S('fans_'.$this->token.'_'.$this->wecha_id);
		
		if(!$fansInfo){
			$fansInfo=M('Userinfo')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
		}
		$advanceInfo=M('Wechat_group_list')->where(array('token'=>$this->token,'openid'=>$this->wecha_id))->find();
		if ($advanceInfo){
			$fansInfo['nickname']=$advanceInfo['nickname'];
			if (!$fansInfo['wechaname']){
				$fansInfo['wechaname']=$advanceInfo['nickname'];
			}
			$fansInfo['sex']=$advanceInfo['sex'];
			$fansInfo['province']=$advanceInfo['province'];
			$fansInfo['city']=$advanceInfo['city'];
		}
		S('fans_'.$this->token.'_'.$this->wecha_id,$fansInfo);

		$this->fans=$fansInfo;
		$this->assign('fans',$fansInfo);
		//
		$homeInfo=S('homeinfo_'.$this->token);
		if (!$homeInfo||1){
			$homeInfo=M('home')->where(array('token'=>$this->token))->find();
			S('homeinfo_'.$this->token,$homeInfo);
		}
		$this->homeInfo=$homeInfo;
		$this->assign('homeInfo',$this->homeInfo);
		//
		$catemenu=S('bottomMenus_'.$this->token);
		if (!$catemenu||1){
			$catemenu_db=M('catemenu');
			$catemenu=$catemenu_db->where(array('token'=>$this->token,'status'=>1))->order('orderss desc')->select();
			S('bottomMenus_'.$this->token,$catemenu);
		}
		$menures=array();
		if ($catemenu){
			$res=array();
			$rescount=0;
			foreach ($catemenu as $val){
				$val['url']=$this->getLink($val['url']);
				$res[$val['id']]=$val;
				if ($val['fid']==0){
					$val['vo']=array();
					$menures[$val['id']]=$val;
					$menures[$val['id']]['k']=$rescount;
					$rescount++;
				}
			}
			foreach ($catemenu as $val){
				$val['url']=$this->getLink($val['url']);
				if ($val['fid']>0){
					array_push($menures[$val['fid']]['vo'],$val);
				}
			}
		}
		$catemenu=$menures;
		$this->bottomeMenus=$catemenu;

		$this->assign('catemenu',$this->bottomeMenus);
//生产签名
		 $jsapiTicket = $this->getJsApiTicket();
	
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $timestamp = time();
    $nonceStr = $this->createNonceStr();
//
    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

$signature = sha1($string);
$this->signPackage= array(
      "appId"     => $this->_appid,
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "signature" => $signature,
      "rawString" => $string
    );
	$this->_appid=$this->signPackage['appId'];
	$this->nonceStr=$this->signPackage['nonceStr'];
	$this->signature=$this->signPackage['signature'];
	$this->timestamp=$this->signPackage['timestamp'];
	//dump($this->_appid);exit;
	$this->assign('signPackage',$this->signPackage);
		//判断菜单风格
		$radiogroup=$homeInfo['radiogroup'];
		if($radiogroup==false){
			$radiogroup=0;
		}
		$cateMenuFileName='tpl/Wap/default/Index_menuStyle'.$radiogroup.'.html';
		$this->assign('cateMenuFileName',$cateMenuFileName);
		$this->assign('radiogroup',$radiogroup);
		//
		$this->user=S('user_'.$this->wxuser['uid']);
		if (!$this->user||1){
			$this->user=D('Users')->find(intval($this->wxuser['uid']));
			S('user_'.$this->wxuser['uid'],$this->user);
		}
		$this->assign('user',$this->user);
		//
		$this->group=S('group_'.$this->user['gid']);
		if (!$this->group||1){
			$this->group=M('User_group')->where(array('id'=>intval($this->user['gid'])))->find();
			S('group_'.$this->user['gid'],$this->group);
		}
		$this->assign('group',$this->group);
		//
		$this->company=S('company_'.$this->token);
		if (!$this->company||1){
			$company_db=M('company');
			$this->company=$company_db->where(array('token'=>$this->token,'isbranch'=>0))->find();
			S('company_'.$this->token,$this->company);
		}
		$this->assign('company',$this->company);
		//
		$this->copyright=$this->group['iscopyright'];
		$this->assign('iscopyright',$this->copyright);//是否允许自定义版权
		$this->assign('siteCopyright',C('copyright'));//站点版权信息
		$this->assign('copyright',$this->copyright);
	//
$this->shareScript=<<<EOM
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
		wx.config({
		   debug: false,
      appId: '$this->_appid',
      timestamp: '$this->timestamp',
      nonceStr: '$this->nonceStr',
      signature:'$this->signature',
		  jsApiList: [
		    'checkJsApi',
		    'onMenuShareTimeline',
		    'onMenuShareAppMessage',
		    'onMenuShareQQ',
		    'onMenuShareWeibo',
			'openLocation',
			'getLocation'
		  ]
		});
	</script>
	<script type="text/javascript">
	wx.ready(function () {
	  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
	  /*document.querySelector('#checkJsApi').onclick = function () {
	    wx.checkJsApi({
	      jsApiList: [
	        'getNetworkType',
	        'previewImage'
	      ],
	      success: function (res) {
	        //alert(JSON.stringify(res));
	      }
	    });
	  };*/
		// 2. 分享接口
  // 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
wx.onMenuShareAppMessage({
			title: window.shareData.tTitle,
			desc: window.shareData.tContent,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    type: '', // 分享类型,music、video或link，不填默认为link
		    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
		    success: function () { 
				shareHandle('frined');
		        //alert('分享朋友成功');
		    },
		    cancel: function () { 
		        //alert('分享朋友失败');
		    }
		});
// 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
		wx.onMenuShareTimeline({
			title: window.shareData.tTitle,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    success: function () { 
				shareHandle('frineds');
		        //alert('分享朋友圈成功');
		    },
		    cancel: function () { 
		        //alert('分享朋友圈失败');
		    }
		});	
// 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
		wx.onMenuShareWeibo({
			title: window.shareData.tTitle,
			desc: window.shareData.tContent,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    success: function () { 
				shareHandle('weibo');
		       	//alert('分享微博成功');
		    },
		    cancel: function () { 
		        //alert('分享微博失败');
		    }
		});
		
	});
function shareHandle(to) {
		var submitData = {
			module: window.shareData.moduleName,
			moduleid: window.shareData.moduleID,
			token:'{$this->token}',
			wecha_id:'{$this->wecha_id}',
			url: window.shareData.sendFriendLink,
			to:to
		};
	$.post('index.php?g=Wap&m=Share&a=shareData&token={$this->token}&wecha_id={$this->wecha_id}',submitData,function (data) {},'json')
	}
</script>
EOM;
$this->knwx=M('knwxreplay')->where(array('token'=>$this->token))->getField('gzlj');
		
	$this->knwxScripts=<<<EOM
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
		wx.config({
		   debug: false,
      appId: '$this->_appid',
      timestamp: '$this->timestamp',
      nonceStr: '$this->nonceStr',
      signature:'$this->signature',
		  jsApiList: [
		    'checkJsApi',
		    'onMenuShareTimeline',
		    'onMenuShareAppMessage',
		    'onMenuShareQQ',
		    'onMenuShareWeibo',
			'openLocation',
			'getLocation'
		  ]
		});
	</script>
<script type="text/javascript">
	wx.ready(function () {
	  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
	  /*document.querySelector('#checkJsApi').onclick = function () {
	    wx.checkJsApi({
	      jsApiList: [
	        'getNetworkType',
	        'previewImage'
	      ],
	      success: function (res) {
	        //alert(JSON.stringify(res));
	      }
	    });
	  };*/
// 2. 分享接口
	  // 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
	    wx.onMenuShareAppMessage({
			title: window.shareData.tTitle,
			desc: window.shareData.tContent,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    type: '', // 分享类型,music、video或link，不填默认为link
		    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
		    success: function () { 
			 window.location.href="$this->knwx";	
		    },
		    cancel: function () { 
			alert('您怎么取消享给你的好友了呢？这么好的微秀贺卡赶紧点击右上角分享给你的好朋友吧！');
		        
		    }
		});
// 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
		wx.onMenuShareTimeline({
			title: window.shareData.tContent,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    success: function () { 
			 window.location.href="$this->knwx";		
		    },
		    cancel: function () { 
			alert('您怎么取消享到你的朋友圈了？这么好的微秀贺卡赶紧点击右上角分享到你的朋友圈吧！');
		      
		    }
		});	
 // 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
		wx.onMenuShareWeibo({
			title: window.shareData.tTitle,
			desc: window.shareData.tContent,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    success: function () { 
				shareHandle('weibo');
		       	 window.location.href="$this->knwx";	
		    },
		    cancel: function () { 
		     alert('您怎么取消分享到你的微博了呢？这么好的微秀贺卡赶紧点击右上角分享到你的微博吧！');    
		    }
		});
		
	});
function shareHandle(to) {
		
		
		
		var submitData = {
			module: window.shareData.moduleName,
			moduleid: window.shareData.moduleID,
			token:'{$this->token}',
			wecha_id:'{$this->wecha_id}',
			url: window.shareData.sendFriendLink,
			to:to
		};
		
		
		
		
	}
</script>
EOM;
$this->assign('knwxScripts',$this->knwxScripts);
//dump($this->shareScript);exit;	
	$this->hks=M('kawahkreplay')->where(array('token'=>$this->token))->getField('lj');
		$this->hks = str_replace("&amp;","&",$this->hks);
		$this->hk=$this->hks.'#wechat_redirect';
		$this->assign('shareScript',$this->shareScript);
		$this->shareScripts=<<<EOM
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
	wx.config({
		   debug: false,
      appId: '$this->_appid',
      timestamp: '$this->timestamp',
      nonceStr: '$this->nonceStr',
      signature:'$this->signature',
		  jsApiList: [
		    'checkJsApi',
		    'onMenuShareTimeline',
		    'onMenuShareAppMessage',
		    'onMenuShareQQ',
		    'onMenuShareWeibo',
			'openLocation',
			'getLocation'
		  ]
		});
	</script>
	<script type="text/javascript">
	wx.ready(function () {
	  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
	  /*document.querySelector('#checkJsApi').onclick = function () {
	    wx.checkJsApi({
	      jsApiList: [
	        'getNetworkType',
	        'previewImage'
	      ],
	      success: function (res) {
	        //alert(JSON.stringify(res));
	      }
	    });
	  };*/
 // 2. 分享接口
	  // 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
	    wx.onMenuShareAppMessage({
			title: window.shareData.tTitle,
			desc: window.shareData.tContent,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    type: '', // 分享类型,music、video或link，不填默认为link
		    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
		    success: function () { 
				shareHandle('frined');
				$.post('index.php?g=Wap&m=Kawahk&a=share&token={$this->token}&wecha_id={$this->wecha_id}');
		       window.location.href="$this->hk";
		    },
		    cancel: function () { 
			alert('您怎么取消享给你的好友了呢？这么好的贺卡赶紧点击右上角分享给你的好朋友吧！');
		        
		    }
		});
// 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
		wx.onMenuShareTimeline({
			title: window.shareData.tContent,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    success: function () { 
				shareHandle('frineds');
				$.post('index.php?g=Wap&m=Kawahk&a=sharefd&token={$this->token}&wecha_id={$this->wecha_id}');
				
		        window.location.href="$this->hk";
		    },
		    cancel: function () { 
			
		         alert('你在犹豫啥呢？分享到朋友圈，点击右上角分享按钮，让您的更多伙伴都能看到你的贺卡吧');
		    }
		});	
 // 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
		wx.onMenuShareWeibo({
			title: window.shareData.tTitle,
			desc: window.shareData.tContent,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    success: function () { 
				shareHandle('weibo');
		       	 window.location.href="$this->hk";
		    },
		    cancel: function () { 
		         window.location.href="$this->hk";
		    }
		});
		
	});
function shareHandle(to) {
		
		
		
		var submitData = {
			module: window.shareData.moduleName,
			moduleid: window.shareData.moduleID,
			token:'{$this->token}',
			wecha_id:'{$this->wecha_id}',
			url: window.shareData.sendFriendLink,
			to:to
		};
		
		
		
		
	}
</script>
EOM;

		$this->assign('shareScripts',$this->shareScripts);
		$this->wxs=M('wzzreplay')->where(array('token'=>$this->token))->getField('gzlj');
		$this->wxs = str_replace("&amp;","&",$this->wxs);
		$this->wx=$this->wxs.'#wechat_redirect';
		$this->shareScriptss=<<<EOM
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
		wx.config({
		   debug: false,
      appId: '$this->_appid',
      timestamp: '$this->timestamp',
      nonceStr: '$this->nonceStr',
      signature:'$this->signature',
		  jsApiList: [
		    'checkJsApi',
		    'onMenuShareTimeline',
		    'onMenuShareAppMessage',
		    'onMenuShareQQ',
		    'onMenuShareWeibo',
			'openLocation',
			'getLocation'
		  ]
		});
	</script>
	<script type="text/javascript">
	wx.ready(function () {
	  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
	  /*document.querySelector('#checkJsApi').onclick = function () {
	    wx.checkJsApi({
	      jsApiList: [
	        'getNetworkType',
	        'previewImage'
	      ],
	      success: function (res) {
	        //alert(JSON.stringify(res));
	      }
	    });
	  };*/

	  // 2. 分享接口
	  // 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
	    wx.onMenuShareAppMessage({
			title: window.shareData.tTitle,
			desc: window.shareData.tContent,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    type: '', // 分享类型,music、video或link，不填默认为link
		    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
		    success: function () { 
				shareHandle('frined');
		       window.location.href="$this->wx";
		    },
		    cancel: function () { 
		        window.location.href="$this->wx";
		    }
		});


	  // 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
		wx.onMenuShareTimeline({
			title: window.shareData.tTitle,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    success: function () { 
				shareHandle('frineds');
		        window.location.href="$this->wx";
		    },
		    cancel: function () { 
		         window.location.href="$this->wx";
		    }
		});	

	  // 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
		wx.onMenuShareWeibo({
			title: window.shareData.tTitle,
			desc: window.shareData.tContent,
			link: window.shareData.sendFriendLink,
			imgUrl: window.shareData.imgUrl,
		    success: function () { 
				shareHandle('weibo');
		       	 window.location.href="$this->wx";
		    },
		    cancel: function () { 
		         window.location.href="$this->wx";
		    }
		});
		
	});
		
	function shareHandle(to) {
		
		var submitData = {
			module: window.shareData.moduleName,
			moduleid: window.shareData.moduleID,
			token:'{$this->token}',
			wecha_id:'{$this->wecha_id}',
			url: window.shareData.sendFriendLink,
			to:to
		};
		$.post('index.php?g=Wap&m=Share&a=shareData&token={$this->token}&wecha_id={$this->wecha_id}',submitData,function (data) {},'json')
	}
</script>
EOM;

//dump($this->shareScripts);exit;
		$this->assign('shareScriptss',$this->shareScriptss);
	}
	public function getLink($url){
		$url=$url?$url:'javascript:void(0)';
		$urlArr=explode(' ',$url);
		$urlInfoCount=count($urlArr);
		if ($urlInfoCount>1){
			$itemid=intval($urlArr[1]);
		}
		//会员卡 刮刮卡 团购 商城 大转盘 优惠券 订餐 商家订单 表单
		if ($this->strExists($url,'刮刮卡')){
			$link='/index.php?g=Wap&m=Guajiang&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif ($this->strExists($url,'大转盘')){
			$link='/index.php?g=Wap&m=Lottery&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif ($this->strExists($url,'优惠券')){
			$link='/index.php?g=Wap&m=Coupon&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif ($this->strExists($url,'刮刮卡')){
			$link='/index.php?g=Wap&m=Guajiang&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif ($this->strExists($url,'商家订单')){
			if ($itemid){
				$link=$link='/index.php?g=Wap&m=Host&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id.'&hid='.$itemid;
			}else {
				$link='/index.php?g=Wap&m=Host&a=Detail&token='.$this->token.'&wecha_id='.$this->wecha_id;
			}
		}elseif ($this->strExists($url,'万能表单')){
			if ($itemid){
				$link=$link='/index.php?g=Wap&m=Selfform&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif ($this->strExists($url,'相册')){
			$link='/index.php?g=Wap&m=Photo&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link='/index.php?g=Wap&m=Photo&a=plist&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif ($this->strExists($url,'全景')){
			$link='/index.php?g=Wap&m=Panorama&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link='/index.php?g=Wap&m=Panorama&a=item&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif ($this->strExists($url,'会员卡')){
			$link='/index.php?g=Wap&m=Card&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif ($this->strExists($url,'商城')){
			$link='/index.php?g=Wap&m=Product&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif ($this->strExists($url,'订餐')){
			$link='/index.php?g=Wap&m=Product&a=dining&dining=1&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif ($this->strExists($url,'团购')){
			$link='/index.php?g=Wap&m=Groupon&a=grouponIndex&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif ($this->strExists($url,'首页')){
			$link='/index.php?g=Wap&m=Index&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif ($this->strExists($url,'网站分类')){
			$link='/index.php?g=Wap&m=Index&a=lists&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link='/index.php?g=Wap&m=Index&a=lists&token='.$this->token.'&wecha_id='.$this->wecha_id.'&classid='.$itemid;
			}
		}elseif ($this->strExists($url,'图文回复')){
			if ($itemid){
				$link='/index.php?g=Wap&m=Index&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif ($this->strExists($url,'LBS信息')){
			$link='/index.php?g=Wap&m=Company&a=map&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link='/index.php?g=Wap&m=Company&a=map&token='.$this->token.'&wecha_id='.$this->wecha_id.'&companyid='.$itemid;
			}
		}elseif ($this->strExists($url,'DIY宣传页')){
			$link='/index.php/show/'.$this->token;
		}elseif ($this->strExists($url,'婚庆喜帖')){
			if ($itemid){
				$link='/index.php?g=Wap&m=Wedding&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif ($this->strExists($url,'投票')){
			if ($itemid){
				$link='/index.php?g=Wap&m=Vote&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}else {
			
			$link=str_replace(array('{wechat_id}','{siteUrl}','&amp;'),array($this->wecha_id,$this->siteUrl,'&'),$url);
			if (!!(strpos($url,'tel')===false)&&$url!='javascript:void(0)'&&!strpos($url,'wecha_id=')){
				if (strpos($url,'?')){
					$link=$link.'&wecha_id='.$this->wecha_id;
				}else {
					$link=$link.'?wecha_id='.$this->wecha_id;
				}
			}
			
		}
		return $link;
	}
	function strExists($haystack, $needle)
	{
		return !(strpos($haystack, $needle) === FALSE);
	}
	function curlGet($url){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$temp = curl_exec($ch);
		return $temp;}
	private function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }
  private function getJsApiTicket() {
    // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode(file_get_contents("share/jsapi_ticket.json"));
	//dump($data);exit;
    if ($data->expire_time < time()) {
      $accessToken = $this->getAccessToken();
	  
      $url = "http://api.weixin.qq.com/cgi-bin/ticket/getticket?type=1&access_token=$accessToken";
      $res = json_decode($this->httpGet($url));

      $ticket = $res->ticket;
      if ($ticket) {
        $data->expire_time = time() + 7000;
        $data->jsapi_ticket = $ticket;
        $fp = fopen("share/jsapi_ticket.json", "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
    } else {
      $ticket = $data->jsapi_ticket;
    }
	
    return $ticket;
  }
  protected function getAccessToken() {
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode(file_get_contents("GongDan/access_token.json"));
    if ($data->expire_time < time()) {
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->_appid&secret=$this->_secret";
	  
      $res = file_get_contents($url);
     
	    $arr = json_decode($res, true);
     $access_token = $arr['access_token'];
		//dump($access_token );exit;
      if ($access_token) {
        $data->expire_time = time() + 7000;
        $data->access_token = $access_token;
        $fp = fopen("share/access_token.json", "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
    } else {
      $access_token = $data->access_token;
    }
	 
    return $access_token;
  }
  private function httpGet($url) {
	  
    $curl = curl_init();
	 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
	 
    curl_close($curl);

    return $res;
  
	}


/**
 * @ 会员提醒
 * @param $message 提示内容，可留空
 * @param $type 提醒样式 默认0 提醒注册/登录 ; 1 提醒关注
 */
	public function memberNotice($message = '' , $style = 0)
	{
		if (C('STATICS_PATH')){
			$staticPath='';
		}else {
			$staticPath='http://s.404.cn';
		}

		if ($style) {

			$message = empty($message) ? '您好，您还没有关注我们的公众号,关注后才能继续喔。' : $message;
			$gzhurl = M('Home')->where(array('token'=>$this->token))->getField('gzhurl');
			$wxname = $this->wxuser['wxname'];
			$subBtn = '';
			if (!empty($gzhurl)) {
				$subBtn = '<a href="'.$gzhurl.'" class="flatbtn">快捷关注</a>';
				$subBtn2 = '<div class="wxname"><a href="'.$gzhurl.'">快捷关注</a></div>';
			}


$memberNotice = <<<EOM
	<link rel="stylesheet" type="text/css" href="$staticPath/tpl/static/Plugin/fans.css" />
		<div class="_fly" id="fly_page">
			<p>$message &nbsp; ( 公众号：$wxname )</p>
			$subBtn2
			<div class="wxname close"><a href="javascript:pageClose();">关闭</a></div>
		</div>
	<script type="text/javascript" src="$staticPath/tpl/static/Plugin/topNotice.js"></script>
	<script src="$staticPath/tpl/static/Plugin/jquery.leanModal.min.js"></script>
	<link rel="stylesheet" type="text/css" href="$staticPath/tpl/static/Plugin/leanModal.css" />
	<div id="memberNoticeBox" style="display: none; position: fixed; opacity: 1; z-index: 11000; left: 50%; margin-left: -170px; top: 110px;">
		<h1>提醒</h1>
		<div class="txtfield">$message &nbsp; ( 公众号：$wxname )</div>
		$subBtn
		<a class="flatbtn btnC hidemodal">关闭</a>
	</div>
	 <div id="lean_overlay" style="display: none; opacity: 0.45;"></div>
	<script type="text/javascript">
	$(function(){
		$('#modaltrigger_notice').leanModal({
			top:110,
			overlay:0.45,
			closeButton:".hidemodal"
		});
	});
	</script>
EOM;

		}else{

			
			if ($this->wecha_id) {
				$href = U('Index/memberReg',array('token'=>$this->token));
			}else{
				$href = U('Index/memberLogin',array('token'=>$this->token));
			}
			$message = empty($message) ? '您是游客身份，点击这里登录/注册' : $message ;

$memberNotice = <<<EOM
	<link rel="stylesheet" type="text/css" href="$staticPath/tpl/static/Plugin/fans.css" />
	<div id="TopTipHolder"><div id="TopTip"><a href="$href">$message</a></div><div id="TopTipClose" title="关闭"></div></div>
	<script type="text/javascript" src="$staticPath/tpl/static/Plugin/topNotice.js"></script>
	<script src="$staticPath/tpl/static/Plugin/jquery.leanModal.min.js"></script>
	<link rel="stylesheet" type="text/css" href="$staticPath/tpl/static/Plugin/leanModal.css" />
	<div id="memberNoticeBox" style="display: none; position: fixed; opacity: 1; z-index: 11000; left: 50%; margin-left: -170px; top: 110px;">
		<h1>提醒</h1>
		<div class="txtfield"><a href="$href">$message</a></div>
		<a href="$href" class="flatbtn">注册/登录</a>
		<a class="flatbtn btnC hidemodal">取消</a>
	</div>
	 <div id="lean_overlay" style="display: none; opacity: 0.45;"></div>
	<script type="text/javascript">
	$(function(){
		$('#modaltrigger_notice').leanModal({
			top:110,
			overlay:0.45,
			closeButton:".hidemodal"
		});
	});
	</script>
EOM;
		}
		$this->assign('memberNotice',$memberNotice);

	}

	private function redirect_uri() {
		return urlencode($this->_redirect_uri) ;
	}

/**
 * 获取会员的会员卡信息
 * @return 没有会员卡返回 NULL ; 有会员卡返回 卡号，余额，积分
 */
	protected function getCardInfo($token = '' ,$wecha_id = ''){

		$wecha_id = $wecha_id ? $wecha_id : $this->wecha_id;
		$token    = $token ? $token : $this->token;
		$where    = array('token'=>$token,'wecha_id'=>$wecha_id);
		
		$number   = M('Member_card_create')->where($where)->getField('number');

		if (!$number) return NULL;
		
		$cardInfo = M('Userinfo')->where($where)->field('balance,total_score')->find();
		
		return array(
				'number' => $number, 
				'balance' => $cardInfo['balance'], 
				'score' => $cardInfo['total_score'], 
			);
	}


/**
 * 判断粉丝是否关注信息
 * @ return { FALSE：没有关注 / TRUE:已关注 }
 */
	public function isSubscribe()
	{

		$wecha_id = $this->wecha_id;

		if($this->wxuser['appid'] && $this->wxuser['appsecret'] && ($this->wxuser['winxintype'] == 3)){
			
			//认证服务号
			$url_get='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->wxuser['appid'].'&secret='.$this->wxuser['appsecret'];
			$json=json_decode($this->curlGet($url_get));

			$url='https://api.weixin.qq.com/cgi-bin/user/info?openid='.$wecha_id.'&access_token='.$json->access_token;
			$classData=json_decode($this->curlGet($url));

			if ($classData->subscribe == 0) {
				//没有关注
				return FALSE;
			}else{
				return TRUE;
			}

		}elseif($this->wxuser['winxintype'] != 3){
			//非认证服务号
			if ($wecha_id) {
				return TRUE;
			}else{
				return FALSE;
			}

		}else{
			//其他情况返回FALSE
			return FALSE;
		}
	}



}