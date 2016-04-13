<?php
require '../inc/checklogin.php';
require '../inc/conn.php';
$query = "SELECT * FROM web_settings";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$row = mysql_fetch_array($result);
$red_newwz="active";

$post=$_POST["post"];

if ($post<>""){
	
$w_title=$_POST["w_title"];
$l_id=$_POST["l_id"];

$w_keywords=addslashes($_POST["w_keywords"]);
$w_description=addslashes($_POST["w_description"]);
$w_content=addslashes($_POST["w_content"]);
$w_images=$_POST["w_images"];
$w_tuijian=$_POST["w_tuijian"];
$w_author=addslashes($_POST["w_author"]);
$view_yes=$_POST["view_yes"];
$w_hit=$_POST["w_hit"];
$w_zzip=$_SERVER["REMOTE_ADDR"];

//设备类型
$user_agent = $_SERVER['HTTP_USER_AGENT'];
   //var_dump($user_agent);
if(stristr($user_agent,'iPad')) {
$fb_fs= 5;
}else if(stristr($user_agent,'Android')) {
$fb_fs= 4;
}else if(stristr($user_agent,'iPhone')){
$fb_fs= 2;
}else if(stristr($user_agent,'Linux')){
$fb_fs= 3;
}else{
$fb_fs= 1;
}

if ($w_title=="")
{ echo "<Script language=JavaScript>alert('抱歉，文章标题没有填写。');history.back();</Script>"; 
  exit;
}


if ($l_id=="")
{ echo "<Script language=JavaScript>alert('抱歉，文章类别没有选择。');history.back();</Script>"; 
  exit;
}

if ($w_content=="")
{ echo "<Script language=JavaScript>alert('抱歉，文章还没有写内容。');history.back();</Script>"; 
  exit;
}
//文章URL—ID
$url_address=date('ymdHis');
//写入数据
$query = "INSERT INTO web_article (
w_title,
l_id,
url_address,
w_keywords,
w_description,
w_content,
w_images,
w_tuijian,
w_author,
view_yes,
hit,
w_time,
publish_mode,
w_zzip
) VALUES (
'$w_title',
'$l_id',
'$url_address',
'$w_keywords',
'$w_description',
'$w_content',
'$w_images',
'$w_tuijian',
'$w_author',
'$view_yes',
'$w_hit',
now(),
'$fb_fs',
'$w_zzip'
)";
@mysql_query($query) or die('新增错误：'.mysql_error());

$msg="恭喜，文章已成功保存。";
session_start();
$_SESSION['msg']=$msg;
$_SESSION['url']="article_list.php";

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

	<title>发表文章 - <?php echo $row['web_name']?></title>

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
    <script type="text/javascript" charset="utf-8" src="../editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../editor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../editor/lang/zh-cn/zh-cn.js"></script>

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

					<p>在这里开始发表新的文章</p>

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

							新文章

							 <small>打来灵感，开始创作吧!</small>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.php">首页</a> 

								<span class="icon-angle-right"></span>

							</li>

							<li>

								<a href="#">发表</a>

								<span class="icon-angle-right"></span>

							</li>

							<li><a href="#">文章</a></li>

						</ul>

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<div class="tabbable tabbable-custom boxless">

							<ul class="nav nav-tabs">

								<li class="active"><a href="#tab_1" data-toggle="tab">发表文章</a></li>

							</ul>

							<div class="tab-content">

								<div class="tab-pane active" id="tab_1">

									<div class="portlet box blue">

										<div class="portlet-title">

											<div class="caption"><i class="icon-reorder"></i>发表文章</div>

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

															<label class="control-label" for="firstName">标题</label>

															<div class="controls">
																<input name="post" type="hidden" value="1" />
																<input name="w_title" type="text" class="m-wrap span12" id="firstName" placeholder="请填写文章标题">

															</div>

														</div>

													</div>

													<!--/span-->

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >分类</label>

															<div class="controls">

																<select name="l_id" class="span12 select2_category" id="l_id" tabindex="1" data-placeholder="请选择类别">

																	<option value=""></option>
<?php
$query = "SELECT * FROM web_2navigation WHERE(n_display=1) ORDER BY n_id ASC";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
while (!!$list = mysql_fetch_array($result)) {
$n_belong=$list['n_belong'];
?> 
<option value="<?php echo $list['n_id']?>"> <?php echo $list['n_name']?> </option>
<?php
}
?>

																</select>

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

																<input name="w_keywords" type="text" class="m-wrap span12" id="w_keywords"  placeholder="关键字，请以英文逗号隔开">

															</div>

														</div>

													</div>

													<!--/span-->

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >描述</label><div class="controls">
															  <input name="w_description" type="text" class="m-wrap span12" id="w_description"  placeholder="请填写文章描述">
															</div>

															

													  </div>

													</div>
                                                    
                                                    <div class="row-fluid">

													<div class="span12 ">

														<div class="control-group">                                                           
                                                            
													<label class="control-label">内容</label>

													<div class="controls">

<!--<textarea id="editor" name="w_content" style="width:100%;height:300px;" placeholder="">
</textarea>
-->
<script type="text/plain" id="editor" name="w_content">
<?php echo $wz['w_content']?>
</script>



													</div>


														</div>

													</div>

												</div>

													<!--/span-->

												</div>       

												

												<!--/row--> 

												<h3 class="form-section">辅助信息 </h3>
                                                
                                                <div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >图片</label>

															<div class="controls">
<input name="w_images" type="text"  class="m-wrap span12" id="w_images" placeholder="需要时请点击浏览上传"> 
															</div>


														</div>

													</div>
                                                    
                                                    <div class="span6 ">

														<div class="control-group">

															<label class="control-label" >上传</label>

															<div class="controls">                                                
 
<iframe src="upfile.php" frameborder="0" scrolling="No"  height="55" name="I1" marginwidth="1" marginheight="0"></iframe>

															</div>

														</div>

													</div>
                                                    
                                                    
                                             

													<!--/span-->

													

													<!--/span-->

												</div>



												<div class="row-fluid">

													

													<!--/span-->
                                                    
                                                    <div class="span6 ">

														<div class="control-group">

															<label class="control-label" >作者</label>

															<div class="controls">

																<input name="w_author" type="text"  class="m-wrap span12" id="w_author" value="<?php echo $row['web_author']?>"> 

															</div>

														</div>

													</div>

													<div class="span6 ">

												<div class="control-group">

															<label class="control-label" >显示</label>

															<div class="controls">                                                

																<label class="radio">

																<input type="radio" name="view_yes" value="1" checked />

																显示

																</label>

																<label class="radio">

																<input type="radio" name="view_yes" value="0" />

																隐藏

																</label>  

															</div>

														</div>

													</div>

													<!--/span-->

												</div>

												<!--/row-->           

												<div class="row-fluid">

													<div class="span6 ">

														<div class="control-group">

															<label class="control-label" >访问量</label>

															<div class="controls">

																<input name="w_hit" type="text" class="m-wrap span12" id="w_hit" value="1"> 

															</div>

														</div>

													</div>
                                                    <div class="span6 ">

														<div class="control-group">

															<label class="control-label" >推荐</label>

															<div class="controls">                                                

																<label class="radio">

																<input type="radio" name="w_tuijian" value="1" />

																推荐

																</label>

																<label class="radio">

																<input type="radio" name="w_tuijian" value="0" checked />

																不推荐

																</label>  

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

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('editor');
</script>

</body>

<!-- END BODY -->

</html>