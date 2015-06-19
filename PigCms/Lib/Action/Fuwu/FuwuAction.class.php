<?php

class FuwuAction extends WapAction
{
    protected $FuwuToken;
    protected function _initialize()
    {
        parent::_initialize();
        $this->FuwuToken = strip_tags($this->_get('token'));
        $appid = M('Wxuser')->where(array('token' => $this->FuwuToken))->getField('fuwuappid');
        define('FUWU_APPID', $appid);
      
    }
    private function OutDebug($info, $debugging = 0)
    {
        $username = 'david_debug';
        if (!file_exists('log')) {
            mkdir('log');
        }
        $filename = 'log/Debug_' . $username . '.log';
        if (filesize($filename) > 1024 * 1024 * 5) {
            $filemode = 'w+';
        } else {
            $filemode = 'a+';
        }
        if ($debugging) {
            $debugheader = date('Y-m-d H:i:s') . ' [' . $uid . ']: ';
            $fp = fopen($filename, $filemode);
            fwrite($fp, $debugheader . $info . '
');
            fclose($fp);
        }
    }
    public function api()
    {
        require_once FUWU_PATH . 'aop/AopClient.php';
        require_once FUWU_PATH . 'HttpRequst.php';
        $serviceType = HttpRequest::getRequest('service');
        $biz_content = HttpRequest::getRequest('biz_content');
        if ($_POST['service'] == 'alipay.mobile.public.message.notify') {
            $serviceType = 'alipay.mobile.public.message.notify';
        } else {
            $serviceType = 'alipay.service.check';
        }
        switch ($serviceType) {
            case 'alipay.service.check':
                $success = '<success>true</success>';
                $biz_content = '<biz_content>MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDVwtjFJVYyf4/sZY+GE3FSeLx7RyOmt+KoWnLi9XsRpQdaXRd+X7mO8kr8Yw6KN9TwgZV8o7iVi3OsuuCD/hgua4Go2oyIWG/NjcaqM3nXOYripfV+BlOdslKBVyAhY6SNuavLt97CVpAe2bIcZH/heNQnHoMQtb/X+KoC6kwouQIDAQAB</biz_content>';
                $tmpArr = array($biz_content, $success);
                $aop = new AopClient();
                $sign = $aop->rsaSign($tmpArr);
                $xmlTmp = '<?xml version="1.0" encoding="GBK"?><alipay><response><success>true</success>' . $biz_content . '</response><sign>' . $sign . '</sign><sign_type>RSA</sign_type></alipay>';
                echo $msg = $xmlTmp;
                break;
            case 'alipay.mobile.public.message.notify':
                $this->OutDebug('---begin--', 1);
                require_once FUWU_PATH . 'Message.php';
                $msgObj = new Message();
                echo $msg = $msgObj->Message($_POST['biz_content'], $this->FuwuToken);
                break;
        }
    }
}
define('FUWU_PATH', './PigCms/Lib/ORG/Fuwu/');