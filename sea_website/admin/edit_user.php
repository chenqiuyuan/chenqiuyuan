<?php
require '../inc/checklogin.php';
require '../inc/conn.php';
$query = "SELECT * FROM web_settings";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$row = mysql_fetch_array($result);
$red_userlist="active";
$u_id=$_GET["edit"];

$query = "SELECT * FROM web_user WHERE (u_id='$u_id')";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$userinfo = mysql_fetch_array($result);

$post=$_POST["post"];
if ($post<>""){
$u_user=$_POST["u_user"];
$u_pass=$_POST["u_pass"];
$u_name=$_POST["u_name"];
$u_class=$_POST["u_class"];
$u_images=$_POST["u_images"];
$u_ip=$_SERVER["REMOTE_ADDR"];

if ($u_user=="")
{ echo "<Script language=JavaScript>alert('抱歉，帐号没有填写。');history.back();</Script>"; 
  exit;
}

if ($u_name=="")
{ echo "<Script language=JavaScript>alert('抱歉，用户名称还没有写。');history.back();</Script>"; 
  exit;
}
if ($u_pass<>""){
$pass="u_pass=MD5('$u_pass'),";
}
 
//修改数据
$query = "UPDATE web_user SET 
u_user='$u_user',
$pass
u_name='$u_name',
u_class='$u_class',
u_images='$u_images',
u_ip='$u_ip'
 WHERE u_id='$u_id'";
@mysql_query($query) or die('修改错误：'.mysql_error());

$msg="恭喜，ID 为 ".$u_id." 的用户信息已经成功编辑 。";
session_start();
$_SESSION['msg']=$msg;
$_SESSION['url']="user_list.php";

echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=Message-prompt.php'>";
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

	<title>编辑用户 - <?php echo $row['web_name']?></title>

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

	<link rel="stylesheet" type="text/css" href="media/css/select2_metro.css" />

	<!-- END PAGE LEVEL SCRIPTS -->

	<link rel="shortcut icon" href="media/image/favicon.ico" />
	<script charset="utf-8" src="../editor/kindeditor.js"></script>
	<script charset="utf-8" src="../editor/lang/zh_CN.js"></script>
	<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
	</script>

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<!-- BEGIN HEADER -->

	<?php require 'template/head.php'?>

	<!-- END HEADER -->

	<!-- BEGIN CONTAINER -->

	<div class="page-container row-fluid">

		<!-- BEGIN SIDEBAR -->

	<?php require 'template/sidebar.php'?>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->  

		<div class="page-content">

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<div id="portlet-config" class="modal hide">

				<div class="modal-header">

					<button data-dismiss="modal" class="close" type="button"></button>

					<h3>操作提示</h3>

				</div>

				<div class="modal-body">

					<p>在这里编辑网站的用户</p>

				</div>

			</div>

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->   

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN STYLE CUSTOMIZER -->


						<!-- END BEGIN STYLE CUSTOMIZER -->  

						<h3 class="page-title">

							编辑用户


						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.php">首页</a> 

								<span class="icon-angle-right"></span>

							</li>

							<li>

								<a href="#">用户管理</a>

								<span class="icon-angle-right"></span>

							</li>

							<li><a href="#">编辑</a></li>

						</ul>

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<div class="tabbable tabbable-custom boxless">

							<ul class="nav nav-tabs">

								<li class="active"><a href="#tab_1" data-toggle="tab">编辑用户</a></li>

							</ul>

							<div class="tab-content">

								<div class="tab-pane active" id="tab_1">

									<div class="portlet box blue">

										<div class="portlet-title">

											<div class="caption"><i class="icon-reorder"></i>编辑用户</div>

											<div class="tools">

												<a href="javascript:;" class="collapse"></a>

												<a href="#portlet-config" data-toggle="modal" class="config"></a>

												<a href="javascript:;" class="reload"></a>

												<a href="javascript:;" class="remove"></a>

											</div>

										</div>

										<div class="portlet-body form">

											<!-- BEGIN FORM-->

                                            <form id="form2" name="form2" method="post" action="" class="horizontal-form">

												<h3 class="form-section">用户信息</h3>

												<div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" for="firstName">登录帐号</label>

															<div class="controls">
																<input name="post" type="hidden" value="1" />
																<input name="u_user" type="text" class="m-wrap span12" id="firstName" placeholder="请填写用户帐号" value="<?php echo $userinfo['u_user']?>" readonly>

															</div>

														</div>

													</div><div class="span6 ">

														<div class="control-group">

															<label class="control-label" for="firstName">登录密码</label>

															<div class="controls">
															<input name="u_pass" type="password" class="m-wrap span12" id="firstName" placeholder="不修改时请保持为空">

															</div>

														</div>

													</div>



												</div>

												<!--/row-->

												<div class="row-fluid"><!--/span-->

													<div class="row-fluid">

													<div class="span12 "></div>

												</div>

													<!--/span-->

												</div>       



<div class="row-fluid">

													
<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >用户名称</label>

															<div class="controls">

																<input name="u_name" type="text" class="m-wrap span12" value="<?php echo $userinfo['u_name']?>" > 

															</div>

														</div>

													</div>

													<div class="span6 ">

												<div class="control-group">

															<label class="control-label" >用户身份</label>

<?php
$class = $userinfo['u_class'];
if ($class==0){
$class1="checked";
	}
if ($class==1){
$class2="checked";
	}
?>															<div class="controls">                                                

																<label class="radio">

																<input type="radio" name="u_class" value="0" <?php echo $class1?>/>

																超级管理员

															  </label>

																<label class="radio">

																<input type="radio" name="u_class" value="1" <?php echo $class2?> />

																普通用户

															  </label>  

															</div>

														</div>

													</div>
                                                    

													<!--/span-->

												</div>
                                                
                                              <div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >用户头像</label>

															<div class="controls">
<input name="u_images" type="text"  class="m-wrap span12" id="u_images" placeholder="需要时请点击浏览上传" value="<?php echo $userinfo['u_images']?>"> 
															</div>


														</div>

													</div>
                                                    
                                                    <div class="span6 ">

														<div class="control-group">

															<label class="control-label" >上传</label>

															<div class="controls">                                                
 
<iframe src="user_upfile.php" frameborder="0" scrolling="No"  height="55" name="I1" marginwidth="1" marginheight="0"></iframe>

															</div>

														</div>

													</div>
                                                    
                                                    
                                             

													<!--/span-->

													

													<!--/span-->

												</div>



												

												<!--/row-->

												<div class="form-actions">

												  <button type="submit" class="btn blue"><i class="icon-ok"></i> 保存</button>

												  <button type="reset" class="btn">重置</button>
                                                    
											  </div>

											</form>

											<!-- END FORM--> 

										</div>

									</div>

								</div>

							</div>


</div>
					</div>

				</div>

				<!-- END PAGE CONTENT-->         

			</div>

			<!-- END PAGE CONTAINER-->

		</div>

		<!-- END PAGE -->  

	</div>

	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->

	<?php require 'template/foot.php'?>

	<!-- END FOOTER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script src="media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<script src="media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="media/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="media/js/excanvas.min.js"></script>

	<script src="media/js/respond.min.js"></script>  

	<![endif]-->   

	<script src="media/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="media/js/jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="media/js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="media/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script type="text/javascript" src="media/js/select2.min.js"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="media/js/app.js"></script>

	<script src="media/js/form-samples.js"></script>   

	<!-- END PAGE LEVEL SCRIPTS -->

	<script>

		jQuery(document).ready(function() {    

		   // initiate layout and plugins

		   App.init();

		   FormSamples.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->   

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>