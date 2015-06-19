<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
<title><?php echo C('site_name');?> - 爱易微营销后台管理登录</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo C('site_name');?>微信营销系统" />
<meta name="Description" content="<?php echo C('site_name');?>微信营销系统" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/common1.css" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/system.css" />
</head>
<body id="loginpage">
	<div id="login" class="clearfix">
		<div class="main clearfix">
			<div class="logbox">
				<div class="header">
					<img alt="<?php echo C('site_name');?>" title="<?php echo C('site_name');?>" src="<?php echo RES;?>/images/logo/syslogo.png" height="40" width="263">
				</div>
				<div class="web_login" id="web_login">
					<form id="loginform"  name="loginform" action="<?php echo U('Admin/insert');?>" method="post" target="_self">
						<div class="inputOuter">
                            <input type="text" class="inputstyle" id="username" name="username" value="" tabindex="1">
                        </div>
						<div class="inputOuter">
                            <input type="password" class="inputstyle password" id="pw" name="password" value="" maxlength="16" tabindex="2"> 
                        </div>
                      
                        <div class="submit">
	                        <a class="login_button" href="">
	                            <input type="submit" name="Button1" value="登 录" class="btn" id="Button1">
	                        </a>
                        </div>
					</form>
				</div>
				
			</div>
			</div>
	</div>
</body>
</html>