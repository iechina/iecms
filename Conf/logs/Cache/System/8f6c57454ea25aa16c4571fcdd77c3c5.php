<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($f_siteName); ?>-微信后台管理系统</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="keywords" content="<?php echo ($f_siteName); ?>-微信后台管理系统" />
<meta name="description" content="<?php echo ($f_siteName); ?>-微信后台管理系统" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/common1.css" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/system.css" />
<script src="<?php echo RES;?>/js/jquery.min.js" type="text/javascript"></script>

<script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
	<script src="<?php echo RES;?>/js/frame.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo STATICS;?>/artDialog/jquery.artDialog.js?skin=default"></script>
	<script type="text/javascript" src="<?php echo STATICS;?>/artDialog/plugins/iframeTools.js"></script>
	<script type="text/javascript">
		$(function(){
			$('.body_nbsp').height($(window).height()-$('#header').height()-30);
			$(window).resize(function(){
				$('.body_nbsp').height($(window).height()-$('#header').height()-30);
			});
		});
	</script>

</head>
<body id="sysmain">
	<div class="content">
		<div class="syshead">
			<div class="clearfix">
				<p class="left"><img alt="<?php echo ($f_siteName); ?>" title="<?php echo ($f_siteName); ?>" src="<?php echo RES;?>/images/logo/syslogo.png" height="40" width="263"></p>
				<p class="right"><span>您好,</span><a href="javascript:void(0);"><?php echo (session('username')); ?></a><a class="outsys" title="退出系统" href="<?php echo U('System/del');?>"><img src="<?php echo RES;?>/images/index/huanchun.png" width="20" height="20" alt="" />清除缓存</a><a class="outsys" title="退出系统" href="<?php echo U('Admin/logout');?>"> <img src="<?php echo RES;?>/images/index/tuichu.png" width="20" height="20" alt="" />退出</a></p>
			</div>
		</div>
		<div class="sysmain clearfix">
			<div class="sysmenua">
				<ul>	
				<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav_val): $mod = ($i % 2 );++$i;?><li id="link<?php echo ($nav_val['id']); ?>">
									<a href="#" onClick="JumpleftFrame('<?php echo U('System/menu',array('pid'=>$nav_val['id'],'level'=>2,'title'=>rawurlencode($nav_val['title'])));?>',<?php echo ($nav_val['id']); ?>);"><?php echo ($nav_val['title']); ?></a>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>			 
				
				</ul>
			</div>
			         
            <div class="sysmenub">
			<iframe class="body_nbsp" frameBorder="0" id="left" name="left" scrolling="auto" src="<?php echo U('System/menu');?>" style="HEIGHT:100%;VISIBILITY:inherit;width:200px;Z-INDEX:2" allowtransparency="true"></iframe>
            </div>
				
		
			<div class="sysinfo">
			<iframe class="body_nbsp" id="main" name="main" style="width: 100%; HEIGHT: 100%" src="<?php echo U('System/main');?>" frameBorder=0></iframe>	
			</div>
		</div>
	</div>
        <div style="visibility:hidden">
<script src="http://s11.cnzz.com/z_stat.php?id=1254592827&web_id=1254592827" language="JavaScript"></script>
</div>

</body>
</html>