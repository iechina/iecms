<?php
class TestAction extends WapAction{

  

	public function index(){
		$info=M('wtongzhi')->where(array('token'=>$_GET['token']))->find();
		$wecha_id	= $this->_get('wecha_id');
       $txt='{
    "touser":"'.$info['openid'].'",
    "msgtype":"text",
    "text":
    {
         "content":"您好，欢迎使用微乾隆微信通知接口，您还在使用短信通知，邮件通知吗？OUT了，微信通知接口让通知体验效果达到最佳。图文通知，视频通知，语音通知，文本通知,DUNG!DUANG!一起上！敬请期待！"
    }
}';
		   
	$access_token=$this->curlGet("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx6ec52996b1b7fe2c&secret=0868a080a8ee6b211e774edce232b237");
	
	$jsonrt=json_decode($access_token,1);
	
	//dump($txt);exit;
	$url='https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$jsonrt['access_token'].'';
	
	$result=$this->https_post($url,$txt); 
	dump($result);exit;
		   
		 
		$this->display();
	}

	function https_post($url, $data){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$tmpInfo = curl_exec($ch);
		$errorno=curl_errno($ch);
		if ($errorno) {
			return array('rt'=>false,'errorno'=>$errorno);
		}else{
			$js=json_decode($tmpInfo,1);
			if ($js['errcode']=='0'){
				return array('rt'=>true,'errorno'=>0);
			}else {
				$errmsg=GetErrorMsg::wx_error_msg($js['errcode']);
				$this->error('发生错误：错误代码'.$js['errcode'].',微信返回错误信息：'.$errmsg);
			}
		}
	}
	 function curlGet($url,$method='get',$data=''){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$temp = curl_exec($ch);
		return $temp;
	}
		

	}?>