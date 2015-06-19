<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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


<script lanuage="JScript">
function tourl(url){
	parent.main.location.href=url;
}
</script>
<body>

 <div class="sysmenub">
				<p class="smenubtit"><?php if($title == ''): ?>站点管理<?php endif; echo ($title); ?></p>
				<ul>
					<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U($vo['name'].'/index',array('pid'=>$vo['id'],'level'=>3));?>" target="main" ><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>

	</div>
</body>
</html>