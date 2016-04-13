<?php
require '../inc/checklogin.php';
require '../inc/conn.php';
$query = "SELECT * FROM web_settings";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$row = mysql_fetch_array($result);
$red_settings="active";

$post=$_POST["post"];

if ($post<>""){
	
$web_name=$_POST["web_name"];
$web_slogan=$_POST["web_slogan"];
$web_title=$_POST["web_title"];
$web_description=$_POST["web_description"];
$web_keywords=$_POST["web_keywords"];

$web_author=$_POST["web_author"];
$web_qq=$_POST["web_qq"];
$web_mail=$_POST["web_mail"];

$web_tel=$_POST["web_tel"];
$web_url=$_POST["web_url"];
$web_add=$_POST["web_add"];
$web_copyright=$_POST["web_copyright"];
$web_jiange=$_POST["web_jiange"];
$web_cache=$_POST["web_cache"];
if ($web_name=="")
{ echo "<Script language=JavaScript>alert('抱歉，网站名称没有填写。');history.back();</Script>"; 
  exit;
}

if ($web_title=="")
{ echo "<Script language=JavaScript>alert('抱歉，首页名称没有填写。');history.back();</Script>"; 
  exit;
}

if ($web_qq=="")
{ echo "<Script language=JavaScript>alert('抱歉，站长QQ没有填写。');history.back();</Script>"; 
  exit;
}

if ($web_mail=="")
{ echo "<Script language=JavaScript>alert('抱歉，站长邮箱没有填写。');history.back();</Script>"; 
  exit;
}

if ($web_url=="")
{ echo "<Script language=JavaScript>alert('抱歉，网站地址没有填写。');history.back();</Script>"; 
  exit;
}
if ($web_cache=="")
{ echo "<Script language=JavaScript>alert('抱歉，网站缓存不能为空。');history.back();</Script>"; 
  exit;
}

//修改数据
$query = "UPDATE web_settings SET 
web_name='$web_name',
web_slogan='$web_slogan',
web_title='$web_title',
web_description='$web_description',
web_keywords='$web_keywords',
web_author='$web_author',
web_qq='$web_qq',
web_mail='$web_mail',
web_tel='$web_tel',
web_url='$web_url',
web_add='$web_add',
web_copyright='$web_copyright',
web_jiange='$web_jiange',
web_cache='$web_cache'
";
@mysql_query($query) or die('修改错误：'.mysql_error());

$msg="恭喜，网站基本设置已成功保存。";
session_start();
$_SESSION['msg']=$msg;
$_SESSION['url']=$_SERVER['HTTP_REFERER'];

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

	<title>基本设置 <?php echo $row['web_jiange']?> <?php echo $row['web_name']?></title>

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

					<p>在这里设置网站的一些基本信息</p>

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

							基本设置


						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.php">首页</a> 

								<span class="icon-angle-right"></span>

							</li>

							<li>

								<a href="#">设置</a>

								<span class="icon-angle-right"></span>

							</li>

							<li><a href="#">基本设置</a></li>

						</ul>

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<div class="tabbable tabbable-custom boxless">

							<ul class="nav nav-tabs">

								<li class="active"><a href="#tab_1" data-toggle="tab">系统设置</a></li>

							</ul>

							<div class="tab-content">

								<div class="tab-pane active" id="tab_1">

									<div class="portlet box blue">

										<div class="portlet-title">

											<div class="caption"><i class="icon-reorder"></i>基本信息</div>

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


												<div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" for="firstName">网站名称</label>

															<div class="controls">
																<input name="post" type="hidden" value="1" />
																<input name="web_name" type="text" class="m-wrap span12" placeholder="请填写网站名称" value="<?php echo $row['web_name']?>">

															</div>

														</div>

													</div>

													<!--/span-->

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" for="firstName">网站Slogan</label>

															<div class="controls">
																
															  <input name="web_slogan" type="text" class="m-wrap span12" placeholder="请填写网站Slogan" value="<?php echo $row['web_slogan']?>">

														  </div>

														</div>

													</div>

													<!--/span-->

												</div>

												<!--/row-->

												<div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >首页标题</label>

															<div class="controls">

																<input name="web_title" type="text" class="m-wrap span12"  placeholder="请填写网站首页标题" value="<?php echo $row['web_title']?>">

															</div>

														</div>

													</div>

													<!--/span-->

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >网站网址</label><div class="controls">
															  <input name="web_url" type="text" class="m-wrap span12"  placeholder="请填写网站系统消息" value="<?php echo $row['web_url']?>">
															</div>

															

													  </div>

													</div>

												</div>  
<div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >网站描述</label>

															<div class="controls">

															  <input name="web_description" type="text" class="m-wrap span12"  placeholder="请填写网站描述" value="<?php echo $row['web_description']?>">

															</div>

														</div>

													</div>

													<!--/span-->

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >网站关键字</label><div class="controls">
														    <input name="web_keywords" type="text" class="m-wrap span12" id="w_description"  placeholder="请填写网站关键字，以英文逗号隔开" value="<?php echo $row['web_keywords']?>">
															</div>

															

													  </div>

													</div>
                                                    


													<!--/span-->

											  </div><div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >标题间隔符</label>

															<div class="controls">

															  <input name="web_jiange" type="text" class="m-wrap span12" placeholder="请填写网站标题间隔符" value="<?php echo $row['web_jiange']?>">

															</div>

														</div>

													</div>

													<!--/span-->

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >网站站长</label><div class="controls">
			<input name="web_author" type="text" class="m-wrap span12"  placeholder="请填写网站站长" value="<?php echo $row['web_author']?>">
															</div>

															

													  </div>

													</div>
                                                    


													<!--/span-->

												</div><div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >站长QQ</label>

															<div class="controls">

															  <input name="web_qq" type="text" class="m-wrap span12" placeholder="请填写站长QQ，文章同步QQ空间时必须填写" value="<?php echo $row['web_qq']?>">

															</div>

														</div>

													</div>

													<!--/span-->

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >站长邮箱</label><div class="controls">
														    <input name="web_mail" type="text" class="m-wrap span12" id="w_description"  placeholder="请填写站长邮箱" value="<?php echo $row['web_mail']?>">
															</div>

															

													  </div>

													</div>
                                                   </div>
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label class="control-label" >联系电话</label>
<div class="controls">
<input name="web_tel" type="text" class="m-wrap span12"  placeholder="请填写联系电话" value="<?php echo $row['web_tel']?>">
</div>
</div>
</div>
<!--/span-->                                                    
<div class="span6 ">
<div class="control-group">
<label class="control-label" >页面缓存 (分钟)</label>
<div class="controls">
<input name="web_cache" type="text" class="m-wrap span12"  placeholder="请填写缓存时间(分钟)，0为关闭。" value="<?php echo $row['web_cache']?>">
</div>
</div>
</div>

</div>               
                                                
<div class="row-fluid">
<div class="span6 ">
<div class="control-group">
<label class="control-label" >首页特效文本</label>
<div class="controls">
<textarea  name="web_add" class="m-wrap span12" rows="3" placeholder="请填写首页特效文本">
<?php echo $row['web_add']?>
</textarea>
</div>
</div>
</div>

<div class="span6 ">
<div class="control-group">
<label class="control-label" >版权信息</label>
<div class="controls">
<textarea  name="web_copyright" class="m-wrap span12" rows="3" placeholder="请填写网站的版权信息。">
<?php echo $row['web_copyright']?>
</textarea>
</div>
</div>
</div>

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