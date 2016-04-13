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
<title><?php echo $row['web_title']?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $row['web_keywords']?>" />
<meta name="description" content="<?php echo $row['web_description']?>" />
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
<body class="index loading">
<?php require 'transfer/header.php'?>
<!-- CTA -->
<section id="cta">
<div id="logo_text">
<ul class="texts">
<?php echo $row['web_add']?>
<p id="p">By：<span><?php echo $row['web_author']?></span></p>
</ul>
</div>
</section>
<article id="main">	
<section class="wrapper style4 container special">
<div class="row">
<?php
$query = "SELECT w_images,url_address,w_title,w_content,w_author,w_time,hit,l_id FROM web_article WHERE(view_yes=1) ORDER BY w_id DESC LIMIT 4";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
while (!!$article = mysql_fetch_array($result)) {
$w_content= strip_tags($article['w_content']);
$wz_images=$article['w_images'];
if ($wz_images<>""){
$wz_image="<font color='#ac68d7'>[ 图 ] </font>";
$img_images=$wz_images;
	}else{
$suijiimg="pic_".mt_rand(1,20);
$wz_image="";	
$img_images="/images/material/".$suijiimg.".jpg";
}
$l_id=$article['l_id'];
$query2 = "SELECT n_id,n_name FROM web_2navigation WHERE n_id=$l_id";
$result2 = mysql_query($query2) or die('SQL语句有误：'.mysql_error());
$lanmu = mysql_fetch_array($result2)	
?>                   
<div class="6u">
<section>
<a href="?post=<?php echo $article['url_address']?>" class="image feature"><img src="<?php echo $img_images?>" title="<?php echo $article['w_title']?>" /></a>
<header>
<h3><a href="?post=<?php echo $article['url_address']?>"><?php echo $article['w_title']?></a></h3>
<div class="contentinfo">
<span>点击：<?php echo $article['hit'] ?></span><?php echo $article['w_author'] ?> / <a href="?class=<?php echo $lanmu['n_id']?>"><?php echo $lanmu['n_name']?></a> / <?php echo date('Y.m.d H:i', strtotime($article['w_time']));?>
</div>
</header>
<p><?php echo mb_substr($w_content, 0, 70,'utf8')?> ...</p>
</section>
</div>
<?php }?>
</div>
</section>
<!-- Two -->
<section class="wrapper style1 container special">
<div class="row">
<div class="4u">
<section>
<header>
<h4>联系我们</h4>
</header>
<div class="other_info">
<ul>
<li>邮箱：<a ><?php echo $row['web_mail']?></a></li>
<li>企鹅：<a ><?php echo $row['web_qq']?></a></li>
<li>电话：<a ><?php echo $row['web_tel']?></a></li>
<li>网址： <a href="<?php echo $row['web_url']?>"><?php echo $row['web_url']?></a></li>
<li>缓存： <?php echo $row['web_cache']?> 分钟</li>
</ul>
</div>
</section>														
</div>
<div class="4u">					
<section>
<header>
<h4>点击排行</h4>
</header>
<div class="other_info">
<ul>
<?php 
$query=mysql_query("select * FROM web_article WHERE(view_yes=1) ORDER BY hit DESC LIMIT 5");
while($wz_info = mysql_fetch_array($query)){ 
?>
<li><a href="?post=<?php echo $wz_info['url_address']?>"><?php echo $wz_info['w_title']?></a> <span><?php echo $wz_info['hit']?></span></li>
<?php }?>
</ul>
</div>
</section>
</div>

<div class="4u">					
<section>
<header>
<h4>友情链接</h4>
</header>
<div class="link_info">
<ul>
<?php
$query = "SELECT url,jieshao,nofollow,name FROM web_link WHERE(view_yes=1) ORDER BY id ASC";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$lii = 1;
while (!!$u_link = mysql_fetch_array($result)) {
if ($u_link['nofollow']==1){
$nofollow='rel="nofollow"';
}else{
$nofollow="";	
}
?>
<li><a href="<?php echo $u_link['url']?>" target="_blank" title="<?php echo $u_link['jieshao']?>" <?php echo $nofollow ?> ><?php echo $u_link['name']?></a></li>
<?php
}
?>
</ul>
</div>
<div style="clear:both"></div>
</section>				
</div>

</div>
</section>
</article>
<?php require 'transfer/footer.php'?>