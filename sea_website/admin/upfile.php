<?php
require '../inc/conn.php';
$query = "SELECT * FROM web_watermark";
$result = mysql_query($query) or die('SQL语句有误：'.mysql_error());
$web_water = mysql_fetch_array($result);
?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<?php  
//error_reporting(0); 
require '../inc/checklogin.php';   
$uptypes=array(   
    'image/jpg',   
    'image/jpeg',   
   'image/png',   
    'image/pjpeg',   
    'image/gif',   
    'image/bmp',   
    'image/x-png'   
);  
$max_file_size=4000000;     //上传文件大小限制, 单位BYTE   
$destination_folder="../upload/Article/"; //上传文件路径    
$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);   
$imgpreviewsize=1/1;    //缩略图比例   
?>   

<form enctype="multipart/form-data" method="post" name="upform">      
 <input name="upfile" type="file">  <input type="submit" value="上传">  
</form>
<?php   
if ($_SERVER['REQUEST_METHOD'] == 'POST')   
{   
    if (!is_uploaded_file($_FILES["upfile"][tmp_name]))   
    //是否存在文件   
    {   
		 echo "<Script language=JavaScript>alert('抱歉，没有选择上传图片。');history.back();</Script>";   
         exit;   
    }  
  
    $file = $_FILES["upfile"];   
    if($max_file_size < $file["size"])   
    //检查文件大小   
    {   

	echo "<Script language=JavaScript>alert('抱歉，文件超过了大小。');history.go(-2);</Script>"; 
        exit;   
    }  
  
    if(!in_array($file["type"], $uptypes))   
    //检查文件类型   
    {   

	 echo "<Script language=JavaScript>alert('抱歉，文件类型不符合。');history.go(-2);</Script>";   
       echo "文件类型不符!".$file["type"];   
        exit;   
    }  
  
    if(!file_exists($destination_folder))   
    {   
        mkdir($destination_folder);   
    }  
  
    $filename=$file["tmp_name"];   
    $image_size = getimagesize($filename);   
    $pinfo=pathinfo($file["name"]);   
    $ftype=$pinfo['extension'];   
    $destination = $destination_folder.time().".".$ftype;   
    if (file_exists($destination) && $overwrite != true)   
   {   
        echo "同名文件已经存在了";  
		 
        exit;   
    }  
  
    if(!move_uploaded_file ($filename, $destination))   
    {   
        echo "移动文件出错";   
       exit;   
   }  
  
    $pinfo=pathinfo($destination);   
    $fname=$pinfo[basename]; 
 //  echo "已经成功上传";  
   if($imgpreview==1)   
    {   
    echo "<br>图片预览:<br>";   
    echo "<img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);   
    echo " alt=\"图片预览:\r文件名:".$destination."\r上传时间:\">";   
   }   
 
$img_kg=$web_water['img_kg'];;//水印开关
$img_logo=$web_water['img_watermark'];//水印图片
$img_weizhi=$web_water['img_weizhi'];//水印位置
$img_slt=$web_water['img_slt'];//缩略图片开关
$img_moshi=$web_water['img_moshi']; //缩放模式
$img_wzkd=$web_water['img_wzkd']; //文章图片宽度
$img_wzgd=$web_water['img_wzgd']; //文章图片高度
$img_xpkd=$web_water['img_xpkd']; //相片图片宽度
$img_xpgd=$web_water['img_xpgd']; //相片图片高度

require '../inc/images.class.php';   
$obj=new Img();
$Img_srcName = $obj->Img_BigToSamll($destination,$img_wzkd,$img_wzgd,"$destination",$img_moshi);

if ($img_slt==1){
$filename="s_".str_replace($destination_folder,"",$destination);//得到文件名
$Img_srcName = $obj->Img_BigToSamll($destination,85,70,"$destination_folder$filename",$img_moshi);
}

if ($img_kg==1){
$obj->Img_Watermark($destination,$img_logo,"$destination",$img_weizhi);
}

if($destination<>""){
 echo "<script language='javascript' type='text/javascript'>parent.document.form2.w_images.value='".$destination."';</script>";
}
}
?> 