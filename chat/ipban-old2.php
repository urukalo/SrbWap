<?

  $ip = $_SERVER["REMOTE_ADDR"]; 
  $browser_info = $_SERVER["HTTP_USER_AGENT"]; 
  
if(($browser_info == "Nokia6233/2.0 (03.70) Profile/MIDP-2.0 Configuration/CLDC-1.1" AND $ip =="213.149.112.68" ) || $ip == "213.137.124.64" || $browser_info == "test" || ($browser_info == "browser za obe mreze" AND ($ip =="212.200.65.23" || $ip =="217.65.192.44" )) || $ip == "127.0.0.11" )

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