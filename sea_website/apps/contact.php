<?php
require 'inc/conn.php';
$query = "SELECT * FROM web_settings";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$row = mysql_fetch_array($result);
require 'inc/cache.class.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>联系 <?php echo $row['web_jiange']?> <?php echo $row['web_name']?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.dropotron.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/skel-layers.min.js"></script>
<script src="js/init.js"></script>
<noscript>
<link rel="stylesheet" href="css/skel.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style-noscript.css" />
</noscript>
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico">
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
</head>
<body class="no-sidebar loading">
<?php require 'transfer/header.php'?>
<!-- Main -->
<article id="main">
<!-- One -->
<section class="wrapper style4 container">
<!-- Content -->
<section>
<h2>留言反馈</h2>
<?php
$query = "SELECT web_ad1 FROM web_ad";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$web_ad = mysql_fetch_array($result);
$ad_xs=$web_ad['web_ad1']; 
if ($ad_xs<>""){
	echo $ad_xs;
}
?>
<!-- 多说评论框 start -->
<div class="ds-thread" data-thread-key="<?php echo $wz_id?>" data-title="<?php echo $wz['w_title']?>" data-url="<?php echo $row['web_url']?>/?post=<?php echo $wz_id?>"></div>
<!-- 多说评论框 end -->
</section>
</section>
</article>
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"isea"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.unstable.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- 多说公共JS代码 end -->  
<?php require 'transfer/footer.php'?> 