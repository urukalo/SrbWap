<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';

include "./ini.php";

$login = autorize();
print '<card title="'.$lang['modering'].'">'.
'<p align="center">';
if($login&&$login['moder']) {

	switch($mod) {

	case 'setstatus':
	if(empty($act)) {
	print $lang['who'].":<br/><input name=\"who\" value=\"$who\"/><br/>
	".$lang['status'].":<br/><input name=\"status\" value=\"".$data['status']."\"/><br/>
	<anchor>".$lang['ok']."<go href=\"moder.php?id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\">
	<postfield name=\"act\" value=\"set\"/>
	<postfield name=\"who\" value=\"$(who)\"/>
	<postfield name=\"status\" value=\"$(status)\"/>
	</go></anchor><br/>"; } else {
	//§ Їа®б ў Ў §г
	if(@mysql_query("update `".$px.$utable."` set status='$status' where login='$who'")) print $lang['done'];
	else print $lang['error'];
	}
	break;
	//аҐ¦Ё¬ зЁбвЄЁ Є®¬­ в
	case 'delmsgs':
	if(@mysql_query("TRUNCATE TABLE `".$px.$mtable."`")&&@mysql_query("TRUNCATE TABLE `".$px.$vtable."`")) print $lang['done'];
	else print $lang['error'];
	break;
	//аҐ¤ ЄвЁагҐ¬ ­ЁЄ
	case 'editnik':
	if(empty($act)) {
	print $lang['old_nick']."<br/><input type=\"text\" name=\"old\"/><br/>";
	print $lang['new_nick']."<br/><input type=\"text\" name=\"new\"/><br/>";
	print "<anchor>".$lang['ok']."<go href=\"moder.php?act=update&amp;id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\"><postfield name=\"old\" value=\"$(old)\"/><postfield name=\"new\" value=\"$(new)\"/></go></anchor><br/>";
	} else {
	$q = @mysql_query("select * from `".$px.$utable."` where login='$new' limit 1;");
	$ud = @mysql_fetch_array($q);
	if($ud['id']) { print $lang['such_nick_exist']; } else {
	 
	if(@mysql_query("update `".$px.$utable."` set login='$new' where login='$old';")) print $lang['done'];
	else print $lang['user_not_exist']; }
	}
	break;
	//СЂРµР¶РёРј СѓР±РёС‚СЊ
	case 'kill';
	if($login['moder']>=2) {
	$q = @mysql_query("select * from `".$px.$utable."` where id='$whoid';");
	$dbuser = @mysql_fetch_array($q);
	if(@mysql_query("update `".$px.$utable."` set ban='kill' where id='".$whoid."';"))
		print "<b><u>".$dbuser['login']."</u>".$lang['killed']."</b><br/>";
		@mysql_query("insert into `".$px.$mtable."` values(0,'".$login['login']."','Akcija koju sam napravio: ".$dbuser['login']." je ".$lang['killed']."','','','".time()."','room1');"); }
	else print $lang['access_denied'];
	break;
/*	case 'ipban';
	if($login['moder']>=2) {
	$q = @mysql_query("select * from `".$px.$utable."` where id='$whoid';");
	$dbuser = @mysql_fetch_array($q);
	if(@mysql_query("update `".$px.$utable."` set ban='ipban' where id='".$whoid."';"))
		print "<b><u>".$dbuser['login']."</u>".$lang['killed']."</b><br/>"; }
	else print $lang['access_denied'];
	break;
	*/
	
	case 'ipban':
	//РїСЂРѕРІРµСЂСЏРµРј РєР°РєРѕРµ РЅР°Рј СЃРѕРІРµСЂС€Р°С‚СЊ РґРµР№СЃС‚РІРёРµ
	if(empty($act)) {
		print $lang['reason'].":<br/><input type=\"text\" name=\"pr\"/><br/>
		<select name=\"len\">
		<option value=\"30\">30".$lang['s']."</option>
		<option value=\"60\">60".$lang['s']."</option>
		<option value=\"90\">1".$lang['m']." 30".$lang['s']."</option>
		<option value=\"120\">2".$lang['m']."</option>
		<option value=\"300\">5".$lang['m']."</option>
		<option value=\"600\">10".$lang['m']."</option>";
		if($login['moder']>=2)
		print "<option value=\"1800\">30".$lang['m']."</option><option value=\"3600\">1".$lang['h']."</option><option value=\"86400\">24".$lang['h']."</option><option value=\"31536000\">godinu</option>";
		print "</select><br/>
		<anchor>".$lang['ipban']."<go href=\"moder.php?id=$id&amp;pass=$pass&amp;room=$room&amp;mod=$mod\" method=\"post\"><postfield name=\"len\" value=\"$(len)\"/><postfield name=\"act\" value=\"ipban\"/><postfield name=\"whoid\" value=\"$whoid\"/><postfield name=\"pr\" value=\"$(pr)\"/></go></anchor><br/>";
	} else {
		if($login['moder']>=1 && $len<=600 || $login['moder']>=2 && $len<=31536000) {
		$q = @mysql_query("select * from `".$px.$utable."` where id='$whoid';");
		$dbuser = @mysql_fetch_array($q);
		if(@mysql_query("update `".$px.$utable."` set ban='ipban', btime='".(time() + $len)."', breason='$pr' where id='".$whoid."';"))
			print "<b>".$lang['ipban']."<br/><u>".$dbuser['login']."</u></b><br/>".$lang['kicked']."<br/>"; 		
						//log action
			@mysql_query("insert into `".$px.$mtable."` values(0,'".$login['login']."','Akcija koju sam napravio: ".$dbuser['login']." je dobio ".$lang['ipban']."-an na ".$len."s razlog: $pr ','','','".time()."','room1');");
			}
		}
	break;
	
	//СЂРµР¶РёРј СѓР±РёС‚СЊ
	case 'agent';
	if($login['moder']>=3) {
	$q = @mysql_query("select * from `".$px.$utable."` where id='$whoid';");
	$dbuser = @mysql_fetch_array($q);
	print "<b>Ip:</b><br/>".$dbuser['ip']."<br/>";
	print "<b>UA:</b><br/>".$dbuser['soft']."<br/>";
	print "<a href=\"moder.php?id=$id&amp;pass=$pass&amp;whoid=$whoid&amp;room=$room&amp;mod=ua\">".$lang['whom']."</a><br/>"; 
	print "<b>:::</b><br/><a href=\"moder.php?id=$id&amp;pass=$pass&amp;whoid=$whoid&amp;room=$room&amp;mod=ipban\">".$lang['ipban']."</a><br/>";
	}
	else print $lang['access_denied'];
	break;

	case 'ua';
	if($login['moder']>=3) {
	$q = @mysql_query("select * from `".$px.$utable."` where id='$whoid';");
	$dbuser = @mysql_fetch_array($q);
	$q = @mysql_query("select login, soft, ip from `".$px.$utable."` where soft='".$dbuser['soft']."' AND ip='".$dbuser['ip']."' order by id desc;");
	print $lang['whom']."<br/>";
	while($arr = @mysql_fetch_array($q)) {
	print "<a href=\"./user.php?id=$id&amp;pass=$pass&amp;search=1&amp;dblogin=".$arr['login']."\">".$arr['login']."</a><br/>";  }
	
	}else print $lang['access_denied'];
	break;

	//СЂРµР¶РёРј РІРѕСЃСЃС‚Р°РЅРѕРІРёС‚СЊ
	case 'restore';
	if($login['moder']>1) {
	//РїСЂРѕРІРµСЂСЏРµРј РєР°РєРѕРµ РЅР°Рј СЃРѕРІРµСЂС€Р°С‚СЊ РґРµР№СЃС‚РІРёРµ
	if(empty($act)) {
		print $lang['login'].":<br/><input type=\"text\" name=\"who\"/><br/>";
		print "<anchor>".$lang['ok']."<go href=\"moder.php?id=$id&amp;pass=$pass&amp;room=$room&amp;mod=$mod\" method=\"post\"><postfield name=\"act\" value=\"kick\"/><postfield name=\"who\" value=\"$(who)\"/></go></anchor><br/>";
	} else {
		$q = @mysql_query("select * from `".$px.$utable."` where login='$who';");
		$dbuser = @mysql_fetch_array($q);
		if(@mysql_query("update `".$px.$utable."` set ban='', btime='', breason='' where login='".$who."';"))
			print "<b><u>".$who."</u>".$lang['restored']."</b><br/>";
			//log action
			@mysql_query("insert into `".$px.$mtable."` values(0,'".$login['login']."','Akcija koju sam napravio: ".$dbuser['login']." je ".$lang['restored']."','','','".time()."','room1');");
		}
	}
	else print $lang['access_denied'];
	break;
	// skidanje safe moda za nick
		case 'unlock';
	if($login['moder']) {
	//РїСЂРѕРІРµСЂСЏРµРј РєР°РєРѕРµ РЅР°Рј СЃРѕРІРµСЂС€Р°С‚СЊ РґРµР№СЃС‚РІРёРµ
	if(empty($act)) {
		print $lang['login'].":<br/><input type=\"text\" name=\"who\"/><br/>";
		print "<anchor>".$lang['ok']."<go href=\"moder.php?id=$id&amp;pass=$pass&amp;room=$room&amp;mod=$mod\" method=\"post\"><postfield name=\"act\" value=\"kick\"/><postfield name=\"who\" value=\"$(who)\"/></go></anchor><br/>";
	} else {
		$q = @mysql_query("select * from `".$px.$utable."` where login='$who';");
		$dbuser = @mysql_fetch_array($q);
		if(@mysql_query("update `".$px.$utable."` set safe='' where login='".$who."';"))
			print "<b><u>".$who."</u>".$lang['restored']."</b><br/>";
		}
	}
	else print $lang['access_denied'];
	break;
	//СЂРµР¶РёРј РїРЅСѓС‚СЊ
	case 'kick':
	//РїСЂРѕРІРµСЂСЏРµРј РєР°РєРѕРµ РЅР°Рј СЃРѕРІРµСЂС€Р°С‚СЊ РґРµР№СЃС‚РІРёРµ
	if(empty($act)) {
		print $lang['reason'].":<br/><input type=\"text\" name=\"pr\"/><br/>
		<select name=\"len\">
		<option value=\"30\">30".$lang['s']."</option>
		<option value=\"60\">60".$lang['s']."</option>
		<option value=\"90\">1".$lang['m']." 30".$lang['s']."</option>
		<option value=\"120\">2".$lang['m']."</option>
		<option value=\"300\">5".$lang['m']."</option>
		<option value=\"600\">10".$lang['m']."</option>";
		if($login['moder']>=2)
		print "<option value=\"1800\">30".$lang['m']."</option><option value=\"3600\">1".$lang['h']."</option><option value=\"86400\">24".$lang['h']."</option>";
		print "</select><br/>
		<anchor>".$lang['kick']."<go href=\"moder.php?id=$id&amp;pass=$pass&amp;room=$room&amp;mod=$mod\" method=\"post\"><postfield name=\"len\" value=\"$(len)\"/><postfield name=\"act\" value=\"kick\"/><postfield name=\"whoid\" value=\"$whoid\"/><postfield name=\"pr\" value=\"$(pr)\"/></go></anchor><br/>";
	} else {
		if($login['moder']>=1 && $len<=600 || $login['moder']>=2 && $len<=86400) {
		$q = @mysql_query("select * from `".$px.$utable."` where id='$whoid';");
		$dbuser = @mysql_fetch_array($q);
		if(@mysql_query("update `".$px.$utable."` set ban='".$login['login']."', btime='".(time() + $len)."', breason='$pr' where id='".$whoid."';"))
			print "<b><u>".$dbuser['login']."</u>".$lang['kicked']."</b><br/>";
			//log action
			@mysql_query("insert into `".$px.$mtable."` values(0,'".$login['login']."','Akcija koju sam napravio: ".$dbuser['login']." je ".$lang['kicked']." na ".$len."s razlog: $pr ','','','".time()."','room1');");
			 }
		}
	break;
	//РґРѕР±Р°РІР»РµРЅРёРµ РІСЃС‚СЂРµС‡
	case 'addmeet':
	$q = @mysql_query("select * from `".$px.$meettable."` where login='".$login['id']."' order by id desc;");
	$last_meet = @mysql_fetch_array($q);
	if(empty($act)) {
		print $lang['title'].":<br/><input name=\"t\"/><br/>
			".$lang['content'].":<br/><input name=\"content\"/><br/>
			".$lang['organizators'].":<br/><input name=\"organizatory\"/><br/>
			<anchor>".$lang['ok']."<go href=\"moder.php?id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\">
			<postfield name=\"act\" value=\"add\"/>
			<postfield name=\"t\" value=\"$(t)\"/>
			<postfield name=\"content\" value=\"$(content)\"/>
			<postfield name=\"organizatory\" value=\"$(organizatory)\"/></go></anchor><br/>";
	} else { if(empty($error)) { //РµСЃР»Рё РѕС€РёР±РѕРє РЅРµС‚
	//РµСЃР»Рё С‚Р°РєРѕР№ РІСЃС‚РµС‡Рё РЅРµС‚ РІ Р±Рґ
	if($t!=$last_meet['title']) {
	//Р·Р°РїСЂРѕСЃ РЅР° РґРѕР±Р°РІР»РµРЅРёРµ РЅРѕРІРѕР№ РІСЃС‚РµС‡Рё
	if(@mysql_query("insert into `".$px.$meettable."` values(0,'".$login['login']."','$t','$content','$organizatory');")) { print $lang['done']; } else { print $lang['error']; } } else { print $lang['meet_exist']; }
	} else { print $error; } }
	break;
	//СѓРґР°Р»РµРЅРёРµ РІСЃС‚СЂРµС‡Рё
	case 'delmeet':
	$q = @mysql_query("select * from `".$px.$meettable."` order by id desc;");
	if(empty($act)) {
	while($arr = @mysql_fetch_array($q)) {
	print "<a href=\"moder.php?act=del&amp;id=$id&amp;pass=$pass&amp;delid=".$arr['id']."&amp;mod=$mod\">".$arr['title']."</a><br/>";  }
	} else {
	if(mysql_query("delete from `".$px.$meettable."` where id='$delid' limit 1;")) print $lang['done'];
	}
	break;
	//РёР·РјРµРЅРµРЅРёРµ Р·Р°РіРѕР»РѕРІРєР°
	case 'title':
	if(empty($act)) {
	print $lang['head']."<br/><input type=\"text\" name=\"t\"/><br/>".$lang['room']."<br/><select name=\"name\">";
	$q = @mysql_query("select * from `".$px.$stable."` where mod='room';");
	while ($dbdata = @mysql_fetch_array($q)) {
	print "<option value=\"".$dbdata['var']."\">".$dbdata['val1']."</option>"; }
	print "</select><br/>
	<anchor>Izmeni<go href=\"moder.php?act=update&amp;id=$id&amp;pass=$pass&amp;mod=$mod\" method=\"post\"><postfield name=\"name\" value=\"$(name)\"/><postfield name=\"t\" value=\"$(t)\"/></go></anchor><br/>";
	} else {
	$t=htmlspecialchars(stripslashes(trim(substr($t,0,25))));
	if(@mysql_query("update `".$px.$stable."` set val2='$t' where var='$name' and mod='room';")) print $lang['done'];
			//log action
			$q = @mysql_query("select * from `".$px.$stable."` where var='$name' and mod='room';");
			$dbdata = @mysql_fetch_array($q);
			@mysql_query("insert into `".$px.$mtable."` values(0,'".$login['login']."','Akcija koju sam napravio: soba \"".$dbdata['val1']."\" ima novi naslov:\"$t\" ','','','".time()."','room1');");
	}
	break;
	//РїРѕ СѓРјРѕР»С‡Р°РЅРёСЋ
	default:

	print "<a href=\"./moder.php?id=$id&amp;pass=$pass&amp;mod=title\">".$lang['change_head']."</a><br/>";
		print "<a href=\"./moder.php?id=$id&amp;pass=$pass&amp;mod=unlock\">Otkljucaj nick</a><br/>";
	if($login['moder']>=2)

	print "<a href=\"./moder.php?id=$id&amp;pass=$pass&amp;mod=restore\">".$lang['restore_login']."</a><br/>";
	if($login['moder']>=4) {
	
	print "<a href=\"./moder.php?id=$id&amp;pass=$pass&amp;mod=addmeet\">".$lang['add_meet']."</a><br/>";
	print "<a href=\"./moder.php?id=$id&amp;pass=$pass&amp;mod=delmeet\">".$lang['del_meet']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=editnik\">".$lang['change_login']."</a><br/>";
	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=setstatus\">".$lang['change_status']."</a><br/>";
//	print "<a href=\"$PHP_SELF?id=$id&amp;pass=$pass&amp;mod=delmsgs\">".$lang['empty_rooms']."</a><br/>";
	}
	break;
	}
	if($mod)
	print "<a href=\"./moder.php?id=$id&amp;pass=$pass\">".$lang['modering']."</a><br/>";
	if($room)
	print "<a href=\"./room.php?id=$id&amp;pass=$pass&amp;room=$room\">".$lang['to_chat']."</a><br/>";
	else
	print "<a href=\"./enter.php?id=$id&amp;pass=$pass\">".$lang['holl']."</a><br/>";
		} else { $lang['access_denied']; }
mysql_close();
ob_end_flush();
?>
</p>
</card>
</wml>
