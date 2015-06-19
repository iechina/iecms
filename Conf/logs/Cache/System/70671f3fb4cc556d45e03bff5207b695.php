<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<meta http-equiv="x-ua-compatible" content="ie=7" />
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
#cover {
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	left: 0;
	background: #111;
	z-index: 10000;
	font-size: 30px;
	color: white;
	margin: 0 auto;
	text-align: center;
	padding-top: 30px;
}
.hidden {
	display: none;
}
.show {
	display: block;
}
</style>
<style>
canvas {
	background: #111;
	border: 4px solid #171717;
	display: block;
	left: 50%;
	margin: -51px 0 0 -201px;
	position: absolute;
	top: 70%;
}
</style>
</head>
<body>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<script src="<?php echo STATICS;?>/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/function.js" type="text/javascript"></script>
<meta http-equiv="x-ua-compatible" content="ie=7" />
</head>
<body class="warp">
<div id="artlist">
	<div class="mod kjnav">
		<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($action.'/'.$vo['name'],array('pid'=>$_GET['pid'],'level'=>3,'title'=>urlencode ($vo['title'])));?>"><?php echo ($vo['title']); ?></a>
		<?php if(($action == 'Article') or ($action == 'Img') or ($action == 'Text') or ($action == 'Voiceresponse')): break; endif; endforeach; endif; else: echo "" ;endif; ?>
	</div>   	
</div>
<div class="content">
  <div class="box">
    <h3><?php echo C('site_name');?>更新消息</h3>
    <div class="con dcon">
      <div class="update">
        <p> <script type="text/javascript" src="http://bbs.weiqianlong.com/api.php?mod=js&bid=73"></script> </p>
      </div>
      <ul class="myinfo">
        <li>
          <p class="red">您的程序版本为：微乾隆商业版 3.X [ 授权版本：商业版 (终身免费) ]</p>
        </li>
      </ul>
    </div>
  </div>
  <!--/box-->
  <div class="box">
    <h3 >微乾隆数据库同步</h3>
    <div class="con dcon">
      <div class="update">
        <ul class="myinfo kjinfo">
          <li class="title">微乾隆数据库同步说明</li>
          <li>点击左侧数据库同步，等待完成</li>
          <li>联系旺旺：张山峰66 获取更新文件</li>
          <li>完成更新</li>
      
           <li>官方淘宝旗舰店：<a href="http://weixincms.taobao.com">weixincms.taobao.com</a></li>
           <li>微乾隆的发展离不开你们的支持，坚持创新与服务，实现共赢</li>
        </ul>
      </div>
    </div>
  </div>
  <!--/box--> </div>
</body>
</html>