<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print '<?xml version="1.0" encoding="utf-8"?>';
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
include "./ini.php";
print '<card title="'.$lang['search'].'">'.
'<p>';
$login = autorize();
if($login) {
print '<input type="text" name="dblogin"/><br/>'.
'<anchor>'.$lang['ok'].'<go href="user.php?id='.$login['id'].'&amp;pass='.$login['pass'].'" method="post">'.
'<postfield name="dblogin" value="$(dblogin)"/>'.
'<postfield name="search" value="1"/></go></anchor><br/>';
print "<a href=\"enter.php?id=$id&amp;pass=$pass\">".$lang['holl']."</a><br/>";
} else { print $lang['not_loged']; }
//разрываем соединение с базой
@mysql_close();
print '</p>'.
'</card>'.
'</wml>';
ob_end_flush();
?>
