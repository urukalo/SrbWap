<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print '<?xml version="1.0" encoding="UTF-8"?>'.
'<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем конфигурационный файл
include "ini.php";
//выводим страницу в браузер
print '<card title="'.$lang['title'].'">';

 include("ipban.php");
 
print '<p align="center">';
$r = @rand(0,100000);
//запрос на количество онлайн в прихожей
$pr_count = @mysql_query("SELECT count(*) FROM `".$px.$utable."` WHERE ltime>'".intval(time()-$offline)."';");
//пихаем в массив
$pdc = @mysql_fetch_array($pr_count);
$count = $pdc['count(*)'];
//запрос на число регистраций
$q_regs = @mysql_query("select count(*) from `".$px.$utable."`;");
$nregs = @mysql_fetch_array($q_regs);
//продолжение вывода страницы
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
//разрываем соединение с базой
@mysql_close();
ob_end_flush();
?>