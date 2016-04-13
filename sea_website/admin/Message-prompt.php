<?php 
session_start();
date_default_timezone_set('PRC'); //设置中国时区
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//$msg=$_COOKIE['msg'];
//$url=$_COOKIE['url'];
$msg=$_SESSION['msg'];
$url=$_SESSION['url'];
if ($msg==""){
$msg="抱歉，请求非法，请返回首页重试！";
}
if ($url<>""){
?>
<meta http-equiv="Refresh" content="2; url=<?php echo $url?>" /> 
<?php }?>
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
<title>操作提示</title>
<link rel="stylesheet" href="../css/userskin.css" />
<style type="text/css">
body {	
	margin-top: 15%;
	font-family: "Microsoft YaHei", SimHei;
	background: #ccddd3;
}
a{
	text-decoration: none;
}
.a1{
	font-size: 20px;
	margin-top: 20px;
	color: #f00;
	letter-spacing:2px
}
.a2{
	font-size: 16px;
	width: 80%;
	line-height: 200%;
	color: #ac68d7;
	margin-top: 15px;
	
}
.sdiv {
	width: 90%;
	height: 130px;
	border: 1px solid #f1f1f1;
	background: rgba(255,255,255, 0.4) none repeat scroll 0 0 !important;
	filter: Alpha(opacity=40);
	background: #ffffff;
	font-weight:bold;
}
.tdiv { position:relative;}
</style>
</head>
<body>
<div align="center">
<div class="sdiv">
<div class="a1 tdiv">操作提示</div>
<div class="a2 tdiv"><?php echo $msg?></div>
</div>
</div>
</body>
</html>