<?php
	header('Content-Type:text/html;charset=utf-8');
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','');
	define('DB_NAME','test');
	$conn = @mysql_connect(DB_HOST,DB_USER,DB_PWD) or die(header("Location: help.php"));
	
	mysql_select_db(DB_NAME) or die(header("Location: help.php"));
	mysql_query('SET NAMES UTF8') or die('字符集设置错误'.mysql_error());
	date_default_timezone_set('PRC'); 
?>