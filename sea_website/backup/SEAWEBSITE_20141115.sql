CREATE TABLE `web_2navigation` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_name` varchar(255) DEFAULT NULL,
  `n_belong` int(11) DEFAULT NULL,
  `n_pattern` int(11) DEFAULT NULL,
  `n_open` varchar(255) DEFAULT NULL,
  `n_sequence` int(11) DEFAULT NULL,
  `n_display` int(11) DEFAULT NULL,
  `n_keywords` varchar(255) DEFAULT NULL,
  `n_description` varchar(255) DEFAULT NULL,
  `n_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`n_id`),
  KEY `n_id` (`n_id`),
  KEY `n_id_2` (`n_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

insert into `web_2navigation`(`n_id`,`n_name`,`n_belong`,`n_pattern`,`n_open`,`n_sequence`,`n_display`,`n_keywords`,`n_description`,`n_time`) values('1','分类一','0','0','1','1','1','','','2014-11-15 12:49:26');
insert into `web_2navigation`(`n_id`,`n_name`,`n_belong`,`n_pattern`,`n_open`,`n_sequence`,`n_display`,`n_keywords`,`n_description`,`n_time`) values('2','分类二','0','0','1','2','1','','','2014-11-15 12:49:18');
insert into `web_2navigation`(`n_id`,`n_name`,`n_belong`,`n_pattern`,`n_open`,`n_sequence`,`n_display`,`n_keywords`,`n_description`,`n_time`) values('3','分类三','0','0','1','3','1','','','2014-11-15 12:49:02');

CREATE TABLE `web_ad` (
  `web_ad1` longtext,
  `web_ad2` longtext,
  `web_ad3` longtext,
  `web_ad4` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

insert into `web_ad`(`web_ad1`,`web_ad2`,`web_ad3`,`web_ad4`) values('<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
<!-- isea.pw-1 -->
<ins class=\"adsbygoogle\"
     style=\"display:block\"
     data-ad-client=\"ca-pub-4640617418299642\"
     data-ad-slot=\"7004503749\"
     data-ad-format=\"auto\"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>','','','');

CREATE TABLE `web_article` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `w_title` varchar(255) DEFAULT NULL,
  `w_keywords` longtext,
  `l_id` int(11) DEFAULT NULL,
  `url_address` bigint(20) NOT NULL,
  `w_description` longtext,
  `w_author` varchar(255) DEFAULT NULL,
  `w_images` varchar(255) DEFAULT NULL,
  `w_content` longtext,
  `w_time` datetime DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL,
  `view_yes` int(11) DEFAULT NULL,
  `w_tuijian` int(11) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `w_zzip` varchar(255) DEFAULT NULL,
  `publish_mode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`w_id`),
  UNIQUE KEY `url_address` (`url_address`),
  KEY `w_id` (`w_id`),
  KEY `w_id_2` (`w_id`,`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

insert into `web_article`(`w_id`,`w_title`,`w_keywords`,`l_id`,`url_address`,`w_description`,`w_author`,`w_images`,`w_content`,`w_time`,`edit_time`,`view_yes`,`w_tuijian`,`hit`,`w_zzip`,`publish_mode`) values('1','欢迎使用熊海个人网站系统','','1','141115125334','','熊海个人网站','','<p>这是我开源的第一款PHP的程序，本程序前后台均采用HTML5、CSS3，响应式布局，完美支持各种浏览设备，因为之前写过博客程序，博客程序一直太过于注重功能，从而忽视了内容的重要性，所以这款个人网站程序做出了一些改变，主要突出内容，从而削减一些功能，以简洁轻量为主。<br/></p><p>程序名称：熊海个人网站<br/>程序版本：V1.0<br/>程序语言：PHP/MySQL<br/>程序编码：UTF-8<br/>美工 / UI：网络/熊海<br/>默认管理员：isea 默认密码：123456<br/>官网：<a href=\"http://www.isea.pw\">http://www.isea.pw</a> <br/>博客：<a href=\"http://www.isea.so\">http://www.isea.so</a><br/></p><p>使用方法：</p><p>一、首先进到您的数据库控制面板中将backup目录下的数据库文件导入。<br/>二、进入inc目录下，打开conn.php文件，修改对应信息。<br/>&nbsp;define(&#39;DB_HOST&#39;,&#39;数据库地址，一般为：localhost&#39;);<br/>&nbsp;define(&#39;DB_USER&#39;,&#39;数据库用用名&#39;);<br/>&nbsp;define(&#39;DB_PWD&#39;,&#39;数据库密码&#39;);<br/>&nbsp;define(&#39;DB_NAME&#39;,&#39;数据库名称&#39;);</p><p>最后，祝您使用愉快！</p>','2014-11-15 12:53:34','2014-11-15 12:56:22','1','0','9','127.0.0.1','1');
insert into `web_article`(`w_id`,`w_title`,`w_keywords`,`l_id`,`url_address`,`w_description`,`w_author`,`w_images`,`w_content`,`w_time`,`edit_time`,`view_yes`,`w_tuijian`,`hit`,`w_zzip`,`publish_mode`) values('2','phpmyadmin还原mysql教程','mysql','1','141115134613','','熊海个人网站','','<p>phpmyadmin还原mysql</p><p>在 PHPMyAdmin 中打开论坛数据库，点菜单栏的“import”，在“文本文件位置”处点“浏览”将上面导出的备份数据文本文件导入，执行即可。</p><p><img title=\"1416030602182540.jpg\" alt=\"230IMA0-1.jpg\" src=\"/upload/image/20141115/1416030602182540.jpg\"/></p>','2014-11-15 13:46:13','2014-11-15 13:50:05','1','0','8','127.0.0.1','1');

CREATE TABLE `web_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `jieshao` longtext,
  `nofollow` int(11) DEFAULT NULL,
  `view_yes` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

insert into `web_link`(`id`,`name`,`url`,`mail`,`jieshao`,`nofollow`,`view_yes`,`time`) values('1','熊海博客','http://www.isea.so','me@isea.so','原创独立个人博客','0','1','2014-11-15 09:55:27');
insert into `web_link`(`id`,`name`,`url`,`mail`,`jieshao`,`nofollow`,`view_yes`,`time`) values('2','熊海个人网站','http://www.isea.pw','me@isea.so','熊海个人网站','0','1','2014-11-15 13:12:55');

CREATE TABLE `web_settings` (
  `web_id` int(11) NOT NULL AUTO_INCREMENT,
  `web_name` varchar(255) DEFAULT NULL,
  `web_slogan` varchar(255) DEFAULT NULL,
  `web_title` varchar(255) DEFAULT NULL,
  `web_author` varchar(255) DEFAULT NULL,
  `web_keywords` longtext,
  `web_description` longtext,
  `web_url` varchar(255) DEFAULT NULL,
  `web_mail` varchar(255) DEFAULT NULL,
  `web_qq` varchar(255) DEFAULT NULL,
  `web_tel` varchar(255) DEFAULT NULL,
  `web_add` longtext,
  `web_copyright` longtext,
  `web_jiange` varchar(2) NOT NULL,
  `web_cache` int(11) NOT NULL,
  PRIMARY KEY (`web_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

insert into `web_settings`(`web_id`,`web_name`,`web_slogan`,`web_title`,`web_author`,`web_keywords`,`web_description`,`web_url`,`web_mail`,`web_qq`,`web_tel`,`web_add`,`web_copyright`,`web_jiange`,`web_cache`) values('2','欢迎使用熊海个人网站系统','Hi，欢迎您使用熊海个人网站系统！','欢迎使用熊海个人网站系统','熊海个人网站','','','http://www.isea.pw','me@isea.so','86226999','+86(0)18606676776','<p>这是熊海开源的第一款PHP的程序；</p>
<p>前后台采用HTML5/CSS3，响应式布局，完美支持各种设备。</p>','© 2014 熊海个人网站 & 保留所有权利 ','-','0');

CREATE TABLE `web_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_user` varchar(50) DEFAULT NULL,
  `u_pass` varchar(100) DEFAULT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `u_class` int(11) DEFAULT NULL,
  `u_images` varchar(255) DEFAULT NULL,
  `u_time` datetime DEFAULT NULL,
  `u_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

insert into `web_user`(`u_id`,`u_user`,`u_pass`,`u_name`,`u_class`,`u_images`,`u_time`,`u_ip`) values('1','isea','e10adc3949ba59abbe56e057f20f883e','熊海','0','../upload/userprofile/1375626223.jpg','2012-12-04 23:57:19','127.0.0.1');

CREATE TABLE `web_watermark` (
  `img_kg` int(1) DEFAULT NULL,
  `img_slt` int(1) DEFAULT NULL,
  `img_watermark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_weizhi` int(1) DEFAULT NULL,
  `img_moshi` int(1) DEFAULT NULL,
  `img_wzgd` int(4) DEFAULT NULL,
  `img_wzkd` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

insert into `web_watermark`(`img_kg`,`img_slt`,`img_watermark`,`img_weizhi`,`img_moshi`,`img_wzgd`,`img_wzkd`) values('1','1','../upload/userprofile/1375666084.png','3','2','225','509');

