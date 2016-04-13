<?php
$user=$_COOKIE['user'];
$jurisdiction=$_COOKIE['jurisdiction'];
if ($user=="" or $jurisdiction==""){
echo "<script>this.location='login.php'</script>";
exit;	
	}
?>