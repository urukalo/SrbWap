<?php
//���뫠�� ���������
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//�뢮� � ��㧥�
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//����砥� ���䨣��樮��� 䠩�
include "./ini.php";
//���ਧ���
$login = autorize();
//�த������ �뢮� � ��㧥�
print '<card title="'.$lang['meets'].'">'.
'<p>';
if($login) {//���짮��⥫� ���ਧ�஢��
	switch($mod) {
	//��ᬮ�� �����
	case 'view':
	//����� �� ��।����� ������
	$q = @mysql_query("select * from `".$px.$meettable."` where id='$meetid' order by id desc;");
	//� ���ᨢ
	$arr = @mysql_fetch_array($q);
	//�뢮� ������ � �����
	print "<u>".$lang['title'].":</u> ".$arr['title'];
	print "<br/><u>".$lang['content'].":</u> ".$arr['content'];
	print "<br/><u>".$lang['organizators'].":</u> ".$arr['organizatory'];
	print "<br/><u>".$lang['who_add'].":</u> ".$arr['login'];
	break;
	//�� 㬮�砭��
	default:
	//����� �� �����
	$q = @mysql_query("select * from `".$px.$meettable."` order by id desc;");
	//�뢮��� ��뫪� �� �����
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
