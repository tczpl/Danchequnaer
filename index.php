<!doctype html>
<html lang="en">
<body>

<?php 

//在线人数的计算
$online_log = "count.dat"; //保存人数的文件,
$timeout = 30;//30秒内没动作认为掉线 
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

echo
"<html>
<head>
	<meta charset='utf-8'>
	<title>单车去哪儿</title>
	<link rel='stylesheet' href='bootstrap\css\bootstrap.css' type='text/css' />
</head>
<body>
<div style='background:#009cff; width:100%; height:1000px;'>
<center>
	<div class=\"btn-group\">
		<button type=\"button\" class=\"btn btn-primary\" onClick=\"location.href='index.php'\">单车去哪儿</button>
		<button type=\"button\" class=\"btn btn-success\" onClick=\"location.href='zuixin.php'\">最新丢车</button>
		<button type=\"button\" class=\"btn btn-info\" onClick=\"location.href='tongji.php'\">丢车统计</button>
		<button type=\"button\" class=\"btn btn-danger\" onClick=\"location.href='ditu.php'\">防偷地图</button>
        <button type=\"button\" class=\"btn btn-warning\" onClick=\"location.href='baogao.html'\">丢车报告</button>
	</div>
</center>
<br><br><br>
<div class='wodejuzhong'><font size='+2' color=ffffff>
<img src =\"pic.png\" align =\"center\"> <br>
当前有 $users_online 人在用单车去哪儿
</font><br><br>
<center><font size='+1' color=ffffff>
郑沛霖 张子平 张子悦 王蓉
</font></center>
<br>
<center>
<a href='youxi.html'><font size='+1' color=ffffff><u>彩蛋游戏</u></font></a>&nbsp;
<a href='http://mail.126.com'><font size='+1' color=ffffff><u>警方邮箱</u></font></a>
</center>
</div>
</body>
</html>"; 

?>