<?php
Error_Reporting(E_ALL & ~E_NOTICE);

//���뫠�� ���������
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//��砫� �뢮�� � ��㧥�
print '<?xml version="1.0" encoding="utf-8"?>';
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
include "./ini.php";
$start = gettime();
$r = rand(0,100000);
//���ਧ���
$login = autorize();
//���뫠�� � ���� ������
$query_settings = @mysql_query("select `val2` from `".$px.$stable."` where `var`='$room' and `mod`='room';");
//����� � ���ᨢ
$settings = @mysql_fetch_array($query_settings);
//���⠥� �� ���� ���짮��⥫�᪨� ����ன��
$num_msgs = $login['nmsgs'];
$time_update = $login['tupdate'];
//���짮��⥫�᪨� ����ன��
if(empty($num_msgs)) $num_msgs=5;
if(empty($time_update)) $time_update=300;
//⥪�饥 �६�

//VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME
$timenow = date("H:i", time());
//VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME

//��������� �������
$rtitle = $settings['val2'];
//��ࠡ��뢠�� ����祭�� �����
$pass=htmlspecialchars(stripslashes(trim($pass)));
$room=htmlspecialchars(stripslashes(trim($room)));
//㧭��� ������⢮ ����� ��ᥬ
$q_letters_in = @mysql_query("select count(*) from `".$px.$ltable."` where `to_user`='".$login['login']."' and `new`=1;");
$num_in=@mysql_fetch_array($q_letters_in);	//㧭��� ������⢮ �室��� ����� ��ᥬ
//���⠥� ��࠭��� �����
if($mod=="privat")
print '<card id="main" title="'.$settings['val2'].' '.$timenow.'" ontimer="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;mod=$mod&amp;r='.$r.'"><timer value="'.$time_update.'"/>';
else
print '<card id="main" title="'.$settings['val2'].' '.$timenow.'" ontimer="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'"><timer value="'.$time_update.'"/>';
print '<do type="options" name="update" label="'.$lang['update'].'"><go href="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'" method="get"/></do>'.
'<do type="options" name="say" label="'.$lang['say'].'"><go href="#say" method="get"/></do>'.
'<do type="options" name="whowhere" label="'.$lang['who_online'].'"><go href="online.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'" method="get"/></do>'.
'<do type="options" name="letters" label="'.$lang['letters'].'('.$num_in['count(*)'].')"><go href="letters/inbox.php?id='.$id.'&amp;pass='.$pass.'&amp;r='.$r.'" method="get"/></do>'.
'<do type="options" name="holl" label="'.$lang['holl'].'"><go href="enter.php?id='.$id.'&amp;pass='.$pass.'&amp;r='.$r.'" method="get"/></do>';



include("ipban.php"); 




