<?php
$r = rand(0,100000);
//���뫠�� ���������
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//�뢮� � ��㧥�
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//����砥� ���䨣��樮��� 䠩�
include "./ini.php";
//���ਧ���
$login = autorize();
//�த������ �뢮� ��࠭���
print '<card title="���뫨��">'.
'<p align="center">';
//�஢�ઠ ������
if(!empty($action)&&!empty($to)&&!empty($from)) {
//���������
$headers .= "From: $from\r\n";
$headers .= "Moby NET - The Best WAP! [ http://mobynet.ru ]\r\n";
//���뫨����
$msg = convert_cyr_string($msg,"a","w");
if(mail($to,$subject,$msg,$headers)) print "<b>��� ᮮ�饭�� �ᯥ譮 ��ࠢ����!</b>";
} else {
print '��:<br/>'.
'<input name="from'.$r.'" value="'.$from.'"/><br/>'.
'����:<br/>'.
'<input name="send'.$r.'" value="'.$to.'"/><br/>'.
'����:<br/>'.
'<input name="subject'.$rand;.'/><br/>'.
'����饭��:<br/>'.
'<input name="message'.$rand.'"/><br/>'.
'<anchor>��ࠢ���<go href="email.php" method="post">'.
'<postfield name="action" value="send"/>'.
'<postfield name="id" value="'.$id.'"/>'.
'<postfield name="pass" value="'.$pass.'"/>'.
'<postfield name="room" value="'.$room.'"/>'.
'<postfield name="to" value="$(send'.$r.')"/>'.
'<postfield name="subject" value="$(subject'.$r.')"/>'.
'<postfield name="message" value="$(message'.$r.')"/>'.
'<postfield name="from" value="$(from'.$r.')"/>'.
'</go></anchor>';
}
//� ��
print "<br/><a href=\"room.php?id=$id&amp;pass=$pass&amp;room=$room\">� ��</a><br/>";
print '</p>'.
'</card>'.
'</wml>';
ob_end_flush();
//ࠧ�뢠�� ᮥ������� � ��
@mysql_close();
?>
