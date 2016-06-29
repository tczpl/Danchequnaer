<?php
$con = mysql_connect("localhost","root","");//连接数据库
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("danche", $con);
mysql_query('set names GB2312');
$sql="insert into `danche`.`danche` (name,sex,tel,num,nali,beiju,time) values ('$name','$sex','$tel','$num','$nali','$beiju','$time')"; //数据入库
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_close($con);

require("success.php")
?>
