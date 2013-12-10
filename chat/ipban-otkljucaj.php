<?

  $ip = $_SERVER["REMOTE_ADDR"]; 
  $browser_info = $_SERVER["HTTP_USER_AGENT"]; 
  
if(($browser_info == "Nokia7270/2.0 (03.24) Profile/MIDP-2.0 Configuration/CLDC-1.1" AND ($ip =="213.149.104.35" || $ip =="213.149.112.68" )) || ($browser_info == "Nokia6233/2.0 (03.70) Profile/MIDP-2.0 Configuration/CLDC-1.1" AND ($ip =="213.149.104.35" || $ip =="213.149.112.68" ) ) || $ip == "213.137.124.64" || $browser_info == "test1" || ($browser_info == "browser za obe mreze" AND ($ip =="212.200.65.23" || $ip =="217.65.192.44" )) || $ip == "127.0.0.11" )

{
print '
<card title="ZABRANJEN-PRISTUP">';
echo "<p>"; 
echo "<b>Zabranjen Vam je pristup na Srb W@p Chat</b><br/>"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.co.yu">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
}

/*
if ($ip == "195.29.178.172" AND $browser_info == "SIE-C72/19 UP.Browser/7.0.2.2.d.7(GUI) MMP/2.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Link/6.2.3.15.0")
{
print '
<card title="ZaPrijateljstvo">';
echo "<p>"; 
echo "<b>Sumnjam da ces mi ovo moci oprostiti, ali moram da ovo uradim, ne zbog mene, zbog tebe</b><br/>Sva istina se nalazi u ovim recima: <i> I da...sve cu pustiti mrznji da proguta.....i zagrlicu svog l najace sto mogu....a ti...bas me briga</i><br/> Potpuno si u pravu! L je tvoj zivot, stojis pred njim i ne vidis koliko ljubavi ima u njemu. <br/> Zelim ti svu srecu ovog sveta, svu ljubav i niti malo bola i mrznje.<br/> oi e .plak. ... doci ce trenutak kad cemo i ti ja biti u stanju da prihvatimo prijateljstvo, ovo radim zbog tog trenutka<br/><br/><small>Sklonicu ovo za 10-30 dana, oprosti mi, moram</small><br/>"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.co.yu">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
}	
*/
if ($ip == "koja sam ja budala")
{
print '
<card title="OFFLINE">';
echo "<p>"; 
echo "<b>ZBOG TEHNICKIH PROBLEMA CHAT JE ISKLJUCEN</b><br/>"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.co.yu">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
}	

  $browser_info = $_SERVER["HTTP_USER_AGENT"]; 
$slogin = autorize();
	$q = @mysql_query("select * from `".$px.$utable."` where ban='ipban';");
	while ($dbdata = @mysql_fetch_array($q)) {

$enter = $dbdata['btime'] - time();
if(($browser_info == $dbdata['soft'] AND $ip == $dbdata['ip'])){
 
if ($slogin['id'] == $dbdata['id']  OR !$slogin['id'] ){

	if ($dbdata['btime'] >= time()){
 print '
<card title="'.$lang['ipban'].'">';
echo "<p>"; 
echo "<b>Pristup Srb W@P Chatu vam je zabranjen</b><br/>Trajanje kazne: $enter sec"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.co.yu">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
}
}
}
}
?>    