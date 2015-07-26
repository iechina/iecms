<?php
class orderPrint {

	public $serverUrl;
	public $key;
	public $topdomain;
	public $token;
	public function __construct($token){
		$this->serverUrl='http://up.iechina.cn/';
		$this->key=trim(C('server_key'));
		$this->topdomain=trim(C('server_topdomain'));
		if (!$this->topdomain){
			$this->topdomain=$this->getTopDomain();
		}
		$this->token=$token;
	}
	public function printit($token, $companyid=0, $ordertype='', $content = '', $paid=0){
		$companyid=intval($companyid);
		$printers=M('Orderprinter')->where(array('token'=>$token))->select();
		/*
		if ($companyid){
			$printers=M('Orderprinter')->where(array('token'=>$token,'companyid'=>$companyid))->select();
		}else {
			$printers=M('Orderprinter')->where(array('token'=>$token))->select();
		}
		*/
		F('1',$printers);
		$usePrinters=array();
		if ($printers){
			foreach ($printers as $p){
				$ms=explode(',',$p['modules']);
				if (in_array($ordertype,$ms)&&(!$companyid||$p['companyid']==$companyid||!$p['companyid'])){
					array_push($usePrinters,$p);
				}
			}
		}
		F('2',$usePrinters);
		if ($usePrinters){
			foreach ($usePrinters as $p){
				if (!$p['paid']||($p['paid']&&$paid)){
					for($i=0;$i<$p['count'];$i++){
					 if ($p['printtype'] == '0'){ //Ϊ0ʱ�÷�ӡ��ӡ��	
					    $msgNo=time()+1+$i;
					    $reqTime=number_format(1000*time(), 0, '', '');
					    $data=array(
						  'memberCode'=>$p['mc'],
						  'msgDetail'=>$content,
						  'deviceNo'=>$p['mcode'],
					      'msgNo'=>$msgNo,
						  'reqTime'=>$reqTime,
						  'securityCode'=>md5($p['mc'].$content.$p['mcode'].$msgNo.$reqTime.$p['mkey']),
						  'mode'=>2
					      );
					   $url=$this->serverUrl.$this->sendMsg;
					   $rt=$this->api_notice_increment($url,$data);
				     //var_dump($rt);
					 //var_dump($rtt);
					 //exit;
				      F('3',$rt);
					  usleep(10000);
				    }else{ //�������ƴ�ӡ��
					  $msg          = $content; //��ӡ����
                      $apiKey       = $p['apikey'];//apiKey
                      $mKey         = $p['mkey'];//��Կ
                      $partner      = $p['mc'];//�û�id
                      $machine_code = $p['mcode'];//��ӡ���ն˺�
                       $ti = time()+1+$i;
                       $params = array(
                          'partner'=>$partner,
                          'machine_code'=>$machine_code,
                          'time'=>$ti
                           );
                       $sign=$this->generateSign($params,$apiKey,$mKey);
                       $params['sign'] = $sign;
                       $params['content'] = $msg;
                       $url = 'http://open.10ss.net:8888';//�ӿڶ˵�
                       $p = '';
                       foreach ($params as $k => $v) {
                               $p .= $k.'='.$v.'&';
                       }
                       $data = rtrim($p, '&');
	                   $rt=$this->liansuo_post($url,$data);
                      F('3',$rt);
					  usleep(10000);
  
				     }//��ӡ��ѡ�����
				   }//��������
			   }
			}
		}
	}
	function api_notice_increment($url, $data){
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
			return $errorno;
		}else{
			return $tmpInfo;
		}
	}
	
	//������ʹ��
	function liansuo_post($url,$data){ // ģ���ύ���ݺ���      
    $curl = curl_init(); // ����һ��CURL�Ự      
    curl_setopt($curl, CURLOPT_URL, $url); // Ҫ���ʵĵ�ַ                  
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // ����֤֤����Դ�ļ��    
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // ��֤���м��SSL�����㷨�Ƿ����      
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // ģ���û�ʹ�õ����
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:')); //������ݰ������ύ     
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // ʹ���Զ���ת      
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // �Զ�����Referer      
    curl_setopt($curl, CURLOPT_POST, 1); // ����һ�������Post����      
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post�ύ�����ݰ�      
    curl_setopt($curl, CURLOPT_COOKIEFILE, $GLOBALS['cookie_file']); // ��ȡ�����������Cookie��Ϣ      
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // ���ó�ʱ���Ʒ�ֹ��ѭ     
    curl_setopt($curl, CURLOPT_HEADER, 0); // ��ʾ���ص�Header��������      
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // ��ȡ����Ϣ���ļ�������ʽ���� 
           
    $tmpInfo = curl_exec($curl); // ִ�в���  
	//echo '<br>��ʾ��Ϣ'.$tmpInfo;
	//exit;    
    if (curl_errno($curl)) {      
      // echo 'Errno'.curl_error($curl);      
    }      
    curl_close($curl); // �ؼ�CURL�Ự      
    return $tmpInfo; // ��������      
    }    
   
    //������ʹ��
   function generateSign($params, $apiKey, $msign)
    {
    //�����������������ĸ�Ⱥ�˳����
    ksort($params);
    //�����ַ�����ʼ���������ַ���
    $stringToBeSigned = $apiKey;
    //�����в������Ͳ���ֵ����һ��
    foreach ($params as $k => $v)
      {
        $stringToBeSigned .= urldecode($k.$v);
      }
    unset($k, $v);
    //�����ַ�����β���������ַ���
    $stringToBeSigned .= $msign;
    //ʹ��MD5���м��ܣ���ת���ɴ�д
    return strtoupper(md5($stringToBeSigned));
   }
	
}
