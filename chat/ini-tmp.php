<?php
include 'lang.inc.php';
///////////////////////////////////////////////////////////
$DB_HOST = "localhost";//��� ��
$DB_USER = "milan";	//��� ���짮��⥡� ��
$DB_PASS = "uruk4l0";	//��஫� ���짮��⥫� ��
$DB_NAME = "milan";	//�������� ��
////////////////////////////////////////////////////////////
$offline = 300;			//�६�, �१ ���஥ ���짮��⥫� ��⠥��� ��䫠��
$divide = "<b>------------</b><br/>";	//ࠧ����⥫� � ��宦��
$px = "chat_";			//��䨪� �������� ⠡����
$itable = "ignor";		//��� ⠡���� �����
$iptable = "ipban";		//��� ⠡���� �����
$utable = "users";		//��� ⠡���� ���짮��⥫��
$stable = "settings";		//��� ⠡���� ����஥�
$qtable = "ques";		//��� ⠡���� ����ᮢ
$vtable = "vict";		//��� ⠡���� ����ਭ�
$mtable = "messages";		//��� ⠡���� ᮮ�饭��
$meettable = "meets";		//��� ⠡���� �����
$ltable = "letters";		//��� ⠡���� ��� ��ᥬ
////////////////////////////////////////////////////////////
function gettime()
{
	$part_time = explode(' ', microtime());
	$real_time = $part_time[1].substr($part_time[0], 1);
	return $real_time;
}
////////////////////////////////////////////////////////////
//�㭪�� ��� ���ਧ�樨 ���짮��⥫�
function autorize() {
	global $px, $utable, $login, $id, $pass;
	//�����㥬 ��஫�
	//$�pass = crypt($pass, $crypt);
	//����� �� �롮� ���짮��⥫� �� ��
	$q = @mysql_query("select * from `".$px.$utable."` where id='$id' and pass='$pass' limit 1;");
	//��堥� ����� �� ����� � ���ᨢ
	$duser = @mysql_fetch_array($q);
	//�����頥� ����� ���짮��⥫�
	return $duser;
}
////////////////////////////////////////////////////////////
//���ᨢ ��� �࠭᫨��樨 �㪢
$tran = array(
"A"=>"А","a"=>"а","B"=>"Б","b"=>"б","V"=>"В",
"v"=>"в","G"=>"Г","g"=>"г","D"=>"Д","d"=>"д",
"E"=>"Е","e"=>"е","yo"=>"Ё","Zh"=>"Ж","zh"=>"ж",
"Z"=>"З","z"=>"з","I"=>"И","i"=>"и","J"=>"Й",
"j"=>"й","K"=>"К","k"=>"к","L"=>"Л","l"=>"л",
"M"=>"М","m"=>"м","N"=>"Н","n"=>"н","O"=>"О",
"o"=>"о","P"=>"П","p"=>"п","R"=>"Р","r"=>"р",
"S"=>"С","s"=>"с","T"=>"Т","t"=>"т","U"=>"У",
"u"=>"у","F"=>"Ф","f"=>"ф","H"=>"Х","h"=>"х",
"C"=>"Ц","c"=>"ц","Ch"=>"Ч","ch"=>"ч","Sh"=>"Ш",
"sh"=>"ш","Sch"=>"Щ","sch"=>"щ","''"=>"ъ",
"Y"=>"Ы","y"=>"ы","'"=>"ь","Ye"=>"Э",
"ye"=>"э","Yu"=>"Ю","yu"=>"ю","Ya"=>"Я","ya"=>"я",
"Yo"=>"ё"
);
//�㭪�� �������樨 �࠭᫨� � ���
function latrus($str) {
	global $tran;
	return strtr($str,$tran);
}
////////////////////////////////////////////////////////////
//�믮��塞 ᮥ�������
mysql_connect($DB_HOST,$DB_USER,$DB_PASS) or die ('<card id="error" title="�訡��">'.
	'<p>'.
	'К сожалению база данных в данный момент недоступна! Если вы уверены, что это не случайно, обратитесь к админам!'.
	'<br/>'.
	'<anchor>Назад<prev/></anchor><br/>'.
	'<a href="/">corporation</a>'.
	'</p>'.
	'</card>'.
	'</wml>');
//�롨ࠥ� ���� ��� ࠡ���
mysql_select_db($DB_NAME);
///////////////////////////////////////////////////////////
//�㭪�� ���������� �����
function ustatus() {
global $login, $px, $utable;
$status = $login['status'];
$posts = $login['posts'];
//�롨ࠥ� �����                                 
if(empty($status))
@mysql_query("update `".$px.$utable."` set status='Novajlija' where id='".$login['id']."';");
if($posts>=1 && $posts<100 && $status=="Novajlija")
@mysql_query("update `".$px.$utable."` set status='Obican chater' where id='".$login['id']."';");
if($posts>=500 && $posts<1000 && $status=="Obican chater")
@mysql_query("update `".$px.$utable."` set status='Super chater' where id='".$login['id']."';");
if($posts>=1000 && $posts<3000 && $status=="Super chater")
@mysql_query("update `".$px.$utable."` set status='Srebrni chater' where id='".$login['id']."';");
if($posts>=3000 && $posts<5000 && $status=="Srebrni chater")
@mysql_query("update `".$px.$utable."` set status='Zlatni chater' where id='".$login['id']."';");
if($posts>=5000 && $posts<7000 && $status=="Zlatni chater")
@mysql_query("update `".$px.$utable."` set status='Ekstra chater' where id='".$login['id']."';");
if($posts>=7000 && $status=="Ekstra chater")
@mysql_query("update `".$px.$utable."` set status='The best chater' where id='".$login['id']."';");
}
?>
