<?php 
date_default_timezone_set('Asia/Shanghai');//时区设置

//接收表单提交到的数据
$name = $_POST['name'];
$sex = $_POST['sex'];
$tel = $_POST['tel'];
$num = $_POST['num'];
$nali = $_POST['nali'];
$beiju = $_POST['beiju'];
$time = date("Y-m-d H:i:s");

$stm="<html>
<head>
<title></title>
<meta http-equiv='Content-Type' content='text/html; charset=gb2312'>
<style>
.title { font-family: '宋体'; font-size: 13px; line-height: 150% ; color: #FFFFFF}
</style>
</head>
<body bgcolor=dfdfdf text=#000000>
<table width=80% border=0 cellspacing=1 cellpadding=2 class=\"title\" bgcolor=#4851ff align=center>
  <tr align=center bgcolor=009cff> 
    <td colspan=2 height=30>[".$name."]的丢车报告</td>
  </tr>
  <tr bgcolor=009cff> 
    <td align=right width='100'>昵称：</td>
    <td>".$name."</td>
  </tr>
    <tr bgcolor=009cff> 
    <td align=right width='100'>性别：</td>
    <td>".$sex."</td>
  </tr>
    <tr bgcolor=009cff> 
    <td align=right width='100'>联系方式：</td>
    <td>".$tel."</td>
  </tr>
   <tr bgcolor=009cff> 
    <td align=right width='100'>丢车数量：</td>
    <td>".$num."</td>
  </tr>  
  <tr bgcolor=009cff> 
    <td align=right width='100'>丢车地点：</td>
    <td>".$nali."</td>
  </tr>
  <tr bgcolor=009cff> 
    <td align=right width='100'>具体杯具：</td>
    <td>".$beiju."</td>
  </tr>
  <tr bgcolor=009cff> 
    <td align=right width='100'>发现时间：</td>
    <td>".$time."</td>
  </tr>

</table>
</body>
</html>"; 
require("add.php"); //添加数据到数据库
require("smtp.php"); //SMTP邮件发送

$smtpserver = "smtp.163.com";//SMTP服务器
$smtpserverport = 25;//SMTP服务器端口
$smtpusermail = "danchequnaer@163.com";//SMTP服务器的用户邮箱
$smtpemailto = "danchequnaer@126.com";//发送给谁
$smtpuser = "danchequnaer@163.com";//SMTP服务器的用户帐号
$smtppass = "danche";//SMTP服务器的用户密码
$mailsubject = "丢车报告【单车去哪儿】 ";//邮件主题
$mailbody = $stm;//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
$smtp->debug = TRUE;
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
exit; 
?> 
