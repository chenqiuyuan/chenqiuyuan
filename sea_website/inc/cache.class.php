<?php
$web_cache=$row['web_cache'];
if ($web_cache<>'0'){
$maxtime=time();
$interval=60 * $web_cache;// 秒*分钟
header ("Last-Modified: " . gmdate ('r', $maxtime)); 
header ("Expires: " . gmdate ("r", ($maxtime + $interval))); 
header ("Cache-Control: max-age=".$interval);
}
//检测是否支持php zlib，支持则开启。
if(extension_loaded("zlib") && strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip")){
ob_start("ob_gzhandler");
} 
?>