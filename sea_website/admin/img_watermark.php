<?php
require '../inc/checklogin.php';
require '../inc/conn.php';
$query = "SELECT * FROM web_settings";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$row = mysql_fetch_array($result);

$query = "SELECT * FROM web_watermark";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$img = mysql_fetch_array($result);

$red_imgwatermark="active";

$post=$_POST["post"];

if ($post<>""){
	
$img_kg=$_POST["img_kg"];
$img_slt=$_POST["img_slt"];
$img_watermark=$_POST["u_images"];
$img_weizhi=$_POST["img_weizhi"];
$img_moshi=$_POST["img_moshi"];

$img_wzgd=$_POST["img_wzgd"];
$img_wzkd=$_POST["img_wzkd"];

//修改数据
$query = "UPDATE web_watermark SET
img_kg='$img_kg',
img_slt='$img_slt',
img_watermark='$img_watermark',
img_weizhi='$img_weizhi',
img_moshi='$img_moshi',
img_wzgd='$img_wzgd',
img_wzkd='$img_wzkd'
";
@mysql_query($query) or die('修改错误：'.mysql_error());

$msg="恭喜，网站图片水印设置已成功保存。";
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

	<title>图片设置 <?php echo $row['web_jiange']?> <?php echo $row['web_name']?></title>

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

					<p>在这里设置网站的图片信息</p>

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

							图片设置


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

							<li><a href="#">图片</a></li>

						</ul>

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<div class="tabbable tabbable-custom boxless">

							<ul class="nav nav-tabs">

								<li class="active"><a href="#tab_1" data-toggle="tab">设置</a></li>

							</ul>

							<div class="tab-content">

								<div class="tab-pane active" id="tab_1">

									<div class="portlet box blue">

										<div class="portlet-title">

											<div class="caption"><i class="icon-reorder"></i>图片设置</div>

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
                                                
                                              <input name="post" type="hidden" value="1" />

												<div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >图片水印</label>

															<div class="controls">                                                

																<label class="radio">
<?php
$imgkg=$img['img_kg'];
if (!$imgkg<>1){
$imgon="checked";
}
if ($imgkg<>1)
{
$imgoff="checked";	
}
?>
						<input type="radio" name="img_kg" value="1"  <?php echo $imgon ?> />

																开启

																</label>

																<label class="radio">

						<input type="radio" name="img_kg" value="0"  <?php echo $imgoff ?>/>

																关闭

																</label>  

															</div>

														</div>

													</div><div class="span6 ">

														<div class="control-group">

															<label class="control-label" >生成缩略图</label>

															<div class="controls">                                                

																<label class="radio">
<?php
$sltkg=$img['img_slt'];
if (!$sltkg<>1){
$slton="checked";
}
if ($sltkg<>1)
{
$sltoff="checked";	
}
?>
						<input type="radio" name="img_slt" value="1"  <?php echo $slton ?> />

																开启

																</label>

																<label class="radio">

						<input type="radio" name="img_slt" value="0"  <?php echo $sltoff ?>/>

																关闭

																</label>  

															</div>

														</div>

													</div>



												</div>


											  <div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >水印文件</label>

															<div class="controls">
<input name="u_images" type="text"  class="m-wrap span12" id="img_watermark" placeholder="请点击浏览上传图片水印，建议使用PNG格式" value="<?php echo $img['img_watermark']?>"> 
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
                                                    


												</div>  
<div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >水印位置：</label>

															<div class="controls">
                                                

																<label class="radio">
<?php
$weizhi=$img['img_weizhi'];
if ($weizhi==1){
$weuzgu1="checked";
}
if ($weizhi==2)
{
$weuzgu2="checked";	
}
if ($weizhi==3)
{
$weuzgu3="checked";	
}
?>
						<input type="radio" name="img_weizhi" value="1"  <?php echo $weuzgu1 ?> />

																左上角

															
</label>
															
<label class="radio">
						<input type="radio" name="img_weizhi" value="2"  <?php echo $weuzgu2 ?>/>

																居中
</label> 
<label class="radio">
															 
                        <input type="radio" name="img_weizhi" value="3"  <?php echo $weuzgu3 ?>/>

																右下角

															  </label> 



															</div>

														</div>

													</div>
<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >缩放模式</label>

															<div class="controls">
                                                

																<label class="radio">
<?php
$moshi=$img['img_moshi'];
if ($moshi==1){
$moshi1="checked";
}
if ($moshi==2)
{
$moshi2="checked";	
}
if ($moshi==3)
{
$moshi3="checked";	
}
?>
						<input type="radio" name="img_moshi" value="1"  <?php echo $moshi1 ?> />

																居中

															
</label>
															
<label class="radio">
						<input type="radio" name="img_moshi" value="2"  <?php echo $moshi2 ?>/>

																裁剪
</label> 
<label class="radio">
															 
                        <input type="radio" name="img_moshi" value="3"  <?php echo $moshi3 ?>/>

																等比例

															  </label> 



															</div>

														</div>

						</div>


													
											  </div>
                                                 <h3 class="form-section">上传大小  <small>裁剪模式下有效</small></h3>
<div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >文章图片宽度</label>

															<div class="controls">

													<input name="img_wzkd" type="text" class="m-wrap span12"  placeholder="请填写上传的文章图片宽度" value="<?php echo $img['img_wzkd']?>">

															</div>

														</div>

													</div>

													<!--/span-->

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >文章图片高度</label><div class="controls">
														    <input name="img_wzgd" type="text" class="m-wrap span12" id="w_description"  placeholder="请填写上传的文章图片高度" value="<?php echo $img['img_wzgd']?>">
															</div>

															

													  </div>

													</div>
                                                    


													<!--/span-->

											  </div>

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