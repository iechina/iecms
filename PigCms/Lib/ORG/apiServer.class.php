<?php
final class apiServer {
	public function __construct() {
		
	}
	public function getServerUrl(){
		return 'http://www.lexun.cc';
	}
	
	public function getApiUrltu(){
		return 'http://www.tuling123.com/openapi/api';
	}
	
	public function getApiKeyID(){
		return array('key'=>'3382804569e14b1961d097353184218e','ID'=>'55158');
	}
	
	public function getErrMsg($code){
		$error_code = array(
		/*	'100000'=>'�ı�������',
			'200000'=>'��ַ������',
			'302000'=>'����',
			'304000'=>'Ӧ�á����������',
			'305000'=>'�г�',
			'306000'=>'����',
			'308000'=>'���ס���Ƶ��С˵',
			'309000'=>'�Ƶ�',
			'311000'=>'�۸�',*/
			'40001'=>'key�ĳ��ȴ���32λ��',
			'40002'=>'��������Ϊ��',
			'40003'=>'key������ʺ�δ����',
			'40004'=>'�����������������',
			'40005'=>'�ݲ�֧�ָù���',
			'40006'=>'������������',
			'40007'=>'���������ݸ�ʽ�쳣',
		);
		if(isset($error_code[$code])){
			return $error_code[$code];
		}else{
			return "����ţ�{$code},δ֪ϵͳ����";
		}
			 
	}
}
?>