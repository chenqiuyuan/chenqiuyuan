<div class="page-sidebar nav-collapse collapse">

			<!-- BEGIN SIDEBAR MENU -->        

			<ul class="page-sidebar-menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>

				<li>

					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

                    <form class="sidebar-search" name="form1" method="get" action="article_list.php">

						<div class="input-box">

							<a href="javascript:;" class="remove"></a>

							<input type="text" placeholder="Search..." name="key"/>

							<input type="button" class="submit" value=" " />

						</div>

					</form>

					<!-- END RESPONSIVE QUICK SEARCH FORM -->

				</li>

				<li class="start  <?php echo $red_index?>">

					<a href="index.php">

					<i class="icon-home"></i> 

					<span class="title">首页</span>

					<span class="selected"></span>

					</a>

				</li>

				<li class="<?php echo $red_settings?> <?php echo $red_adsettings?> <?php echo $red_advancedsettings?> <?php echo $red_imgwatermark?> <?php echo $red_xiaoxi?>">

					<a href="javascript:;">

					<i class="icon-cogs"></i> 

					<span class="title">设置</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li class="<?php echo $red_settings?>">

							<a href="web_settings.php">

							基本设置</a>

						</li>

                        
                        <li class="<?php echo $red_imgwatermark?>">

							<a href="img_watermark.php">

							图片设置</a>

						</li>
                        <li class="<?php echo $red_adsettings?>">

							<a href="web_adsettings.php">

							广告设置</a>

						</li>

					</ul>

				</li>

				<li class="<?php echo $red_newwz?> <?php echo $red_newss?> <?php echo $red_newimg?>">

					<a href="javascript:;">

					<i class="icon-bookmark-empty"></i> 

					<span class="title">发表内容</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li class="<?php echo $red_newwz?>">

							<a href="new_article.php">

							发表文章</a>

						</li>


					</ul>

				</li>

				<li class="<?php echo $red_articlelist?> <?php echo $red_shuoshuolist?> <?php echo $red_photolist?>">

					<a href="javascript:;">

					<i class="icon-table"></i> 

					<span class="title">内容列表</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li class="<?php echo $red_articlelist?>">

							<a href="article_list.php">

							文章列表</a>

						</li>


					</ul>

				</li>


				<li class="<?php echo $red_lanmulist?> <?php echo $red_newlanmu?>">

					<a href="javascript:;">

					<i class="icon-gift"></i> 

					<span class="title">分类管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li class="<?php echo $red_lanmulist?>">

							<a href="lanmu_list.php">

							分类列表</a>

						</li>

						<li class="<?php echo $red_newlanmu?>">
                        <a href="new_lanmu.php">

							新增分类</a>
                        </li>


					</ul>

				</li>

				<li class="<?php echo $red_linklist?><?php echo $red_newlink?>">

					<a href="javascript:;">

					<i class="icon-folder-open"></i> 

					<span class="title">链接管理</span>

					<span class="arrow "></span>

					</a>

<ul class="sub-menu">
<li class="<?php echo $red_linklist?>"><a href="link_list.php">链接列表</a></li>
<li class="<?php echo $red_newlink?>"><a href="new_link.php">添加链接</a></li>
</ul>

				</li>

				<li class="<?php echo $red_userlist?> <?php echo $red_newuser?>">

					<a href="javascript:;">

					<i class="icon-user"></i> 

					<span class="title">用户管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li class="<?php echo $red_userlist?>">

							<a href="user_list.php">

							用户列表</a>

						</li>

						<li class="<?php echo $red_newuser?>">

							<a href="new_user.php">

							新增用户</a>

						</li>
                        </ul>
                        
                  <li class="<?php echo $red_backup?>">

					<a href="javascript:;">

					<i class="icon-bar-chart"></i> 

					<span class="title">数据管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li class="<?php echo $red_backup?>">

							<a href="web_backup.php">

							文件/数据库</a>

						</li>


					</ul>

				</li>


		</div>