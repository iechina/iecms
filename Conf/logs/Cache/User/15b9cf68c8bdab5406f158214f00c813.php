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
<div class="content">
	<div class="cLineB">
			<h4>邮件平台</h4>
		<div class="clr"></div>
	</div>
	<script>
		function ccolumns(value){
		
			if(value=='1'){
		
				$('.alipay').css('display','');
		
			}else{
		
				$('.alipay').css('display','none');
		
			}
		
		}
	</script>
	<form method="post" action="" enctype="multipart/form-data">
		<div class="msgWrap bgfc">
			<table class="userinfoArea" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%">
				<tbody>
					<tr>
						<th>发送邮箱：</th>
						<td>
							<select name="type" onchange="ccolumns(this.value)" class="px" style="width:550px;height:30px">
								<option value="1" <?php if($config["type"] == '1'): ?>selected<?php endif; ?>>自定义邮箱发送</option>
								<option value="0" <?php if($config["type"] != '1'): ?>selected<?php endif; ?>>系统邮箱发送</option>
							</select><br/>	<span class="red">推荐用系统邮箱发送比较稳定</span>
						</td>
					</tr>
					<tr class="alipay" <?php if($config["type"] != '1'): ?>style="display:none"<?php endif; ?>>
						<th>smtp服务器：</th>
						<td>
							<input type="text" name="smtpserver" value="<?php echo ($config["smtpserver"]); ?>" class="px" style="width:550px;height:30px">
							<br/><span class="red">一定要在邮箱里开通smtp服务，一般163的为smtp.163.com ，QQ邮箱的为smtp.qq.com</span>
						</td>
					</tr>
					<tr class="alipay" <?php if($config["type"] != '1'): ?>style="display:none"<?php endif; ?>>
						<th>smtp端口：</th>
						<td>
							<input type="text" name="port" value="<?php echo ($config["port"]); ?>" class="px" style="width:550px;height:30px"><br/>	<span class="red">一般默认端口都是25</span>
						</td>
					</tr>
					<tr class="alipay" <?php if($config["type"] != '1'): ?>style="display:none"<?php endif; ?>>
						<th>SMTP账号：</th>
						<td>
							<input type="text" name="name" value="<?php echo ($config["name"]); ?>" class="px" <input type="text" name="title" value="首页" class="px" style="width:550px;height:30px"><br/>	<span class="red">输入邮箱帐号</span>
						</td>
					</tr>
					<tr class="alipay" <?php if($config["type"] != '1'): ?>style="display:none"<?php endif; ?>>
						<th>SMTP密码：</th>
						<td>
							<input type="password" name="password" value="<?php echo ($config["password"]); ?>" <input type="text" name="title" value="首页" class="px" style="width:550px;height:30px"><br/>	<span class="red">输入邮箱密码</span>
						</td>
					</tr>
					<tr>
						<TH valign="top">
							<label for="gzhurl">接受邮箱：</label>
						</th>
						<td>
							<input type="text" class="px" name="receive" value="<?php echo ($config["receive"]); ?>" style="width:550px;height:30px">
							<br><span class="red">商家邮箱用于接收邮件</span>
						</td>
					</tr>
					</tbody>
		</table>
					<table class="ListProduct" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%">
			<tbody>
					<tr>
						<th><span class="red">*</span>微招聘：</th>
						<td>
							<input type="radio" value="1" <?php if($config["zhaopin"] == 1): ?>checked="checked"<?php endif; ?>name="zhaopin"/>开启
							<input type="radio" value="0" name="zhaopin" <?php if($config["zhaopin"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微招聘通知</span>
						</td>
						<th><span class="red">*</span>微招聘(简历)：</th>
						<td>
							<input type="radio" value="1" <?php if($config["jianli"] == 1): ?>checked="checked"<?php endif; ?>name="jianli"/>开启
							<input type="radio" value="0" name="jianli" <?php if($config["jianli"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微招聘简历通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>微餐饮：</th>
						<td>
							<input type="radio" value="1" <?php if($config["dingcan"] == 1): ?>checked="checked"<?php endif; ?>name="dingcan"/>开启
							<input type="radio" value="0" name="dingcan" <?php if($config["dingcan"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微餐饮订餐通知</span>
						</td>
						<th><span class="red">*</span>微预约：</th>
						<td>
							<input type="radio" value="1" <?php if($config["yuyue"] == 1): ?>checked="checked"<?php endif; ?>name="yuyue"/>开启
							<input type="radio" value="0" name="yuyue" <?php if($config["yuyue"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">预约订单通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>在线预约：</th>
						<td>
							<input type="radio" value="1" <?php if($config["zxyy"] == 1): ?>checked="checked"<?php endif; ?>name="zxyy"/>开启
							<input type="radio" value="0" name="zxyy" <?php if($config["zxyy"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">在线预约订单通知</span>
						</td>
						<th><span class="red">*</span>微汽车：</th>
						<td>
							<input type="radio" value="1" <?php if($config["car"] == 1): ?>checked="checked"<?php endif; ?>name="car"/>开启
							<input type="radio" value="0" name="car" <?php if($config["car"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微汽车订单通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>微医疗：</th>
						<td>
							<input type="radio" value="1" <?php if($config["yiliao"] == 1): ?>checked="checked"<?php endif; ?>name="yiliao"/>开启
							<input type="radio" value="0" name="yiliao" <?php if($config["yiliao"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微医疗订单通知</span>
						</td>
						<th><span class="red">*</span>酒店宾馆：</th>
						<td>
							<input type="radio" value="1" <?php if($config["jdbg"] == 1): ?>checked="checked"<?php endif; ?>name="jdbg"/>开启
							<input type="radio" value="0" name="jdbg" <?php if($config["jdbg"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">酒店宾馆订单通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>微美容：</th>
						<td>
							<input type="radio" value="1" <?php if($config["beauty"] == 1): ?>checked="checked"<?php endif; ?>name="beauty"/>开启
							<input type="radio" value="0" name="beauty" <?php if($config["beauty"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微美容订单通知</span>
						</td>
						<th><span class="red">*</span>微健身：</th>
						<td>
							<input type="radio" value="1" <?php if($config["fitness"] == 1): ?>checked="checked"<?php endif; ?>name="fitness"/>开启
							<input type="radio" value="0" name="fitness" <?php if($config["fitness"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微健身订单通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>微政务：</th>
						<td>
							<input type="radio" value="1" <?php if($config["gover"] == 1): ?>checked="checked"<?php endif; ?>name="gover"/>开启
							<input type="radio" value="0" name="gover" <?php if($config["gover"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微政务订单通知</span>
						</td>
						<th><span class="red">*</span>微食品：</th>
						<td>
							<input type="radio" value="1" <?php if($config["food"] == 1): ?>checked="checked"<?php endif; ?>name="food"/>开启
							<input type="radio" value="0" name="food" <?php if($config["food"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微食品订单通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>微旅游：</th>
						<td>
							<input type="radio" value="1" <?php if($config["travel"] == 1): ?>checked="checked"<?php endif; ?>name="travel"/>开启
							<input type="radio" value="0" name="travel" <?php if($config["travel"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微旅游订单通知</span>
						</td>
						<th><span class="red">*</span>微花店：</th>
						<td>
							<input type="radio" value="1" <?php if($config["flower"] == 1): ?>checked="checked"<?php endif; ?>name="flower"/>开启
							<input type="radio" value="0" name="flower" <?php if($config["flower"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微花店订单通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>微物业：</th>
						<td>
							<input type="radio" value="1" <?php if($config["property"] == 1): ?>checked="checked"<?php endif; ?>name="property"/>开启
							<input type="radio" value="0" name="property" <?php if($config["property"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微物业订单通知</span>
						</td>
						<th><span class="red">*</span>微酒吧：</th>
						<td>
							<input type="radio" value="1" <?php if($config["bar"] == 1): ?>checked="checked"<?php endif; ?>name="bar"/>开启
							<input type="radio" value="0" name="bar" <?php if($config["bar"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微酒吧订单通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>微婚庆：</th>
						<td>
							<input type="radio" value="1" <?php if($config["wedding"] == 1): ?>checked="checked"<?php endif; ?>name="wedding"/>开启
							<input type="radio" value="0" name="wedding" <?php if($config["wedding"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微婚庆订单通知</span>
						</td>
						<th><span class="red">*</span>微装修：</th>
						<td>
							<input type="radio" value="1" <?php if($config["fitment"] == 1): ?>checked="checked"<?php endif; ?>name="fitment"/>开启
							<input type="radio" value="0" name="fitment" <?php if($config["fitment"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微装修订单通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>微宠物：</th>
						<td>
							<input type="radio" value="1" <?php if($config["affections"] == 1): ?>checked="checked"<?php endif; ?>name="affections"/>开启
							<input type="radio" value="0" name="affections" <?php if($config["affections"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微宠物订单通知</span>
						</td>
						<th><span class="red">*</span>微家政：</th>
						<td>
							<input type="radio" value="1" <?php if($config["housekeeper"] == 1): ?>checked="checked"<?php endif; ?>name="housekeeper"/>开启
							<input type="radio" value="0" name="housekeeper" <?php if($config["housekeeper"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微家政订单通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>微租赁：</th>
						<td>
							<input type="radio" value="1" <?php if($config["lease"] == 1): ?>checked="checked"<?php endif; ?>name="lease"/>开启
							<input type="radio" value="0" name="lease" <?php if($config["lease"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微租赁订单通知</span>
						</td>
						<th><span class="red">*</span>万能表单：</th>
						<td>
							<input type="radio" value="1" <?php if($config["wn"] == 1): ?>checked="checked"<?php endif; ?>name="wn"/>开启
							<input type="radio" value="0" name="wn" <?php if($config["wn"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">万能表单订单通知</span>
						</td>
					</tr>
					<tr>
						<th><span class="red">*</span>商城：</th>
						<td>
							<input type="radio" value="1" <?php if($config["shangcheng"] == 1): ?>checked="checked"<?php endif; ?>name="shangcheng"/>开启
							<input type="radio" value="0" name="shangcheng" <?php if($config["shangcheng"] == 0): ?>checked="checked"<?php endif; ?>/>关闭 <span class="red">微商城订餐通知</span>
						</td>
						
					</tr>
					<div>
						<input type="hidden" name="token" value="<?php echo ($config["token"]); ?>" class="px" tabindex="1" size="40">
					</div>
				</tbody>
				<TR>
					<th></TH>
					<TD>
						<button type="submit" name="button" class="btnGreen left" id="saveSetting">保存</button>
						<div class="clr"></div>
					</TD>
				</TR>
			</table>
		</div>
	</form>
</div>
<div class="clr"></div>
<!--底部-->
</div>
</div>
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
</html>