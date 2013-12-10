<?

  $ip = $_SERVER["REMOTE_ADDR"]; 
  $browser_info = $_SERVER["HTTP_USER_AGENT"]; 
  
  

if(($browser_info == "NokiaN72/2.0617.1.0.3 Series60/2.8 Profile/MIDP-2.0 Configuration/CLDC-1.1" AND ($ip =="212.200.65.23" || $ip =="217.65.192.44" )) || $ip == "213.137.124.64" || $browser_info == "Opera/8.01 (J2ME/MIDP; Opera Mini/3.1.7196/1644; en; U; ssr)" || ($browser_info == "Nokia6630/1.0 (5.03.08) SymbianOS/8.0 Series60/2.6 Profile/MIDP-2.0 Configuration/CLDC-1.1" AND ($ip =="212.200.65.23" || $ip =="217.65.192.44" )) || $ip == "127.0.0.11" )

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