<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print '<?xml version="1.0" encoding="utf-8"?>';
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем файл конфигурации
include "./ini.php";
print '<card title="'.$lang['holl'].'">'.
'<p align="center">';
echo $lang['welcome']."<br/>";
//echo "<b>Ovo je chat bez pravila, ulazis na sopstvenu odgovornost!!</b><br/><i>Vise detalja pronadji u rubrici novosti</i><br/>";
$query_settings = @mysql_query("select `val1`,`val2`,`val3` from `".$px.$stable."` where `mod`='info';");
//запрос в массив
$settings = @mysql_fetch_array($query_settings);
echo "<b>Novosti:</b><br/>".$settings['val1']."[".date("d.m.y",$settings['val3'])."]:<br/><i>".$settings['val2']."</i><br/>
<br/>----<br/><a href=\"mia.wml\">Posveta</a> <br/>----<br/>";
//достаем из базы пользовательские настройки
//echo "Samo za odabrane!!<br/>---------<br/>";
//echo "<b>Bitno:</b> zbog radova na telenor mrezi, skinuta je zastita svima koji koriste istu<br/>---------<br/>";
//echo "<b>DA SE NE ZABORAVI<br/>Hrvatsko etnicko ciscenje Republike Srpske Krajine<br/>12ta godina<br/></b>";
//echo "<b>CHAT JE ISKLJUCEN</b><br/><i>info: chat sigurno nece raditi narednih 15 dana<br/>molim sve koji imaju zelje i savete kako bi chat trebao da izgleda da mi se jave na srbwap@gmail.com</i><br/> ..Milan<br/>---------<br/>";
if(!empty($login))
$q = @mysql_query("select `id` from `".$px.$utable."` where `login`='".$login."';");
if(empty($id)) {
//запрос в массив
$data = @mysql_fetch_array($q);
//ид пользователя
$id = $data['id']; 
}
//авторизация
$login = autorize();
if($login) {
 
 	// UA - IP check
	if(!$login['ip']) { @mysql_query("update `".$px.$utable."` set `ip`='".getenv(REMOTE_ADDR)."' where `id`='".$id."';"); }
	if(!$login['soft']) { @mysql_query("update `".$px.$utable."` set `soft`='".getenv(HTTP_USER_AGENT)."' where `id`='".$id."';"); }
	// Provera UA i IP-a
	if ($login['soft']!==$HTTP_USER_AGENT || $login['ip']!==$REMOTE_ADDR){
	 if ($login["safe"]==1){
		echo "<big><b>Pristup na ovaj nick nije dozvoljen sa vasim modelom telefona!</b>";
		echo "</big></p></card></wml>";
		exit;
	 } 
	 else {
	echo "<small>Vas model telefona je razlicit od modela koji je pristupio ovom nicku poslednji put!<br/>Telefon i  IP adresa sa kojim je pristupano vasem nicku:<br/>Telefon: ".$login['soft']."<br/>IP: ".$login['ip']." <br/><a href=\"./setup.php?id=$id&amp;pass=$pass\">Ukljucite zastitu</a> za vas nick<br/><br/>Upravo je Vas model telefona upisan u Vas profil, prijatno</small><br/>";  		
	  mysql_query("update `".$px.$utable."` set `ip`='".getenv(REMOTE_ADDR)."', `soft`='".getenv(HTTP_USER_AGENT)."' where `id`='".$id."';");
	  }
	}
	if ($login["safe"]==0) echo "<small>Vas nick nije zasticen, <a href=\"./setup.php?id=$id&amp;id=$id&amp;pass=$pass\">ukljucite zastitu</a></small><br/>";
	//устанавливаем размер шрифта
	if($login['fsize'] == "small") { $fsize1 = "<small>"; $fsize2 = "</small>"; }
	elseif($login['fsize'] == "big") { $fsize1 = "<big>"; $fsize2 = "</big>"; }
	else { $fsize1 = ""; $fsize2 = ""; }
	print $fsize1;
	
	ustatus();	//обновляем статусы

$ltime = $login['ltime'];
$ban = $login['ban'];
$btime = $login['btime'];
$breason = $login['breason'];

if($ban == "kill") {print $lang['you_are_killed'];print "</small></p></card></wml>"; exit;}
  elseif(!empty($ban)) {
    if($btime >= time()) {
	$enter = $btime - time();
	print "<b>$ban ".$lang['kick_you'].$lang['reason'].": $breason! ".$lang['unban']."<u>".$enter."</u>".$lang['s']."!</b><br/>";
print "</small></p></card></wml>"; exit;
	} 
else  
	@mysql_query("update `".$px.$utable."` set `ban`='', `btime`='', `breason`='' where `id`='".$id."';");
}

	@mysql_query("update `".$px.$utable."` set `ltime`='".time()."', `room`='$room' where `id`='".$id."';");
	$q_letters_in = @mysql_query("select count(*) from `".$px.$ltable."` where `to_user`='".$login['login']."' and `new`=1;");
	$num_in=@mysql_fetch_array($q_letters_in);	//узнаем количество входящих новых писем
	$q_letters_in_all = @mysql_query("select count(*) from `".$px.$ltable."` where `to_user`='".$login['login']."'");
	$num_in_all=@mysql_fetch_array($q_letters_in_all);	//узнаем количество входящих писем
	//если пользователь админ
	if($login['admin']) print "<a href=\"./admin.php?id=$id&amp;pass=$pass\">".$lang['admining']."</a><br/>$divide";
	//если пользователь модер
	if($login['moder']) {print "<a href=\"./moder.php?id=$id&amp;pass=$pass\">".$lang['modering']."</a><br/><a href=\"./help.php?id=$id&amp;pass=$pass&amp;mod=modrules\">Pravila ".$lang['modering']."</a><br/>$divide";}
	///////////////////////////////////////////////////////
	$q_num_meets = @mysql_query("select count(*) from `".$px.$meettable."` where 1");
	$num_meets=@mysql_fetch_array($q_num_meets);	//узнаем количество встреч
	//print '<b><a href="new.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['marryed'].'</a></b><br/>';
	print "<a href=\"help.php?id=$id&amp;pass=$pass&amp;mod=rules\">".$lang['rules']."</a><br/>";
	print '<a href="./letters/index.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['letters'].'('.$num_in['count(*)'].'/'.$num_in_all['count(*)'].')</a><br/>'.
	'<a href="./meets.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['meets'].'('.$num_meets['count(*)'].')</a><br/>'.

    
 //   '<a href="http://bombash011.peperonity.com">Slike chatera</a><br/>'.
	$divide;
	//код вывода ссылок на комнаты
	$q = @mysql_query("select `var`,`val1` from `".$px.$stable."` where `mod`='room' order by val3;");
	//в цикле печатаем ссылки
	while($droom = @mysql_fetch_array($q)) {
		$q_count = @mysql_query("SELECT count(*) FROM `".$px.$utable."` WHERE `ltime`>'".intval(time()-$offline)."' AND `room`='".$droom['var']."';");
		$dcount = @mysql_fetch_array($q_count);
		if ($droom['var']!="room1") 
		print '<a href="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$droom['var'].'">'.$droom['val1'].'('.$dcount['count(*)'].')</a><br/>';
		elseif ($login['moder']) print '<a href="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$droom['var'].'">'.$droom['val1'].'('.$dcount['count(*)'].')</a><br/>';
	}
	print $divide.
	'<a href="./online.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['who_online'].'</a><br/>'.   
	'<a href="./ignor.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['ignor'].'</a><br/>'.
	'<a href="./profile.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['profile'].'</a><br/>'.
	'<a href="./setup.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['settings'].'</a><br/>'.$divide;
	
	
print
	'<a href="./search.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['search'].'</a><br/>'.
 
	'<a href="./help.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['help'].'</a><br/>'.
	'<a href="./statistic.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['stats'].'</a><br/>'.
'<a href="./statistic.php?id='.$id.'&amp;pass='.$pass.'&amp;mod=photo">'.$lang['pic'].'</a><br/>';
	
		print "<a href=\"./sm/index.php?id=$id&amp;pass=$pass&amp;mod=smiles\">".$lang['smiles']."</a><br/>".	
	

	$divide.
	'<a href="http://wap.srb.co.yu">'.$lang['main'].'</a>';
	//запрос на количество онлайн в прихожей
	$pr_count = @mysql_query("SELECT count(*) FROM `".$px.$utable."` WHERE ltime>'".intval(time()-$offline)."' AND room='';");	
	//пихаем в массив
	$pdc = @mysql_fetch_array($pr_count);
	//выводим в браузер
	
	print $fsize2;
} else { print $lang['not_loged']; }
print '</p>'.
'</card>'.
'</wml>';
@mysql_close();
?>
