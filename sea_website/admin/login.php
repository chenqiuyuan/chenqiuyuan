<?php
require '../inc/conn.php';
$query = "SELECT web_name,web_jiange,web_copyright FROM web_settings";
$result = mysqli_query($query) or die('SQL语句有误：'.mysqli_error());
$row = mysqli_fetch_array($result);
$psot_id=$_POST['post'];
if ($psot_id<>""){

$username=strip_tags($_POST['username']);
$u_user=htmlspecialchars(addslashes($username));

$password=strip_tags($_POST['password']);
$u_pass=htmlspecialchars(addslashes($password));

$remember=strip_tags($_POST['remember']);
$remember=addslashes($remember);//记住我

$query = "SELECT u_user,u_pass,u_class FROM web_user WHERE u_user='$u_user'";
$result = mysqli_query($query) or die('SQL语句有误：'.mysqli_error());
$user = mysqli_fetch_array($result);

if (!mysqli_num_rows($result)) {  
echo "<Script language=JavaScript>alert('抱歉，用户名或者密码错误。');history.back();</Script>";
exit;
}else{
$user_pass=$user['u_pass'];
$user_class=$user['u_class'];
if(md5($u_pass)<>$user_pass){
echo "<Script language=JavaScript>alert('抱歉，用户名或者密码错误。');history.back();</Script>";
exit;	
	}

//写入登录信息并记住30天
if ($remember==1){
setcookie('user',$u_user,time()+3600*24*30,'/');
setcookie('jurisdiction',$user_class,time()+3600*24*30,'/');
}else{
setcookie('user',$u_user,0,'/');
setcookie('jurisdiction',$user_class,0,'/');	
}
echo "<script>this.location='index.php'</script>";
exit;
}
exit;	
}
?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>管理登录 <?php echo $row['web_jiange']?> <?php echo $row['web_name']?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	<link href="media/css/login.css" rel="stylesheet" type="text/css"/>

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="media/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="login">

	<!-- BEGIN LOGO -->

	<div class="logo">

		<img src="media/image/logo-big.png" alt="" /> 

	</div>

	<!-- END LOGO -->

	<!-- BEGIN LOGIN -->

	<div class="content">

		<!-- BEGIN LOGIN FORM -->

		<form class="form-vertical login-form" action="" method="post">

			<h3 class="form-title">管理登录</h3>
            <input name="post" type="hidden" value="1" />

			<div class="alert alert-error hide">

				<button class="close" data-dismiss="alert"></button>

				<span>用户名或者密码不可以为空.</span>

			</div>

			<div class="control-group">

				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

				<label class="control-label visible-ie8 visible-ie9">用户名</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-user"></i>

						<input class="m-wrap placeholder-no-fix" type="text" placeholder="用户名" name="username"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<label class="control-label visible-ie8 visible-ie9">密码</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-lock"></i>

						<input class="m-wrap placeholder-no-fix" type="password" placeholder="密码" name="password"/>

					</div>

				</div>

			</div>

			<div class="form-actions">




				<input type="checkbox" name="remember" value="1"/> <font class="checkbox">记住一个月</font>


				<button type="submit" class="btn green pull-right">

				登录 <i class="m-icon-swapright m-icon-white"></i>

				</button>            

			</div>

			<div class="forget-password">

				<h4>忘记密码 ?</h4>

				<p>


					请发送 E-mail 与管理员取得联系.

				</p>

			</div>

			<div class="create-account">

				<p>

					非本站用户，请自觉离开此页，谢谢。


				</p>

			</div>

		</form>
      
	</div>

	<div class="copyright">

		<?php echo $row['web_copyright']?>

	</div>

</html>