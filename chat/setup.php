<?php
//посылаем заголовки
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//начало вывода в браузер страницы
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем конфигурационный файл
include "./ini.php";
//авторизация
$login = autorize();
print '<card title="Setup">'.
'<p>';
//если пользователь авторизирован
if($login) {
if(empty($action)) {
//выводим страницу в браузер
print 'Broj poruka na stranici:<br/>'.
'<input name="num_msgs" maxlength="10" value="'.$login['nmsgs'].'" format="*N"/>'.
'<br/>'.
'Vreme osvezavanja u milisekundama (10msec = 1sec):<br/>'.
'<input name="time_update" maxlength="10" value="'.$login['tupdate'].'" format="*N"/>'.
'<br/>'.
'Velicina Slova:<br/>'.
'<select name="fsize" value="'.$login['fsize'].'">'.
'<option value="small">Mala</option>'.
'<option value="medium">Normalna</option>'.
'<option value="big">Velika</option>'.
'</select><br/>'.
'Iskljuci Prikaz Smajlija:<br/>'.
'<select name="smiles" value="'.$login['smiles'].'">'.
'<option value="0">Ne</option>'.
'<option value="1">Da</option>'.
'</select><br/>'.
'Ukljuci zastitu nicka:<br/>'.
'<select name="safe" value="'.$login['safe'].'">'.
'<option value="1">Da</option>'.
'<option value="2">Ne</option>'.
'</select><br/>'.
'Prikazi Moju sliku u profilu:<br/>'.
'<select name="img" value="'.$login['img'].'">'.
'<option value="0">Da</option>'.
'<option value="1">Ne</option>'.
'</select><br/><br/>'.
'<anchor>Update<go href="setup.php?id='.$id.'&amp;pass='.$pass.'" method="post">'.
'<postfield name="action" value="update"/>'.
'<postfield name="time_update" value="$(time_update)"/>'.
'<postfield name="num_msgs" value="$(num_msgs)"/>'.
'<postfield name="fsize" value="$(fsize)"/>'.
'<postfield name="smiles" value="$(smiles)"/>'.
'<postfield name="safe" value="$(safe)"/>'.
'<postfield name="img" value="$(img)"/>'.
'</go></anchor><br/>';
}
else
{
	if(empty($num_msgs)) $num_msgs = 5;
	if(empty($time_update)) $time_update = 300;
	//Обрабатываем данные
	$num_msgs = htmlspecialchars(intval(substr($num_msgs,0,10)));
	$time_update = htmlspecialchars(intval(substr($time_update,0,10)));
	//посылаем запрос
	$query = @mysql_query("update `".$px.$utable."` set nmsgs='".$num_msgs."', tupdate='".$time_update."', fsize='".$fsize."', smiles='".$smiles."', safe='".$safe."', img='".$img."' where id='".$id."';");
	if($query) print "<b>Podesavanja za Vas profil su izmenjena!</b><br/>";
}
print "<a href=\"enter.php?id=$id&amp;pass=$pass\">Menu</a>";
} else { print "Error!"; }
print '</p></card></wml>';
//разрыв соединения с базой
@mysql_close();
ob_end_flush();
?>