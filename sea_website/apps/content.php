<?php
require 'inc/conn.php';
$query = "SELECT * FROM web_settings";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$row = mysql_fetch_array($result);
require 'inc/cache.class.php';
$wz_id=$_GET['post'];
if (!is_numeric($wz_id)){
 echo "<script>alert('小王八，不要进行非法尝试啦！');location.href='/'</script>";
 exit;	
	}

$query = "SELECT url_address,w_title,w_keywords,w_description,w_tuijian,w_images,hit,w_content,l_id,w_time,w_author,edit_time,publish_mode,w_zzip,view_yes FROM web_article WHERE( url_address= $wz_id)";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
if (!mysql_num_rows($result))  
{  
 echo "<script>alert('抱歉，内容已经被删除，或者不存在！');location.href='/'</script>";
 exit;
}

//浏览计数
$query = "UPDATE web_article SET hit = hit+1 WHERE url_address=$wz_id";
@mysql_query($query) or die('修改错误：'.mysql_error());

$wz = mysql_fetch_array($result);
$wz_images=$wz['w_images'];
if ($wz_images<>""){
$wz_image="<font color='#ac68d7'>[ 图 ] </font>";
$img_images=$wz_images;
	}else{
$suijiimg="pic_".mt_rand(1,20);
$wz_image="";	
$img_images="/images/material/".$suijiimg.".jpg";
}
$l_id=$wz['l_id'];
$query2 = "SELECT n_id,n_name FROM web_2navigation WHERE n_id=$l_id";
$result2 = mysql_query($query2) or die('SQL语句有误：'.mysql_error());
$lanmu = mysql_fetch_array($result2)	
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $wz['w_title']?> <?php echo $row['web_jiange']?> <?php echo $row['web_name']?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $wz['w_keywords']?>" />
<meta name="description" content="<?php echo $wz['w_description']?>" />
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
<link  rel="stylesheet" type="text/css" href="editor/third-party/SyntaxHighlighter/shCoreDefault.css"/>
<script type="text/javascript"  src="editor/third-party/SyntaxHighlighter/shCore.js"></script>
</head>
<body class="no-sidebar loading">
<?php require 'transfer/header.php'?>
<!-- Main -->
<article id="main">
<!-- One -->
<section class="wrapper style4 container">
<!-- Content -->
<div class="content">
<section>
<header>
<h3><?php echo $wz['w_title']?></h3>
<div class="contentinfo">
<?php echo $wz['w_author'] ?> / <a href="?class=<?php echo $lanmu['n_id']?>"><?php echo $lanmu['n_name']?></a> / 点击：<?php echo $wz['hit'] ?> / <?php echo date('Y.m.d H:i', strtotime($wz['w_time']));?>
<span><div class="bdsharebuttonbox"><a class="bds_more" href="#" data-cmd="more"></a><a title="分享到QQ空间" class="bds_qzone" href="#" data-cmd="qzone"></a><a title="分享到新浪微博" class="bds_tsina" href="#" data-cmd="tsina"></a><a title="分享到腾讯微博" class="bds_tqq" href="#" data-cmd="tqq"></a><a title="分享到人人网" class="bds_renren" href="#" data-cmd="renren"></a><a title="分享到微信" class="bds_weixin" href="#" data-cmd="weixin"></a></div></span>
</div>
</header>
<a class="image feature"><img src="<?php echo $img_images?>" title="<?php echo $wz['w_title']?>"/></a>
<p><?php echo $wz['w_content']?></p>
<?php
//上一篇
$query = "SELECT url_address,w_title FROM web_article WHERE( url_address > $wz_id AND view_yes=1) ORDER BY w_id ASC LIMIT 1";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
if (!mysql_num_rows($result)){
$up_wz="没有了";
}else{
$udwz = mysql_fetch_array($result);
$w_title=mb_substr($udwz['w_title'],0,15,'utf8');
$up_id=$udwz['url_address'];
$up_wz="<a href='?post=".$up_id."'>".$w_title."</a>";
 }	
 
//下一篇
$query = "SELECT url_address,w_title FROM web_article WHERE( url_address < $wz_id AND view_yes=1) ORDER BY w_id  DESC LIMIT 1";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$dowz = mysql_fetch_array($result);
$do_id=$dowz['url_address'];
if ($do_id < 1 ){
$do_wz="没有了";
}else{
$w_title=mb_substr($dowz['w_title'],0,15,'utf8');
$do_wz="<a href='?post=".$do_id."'>".$w_title."</a>";
}
?>
<?php
$query = "SELECT web_ad1 FROM web_ad";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$web_ad = mysql_fetch_array($result);
$ad_xs=$web_ad['web_ad1']; 
if ($ad_xs<>""){
	echo $ad_xs;
}
?>

<div class="up_info">
← <?php echo $up_wz?><span><?php echo $do_wz?> →</span>
</div>
<!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key="<?php echo $wz_id?>" data-title="<?php echo $wz['w_title']?>" data-url="<?php echo $row['web_url']?>/?post=<?php echo $wz_id?>"></div>
<!-- 多说评论框 end -->
</section>
</div>
</section>
</article>
<script type="text/javascript">       
SyntaxHighlighter.highlight();      
</script>
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
<script>
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
<?php require 'transfer/footer.php'?>