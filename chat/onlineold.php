<?php
//посылаем заголовки
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//начать вывод в браузер
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем файл с конфигурацией
include "./ini.php";
//авторизация
$login = autorize();
//запрос на число онлайн
$q_count = @mysql_query("SELECT count(*) FROM `".$px.$utable."` WHERE ltime>'".intval(time()-$offline)."'");
//в массив
$count = @mysql_fetch_array($q_count);
//продолжаем вывод в браузер
print '<card title="'.$lang['who_online'].' ('.$count['count(*)'].')">'.
'<p>';
	//устанавливаем размер шрифта
	if($login['fsize'] == "small") { $fsize1 = "<small>"; $fsize2 = "</small>"; }
	elseif($login['fsize'] == "big") { $fsize1 = "<big>"; $fsize2 = "</big>"; }
	elseif($login['fsize'] == "verysmall") { $fsize1 = "<small><small>"; $fsize2 = "</small></small>"; }
	else { $fsize1 = ""; $fsize2 = ""; }
	print $fsize1;
	//код вывода ссылок на комнаты
	$q = @mysql_query("select `var`,`val1` from `".$px.$stable."` where mod='room' order by val3;");
	//в цикле печатаем ссылки
	while($droom = @mysql_fetch_array($q)) {
		$q_online = @mysql_query("SELECT `login` FROM `".$px.$utable."` WHERE ltime>'".intval(time()-$offline)."' AND room='".$droom['var']."' order by ltime desc;");
		print '<a href="./room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$droom['var'].'">'.$droom['val1'].'</a>:<br/>';
		while($donline = @mysql_fetch_array($q_online)) { print $donline['login'].", "; }
		print '<br/>';
	}
//запрос на количество онлайн в прихожей
$pr_count = @mysql_query("SELECT count(*) FROM `".$px.$utable."` WHERE ltime>'".intval(time()-$offline)."' AND room='';");
//пихаем в массив
$pdc = @mysql_fetch_array($pr_count);
print "<a href=\"enter.php?id=$id&amp;pass=$pass\">".$lang['holl']." (".$pdc['count(*)'].")</a><br/>";
print $fsize2;
print '</p>'.
'</card>'.
'</wml>';
//разрываем соединение с бд
@mysql_close();
ob_end_flush();
?>
