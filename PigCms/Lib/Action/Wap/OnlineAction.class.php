<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-06-21
 * Time: 14:16
 */

class OnlineAction extends WapAction {

    //主接口
    public function index(){
        $online=$this->online();
        $this->assign('online',$online);

        $this->display();
    }

    //获得在线人员的数组
    public  function online(){
        $weixin=A('Home/Weixin');
        $accessToken=$weixin::getAccessToken();
        $url='https://api.weixin.qq.com/cgi-bin/customservice/getkflist?access_token='.$accessToken;
         $res=curlGet($url);
         if(strstr($res,'kf_account')){
            //说明设置过客服了
            $allserver=json_decode($res,true);
            $allserver=$allserver['kf_list'];
            $url='https://api.weixin.qq.com/cgi-bin/customservice/getonlinekflist?access_token='.$accessToken;
            $res=curlGet($url);
            if(!strstr($res,'kf_account')){
                return NULL;
            }
            $online=json_decode($res,true);
            $online=$online['kf_online_list'];
            //把两个数组结合起来
            foreach($allserver as $key=>$value){
                foreach($online as $k=>$v){
                    if($allserver[$key]['kf_account']==$online[$k]['kf_account']){
                        $online[$k]['kf_nick']=$value['kf_nick'];
                        $online[$k]['kf_headimgurl']=$value['kf_headimgurl'];
                        switch ($online[$k]['status']){
                            case 1:
                                $online[$k]['onlinestatus']='电脑在线';
                                $online[$k]['icon']='pc';
                                break;
                            case 2:
                                $online[$k]['onlinestatus']='手机在线';
                                $online[$k]['icon']='phone';
                                break;
                            case 3:
                                $online[$k]['onlinestatus']='电脑、手机在线';
                                $online[$k]['icon']='pc_phone';
                                break;
                            default:
                                $online[$k]['onlinestatus']='手机在线';
                                $online[$k]['icon']='phone';
                        }
                    }
                }
            }
          return $online;
        }else{
           return NULL;
        }

    }

    public function set(){
        $KfAccount=$this->_get('KfAccount');
        $nicname=$this->_get('nicname');
        S('service_'.$this->wecha_id,$KfAccount,7000);
        if(S('service_'.$this->wecha_id)){
            echo json_encode(array('err'=>0,'nicname'=>$nicname));
        }else{
            echo json_encode(array('arr'=>1,'nicname'=>$nicname))  ;
        }
    }

}