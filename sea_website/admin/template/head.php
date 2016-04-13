<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="index.php">

				<img src="media/image/logo.png" alt="logo"/>

				</a>

				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="media/image/menu-toggler.png" alt="" />

				</a>          

				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              

				<ul class="nav pull-right">


					<!-- BEGIN INBOX DROPDOWN -->
<!--
					<li class="dropdown" id="header_inbox_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

<i class="icon-comments"></i>
<span class="badge">1</span>
</a>

						<ul class="dropdown-menu extended inbox">

							<li>

								<p>未审核评论</p>

							</li>

							<li>
<a href="reply.php?id=<?php echo $comment['u_id']?>&w=<?php echo $comment['u_aid']?>">

								<span class="photo"><img src="../../img/Portrait/<?php echo $comment['u_touxiang']?>.jpg" alt="<?php echo $comment['u_name']?>" /></span>

								<span class="subject">

								<span class="from"><?php echo $comment['u_name']?></span>

								<span class="time"><?php echo date('m.d H:i', strtotime($comment['u_time']));?></span>

								</span>

								<span class="message">

								<?php echo mb_substr($content,0,12,'utf8') ?> ..

								</span>  

								</a>

							</li>
 <?php

 ?>

							<li class="external">

								<a href="comment_list.php">查看所有评论信息 <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>

					<!-- END INBOX DROPDOWN -->
 <!--
 					<li class="dropdown" id="header_task_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="icon-github-sign"></i>

<?php

?>

						<span class="badge"><?php echo $sszs?></span>
<?php

?>

						</a>

						<ul class="dropdown-menu extended inbox">

							<li>

								<p>未审核说说评论</p>

							</li>

<?php

?>
							<li>

								<a href="shuoshuo_reply.php?id=<?php echo $comment['su_id']?>">

								<span class="photo"><img src="../../img/Portrait/<?php echo $comment['su_touxiang']?>.jpg" alt="<?php echo $comment['su_name']?>" /></span>

								<span class="subject">

								<span class="from"><?php echo $comment['su_name']?></span>

								<span class="time"><?php echo date('m.d H:i', strtotime($comment['su_time']));?></span>

								</span>

								<span class="message">

								<?php echo mb_substr($content,0,12,'utf8') ?> ..

								</span>  

								</a>

							</li>

<?php

?>
							<li class="external">

								<a href="shuoshuo_comment_list.php">查看所有说说评论 <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>
                   

					<!-- BEGIN TODO DROPDOWN -->
<!--
					<li class="dropdown" id="header_task_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="icon-bullhorn"></i>

<?php

?>

						<span class="badge"><?php echo $plzs?></span>
<?php

?>

						</a>

						<ul class="dropdown-menu extended inbox">

							<li>

								<p>未审核留言</p>

							</li>

<?php
	
?>
							<li>

								<a href="reply.php?id=<?php echo $comment['u_id']?>">

								<span class="photo"><img src="../../img/Portrait/<?php echo $comment['u_touxiang']?>.jpg" alt="<?php echo $comment['u_name']?>" /></span>

								<span class="subject">

								<span class="from"><?php echo $comment['u_name']?></span>

								<span class="time"><?php echo date('m.d H:i', strtotime($comment['u_time']));?></span>

								</span>

								<span class="message">

								<?php echo mb_substr($content,0,12,'utf8') ?> ..

								</span>  

								</a>

							</li>

<?php

?>
							<li class="external">

								<a href="message_list.php">查看所有留言信息 <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>

					<!-- END TODO DROPDOWN -->

					<!-- BEGIN USER LOGIN DROPDOWN -->

<?php
$user=$_COOKIE['user'];
$query = "SELECT * FROM web_user WHERE u_user='$user'";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$user = mysql_fetch_array($result);
$u_images=$user['u_images'];
if ($u_images<>""){
$images="../".$u_images;
	}else{
$images="../img/admin-avatar.jpg";		
		}
?>
					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<img alt="<?php echo $user['u_name']?>" src="<?php echo $images?>" style="width:29px;height:29px;" />

						<span class="username"><?php echo $user['u_name']?></span>

						<i class="icon-angle-down"></i>

						</a>

						<ul class="dropdown-menu">

							<li><a href="edit_user.php?edit=<?php echo $user['u_id']?>"><i class="icon-user"></i> 修改资料</a></li>

							<li><a href="outlogin.php"><i class="icon-key"></i> 安全退出</a></li>

						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU --> 

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div>