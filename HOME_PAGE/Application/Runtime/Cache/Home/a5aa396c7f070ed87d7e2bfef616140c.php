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
    <link rel="shortcut icon" type="image/x-ico" src="/chenqiuyuan/Public/icon/favicon.ico" />

    <title>陈秋远</title>

    <!-- Bootstrap core CSS -->
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <!-- 表格(table)的CSS -->
    <link rel="stylesheet" type="text/css" href="/chenqiuyuan/Public/CSS/table.css" />

  </head>
<body>
    <div class="container">
		<div class="header clearfix">
  <nav>
    <ul class="nav nav-pills pull-right">
      	<li role="presentation" class="active" ><a href="/chenqiuyuan/index.php/Home/Admin/index">陈秋远</a></li>
      	<li role="presentation"><a href="#">关于</a></li>
      	<li role="presentation"><a href="/chenqiuyuan/index.php/Home/Contact/index">联系我</a></li>
    </ul>
    <div>
    	<h3><a href="/chenqiuyuan/index.php/">主页</a></h3>
    </div>
  </nav>
  <nav>
    
</div>
		<!-- 头部 -->
		<div class="jumbotron">
			<h3>
				正在做的事
			</h3>
			<table id="table">
				<tr>
				  <th>title</th>
				  <th>content</th>
				  <th>author</th>
				</tr>
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($mod) == "1"): ?><tr class="alt">
						    <td><?php echo ($vo["title"]); ?></td>
						    <td><?php echo ($vo["content"]); ?></td>
						    <td><?php echo ($vo["author"]); ?></td>
						</tr><?php endif; ?>
					<?php if(($mod) == "0"): ?><tr>
						    <td><?php echo ($vo["title"]); ?></td>
						    <td><?php echo ($vo["content"]); ?></td>
						    <td><?php echo ($vo["author"]); ?></td>
						</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</div>
	</div>
	<footer class="footer">
  <div class="container">
    <p class="text-muted" style="text-align:right">Chenqiuyuan © Company 2015</p>
  </div>
</footer>
	<!-- 脚标 -->
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>