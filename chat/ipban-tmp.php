<?

  $ip = $_SERVER["REMOTE_ADDR"]; 
  $browser_info = $_SERVER["HTTP_USER_AGENT"]; 
/*
if(($browser_info == "SIE-C6V/25 UP.Browser/7.0.0.1.c.3 (GUI) MMP/2.0 Profile/MIDP-2.0 Configuration/CLDC-1.1" AND $ip == "217.65.192.44") || $ip == "212.200.193.2" || $ip == "212.91.99.90")

{
echo "<p>"; 
echo "Pristup Srb W@P Chatu vam je zabranjen"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.co.yu">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
}
*/
if($browser_info == "Nokia3120/1.0 (06.11) Profile/MIDP-1.0 Configuration/CLDC-1.0" AND $ip == "217.65.192.44")

{
echo "<p>"; 
echo "Pristup Srb W@P Chatu vam je zabranjen"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.co.yu">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 

}
/*
if($browser_info == "SonyEricssonK700i/R2A SEMC-Browser/4.0 Profile/MIDP-1.0 MIDP-2.0 Configuration/CLDC-1.1" AND $ip == "212.200.65.23")

{
echo "<p>"; 
echo "Pristup Srb W@P Chatu vam je zabranjen"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.co.yu">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
}

if($browser_info == "SonyEricssonT610/R301 Profile/MIDP-1.0 Configuration/CLDC-1.0" AND $ip == "212.200.65.23")

{
echo "<p>"; 
echo "Pristup Srb W@P Chatu vam je zabranjen"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.co.yu">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
}

if($browser_info == "SonyEricssonT300/R201" AND $ip == "212.200.65.23")

{
echo "<p>"; 
echo "Pristup Srb W@P Chatu vam je zabranjen"; 
echo "</p>"; 
 ?> 
<p align="center"><a href="http://wap.srb.co.yu">SRB W@P</a></p>
<?
echo "</card>"; 
echo "</wml>"; 
exit(); 
}
*/
?>    