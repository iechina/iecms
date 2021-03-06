<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-06-06
 * Time: 23:11
 */
$menus=array(
    array('name'=>'基础设置',
        'iconName'=>'base',
        'display'=>0,
        'subs'=>array(array('name'=>'功能管理','link'=>U('Function/index',array('token'=>$token,'id'=>session('wxid'))),'new'=>0,'selectedCondition'=>array('m'=>'Function','a'=>'index')),
            array('name'=>'关注时回复与帮助','link'=>U('Areply/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Areply')),
            array('name'=>'微信－文本回复','link'=>U('Text/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Text')),
            array('name'=>'微信－图文回复','link'=>U('Img/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Img','a'=>'index')),
            array('name'=>'微信－图文编辑器','link'=>'./wx/index.html?token='.$token,'new'=>1,'selectedCondition'=>array('m'=>'Img','a'=>'index')),
            array('name'=>'微信－多图文回复','link'=>U('Img/multi',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Img','a'=>'multi')),
            array('name'=>'微信－语音回复','link'=>U('Voiceresponse/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Voiceresponse')),
            array('name'=>'微信－群发消息','link'=>U('Message/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Message')),
            array('name'=>'微信－模板消息','link'=>U('TemplateMsg/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'TemplateMsg')),
            array('name'=>'自定义LBS回复','link'=>U('Company/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Company')),
            array('name'=>'自定义菜单','link'=>U('Diymen/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Diymen')),
            array('name'=>'微信用户信息授权','link'=>U('Auth/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Auth')),
            array('name'=>'微信用户关怀配置','link'=>U('Auth/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Auth')),
            array('name'=>'微信微通知配置','link'=>U('Wtongzhi/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wtongzhi')),
            array('name'=>'回答不上来的配置','link'=>U('Other/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Other')),
            array('name'=>'邮箱提醒','link'=>U('Wzqemail/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Wzqemail')),
            array('name'=>'第三方客服','link'=>U('Kefu/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Kefu')),
        )),
    array('name'=>'微乾隆工单系统',
        'iconName'=>'scene',
        'display'=>0,
        'subs'=>array(array('name'=>'工单接收配置','link'=>U('Gongdan/set',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Gongdan','a'=>'set')),
            array('name'=>'工单管理','link'=>U('Gongdan/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Gongdan'),'exceptCondition'=>array('a'=>'lists')),
            array('name'=>'消息记录','link'=>U('Gongdan/lists',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Gongdan','a'=>'lists')),
        )),
    array('name'=>'微网站',
        'iconName'=>'site',
        'display'=>0,
        'subs'=>array(array('name'=>'首页回复配置','link'=>U('Home/set',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Home','g'=>'User','a'=>'set')),
            array('name'=>'分类管理','link'=>U('Classify/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Classify')),
            array('name'=>'模板管理','link'=>U('Tmpls/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Tmpls')),
            array('name'=>'文章管理','link'=>U('Essay/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Essay')),
            array('name'=>'首页幻灯片','link'=>U('Flash/index',array('token'=>$token,'tip'=>1)),'new'=>0,'selectedCondition'=>array('m'=>'Flash','tip'=>1)),
            array('name'=>'轮播背景图','link'=>U('Flash/index',array('token'=>$token,'tip'=>2)),'new'=>1,'selectedCondition'=>array('m'=>'Flash','tip'=>2)),
            array('name'=>'底部导航菜单','link'=>U('Catemenu/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Catemenu')),
            array('name'=>'版权设置','link'=>U('Home/plugmenu',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Home','g'=>'User','a'=>'plugmenu')),
            array('name'=>'微场景','link'=>U('Live/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Live')),
            array('name'=>'微名片','link'=>U('Vcard/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Vcard')),
            array('name'=>'微街景','link'=>U('Jiejing/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Jiejing')),
            array('name'=>'在线预览','link'=>U('Yulan/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Yulan')),
        )),
    array(
        'name'=>'手机站[独立]',
        'iconName'=>'site',
        'display'=>0,
        'subs'=>array(array('name'=>'手机站配置','f'=>'Phone','link'=>U('Phone/baseSet',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Phone','a'=>'baseSet'))
        )),
    array(
        'name'=>'百度直达号',
        'iconName'=>'zhida',
        'display'=>0,
        'subs'=>array(array('name'=>'对接配置','link'=>U('Zhida/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Zhida','a'=>'index')),
        )),
    array(
        'name'=>'微互动',
        'iconName'=>'interact',
        'display'=>0,
        'subs'=>array(array('name'=>'留言板','link'=>U('Reply/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Reply')),
            array('name'=>'微论坛','link'=>U('Forum/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Forum')),
            array('name'=>'3G图集(相册)','link'=>U('Photo/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Photo')),
            array('name'=>'3G微投票','link'=>U('Vote/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Vote')),
            array('name'=>'微预约','link'=>U('Custom/record',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Custom')),
            array('name'=>'微调研','link'=>U('Research/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Research')),
            array('name'=>'祝福贺卡','link'=>U('Greeting_card/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Greeting_card')),
            array('name'=>'分享管理','link'=>U('Share/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Share')),
            array('name'=>'邀请函','link'=>U('Invite/add',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Invite')),
        )),
    array(
        'name'=>'定制精品',
        'iconName'=>'base',
        'display'=>0,
        'subs'=>array(array('name'=>'微竞猜','link'=>U('Jingcai/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Jingcai')),
            //array('name'=>'微众场景','link'=>U('Scenes/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Scenes')),
            array('name'=>'活动报名','link'=>U('Baoming/index',array('token'=>$token,'id'=>session('wxid'))),'new'=>0,'selectedCondition'=>array('m'=>'Baoming')),
            array('name'=>'极客答题','link'=>U('Jikedati/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Jikedati')),
            array('name'=>'转发有礼','link'=>U('Hforward/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hforward')),
            array('name'=>'分享达人','link'=>U('Sharetalent/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Sharetalent')),
            array('name'=>'微助力','link'=>U('Weizhuli/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Weizhuli')),
            array('name'=>'拉票营销','link'=>U('Lapiao/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Lapiao')),
            array('name'=>'新年年签','link'=>U('Xinniannq/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Xinniannq')),
            array('name'=>'萌宝投票','link'=>U('Wqlvote/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wqlvote')),
            array('name'=>'投票','link'=>U('Hvote/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hvote')),
            array('name'=>'新版投票','link'=>U('Hvotes/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hvotes')),
            array('name'=>'易企秀管理','link'=>U('Eqx/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Eqx')),
        )),
    array(
        'name'=>'贺卡套餐',
        'iconName'=>'datacube',
        'display'=>0,
        'subs'=>array(array('name'=>'微秀贺卡','link'=>U('Knwx/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Knwx')),
            array('name'=>'微卡','link'=>U('Wk/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Knwx')),
            array('name'=>'卡娃贺卡','link'=>U('Hcar/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hcar')),
            array('name'=>'新年版卡娃贺卡','link'=>U('Kawahk/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Kawahk')),
            array('name'=>'音乐贺卡','link'=>U('Musiccar/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Musiccar')),
            array('name'=>'微杂志','link'=>U('Wzz/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wzz')),
        )),
    array(
        'name'=>'微分类',
        'iconName'=>'scene',
        'display'=>0,
        'subs'=>array(array('name'=>'微招聘','link'=>U('Zhaopin/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Zhaopin')),
            array('name'=>'微房产','link'=>U('Fangchan/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Fangchan')),
        )),
    array(
        'name'=>'行业应用',
        'iconName'=>'business',
        'display'=>0,
        'subs'=>array(array('name'=>'全民经纪人','f'=>'MicroBroker','link'=>U('MicroBroker/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'MicroBroker'),'test'=>0),
            array('name'=>'通用订单(酒吧KTV)','link'=>U('Host/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Host')),
            array('name'=>'万能表单','link'=>U('Selfform/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Selfform')),
            array('name'=>'微餐饮（无线打印）','link'=>U('Repast/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Repast')),
            array('name'=>'微外卖[新版]','f'=>'DishOut','link'=>U('DishOut/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'DishOut'),'test'=>0),
            array('name'=>'360°全景','link'=>U('Panorama/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Panorama')),
            array('name'=>'微婚庆（喜帖）','link'=>U('Wedding/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wedding')),
            array('name'=>'微汽车','link'=>U('Car/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Car')),
            array('name'=>'楼盘房产','link'=>U('Estate/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Estate')),
            array('name'=>'微教育','link'=>U('School/index',array('token'=>$token,'type'=>'semester')),'new'=>1,'selectedCondition'=>array('m'=>'School')),
            array('name'=>'微医疗','link'=>U('Medical/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Medical'),'test'=>0),
            array('name'=>'酒店宾馆','link'=>U('Hotels/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hotels')),
            array('name'=>'微美容','link'=>U('Business/index',array('token'=>$token,'type'=>'beauty')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'beauty'),'test'=>0),
            array('name'=>'微健身','link'=>U('Business/index',array('token'=>$token,'type'=>'fitness')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'fitness'),'test'=>0,'show'=>1),
            array('name'=>'微政务','link'=>U('Business/index',array('token'=>$token,'type'=>'gover')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'gover'),'test'=>0,'show'=>1),
            array('name'=>'微食品','link'=>U('Business/index',array('token'=>$token,'type'=>'food')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'food'),'test'=>0),
            array('name'=>'微旅游','link'=>U('Business/index',array('token'=>$token,'type'=>'travel')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'travel'),'test'=>0),
            array('name'=>'微花店','link'=>U('Business/index',array('token'=>$token,'type'=>'flower')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'flower'),'test'=>0),
            array('name'=>'微物业','link'=>U('Business/index',array('token'=>$token,'type'=>'property')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'property'),'test'=>0),
            array('name'=>'微KTV','link'=>U('Business/index',array('token'=>$token,'type'=>'ktv')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'ktv'),'test'=>0),
            array('name'=>'微酒吧','link'=>U('Business/index',array('token'=>$token,'type'=>'bar')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'bar'),'test'=>0),
            array('name'=>'微装修','link'=>U('Business/index',array('token'=>$token,'type'=>'fitment')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'fitment'),'test'=>0),
            array('name'=>'微婚庆','link'=>U('Business/index',array('token'=>$token,'type'=>'wedding')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'wedding'),'test'=>0),
            array('name'=>'微宠物','link'=>U('Business/index',array('token'=>$token,'type'=>'affections')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'affections'),'test'=>0),
            array('name'=>'微家政','link'=>U('Business/index',array('token'=>$token,'type'=>'housekeeper')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'housekeeper'),'test'=>0),
            array('name'=>'微租赁','link'=>U('Business/index',array('token'=>$token,'type'=>'lease')),'new'=>1,'selectedCondition'=>array('m'=>'Business','type'=>'lease'),'test'=>0),
        )),
    array(
        'name'=>'微现场',
        'iconName'=>'scene',
        'display'=>0,
        'subs'=>array(array('name'=>'微信签到','link'=>U('Signin/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Signin')),
            array('name'=>'摇一摇','link'=>U('Shake/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Shake')),
            array('name'=>'微信墙','link'=>U('Wall/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Wall')),
            array('name'=>'照片墙','link'=>U('Zhaopianwall/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Zhaopianwall')),
            array('name'=>'现场活动','link'=>U('Scene/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Scene')),
        )),
    array(
        'name'=>'电商系统',
        'iconName'=>'store',
        'display'=>0,
        'subs'=>array(array('name'=>'在线支付设置','link'=>U('Alipay_config/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Alipay_config')),
            array('name'=>'平台支付对帐','link'=>U('Platform/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Platform')),
            array('name'=>'微信团购系统','link'=>U('Groupon/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Groupon')),
            array('name'=>'微信商城系统','link'=>U('Store/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Store')),
            array('name'=>'商城分佣管理','link'=>U('Store/twitter',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Store','a'=>'twitter')),
            array('name'=>'微商圈','link'=>U('Market/index',array('token'=>$token)),'test'=>0,'selectedCondition'=>array('m'=>'Market')),
            //array('name'=>'淘宝天猫店铺配置','link'=>U('Taobao/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Taobao')),
            array('name'=>'微众筹','f'=>'Crowdfunding','link'=>U('Crowdfunding/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Crowdfunding')),
            array('name'=>'一元夺宝','f'=>'Unitary','link'=>U('Unitary/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Unitary')),
            array('name'=>'微砍价','f'=>'Bargain','link'=>U('Bargain/index',array('token'=>$token,'type'=>'Bargain')),'new'=>1,'selectedCondition'=>array('m'=>'Bargain')),
        )),
    array(
        'name'=>'微游戏',
        'iconName'=>'game',
        'display'=>0,
        'subs'=>array(array('name'=>'信息设置','link'=>U('Game/config',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Game','a'=>'config')),
            array('name'=>'我的游戏','link'=>U('Game/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Game','a'=>'index')),
            array('name'=>'游戏库','link'=>U('Game/gameLibrary',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Game','a'=>'gameLibrary')),
            array('name'=>'外链游戏','link'=>U('Youxi/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Youxi')),
            array('name'=>'2048虐心版','link'=>U('Gamet/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Gamet')),
            array('name'=>'Flappy 2048','link'=>U('Gamett/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Gamett')),
            array('name'=>'吃粽子大赛','link'=>U('Czz/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Czz')),
        )),
    array(
        'name'=>'微粉丝管理CRM',
        'iconName'=>'crm',
        'display'=>0,
        'subs'=>array(array('name'=>'粉丝管理','link'=>U('Wechat_group/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wechat_group','a'=>'index')),
            array('name'=>'分组管理','link'=>U('Wechat_group/groups',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wechat_group','a'=>'groups')),
            array('name'=>'粉丝行为分析','link'=>U('Wechat_behavior/statistics',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wechat_behavior')),
        )),
    array(
        'name'=>'微硬件',
        'iconName'=>'hardware',
        'display'=>0,
        'subs'=>array( array('name'=>'微wifi','link'=>U('Wifi/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wifi','a'=>'index')),
            array('name'=>'微信wifi介绍','link'=>U('Hardware/wifi',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hardware','a'=>'wifi')),
            array('name'=>'印美丽打印机','link'=>U('Yml/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Yml','a'=>'index')),
            array('name'=>'RippleOS设置','link'=>U('RippleOS/set',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'RippleOS','a'=>'set')),
            array('name'=>'无线打印机','link'=>U('Hardware/orderprint',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hardware','a'=>'orderprint')),
            array('name'=>'照片打印机','link'=>U('Hardware/photoprint',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Hardware','a'=>'photoprint')),
        )),
    array(
        'name'=>'微渠道',
        'iconName'=>'ditch',
        'display'=>0,
        'subs'=>array(array('name'=>'渠道二维码','link'=>U('Recognition/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Recognition')),
            array('name'=>'DIY宣传页','link'=>U('Adma/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Adma')),
        )),
    array(
        'name'=>'微客服',
        'iconName'=>'service',
        'display'=>0,
        'subs'=>array(
            array('name'=>'人工客服','link'=>U('ServiceUser/wechatService',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'ServiceUser')),
        )),
    array(
        'name'=>'微活动',
        'iconName'=>'active',
        'display'=>0,
        'subs'=>array(array('name'=>'分享助力','link'=>U('Helping/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Helping')),
            array('name'=>'人气冲榜','link'=>U('Popularity/index',array('token'=>$token)),'new'=>1,'test'=>0,'selectedCondition'=>array('m'=>'Popularity')),
            array('name'=>'幸运大转盘','link'=>U('Lottery/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Lottery')),
            array('name'=>'幸运九宫格','link'=>U('Jiugong/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Jiugong')),
            array('name'=>'优惠券','link'=>U('Coupon/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Coupon')),
            array('name'=>'刮刮卡','link'=>U('Guajiang/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Guajiang')),
            array('name'=>'幸运水果机','link'=>U('LuckyFruit/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'LuckyFruit')),
            array('name'=>'砸金蛋','link'=>U('GoldenEgg/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'GoldenEgg')),
            array('name'=>'走鹊桥','link'=>U('AppleGame/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'AppleGame')),
            array('name'=>'摁死小情侣','link'=>U('Lovers/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Lovers')),
            array('name'=>'中秋吃月饼','link'=>U('Autumn/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Autumn')),
            array('name'=>'拆礼盒','link'=>U('Autumns/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Autumns')),
            array('name'=>'一战到底','link'=>U('Problem/index',array('token'=>$token)),'new'=>0,'test'=>0,'selectedCondition'=>array('m'=>'Problem')),
            array('name'=>'微信红包','link'=>U('Red_packet/index',array('token'=>$token)),'new'=>0,'test'=>0,'selectedCondition'=>array('m'=>'Red_packet')),
            array('name'=>'惩罚台','link'=>U('Punish/index',array('token'=>$token)),'new'=>0,'test'=>0,'selectedCondition'=>array('m'=>'Punish')),
        )),
    array(
        'name'=>'会员卡',
        'iconName'=>'card',
        'display'=>0,
        'subs'=>array(array('name'=>'会员卡','link'=>U('Member_card/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member_card'),'exceptCondition'=>array('a'=>'replyInfoSet,focus,custom,center')),
            array('name'=>'会员中心','link'=>U('Member_card/center',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member_card','a'=>'center')),
            array('name'=>'回复设置','link'=>U('Member_card/replyInfoSet',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member_card','a'=>'replyInfoSet')),
            array('name'=>'幻灯片广告','link'=>U('Member_card/focus',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member_card','a'=>'focus')),
            array('name'=>'自定义输入项','link'=>U('Member_card/custom',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member_card','a'=>'custom')),
        )),
    array(
        'name'=>'数据魔方',
        'iconName'=>'datacube',
        'display'=>0,'subs'=>array(array('name'=>'请求数详情','link'=>U('Requerydata/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Requerydata')),
        array('name'=>'粉丝行为分析','link'=>U('Wechat_behavior/statistics',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Wechat_behavior','a'=>'statistics')),
    )),
    array(
        'name'=>'二次开发',
        'iconName'=>'secondary',
        'display'=>0,
        'subs'=>array(array('name'=>'融合第三方','link'=>U('Api/index',array('token'=>$token)),'new'=>1,'selectedCondition'=>array('m'=>'Api')),
        )),
);
?>



<?php
foreach ($menus as $mk => $mv){
    foreach ($mv['subs'] as $mvk => $mvv){
        if ($mvv['selectedCondition']['m'] == 'Web') {
            $path=str_replace($_SERVER['SCRIPT_NAME'],'',dirname($_SERVER['SCRIPT_FILENAME'])).DIRECTORY_SEPARATOR.'PigCms'.DIRECTORY_SEPARATOR.'Lib'.DIRECTORY_SEPARATOR.'Action'.DIRECTORY_SEPARATOR.'Web'.DIRECTORY_SEPARATOR;
            if (!file_exists($path.'Web_indexAction.class.php')) {
                unset($menus[$mk]);
            }
        }

        if(in_array($mvv['selectedCondition']['m'],$not_exist)){
            if($mvv['selectedCondition']['m'] == 'Home'){
                //微官网处理
                unset($menus[$mk]);
            }else{
                //正常处理
                unset($menus[$mk]['subs'][$mvk]);
            }
        }elseif($mvv['selectedCondition']['m'] == 'Business'){



            //行业处理



            if($mvv['selectedCondition']['type'] == 'wedding') $mvv['selectedCondition']['type'] = 'buswedd';



            if(in_array(ucfirst($mvv['selectedCondition']['type']),$not_exist)){



                unset($menus[$mk]['subs'][$mvk]);



            }



        }



        //主菜单



        if($menus[$mk]['subs'] == NULL){



            unset($menus[$mk]);



        }



    }



}







$i=0;







$parms=$_SERVER['QUERY_STRING'];



$parms1=explode('&',$parms);



$parmsArr=array();



if ($parms1){



    foreach ($parms1 as $p){



        $parms2=explode('=',$p);



        $parmsArr[$parms2[0]]=$parms2[1];



    }



}



/*



ksort($parmsArr);



$newParmStr='';



if ($parmsArr){



	$comma='';



	foreach ($parmsArr as $k=>$v){



		$newParmStr.=$comma.$k.'='.$v;



		$comma='&';



	}



}



*/



//



$subMenus=array();



$t=0;



$currentMenuID=0;



$currentParentMenuID=0;



foreach ($menus as $m){



    $loopContinue=1;



    if ($m['subs']){



        $st=0;



        foreach ($m['subs'] as $s){



            /*



            $conditionParmStr='';



            ksort($s['selectedCondition']);



            if ($s['selectedCondition']){



                $comma='';



                foreach ($s['selectedCondition'] as $k=>$v){



                    $conditionParmStr.=$comma.$k.'='.$v;



                    $comma='&';



                }



            }



            */



            $includeArr=1;



            if ($s['selectedCondition']){



                foreach ($s['selectedCondition'] as $condition){



                    if (!in_array($condition,$parmsArr)){



                        $includeArr=0;



                        break;



                    }



                }



            }



            if ($includeArr){



                if ($s['exceptCondition']){



                    foreach ($s['exceptCondition'] as $epkey=>$eptCondition){



                        if ($epkey=='a'){



                            $parm_a_values=explode(',',$eptCondition);







                            if ($parm_a_values){



                                if (in_array($parmsArr['a'],$parm_a_values)){



                                    $includeArr=0;



                                    break;



                                }



                            }



                        }else {



                            if (in_array($eptCondition,$parmsArr)){



                                $includeArr=0;



                                break;



                            }



                        }



                    }



                }



            }



            /*



            if ($t==1&&$st==4){



                echo $conditionParmStr;



            }



            */



            //



            if ($includeArr){



                $currentMenuID=$st;



                $currentParentMenuID=$t;



                $loopContinue=0;



                break;



            }



            $st++;



        }



        //



        if ($loopContinue==0){



            break;



        }



    }



    $t++;



}



//



/*



echo $currentMenuID;



echo $currentParentMenuID;



*/



//



foreach ($menus as $m){



    //



    $displayStr='';



    if ($currentParentMenuID!=0||0!=$currentMenuID){



        $m['display']=0;



    }



    if (!$m['display']){



        $displayStr=' style="display:none"';



    }



    if ($currentParentMenuID==$i){



        $displayStr='';



    }



    $aClassStr='';



    if ($displayStr){



        $aClassStr=' nav-header-current';



    }



    if($i == 0){



        echo '<a class="nav-header'.$aClassStr.'" style="border-top:none !important;"><b class="'.$m['iconName'].'"></b>'.$m['name'].'</a><ul class="ckit"'.$displayStr.'>';



    }else{



        echo '<a class="nav-header'.$aClassStr.'"><b class="'.$m['iconName'].'"></b>'.$m['name'].'</a><ul class="ckit"'.$displayStr.'>';



    }



    if ($m['subs']){



        $j=0;



        foreach ($m['subs'] as $s){



            $selectedClassStr='subCatalogList';



            if ($currentParentMenuID==$i&&$j==$currentMenuID){



                $selectedClassStr='selected';



            }



            $newStr='';



            if ($s['test']){



                $newStr.='<span class="test"></span>';



            }else {



                if ($s['new']){



                    $newStr.='<span class="new"></span>';



                }



            }



            if ($s['name']!='微信墙'&&$s['name']!='摇一摇'&&$s['name']!='现场活动'){



                echo '<li class="'.$selectedClassStr.'"> <a href="'.$s['link'].'">'.$s['name'].'</a>'.$newStr.'</li>';







            }else {



                switch ($s['name']){



                    case '微信墙':



                    case '摇一摇':



                    case '现场活动':



                        $path=str_replace($_SERVER['SCRIPT_NAME'],'',dirname($_SERVER['SCRIPT_FILENAME'])).DIRECTORY_SEPARATOR.'PigCms'.DIRECTORY_SEPARATOR.'Lib'.DIRECTORY_SEPARATOR.'Action'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR;



                        if (file_exists($path.'WallAction.class.php')&&file_exists($path.'ShakeAction.class.php')){



                            echo '<li class="'.$selectedClassStr.'"> <a href="'.$s['link'].'">'.$s['name'].'</a>'.$newStr.'</li>';



                        }



                        break;



                }



            }







            if ($s['name']=='模板管理'&&is_dir($_SERVER['DOCUMENT_ROOT'].'/cms')&&!strpos($_SERVER['HTTP_HOST'],'pigcms')){



                //echo '<li class="subCatalogList"> <a href="/index.php?g=User&m=AdvanceTpl&a=index">高级模板</a><span class="new"></span></li>';



                echo '<li class="subCatalogList"> <a href="/cms/manage/index.php">高级模板</a><span class="new"></span></li>';



            }



            $j++;



        }



    }



    echo '</ul>';



    $i++;



}