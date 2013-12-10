<?php
$r = rand(0,100000);
//посылаем заголовки
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//вывод в браузер
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем конфигурационный файл
include "./ini.php";
//авторизация
$login = autorize();
//продолжаем вывод страницы
print '<card title="Намылить">'.
'<p align="center">';
//проверка данных
if(!empty($action)&&!empty($to)&&!empty($from)) {
//заголовки
$headers .= "From: $from\r\n";
$headers .= "Moby NET - The Best WAP! [ http://mobynet.ru ]\r\n";
//намыливаем
$msg = convert_cyr_string($msg,"a","w");
if(mail($to,$subject,$msg,$headers)) print "<b>Ваше сообщение успешно отправлено!</b>";
} else {
print 'От:<br/>'.
'<input name="from'.$r.'" value="'.$from.'"/><br/>'.
'Кому:<br/>'.
'<input name="send'.$r.'" value="'.$to.'"/><br/>'.
'Тема:<br/>'.
'<input name="subject'.$rand;.'/><br/>'.
'Сообщение:<br/>'.
'<input name="message'.$rand.'"/><br/>'.
'<anchor>Оправить<go href="email.php" method="post">'.
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
//в чат
print "<br/><a href=\"room.php?id=$id&amp;pass=$pass&amp;room=$room\">В чат</a><br/>";
print '</p>'.
'</card>'.
'</wml>';
ob_end_flush();
//разрываем соединение с бд
@mysql_close();
?>
