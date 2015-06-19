<?php
class WtongzhiAction extends WapAction{
	

	public function index(){
		$wecha_id = $_GET['wecha_id'];
		$token=$_GET['token'];
		$info=M('wtongzhi')->where(array('token'=>$token))->find();
		if(empty($info['openid'])){
			$info['openid']=$wecha_id;
			
			
			};
		
	if($_POST){
		$date['token']=$_GET['token'];
		$date['statue']=$_POST['statue'];
		$date['openid']=$_POST['openid'];
		if(empty($info)){
		      $a=M('wtongzhi')->add($date);
		                   if($a){
			                          $this->success('添加成功');exit;
			
			                      }
						else{$this->error('添加失败');exit;}
		
		
		
		}else{
		$as=M('wtongzhi')->where(array('token'=>$token))->save($date);
		if($as){
			$this->success('更新成功');exit;
			}	else{$this->error('更新失败');exit;}
			
			
			}}
			
			$this->assign('info',$info);
			$this->assign('wecha_id',$wecha_id);
		$this->display();
		
		
	}
	
	
	
	 private function getAccessToken() {
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode(file_get_contents("wqlweitongzhi/access_token.json"));
    if ($data->expire_time < time()) {
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->_appid&secret=$this->_secret";
	 
      $res = file_get_contents($url);
     
	    $arr = json_decode($res, true);
     $access_token = $arr['access_token'];
		//dump($access_token );exit;
      if ($access_token) {
        $data->expire_time = time() + 7000;
        $data->access_token = $access_token;
        $fp = fopen("wqlweitongzhi/access_token.json", "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
    } else {
      $access_token = $data->access_token;
    }
	
    return $access_token;
  }
 function curlGet($url){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$temp = curl_exec($ch);
		return $temp;}

}


?>