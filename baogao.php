<?php 
date_default_timezone_set('Asia/Shanghai');//ʱ������

//���ձ��ύ��������
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
.title { font-family: '����'; font-size: 13px; line-height: 150% ; color: #FFFFFF}
</style>
</head>
<body bgcolor=dfdfdf text=#000000>
<table width=80% border=0 cellspacing=1 cellpadding=2 class=\"title\" bgcolor=#4851ff align=center>
  <tr align=center bgcolor=009cff> 
    <td colspan=2 height=30>[".$name."]�Ķ�������</td>
  </tr>
  <tr bgcolor=009cff> 
    <td align=right width='100'>�ǳƣ�</td>
    <td>".$name."</td>
  </tr>
    <tr bgcolor=009cff> 
    <td align=right width='100'>�Ա�</td>
    <td>".$sex."</td>
  </tr>
    <tr bgcolor=009cff> 
    <td align=right width='100'>��ϵ��ʽ��</td>
    <td>".$tel."</td>
  </tr>
   <tr bgcolor=009cff> 
    <td align=right width='100'>����������</td>
    <td>".$num."</td>
  </tr>  
  <tr bgcolor=009cff> 
    <td align=right width='100'>�����ص㣺</td>
    <td>".$nali."</td>
  </tr>
  <tr bgcolor=009cff> 
    <td align=right width='100'>���屭�ߣ�</td>
    <td>".$beiju."</td>
  </tr>
  <tr bgcolor=009cff> 
    <td align=right width='100'>����ʱ�䣺</td>
    <td>".$time."</td>
  </tr>

</table>
</body>
</html>"; 
require("add.php"); //������ݵ����ݿ�
require("smtp.php"); //SMTP�ʼ�����

$smtpserver = "smtp.163.com";//SMTP������
$smtpserverport = 25;//SMTP�������˿�
$smtpusermail = "danchequnaer@163.com";//SMTP���������û�����
$smtpemailto = "danchequnaer@126.com";//���͸�˭
$smtpuser = "danchequnaer@163.com";//SMTP���������û��ʺ�
$smtppass = "danche";//SMTP���������û�����
$mailsubject = "�������桾����ȥ�Ķ��� ";//�ʼ�����
$mailbody = $stm;//�ʼ�����
$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
$smtp->debug = TRUE;
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
exit; 
?> 
