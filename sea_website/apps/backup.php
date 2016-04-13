<?php 
require 'inc/checklogin.php';
require 'inc/conn.php';
$button=$_POST['button'];
if($button=="备份数据") {
require 'inc/conn.php';                     
$q1=mysql_query("show tables");         
    while($t=mysql_fetch_array($q1)){    
        $table=$t[0];         
        $q2=mysql_query("show create table `$table`");    
        $sql=mysql_fetch_array($q2);         
        $mysql.=$sql['Create Table'].";\r\n\r\n";       
        $q3=mysql_query("select * from `$table`");    
        while($data=mysql_fetch_assoc($q3)) {        
            $keys=array_keys($data);         
            $keys=array_map('addslashes',$keys);         
            $keys=join('`,`',$keys);         
            $keys="`".$keys."`";         
            $vals=array_values($data);         
            $vals=array_map('addslashes',$vals);        
            $vals=join("','",$vals);         
            $vals="'".$vals."'";         
            $mysql.="insert into `$table`($keys) values($vals);\r\n";    
         }         
        $mysql.="\r\n";                 
     }         
    $filename="./backup/SEAWEBSITE_".date('Ymd')."".$dbname.".sql"; //文件名为当天的日期         
    $fp = fopen($filename,'w');         
    fputs($fp,$mysql);         
     fclose($fp);
	
$msg="恭喜，数据备份成功，已经生成备份文件：<a href=".$filename.">".$filename."</a>";
}

if($button=="备份文件") 

{ 

$zip = new ZipArchive(); 

$filename = "./backup/SEAWEBSITE_".date("Ymd").".zip"; 

if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) { 

exit("无法创建 <$filename>\n"); 

} 

$files = listdir(); 

foreach($files as $path) 

{ 

$zip->addFile($path,str_replace("./","",str_replace("\\","/",$path))); 

} 

$msg="<a href=".$filename.">".$filename."</a> 压缩完成，共压缩了: " . $zip->numFiles . "个文件\n"; 

$zip->close(); 

} 

Function listdir($start_dir='.') { 

$files = array(); 

if (is_dir($start_dir)) { 

$fh = opendir($start_dir); 

while (($file = readdir($fh)) !== false) { 

if (strcmp($file, '.')==0 || strcmp($file, '..')==0) continue; 

$filepath = $start_dir . '/' . $file; 

if ( is_dir($filepath) ) 

$files = array_merge($files, listdir($filepath)); 

else 

array_push($files, $filepath); 

} 

closedir($fh); 

} else { 

$files = false; 

} 

return $files; 

} 
?> 

<?php

if($button=="删除备份") {
echo"<div align='center'>";	
//循环目录下的所有文件
function delFileUnderDir($dirName)
{
if($handle = opendir("$dirName")){
   while(false !== ($item = readdir($handle))){
   if($item != "." && $item != ".."){
   if(is_dir("$dirName/$item")){
   delFileUnderDir("$dirName/$item");
   }else{
   if(unlink("$dirName/$item"))
   echo"成功删除文件： $dirName/$item<br />\n";
   }
   }
   }
   closedir($handle);
  }
}
delFileUnderDir('backup');
echo"</div>";
}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" > 

<html> 

<head> 

<title>在线数据管理工具</title> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

<style type="text/css">
body,td,th {
	font-size: 14px;
	margin-top: 20px;
	line-height:200%;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
</head> 

<body> 

<form name="form1" method="post" action=""> 
<div align="center">
<?php if($button=="") {?>
<h3>数据管理</h3> 

<P> 
<input type="submit" name="button" value="备份数据" /> 
&nbsp; 
<input type="submit" name="button" value="备份文件" />
&nbsp; 
<input type="submit" name="button" value="删除备份" />
</P> 
<P>温馨提示：备份时间与数据大小有关，开始后请耐心等待。</P> 
</form>
<?php }else{?>
<P><?php echo $msg ?></P>
<P><a href="/?backup" target="_self">返回上一页</a></P> 
<?php }?>
</div>


</body> 

</html>
