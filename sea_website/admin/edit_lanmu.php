<?php
require '../inc/checklogin.php';
require '../inc/conn.php';
$query = "SELECT * FROM web_settings";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$row = mysql_fetch_array($result);

$red_lanmulist="active";

$n_id=$_GET["edit"];
$info="web_2navigation WHERE n_id='$n_id'";		
$query = "SELECT * FROM $info";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$nav = mysql_fetch_array($result);	

$post=$_POST["post"];

if ($post<>""){
	
$n_name=$_POST["n_name"];
$n_keywords=addslashes($_POST["n_keywords"]);
$n_description=addslashes($_POST["n_description"]);
$n_sequence=$_POST["n_sequence"];
$n_display=$_POST["n_display"];
$n_open=$_POST["n_open"];


if ($n_name=="")
{ echo "<Script language=JavaScript>alert('抱歉，分类标题没有填写。');history.back();</Script>"; 
  exit;
}

if ($n_sequence=="")
{ echo "<Script language=JavaScript>alert('抱歉，分类排序没有填写。');history.back();</Script>"; 
  exit;
}

//编辑二级分类数据
$query = "UPDATE web_2navigation SET
n_name='$n_name',
n_description='$n_description',
n_keywords='$n_keywords',
n_sequence='$n_sequence',
n_display='$n_display',
n_open='$n_open',
n_time=now()
 WHERE n_id='$n_id'";
@mysql_query($query) or die('编辑错误：'.mysql_error());

$msg="恭喜，分类已成功编辑。";
session_start();
$_SESSION['msg']=$msg;
$_SESSION['url']="lanmu_list.php";

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

	<title>编辑栏目 <?php echo $row['web_jiange']?> <?php echo $row['web_name']?></title>

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

					<p>在这里编辑栏目</p>

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

							编辑栏目


						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.php">首页</a> 

								<span class="icon-angle-right"></span>

							</li>

							<li>

								<a href="#">编辑</a>

								<span class="icon-angle-right"></span>

							</li>

							<li><a href="#">栏目</a></li>

						</ul>

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<div class="tabbable tabbable-custom boxless">

							<ul class="nav nav-tabs">

								<li class="active"><a href="#tab_1" data-toggle="tab">编辑栏目</a></li>

							</ul>

							<div class="tab-content">

								<div class="tab-pane active" id="tab_1">

									<div class="portlet box blue">

										<div class="portlet-title">

											<div class="caption"><i class="icon-reorder"></i>栏目信息</div>

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
<label class="control-label" for="firstName">栏目名称</label>
<div class="controls">
<input name="post" type="hidden" value="1" />
<input name="n_name" type="text" class="m-wrap span12" id="firstName" placeholder="请填写栏目名称" value="<?php echo $nav['n_name']?>">

															</div>

														</div>

													</div>

													<!--/span-->

<div class="span6 ">
<div class="control-group">
<label class="control-label" >排序</label>
<div class="controls">
<input name="n_sequence" type="text"  class="m-wrap span12" id="w_images" placeholder="请输于栏目的排序，越小越靠前" value="<?php echo $nav['n_sequence']?>"> 
</div>
</div>
</div>

													<!--/span-->

												</div>

												<!--/row-->

												<div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >关键字</label>

															<div class="controls">

																<input name="n_keywords" type="text" class="m-wrap span12" id="w_keywords"  placeholder="关键字，请以英文逗号隔开" value="<?php echo $nav['n_keywords']?>">

															</div>

														</div>

													</div>

													<!--/span-->

													<div class="span6 ">

														<div class="control-group">

<label class="control-label" >描述</label>
<div class="controls">
															  <input name="n_description" type="text" class="m-wrap span12" id="w_description"  placeholder="请填写栏目描述" value="<?php echo $nav['n_description']?>">
															</div>


													  </div>

													</div>
                                                    

													<!--/span-->

												</div>       

												

												<!--/row--> 

												<h3 class="form-section">辅助信息 
                                                </h3>
                                                
                                                <div class="row-fluid">



													<!--/span-->

<div class="span6 ">

												<div class="control-group">

															<label class="control-label" >打开方式</label>
<?php
$open=$nav['n_open'];
if ($open==1){
$open1="checked";
}
if ($open==2){
$open2="checked";
}
		
?>
															<div class="controls">                                                

																<label class="radio">

																<input type="radio" name="n_open" value="1" <?php echo $open1?> />

																原窗口

																</label>

																<label class="radio">

																<input type="radio" name="n_open" value="2" <?php echo $open2?>/>

																新窗口

																</label>  

															</div>

						  </div>

												  </div>			

                                                  
                                                    

<div class="span6 ">
<div class="control-group">
<label class="control-label" >显示</label>
<?php
$display=$nav['n_display'];
if ($display==1){
$on="checked";
}else{
$off="checked";
}
		
?>
															<div class="controls">                                                

																<label class="radio">

																<input type="radio" name="n_display" value="1" <?php echo $on?> />

																显示

																</label>

																<label class="radio">

																<input type="radio" name="n_display" value="0" <?php echo $off?>/>

																隐藏

																</label>  

															</div>

														</div>

													</div>

													<!--/span-->

												</div>

												<!--/row-->
                                                <br />

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

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>

</body>

<!-- END BODY -->

</html>