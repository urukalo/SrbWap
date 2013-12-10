<?php
$r=rand(0,10000);
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//вывод страницы в браузер
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем конфигурационный файл
include "./ini.php";
//посылаем в базу запросы
$query_settings = @mysql_query("select * from `".$px.$stable."` where var='$room' and mod='room';");
//запрос в массив
$settings = @mysql_fetch_array($query_settings);
//текущее время
$timenow = strftime("%H:%M");
//авторизация
$login = autorize();
//вытаскиваем необходимые данные из бд
$num_msgs = $login['nmsgs'];
$time_update = $login['tupdate'];
if(empty($num_msgs)) $num_msgs = 5;
if(empty($time_update)) $time_update = 300;
if($mod=="privat")
print '<card id="main" title="'.$settings['val2'].'-'.$timenow.'" ontimer="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;mod=privat&amp;r='.$r.'"><timer value="'.$time_update.'"/>';
else
print '<card id="main" title="'.$settings['val2'].'-'.$timenow.'" ontimer="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'"><timer value="'.$time_update.'"/>';
print '<do type="options" name="update" label="'.$lang['update'].'"><go href="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'" method="get"/></do>'.
'<do type="options" name="say" label="'.$lang['say'].'"><go href="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'#say" method="get"/></do>'.
'<do type="options" name="whowhere" label="'.$lang['who_online'].'"><go href="online.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'" method="get"/></do>'.
'<p>';
//если ничего не переданно, то это начальный отсчет
if(empty($start)) $start = 0;
$start=intval($start);
if($start<0) $start=0;
//запрос в базу на сообщения
if($room=="vict") {
$arr = @mysql_query("select * from `".$px.$vtable."` WHERE (pr_to = '' AND pr_from = '') OR (pr_from = '".$login['login']."' OR pr_to = '".$login['login']."') order by time desc;");
$que = @mysql_query("select * from `".$px.$vtable."` WHERE (pr_to = '' AND pr_from = '') OR (pr_from = '".$login['login']."' OR pr_to = '".$login['login']."') order by time desc limit $start,$num_msgs;");
} else {
$arr = @mysql_query("select * from `".$px.$mtable."` WHERE room = '$room' AND ((pr_to = '' AND pr_from = '') OR (pr_from = '".$login['login']."' OR pr_to = '".$login['login']."')) order by time desc;");
$que = @mysql_query("select * from `".$px.$mtable."` WHERE room = '$room' AND ((pr_to = '' AND pr_from = '') OR (pr_from = '".$login['login']."' OR pr_to = '".$login['login']."')) order by time desc limit $start,$num_msgs;");
}
//количество всех сообщений
$i = @mysql_num_rows($arr);
//печатаем ссылки
print "<small><a href=\"room.php?id=$id&amp;pass=$pass&amp;room=$room&amp;ref=$rand\">".$lang['update']."</a></small><br/>";
print '<small><a href="history.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;mod=privat&amp;r='.$r.'">'.$lang['privat'].'</a></small><br/>';
print "<small><anchor>".$lang['say']."<go href=\"room.php?id=$id&amp;pass=$pass&amp;room=$room&amp;ref=$rand#say\" method=\"get\"/></anchor></small>";
//выводим сообщения в цикле
while($data = @mysql_fetch_array($que)) {
	//необходимые данные
	$dblogin = $data['login'];
	$dbmsg = $data['msg'];
	$dbtime = date("H.i", $data['time']);
	$pr_to = $data['pr_to'];
	$pr_from = $data['pr_from'];
//запрос в базу данных
$qdblogin = @mysql_query("select * from `".$px.$utable."` where login='$dblogin'");
//кидаем в массив
$db = @mysql_fetch_array($qdblogin);
if(!empty($pr_to)&&!empty($pr_from)) print "<br/><b><a href=\"user.php?id=$id&amp;pass=$pass&amp;room=$room&amp;dbid=".$db['id']."&amp;r=$r\">$dblogin</a>[!]</b>&nbsp;[$dbtime]<br/>$dbmsg";
else
print "<br/><small><b><a href=\"user.php?id=$id&amp;pass=$pass&amp;room=$room&amp;dbid=".$db['id']."&amp;r=$r\">$dblogin</a></b>&nbsp;[$dbtime]</small><br/><small>$dbmsg</small>";
}
if($start!=0)
print "<br/><small><a href=\"history.php?id=$id&amp;pass=$pass&amp;room=$room&amp;mod=$mod&amp;r=$r&amp;start=".($start-$num_msgs)."\">".htmlspecialchars("<<<")."</a></small>";
if($i>$start+$num_msgs)
print "<br/><small><a href=\"history.php?id=$id&amp;pass=$pass&amp;room=$room&amp;mod=$mod&amp;r=$r&amp;start=".($start+$num_msgs)."\">".htmlspecialchars(">>>")."</a></small>";
print "<br/><small><a href=\"enter.php?id=$id&amp;pass=$pass\">".$lang['holl']."</a></small><br/>";
print '</p>'.
'</card>'.
'</wml>';
ob_end_flush();
//разрываем соединение с бд
@mysql_close();
?>