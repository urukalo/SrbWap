<?php
print '[<a href="./room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'">'.$lang['update'].'</a>]'.
'[<a href="./room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;mod=privat&amp;r='.$r.'">'.$lang['privat'].'</a>]'.'[<a href="#say">'.$lang['say'].'</a>]<br/>';
$ignor = "";
$qi = @mysql_query("select `user` from `".$px.$itable."` where `loginid`=".$login['id'].";");
while($idata = @mysql_fetch_array($qi)) {
$ignor .= "login != '".$idata['user']."' AND ";
}
//приват или нет
if($room=="vict") {
if($mod=="privat")
$que = @mysql_query("SELECT `login`,`msg`,`time`,`pr_to`,`pr_from` from `".$px.$vtable."` WHERE ".$ignor." (pr_from = '".$login['id']."' OR pr_to = '".$login['id']."') order by id desc limit $num_msgs;");
else
$que = @mysql_query("SELECT `login`,`msg`,`time`,`pr_to`,`pr_from` from `".$px.$vtable."` WHERE ".$ignor." ((pr_to = '' AND pr_from = '') OR (pr_from = '".$login['id']."' OR pr_to = '".$login['id']."')) order by id desc limit $num_msgs;");
} else {
if($mod=="privat")
$que = @mysql_query("SELECT `login`,`msg`,`time`,`pr_to`,`pr_from` from `".$px.$mtable."` WHERE ".$ignor." room = '$room' AND (pr_from = '".$login['id']."' OR pr_to = '".$login['id']."') order by time desc limit $num_msgs;");
else
$que = @mysql_query("SELECT `login`,`msg`,`time`,`pr_to`,`pr_from` from `".$px.$mtable."` WHERE ".$ignor." room = '$room' AND ((pr_to = '' AND pr_from = '') OR (pr_from = '".$login['id']."' OR pr_to = '".$login['id']."')) order by time desc limit $num_msgs;");
}
//выводим все в цикле
while($m = @mysql_fetch_array($que)) {
$dblogin = $m['login'];
$dbmsg = $m['msg'];
if ($login['smiles'] == "1") {
	    $dbmsg = ereg_replace('img src' ,'a href', $dbmsg);
	    $dbmsg = ereg_replace('alt="' ,'>', $dbmsg);
	    $dbmsg = ereg_replace('"/>' ,'</a>', $dbmsg);

}
//VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME 
$dbtime = ($m['time']);
//VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME VREME 


$pr_to = $m['pr_to'];
$pr_from = $m['pr_from'];
$qdblogin = @mysql_query("select `id` from `".$px.$utable."` where `login`='$dblogin'");
$db = @mysql_fetch_array($qdblogin);
if(!empty($pr_to)&&!empty($pr_from)) print "<b>[P.P]<a href=\"user.php?id=$id&amp;pass=$pass&amp;room=$room&amp;dbid=".$db['id']."&amp;r=$r&amp;mod=$mod\">$dblogin</a>&gt;</b>\r".$dbmsg." [".date("H.i",$dbtime)."]<br/>";
else
print "<b><a href=\"./user.php?id=$id&amp;pass=$pass&amp;room=$room&amp;dbid=".$db['id']."&amp;r=$r\">$dblogin</a>:</b>\r".$dbmsg." [".date("H.i",$dbtime)."]<br/>";
}
if ($moder) {
if($mod=="privat")
print "<a href=\"./history.php?id=$id&amp;pass=$pass&amp;room=$room&amp;start=$num_msgs&amp;&amp;mod=$mod&amp;r=$r\">".$lang['history']."</a>";
else
print "<a href=\"./history.php?id=$id&amp;pass=$pass&amp;room=$room&amp;start=$num_msgs&amp;r=$r\">".$lang['history']."</a>";
}
print '<br/>[<a href="./room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'">'.$lang['update'].'</a>]'.
'[<a href="#say">'.$lang['say'].'</a>]';
print "\r[<a href=\"online.php?id=$id&amp;pass=$pass&amp;r=$r\">".$lang['who_online']."</a>]<br/>";
?>
<a href="http://wap.srb.co.yu">SRB W@P</a>
