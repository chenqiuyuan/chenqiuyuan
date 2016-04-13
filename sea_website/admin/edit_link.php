<?php
require '../inc/checklogin.php';
require '../inc/conn.php';
$query = "SELECT * FROM web_settings";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$row = mysql_fetch_array($result);
$red_linklist="active";
$id=$_GET["edit"];


$query = "SELECT * FROM web_link WHERE id=$id";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$link = mysql_fetch_array($result);

$post=$_POST["post"];

if ($post<>""){
	
$name=$_POST["name"];
$mail=$_POST["mail"];
$url=$_POST["url"];
$jieshao=addslashes($_POST["jieshao"]);
$nofollow=$_POST["nofollow"];
$view_yes=$_POST["view_yes"];


if ($name=="")
{ echo "<Script language=JavaScript>alert('抱歉，网站名称没有填写。');history.back();</Script>"; 
  exit;
}

if ($url=="")
{ echo "<Script language=JavaScript>alert('抱歉，网站地址没有填写。');history.back();</Script>"; 
  exit;
}

//修改数据
$query = "UPDATE web_link SET 
name='$name',
mail='$mail',
url='$url',
jieshao='$jieshao',
nofollow='$nofollow',
view_yes='$view_yes' 
WHERE id=$id";
@mysql_query($query) or die('修改错误：'.mysql_error());
$msg="恭喜,链接信息已成功保存。";
session_start();
$_SESSION['msg']=$msg;
$_SESSION['url']="link_list.php";

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

	<title>编辑链接 <?php echo $row['web_jiange']?> <?php echo $row['web_name']?></title>

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

					<p>在这里管理网站的友情链接</p>

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

							编辑链接


						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.php">首页</a> 

								<span class="icon-angle-right"></span>

							</li>

							<li>

								<a href="#">链接管理</a>

								<span class="icon-angle-right"></span>

							</li>

							<li><a href="#">编辑链接</a></li>

						</ul>

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<div class="tabbable tabbable-custom boxless">

							<ul class="nav nav-tabs">

								<li class="active"><a href="#tab_1" data-toggle="tab">链接设置</a></li>

							</ul>

							<div class="tab-content">

								<div class="tab-pane active" id="tab_1">

									<div class="portlet box blue">

										<div class="portlet-title">

											<div class="caption"><i class="icon-reorder"></i>链接设置</div>

											<div class="tools">

												<a href="javascript:;" class="collapse"></a>

												<a href="#portlet-config" data-toggle="modal" class="config"></a>

												<a href="javascript:;" class="reload"></a>

												<a href="javascript:;" class="remove"></a>

											</div>

										</div>

										<div class="portlet-body form">

											<!-- BEGIN FORM-->

                                            <form id="form1" name="form1" method="post" action="" class="horizontal-form">
                                            <input name="post" type="hidden" value="1" />

												<div class="row-fluid">

													

												  <!--/span-->

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" for="firstName">名称</label>

															<div class="controls">
																
					<input name="name" type="text" class="m-wrap span12" placeholder="链接名称" value="<?php echo $link['name']?>">

														  </div>

														</div>

													</div>
                                                    <div class="span6 ">

														<div class="control-group">

															<label class="control-label" >邮箱</label>

															<div class="controls">
<input name="mail" type="text" class="m-wrap span12"  placeholder="请填写邮箱" value="<?php echo $link['mail']?>">

															</div>

														</div>

													</div>

													<!--/span-->

												</div>

												<!--/row-->

												<div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >网址</label>

															<div class="controls">

<input name="url" type="text" class="m-wrap span12"  placeholder="请填写网址" value="<?php echo $link['url']?>">

															</div>

														</div>

													</div>


													<div class="span6 ">

														<div class="control-group">

<div class="controls">
<label class="control-label" >介绍</label>
<input name="jieshao" type="text" class="m-wrap span12"  placeholder="请填写网站介绍" value="<?php echo $link['jieshao']?>">

                                                            
                                                            </div>

													  </div>

													</div>

													<!--/span-->

												</div>
                                                <h3 class="form-section">辅助信息</h3>
                                                <div class="row-fluid">
                                                  <div class="span6 ">

														<div class="control-group">

															<label class="control-label" >NoFollow</label>

															<div class="controls">                                                

																<label class="radio">
<?php
$view=$link['nofollow'];
if (!$view<>1){
$nofollowon="checked";
}
if ($view<>1)
{
$nofollowoff="checked";	
}
?>
						<input type="radio" name="nofollow" value="1"  <?php echo $nofollowon ?> />

																是

																</label>

																<label class="radio">

						<input type="radio" name="nofollow" value="0"  <?php echo $nofollowoff ?>/>

																否

																</label>  

														  </div>

														</div>

													</div>
													<!--/span-->



													

<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >显示</label>

															<div class="controls">                                                

																<label class="radio">
<?php
$view=$link['view_yes'];
if (!$view<>1){
$viewon="checked";
}
if ($view<>1)
{
$viewoff="checked";	
}
?>
						<input type="radio" name="view_yes" value="1"  <?php echo $viewon ?> />

																显示

																</label>

																<label class="radio">

						<input type="radio" name="view_yes" value="0"  <?php echo $viewoff ?>/>

																隐藏

																</label>  

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