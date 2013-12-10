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
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим модеров
case 'moders':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=1 and admin=0;");
print "Moderators:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим киллеров
case 'killers':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=2 and admin=0;");
print "Killers - Banovani:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим киллеров
case 'topmoder':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=4 and admin=0;");
print "Top moderators:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим киллеров
case 'shpion':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=3 and admin=0;");
print "Spyes - Spijuni:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим статистики умных

//режим самых разговорчивых
case '10top':
$q = @mysql_query("select * from `".$px.$utable."` order by posts desc limit 10;");
print "Top 10 chaters:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//по умолчанию
default:
print "Males - Muskih  chatera: ".@mysql_num_rows($q1)." <br/>";
print "Females - Zenskih chatera: ".@mysql_num_rows($q2)." <br/><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=admins\">Admins</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=moders\">Moderators</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=killers\">Killers - Banovani</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=shpion\">Spyes - Spijuni</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=topmoder\">Top moderators</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=10top\">Top 10 chaters</a><br/><br/>";

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
