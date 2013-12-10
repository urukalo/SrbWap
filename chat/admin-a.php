<?php

Error_Reporting(E_ALL & ~E_NOTICE);
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
print '<card title="'.$lang['admining'].'">'.
'<p align="center">';
if($login&&$login['admin']) {
	//запрашиваем пользователя по ид
	$q = @mysql_query("select * from `".$px.$utable."` where `id`='".$whoid."';");
	//пихаем все в массив
	$dbuser = @mysql_fetch_array($q);
	//выбираем режим
	switch($mod) {
	//режим 'сделать модером'
	case 'makemoder':
	if(@mysql_query("update `".$px.$utable."` set `moder`=1 where `id`='".$whoid."';")) {
		print "<b><u>".$dbuser['login']."</u></b>".$lang['is_moder']; }
	break;
	case 'delmoder':
	if(@mysql_query("update `".$px.$utable."` set `moder`=0 where `id`='".$whoid."';")) {
		print "<b><u>".$dbuser['login']."</u></b>".$lang['is_not_moder']; }
	break;
	//режим 'сделать киллером'
	case 'makekiller':
	if(@mysql_query("update `".$px.$utable."` set `moder`=2 where `id`='".$whoid."';")) {
		print "<b><u>".$dbuser['login']."</u></b>".$lang['is_killer']; }
	break;
	case 'delkiller':
	if(@mysql_query("update `".$px.$utable."` set `moder`=0 where `id`='".$whoid."';")) {
		print "<b><u>".$dbuser['login']."</u></b>".$lang['is_not_killer']; }
	break;
	case 'maketopmoder':
	if(@mysql_query("update `".$px.$utable."` set `moder`=4 where `id`='".$whoid."';")) {
		print "<b><u>".$dbuser['login']."</u></b>".$lang['is_topmoder']; }
	break;
	case 'deltopmoder':
	if(@mysql_query("update `".$px.$utable."` set `moder`=0 where `id`='".$whoid."';")) {
		print "<b><u>".$dbuser['login']."</u></b>".$lang['is_not_topmoder']; }
	break;
	case 'makeshpion':
	if(@mysql_query("update `".$px.$utable."` set `moder`=3 where `id`='".$whoid."';")) {
		print "<b><u>".$dbuser['login']."</u></b>".$lang['is_shpion']; }
	break;
	case 'delshpion':
	if(@mysql_query("update `".$px.$utable."` set `moder`=0 where `id`='".$whoid."';")) {
		print "<b><u>".$dbuser['login']."</u></b>".$lang['is_not_shpion']; }
	break;
	//режим удаления
	case 'del':
	//если действие не путо, удаляем, иначе запрашиваем подтверждение
	if(!empty($act)) {
	if(mysql_query("delete from `".$px.$utable."` where `id`='$whoid';"))
		print "<b><u>".$dbuser['login']."</u></b>".$lang['deleted'];
	} else {
	print "<b>".$lang['do_ypu_want']."<anchor>".$lang['delete']."<go href=\"$PHP_SELF?act=del&amp;id=$id&amp;pass=$pass&amp;whoid=$whoid&amp;room=$room&amp;mod=$mod\" method=\"get\"/></anchor>".$lang['this_user']."</b><br/>";
	}
	break;
	//режим изменения фото
	case 'photo':
	if(empty($act)) {
	print $lang['who'].":<br/><input name=\"who\"/><br/>
	".$lang['link'].":<br/><input name=\"link\" value=\"photos/\"/><br/>
	<anchor>".$lang['ok']."<go href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\">
	<postfield name=\"act\" value=\"add\"/>
	<postfield name=\"who\" value=\"$(who)\"/>
	<postfield name=\"link\" value=\"$(link)\"/>
	</go></anchor><br/>"; } else {
	if(@mysql_query("update `".$px.$utable."` set `photo`='$link' where `login`='$who'")) print $lang['done'];
	else print $lang['error']; }
	break;
	//режим установки статуса
	case 'setstatus':
	if(empty($act)) {
	print $lang['who'].":<br/><input name=\"who\" value=\"$who\"/><br/>
	".$lang['status'].":<br/><input name=\"status\" value=\"".$data['status']."\"/><br/>
	<anchor>".$lang['ok']."<go href=\"?id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\">
	<postfield name=\"act\" value=\"set\"/>
	<postfield name=\"who\" value=\"$(who)\"/>
	<postfield name=\"status\" value=\"$(status)\"/>
	</go></anchor><br/>"; } else {
	//запрос в базу
	if(@mysql_query("update `".$px.$utable."` set `status`='$status' where `login`='$who'")) print $lang['done'];
	else print $lang['error'];
	}
	break;
	//режим чистки комнат
	case 'delmsgs':
	if(@mysql_query("TRUNCATE TABLE `".$px.$mtable."`")&&@mysql_query("TRUNCATE TABLE `".$px.$vtable."`")) print $lang['done'];
	else print $lang['error'];
	break;
	//режим оптимизации
	case 'optimize':
	if(@mysql_query("OPTIMIZE TSBLE `".$px.$mtable."`")&&
		@mysql_query("OPTIMIZE TSBLE `".$px.$stable."`")&&
		@mysql_query("OPTIMIZE TSBLE `".$px.$vtable."`")&&
		@mysql_query("OPTIMIZE TSBLE `".$px.$itable."`")&&
		@mysql_query("OPTIMIZE TSBLE `".$px.$utable."`")&&
		@mysql_query("OPTIMIZE TSBLE `".$px.$ltable."`")&&
		@mysql_query("OPTIMIZE TSBLE `".$px.$meettable."`"))
	print $lang['done'];
	else print $lang['optimized'];
	break;
	//режим чистки писем
	case 'delltrs':
	if(@mysql_query("TRUNCATE TABLE `".$px.$ltable."`;")) print $lang['done'];
	else print $lang['done'];
	break;
	//режим редактировать комнату
	case 'editnameroom':
	if(empty($act)) {
	print $lang['title']."<br/><input type=\"text\" name=\"t\"/><br/>".$lang['room']."<br/><select name=\"name\">";
	$q = @mysql_query("select * from `".$px.$stable."` where `mod`='room';");
	while ($dbdata = @mysql_fetch_array($q)) {
	print "<option value=\"".$dbdata['var']."\">".$dbdata['val1']."</option>"; }
	print "</select><br/>
	<anchor>".$lang['ok']."<go href=\"$PHP_SELF?act=update&amp;id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\"><postfield name=\"name\" value=\"$(name)\"/><postfield name=\"t\" value=\"$(t)\"/></go></anchor><br/>";
	} else {
	$t=htmlspecialchars(stripslashes(trim(substr($t,0,50))));
	if(@mysql_query("update `".$px.$stable."` set `val1`='$t' where `var`='$name' and `mod`='room';")) print $lang['done'];
	}
	break;
	//редактировать положение комнаты
	case 'editposroom':
	if(empty($act)) {
	print $lang['pos']."<br/><input size=\"2\" name=\"pos\" format=\"*N\"/>
			<br/>".$lang['room']."<br/><select name=\"name\">";
	$q = @mysql_query("select * from `".$px.$stable."` where `mod`='room';");
	while ($dbdata = @mysql_fetch_array($q)) {
	print "<option value=\"".$dbdata['var']."\">".$dbdata['val1']."</option>"; }
	print "</select><br/>
	<anchor>".$lang['ok']."<go href=\"$PHP_SELF?act=update&amp;id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\"><postfield name=\"name\" value=\"$(name)\"/><postfield name=\"pos\" value=\"$(pos)\"/></go></anchor><br/>";
	} else {
	//обрабатываем полученные данные
	$pos=htmlspecialchars(stripslashes(trim(substr($pos,0,50))));
	//делаем запрос в бд
	if(@mysql_query("update `".$px.$stable."` set `val3`='$pos' where `var`='$name' and `mod`='room';")) print $lang['done'];
	}
	break;
	//узнать пароль
	case 'getpass':
	if(empty($act)) {
	print $lang['login']."<br/><input type=\"text\" name=\"user\"/><br/>";
	print "<anchor>".$lang['ok']."<go href=\"?act=update&amp;id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\"><postfield name=\"user\" value=\"$(user)\"/></go></anchor><br/>";
	} else {
	//обрабатываем полученные данные
	$user = htmlspecialchars(stripslashes(trim(substr($user,0,50))));
	//делаем запрос в бд
	$q = @mysql_query("select pass from `".$px.$utable."` where `login`='$user' limit 1;");
	$duser = @mysql_fetch_array($q);
	if($duser) print "<b>".$lang['pass_of_user']."$user - ".$duser['pass']."!</b><br/>";
	else print $lang['user_not_exist'];
	}
	break;
	//создать комнату
	case 'createroom':
	if(empty($act)) {
	print $lang['title']."<br/><input type=\"text\" name=\"name\"/><br/>";
	print $lang['head']."<br/><input type=\"text\" name=\"t\"/><br/>";
	print $lang['pos']."<br/><input size=\"2\" name=\"pos\" format=\"*N\"/><br/>";
	print "<anchor>".$lang['ok']."<go href=\"$PHP_SELF?act=update&amp;id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\"><postfield name=\"name\" value=\"$(name)\"/><postfield name=\"t\" value=\"$(t)\"/><postfield name=\"pos\" value=\"$(pos)\"/></go></anchor><br/>";
	} else {
	$query = @mysql_query("select * from `".$px.$stable."` where `mod`='room' order by id desc;");
	$db = @mysql_fetch_array($query);
	$ex = intval(substr($db['var'], 4));
	$i = $ex + 1;
	$name=htmlspecialchars(stripslashes(trim(substr($name,0,50))));
	$t=htmlspecialchars(stripslashes(trim(substr($t,0,50))));
	$pos=htmlspecialchars(stripslashes(trim(substr($pos,0,10))));
	if(@mysql_query("insert into `".$px.$stable."` values(0, 'room', 'room".$i."', '$name', '$t', '$pos');")) print $lang['done'];
	}
	break;
	//╨╕╨╖╨╝╨╡╨╜╨╡╨╜╨╕╨╡ ╨╖╨░╨│╨╛╨╗╨╛╨▓╨║╨░
	case 'title':
	if(empty($act)) {
	print $lang['head']."<br/><input type=\"text\" name=\"t\"/><br/>".$lang['room']."<br/><select name=\"name\">";
	$q = @mysql_query("select * from `".$px.$stable."` where `mod`='room';");
	while ($dbdata = @mysql_fetch_array($q)) {
	print "<option value=\"".$dbdata['var']."\">".$dbdata['val1']."</option>"; }
	print "</select><br/>
	<anchor>╨Ш╨╖╨╝╨╡╨╜╨╕╤В╤М<go href=\"moder.php?act=update&amp;id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\"><postfield name=\"name\" value=\"$(name)\"/><postfield name=\"t\" value=\"$(t)\"/></go></anchor><br/>";
	} else {
	$t=htmlspecialchars(stripslashes(trim(substr($t,0,25))));
	if(@mysql_query("update `".$px.$stable."` set `val2`='$t' where `var`='$name' and `mod`='room';")) print $lang['done'];
	}
	break;
	//редактируем ник
	case 'editnik':
	if(empty($act)) {
	print $lang['old_nick']."<br/><input type=\"text\" name=\"old\"/><br/>";
	print $lang['new_nick']."<br/><input type=\"text\" name=\"new\"/><br/>";
	print "<anchor>".$lang['ok']."<go href=\"?act=update&amp;id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\"><postfield name=\"old\" value=\"$(old)\"/><postfield name=\"new\" value=\"$(new)\"/></go></anchor><br/>";
	} else {
	$q = @mysql_query("select * from `".$px.$utable."` where `login`='$new' limit 1;");
	$ud = @mysql_fetch_array($q);
	if($ud['id']) { print $lang['such_nick_exist']; } else {
	if(@mysql_query("update `".$px.$utable."` set `login`='$new' where `login`='$old';")) print $lang['done'];
	else print $lang['user_not_exist']; }
	}
	break;
	//удалить комнату
	case 'delroom':
	if(empty($act)) {
	print $lang['room']."<br/><select name=\"name\">";
	$q = @mysql_query("select * from `".$px.$stable."` where `mod`='room';");
	while ($dbdata = @mysql_fetch_array($q)) {
	print "<option value=\"".$dbdata['var']."\">".$dbdata['val1']."</option>"; }
	print "</select><br/>
	<anchor>".$lang['delete']."<go href=\"?act=del&amp;id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\"><postfield name=\"name\" value=\"$(name)\"/></go></anchor><br/>";
	} else {
	//делаем запрос в бд
	if(@mysql_query("delete from `".$px.$stable."` where `var`='$name' and `mod`='room';")) print $lang['done'];
	}
	break;
	//по умолчанию
	default:
	print "<small><a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=editnameroom\">".$lang['change_rtitle']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=title\">".$lang['change_head']."</a><br/>";
	print "<a href=\"./moder.php?id=$id&amp;pass=$pass&amp;mod=unlock\">Otkljucaj nick</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=editposroom\">".$lang['change_pos']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=createroom\">".$lang['create_room']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=delroom\">".$lang['delete_room']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=photo\">".$lang['add_photo']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=getpass\">".$lang['view_pass']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=editnik\">".$lang['change_login']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=setstatus\">".$lang['change_status']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=delmsgs\">".$lang['empty_rooms']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=delltrs\">".$lang['empty_letters']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=optimize\">".$lang['optimize']."</a><br/>";
	
	
//	if($login['admin']) print "<a href=\"./bombapwt.php?id=$id&amp;pass=$pass\">Vidi pwt</a>";
	print "</small><br/>$divide";
	
	break;
	}
	//выводим ссылку в чат
	if($mod) {
	print "<anchor>".$lang['back']."<prev/></anchor><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass\">".$lang['admining']."</a><br/>";
	}
	if($room)
	print "<a href=\"./room.php?id=$id&amp;pass=$pass&amp;room=$room\">".$lang['to_chat']."</a><br/>";
	else
	print "<a href=\"./enter.php?id=$id&amp;pass=$pass\">".$lang['holl']."</a><br/>";
	} else { print $lang['access_denied']; }
//разрываем соединение с базой
@mysql_close();
print '</p>'.
'</card>'.
'</wml>';
ob_end_flush();
?>
