<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <style>
    </style>
    <!-- "陈"字标签 -->
    <link rel="shortcut icon" type="image/x-ico" src="/chenqiuyuan/Public/icon/favicon.ico" />

    <title>陈秋远</title>

    <!-- Bootstrap core CSS -->
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <!-- 表格(table)的CSS -->
    <link rel="stylesheet" type="text/css" href="/chenqiuyuan/Public/CSS/table.css" />

  </head>
<body>
	<div class="header clearfix">
  <nav>
    <ul class="nav nav-pills pull-right">
      	<li role="presentation" class="active" ><a href="/chenqiuyuan/index.php/Home/Admin/index">陈秋远</a></li>
      	<li role="presentation"><a href="#">关于</a></li>
      	<li role="presentation"><a href="/chenqiuyuan/index.php/Home/Contact/index">联系我</a></li>
    </ul>
    <div>
    	<h3><a href="/chenqiuyuan/index.php/">主页</a></h3>
    </div>
  </nav>
  <nav>
    
</div>
	<!-- 头部 -->
	<FORM method="post" action="/chenqiuyuan/index.php/Home/Admin/on_doing_update"> 
	标题：<INPUT type="text" name="title" value="<?php echo ($vo["title"]); ?>"><br/> 
	内容：<TEXTAREA name="content" rows="5" cols="45"><?php echo ($vo["content"]); ?></TEXTAREA><br/> 
	作者: <INPUT type="text" value="<?php echo ($vo["author"]); ?>" name="author">
	<INPUT type="submit" value="提交"> </FORM></body>
	<footer class="footer">
  <div class="container">
    <p class="text-muted" style="text-align:right">Chenqiuyuan © Company 2015</p>
  </div>
</footer>
	<!-- 脚标 -->
</body>
</html>