<?php
//посылаем заголовки
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//вывод в браузер
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем конфигурационный файл
include "./ini.php";
//авторизация
$login = autorize();
//продолжаем вывод в браузер
print '<card title="'.$lang['meets'].'">'.
'<p>';
if($login) {//пользователь авторизирован
	switch($mod) {
	//просмотр встречи
	case 'view':
	//запрос на переданную встречу
	$q = @mysql_query("select * from `".$px.$meettable."` where id='$meetid' order by id desc;");
	//в массив
	$arr = @mysql_fetch_array($q);
	//вывод данных о встречи
	print "<u>".$lang['title'].":</u> ".$arr['title'];
	print "<br/><u>".$lang['content'].":</u> ".$arr['content'];
	print "<br/><u>".$lang['organizators'].":</u> ".$arr['organizatory'];
	print "<br/><u>".$lang['who_add'].":</u> ".$arr['login'];
	break;
	//по умолчанию
	default:
	//запрос на встречи
	$q = @mysql_query("select * from `".$px.$meettable."` order by id desc;");
	//выводим ссылки на встречи
	while($arr = @mysql_fetch_array($q)) {
	print "<a href=\"meets.php?id=$id&amp;pass=$pass&amp;meetid=".$arr['id']."&amp;mod=view\">".$arr['title']."</a><br/>"; }
	break;
	}
	if($mod)
	print "<br/><a href=\"meets.php?id=$id&amp;pass=$pass\">".$lang['letters']."</a>";
	print "<br/><a href=\"./enter.php?id=$id&amp;pass=$pass\">".$lang['holl']."</a><br/>";
	} else { print $lang['not_loged']; }
mysql_close();
ob_end_flush();
?>
</p>
</card>
</wml>
