<?

  $ip = $_SERVER["REMOTE_ADDR"]; 
  $browser_info = $_SERVER["HTTP_USER_AGENT"]; 
//	preg_match("/Presto/", $browser_info) || 
  
if(	($browser_info == "Nokia7270/2.0 (03.24) Profile/MIDP-2.0 Configuration/CLDC-1.1" AND ($ip =="213.149.104.35" || $ip =="213.149.112.68" )) || 
	($browser_info == "Nokia6233/2.0 (03.70) Profile/MIDP-2.0 Configuration/CLDC-1.1" AND ($ip =="213.149.104.35" || $ip =="213.149.112.68" ) ) || 
	$browser_info == "SonyEricssonK600i/R2BA Browser/SEMC-Browser/4.2 Profile/MIDP-2.0 Configuration/CLDC-1.1" || 
	$ip == "213.137.124.64" || 
	$browser_info == "Opera/8.01 (J2ME/MIDP; Opera Mini/3.1.8295/1724; hr; U; ssr)" || 
    $browser_info == "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; SV1; .NET CLR 1.1.4322)" || 

	($browser_info == "browser za obe mreze" AND ($ip =="212.200.65.23" || $ip =="217.65.192.44" )) || 
	$ip == "127.0.0.11" 
)

{
print '
<card title="ZABRANJEN-PRISTUP">';
echo "<p>"; 
echo "<b>Zabranjen Vam je pristup na Srb W@p Chat</b><br/>"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.rs">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
}

$slogin = autorize();


$ltime = $slogin['ltime'];
$ban = $slogin['ban'];
$btime = $slogin['btime'];
$breason = $slogin['breason'];

if($ban == "kill") {
	print '<card title="'.$lang['you_are_killed'].'"><p align="center">';
	echo $lang['welcome']."<br/>Samo za odabrane!!<br/>---------<br/>";
	print "<b>".$lang['you_are_killed']."</b>";
	print "</p></card></wml>"; 
	exit;
	}
if($ban == "ipban") {
	print '<card title="'.$lang['ipban'].'"><p align="center">';
	echo $lang['welcome']."<br/>Samo za odabrane!!<br/>---------<br/>";
	print "<b>$ban: ".$lang['kick_you'].$lang['reason'].": $breason! <br/>".$lang['unban']." za <u>".$enter."</u>".$lang['s']."!</b><br/>";
	print "</p></card></wml>"; 
	exit;
	}
  elseif(!empty($ban)) {
    if($btime >= time()) {
	$enter = $btime - time();
	print '<card title="'.$lang['kick_you'].'"><p align="center">';
	echo $lang['welcome']."<br/>Samo za odabrane!!<br/>---------<br/>";
	print "<b>$ban: ".$lang['kick_you'].$lang['reason'].": $breason! <br/>".$lang['unban']." za <u>".$enter."</u>".$lang['s']."!</b><br/>";
print "</p></card></wml>"; exit;
	} 
else  
	@mysql_query("update `".$px.$utable."` set `ban`='', `btime`='', `breason`='' where `id`='".$id."';");
}




/*
if(!empty($slogin)){
if (!($slogin['moder'] or $slogin['admin']))
{
print '
<card title="OFFLINE">';
echo "<p align=\"center\">"; 
echo "<b>CHAT JE ISKLJUCEN</b><br/><br/><i>info: servis je ugasen</i><br/>"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.rs">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
}	
}
*/
  $browser_info = $_SERVER["HTTP_USER_AGENT"]; 

	$q = @mysql_query("select * from `".$px.$utable."` where ban='ipban';");
	while ($dbdata = @mysql_fetch_array($q)) {

		$enter = $dbdata['btime'] - time();
		if(($browser_info == $dbdata['soft'] AND $ip == $dbdata['ip'])){
 
			if ($slogin['id'] == $dbdata['id']  OR $registracija ){

				if ($dbdata['btime'] >= time()){

print '<card title="'.$lang['ipban'].'">';
echo "<p>"; 
echo "<b>Pristup Srb W@P Chatu vam je zabranjen</b><br/>Trajanje kazne: $enter sec"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.rs">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
				}
			}
		}
	}
?>    