<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print '<?xml version="1.0" encoding="UTF-8"?>'.
'<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//����砥� ���䨣��樮��� 䠩�
include "ini.php";
//�뢮��� ��࠭��� � ��㧥�
print '<card title="'.$lang['title'].'">';

 include("ipban.php");
 
print '<p align="center">';
$r = @rand(0,100000);
//����� �� ������⢮ ������ � ��宦��
$pr_count = @mysql_query("SELECT count(*) FROM `".$px.$utable."` WHERE ltime>'".intval(time()-$offline)."';");
//��堥� � ���ᨢ
$pdc = @mysql_fetch_array($pr_count);
$count = $pdc['count(*)'];
//����� �� �᫮ ॣ����権
$q_regs = @mysql_query("select count(*) from `".$px.$utable."`;");
$nregs = @mysql_fetch_array($q_regs);
//�த������� �뢮�� ��࠭���
//print '<a href="http://seclub.org/?uid=219">['.$lang['vote'].']</a><br/>';
print $lang['welcome'].'<b>Dobrodosli</b><br/>'.
''.$lang['in_the_chat'].$count.'<br/><small>Bukmarkujte ovu stranicu</small><br/>'.
''.$lang['login'].':<br/>'.
'<input type="text" name="login"/><br/>'.
'<small>'.$lang['pass'].':</small><br/>'.
'<input type="password" name="pass'.$r.'"/><br/>'.
'<small><anchor title="go">'.$lang['enter'].'<go href="enter.php" method="post">'.
'<postfield name="login" value="$(login)"/>'.
'<postfield name="pass" value="$(pass'.$r.')"/>'.
'</go>'.
'</anchor>'.
'<br/><a href="./reg.wml">'.$lang['reg'].'</a>'.
'<br/>-----'.
'<br/>-----'.
'<br/>'.$lang['regs'].': '.$nregs['count(*)'].
'<br/>-----'.
'<br/><a href="http://wap.srb.co.yu">'.$lang['main'].'</a>'.
'</small><br/>';
print '</p></card></wml>';
//ࠧ�뢠�� ᮥ������� � �����
@mysql_close();
ob_end_flush();
?>