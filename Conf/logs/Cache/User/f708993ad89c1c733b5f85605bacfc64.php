<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> <?php echo ($f_siteTitle); ?> <?php echo ($f_siteName); ?></title>
<meta name="keywords" content="<?php echo ($f_metaKeyword); ?>" />
<meta name="description" content="<?php echo ($f_metaDes); ?>" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<script>var SITEURL='';</script>
<script src="<?php echo RES;?>/js/common.js" type="text/javascript"></script>
</head>
<body id="nv_member" class="pg_CURMODULE">
<div id="wp" class="wp">
   	<?php if($usertplid == 0): ?><link href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style.css?id=103" rel="stylesheet" type="text/css" />
	<?php else: ?>
		<link href="<?php echo ltrim(RES,'.');?>/css/style-<?php echo ($usertplid); ?>.css?id=103" rel="stylesheet" type="text/css" /><?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php echo ltrim(RES,'.');?>/css/style_2_common.css?BPm" />
<style>
a.a_upload,a.a_choose{border:1px solid #3d810c;box-shadow:0 1px #CCCCCC;-moz-box-shadow:0 1px #CCCCCC;-webkit-box-shadow:0 1px #CCCCCC;cursor:pointer;display:inline-block;text-align:center;vertical-align:bottom;overflow:visible;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;vertical-align:middle;background-color:#f1f1f1;background-image: -webkit-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); background-image: -moz-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); background-image: -ms-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); color:#000;border:1px solid #AAA;padding:2px 8px 2px 8px;text-shadow: 0 1px #FFFFFF;font-size: 14px;line-height: 1.5;
}
.pages{padding:3px;margin:3px;text-align:center;}
.pages a{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#036cb4;text-decoration:none;}
.pages a:hover{border:#999 1px solid;color:#666;}
.pages a:active{border:#999 1px solid;color:#666;}
.pages .current{border:#036cb4 1px solid;padding:2px 5px;font-weight:bold;margin:2px;color:#fff;background-color:#036cb4;}
.pages .disabled{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#ddd;}
</style>
 <script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
<div class="topbg">
<div class="top">
<div class="toplink">

<style>
.topbg{background:url(<?php echo ($staticPath); ?>/tpl/static/newskin/images/top.gif) repeat-x; height:101px; /*box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;*/}
.top { margin: 0px auto; width: 988px; height: 101px;
}
.top .toplink{ height:30px; line-height:27px; color:#999; font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ color:#999;}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}
.top .logo {width: 990px; color: #333; height:70px; font-size:16px;}
.top h1{ font-size:25px;float:left; width:230px; margin:0; padding:0; margin-top:6px; }
.top .navr {WIDTH:750px; float:right; overflow:hidden;}
.top .navr ul{ width:850px;}
.navr li {text-align:center; float: left; height:70px; font-size:1em; width:103px; margin-right:5px;}
.navr li a {width:103px; line-height:70px; float: left; height:100%; color: #333; font-size: 1em; text-decoration:none;}
.navr li a:hover { background:#ebf3e4;}
.navr li.menuon {background:#ebf3e4; display:block; width:103px;}
.navr li.menuon a{color:#333;}
.navr li.menuon a:hover{color:#333;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}
</style>
<div class="welcome">欢迎使用多用户微信营销服务平台!</div>
    <div class="memberinfo"  id="destoon_member">	
		<?php if($_SESSION[uid]==false): ?><a href="<?php echo U('Index/login');?>">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="<?php echo U('Index/login');?>">注册</a>
			<?php else: ?>
			你好,<a href="/#" hidefocus="true"  ><span style="color:red"><?php echo (session('uname')); ?></span></a>（uid:<?php echo (session('uid')); ?>）
			<a href="<?php echo U('System/Admin/logout');?>" >退出</a><?php endif; ?>	
	</div>
</div>
    <div class="logo">
        <div style="float:left"></div>
            <h1><a href="/" title="多用户微信营销服务平台"><img src="<?php echo ($f_logo); ?>" height="55" /></a></h1>
            <div class="navr">
            <ul id="topMenu">
                <li <?php if((ACTION_NAME == 'index') and (GROUP_NAME == 'Home')): ?>class="menuon"<?php endif; ?> ><a href="/">首页</a></li>
                <li <?php if((ACTION_NAME) == "fc"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/fc');?>">功能介绍</a></li>
                <li <?php if((ACTION_NAME) == "about"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/about');?>">关于我们</a></li>
                <li <?php if((ACTION_NAME) == "price"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/price');?>">资费说明</a></li>
                <li <?php if((ACTION_NAME) == "common"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/common');?>">微信导航</a></li>
                <li <?php if((GROUP_NAME) == "User"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('User/Index/index');?>">管理中心</a></li>
                <li <?php if((ACTION_NAME) == "help"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/help');?>">帮助中心</a></li>
            </ul>
        </div>
        </div>
    </div>
</div>
<div id="aaa"></div>
  <div class="contentmanage">
    <div class="developer">
       <div class="appTitle normalTitle2">
        <div class="vipuser">
         <div class="logo">
             <a href="<?php echo U('Function/welcome',array('token'=>$token));?>"><img src="<?php echo ($wecha["headerpic"]); ?>" width="100" height="100" /></a>
         </div>
         <div id="nickname">
             <strong><a href="<?php echo U('Function/welcome',array('token'=>$token));?>"><?php echo ($wecha["wxname"]); ?></a></strong>
             <a href="#" target="_blank" class="vipimg vip-icon<?php echo $userinfo['taxisid']-1; ?>" title=""></a>
         </div>
        <div id="weixinid">微信号:<?php echo ($wecha["weixin"]); ?></div>
        </div>
        <div class="accountInfo">
            <table class="vipInfo" width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td><strong>VIP有效期：</strong><?php echo (date("Y-m-d",$thisUser["viptime"])); ?></td>
                    <td><strong>图文自定义：</strong><?php echo ($thisUser["diynum"]); ?>/<?php echo ($userinfo["diynum"]); ?></td>
                    <td><strong>活动创建数：</strong><?php echo ($thisUser["activitynum"]); ?>/<?php echo ($userinfo["activitynum"]); ?></td>
                    <td><strong>请求数：</strong><?php echo ($thisUser["connectnum"]); ?>/<?php echo ($userinfo["connectnum"]); ?></td>
                </tr>
                <tr>
                    <td><strong>请求数剩余：</strong><?php echo ($userinfo['connectnum']-$_SESSION['connectnum']); ?></td>
                    <td><strong>已使用：</strong><?php echo $_SESSION['diynum']; ?></td>
                    <td><strong>当月赠送请求数：</strong><?php echo ($userinfo["connectnum"]); ?></td>
                    <td><strong>当月剩余请求数：</strong><?php echo $userinfo['connectnum']-$_SESSION['connectnum']; ?></td>
                </tr>
            </table>
        </div>
        <div class="clr"></div>
       </div>

<style type="text/css">
    ul#menu li .nav-header,ul#menu li ul li:last-child{border-bottom:1px solid #D7DDE6}
    #sideBar{border-right:0 solid #D3D3D3!important;float:left;padding:0 0 10px;width:170px;background:#fff}
    .tableContent{background:#f5f6f7;padding:0}
    .tableContent .content{border-left:1px solid #D7DDE6!important;min-height:1328px}
    ul#menu,ul#menu ul{list-style-type:none;margin:0;padding:0;background:#fff}
    ul#menu a{display:block;text-decoration:none}
    ul#menu li{margin:1px}
    ul#menu li ul li{margin:1px 0}
    ul#menu li a{background:#EBEEF1;color:#464D6A;padding:.5em}
    ul#menu li .nav-header{font-size:14px}
    ul#menu li .nav-header:hover{background:#DDE4EB}
    ul#menu li ul li a{background:#FCFCFC;color:#8288A4;padding-left:20px}
    ul#menu li ul li a:hover,ul#menu li.selected a{background:#fff;border-left:5px #4A98E0 solid}
    ul#menu li.selected a{padding-left:15px;color:#4A98E0}
    .code,.code li{border:1px solid #ccc}
    .code{list-style-type:decimal-leading-zero;padding:5px;margin:0}
    .code code{display:block;padding:3px;margin-bottom:0}
    .code li{background:#ddd;margin:0 0 2px 2.2em}
    .indent1{padding-left:1em}
    .indent2{padding-left:2em}
    a.nav-header{background:url(/tpl/static/images/arrow_click.png) center right no-repeat;cursor:pointer}
    a.nav-header-current{background:url(/tpl/static/images/arrow_unclick.png) center right no-repeat}
</style>
      <div class="tableContent">
        <?php
if (!isset($_SESSION['isQcloud'])){ ?>

        <!--左侧功能菜单-->

 <div  class="sideBar" id="sideBar">
     <div class="catalogList">
         <ul id="menu">
        <?php echo ($menuStr); ?>
<div style="clear:both"></div>
</ul>
</div>
</div>
<?php
} ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".nav-header").mouseover(function(){
			$(this).addClass('navHover');
		}).mouseout(function(){
			$(this).removeClass('navHover');
		}).click(function(){
			$(this).toggleClass('nav-header-current');
			$(this).next('.ckit').slideToggle();
		})
	});
</script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default">
</script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<script src="/tpl/User/default/common/js/panel.js"></script>
<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp"></script>
<script src="/tpl/User/default/common/js/map/thickbox-compressed.js"></script>
<script src="/tpl/User/default/common/js/map/jquery-1.4.3.min.js">
<link href="/tpl/User/default/common/js/map/thickbox.css" media="screen" rel="stylesheet" type="text/css" />
</script>
<script>
function selectall(name) {
	var checkItems=$('.cbitem');
	if ($("#check_box").attr('checked')==false) {
		$.each(checkItems, function(i,val){
			val.checked=false;
		});
	} else {
		$.each(checkItems, function(i,val){
			val.checked=true;
		});
	}
}
function setlatlng(panoid){
	art.dialog.data('panoid', panoid);
	// 此时 iframeA.html 页面可以使用 art.dialog.data('test') 获取到数据，如：
	// document.getElementById('aInput').value = art.dialog.data('test');
	art.dialog.open('<?php echo U('Map/pano',array('token'=>$token,'id'=>$id));?>',{lock:false,title:'复制pano',width:600,height:400,yesText:'关闭',background: '#000',opacity: 0.87});
}
</script>

<div class="content" <?php if(session('isQcloud') == true): ?>style="float:center;"<?php endif; ?>>
<!--活动开始-->
<div class="cLineB">
  <h4>街景导航设置 </h4>
 </div>
    <div class="msgWrap bgfc">
	  <form class="form" method="post" action=""   >
      <input type="hidden" name="id" value="<?php echo ($Jiejing["id"]); ?>"/>
		<table class="userinfoArea" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%">
			<tbody>
				<tr>
				  <th valign="top"><span class="red">*</span>关键词：</th>
				  <td>
					<input type="text" name="keyword" value="<?php echo ($Jiejing["keyword"]); ?>"class="px" style="width:550px;"></td>
				</tr>
				<tr>
				  <th valign="top"><span class="red">*</span>回复标题：</th>

					<td><input type="text" name="title" value="<?php echo ($Jiejing["title"]); ?>" class="px" style="width:550px;"></td>

				</tr>

				<tr>
				  <th valign="top"><span class="red">*</span>封面图片：</th>
                        <td><input type="text" name="picurl" id="picurl" value="<?php echo ($Jiejing["picurl"]); ?>" class="px" style="width:550px;"> <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('picurl',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a>   <a href="###" onclick="viewImg('picurl')">预览</a>  &nbsp; 大小为720x400</td>						
                </tr>
                <tr>
				  <th valign="top"><span class="red">*</span>内容介绍：</th>
                    <td><textarea  class="px" id="text" name="text"  style="width:550px; height:100px" ><?php echo ($Jiejing["text"]); ?></textarea>&nbsp;&nbsp;最多填写120个字</td>
				</tr>
                <tr>				
				  <th valign="top"><span class="red">*</span>Pano：</th>
					<td><input type="text" name="pano" id="info2" value="<?php echo ($Jiejing["pano"]); ?>" class="px" style="width:200px;"><a href="###" onclick="setlatlng($('#longitude').val(),$('#latitude').val())" class="">&nbsp;&nbsp;在地图中查看</a>&nbsp;&nbsp;<span style="color:red">保存后可以在下面实时预览街景</span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td><input type="hidden"  name="token" ivalue="<?php echo ($token); ?>" class="px" style="width:550px;">
					<button type="submit" name="button" class="btnGreen">保存</button> &nbsp;&nbsp;<a href="javascript:history.go(-1);" class="btnGray vm">取消</a>				
					</td>
				</tr>
			</tbody>
		</table>
	</form>
    <div style="text-align: left;
width: 145px;
font-size: 14px;
font-weight: bold;
line-height: 1.5;
padding: 8px 0;">实景预览:</div>
   <div class="soso-box">
	<!-- soso街景容器 -->
	<div id="pano_container" class="soso-pano-box"></div>
	<div class="soso-map-box">
		<!-- soso地图容器 -->
		<div class="soso-map" id="map_container"></div>
		<div class="soso-map-control">
			<h4>查询路线：</h4>
			<ul class="soso-sea-input">
				<li>起点 <input type="text" id="J_soso_start" value="西单地铁站" /></li>
				<li>终点 <input type="text" id="J_soso_end" value="颐和园路口东" readonly /></li>
			</ul>
			<div class="soso-search-btn">
				<input type="button" id="J_sea_bus" value="公交" />
				<input type="button" id="J_sea_drive" value="驾车" />
			</div>
			<h4>搜附近：</h4>
			<div class="soso-near-hotdot" id="J_soso_hotdot">
				<a href="javascript:" title="交通" data-name="交通">交通</a>
				<a href="javascript:" title="学校" data-name="学校">学校</a>
				<a href="javascript:" title="购物" data-name="购物">购物</a>
				<a href="javascript:" title="医院" data-name="医院">医院</a>
				<a href="javascript:" title="生活" data-name="生活">生活</a>
				<a href="javascript:" title="娱乐" data-name="娱乐">娱乐</a>
				<a href="javascript:" title="餐饮" data-name="餐饮">餐饮</a>
				<a href="javascript:" title="酒店" data-name="酒店">酒店</a>
			</div>
			<div class="seach-res-panel" id="J_soso_panel">
				<a href="javascript:" class="" id="J_soso_return" title="返回">返回</a> 
				<!-- 检索结果面板 -->
				<div id="J_soso_panel_cont"></div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	/* 重置浏览器，可以删除 */
	body{font:12px/1.5 Microsoft Yahei,tahoma,arial,\5b8b\4f53;color:#000}
	button,input{font:12px/1.5 Microsoft Yahei,tahoma,arial,\5b8b\4f53}
	html,body,h1,h2,h3,h4,h5,h6,hr,p,ul,ol,li,form,button,input,textarea,th,td{margin:0;padding:0}
	img{border:0}
	ol,ul{list-style:none}
	.soso-box{width:100%;overflow:hidden;}
	.soso-pano-box{height:550px;}
	.soso-map-box{position:relative;}
	.soso-map{height:300px;margin:0 182px 0 0}
	.soso-map-control{position:absolute;top:0;right:0;width:170px;height:288px;padding:5px;background:#fff;border:solid 1px #ccc;overflow:hidden;font-size:14px}
	.soso-map-control h4{font-size:16px}
	.soso-sea-input li{margin:3px 0 6px 0}
	.soso-sea-input li input{width:124px;padding:2px 3px}
	.soso-search-btn{margin:0 0 10px 30px}
	.soso-search-btn input{margin:0 5px 0 0;padding:0 4px;border:1px solid #aaa;background:#eee;cursor:pointer;}
	.soso-near-hotdot{margin:0 -20px 0 0}
	.soso-near-hotdot a{display:inline-block;margin:0 13px 5px 13px}
	.seach-res-panel{display:none;position:absolute;z-index:2;left:0;top:0;width:180px;height:288px;background:#fff;overflow:auto;}
	/* 结果面板 */
	.drive-title{margin:3px 0;padding:2px 4px;font-size:13px;line-height:20px;text-align: left;color: #8A8989;background-color: #EDF4FB;}
	.drive-list li{padding: 10px 5px; color:#969696;font-size: 13px;border-bottom: dashed 1px #DCDEE0;cursor:pointer;}
	.drive-list li span{color: #538DBE;padding:0 4px;}
	.drive-list li p{margin:5px 0 0 0; color:#969696;font-size: 13px;}
	.drive-list li p.bus-title{margin:0;line-height: 20px;text-align: left;color: #0059B2;}
	.soso-sea-index{float: left;display:inline;width:20px;height: 20px;line-height:20px;overflow: hidden;text-align: center;}
	.soso-sea-title{overflow: hidden;padding:0 5px;zoom:1;}
	.soso-sea-t{font-size:14px;color:#0059B3;}
	.drive-list li .soso-sea-title p{font-size:12px;margin:2px 0 0 0;}
	.soso-page{padding: 10px 0;text-align:center;}
	.soso-page span{padding:2px;font-size: 12px;cursor:pointer;}
	.soso-page span.cur{margin:0 5px;padding:3px;font-weight: bold;border-bottom: 2px solid #999999;}
</style>

<!--以下引入SOSO地图API，调用参数中的key，请在实际使用时替换成自己的key-->
<script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&libraries=place,convertor&key=d84d6d83e0e51e481e50454ccbe8986b"></script>
<!--以下引入SOSO地图街景与地图连动插件-->
<script src="http://open.map.qq.com/plugin/v2/PanoramaOverview/PanoramaOverview-min.js"></script>
<!--以下引入 搜索结果面板 插件 -->
<script type="text/javascript">
"use strict";
var _sosomaps = function(){
	var map = "";
	var pano = "";
	var panoLabels = [];
	var latlng = "";//初始默认坐标
	var panoServer = new soso.maps.PanoramaService();//街景检索对象
	var pano_id = "";//场景ID
	var pano_heading = "";//偏航角
	var pano_label = [];
	var latlngs = [];
	var pois = ""; /* 搜索附近POI结果 */
	var location = ""; 
	var ispano = 1; /* 判断是否存在街景 */
	var searKeyword = "";
	var _option = {};
	//通过ID获取DOM
	function $id(id){return document.getElementById(id);}
	//实例化自动完成
    var ap = new soso.maps.place.Autocomplete($id('J_soso_start'));
	/*
	 * 初始化 sosomaps.init(39.882326, 116.326088);
	 * @param lat 纬度
	 * @param lng 经度
	 * @param option 设置对象 
	   {
		 type : 坐标类型，默认空为soso地图标准坐标 1:gps经纬度，2:搜狗经纬度，3:百度经纬度，4:mapbar经纬度，5:google经纬度，6:搜狗墨卡托
		 pano : 街景初始化点
		 heading : 街景初始化朝向
		 pitch : 街景初始化俯仰角
		 zoom : 街景初始化缩放
		 auto : 是否开启自动旋转 true 开启  false 不开启
	   } 
	 */
	var init = function(lat, lng, option){
		_option = option || {};
		//坐标转换
		if(_option.type != null){
			soso.maps.convertor.translate(new soso.maps.LatLng(lat, lng), _option.type, function(res){
		        latlng = res[0];
		        _init();
		    });
		}else{
			latlng = new soso.maps.LatLng(lat, lng);
			_init();
		}
	};
	var _init = function(){
		if(_option.pano == null){
			//根据经纬度获取场景ID，创建街景，吸附半径1000米
			panoServer.getPano(latlng, 1000, function(result){
				/* 无街景处理 */
				if(result == null){
					ispano = 0;
					$id('pano_container').style.display = "none";
					line();
					map = new soso.maps.Map($id('map_container'), {
						center : latlng
					});
					return false;
				}
	            pano_id = result.svid;
	            pano_heading = getHeading(latlng['lat'], latlng['lng'], result.latlng.lat, result.latlng.lng);
	            //创建街景
				pano = new soso.maps.Panorama($id('pano_container'), {
			        pano : pano_id,
			        pov:{
			            heading : pano_heading
			        }
			    });
			    /*
				 * 添加街景场景点改变，从新计算marker坐标
			     */
			    soso.maps.event.addListener(pano, "pano_changed", function(){
			    	if(latlngs.length != 0){
			    		latlng = pano.getPosition();
			    		markerVoid(latlngs);
			    	}
			    });
			    //显示平面地图（使用地图与街景连动插件）
				var pano_overview = new soso.maps.PanoOverview($id('map_container'), {
			        panorama : pano
			    });
			    map = pano_overview.getMap();//获取插件中的地图对象
			    line();
	        });
		}else{
			var pov = {};
			if(_option.heading != null){
				pov.heading = _option.heading;
			}
			if(_option.pitch != null){
				pov.pitch = _option.pitch;
			}
			if(_option.zoom != null){
				pov.zoom = _option.zoom;
			}
			pano = new soso.maps.Panorama($id('pano_container'), {
		        pano : _option.pano,
		        pov: pov
		    });
		    /*
			 * 添加街景场景点改变，从新计算marker坐标
		     */
		    soso.maps.event.addListener(pano, "pano_changed", function(){
		    	if(latlngs.length != 0){
		    		latlng = pano.getPosition();
		    		markerVoid(latlngs);
		    	}
		    });
		    //显示平面地图（使用地图与街景连动插件）
			var pano_overview = new soso.maps.PanoOverview($id('map_container'), {
		        panorama : pano
		    });
		    map = pano_overview.getMap();//获取插件中的地图对象
			line();
		}
        //经纬度解析城市名
		var geocoder = new soso.maps.Geocoder({
        	complete : function(result){
        		location = result.detail.addressComponents.city;
        	}
        });
        geocoder.getAddress(latlng);
        //添加初始点marker
		var initMarker = new soso.maps.Marker({
			map : map,
			position : latlng
		});
	};
	/* 自动旋转 */
	var auto = function(){
		var heading = _option.heading != null ? _option.heading : 0;
		var timer = setInterval(function(){
            if(heading >= 360){
                heading = 0;
            }
            heading += 0.1;
            pano.setPov({heading : heading});
        }, 100);
        soso.maps.event.addListener(pano, 'pov_changed', function (){
            var pov = pano.getPov();
            if(Math.abs(pov.heading - heading) > 1 && Math.abs(pov.heading - heading) < 300){
                clearInterval(timer);
            }                     
        });
	};
	var drivingPanel, transferPanel, searchPanel;
	//实例化驾车与公交路线插件
	var line = function(){
		if(_option.auto){
			auto();
		}
		drivingPanel = new DrivingPanel(map, $id("J_soso_panel_cont"));
		transferPanel = new TransferPanel(map, $id("J_soso_panel_cont"));
		searchPanel = new SearchPanel(map, $id("J_soso_panel_cont"));
	}
	//搜附，创建SearchService实例
	var search = new soso.maps.SearchService({
        complete : function(results){
			pois = results.detail.pois;
			latlngs = [];
            for(var i = 0, l = pois.length; i < l; i++){
				latlngs.push(pois[i].latLng);
            }
            ispano == 1 && markerVoid(latlngs);
            $id("J_soso_panel").style.display = "block";
            searchPanel.init(results);
            /* 添加分页事件 */
            searchPanel.addPageEvent(search, searKeyword, latlng, 5000);
            clear();
        }
    });
	/*
	 * 搜索附近，默认半径5000米
	 * @param key 搜索关键词
	 * @param radius 搜索半径，默认5000米
	 */
	var searchNear = function(key, radius){
		var radius = radius || 5000;
		searKeyword = key || searKeyword;
	    search.searchNearBy(key, latlng, radius);
	};
	//驾车路线查询
	var drivingService = new soso.maps.DrivingService({
		location : location,
		complete : function(result){
			var del = result.detail;
			if(typeof del.distance != 'undefined'){
				$id("J_soso_panel").style.display = "block";
				drivingPanel.init(result);
			}else{
				var start = del.start[0].latLng;
				var end = del.end[0].latLng;
				drivingService.search(start, end);
			}
		}
	});
	function driveSea(start, end){
		drivingService.search(start, end);
		clear();
	}
	//公交路线查询
	var transferService = new soso.maps.TransferService({
		location : location,
		//panel : $id("J_soso_panel_cont"),
		complete : function(result){
			var del = result.detail;
			if(typeof del.city != 'undefined'){
				transferPanel.init(result);
				$id("J_soso_panel").style.display = "block";
			}else{
				var start = del.start[0].latLng;
				var end = del.end[0].latLng;
				transferService.search(start, end);
			}
		}
	});
	var transferSea = function(start, end){
		transferService.search(start, end);
		clear();
	};
	//返回，清除搜索结果和重置面板等
	function clear(){
		drivingPanel.clear();
		transferPanel.clear();
	}
	/*
	 * 简单版marker避让
	 * @param latlngs 需要避让的经纬度数组
	 */
	function markerVoid(latlngs){
		var headings = [];
		for(var i = 0; i < latlngs.length; i++){
			headings[i] = getHeading(latlngs[i]['lat'], latlngs[i]['lng'], latlng['lat'], latlng['lng']);
		}
		clearOverlays();
		/* marker避让，30度内只显示1个marker */
		for(var i = 0; i <= 360; i+=30){
			for(var k = 0; k < headings.length; k++){
				if(i < headings[k] && headings[k] < i+30){
					pano_label.push(new soso.maps.PanoramaLabel({
						position : pois[k].latLng,
						altitude : 100,
						panorama : pano,
						content : pois[k].name
					}));
					(function(k){
						soso.maps.event.addListener(pano_label[pano_label.length-1], "click", function(){							
							panoServer.getPano(pois[k].latLng, 1000, function(result){
					            pano_id = result.svid;
					            pano_heading = getHeading(pois[k].latLng['lat'], pois[k].latLng['lng'], result.latlng.lat, result.latlng.lng);
					            pano.setPano(pano_id);
					            pano.setPov({heading : pano_heading});
					        });
						});
					})(k);
					break;
				}	
			}
		}
	}
    /*
	 * 通过经纬度获取街景视线
	 * @param locLat,locLng 原始点纬度，经度
	 * @param panoLat,panoLng 街景纬度，经度 
     */
    function getHeading(locLat, locLng, panoLat, panoLng){
    	var heading = Math.acos((locLat - panoLat) / Math.sqrt(Math.pow(locLng - panoLng, 2) + Math.pow(locLat - panoLat, 2)));
		if (locLng - panoLng < 0) {
			heading = Math.PI * 2 - heading;
		}
		return heading/Math.PI*180;
    }
	/*
	 * 清除地图上的街景覆盖层
	 */
	function clearOverlays(){
	    var tmp = "";
	    while(tmp = pano_label.pop()){
	    	tmp.setVisible(false);
	    	tmp = null;
	    }
	}
	/* 隐藏结果面板 */
	soso.maps.event.addListener($id("J_soso_return"), "click", function(){
		clear();
		searchPanel.clear();
		$id("J_soso_panel").style.display = "none";
		/* 隐藏面板时，清除街景覆盖层 */
		clearOverlays();
	});
	return {
		init : init,
		searchNear : searchNear,
		driveSea : driveSea,
		transferSea : transferSea
	};
};
/* 以下为应用代码（程序入口） */
var sosomaps = _sosomaps();
sosomaps.init(39.882326, 116.326088, {
	pano : "<?php echo ($Jiejing["pano"]); ?>",
	heading : 277,
	auto : true
});
//搜索公交
document.getElementById("J_sea_bus").onclick = function(){
	var start = document.getElementById("J_soso_start").value;
	var end = document.getElementById("J_soso_end").value;
	sosomaps.transferSea(start, end);
};
//搜索驾车路线
document.getElementById("J_sea_drive").onclick = function(){
	var start = document.getElementById("J_soso_start").value;
	var end = document.getElementById("J_soso_end").value;
	sosomaps.driveSea(start, end);
};
//搜索附近
var near_search_obj = document.getElementById("J_soso_hotdot").getElementsByTagName("a");
for(var i = 0; i < near_search_obj.length; i++){
	near_search_obj[i].onclick = function(){
		sosomaps.searchNear(this.getAttribute("data-name"));
	};
}
</script>
  </div>

<!--底部-->
  	</div>
<?php if(session('isQcloud') != true): ?></div>
</div>
</div>

<style>
.IndexFoot {
	BACKGROUND-COLOR: #333; WIDTH: 100%; HEIGHT: 39px
}
.foot{ width:988px; margin:0px auto; font-size:12px; line-height:39px;}
.foot .foot_page{ float:left; width:600px;color:white;}
.foot .foot_page a{ color:white; text-decoration:none;}
#copyright{ float:right; width:380px; text-align:right; font-size:12px; color:#FFF;}
</style>
<div class="IndexFoot" style="height:120px;clear:both">
<div class="foot" style="padding-top:20px;">
<div class="foot_page" >
<a href="<?php echo ($f_siteUrl); ?>"><?php echo ($f_siteName); ?>,微信公众平台营销</a><br/>
帮助您快速搭建属于自己的营销平台,构建自己的客户群体。
</div>
<div id="copyright" style="color:white;">
	<?php echo ($f_siteName); ?>(c)版权所有 <a href="http://www.miibeian.gov.cn" target="_blank" style="color:white"><?php echo C('ipc');?></a><br/>
	技术支持：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($f_qq); ?>&site=qq&menu=yes">联系我们</a>

</div>
    </div>
</div>
<!-- 帮助悬浮开始 -->

<!-- upgrade start-->
<?php
if ($upgradeNews){ ?>
<script>
  	function closeUserUpgrade(){
  		$('#userUpgradeNotice').animate({opacity: "hide"}, "slow");
  		
  	}
  	</script>
<style>
/* 底部浮动层 */
.qyer_layer_fix { color:#fff; position:fixed; left:0; bottom:0; height:70px; width:100%; z-index:900; min-width:980px;display:none;}

/* 左侧活动图片 */
.qyer_layer_hot_img { position:absolute; bottom:0; left:0; display:inline-block;}

/* 右侧关闭图标 */
.qyer_layer_close { background:url(<?php echo ($staticPath); ?>/tpl/static/help/qyer_layer_close.png) no-repeat right center; text-indent:-9999px; width:31px; height:29px; position:absolute; right:20px; top:20px; cursor:pointer;}
.qyer_layer_close:hover { background-position:center center;}
.qyer_layer_close:active { background-position:left center;}

/* 浮动层信息 */
.qyer_layer_main { width:980px; min-width:980px; margin:0 auto; height:70px; position:relative;}
</style>
<div id="userUpgradeNotice" class="qyer_layer_fix _jsbeforelogindiv" style="background: url(<?php echo ($staticPath); ?>/tpl/static/help/qyer_layer_bg.png) repeat scroll 0% 0% transparent; display: block;">
	<div data-bn-ipg="bl-plansnow-left-1" class="qyer_layer_hot_img"><!--设置可显示隐藏 -->
    	<!--左侧热门图片 -->
    	    
    	    </div>
    <div class="qyer_layer_main">
    	<div style="font-size:22px; font-weight:bold; line-height:70px; text-align:center; font-family:Microsoft Yahei; color:red">
        	<?php echo $upgradeNews['title'];?> <span style="color:green">请联系管理员处理</span>
        </div>
    </div>
    <div data-bn-ipg="bl-plansnow-close" class="qyer_layer_close" onclick="closeUserUpgrade()">关闭</div><!--设置可显示隐藏 --></div>
    <?php
} ?>
<!-- upgrade end-->
<?php $data_g=GROUP_NAME; $textHelp=1; if (C('server_topdomain')=='pigcms.cn'){ $textHelp=0; }else{ $users=M('Users')->where(array('id'=>$_SESSION['uid']))->find(); if($users['sysuser']){ $textHelp=0; }else{ if(C('close_help')){ $data_g='notingh'; } } } $data = array( 'key' => C('server_key'), 'domain' => C('server_topdomain'), 'is_text' => $textHelp, 'data_g' => $data_g, 'data_m' => MODULE_NAME, 'data_a' => ACTION_NAME ); if(function_exists('curl_init')){ $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, 'http://up.pigcms.cn/oa/admin.php?m=help&c=view&a=get_list&'.http_build_query($data)); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch, CURLOPT_HEADER, 0); $content = curl_exec($ch);curl_close($ch); }else{ $content = file_get_contents('http://up.pigcms.cn/oa/admin.php?m=help&c=view&a=get_list&'.http_build_query($data)); } $content = json_decode($content,true); ?>
<?php if(!empty($content)): ?><!--<link href="<?php echo ($staticPath); ?>/tpl/static/help_xuanfu/css/zuoce.css" type="text/css" rel="stylesheet"/>-->
	<div class="zuoce zuoce_clear">
		<div id="Layer1">
			<a href="javascript:"></a>
		</div>
		<div id="Layer2" style="display:none;">
			<p class="xiangGuan zuoce_clear">相关帮助</p>
			<?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><p class="lianjie zuoce_clear"><a href="javascript:openwin('/index.php?g=User&m=Index&a=help&helpParm=/oa/admin_help_<?php echo ($list['id']); ?>.html',768,960)" <?php if($list['is_video'] == 1): ?>class="video"<?php else: ?>class="writing"<?php endif; ?>><?php echo ($list["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
			<!--p class="anNiuo clear"><a href="#">进入帮助中心</a></p-->
			<p class="anNiut zuoce_clear"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes" target="_blank">在线客服</a></p>
		</div>
	</div>
	<script type="text/javascript">
		window.onload = function(){
			var oDiv1 = document.getElementById('Layer1');
			var oDiv2 = document.getElementById('Layer2');
			oDiv1.onClick = function(){
				oDiv2.style.display = oDiv2.style.display == 'block' ? 'none' : 'block';
			}
		}
		function openwin(url,iHeight,iWidth){
			var iTop = (window.screen.availHeight-30-iHeight)/2,iLeft = (window.screen.availWidth-10-iWidth)/2;
			window.open(url, "newwindow", "height="+iHeight+", width="+iWidth+", toolbar=no, menubar=no,top="+iTop+",left="+iLeft+",scrollbars=yes, resizable=no, location=no, status=no");
		}
	</script><?php endif; ?>
<!-- 帮助悬浮结束 -->
<div style="display:none">
<?php echo ($alert); ?> 
<?php echo base64_decode(C('countsz'));?>
<!-- <script src="http://s11.cnzz.com/z_stat.php?id=1254592827&web_id=1254592827" language="JavaScript"></script>
 --></div>

</body>

<?php if(MODULE_NAME == 'Function' && ACTION_NAME == 'welcome'){ ?>
<script src="<?php echo ($staticPath); ?>/tpl/static/myChart/js/echarts-plain.js"></script>

<script type="text/javascript">


    var myChart = echarts.init(document.getElementById('main')); 
   

    var option = {
        title : {
            text: '<?php if($charts["ifnull"] == 1): ?>本月关注和文本请求数据统计示例图(您暂时没有数据)<?php else: ?>本月关注和文本请求数据统计<?php endif; ?>',
            x:'left'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['文本请求数','关注数'],
            x: 'right'
        },
        toolbox: {
            show : false,
            feature : {
                mark : {show: false},
                dataView : {show: false, readOnly: false},
                magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                restore : {show: false} ,
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : [<?php echo ($charts["xAxis"]); ?>]
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'文本请求数',
                type:'line',
                tiled: '总量',
                data: [<?php echo ($charts["text"]); ?>]
            },    
            {
                "name":'关注数',
                "type":'line',
                "tiled": '总量',
                data:[<?php echo ($charts["follow"]); ?>]
            }
       

        ]

    };                   

    myChart.setOption(option); 


    var myChart2 = echarts.init(document.getElementById('pieMain')); 
               
    var option2 = {
        title : {
            text: '<?php if($pie["ifnull"] == 1): ?>7日内粉丝行为分析示例图(您暂时没有数据)<?php else: ?>7日内粉丝行为分析<?php endif; ?>',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        toolbox: {
            show : false,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        series : [
            {
                name:'粉丝行为统计',
                type:'pie',
                radius : ['50%', '70%'],
                itemStyle : {
                    normal : {
                        label : {
                            show : false
                        },
                        labelLine : {
                            show : false
                        }
                    },
                    emphasis : {
                        label : {
                            show : true,
                            position : 'center',
                            textStyle : {
                                fontSize : '18',
                                fontWeight : 'bold'
                            }
                        }
                    }
                },
                data:[ 
                    <?php echo ($pie["series"]); ?>
                
                ]
            }
        ]
    };
     myChart2.setOption(option2,true); 


    var myChart3 = echarts.init(document.getElementById('pieMain2')); 
    var option3 = {
        title : {
            text: '<?php if($sex_series["ifnull"] == 1): ?>会员性别统计示例图(您暂时没有数据)<?php else: ?>会员性别统计<?php endif; ?>',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        toolbox: {
            show : false,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        series : [
            {
                name:'会员性别统计',
                type:'pie',
                radius : ['50%', '70%'],
                itemStyle : {
                    normal : {
                        label : {
                            show : false
                        },
                        labelLine : {
                            show : false
                        }
                    },
                    emphasis : {
                        label : {
                            show : true,
                            position : 'center',
                            textStyle : {
                                fontSize : '18',
                                fontWeight : 'bold'
                            }
                        }
                    }
                },
                data:[
                  <?php echo ($sex_series['series']); ?>
                ]
            }
        ]
    };                     

  myChart3.setOption(option3,true); 



    </script>
<?php } ?>
</html><?php endif; ?>