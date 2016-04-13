<?php
$page = array_keys($_GET);
$page = strtolower(current($page));
switch ($page) {
    case '':
        include 'apps/index.php'; //首页
        exit;
    case 'list':
        include 'apps/list.php'; //列表
        exit;
    case 'contact':
        include 'apps/contact.php'; //留言
        exit;
	case 'backup':
        include 'apps/backup.php'; //备份
        exit;
}

$pages = htmlspecialchars($_GET['post']);
if ($pages <> '') {
    include 'apps/content.php'; //文章内容
    exit;
}

$pages = htmlspecialchars($_GET['class']);
if ($pages <> '') {
    include 'apps/list.php'; //文章分类
    exit;
}

if ($page <> '') {
    include 'apps/index.php'; //都不符合转到首页
    exit;
}

?>