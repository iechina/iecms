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
</script><!-- top ↑ --><script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script><script src="/tpl/static/artDialog/plugins/iframeTools.js"></script><script type="text/javascript" src="/tpl/User/default/common/js/select/js/jquery.js"></script><script type="text/javascript" src="/tpl/static/audioplayer/inc/jquery.jplayer.min.js"></script><script src="./tpl/User/default/common/js/cart/jscolor.js" type="text/javascript"></script><script type="text/javascript" src="/tpl/static/audioplayer/inc/jquery.mb.miniPlayer.js"></script>
<link rel="stylesheet" type="text/css" href="/tpl/static/audioplayer/css/miniplayer.css" title="style" media="screen"/>
<script type="text/javascript">        $(function () {            $(".audio").mb_miniPlayer({                width: 200,                inLine: false,                onEnd: playNext            });            function playNext(player) {                var players = $(".audio");                document.playerIDX = player.idx + 1 <= players.length - 1 ? player.idx + 1 : 0;                players.eq(document.playerIDX).mb_miniPlayer_play();            }        });    </script><div class="content" 
<?php if(session('isQcloud') == true): ?>style="float:center;"<?php endif; ?>
>
<div class="cLineB">
  <h4>首页回复配置 </h4>
  <a href="javascript:history.go(-1);" class="right btnGrayS vm" style="margin-top:-27px">返回</a> </div>
