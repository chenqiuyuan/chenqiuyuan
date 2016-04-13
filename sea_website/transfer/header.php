<header id="header">
<h1 id="logo"> <a href="/"><span><?php echo $row['web_slogan']?></span></a></h1>
<nav id="nav">
<ul>
<li class="current"><a href="/">首页</a></li>
<li class="submenu">
<a href="?list">分类</a>
<ul>                                
<?php                             
$query=mysql_query("select * FROM web_2navigation");
while($fenlei = mysql_fetch_array($query)){ 
?>
<li><a href="?class=<?php echo $fenlei['n_id']?>">→ <?php echo $fenlei['n_name']?></a></li>
<?php }?>
</ul>
</li>
<li><a href="?contact">联系</a></li>
</ul>
</nav>
</header>	