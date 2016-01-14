<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>单车去哪儿</title>
	<link rel="stylesheet" href="bootstrap\css\bootstrap.css" type="text/css" />
</head>
<body>
<?php
	$conn=mysql_connect('localhost','root','') or die("SQL SERVER 数据库连接失败！"); 
	//选择数据库
	mysql_select_db('danche',$conn); 
	
	mysql_query("set character set 'utf8'");//读库
	mysql_query("set names 'utf8'");//写库
	
	//sql语句
	$sql="SELECT name,sex,num,nali,beiju,time FROM danche WHERE nali='图书馆'ORDER BY time DESC"; 
	$result=mysql_query($sql); 
	$num = mysql_num_rows($result); 
  
  echo "
  <div style='background:#009cff; width:100%; height:100%;'>
  <div class=wodetop>&nbsp;&nbsp;&nbsp;&nbsp;
	<div class=\"btn-group\">
        <button type=\"button\" class=\"btn btn-primary\" onClick=\"location.href='index.php'\">单车去哪儿</button>
  		<button type=\"button\" class=\"btn btn-success\" onClick=\"location.href='zuixin.php'\">最新丢车</button>
  		<button type=\"button\" class=\"btn btn-info\" onClick=\"location.href='tongji.php'\">丢车统计</button>
  		<button type=\"button\" class=\"btn btn-danger\" onClick=\"location.href='ditu.php'\">防偷地图</button>
        	<button type=\"button\" class=\"btn btn-warning\" onClick=\"location.href='baogao.html'\">丢车报告</button>
	</div>
</div><br><br><br>";
	
	
  echo "<div class='weibojuzhong'><font color='#FFFFFF' size='+1'><center><b>【图书馆】共有".$num."次单车被偷报告</b></center></font><div><br>";
  
		
		for($i=0;$i<$num;$i++) {
		    $Row = mysql_fetch_array($result);
			
			if ($Row[1]=='男') $Row[1] = '帅哥';
			if ($Row[1]=='女') $Row[1] = '美女';
			if ($Row[1]=='不明') $Row[1] = '不明性别';
			
		    echo "
			 <table class=\"table table-bordered\">
          <tr bgcolor=e9e9d8>
            <td width='300'>【$Row[1]-$Row[0]】 在【$Row[3]】丢了【$Row[2]】辆爱车</td>
          </tr>
		  <tr bgcolor=ffffff>
            <td width='300'>$Row[4]</td>
          </tr>
		  <tr bgcolor=ffffff>
            <td width='300'>杯具发生时间：$Row[5]</td>
          </tr>
      </table>";
		}   
	//关闭连接
	mysql_close($conn);



   $online_log = "count.dat"; 
   $timeout = 30;
   $entries = file($online_log); 

   $temp = array(); 
  
   for ($i=0;$i<count($entries);$i++) { 
$entry = explode(",",trim($entries[$i])); 
if (($entry[0] != getenv('REMOTE_ADDR')) && ($entry[1] > time())) { 
array_push($temp,$entry[0].",".$entry[1]."\n"); //取出其他浏览者的信息,并去掉超时者,保存进$temp
} 
   } 

array_push($temp,getenv('REMOTE_ADDR').",".(time() + ($timeout))."\n"); //更新浏览者的时间
   $users_online = count($temp); //计算在线人数

   $entries = implode("",$temp); 
   //写入文件
   $fp = fopen($online_log,"w"); 
flock($fp,LOCK_EX); 
fputs($fp,$entries); 
flock($fp,LOCK_UN); 
fclose($fp); 

echo "<font color='#FFFFFF' size='+1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp当前有&nbsp".$users_online."&nbsp人正在使用单车去哪儿</font>"; 



?>
</body>
</html>