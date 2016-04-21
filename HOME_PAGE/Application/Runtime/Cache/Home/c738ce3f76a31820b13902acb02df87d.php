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
    <link rel="shortcut icon" type="image/x-ico" src="/php/chenqiuyuan/HOME_PAGE/Public/icon/favicon.ico" />

    <title>陈秋远</title>

    <!-- Bootstrap core CSS -->
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <!-- 表格(table)的CSS -->
    <link rel="stylesheet" type="text/css" href="/php/chenqiuyuan/HOME_PAGE/Public/CSS/table.css" />
    <meta charset="utf-8">
    <title>登陆</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel="stylesheet" href="/php/chenqiuyuan/HOME_PAGE/Public/login/assets/css/reset.css">
    <link rel="stylesheet" href="/php/chenqiuyuan/HOME_PAGE/Public/login/assets/css/supersized.css">
    <link rel="stylesheet" href="/php/chenqiuyuan/HOME_PAGE/Public/login/assets/css/style.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<body>
<div class="container">
  
    <body>

        <div class="page-container">
            <h1 style="color:indigo">Login</h1>
            <form action="/php/chenqiuyuan/HOME_PAGE/index.php/Home/Admin/login" method="post">
                <input type="text" name="username" class="username" placeholder="Username">
                <input type="password" name="password" class="password" placeholder="Password">
                <button type="submit">SIGNIN</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p style="color:indigo">Or connect with:</p>
                <p>
                    <a class="facebook" href=""></a>
                </p>
            </div>
        </div>

     
  <footer class="footer">
  <div class="container">
    <p class="text-muted" style="text-align:right">Chenqiuyuan © Company 2015</p>
  </div>
</footer>
  <!-- 脚标 -->
    </body>

</html>