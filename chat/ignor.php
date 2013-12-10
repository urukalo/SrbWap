<?php
//посылаем заголовки
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//начало wml кода
print '<?xml version="1.0" encoding="utf-8"?>';
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем конфигурационный файл
include "./ini.php";
//авторизация
$login = autorize();
print '<card title="'.$lang['ignor'].'">'.
'<p>';
if($login) {
	//выбираем режим
	switch($mod) {
	case 'del':
	if(@mysql_query("delete from `".$px.$itable."` where id=$delid")) print $lang['done'];
	else print $lang['error'];
	break;
	case 'set':
	//запрос на игнор для пользователя
	$qignor = @mysql_query("select * from `".$px.$itable."` where loginid=".$login['id'].";");
	$idata = @mysql_fetch_array($qignor);
	$qu = @mysql_query("select login from `".$px.$utable."` where id=$whoid;");
	$usr = @mysql_fetch_array($qu);
	//если передан параметр и этот ид не в игноре
	if($whoid&&$usr['login']!=$idata['user']) $add_ignor = @mysql_query("INSERT INTO `".$px.$itable."` VALUES(0, ".$login['id'].", '".$usr['login']."');");
	//пользователь добавлен
	if($add_ignor) print $lang['done'];
	//ошибка добавления
	else print $lang['error'];
	break;
	//по умолчанию
	default:
	//запрос на игнор для пользователя
	$qignor = @mysql_query("select * from `".$px.$itable."` where loginid=".$login['id'].";");
	while($idata = @mysql_fetch_array($qignor)) {
		print '<a href="ignor.php?id='.$login['id'].'&amp;pass='.$login['pass'].'&amp;mod=del&amp;delid='.$idata['id'].'">'.$idata['user'].'</a><br/>';
	}
	break;
	}
	//выводим ссылку в чат
	if($mod) {
	print "<anchor>".$lang['back']."<prev/></anchor><br/>";
	print "<a href=\"ignor.php?id=$id&amp;pass=$pass\">".$lang['ignor']."</a><br/>";
	}
	if($room)
	print "<a href=\"./room.php?id=$id&amp;pass=$pass&amp;room=$room\">".$lang['to_chat']."</a><br/>";
	else
	print "<a href=\"./enter.php?id=$id&amp;pass=$pass\">".$lang['holl']."</a><br/>";
	} else { print $lang['not_loged']; }
//разрываем соединение с базой
@mysql_close();
print '</p>'.
'</card>'.
'</wml>';
ob_end_flush();
?>
