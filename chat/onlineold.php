<?php
//���뫠�� ���������
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//����� �뢮� � ��㧥�
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//����砥� 䠩� � ���䨣��樥�
include "./ini.php";
//���ਧ���
$login = autorize();
//����� �� �᫮ ������
$q_count = @mysql_query("SELECT count(*) FROM `".$px.$utable."` WHERE ltime>'".intval(time()-$offline)."'");
//� ���ᨢ
$count = @mysql_fetch_array($q_count);
//�த������ �뢮� � ��㧥�
print '<card title="'.$lang['who_online'].' ('.$count['count(*)'].')">'.
'<p>';
	//��⠭�������� ࠧ��� ����
	if($login['fsize'] == "small") { $fsize1 = "<small>"; $fsize2 = "</small>"; }
	elseif($login['fsize'] == "big") { $fsize1 = "<big>"; $fsize2 = "</big>"; }
	elseif($login['fsize'] == "verysmall") { $fsize1 = "<small><small>"; $fsize2 = "</small></small>"; }
	else { $fsize1 = ""; $fsize2 = ""; }
	print $fsize1;
	//��� �뢮�� ��뫮� �� �������
	$q = @mysql_query("select `var`,`val1` from `".$px.$stable."` where mod='room' order by val3;");
	//� 横�� ���⠥� ��뫪�
	while($droom = @mysql_fetch_array($q)) {
		$q_online = @mysql_query("SELECT `login` FROM `".$px.$utable."` WHERE ltime>'".intval(time()-$offline)."' AND room='".$droom['var']."' order by ltime desc;");
		print '<a href="./room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$droom['var'].'">'.$droom['val1'].'</a>:<br/>';
		while($donline = @mysql_fetch_array($q_online)) { print $donline['login'].", "; }
		print '<br/>';
	}
//����� �� ������⢮ ������ � ��宦��
$pr_count = @mysql_query("SELECT count(*) FROM `".$px.$utable."` WHERE ltime>'".intval(time()-$offline)."' AND room='';");
//��堥� � ���ᨢ
$pdc = @mysql_fetch_array($pr_count);
print "<a href=\"enter.php?id=$id&amp;pass=$pass\">".$lang['holl']." (".$pdc['count(*)'].")</a><br/>";
print $fsize2;
print '</p>'.
'</card>'.
'</wml>';
//ࠧ�뢠�� ᮥ������� � ��
@mysql_close();
ob_end_flush();
?>