<div class="msgWrap bgfc">
  <form class="form" method="post" action="" enctype="multipart/form-data">
    <table class="userinfoArea" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%">
      <tbody>
        <tr>
          <th valign="top">微官网地址:</th>
          <td><span class="red"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/index.php?g=Wap&a=index&token=<?php echo ($token); ?>&wecha_id=o8cMxuDZt_KP-LtTNnomjFUfbB3U">http://<?php echo $_SERVER['HTTP_HOST'] ?>/index.php?g=Wap&a=index&token=<?php echo ($token); ?>&wecha_id=o8cMxuDZt_KP-LtTNnomjFUfbB3U</a></span></td>
        </tr>
        <tr>
          <th valign="top"><span class="red">*</span>关键词：</th>
          <td><span class="red">首页 或者 home —— 当用户输入该关键词时，将会触发此回复。</span></td>
        </tr>
        <tr>
          <th width="120">回复标题：</th>
          <td><input type="text" name="title" value="<?php echo ($home["title"]); ?>" class="px" style="width:550px;"></td>
        </tr>
        <tr>
          <th width="120">内容介绍：</th>
          <td><textarea style="width:560px;height:75px" name="info" id="info" class="px"><?php echo ($home["info"]); ?></textarea>
            <br/>
            最多填写120个字</td>
        </tr>
        <tr>
          <th>回复图片：</th>
          <td><input type="text" name="picurl" id="picurl" value="<?php echo ($home["picurl"]); ?>" class="px" style="width:550px;">
            <script src="/tpl/static/upyun.js?<?php echo date('YmdHis',time());?>"></script><a href="###" onclick="upyunPicUpload('picurl',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('picurl')">预览</a></td>
        </tr>
        <TR>
          <TH valign="top"><label for="gzhurl">公众号链接地址：</label></TH>
          <TD><input type="text" class="px" id="gzhurl"  name="gzhurl" value="<?php echo ($home["gzhurl"]); ?>" style="width:580px;"  />
            <br>
            <span class="red">填写此链接地址可以有效帮助粉丝关注您的公众号！请填写一个微信官方公众平台群发出的文章链接。链接前加http://</span></TD>
        </TR>
        <tr>
          <th>3G网站背景：</th>
          <td><input type="hidden" name="homeurl" id="homeurl" value="<?php echo ($home["homeurl"]); ?>" class="px" style="width:550px;">
            <a href="?g=User&m=Flash&a=index&token=<?php echo ($token); ?>&tip=2">请在首页背景图中设置</a></td>
        </tr>
        <tr>
          <th>开场动画：</th>
          <td><select id="start" onchange="Cmd(this)" name="start" value="<?php echo ($home["start"]); ?>"style="width:220px">
              <option name="start" value="">关闭开场动画</option>
              <option name="start" value="1" 
              <?php if($home["start"] == 1): ?>selected<?php endif; ?>
              >宝马动画
              </option>
              <option name="start" value="2" 
              <?php if($home["start"] == 2): ?>selected<?php endif; ?>
              >左右展开
              </option>
              <option name="start" value="3" 
              <?php if($home["start"] == 3): ?>selected<?php endif; ?>
              >上下展开
              </option>
              <option name="start" value="4" 
              <?php if($home["start"] == 4): ?>selected<?php endif; ?>
              >滑动式开场动画(可自定义图片)
              </option>
            </select></td>
        </tr>
        <tr id="div23">
          <th>开场动画颜色：</th>
          <td><input type="text" name="stpics" id="stpics" value="<?php echo ($strcolor); ?>" class="px color" style="width: 55px; background:<?php echo ($strcolor); ?>; color: rgb(255, 255, 255);"onblur="document.getElementById('pic1').value=document.getElementById('stpics').value;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="red">实际显示颜色为当前所选颜色的70%透明效果。</span></td>
        </tr>
        <tr id="div4">
          <th></th>
          <td><p class="red">此动画结束后,点击一下图片才能进入主页。</p>
            <img id="pic1_src" src="<?php if($img == 1): echo ($staticPath); ?>/tpl/static/home/kcdhbj.jpg
            <?php elseif($img == 2): ?>
            <?php echo ($strpic); ?>
            <?php else: ?>
            <?php echo ($staticPath); ?>/tpl/static/home/kcdhbj.jpg<?php endif; ?>
            " width="220" >
            <input class="px"  name="stpic" value="<?php if($img == 1): echo ($strpic); ?>
            <?php elseif($img == 2): ?>
            <?php echo ($strpic); ?>
            <?php else: ?>
            <?php echo ($staticPath); ?>/tpl/static/home/kcdhbj.jpg<?php endif; ?>
            " id="pic1" style="width:363px;" type="hidden" > <br>
            <script src="<?php echo ($staticPath); ?>/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('pic1',330,550,'<?php echo ($token); ?>')" class="a_upload">自定义图片</a> &nbsp;&nbsp;&nbsp;<span class="red">建议图片尺寸(330*550),由于手机屏幕大小不同,尺寸随实际需求设置。</span></td>
        </tr>
        <tr>
          <th>背景音乐：</th>
          <td><table>
              <tr>
                <?php if($home["musicurl"] != ''): ?><td><a style="width:120px;float:left" id="musicurl_src" class="audio {skin:'green'}" href="<?php echo ($home["musicurl"]); ?>">音乐播放</a></td><?php endif; ?>
                <td><input type="text" class="px" name="musicurl" value="<?php echo ($home["musicurl"]); ?>" id="musicurl" style="width:200px;float:left" onchange="$('#musicurl_src').attr('href',this.value">
                  <a href="###" onclick="upyunPicUpload('musicurl',0,0,'<?php echo ($token); ?>')" class="a_upload">上传</a>&nbsp;<a href="###" onclick="chooseFile('musicurl','music')" class="a_upload">选择</a></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <th>公司Logo：</th>
          <td><input type="text" name="logo" id="logo" value="<?php echo ($home["logo"]); ?>" class="px" style="width:550px;">
            <a href="###" onclick="upyunPicUpload('logo',1500,1000,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('logo')">预览</a><br/></td>
        </tr>
        <tr>
          <th>第三方接口：</th>
          <td><input type="text" name="apiurl" value="<?php echo ($home["apiurl"]); ?>" class="px" style="width:550px;">
            <br/>
            只适用于引用第三方3G网站的链接</td>
        </tr>
      <th>&nbsp;</th>
        <td><button type="submit" name="button" class="btnGreen">保存</button>
          &nbsp;&nbsp; <a href="javascript:history.go(-1);" class="btnGray vm">取消</a></td>
      </tr>
        </tbody>
      
    </table>
  </form>
</div>
<script type="text/javascript"> 		var start = <?php echo ($home["start"]); ?>; 		if(start == "4"){ 			$("#div4").show(); 		}else{ 			$("#div4").hide(); 		} 		if(start =='3' || start =='2'){ 			$("#div23").show(); 		}else{ 			$("#div23").hide(); 		}	 	function Cmd(obj){ 	 	    var abc = obj.value;	 	    if(abc == '4'){	 	    	$("#div4").show();	 	    }else{	 	    	$("#div4").hide();	 	    }  	 	    if(abc == '2' || abc =='3'){	 	    	$("#div23").show();	 	    }else{	 	    	$("#div23").hide();	 	    }	 	}  </script>
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