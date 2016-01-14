<!doctype html>
<html lang="en">
<body>

<?php 
	$conn=mysql_connect('localhost','root','') or die("SQL SERVER 数据库连接失败！"); 
	//选择数据库
	mysql_select_db('danche',$conn); 
	
	mysql_query("set character set 'utf8'");//读库
	mysql_query("set names 'utf8'");//写库
	
	//sql语句
	$sql="SELECT nali FROM danche WHERE nali LIKE '图书馆'"; 
	$result=mysql_query($sql); 
	$tsg = mysql_num_rows($result)/10.0; 
	
	$sql="SELECT nali FROM danche WHERE nali LIKE '新天地'"; 
	$result=mysql_query($sql); 
	$xtd = mysql_num_rows($result)/10.0; 
	
	$sql="SELECT nali FROM danche WHERE nali LIKE '至善园4号'"; 
	$result=mysql_query($sql); 
	$z4 = mysql_num_rows($result)/10.0; 
	
	$sql="SELECT nali FROM danche WHERE nali LIKE '慎思园9号'"; 
	$result=mysql_query($sql); 
	$s9 = mysql_num_rows($result)/10.0; 
	
	
echo
"<html>
<head>
	<meta charset='utf-8'>
	<title>单车去哪儿</title>
	<link rel='stylesheet' href='bootstrap\css\bootstrap.css' type='text/css' />
</head>

<body>
<div style=\"position:absolute;z-index:3;left:510px;top:31px;opacity:$tsg\" onClick=\"location.href='tsg.php'\"><img src=\"tsg_red.png\"></div>
<div style=\"position:absolute;z-index:3;left:535px;top:746px;opacity:$xtd\" onClick=\"location.href='xtd.php'\"><img src=\"xtd_red.png\"></div>
<div style=\"position:absolute;z-index:3;left:516px;top:930px;opacity:$z4\" onClick=\"location.href='z4.php'\"><img src=\"z4_red.png\"></div>
<div style=\"position:absolute;z-index:3;left:476px;top:1112px;opacity:$s9\" onClick=\"location.href='s9.php'\"><img src=\"s9_red.png\"></div>

<div style=\"position:absolute;z-index:2;left:510px;top:31px;\" onClick=\"location.href='tsg.php'\"><img src=\"tsg.png\"></div>
<div style=\"position:absolute;z-index:2;left:535px;top:746px;\" onClick=\"location.href='xtd.php'\"><img src=\"xtd.png\"></div>
<div style=\"position:absolute;z-index:2;left:516px;top:930px;\" onClick=\"location.href='z4.php'\"><img src=\"z4.png\"></div>
<div style=\"position:absolute;z-index:2;left:476px;top:1112px;\" onClick=\"location.href='s9.php'\"><img src=\"s9.png\"></div>
<div style=\"position:absolute;z-index:1;left:0px;top:0px;\"><div class=ditu><img src=\"map.png\"></div></div>

<div style=\"position:absolute;z-index:4;\">
<div class=wodetop >&nbsp;&nbsp;&nbsp;&nbsp;
	<div class=\"btn-group\">
		<button type=\"button\" class=\"btn btn-primary\" onClick=\"location.href='index.php'\">单车去哪儿</button>
		<button type=\"button\" class=\"btn btn-success\" onClick=\"location.href='zuixin.php'\">最新丢车</button>
		<button type=\"button\" class=\"btn btn-info\" onClick=\"location.href='tongji.php'\">丢车统计</button>
		<button type=\"button\" class=\"btn btn-danger\" onClick=\"location.href='ditu.php'\">防偷地图</button>
        <button type=\"button\" class=\"btn btn-warning\" onClick=\"location.href='baogao.html'\">丢车报告</button>
	</div>
</div>

<div style=\"position:absolute;z-index:5;\">
<div class=wodeleft>	
	<img src='tip.png'>
</div>
</div>

</body>
</html>"; 

?>