<footer id="footer">
<span class="copyright"><?php echo $row['web_copyright']?></span>
</footer>
</body>
</html>
<?php
mysql_close();
//检测GZIP;
if(extension_loaded("zlib")){
     ob_end_flush();
}
?>