<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print '<?xml version="1.0" encoding="utf-8"?>';
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
include "./ini.php";
print '<card title="Statistic!">'.
'<p>';
$query_users = @mysql_query("select * from `".$px.$utable."` where id='".$id."';");
$q = @mysql_query("select * from `".$px.$utable."` order by posts desc limit 10;");
$q1 = @mysql_query("select * from `".$px.$utable."` where sex='m';");
$q2 = @mysql_query("select * from `".$px.$utable."` where sex='zh';");
$data = @mysql_fetch_array($query_users);
$login = autorize();
if(empty($id))
print "Логин пуст!<br/>";
if($login) {
switch($mod) {
//режим админов
case 'admins':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where admin>0 and moder>0 and login not in ('admin')order by posts desc;");
print "Administrators:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b><a href=\"./user.php?id=$id&amp;pass=$pass&amp;search=1&amp;dblogin=".$arr['login']."\">".$arr['login']."</a> - ".$arr['posts']."<br/>"; }
break;
//режим модеров
case 'moders':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=1 and admin=0;");
print "Vratari:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b><a href=\"./user.php?id=$id&amp;pass=$pass&amp;search=1&amp;dblogin=".$arr['login']."\">".$arr['login']."</a> - ".$arr['posts']."<br/>"; }
break;
//режим киллеров
case 'killers':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=2 and admin=0;");
print "Izbacivaci:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим киллеров
case 'topmoder':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=4 and admin=0;");
print "Top moderators:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b><a href=\"./user.php?id=$id&amp;pass=$pass&amp;search=1&amp;dblogin=".$arr['login']."\">".$arr['login']."</a> - ".$arr['posts']."<br/>"; }
break;
//режим киллеров
case 'shpion':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=3 and admin=0;");
print "Nevidljivi:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; 
//print "<b>$i.</b><a href=\"./user.php?id=$id&amp;pass=$pass&amp;search=1&amp;dblogin=".$arr['login']."\">".$arr['login']."</a> - ".$arr['posts']."<br/>";
 }
break;
//режим статистики умных

//режим самых разговорчивых
case '10top':
$q = @mysql_query("select * from `".$px.$utable."` order by posts desc limit 10;");
print "Top 10:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b><a href=\"./user.php?id=$id&amp;pass=$pass&amp;search=1&amp;dblogin=".$arr['login']."\">".$arr['login']."</a> - ".$arr['posts']."<br/>"; }
break;
//oni koji imaju slicice, po lastlogin poredku
case 'photo':
if (!$strana) $strana=0;
$q = @mysql_query("SELECT * FROM `".$px.$utable."` WHERE photo LIKE '%/%'  ORDER BY `ltime`  DESC limit ".($strana*10).", 10;");
print "Random 10 profila sa slikama(online sort):<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>".($strana*10+$i).".</b><a href=\"./user.php?id=$id&amp;pass=$pass&amp;search=1&amp;dblogin=".$arr['login']."\">".$arr['login']."</a> - <a href=\"".$arr['photo']."\">slika</a><br/>"; }
if ($i) print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=photo&amp;strana=".($strana+1)."\">..jos</a><br/><br/><a href=\"./help.php?id=$id&amp;pass=$pass&amp;mod=photo\">".$lang['how_add_photo']."</a><br/>";
 else print "Nema vise";
break;
case 'online':
if (!$strana) $strana=0;
$q = @mysql_query("SELECT * FROM `".$px.$utable."` ORDER BY `ltime`  DESC limit ".($strana*10).", 10;");
print "Poslednji Put online:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>".($strana*10+$i).".</b><a href=\"./user.php?id=$id&amp;pass=$pass&amp;search=1&amp;dblogin=".$arr['login']."\">".$arr['login']."</a> - [".date("d-m H:i", $arr['ltime'])."]<br/>"; }
if ($i) print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=online&amp;strana=".($strana+1)."\">..jos</a><br/><br/>";
 else print "Nema vise";
break;
case 'login':
if (!$strana) $strana=0;
$q = @mysql_query("SELECT * FROM `".$px.$utable."` ORDER BY `rtime`  DESC limit ".($strana*10).", 10;");
print "Novi nickovi:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>".($strana*10+$i).".</b><a href=\"./user.php?id=$id&amp;pass=$pass&amp;search=1&amp;dblogin=".$arr['login']."\">".$arr['login']."</a> - ".$arr['name'];
if ($login['moder'])print "<br/>[".$arr['ip']." - ".substr($arr['soft'],0,15); print "]<br/>";  }
if ($i) print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=login&amp;strana=".($strana+1)."\">..jos</a><br/><br/>";
 else print "Nema vise";
break;
//по умолчанию
default:
print "Males - Muskih  chatera: ".@mysql_num_rows($q1)." <br/>";
print "Females - Zenskih chatera: ".@mysql_num_rows($q2)." <br/><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=admins\">Administratori</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=topmoder\">Top urednici</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=moders\">Urednici</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=killers\">Izbacivaci</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=shpion\">Nevidljivi</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=10top\">Top 10 chatera</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=photo\">Profili sa slikama</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=login\">Novi Clanovi</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=online\">Online poredak</a><br/><br/>";
break;
}
if($mod)
print "<br/><a href=\"statistic.php?id=$id&amp;pass=$pass\">Statistic</a><br/>";
if($room)
print "<a href=\"room.php?id=$id&amp;pass=$pass&amp;room=$room\">Back to chat</a><br/>";
else
print "<a href=\"enter.php?id=$id&amp;pass=$pass\">Back</a><br/>";
	} else { print $lang['not_loged']; }
//разрываем соединение с базой
@mysql_close();
print '</p>'.
'</card>'.
'</wml>';
ob_end_flush();
?>
