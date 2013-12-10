<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
include "ini.php";
print '<card title="Копирование юзеров">'.
'<p align="center">';
@mysql_query("truncate table `".$px.$utable."`;");
$q = @mysql_query("select * from `users` order by `id`");
while ($data = @mysql_fetch_array($q)) {
@mysql_query("insert into `".$px.$utable."` values (0, '".$data['login']."', '".$data['pass']."', '".$data['name']."', '".$data['sex']."', '".$data['bday']."', '".$data['month']."', '".$data['byear']."','".$data['photo']."', '".$data['live']."', '".$data['mobile']."', '', '".$data['email']."', '".$data['url']."', '', '', '".$data['about']."', '".$data['status']."', '".$data['posts']."', '".$data['vposts']."', '".$data['num_msgs']."', '".$data['time_update']."', '', '', '', '', '".$data['moder']."', '".$data['admin']."', '".time()."', '');");
}
print '<b>Юзеры скопированы!</b><br/>';
print '</p>'.
'</card>'.
'</wml>';
?>
