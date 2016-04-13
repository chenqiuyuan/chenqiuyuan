<?php
require '../inc/checklogin.php';
require '../inc/conn.php';
$query = "SELECT * FROM web_settings";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$row = mysql_fetch_array($result);
$red_articlelist="active";

$yemas=$_GET['page'];
if ($yemas<>""){
$yema=" - 第 $yemas 页";
}else{
$yema="";	
}

$key=$_GET['key'];
if ($key<>""){
$chaxun="WHERE w_title LIKE '%$key%'"	;
$pageyema="key=$key";
	}

$delete=$_GET['delete'];
if ($delete<>""){
$query = "DELETE FROM web_article WHERE url_address='$delete'";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());

$msg="恭喜，ID 为".$delete." 的文章已经成功删除。";
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

	<title>文章列表 <?php echo $yema ?> - <?php echo $row['web_name']?></title>

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

	<link rel="stylesheet" href="media/css/DT_bootstrap.css" />

	<!-- END PAGE LEVEL STYLES -->

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

					<h3>portlet Settings</h3>

				</div>

				<div class="modal-body">

					<p>Here will be a configuration form</p>

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

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->

						<h3 class="page-title">

							文章列表 <small>所有的作品都在这里哦</small>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.php">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="#">内容列表</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">文章列表</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN EXAMPLE TABLE PORTLET-->

						<div class="portlet box blue">

							<div class="portlet-title">

								<div class="caption"><i class="icon-edit"></i>文章列表</div>

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>

									<a href="#portlet-config" data-toggle="modal" class="config"></a>

									<a href="javascript:;" class="reload"></a>

									<a href="javascript:;" class="remove"></a>

								</div>

							</div>

							<div class="portlet-body">
<div align="right">
<form name="form2" method="GET" action="">
<div class="input-append">
<input class="m-wrap" type="text" name="key" value="<?php echo $key?>"  data-placeholder="请输入文章标题"/><button class="btn green" type="submit">搜索</button>
</div>
</form>

</div>

								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">

									<thead>

										<tr>

											<th>ID</th>

											<th>标题</th>

											<th>类别</th>
                                            <th>状态</th>

											<th>时间</th>

											<th>操作</th>

										</tr>

									</thead>

									<tbody>


<?php   
$perpagenum =15;//定义每页显示几条    
$total = mysql_fetch_array(mysql_query("select count(*) from web_article $chaxun"));      
   
$Total = $total[0];   
if($_GET['page']=="")   
{    
$page=1;    
}    
else    
{    
$page=$_GET['page'];    
}    
//获得当前页    
$startnum = ($page-1)*$perpagenum;//每页的其实位置    
if($page>1)   
$per=$page-1;   
else  
$per=1;   
if($Total%$perpagenum==0)   
$Totalpage=$Total/$perpagenum;   
else  
$Totalpage=(integer)($Total/$perpagenum)+1;   
$next=$page+1;   
if($next>=$Totalpage)   
 $next=$Totalpage;   
 
$query=mysql_query("select * from web_article $chaxun ORDER BY w_id DESC, url_address DESC limit $startnum,$perpagenum ") ;
$i=$perpagenum*($page-1)+1; 
while($wz_list = mysql_fetch_array($query)){  
if ($wz_list['view_yes']<>1){
$wz_zt="<font color='red'>隐藏</font>";
	}else{
$wz_zt="显示";
}
	
$l_id = $wz_list['l_id'];
$query3 = "SELECT * FROM web_2navigation WHERE n_id=$l_id";
$result3 = mysql_query($query3) or die('SQL语句有误：'.mysql_error());
$lanmu = mysql_fetch_array($result3);

if ($wz_list['w_tuijian']==1){
$wz_tuijian='<font color="#FF0000"> 荐 </font>';
	}else{
$wz_tuijian='';		
}

if ($wz_list['w_images']<>""){
$wz_images='<font color="#ac68d7"> 图 </font>';
	}else{
$wz_images='';		
}

?> 


										<tr class="">

											<td><?php echo $wz_list['w_id']?></td>

											<td><?php echo $w_zhiding.$wz_tuijian.$wz_images?><a href="/?post=<?php echo $wz_list['url_address']?>" target="_blank"><?php echo mb_substr($wz_list['w_title'],0,18,'utf8') ?></a></td>

											<td><?php echo $lanmu['n_name']?></td>
                                            <td><?php echo $wz_zt?></td>

											<td class="center"><?php echo  date('Y.m.d H:i', strtotime($wz_list['w_time']))?>

                                            </td>

											<td><a href="edit_article.php?edit=<?php echo $wz_list['url_address']?>">编辑</a> &nbsp;  <a href="?delete=<?php echo $wz_list['url_address']?>" onclick="return confirm('请注意，删除后不可恢复！\n\n您真的确定要删除此条数据吗?')" >删除</a></td>

										</tr>

<?php 
}  
?>

									</tbody>

								</table>
                                

<table class="table table-hover table-striped table-bordered">
<tr>
<td>  
<a>第 <?php echo $page?> - <?php echo $Totalpage?> 页 共 <?php echo $Total?> 条</a>
</td>
<td>
<div align="right">
<a href="?<?php echo $pageyema?>">首页</a> -
<a href="<?php echo "?$pageyema&page=$per" ?>">上一页</a> -
<a href="<?php echo "?$pageyema&page=$next" ?>">下一页</a> -
<a href="<?php echo "?$pageyema&page=$Totalpage" ?>">尾页</a>
</div>

</td>

</tr>

</table>

							</div>

						</div>

						<!-- END EXAMPLE TABLE PORTLET-->

					</div>

				</div>

				<!-- END PAGE CONTENT -->

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

	<script type="text/javascript" src="media/js/jquery.dataTables.js"></script>

	<script type="text/javascript" src="media/js/DT_bootstrap.js"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="media/js/app.js"></script>

	<!--	<script src="media/js/table-editable.js"></script> --> 

	<script>

		jQuery(document).ready(function() {       

		   App.init();

		   TableEditable.init();

		});

	</script>

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>

<!-- END BODY -->

</html>