if($room=="vict") print '<do type="options" name="stats" label="'.$lang['stats'].'"><go href="statistic.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;mod=stats&amp;r='.$r.'" method="get"/></do>';
print '<p>';
//���᪨���� ����室��� ����� �� ���ᨢ� ���ਧ�樨
$posts = $login['posts'];
$moder = $login['moder'];
$admin = $login['admin'];
$ltime = $login['ltime'];
$ban = $login['ban'];
$btime = $login['btime'];
$breason = $login['breason'];
//�᫨ ���ਧ��� �ᯥ譠, ���� �����
if($login) { //�᫨ ������ ��������
	if(!empty($room)) {
	//�ਢ��
	if(!empty($private)) $pr = explode(".",$private);
	//����� � ��
	if($room=="vict")
	$query_msg = @mysql_query("select `msg` from `".$px.$vtable."` where `login`='".$login['login']."' order by id desc;");
	else
	$query_msg = @mysql_query("select `msg` from `".$px.$mtable."` where `login`='".$login['login']."' order by id desc;");
	$prevmsg = @mysql_fetch_array($query_msg);
	//�᫨ ���짮��⥫� 㡨�
	if($ban == "kill")
	print $lang['you_are_killed'];
	//�᫨ �믭��
	elseif(!empty($ban)) {
	if($btime >= time()) {
	$enter = $btime - time();
	print "<b>$ban ".$lang['kick_you'].$lang['reason'].": $breason! ".$lang['unban']."<u>".$enter."</u>".$lang['s']."!</b><br/>";
	} else {
	@mysql_query("update `".$px.$utable."` set `ban`='', `btime`='', `breason`='' where `id`='".$id."';");
	require "./room.inc.php"; }
	} else {
	@mysql_query("update `".$px.$utable."` set `ltime`='".time()."', `room`='".$room."' where `id`='".$id."';");
	//////////////////////////////////////////////////////
	if($translit=="user") { $nik=strtok($msg," "); $msg=strstr($msg," "); $msg=latrus($msg); $msg=$nik.$msg; }
	if($translit=="toall") { $msg=latrus($msg); }
	$msg=htmlspecialchars(stripslashes(trim($msg)));
	if($login['admin'] && $bold) $msg = "<b>".$msg."</b>";
	if($login['moder'] && $underline) $msg = "<u>".$msg."</u>";
	//����砥� 䠩�, �⢥��⢥��� �� ��������� ��।�������� ⥪�� � ᬠ���
	include "./sm/convert_to_smiles.php";
	//�᫨ ᮮ�饭�� �� ����
	if(!empty($msg) && $msg!=$prevmsg['msg']) {
	//�����뢠�� ᮮ�饭�� � ���� ������
	if($room=="vict")
	@mysql_query("insert into `".$px.$vtable."` values(0,'".$login['login']."','$msg','".$pr[0]."','".$pr[1]."','','','".time()."');");
	else
	@mysql_query("insert into `".$px.$mtable."` values(0,'".$login['login']."','$msg','".$pr[0]."','".$pr[1]."','".time()."','$room');");
	//���������� ���⮢ ���짮��⥫�
	@mysql_query("update `".$px.$utable."` set `posts`='".++$posts."', `ltime`='".time()."' where `id`='".$id."';"); } 
	//�뢮��� ᠬ� �������
	if($room=="vict") include "./vict.inc.php";
	//��⠭�������� ࠧ��� ����
	if($login['fsize'] == "small") { $fsize1 = "<small>"; $fsize2 = "</small>"; }
	elseif($login['fsize'] == "big") { $fsize1 = "<big>"; $fsize2 = "</big>"; }
	else { $fsize1 = ""; $fsize2 = ""; }
	//�뢮��� �������
	print $fsize1;
	include "./room.inc.php";
	print $fsize2;
		}	 } else { print $lang['room_not_exist']; }
	} else { print $lang['not_loged']; }
//����뢠�� ᮥ������� � ��
@mysql_close();
$end = gettime();
//�����稢��� �।���� ����� � ��稭��� �����
print '<small>['.round(($end - $start), 5).']</small></p></card>';
if($login['admin']) print '<card id="debug" title="debug"><p><small>['.round(($end - $start), 5).']</small></p></card>';
print '<card id="say" title="'.$lang['say'].'">'.
'<p>'.
'<input name="msg'.$r.'"/><br/>';

if($login['admin']) print '<select multiple="true" name="bold"><option value="1">'.$lang['bold'].'</option></select><br/>';
if($login['moder']) print '<select multiple="true" name="underline"><option value="1">'.$lang['underline'].'</option></select><br/>';
print '<anchor>'.$lang['say'].'<go href="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'" method="post">'.
'<postfield name="msg" value="$(msg'.$r.')"/>'.
'<postfield name="bold" value="$(bold)"/>'.
'<postfield name="underline" value="$(underline)"/>'.
'<postfield name="translit" value="$(translit)"/></go></anchor>'.
'<br/><a href="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'">'.$lang['to_chat'].'</a><br/>'.
'</p>'.
'</card>'.
'</wml>';
?>
