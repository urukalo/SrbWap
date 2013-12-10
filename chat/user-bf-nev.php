<?php
$r=rand(0,100000);
//Ї®б« Ґ¬ § Ј®«®ўЄЁ
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//ўлў®¤ д ©«  wml
print '<?xml version="1.0" encoding="utf-8"?>';
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
include "./ini.php";
$login = autorize();
if($search) {
$query_users = @mysql_query("select * from `".$px.$utable."` where login='".$dblogin."';");
$data = @mysql_fetch_array($query_users);
} else {
$query_users = @mysql_query("select * from `".$px.$utable."` where id='$dbid';");
$data = @mysql_fetch_array($query_users);
}
print '<card title="'.$data['login'].'">'.
'<p>';
if($login) {
//¤ ­­лҐ ® Ї®«м§®ў вҐ«Ґ
$moder=$login['moder'];
$admin=$login['admin'];
$from=$login['email'];
//ҐйҐ ¤ ­­лҐ
$user_moder=$data['moder'];
$to=$data['email'];
$photo=$data['photo'];
$status=$data['status'];
//Ґб«Ё нв® ­Ґ Ї®ЁбЄ
if(!$search){ 
 if ($data['room'] != $login['room']) {
  if ($a) print "";} 
 
 print '<input name="msg'.$r.'"/><br/>'.
'<select name="private" title="'.$lang['privat'].'">'.
'<option value="0">Public</option>'.
'<option value="'.$login['id'].'.'.$data['id'].'">Private</option>'.
'</select><br/>'.

'<anchor>'.$lang['say'].'<go href="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'&amp;mod='.$mod.'" method="post">'.
'<postfield name="private" value="$(private)"/>'.
'<postfield name="msg" value="'.$data['login'].', $(msg'.$r.')"/>'.
'<postfield name="translit" value="$(translit)"/></go></anchor><br/>'.
"<a href=\"room.php?id=$id&amp;pass=$pass&amp;room=$room&amp;r=$r\">".$lang['to_chat']."</a><br/>";}
else {if ($data['ltime']>intval(time()-$offline)){ 
	$qroom = @mysql_query("select * from `".$px.$stable."` where var='".$data['room']."';");
	$droom = @mysql_fetch_array($qroom);
print "Online je! <br/>"; if ($data['room']) print $lang['room'].": <a href=\"room.php?id=$id&amp;pass=$pass&amp;room=".$data['room']."&amp;r=$r\">".$droom['val1']."</a>";
else print "<a href=\"room.php?id=$id&amp;pass=$pass&amp;room=$room&amp;r=$r\">".$lang['to_chat']."</a><br/>" ;
		}else print "Trenutno je offline";}

print "<br/><a href=\"#prof\">".$lang['profile']."</a><br/><br/>";

print"</p></card><card id=\"prof\" title=\"".$lang['profile']."\"><p>";

//Ї®«
//��⠭�������� ࠧ��� ����
if($login['fsize'] == "small") { $fsize1 = "<small>"; $fsize2 = "</small>"; }
elseif($login['fsize'] == "big") { $fsize1 = "<big>"; $fsize2 = "</big>"; }
else { $fsize1 = ""; $fsize2 = ""; }
print $fsize1;
if($data['sex']=="m") { $sex = $lang['men']; } else { $sex = $lang['wmen']; }

//SLIKA
if (!empty($photo) && $data['img'] == 0) { 
 if ($login['posts'] >= 100 || !$login['mod'] )
 	print "<img src=\"$photo\" alt=\"".$data['login']."\" /><br/>";
 else print "Slika: Da bi videli sliku treba vam 100 postova<br/><br/>";
 } else {
  if ($data['sex'] == "zh") print "<img src=\"photos/w_nepoznat.jpg\" alt=\"".$data['login']."\" /><br/>"; else print "<img src=\"photos/m_nepoznat.jpg\" alt=\"".$data['login']."\" /><br/>";}

//Ban?  
if ($data['ban']) {
  print "---<br/><b>Izbacen sa chata!</b><br/>"; 
  	If ($login['mod'] || $login['admin']) {
	   print "Ko:".$data['ban']." <br/>";
	   if ($data['btime']) print "Razlog: ".$data['breason']." <br/>";
	   if ($data['btime']) print"Do kad:".date("d-m-Y H:i", $data['btime'])."<br/>";
	   print "<a href=\"moder.php?id=$id&amp;pass=$pass&amp;mod=restore\">Vrati Nick</a><br/>";
	   }
  print "---<br/>";
}

print $lang['nick'].": ".$data['login']." <br/>"; //}
print $lang['name'].": ".$data['name']." <br/>";
print $lang['sex'].": $sex <br/>";
print $lang['birthday'].": ".$data['bday']."-".$data['bmonth']."-".$data['byear']."<br/>";
print $lang['live'].": ".$data['live']." <br/>";
print $lang['phone'].": ".$data['mobile'] ."<br/>";
print $lang['operator'].": ".$data['operator'] ."<br/>";
print "E-mail: <a href=\"email.php?id=$id&amp;pass=$pass&amp;room=$room&amp;to=$to&amp;from=$from\">".$to." </a><br/>";
print $lang['wap'].": <a href=\"".$data['wapsite']."\">".$data['wapsite']."</a> <br/>";
print $lang['web'].": <a href=\"".$data['website']."\">".$data['website']."</a> <br/>";
print "ICQ: ".$data['icq']." <br/>";
print $lang['status'].": $status <br/>";
print $lang['posts'].": ".$data['posts']." <br/>";
print $lang['about'].": ".$data['about']." <br/>";
print $lang['datereg'].": ".date("d-m-Y", $data['rtime'])." <br/>";
if($moder) print $lang['datelog'].": ".date("d-m-Y H:i", $data['ltime'])." <br/>";

if(!empty($moder)&&empty($data['admin'])) print "<b>:::</b><br/><a href=\"moder.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=kick\">".$lang['kick']."</a><br/>";
if($moder>=2&&empty($data['admin'])) print "<a href=\"moder.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=kill\">".$lang['kill']."</a><br/>";
if($moder>=3&&empty($data['admin'])) print "<a href=\"moder.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=agent\">Browser</a><br/>";
if(!empty($admin)) {

if($user_moder>=1) { print "<b>:::</b><br/><a href=\"admin.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=delmoder\">".$lang['delmoder']."</a><br/>"; }
else {
print "<b>:::</b><br/><a href=\"admin.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=makemoder\">".$lang['makemoder']."</a><br/>"; }

if($user_moder>=2) { print "<a href=\"admin.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=delkiller\">".$lang['delkiller']."</a><br/>"; }
else {
print "<a href=\"admin.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=makekiller\">".$lang['makekiller']."</a><br/>"; }
if($user_moder>=3) { print "<a href=\"admin.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=delshpion\">".$lang['delshpion']."</a><br/>"; }
else {
print "<a href=\"admin.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=makeshpion\">".$lang['makeshpion']."</a><br/>"; }
if($user_moder>=4) { print "<a href=\"admin.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=deltopmoder\">".$lang['deltopmoder']."</a><br/>"; }
else {
print "<a href=\"admin.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=maketopmoder\">".$lang['maketopmoder']."</a><br/>"; }
print "<a href=\"admin.php?id=$id&amp;pass=$pass&amp;whoid=".$data['id']."&amp;room=$room&amp;mod=del\">".$lang['delete']."</a><br/>";
}
print "<b>:::</b><br/><a href=\"ignor.php?id=$id&amp;pass=$pass&amp;room=$room&amp;r=$r&amp;mod=set&amp;whoid=".$data['id']."\">".$lang['in_ignor']."</a><br/>";
//РІ С‡Р°С‚
if($room) print "<a href=\"room.php?id=$id&amp;pass=$pass&amp;room=$room&amp;r=$r\">".$lang['to_chat']."</a><br/>";
else print "<a href=\"enter.php?id=$id&amp;pass=$pass&amp;r=$r\">".$lang['holl']."</a><br/>";
print $fsize2;
} else { print $lang['access_denied']; }
//РєРѕРЅРµС‡РЅС‹Рµ С‚РµРіРё
print '</p>'.
'</card>'.
'</wml>';
//СЂР°Р·СЂС‹РІР°РµРј СЃРѕРµРґРёРЅРµРЅРёРµ СЃ Р±Р°Р·РѕР№
@mysql_close();
ob_end_flush();
?>
