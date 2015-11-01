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
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
		
	<a class="btn btn-primary" href="/chenqiuyuan/index.php/Home/Admin\on_doing_read">刷新</a>
		<table id="table">
			<tr>
			  <th>title</th>
			  <th>content</th>
			  <th>author</th>
			  <th>edition</th>
			  <th>delete</th>
			</tr>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($mod) == "1"): ?><tr>
					    <td><a href=""><?php echo ($vo["title"]); ?></a></td>
					    <td><?php echo ($vo["content"]); ?></td>
					    <td><?php echo ($vo["author"]); ?></td>
					    <td><a href=<?php echo U('Admin:on_doing_edit',array('title'=>$vo['title']));?>>修改</a></td>
					    <td><a href=<?php echo U('Admin:on_doing_delete',array('title'=>$vo['title']));?>>删除</a></td>
					</tr><?php endif; ?>
				<?php if(($mod) == "0"): ?><tr class="alt">
					    <td><a href=""><?php echo ($vo["title"]); ?></a></td>
					    <td><?php echo ($vo["content"]); ?></td>
					    <td><?php echo ($vo["author"]); ?></td>
					    <td><a href=<?php echo U('Admin:on_doing_edit',array('title'=>$vo['title']));?>>修改</a></td>
					    <td><a href=<?php echo U('Admin:on_doing_delete',array('title'=>$vo['title']));?>>删除</a></td>
					</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</table>
		<br/>
		<a class="btn btn-success btn-block btn-large" href="/chenqiuyuan/index.php/Home/Admin\on_doing_insert_interface" type="button">新增</a>

	</div>
</div>


	<footer class="footer">
  <div class="container">
    <p class="text-muted" style="text-align:right">Chenqiuyuan © Company 2015</p>
  </div>
</footer>
	<!-- 脚标 -->
</body>
</html>