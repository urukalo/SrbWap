<?php
include 'lang.inc.php';
///////////////////////////////////////////////////////////
$DB_HOST = "localhost";//хост бд
$DB_USER = "milan";	//имя пользоватебя бд
$DB_PASS = "uruk4l0";	//пароль пользователя бд
$DB_NAME = "milan";	//название бд
////////////////////////////////////////////////////////////
$offline = 300;			//Время, через которое пользователь считается оффлайн
$divide = "<b>------------</b><br/>";	//разделитель в прихожей
$px = "chat_";			//префикс названия таблицы
$itable = "ignor";		//имя таблицы игнора
$iptable = "ipban";		//имя таблицы игнора
$utable = "users";		//имя таблицы пользователей
$stable = "settings";		//имя таблицы настроек
$qtable = "ques";		//имя таблицы вопросов
$vtable = "vict";		//имя таблицы викторины
$mtable = "messages";		//имя таблицы сообщений
$meettable = "meets";		//имя таблицы встреч
$ltable = "letters";		//имя таблицы для писем
////////////////////////////////////////////////////////////
function gettime()
{
	$part_time = explode(' ', microtime());
	$real_time = $part_time[1].substr($part_time[0], 1);
	return $real_time;
}
////////////////////////////////////////////////////////////
//функция для авторизации пользователя
function autorize() {
	global $px, $utable, $login, $id, $pass;
	//кодируем пароль
	//$сpass = crypt($pass, $crypt);
	//запрос на выбор пользователя из бд
	$q = @mysql_query("select * from `".$px.$utable."` where id='$id' and pass='$pass' limit 1;");
	//пихаем данные из запроса в массив
	$duser = @mysql_fetch_array($q);
	//возвращаем логин пользователя
	return $duser;
}
////////////////////////////////////////////////////////////
//массив для транслитерации букв
$tran = array(
"A"=>"╨Р","a"=>"╨░","B"=>"╨С","b"=>"╨▒","V"=>"╨Т",
"v"=>"╨▓","G"=>"╨У","g"=>"╨│","D"=>"╨Ф","d"=>"╨┤",
"E"=>"╨Х","e"=>"╨╡","yo"=>"╨Б","Zh"=>"╨Ц","zh"=>"╨╢",
"Z"=>"╨Ч","z"=>"╨╖","I"=>"╨Ш","i"=>"╨╕","J"=>"╨Щ",
"j"=>"╨╣","K"=>"╨Ъ","k"=>"╨║","L"=>"╨Ы","l"=>"╨╗",
"M"=>"╨Ь","m"=>"╨╝","N"=>"╨Э","n"=>"╨╜","O"=>"╨Ю",
"o"=>"╨╛","P"=>"╨Я","p"=>"╨┐","R"=>"╨а","r"=>"╤А",
"S"=>"╨б","s"=>"╤Б","T"=>"╨в","t"=>"╤В","U"=>"╨г",
"u"=>"╤Г","F"=>"╨д","f"=>"╤Д","H"=>"╨е","h"=>"╤Е",
"C"=>"╨ж","c"=>"╤Ж","Ch"=>"╨з","ch"=>"╤З","Sh"=>"╨и",
"sh"=>"╤И","Sch"=>"╨й","sch"=>"╤Й","''"=>"╤К",
"Y"=>"╨л","y"=>"╤Л","'"=>"╤М","Ye"=>"╨н",
"ye"=>"╤Н","Yu"=>"╨о","yu"=>"╤О","Ya"=>"╨п","ya"=>"╤П",
"Yo"=>"╤С"
);
//функция конвертации транслита в юникод
function latrus($str) {
	global $tran;
	return strtr($str,$tran);
}
////////////////////////////////////////////////////////////
//выполняем соединение
mysql_connect($DB_HOST,$DB_USER,$DB_PASS) or die ('<card id="error" title="Ошибка">'.
	'<p>'.
	'╨Ъ ╤Б╨╛╨╢╨░╨╗╨╡╨╜╨╕╤О ╨▒╨░╨╖╨░ ╨┤╨░╨╜╨╜╤Л╤Е ╨▓ ╨┤╨░╨╜╨╜╤Л╨╣ ╨╝╨╛╨╝╨╡╨╜╤В ╨╜╨╡╨┤╨╛╤Б╤В╤Г╨┐╨╜╨░! ╨Х╤Б╨╗╨╕ ╨▓╤Л ╤Г╨▓╨╡╤А╨╡╨╜╤Л, ╤З╤В╨╛ ╤Н╤В╨╛ ╨╜╨╡ ╤Б╨╗╤Г╤З╨░╨╣╨╜╨╛, ╨╛╨▒╤А╨░╤В╨╕╤В╨╡╤Б╤М ╨║ ╨░╨┤╨╝╨╕╨╜╨░╨╝!'.
	'<br/>'.
	'<anchor>╨Э╨░╨╖╨░╨┤<prev/></anchor><br/>'.
	'<a href="/">corporation</a>'.
	'</p>'.
	'</card>'.
	'</wml>');
//выбираем базу для работы
mysql_select_db($DB_NAME);
///////////////////////////////////////////////////////////
//функция обновления статуса
function ustatus() {
global $login, $px, $utable;
$status = $login['status'];
$posts = $login['posts'];
//выбираем статус                                 
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
