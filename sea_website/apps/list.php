<?php
require 'inc/conn.php';
$query = "SELECT * FROM web_settings";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$row = mysql_fetch_array($result);
require 'inc/cache.class.php';
$class_id=htmlspecialchars($_GET['class']);
if  ($class_id<>""){
$query = "SELECT n_id,n_name,n_keywords,n_description FROM web_2navigation WHERE( n_id= $class_id)";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$list = mysql_fetch_array($result);
$lanmu=$list['n_name'];
$indexyema="?class=".$class_id;
$chaAND="AND l_id=$class_id";
$fenpage="?class=".$class_id."&page=";
}else{
$indexyema="?list";
$chaAND="";
$fenpage="?list&page=";	
	}

$yemas=htmlspecialchars($_GET['page']);
if ($yemas<>""){
$yema=$row['web_jiange']." 第 $yemas 页";
}else{
$yema="";	
}
if ($lanmu<>""){
$lanmu=$lanmu;	
	}else{
$lanmu="分类";		
		}
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $lanmu?> <?php echo $yema ?> <?php echo $row['web_jiange']?> <?php echo $row['web_name']?></title>
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
<div class="row">
<?php 
$query = "SELECT url_address FROM web_article WHERE view_yes=1 $chaAND";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$numrows = mysql_num_rows($result);
$rowsperpage = 6;//每页显示数量
$totalpages = ceil($numrows / $rowsperpage);
$currentpage=htmlspecialchars($_GET['page']);
if ($currentpage==""){
 $currentpage = 1;	
	}
if (isset($currentpage) && is_numeric($currentpage)) {
   $currentpage = (int) $currentpage;
} else {
   $currentpage = 1;
} 

if ($currentpage > $totalpages) {
   $currentpage = $totalpages;
} 
if ($currentpage < 1) {
   $currentpage = 1;
}
$offset = ($currentpage - 1) * $rowsperpage;
$range = 2; 
$query=mysql_query("select url_address,w_title,w_images,w_content,w_tuijian,hit,l_id,w_keywords,w_author,w_time from web_article WHERE( view_yes=1 $chaAND)ORDER BY url_address DESC  limit $offset, $rowsperpage") ;
$i=$perpagenum*($page-1)+1;  
while($wz_list = mysql_fetch_array($query)){
$content= strip_tags($wz_list['w_content']); 

$wz_images=$wz_list['w_images'];
if ($wz_images<>""){
$wz_image="<font color='#ac68d7'>[ 图 ] </font>";
$img_images=$wz_images;
	}else{
$suijiimg="pic_".mt_rand(1,20);
$wz_image="";	
$img_images="/images/material/".$suijiimg.".jpg";
}
$l_id=$wz_list['l_id'];
$query2 = "SELECT n_id,n_name FROM web_2navigation WHERE n_id=$l_id";
$result2 = mysql_query($query2) or die('SQL语句有误：'.mysql_error());
$lanmu = mysql_fetch_array($result2)
?> 
<div class="6u">
<section>
<a href="?post=<?php echo $wz_list['url_address']?>" class="image feature"><img src="<?php echo $img_images?>" title="<?php echo $wz_list['w_title']?>" /></a>
<header>
<h3><a href="?post=<?php echo $wz_list['url_address']?>"><?php echo $wz_list['w_title']?></a></h3>
<div class="contentinfo">
<span>点击：<?php echo $wz_list['hit'] ?></span><?php echo $wz_list['w_author'] ?> / <a href="?class=<?php echo $lanmu['n_id']?>"><?php echo $lanmu['n_name']?></a> / <?php echo date('Y.m.d H:i', strtotime($wz_list['w_time']));?>
</div>
</header>
<p><?php echo mb_substr($content, 0, 100,'utf8')?> ...</p>
</section>
</div>
<?php
}
?>
<div class="pages">
<?
if ($currentpage > 1) {
   echo "<li><a href='".$indexyema."'>‹‹</a></li>";
   $prevpage = $currentpage - 1;
      if ($prevpage==1){
	echo '<li><a href="'.$indexyema.'">‹</a></li>';}else{
	echo "<li><a href='".$pageyema.$fenpage.$prevpage.$hz_url."'>‹</a></li>";
	}
}
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   if (($x > 0) && ($x <= $totalpages)) {
      if ($x == $currentpage) {
         echo '<li><a>'.$x.'</a></li>';
      } else {
		  if ($x==1){
			echo '<li><a href="'.$indexyema.'">'.$x.'</a></li>';  
			  }else{
         echo "<li><a href=".$pageyema.$fenpage.$x.$hz_url.">".$x."</a></li>";
			  }
      } 
   }
}
if ($currentpage != $totalpages) {
   $nextpage = $currentpage + 1;
   echo "<li><a href='".$pageyema.$fenpage.$nextpage.$hz_url ."'>›</a></li>";
   echo "<li><a href='".$pageyema.$fenpage.$totalpages.$hz_url."'>››</a></li>";
}
?>
</section>
</div>
</section>
</article>
<?php require 'transfer/footer.php'?>