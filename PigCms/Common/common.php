<?php
function isAndroid(){
	if(strstr($_SERVER['HTTP_USER_AGENT'],'Android')) {
		return 1;
	}
	return 0;
}

function arr_htmlspecialchars($value){
	return is_array($value) ? array_map('htmlspecialchars', $value) : htmlspecialchars($value);
}

function urlGetTpl($action){
	$url_content = curl_get_tpl($action);
	return $url_content;
}

function curlGet($url, $method = 'get', $data = '')

{
$ch = curl_init();
$header = 'Accept-Charset: utf-8';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$temp = curl_exec($ch);
return $temp;
}

?>